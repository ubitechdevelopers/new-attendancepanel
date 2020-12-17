<!doctype html>
<html lang="en">
   <head>
   	<?php
       $this->load->view('menubar/allnewcss');
       ?>
      <title>Activity Log</title>
      <style>
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
         .tertiary-button {
         padding: 5px 10px 5px 20px!important;
         }
         input[type=radio] {
         width: 1.2em;
         height: 1.2em;
         }
         div.dataTables_wrapper div.dataTables_filter input {
         /* margin-left: 0.5em; */
         /* display: inline-block; */
         /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
         margin-top: -1rem;
         position: absolute;
         box-sizing: border-box;
         width: 3rem;
         border:none;
         border-radius: 4px;
         font-size: 16px;
         background-image: url('<?= URL ?>../assets/icons/u_search.svg');
         background-position: 10px 12px;
         background-repeat: no-repeat;
         padding: 21px 20px 23px 40px;
         -webkit-transition: width 0.4s ease-in-out;
         transition: width 0.4s ease-in-out;
         }
         div.dataTables_wrapper div.dataTables_filter input:focus{
         width: 20rem;
         background-color: #e9f1e8;
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
         width: 9rem;
         font-weight: 500;
         font-size: 14px;
         height: 2.5rem;
         }
         .fit{width: 9rem;
         font-weight: 500;
         font-size: 14px;
         height: 2.5rem;
         margin-bottom: 5px;
         }
         .filtr
         {
         font-size: 0.8rem;
         font-weight: 500;
         }
         .btn1{
         background-color: #D3D3D3;
         border: 1px solid;
         }
         /*b{
         font-weight: 700!important;
         }*/
         .right{
         float: right;
         }
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
         .buttons-collection{
         border: none;
         position: fixed;
         /* top: -4rem;*/
         left: 44rem!important;
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }
         /*@media screen and (max-width: 1350px) {
         .buttons-collection{  left:31rem!important;}
         }*/
         div.dataTables_wrapper div.dataTables_filter {
         text-align: left!important;
         }
         div.dt-button-collection div.dropdown-menu {
         margin-left: 1.5rem;
         }
         .tertiary-button {
         padding: 5px 10px 5px 20px!important;
         }
         .adbtn{
         color: black!important;
         }
         div.dataTables_wrapper div.dataTables_paginate ul.pagination {
         margin-top: -2rem!important;
         }
      </style>
   </head>
   <body>
      <?php
	   $data['pageid']=8.2;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');

         
         ?>
      <main class="main" style="width: 83.7%;">
         <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
           
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="row" style="margin-left: 0px;">
                     <span > <a href="<?= URL; ?>Settings" class="subhead">Notifications</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                     <span><a href="<?= URL; ?>Settings/alertsettings" class="subhead">Alerts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                     <span class="active5" ><a href="<?= URL; ?>Settings/activity" class="subhead">Activity</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                  </div>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div id="reportrange" name="daterange" class="pull-left" style=" cursor: pointer; padding: 5px;  border: 1px solid #ccc;">
                     <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                     <span></span> 
                     <b class="caret"></b>
                  </div>
               </div>
            </div>
         </div>
         <table id="example" class="table" style="width:100%;">
            <thead>
               <tr>
                  <th style="width:60%;">Activities</th>
                  <th >Module</th>
                  <th >Admin</th>
                  <th>Date & Time</th>
               </tr>
            </thead>
         </table>
      </main>
      <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="<?= URL; ?>Userprofiles/employeelist"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form role="form1" >
                  <div class="modal-body">
                     <div class="form-group" >
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Activities</label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Module</label><br>
                            
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;Admin</label><br>
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp;Date & Time</label><br>
                           </div>

                        </div>
                     </div>
                     <!-- <div class="row">
                        <div class="col-lg-7">
                        </div>
                          <div class="col-lg-5"  style="text-align: end;">-->
                     <div class="right">
                        <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
                        <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                     </div>
                     <!--  </div>
                        </div> -->
                  </div>
               </form>
               <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
            <div id="response"></div>
         </div>
      </div>
      
    <!--link-->
   
  	<?php
       $this->load->view('menubar/allnewjs');
       ?>
	
      <script>
         $(document).ready(function() {
              var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
           var datestring="&date=";
           var date = new Date();
           date.setMinutes(0);
           date.setSeconds(0);
           date.setMilliseconds(0);
           
           var isoDateString = date.toISOString().substring(0,10);
               var table = $('#example').DataTable({
           //"dom": '<"pull-left"f><"pull-right"l>tip',
           "bDestroy": true,   
           
           
           buttons: [
           {
         extend:'colvis',
         action: function myexcel() {
          //alert('shakir');
          $('#column_modal').modal('show');
         
                  }
                },
           {
           extend:'collection',
           text:'<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
           buttons:['csv', 'excel', 'pdf',  {
           extend: 'print',
         
           title: '',
           exportOptions: {
           // columns: ':visible',
           columns: [ 0, 1, 2, 3],
           stripHtml: false,
           },
           repeatingHead:{
           
           logo: '<?=URL?>../assets/image/logo.png',
           logoPosition: 'center',
           logoStyle: 'height:100px;width:130px;',
           title: 'Activity Log of '+org+' Dated '+isoDateString+'',
           
           },
         
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
         scrollX:true,
           //"dom": 'Bfrtip',                      
          "dom": '<"pull-left"l>B<"pull-left"f>rtip',   
         
                   language: {
                       search: "",
                       searchPlaceholder: " Search",
                       sLengthMenu: "Row   _MENU_"
                   },
                  "contentType": "application/json",
                  "ajax": "<?php echo URL; ?>Settings/getAllActivity",
         
                              "columns": [
                                  {"data": "ActionPerformed"},
                                  {"data": "Module"},
                                  {"data": "LastModifiedById"},
                                  {"data": "LastModifiedDate"},
                              ]
                          });
                 table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
       
       
        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

          var total=table.columns().visible().length;
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
                 if(i<4){       
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
                 if(checkbox >10){
                 
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
                 console.log(ischecked);
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
         $('#reportrange').on('DOMNodeInserted', function () { //alert();
                      var range = $('#reportrange').text().trim();
                            //alert(range);
         
                             var table = $('#example').DataTable({
           //"dom": '<"pull-left"f><"pull-right"l>tip',
           "bDestroy": true,   
           
           
           buttons: [
           {
         extend:'colvis',
         action: function myexcel() {
          //alert('shakir');
          $('#column_modal').modal('show');
         
                  }
                },
           {
           extend:'collection',
           text:'<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
           buttons:['csv', 'excel', 'pdf',  {
           extend: 'print',
         
           title: '',
           exportOptions: {
           // columns: ':visible',
           columns: [ 0, 1, 2, 3],
           stripHtml: false,
           },
           repeatingHead:{
           
           logo: '<?=URL?>../assets/image/logo.png',
           logoPosition: 'center',
           logoStyle: 'height:100px;width:130px;',
           title: 'Activity Log of '+org+' Dated '+isoDateString+'',
           
           },
         
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
         scrollX:true,
           //"dom": 'Bfrtip',                      
          "dom": '<"pull-left"l>B<"pull-left"f>rtip',   
         
                   language: {
                       search: "",
                       searchPlaceholder: " Search",
                       sLengthMenu: "Row   _MENU_"
                   },
                                  "contentType": "application/json",
                                  "ajax": "<?php echo URL; ?>Settings/getAllActivity?date="+range,
                                  //"ajax": "<?php echo URL; ?>admin/getAllHolidays",
                                  "columns": [
                                      {"data": "ActionPerformed"},
                                      {"data": "Module"},
                                      {"data": "LastModifiedById"},
                                      {"data": "LastModifiedDate"},
                                  ]
                              });

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
         ////---------date picker
         // var start = moment().subtract(29, 'days');
          var minDate = moment();
      var start = moment().subtract(0, 'days');
      var end = moment().subtract(0, 'days');
      // var end1 =moment().add('days', 59);

       
      
      function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      }
      
//       $(function() {
//   $('div[name="daterange"]').daterangepicker({
//     opens: 'right'
//   }, function(start, end, label) {
//     alert(start.format('MMM D, YYYY') + ' to ' + end.format('MMM D, YYYY'));
//   });
// });
      
          $('#reportrange').daterangepicker({
        //   maxDate:minDate,
        // //minDate:'-4M',
        // minDate : moment().subtract(3 , 'month').startOf('month'),
       

        startDate: start,
        endDate: end,


        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }

      }, cb);
      
      cb(start, end); 
         ////---------/date picker
         
         
         
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
     <!--  <script>
$(function() {
  $('div[name="daterange"]').daterangepicker({
    opens: 'right'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script> -->
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