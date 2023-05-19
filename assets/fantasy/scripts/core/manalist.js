(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module depending on jQuery.
        define(['jquery'], factory);
    } else {
        // No AMD. Register plugin with global jQuery object.
        factory(jQuery);
    }
}(function ($) {
    var self = $(this);
    var config;
    /**
     * 為了 ckeditor 用來產生 id 用
     * @returns {String}
     */
    var makeid = function ()
    {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for (var i = 0; i < 5; i++) {
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        return text;
    };

    /**
     * 控制按鈕群組樣版
     * @type type
     */
    var buildCtrlBtnGroup = function () {
        var ctrlBtnGrp = '';
        ctrlBtnGrp += '<td style="width:140px;" class="ctrl-btn-group">';
        ctrlBtnGrp += '    <span class="btn-group btn-group-sm">';
        ctrlBtnGrp += '        <button type="button" class="btn btn-sm btn-success" data-action="add"><i class="fa fa-plus"></i></button>';
        ctrlBtnGrp += '        <button type="button" class="btn btn-sm btn-info" data-action="move-up"><i class="fa fa-arrow-up"></i></button>';
        ctrlBtnGrp += '        <button type="button" class="btn btn-sm btn-info" data-action="move-down"><i class="fa fa-arrow-down"></i></button>';
        ctrlBtnGrp += '        <button type="button" class="btn btn-sm btn-danger" data-action="remove"><i class="fa fa-times"></i></button>';
        ctrlBtnGrp += '    </span>';
        ctrlBtnGrp += '    <h1 class="rank-label" style="font-size: 500%;text-align: center;"></h1>';
        ctrlBtnGrp += '</td>';
        return ctrlBtnGrp;
    };

    var methods = {
        /**
         * 初始化
         * @param {type} options
         * @returns {Boolean}
         */
        "init": function (options) {
            var table = $(this);

            // 建立 thead 用的功能按鈕
            var theadCtrlerBtns = '';
            theadCtrlerBtns += '<th style="width:140px;">';
            theadCtrlerBtns += '    <span>';
            theadCtrlerBtns += '        <button type="button" class="btn btn-sm btn-success" data-action="add"><i class="fa fa-plus"></i></button>';
            //theadCtrlerBtns += '        <button type="button" class="btn btn-sm btn-primary" data-action="add-multi"><i class="fa fa-folder-open-o"></i></button>';
            theadCtrlerBtns += '    </span>';
            theadCtrlerBtns += '</th>';
            theadCtrlerBtns = $(theadCtrlerBtns);
            table.find('thead > tr:first').append(theadCtrlerBtns);
            theadCtrlerBtns.find('button[data-action="add"]').on('click', function () {
                table.find('tbody > tr:first > td > span > button[data-action="add"]').trigger('click', [null, true]);
            });

            // 為樣板列(第一個)追加控制按鈕群
            table.find('tbody > tr:first').append(buildCtrlBtnGroup());
            table.find('tbody > tr:first').css('display', 'none');

            table.find('tbody > tr > td').find('textarea', function (i, textarea) {
                $(textarea).attr('id', makeid);
            });
            // 以 live 模式註冊按鈕群的事件動作
            table.find('tbody > tr > td > span').on('click', 'button[data-action="add"]', function (evt, rowData, prepend) {
                // 反推自己的列元素 span < td < tr
                var selfRow = $(evt.currentTarget).parent().parent().parent();
                // 移動前清洗掉 ckeditor ，不然移動後就死掉了

                // 建立複製體(要連事件註冊也一起複製)
                if (!rowData) {
                    rowData = selfRow.serializeJSON();
                }
                var cloneRow = table.find('tbody > tr:first').clone(true);
                cloneRow.show();
                var index = 0;
                cloneRow.find('input').manainput();
                cloneRow.find('select').manainput();



                for (var prop in rowData) {
                    var val = rowData[prop];
                    // console.log('select[name="' + table.data('name') + '[' + index + '][' + prop + '][]"]');
                    // --- select2 的元件
                    var select2_muli = cloneRow.find('select[name="' + table.data('name') + '[' + index + '][' + prop + '][]"]');
                    if (select2_muli.length) {
                        select2_muli.trigger('set', [val]);
                        select2_muli.on('change input', function (evt) {
                            table.trigger('inputChange');
                        });

                    }
                    // --- checkbox 的元件
                    cloneRow.find('input[type="checkbox"][name="' + table.data('name') + '[' + index + '][' + prop + '][]"]').removeAttr('checked').prop('checked', false);
                    if (val) {
                        $(val.toString().split(',')).each(function (i, value) {
                            var checkbox = cloneRow.find('input[type="checkbox"][name="' + table.data('name') + '[' + index + '][' + prop + '][]"][value="' + value + '"]');
                            if (checkbox.length) {
                                checkbox.prop('checked', true);
                                checkbox.attr('checked', 'checked');
                                checkbox.trigger('set', value);
                                checkbox.on('change input', function (evt) {
                                    table.trigger('inputChange');
                                });
                            }
                        });
                    }

                    // --- radeio 的元件
                    var radio = cloneRow.find('input[type="radio"][name="' + table.data('name') + '[' + index + '][' + prop + ']"][value="' + val + '"]');
                    cloneRow.find('input[type="radio"][name="' + table.data('name') + '[' + index + '][' + prop + ']"]').on('change', function (evt) {
                        table.trigger('inputChange');
                    });
                    if (radio.length) {
                        radio.attr('checked', 'checked').prop('checked', true);
                        radio.trigger('set', val);
                    }
                    // --- 文字區塊的元件
                    var textarea = cloneRow.find('textarea[name="' + table.data('name') + '[' + index + '][' + prop + ']"]');
                    textarea.on('change input', function (evt) {
                        table.trigger('inputChange');
                    });
                    if (textarea.length) {
                        textarea.html(val);
                    }
                    // --- 一般文字元件
                    var input = cloneRow.find('[name="' + table.data('name') + '[' + index + '][' + prop + ']"][type!="radio"][type!="checkbox"]');
                    input.on('change input', function (evt) {
                        table.trigger('inputChange');
                    });
                    if (input.length) {
                        input.trigger('set', [val]);
                    }

                    // ---- 特殊處理之「規格屬性」
                    var isLocked = rowData['is_locked'];
                    
                    if (isLocked && prop === 'attr') {
                        input.attr('readonly', 'readonly');
                        input.prop('readonly', true);
                        input.parent().prev().append('<i class="fa fa-thumb-tack"></i>');
                    } else {
                        input.parent().prev().find('i.fa.fa-thumb-tack').remove();
                    }

                }
                var ckeditor = cloneRow.find('textarea[data-type="ckeditor"]').ckeditor();
                if (ckeditor.editor) {
                    ckeditor.editor.on('key', function () {
                        table.trigger('inputChange');
                    });
                }
                /* ckeditor.editor.on('key', function () {
                 table.trigger('inputChange');
                 });*/
                // 複製體裡面的 textarea 都要有獨立的 id
                cloneRow.find('textarea').each(function (i, txt) {
                    $(txt).attr('id', makeid());
                });
                // 將複製體插入到自己的後面(疑？)
                selfRow.after(cloneRow);

                // 呼叫表單重新計數位置
                table.manalist('refreshIndex');
                table.trigger('manalist.rowAdd', [cloneRow]);
            });
            table.find('tbody > tr > td > span').on('click', 'button[data-action="move-up"]', function (evt) {
                // 反推自己的列元素 span < td < tr
                var selfRow = $(evt.currentTarget).parent().parent().parent();
                // 移動前清洗掉 ckeditor ，不然移動後就死掉了
                var ckeditor = selfRow.find('textarea[data-type="ckeditor"]').ckeditor();
                if (ckeditor.editor) {
                    ckeditor.editor.destroy();
                }
                // 取得上一個元素
                var prevRow = selfRow.prev(':visible');
                // 把自己放在上一個的前面
                prevRow.before(selfRow);
                var ckeditor = selfRow.find('textarea[data-type="ckeditor"]').ckeditor();
                if (ckeditor.editor) {
                    ckeditor.editor.on('key', function () {
                        table.trigger('inputChange');
                    });
                }
                // 呼叫表單重新計數位置
                table.manalist('refreshIndex');
                table.trigger('manalist.rowMoveUp');
            });
            table.find('tbody > tr > td > span').on('click', 'button[data-action="move-down"]', function (evt) {
                // 反推自己的列元素 span < td < tr
                var selfRow = $(evt.currentTarget).parent().parent().parent();
                // 移動前清洗掉 ckeditor ，不然移動後就死掉了
                var ckeditor = selfRow.find('textarea[data-type="ckeditor"]').ckeditor();
                if (ckeditor.editor) {
                    ckeditor.editor.destroy();
                }
                // 取得下一個元素
                var nextRow = selfRow.next(':visible');
                // 把自己放在下一個的後面
                nextRow.after(selfRow);
                var ckeditor = selfRow.find('textarea[data-type="ckeditor"]').ckeditor();
                if (ckeditor.editor) {
                    ckeditor.editor.on('key', function () {
                        table.trigger('inputChange');
                    });
                }
                // 呼叫表單重新計數位置
                table.manalist('refreshIndex');
                table.trigger('manalist.rowMoveDown');
            });
            table.find('tbody > tr > td > span').on('click', 'button[data-action="remove"]', function (evt) {
                // 反推自己的列元素 span < td < tr
                var selfRow = $(evt.currentTarget).parent().parent().parent();
                // 如果戰友都領便當了，就不能自殺
                if (selfRow.siblings().length !== 0) {
                    //selfRow.remove();
                    selfRow.data('visible', false);
                    selfRow.css('display', 'none');
                }
                // 呼叫表單重新計數位置
                table.manalist('refreshIndex');
                table.trigger('manalist.rowRemove');
            });

            table.manalist('refreshIndex');
            table.trigger('Yes,Init');
        },
        "setRow": function (row, data) {

        },
        "reset": function () {
            var table = $(this);
            table.find('tbody > tr:gt(0)').remove();
        },
        "set": function (data) {
            var table = $(this);
            //table.find('tr:gt(0)').remove();
            table.find('tbody > tr:gt(0)').remove();
            var data = data.reverse();
            for (var key in data) {
                var rowData = data[key];
                table.find('tbody > tr:first > td > span > button[data-action="add"]').trigger('click', [rowData]);
            }
        },
        "refreshIndex": function () {
            var table = $(this);
            var showIndex = 1;
            table.find('tbody > tr').each(function (index, tr) {
                var rankInput, idInput, actionInput;
                $(tr).find('input, select, textarea').each(function (key, input) {
                    var nameStr = $(input).prop('name');
                    nameStr = (nameStr) ? nameStr.toString() : '';
                    if (nameStr != '') {
                        var startIndex = nameStr.indexOf("[");
                        var endIndex = nameStr.indexOf("]");
                        var prefixStr = nameStr.slice(0, startIndex);
                        var suffixStr = nameStr.slice(endIndex + 1, nameStr.length);
                        nameStr = prefixStr + '[' + index + ']' + suffixStr;
                        var rankStr = prefixStr + '[' + index + '][rank]';
                        var actionStr = prefixStr + '[' + index + '][action]';
                        var idStr = prefixStr + '[' + index + '][id]';
                        var nameIndex = nameStr.split(' ').join('');
                        $(input).attr('name', nameIndex);
                        $(input).prop('name', nameIndex);
                        // 因為重新命名過，jQuery 有 bug 會消失
                        if ($(input).attr('checked') === 'checked') {
                            $(input).prop('checked', true);
                        }
                        idInput = $(tr).find('input[name="' + idStr + '"]');
                        actionInput = $(tr).find('input[name="' + actionStr + '"]');
                        rankInput = $(tr).find('input[name="' + rankStr + '"]');
                    }
                });
                if (rankInput.length) {
                    rankInput.val(showIndex);
                }
                $(tr).find('h1.rank-label').text(showIndex);

                if (table.hasClass('manalist-mini')) {
                    $(tr).find('h1.rank-label').css('font-size', '22px');
                    $(tr).find('h1.rank-label').css('display', 'inline');
                }

                if ($(tr).css('display') === 'none' || $(tr).data('visible') === false) {
                    $(tr).attr('data-action', 'delete');
                    $(tr).attr('data-showIndex', '');
                    actionInput.val('delete');
                } else if (idInput.val() === '') {
                    $(tr).attr('data-action', 'create');
                    $(tr).attr('data-showIndex', showIndex);
                    showIndex++;
                    actionInput.val('create');
                } else {
                    $(tr).attr('data-action', 'update');
                    $(tr).attr('data-showIndex', showIndex);
                    showIndex++;
                    actionInput.val('update');
                }

                $(tr).attr('data-index', index);


            });

            table.trigger('inputChange');
            table.trigger('manalist.rowRefresh');
        }

    };

    $.fn.manalist = function (options) {
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