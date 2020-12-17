(function ($) {

      form = $("#empFromE");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            firstNameE: {
                required: true,
                lettersonly: true
            },
           contE: {
                required: true,
                minlength: 10,
                maxlength: 15
            },
            countryE: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#countryE').val()) {
                            //Set predefined value to blank.
                            $('#countryE').val('');
                        }
                        return true;
                    }
                }
            },

            emailE: {

                email: true
            },
            passwordE: {
                required: true
            },
         
            deptE: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#deptE').val()) {
                            //Set predefined value to blank.
                            $('#deptE').val('');
                        }
                        return true;
                    }
                }
            },
            desgE: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#desgE').val()) {
                            //Set predefined value to blank.
                            $('#desgE').val('');
                        }
                        return true;
                    }
                }
            },
            shiftE: {
                required: {
                    depends: function (error, element) {
                        if ('0' == $('#shiftE').val()) {
                            //Set predefined value to blank.
                            $('#shiftE').val('');
                        }
                        return true;
                    }
                }

            },
            dojE: {
                required: true,
                date: true
            },
            entitledleaveE: {
                required: true
            },
            balanceleaveE: {
                required: true
            }

        },

        messages: {

            firstNameE: {
                required: "Please enter your firstname",
                lettersonly: "Please enter valid name"
            },
            contE: {
                required: "Please enter Phone Number",
                minlength: "Please enter atleast 10 Integers",
                maxlength: "Please enter less than 15 Integers"
            },
            emailE: {
                email: "Please enter valid email address"
            },
            countryE: {
                required: "Please select country"
            },

            passwordE: {
                required: "please enter password"
            },
           
            deptE: {
                required: "Please select Department"

            },
            desgE: {
                required: "Please select Designation"

            },
            shiftE: {
                required: "please select shift"
            },
            dojE: {
                required: "Please select date",
                date: "Please select date"
            },
            entitledleaveE: {
                required: "Please enter Entitled Leave/Year"
            },
            balanceleaveE: {
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
        titleTemplate: '<span class="title1">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            var fname = $('#firstNameE').val();
                
                var areaE = $('#areaAssinE').val();

                var doj = $('#dojE').val();
                

                var dept = $('#deptE').val();
                var desg = $('#desgE').val();
                var shift = $('#shiftE').val();
                var sts = $('#statusE').val();
                var country = $('#countryE').val();
                var timezone = $('#timezoneE').val();
             
                var email = $('#emailEE1').val();
                var password = $('#passwordE').val();
                var ecode=$("#ecodeE").val();
                var cont = $('#contE').val();
                var empid = $("#id").val();
                var sstatus = $("#sstatusE").val();
                var hourlyrateE = $("#hourlyrateE").val();
                var entitledleaveE = $("#entitledleaveE").val();
                var balanceleaveE = $("#balanceleaveE").val();

                var ecode = '';
                if ($('#ecodeE').val() != undefined)
                    ecode = $('#ecodeE').val().trim();
                var areaE = '';
                if ($('#areaAssinE').val() != undefined)
                    areaE = $('#areaAssinE').val();
                var formdata = new FormData();
                formdata.append('profE', $('#profileE').prop("files")[0]);
                formdata.append('fname', fname);
                formdata.append('areaE', areaE);
                //formdata.append('lname',lname);
                //formdata.append('dob', dob);
                formdata.append('doj', doj);
                // formdata.append('doc', doc);

                formdata.append('dept', dept);
                formdata.append('desg', desg);
                formdata.append('shift', shift);
                formdata.append('sts', sts);
                formdata.append('sstatus', sstatus);
                formdata.append('country', country);
                formdata.append('timezone', timezone);
                // formdata.append('city', city);
                formdata.append('email', email);
                formdata.append('password', password);
                // formdata.append('addr', addr);
                formdata.append('PersonalNo', cont);
                formdata.append('ecode', ecode);
                formdata.append('hourlyrateE', hourlyrateE);
                formdata.append('empid', empid);
                formdata.append('entitledleaveE', entitledleaveE);
                formdata.append('balanceleaveE', balanceleaveE);
                // alert(formdata);

                $.ajax({
                    processData: false,
                    contentType: false,
                    url: "<?php echo URL; ?>userprofiles/editUsermaster",
                    data: formdata, //,"email":email
                    datatype: "json",
                    type: "post",
                    //data: {"fname":fname,"areaE":areaE,"lname":lname,"dob":dob,"doj":doj,"doc":doc,"gen":gen,"nat":nat,"ms":ms,"rel":rel,"bg":bg ,"dept":dept ,"desg":desg ,"shift":shift ,"sts":sts ,"sstatus":sstatus,"country":country ,"city":city  ,"password":password ,"addr":addr ,"PersonalNo":cont, "empid":empid,"ecode":ecode,"hourlyrateE":hourlyrateE,"email":email}, //,"email":email
                    success: function (result)
                    {
                        if (result == 3)
                        {
                            doNotify('top', 'center', 3, 'Employee code already exist');
                        } else if (result == 4) {
                            doNotify('top', 'center', 3, 'Duplicate phone no. found');
                        } else if (result == 2)
                        {
                            doNotify('top', 'center', 3, 'Duplicate email id found');
                        } else if (result == 1) {
                            alert('successful');
                            doNotify('top', 'center', 2, 'Employee details updated successfully');
                            $('#addEmpE').modal('hide');
                            var table = $('#example').DataTable();
                            //table.ajax.reload(null, false);
                            setInterval(function () {
                                window.location.reload();
                            }, 2000);
                            //table.ajax.reload(); 
                            //window.location.reload();
                        } else
                            doNotify('top', 'center', 3, 'Error occured, try later');
                    }
                });
            
            },
            
           
        

        onFinished: function (event, currentIndex)
        {
            alert($('#firstNameE').val());
        },
        
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

    

})(jQuery);