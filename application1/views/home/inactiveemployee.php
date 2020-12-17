<!doctype html>
<html lang="en">
   <head>
   <?php 
         $this->load->view('menubar/allnewcss');
         ?>
      <title>UbiAttendance Panel</title>
      <style type="text/css">
         div.dataTables_wrapper div.dataTables_filter input {
         /* margin-left: 0.5em; */
         /* display: inline-block; */
         /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
         
         position: absolute;
         box-sizing: border-box;
         width: 5rem;
         border:none;
         border-radius: 4px;
         font-size: 14px;
       
         background-image: url('<?= URL ?>../assets/icons/u_search.svg');
         background-position: 10px 12px;
         background-repeat: no-repeat;
         padding: 21px 20px 23px 40px;
         -webkit-transition: width 0.4s ease-in-out;
         transition: width 0.4s ease-in-out;


         }
         .dataTables_length{
                margin-top: 10px;

            }
         div.dataTables_wrapper div.dataTables_filter input:focus{
            width: 20rem;
              background-color: #e9f1e8;

         }
         div.dataTables_wrapper div.dataTables_filter
         /* text-align: right; */
        /* margin-left: -104%!important;*/
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
         font-size: 14px;
         font-style: 'Poppins';
         }
         table.dataTable tbody {
         font-size: 14px;
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
         color: black!important;
         text-decoration: none!important;
         }
         .a{
         text-decoration: none;
         color: black;
         font-size: 1rem;
         font-family: 'Poppins',sans-serif;
         font-weight: 600;
         }
         .subhead{
         font-size: 18px;
         color: #828282;
         display: flex;
         cursor: pointer;
         text-decoration: none;
         font-weight: 500!important;
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
                font-weight: 700!important;
                color: #0F0F0F;
                font-family: 'Poppins';
                font-style: normal;
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
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(2) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(3) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(4) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(5) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(6) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(7) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(8) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(9) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(10) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(11) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(12) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(13) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(14) {
         padding-top: 1.35rem!important;
         } 
         table.dataTable tbody td:nth-child(15) {
         padding-top: 1.35rem!important;
         }
         .buttons-collection{
         border: none;
         position: relative;
         /*top: -5.5rem;*/
         left: 34rem!important;
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }
          @media screen and (min-width: 1300px) {
               .buttons-collection{  left:43rem!important;}
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
         div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin-top: -2rem!important;
}
div.sticky {
  position: -webkit-sticky!important;
  position: sticky!important;
  top: 1rem!important;
 
 z-index: 2000;
  
}

div.sticky.active {
         background: white;
        /* box-shadow: 0px 5px 10px -5px #acacac;*/


          transition: ease-in-out .5s;
          position: -webkit-sticky!important;
 position: sticky!important;
  top: 3.3rem!important;
  z-index: 2000;
  
  }
  .right{
    float: right;
    margin-bottom: 5px;
  }

 
  

      </style>
   </head>
   <body>
      <!-- sideBar -->  
         <?php
        $data['pageid']=2.1;
        $orgid = $_SESSION['orgid'];
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar');
        ?>
      
    
    
      <main class="main" style="width: 83.7rem!important;">
         
           
        
           
            
                  <!-- Tab Bar -->
                  <!-- Nav tabs -->
                  

                  <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
                   
                
                     <nav class="main-nav">
                        <ul>
                           <li ><a href="<?= URL; ?>Userprofiles/employeelist" class="subhead">Active </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <li class="active5"><a href="<?= URL; ?>Userprofiles/inactiveemployee" class="subhead">InActive </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <li><a href="<?= URL; ?>Userprofiles/archiveemployee" class="subhead">Archive </a></li>
                        </ul>
                        <i class="active-marker"></i>
                     </nav>
                  </div>
              
                <div class="container-fluid" style="padding: 0px; margin: 0px;">
              
            
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
        
        
         <table id="example" class="table" style="width:100%;">
            <thead>
               <tr style="color: gray;font-size: 0.9375rem">
                  <th>Name</th>
                  
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Shift</th>
                  <th>Phone</th>
                  <th>Username / Email</th>
                  <th>Status</th>
                  <th style="text-align:center;">Action</th>
               </tr>
            </thead>
         </table>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
      </main>
      <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="<?= URL; ?>Userprofiles/inactiveemployee"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <form role="form1" >
                  <div class="modal-body">
                     <div class="form-group" >
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  
                                    <label class="filtr"><input type="checkbox" checked class="modal_checkbox" id="chk0" disabled="">&nbsp;Name</label><br>
                                  
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Department</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2"disabled >&nbsp;Designation</label><br>
                                 </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp;Shift</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" disabled >&nbsp;Phone</label><br>
                                      <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5">&nbsp;Username / Email </label>
                                    <br>
                                   
                                 </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" >&nbsp;Status</label><br>
                                 </div>
                                  
                              </div>
                           </div>
                        </div>
                     </div>
                    <!--   <div class="row"> -->
                                <!--  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                   <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" >&nbsp;Status</label><br>
                                 </div> -->
                                 <!--  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: end;"> -->
                     <div class="right">
                                <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                            </div>
                      <!--   </div> -->
                   <!--  </div> -->

                  </div>
                  <!-- <div class="modal-footer">
                     <button type="button" id="button1" class="btn btn-primary bttn filtr" data-dismiss="modal">Save</button>
                     <button type="button" class="btn btn-danger bttn filtr" data-dismiss="modal">Close</button>         
                  </div> -->
               </form>
            </div>
         </div>
      </div>
      <div class="modal fade" id="delEmp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/designation"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp; Archive Employee</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="del_id" />
                     <div class="row">
                        <div class="col-md-12">
                           <h5>Move "<span id="na"></span>" to the archive employees?</h5>
                           <p><b>Note:</b> Archived employees will still be counted in registered employees. To reduce the no. of registered employees, delete the employee from the archived employees also.</p>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal" style="width:9rem;">Cancel</button>
                  <button type="button" id="delete" class="btn btn-success" style="width:9rem;">Save</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="changestatus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/designation"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp; Change Status</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <p id="sname" style="font-family: poppins; font-size:16px;">  </p>
                  <div class="clearfix"></div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal"style="width:9rem;">Cancel</button>
                  <button type="button" id="savestatus" class="btn btn-success" style="width:9rem;">Save</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Optional JavaScript; choose one of the two! -->
      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
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
      
        <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
      <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

         -->
        
      <script>
         $(document).ready(function () {
         // alert('<?=URL?>../assets/image/logo.png');
         var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
         var datestring="&date=";
         var date = new Date();
         date.setMinutes(0);
         date.setSeconds(0);
         date.setMilliseconds(0);
         
         var isoDateString = date.toISOString().substring(0,10);
             var table = $('#example').DataTable({
         //"dom": '<"pull-left"f><"pull-right"l>tip', 
         // "scrollX": true,  
         
         
         buttons: [{
      extend:'colvis',
      action: function myexcel() {
        //alert('shakir');

         $('#column_modal').modal('show');

                    
    
                }
   },
                  {
            
         extend:'collection',
         text:'<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
         //buttons:['csv', 'excel', 'pdf',  {
         //extend: 'print',
         ///// autoPrint: false,
         //title: '',
         //exportOptions: {
         ///// columns: ':visible',
         //columns: [ 0, 1, 2, 3, 4, 5],
         //stripHtml: false,
         //},
		 buttons: [{
                                 extend: 'csvHtml5',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5,6]
                                 }
                             },
         
                             {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5,6]
                                 }
                             },
							  {
                                 extend: 'pdf',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5,6]
                                 }
                             },{
                                 extend: 'print',
                                 // autoPrint: false,
                                 title: '',
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0, 1, 2, 3, 4, 5,6],
                                     stripHtml: false,
                                 },
         repeatingHead:{
         
         logo: '<?=URL?>../assets/image/logo.png',
         logoPosition: 'center',
         logoStyle: 'height:100px;width:130px;',
         title: 'Active employees of '+org+' Dated '+isoDateString+'',
         
         },
         // text: '<i class="fa fa-print"></i> Print',
         text: 'Print',
         
         customize: function (win) {
         $(win.document.body)
         .css('font-size', '10px')
         
         // .prepend(
         //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
         // );
         
         $(win.document.body).find('table')
         .addClass('compact')
         .css('font-size', 'inherit');
         }
         }]
         }],


          // buttons1: [ 'pageLength' ],
         //"dom": 'Bfrtip',                      
         "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: "  Search",
                     sLengthMenu: "Row   _MENU_"
                 },
         
                 "contentType": "application/json",
                 "ajax": "<?php echo URL; ?>userprofiles/getinactiveEmployeesData",
                 "columns": [
                 
                     {"data": "name"},
                    
                     {"data": "department"},
                     {"data": "designation"},
                     {"data": "shift"},
                     {"data": "contact"},
                      {"data": "username"},

                     {"data": "status"},

                     {"data": "action"}
         
                 ]
             });
         
             var total = table.columns().visible().length - 1;
             //alert(total);
             setTimeout(function () {
         
                 var checkbox = 0;
                 //var total=9;
                 //alert(total);
                 for (var i = 0; i < total; i++) {
         
                     if (table.column(i).visible()) {
                         checkbox++;
                         $("#chk" + i).iCheck("check");
                     }
                 }
         
         
                 if (checkbox == total) {
         
                     for (var i = 0; i < total; i++) {
                         if (i < 5) {
                             table.column(i).visible(true);
                             $("#chk" + i).iCheck("check");
                         } else {
                             table.column(i).visible(false);
                             $("#chk" + i).iCheck("uncheck");
                         }
                     }
                 }
             }, 500);
         
         
             $('input[type="checkbox"]').on('ifChecked', function () {
                 var checkbox = $("input[type='checkbox']:checked ").length;
                 //alert(checkbox);
                 for (var i = 0; i < checkbox; i++) {
                     var ischecked = $("#chk" + i).is(":checked");
                     if (checkbox > 4) {
         
                         if (ischecked == true) {
                             $("#chk" + i).iCheck(":checked");
                         } else {
                             $("#chk" + i).iCheck(":unchecked");
                         }
                     }
                 }
             });
         
             $("#button1").click(function () {
                 var checkbox = $(".modal_checkbox");
                 //alert(checkbox.length);
                 for (var i = 0; i < checkbox.length; i++) {
                     var column = table.column(i);
                     var ischecked = $("#chk" + i).is(":checked");
                     // alert(ischecked);
                     if (ischecked == true)
                     {
                         column.visible(true);
                     } else {
         
                         column.visible(false);
                     }
         
                 }
                 //$('#column_modal').hide();
                 //$('#example').DataTable().ajax.reload(null, false);
             });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
             $(document).on("click", ".checkbox", function ()
             {
         
                 if ($('.checkbox:checked').length == $('.checkbox').length)
                 {
                     $('#select_all').prop('checked', true);
                 } else
                 {
                     $('#select_all').prop('checked', false);
                 }
                 //var flag = boxes.filter(':checked').length > 0;
                 if ($('.checkbox:checked').length > 0) {
                     $('#next-container').show();
                 } else {
                     $('#next-container').hide();
                 }
             });
         
         });
      </script> 
      <script>
         $(document).ready(function ()
         {
             $('#select_all').click();
             $('#select_all').on('click', function ()
             {
                 if (this.checked)
                 {
                     $('.checkbox').each(function ()
                     {
                         this.checked = true;
                         $('#next-container').show();
                     });
                 } else {
                     $('.checkbox').each(function ()
                     {
                         this.checked = false;
                         $('#next-container').hide();
                     });
                 }
         
         
                 $('input[name="select_all"]').attr('click', function () {
         
                     if (this.checked) {
         
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
         window.onclick = function (event) {
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
      <script>
         $(document).ready(function () {
              
                      //  var sid = 0;
                        //var ssts = "";
                        $(document).on("click", ".dropdown .dropdown-menu .status", function () {
                           // alert($(this).data('sts'));
                           // alert($(this).data('id'));
                            sid =$(this).data('id');
                            //alert ($(this).data('id'));
                            ssts =$(this).data('sts')
                            //alert ($(this).data('sts'));
                            //$('.checkbox').each(function ()
                            //{
                                //this.checked = false;
                            //});
         
                            // $("#sname").text("Do you want to change "'+$(this).data('ena')+'"  status as Active");
                            $("#sname").text('Make "' + $(this).data('ena').trim() + '" active?');
                            //$("#changestatus").modal("show");
                            
                            
                        });
                        $("#savestatus").click(function () {
         
                            id = sid;
                           sts = ssts;
                          $.ajax({url: "<?php echo URL; ?>userprofiles/updateUserStatus",
         
                                data: {"id": id, "sts": sts},
                                success: function (result) {
                                    if (result == 1) {
	$("#changestatus").modal("hide");
                                        doNotify('top', 'center', 2, 'Employee status updated successfully');
                                        $('#example').DataTable().ajax.reload();
                                        setTimeout("location.reload(true);",2000);
                                        
                                    }
                                },
                                error: function (result) {
                                    alert ('error');
                                    doNotify('top', 'center', 4, 'Unable to connect API');
                                }
                            });
                        });
             
         $(document).on("click", ".dropdown .dropdown-menu .delete", function () {
                          // alert($(this).data('id'));
                    $('#del_id').val($(this).data('id'));
                            $('#na').text($(this).data('name').trim());
                           // alert($(this).data('name'));
                        });
                        $(document).on("click", "#delete", function () {
                            var id = $('#del_id').val();
							
                            $.ajax({url: "<?php echo URL; ?>userprofiles/deleteUser",
                                data: {"sid": id},
                                success: function (result) {
         
                                    if (result == 1) {
                                        $('#delEmp').modal('hide');
                                        doNotify('top', 'center', 2, 'Employee archived successfully');
										$('#example').DataTable().ajax.reload();
                    setTimeout("location.reload(true);",2000);
                                    } else if (result == 2)
                                    {
                                        doNotify('top', 'center', 4, "Employee with admin permission can't be deleted");
                                    }
                                },
                                error: function (result) {
                                    doNotify('top', 'center', 4, 'Unable to connect API');
                                }
                            });
                        });
         
                    });
                    
                    
      </script>
      <script type="text/javascript">
         $(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.sticky').addClass('active');
        } else {
            $('.sticky').removeClass('active');
        }
    });
});
      </script>
       <script>
$("#example").on('processing.dt', function (e, settings, processing) {
$('#processingIndicator').css('display', 'none');
if (processing) {
//$(e.currentTarget).LoadingOverlay("show");
//alert('hello');
$.LoadingOverlay("show");
} else {
$(e.currentTarget).LoadingOverlay("hide", true);
$.LoadingOverlay("hide", true);
}
})

</script>
<script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>
   </body>
</html>