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


       
          <div class="col-md-6" id="addemp"><i class="fa fa-chevron-left" id="arrow">&nbsp;&nbsp;&nbsp;<b>Add Employee</b></i></div>
          <div class="col-md-6" >
            <div class="col-xs-8" id="import"><i class="fa fa-download">&nbsp;&nbsp;Import employee</i></div>
            <div class="col-xs-4" id="self"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;Self Registration</i></div>
          </div><br><br><br><br><hr id="emp"><br><br>



          <div class="col-xs-12"  id="details">
          <p> 
           <span class="active1">   <a href="#">Personal Details </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  
            <span>     <a href="C:/Users/HP/Downloads/attendance/personal.html">Company Details</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
           <span> <a href="#">Geo Center</a></span></p>
          </div><br><br><br><br>





       <form class="form-inline" id="form">
          <div class="form-group">
              Full Name<br>
              
              <input type="text" class="form-control" id="firstName" autocomplete="off">
                <span id="firstName_error" class="error_form"></span>
             
               
        </div>
          <div class="form-group" style="padding-left: 50px;">
              Employee ID (Optional)<br>
                <input type="text" class="form-control" id="ecode" autocomplete="off">
               
          </div><br><br>


          <div class="form-group">
             Phone Number<br>
                <input type="text" class="form-control numeric" id="cont" autocomplete="off">
                <span id="cont_error" class="error_form"></span>
               
        </div>
          <div class="form-group" style="padding-left: 50px;">
              Email Address<br>
                <input type="email" class="form-control" id="email">
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
           <div class="form-group" id="back">

            <a href="<?=URL;?>Userprofiles/employeelist"><button class="btn btn-secondary">Back</button></a>
              
        </div>
          <div class="form-group" id="submitbtn">
            <button class="btn btn-success">Next</button>
              
          </div>

        </form>


    
      
      
       </div>
<script type="text/javascript">
   $('#details').on('click', 'span', function(){
        $('#details span.active1').removeClass('active1');
        $(this).addClass('active1');
    })
    

$(function(){
          $("#firstName_error").hide();
          $("#cont_error").hide();
          $("#email_error").hide();
          $("#country_error").hide();
          $("#password_error").hide();
          $("#cpassword_error").hide();
          
          var error_fname=false;
          var error_cont=false;
          var error_email=false;
          var error_country=false;
          var error_password=false;
          var error_cpassword=false;
          
          $("#firstName").focusout(function(){
              check_fname();
          });
          $("#cont").focusout(function(){
              check_cont();
          });
          $("#country").focusout(function(){
              check_country();
          });
          $("#email").focusout(function(){
              check_email();
          });
          $("#password").focusout(function(){
              check_password();
          });
          $("#cpassword").focusout(function(){
              check_cpassword();
          });
          function check_fname(){
              var pattern=/^[A-Za-z.]*$/;
              var fname = $("#firstName").val();
              if(pattern.test(fname) && fname !== ''){
                  $("#firstName_error").hide();
                   $("#firstName").css("border","2px solid #34F458");
                   
              }else{
                  $("#firstName_error").html("<br>should contain only characters");
                   $("#firstName_error").css("color","#F90A0A");
                  $("#firstName_error").show();
                  $("#firstName").css("border","2px solid #F90A0A");
                  error_fname = true;
              }
          }
          
           function check_cont(){
              var pattern=/^[0-9-+]+$/;
              var cont = $("#cont").val();
              if(pattern.test(cont) && cont !== ''){
                   $("#cont_error").hide();
                  $('#cont').css("border","2px solid #34F458");

              }else{
                  $("#cont_error").html("<br>should contain only integers");
                   $("#cont_error").css("color","#F90A0A");
                  $("#cont_error").show();
                  $("#cont").css("border","2px solid #F90A0A");
                  error_cont = true;
              }
          }
          
          function check_email(){
              var pattern=/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
              var email = $("#email").val();
              if(pattern.test(email)){
                  $("#email_error").hide();
                  $('#email').css("border","2px solid #34F458");
                  
              }else{
                 $("#email_error").html("<br>invalid email");
                  $("#email_error").css("color","#F90A0A");
                  $("#email_error").show();
                  $("#email").css("border","2px solid #F90A0A");
                  error_email = true;
              }
          }
          
          function check_country(){
              var  country= $("#country").val();
              if(country !== ''){
                  $("#country_error").hide();
                  $('#country').css("border","2px solid #34F458");
              }else{
                  $("#country_error").html("<br>required**");
                   $("#country_error").css("color","#F90A0A");
                  $("#country_error").show();
                  $("#country").css("border","2px solid #F90A0A");
                  error_country= true;
              }
          }
          
          function check_password(){

              var  password_length= $("#password").val().length;
              if(password_length < 8){
                $("#password_error").html("<br>atleast 8 characters");
                $("#password_error").css("color","#F90A0A");
                  $("#password_error").show();
                  $('#password').css("border","2px solid #F90A0A");
                  error_password = true;
              }else{
                  
                  $("#password_error").hide();
                  $("#password").css("border","2px solid #34F458");
                  
              }
          }
          
           function check_cpassword(){

              var  password= $("#password").val();
              var  cpassword= $("#cpassword").val();
              if(password !== cpassword){
                 $("#cpassword_error").html("<br>password not matched");
                 $("#cpassword_error").css("color","#F90A0A");
                  $("#cpassword_error").show();
                  $('#cpassword').css("border","2px solid #F90A0A");
                  error_cpassword = true;
              }else{
                  
                  $("#cpassword_error").hide();
                  $("#cpassword").css("border","2px solid #34F458");
                  
              }
          }
          
          $("#registration_form").submit(function(){
            error_fname=false;
            error_cont=false;
            error_email=false;
            error_country=false;
            error_password=false;
            error_cpassword=false;
            
            check_fname();
            check_cont();
            check_country();
            check_email();
            check_password();
            check_cpassword();
            
    
          });
      });
</script>





    </body>
</html>