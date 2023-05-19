(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module depending on jQuery.
        define(['jquery'], factory);
    } else {
        // No AMD. Register plugin with global jQuery object.
        factory(jQuery);
    }
}(function($) {
    var config;

    var methods = {
        "init": function(options) {
            var form = $(this);
            config = $.extend({}, options);
            form.find('.manainput').manainput();
        },
        "show": function() {

        },
        "load": function(id) {
            var form = $(this);
            $.ajax({
                "url": form.prop('action'),
                "data": {
                    "id": id
                },
                "dataType": "json",
                "success": function(data, textStatus, jqXHR) {
                    form.manaform('data', data);
                }
            });
        },
        "reset": function() {
            var form = $(this);
            form.find('.manainput').trigger('reset');
        },
        "data": function(data) {
            var form = $(this);
            if (typeof data === 'object' || !data) {
                for (var name in data) {
                    var value = data[name];
                    form.find('.manainput[name="' + name + '"]').trigger('set', value);
                }
                form.trigger('loaded');
            } else {
                data = form.serializeJSON();
                return data;
            }
        }
    };

    $.fn.manaform = function(options) {
        if (methods[options]) {
            var params = Array.prototype.slice.call(arguments, 1);
            return this.each(function() {
                methods[options].apply(this, params);
            });

        } else if (typeof options === 'object' || !options) {
            return this.each(function() {
                methods.init.apply(this, arguments);
            });
        } else {
            $.error('Method ' + options + ' does not exist on jQuery.manaform');
        }
    };





}));