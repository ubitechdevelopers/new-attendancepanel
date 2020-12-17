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
		 font-weight:500;
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
         font-weight: 700!important;

         color: black;
         }
         .right{
          float: right;
          margin-right: 5px;
          margin-bottom: 5px;
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
         /*top: -4.6rem;*/         
         /* left: 44rem; */
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }
         
         .dt-buttons {
            float : right ;
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
          top: 2.9rem!important;
          z-index: 2000;
  
  }
  button, .shinigami {
    float:right;
}
.hover:hover{
   background-color: #ececec;
}
  
.dt-buttons a:nth-child(n):hover{
          background: #ECECEC;
	     } 
         .dt-button-collection .dropdown-menu{
	      padding:0;
         }
      </style>
   </head>
   <body>
      <?php 
         $data['pageid']=7.3;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
         
            
            
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
           
         
               <div class="row">
                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                     <div class="row" style="margin-left: 0px;">
                        <span> <a href="<?= URL; ?>Managesettings/index" class="subhead">Shifts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <span ><a href="<?= URL; ?>Managesettings/department" class="subhead">Department</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                        <span ><a href="<?= URL; ?>Managesettings/designation"  class="subhead">Designation</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="active5"><a href="<?= URL; ?>Managesettings/holidays" class="subhead">Holidays</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><a href="<?= URL; ?>Managesettings/geofence" class="subhead">Geo Fence</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><a href="<?= URL; ?>Managesettings/hourlyrate" class="subhead">Hourly Rate</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </div>
                  </div>
				  
				    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 shinigami" >
				   <button class="primary-button" data-toggle="modal" data-target="#myModal">
                                <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span>Add Holiday</div> 
                                </button>
								</div>
                  
               </div>
            </div>
            <!--  -->
          
          <table id="example" class="table" style="width:100%;">
            <thead>
                        <tr>
                          <th>Holiday</th>
                          <th width="">From</th>
                           <th width=>To</th>
                          <th width="">Total days</th>
                          <th width="">Description</th>
                          <th width="" >Action</th>
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
         <?php  $this->load->view('menubar/footer');?>

      </main>

        <!--column Visibility-->

       <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a  href="#"class="close a" data-dismiss="modal" aria-label="Close" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form1" >
                        <div class="modal-body">
                            <div class="form-group" >
                                <div class="row">


                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                     
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp; Holiday</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp; From</label><br>
                                         
                                        


                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                      
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled >&nbsp; To </label><br>
                                        
                                       
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp;Total days </label><br>
                                       
                                       
                                      

                                       




                                    </div>
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                       
                                     
                                        
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" >&nbsp; Description </label><br>




                                    </div>
                                  <!--  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                       
                                          <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk18" >&nbsp; Logged Hours</label>
                                        <br>
                                          <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk19" >&nbsp;Device</label>
                                          <br>
                                           <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk20" >&nbsp;Status</label><br>
                                           <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk21" >&nbsp;Action</label>
                                        <br>
                                    </div>-->

                                </div>
                            </div>
                             <div class="row">
                                          <div class="col-lg-3">
                                          </div>
                                            <div class="col-lg-9"  style="text-align: end;">
                            <div class="right">
                                <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                            </div>
                             </div>
                            </div>
                        </div>


                    </form>
                    <!--  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="save12" class="btn btn-success">Save</button>
                     </div> -->
                </div>
              </div>
            </div>
      <!-- Modal -->

      <!------Edit Holidays modal start------------>

<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Holiday Name</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                    <form id="editFormE">
      <input type="hidden" id="sid" />
      <div class="row">
        <div class="col-md-12" >
          <div class="form-group">
            <!-- <label class="control-label">Holiday Name<span class="red">*</span></label> -->
            <input type="text" id="nameE" class="form-control" >
          </div>
        </div>
        
      </div>
      <div class="row" >
        <div class="col-md-6" >
          <div class="form-group">
            <label class="control-label">From<span class="red">*</span></label>
            <input type="text" id="fromE"  class="form-control datepicker1" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">To<span class="red">*</span></label>
            <input type="text" id="toE" class="form-control datepicker" >
          </div>
        </div>
      </div>      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Description</label>
            <textarea id="descE" class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>
                  
                    <br>
                    <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn fit" data-dismiss="modal" style="color: grey;">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="saveE" class="btn btn-success bttn fit">Update</button>
                   </div>
                      </div>
                    </div> 
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>
<!------Edit holidays modal close------------>




