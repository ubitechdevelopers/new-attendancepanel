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
        /* text-decoration: none;*/
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
        /* text-decoration: none;*/
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
 
 /* */ 
.owl-nav{
  position: absolute;
  top: -6rem;
  right: 0;
}
.owl-theme .owl-nav {
  /*margin-top: 2rem;*/
  /*width: 68.6rem;*/
}
button.owl-prev
{
  width: 2rem;
 /* margin-right: 32.9rem!important;*/
}
button.owl-next
{
  width: 2rem;
  /*margin-left: 31rem!important;*/
}
button.owl-next span
{
  font-size: 2rem;
}
button.owl-prev span
{
  font-size: 2rem;
}
/*.owl-carousel.owl-drag .owl-item {
  margin-right:1!important;
}*/

  /*swiper*/

   /* html,
    body {
      position: relative;
      height: 100%;
    }
*/
   /* body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }*/

   .swiper-container {
                width: 72vw!important;
                height: 100%;
            }
            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                width: auto!important;
                /*margin-right: 0px!important;*/
                /* Center slide text vertically */
                display: -webkit-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                align-items: center;
            }
.swiper-button-next,
.swiper-button-prev {
    background-color: white;
    background-color: rgba(255, 255, 255, 0.5);
   
    color: #000 !important;
    fill: black !important;
    stroke: black !important;
}
.buttons-collection{
         border: none;
         position: relative;
        /* top: -11.2rem;*/
         /* left: 44rem; */
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
  top: 3.4rem!important;
  z-index: 2000;
  
  }
  .right{
    float: right;
    margin-bottom: 5px;
  }
  .flex-wrap {
         margin-left: 38.36rem!important;
         }
         .nohover:hover
         {
         background: white!important;
         border-color: white!important;
         }
         .nohover
         {
         background: white!important;
         border-color: white!important;
         }
      </style>


   </head>
   <body>
       <?php 
         $data['pageid']=3.12;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main" style="width: 83.7%;">
        
           
          <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
                    
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><span> <a href="<?= URL; ?>Attendance/allattendance" class="subhead">All Attendance</a></span></div>
                                    <!--<div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/index" class="subhead " style="width:10px;">Present</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/absent"  class="subhead">Absent</a></span></div>-->
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/notreporte"  class="subhead">NotReported</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/latecomer" class="subhead">Late Comers</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/earlyleaver" class="subhead">Early Leavers</a></span> </div>
                                    <div class="swiper-slide"> <span><a href="<?= URL; ?>Attendance/overtime" class="subhead">Overtime</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/undertime" class="subhead">Undertime</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/notsynced" class="subhead">Not Synced</a></span></div>
                                    <div class="swiper-slide"> <span><a href="<?= URL; ?>Attendance/ontimeoff" class="subhead">On Time off</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/onleave" class="subhead">On Leave</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/disapproved" class="subhead">Disapproved & Approved</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/attregister" class="subhead">Attendance Register</a></span></div>
                                    <div class="swiper-slide"><span  class="active5"><a href="<?= URL; ?>Attendance/deptsummary" class="subhead">Department Summary</a></span></div>
                                    <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/customizedrept" class="subhead">Customized Report</a></span></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <!--  </div>
                       </div>
                       </div> -->
                </div>
             
           
           
               <table id="example" class="table" style="width:100%;">
          <thead>
                        <tr >
                          <th class="" >Departments</th>
                          <th class="">Total</th>
                          <th>Present</th>
                          <th>Absent</th>
                          <th>Late Comers</th>
                          <th>Early Leavers</th>
                          <!--<th class="text-left" width="10%" 
                          style="background-image:none"!important>Action</th>-->
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
      <!--column Visibility-->

       <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="<?= URL; ?>Attendance/allattendance"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
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
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled >&nbsp;Departments</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Total</label><br>
                                      
                                        


                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                      
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp; Present</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled >&nbsp;absent </label><br> 
                                       
                                      

                                       




                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                       
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" >&nbsp;Late Commers</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" >&nbsp;Early Leavers</label><br>
                                       




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
              </div>
            </div>
      <!-- Modal -->
      <form  id="add_dept" method="post">
         <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Department List</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     Department<br>
                     <input type="text" class="form-control" id="deptName" value="" name="Name" placeholder="Enter Department Name">
                     <span id="deptName_error" class="error_form"></span>
                     <br>
                     <div class="row">
                                  <div class="col-lg-4">
                                  </div>
                                    <div class="col-lg-8">
                                   
                                 <button type="button"  class="btn btn-secondary bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="save12" class="btn btn-success bttn">Save</button>
                      </div>
                    </div> 
                  </div>
                 <!--  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
               </div>
               <div id="response"></div>
            </div>
         </div>
      </form>
         <!--------Attendance date range filter modal start----------->
      <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="<?= URL; ?>Attendance/allattendance"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form role="form1" >
                  <div class="modal-body">
               <form>
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-4 col-form-label">Date</label>
               <div class="col-sm-8">
               <div class="input-group-prepend ">
               <div id="reportrange" class="pull-left  form-control" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 104%; border-radius:7px 0px 0px 7px">
               &nbsp;
               <span></span> <b class="caret"></b>
               </div>
               <div class="input-group-text" style="border-radius:0px 7px 7px 0px"> <i class="fa fa-calendar"></i></div>
               </div>
               </div>
               </div>
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-4 col-form-label">Department</label>
               <div class="col-sm-8">
               <select id="deprt" class="form-control ">
               <option value="0">-Select Department-</option>
               <?php
                  $data = json_decode(getAllDept($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++)
                      echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                  ?>
               </select>
               </div>
               </div>
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-4 col-form-label">Shift</label>
               <div class="col-sm-8">
               <select id="shift" class="form-control ">
               <option value="0">-Select Shift-</option>
               <?php
                  $data = json_decode(getAllShift($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++)
                      echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                  ?>
               </select>
               </div>
               </div>
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-4 col-form-label">Designation</label>
               <div class="col-sm-8">
               <select id="desg" class="form-control ">
               <option value="0">-Select Designation-</option>
               <?php
                  $data = json_decode(getAllDesg($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++)
                      echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                  ?>
               </select>
               </div>
               </div>
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-4 col-form-label">Employees</label>
               <div class="col-sm-8">
               <select id="empl"  class="form-control ">
               <option value="0">-Select Employee-</option>
               <?php
                  $data= json_decode(getAllemp($_SESSION['orgid']));
                  for($i=0;$i<count($data);$i++){
                    echo '<option  value='.$data[$i]->id.'>'.$data[$i]->FirstName.'  '.$data[$i]->LastName.'</option>';
                  }?>
               </select>
               </div>
               </div> 
                     <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Attendance type</label>
                                    <div class="col-sm-8">
                                        <select id="attendence"  class="form-control " onchange="location = this.value;">
                                            <option value="0">-Select Type-</option>
                                            <option value="<?= URL; ?>Attendance/index">Present</option>
                                            <option value="<?= URL; ?>Attendance/absent">Absent</option>
                                            <option value="<?= URL; ?>Attendance/allattendance">Both</option>
                                        </select>
                                    </div>
                                </div> 
               </form>
               <div class="row">
               <div class="col-lg-4">
               </div>
               <div class="col-lg-8"  style="text-align: end;">
               <div class="right">
               <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
               <button type="button" id="getAtt" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
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
      <!--------Attendance date range filter modal End----------->
     
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
      //"dom": '<"pull-left"f><"pull-right"l>rtip',   
      'bDestroy':true,    
      
      
      
      buttons: [
      {
      extend:'colvis',
      action: function myexcel() {
        //alert('shakir');
        $('#column_modal').modal('show');

                }
              },
              {
              
              text:'<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
              className: "btn btn-light nohover",
              action: function() {
              
              $('#filtermodal').modal('show');
              
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
								 /*  modifier: 
								  { 
								     page: 'current'
								  }, */
								  columns: [0,1,2, 3, 4, 5] 
								},
						      title: 'departmentsummary' 
							},
         
                             {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0,1,2, 3, 4, 5]
                                 }
                             },
							 {
                                 extend: 'pdf',
								 //pageSize: 'TABLOID',
                                 exportOptions: {
									  
                                     columns: [0,1,2, 3, 4, 5]
                                 }
                             },{
                                 extend: 'print',
                                 // autoPrint: false,
								 //pageSize: 'TABLOID',
                                 title: '',
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0,1,2, 3, 4, 5],
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
      //"dom": 'Bfrtip',    
            "serverSide":true,
           "serverMethod":"post", 
          "scrollX": true,                  
      "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

                 language: {
                     search: "",
                     searchPlaceholder: " Search",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>Attendance/departmentreport",
                 "columns": [
          { "data": "departname" },
          { "data": "total" },
          { "data": "present"},
          { "data": "absent" },
          { "data": "latecomers" },
          { "data": "earlyleavers" }
                
         ]
         });
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
                 var minDate = moment();
      var start = moment().subtract(0, 'days');
      var end = moment().subtract(0, 'days');
      
      function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      } 
      
      $('#reportrange').daterangepicker({
          maxDate:minDate,
        //minDate:'-4M',
        minDate : moment().subtract(3 , 'month').startOf('month'),
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

 $('#getAtt').click(function(){
       //alert();
      var range=$('#reportrange').text();
      var shift=$('#shift').val();
     
      //alert(shift);
      var dept=$('#deprt').val();
      var empl=$('#empl').val();
      var desg=$('#desg').val();
       var table = $('#example').DataTable({
      //"dom": '<"pull-left"f><"pull-right"l>tip',   
      'bDestroy':true,    
      
      
      
      buttons: [
      {
      extend:'colvis',
      action: function myexcel() {
        //alert('shakir');
        $('#column_modal').modal('show');

                }
              },
              {
              
              text:'<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
              className: "btn btn-light nohover",
              action: function() {
              
              $('#filtermodal').modal('show');
              
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
								 
								  columns: [0,1,2, 3, 4, 5] 
								},
						      title: 'departmentsummary' 
							},
         
                             {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0,1,2, 3, 4, 5]
                                 }
                             },
							 {
                                 extend: 'pdf',
								 //pageSize: 'TABLOID',
                                 exportOptions: {
									  
                                     columns: [0,1,2, 3, 4, 5]
                                 }
                             },{
                                 extend: 'print',
                                 // autoPrint: false,
								// pageSize: 'TABLOID',
                                 title: '',
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0,1,2, 3, 4, 5],
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
      //"dom": 'Bfrtip',    
            "serverSide":true,
           "serverMethod":"post", 
      "scrollX": true,                  
       "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

                 language: {
                     search: "",
                     searchPlaceholder: "",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>Attendance/departmentreport",
                 "columns": [
                { "data": "departname" },
          { "data": "total" },
          { "data": "present"},
          { "data": "absent" },
          { "data": "latecomers" },
          { "data": "earlyleavers" }
                
         ]
         });
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
          alert(deptnm);
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
    <script>
      $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    }
})    </script>
 <script>
   var swiper = new Swiper('.swiper-container', {
    // autoHeight:true,
    // height:60,
     slidesPerView: 5,
     spaceBetween: 30,
     freeMode: true,
     pagination: {
       el: '.swiper-pagination',
       clickable: true,
     },
     navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      
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