(function ($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            firstName: {
                required: true,
                // lettersonly: true
            },
            cont: {
                required: true,
                minlength: 10,
                maxlength: 15
            },
            country: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#country').val()) {
                            //Set predefined value to blank.
                            $('#country').val('');
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
            dept: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#dept').val()) {
                            //Set predefined value to blank.
                            $('#dept').val('');
                        }
                        return true;
                    }
                }
            },
            desg: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#desg').val()) {
                            //Set predefined value to blank.
                            $('#desg').val('');
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
//            doj: {
//                required: true,
//                date: true
//            },
            entitledleave: {
                required: true
            },
            balanceleave: {
                required: true
            }

        },

        messages: {

            firstName: {
                required: "Please enter your firstname",
                // lettersonly: "Please enter valid name"
            },
            cont: {
                required: "Please enter Phone Number",
                minlength: "Please enter atleast 10 digits",
                maxlength: "Please enter less than 15 digits"
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
            dept: {
                required: "Please select Department"

            },
            desg: {
                required: "Please select Designation"

            },
            shift: {
                required: "please select shift"
            },
//            doj: {
//                required: "Please select date",
//                date: "Please select date"
//            },
            entitledleave: {
                required: "Please enter Entitled Leave/Year"
            },
            balanceleave: {
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
            //alert ('<?php echo URL; ?>Userprofiles/insertUsermaster');
            var firstName = $('#firstName').val();
            //alert (fname);
            var ecode = $('#ecode').val();
            var cont = $('#cont').val();
            var email = $('#email').val();
            //alert(email);
            var country = $('#country').val();
            var doj = $('#doj').val();
            var doc = $('#doc').val();
            var timezone = $('#timezone').val();
            var password = $('#password').val();
            //alert(password);
            var dept = $('#dept').val();
            var desg = $('#desg').val();
            var shift = $('#shift').val();
            var entitledleave = $('#entitledleave').val().trim();
            var balanceleave = $('#balanceleave').val();
            var hourlyrate = $('#hourlyrate').val();      
            var  restrictfence  =  $('input[name=fenceopt]:Checked').val();
            //alert(restrictfence);   
            var sts = 1;
            // alert (sts);
            var sts1 = $('#sstatus').val();
            // alert(sts1);
            var areaAssign = $('#areaAssign').val();

            var formdata = new FormData();

            formdata.append('prof', $('#profile').prop("files")[0]);
            formdata.append('firstName', firstName);
            formdata.append('areaAssign', areaAssign);
            formdata.append('doc', doc);
            formdata.append('dept', dept);
            formdata.append('desg', desg);
            formdata.append('shift', shift);
            formdata.append('sts', sts);
            formdata.append('sts1', sts1);
            formdata.append('country', country);
            formdata.append('timezone', timezone);
            //formdata.append('city', city);
            formdata.append('email', email);
            formdata.append('password', password);
            //formdata.append('addr', addr);
            formdata.append('PersonalNo', cont);
            //formdata.append('ecode', ecode);
            formdata.append('ecode', ecode);
            formdata.append('hourlyrate', hourlyrate);
            formdata.append('doj', doj);
            formdata.append('entitledleave', entitledleave);
            formdata.append('balanceleave', balanceleave);
            formdata.append('restrictfence',restrictfence);
            $.ajax({
                url: "insertUsermaster",

               
                processData: false,
                contentType: false,
                data: formdata,
               
                datatype: "json",
                type: "post",

                success: function (result) {
                    
                    if(result == 4){
                       
                        doNotify('top','center',2,'Employee added successfully');
                        window.location.reload();
                    }else if(result == 1){
                        doNotify('top','center',4,'Mail ID already exists');
                    
                    }else if(result == 2){
                        doNotify('top','center',4,'Duplicate phone no. found');
                    
                    }else if(result == 3){
                        doNotify('top','center',4,'Employee code is already exists');
                    }
                    
                 },

                error: function (result) {
                    doNotify('top','center',4,'Unable to connect API');
                   
                }
            });





            form.validate().settings.ignore = ":disabled";
            return form.valid();

        },
        onFinished: function (event, currentIndex)
        {
            //alert($('#first_name').val());
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

    //$('#country').parent().append('<ul class="list-item" id="newcountry" name="country"></ul>');
    //$('#country option').each(function () {
    // $('#newcountry').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    //});
    //$('#country').remove();
    //$('#newcountry').attr('id', 'country');
    //$('#country li').first().addClass('init');
    //$("#country").on("click", ".init", function () {
    // $(this).closest("#country").children('li:not(.init)').toggle();
    //});

    //var CountryOptions = $("#country").children('li:not(.init)');
    //$("#country").on("click", "li:not(.init)", function () {
    //CountryOptions.removeClass('selected');
    //$(this).addClass('selected');
    //$("#country").children('.init').html($(this).html());
    // CountryOptions.toggle();
    //});

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

//    $.dobPicker({
//        daySelector: '#birth_date',
//        monthSelector: '#birth_month',
//        yearSelector: '#birth_year',
//        dayDefault: 'Day',
//        monthDefault: 'Month',
//        yearDefault: 'Year',
//        minimumAge: 0,
//        maximumAge: 120
//    });
//
//    $.dobPicker({
//        daySelector: '#expiry_date',
//        monthSelector: '#expiry_month',
//        yearSelector: '#expiry_year',
//        dayDefault: 'Day',
//        monthDefault: 'Month',
//        yearDefault: 'Year',
//        minimumAge: 0,
//        maximumAge: 120
//    });

})(jQuery);