<!-----delete holiday start--->


   <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete Holiday</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form>
      <input type="hidden" id="del_sid" />
      <div class="row">
        <div class="col-md-12">
          <h6>Delete "<span id="hna"></span>"?</h6>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>
                    <br>
                    <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color: grey;">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="del" class="btn btn-success bttn">Save</button>
                   </div>
                      </div>
                    </div> 
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>
<!-----delete holiday close--->

  






      <form  id="createForm" method="post">
        
              <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Holiday List</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                    Holiday<br>
                    <input type="text" class="form-control" id="name1" placeholder="Enter Holidays" ><br>
                    <span id="name1_error" class="error_form"></span>
                    <div class="row">
                    <div class="col-md-6">
                        From<br>
                        <input type="text" class="form-control datepicker"id="from" >
                        <span id="from_error" class="error_form"></span>
                    </div>
                    <div class="col-md-6">
                        To<br>
                        <input type="text" class="form-control datepicker1" id="to" >
                        <span id="to_error" class="error_form"></span>
                    </div>
                    </div><br>
                    Description<br>
                    <textarea class="form-control"  id="desc" placeholder="Reason For Holidays" ></textarea>
                    <span id="desc_error" class="error_form"></span>
                    <br>
                    <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color: grey;">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="saveholiday" class="btn btn-success bttn">Save</button>
                   </div>
                      </div>
                    </div> 
                  </div>
                  <!-- <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" id="saveholiday" class="btn btn-success">Save</button>
                  </div> -->
               </div>
               <div id="response"></div>
            </div>
         </div>
      </form>
     
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
      buttons: [{
                        extend: 'csv',

                        text: 'csv',
                        extension: '.csv',
                        exportOptions:

                        {

                            columns: [0,1,2,3,4],
                        },
                        title: 'Holiday'
                    },
                        {
                            extend: 'pdf',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                
                            exportOptions: {
                                columns: [0,1,2,3,4],
                               
                            },
                            alignment: 'center',
                        }, {
                            extend: 'print',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                            // autoPrint: false,
                            title: '',
                            
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0,1,2,3,4],
                                
                                stripHtml: false,
                            },
      repeatingHead:{
      
      logo: '<?=URL?>../assets/image/logo.png',
      logoPosition: 'center',
      logoStyle: 'height:100px;width:130px;',
      title: 'Holidays of '+org+' Dated '+isoDateString+'',
      
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
      //"dom": 'Bfrtip',    
      // "scrollX": true,    
      'serverSide': true,
      'serverMethod': 'post',   
               
      "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: " Search",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>Managesettings/getAllHolidays",
                 "columns": [
                { "data": "name" },
        
          { "data": "from" },
          { "data": "to" },
          { "data": "days" },
            { "data": "description" },
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



       <script type="text/javascript">
    $("#saveholiday").click(function () {
    var name1 = $('#name1').val();
	

				   var fromdate=$('#from').val();
				   //var fromdate1=new Date(fromdate);
				   var fromdate1 = Date.parse(fromdate);
				   //var fromdate2=fromdate1.getMilliseconds();
				   var todate=$('#to').val();
				   //var todate1= new Date(todate);
				   var todate1 = Date.parse(todate);
                   //var todate2=todate1.getMilliseconds();
				   var desc=$('#desc').val().trim();
    //alert(name1);
    if ($.trim($('#name1').val()).length == 0)
    {
    // $("#name1_error").html("Please enter Holiday");
    //$("#name1_error").css("color", "#F90A0A");
    $("#name1_error").show();
    $("#name1").css("border", "2px solid #F90A0A");
    return false;
    } else
    {
    $("#name1_error").hide();
    $("#name1").css("border", "2px solid #34F458");
    $('#name1').removeClass('has-error');
    }
    var from = $('#from').val();
    //alert(from);
    if ($.trim($('#from').val()).length == 0)
    
    {
    // $("#from_error").html("Please enter Date");
    //$("#from_error").css("color", "#F90A0A");
    $("#from_error").show();
    $("#from").css("border", "2px solid #F90A0A");
    return false;
    } else
    {
    $("#from_error").hide();
    $("#from").css("border", "2px solid #34F458");
    $('#from').removeClass('has-error');
    }
    var to = $('#to').val();
     // alert(to);
    if ($.trim($('#to').val()).length == 0)
    {
    // $("#to_error").html("Please enter Date");
    //$("#to_error").css("color", "#F90A0A");
    $("#to_error").show();
    $("#to").css("border", "2px solid #F90A0A");
    return false;
    } else
    {
    $("#to_error").hide();
    $("#to").css("border", "2px solid #34F458");
    $('#to').removeClass('has-error');
    }
    var desc = $('#desc').val();
    if ($.trim($('#desc').val()).length == 0)
    {
    //$("#desc_error").html("Please enter Description");
    //$("#desc_error").css("color", "#F90A0A");
    $("#desc_error").show();
    $("#desc").css("border", "2px solid #F90A0A");
    return false;
    } else
    {
    $("#desc_error").hide();
    $("#desc").css("border", "2px solid #34F458");
    $('#desc').removeClass('has-error');
    }
	if(fromdate1 > todate1){
   				// alert("Invalid date range!!!!  From date cannot be greater than To date.");
   				// alert("h3");
   				doNotify('top','center',4,'Invalid date range ! from date cannot be greater than to date');
				
 						  return false;
							}



    
    $.ajax({
    url: "<?php echo URL; ?>managesettings/add_holiday",
    data: {"name1": name1, "from": from, "to": to, "desc": desc},
    type: "post",
    success: function (response) {
      if(response>1){
                    doNotify('top', 'center', 4, 'Holiday name already exit');
                    return false;
                   }
                   else{
                    doNotify('top', 'center', 2, 'Holiday added successfully');
                            setTimeout("location.reload(true);",2000);
       //setTimeout("location.reload(true);",2000);
    $('#myModal').modal('hide');
    $('#holiday')[0].reset();
    $("#name1").css("border", "1px solid #E5E5E5 ");
    $("#from").css("border", "1px solid #E5E5E5 ");
    $("#to").css("border", "1px solid #E5E5E5 ");
    $("#desc").css("border", "1px solid #E5E5E5 ");
                   }
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
     $('#saveE').click(function(){

           var name=$('#nameE').val().trim();
                   //alert(name);
           var fromdate=$('#fromE').val();
                   // var fromdate2=new Date(fromdate); 
                   var fromdateE = Date.parse(fromdate);

           var todate=$('#toE').val();
           // var todate2= new Date(todate);
           var todateE = Date.parse(todate);

           var desc=$('#descE').val().trim();

           var sid=$('#sid').val();

           // fromdate.getFullYear();
       //             alert(fromdate);
           // alert(fromdateE);
            // alert(todate);
            // alert(todateE);
            // alert(fromdateE > todateE);

           

          if(name==''){
            $('#nameE').focus();
            $('#nameE').val("");
            doNotify('top','center',4,'Please enter the holiday name');
            return false;
          }
          if(fromdate==''){
            $('#fromE').focus();
            doNotify('top','center',4,'Please enter the date from');
            return false;
          }

          if(todate==''){
            $('#toE').focus();
            doNotify('top','center',4,'Please enter the date to');
            return false;
          }
          if(fromdateE > todateE){
          
          doNotify('top','center',4,'Invalid date range ! from date cannot be greater than to date');
              return false;
              }
            

          

          

              
          // if(desc==''){
            // $('#name').focus();
            // doNotify('top','center',4,'Please enter the description.');
            // return false;
          // }
           $.ajax({url: "<?php echo URL;?>managesettings/editHoliday",
            data: {"sid":sid,"name":name,"from":fromdate,"to":todate,"desc":desc},
            success: function(result){
              if(result==1){
                doNotify('top','center',2,'Holiday updated successfully');
                 setTimeout("location.reload(true);",2000);
               
                $('#edit').modal('hide');
                 location.reload();
                 table.ajax.reload();
              }
              else
                doNotify('top','center',4,'No changes found');
                document.getElementById('editForm').reset();
                
                $('#edit').modal('hide');
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
         $('#fromE').datetimepicker({ minDate: new Date() }); 
               $('#toE').datetimepicker({ minDate: new Date() }); 
       
      }); 
      $(document).on("click", ".edit", function () {
        //alert("hyy");
        
        $('#nameE').attr('placeholder',"");
        $('#sid').val($(this).data('sid'));
        $('#nameE').val($(this).data('name'));
        $('#fromE').val($(this).data('from'));
        $('#toE').val($(this).data('to'));
        $('#descE').val($(this).data('description'));
      });


      // cannot delete

  $(document).on("click", ".cant23", function () 
      {
        var id=$('#del_sid').val();
        $.ajax({url: "<?php echo URL;?>managesettings/holidays",
            data: {"sid":id},
            success: function(result){
              if(result){
                
                doNotify('top','center',4,'This event cannot be deleted as it is a past event');
                
               
                 table.ajax.reload();
              }else{
                
                doNotify('top','center',4,'There may error(s) in deleting holiday');
                
              }
            
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });

  // cannot edit

  $(document).on("click", ".cant12", function () 
      {
        var id=$('#del_sid').val();
        $.ajax({url: "<?php echo URL;?>managesettings/holidays",
            data: {"sid":id},
            success: function(result){
              if(result){
              
                doNotify('top','center',4,'This event cannot be edited as it is a past event');
               
                setTimeout("location.reload(true);",1000);
              }else{
                
                doNotify('top','center',4,'There may error(s) in editing holiday');
                
              }
            
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });


  $(document).on("click", "#del", function () 
      {
        var id=$('#del_sid').val();
        
        //alert(id);
        $.ajax({url: "<?php echo URL;?>managesettings/deleteHoliday",
            data: {"sid":id},
            success: function(result){
              if(result){
                $('#delete').modal('hide');
                doNotify('top','center',2,'Holiday deleted successfully');
                 setTimeout("location.reload(true);",2000);
                 table.ajax.reload();
              }else{
                $('#delete').modal('hide');
                doNotify('top','center',4,'There may error(s) in deleting holiday');
                 
              }
            
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });
  $(document).on("click", ".delete", function () {
        $('#del_sid').val($(this).data('sid'));
        $('#hna').text($(this).data('sname'));
        // alert($(this).data('sname'));
        

      });
   </script>

   


   <script type="text/javascript">
            $( ".datepicker1" ).datepicker({
               // dateFormat: 'dd-mm-yy',
               minDate:new Date()
            }).attr('readonly', 'readonly'); 
			
			$( ".datepicker" ).datepicker({
               // dateFormat: 'dd-mm-yy',
               minDate:new Date()
            }).attr('readonly', 'readonly');
      
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