<!DOCTYPE html>
<!--
   To change this license header, choose License Headers in Project Properties.
   To change this template file, choose Tools | Templates
   and open the template in the editor.
   -->
<html>
   <head>
     	<meta charset="UTF-8">
    	<title>Active</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	<!-- Bootstrap 3.3.2 -->
	      <link rel="stylesheet" href="<?=URL?>../assets/css/bootstrap.min.css" >
	      <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	      <link href="<?=URL?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
	      
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
	      <!-- Latest compiled and minified JavaScript -->
	      <link rel="stylesheet" type="text/css" href="<?php echo URL;?>../assets/responsive/dataTables.responsive.css">
	      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css" >
	      
	      <link rel="stylesheet" href="<?=URL?>../assets/css/styles.css">
	      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
	      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300%7CMaterial+Icons' rel='stylesheet' type='text/css'>
	      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	      <style>
	         /* Popup container - can be anything you want */
	         .popup {
	         position: relative;
	         display: inline-block;
	         cursor: pointer;
	         -webkit-user-select: none;
	         -moz-user-select: none;
	         -ms-user-select: none;
	         user-select: none;
	         }
	         /* The actual popup */
	         .popup .popuptext {
	         visibility: hidden;
	         width: 160px;
	         background-color: #fff;
	         color: #fff;
	         text-align: center;
	         border-radius: 6px;
	         padding: 8px 0;
	         position: absolute;
	         z-index: 1;
	         bottom: 125%;
	         left: 50%;
	         margin-left: -80px;
	         }
	         /* Popup arrow */
	         .popup .popuptext::after {
	         content: "";
	         position: absolute;
	         top: 100%;
	         left: 50%;
	         margin-left: -5px;
	         border-width: 5px;
	         border-style: solid;
	         border-color: #555 transparent transparent transparent;
	         }
	         /* Toggle this class - hide and show the popup */
	         .popup .show {
	         visibility: visible;
	         -webkit-animation: fadeIn 1s;
	         animation: fadeIn 1s;
	         }
	      </style>
   </head>
   <body>
      <div class="sidebar-wrapper">
         <div class="logo">
            <img src="<?=URL?>../assets/img/newlogo.png" style="width: 60%;">
            <br> <br>
            <ul style="font-size: 1.2rem;">
               <li><a href="#" ><img src="<?=URL?>../assets/img/dash.png">&nbsp;&nbsp;Dashboard</a></li>
               <li><a href="C:/Users/HP/Downloads/attendance/dashboard1.html" ><img src="<?=URL?>../assets/img/employee.png">&nbsp;&nbsp; Employee</a></li>
               <li><a href="#" ><img src="<?=URL?>../assets/img/attendance.png">&nbsp;&nbsp;Attendance</a></li>
               <li><a href="#" ><img src="<?=URL?>../assets/img/report.png">&nbsp;&nbsp;Summary Report</a></li>
               <li><a href="#" ><img src="<?=URL?>../assets/img/clients.png">&nbsp;&nbsp;Clients</a></li>
               <li><a href="#" ><img src="<?=URL?>../assets/img/visits.png">&nbsp;&nbsp;Visits</a></li>
               <li><a href="#" ><img src="<?=URL?>../assets/img/leaves.png">&nbsp;&nbsp;Leaves</a></li>
               <li><a href="#" ><img src="<?=URL?>../assets/img/pay.png">&nbsp;&nbsp;Payroll</a></li>
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
                                    <a href="#"> <i class="fa fa-search" aria-hidden="true"></i></a>
                                 </td>
                                 <td>
                                    <input type="text" class="example" placeholder="Search Employee, Department, Designation,Shift......." name="search">
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <ul class="nav navbar-nav navbar-right">
                        <li> 
                           <button id="myplan"> Upgrade
                           </button>
                        </li>
                        &nbsp;&nbsp;
                        <li>
                           <i class="fa fa-bell-o" aria-hidden="true"id="bell"></i>&nbsp;
                        </li>
                        <li>  
                           <img src="<?=URL?>../assets/plugins/images/users/varun.jpg" alt="user-img" width="30"
                              class="img-circle" id="photo" >
                        </li>
                        <li id="name">Sandesh</li>
                     </ul>
                  </div>
               </nav>
            </div>
            <hr>
            <br>
            <div class="col-xs-8">
               <h4 id="employes"><b>Employees</b></h4>
            </div>
            <div class="col-xs-4">
               <a href="<?=URL?>Userprofiles/addemployee"><button class="department1">+ Add Employees</button></a>
            </div>
            <br><br><br>
            <div id="heading2">
               <div class="col-xs-8">
                  <div class="col-xs-3" >
                     <span class="active"> <a href="<?php echo URL;?>Userprofiles/employeelist">Active Employees</a></span>  
                  </div>
                  <div class="col-xs-3">
                     <span><a href="<?php echo URL;?>Userprofiles/inactiveemployee">InActive Employees</a>    </span>       
                  </div>
                  <div class="col-xs-3">
                     <span> <a href="<?php echo URL;?>Userprofiles/archieveemployee">Archive Employees</a></span>
                  </div>
               </div>
            </div>
            <br>
            <div id="heading3">
               <div class="col-xs-3 col-xs-offset-1">
                  <span><i class="fa fa-print">&nbsp;</i>Printt<a href="#" data-toggle="modal" data-target="#column_modal"><button class="btn btn-box-tool" data-toggle="tooltip"  title="Choose Columns"><i class="fa fa-table"></i></button></a></span>
                  <span><i class="fa fa-download">&nbsp;</i>Download</span>
                  <span><i class="fa fa-sort" >&nbsp;</i>Sort</span>
               </div>
            </div>
            <br><br><br>
            <div class="col-md-12" id="next-container" style="display:none;">
               <button class="btn btn-secondary">+ Department</button>
               <button class="btn btn-secondary">+ Shift</button>
               <button class="btn btn-secondary">+ Designation</button>
               <button class="btn btn-secondary">Qr Code</button>
               <button class="btn btn-secondary">Track Location</button>
               <button class="btn btn-secondary">Inactive</button>
               <button class="btn btn-secondary">Geo Center</button>
            </div>
            <!---------table------->
            <br><br><br>
            <div class="container-fluid" id="tablename" >
               <div class="">
                  <table id="example" class="table table-bordered table-striped form nowrap" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th style="background-image:none"!important><input type="checkbox" id="select_all" name="select_all" value=""/>#</th>
                           <th>Employee Code</th>
                           
                           <th>Name</th>
                           <th>Department</th>
                           <th>Designation</th>
                           <th>Shift</th>
                           <th>Username / Email </th>
                           <th>Shift Type</th>
                           <th>Phone</th>
                           <th>Country</th>
                           <th>Timezone</th>
                           <th>Hourly Rate</th>
                           <th style="max-width:100px;" style="background-image:none"!important>Status</th>
                           <th style="max-width:100px;" style="background-image:none"!important>Track Location</th>
                           <th style="max-width:100px;">Geo Center</th>
                           <!--<th>Password</th>-->
                           <th>Permissions</th>
                           <th class="text-left" width="15%" 
                              style="background-image:none"!important>Action</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false">
         <!-- /.modal -->
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Choose columns</h4>
               </div>
               <form role="form1" >
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-xs-12">
                           <div class="form-group" >
                              <div class="col-xs-4">
                                 <label><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;#</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Employee Code</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;Photo</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp;Name</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk4" disabled>&nbsp;Department</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk5" >&nbsp;Designation</label></br>
                              </div>
                              <div class="col-xs-4">
                                 
                                 <label><input type="checkbox" class="modal_checkbox" id="chk6" >&nbsp;Shift</label><br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk7" >&nbsp;Username / Email </label>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk8" >&nbsp;Shift Type</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk9" >&nbsp;Phone</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk10" >&nbsp;Country</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk11" >&nbsp;Timezone</label></br> 
                              </div>
                              <div class="col-xs-4">
                                   
                                 <label><input type="checkbox" class="modal_checkbox" id="chk12" >&nbsp;Hourly Rate</label></br> 
                                 <label><input type="checkbox" class="modal_checkbox" id="chk13" >&nbsp;Status</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk14" >&nbsp;Track Location</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk15" >&nbsp;Geo Center</label></br>
                                 <label><input type="checkbox" class="modal_checkbox" id="chk16" >&nbsp;Permissions</label></br>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" id="button1" class="btn btn-primary">Save</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>         
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <script type="text/javascript" src="<?php echo URL;?>../assets/responsive/jquery-1.11.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      
	  <script type="text/javascript" src="<?php echo URL;?>../assets/responsive/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>../assets/responsive/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>../assets/responsive/dataTables.bootstrap.js"></script>

	  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>

	<script src="<?=URL?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
	 <script src="<?php echo URL;?>../assets/bootstrap-select/js/bootstrap-select.js"></script>  
      <script type="text/javascript">
         $(document).ready(function() {
         
         var table=$('#example').DataTable({
         
         
         dom: 'Bfrtip',
         "contentType": "application/json",
         "ajax": "<?=  URL;?>userprofiles/getEmployeesData",
         
         // "columnDefs": [
         //    { "className": "dt-center", "visible": false, "targets": [4,8,10,11,12,13,14,15] },
         
         
         //   ],
         "columns": [
         { "data": "change"},
         { "data": "code" },
         
         { "data": "name" },
         
         
         { "data": "department"},
         { "data": "designation"},
         { "data": "shift"},
         { "data": "username" },
         { "data": "shifttype" },
         { "data": "contact" },
         { "data": "country" },
         { "data": "timezone" },
         { "data": "hourlyrate" },
         { "data": "status" },
         { "data": "livetrack" },
         { "data": "area" },
         //{ "data": "password" },
         { "data": "pemissions" },
         { "data": "action"}
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
         if(i<7){       
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
         for(var i=0; i< checkbox; i++) {
         var ischecked = $("#chk"+i).is(":checked");
         if(checkbox >6){
         
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
         if(ischecked == true)
         { 
         column.visible(true);}
         else{
         
         column.visible(false);}
         
         }
         $('#column_modal').modal('hide');
         }); 
         
         });
         
         function myFunction(id) {
         var popup = document.getElementById("myPopup"+id);
         
         popup.classList.toggle("show");
         
         //var popup = document.getElementById("myPopup");
         //popup.classList.toggle("show");
         }

      </script>                  
      <script type="text/javascript">
         $('#heading2').on('click', 'span', function(){
           $('#heading2 span.active').removeClass('active');
           $(this).addClass('active');
         })
         
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
   </body>
</html>