<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>ubiAttendance</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/manage.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300%7CMaterial+Icons' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="sidebar-wrapper">
            <?php
            $this->load->view('menubar/sidebar');
            $this->load->view('menubar/navbar');
            ?>




        </div><br><br><br>
        <div class="main_content2">
            <div class="col-xs-8" id="headingmanage">
                <h3 id="employes"><b>Client</b></h3>
            </div><hr style="width: 70%;">
            <br>

            <div id="heading3">
                <div class="col-xs-6">

                </div>
                <div class="col-xs-1"  id="departmentprint1"><i class="fa fa-print" >&nbsp;</i>Print</div>
                <div class="col-xs-2" id="download1"><i class="fa fa-download">&nbsp;</i>Download</div>
                <div class="col-xs-1"  id="sort1"><i class="fa fa-sort" >&nbsp;</i>Sort</div>
                <div class="col-xs-2"  id="addshift"><button  class="department1" data-toggle="modal" data-target="#myModal" style="width: 150px;">+ Add Client</button></div>

            </div>


            <div class="content3" style="margin-left: 2%; width: 95%;">



                <div class="container-fluid">
                    <table class="table table-responsive-lg">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkall"></th>
                                <th >Designation Name</th>
                                <th >Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="text1">
                                <td><input type="checkbox"></td>
                                <td class="txt-oflo">Technical</td>
                                <td><button  id="bt2">Active</button></td>
                                <td><div class="more">
                                        <button id="more-btn" class="more-btn">
                                            <span class="more-dot"></span>
                                            <span class="more-dot"></span>
                                            <span class="more-dot"></span>
                                        </button>
                                        <div class="more-menu">
                                            <div class="more-menu-caret">
                                                <div class="more-menu-caret-outer"></div>
                                                <div class="more-menu-caret-inner"></div>
                                            </div>
                                            <ul class="more-menu-items" tabindex="-1" role="menu" aria-labelledby="more-btn" aria-hidden="true">
                                                <li class="more-menu-item" role="presentation">
                                                    <button type="button" class="more-menu-btn" role="menuitem"><i class="fa fa-edit"> &nbsp;Edit</i></button>
                                                </li>
                                                <li class="more-menu-item" role="presentation">
                                                    <button type="button" class="more-menu-btn" role="menuitem"><i class="fa fa-trash">&nbsp;Delete</i></button>
                                                </li>
                                                <li class="more-menu-item" role="presentation">
                                                    <button type="button" class="more-menu-btn" role="menuitem"><i class="fa fa-qrcode">&nbsp;Qr Code</i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <tbody>
                            <tr id="text1">
                                <td><input type="checkbox"></td>
                                <td class="txt-oflo">Technical</td>
                                <td><button  id="bt2">Active</button></td>
                                <td><div class="more">
                                        <button id="more-btn" class="more-btn">
                                            <span class="more-dot"></span>
                                            <span class="more-dot"></span>
                                            <span class="more-dot"></span>
                                        </button>
                                        <div class="more-menu">
                                            <div class="more-menu-caret">
                                                <div class="more-menu-caret-outer"></div>
                                                <div class="more-menu-caret-inner"></div>
                                            </div>
                                            <ul class="more-menu-items" tabindex="-1" role="menu" aria-labelledby="more-btn" aria-hidden="true">
                                                <li class="more-menu-item" role="presentation">
                                                    <button type="button" class="more-menu-btn" role="menuitem"><i class="fa fa-edit"> &nbsp;Edit</i></button>
                                                </li>
                                                <li class="more-menu-item" role="presentation">
                                                    <button type="button" class="more-menu-btn" role="menuitem"><i class="fa fa-trash">&nbsp;Delete</i></button>
                                                </li>
                                                <li class="more-menu-item" role="presentation">
                                                    <button type="button" class="more-menu-btn" role="menuitem"><i class="fa fa-qrcode">&nbsp;Qr Code</i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form method="post" id="clientlist">
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" id="manage_popup">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-chevron-left" id="arrow" data-dismiss="modal"> &nbsp;Add a Client</i></h4>
                            </div>
                            <br><div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control alpha"  id="company" name="company" placeholder="Company Name"autocomplete="off">
                                        <span id="company_error" class="error_form"></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control alpha"  id="firstName" name="firstName" placeholder="Contact Person"autocomplete="off">
                                        <span id="firstName_error" class="error_form"></span>
                                    </div></div><br>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="email" class="form-control" id="email"  name="email" placeholder="Email">
                                        <span id="email_error" class="error_form"></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control numeric"  id="cont" name="cont" placeholder="Contact No"autocomplete="off">
                                        <span id="cont_error" class="error_form"></span>
                                    </div></div><br>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="addr"  name="addr" placeholder="Address"autocomplete="off">
                                        <span id="addr_error" class="error_form"></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control alpha" id="city"  name="city" placeholder="City"autocomplete="off">
                                        <span id="city_error" class="error_form"></span>
                                    </div></div><br>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <select class="form-control form-control-lg" id="country" name="country">
                                            <option value="0">-Select-</option>
                                    <?php
                                    $data = json_decode(getAllCountries());
                                    for ($i = 0; $i < count($data); $i++)
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control alpha"  id="zonecity" name="zonecity" placeholder="Zone" autocomplete="off">
                                        <span id="zonecity_error" class="error_form"></span>
                                    </div></div><br>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <textarea style="height: 100px; width: 100%;" placeholder="Description" id="description"  class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>
                            <br><div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 15%; font-size: 16px;">Cancel</button>
                                <button type="button" class="btn btn-success" id="saveclient" style="width: 15%; font-size: 16px;">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <script type="text/javascript">
                var el = document.querySelector('.more');
                var btn = el.querySelector('.more-btn');
                var menu = el.querySelector('.more-menu');
                var visible = false;
                function showMenu(e) {
                    e.preventDefault();
                    if (!visible) {
                        visible = true;
                        el.classList.add('show-more-menu');
                        menu.setAttribute('aria-hidden', false);
                        document.addEventListener('mousedown', hideMenu, false);
                    }
                }
                function hideMenu(e) {
                    if (btn.contains(e.target)) {
                        return;
                    }
                    if (visible) {
                        visible = false;
                        el.classList.remove('show-more-menu');
                        menu.setAttribute('aria-hidden', true);
                        document.removeEventListener('mousedown', hideMenu);
                    }
                }
                btn.addEventListener('click', showMenu, false);
            </script>
            <script type="text/javascript">
                $('#sidebarnav2').on('click', 'ul li', function () {
                    $('#sidebarnav2 ul li.active2').removeClass('active2');
                    $(this).addClass('active2');
                })
            </script>


            <script type="text/javascript">
                $(document).ready(function () {

                $('#saveclient').click(function () {

var company = $('#company').val();
var firstName = $('#firstName').val();
var email = $('#email').val();
var cont = $('#cont').val();
var addr = $('#addr').val();
var city = $('#city').val();
var country = $('#country').val();
var zonecity = $('#zonecity').val();
var description = $('#description').val();
                var company_error = '';
                        var firstName_error = '';
                        var email_error = '';
                        var cont_error = '';
                        var addr_error = '';
                        var city_error = '';
                        var zonecity_error = '';
                        var email_p = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        var cont_p = /^[0-9-+]+$/;
                        
                        if ($.trim($('#company').val()).length == 0)
                {
                $("#company_error").html("Please enter Company");
                        $("#company_error").css("color", "#F90A0A");
                        $("#company_error").show();
                        $("#company").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                $("#company_error").hide();
                        $("#company").css("border", "2px solid #34F458");
                        $('#company').removeClass('has-error');
                }

                if ($.trim($('#firstName').val()).length == 0)
                {
                $("#firstName_error").html("Please enter Contact Person");
                        $("#firstName_error").css("color", "#F90A0A");
                        $("#firstName_error").show();
                        $("#firstName").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                $("#firstName_error").hide();
                        $("#firstName").css("border", "2px solid #34F458");
                        $('#firstName').removeClass('has-error');
                }
                if ($.trim($('#email').val()).length == 0)
                {
                $("#email_error").html("Please enter Email");
                        $("#email_error").css("color", "#F90A0A");
                        $("#email_error").show();
                        $("#email").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                if (!email_p.test($('#email').val()))
                {
                $("#email_error").html("Please enter valid format for Email Address");
                        $("#email_error").css("color", "#F90A0A");
                        $("#email_error").show();
                        $("#email").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                $("#email_error").hide();
                        $("#email").css("border", "2px solid #34F458");
                        $('#email_error').removeClass('has-error');
                }
                }
                
                 if ($.trim($('#cont').val()).length < 10 || $.trim($('#cont').val()).length > 15)
                    {
                        $("#cont_error").html("Please enter atleast 10 Integer");
                        $("#cont_error").css("color", "#F90A0A");
                        $("#cont_error").show();
                        $("#cont").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!cont_p.test($('#cont').val()))
                        {
                            $("#cont_error").html("Please valid format of Phone Number");
                            $("#cont_error").css("color", "#F90A0A");
                            $("#cont_error").show();
                            $("#cont").css("border", "2px solid #F90A0A");
                            return false;
                        } else
                        {
                            $("#cont_error").hide();
                            $("#cont").css("border", "2px solid #34F458");
                            $('#cont').removeClass('has-error');
                        }
                    }
                    
                    if ($.trim($('#addr').val()).length == 0)
                {
                $("#addr_error").html("Please enter Company");
                        $("#addr_error").css("color", "#F90A0A");
                        $("#addr_error").show();
                        $("#addr").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                $("#addr_error").hide();
                        $("#addr").css("border", "2px solid #34F458");
                        $('#addr').removeClass('has-error');
                }
                
                   if ($.trim($('#city').val()).length == 0)
                {
                $("#city_error").html("Please enter Company");
                        $("#city_error").css("color", "#F90A0A");
                        $("#city_error").show();
                        $("#city").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                $("#city_error").hide();
                        $("#city").css("border", "2px solid #34F458");
                        $('#city').removeClass('has-error');
                }
                
                 if ($.trim($('#zonecity').val()).length == 0)
                {
                $("#zonecity_error").html("Please enter Company");
                        $("#zonecity_error").css("color", "#F90A0A");
                        $("#zonecity_error").show();
                        $("#zonecity").css("border", "2px solid #F90A0A");
                        return false;
                } else
                {
                $("#zonecity_error").hide();
                        $("#zonecity").css("border", "2px solid #34F458");
                        $('#zonecity').removeClass('has-error');
                }
                
                $.ajax({
                    url: "<?php echo URL; ?>Clientsettings/add_clients",
                    data: {"company": company, "firstName": firstName, "email": email, 
                "cont": cont, "addr": addr, "city": city, 
                "country": country, "zonecity": zonecity, "description": description},
                    type: "post",
                    success: function (response) {

                        $('#myModal').modal('hide');
                        $('#clientlist')[0].reset();
                        $("#company").css("border", "1px solid #E5E5E5 ");
                        $("#firstName").css("border", "1px solid #E5E5E5 ");
                        $("#email").css("border", "1px solid #E5E5E5 ");
                        $("#cont").css("border", "1px solid #E5E5E5 ");
                        $("#addr").css("border", "1px solid #E5E5E5 ");
                        $("#city").css("border", "1px solid #E5E5E5 ");
                        $("#zonecity").css("border", "1px solid #E5E5E5 ");
                        $("#description").css("border", "1px solid #E5E5E5 ");

                        // alert('Successfully inserted');
                    },
                    error: function ()
                    {
                        alert("error");
                    }
                });

            });
            });
         
            </script>
            
            <script type="text/javascript">
            var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function () {
                $(".numeric").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                    // $(".error").css("display", ret ? "none" : "inline");
                    return ret;
                });
                $(".numeric").bind("paste", function (e) {
                    return false;
                });
                $(".numeric").bind("drop", function (e) {
                    return false;
                });
            });
            var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function () {
                $(".alpha").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 97 && keyCode <= 122) || specialKeys.indexOf(keyCode) != -1);
                    // $(".error").css("display", ret ? "none" : "inline");
                    return ret;
                });
                $(".alpha").bind("paste", function (e) {
                    return false;
                });
                $(".alpha").bind("drop", function (e) {
                    return false;
                });
            });
        </script>
    </body>
</html>