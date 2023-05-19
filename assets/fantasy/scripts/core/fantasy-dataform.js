var FantasyDataform = function() {

    var _formRegion; // form 區塊
    var _formBody; // form 主體

    // -------------------------------------------------------------------------

    /**
     * 表單控制器（input）繪出器
     * @type type
     */
    var _formControlRender = {
        "colorPicker": function(ctrl) {
            ctrl.wrap('<div class="input-group"></div>');
            ctrl.before('<span class="input-group-addon"><i></i></span>');
            ctrl.parent().colorpicker({
                "format": "hex"
            });
            ctrl.addClass('inited');
            ctrl.parent().colorpicker('setValue', '');
        },
        "photoPicker": function(ctrl) {
            var w = (ctrl.data('width')) ? ctrl.data('width') : 200;
            var h = (ctrl.data('height')) ? ctrl.data('height') : 150;
            w = isNaN(w) ? 200 : w;
            h = isNaN(h) ? 150 : h;
            var picker = '';
            picker += '<span class="fileinput">';
            picker += '    <a class="btn btn-default" style="padding:2px;position: relative;">';
            picker += '        <span class="btn btn-default img-reset" title="移除此圖片" style="padding: 0;display:none;color:red;position: absolute; top: 0; right: 0">';
            picker += '            <i class="fa fa-times"></i>';
            picker += '        </span>';
            picker += '        <img data-toggle="tooltip" data-placement="top" width="' + w + '" height="' + h + '" src="http://fakeimg.pl/' + w + 'x' + h + '?text=PHOTO" alt="" title="" />';
            picker += '    </a>';
            picker += '</span>';
            picker = $(picker);
            ctrl.on('refresh', function(evt) {
                // 如果值為空值，使用預設圖
                if (ctrl.val() === '') {
                    picker.find('img').prop('src', 'http://fakeimg.pl/' + w + 'x' + h + '?text=PHOTO');
                    picker.find('img').prop('title', '點擊開啟圖庫瀏覽器');
                    picker.find('span.img-reset').hide();
                    picker.find('a').addClass('explorer-open');
                    picker.find('a').magnificPopup({
                        'type': 'image',
                        disableOn: function() {
                            return false;
                        }
                    });
                } else {
                    if ((/^http:\/\//.test(ctrl.val())) || (/^https:\/\//.test(ctrl.val())))
                    {
                        var imgSrc = ctrl.val();
                        var imgSrcBig = ctrl.val();
                    } else {
                        var imgSrc = 'imagefly/w' + w + '-h' + h + '-c/uploads/' + ctrl.val();
                        var imgSrcBig = 'imagefly/w1024-h768-c/uploads/' + ctrl.val();
                    }
                    picker.find('img').prop('src', imgSrc);
                    picker.find('img').prop('title', ctrl.val());
                    picker.find('img').data('toggle', ctrl.val());
                    picker.find('img').parent().prop('href', imgSrcBig);
                    picker.find('span.img-reset').show();
                    picker.find('a').removeClass('explorer-open');
                    picker.find('a').magnificPopup({
                        'type': 'image',
                        disableOn: function() {
                            return true;
                        }
                    });
                }
            });
            // 移除當前設定的圖片路徑
            picker.find('span.img-reset').on('click', function(evt) {
                evt.stopPropagation();
                evt.preventDefault();
                $(evt.currentTarget).parent().removeClass('fancybox');
                ctrl.val('');
                ctrl.trigger('refresh');
            });
            // 開啟圖片選擇視窗
            picker.on('click', 'a.explorer-open', function(evt) {
                console.log($(evt.currentTarget));
                evt.preventDefault();
                FantasyExplorer.open(function(pickers) {
                    var path = pickers[0];
                    //透過瀏覽器取得的圖片路徑
                    ctrl.val(path);
                    ctrl.trigger('refresh');
                }, false);

            });


            ctrl.before(picker);
            ctrl.addClass('inited');
            ctrl.attr('readonly', 'readonly');
            if (ctrl.val() != '') {
                ctrl.trigger('refresh');
            }
            ctrl.hide();
        },
        "filePicker": function(ctrl) {
            var picker = '';
            picker += '<div class="input-group-btn">';
            picker += '    <button type="button" class="btn default explorer-open" tabindex="-1">選擇檔案</button>';
            picker += '    <button type="button" class="btn red file-reset" style="display:none;">';
            picker += '        <i class="fa fa-times"></i>';
            picker += '    </button>';
            picker += '</div>';
            picker = $(picker);
            ctrl.on('refresh', function(evt) {
                if (ctrl.val() === '') {
                    picker.find('button.file-reset').hide();
                } else {
                    picker.find('button.file-reset').show();
                }
            });
            // 移除當前設定的檔案路徑
            picker.find('button.file-reset').on('click', function(evt) {
                ctrl.val('');
                ctrl.trigger('refresh');
            });
            // 開啟檔案選擇視窗
            picker.find('button.explorer-open').on('click', function(evt) {
                FantasyExplorer.open(function(pickers) {
                    ctrl.val(pickers[0]);
                    ctrl.trigger('refresh');
                }, false);
            });
            ctrl.wrap('<div class="input-group"></div>');
            ctrl.before(picker);
            ctrl.trigger('refresh');
            ctrl.addClass('inited');
            ctrl.attr('readonly', 'readonly');
        },
        "imagePicker": function(ctrl) {
            var w = (ctrl.data('width')) ? ctrl.data('width') : 200;
            var h = (ctrl.data('height')) ? ctrl.data('height') : 150;
            w = isNaN(w) ? 200 : w;
            h = isNaN(h) ? 150 : h;
            var picker = '';
            picker += '<span class="fileinput">';
            picker += '    <a class="btn btn-default explorer-open" style="padding:2px;position: relative;">';
            picker += '        <span class="btn btn-default img-reset" title="移除此圖片" style="padding: 0;display:none;color:red;position: absolute; top: 0; right: 0">';
            picker += '            <i class="fa fa-times"></i>';
            picker += '        </span>';
            picker += '        <img width="' + w + '" height="' + h + '" src="http://www.placehold.it/' + w + 'x' + h + '" alt="" title="" />';
            picker += '    </a>';
            picker += '</span>';
            picker = $(picker);
            ctrl.on('refresh', function(evt) {
                if (ctrl.val() === '') {
                    picker.find('img').attr('src', 'http://www.placehold.it/' + w + 'x' + h);
                    picker.find('img').attr('title', '點擊開啟圖庫瀏覽器');
                    picker.find('span.img-reset').hide();
                } else {
                    if ((/^http:\/\//.test(ctrl.val())) || (/^https:\/\//.test(ctrl.val())))
                    {
                        var imgSrc = ctrl.val();
                    } else {
                        var imgSrc = 'imagefly/w' + w + '-h' + h + '-c/uploads/' + ctrl.val();
                    }
                    picker.find('img').attr('src', imgSrc);
                    picker.find('img').attr('title', ctrl.val());
                    picker.find('span.img-reset').show();
                }
            });
            // 移除當前設定的圖片路徑
            picker.find('span.img-reset').on('click', function(evt) {
                ctrl.val('');
                ctrl.trigger('refresh');
                evt.stopPropagation();
            });
            // 開啟圖片選擇視窗
            picker.find('a.explorer-open').on('click', function(evt) {
                FantasyExplorer.open(function(pickers) {

                    var path = pickers[0];
                    //透過瀏覽器取得的圖片路徑
                    ctrl.val(path);
                    ctrl.trigger('refresh');
                });

            });
            ctrl.before(picker);
            ctrl.attr('readonly', 'readonly');
            ctrl.trigger('refresh');
            ctrl.addClass('inited');
            ctrl.hide();
        },
        "datePicker": function(ctrl) {
            moment.lang('zh-TW');
            var format = ctrl.data('format');
            format = (format) ? format : 'YYYY-MM-DD';
            ctrl.datepicker({
                "format": format
            });
            /*ctrl.inputmask("yyyy-mm-dd", {
             "placeholder": "YYYY-MM-DD"
             });*/
            ctrl.addClass('inited');
        },
        "spinner": function(ctrl) {
            ctrl.wrap('<div id="spinner-' + ctrl.prop('name') + '" class="spinner"><div class="input-group input-small"></div></div>');
            var btns = '';
            btns += '<div class="spinner-buttons input-group-btn btn-group-vertical">';
            btns += '    <button type="button" class="btn spinner-up btn-xs blue"><i class="fa fa-angle-up"></i></button>';
            btns += '    <button type="button" class="btn spinner-down btn-xs blue"><i class="fa fa-angle-down"></i></button>';
            btns += '</div>';
            btns = $(btns);
            ctrl.addClass('spinner-input');
            ctrl.parent().append(btns);
            ctrl.parent().parent().spinner({
                step: (ctrl.data('step')) ? ctrl.data('step') : 1,
                min: (ctrl.data('min')) ? ctrl.data('min') : 0,
                max: (ctrl.data('max')) ? ctrl.data('max') : 100
            });
            ctrl.addClass('inited');
        },
        "sprintf": function(ctrl) {
            var format = ctrl.data('format');
            var showString = _.str.sprintf(format, 0);
            ctrl.wrap('<div></div>');
            ctrl.hide();
            ctrl.parent().append('<label>' + showString + '</label>');
            ctrl.addClass('inited');
        },
        "tags": function(ctrl) {
            var interactive = true;
            if (ctrl.is('[disabled]') || ctrl.is('[readonly]')) {
                var interactive = false;
            }

            ctrl.tagsInput({
                'width': '100%',
                //'autocomplete_url': url_to_autocomplete_api,
                //'autocomplete': {option: value, option: value},
                //'height': '100px',
                'interactive': interactive,
                //'onRemoveTag': callback_function,
                //'onChange': callback_function,
                //'minChars': 0,
                //'maxChars': 0,
                //'placeholderColor': '#666666'
                'defaultText': 'add more...',
                'onAddTag': function(email) {
                    if (ctrl.data('validation') === 'email') {
                        // /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i
                        if (email.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/)) {
                            ctrl.removeTag(email);
                            ctrl.focus();
                        }
                    }
                },
                'removeWithBackspace': true
            });
            ctrl.addClass('inited');
        }
    };

    /***
     * 初始化欄位
     */
    var _initFormColumn = function() {
        _formBody.find('.form-control').each(function(i, el) {
            var ctrl = $(el);
            switch (ctrl.prop('type')) {
                case 'text':
                    // 文字類型 - 色碼選擇器
                    if (ctrl.hasClass('color-picker')) {
                        _formControlRender.colorPicker(ctrl);
                    }
                    // 文字類型 - 圖片選擇器(不同版本)
                    if (ctrl.hasClass('photo-picker')) {
                        _formControlRender.photoPicker(ctrl);
                    }
                    // 文字類型 - 檔案選擇器
                    if (ctrl.hasClass('file-picker')) {
                        _formControlRender.filePicker(ctrl);
                    }
                    // 文字類型 - 圖片選擇器
                    if (ctrl.hasClass('image-picker')) {
                        _formControlRender.imagePicker(ctrl);
                    }
                    // 文字類型 - 日期選擇器
                    if (ctrl.hasClass('date-picker')) {
                        _formControlRender.datePicker(ctrl);
                    }
                    // 文字類型 - 數字調節器
                    if (ctrl.hasClass('spinner')) {
                        _formControlRender.spinner(ctrl);
                    }
                    // 文字類型 - 自訂顯示格式
                    if (ctrl.hasClass('sprintf')) {
                        _formControlRender.sprintf(ctrl);
                    }
                    // 文字類型 - Tags 類型
                    if (ctrl.hasClass('tags')) {
                        _formControlRender.tags(ctrl);
                    }
                    // 文字類型 - 一般
                    if (ctrl.attr('maxlength')) {
                        ctrl.maxlength({
                            limitReachedClass: "label label-danger",
                            alwaysShow: true
                        });
                    }
                    break;
                    //----------------------------------------------------------
                case 'password':
                    // 密碼
                    ctrl.data('initialized', false);
                    ctrl.keydown(function(evt) {
                        var input = $(evt.currentTarget);
                        if (input.data('initialized') === false) {
                            // set base options
                            input.pwstrength({
                                raisePower: 1.4,
                                minChar: 8,
                                verdicts: ["弱", "一般", "中等", "強", "超強"],
                                scores: [17, 26, 40, 50, 60]
                            });
                            // add your own rule to calculate the password strength
                            input.pwstrength("addRule", "demoRule", function(options, word, score) {
                                return word.match(/[a-z].[0-9]/) && score;
                            }, 10, true);
                            // set as initialized
                            input.data('initialized', true);
                        }
                    });
                    break;
                    //----------------------------------------------------------
                case 'select-one':
                case 'select-multiple':
                    // 下拉選單
                    if (ctrl.data('source') && ctrl.data('source') !== "") {
                        $.getJSON(ctrl.data('source'), function(result) {
                            ctrl.find('option').remove();
                            $(result.data).each(function(i, opt) {
                                var value = opt[ctrl.data('value-key')];
                                var keys = ctrl.data('label-key').split(',');
                                var label = [];
                                for (var i in keys) {
                                    var key = $.trim(keys[i]);
                                    label.push(opt[key]);
                                }
                                ctrl.append('<option value="' + value + '">' + label.join(',') + '</option>');
                            });
                            ctrl.select2({
                                maximumSelectionSize: ctrl.data('maxsize')
                            });
                        });
                    } else {
                        ctrl.select2({
                            maximumSelectionSize: ctrl.data('maxsize')
                        });
                    }
                    break;
                    //----------------------------------------------------------
                case 'textarea':
                    // 文字區塊
                    if (ctrl.hasClass('ckeditor-textarea')) {
                        ctrl.ckeditor(function(textarea) {
                            for (var instanceName in CKEDITOR.instances) {
                                var instance = CKEDITOR.instances[instanceName];
                                instance.config.filebrowserBrowseUrl = '/browser/browse.php?type=Images';
                                instance.config.filebrowserImageBrowseUrl = '/uploader/upload.php?type=Files';
                                instance.config.filebrowserUploadUrl = '/uploader/upload.php?type=Files';
                                instance.config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Files';
                            }
                        });
                    }
                    if (ctrl.hasClass('markdown-textarea')) {

                    }
                    break;
                    //----------------------------------------------------------
                case 'radio':
                    // 單選
                    break;
                    //----------------------------------------------------------
                case 'checkbox':
                    // 多選
                    break;
                    //----------------------------------------------------------
                case 'hidden':

                    // 隱藏
                    break;
            }
        });

    };
    /**
     * 清空表單欄位
     * @param {type} alsoClearID
     * @returns {void}
     */
    var _resetFormData = function(alsoClearID) {

        _formRegion.find('form').find('input[type="text"]').val('');
        // _formRegion.find('form').find('input[type="hidden"][name!="id"]').val('');
        _formRegion.find('form').find('textarea').val('');
        _formRegion.find('form').find('select').select2("val", "");
        _formRegion.find('form').find('input:radio').removeAttr('checked');
        _formRegion.find('form').find('input:radio').parent().removeClass('active');
        _formRegion.find('form').find('input:checkbox').removeAttr('checked');
        _formRegion.find('form').find('input:checkbox').parent().removeClass('active');
        _formRegion.find('form').find('input.file-picker').trigger('refresh');
        _formRegion.find('form').find('input.image-picker').trigger('refresh');
        _formRegion.find('form').find('input.photo-picker').trigger('refresh');

        // 特殊
        $('table[data-name="traffics"]').find('tbody').find('tr').each(function(i, tr) {
            $(tr).remove();
        });

        //
        $('table[data-role="datatable"]', _formBody).each(function(i, table) {
            var dt = $(table).dataTable();
            dt.api().clear().draw();
        });

        // 清空識別碼
        if (alsoClearID) {
            var icon = '<i class="fa fa-check"></i>';
            _formRegion.find('form').find(':hidden[name="id"]').val("");
            _formRegion.find('a.btn-save').removeClass('blue').addClass('green');
            _formRegion.find('a.btn-save').html(icon + '&nbsp;建立');
            _formRegion.find('a.btn-remove').hide();
        } else {
            var icon = '<i class="fa fa-refresh"></i>';
            var id = _formRegion.find('form').find(':hidden[name="id"]').val();
            _formRegion.find('a.btn-save').removeClass('green').addClass('blue');
            _formRegion.find('a.btn-save').html(icon + '&nbsp;更新');
            //var requrestUrl = document.URL.split('#')[0];
            //_formRegion.find('a.btn-remove').attr('href', requrestUrl + '#!remove/' + id);
            _formRegion.find('a.btn-remove').show();
        }
    };

    /**
     * 設定欄位值
     * @param {string} name
     * @param {mix} value
     * @returns {void}
     */
    var _setFormColumnVal = function(name, value) {
        var find = _formRegion.find('form').find('.form-control[name="' + name + '"]');
        if (!find.length) {
            // 如果找不到，name 可能為多選的 name[]，再重新找一次
            find = _formRegion.find('form').find('.form-control[name="' + name + '[]"]');
        }
        switch (find.prop('type')) {
            case 'radio':
                _formRegion.find('form').find('.form-control[name="' + find.prop('name') + '"][value="' + value + '"]').trigger('click');
                break;
            case 'checkbox':
                var valArr = value.split(',');
                $(valArr).each(function(i, value) {
                    _formRegion.find('form').find('.form-control[name="' + find.prop('name') + '"][value="' + value + '"]').trigger('click');
                });
                break;
            case 'select-one':
                find.select2('val', value);
                break;
            case 'select-multiple':
                var valArr = new Array();
                if ($.isArray(value)) {
                    $(value).each(function(i, row) {
                        if ($.isPlainObject(row)) {
                            valArr.push(row.id);
                        } else {
                            valArr.push(row);
                        }
                    });
                } else {
                    valArr = value.toString().split(',');
                }
                find.select2('val', valArr);
                break;
            case 'textarea':
                find.val(value);
                break;
            case 'text':
                find.val(value);
                // 文字類型 - 色碼選擇器
                if (find.hasClass('color-picker')) {
                    find.parent().colorpicker('setValue', find.val());
                }
                // 文字類型 - 檔案選擇器
                if (find.hasClass('file-picker')) {
                    find.val(value);
                    find.trigger('refresh');
                }
                if (find.hasClass('image-picker')) {
                    find.val(value);
                    find.trigger('refresh');
                }
                if (find.hasClass('photo-picker')) {
                    find.val(value);
                    find.trigger('refresh');
                }
                // 文字類型 - 日期選擇器
             
                if (find.hasClass('date-picker')) {
                    find.datepicker('set', value);
                }

                // 文字類型 - 數字調節器
                if (find.hasClass('spinner')) {
                    find.parent().parent().spinner('value', value);
                    // find.spinner('value', value);
                }
                if (find.hasClass('tags')) {
                    console.log('tags', value);
                    if ($.isArray(value)) {
                        value = value.join(',');
                    }
                    find.importTags(value);
                }
                // 文字類型 - 自訂顯示器
                if (find.hasClass('sprintf')) {
                    var format = find.data('format');
                    var val = parseInt(find.val(), 10);
                    val = isNaN(val) ? 0 : val;
                    var showString = _.str.sprintf(format, val);
                    find.parent().find('label').text(showString);
                }
                break;
            case 'hidden':
                find.val(value);
                break;
            case 'password':
                find.val('');
                find.pwstrength('destroy');
                // set base options
                find.pwstrength({
                    raisePower: 1.4,
                    minChar: 8,
                    verdicts: ["弱", "一般", "中等", "強", "超強"],
                    scores: [17, 26, 40, 50, 60]
                });
                // add your own rule to calculate the password strength
                find.pwstrength("addRule", "demoRule", function(options, word, score) {
                    return word.match(/[a-z].[0-9]/) && score;
                }, 10, true);
                break;
            default:
                find.val(value);
        }
    };
    /**
     * 公開函式 & 屬性
     */
    return  {
        /**
         * 初始化表單
         */
        init: function(dataformOptions) {
            _formRegion = $('div.portlet[data-region="form"]');
            _formBody = $('form', _formRegion);

            $('table[data-role="datatable"]', _formBody).each(function(i, table) {
                var table = $(table);
                var name = table.data('name');
                table.dataTable(dataformOptions.datatable[name]);
            });

            _initFormColumn();

            _formRegion.hide();

        },
        data: function(data, format) {
            format = format || '%s';
            if (data) {

                for (var name in data) {
                    var value = data[name];
                    if ($.isArray(value)) {
                        var s = $('[name="' + name + '[]"]');
                        if (s.length) {
                            // 如果陣列資料是以 name[] 方式存在，就直接
                            _setFormColumnVal(name + '[]', value);
                            continue;
                        }

                        // 如果有而且又已經 datatable() 化
                        if ($.fn.dataTable.isDataTable($('table[data-name="' + name + '"]', _formBody))) {
                            var dt = $('table[data-name="' + name + '"]', _formBody).dataTable();
                            dt.api().clear();
                            for (var i in value) {
                                var row = value[i];
                                row.rank = parseInt(i);
                                dt.api().row.add(row);
                            }
                            dt.api().draw();
                            continue;
                        }

                        // 特殊
                        if (name == 'traffics') {
                            $('table[data-name="traffics"]').find('tbody').find('tr').each(function(i, tr) {
                                var ckid = $(tr).find('textarea').prop('id');
                                if (CKEDITOR && CKEDITOR.instances) {
                                    var ckeditor = CKEDITOR.instances[ckid];
                                    ckeditor.on('destroy', function() {
                                        $(tr).remove();
                                    });
                                    CKEDITOR.instances[ckid].destroy();
                                }
                            });
                            $(value).each(function(i, row) {
                                $('table[data-name="traffics"]').find('button.add-more').trigger('click', [row.id, row.title, row.details]);
                            });
                        }

                        _setFormColumnVal(name, value);
                    } else if ($.isPlainObject(value)) {
                        this.data(value, name + '[%s]');
                    } else {
                        name = _.str.sprintf(format, name);
                        _setFormColumnVal(name, value);
                    }
                }
                // 依照 id 的值，改變按鈕狀態
                if (data.id === "" || data.id === 0 || isNaN(data.id)) {
                    var icon = '<i class="fa fa-check"></i>';
                    _formRegion.find('a.btn-save').removeClass('blue').addClass('green');
                    _formRegion.find('a.btn-save').html(icon + '&nbsp;建立');
                    _formRegion.find('a.btn-remove').hide();
                } else {
                    var icon = '<i class="fa fa-refresh"></i>';
                    _formRegion.find('a.btn-save').prop('href', '#!save/' + data.id).addClass('sharp-link');
                    _formRegion.find('a.btn-save').removeClass('green').addClass('blue');
                    _formRegion.find('a.btn-save').attr('title', 'edit: ' + data.id);
                    _formRegion.find('a.btn-save').html(icon + '&nbsp;更新');
                    //
                    _formRegion.find('a.btn-remove').attr('href', '#!remove/' + data.id).addClass('sharp-link');
                    _formRegion.find('a.btn-remove').show();
                }
            } else {
                //
                var formData = _formRegion.find('form').serializeJSON();

                console.log(formData);
                //
                var photoData = $('table.table-gallery[data-name="photos"]', _formBody).dataTable().api().data();
                //console.log(photoData);
                /*formData['photos'] = [];
                 for (var i = 0; i < photoData.length; i++) {
                 formData['photos'].push(photoData[i]);
                 }*/
                // console.log(formData);

                // 如果 id 為空值，就移除(不然 backbone 會用 PUT 方式送出)
                if (formData.id === "" || formData.id === 0 || isNaN(formData.id)) {
                    delete formData.id;
                }
                return formData;
            }
        },
        reset: function(alsoClearID) {
            _resetFormData(alsoClearID);
        },
        hide: function() {
            _formRegion.hide();
            $('.panel-collapse').collapse('hide');
        },
        show: function() {
            $(document).scrollTop(_formRegion.position().top);
            _formRegion.removeClass('hidden');
            _formRegion.show();

            if (!$('#collapse-basic').hasClass('in')) {
                $('#collapse-basic').collapse('show');
            }
        },
        formControlRender: function() {
            return _formControlRender;
        }
    };
}();