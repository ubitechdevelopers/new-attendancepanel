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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
 <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/styles.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300%7CMaterial+Icons' rel='stylesheet' type='text/css'>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="sidebar-wrapper">
            <div class="logo">
                <img src="http://ubiattendance.zentylpro.com/assets/img/newlogo.png" style="width: 60%;">
                <br> <br>
                <ul>
                    <li><a href="C:/Users/HP/Downloads/attendance/dashboard1.html" ><img src="<?=URL?>../assets/img/dash.png">&nbsp;&nbsp;Dashboard</a></li>
                    <li><a href="<?=URL?>/Userprofiles/employeelist"><img src="<?=URL?>../assets/img/employee.png">&nbsp;&nbsp; Employee</a></li>
                    <li><a href="<?=URL?>" ><img src="<?=URL?>../assets/img/attendance.png">&nbsp;&nbsp;Attendance</a></li>
                    <li><a href="#" ><img src="<?=URL?>../assets/img/report.png">&nbsp;&nbsp;Summary Report</a></li>
                    <li><a href="#" ><img src="<?=URL?>../assets/img/clients.png">&nbsp;&nbsp;Clients</a></li>
                    <li><a href="#" ><img src="<?=URL?>../assets/img/visits.png">&nbsp;&nbsp;Visits</a></li>
                    <li><a href="#" ><img src="<?=URL?>../assets/img/leaves.png">&nbsp;&nbsp;Leaves</a></li>
                    <li><a href="#" ><img src="<?=URL?>../assets/img/pay.png">&nbsp;&nbsp;Payroll</a></li>
                    <li><a href="<?=URL;?>Managesettings" ><img src="<?=URL?>../assets/img/settings.png">&nbsp;Manage</a></li>
                    <li><a href="#" ><img src="<?=URL?>../assets/img/settings.png">&nbsp;Settings</a></li>
                </ul>
            </div>
            <div class="main_content">
                <div class="header">
                  <nav class="navbar navbar">
  <div class="container-fluid">
<div class="navbar-form navbar-left ">
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
</div>
      <ul class="nav navbar-nav navbar-right">
          <li> <button id="myplan"> Upgrade</button></li>&nbsp;&nbsp;
          <li><i class="fa fa-bell-o" aria-hidden="true"id="bell"></i>&nbsp;</li>
          <li> <img src="<?=URL;?>../assets/plugins/images/users/varun.jpg" alt="user-img" width="30"
                                class="img-circle" id="photo" ></li>
                                <li id="name"><b>&nbsp;<?php echo $_SESSION['name'];?></b></li>
  </ul>
  </div>
