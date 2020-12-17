<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Add Employees</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?= URL ?>../assets/css/bootstrap.min.css" >
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="<?= URL ?>../assets/css/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300%7CMaterial+Icons' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/jquery.multiselect.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/picker.min.css" />
        <link href="<?= URL ?>../assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>../assets/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/datepicker/datepicker3.css" />
        <style>
                .btn1>input[type='file'] 
        {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            
            display: block;
        }
        </style>
    </head>
    <body>
        <div class="sidebar-wrapper">
            <div class="logo">
                <img src="http://ubiattendance.zentylpro.com/assets/img/newlogo.png" style="width: 60%;">
                <br> <br>
                <ul>
                    <li><a href="C:/Users/HP/Downloads/attendance/dashboard1.html" ><img src="<?= URL ?>../assets/img/dash.png">&nbsp;&nbsp;Dashboard</a></li>
                    <li><a href="<?= URL ?>/Userprofiles/employeelist"><img src="<?= URL ?>../assets/img/employee.png">&nbsp;&nbsp; Employee</a></li>
                    <li><a href="<?= URL ?>" ><img src="<?= URL ?>../assets/img/attendance.png">&nbsp;&nbsp;Attendance</a></li>
                    <li><a href="#" ><img src="<?= URL ?>../assets/img/report.png">&nbsp;&nbsp;Summary Report</a></li>
                    <li><a href="#" ><img src="<?= URL ?>../assets/img/clients.png">&nbsp;&nbsp;Clients</a></li>
                    <li><a href="#" ><img src="<?= URL ?>../assets/img/visits.png">&nbsp;&nbsp;Visits</a></li>
                    <li><a href="#" ><img src="<?= URL ?>../assets/img/leaves.png">&nbsp;&nbsp;Leaves</a></li>
                    <li><a href="#" ><img src="<?= URL ?>../assets/img/pay.png">&nbsp;&nbsp;Payroll</a></li>
                    <li><a href="<?= URL; ?>Managesettings" ><img src="<?= URL ?>../assets/img/settings.png">&nbsp;Manage</a></li>
                    <li><a href="#" ><img src="<?= URL ?>../assets/img/settings.png">&nbsp;Settings</a></li>
                </ul>
            </div>
            <div class="main_content">
                <div class="header">
                    <nav class="navbar navbar">
                        <div class="container-fluid">
                            <!--<div class="navbar-form navbar-left ">
                                <div class="boxcontainer">
                                    <table class="elementcontainer">
                                        <tr>
                                            <td>
                                                <a href="#"> <i class="fa fa-search" aria-hidden="true"></i></a></td>
                                            <td>
                                                <input type="text" class="example" placeholder="Search Employee, Department, Designation,Shift......." name="search">
                                            </td>
                                    </table>
                                </div>
                            </div>-->
                            <ul class="nav navbar-nav navbar-right">
                                <li> <button id="myplan"> Upgrade</button></li>&nbsp;&nbsp;
                                <li><i class="fa fa-bell-o" aria-hidden="true"id="bell"></i>&nbsp;</li>
                                <li> <img src="<?= URL; ?>../assets/plugins/images/users/varun.jpg" alt="user-img" width="30"
                                          class="img-circle" id="photo" ></li>
                                <li id="name"><b>&nbsp;<?php echo $_SESSION['name']; ?></b></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <hr>
                <br>
            </div>
        </div>



        <div class="col-md-6" id="addemp"><a href="<?php echo URL; ?>Userprofiles/employeelist" style="color: #000"><i class="fa fa-chevron-left" id="arrow">&nbsp;&nbsp;&nbsp;<b>Employee List</b></i></a></div>
        <div class="col-md-6" >
            <div class="col-xs-8" id="import"><i class="fa fa-download">&nbsp;&nbsp;Import employee</i></div>
            <div class="col-xs-4" id="self"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;Self Registration</i></div>
        </div><hr>
        <div class="main_content2">
            <div class="container box">


                <form method="post"   class="form-inline" id="form" style="padding-left: 20%;">
                    <div id="details" >
                        <div align="center">
                            <ul class="nav navbar-nav" style="padding-left: 12%;">
                                <li class="nav-item1">
                                    <a class="nav-link active_tab1" id="list_personal_details">Personal Details</a>
                                </li>
                                <li class="nav-item2">
                                    <a href="C:/Users/HP/Downloads/attendance/personal.html" class="nav-link inactive_tab1" id="list_company_details">Company Details</a>
                                </li>
                                <li class="nav-item3">
                                    <a class="nav-link inactive_tab1" id="list_geo_details">Geo Center</a>
                                </li>
                            </ul></div></div>
                    <br><br><br>
                    <div class="tab-content" style="margin-top:16px;">
                        <div class="tab-pane active" id="personal_details">
                            <div class="row">

