<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link href="<?= URL ?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
      <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
      <style type="text/css">
         div.dataTables_wrapper div.dataTables_filter input {
         /* margin-left: 0.5em; */
         /* display: inline-block; */
         /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
         box-sizing: border-box;
         width: 25rem;
         border:none;
         border-radius: 4px;
         font-size: 16px;
         background-color: #e9f1e8;
         background-image: url('<?=URL?>../assets/icons/u_search.svg');
         background-position: 10px 12px;
         background-repeat: no-repeat;
         padding: 21px 20px 23px 40px;
         -webkit-transition: width 0.4s ease-in-out;
         transition: width 0.4s ease-in-out;
         }
         div.dataTables_wrapper div.dataTables_filter
         /* text-align: right; */
         margin-left: -104%!important;
         }
         input[class="checkbox"]{
         width: 1.2rem!important;
         height: 1.2rem!important;
         }
         #select_all{
         width: 1.2rem!important;
         height: 1.2rem!important;
         }
         table.dataTable>thead .sorting:after{
         display: none;
         }
         table.dataTable>thead .sorting:before{
         display: none;
         }
         table.dataTable>thead .sorting:before, table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:before, table.dataTable>thead .sorting_desc_disabled:after {
         display: none;
         }
         element.style {
         }
         .page-item.active .page-link {
         z-index: 3;
         color: #000;
         background-color: #e1ffe0;
         border-color: #e1ffe0;}
         table.dataTable thead th {
         border-top: none;
         color: #9FA2B4;
         font-size: 0.85rem;
         font-style: 'Poppins';
         }
         table.dataTable tbody {
         font-size: 0.85rem;
         font-family: 'Poppins',sans-serif;
         font-weight: 600;
         color: #3f424c;
         }
         .dot-button{
         width: 30px;
         height: 30px;
         border-radius: 50%;
         background-color: black;
         box-shadow: 0px 40px 0px black, 0px 80px 0px black;
         }
         a:hover {
         color: black;
         text-decoration: none;
         }
         .a{
         text-decoration: none;
         color: black;
         font-size: 1rem;
         font-family: 'Poppins',sans-serif;
         font-weight: 600;
         }
         .subhead
         {font-size: 18px;
         color: #828282;
         display: flex;
         cursor: pointer;
         text-decoration: none;
         font-weight: 500!important;
         font-family: 'Poppins',sans-serif;
         }
         .right{
         float: right;
         margin-right: 5px;
         margin-bottom: 5px;
         }
         .bttn
         {
         width: 9rem;
         font-weight: 500;
         font-size: 14px;
         height: 2.5rem;
         }
         .filtr
         {
         font-size: 0.8rem;
         font-weight: 500;
         }
         /*b{
         font-weight: 700!important;
         }*/
         body
         {
         font-family: 'Poppins',sans-serif;
         font-size: 14px;
         }
         #heading2 .active5 a{
         border-bottom: 3.5px solid green;
         /*border-radius: 3%;*/
         width: 100%;
         text-decoration: none;
         height: auto;
         font-weight: bold;
         color: black;
         }
         .checkbox
         {
         width: 1.2rem!important;
         height: 1.2rem!important;
         }
         .mobview{
         display: none;
         }
         @media only screen and (max-width: 600px) 
         {
         /*.uu1{
         display: none;
         }*/
         .mobview{
         display:unset!important;
         } 
         div.dataTables_wrapper div.dataTables_filter input{
         /*display: none;*/
         width: 13.5rem;
         }
         #columnv
         {
         display: none;}
         }
         table.dataTable tbody td:nth-child(1) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(2) {
         padding-top: 2.1rem!important;
         } 
         table.dataTable tbody td:nth-child(3) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(4) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(5) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(6) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(7) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(8) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(9) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(10) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(11) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(12) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(13) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(14) {
         padding-top: 1.8rem!important;
         } 
         table.dataTable tbody td:nth-child(15) {
         padding-top: 1.8rem!important;
         } 
         @media only screen and (max-width: 568px) 
         {
         #myModal{
         padding-left: 76px!important;
         width: 22.4rem!important;
         }
         }
         .buttons-collection{
         border: none;
         position: relative;
         top: -3.3rem;
         left: 23rem;
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }
         div.dataTables_wrapper div.dataTables_filter {
         text-align: left!important;
         }
         div.dt-button-collection div.dropdown-menu {
         margin-left: 1.5rem;
         }
         .tertiary-button {
         padding: 5px 10px 5px 20px!important;
         }
         .text-muted{
         font-weight: 600;
         font-size: 15px;
         }
         .border {
         border:2px solid #E5E5E5;
         padding-left: 1rem;
         width: 6rem;
         height: 2.5rem;
         border-radius: 5px;
         }
         button, input, optgroup, select, textarea {
         font-weight: 600;
         font-size: 15px;
         }
         input[type=radio] {
         width: 8%;
         height: 35%;   
         }
         b.thicker {
         font-weight: 900;
         font-size: 90%;
         margin-left: 2%;
         }
         b.thick {
         font-weight: 800;
         font-size: 80%;
         }
         @media screen and (max-width: 480px) {
         b.thicker{
         margin-left:3%;
         }
         @media screen and (max-width:768px) {
         #can{width:px;
         padding-right:10rem; }
         }
         @media screen and (max-width: 768px) {
         #sav{width:-20px;
         padding-right:6rem;}
         }
         /*input[type=radio]{
         transform:scale(1.5)!important;
         }*/
         /*switches*/
         .custom-switch .custom-control-label::after {
         top: calc(.32rem + 2px)!important;
         left: calc(-2.25rem + 2px)!important;
         width: 1rem!important;
         height: 1.1rem!important;
         background-color: #adb5bd!important;
         border-radius: 0.5rem!important;
         }
         .custom-switch .custom-control-label::before {
         left: -2.25rem!important;
         width: 3rem!important;
         height: 1.5rem!important;
         pointer-events: all!important;
         border-radius: 1rem!important;
         }
         /*End switches*/
      </style>
      <style>
         .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 5rem; }
         .toggle.ios .toggle-handle { border-radius: 5rem; }
         /*cards*/
         .lockb
         {
         border: 2px solid white;
         background-color: white;
         border-radius: 18.5px;
         }
         .imf{
         height:150px;
         width:100%;
         }
         .imt
         {
         background: #FFFFFF;
         width: 3.9rem;
         }
         .imt1
         {
         background: #FFFFFF;
         border-radius: 30px;
         }
         .item{
         padding-left:5px;
         padding-right:5px;
         }
         .item-card{
         transition:0.5s;
         cursor:pointer;
         }
         .lock
         {
         background: linear-gradient(135deg, #477BFF 2.88%, #58CAFB 100%); 
         }
         .item-card-title{  
         font-size:15px;
         transition:1s;
         cursor:pointer;
         }
         .item-card-title i{  
         font-size:15px;
         transition:1s;
         cursor:pointer;
         color:#ffa710
         }
         .card-title i:hover{
         /*transform: scale(1.25) rotate(100deg); */
         color:#18d4ca;
         }
         .card:hover{
         /*transform: scale(1.05);*/
         box-shadow: 0px 0px 20px -2px rgba(120,120,120,0.3);
         }
         .card-text{
         height:80px;  
         }
         .card::before, .card::after {
         position: absolute;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         transform: scale3d(0, 0, 1);
         transition: transform .3s ease-out 0s;
         background: rgba(255, 255, 255, 0.1);
         content: '';
         pointer-events: none;
         }
         .card::before {
         transform-origin: left top;
         }
         .card::after {
         transform-origin: right bottom;
         }
         .card:hover::before, .card:hover::after, .card:focus::before, .card:focus::after {
         transform: scale3d(1, 1, 1);
         }
         .toggle.btn {
         min-width: 2.7rem!important;
         min-height: 1.7rem!important;
         }
         .fnt
         {
         font-family: Poppins;
         font-style: normal;
         font-weight: normal;
         font-size: 12px;
         line-height: 20px;
         text-align: justify;
         letter-spacing: 0.2px;
         color: #565252;
         }
         .fnt1
         {
         font-family: Poppins;
         font-style: normal;
         font-weight: normal;
         font-size: 12px;
         line-height: 20px;
         text-align: justify;
         letter-spacing: 0.2px;
         
         }
      </style>
   </head>
   <body oncontextmenu="return false">
      <?php 
         $data['pageid']=201;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
         <div class="container-fluid" style="padding: 0px;">
            <?php
               if($this->session->flashdata('success') == 'Addons updated successfully')
               { 
               ?>
            <script>
               doNotify('top','center',2,'Add-ons updated successfully');
            </script>
            <?php 
               }
                if($this->session->flashdata('error') == 'Some error occur')
               { 
                ?>
            <script>
               doNotify('top','center',4,'Some error occurs');
            </script>
            <?php 
               }
                ?>
            <!--<div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="primary-text">Addons</div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-left: 20rem;">
                 <!--  <button type="button" id="addonspermission"  class="btn btn-success bttn fit">Update</button> -->
              <!-- </div>
            </div> -->
            <br><br><br>
            <form id="addonsform"  action="<?php echo URL;?>Addon/updateaddonspermission/<?php echo $data['id']; ?>"  >
               <div class="row">
                  <!-- card 1 upgraded -->
                  <div class="col-lg-4">
                     <?php 
                        if($data['livelocationtracking']==1) { ?>
                     <style type="text/css">
                        .card1{
                        display: none!important;
                        }
                     </style>
                     <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <br>
						<br>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Live Location Tracking</h5>
                           <p class="card-text fnt">Real-Time tracking of staff on your Phone and Desktop. Admin can check which employee is where and at what time with distance covered by them (in km).
                           </p>
                              <br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        
                        ?>
                     <!-- end card 1 upgraded -->
                     <!-- Card 1 -->
                     <div class="card item-card card-block lock card1" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Live Location Tracking</h5>
                           <p class="card-text fnt1">Real-Time tracking of staff on your Phone and Desktop. Admin can check which employee is where and at what time with distance covered by them (in km).
                           </p>
                              <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#livelocationtracking">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 1 -->
                  <!-- card 2 upgraded -->
                  <div class="col-lg-4 ">
                     <?php 
                        if($data['geofence']==1) { ?>
                     <style type="text/css">
                        .card2{
                        display: none!important;
                        }
                     </style>
                     <!--<div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                       <div class="dropdown">
                           <!-- three dots -->
                          <!-- <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div> -->
                         <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/geofence.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Geo Fence</h5>
                           <p class="card-text fnt">Create a virtual barrier around your office through the Geo fence. Whenever the attendance is marked outside your set boundary admin will get notified through Alerts.</p>
                        
                        
                              <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                     <!-- End upgraded Card 2 -->
                     <!-- Card 2 -->
                     <div class="card item-card card-block lock card2" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                       
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Geo Fence</h5>
                           <p class="card-text fnt1">Create a virtual barrier around your office through the Geo fence. Whenever the attendance is marked outside your set boundary admin will get notified through Alerts.</p>
                           <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#geofence">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 2 -->
                  <!-- Card 3 upgraded-->
                  <div class="col-lg-4 ">
                     <?php 
                        if($data['attendanceadon']==1) { ?>
                     <style type="text/css">
                        .card3{
                        display: none!important;
                        }
                     </style>
                    <!-- <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Admin Attendance</h5>
                           <p class="card-text fnt">Admin can mark attendance on behalf of the  employees through the Group Attendance Feature.</p>
                           <center>
                             <label class="switch">
                                 <input id="toggle" name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                           </center>
                        </div>
                     </div>-->
					 
					 
					  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input name='attendanceadon' type="checkbox" autocomplete="off"id ="attendanceadon"     value="<?php echo $data['attendanceadon'] ?>" <?php if($data['attendanceadon']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/calendar.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Admin Attendance</h5>
                           <p class="card-text fnt">Admin can mark attendance on behalf of the  employees through the Group Attendance Feature.</p>
                           <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
					 
					 
                     <?php 
                        }
                        ?>
                     <!-- End upgraded Card 3 -->
                     <!-- card 3 -->
                    <!-- <div class="card item-card card-block lock card3" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Admin Attendance</h5>
                           <p class="card-text fnt1">Admin can mark attendance on behalf of the  employees through the Group Attendance Feature.</p>
                           <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                          <!--    <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#adminatt">Upgrade</button>
                           </center>
                        </div>
                     </div>-->
					 
					 
					 <!-- <div class="card item-card card-block card3" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Admin Attendance</h5>
                           <p class="card-text fnt">Admin can mark attendance on behalf of the  employees through the Group Attendance Feature.</p>
                           <center>
                             <label class="switch">
                                 <input id="toggle" name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                           </center>
                        </div>
                     </div>-->
					 
					 
					 <div class="card card3" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/calendar.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Admin Attendance</h5>
                           <p class="card-text fnt">Admin can mark attendance on behalf of the  employees through the Group Attendance Feature.</p>
                           <br>
                           <center>
                              <label class="switch">
                              <input name='attendanceadon' type="checkbox" autocomplete="off"id ="attendanceadon"     value="<?php echo $data['attendanceadon'] ?>" <?php if($data['attendanceadon']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
					 
					 
					 
                  </div>
                  <!-- End Card 3 -->
               </div>
               <br>
               <br>
               <div class="row">
                  <!-- Card 4 upgraded -->
                  <div class="col-lg-4">
                     <?php 
                        if($data['basicleave']==1) { ?>
                     <style type="text/css">
                        .card4{
                        display: none!important;
                        }
                     </style>
                    <!-- <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                         <!--  <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input name='basicleave' type="checkbox" autocomplete="off"id ="basicleave"     value="<?php echo $data['basicleave'] ?>" <?php if($data['basicleave']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Leave</h5>
                           <p class="card-text fnt">Employee can apply leave through the app and Admin can Approve And Reject the leave through the app or from ubiAttendance web admin panel.</p>
                           <br>
                           <center>

                              <a href="<?php echo URL;?>Face_controller/faceid"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					 
					 
					  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                       <br><br>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/leave.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Leave</h5>
                           <p class="card-text fnt">Employee can apply leave through the app and Admin can Approve And Reject the leave through the app or from ubiAttendance web admin panel.
                           </p>
                              <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                     <!-- card 4 upgraded end -->
                     <!-- card 4 -->
                    <!-- <div class="card card4" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Leave</h5>
                           <p class="card-text fnt">Employee can apply leave through the app and Admin can Approve ANd Reject the leave through the app or from ubiAttendance web admin panel.</p>
                           <center>
                              <label class="switch">
                              <input name='basicleave' type="checkbox" autocomplete="off"id ="basicleave"     value="<?php echo $data['basicleave'] ?>" <?php if($data['basicleave']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>-->
					 
					 
					 <div class="card item-card card-block lock card4" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Leave</h5>
                           <p class="card-text fnt1">Employee can apply leave through the app and Admin can Approve ANd Reject the leave through the app or from ubiAttendance web admin panel.
                           </p>
                              <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#basicleave">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 4 -->
                  <!-- Card 5 upgraded -->
                  <div class="col-lg-4">
                     <?php 
                        if($data['facerecog']==1) { ?>
                     <style type="text/css">
                        .card5{
                        display: none!important;
                        }
                     </style>
                    <!-- <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <!--<ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Face Recognition</h5>
                           <p class="card-text fnt">Facial Attendance can be taken in Kiosk mode or by Supervisor or by the Employee himself. Admin gets notification based on face id mismatch.</p>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					 
					  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                       <br><br>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/face-scan.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Face Recognition</h5>
                           <p class="card-text fnt">Facial Attendance can be taken in Kiosk mode or by Supervisor or by the Employee himself. Admin gets notification based on face id mismatch.
                           </p>
                              <br>
                           <center>
                               <a href="<?php echo URL;?>Face_controller/faceid"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                     <!-- Card 5 upgraded end-->
                     <!-- Card 5 -->
                     <div class="card item-card card-block lock card5" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Face Recognition</h5>
                           <p class="card-text fnt1">Facial Attendance can be taken in Kiosk mode or by Supervisor or by the Employee himself. Admin gets notification based on face id mismatch.</p>
                           <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#facerecog">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 5 -->
                  <!-- Card 6 upgraded-->
                  <div class="col-lg-4">
                     <?php 
                        if($data['advancevisit']==1) { ?>
                     <style type="text/css">
                        .card6{
                        display: none!important;
                        }
                     </style>
                    <!--<div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                          <!-- <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input  name='advancevisit' type="checkbox" autocomplete="off"id = "advancevisit"value="<?php echo $data['advancevisit'] ?>" <?php if($data['advancevisit']==1) echo 'checked';  ?>>
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Advance Visit</h5>
                           <p class="card-text fnt">In advance visits admin can assign multiple clients to the employees for visit punching, record client information and see reports based on clients.</p>
                           <br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <br><br>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/visitor2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Advance Visit</h5>
                           <p class="card-text fnt">In advance visits admin can assign multiple clients to the employees for visit punching, record client information and see reports based on clients.
                           </p>
                              <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
					 
                     <?php 
                        }
                        ?>
                     <!-- Card 6 upgraded end-->
                     <!-- Card 6 -->
                    <!-- <div class="card card6" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Advance Visit</h5>
                           <p class="card-text fnt">In advance visits admin can assign multiple clients to the employees for visit punching, record client information and see reports based on clients.</p>
                           <center>
                              <label class="switch card6">
                              <input  name='advancevisit' type="checkbox" autocomplete="off"id = "advancevisit"value="<?php echo $data['advancevisit'] ?>" <?php if($data['advancevisit']==1) echo 'checked';  ?>>
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>-->
					 
					  <div class="card item-card card-block lock card6" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/visitor2.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Advance Visit</h5>
                           <p class="card-text fnt1">In advance visits admin can assign multiple clients to the employees for visit punching, record client information and see reports based on clients.
                           </p>
                              <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#advancevisit">Upgrade</button>
                           </center>
                        </div>
                     </div>
					  
					 
                  </div>
                  <!-- End Card 6 -->
               </div>
               <br>
               <br>
               <div class="row">
                  <!-- Card 7 upgraded-->
                  <div class="col-lg-4">
                     <?php 
                        if($data['covid19']==1) { ?>
                     <style type="text/css">
                        .card7{
                        display: none!important;
                        }
                     </style>
                     <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                   <label class="switch">
                              <input  name='covid19' type="checkbox" autocomplete="off"id = "covid19"value="<?php echo $data['covid19'] ?>" <?php if($data['covid19']==1) echo 'checked';  ?>>
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/virus.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Covid 19</h5>
                           <p class="card-text fnt">Admins can configure COVID-19 health declaration before Time In & After Time Out. Get alerts based on the information.</p>
                           <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                     <!-- Card 7 upgraded end-->
                     <!-- Card 7 -->
                     <div class="card card7" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                       <center> <img class="imt" src="<?=URL?>../assets/icons/virus.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Covid 19</h5>
                           <p class="card-text fnt">Admins can configure COVID-19 health declaration before Time In & After Time Out. Get alerts based on the information.</p>
                           <br>
                           <center>
                              <label class="switch">
                              <input  name='covid19' type="checkbox" autocomplete="off"id = "covid19"value="<?php echo $data['covid19'] ?>" <?php if($data['covid19']==1) echo 'checked';  ?>>
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 7 -->
                  <!-- Card 8 upgraded-->
                  <div class="col-lg-4">
                     <?php 
					/*  echo $data['visitpunch']; */
                        if($data['visitpunch']==1) { ?>
                     <style type="text/css">
                        .card8{
                        display: none!important;
                        }
                     </style>
                    <!-- <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                          <!-- <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div>
                        
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Visit Punch</h5>
                           <p class="card-text fnt">Track visits of your field employees in real time. Employee punches location from various reporting points. Managers can track immediately each visit’s time & location.
</p>
<br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					 
					 <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input name='visitpunch' type="checkbox" autocomplete="off"id ="visitpunch"     value="<?php echo $data['visitpunch'] ?>" <?php if($data['visitpunch']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/visitor.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Visit Punch</h5>
                           <p class="card-text fnt">Track visits of your field employees in real time. Employee punches location from various reporting points. Managers can track immediately each visit’s time & location.</p>
                           <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                         <!-- Card 8 upgraded end-->
                          <!-- Card 8 -->
                   <!--  <div class="card item-card card-block lock card8" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Visit Punch</h5>
                           <p class="card-text fnt1">Track visits of your field employees in real time. Employee punches location from various reporting points. Managers can track immediately each visit’s time & location.
</p>
<br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                             <!-- <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#visitp">Upgrade</button>
                           </center>
                        </div>
                     </div>-->
					 
					 <div class="card card8" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/visitor.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Visit Punch</h5>
                           <p class="card-text fnt">Track visits of your field employees in real time. Employee punches location from various reporting points. Managers can track immediately each visit’s time & location.</p>
                           <center>
                              <br>
                              <label class="switch">
                              <input name='visitpunch' type="checkbox" autocomplete="off"id ="visitpunch"     value="<?php echo $data['visitpunch'] ?>" <?php if($data['visitpunch']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 8 -->
                  <!-- Card 9 upgraded-->
                  <div class="col-lg-4">
                     <?php 
                        if($data['image_status']==1) { ?>
                     <style type="text/css">
                        .card9{
                        display: none!important;
                        }
                     </style>
                     <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input  name='image_status' type="checkbox" autocomplete="off"id = "image_status"value="<?php echo $data['image_status'] ?>" <?php if($data['image_status']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                        <center><img class="imt" src="<?=URL?>../assets/icons/selfie.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Selfie</h5>
                           <p class="card-text fnt">Now the admin can choose to enable/disable attendance with selfie
.</p>
<br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                         <!-- Card 9 upgraded end-->
                          <!-- Card 9 -->
                     <div class="card card9" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/selfie.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Selfie</h5>
                           <p class="card-text fnt">Now the admin can choose to enable/disable attendance with selfie
.</p>
<br>
                           <center>
                              <label class="switch">
                              <input  name='image_status' type="checkbox" autocomplete="off"id = "image_status"value="<?php echo $data['image_status'] ?>" <?php if($data['image_status']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 9 -->
               </div>
               <br>
               <br>
               <div class="row">
                  <!-- Card 10 upgraded-->
                  <div class="col-lg-4">
                     <?php 
					/*   echo $data['mobileid'];  */
					
                        if($data['mobileid']==1) { ?>
                     <style type="text/css">
                        .card10{
                        display: none!important;
                        }
                     </style>
                     <!--<div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                          three dots -->
                           <!--<ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div>
                 
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Mobile ID</h5>
                           <p class="card-text fnt">Get notified when a user doesn’t mark attendance from his/her registered device.</p>
                           <br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					 
					  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input name='mobileid' type="checkbox" autocomplete="off"id ="mobileid"     value="<?php echo $data['mobileid'] ?>" <?php if($data['mobileid']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/device2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Mobile ID</h5>
                           <p class="card-text fnt">Get notified when a user doesn’t mark attendance from his/her registered device.</p>
                           <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                     <?php 
                        }
                        ?>
                         <!-- Card 10 upgraded end-->
                          <!-- Card 10 -->
                     <!--<div class="card item-card card-block lock card10" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Mobile ID</h5>
                           <p class="card-text fnt1">Get notified when a user doesn’t mark attendance from his/her registered device.</p>
                           <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <!--<button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#mobid">Upgrade</button>
                           </center>
                        </div>
                     </div>-->
					 
					 <div class="card card10" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/device2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Mobile ID</h5>
                           <p class="card-text fnt">Get notified when a user doesn’t mark attendance from his/her registered device.</p>
                           <br>
                           <center>

                              <label class="switch">
                              <input name='mobileid' type="checkbox" autocomplete="off"id ="mobileid"     value="<?php echo $data['mobileid'] ?>" <?php if($data['mobileid']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
					 
					 
                  </div>
				  
                  <!-- End Card 10 -->
				  
				  
                  <!-- Card 11 upgraded-->
                 <!-- <div class="col-lg-4">
				  
                      <?php 
                              if($data['payroll']==1) { ?>
                           
                           <style type="text/css">
                              .card11{
                              display: none!important;
                              }
                           </style>
                           <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                          <!-- <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div>
                      
                       <center> <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Hourly Pay</h5>
                           <p class="card-text fnt">Pull hours worked by each Employee. Based on hourly rate decided for each employee, get accurate wage information month on month without sweating.
</p>
<br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                     <!-- Card 11 upgraded end-->
                          <!-- Card 11 -->
                     <!--<div class="card item-card card-block lock card11" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                       
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Hourly Pay</h5>
                           <p class="card-text fnt1">Pull hours worked by each Employee. Based on hourly rate decided for each employee, get accurate wage information month on month without sweating.
</p>
<br>
                           <center>

                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                             <!-- <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#hourlypay">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 11 -->
                  <!-- Card 12 upgraded-->
                  <!--<div class="col-lg-4">
                     <?php 
                              if($data['locationtracking']==1) { ?>
                          
                           <style type="text/css">
                              .card12{
                              display: none!important;
                              }
                           </style>
                            <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                         <!--  <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div>
                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Location Tracking</h5>
                           <p class="card-text fnt">Real-Time tracking of staff on your Phone and Desktop. Admin can check which employee is where and at what time with distance covered by them (in km).</p>
                           <br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                              <!-- Card 12 upgraded end-->
                          <!-- Card 12 -->
                    <!--<div class="card item-card card-block lock card12" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                       
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Location Tracking</h5>
                           <p class="card-text fnt1">Real-Time tracking of staff on your Phone and Desktop. Admin can check which employee is where and at what time with distance covered by them (in km).</p>
                           <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                             <!-- <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#locationtt">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 12 -->
				  
				  
				   <div class="col-lg-4">
                       <?php 
                              if($data['timeoff']==1) { ?>
                          
                           <style type="text/css">
                              .card13{
                              display: none!important;
                              }
                           </style>
                           <!--  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                          <!-- <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                                 <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                                 <span class="slider round"></span>
                                 </label>
                              </center>
                           </ul>
                        </div>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Time Off</h5>
                           <p class="card-text fnt">If any employee wants to go out of the office for their personal work for a short period of time. They can punch their “Time off” at start & finish.</p>
                           <br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					 
					 <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input name='timeoff' type="checkbox" autocomplete="off"id ="timeoff"     value="<?php echo $data['timeoff'] ?>" <?php if($data['timeoff']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/clock2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Time Off</h5>
                           <p class="card-text fnt">If any employee wants to go out of the office for their personal work for a short period of time. They can punch their “Time off” at start & finish.</p>
                           <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                              <!-- Card 13 upgraded end-->
                          <!-- Card 13 -->
                  <!--  <div class="card item-card card-block lock card13" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                      
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Time Off</h5>
                           <p class="card-text fnt1">If any employee wants to go out of the office for their personal work for a short period of time. They can punch their “Time off” at start & finish.</p>
                           <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                             <!-- <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#timeoff">Upgrade</button>
                           </center>
                        </div>
                     </div>-->
					 
					  <div class="card card13" style="width: 18rem;height: 22rem;">
                        
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/clock2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Time Off</h5>
                           <p class="card-text fnt">If any employee wants to go out of the office for their personal work for a short period of time. They can punch their “Time off” at start & finish.</p>
                           <br>
                           <center>
                              <label class="switch">
                              <input name='timeoff' type="checkbox" autocomplete="off"id ="timeoff"     value="<?php echo $data['timeoff'] ?>" <?php if($data['timeoff']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 13 -->
				   <!-- Card 14 upgraded-->
                  <div class="col-lg-4">
                     <?php 
                              if($data['offline']==1) { ?>
                          
                           <style type="text/css">
                              .card14{
                              display: none!important;
                              }
                           </style>
                                 <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                <label class="switch">
                              <input  name='offline' type="checkbox" autocomplete="off"id = "offline"value="<?php echo $data['offline'] ?>" <?php if($data['offline']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                        <center><img class="imt" src="<?=URL?>../assets/icons/no-wifi2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Offline Mode</h5>
                           <p class="card-text fnt"> Employees can mark attendance even when the phone does not have a working Internet connection. 
</p>
<br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                     <!-- Card 14 upgraded end-->
                     <!-- Card 14 -->
                     <div class="card card14" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/no-wifi2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Offline Mode</h5>
                           <p class="card-text fnt"> Employees can mark attendance even when the phone does not have a working Internet connection. 
</p>
                           <br>
                           <center>
                              <label class="switch">
                              <input  name='offline' type="checkbox" autocomplete="off"id = "offline"value="<?php echo $data['offline'] ?>" <?php if($data['offline']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 14 -->
               </div>
               <br>
               <br>
               <div class="row">
               <!-- Card 15 upgraded-->
                  <div class="col-lg-4">
                     <?php 
                              if($data['delete123']==1) { ?>
                          
                           <style type="text/css">
                              .card15{
                              display: none!important;
                              }
                           </style>
                                   <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                  <label class="switch">
                              <input  name='delete123' type="checkbox" autocomplete="off"id = "delete123"value="<?php echo $data['delete123'] ?>" <?php if($data['delete123']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>

                        
                       <center> <img class="imt" src="<?=URL?>../assets/icons/trash2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Delete</h5>
                           <p class="card-text fnt">Admin can delete the attendance of employees in order to regularise the records.
</p>
<br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                     <!-- Card 15 upgraded end-->
                     <!-- Card 15 -->
                     <div class="card card15" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/trash2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Delete</h5>
                           <p class="card-text fnt">Admin can delete the attendance of employees in order to regularise the records.
</p>
<br>
                           
                           <center>
                              <label class="switch">
                              <input  name='delete123' type="checkbox" autocomplete="off"id = "delete123"value="<?php echo $data['delete123'] ?>" <?php if($data['delete123']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 15 -->
				  
				  
				  <!-- Card 16 updraded-->
                  <div class="col-lg-4">
                      <?php 
                              if($data['autotimeout']==1) { ?>
                          
                           <style type="text/css">
                              .card16{
                              display: none!important;
                              }
                           </style>
                                    <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input  name='autotimeout' type="checkbox" autocomplete="off"id = "autotimeout"value="<?php echo $data['autotimeout'] ?>" <?php if($data['autotimeout']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                        <center><img class="imt" src="<?=URL?>../assets/icons/clock23.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Auto TimeOut</h5>
                           <p class="card-text fnt">If someone forgets Punching their Time Out, then according to their shift timing, “Time Out” will be marked automatically.</p>
                     
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                     <!-- Card 16 upgraded end-->
                     <!-- Card 16 -->
                     <div class="card card16" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/clock23.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Auto TimeOut</h5>
                           <p class="card-text fnt">If someone forgets Punching their Time Out, then according to their shift timing, “Time Out” will be marked automatically.</p>
                          <br>
                           <center>
                              <label class="switch">
                              <input  name='autotimeout' type="checkbox" autocomplete="off"id = "autotimeout"value="<?php echo $data['autotimeout'] ?>" <?php if($data['autotimeout']==1) echo 'checked';  ?> >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 16 -->
				  <!-- Card 17 updraded-->
                  <div class="col-lg-4">
                     <?php 
                              if($data['shiftplanner']==1) { ?>
                          
                           <style type="text/css">
                              .card17{
                              display: none!important;
                              }
                           </style>
                                    <!--<div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                         <!--  <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                 <label class="switch">
                              <input  name='shiftplanner' type="checkbox" autocomplete="off"id = "shiftplanner"value="<?php echo $data['shiftplanner'] ?>" <?php if($data['shiftplanner']==1) echo 'checked';  ?>  >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                      
                       <center> <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Shift Planner</h5>
                           <p class="card-text fnt">Assign multiple employees to a single shift in one go. Quick & easy Shift Rotation. Get details of each employee shift in the app dashboard.</p>
                           <br>
                           <center>
                              <a href="<?php echo URL;?>Location/livetrack"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>-->
					 
					 <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                       <br><br>
                       
                        <center><img class="imt" src="<?=URL?>../assets/icons/calendar2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Shift Planner</h5>
                           <p class="card-text fnt">Assign multiple employees to a single shift in one go. Quick & easy Shift Rotation. Get details of each employee shift in the app dashboard.
                           </p>
                              <br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                     <!-- Card 17 upgraded end-->
                     <!-- Card 17 -->
                     <!--<div class="card card17" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Shift Planner</h5>
                           <p class="card-text fnt">Assign multiple employees to a single shift in one go. Quick & easy Shift Rotation. Get details of each employee shift in the app dashboard.</p>
                           
                           <center>
                              <label class="switch">
                              <input  name='shiftplanner' type="checkbox" autocomplete="off"id = "shiftplanner"value="<?php echo $data['shiftplanner'] ?>" <?php if($data['shiftplanner']==1) echo 'checked';  ?>  >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>-->
					 
					  <div class="card item-card card-block lock card17" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        
                        <center><img class="imt1" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                        <div class="card-body text-white">
                           <h5 class="card-title text-center">Shift Planner</h5>
                           <p class="card-text fnt1">Assign multiple employees to a single shift in one go. Quick & easy Shift Rotation. Get details of each employee shift in the app dashboard.
                           </p>
                              <br>
                           <center>
                              <!-- <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking"> -->
                              <button type="button" class="btn btn-primary bttn fit" data-toggle="modal" data-target="#shiftplanner">Upgrade</button>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 17 -->
               </div>
               <br>
               <br>
               <div class="row">
                  
                  
                  <!-- Card 18 updraded-->
                  <div class="col-lg-4">
                      <?php 
                              if($data['edit123']==1) { ?>
                           
                           <style type="text/css">
                              .card18{
                              display: none!important;
                              }
                           </style>
                                    <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                        <div class="dropdown">
                           <!-- three dots -->
                           <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                           </ul>
                           <span class="caret"></span>
                           <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                              <center>
                                 <li style="    font-weight: 600;font-size: 1.2rem;">
                                    Settings
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem;">
                                 </li>
                                <label class="switch">
                              <input  name='edit123' type="checkbox" autocomplete="off"id = "edit123"value="<?php echo $data['edit123'] ?>" <?php if($data['edit123']==1) echo 'checked';  ?>  >
                              <span class="slider round"></span>
                              </label>
                              </center>
                           </ul>
                        </div>
                        
                        <center><img class="imt" src="<?=URL?>../assets/icons/edit2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Edit</h5>
                           <p class="card-text fnt">Admin can edit the attendance of employees.
</p>
<br>
                           <center>
                              <a href="#"><button type="button" class="btn btn-outline-success bttn fit" >View</button></a>
                           </center>
                        </div>
                     </div>
                           <?php 
                              }
                              ?>
                      <!-- Card 18 upgraded end-->
                       <!-- Card 18 -->
                     <div class="card card18" style="width: 18rem;height: 22rem;">
                        <br>
                        <br>
                        <center><img class="imt" src="<?=URL?>../assets/icons/edit2.svg" alt=""class="card-img-top" alt="..."></center>
                        <div class="card-body">
                           <h5 class="card-title text-center">Edit</h5>
                           <p class="card-text fnt">Admin can edit the attendance of employees.
</p>
<br>
                          
                           <center>
                              <label class="switch">
                              <input  name='edit123' type="checkbox" autocomplete="off"id = "edit123"value="<?php echo $data['edit123'] ?>" <?php if($data['edit123']==1) echo 'checked';  ?>  >
                              <span class="slider round"></span>
                              </label>
                           </center>
                        </div>
                     </div>
                  </div>
                  <!-- End Card 18 -->
               </div>
            </form>
         </div>
         <br>
         <br>
         <br>
         <br>
         <br>
         <!-- Container-Fluid End -->
         <!--------Attendance date range filter modal start----------->
         <?php 
            //org details           
            
                      foreach($add as $row1 ){
                        // $data['enddate'] =$row->end_date;
                        $enddate =date('d-M-Y',strtotime($row1->end_date));
                        
                        $user =$row1->userlimit;
                        $country=$row1->Country;

                         $orgname=$row1->Name;
                          $orgno=$row1->PhoneNumber;
                         
                        
                        // $price=$row1->
            
                            }
                            ?>
         <?php  
            //USD
                      foreach($attplan as $row2 ){
            
                         $range=$row2->range;           
                       $monthly =$row2->monthly;         
                       $yearly=$row2->yearly;           
                       $bulk_attendance=$row2->bulk_attendance;           
                       $location_tracing =$row2->location_tracing;         
                       $visit_punch =$row2->visit_punch;          
                       $geo_fence=$row2->geo_fence;           
                       $payroll =$row2->payroll;         
                       $time_off =$row2->time_off; 
                       $Addon_livetracking =$row2->Addon_livetracking; 
                       
                        
            
                           
                      
                            }
                            ?>
         <?php  
            //INR
            
                      foreach($attplan1 as $row3 ){
            
                         $range1=$row3->range;           
                       $monthly1 =$row3->monthly;         
                       $yearly1=$row3->yearly;           
                       $bulk_attendance1=$row3->bulk_attendance;           
                       $location_tracing1 =$row3->location_tracing;         
                       $visit_punch1 =$row3->visit_punch;          
                       $geo_fence1=$row3->geo_fence; 
                       $geo_fence1;          
                       $payroll1 =$row3->payroll;         
                       $time_off1 =$row3->time_off; 
                       $Addon_livetracking1 =$row2->Addon_livetracking; 
                       
                                   
                      
                            }
                            ?>
         <?php 
            foreach($attplan2 as $row5 ){
            $currency =$row5->currency; 
            
            }
            ?>
            <!-- Live Location Tracking -->
         <div class="modal fade ref" id="livelocationtracking" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Live Location Addon</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <!--   <form role="form1" > -->
                  <div class="modal-body">
                     <form>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Number of User</label>
                           <div class="col-sm-6">
                              <input type="text" name="livelocationtracking" class="form-control fnt" id="userlimit" value= "<?php echo $user;?>" readonly />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Addon Price per month</label>
                           <div class="col-sm-6">
                              <input type="text" id="addonprice" class= "form-control fnt"readonly value="<?php if($country==93)
                                 {
                                    /* echo $bulk_attendance1; */
									echo 20;
                                 }
                                 else
                                 {
                                    /* echo $bulk_attendance; */
									echo 1;
                                 }
                                 
                                 ?>"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Month(s)</label>
                           <div class="col-sm-6">
                              <input class="form-control fnt" name="livelocationmonth" type="number" id="month123" min="1" max="50" value = "1" onchange="myFunction()" onKeyUp="if(this.value>50){this.value='50';}else if(this.value<1){this.value='1';}"onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Total</label>
                           <div class="col-sm-6">
                              <input type="text" id="total"  name="total"class= "form-control fnt" value= "<?php if($country==93)
                                 {
                                    echo 20*$user;
                                 }
                                 else
                                 {
                                    echo 1*$user;
                                 }
                                 
                                 ?>"readonly> 
                           </div>
                        </div>
                     </form>
                     <br><br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5"  style="text-align: end;padding-right: 0px;">
                           <button type="button" class="btn btn-light bttn fit " data-dismiss="modal" >Cancel</button> 
                        </div>
                        <div class="col-lg-4"style="text-align: end;padding-left: 0px;">
                           <button type="button" id="livetracking" onclick="livetrackpay()" class="btn btn-success bttn fit" style="">Pay</button>
                           <div id="nextbtn"></div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!--------Live Location Tracking End----------->




          <!-- Geo Fence -->
         <div class="modal fade ref" id="geofence" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;GeoFence Addon</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <!--   <form role="form1" > -->
                  <div class="modal-body">
                     <form>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Number of User</label>
                           <div class="col-sm-6">
                              <input type="text" name="geofence" class="form-control fnt" id="userlimit1" value= "<?php echo $user;?>" readonly />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Addon Price per month</label>
                           <div class="col-sm-6">
                              <input type="text" id="addonprice1" class= "form-control fnt"readonly value="<?php if($country==93)
                                 {
                                    /* echo $bulk_attendance1; */
									echo 6;
                                 }
                                 else
                                 {
                                    /* echo $bulk_attendance; */
									echo 0.30;
                                 }
                                 
                                 ?>"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Month(s)</label>
                           <div class="col-sm-6">
                              <input class="form-control fnt" name="geofencemonth" type="number" id="month1231" min="1" max="50" value = "1" onchange="myFunction1()" onKeyUp="if(this.value>50){this.value='50';}else if(this.value<1){this.value='1';}"onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Total</label>
                           <div class="col-sm-6">
                              <input type="text" id="total1"  name="total"class= "form-control fnt" value= "<?php if($country==93)
                                 {
                                    echo 6*$user;
                                 }
                                 else
                                 {
                                    echo 0.30*$user;
                                 }
                                 
                                 ?>"readonly> 
                           </div>
                        </div>
                     </form>
                     <br><br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5"  style="text-align: end;padding-right: 0px;">
                           <button type="button" class="btn btn-light bttn fit " data-dismiss="modal" >Cancel</button> 
                            </div>
                        <div class="col-lg-4"style="text-align: end;padding-left: 0px;">
                           <button type="button" id="geofencess" onclick="geofencepay()" class="btn btn-success bttn fit" style="">Pay</button>
                           <div id="nextbtn1"></div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!--------Geo Fence End----------->
 <!--------leave----------->
  <div class="modal fade ref" id="basicleave" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Basicleave Addon</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <!--   <form role="form1" > -->
                  <div class="modal-body">
                     <form>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Number of User</label>
                           <div class="col-sm-6">
                              <input type="text" name="basicleave" class="form-control fnt" id="userlimit2" value= "<?php echo $user;?>" readonly />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Addon Price per month</label>
                           <div class="col-sm-6">
                              <input type="text" id="addonprice2" class= "form-control fnt"readonly value="<?php if($country==93)
                                 {
                                    /* echo $bulk_attendance1; */
									echo 10;
                                 }
                                 else
                                 {
                                    /* echo $bulk_attendance; */
									echo 0.50;
                                 }
                                 
                                 ?>"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Month(s)</label>
                           <div class="col-sm-6">
                              <input class="form-control fnt" name="basicleavemonth" type="number" id="month1232" min="1" max="50" value = "1" onchange="myFunction2()" onKeyUp="if(this.value>50){this.value='50';}else if(this.value<1){this.value='1';}"onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Total</label>
                           <div class="col-sm-6">
                              <input type="text" id="total2"  name="total"class= "form-control fnt" value= "<?php if($country==93)
                                 {
                                    echo 10*$user;
                                 }
                                 else
                                 {
                                    echo 0.50*$user;
                                 }
                                 
                                 ?>"readonly> 
                           </div>
                        </div>
                     </form>
                     <br><br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5"  style="text-align: end;padding-right: 0px;">
                           <button type="button" class="btn btn-light bttn fit " data-dismiss="modal" >Cancel</button> 
                            </div>
                        <div class="col-lg-4"style="text-align: end;padding-left: 0px;">
                           <button type="button" id="basicleavess" onclick="basicleavepay()" class="btn btn-success bttn fit" style="">Pay</button>
                           <div id="nextbtn2"></div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
<!--leave end-->
<!--------facerecogniton----------->
  <div class="modal fade ref" id="facerecog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;FaceRecognition Addon</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <!--   <form role="form1" > -->
                  <div class="modal-body">
                     <form>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Number of User</label>
                           <div class="col-sm-6">
                              <input type="text" name="facerecog" class="form-control fnt" id="userlimit3" value= "<?php echo $user;?>" readonly />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Addon Price per month</label>
                           <div class="col-sm-6">
                              <input type="text" id="addonprice3" class= "form-control fnt"readonly value="<?php if($country==93)
                                 {
                                    /* echo $bulk_attendance1; */
									echo 10;
                                 }
                                 else
                                 {
                                    /* echo $bulk_attendance; */
									echo 0.50;
                                 }
                                 
                                 ?>"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Month(s)</label>
                           <div class="col-sm-6">
                              <input class="form-control fnt" name="facerecogmonth" type="number" id="month1233" min="1" max="50" value = "1" onchange="myFunction3()" onKeyUp="if(this.value>50){this.value='50';}else if(this.value<1){this.value='1';}"onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Total</label>
                           <div class="col-sm-6">
                              <input type="text" id="total3"  name="total"class= "form-control fnt" value= "<?php if($country==93)
                                 {
                                    echo 10*$user;
                                 }
                                 else
                                 {
                                    echo 0.50*$user;
                                 }
                                 
                                 ?>"readonly> 
                           </div>
                        </div>
                     </form>
                     <br><br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5"  style="text-align: end;padding-right: 0px;">
                           <button type="button" class="btn btn-light bttn fit " data-dismiss="modal" >Cancel</button> 
                            </div>
                        <div class="col-lg-4"style="text-align: end;padding-left: 0px;">
                           <button type="button" id="facerecogss" onclick="facerecogpay()" class="btn btn-success bttn fit" style="">Pay</button>
                           <div id="nextbtn3"></div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
<!--facerecog end-->
<!--------advancevisit----------->
  <div class="modal fade ref" id="advancevisit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Advance Visit Addon</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <!--   <form role="form1" > -->
                  <div class="modal-body">
                     <form>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Number of User</label>
                           <div class="col-sm-6">
                              <input type="text" name="advancevisit" class="form-control fnt" id="userlimit4" value= "<?php echo $user;?>" readonly />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Addon Price per month</label>
                           <div class="col-sm-6">
                              <input type="text" id="addonprice4" class= "form-control fnt"readonly value="<?php if($country==93)
                                 {
                                    /* echo $bulk_attendance1; */
									echo 6;
                                 }
                                 else
                                 {
                                    /* echo $bulk_attendance; */
									echo 0.30;
                                 }
                                 
                                 ?>"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Month(s)</label>
                           <div class="col-sm-6">
                              <input class="form-control fnt" name="advancevisitmonth" type="number" id="month1234" min="1" max="50" value = "1" onchange="myFunction4()" onKeyUp="if(this.value>50){this.value='50';}else if(this.value<1){this.value='1';}"onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Total</label>
                           <div class="col-sm-6">
                              <input type="text" id="total4"  name="total"class= "form-control fnt" value= "<?php if($country==93)
                                 {
                                    echo 6*$user;
                                 }
                                 else
                                 {
                                    echo 0.30*$user;
                                 }
                                 
                                 ?>"readonly> 
                           </div>
                        </div>
                     </form>
                     <br><br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-5"  style="text-align: end;padding-right: 0px;">
                           <button type="button" class="btn btn-light bttn fit " data-dismiss="modal" >Cancel</button> 
                            </div>
                        <div class="col-lg-4"style="text-align: end;padding-left: 0px;">
                           <button type="button" id="advancevisitss" onclick="advancevisitpay()" class="btn btn-success bttn fit" style="">Pay</button>
                           <div id="nextbtn4"></div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
<!--advance visit end-->


<!--------shiftplanner----------->
  <div class="modal fade ref" id="shiftplanner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;ShiftPlanner Addon</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <!--   <form role="form1" > -->
                  <div class="modal-body">
                     <form>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Number of User</label>
                           <div class="col-sm-6">
                              <input type="text" name="shiftplanner" class="form-control fnt" id="userlimit5" value= "<?php echo $user;?>" readonly />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Addon Price per month</label>
                           <div class="col-sm-6">
                              <input type="text" id="addonprice5" class= "form-control fnt"readonly value="<?php if($country==93)
                                 {
                                    /* echo $bulk_attendance1; */
									echo 6;
                                 }
                                 else
                                 {
                                    /* echo $bulk_attendance; */
									echo 0.30;
                                 }
                                 
                                 ?>"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Month(s)</label>
                           <div class="col-sm-6">
                              <input class="form-control fnt" name="shiftplannermonth" type="number" id="month1235" min="1" max="50" value = "1" onchange="myFunction5()" onKeyUp="if(this.value>50){this.value='50';}else if(this.value<1){this.value='1';}"onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"/>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-6 col-form-label fnt">Total</label>
                           <div class="col-sm-6">
                              <input type="text" id="total5"  name="total"class= "form-control fnt" value= "<?php if($country==93)
                                 {
                                    echo 6*$user;
                                 }
                                 else
                                 {
                                    echo 0.30*$user;
                                 }
                                 
                                 ?>"readonly> 
                           </div>
                        </div>
                     </form>
                     <br><br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                           <div class="col-lg-5"  style="text-align: end;padding-right: 0px;">
                              <button type="button" class="btn btn-light bttn fit " data-dismiss="modal" >Cancel</button> 
                           
                            </div>

                            <div class="col-lg-4"  style="text-align: end;padding-left: 0px;">
                              <button type="button" id="shiftplannerss" onclick="shiftplannerpay()" class="btn btn-success bttn fit" style="">Pay</button>
                           <div id="nextbtn5"></div>
                           </div>
                       
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
<!--shiftplanner end-->

      </main>
   </body>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
   <script src="<?= URL ?>../assets/js/navbar.js"></script>
   <!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script src="<?= URL ?>../assets/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"
      ></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
   <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
   <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>
   <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
   <script src="<?= URL ?>../assets/js/demo.js"></script>
   <!--my js-->
   <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
   <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
   <script src="https://checkout.razorpay.com/v1/checkout.js"></script> 
   <script> 
      // $('#addonspermission').click(function(){
         //alert();addSld
       //  $("#addonsform").submit();
     // });
      function myFunction() 
      {
      var month = parseFloat($('#month123').val()) || 0;
      var userlimit = parseFloat($('#userlimit').val()) || 0;
      var addonprice = parseFloat($('#addonprice').val()) || 0;
      // alert(month);
       //alert(userlimit);
      // alert(addonprice);
      var total = $('#total').val(month * userlimit * addonprice); 
      // alert(total);
      }
     
      
   </script>
   <script>
   function livetrackpay() 
   {

   var months = $("#month123").val();
   var tamt = $("#total").val();
   var addonprice= $("#addonprice").val();
   var today =new Date();
   today.setDate(today.getDate());
 //alert(today);
   var curyear = today.getFullYear();
   var curmonth = today.getMonth()+1;
   var curdate =today.getDate();
   var end_date = new Date(); // Now
   end_date.setDate(end_date.getDate() + (30*months)); // Set now + 30 days as the new date
 //alert(end_date);
   var oid="<?php echo $orgid; ?>";
// alert(oid);
   var oname="<?php echo $orgname; ?>";
   var ono="<?php echo $orgno; ?>";
   var currency="<?php echo $currency; ?>";
   var addonname = "addon_livelocationtracking";
   var country ="<?php echo $country; ?>";
      
         $('#livetracking').hide();
         $.ajax
               ({ 
                  url: '<?php echo URL;?>Addon/curl',
                  data: 
                  {
                     "tamt": tamt,
                     "addonprice":addonprice,
                     "months": months,
                     "today":today,
                     "curyear": curyear,
                     "curmonth":curmonth,
                     "curdate": curdate,
                     "addonprice":addonprice,
                     "oid":oid,
                     "oname":oname,
                     "currency":currency,
                     "addonname":addonname,
                     "end_date":end_date,
                     "country":country,
                     "ono":ono
                                                      
                  },

                  type: 'post',
                     success: function(result)
                        {
                           //alert('success');
                           $("#nextbtn").html(result);
						   if(result=='')
							{
							alert("Already puchased");	
							$('#livetracking').hide();
							window.location.reload(); 
						   }
                        }
               });
            }
      
   </script>

   <!-- geo fence -->
      <script>
          function myFunction1() 
      {
      var month = parseFloat($('#month1231').val()) || 0;
      var userlimit = parseFloat($('#userlimit1').val()) || 0;
      var addonprice = parseFloat($('#addonprice1').val()) || 0;
       //alert(month);
       //alert(userlimit);
      // alert(addonprice);
      var total = $('#total1').val(month * userlimit * addonprice); 
       //alert(total);
      }
   function geofencepay() 
   {

   var months = $("#month1231").val();
   var tamt = $("#total1").val();
   //alert(tamt);
   var addonprice= $("#addonprice1").val();
   var today =new Date();
   today.setDate(today.getDate());
 //alert(months);
   var curyear = today.getFullYear();
   var curmonth = today.getMonth()+1;
   var curdate =today.getDate();
   var end_date = new Date(); // Now
   end_date.setDate(end_date.getDate() + (30*months)); // Set now + 30 days as the new date
 //alert(end_date);
   var oid="<?php echo $orgid; ?>";
// alert(oid);
   var oname="<?php echo $orgname; ?>";
   var ono="<?php echo $orgno; ?>";
   var currency="<?php echo $currency; ?>";
   //alert(currency);
   var addonname = "addon_GeoFence";
   var country ="<?php echo $country; ?>";
      
         $('#geofencess').hide();
         $.ajax
               ({ 
                  url: '<?php echo URL;?>Addon/curl',
                  data: 
                  {
                     "tamt": tamt,
                     "addonprice":addonprice,
                     "months": months,
                     "today":today,
                     "curyear": curyear,
                     "curmonth":curmonth,
                     "curdate": curdate,
                     "addonprice":addonprice,
                     "oid":oid,
                     "oname":oname,
                     "currency":currency,
                     "addonname":addonname,
                     "end_date":end_date,
                     "country":country,
                     "ono":ono
                                                      
                  },

                  type: 'post',
                     success: function(result)
                        {
                           //alert('success');
                           $("#nextbtn1").html(result);
						  if(result=='')
							{
							alert("Already puchased");	
							$('#geofencess').hide();
							window.location.reload(); 
						   } 
                        }
               });
            }
      
   </script>
   <!-- end geo fence -->
<!--basicleave---->
<script>
 function myFunction2() 
      {
      var month = parseFloat($('#month1232').val()) || 0;
      var userlimit = parseFloat($('#userlimit2').val()) || 0;
      var addonprice = parseFloat($('#addonprice2').val()) || 0;
      // alert(month);
       //alert(userlimit);
      // alert(addonprice);
      var total = $('#total2').val(month * userlimit * addonprice); 
      // alert(total);
      }
     
      
   </script>
   <script>
   function basicleavepay() 
   {

   var months = $("#month1232").val();
   var tamt = $("#total2").val();
   var addonprice= $("#addonprice2").val();
   var today =new Date();
   today.setDate(today.getDate());
 //alert(today);
   var curyear = today.getFullYear();
   var curmonth = today.getMonth()+1;
   var curdate =today.getDate();
   var end_date = new Date(); // Now
   end_date.setDate(end_date.getDate() + (30*months)); // Set now + 30 days as the new date
 //alert(end_date);
   var oid="<?php echo $orgid; ?>";
// alert(oid);
   var oname="<?php echo $orgname; ?>";
   var ono="<?php echo $orgno; ?>";
   var currency="<?php echo $currency; ?>";
   var addonname = "addon_BasicLeave";
   var country ="<?php echo $country; ?>";
      
         $('#basicleavess').hide();
         $.ajax
               ({ 
                  url: '<?php echo URL;?>Addon/curl',
                  data: 
                  {
                     "tamt": tamt,
                     "addonprice":addonprice,
                     "months": months,
                     "today":today,
                     "curyear": curyear,
                     "curmonth":curmonth,
                     "curdate": curdate,
                     "addonprice":addonprice,
                     "oid":oid,
                     "oname":oname,
                     "currency":currency,
                     "addonname":addonname,
                     "end_date":end_date,
                     "country":country,
                     "ono":ono
                                                      
                  },

                  type: 'post',
                     success: function(result)
                        {
                           //alert('success');
                           $("#nextbtn2").html(result);
						    if(result=='')
							{
							alert("Already puchased");	
							$('#basicleavess').hide();
							window.location.reload(); 
						   } 
                        }
               });
            }
      
   </script>
<!-- end basicleave -->
  <!---facerecog---->
<script>
 function myFunction3() 
      {
      var month = parseFloat($('#month1233').val()) || 0;
      var userlimit = parseFloat($('#userlimit3').val()) || 0;
      var addonprice = parseFloat($('#addonprice3').val()) || 0;
      // alert(month);
       //alert(userlimit);
      // alert(addonprice);
      var total = $('#total3').val(month * userlimit * addonprice); 
      // alert(total);
      }
     
      
   </script>
   <script>
   function facerecogpay() 
   {

   var months = $("#month1233").val();
   var tamt = $("#total3").val();
   var addonprice= $("#addonprice3").val();
   var today =new Date();
   today.setDate(today.getDate());
 //alert(today);
   var curyear = today.getFullYear();
   var curmonth = today.getMonth()+1;
   var curdate =today.getDate();
   var end_date = new Date(); // Now
   end_date.setDate(end_date.getDate() + (30*months)); // Set now + 30 days as the new date
 //alert(end_date);
   var oid="<?php echo $orgid; ?>";
// alert(oid);
   var oname="<?php echo $orgname; ?>";
   var ono="<?php echo $orgno; ?>";
   var currency="<?php echo $currency; ?>";
   var addonname = "Addon_FaceRecognition";
   var country ="<?php echo $country; ?>";
      
         $('#facerecogss').hide();
         $.ajax
               ({ 
                  url: '<?php echo URL;?>Addon/curl',
                  data: 
                  {
                     "tamt": tamt,
                     "addonprice":addonprice,
                     "months": months,
                     "today":today,
                     "curyear": curyear,
                     "curmonth":curmonth,
                     "curdate": curdate,
                     "addonprice":addonprice,
                     "oid":oid,
                     "oname":oname,
                     "currency":currency,
                     "addonname":addonname,
                     "end_date":end_date,
                     "country":country,
                     "ono":ono
                                                      
                  },

                  type: 'post',
                     success: function(result)
                        {
                           //alert('success');
                           $("#nextbtn3").html(result);
						   
						   if(result=='')
							{
							alert("Already puchased");	
							$('#facerecogss').hide();
							window.location.reload(); 
						   } 
                        }
               });
            }
      
   </script>
<!-- end facerecog -->

 <!---advancevisit---->
<script>
 function myFunction4() 
      {
      var month = parseFloat($('#month1234').val()) || 0;
      var userlimit = parseFloat($('#userlimit4').val()) || 0;
      var addonprice = parseFloat($('#addonprice4').val()) || 0;
      // alert(month);
       //alert(userlimit);
      // alert(addonprice);
      var total = $('#total4').val(month * userlimit * addonprice); 
      // alert(total);
      }
     
      
   </script>
   <script>
   function advancevisitpay() 
   {

   var months = $("#month1234").val();
   var tamt = $("#total4").val();
   var addonprice= $("#addonprice4").val();
   var today =new Date();
   today.setDate(today.getDate());
 //alert(today);
   var curyear = today.getFullYear();
   var curmonth = today.getMonth()+1;
   var curdate =today.getDate();
   var end_date = new Date(); // Now
   end_date.setDate(end_date.getDate() + (30*months)); // Set now + 30 days as the new date
 //alert(end_date);
   var oid="<?php echo $orgid; ?>";
// alert(oid);
   var oname="<?php echo $orgname; ?>";
   var ono="<?php echo $orgno; ?>";
   var currency="<?php echo $currency; ?>";
   var addonname = "Addon_advancevisit";
   var country ="<?php echo $country; ?>";
      
         $('#advancevisitss').hide();
         $.ajax
               ({ 
                  url: '<?php echo URL;?>Addon/curl',
                  data: 
                  {
                     "tamt": tamt,
                     "addonprice":addonprice,
                     "months": months,
                     "today":today,
                     "curyear": curyear,
                     "curmonth":curmonth,
                     "curdate": curdate,
                     "addonprice":addonprice,
                     "oid":oid,
                     "oname":oname,
                     "currency":currency,
                     "addonname":addonname,
                     "end_date":end_date,
                     "country":country,
                     "ono":ono
                                                      
                  },

                  type: 'post',
                     success: function(result)
                        {
                           //alert('success');
                           $("#nextbtn4").html(result);
                        }
               });
            }
      
   </script>
<!-- end  facerecog---->
<!-----shiftplanner----->
<script>
 function myFunction5() 
      {
      var month = parseFloat($('#month1235').val()) || 0;
      var userlimit = parseFloat($('#userlimit5').val()) || 0;
      var addonprice = parseFloat($('#addonprice5').val()) || 0;
     //alert(month);
       //alert(userlimit);
      // alert(addonprice);
      var total = $('#total5').val(month * userlimit * addonprice); 
      // alert(total);
      }
     
      
   </script>
   <script>
   function shiftplannerpay() 
   {

   var months = $("#month1235").val();
   var tamt = $("#total5").val();
   var addonprice= $("#addonprice5").val();
   var today =new Date();
   today.setDate(today.getDate());
 //alert(today);
   var curyear = today.getFullYear();
   var curmonth = today.getMonth()+1;
   var curdate =today.getDate();
   var end_date = new Date(); // Now
   end_date.setDate(end_date.getDate() + (30*months)); // Set now + 30 days as the new date
 //alert(end_date);
   var oid="<?php echo $orgid; ?>";
// alert(oid);
   var oname="<?php echo $orgname; ?>";
   var ono="<?php echo $orgno; ?>";
   var currency="<?php echo $currency; ?>";
   var addonname = "Addon_ShiftPlanner";
   var country ="<?php echo $country; ?>";
      
         $('#shiftplannerss').hide();
         $.ajax
               ({ 
                  url: '<?php echo URL;?>Addon/curl',
                  data: 
                  {
                     "tamt": tamt,
                     "addonprice":addonprice,
                     "months": months,
                     "today":today,
                     "curyear": curyear,
                     "curmonth":curmonth,
                     "curdate": curdate,
                     "addonprice":addonprice,
                     "oid":oid,
                     "oname":oname,
                     "currency":currency,
                     "addonname":addonname,
                     "end_date":end_date,
                     "country":country,
                     "ono":ono
                                                      
                  },

                  type: 'post',
                     success: function(result)
                        {
                           ////alert('success');
                           $("#nextbtn5").html(result);
						   
						    if(result=='')
							{
							alert("Already puchased");	
							$('#shiftplannerss').hide();
							window.location.reload(); 
						   } 
						  
                        }
               });
            }
      
   </script>
<!-- end shiftplanner --> 
<!-- case1  -->

   <script>
     
       $('#edit123').on('change', function(e){
      

      var edit = $('input[name=edit123]:checked').val();
      edit = 1 - edit;
      //alert(edit);
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonedit/<?php echo $data['id']; ?>",
      
      data:{"edit":edit},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
      
   </script>
   <!-- End case1  -->

   <!-- case 2  -->
   <script>
     
   /*     $('#shiftplanner').on('change', function(e){
      
      var shiftplanner = $('input[name=shiftplanner]:checked').val();
      shiftplanner = 1 - shiftplanner;
      //alert(shiftplanner);

    
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonshiftplanner/<?php echo $data['id']; ?>",
      
      data:{"shiftplanner":shiftplanner},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
       */
   </script>
   <!-- case 2 end  -->

   <!-- case 3  -->
   <script>
     
       $('#autotimeout').on('change', function(e){
     

     

      var autotimeout = $('input[name=autotimeout]:checked').val();
      autotimeout = 1 - autotimeout;
      //alert(autotimeout);

    
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonautotimeout/<?php echo $data['id']; ?>",
      
      data:{"autotimeout":autotimeout},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
     
      });
      
   </script>
   <!-- case 3 end  -->

   <!-- case 4  -->
   <script>
     
       $('#delete123').on('change', function(e){
     
     

      var delete123 = $('input[name=delete123]:checked').val();
      delete123 = 1 - delete123;
      //alert(delete123);

     
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddondelete/<?php echo $data['id']; ?>",
      
      data:{"delete123":delete123},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
    
      });
      
   </script>
   <!-- case 4 end  -->

   <!-- case 5  -->
   <script>
     
       $('#offline').on('change', function(e){
     
     

      var offline = $('input[name=offline]:checked').val();
      offline = 1 - offline;
      //alert(offline);

    
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonoffline/<?php echo $data['id']; ?>",
      
      data:{"offline":offline},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
      
   </script>
   <!-- case 5 end  -->

   <!-- case 6  -->
   <script>
     
       $('#image_status').on('change', function(e){
     

     

      var selfie = $('input[name=image_status]:checked').val();
      selfie = 1 - selfie;
      //alert(selfie);

    
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddoselfie/<?php echo $data['id']; ?>",
      
      data:{"selfie":selfie},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
      
   </script>
   <!-- case 6 end  -->

   <!-- case 7  -->
   <script>
     
       $('#covid19').on('change', function(e){
    

     
      var covid = $('input[name=covid19]:checked').val();
      covid = 1 - covid;
      //alert(covid);

        
      
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddoncovid/<?php echo $data['id']; ?>",
      
      data:{"covid":covid},
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
  
      });
      
   </script>
   <!-- case 7 end  -->

   <!-- case 8  -->
   <script>
     
      /*  $('#advancevisit').on('change', function(e){
      

    

      var advancevisit = $('input[name=advancevisit]:checked').val();
      advancevisit = 1 - advancevisit;
     

          
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonadvisit/<?php echo $data['id']; ?>",
      
      data:{"advancevisit":advancevisit},

      success:function(result){


      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
     
      }); */
      
   </script>
   <!-- case 8 end  -->

   <!-- case 9  -->
    <script>
     
     /*   $('#basicleave').on('change', function(e){
    

      
      var basicleave = $('input[name=basicleave]:checked').val();
      basicleave = 1 - basicleave;
      //alert(basicleave);
   
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonleave/<?php echo $data['id']; ?>",
      
      data:{"basicleave":basicleave},
      success:function(result){
         //alert(result);
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      }); */
      
   </script> 
    <!-- case 10  -->
	<script>
	$('#attendanceadon').on('change', function(e){
    

      
      var attendanceadon = $('input[name=attendanceadon]:checked').val();
      attendanceadon = 1 - attendanceadon;
      //alert(attendanceadon);
   
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonadminatt/<?php echo $data['id']; ?>",
      
      data:{"attendanceadon":attendanceadon},
      success:function(result){
         //alert(result);
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
	</script>
	<script>
	$('#visitpunch').on('change', function(e){
 //   alert('visitpunch');
 //   alert('visitpunch');

      
      var visitpunch = $('input[name=visitpunch]:checked').val();
      visitpunch = 1 - visitpunch;
    //  alert(visitpunch);
   
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonvisitpunch/<?php echo $data['id']; ?>",
      
      data:{"visitpunch":visitpunch},
      success:function(result){
         //alert(result);
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
	</script>
	<script>
	$('#mobileid').on('change', function(e){
   // alert('mobile');

      
      var mobileid = $('input[name=mobileid]:checked').val();
	  //alert(mobileid);
      mobileid = 1 - mobileid;
   // alert(mobileid);
   
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddonmobileid/<?php echo $data['id']; ?>",
      
      data:{"mobileid":mobileid},
      success:function(result){
         //alert(result);
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
	</script>
	<script>
	$('#timeoff').on('change', function(e){
   // alert('timeoff');

      
      var timeoff = $('input[name=timeoff]:checked').val();
	  //alert(mobileid);
      timeoff = 1 - timeoff;
     // alert(mobileid);
   
      $.ajax({
      url: " <?php echo URL;?>Addon/updateaddontimeoff/<?php echo $data['id']; ?>",
      
      data:{"timeoff":timeoff},
      success:function(result){
         //alert(result);
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
       setTimeout("location.reload(true);",1000);
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
       setTimeout("location.reload(true);",1000);
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      
      
      });
	</script>
	
   <!-- case 9 end  -->
   <!--  <script>
      $(document).ready(function() {  
      $('#payment').click(function(){
      var month125 = $('input[name=livelocationmonth]:checked').val();
      var total125 = $('input[name=total]:checked').val();
      $.ajax({
      url: "<?php echo URL;?>Addon/livelocationupgrade",
      data:{"mnth":month125,"ttl":total125},
      
      success:function(result){
      if(result == "true")
      {
      doNotify('top','center',2,' Upgraded successfully');
      }
      else
      {
      doNotify('top','center',2,'Addon updated successfully');
      }
      },
      error: function(result)
      {
      doNotify('top','center',4,'Unable to connect API');
      }
      });
      });
      
      });   
      </script> -->
      <script type="text/javascript">
         document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}





// for modal refreshing
$('.ref').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})
      </script>
</html>