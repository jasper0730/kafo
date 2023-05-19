define([
    "jquery",
    "underscore",
    "backbone"
], function ($, _, Backbone) {

    // 多語系 base 基本路徑(最後有斜線)
    var baseHref = $('meta[name="base-href"]').attr("content");

    var AppRouter = Backbone.Router.extend({
        "routes": {
            // 資料列表
            '': 'list',
            'list': 'list',
            // 資料編輯
            'add': 'add',
            'add/:id': 'add',
            'edit': 'add',
            'edit/:id': 'edit',
            // 資料儲存
            'save': 'save',
            // 資料刪除
            'delete': 'delete',
            'delete/:id': 'delete',
            'delete/all': 'deleteAll',
            // 資料匯入/匯出
            'import': 'developing',
            'export/:id': 'developing',
            'export/all': 'developing',
            // 電子報
            'save-preview': 'saveAndPreview',
            'publish': 'publish',
            'publish-test': 'publishTest'
        }
    });

    var initialize = function () {
        //----------------------------------------------------------------------
        /**
         * 初始動作
         */
        // 建立路由器
        var app_router = new AppRouter;
        // 定義「列表」與「表單群」兩大面版
        var panelTable = $('div[data-panel="table"]');
        var panelForms = $('div[data-panel="forms"]');
        // 先 manainput 化資料面版中的 manainput 元素，當有異動時，啟用 save 按鈕
        panelForms.find('.manainput').manainput();
        panelForms.find('.manainput').on('change input keyup keypress', function (evt) {
            panelForms.find('a[data-action="save"]').removeAttr('disabled');
            panelForms.find('a[data-action="save"]').prop('disabled', false);
        });
        panelForms.find('table.manalist').on('inputChange', function (evt) {
            panelForms.find('a[data-action="save"]').removeAttr('disabled');
            panelForms.find('a[data-action="save"]').prop('disabled', false);
        });
        // 當資料有異動時，返回動作之前要詢問一下使用者
        panelForms.find('a[data-action="back"]').on('click', function (evt) {
            evt.preventDefault();
            if (panelForms.find('a[data-action="save"]').prop('disabled') === false) {
                jConfirm('有些資料已經異動過，確定不儲存返回嗎？', '系統提醒', function (r) {
                    if (r === true) {
                        //
                        location.href = location.href.split("#")[0] + '#list';
                    }
                });
            } else {
                location.href = location.href.split("#")[0] + '#list';
            }
        });
        //
        $.alerts.overlayColor = '#333';
        $.alerts.overlayOpacity = 0.25;
        $.alerts.okButton = '&nbsp;確定&nbsp;';
        $.alerts.cancelButton = '&nbsp;取消&nbsp;';
        //
        // 初始化分類樹資料
        if (typeof initJqTree === 'function') {
            initJqTree();
        }
        if (typeof loadJqTreeData === 'function') {
            loadJqTreeData();
        }
        //----------------------------------------------------------------------
        /**
         * 發佈電子報(測試)
         */
        app_router.on('route:publishTest ', function () {
            var formData = panelForms.find('form').serializeJSON();
            $.ajax({
                "url": baseHref + "api/newspaper/subscriber_count?test=true",
                "type": "GET",
                "async": "false",
                "dataType": "json",
                "success": function (response) {
                    if(response.count === 0) {
                        jAlert('沒有訂閱者','系統訊息', function(){
                            return false;
                        });
                        return false;
                    }

                    jConfirm('將發送電子報(測試)，共 ' + response.count + ' 位訂閱者，確定發送嗎？', '系統訊息', function (r) {
                        if (r) {
                            $.ajax({
                                "url": baseHref + "api/newspaper/publish",
                                "data": {
                                    "id": formData.id,
                                    "test": true
                                },
                                "async": "false",
                                "type": "POST",
                                "beforeSend": function (jqXHR, settings) {
                                    $.blockUI({css: {
                                            'border': 'none',
                                            'padding': '15px',
                                            'backgroundColor': '#000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            'opacity': .5,
                                            'color': '#fff'
                                        }});
                                },
                                "success": function (result) {
                                    if (result.id && result.message) {
                                        $().toastmessage('showSuccessToast', '電子報(測試)已發送');
                                        location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                                    } else {
                                        $().toastmessage('showErrorToast', '電子報發送失敗:' + result.message);
                                    }
                                },
                                "error": function (jqXHR, textStatus, errorThrown) {
                                    $().toastmessage('showErrorToast', errorThrown);
                                    location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                                },
                                "complete": function () {
                                    $.unblockUI();
                                }
                            });
                        } else {
                            $().toastmessage('showNoticeToast', '發佈動作已取消');
                            location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                        }
                    });
                },
                "error": function () {
                    $().toastmessage('showErrorToast', '無法確認訂閱者數目');
                    location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                }
            });
        });
        //----------------------------------------------------------------------
        /**
         * 發佈電子報(正式)
         */
        app_router.on('route:publish', function () {
            var formData = panelForms.find('form').serializeJSON();
            $.ajax({
                "url": baseHref + "api/newspaper/subscriber_count",
                "type": "GET",
                "async": "false",
                "dataType": "json",
                "success": function (response) {
                    if(response.count === 0) {
                        jAlert('沒有訂閱者','系統訊息', function(){
                            return false;
                        });
                        return false;
                    }
                    jConfirm('將發送電子報，共 ' + response.count + ' 位訂閱者，確定發送嗎？', '系統訊息', function (r) {
                        if (r) {
                            $.ajax({
                                "url": baseHref + "api/newspaper/publish",
                                "data": {
                                    "id": formData.id
                                },
                                "async": "false",
                                "type": "POST",
                                "beforeSend": function (jqXHR, settings) {
                                    $.blockUI({css: {
                                            'border': 'none',
                                            'padding': '15px',
                                            'backgroundColor': '#000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            'opacity': .5,
                                            'color': '#fff'
                                        }});
                                },
                                "success": function (result) {
                                    if (result.id && result.message) {
                                        $().toastmessage('showSuccessToast', '電子報(測試)已發送');
                                        location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                                    } else {
                                        $().toastmessage('showErrorToast', '電子報發送失敗:' + result.message);
                                    }
                                },
                                "error": function (jqXHR, textStatus, errorThrown) {
                                    $().toastmessage('showErrorToast', errorThrown);
                                    location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                                },
                                "complete": function () {
                                    $.unblockUI();
                                }
                            });
                        } else {
                            $().toastmessage('showNoticeToast', '發佈動作已取消');
                            location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                        }
                    });
                },
                "error": function () {
                    $().toastmessage('showErrorToast', '無法確認訂閱者數目');
                    location.href = location.href.split("#")[0] + '#edit/' + formData.id;
                }
            });
        });
        //----------------------------------------------------------------------
        /**
         * 儲存後預覽
         */
        app_router.on('route:saveAndPreview ', function () {
            var formData = panelForms.find('form').serializeJSON();
            var goPreview = function () {
                window.open("home/newspaper?newspaper_id=" + formData.id, "_blank");
            };
            app_router.trigger('route:save', [goPreview]);
        });
        //----------------------------------------------------------------------
        /**
         * 開發中
         */
        app_router.on('route:developing ', function () {
            $().toastmessage('showWarningToast', "功能開發中");
            location.href = location.href.split("#")[0] + '#list';
        });
        //----------------------------------------------------------------------
        /**
         * 列表
         */
        app_router.on('route:list', function () {
            // 顯示資料列表
            panelTable.css('display', 'block');
            // 停用 save 按鈕並隱藏資料列表
            panelForms.find('a[data-action="save"]').attr('disabled', 'disabled');
            panelForms.find('a[data-action="save"]').prop('disabled', true);
            panelForms.css('display', 'none');
            // 改變副標題
            $('h3.page-header > small').text('資料列表');

        });
        //----------------------------------------------------------------------
        /**
         * 儲存
         */
        app_router.on('route:save', function (evt, callback) {

            if (!panelForms.is(':visible')) {
                $().toastmessage('showWarningToast', "無法取得儲存資料");
                location.href = location.href.split("#")[0] + '#list';
                return false;
            }
            // 收集所有 forms 的資料，收集之前，移除 .template 的部分
            panelForms.find('tfoot.template').remove();
            var saveData = panelForms.find('form').serializeJSON();

            // 如果 select 型資料不在 saveData 陣列中，至少要給個 null
            // 此段在修復透過樞紐儲存時無法清空的問題(因為沒有傳屬性值
            // 所以無動作，故這邊補個 null 給他，至少有東西傳到 Server)
            panelForms.find('form').find('select').each(function (i, select) {
                var re = /\[\]/g;
                var propName = $(select).prop('name').replace(re, "");
                if (!saveData.hasOwnProperty(propName)) {
                    saveData[propName] = null;
                }
            });

            // 決定是新增(CREATE)還是儲存(SAVE)
            var method = 'POST';
            if (saveData.id) {
                method = 'PUT';
            } else {
                delete saveData.id;
            }
            // 送出儲存資料
            $.ajax({
                "url": baseHref + panelForms.data('ajax'),
                "type": method,
                "data": saveData,
                "dataType": "json",
                "beforeSend": function (jqXHR, settings) {
                    $.blockUI({css: {
                            'border': 'none',
                            'padding': '15px',
                            'backgroundColor': '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            'opacity': .5,
                            'color': '#fff'
                        }});
                },
                "success": function (data, textStatus, jqXHR) {
                    // 停用 save 按鈕
                    panelForms.find('a[data-action="save"]').attr('disabled', 'disabled');
                    panelForms.find('a[data-action="save"]').prop('disabled', true);
                    $().toastmessage('showSuccessToast', '儲存成功');
                    // !!! 特殊情況 !!! (密碼修改)
                    if (saveData.password && '' !== saveData.password && 'PUT' === method) {
                        $().toastmessage('showToast', {
                            text: '密碼已重新設定',
                            sticky: true,
                            type: 'notice'
                        });
                    }
                    // !!! 特殊情況 !!! (清除上傳了一些最後沒用到的檔案)
                    panelForms.find('input[data-type="photo"]').trigger('clean');

                    if (saveData.id) {
                        panelTable.find('table.matatable').manatable('updateRow', data.id, data);
                        // 更新分類樹資料(僅需要更新被異動的那筆
                        if (typeof updateJqTreeData === 'function') {
                            updateJqTreeData(data);
                        }
                    } else {
                        panelTable.find('table.matatable').manatable('createRow', data);
                        //更新分類樹資料(僅需要更新被異動的那筆
                        if (typeof createJqTreeData === 'function') {
                            createJqTreeData(data);
                        }
                    }

                    location.href = location.href.split("#")[0] + '#edit/' + data.id;
                },
                "error": function (jqXHR, textStatus, errorThrown) {
                    $().toastmessage('showErrorToast', errorThrown);
                    location.href = location.href.split("#")[0] + '#edit/' + saveData.id;
                },
                "complete": function () {
                    var callback = (evt && evt[0]) ? evt[0] : null;
                    if (typeof callback === "function") {
                        callback();
                    }
                    $.unblockUI();
                }
            });
        });

        //----------------------------------------------------------------------
        /**
         * 新增
         */
        app_router.on('route:add', function (id) {

            // 重設表單群所有 input
            panelForms.find('.manainput').trigger('reset');
            // 隱藏資料列表
            panelTable.css('display', 'none');
            // 隱藏資料表單中的刪除按鈕
            panelForms.find('a[data-action="delete"]').css('display', 'none');
            // 改變資料表單偖存按鈕的文字，從 Save 變成 Create
            panelForms.find('a[data-action="save"] > span').text('Create');
            // 改變副標題
            $('h3.page-header > small').text('資料新增');
            // !!! 特殊情況 !!! (帳號和 Email 可新增)
            panelForms.find('input[data-created-only="true"]')
                    .removeAttr('readonly');
            // 清空一對多的表單
            panelForms.find('table.manalist').find('tbody > tr:gt(0)').remove();

            // 顯示資料表單
            panelForms.css('display', 'block');

            console.log('add', id);
            //
            $('select[name="parent_id"]').select2('val', id);

        });
        //----------------------------------------------------------------------
        /**
         * 編輯
         * @param {int} id 欲編輯的識別碼
         */

        app_router.on('route:edit', function (id) {
            if (isNaN(id)) {
                $().toastmessage('showWarningToast', "無效的資料識別碼: " + id);
                location.href = location.href.split("#")[0] + '#list';
                return false;
            }
            // !!! 特殊情況 !!! (帳號和 Email 不可修改)
            panelForms.find('input[data-created-only="true"]')
                    .attr('readonly', 'readonly');

            $.ajax({
                "url": baseHref + panelForms.data('ajax'),
                "type": "GET",
                "data": {
                    "id": id
                },
                "dataType": "json",
                "success": function (data, textStatus, jqXHR) {
                    // 如果是密碼欄位，需要先清空
                    panelForms.find('input:password').trigger('reset');

                    for (var name in data) {
                        var val = data[name];

                        if (typeof val === 'object' && $.isArray(val) === false) {
                            for (var prop in val) {
                                var v = val[prop];
                                var input = panelForms.find('.manainput[name="' + name + '[' + prop + ']"]');
                                input.trigger('set', [v]);
                            }
                        } else {
                            var input = panelForms.find('.manainput[name="' + name + '"]');
                            if (!input.length) {
                                input = panelForms.find('.manainput[name="' + name + '[]"]');
                            }
                            if ($.isArray(val)) {
                                // 頁籤子資料處理(丟給 manalist.js 自行處分)
                                panelForms.find('table.manalist[data-name="' + name + '"]').manalist('set', val);
                                val = _.pluck(val, "id");
                            }
                            input.trigger('set', [val]);
                        }
                        // 設定同名純資料顯示的 table 列表
                        var subTable = panelForms.find('table[name="' + name + '"].manatable');
                        if (subTable.length) {
                            var subData = val;
                            subTable.manatable('setRows', subData);
                        }
                    }

                    // 處理 handlebar 區塊
                    panelForms.find('.handlebar').each(function (i, el) {
                        if (!$(el).data('template')) {
                            $(el).data('template', $(el).html());
                        }
                        var elTemp = Handlebars.compile($(el).data('template'));

                        $(el).html(elTemp(data));
                        $(el).find('input[type="text"], textarea').on('keyup', function () {
                            panelForms.find('.manainput').trigger('change');
                        });
                        $(el).find('select, input[type="radio"], input[type="checkbox"]').on('change', function () {
                            panelForms.find('.manainput').trigger('change');
                        });
                    });
                    panelForms.find('.handlebar-template').each(function (i, el) {
                        var tmp = $($(el).data('template-target')).html();
                        var elTemp = Handlebars.compile(tmp);
                        $(el).html(elTemp(data));
                        $(el).find('input[type="text"], textarea').on('keyup', function () {
                            panelForms.find('.manainput').trigger('change');
                        });
                        $(el).find('select, input[type="radio"], input[type="checkbox"]').on('change', function () {
                            panelForms.find('.manainput').trigger('change');
                        });
                    });

                    $("a.image-link", panelForms).magnificPopup({type: 'image'});

                    // 隱藏資料列表
                    panelTable.css('display', 'none');
                    // 顯示資料表單中的刪除按鈕
                    panelForms.find('a[data-action="delete"]').css('display', 'block');
                    // 改變資料表單儲存按鈕的文字為 Save
                    panelForms.find('a[data-action="save"] > span').text('Save');
                    // 改變資料表單刪除按鈕的連結位置
                    panelForms.find('a[data-action="delete"]').prop('href', location.href.split("#")[0] + '#delete/' + id);
                    // 改變副標題
                    $('h3.page-header > small').text('資料編輯 #' + id);
                    // 顯示資料表單
                    panelForms.css('display', 'block');
                    // 停用 save 按鈕
                    panelForms.find('a[data-action="save"]').attr('disabled', 'disabled');
                    panelForms.find('a[data-action="save"]').prop('disabled', true);


                    $('#again').manainput();
                },
                "error": function (jqXHR, textStatus, errorThrown) {
                    $().toastmessage('showErrorToast', errorThrown);
                    location.href = location.href.split("#")[0] + '#list';
                }
            });
        });
        //----------------------------------------------------------------------
        /**
         * 刪除
         * @param {int} id 刪除的識別碼，可以是逗號隔開的識別碼字串
         */
        app_router.on('route:delete', function (id) {
            // 取得欲刪除的 ids (可能為多個，以逗號隔開)
            var ids = (id) ? id.toString().split(',') : [];
            // 如果沒有指定 ids ，退回至列資料列表
            if (!ids.length) {
                $().toastmessage('showWarningToast', "沒有指定任何欲刪除的 id");
                location.href = location.href.split("#")[0] + '#list';
                return false;
            }
            // 檢查每個 ids 是否為數字，若不是就移除
            ids = $.grep(ids, function (value) {
                return isNaN(value) !== true;
            });
            // 詢問刪除意願
            jConfirm('將會刪除所選取的資料，確定嗎？ ( ' + ids.length + ' 筆)', '系統提醒', function (r) {
                if (r) {
                    $.ajax({
                        "url": baseHref + panelForms.data('ajax'),
                        "type": "DELETE",
                        "dataType": "json",
                        "data": {
                            "id": ids.join(',')
                        },
                        "success": function (data, textStatus, jqXHR) {
                            // 更新對應 id 的主資料列表(可接受 ids 陣列，或是 ids 字串)
                            panelTable.find('table').manatable('removeRow', ids);
                            $().toastmessage('showSuccessToast', "資料已刪除");

                        },
                        "error": function (jqXHR, textStatus, errorThrown) {
                            $().toastmessage('showErrorToast', errorThrown);
                        },
                        "complete": function (jqXHR, textStatus) {
                            location.href = location.href.split("#")[0] + '#list';
                        }
                    });
                } else {
                    $().toastmessage('showNoticeToast', '刪除動作已取消');
                    if (ids.length === 1 && panelForms.is(':visible')) {
                        location.href = location.href.split("#")[0] + '#edit/' + ids[0];
                    } else {
                        location.href = location.href.split("#")[0] + '#list';
                    }
                }
            });
        });
        /**
         * 刪除全部
         */
        app_router.on('route:deleteAll', function () {
            var query = confirm('注意！接下來動作將會刪除此列表「所有資料」，確定嗎？ ');
            if (query) {
                var queryAgain = confirm('再次確認。刪除所有資料嗎？');
                if (queryAgain) {

                }
            }
        });
        Backbone.history.start();


    };
    return {
        "initialize": initialize
    };
});