<div class="col-md-6">
<div class="form-group label-floating">
 <div id="profile" style="padding-left:40%;">
                                    <img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/profile.png" alt="user-img" 
                                         class="img-circle" ><br>

                                </div><br>
                               <!-- <a href="#" id="edit" style="padding-left:44%;"><i class="fa fa-pencil" aria-hidden="true">&nbsp;&nbsp;Edit</i></a>-->
                               <span class="btn1 fa fa-pencil" style="color:purple;margin-left:20px">
                                                <input type="file"  name="profile" id="profile"  onchange="changeImgUpload1(this)" file-upload accept="image/*">
                                            </span>
</div>
</div>
</div>

                                <br><br>
                                <div class="form-group">
                                    Full Name<span style="color:red">*</span><br>

                                    <input type="text" class="form-control alpha"  id="firstName"  autocomplete="off">
                                    <span id="firstName_error" class="error_form"></span>
                                </div>
                                <div class="form-group" style="padding-left: 50px;">
                                    Employee ID (Optional)<br>
                                    <input type="text" class="form-control"  id="ecode" autocomplete="off">

                                </div><br><br><br>
                                <div class="form-group">
                                    Phone Number<span style="color:red">*</span><br>
                                    <input type="text" class="form-control numeric" id="cont" autocomplete="off">
                                    <span id="cont_error" class="error_form"></span>

                                </div>
                                <div class="form-group" style="padding-left: 50px;">
                                    Email Address(Optional)<br>
                                    <input type="email" class="form-control" id="email" >
                                    <span id="email_error" class="error_form"></span>

                                </div><br><br><br>
                                <div class="form-group">
                                    Country<span style="color:red">*</span><br>
                                    <select id="country" title="Please fill the required field" class="form-control">
                                        <span id="country_error" class="error_form"></span>

                                        <option value="0">-Select-</option>
                                        <?php
                                        $data = json_decode(getAllCountries());
                                        for ($i = 0; $i < count($data); $i++)
                                            echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                        ?>
                                    </select>
                                </div><br><br><br>


                                <div class="form-group">
                                    Password<span style="color:red">*</span><i class="fa fa-lock" id="pswrd"></i><br>
                                    <input type="password" class="form-control" id="password" autocomplete="off">
                                    <span id="password_error" class="error_form"></span>
                                </div>
                                <div class="form-group" style="padding-left: 50px;">
                                    Confirm Password<span style="color:red">*</span><i class="fa fa-lock" id="cpswrd"></i><br>
                                    <input type="password" class="form-control" id="cpassword" autocomplete="off">
                                    <span id="cpassword_error" class="error_form"></span>
                                </div><br><br><br>


                                <!--Id not change-->

                                <div class="form_button" style="padding-left: 88%;">
                                    <button type="button" name="submitbtn" class="form-group btn btn-success" id="submitbtn" style="width: 100%; padding:10%; font-size:16px;">Next</button>
                                </div>

                            </div>
                        </div>


                        <div class="tab-pane fade" id="company_details" style="margin-top:18px;">
                            <div class="form-group">
                                Department<span style="color:red">*</span><br>
                                
                                   <select class="form-control" id="dept" style="width: 320px;height: 49px;border-radius: 4px;">
                                                <option value="0">-Select-</option>
                                                <?php
                                                $data= json_decode(getAllDept($_SESSION['orgid']));
                                                for($i=0;$i<count($data);$i++)
                                                    echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                                ?>
                                            </select>
                                <span id="dept_error" class="error_form"></span>
                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Designation<span style="color:red">*</span><br>
                               
                                   <select class="form-control" id="desg" style="width: 320px;  height: 49px;border-radius: 4px;">
                                                    <option value="0">-Select-</option>
                                                    <?php
                                                    $data= json_decode(getAllDesg($_SESSION['orgid']));
                                                    for($i=0;$i<count($data);$i++)
                                                        echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                                    ?>
                                                </select>
                                <span id="desg_error" class="error_form"></span>
                            </div><br><br><br>


                            <div class="form-group">
                                Shift<span style="color:red">*</span><br>
                               <!-- <input type="text" class="form-control" id="shift" autocomplete="off">-->
                               <select class="form-control" id="shift" style="width: 320px;  height: 49px;border-radius: 4px;">
                                                    <option value="0">-Select-</option>
                                                    <?php
                                                    $data= json_decode(getAllShift($_SESSION['orgid']));
                                                    for($i=0;$i<count($data);$i++)
                                                        echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                                    ?>
                                                </select>
                                <span id="shift_error" class="error_form"></span>

                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Date of Joining<br>
                                <input type="text" class="form-control" id="doj" autocomplete="off">
                                <span id="doj_error" class="error_form"></span>
                            </div><br><br><br>

                            <div class="form-group">
                                Entitled Leave/Year<span style="color:red">*</span><br>
                                <input type="text" class="form-control numeric1" id="entitledleave" autocomplete="off">
                                <span id="entitledleave_error" class="error_form"></span>
                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Entitled Leave This Year<span style="color:red">*</span><br>
                                <input type="text" class="form-control numeric2" id="balanceleave" autocomplete="off">
                                <span id="balanceleave_error" class="error_form"></span>
                            </div><br><br><br>

                            <div class="form-group">
                                Hourly rate(Optional)<br>
                                <input type="text" class="form-control" id="hourlyrate" autocomplete="off" >
                                <span id="hourlyrate_error" class="error_form"></span>
                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Permission<br>
                                <select class="form-control" id="sstatus" >
                                    <option value='1' >Admin - <small>for App only</small>
                                    </option>
                                    <option value='2' >Dept. Head
                                    </option>
                                    <option value='0' selected>User</option>
                                </select>
                            </div>
                            <br><br>  <br>
                            <div class="form_button1" style="padding-left: 51%;">
                                <button type="button" name="previous_btn_company_details" class="btn-danger btn" id="previous_btn_company_details" style="width: 17%; padding:1%; font-size:16px;">Back</button>


                                <button type="button" name="btn_company_details" class="btn btn-success" id="btn_company_details"style="width: 17%; padding:1%; font-size:16px;">Next</button>
                            </div>

                            <br />
                        </div>


                        <div class="tab-pane fade" id="geo_details"style="margin-top:16px;margin-left: 10%">

                            <div class="form-group">
                                Geo Center<br>
                                <select id="areaAssign" title="Please fill the required field" class="form-control">
                                    <option value="0">-Select-</option>
                                    <?php
                                    $data = json_decode(getAllCountries());
                                    for ($i = 0; $i < count($data); $i++)
                                        echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                                    ?>
                                </select></option>
                                </select>
                                <span id="geo_error" class="error_form"></span>
                            </div><br><br><br>
                            <!--<div class="form-group">
                                <textarea  id="geocenter"></textarea>
                            </div>-->
                            <br><br>
                            <!--Id not change-->
                            <div class="form_button2" style="padding-left: 47%;">
                                <button  type="button" name="previous_btn_geo_details" id="previous_btn_geo_details"class="btn-danger btn" style="width: 15%; padding:1%; font-size:16px;">Back</button>


                                <button type="button" name="btn_geo_details"id="btn_geo_details"class="btn btn-success" style="width: 15%; padding:1%; font-size:16px;">submit</button>
                            </div>



                            <br />
                        </div>



                </form>
            </div>    </div>
        <script type="text/javascript" src="<?php echo URL; ?>../assets/responsive/jquery-1.11.1.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo URL; ?>../assets/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.lwMultiSelect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?= URL ?>../assets/datepicker/bootstrap-datepicker.js"></script>

        <script>

            $(document).ready(function () {

                $('#submitbtn').click(function () {
                    var firstName_error = '';
                    var cont_error = '';
                    var country_error = '';
                    var email_error = '';
                    var password_error = '';
                    var cpassword_error = '';
                    var firstName_p = /^[A-Za-z.]*$/;
                    var cont_p = /^[0-9-+]+$/;
                    var email_p = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    //alert($.trim($('#password').val()).length);
                    if ($.trim($('#firstName').val()).length == 0)
                    {
                        $("#firstName_error").html("<br>Please enter Full Name");
                        $("#firstName_error").css("color", "#F90A0A");
                        $("#firstName_error").show();
                        $("#firstName").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!firstName_p.test($('#firstName').val()))
                        {
                            $("#firstName_error").html("<br>Please valid format of Full Name");
                            $("#firstName_error").css("color", "#F90A0A");
                            $("#firstName_error").show();
                            $("#firstName").css("border", "2px solid #F90A0A");
                            return false;
                        } else
                        {
                            firstName_error = '';

                            $("#firstName_error").hide();
                            $("#firstName").css("border", "2px solid #34F458");
                            $('#firstName_error').text(firstName_error);
                            $('#firstName').removeClass('has-error');

                        }
                    }

                    if ($.trim($('#cont').val()).length < 10 || $.trim($('#cont').val()).length > 15)
                    {
                        $("#cont_error").html("<br>Please enter atleast 10 Integer");
                        $("#cont_error").css("color", "#F90A0A");
                        $("#cont_error").show();
                        $("#cont").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!cont_p.test($('#cont').val()))
                        {
                            $("#cont_error").html("<br>Please valid format of Phone Number");
                            $("#cont_error").css("color", "#F90A0A");
                            $("#cont_error").show();
                            $("#cont").css("border", "2px solid #F90A0A");
                            return false;
                        } else
                        {
                            $("#cont_error").hide();
                            $("#cont").css("border", "2px solid #34F458");
                            $('#cont_error').removeClass('has-error');
                        }
                    }




                    if ($('#email').val() == 0)
                    {


                    } else
                    {
                        if (!email_p.test($('#email').val()))
                        {
                            $("#email_error").html("<br>Please enter valid format for Email Address");
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



                    if ($.trim($('#country').val()) == 0)
                    {
                        $("#country_error").html("<br>Please select the Country");
                        $("#country_error").css("color", "#F90A0A");
                        $("#country_error").show();
                        $("#country").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#country_error").hide();
                        $("#country").css("border", "2px solid #34F458");
                        $('#country').removeClass('has-error');
                    }


                    if ($.trim($('#password').val()).length == 0)
                    {
                        $("#password_error").html("<br>Please enter Password");
                        $("#password_error").css("color", "#F90A0A");
                        $("#password_error").show();
                        $("#password").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#password_error").hide();
                        $("#password").css("border", "2px solid #34F458");
                        $('#password').removeClass('has-error');
                    }

                    if ($.trim($('#cpassword').val()).length == 0)
                    {
                        $("#cpassword_error").html("<br>Please enter Confirm Password");
                        $("#cpassword_error").css("color", "#F90A0A");
                        $("#cpassword_error").show();
                        $("#cpassword").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if ($('#password').val() !== $('#cpassword').val())
                        {
                            $("#cpassword_error").html("<br>Re-type Confirm password should be same");
                            $("#cpassword_error").css("color", "#F90A0A");
                            $("#cpassword_error").show();
                            $("#cpassword").css("border", "2px solid #F90A0A");
                            return false;
                        } else
                        {
                            $("#cpassword_error").hide();
                            $("#cpassword").css("border", "2px solid #34F458");
                            $('#cpassword').removeClass('has-error');
                        }
                    }

                    if (firstName_error != '')
                    {
                        return false;
                    } else
                    {
                        $('#list_personal_details').removeClass('active active_tab1');
                        $('#list_personal_details').removeAttr('href data-toggle');
                        $('#personal_details').removeClass('active');
                        $('#list_personal_details').addClass('inactive_tab1');
                        $('#list_company_details').removeClass('inactive_tab1');
                        $('#list_company_details').addClass('active_tab1 active');
                        $('#list_company_details').attr('href', '#company_details');
                        $('#list_company_details').attr('data-toggle', 'tab');
                        $('#company_details').addClass('active in');
                    }
                });

                $('#previous_btn_company_details').click(function () {
                    $('#list_company_details').removeClass('active active_tab1');
                    $('#list_company_details').removeAttr('href data-toggle');
                    $('#company_details').removeClass('active in');
                    $('#list_company_details').addClass('inactive_tab1');
                    $('#list_personal_details').removeClass('inactive_tab1');
                    $('#list_personal_details').addClass('active_tab1 active');
                    $('#list_personal_details').attr('href', '#personal_details');
                    $('#list_personal_details').attr('data-toggle', 'tab');
                    $('#personal_details').addClass('active in');
                });

                $('#btn_company_details').click(function () {
                    var dept_error = '';
                    var desg_error = '';
                    var shift_error = '';
                    var entitledleave_error = '';
                    var balanceleave_error = '';
                    var entitledleave_p = /^[0-9-+]+$/;
                    var balanceleave_p = /^[0-9-+]+$/;
                    if ($.trim($('#dept').val()) == 0)
                    {
                        $("#dept_error").html("<br>Please select Department");
                        $("#dept_error").css("color", "#F90A0A");
                        $("#dept_error").show();
                        $("#dept").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#dept_error").hide();
                        $("#dept").css("border", "2px solid #34F458");
                        $('#dept').removeClass('has-error');
                    }

                    if ($.trim($('#desg').val()) == 0)
                    {
                        $("#desg_error").html("<br>Please select Designation");
                        $("#desg_error").css("color", "#F90A0A");
                        $("#desg_error").show();
                        $("#desg").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#desg_error").hide();
                        $("#desg").css("border", "2px solid #34F458");
                        $('#desg').removeClass('has-error');
                    }

                    if ($.trim($('#shift').val()) == 0)
                    {
                        $("#shift_error").html("<br>Please select Shift");
                        $("#shift_error").css("color", "#F90A0A");
                        $("#shift_error").show();
                        $("#shift").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#shift_error").hide();
                        $("#shift").css("border", "2px solid #34F458");
                        $('#shift').removeClass('has-error');
                    }



                    if ($.trim($('#entitledleave').val()).length == 0)
                    {
                        $("#entitledleave_error").html("<br>Please enter Entitled Leave/Year");
                        $("#entitledleave_error").css("color", "#F90A0A");
                        $("#entitledleave_error").show();
                        $("#entitledleave").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!entitledleave_p.test($('#entitledleave').val()))
                        {
                            $("#entitledleave_error").html("<br>Please valid format Entitled Leave/Year");
                            $("#entitledleave_error").css("color", "#F90A0A");
                            $("#entitledleave_error").show();
                            $("#entitledleave").css("border", "2px solid #F90A0A");
                            return false;
                        } else
                        {
                            $("#entitledleave_error").hide();
                            $("#entitledleave").css("border", "2px solid #34F458");
                            $('#entitledleave').removeClass('has-error');
                        }
                    }

                    if ($.trim($('#balanceleave').val()).length == 0)
                    {
                        $("#balanceleave_error").html("<br>Please enter Entitled Leave This Year");
                        $("#balanceleave_error").css("color", "#F90A0A");
                        $("#balanceleave_error").show();
                        $("#balanceleave").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!balanceleave_p.test($('#balanceleave').val()))
                        {
                            $("#balanceleave_error").html("<br>Please valid format Entitled Leave This Year");
                            $("#balanceleave_error").css("color", "#F90A0A");
                            $("#balanceleave_error").show();
                            $("#balanceleave").css("border", "2px solid #F90A0A");
                            return false;
                        } else
                        {
                            $("#balanceleave_error").hide();
                            $("#balanceleave").css("border", "2px solid #34F458");
                            $('#balanceleave').removeClass('has-error');
                        }
                    }


                    if (dept_error != '' || desg_error != '')
                    {

                        return false;
                    } else

                    {

                        $('#list_company_details').removeClass('active active_tab1');
                        $('#list_company_details').removeAttr('href data-toggle');
                        $('#company_details').removeClass('active');
                        $('#list_company_details').addClass('inactive_tab1');
                        $('#list_geo_details').removeClass('inactive_tab1');
                        $('#list_geo_details').addClass('active_tab1 active');
                        $('#list_geo_details').attr('href', '#geo_details');
                        $('#list_geo_details').attr('data-toggle', 'tab');
                        $('#geo_details').addClass('active in');
                    }
                });



                $('#previous_btn_geo_details').click(function () {
                    $('#list_geo_details').removeClass('active active_tab1');
                    $('#list_geo_details').removeAttr('href data-toggle');
                    $('#geo_details').removeClass('active in');
                    $('#list_geo_details').addClass('inactive_tab1');
                    $('#list_company_details').removeClass('inactive_tab1');
                    $('#list_company_details').addClass('active_tab1 active');
                    $('#list_company_details').attr('href', '#company_details');
                    $('#list_company_details').attr('data-toggle', 'tab');
                    $('#company_details').addClass('active in');
                });

                $('#btn_geo_details').click(function () {
                    alert();
                    var fname = $('#firstName').val().trim();
                    var emp_code = $('#ecode').val();
                    var contact = $('#cont').val();
                    var country = $('#country').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var dept = $('#dept').val();
                    var desg = $('#desg').val();
                    var doj = $('#doj').val();

                    var shift = $('#shift').val();
                    var eleave = $('#entitledleave').val();
                    var bleave = $('#balanceleave').val();
                    var hrate = $('#hourlyrate').val();
                    var permission = $('#sstatus').val();
                    var formdata = new FormData();
                    //formdata.append("file", document.getElementById('profile').files[0]);
                    //formdata.append('prof',$('#profile').prop("files")[0]);
                    formdata.append('fname', fname);
                    formdata.append('emp_code', emp_code);
                    formdata.append('contact', contact);
                    formdata.append('country', country);
                    formdata.append('email', email);
                    formdata.append('password', password);
                    // formdata.append('lname',lname);
                    formdata.append('dept', dept);
                    formdata.append('desg', desg);
                    formdata.append('doj', doj);
                    formdata.append('shift', shift);
                    formdata.append('eleave', eleave);
                    formdata.append('bleave', bleave);
                    formdata.append('hrate', hrate);
                    formdata.append('permission', permission);
                    $.ajax({
                        url: "<?php echo URL; ?>userprofiles/insertemployeedetails",
                        // url: "<?php //echo URL; ?>userprofilesnew/insertUsermasternew1",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        datatype: "json",
                        type: "post",
                        success: function (result) {
                            alert("inserted");
                        },
                        error: function (result) {
                            alert("not inserted");
                        }
                    });

                });

            });
        </script> 

        <script type="text/javascript">
            // run pre selected options
            /*$('#areaAssign').multiSelect({
             
             });*/


            $(document).ready(function () {

                $('#areaAssign').lwMultiSelect({

                    maxSelect: 10, //0 = no restrictions
                    maxText: 'Available Geo-fence'
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
                $(".numeric1").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                    // $(".error").css("display", ret ? "none" : "inline");
                    return ret;
                });
                $(".numeric1").bind("paste", function (e) {
                    return false;
                });
                $(".numeric1").bind("drop", function (e) {
                    return false;
                });
            });


            var specialKeys = new Array();
            specialKeys.push(8); //Backspace
            $(function () {
                $(".numeric2").bind("keypress", function (e) {
                    var keyCode = e.which ? e.which : e.keyCode
                    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                    // $(".error").css("display", ret ? "none" : "inline");
                    return ret;
                });
                $(".numeric2").bind("paste", function (e) {
                    return false;
                });
                $(".numeric2").bind("drop", function (e) {
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
        <script>
        $(document).ready(function(){
            $("#doj").datepicker({dateFormat:'yy-mm-dd'});
            
        });
        </script>
    </body>
</html>
