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
         font-size: 14px;
         
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
         border-color: #e1ffe0;
		 }
		 
         table.dataTable thead th {
         border-top: none;
         color: #9FA2B4;
         font-size: 0.85rem;
         font-style: 'Poppins';
		   font-weight: 500;
         }
         table.dataTable tbody {
         font-size: 0.85rem;
        font-family: 'Poppins',sans-serif;
        font-weight: 600;
        color: #3f424c;
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
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(2) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(3) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(4) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(5) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(6) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(7) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(8) {
 padding-top: 1.4rem!important;
 text-align: center!important;
} 
table.dataTable tbody td:nth-child(9) {
 padding-top: 1.4rem!important;
 text-align: end!important;
} 
table.dataTable tbody td:nth-child(10) {
 padding-top: 1.4rem!important;
 text-align: center!important;
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
         /* top: -4.6rem; */
         /* left: 44rem; */
         background-color: white!important;
         color: black!important;
         font-family: 'Poppins';
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }
		  .dt-buttons{
		float:right;
		
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
  top: 2.9rem!important;
  z-index: 2000;
  
  }
  .flex-wrap {
          
        /*  margin-left: 38rem!important; */
		 float:right;
		
         }
        /* @media (min-width:1010px) and (max-width:1040px)  {
    .flex-wrap{
        margin-left: 21.5rem !important;
        }
    }
    @media (min-width:1270px) and (max-width:1300px)  {
    .flex-wrap{
        margin-left: 33rem !important;
        }
    }
    @media (min-width:1420px) and (max-width:1460px)  {
    .flex-wrap{
        margin-left: 41.5rem !important;
        }
    }
 @media (min-width:1900px) and (max-width:1930px)  {
    .flex-wrap{
        margin-left: 66.5rem !important;
        }
    }
 @media (min-width:1520px) and (max-width:1550px) {
    .flex-wrap{
        margin-left: 46.5rem !important;
        }
    }
    @media (min-width:1580px) and (max-width:1610px)  {
    .flex-wrap{
        margin-left: 49.5rem !important;
        }
    }
    @media (min-width:1900px) and (max-width:1940px)  {
    .flex-wrap{
        margin-left: 65.5rem !important;
        }
    }*/
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
	   .dt-buttons a:nth-child(n):hover{
     background: #ECECEC;
	 
} 

.dt-button-collection .dropdown-menu{
	padding:0;
}
 .hover:hover {
        background-color:#ECECEC;"
        border-radius:4%;
    }
      </style>
   </head>
   <body>
      <?php 
         $data['pageid']=5.3;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main" style="width: 83.5%;">
        
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">

           
               
              
                
              
                     
               
            
               <div class="row">
                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                     <div class="row" style="margin-left: 0px;">
                        <span > <a href="<?= URL; ?>Clientsettings/index" class="subhead">Client</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <span class="subhead"><a href="<?= URL; ?>Clientsettings/assignedclient" class="subhead">Assigned Client</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                        <span class="active5"><a href="<?=URL;?>Clientsettings/visit"  class="subhead">Client Visit</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                     </div>
                  </div>
				   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
				   <!-- <button class="tertiary-button" data-toggle="modal" data-target="#filtermodal">
                        <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/filter.svg" alt=""> </span> Filter </div> 
                        </button> -->
</div>						
                 
                    
            </div>
          </div>
         
         <br>
         <br>
               <table id="example" class="table" style="width:100%;">
            <thead>
                        <tr >
					
                          <th style="text-align: center;">Employee</th>
                        
                          <th style="text-align: center;">Visited Client</th>
						  <th style="text-align: center;">Visit In image</th>
                          <th style="text-align: center;" >Visit In</th>
						  <th style="text-align: center;">Visit out image</th>
                          <th style="text-align: center;">Visit Out</th>
                          <th style="text-align: center;" >Visit Hours</th> 
                          <th style="text-align: center;">Remarks</th>
                            <th style="text-align: center;" >Employee Code</th>
						  <th style="text-align: center;">Date</th>
                          <th style="text-align: center;">Action</th>
                         <!--  <?php foreach($addonlive as $row){
                          if($row->addon_livelocationtracking==1){?>
                          <th >Action</th>
                          <?php }else{?>
                          <th ></th>
                          <?php } } ?> -->
                        </tr>
                      </thead>
        
         </table>
		
   <?php  $this->load->view('menubar/footer');?>


		
      </main>

       <!--column Visibility-->

       <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form1" >
                        <div class="modal-body">
                            <div class="form-group" >
                                <div class="row">


                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                      
                                     <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk8">&nbsp;Employee code</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled >&nbsp;Employee</label><br>
                    
                                        
                                         <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled >&nbsp; Visited Client</label><br>
                                          <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp; Visit In Image</label><br>
										   
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp; Visit In</label><br>
										  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" disabled>&nbsp; Visit out Image</label><br>
										  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" disabled>&nbsp; Visit Out</label><br>
                                     
                                      
                                      
                                          
                                       




                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                       
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" disabled>&nbsp;  Visit Hours</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk7" >&nbsp;Remarks </label><br>
                                         
										 <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk9">&nbsp; Date</label><br>
                                         
                                        <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk13" >&nbsp; Action</label><br> -->
                                       




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
              <!--Location Modal -->
<div class="modal fade" id="locationmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
				<input type="hidden" id="empid">
                <input type="hidden" id="latitid">
                <input type="hidden" id="latitinid">
                <input type="hidden" id="longiid">
                <input type="hidden" id="checkinloc">
                   
					
      <div class="modal-body">
    
    </div>
	<div class="modal-footer" style="border-top: none;">
    <button class="btn btn-success fnt" id="showgoogle" style="width: 11rem; color: white;"  >View in Fullsite</button>
    </div>
  </div>
</div>
</div>
 <!--Location Modalout -->
<div class="modal fade" id="locationmodalout" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
				<input type="hidden" id="empid">
                <input type="hidden" id="latitid">
                <input type="hidden" id="latitinid">
                <input type="hidden" id="longiid">
                <input type="hidden" id="checkinloc">
                   
					
      <div class="modal-body">
    
    </div>
	<div class="modal-footer" style="border-top: none;">
    <button class="btn btn-success fnt" id="map_fullview1" style="width: 11rem; color: white;"  >View in Fullsite</button>
    </div>
  </div>
</div>
</div>


       <!--------Attendance date range filter modal start----------->
      <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
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
	   <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 20%;width: 55%;margin-left: 150px;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" style="color:black"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <form id="imgE" method="POST" enctype="multipart/form-data" name="myformE">
                        <input type="hidden" id="imgid">
                        <img src="" class="imagepreview" style="width:100%!important;" id="profileimg">
                    </form>
                </div>
               

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
                  modifier: 
                  { 
                     page: 'current'
                  },
                  columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,9] 
                },
                  title: 'client_visit' 
              },
         
               /*               {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                 }
                             },
               {
                                 extend: 'pdf',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                 }
                             }, */
							 {
                                 extend: 'print',
                             
							     title:'',
                        
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,9],
                                     stripHtml: false,
                                 },
         repeatingHead:{
         
         logo: '<?=URL?>../assets/image/logo.png',
         logoPosition: 'center',
         logoStyle: 'height:100px;width:130px;',
         title: 'Client Visit of '+org+' Dated '+isoDateString+'',
         
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
        	 
         "scrollX": true,
        "serverSide": true,
        "serverMethod":"post",    
         "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: " search",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>Clientsettings/punchedLocations",
                 "columns": [
         
          { "data": "name" },
        
          { "data": "client" },
          { "data": "entryimg" },
          { "data": "tif" },
        /* { "data": "locationin" },*/
          { "data": "exitimg" },
          { "data": "tof" },
        //  { "data": "totaltime" },
          
        /*  { "data": "locationout" },*/
          { "data": "total" },
          { "data": "comments"},
		      { "data": "code" },
              { "data": "date" },			  
          
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
                  modifier: 
                  { 
                     page: 'current'
                  },
                  columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,9] 
                },
                  title: 'client_visit' 
              },
         
                          /*    {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                 }
                             },
               {
                                 extend: 'pdf',
                                 exportOptions: {
                                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                                 }
                             }, */
							 {
                                extend: 'print',
                            
                                 title: '',
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,9],
                                     stripHtml: false,
                                 },
         repeatingHead:{
         
         logo: '<?=URL?>../assets/image/logo.png',
         logoPosition: 'center',
         logoStyle: 'height:100px;width:130px;',
         title: 'Client Visit of '+org+' Dated '+isoDateString+'',
         
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
         "serverSide": true,
        "serverMethod":"post",    
         "scrollX": true,
         "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: " Search",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>Clientsettings/punchedLocations?date="+range+"&shift="+shift+"&deprt="+dept+"&empl="+empl+"&desg="+desg,
                 "columns": [
       
          { "data": "name" },
          { "data": "client" },
          { "data": "entryimg" },
          { "data": "tif" },
          /* { "data": "locationin" },*/
          { "data": "exitimg" },
          { "data": "tof" },
          //  { "data": "totaltime" },
          /*  { "data": "locationout" },*/
          { "data": "total" },
          { "data": "comments"},
		 { "data": "code" },
		  { "data": "date" },			  
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
<script>

      $(document).on('click', '.test', function() {
		 
		var attid = $(this).data('attid');
		//alert(attid);
    var latit = $(this).data('latit');
    var latitid = $(this).data('latitin');
    //alert(latitid);
    var longiid = $(this).data('longiin');
    //alert(longiid);
     var checkinloc= $(this).data('checkinloc');
		  // alert(attid);
		       $.ajax({


        type: "post",
        datatype: "html",
        url: "<?php echo URL;?>Clientsettings/viewclientlocation",
        data: {
            "aid": attid
        },
        success: function(result)

        {
			

            $("#locationmodal .modal-body").empty();
            $("#locationmodal .modal-body").html(result);
            $("#locationmodal").modal('show');

        }

    });
		  
	  }
	  );
	  
	$('#map_fullview').click(function() {
    var latitid=$('#latitid').val();
    window.open("http://maps.google.com/?q="+latitid);
    $('#locationmodal').modal('hide');

});
      
      $('#showgoogle').click(function(){
		  
       var latitid=$('#latitid').val();
       window.open("http://maps.google.com/?q="+latitid);
       //$("a").attr("href", "http://maps.google.com/?q="+latitid);
       //$("a").attr("target", "_blank");
       $('#locationmodal').modal('hide');  
       
      }); 
	  
	  
	  
	  
	  
 $(document).on('click', '.test1', function() {
	var attid = $(this).data('attid');
	//alert(attid);
    var latit = $(this).data('latit');
    var latitid = $(this).data('latitin');
    //alert(latitid);
    var longiid = $(this).data('longiin');
    //alert(longiid);
    var checkinloc= $(this).data('checkinloc');
    //alert(checkinloc);
		       $.ajax({

        type: "post",
        datatype: "html",
        url: "<?php echo URL;?>Clientsettings/viewclientlocationout",
        data: {
           "aid": attid
        },
        success: function(result)

        {
			//alert(result);

			
		    $("#locationmodalout .modal-body").empty();
            $("#locationmodalout .modal-body").html(result);
            $("#locationmodalout").modal('show');

        }

    });
		  
	  }
	  );
      	  
   $('#map_fullview1').click(function() {
    
   var latitid=$('#latitid').val();
    window.open("http://maps.google.com/?q="+latitid);

    $('#locationmodal1').modal('hide');

});
      
      $('#creategeo').click(function(){
       //var latitid=$('#latitid').val();
       var latitid=$('#latitinid').val();
       var longiid=$('#longiid').val();
       var checkinloc=$('#checkinloc').val();
       window.open("<?= URL?>Dashboard/creategeofence/"+latitid+"/"+longiid+"/"+checkinloc);
       // $("a").attr("href", "<?= URL?>Dashboard/creategeofence/"+latitid+"/"+longiid+"/"+checkinloc);
       // $("a").attr("target", "_blank");
       $('#locationmodal').modal('hide');  
       
      });
      
	  
	  
	  $(document).on("click", ".pop", function ()
			{
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
			});	
</script>
<script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>
</html>