</nav>
 </div>
                <hr>
        <br>
            </div>
        </div>


       
          <div class="col-md-6" id="addemp"><i class="fa fa-chevron-left" id="arrow">&nbsp;&nbsp;&nbsp;<b>Employee List</b></i></div>
        <div class="col-md-6" >
            <div class="col-xs-8" id="import"><i class="fa fa-download">&nbsp;&nbsp;Import employee</i></div>
            <div class="col-xs-4" id="self"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;Self Registration</i></div>
        </div><br><br><hr>
        <div class="main_content2">
            <div class="container box">


          <form method="post"   class="form-inline" id="form" style="padding-left: 20%;">
                    <div id="details" >
                        <div align="center">
                            <ul class="nav navbar-nav" style="padding-left: 12%;">
                                <li class="nav-item1">
                                    <a class="nav-link active_tab1" id="list_login_details">Personal Details</a>
                                </li>
                                <li class="nav-item2">
                                    <a href="C:/Users/HP/Downloads/attendance/personal.html" class="nav-link inactive_tab1" id="list_personal_details">Company Details</a>
                                </li>
                                <li class="nav-item3">
                                    <a class="nav-link inactive_tab1" id="list_contact_details">Geo Center</a>
                                </li>
                            </ul></div></div>




       <br><br>
                    <div class="tab-content" style="margin-top:16px;">
                        <div class="tab-pane active" id="login_details">
                            

                                <div id="profile" style="padding-left:24%;">
                                    <img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/profile.png" alt="user-img" 
                                         class="img-circle" ><br>
                                    
                                </div><br>
                            <a href="#" id="edit" style="padding-left:27%;"><i class="fa fa-pencil" aria-hidden="true">&nbsp;&nbsp;Edit</i></a>
                            <br><br>
                            <div class="form-group">
                                Full Name<br>

                                <input type="text" class="form-control"  id="firstName"  autocomplete="off">
                                <span id="firstName_error" class="error_form"></span>
                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Employee ID (Optional)<br>
                                <input type="text" class="form-control"  id="ecode" autocomplete="off">

                            </div><br><br>
                            <div class="form-group">
                                Phone Number<br>
                                <input type="text" class="form-control numeric" id="cont" autocomplete="off">
                                <span id="cont_error" class="error_form"></span>

                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Email Address<br>
                                <input type="email" class="form-control" id="email" >
                                <span id="email_error" class="error_form"></span>

                            </div><br><br>
          <div class="form-group">
             Country<br>
              <select id="country" title="Please fill the required field" class="form-control">
               <span id="country_error" class="error_form"></span>

                    <option value="0">-Select-</option>
                    <?php
                    $data= json_decode(getAllCountries());
                    for($i=0;$i<count($data);$i++)
                      echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                    ?>
                   </select>
        </div><br><br>
          

          <div class="form-group">
                                Password<i class="fa fa-lock" id="pswrd"></i><br>
                                <input type="password" class="form-control" id="password" autocomplete="off">
                                <span id="password_error" class="error_form"></span>
                            </div>
                            <div class="form-group" style="padding-left: 50px;">
                                Confirm Password<i class="fa fa-lock" id="cpswrd"></i><br>
                                <input type="password" class="form-control" id="cpassword" autocomplete="off">
                                <span id="cpassword_error" class="error_form"></span>
                            </div><br><br>


