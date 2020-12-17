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


      </style>
   </head>
   <body>
      <?php 
         $data['pageid']=9;
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

         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <div class="primary-text">Addons</div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-left: 20rem;">
               <button type="button" id="addonspermission"  class="btn btn-success bttn fit">Update</button>
            </div>
         </div>
         <br><br><br>
         <form id="addonsform"  action="<?php echo URL;?>Addon/updateaddonspermission/<?php echo $data['id']; ?>"  >
            <div class="row">
               <!-- Card 1 -->
               <div class="col-lg-4 item">
                  <div class="card item-card card-block lock" style="width: 18rem;height: 22rem;">
                     <br>
                     <br>
                     <br>
                     <center><img class="imt" src="<?=URL?>../assets/icons/lock.svg" alt="" style="width: 3.5rem;"></center>
                     <div class="card-body text-white">
                        <h5 class="card-title">Live Location Tracking</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                       
                        <center>
                           <input type="checkbox"  name="livelocationtracking" data-toggle="toggle" data-style="ios"id = "livelocationtracking">
                        </center>
                        
                     </div>
                  </div>
               </div>
               <!-- End Card 1 -->
               <!-- Card 2 -->
               <div class="col-lg-4 item">
                  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                     

                     <div class="dropdown">
                        <!-- three dots -->
                            <ul data-toggle="dropdown"aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;color:#808080;">
                              <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                                       
                            </ul>
                            <span class="caret"></span>
                                 
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10.5rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left: 7rem;">
                             <center><li style="    font-weight: 600;font-size: 1.2rem;">Settings
                                 <hr style="margin-top: 0rem; margin-bottom: 0rem;"></li>
                                <label class="switch">
                          <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                          <span class="slider round"></span>
                        </label></center>

                            

                    

         

             
             </ul>
             </div> 


                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">

                        <h5 class="card-title">Geo Fence</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['geofence']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="geofence" class="custom-control-input"id ="geofence"     value="<?php echo $data['geofence'] ?>" <?php if($data['geofence']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="geofence"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 2 -->
               <!-- Card 3 -->
               <div class="col-lg-4 item">
                  <div class="card item-card card-block" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Admin Attendance</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['attendanceadon']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="attendanceaddon" class="custom-control-input"id = "attendanceaddon"value="<?php echo $data['attendanceadon'] ?>" <?php if($data['attendanceadon']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="attendanceaddon"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 3 -->
            </div>
            <br>
            <br>
            <div class="row">
               <!-- Card 4 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Leave</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['basicleave']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="basicleave" class="custom-control-input"id = "basicleave"value="<?php echo $data['basicleave'] ?>" <?php if($data['basicleave']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="basicleave"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 4 -->
               <!-- Card 5 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Face Recognition</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['facerecog']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="facerecog" class="custom-control-input"id = "facerecog"value="<?php echo $data['facerecog'] ?>" <?php if($data['facerecog']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="facerecog"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 5 -->
               <!-- Card 6 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Advance Visit</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['advancevisit']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="advancevisit" class="custom-control-input"id = "advancevisit"value="<?php echo $data['advancevisit'] ?>" <?php if($data['advancevisit']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="advancevisit"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 6 -->
            </div>
            <br>
            <br>
            <div class="row">
               <!-- Card 7 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Covid 19</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['covid19']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="covid19" class="custom-control-input"id = "covid19"value="<?php echo $data['covid19'] ?>" <?php if($data['covid19']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="covid19"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 7 -->
               <!-- Card 8 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Visit Punch</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['visitpunch']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="visitpunch" class="custom-control-input"id = "visitpunch"value="<?php echo $data['visitpunch'] ?>" <?php if($data['visitpunch']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="visitpunch"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 8 -->
               <!-- Card 9 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Selfie</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['image_status']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="image_status" class="custom-control-input"id = "image_status"value="<?php echo $data['image_status'] ?>" <?php if($data['image_status']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="image_status"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 9 -->
            </div>
            <br>
            <br>
            <div class="row">
               <!-- Card 10 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Mobile ID</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['mobileid']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="mobileid" class="custom-control-input"id = "mobileid"value="<?php echo $data['mobileid'] ?>" <?php if($data['mobileid']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="mobileid"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 10 -->
               <!-- Card 11 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Hourly Pay</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['payroll']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="payroll" class="custom-control-input"id = "payroll"value="<?php echo $data['payroll'] ?>" <?php if($data['payroll']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="payroll"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 11 -->
                <!-- Card 12 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Location Tracking</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['locationtracking']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="locationtracking" class="custom-control-input"id = "locationtracking"value="<?php echo $data['locationtracking'] ?>" <?php if($data['locationtracking']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="locationtracking"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 12 -->
           </div>
           <br>
            <br>
               	<div class="row">
               <!-- Card 13 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Time Off</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['timeoff']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="timeoff" class="custom-control-input"id = "timeoff"value="<?php echo $data['timeoff'] ?>" <?php if($data['timeoff']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="timeoff"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 13 -->
               <!-- Card 14 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Offline Mode</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['offline']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="offline" class="custom-control-input"id = "offline"value="<?php echo $data['offline'] ?>" <?php if($data['offline']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="offline"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 14 -->
               <!-- Card 15 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Delete</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['delete123']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="delete123" class="custom-control-input"id = "delete123"value="<?php echo $data['delete123'] ?>" <?php if($data['delete123']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="delete123"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 15 -->
           	</div>
           	<br>
            <br>
               <div class="row">
               <!-- Card 16 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Auto TimeOut</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['autotimeout']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="autotimeout" class="custom-control-input"id = "autotimeout"value="<?php echo $data['autotimeout'] ?>" <?php if($data['autotimeout']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="autotimeout"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 16 -->
               <!-- Card 17 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Shift Planner</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['shiftplanner']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="shiftplanner" class="custom-control-input"id = "shiftplanner"value="<?php echo $data['shiftplanner'] ?>" <?php if($data['shiftplanner']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="shiftplanner"></label>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Card 17 -->
               <!-- Card 18 -->
               <div class="col-lg-4">
                  <div class="card" style="width: 18rem;height: 22rem;">
                     <h4 class="item-card-title text-right" style="padding-right: 0.5rem;"><i class="fa fa-cog" aria-hidden="true" style="font-size: 20px;"></i></h4>
                     <br>
                     <img class="imt" src="<?=URL?>../assets/icons/livelocate.svg" alt=""class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">Edit</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <?php 
                           if($data['edit123']==1) { ?>
                        <center><button type="button" class="btn btn-outline-success bttn fit">View</button> </center>
                        <style type="text/css">
                           .custom-switch{
                           display: none!important;
                           }
                        </style>
                        <?php 
                           }
                           ?>
                        <div class="custom-control custom-switch text-center">
                           <input type="checkbox" name="edit123" class="custom-control-input"id = "edit123"value="<?php echo $data['edit123'] ?>" <?php if($data['edit123']==1) echo 'checked';  ?> >
                           <label class="custom-control-label" for="edit123"></label>
                        </div>
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
      <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
             <!--   <form role="form1" > -->
                  <div class="modal-body">
               <form>
               
               
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-3 col-form-label text-center">All Zones</label>
               <div class="col-sm-9">
                <select id="zonecityfilter" name="zonecityfilter"  class="form-control">
                <option value="0">-All Zones-</option>
                <?php
                $data= json_decode(getAllzonecity($_SESSION['orgid']));
                for($i=0;$i<count($data);$i++)
                echo '<option value="'.$data[$i]->Zone.'">'.$data[$i]->Zone.'</option>';
                ?>
                </select> 
               </div>
               </div>
               
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-3 col-form-label text-center">Status</label>
               <div class="col-sm-9">
                <select id="statusfilter"  name="statusfilter" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
                </select> 
               </div>
               </div> 
               </form>
               <br><br>

               <div class="row">
               <div class="col-lg-3">
               </div>
               <div class="col-lg-9"  style="text-align: end;">
               
                <button type="button" class="btn btn-light bttn fit" data-dismiss="modal" >Cancel</button> 
                  <button type="button" id="getAtt" class="btn btn-success bttn fit" style="">Save</button>
              
               
               </div>
               </div>
               </div>
               </form>
               
 
            </div>
         </div>
      </div>
      <!--------Attendance date range filter modal End----------->
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
   <script type="text/javascript">
      $('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#filtermodal').modal();
   }
});
   </script>
    
</html>



   



