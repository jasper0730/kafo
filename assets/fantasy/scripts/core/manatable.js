(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module depending on jQuery.
        define(['jquery'], factory);
    } else {
        // No AMD. Register plugin with global jQuery object.
        factory(jQuery);
    }
}(function ($) {

    // 多語系 base 基本路徑 (最後有斜線) + 多語系
    var baseHref = $('base').attr("href") + $('html').attr('lang') + '/';

    // 預設的 datatable 設定
    var _datatableOptions = {
        "processing": true,
        // 自動調整欄位寬度
        "autoWidth": false,
        // 延遲繪出
        "deferRende": true,
        // 是否顯示分頁資訊
        "info": true,
        // 是否能改變分頁大小
        "lengthChange": true,
        // datatable 畫面排版，參考 http://www.datatables.net/examples/basic_init/dom.html
        //"dom": '<"infoRecordsSelected pull-right">ltrpi', // 預設 lfrtip
        "dom": '<"dataTables_action btn-group pull-right">ltrpi<"clearfix">', // 預設 lfrtip
        // 預設排序
        "order": [],
        // 分頁器的類型
        'pagingType': "full_numbers",
        // 確保排序欄位一定是 thead 的第一個 tr 列
        "orderCellsTop": true,
        // 預設使用的分頁大小
        "pageLength": 10,
        // 分頁大小選單
        "lengthMenu": [
            [1, 10, 25, 50, 100, 4294967295],
            [1, 10, 25, 50, 100, "全部"] // change per page values here
        ],
        // 多語系設定
        "language": {
            "sProcessing": "處理中...",
            "sLengthMenu": "每頁 _MENU_ 筆結果",
            "sZeroRecords": "沒有匹配結果",
            "sInfo": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty": "顯示第 0 至 0 項結果，共 0 項",
            "sInfoRecordsSelected": "已勾選 ( _TOTAL_ 筆 ) 資料列",
            "sInfoFiltered": "(從 _MAX_ 項結果過濾)",
            "sInfoPostFix": "",
            "sSearch": "搜索:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "首頁",
                "sPrevious": "上頁",
                "sNext": "下頁",
                "sLast": "尾頁"
            }
        },
        // datatable 初始化
        'initComplete': function (settings, json) {
            var dt = this;
            var dtApi = dt.api();

            // 追加 DOM 動作按鈕群組
            _initTableBtns(dt);

            // 初始化資料列被選取的處理
            _initRowSelectedHandle(dt);

            // 如果以伺服器方式，再 ajax 之前，要先清空快取
            if (settings.oInit.bServerSide) {
                dt.on('preXhr.dt', function (evt, settings, data) {
                    dtApi.clearPipeline();
                });
            }

            // 初始化過濾器
            _initFilters(dt);

            // 完成初始化，給予
            dt.addClass('initCompleted');
            dt.trigger('initCompleted');
        },
        'preDrawCallback': function (settings) {
            var dt = this;
        },
        'drawCallback': function (settings) {
            var dt = this;
            // 當完成初始化，畫面有刷新時(切換頁碼)，都重新計算選取
            if (dt.hasClass('initCompleted')) {
                _countSelectedRecords(dt);
            }
        },
        'rowCallback': function (row, data) {
            var dt = this;
            var dtApi = dt.api();
            var dtHeader = $(dtApi.table().header());
            var dtBody = $(dtApi.table().body());
            /**
             * uniform 化一些視覺效果
             */
            $("input[type=checkbox]:not(.toggle, .make-switch)", row).uniform();
            $("input[type=radio]:not(.toggle, .star, .make-switch)", row).uniform();
            //
            $("a.image-link", row).magnificPopup({type: 'image'});

            $(row).find('td').each(function (i, td) {
                $(td).data('index', i);
            });
            /**
             * 針對 x-editable 的元素進行設定
             * @param {index} i
             * @param {jQuery Object} a
             */
            $("a.xeditable", row).each(function (i, a) {
                var colIndex = $(a).parent().index();
                var colInfo = $('tr.heading th:eq(' + colIndex + ')', dtHeader);
                $(a).data('pk', data.id);
                $(a).data('name', colInfo.data('column'));

                switch ($(a).data('type')) {
                    case 'select2':
                        var template = {
                            "value": Handlebars.compile((colInfo.data("dropdown-value")) ? colInfo.data("dropdown-value") : ""),
                            "label": Handlebars.compile((colInfo.data("dropdown-label")) ? colInfo.data("dropdown-label") : ""),
                            "group": Handlebars.compile((colInfo.data("dropdown-group")) ? colInfo.data("dropdown-group") : "")
                        };
                        $(a).on('sourceReady', function (evt, source) {
                            var optGroups = _.chain(source).groupBy('group').map(function (opts, optGrpLabel) {
                                var items = [];
                                for (var index in opts) {
                                    items.push(opts[index]);
                                }
                                return {
                                    "text": optGrpLabel,
                                    "children": items
                                };
                            }).value();

                            $(a).editable({
                                "source": optGroups,
                                "ajaxOptions": {
                                    "type": 'put',
                                    "dataType": 'json'
                                },
                                "select2": {
                                    "placeholder": $(a).data('title'),
                                    "dropdownAutoWidth": true,
                                    "allowClear": false,
                                    "multiple": false
                                },
                                "autotext": "always",
                                "display": function (value) {
                                    var val = _.find(source, function (source) {
                                        return (source.id).toString() === (value).toString();
                                    });
                                    if (val && val.text) {
                                        $(this).text(val.text);
                                    }
                                },
                                "success": function (response, newValue) {
                                    dtApi.row(dtBody.find('tr#row_' + data.id)).data(response).draw();
                                }
                            });
                        });
                        if (typeof colInfo.data('dropdown-ajax') === 'string') {
                            $.ajax({
                                "url": baseHref + colInfo.data('dropdown-ajax'),
                                "dataType": "json",
                                "cache": true,
                                "success": function (result, textStatus, jqXHR) {
                                    var options = [];
                                    $(result.data).each(function (i, row) {
                                        options.push({
                                            "id": template.value(row),
                                            "text": template.label(row),
                                            "group": template.group(row)
                                        });
                                    });

                                    $(a).trigger('sourceReady', [options]);
                                }
                            });
                        } else if (typeof colInfo.data('dropdown-options') === 'string') {
                            var result = colInfo.data('dropdown-options').split(',');
                            var options = [];
                            for (var i in result) {
                                var row = result[i];
                                var option = row.split(':');
                                options.push({
                                    "id": option[0] ? option[0] : 'unset',
                                    "text": (option[1]) ? option[1] : option[0],
                                    "group": ""
                                });
                            }
                            $(a).trigger('sourceReady', [options]);
                        }
                        break;
                }
            });
        }
    };
    // =========================================================================
    //   私有函式
    // =========================================================================
    /**
     * 剖析 table 的 thead 欄位資訊
     *
     * @param {DT} dt dataTable() 後的物件
     * @returns {undefined}
     */
    var _initTableBtns = function (dt) {
        var dtApi = dt.api();

        // 注意 table().container() 從版本 1.10.1 才開始支援
        var dtBody = $(dtApi.table().body());
        var dtContainer = (dtApi.table().container instanceof Function) ?
                dtApi.table().container() : $(dtBody.parent().parent());

        var actionBtnGrp = $('.dataTables_action', dtContainer);

        var deleteUrl = config.currentUri + '#delete';
        var exportUrl = config.currentUri + '#export';
        var actionBtn = '';
        actionBtn += '<div class="btn-group btn-group-sm btn-group-selected hidden">';
        actionBtn += '  <button type="button" class="btn btn-default btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">';
        actionBtn += '    已選取 <span class="badge"></span> <span class="caret"></span>';
        actionBtn += '  </button>';
        actionBtn += '  <ul class="dropdown-menu" role="menu" style="right: 0; left: auto;">';
        actionBtn += '    <li><a data-action="delete" href="' + deleteUrl + '">刪除已選取</a></li>';
        actionBtn += '    <li><a data-action="export" href="' + exportUrl + '">匯出已選取</a></li>';
        actionBtn += '    <li class="divider"></li>';
        actionBtn += '    <li><a data-action="delete-all" href="' + deleteUrl + '/all">刪除全部</a></li>';
        actionBtn += '    <li><a data-action="export-all" href="' + exportUrl + '/all">匯出全部</a></li>';
        actionBtn += '  </ul>';
        actionBtn += '</div>';

        var addUrl = config.currentUri + '#add';
        var inportUrl = config.currentUri + '#import';
        var newBtn = '';
        newBtn += '<div class="btn-group btn-group-sm btn-group-create">';
        newBtn += '  <a type="button" class="btn btn-default btn-success" href="' + addUrl + '"><i class="fa fa-plus"></i>&nbsp;新增</a>';
        newBtn += '  <button type="button" class="btn btn-default btn-success dropdown-toggle" data-toggle="dropdown" >';
        newBtn += '    <span class="caret"></span>';
        newBtn += '    <span class="sr-only">Toggle Dropdown</span>';
        newBtn += '  </button>';
        newBtn += '  <ul class="dropdown-menu" role="menu" style="right: 0; left: auto;">';
        newBtn += '    <li><a href="' + inportUrl + '">匯入</a></li>';
        newBtn += '  </ul>';
        newBtn += '</div>';

        if (!$(dtBody).parent().data('readonly')) {
            actionBtnGrp.append(actionBtn).append(newBtn);
        }
    };

    /**
     *
     * @param {type} dt
     * @returns {undefined}
     */
    var _initRowSelectedHandle = function (dt) {
        var dtApi = dt.api();
        var dtTable = $(dtApi.table());
        var dtBody = $(dtApi.table().body());
        var dtHeader = $(dtApi.table().header());
        var dtContainer = (dtApi.table().container instanceof Function) ?
                dtApi.table().container() : $(dtBody.parent().parent());

        // 注意 table().container() 從版本 1.10.1 才開始支援
        // 全選列被勾選後，更新勾選資訊列
        $('.group-checkable', dtHeader).uniform();
        $('.group-checkable', dtHeader).change(function (evt) {
            var set = $('> tr > td:nth-child(1) input[type="checkbox"]', dtBody);
            var checked = $(evt.currentTarget).is(":checked");
            $(set).each(function (i, obj) {
                $(obj).attr("checked", checked);
                $(obj).prop("checked", checked);
                $.uniform.update(obj);
            });
            $.uniform.update($(evt.currentTarget));
            _countSelectedRecords(dt);
        });

        // 點 tr 其它空白處等於是打勾
        dtBody.on('click', '> tr', function (evt) {
            if ($(evt.target).is('td')) {
                $(evt.currentTarget).find('> td:nth-child(1) input[type="checkbox"]').trigger('click');
            }
        });

        // 資料列被勾選後，更新勾選資訊列
        dtBody.on('change', '> tr > td:nth-child(1) input[type="checkbox"]', function (evt) {
            var checkbox = $(evt.currentTarget);
            var tr = checkbox.parent().parent().parent().parent();
            if (checkbox.is(':checked')) {

                tr.addClass('selected');
            } else {
                tr.removeClass('selected');
            }
            $.uniform.update(checkbox);
            _countSelectedRecords(dt);
        });
    };

    /**
     * 計算被選取的 ROW 數量
     * @param {type} dt
     * @returns {undefined}
     */
    var _countSelectedRecords = function (dt) {
        var dtApi = dt.api();

        // 取得由 dataTable() 所產生的元素
        // 注意 table().container() 從版本 1.10.1 才開始支援
        var dtTable = $(dtApi.table());
        var dtBody = $(dtApi.table().body());
        var dtHeader = $(dtApi.table().header());
        var dtContainer = (dtApi.table().container instanceof Function) ?
                dtApi.table().container() : $(dtBody.parent().parent());

        var ids = [];
        var recordsSelected = $('> tr > td:nth-child(1) input[type="checkbox"]:checked', dtBody);
        recordsSelected.each(function (i, checkbox) {
            ids.push($(checkbox).val());
        });
        var selectedSize = recordsSelected.size();
        // 顯示已選取的動作按鈕(並更新刪除連結的 ids)
        var deleteUrl = config.currentUri + '#delete/' + ids.join(',');
        var exportUrl = config.currentUri + '#export/' + ids.join(',');
        var selectedBtnsGrp = $('.btn-group-selected', dtContainer);
        if (selectedSize > 0) {
            selectedBtnsGrp.find('a[data-action="delete"]').attr('href', deleteUrl);
            selectedBtnsGrp.find('a[data-action="export"]').attr('href', exportUrl);
            //
            selectedBtnsGrp.find('button > span.badge').text(selectedSize);
            selectedBtnsGrp.removeClass('hidden');
        } else {
            selectedBtnsGrp.find('button > span.badge').text('');
            selectedBtnsGrp.addClass('hidden');
        }

        // 如果勾選的數量不等於分頁大小，就取消全勾選的狀態
        var checkAll = $('th .group-checkable', dtHeader);
        var pageInfo = dt.dataTable().api().page.info();
        if (selectedSize > 0 && selectedSize === (pageInfo.end - pageInfo.start)) {
            checkAll.prop("checked", 'checked');
            checkAll.attr("checked", 'checked');
            $('tr', dtBody).addClass('selected');
        } else {
            checkAll.prop("checked", false);
            checkAll.removeAttr("checked");
            if (selectedSize === 0) {
                $('tr', dtBody).removeClass('selected');
            }
        }
        $.uniform.update(checkAll);
        // 觸發列被選擇的事件
        $(dt).trigger('selectedChagne', [ids]);
    };
    //----------------------------------------------------------------------
    /**
     * 剖析 table 的 thead 欄位資訊
     *
     * @param table
     * @returns {undefined}
     */
    var _parseFilterData = function (table) {

        var inputFilters = [];
        // 由 HTML 分析追加的欄位
        $('thead > tr.heading > th', table).each(function (index, th) {
            var col = $(th);
            var colIndex = col.index();
            var filterCell = $('thead > tr.filting > td:eq(' + index + ')', table);
            if (col.data('searchable')) {
                switch (col.data('searcher')) {
                    case 'date-range':
                        var input = $('<input />')
                                .data('type', 'date-range');
                        break;
                    case 'range':
                        var input = $('<input />')
                                .data('type', 'range');
                        break;
                    case 'dropdown':
                        var input = $('<select />')
                                .data('type', 'dropdown')
                                .data('ajax', col.data('dropdown-ajax'))
                                .data('options', col.data('dropdown-options'))
                                .data('group', col.data('dropdown-group'))
                                .data('value', col.data('dropdown-value'))
                                .data('label', col.data('dropdown-label'))
                                .data('is-searcher', true);
                        break;
                    case 'text':
                    default:
                        var input = $('<input />')
                                .data('type', 'text');
                        break;
                }
                filterCell.append(input);
                inputFilters.push(input);
                input.addClass('form-control input-filter')
                        .css('width', '100%')
                        .data('index', index)
                        .manainput();
            }

        });
        // 最後補一個清除搜尋條件的按鈕
        var clearSearchBtn = $('<button>重新過濾</button>').addClass('btn btn-sm btn-default');
        clearSearchBtn.on('click', function (evt) {
            for (var i in inputFilters) {
                inputFilters[i].trigger('reset');
            }
        });
        $('thead > tr.filting > td:last', table).append(clearSearchBtn);
    };

    //----------------------------------------------------------------------
    /**
     * 初始化 thead 過濾器的部分
     * @param {DT} dt
     * @returns {undefined}
     */
    var _initFilters = function (dt) {
        var dtApi = dt.api();
        var dtBody = $(dtApi.table().body());
        var dtHeader = $(dtApi.table().header());

        $('tr.filting > td > .input-filter', dtHeader).each(function (i, input) {
            var input = $(input);
            switch (input.data('type')) {
                // 日期範圍
                case 'date-range':
                    input.bind('datepicker-apply', function (evt, obj) {
                        var range = obj.value.split('~');
                        range[0] += ' 00:00:00';
                        range[1] += ' 23:59:59';
                        var val = range.join('~');
                        input.trigger('search', [val]);
                        input.prop('title', obj.value);
                        input.tooltip({
                            "placement": "top"
                        });
                    }).bind('datepicker-clear', function (evt, obj) {
                        input.trigger('reset');
                    }).on('search', function (evt, search, regex, smart, caseInsen) {
                        var dataIdx = dtApi.column.index('fromVisible', input.data('index'));
                        dtApi.dateRangeSearch(dataIdx, search);
                    }).on('reset', function (evt) {
                        input.tooltip('destroy');
                        input.prop('title', '');
                        input.data('dateRangePicker').clear();
                        input.trigger('search', ['']);
                    });
                    break;

                    // 下拉式選單
                case 'dropdown':
                    input.on('change', function (evt) {
                        var val = $(evt.currentTarget).val();
                        if (val !== '') {
                            input.trigger('search', ['^' + val + '$', true, false]);
                        } else {
                            input.trigger('reset');
                        }
                    }).on('search', function (evt, search, regex, smart, caseInsen) {
                        var dataIdx = dtApi.column.index('fromVisible', input.data('index'));
                        dtApi.column(dataIdx).search(search, regex, smart, caseInsen).draw();
                    }).on('reset', function (evt) {
                        input.select2('val', '');
                        input.trigger('search', ['']);
                    });
                    break;

                    // 文字
                case 'text':
                    input.on('keyup', function (evt) {
                        var val = $(evt.currentTarget).val();
                        input.trigger('search', [val]);
                    }).on('search', function (evt, search, regex, smart, caseInsen) {
                        var dataIdx = dtApi.column.index('fromVisible', input.data('index'));
                        dtApi.column(dataIdx).search(search, regex, smart, caseInsen).draw();
                    }).on('reset', function (evt) {
                        input.val('');
                        input.trigger('search', ['']);
                    });
                    break;
            }
        });


    };

    //----------------------------------------------------------------------
    /**
     * 剖析 table 的 thead 欄位資訊
     *
     * @param {jQuery} table
     * @returns {Object} dataTableOptions 中的 ajax 與 serverSide 設定
     */
    var _parseTableData = function (table) {
        var pages = parseInt(table.data('pages'));
        var remoteOptions = {
            "url": baseHref + table.data('ajax'),
            "pages": isNaN(pages) ? 5 : pages, // number of pages to cache
            "data": function (d) {
                var query = _getQueryParams(table.data('query'));
                for (var key in query) {
                    var val = query[key];
                    d[key] = val;
                }
            }
        };
        return {
            "ajax": (table.data('serverside')) ? $.fn.dataTable.pipeline(remoteOptions) : remoteOptions,
            "serverSide": table.data('serverside')
        };
    };

    //----------------------------------------------------------------------
    /**
     * 剖析 table 的 thead 欄位資訊
     *
     * @param {jQuery} table
     * @returns {Object} dataTableOptions 中的 columns 設定
     */
    var _parseTheadData = function (table) {
        // 預設 id 欄位
        var columns = [{
                "data": "id",
                "width": "30px",
                "sortable": false,
                "searchable": false,
                "visible": !config.readonly,
                "defaultContent": '',
                "render": function (data, type, row, meta) {
                    switch (type) {
                        case 'display':
                            return '<input title="#' + data + '" name="id[]" type="checkbox" value="' + data + '" />';
                            break;
                        default:
                            return data;
                    }
                }
            }
        ];
        // 由 HTML 分析追加的欄位
        $('thead > tr.heading > th', table).each(function (index, th) {
            var col = $(th);
            col.data('id', (col.data('column')) ? col.data('column') : 'id');
            col.data('sortable', (col.data('sortable') === false) ? false : true);
            col.data('searchable', (col.data('searchable') === false) ? false : true);
            columns.push({
                "data": col.data('id'),
                "name": col.data('id'),
                "title": col.text(),
                "width": col.prop('width'),
                "defaultContent": '---',
                "sortable": col.data('sortable'),
                "searchable": col.data('searchable'),
                "visible": col.data('visible'),
                "type": col.data('type'),
                "render": function (data, type, row, meta) {
                    if (data === null || (typeof data !== 'string')) {
                        data = '';
                    }
                    var source = '';
                    switch (type) {
                        case 'display':
                            source = (col.data('display')) ? col.data('display') : data;
                            break;
                        case 'sort':
                            source = (col.data('sort')) ? col.data('sort') : data;
                            break;
                        case 'filter':
                            source = (col.data('filter')) ? col.data('filter') : data;
                            break;
                        case 'type':
                            source = data;
                            break;
                        default:
                            source = data;
                    }
                    var template = Handlebars.compile(source);

                    return template(row);
                }
            });
        });
        // 預設動作按鈕群欄位
        columns.push({
            "title": "動作",
            "data": 'id',
            "width": "75px",
            "sortable": false,
            "searchable": false,
            "visible": !config.readonly,
            "render": function (data, type, row, meta) {
                switch (type) {
                    case 'display':
                        var editUrl = location.href.split('#')[0] + '#edit/' + data;
                        var editBtn = '';
                        editBtn += '<a title="#' + data + '" class="btn btn-default btn-sm" href="' + editUrl + '">';
                        editBtn += '    <i class="fa fa-pencil"></i>&nbsp;編輯';
                        editBtn += '</a>';
                        return editBtn;
                        break;
                    default:
                        return data;
                }
            }
        });
        return {
            "columns": columns
        };
    };

    /**
     * 從字串分析欲傳送的 Query 參數
     * @param {type} queryString
     * @returns {Boolean}
     */
    var _getQueryParams = function (queryString) {
        var query = (queryString || window.location.search).substring(1); // delete ?
        if (!query) {
            return false;
        }
        return _.chain(query.split('&'))
                .map(function (params) {
                    var p = params.split('=');
                    return [p[0], decodeURIComponent(p[1])];
                }).object().value();
    };


    /**
     * 定義特殊繪圖器
     * @returns {undefined}
     */
    var _registerHandlebarHelper = function () {


        Handlebars.registerHelper('ifCond', function (v1, operator, v2, options) {
            switch (operator) {
                case '==':
                    return (v1 == v2) ? options.fn(this) : options.inverse(this);
                case '===':
                    return (v1 === v2) ? options.fn(this) : options.inverse(this);
                case '<':
                    return (v1 < v2) ? options.fn(this) : options.inverse(this);
                case '<=':
                    return (v1 <= v2) ? options.fn(this) : options.inverse(this);
                case '>':
                    return (v1 > v2) ? options.fn(this) : options.inverse(this);
                case '>=':
                    return (v1 >= v2) ? options.fn(this) : options.inverse(this);
                case '&&':
                    return (v1 && v2) ? options.fn(this) : options.inverse(this);
                case '||':
                    return (v1 || v2) ? options.fn(this) : options.inverse(this);
                default:
                    return options.inverse(this);
            }
        });

        Handlebars.registerHelper('specs', function (specs, text) {
            var thead = '';
            thead += '<thead>';
            thead += '  <tr>';
            thead += '    <th width="30">圖</th>';
            thead += '    <th>編號</th>';
            thead += '    <th>名稱</th>';
            thead += '    <th>顯示價</th>';
            thead += '    <th>實售價</th>';
            thead += '    <th width="50" style="text-align:right">庫存</th>';
            thead += '  </tr>';
            thead += '</thead>';


            var tbody = '<tbody>';
            if (specs.length) {
                for (var i in specs) {
                    var spec = specs[i];
                    tbody += '<tr>';
                    tbody += '  <td>' + ((spec.image) ? '<a class="image-link" href="' + 'uploads/' + spec.image + '"><i class="fa fa-image"></i><a/>' : '無') + '</td>';
                    tbody += '  <td>' + spec.sku + '</td>';
                    tbody += '  <td>' + spec.name + '</td>';
                    tbody += '  <td>' + spec.show_price + '</td>';
                    tbody += '  <td>' + spec.sale_price + '</td>';
                    tbody += '  <td style="text-align:right">' + spec.stock + '</td>';
                    tbody += '</tr>';
                }
            } else {
                tbody += '<tr><td colspan="6" style="text-align:center;color: #CCC;">尚未設定庫存規格</td></tr>';
            }
            tbody += '</tbody>';
            var table = '<table class="table">' + thead + tbody + '</table>';
            return new Handlebars.SafeString(table);
        });
        Handlebars.registerHelper('dateFormat', function (value, format) {
            return moment(value).format(format);
        });
        Handlebars.registerHelper('htmlEncode', function (value) {
            return $('<div/>').text(value).html();
        });
        Handlebars.registerHelper('htmlDecode', function (value) {
            return $('<div/>').html(value).text();
        });
        Handlebars.registerHelper('tags', function (tags, text) {
            var labels = [];
            for (var i in tags) {
                var tag = tags[i];
                var text = (tag.label) ? tag.label : tag.name;
                var group = tag.group;
                text = (text) ? (text) : tag.title;
                text = (text) ? (text) : tag;
                if(group && group !== '')  {
                    text = group + ' - ' +text;
                }
                labels.push('<span class="label label-default">' + text + '</span>');
            }
            if (labels.length) {
                var html = labels.join("\n");
            } else {
                var html = 'NONE';
            }
            return new Handlebars.SafeString(html);
        });
        Handlebars.registerHelper('gallery', function (photos, text) {
            var gallery = [];
            for (var i in photos) {
                var photo = photos[i];
                var imgSrc = 'uploads/' + photo.filename;
                var imgSrcThumb = 'imagefly/w32-h32-c/uploads/' + photo.filename;
                gallery.push('<a class="image-link" href="' + imgSrc + '"><img src="' + imgSrcThumb + '" alt="' + text + '" title="' + text + '" /></a>');
            }
            if (gallery.length) {
                var html = gallery.join("\n");
            } else {
                var html = 'NONE';
            }
            return new Handlebars.SafeString(html);
        });
        // 圖片
        // @param url 圖片位置
        // @param text 圖片代替文字
        Handlebars.registerHelper('thumbnail', function (url, text) {
            text = Handlebars.Utils.escapeExpression(text);
            url = Handlebars.Utils.escapeExpression(url);

            if (url === "") {
                var imgSrc = '';
                var imgSrcThumb = 'http://fakeimg.pl/64x64/?text=empty';
            } else {
                var ext = url.split('.').pop();
                if (ext === 'svg') {
                    var imgSrc = url;
                    var imgSrcThumb = url;
                    // 是否為外部 URL 連結
                    if (!(/^http:\/\//.test(url)) || !(/^https:\/\//.test(url)))
                    {
                        var imgSrc = 'uploads/' + url;
                        var imgSrcThumb = 'uploads/' + url;
                    }
                } else {
                    // 是否為外部 URL 連結
                    if ((/^http:\/\//.test(url)) || (/^https:\/\//.test(url)))
                    {
                        var imgSrc = url;
                        var imgSrcThumb = 'imagefly/w64-h64-c/' + url.replace("http://", "http:/");
                    } else {
                        var imgSrc = 'uploads/' + url;
                        var imgSrcThumb = 'imagefly/w64-h64-c/uploads/' + url;
                    }
                }
            }
            var bgData = 'data:image/jpg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAAQABADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD7gr3OivDKAP/Z';
            if (imgSrc === '') {
                var result = '<img width="64" height="64" class="thumbnail" style="padding:0;background-image:url(' + bgData + ')" src="' + imgSrcThumb + '" alt="' + text + '" title="' + text + '" />';
            } else {
                var result = ('<a class="image-link" href="' + imgSrc + '"><img width="64" height="64" style="padding:0;background-image:url(' + bgData + ')" class="thumbnail" src="' + imgSrcThumb + '" alt="' + text + '" title="' + text + '" /></a>');
            }

            return new Handlebars.SafeString(result);
        });
        // x-editable 編輯器
        Handlebars.registerHelper('xeditable', function (value, type, url, title) {
            value = Handlebars.Utils.escapeExpression(value);
            type = Handlebars.Utils.escapeExpression(type);
            url = Handlebars.Utils.escapeExpression(url);
            title = Handlebars.Utils.escapeExpression(title);
            var xeditable = '<a class="xeditable" data-type="' + type + '" data-url="' + url + '" data-title="' + title + '" data-value="' + value + '">' + value + '</a>';
            return new Handlebars.SafeString(xeditable);
        });
    };


    //----------------------------------------------------------------------
    /**
     * 初始化
     * @returns {undefined}
     */
    var _init = function () {


    };

    var config;

    //return this.each(_init);

//    };

    var DT;

    var methods = {
        "init": function (options) {
            var table = $(this);

            // 覆寫設定檔
            config = $.extend({
                readonly: false,
                thumbUrl: 'imagefly/w64-h64-c/uploads/',
                currentUri: location.href.split('#')[0]
            }, options);



            _registerHandlebarHelper();

            // 分析表格資料(覆寫 ajax 和 serverSide 設定)
            if (table.data('ajax')) {
                $.extend(_datatableOptions, _parseTableData(table));
            } else {
                $.extend(_datatableOptions, {
                    "ajax": null,
                    "serverSide": false
                });
            }

            // 分析欄位資訊(覆寫 columns 設定)
            $.extend(_datatableOptions, _parseTheadData(table));

            // 追加頭尾預設欄位 ( checkbox 與 action )，並再追加一行過濾器
            table.find('thead > tr.heading').prepend('<th style="width:30px;" data-searchable="false"><input type="checkbox" class="group-checkable" /></th>');
            table.find('thead > tr.heading').append('<th style="width:50px;" data-searchable="false">動作</th>');

            // 過濾器行
            table.find('thead').append('<tr class="filting"></tr>');
            table.find('thead > tr.heading > th').each(function (i, th) {
                table.find('thead > tr.filting').append('<td></td>');
            });

            // 分析欄位過濾器
            _parseFilterData(table);

            // 使用預設排序
            _datatableOptions.order = [];

            // 採用覆寫後的設定檔
            DT = table.dataTable($.extend({}, _datatableOptions));
        },
        "setRows": function (data) {
            var dtApi = DT.api();
            dtApi.clear();
            dtApi.rows.add(data);
            dtApi.draw();
        },
        "removeRow": function (id) {
            var dtApi = DT.api();
            var dtBody = $(dtApi.table().body());
            var ids = [];
            if ($.isArray(id)) {
                var ids = id;
            } else if (typeof id === 'string') {
                var ids = id.split(',');
            }
            for (var i in ids) {
                id = ids[i];
                dtApi.row(dtBody.find('tr#row_' + id)).remove();
            }
            dtApi.draw();
        },
        "updateRow": function (id, data) {
            var dtApi = DT.api();
            var dtBody = $(dtApi.table().body());
            dtApi.row(dtBody.find('tr#row_' + id)).data(data).draw();
        },
        "createRow": function (data) {
            var dtApi = DT.api();
            var dtBody = $(dtApi.table().body());
            dtApi.row.add(data).draw();
        },
        "reload": function (data) {
            var dtApi = DT.api();
            dtApi.ajax.reload();
        }
    };
    $.fn.manatable = function (options) {
        if (methods[options]) {
            var params = Array.prototype.slice.call(arguments, 1);
            return this.each(function () {
                methods[options].apply(this, params);
            });

        } else if (typeof options === 'object' || !options) {
            return this.each(function () {
                methods.init.apply(this, arguments);
            });
        } else {
            $.error('Method ' + options + ' does not exist on jQuery.manaform');
        }
    };

}));