<!--Id not change-->
                                       <br />
                            <div align="center">
                                <button type="button" name="submitbtn" class="form-group btn btn-success" id="submitbtn">Next</button>
                          </div>

                        </div>
                    </div>
         <div class="tab-pane fade" id="personal_details">
                    <div class="form-group">
                            Department<br>
                            <input type="text" class="form-control" id="dept"  autocomplete="off">
                            <span id="dept_error" class="error_form"></span>
                        </div>
                        <div class="form-group" style="padding-left: 50px;">
                            Designation<br>
                            <input type="text" class="form-control" id="desg" autocomplete="off">
                            <span id="desg_error" class="error_form"></span>
                        </div><br><br>


                        <div class="form-group">
                            Shift<br>
                            <input type="text" class="form-control" id="shift" autocomplete="off">
                            <span id="shift_error" class="error_form"></span>

                        </div>
                        <div class="form-group" style="padding-left: 50px;">
                            Date of Joining<br>
                            <input type="date" class="form-control" id="doj" autocomplete="off">
                            <span id="doj_error" class="error_form"></span>
                        </div><br><br>

                        <div class="form-group">
                            Entitled Leave/Year<br>
                            <input type="text" class="form-control" id="entitledleave" autocomplete="off">
                            <span id="entitledleave_error" class="error_form"></span>
                        </div>
                        <div class="form-group" style="padding-left: 50px;">
                            Entitled Leave This Year<br>
                            <input type="text" class="form-control" id="balanceleave" autocomplete="off">
                            <span id="balanceleave_error" class="error_form"></span>
                        </div><br><br>

                        <div class="form-group">
                            Hourly rate(Optional)<br>
                            <input type="text" class="form-control" id="hourlyrate" autocomplete="off" >
                            <span id="hourlyrate_error" class="error_form"></span>
                        </div>
                        <div class="form-group" style="padding-left: 50px;">
                            Permission<i class="fa fa-angle-down" id="permission1"></i><br>
                            <input type="text" class="form-control" id="sstatus" placeholder="Select Permission">
                        </div><br><br>  



                        <div align="center">




                            <button name="previous_btn_personal_details" class="btn btn-secondary" id="previous_btn_personal_details">Back</button>


                            <button name="btn_personal_details" class="btn btn-success" id="btn_personal_details">Next</button>

                        </div>
                        <br />
                    </div>


                    <div class="tab-pane fade" id="contact_details">

                        <div class="form-group">
                            Geo Center<br>
                            <select id="geo">
                                <option>Morar</option>
                                <option>City Center</option>
                                <option>Jiwaji University</option>
                                <option>Db Mall</option>
                            </select>
                            <span id="geo_error" class="error_form"></span>
                        </div><br><br><br>
                        <div class="form-group">
                            <textarea  id="geocenter"></textarea>
                        </div>
                        <br><br>
                        <!--Id not change-->

                        <button name="previous_btn_contact_details" id="previous_btn_contact_details"class="btn btn-secondary">Back</button>


                        <button name="btn_contact_details"id="btn_contact_details"class="btn btn-success">submit</button>




                        <br />
                    </div>



                </form>
            </div>    </div>


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
                   
                    var email_p = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
                    //alert($.trim($('#password').val()).length);
                    if ($.trim($('#firstName').val()).length == 0)
                    {
                        $("#firstName_error").html("<br>required**");
                        $("#firstName_error").css("color", "#F90A0A");
                        $("#firstName_error").show();
                        $("#firstName").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!firstName_p.test($('#firstName').val()))
                        {
                            $("#firstName_error").html("<br>invalid name");
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

                    if ($.trim($('#cont').val()).length == 0)
                    {
                        $("#cont_error").html("<br>required**");
                        $("#cont_error").css("color", "#F90A0A");
                        $("#cont_error").show();
                        $("#cont").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!cont_p.test($('#cont').val()))
                        {
                            $("#cont_error").html("<br>invalid");
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

                    if ($.trim($('#email').val()).length == 0)
                    {
                        $("#email_error").html("<br>required**");
                        $("#email_error").css("color", "#F90A0A");
                        $("#email_error").show();
                        $("#email").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if (!email_p.test($('#email').val()))
                        {
                            $("#email_error").html("<br>invalid");
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

                   if ($.trim($('#country').val()).length == 0)
                    {
                        $("#country_error").html("<br>invalid");
                        $("#country_error").css("color", "#F90A0A");
                        $("#country_error").show();
                        $("#country").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        country_error = '';
                        $('#country_error').text(password_error);
                        $('#country').removeClass('has-error');
                    }

                    if ($.trim($('#password').val()).length == 0)
                    {
                        $("#password_error").html("<br>invalid");
                        $("#password_error").css("color", "#F90A0A");
                        $("#password_error").show();
                        $("#password").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        password_error = '';
                        $('#password_error').text(password_error);
                        $('#password').removeClass('has-error');
                    }

                    if ($.trim($('#cpassword').val()).length == 0)
                    {
                        $("#cpassword_error").html("<br>required**");
                        $("#cpassword_error").css("color", "#F90A0A");
                        $("#cpassword_error").show();
                        $("#cpassword").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        if ($('#password').val() !== $('#cpassword').val())
                        {
                            $("#cpassword_error").html("<br>invalid name");
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
                        $('#list_login_details').removeClass('active active_tab1');
                        $('#list_login_details').removeAttr('href data-toggle');
                        $('#login_details').removeClass('active');
                        $('#list_login_details').addClass('inactive_tab1');
                        $('#list_personal_details').removeClass('inactive_tab1');
                        $('#list_personal_details').addClass('active_tab1 active');
                        $('#list_personal_details').attr('href', '#personal_details');
                        $('#list_personal_details').attr('data-toggle', 'tab');
                        $('#personal_details').addClass('active in');
                    }
                });

                $('#previous_btn_personal_details').click(function () {
                    $('#list_personal_details').removeClass('active active_tab1');
                    $('#list_personal_details').removeAttr('href data-toggle');
                    $('#personal_details').removeClass('active in');
                    $('#list_personal_details').addClass('inactive_tab1');
                    $('#list_login_details').removeClass('inactive_tab1');
                    $('#list_login_details').addClass('active_tab1 active');
                    $('#list_login_details').attr('href', '#login_details');
                    $('#list_login_details').attr('data-toggle', 'tab');
                    $('#login_details').addClass('active in');
                });

                $('#btn_personal_details').click(function () {
                    var dept_error = '';
                    var desg_error = '';
                    var shift_error = '';
                    var doj_error = '';
                    var entitledleave_error = '';
                    var balanceleave_error = '';
                    var hourlyrate_error = '';
                    if ($.trim($('#dept').val()).length == 0)
                    {
                        $("#dept_error").html("<br>required**");
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

                    if ($.trim($('#desg').val()).length == 0)
                    {
                        $("#desg_error").html("<br>required**");
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

                    if ($.trim($('#shift').val()).length == 0)
                    {
                        $("#shift_error").html("<br>required**");
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

                    if ($.trim($('#doj').val()).length == 0)
                    {
                        $("#doj_error").html("<br>required**");
                        $("#doj_error").css("color", "#F90A0A");
                        $("#doj_error").show();
                        $("#doj").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#doj_error").hide();
                        $("#doj").css("border", "2px solid #34F458");
                        $('#doj').removeClass('has-error');
                    }

                    if ($.trim($('#entitledleave').val()).length == 0)
                    {
                        $("#entitledleave_error").html("<br>required**");
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

                    if ($.trim($('#balanceleave').val()).length == 0)
                    {
                        $("#balanceleave_error").html("<br>required**");
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

                    if ($.trim($('#hourlyrate').val()).length == 0)
                    {
                        $("#hourlyrate_error").html("<br>required**");
                        $("#hourlyrate_error").css("color", "#F90A0A");
                        $("#hourlyrate_error").show();
                        $("#hourlyrate").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#hourlyrate_error").hide();
                        $("#hourlyrate").css("border", "2px solid #34F458");
                        $('#hourlyrate').removeClass('has-error');
                    }
                    if (dept_error != '' || desg_error != '')
                    {
                        return false;
                    } else
                  
                  
                    
                    
                    {
                        $('#list_personal_details').removeClass('active active_tab1');
                        $('#list_personal_details').removeAttr('href data-toggle');
                        $('#personal_details').removeClass('active');
                        $('#list_personal_details').addClass('inactive_tab1');
                        $('#list_contact_details').removeClass('inactive_tab1');
                        $('#list_contact_details').addClass('active_tab1 active');
                        $('#list_contact_details').attr('href', '#contact_details');
                        $('#list_contact_details').attr('data-toggle', 'tab');
                        $('#contact_details').addClass('active in');
                    }
                });



                $('#previous_btn_contact_details').click(function () {
                    $('#list_contact_details').removeClass('active active_tab1');
                    $('#list_contact_details').removeAttr('href data-toggle');
                    $('#contact_details').removeClass('active in');
                    $('#list_contact_details').addClass('inactive_tab1');
                    $('#list_personal_details').removeClass('inactive_tab1');
                    $('#list_personal_details').addClass('active_tab1 active');
                    $('#list_personal_details').attr('href', '#personal_details');
                    $('#list_personal_details').attr('data-toggle', 'tab');
                    $('#personal_details').addClass('active in');
                });

                $('#btn_contact_details').click(function () {

                        if ($.trim($('#geo').val()).length == 0)
                    {
                        $("#geo_error").html("<br>required**");
                        $("#geo_error").css("color", "#F90A0A");
                        $("#geo_error").show();
                        $("#geo").css("border", "2px solid #F90A0A");
                        return false;
                    } else
                    {
                        $("#geo_error").hide();
                        $("#geo").css("border", "2px solid #34F458");
                        $('#geo').removeClass('has-error');
                    }
                    if (geo_error !=='')
                    {
                        return false;
                    } else
   
                       {
                        $('#btn_contact_details').attr("disabled", "disabled");
                        $(document).css('cursor', 'prgress');
                        $("#form").submit();
                    }

                });

            });
        </script>
    </body>
</html>
