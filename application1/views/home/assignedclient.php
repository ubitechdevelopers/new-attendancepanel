<!DOCTYPE html>
<html>
   <head>
      <title></title>
       <?php 
        $this->load->view('menubar/allnewcss');
       ?>
      <style type="text/css">
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
         
         background-image: url('<?=URL?>../assets/icons/u_search.svg');
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
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(2) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(3) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(4) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(5) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(6) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(7) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(8) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(9) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(10) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(11) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(12) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(13) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(14) {
         padding-top: 1.4rem!important;
         } 
         table.dataTable tbody td:nth-child(15) {
         padding-top: 1.4rem!important;
         } 
         @media only screen and (max-width: 568px) 
         {
         #myModal{
         /*padding-left: 76px!important;*/
         width: 22.4rem!important;
         }
         }
         .buttons-collection{
         border: none;
         position: relative;
         /*top: -5.9rem;*/
         left: 42.5rem;
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
        /* .dropdown-menu inner{
            position: static!important;
         }*/
         div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    margin-top: -1rem!important;
}
.form-control{
  font-size: 0.9rem!important;
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
      </style>
   </head>
   <body>
      <?php 
         $data['pageid']=5.1;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main"  style="width: 83.5%;">
        
           
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
               
               <div class="row">
                  <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                     <div class="row" style="margin-left: 0px;">
                        <span > <a href="<?= URL; ?>Clientsettings/index" class="subhead">Client</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <span class="active5"><a href="<?= URL; ?>Clientsettings/assignedclient" class="subhead">Assigned Client</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                        <span><a href="<?=URL;?>Clientsettings/visit"  class="subhead">Client Visit</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </div>
                  </div>
                 
               </div>
            </div>
            <!--  -->
            <br><br>
           
        
         <table id="example" class="table" style="width:100%;">
            <thead>
               <tr >
                  <th style="text-align: center;">Employee</th>
                  <th style="text-align: left;">Company</th>
                  <!-- <th class="text-left" width="15%" 
                     >Action</th> -->
                     <th style="text-align: center;" 
                     >Action</th>
               </tr>
            </thead>
         </table>
      </main>
      <!--column Visibility-->
      <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><a class="a" href="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form role="form1" >
               <div class="modal-body">
                  <div class="form-group" >
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                           <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label><br>-->
                           <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Employee</label><br>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                           <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled >&nbsp; Company</label><br>
                        </div>
                       <!--  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                           <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" >&nbsp; Action  </label><br>
                        </div> -->
                     </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-3">
                  </div>
                  <div class="col-lg-9" style="text-align: end;">
                  <div class="right">
                     <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
                     <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                  </div>
                </div>
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
      </div>
    </div>

      <!-- assign empm -->

      <div class="modal fade" id="showeditclient" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">


      
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
               <h5 class="modal-title"><a class="a" href="<?= URL; ?>Clientsettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Clients</a></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
      <div class="modal-body">
    
    </div>
  </div>
</div>
</div>
<!-- assign empm  end-->

<!-- unassign client start  -->
<div class="modal fade" id="unassign" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">    
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
               <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Unassign Clients</a></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
        <div class="modal-body">    
        <form>
          <input type="hidden" id="clienid" />
          <div class="row">
            <div class="col-md-12">
              <h6>Unassign "<span id="clientname"></span>"?</h6>
            </div>
          </div>
          
          <div class="clearfix"></div>
        </form>
        <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-9" style="text-align: end;">
         <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
        <button type="button" id="unassignclient"  class="btn btn-success bttn fit" data-dismiss="modal">Save</button>
        
        </div>
      </div>
        </div>
        
      </div>
      </div>
    </div>

<!-- assign client end  -->
<div class="modal fade" id="getassignclientlist" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 

  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
       <div class="modal-header">
               <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign clients for <span id="empnameclient"></span></a></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
      <!-- <div class="modal-header">
           <h5 class="modal-title" id="title">Assign clients for <span id="empnameclient"></span></h5>
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">x</i></button>
      
      </div> -->
      <div class="modal-body">
    
    </div>
  </div>
</div>
</div>
   </body>

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
         //'processing': true,
         'serverSide': true,
         'serverMethod': 'post',
         'beDestroy' : true,
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
        buttons:[{           
		                      extend: 'csv',
							 
							  text: 'csv',
							  extension: '.csv',
							  exportOptions:
							  
								{
								  modifier: 
								  { 
								     page: 'current'
								  },
								  columns: [0,1] 
								},
						      title: 'client' 
							},
         
                             {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0,1]
                                 }
                             },
							 {
                                 extend: 'pdf',
                                 exportOptions: {
                                     columns: [0,1]
                                 }
                             },{
                                 extend: 'print',
                                 // autoPrint: false,
                                 title: '',
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0,1],
                                     stripHtml: false,
                                 },
         repeatingHead:{
         
         logo: '<?=URL?>../assets/image/logo.png',
         logoPosition: 'center',
         logoStyle: 'height:100px;width:130px;',
         title: 'Client of '+org+' Dated '+isoDateString+'',
         
         },
        
         text: 'Print',
         
         customize: function (win) {
         $(win.document.body)
         .css('font-size', '10px')
      
      
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
      "ajax": "<?php echo URL;?>Clientsettings/getClientlist",
      //"dom": 'T<"clear">lfrtpi<"clear">', 
      "columns": [
       
       { "data": "empname" },
       { "data": "Name" },
       
       { "data": "action"}
      ]
      /*"drawCallback": function ( settings ) {
       var api = this.api();
       var rows = api.rows( {page:'current'} ).nodes();
       var last=null;
      
       api.column(0, {page:'current'} ).data().each( function ( group, i ) {
         if ( last !== group ) {
           $(rows).eq( i ).before(
             '<tr class="group"><td bgcolor="#d59ff2" colspan=12><b>'+group+'</b> <b> &nbsp; &nbsp; </b></td></tr>'
           );
           last = group;
         }
       } );
      }*/
      });
      
      table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
      
      
      table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
      
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
              if(i<3){       
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
   <script>
      $("#save12").click(function () {
          var deptnm = $('#deptName').val();
          //alert(deptnm);
          if ($.trim($('#deptName').val()).length == 0)
          {
              $("#deptName_error").html("Please enter Department");
              $("#deptName_error").css("color", "#F90A0A");
              $("#deptName_error").show();
              $("#deptName").css("border", "2px solid #F90A0A");
              return false;
          } else
          {
              $("#deptName_error").hide();
              $("#deptName").css("border", "2px solid #34F458");
              $("#deptName_error").hide();
          }
      
          $.ajax({
              url: "<?php echo URL; ?>managesettings/add_department",
              data: {"deptnm": deptnm},
              type: "post",
              success: function (response) {
      
                  $('#myModal').modal('hide');
                  $('#add_dept')[0].reset();
                  $("#deptName").css("border", "1px solid #E5E5E5 ");
                  
                  // alert('Successfully inserted');
              },
              error: function ()
              {
                 
                  alert("error");
              }
          });
      
      });
      
   </script>
   <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
      })
   </script>
   <script type="text/javascript">
      $(document).on("click", ".delete", function () {
         
         
         $('#del_id').val($(this).data('id'));
          // alert($(this).data('id'));
         $('#ena').text($(this).data('ena').trim());
         $('#count12').val($(this).data('countsts'));
         //alert($(this).data('countsts'));
       });
       $(document).on("click", "#delete", function (){
             //$("#maincontainerdiv").css("opacity","0.08");
             //$("#addClient").css("opacity","0.02");
             $("#loader").show("slow");
             
         var id=$('#del_id').val(); 
         // alert(id);
         var count=$('#count12').val(); 
         
         if(count > 0){
           doNotify('top','center',4,'This client is assigned to ' +count+ ' employee(s) cannot be deleted');
           return false;
         }
         // alert(id);
         $.ajax({url: "<?php echo URL;?>Clientsettings/deleteclient",
             data: {"clientid":id},
             success: function(result){
               
               if(result == 1){
                  //$('#delclient').modal('hide');
          
                   doNotify('top','center',2,'Client deleted successfully'); 
                   setTimeout("location.reload(true);",2000);
                  var table= $('#example').DataTable();
                  table.ajax.reload();
                 location.reload();
                   }
                             if(result == 2)
               {
                  doNotify('top','center',4,"Employee with admin permission can't be deleted"); 
               }
                              $("#maincontainerdiv").css("opacity","1");
                      $("#addEmp").css("opacity","1");
                      $("#loader").hide("slow");             
              },
             error: function(result){
                doNotify('top','center',4,'Unable to connect API');
                $("#maincontainerdiv").css("opacity","1");
                      $("#addEmp").css("opacity","1");
                      $("#loader").hide("slow");
              }
            });
       });
      
      
      
       var sid = 0;
       var ssts =  "";
       $(document).on("click", ".statusinactive", function (){
         //alert($(this).data('id'));
             
            $("#sname").text("Make '"+$(this).data('ena')+"' Inactive?");
            //alert($(this).data('ena'));
            $("#count").val($(this).data('countsts'));
             //alert($(this).data('countsts'));
            //$("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
             jQuery.noConflict();
            $("#changestatus").modal("show");
            sid = $(this).data('id');
            
            ssts = $(this).data('sts');;
         });
       $("#savestatus").click(function(){
      
          id=sid;
         // alert(id);
          sts=ssts;
          //alert(sts);
          var count = $("#count").val();
          if(count > 0){
            doNotify('top','center',4,'This client is assigned to ' +count+ ' employee(s) cannot be inactivated');
            return false;
          }
         $.ajax({url: "<?php echo URL;?>Clientsettings/updateClientStatus",
         
             data: {"id":id,"sts":sts},
             success: function(result){
               if(result == 1){  
                  doNotify('top','center',2,'Client status updated successfully');
                  setTimeout("location.reload(true);",2000);
                 var table=$('#example').DataTable();
                  table.ajax.reload(null, false);  
                  $("#changestatus").modal("hide"); 
                       }    
              },
             error: function(result){
               doNotify('top','center',4,'Unable to connect API');
              }
            });
       });
       
       $(document).on("click", ".qr1", function ()
       {
         
           doNotify('top','center',3,'Mobile no. is mandatory to generate QR Code');
       });
       
      
       $(document).on("click", ".statusactive", function (){
         //alert($(this).data('id'));
             
            $("#snameactive").text("Make '"+$(this).data('ena')+"' Active?");
            //$("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
            $("#changestatusactive").modal("show");
            sid = $(this).data('id');
            
            ssts = $(this).data('sts');;
         });
      
       $("#savestatusactive").click(function(){
          id=sid;
          sts=ssts;
          
          
         $.ajax({url: "<?php echo URL;?>Clientsettings/updateClientStatus",
         
             data: {"id":id,"sts":sts},
             success: function(result){
               if(result == 1){  
                  doNotify('top','center',2,'Client status updated successfully');
                  setTimeout("location.reload(true);",2000);
                 var table=$('#example').DataTable();
                  table.ajax.reload(null, false);  
                  $("#changestatusactive").modal("hide"); 
                       }    
              },
             error: function(result){
               doNotify('top','center',4,'Unable to connect API');
              }
            });
       });
       
       
   </script>
 <script type="text/javascript">
  $(document).on("click",".getassignclient",function(){
    var empid = $(this).data('empid');
    var cid = $(this).data('clientid');
   // alert(empid);
  //  alert(cid);
    
    
    $.ajax({
      type:"post",
        datatype:"html",
        url: "<?php echo URL;?>Clientsettings/assignclientforemp",
                data: {"empid":empid,"cid":cid},
           success: function(result)

           {
            //alert(result);
          $("#getassignclientlist .modal-body").empty();        
          $("#getassignclientlist .modal-body").html(result);        
          $("#getassignclientlist").modal('show');
          }
    });

  });
 </script>
   <script type="text/javascript">
      $(document).on("click","#getempnameforclient",function(){
      $('#empnameclient').text($(this).data('empname'));
      //alert($(this).data('empname'));
      });
      
   </script>
   <script type="text/javascript">

  $(document).on("click","#showclientlist",function(){
    var eid = $(this).data('eid')


    $.ajax({

      
        type:"post",
        datatype:"html",
        url: "<?php echo URL;?>Clientsettings/showselectedclient",
                data: {"eid":eid},
           success: function(result)

           {

          $("#showeditclient .modal-body").empty();        
          $("#showeditclient .modal-body").html(result);        
          $("#showeditclient").modal('show');
          }

    });


  });
  
  $(document).on("click",".tst",function(){
    $('#empname').text($(this).data('name').trim());
    
  });
  

 </script>

   <script type="text/javascript">
      var clientid ;
      var emplid ;
      
      
      function openmodal($clientid,$emplid,$cname){
         clientid = $clientid;
         emplid = $emplid;
         cname = $cname;
        
         //alert(clientid);
         //alert(emplid);
         //alert(cname);
         document.getElementById('clientname').innerHTML = cname;
      
        
         $("#unassign").modal('show');
      }
      
      $("#unassignclient").click(function(){
      
      
      $.ajax({      
            type:"post",
            datatype:"json",
            url: "<?php echo URL;?>Clientsettings/unassignclient",
                    data: {"clientid":clientid,"emplid":emplid},
               success: function(result)
               {
              if(result == 1){
                $('#unassign').modal('hide');
                $('#showeditclient').modal('hide');
                var table=$('#example').DataTable();
                table.ajax.reload();
      
                 doNotify('top','center',2,'Unassigned successfully'); 
                 setTimeout("location.reload(true);",2000);
                
                }
                else
                doNotify('top','center',3,'Error occured, Try later.'); 
              },
      
        });
      
      });  
      
      
      
      
   </script>
   <script>
