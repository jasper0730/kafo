var FantasyExplorer = function () {
    var _multiple;
    // 使用者自訂的回呼函式
    var _callback;
    // 被選取的檔案
    var _pickers;
    // 檔案總管
    var _explorer = $('#file-explorer');
    // 麵包屑
    var _breadcrumb;
    // 檔案表
    var _fileTable;
    // 資料夾樹
    var _folderTree;
    // 進度表
    var _uploadProgress = _explorer.find('div.upload-progress-bar');
    // 檔案上傳器的 SWF 是否準備完成
    var uploadifySWFReady;

    // 多語系 base 基本路徑 (最後有斜線)
    var baseHref = $('meta[name="base-href"]').attr("content");

    var _apiUrl = {
        "list": baseHref + "api/storage/list",
        "mkdir": baseHref + "api/storage/mkdir",
        "move": baseHref + "api/storage/move",
        "rmdir": baseHref + "api/storage/rmdir",
        "unlink": baseHref + "api/storage/unlink"
    };

    var _uploadify = {
        "buttonImage": "assets/fantasy/plugins/uploadify/bootstraup-btn-upload.png",
        "swf": "assets/fantasy/plugins/uploadify/uploadify.swf",
        "uploader": $('base').prop('href') + "api/storage/upload"
    };

    /**
     * 檔案表設定值
     */
    var _fileTableOptions = {
        "autoWidth": true, // 自動調整寬度
        "deferRender": true, // 延遲繪出
        "order": [1, 'asc'], // 預設排序
        "scrollY": "430px", // 固定 thead 的 tbody 高度
        "scrollCollapse": false,
        "paging": false, // 顯示分頁
        "dom": 'ti', // 預設 lfrtip
        // 多語系設定
        "language": {
            "sZeroRecords": "這個資料夾是空的",
            "sInfo": "_TOTAL_ 個項目",
            "sInfoEmpty": "0 個項目"
        },
        "columns": [
            // 檔案完整路徑
            {
                "data": "filepath",
                "width": "30px",
                "sortable": false,
                "defaultContent": '',
                "render": function (data, type, row, meta) {
                    switch (type) {
                        case 'display':
                            return (row.is_dir) ?
                                    '<input name="id[]" type="hidden" value="' + data + '" />' : '<input name="id[]" type="checkbox" class="" value="' + data + '" />';
                            break;
                        default:
                            return data;
                    }
                }
            },
            // 主檔名
            {
                "data": 'basename',
                "sortable": true,
                "orderData": [3, 1],
                "render": function (data, type, row, meta) {
                    switch (type) {
                        case 'display':
                            var icon = (row.is_dir) ? '<i class="fa fa-folder"></i>' : '<i class="fa fa-file-o"></i>';
                            var link = (row.is_dir) ? '<a data-action="open" style="cursor:pointer">' + data + '</a>' : data;
                            return icon + ' ' + link;
                            break;
                        default:
                            return data;
                    }
                }
            },
            // 最後修改日期
            {
                "data": 'modified_at',
                "width": "150px",
                "sortable": true,
                "orderData": [3, 2],
                "render": function (data, type, row, meta) {
                    switch (type) {
                        case 'display':
                            return moment(data).format('YYYY/MM/DD a hh:mm');
                            break;
                        default:
                            return data;
                    }
                }
            },
            // 副檔名(檔案類型)
            {
                "data": 'ext',
                "width": "80px",
                "sortable": true,
                "orderData": [3],
                "render": function (data, type, row, meta) {
                    switch (type) {
                        case 'display':
                            return (row.is_dir) ? '檔案資料夾' : data;
                            break;
                        default:
                            return data;
                    }
                }
            },
            // 檔案大小
            {
                "data": 'size',
                "width": "100px",
                "sortable": true,
                "orderData": [4],
                "render": function (data, type, row, meta) {
                    switch (type) {
                        case 'display':
                            return (row.is_dir) ? '' : _bytesToSize(data);
                            break;
                        default:
                            return data;
                    }
                }
            }
        ],
        'initComplete': function (settings, json) {
            var dt = this;
            var dtApi = dt.api();
            var dtBody = $(dtApi.table().body());
            var dtHeader = $(dtApi.table().header());

            // 全選列被勾選後，更新勾選資訊列
            $('.group-checkable', dtHeader).change(function (evt) {
                var set = $('> tr > td:nth-child(1) input[type="checkbox"]', dtBody);
                var checked = $(evt.currentTarget).is(":checked");
                $(set).each(function (i, obj) {
                    $(obj).attr("checked", checked);
                    $(obj).prop("checked", checked);
                });
                $.uniform.update(set);
                _countSelectedRecords(dt);
            });
            // 資料列被勾選後，更新勾選資訊列
            dtBody.on('change', '> tr > td:nth-child(1) input[type="checkbox"]', function (evt) {
                var ect = $(evt.currentTarget);
                // 是否能多選
                if (!_multiple) {
                    dtBody.find('> tr > td:nth-child(1) input[type="checkbox"]').prop('checked', false);
                    ect.prop('checked', true);
                    $.uniform.update(dtBody.find('> tr > td:nth-child(1) input[type="checkbox"]'));
                }
                _countSelectedRecords(dt);
            });
            // 初始化完成標記
            dt.addClass('initCompleted');
        },
        'rowCallback': function (row, data) {
            /**
             * uniform 化一些視覺效果
             */
            $("input[type=checkbox]:not(.toggle, .make-switch)", row).uniform();
        },
        "drawCallback": function (settings) {
            var dt = this;
            //當完成初始化，執行第一次的選取計算
            //  if (this.hasClass('initComplete')) {
            _countSelectedRecords(dt);
            //}
        }
    };

    // -------------------------------------------------------------------------
    // 區域函式
    // -------------------------------------------------------------------------
    /**
     * 轉換 bytes 為可讀的大小
     * @param {int} bytes
     * @returns {String}
     */
    var _bytesToSize = function (bytes) {
        if (bytes === 0) {
            return '0 Byte';
        }
        var k = 1000;
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        var i = Math.floor(Math.log(bytes) / Math.log(k));
        return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
    };

    /**
     * 取得透過 GET 傳入的參數
     *
     * @param {string} name
     */
    var _getParameterByName = function (name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    };

    /**
     * 計算目前 DT 被選取的資料列
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

        // 收集被選取的資料列
        var recordsSelected = $('> tr > td:nth-child(1) input[type="checkbox"]:checked', dtBody);
        var ids = [];
        recordsSelected.each(function (i, checkbox) {
            ids.push($(checkbox).val());
        });

        // 如果勾選的數量不等於分頁大小，就取消全勾選的狀態
        var checkAll = $('th .group-checkable', dtHeader);
        var pageInfo = dt.dataTable().api().page.info();
        var recordsHidden = $('> tr > td:nth-child(1) input[type="hidden"]', dtBody);
        var vaildSelectedSize = recordsSelected.size() + recordsHidden.size(); // 真正有效的選取數量(雖然資料夾不能選，也要計算進去)
        if (recordsSelected.size() !== 0 && vaildSelectedSize > 0 && vaildSelectedSize === (pageInfo.end - pageInfo.start)) {
            checkAll.prop("checked", 'checked');
        } else {
            checkAll.prop("checked", '');
        }
        // 觸發列被選擇的事件
        $(dt).trigger('selectedChange', [ids]);
        $.uniform.update(checkAll);
    };

    /**
     * 初始化檔案總管
     */
    var _initExplorerModal = function () {

        if (_getParameterByName('CKEditor')) {
            _explorer.addClass('modal-full');
            $('button[data-action="commit"]').text('匯至編輯器');
            _callback = function (pickers) {
                var index = _getParameterByName('CKEditorFuncNum');
                window.opener.CKEDITOR.tools.callFunction(index, "uploads/" + pickers[0]);
                window.close();
            };
        }

        _explorer.modal({
            "backdrop": "static", // 必需點擊關閉按鈕才能關閉
            "show": _getParameterByName('CKEditor') // 初始化時不要顯示出來
        }).on('show.bs.modal', function () {

            if (!_getParameterByName('CKEditor')) {
                // 調整總管視窗適合的樣式表
                _explorer.find('.modal-dialog').css('width', '80%');
                _explorer.find('.modal.modal-full .modal-dialog').css('width', '80%');
                _explorer.find('.modal-body').css('overflow', 'visible');
                _explorer.find('.ui-dialog').css('z-index', '2000');
            }

        }).on('shown.bs.modal', function () {
            // 顯示時，隱藏 HTML 的 scollbar，並重調檔案表的欄位寬度
            // 必需顯示時調整才有效(因為這時候才抓的到寬度)
            $('html').css('overflow-y', 'hidden');
            _fileTable.api().columns.adjust().draw();
        }).on('hidden.bs.modal', function () {
            // 有必要時，顯示 HTML 的 scollbar
            $('html').css('overflow-y', 'auto');
            if (_getParameterByName('CKEditor')) {
                window.close();
            }
        });

    };

    /**
     * 初始化資料夾樹
     */
    var _initFolderTree = function () {
        _explorer.find('div.tree')
                // 新資料夾
                .on('create_node.jstree', function (evt, data) {
                    //console.log('create_node ajax', data);
                    var dirname = data.node.id;
                    var parent = data.node.parent;
                    var ajax_create_node = function () {
                        $.ajax({
                            "type": "POST",
                            "url": _apiUrl.mkdir,
                            "data": {
                                "dirname": dirname
                            },
                            "success": function () {
                                _folderTree.select_node(dirname);
                                _folderTree.edit(dirname);
                            }
                        });
                    };
                    if (data.parent === '#') {
                        ajax_create_node();
                    } else {
                        _folderTree.open_node(parent, function () {
                            ajax_create_node();
                        });
                    }
                })
                // 更新命名
                .on('rename_node.jstree', function (evt, data) {
                    //console.log('rename_node', data);
                    var parent = (data.node.parent === '#') ? '' : data.node.parent;
                    var oldname = [parent, data.old].filter(function (e) {
                        return e;
                    }).join('/');
                    var newname = [parent, data.text].filter(function (e) {
                        return e;
                    }).join('/');
                    $.ajax({
                        "type": "PUT",
                        "url": _apiUrl.move,
                        "beforeSend": function (xhr, opts) {
                            if (oldname === newname) {
                                xhr.abort();
                            }
                        },
                        "data": {
                            "oldname": oldname,
                            "newname": newname
                        },
                        "success": function (result) {
                            _folderTree.set_id(oldname, newname);
                            _folderTree.refresh_node(newname);
                        }
                    });
                })
                // 刪除資料夾
                .on('delete_node.jstree', function (evt, data) {
                    //console.log('delete', data);
                    var dirname = _.str.ltrim(data.node.id, "#/");
                    $.ajax({
                        "type": "DELETE",
                        "url": _apiUrl.rmdir,
                        "data": {
                            "dirname": dirname
                        },
                        "success": function (result) {

                        }
                    });
                })
                // 選擇資料夾
                .on('select_node.jstree', function (evt, data) {
                    var dirname = _.str.ltrim(data.node.id, "#/");
                    dirname = _.str.ltrim(dirname, "#");
                    $.ajax({
                        "url": _apiUrl.list,
                        "data": {
                            "onlydir": false,
                            "dirname": dirname
                        },
                        "success": function (result) {
                            _fileTable.api().clear().rows.add(result).draw();
                        }
                    });
                    // 設定欲上傳的目錄位置，若沒有就空字串(根目錄)
                    if (uploadifySWFReady) {
                        $("#file_upload").uploadify('settings', 'formData', {
                            "dirname": dirname
                        });
                    }
                    // 更新麵包屑
                    var chips = dirname.toString().split('/').filter(function (n) {
                        return n;
                    });
                    $('ol.breadcrumb').find('li:gt(0)').remove();
                    for (var i in chips) {
                        var crumbLabel = chips[i];
                        var crumbLink = chips.slice(0, parseInt(i) + 1).join('/');
                        var li = '<li style="cursor:pointer"><a data-action="open" data-dirname="' + crumbLink + '">' + crumbLabel + '</a></li>';
                        //console.log(i, crumbLabel, crumbLink, li);
                        $('ol.breadcrumb').append(li);
                    }
                    //console.log('chips', chips);
                    // 啟用資料夾功能按鈕
                    $('div.panel-folder').find('a.btn').trigger(evt);

                })
                .jstree({
                    'core': {
                        "multiple": false,
                        "check_callback": true,
                        'data': function (node, callback) {

                            if (node.id === '#') {
                                var dirname = '';
                            } else if (node.parent === '#') {
                                var dirname = node.text;
                            } else {
                                var dirname = node.parent + '/' + node.text;
                            }

                            $.ajax({
                                "url": _apiUrl.list,
                                "data": {
                                    "onlydir": true,
                                    "dirname": (dirname === '#') ? '' : dirname
                                },
                                "success": function (result) {
                                    var nodes = [];
                                    for (var i in result) {
                                        var row = result[i];
                                        nodes.push({
                                            "id": row.filepath,
                                            "parent": (row.dirname === "" || row.dirname == 'uploads') ? "#" : row.dirname,
                                            "text": row.basename,
                                            "children": (row.count_dirs !== 0),
                                            "state": {
                                                "opened": false, // is the node open
                                                "disabled": false, // is the node disabled
                                                "selected": false // is the node selected
                                            },
                                            "li_attr": {}, // attributes for the generated LI node
                                            "a_attr": {}
                                        });
                                    }
                                    //console.log(nodes);
                                    callback.call(this, nodes);
                                }
                            });
                        }
                    },
                    //"plugins": ["contextmenu", "dnd", "unique","state"]
                    "plugins": ["unique", "state"]
                });
        _folderTree = _explorer.find('div.tree').jstree(true);

        // 預設開始根目錄
        _folderTree.trigger('select_node.jstree', [{node: {id: '#'}}]);
    };

    /**
     * 初始化檔案表
     */
    var _initFileTable = function () {
        //  檔案資初始化
        _fileTable = _explorer.find('table').dataTable(_fileTableOptions);
        _fileTable.on('selectedChange', function (evt, selected) {
            $('button[data-action="commit"]').trigger(evt, [selected]);
            $('button[data-action="insert"]').trigger(evt, [selected]);
            $('div.panel-file').find('button[data-action="action"]').trigger(evt, [selected]);
            $('div.panel-file').find('a[data-action="rename"]').trigger(evt, [selected]);
            $('div.panel-file').find('a[data-action="move"]').trigger(evt, [selected]);
            $('div.panel-file').find('a[data-action="unlink"]').trigger(evt, [selected]);
            _pickers = selected;
        });
    };

    /**
     * 初始化工具列功能按鈕
     */
    var _initToolBtns = function () {
        // 取消所有 a.btn 按鈕的連結效果
        _explorer.find('.btn').on('click', function (evt) {
            evt.preventDefault();
        });
        // 麵包屑中點擊資料夾類型連結
        $('ol.breadcrumb').on('click', 'a[data-action="open"]', function (evt) {
            var dirname = $(evt.currentTarget).data('dirname');
            if (dirname === '#') {
                $('div.panel-folder').find('a[data-action="root"]').trigger('click');
            } else {
                _folderTree.deselect_all();
                _folderTree.select_node(dirname);
            }

        });
        // 檔案表中點擊資料夾類型連結
        _fileTable.on('click', 'a[data-action="open"]', function (evt) {
            var parentFolder = _folderTree.get_selected();
            parentFolder = (parentFolder[0]) ? parentFolder[0] : '';
            var text = $(evt.currentTarget).text();
            var openFolder = [parentFolder, text].filter(function (e) {
                return e;
            }).join('/');

            //console.log('open', parentFolder, openFolder);
            if (parentFolder === '') {
                _folderTree.deselect_all();
                _folderTree.select_node(openFolder);
            } else {
                _folderTree.open_node(parentFolder, function () {
                    //console.log('do open node');
                    _folderTree.deselect_all();
                    _folderTree.select_node(openFolder);
                });
            }


        });
        // 確認選取
        $('button[data-action="commit"]').on('click', function () {
            if (_callback instanceof Function) {
                _callback(_pickers);
            }
            _explorer.modal('hide');
        }).on('selectedChange', function (evt, selected) {
            if (selected.length) {
                $(evt.currentTarget).find('span.badge').text(selected.length);
                $(evt.currentTarget).removeAttr('disabled');
            } else {
                $(evt.currentTarget).find('span.badge').text('');
                $(evt.currentTarget).attr('disabled', 'disabled');
            }
        });
        // ---- 資料夾處理 ----
        // 點擊根目錄夾
        $('div.panel-folder').find('a[data-action="root"]').on('click', function (evt) {
            _folderTree.deselect_all();
            _folderTree.trigger('select_node.jstree', [{node: {id: '#'}}]);
        });
        // 建立資料夾
        $('div.panel-folder').find('a[data-action="mkdir"]').on('click', function (evt) {
            // 父層資料夾，若空值就假定為根目錄
            var parentFolder = _folderTree.get_selected();
            parentFolder = (parentFolder[0]) ? parentFolder[0] : '';
            var newFolderName = '新增資料夾';
            var newFolderNode = [parentFolder, newFolderName].filter(function (e) {
                return e;
            }).join('/');
            var i = 1;
            while (_folderTree.get_node(newFolderNode)) {
                newFolderName = '新增資料夾 (' + (i++) + ')';
                newFolderNode = [parentFolder, newFolderName].filter(function (e) {
                    return e;
                }).join('/');
            }
            _folderTree.create_node((parentFolder) ? parentFolder : '#', {"id": newFolderNode, "type": "file", "text": newFolderName});
        }).on('select_node.jstree', function (evt, data) {
            $(evt.currentTarget).removeAttr('disabled');
        });
        // 更名資料夾
        $('div.panel-folder').find('a[data-action="rename"]').on('click', function (evt) {
            var sel = _folderTree.get_selected();
            if (!sel.length) {
                return false;
            }
            sel = sel[0];
            _folderTree.edit(sel);
        }).on('select_node.jstree', function (evt, data) {
            $(evt.currentTarget).removeAttr('disabled');
        });
        // 刪除資料夾
        $('div.panel-folder').find('a[data-action="rmdir"]').on('click', function (evt) {
            var yesOrNo = confirm('確定刪除整個資料夾(包含子資料夾與檔案)？注意：此動作無法復原');
            if (yesOrNo) {
                var sel = _folderTree.get_selected();
                if (!sel.length) {
                    return false;
                }
                _folderTree.delete_node(sel);
            }
        }).on('select_node.jstree', function (evt, data) {
            $(evt.currentTarget).removeAttr('disabled');
        });
        // ---- 檔案處理 ----
        // 檔案動作
        $('button[data-action="action"]').on('selectedChange', function (evt, selected) {
            if (selected.length) {
                $(evt.currentTarget).find('span.badge').text(selected.length);
                $(evt.currentTarget).removeAttr('disabled');
            } else {
                $(evt.currentTarget).find('span.badge').text('');
                $(evt.currentTarget).attr('disabled', 'disabled');
            }
        });
        // 更名檔案
        $('div.panel-file').find('a[data-action="rename"]').on('click', function (evt) {
            var yesOrNo = confirm('確定更名檔案的檔案？(' + _pickers.length + ')');
            if (yesOrNo) {
                //console.log(_pickers);
            }
        });
        // 移動檔案
        $('div.panel-file').find('a[data-action="move"]').on('click', function (evt) {
            var yesOrNo = confirm('確定刪除選取的檔案？(' + _pickers.length + ')');
            if (yesOrNo) {
                //console.log(_pickers);
            }
        });
        // 刪除檔案
        $('div.panel-file').find('a[data-action="unlink"]').on('click', function (evt) {
            var yesOrNo = confirm('確定刪除選取的檔案？(' + _pickers.length + ')');
            if (yesOrNo) {
                for (var index in _pickers) {
                    var filename = _pickers[index];
                    var sel = _folderTree.get_selected();
                    $.ajax({
                        "type": "DELETE",
                        "url": _apiUrl.unlink,
                        "data": {
                            "filename": filename
                        },
                        "success": function () {
                            // console.log(filename, '已刪除', sel);
                            _folderTree.trigger('select_node.jstree', [{node: {id: sel[0]}}]);
                        }
                    });
                }
            }
        });
    };
    /**
     * 初始化檔案上傳按鈕
     */
    var _initUploadifyBtn = function () {
        // 上傳按鈕

        var _queueTotalCount = 0; // 計數欲上傳的檔案總數
        var _queueCompletedCount = 0; // 已完成的檔案數

        $("#file_upload").uploadify({
            'buttonText': '<i class="fa fa-upload"></i> 上傳檔案',
            'buttonClass': 'btn btn-uploadify',
            'buttonImage': _uploadify.buttonImage,
            'width': 90,
            'height': 30,
            'queueID': 'upload-progress',
            'swf': _uploadify.swf,
            'uploader': _uploadify.uploader,
            'onSWFReady': function () {
                $("#file_upload").find('.btn-uploadify').css('border', 0);
                uploadifySWFReady = true;
            },
            'onSelect': function (file) {
                _queueTotalCount++;
            },
            'onUploadStart': function (file) {
                _uploadProgress.find('div.progress.info').find('span.total').text(_queueTotalCount);
            },
            'onUploadProgress': function (file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
                //console.log(file);
                var value = Math.round((bytesUploaded / bytesTotal) * 100);
                var show = file.name + ' (' + value + '%)';
                _uploadProgress.find('div.uploading').find('.progress-bar').text(show);
                var value = Math.round((bytesUploaded / bytesTotal) * 100);
                _uploadProgress.find('div.uploading').find('.progress-bar').css('width', value + '%').attr('aria-valuenow', value);
            },
            'onUploadComplete': function (file) {
                _queueCompletedCount++;
                _uploadProgress.find('div.info').find('span.completed').text(_queueCompletedCount);
                var value = Math.round((_queueCompletedCount / _queueTotalCount) * 100);
                //console.log(_queueCompletedCount, '/', _queueTotalCount, value);
                _uploadProgress.find('div.info').find('.progress-bar').css('width', value + '%').attr('aria-valuenow', value);
            },
            'onDialogClose': function (queueData) {
                if (queueData.filesSelected) {
                    _uploadProgress.fadeIn(0, function () {
                        _uploadProgress.find('div.uploading').find('.progress-bar').addClass('progress-bar-success').removeClass('progress-bar-danger');
                        _uploadProgress.find('div.uploading').find('.progress-bar').text(0);
                        _uploadProgress.find('div.info').find('.progress-bar').addClass('progress-bar-info').removeClass('progress-bar-warning');
                        _uploadProgress.find('div.info').find('span.completed').text(0);
                    });
                }
            },
            'onUploadError': function (file, errorCode, errorMsg, errorString) {
                _uploadProgress.find('div.uploading').find('.progress-bar').removeClass('progress-bar-success').addClass('progress-bar-danger');
                _uploadProgress.find('div.info').find('.progress-bar').removeClass('progress-bar-info').addClass('progress-bar-warning');
            },
            'onDialogOpen': function (queueData) {
                _queueTotalCount = 0;
                _queueCompletedCount = 0;
            },
            'onQueueComplete': function (queueData) {
                var node = _folderTree.get_selected();
                _folderTree.trigger('select_node.jstree', [{node: {id: node[0]}}]);
                _uploadProgress.fadeOut(3000, function () {

                });
            }
        });
    };
    // -------------------------------------------------------------------------
    //  公開函式
    // -------------------------------------------------------------------------
    return {
        /**
         * 初始化
         */
        init: function () {

            // 設定日期函式的語系使用正體中文
            moment.lang('zh-TW');


            _initExplorerModal();

            _initFileTable();

            _initFolderTree();

            _initUploadifyBtn();

            _initToolBtns();

        },
        /**
         * 開啟檔案瀏覽器
         *
         * @param {function} callback 當圖片被選取確認後的回呼函式
         * @param {boolean} multiple 是否為可多選
         * @param {string} allowExt 允許的副檔名類型。使用「|」做分隔 jpg|gif|txt
         * @returns {undefined}
         */
        open: function (callback, multiple, allowExt) {
            _callback = callback;
            _multiple = multiple;
            //console.log('可否多選', multiple, '有效副檔名', allowExt);
            _explorer.modal('show');
        }
    };
}();
