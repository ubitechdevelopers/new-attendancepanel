  <!doctype html>
  <html lang="en">
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?=URL;?>../assets/scss/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link href="<?=URL?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <title>UbiAttendance Panel</title>
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
           {font-size: 1.1rem;
           color: #828282;
           display: flex;
           cursor: pointer;
           text-decoration: none;
           font-weight: 600!important;
           font-family: 'Poppins',sans-serif;
           }
           .bttn
           {
           width: 8rem;
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

        </style>
     </head>
     <body>
        <!-- sideBar -->  
        <div class="sidebar">
           <div class="logo-container">
              <img class="logo" src="<?=URL?>../assets/image/logo.png" alt="">
           </div>
           <a href="#contact">
              <div  class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/dashboard_icon.svg" alt=""> </span>  Dashboard
              </div>
           </a>
           <a href="<?=URL?>/Userprofiles/employeelist">
              <div id="active" class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/employee_icon.svg" alt=""> </span>    Employees
              </div>
           </a>
           <a href="#clients">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/attendance_icon.svg" alt=""> </span>   Attendances
              </div>
           </a>
           <a href="#clients">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/report_icon.svg" alt=""> </span> Reports
              </div>
           </a>
           <a href="#clients">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/client_icon.svg" alt=""> </span> Clients
              </div>
           </a>
           <a href="#clients">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/visits_icon.svg" alt=""> </span>  Visits
              </div>
           </a>
           <a href="#clients">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/leave_icon.svg" alt=""> </span> Leaves
              </div>
           </a>
           <a href="#clients">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets//icons/payroll_icon.svg" alt=""> </span> Payroll
              </div>
           </a>
           <a href="<?=URL?>/Managesettings">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets//icons/manage_icon.svg" alt=""> </span>   Manage
              </div>
           </a>
           <a href="<?=URL?>/Settings">
              <div class="side-item-container">
                 <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/settings_icon.svg" alt=""> </span>   Settings
              </div>
           </a>
        </div>
        <!-- /sideBar -->
        <!-- NavBar -->
        <nav class="navbar navbar-expand-md fixed-top justify-content-between">
           <div class="navbar-collapse dual-nav w-50 order-1">
              <ul class="nav navbar-nav ml-auto">
                 <li class="nav-item ">
                    <a href="#">

                       <div style="position: static; text-align: center;" class="user">
                          <img src="<?=URL?>../assets/image/user_png.png" alt="" id="user-image" class="float-left-center">
                          
                       </div>
                    </a>
                 </li>
                 <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div style="position: static; text-align: center;" class="user">
                          
                          <span id="username">Dayitava</span>
                        
                       </div>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 0rem;font-size: 0.65rem;">
            <a class="dropdown-item" href="#" style="padding: 0.25rem 0.5rem;">Change Password</a>
            <a class="dropdown-item" href="#" style="padding: 0.25rem 0.5rem;">Logout</a>
            
            
          </div>
        </li>
              </ul>
           </div>
           </div>
        </nav>
        <!-- /navbar -->
        <main class="main">
           <div class="container-fluid">
              <div class="row">
                 <div id="title-text-container" class="col-lg-5 col-md-2 col-sm-2">
                    <div class="primary-text">Employees</div>
                 </div>
                 <div id="button-container" class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="    padding: 5px 0px 5px 0px;">
                  <button class="tertiary-button">
                       <div> <span class="side-item-icon"> <img src="<?=URL?>../assets/icons/download.svg" alt=""> </span> <span class="btn btn-default no-print filtr" onclick="window.print()" >Import Client </span></div>
                    </button>
                    
                    <button class="primary-button">
                       <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span> Add Employee </div>
                    </button>
                 </div>
              </div>
              <div id="tab-bar" class="row">
                 <div id="tab-bar-container" class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <!-- Tab Bar -->
                    <!-- Nav tabs -->
                    <div id="heading2">
                       <nav class="main-nav">
                          <ul>
                             <li ><a href="<?=URL;?>Userprofiles/employeelist">Active Employees</a></li>
                             <li class="active5"><a href="<?=URL;?>Userprofiles/inactiveemployee">InActive Employees</a></li>
                             <li><a href="<?=URL;?>Userprofiles/archiveemployee">Archive Employees</a></li>
                          </ul>
                          <i class="active-marker"></i>
                       </nav>
                    </div>
                 </div>
                 <div id="button-container" class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="    padding: 5px 0px 5px 0px;">
                    <button class="tertiary-button">
                       <div> <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/printer.svg" alt=""> </span> <span class="btn btn-default no-print filtr" onclick="window.print()">Print </span></div>
                    </button>
                    <button class="tertiary-button">
                       <div>
                          <span class="side-item-icon"> <img src="<?=URL?>../assets/icons/download.svg" alt=""> </span><span class="dropdown-toggle filtr btn btn-default" data-toggle="dropdown">Download</span>  
                          <div class="dropdown-menu">
                             <a class="dropdown-item filtr"  href="#">CSV</a>
                             <a download="active_employee.xls" href="#" onclick="return ExcellentExport.excel(this, 'example', 'Active Employee');" class="btn btn-default no-print dropdown-item filtr">Excel</a>
                          </div>
                       </div>
                    </button>
                    <button class="tertiary-button">
                       <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/filter.svg" alt=""> </span> <span class="btn btn-default filtr">Filter</span> </div>
                    </button>



                                   </div>
              </div>
              <br>
              <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12" id="next-container" style="display:none;">
                    <button class="btn btn-secondary">Department</button>
                    <button class="btn btn-secondary">Shift</button>
                    <button class="btn btn-secondary">Designation</button>
                    <button class="btn btn-secondary">Qr Code</button>
                    <button class="btn btn-secondary">Track Location</button>
                    <button class="btn btn-secondary">Inactive</button>
                    <button class="btn btn-secondary">Geo Center</button>
                 </div>
              </div>
           </div>
           <br>
           <!-- Coulmn Visibilty -->
                  <div class="row">
                    <div class="col-lg-7" >
                      <!--  <a href="#" data-toggle="modal" role="button" data-target="#column_modal" class="btn btn-tertiary dropdown-toggle"id="columnv"style="">
                       Column Visibility
                       </a> -->
                    </div>
                    <div class="col-lg-5" style="padding-left: 3rem;" >
                       <a href="#" data-toggle="modal" role="button" data-target="#column_modal" class="btn btn-tertiary dropdown-toggle filtr"id="columnv"style="position: absolute;">
                       Column Visibility
                       </a>
                    </div>
                  </div>

           <table id="example" class="table" style="width:100%;">
          <thead>
            <tr style="color: gray;font-size: 0.9375rem">
              <th class="">Name</th>
                            <th>Username / Email</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Shift</th>
                            <th>Phone</th>
                            <th style="background-image:none"!important>Status</th>
                            <th class="text-left" width="10%" style="background-image:none"!important >Action</th>
          </tr>
          </thead>
          <!--<tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
              </tr>
              <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>63</td>
                  <td>2011/07/25</td>
                  <td>$170,750</td>
              </tr>
              <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>66</td>
                  <td>2009/01/12</td>
                  <td>$86,000</td>
              </tr>
        </tbody>-->

      </table>
        </main>
        <div class="modal" id="column_modal">
           <div class="modal-dialog modal-lg">
              <div class="modal-content">
                 <!-- Modal Header -->
                 <div class="modal-header">
                    <h5 class="modal-title">Columns Visibility</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <!-- Modal body -->
                 <form role="form1" >
                    <div class="modal-body">
                      <div class="form-group" >
                       <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                             
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                   <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label></br> -->
                                   <label class="filtr"><input type="checkbox" checked class="modal_checkbox" id="chk0" disabled="">&nbsp;Name</label></br>
                                   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" >&nbsp;Username / Email </label>
                                   <br>
                                   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled="">&nbsp;Department</label></br>
                                   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" >&nbsp;Designation</label></br>
                                   
                                   
                                   
                                   
                                   
                                   
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                  
                                  
                                    
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" >&nbsp;Shift</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" >&nbsp;Phone</label></br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" >&nbsp;Status</label></br>
                                    
                                   
                                  
                                   
                                    
                                </div>
                                <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Employee Code</label></br> -->
                                <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk9" >&nbsp;Country</label></br> -->
                                
                                   <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk14" >&nbsp;Geo Center</label></br>
                                  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk11" >&nbsp;Hourly Rate</label></br> 
                                  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk15" >&nbsp;Permissions</label></br> -->
                                   
                                   <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk7" >&nbsp;Shift Type</label></br> -->
                                   
                                   <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk13" >&nbsp;Track Location</label></br>
                                   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk10" >&nbsp;Timezone</label></br> -->
                                   
                                   
                                    
                                   
                                
                                
                              </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                       <button type="button" id="button1" class="btn btn-primary bttn filtr" data-dismiss="modal">Save</button>
                       <button type="button" class="btn btn-danger bttn filtr" data-dismiss="modal">Close</button>         
                    </div>
                 </form>
              </div>
           </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
        <script src="<?=URL?>../assets/js/navbar.js"></script>
        <!--<script src="<?=URL?>../assets/js/tabbar.js"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="<?=URL?>../assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=URL?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src='<?=URL?>../assets/plugins/table_pdf/excellentexport.js'></script>
        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
           -->
        <script>
       $(document).ready(function() {
      var table=$('#example').DataTable({
        "dom": '<"pull-left"f><"pull-right"l>tip',
         language: { 
              search: "",
              searchPlaceholder: "Search Employee",
          },
          
      "contentType": "application/json",
           "ajax": "<?php echo URL;?>userprofiles/getinactiveEmployeesData",
           "columns": [
            { "data": "name" },
            { "data": "username" },
            { "data": "department"},
            { "data": "designation" },
            { "data": "shift" },
            { "data": "contact" },
            { "data": "status" },
            { "data": "action" }
          
    ]
    });
            var total=table.columns().visible().length-1;
                   //alert(total);
                   setTimeout(function() {
                   
                   var checkbox = 0;
                   //var total=9;
                   for(var i=0; i< total; i++) {
                   
                   if( table.column(i).visible()) {
                   checkbox++;
                   $("#chk"+i).iCheck("check");
                   }           
                   }
                  

                   if(checkbox ==total ){
                   
                   for(var i=0; i< total; i++) {        
                   if(i<6 ){       
                   table.column(i).visible(true);
                   $("#chk"+i).iCheck("check");
                   }else{
                   table.column(i).visible(false);
                   $("#chk"+i).iCheck("uncheck");
                   }        
                   }        
                   }           
                   },500); 
                   
                   
                   $('input[type="checkbox"]').on('ifChecked', function(){
                   var checkbox = $("input[type='checkbox']:checked ").length;
                   //alert(checkbox);
                   for(var i=0; i< checkbox; i++) {
                   var ischecked = $("#chk"+i).is(":checked");
                   if(checkbox >2){
                   
                   if(ischecked == true) { 
                   $("#chk"+i).iCheck(":checked");
                   } else{ 
                   $("#chk"+i).iCheck(":unchecked");
                   }     
                   }
                   }   
                   });     
                   
                   $("#button1").click(function(){
                   var checkbox = $(".modal_checkbox");
                   //alert(checkbox.length);
                   for(var i=0; i< checkbox.length; i++) {
                   var column = table.column(i);
                   var ischecked = $("#chk"+i).is(":checked");
            // alert(ischecked);
                   if(ischecked == true)
                   { 
                   column.visible(true);}
                   else{
                   
                   column.visible(false);}
                   
                   }
                   //$('#column_modal').hide();
                   //$('#example').DataTable().ajax.reload(null, false);
                   }); 
           } );
        </script>
        <script type="text/javascript">     
           $(document).ready(function() {
           $(document).on("click", ".checkbox", function () 
           {
           
           if($('.checkbox:checked').length == $('.checkbox').length) 
           {
           $('#select_all').prop('checked',true);
           }
           else
           {
           $('#select_all').prop('checked',false);
           }
           //var flag = boxes.filter(':checked').length > 0;
           if($('.checkbox:checked').length >0){
           $('#next-container').show();
           }
           
           else{
           $('#next-container').hide();
           }
           });
           
           });
        </script> 
        <script>
           $(document).ready(function()   
              {
                  $('#select_all').click();
                  $('#select_all').on('click',function()
                  {
                    if(this.checked)
                    {
                      $('.checkbox').each(function()
                      {
                        this.checked = true;
                        $('#next-container').show();
                      });
                     }
                    else{
                      $('.checkbox').each(function()
                      {
                        this.checked = false;
                        $('#next-container').hide();
                      });
                        }
            
              
                      $('input[name="select_all"]').attr('click',function(){
                             
                              if(this.checked){
           
                               $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
                            
                                
                   
                                  } else {
                                    $('#example tbody input[type="checkbox"]:checked').trigger('click');
                                }
           
              
                              //   e.stopPropagation();
                                   });
                         });
                
                           $('#select_all').click();
           
                
                        });
           
        </script>
        <script>
           function changeLanguage(language) {
               var element = document.getElementById("url");
               element.value = language;
               element.innerHTML = language;
           }
           
           function showDropdown() {
               document.getElementById("myDropdown").classList.toggle("show");
           }
           
           // Close the dropdown if the user clicks outside of it
           window.onclick = function(event) {
             //  alert();
               if (!event.target.matches('.dropbtn')) {
                   var dropdowns = document.getElementsByClassName("dropdown-content");
                   var i;
                   for (i = 0; i < dropdowns.length; i++) {
                       var openDropdown = dropdowns[i];
                       if (openDropdown.classList.contains('show')) {
                           openDropdown.classList.remove('show');
                       }
                   }
               }
           }
        </script>
     </body>
  </html>