$(document).on("click","#updateclientforemp",function(){
//var empnid = $("#ide1").val();
    var empnid = $("#empid12").val();
    var clid = $("#clientlist12").val();
    //alert(empnid);
     //alert(clid);
    if(clid==""){
      doNotify('top','center',3,'Select at least 1 client to assign employee');
      return false;
    }
    //alert(empnid);
    //alert(clid);
    $.ajax({

      url: "<?php echo URL;?>Clientsettings/updateclient",
          //data: formdata, //,"email":email
           datatype:"json",
           type:"post",
                     data: {"clientid":clid,"empid":empnid},
           success: function(result)
           {
            if(result == 1){
            $('#getassignclientlist').modal('hide');
             doNotify('top','center',2,'Assigned Successfully'); 
             setTimeout("location.reload(true);",2000);
             var table=$('#example').DataTable();
             table.ajax.reload();
             //location.reload();
            }else if(result >= 1){
              $('#getassignclientlist').modal('hide');
              doNotify('top','center',2,'Assigned Successfully'); 
              setTimeout("location.reload(true);",2000);
              var table=$('#example').DataTable();
              table.ajax.reload();
            }
            else
            doNotify('top','center',3,'Error occured, Try later.'); 
          },

      });


    });
</script>

   <script type="text/javascript">
  $(document).on("click","#assignemployee",function(){
    //alert('hello');
    var clienid = favorite;
    //alert(clienid);
    var empid = $("#assignemptoclent").val();
    //alert(empid);
    
    $.ajax({

      url: "<?php echo URL;?>Clientsettings/updateclient",
          //data: formdata, //,"email":email
          datatype:"json",
           type:"post",
                   data: {"clientid":clienid,"empid":empid},
           success: function(result)
           {
            if(result == 1){
            $('#getclient').modal('hide');
             doNotify('top','center',2,'Client assigned Successfully'); 
             setTimeout("location.reload(true);",2000);
             //var table=$('#example').DataTable();
            // location.reload();
            }
            else
            doNotify('top','center',3,'Error occured, Try later.'); 
          },

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

</html>