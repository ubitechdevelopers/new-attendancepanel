(function ($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            first_name: {
                required: true,
                lettersonly: true
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 15
            },
            country: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#user_name').val()) {
                            //Set predefined value to blank.
                            $('#user_name').val('');
                        }
                        return true;
                    }
                }
            },

            email: {

                email: true
            },
            password: {
                required: true
            },
            cpassword: {
                required: true,
                equalTo: "#password"
            },
            department: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#department').val()) {
                            //Set predefined value to blank.
                            $('#department').val('');
                        }
                        return true;
                    }
                }
            },
            designation: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#designation').val()) {
                            //Set predefined value to blank.
                            $('#designation').val('');
                        }
                        return true;
                    }
                }
            },
            shift: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#shift').val()) {
                            //Set predefined value to blank.
                            $('#shift').val('');
                        }
                        return true;
                    }
                }

            },
            date: {
                required: true,
                date: true
            },
            Eleavepery: {
                required: true
            },
            Eleavety: {
                required: true
            }

        },

        messages: {

            first_name: {
                required: "Please enter your firstname",
                lettersonly: "Please enter valid name"
            },
            phone: {
                required: "Please enter Phone Number",
                minlength: "Please enter atleast 10 Integers",
                maxlength: "Please enter less than 15 Integers"
            },
            email: {
                email: "Please enter valid email address"
            },
            country: {
                required: "Please select country"
            },

            password: {
                required: "please enter password"
            },
            cpassword: {
                required: "please re-enter password",
                equalTo: "Password not matched"
            },
            department: {
                required: "Please select Department"

            },
            designation: {
                required: "Please select Designation"

            },
            shift: {
                required: "please select shift"
            },
            date: {
                required: "Please select date",
                date: "Please select date"
            },
            Eleavepery: {
                required: "Please enter Entitled Leave/Year"
            },
            Eleavety: {
                required: "please enter Entitled Leave This Year"
            }
        }

    });



    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            Back: 'Back',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<span class="title">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert($('#first_name').val());
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: "",
        depends: ""

    });

    $('#gender').parent().append('<ul class="list-item" id="newgender" name="gender"></ul>');
    $('#gender option').each(function () {
        $('#newgender').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });
    $('#gender').remove();
    $('#newgender').attr('id', 'gender');
    $('#gender li').first().addClass('init');
    $("#gender").on("click", ".init", function () {
        $(this).closest("#gender").children('li:not(.init)').toggle();
    });

    var allOptions = $("#gender").children('li:not(.init)');
    $("#gender").on("click", "li:not(.init)", function () {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#gender").children('.init').html($(this).html());
        allOptions.toggle();
    });

    $('#country').parent().append('<ul class="list-item" id="newcountry" name="country"></ul>');
    $('#country option').each(function () {
        $('#newcountry').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });
    $('#country').remove();
    $('#newcountry').attr('id', 'country');
    $('#country li').first().addClass('init');
    $("#country").on("click", ".init", function () {
        $(this).closest("#country").children('li:not(.init)').toggle();
    });

    var CountryOptions = $("#country").children('li:not(.init)');
    $("#country").on("click", "li:not(.init)", function () {
        CountryOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#country").children('.init').html($(this).html());
        CountryOptions.toggle();
    });

    $('#payment_type').parent().append('<ul  class="list-item" id="newpayment_type" name="payment_type"></ul>');
    $('#payment_type option').each(function () {
        $('#newpayment_type').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });
    $('#payment_type').remove();
    $('#newpayment_type').attr('id', 'payment_type');
    $('#payment_type li').first().addClass('init');
    $("#payment_type").on("click", ".init", function () {
        $(this).closest("#payment_type").children('li:not(.init)').toggle();
    });

    var PaymentsOptions = $("#payment_type").children('li:not(.init)');
    $("#payment_type").on("click", "li:not(.init)", function () {
        PaymentsOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#payment_type").children('.init').html($(this).html());
        PaymentsOptions.toggle();
    });

    $.dobPicker({
        daySelector: '#birth_date',
        monthSelector: '#birth_month',
        yearSelector: '#birth_year',
        dayDefault: 'Day',
        monthDefault: 'Month',
        yearDefault: 'Year',
        minimumAge: 0,
        maximumAge: 120
    });

    $.dobPicker({
        daySelector: '#expiry_date',
        monthSelector: '#expiry_month',
        yearSelector: '#expiry_year',
        dayDefault: 'Day',
        monthDefault: 'Month',
        yearDefault: 'Year',
        minimumAge: 0,
        maximumAge: 120
    });

})(jQuery);