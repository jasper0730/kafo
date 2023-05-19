var Login = function() {

    var handleLogin = function() {

        $('.login-form').find('i.fa-refresh').on('click', function(evt) {
            var d = new Date();
            var refreshCapthca = 'captcha/default?t=' + d.getMilliseconds();
            $('input[name="captcha"]').css('background-image', 'url(' + refreshCapthca + ')');
            $('input[name="captcha"]').val('');
        }).css('cursor', 'pointer');


        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                captcha: {
                    required: true
                },
                remember: {
                    required: false
                }
            },
            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                },
                captcha: {
                    required: "Captcha is required."
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                var invalidMessage = [];
                if (validator.invalid.username || validator.invalid.password) {
                    invalidMessage.push('必需輸入帳號或密碼');
                }
                if (validator.invalid.captcha) {
                    invalidMessage.push('必需輸入圖型驗證碼');
                }
                $('.alert-danger span', $('.login-form')).html(invalidMessage.join("<br>"));
                $('.alert-danger', $('.login-form')).show();
            },
            highlight: function(element) { // hightlight error inputs
                $(element).closest('.form-group')
                        .addClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },
            submitHandler: function(form) {
                var formData = $(form).serializeJSON();
                $.ajax({
                    "url": $('base').prop('href') + $('html').prop('lang') + "/api/lobby/login",
                    "type": "POST",
                    "dataType": "json",
                    "data": {
                        "username": formData.username,
                        "password": formData.password,
                        "captcha": formData.captcha,
                        "remember": formData.remember
                    },
                    "beforeSend": function(xhr) {

                    },
                    "success": function(data, textStatus, jqXHR) {
                        $('div.process-message').html('');
                        alert('完成登入程序');
                        location.href = $('base').prop('href') + 'fantasy';
                    },
                    "error": function(jqXHR, textStatus, errorThrown) {
                        $('div.alert.alert-danger').show();
                        if (textStatus === 'timeout') {
                            $('div.alert.alert-danger span').html('伺服器連線逾時');
                        } else {
                            $('div.alert.alert-danger span').html(jqXHR.responseJSON.error.message);
                        }
                    }
                });
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which === 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    };

    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Email is required."
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit

            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },
            submitHandler: function(form) {
                var formData = $(form).serializeJSON();
                $.ajax({
                    "url": $('base').prop('href') + $('html').prop('lang') + "/api/lobby/resend_key",
                    "type": "POST",
                    "dataType": "json",
                    "data": {
                        "email": formData.email,
                        "type": 'reset'
                    },
                    "beforeSend": function(xhr) {
                        $.blockUI();
                    },
                    "success": function(data, textStatus, jqXHR) {
                        $('div.process-message').html('');
                        alert('重設金鑰已寄送至「' + formData.email + '」，請查收');
                        $('.forget-form').find('input[name="email"]').val('');
                        $('#back-btn').trigger('click');
                    },
                    "error": function(jqXHR, textStatus, errorThrown) {
                        if (textStatus === 'timeout') {
                            alert('伺服器連線逾時');
                        } else {
                            alert(jqXHR.responseJSON.error.message);
                        }
                    },
                    "complete": function(jqXHR, textStatus) {
                        $.unblockUI();
                    }
                });
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which === 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    };

    var handleRegister = function() {

        function format(state) {
            if (!state.id)
                return state.text; // optgroup
            return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }


        $("#select2_sample4").select2({
            placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
            allowClear: true,
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function(m) {
                return m;
            }
        });


        $('#select2_sample4').change(function() {
            $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });



        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                rpassword: {
                    equalTo: "#register_password"
                },
                tnc: {
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                tnc: {
                    required: "Please accept TNC first."
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit

            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group')
                        .addClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "tnc") { // insert checkbox errors after the container
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                alert('hi');
                return false;
                //form.submit();
            }
        });

        $('.register-form input').keypress(function(e) {
            if (e.which === 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    };
    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            handleForgetPassword();
            handleRegister();

        }

    };

}();