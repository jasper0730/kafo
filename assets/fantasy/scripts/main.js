requirejs.config({
    ////////////////
    //  類別庫路徑
    ////////////////
    "paths": {
        // 擴充類(也就是沒有額外的 CSS 需要載入)
        'jquery': '../plugins/jquery/jquery-1.11.1.min',
        'jquery-migrate': '../plugins/jquery-migrate-1.2.1.min',
        'underscore': '../plugins/underscore/underscore-min',
        'underscore.string': '../plugins/underscore/underscore.string.min',
        'backbone': '../plugins/backbone/backbone-min',
        'handlebarsjs': '../plugins/handlebarjs/handlebars-v1.3.0',
        'moment': '../plugins/moment',
        'moment-zh_tw': '../plugins/moment-with-langs.min',
        'pagedown': "../plugins/pagedown-extra/pagedown/Markdown.Converter",
        'pagedown-extra': "../plugins/pagedown-extra/Markdown.Extra",
        //
        'bootstrap': '../plugins/bootstrap/js/bootstrap.min',
        // 新版的 datatable.js (注意別名一定要叫 datatables 。原因：不明)
        'datatables': '../plugins/DataTables-1.10.0/media/js/jquery.dataTables',
        'magnific-popu': '../plugins/Magnific-Popu/dist/jquery.magnific-popup.min',
        'colorpicker': '../plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min',
        'maxlength': '../plugins/bootstrap-maxlength/bootstrap-maxlength.min',
        'toastr': '../plugins/bootstrap-toastr/toastr.min',
        'jquery-ui': '../plugins/jquery-ui/jquery-ui-1.10.3.custom.min',
        'jquery-cookie': '../plugins/jquery-cookie-1.4.1/jquery.cookie',
        'jquery-blockUI': '../plugins/jquery-blockui/jquery.blockUI',
        'uploadify': '../plugins/uploadify/jquery.uploadify',
        'jquery-tagsinput': '../plugins/jquery-tagsinput/jquery.tagsinput.min',
        'jquery-pwstrength': '../plugins/jquery-pwstrength/src/pwstrength',
        'uniform': '../plugins/uniform/jquery.uniform.min',
        'jquery-slimscroll': '../plugins/jquery-slimscroll/jquery.slimscroll',
        'jquery.serializejson': '../plugins/jquery.serializeJSON/jquery.serializejson',
        'ckeditor-core': '../plugins/ckeditor/ckeditor',
        'ckeditor-jquery': '../plugins/ckeditor/adapters/jquery',
        'select2': '../plugins/select2-3.5.0/select2',
        'select2-zh_tw': '../plugins/select2-3.5.0/select2_locale_zh-TW',
        'fuelux-spinner': '../plugins/fuelux/js/spinner',
        'moment-datepicker': '../plugins/moment-datepicker/moment-datepicker.min',
        'moment-daterangepicker': '../plugins/jquery-date-range-picker/jquery.daterangepicker',
        'jquery-confirm': '../plugins/jquery.confirm/jquery.confirm.min',
        'jquery.alerts': '../plugins/jquery.alerts/jquery.alerts',
        'jquery-inputmask': '../plugins/jquery-inputmask/jquery.inputmask',
        'jquery-inputmask-ext': '../plugins/jquery-inputmask/jquery.inputmask.extensions',
        'jstree': '../plugins/jstree/dist/jstree',
        'selectize': '../plugins/selectize.js/js/standalone/selectize.min',
        'dateRangePicker': '../plugins/jquery-date-range-picker/jquery.daterangepicker',
        'fancybox': '../plugins/fancybox/jquery.fancybox',
        'fancybox-theme': '../plugins/fancybox/helpers/jquery.fancybox-thumbs',
        'jquery-toastmessage': '../plugins/jquery-toastmessage/js/jquery.toastmessage',
        'bootstrap-datepicker-zh-tw': '../plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.zh-TW',
        'bootstrap-datepicker': '../plugins/bootstrap-datepicker/js/bootstrap-datepicker',
        'jquery-nestable': '../plugins/jquery-nestable/jquery.nestable',
        // 核心
        'manaform': 'core/manaform',
        'manatable': 'core/manatable',
        'manainput': 'core/manainput',
        'manalist': 'core/manalist',
        'datatables-plugin': 'core/dataTables.bootstrap',
        'fantasy-explorer': 'core/fantasy-explorer',
        'fantasy-app': 'core/app'
    },
    ////////////////
    //  類別庫相依性
    ////////////////
    "shim": {
        "pagedown-extra": ['pagedown'],
        'ckeditor': ['jquery'],
        'ckeditor-jquery': ['jquery', 'ckeditor-core'],
        'jquery-migrate': ['jquery'],
        'backbone': ['jquery', 'underscore'],
        'underscore.string': ['underscore'],
        'bootstrap': ['jquery'],
        'datatables': ['jquery'],
        'jquery-blockUI': ['jquery'],
        'jquery-pwstrength': ['jquery'],
        'jquery-tagsinput': ['jquery'],
        'maxlength': ['jquery'],
        'fancybox': ['jquery'],
        'fancybox-theme': ['fancybox'],
        'jquery-ui': ['jquery'],
        'jquery-confirm': ['jquery'],
        'jquery.alerts': ['jquery', 'jquery-ui'],
        'jquery-slimscroll': ['jquery'],
        'jquery-cookie': ['jquery'],
        'magnific-popu': ['jquery'],
        'jquery.serializejson': ['jquery'],
        'uniform': ['jquery'],
        'select2': ['jquery'],
        'select2-zh_tw': ['jquery', 'select2'],
        'uploadify': ['jquery'],
        'fuelux-spinner': ['jquery'],
        'moment-zh_tw': ['moment'],
        'jquery-inputmask': ['jquery'],
        'moment-datepicker': ['jquery', 'moment'],
        'moment-daterangepicker': ['jquery', 'moment'],
        'jstree': ['jquery'],
        'handlebarsjs': ['jquery'],
        'selectize.js': ['jquery'],
        'dateRangePicker': ['jquery'],
        'jquery-toastmessage': ['jquery'],
        'jquery-inputmask-ext': ['jquery', 'jquery-inputmask'],
        'bootstrap-datepicker': ['jquery', 'bootstrap'],
        'bootstrap-datepicker-zh-tw': ['jquery', 'bootstrap-datepicker'],
        'jquery-nestable': ['jquery'],
        /**
         * 核心
         */
        'datatables-plugin': ['jquery', 'datatables'],
        'manatable': ['datatables-plugin', 'handlebarsjs', 'manainput', 'jquery.alerts', 'jquery-toastmessage', 'jquery-nestable', 'pagedown-extra'],
        'manaform': ['handlebarsjs', 'manainput', 'manalist'],
        'manalist': ['handlebarsjs', 'manainput'],
        'manainput': [
            'jquery-ui', 'jquery-inputmask-ext', 'moment',
            'jquery', 'handlebarsjs', 'select2-zh_tw', 'bootstrap-datepicker-zh-tw', 'fancybox-theme',
            'ckeditor-jquery', 'colorpicker', 'selectize', 'maxlength', 'jquery-pwstrength',
            'jquery-inputmask', 'dateRangePicker', 'magnific-popu',
        ],
        'fantasy-explorer': ['uploadify', 'uniform', 'jstree', 'datatables-plugin', 'underscore.string', 'jquery-slimscroll'],
        'fantasy-app': ['jquery', 'underscore.string', 'bootstrap', 'jquery-slimscroll', 'jquery-blockUI', 'jquery-cookie']
    },
    "deps": ['fantasy-app', 'manatable', 'manainput', 'manaform', 'router', 'fantasy-explorer', 'jquery.serializejson'],
    "callback": function () {


        FantasyExplorer.init();

        $('table.matatable').manatable();

        $('table.manalist').manalist();

        App.init();

        $(window).trigger('resize');

        var router = require('router');
        router.initialize();

    }
});