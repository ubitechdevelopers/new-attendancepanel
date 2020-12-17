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
         margin-bottom: 5px;
         margin-right: 5px;
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
         padding-left: 76px!important;
         width: 22.4rem!important;
         }
         }
         .buttons-collection{
         border: none;
         position: relative;
         /* top: -4.6rem;*/
         left: 44rem;
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
         #undefinedchecked
         {
         display: none;
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
         top: 3.3rem!important;
         z-index: 2000;
         }
		 
      </style>
   </head>
   <body  ng-app ="adminapp"  ng-controller="attroasterCtrl">
      <?php 
         $data['pageid']=7.2;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
         <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
          
               
             
                  
               
          
            
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <div class="row" style="margin-left: 0px;">
                     <span> <a href="<?= URL; ?>Managesettings/index" class="subhead">Shifts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                     <span ><a href="<?= URL; ?>Managesettings/department" class="subhead">Department</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                     <span class="active5"><a href="<?= URL; ?>Managesettings"  class="subhead">Designation</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <span><a href="<?= URL; ?>Managesettings/holidays" class="subhead">Holidays</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <span><a href="<?= URL; ?>Managesettings/geofence"  class="subhead">Geo Fence</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <span><a href="<?= URL; ?>Managesettings/hourlyrate" class="subhead">Hourly Rate</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
               </div>
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			   <button class="tertiary-button" data-toggle="modal" data-target="#printemp">
                     <div> <span class="side-item-icon" > <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span> Import Desg </div>
                  </button>
				  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="primary-button" data-toggle="modal" data-target="#myModal">
                     <div> <span class="side-item-icon" ><img src="<?= URL ?>../assets/icons/plus.svg" alt=""> </span>Add Designation</div>
                  </button>
				  </div>
            </div>
         </div>
         <!--  -->
        
         <table id="example" class="table" style="width:100%;">
            <thead>
               <tr>
                  <th width='50%'>Designations</th>
                  <!-- <th width='40%'>Description</th>-->
                  <!--<th width='10%'>Created Date</th>
                     <th width='10%' >Modified Date</th> -->
                  <th  width='60%'>Status</th>
                  <th  width='40%'>Action</th>
               </tr>
            </thead>
         </table>
      </main>
      <!--column Visibility-->
      <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-xs">
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
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label><br>-->
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled >&nbsp; Designation</label><br>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp; status </label><br>
                              <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" >&nbsp; Action</label><br> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="right">
                     <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Close</button>
                     <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                  </div>
            </div>
            </form>
         </div>
      </div>
      </div>
      <!-- assign designation -->
      <div class="modal fade" id="updateDesg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Designation</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="uid" />
                     <p> Select the employee(s) to assign this designation </p>
                     <div class="panel">
                        <div class="panel-body" >
                           <div class="row">
                              <div class="well" style="max-height: 300px;overflow: auto;width: 31rem;">
                                 <ul  class="list-group checked-list-box" id="check-list-box">
                                    <div ng-repeat="c in emparray" >
                                       <li class=" list-group-item" data-color="success" id="{{c.id}}" ng-click="getchecklistid($index)">
                                          <label >{{$index+1}}.  {{c.name}} </label>
                                       </li>
                                    </div>
                                 </ul>
                              </div>
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
                           <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color:#808080;">Close</button>
                           &nbsp;&nbsp;
                           <button type="button" ng-click="SaveEmpList(1)" class="btn btn-success bttn">Assign</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <!-- end designation -->
      <!-- assign designation -->
      <div class="modal fade" id="updateDesg1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Designation</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="uid" />
                     <p> Select the employee(s) to assign this designation </p>
                     <!--  <div class="panel">
                        <div class="panel-body" >
                            <div class="row">
                                 <div class="well" style="max-height: 300px;overflow: auto;">
                                        <ul  class="list-group checked-list-box" id="check-list-box">
                                        
                                            <div ng-repeat="c in emparray" >
                                                <li class=" list-group-item" data-color="success" id="{{c.id}}" ng-click="getchecklistid($index)">
                                                    <label >{{$index+1}}.  {{c.name}} </label>
                                                    
                                                </li>   
                                            </div>                          
                                        </ul>
                                </div>
                            </div>
                            
                        </div>
                        </div> -->
                     <div>This department is inactive. Change the status to Active to assign it to employees.</div>
                     <div class="clearfix"></div>
                  </form>
                  <br>
                  <div class="row">
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-9" style="text-align: end;">
                        <div class="right">
                           <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color:#808080;">Close</button>
                           &nbsp;&nbsp;
                           <button type="button" ng-click="SaveEmpList(1)" class="btn btn-success bttn">Assign</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <!-- end designation -->
      <!------Edit Designations modal start------------>
      <div class="modal fade" id="addDesgE" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update Designation</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="desgFromE">
                     <div class="modal-body">
                        <input type="hidden" id="did" />
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group label-floating">
                                 <label>Designation Name<span class="red">*</span></label>
                                 <input type="text" id="desgNameE" class="form-control" >
                              </div>
                              <!--    <div class="form-group label-floating">
                                 <label >Description </label>
                                 <textarea id="descE" rows='3' class="form-control"></textarea>
                                 </div> -->
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group label-floating">
                                 <label class="control-label">Status  <span class="red"> </span></label>
                                 <select class="form-control" id="statusE" >
                                    <option value='1'>Active</option>
                                    <option value='0'>Inactive</option>
                                 </select>
                                 <small style="color:green"  >Designation assigned to <span id="numemp" > </span> employee(s)</small>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </form>
                  <br>
                  <div class="row">
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-9" style="text-align: end;">
                        <div class="right">
                           <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color:#808080;">Close</button>
                           &nbsp;&nbsp;
                           <button type="button" id="saveE" class="btn btn-success bttn">Update</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <!------Edit desg modal close------------>
      <!-----delete desg start--->
      <div class="modal fade" id="delDesg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete Designation</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="del_did" />
                     <div class="row">
                        <div class="col-md-12">
                           <h6>Delete the "<span id="dna"></span>" designation?</h6>
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
                           <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color:#808080;">Close</button>
                           &nbsp;&nbsp;
                           <button type="button" id="delete" class="btn btn-success bttn">Delete</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <!-----delete desg close--->
      <!-- Modal -->
      <form  id="createForm" method="post">
         <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Designation List</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     Designation<br>
                     <input type="text" class="form-control" id="desg" placeholder="Enter Designation Name" name="Name">
                     <span id="desg_error" class="error_form"></span>
                     <br>
                     <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                           <div class="right">
                              <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color:#808080;">Close</button>
                              &nbsp;&nbsp;
                              <button type="button" id="savedesg" class="btn btn-success bttn">Save</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" id="savedesg" class="btn btn-success">Save</button>
                     </div> -->
               </div>
               <div id="response"></div>
            </div>
         </div>
      </form>
      <div class="modal fade" id="printemp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;Import Designation</a></h5>
                  <!--<button type="button" class="close" style="color:rgba(54, 54, 54, 1);">
                     <img src="<?= URL ?>../assets/img/help.png" alt=""><a href="#" style="font-size:14px; font-family:poppins; color:black;">&nbsp;&nbsp;Help</a>
                     </button>-->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="upload_csv" method="post" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-4"></div>
                        <div class="col-6 mt-3">
                           <img src="<?= URL ?>../assets/icons/import_svg.svg" alt="">
                        </div>
                        <div class="col-2"></div>
                     </div>
                     <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 mt-2 ml-4">
                           <p style="font-size:20px; color: rgba(215, 215, 215, 1);">Drag or Upload CSV file to import Employee</p>
                        </div>
                        <div class="col-2"></div>
                     </div>
                     <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 mt-3">
                           <input type="file" id="fileUpload" accept=".csv" name="fileUpload" accept=".csv,text/csv"/><br>
                        </div>
                        <div class="col-4"></div>
                     </div>
                     <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 mt-3 ml-3">
                           <button type="button" class="btn" style="width:12rem; font-weight: 700px;  color:rgba(122, 122, 122, 1);   border-color: #E5E5E5;"><a href="<?php echo IMGURL5; ?>../assets/newdesignation.csv" style="color:rgba(122, 122, 122, 1); ">Download Sample</a></button>
                        </div>
                        <div class="col-4"></div>
                     </div>
                     <div class="row">
                        <div class="col-4">
                        </div>
                        <div class="col-4 mt-3 ml-5 mb-3">
                           <!-- <button type="submit" id="btn1" class="btn btn-success btnfile call" style="width:8rem;"  disabled>Import</button>-->
                           <input type="submit" id="btn1" class="btn btn-success btnfile call" value="Next" disabled style="display: none;">
                           <button type="button" class="btn btn-success " id="registers"  style="width:8rem;" disabled >Import</button>
                        </div>
                        <div class="col-4"></div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <div class="showresult" style="display:none;">
                     <p>Total records : <span id="repeatemp"></span></p>
                     <p>Total inserted records : <span id="importemp"></span></p>
                     <a href="<?php echo URL; ?>admin/showTMPDes/1" class="btn btn-link">show insuffiecient record</a>
                  </div>
               </div>
            </div>
            <div id="response"></div>
         </div>
      </div>
      <script>
         $(document).ready(
                 function () {
                     $('#fileUpload').change(function () {
                         if ($(this).val()) {
                             $('#btn1').attr('disabled', false);
                             $('#btn1').trigger('click');
                             // $('.call').trigger('click');
                             // $('#registers').attr('disabled',false);
                             $('#registers').attr('disabled', true);
                         }
                     });
                 });
      </script>
   </body>
   <?php 
      $this->load->view('menubar/allnewjs');
      ?>
   <script>
      $(document).ready(function () {
          var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
          var datestring = "&date=";
          var date = new Date();
          date.setMinutes(0);
          date.setSeconds(0);
          date.setMilliseconds(0);
      
          var isoDateString = date.toISOString().substring(0, 10);
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
                      extend: 'collection',
                      text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                      buttons: ['csv', 'excel', 'pdf', {
                              extend: 'print',
                              // autoPrint: false,
                              title: '',
                              exportOptions: {
                                  // columns: ':visible',
                                  columns: [1, 2],
                                  stripHtml: false,
                              },
                              repeatingHead: {
      
                                  logo: '<?= URL ?>../assets/image/logo.png',
                                  logoPosition: 'center',
                                  logoStyle: 'height:100px;width:130px;',
                                  title: 'Active employees of ' + org + ' Dated ' + isoDateString + '',
      
                              },
                              // text: '<i class="fa fa-print"></i> Print',
                              text: 'Print',
      
                              customize: function (win) {
                                  $(win.document.body)
                                          .css('font-size', '10px')
      
                                  // .prepend(
                                  //     '<img src="<?= URL ?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                                  // );
      
                                  $(win.document.body).find('table')
                                          .addClass('compact')
                                          .css('font-size', 'inherit');
                              }
                          }]
                  }],
              //"dom": 'Bfrtip',    
              //"scrollX": true,
              'serverSide': true,
              'serverMethod': 'post',
              "dom": '<"pull-left"l>B<"pull-left"f>rtip',   
              language: {
               search: "",
               searchPlaceholder: " Search",
               sLengthMenu: "Row   _MENU_"
           },
           "contentType": "application/json",
           "ajax": "<?=  URL;?>Managesettings/getAllDesg1",
              "columns": [
                  {"data": "name"},
                  //  { "data": "desc" },
                  //{ "data": "cdate" },
                  //{ "data": "mdate" },
                  {"data": "status"},
                  {"data": "action"}
              ]
          });
          var total = table.columns().visible().length - 1;
          //alert(total);
          setTimeout(function () {
      
              var checkbox = 0;
              //var total=9;
              for (var i = 0; i < total; i++) {
      
                  if (table.column(i).visible()) {
                      checkbox++;
                      $("#chk" + i).iCheck("check");
                  }
              }
              if (checkbox == total) {
      
                  for (var i = 0; i < total; i++) {
                      if (i < 7) {
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
              for (var i = 0; i < checkbox; i++) {
                  var ischecked = $("#chk" + i).is(":checked");
                  if (checkbox > 6) {
      
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
   <script type="text/javascript">
      $("#savedesg").click(function () {
          var desg = $('#desg').val();
          // alert(desg);
          if ($.trim($('#desg').val()).length == 0)
          {
              $("#desg_error").html("Please enter Designation");
              $("#desg_error").css("color", "#F90A0A");
              $("#desg_error").show();
              $("#desg").css("border", "2px solid #F90A0A");
              return false;
          } else
          {
              $("#desg_error").hide();
              $("#desg").css("border", "2px solid #34F458");
              $('#desg').removeClass('has-error');
          }
          $.ajax({
              url: "<?php echo URL; ?>managesettings/add_designation",
              data: {"desg": desg},
              type: "post",
              success: function (response) {
                  doNotify('top', 'center', 2, 'Designation added successfully');
                           setTimeout("location.reload(true);",2000);
                  $('#myModal').modal('hide');
                  $('#createForm')[0].reset();
                  $("#desg").css("border", "1px solid #E5E5E5 ");
              },
              error: function ()
              {
                  // alert("error");
              }
          });
      });
      
      $("#cancel").click(function () {
      
          // alert("hello");
      
      });
   </script>
   <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
      })
   </script>
   <script>
      ///////csv file read/////////////////////
      $(function () {
          $("#btn1").bind("click", function () {
              // alert();
              $('#registers').attr('disabled', true);
              var regex = /^([a-zA-Z0-9(0-9)\s_\\.\-:])+(.csv|.txt)$/;
              if (regex.test($("#fileUpload").val().toLowerCase())) {
                  if (typeof (FileReader) != "undefined") {
                      var reader = new FileReader();
                      reader.onload = function (e) {
                          var line = [];
                          var rows = e.target.result.split("\n");
      
                          var row = [];
                          var cells = rows[0];
                          cells = cells.trim();
                          if (cells != "Designation")
                          {
                              alert("Please make Format as sample file");
                          } else
                          {
                              $('#registers').attr('disabled', false);
                              $('#btn1').attr('disabled', true);
                              console.log('---' + line[0]);
                              console.log('---' + line[0]);
                              //drawOutput(line[0]);
                          }
                      }
                      reader.readAsText($("#fileUpload")[0].files[0]);
                  } else {
                      alert("This browser does not support HTML5");
                  }
              } else {
                  alert("Please upload a valid csv file");
              }
          });
      
      });
   </script>
   <script>
      $("#upload_csv").on("submit", function (event) {
      
          event.preventDefault();
          var demofile = $("#fileUpload").prop("files")[0];
          console.log(demofile);
          var form_data = new FormData();
          form_data.append("proposalfile", demofile);
      $.ajax({url: "<?php echo URL; ?>admin/importUploadsDeg",
          //$.ajax({
              //url: "http://ubiattendance.zentylpro.com/index.php/admin/importUploadsDeg",
              method: "POST",
              contentType: 'multipart/form-data',
              contentType: false, // The content type used when sending data to the server.  
              cache: false, // To unable request pages to be cached  
              processData: false,
              data: form_data,
              success: function (text) {
                  //console.log(text);
                  if (text == "success") {
                      alert("Your file uploaded successfully");
                  }
              },
              error: function () {
                  alert("An error occured.");
              }
          });
      });
   </script>
   <script>
      $(document).ready(function () {
          $("#registers").click(function (event) {
              $("#maincontainerdiv").hide("slow");
              $("#loader").show("slow");
              event.preventDefault();
              $.ajax({url: "<?php echo URL; ?>admin/emportDeg",
              //$.ajax({url: "http://ubiattendance.zentylpro.com/index.php/admin/emportDeg",
                  method: "POST",
      
                  success: function (result) {
      
                      var obj = JSON.parse(result);
      
                      var totlemp = obj["importemp"];
                      //$(".importemp").text(totalemp);
                      var totalrecod = obj["repeatemp"];
                      if (obj["sts"] == "true") {
                          $("#contactForm").trigger("reset");
                          doNotify('top', 'center', 2, 'Designation added successfully');
                           setTimeout("location.reload(true);",2000);
                          $(".showresult").css('display', 'block');
                          $("#repeatemp").text(totalrecod);
                          $("#importemp").text(totlemp);
                      }
                      $("#maincontainerdiv").show("slow");
                      $("#loader").hide("slow");
                  },
                  error: function (result) {
                      doNotify('top', 'center', 4, 'Unable to connect API');
                      $("#maincontainerdiv").show("slow");
                      $("#loader").hide("slow");
                  }
              });
          });
      
          $(".call").click(function () {
              // alert();
              $.ajax({
                  type: "GET",
                  url: "<?php echo URL; ?>Userprofiles/deleteTmp",
                 // url: "http://ubiattendance.zentylpro.com/index.php/Userprofiles/deleteTmp",
                  success: function (response) {
      
                      if (response == "Success")
                      {
                          //$(btn).closest('tr').fadeOut("slow");
                      } else
                      {
                          //alert("Error");
                      }
      
                  }
              });
          });
      });
      
      
   </script>
   <script>
      var app = angular.module('adminapp', []);
      
      app.controller('attroasterCtrl', function($scope, $http, $timeout) {
          //alert("aaaa");
          $scope.hastrue=false;
          $scope.GetEmpList = function($desgid)
            {
              //alert();
              $scope.emparray=[];
              $scope.desgid=$desgid;
              $scope.hastrue=true;
              var xsrf = $.param({desgid: $scope.desgid});
              $http({
                  url: 'getemployeebydesg',
                  method: "POST",
                  data: xsrf,
                  headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
              }).success(function (data, status, headers, config){
                  
                      
                      $scope.emparray=data.data;
                      console.log(data.data);
                      setTimeout(function(){
                          $timeout(function(){    $scope.getrow();}, 500); 
                      }, 1000);
                  
                  $scope.hastrue=false;
              }).error(function (data, status, headers, config) {
                  //errorMessage("error: "+$scope.status);//$scope.status = status + ' ' + headers;
                  $scope.hastrue=false;
              });
          }
      ////////////List group item function ///////////////
      $scope.getrow= function ($index) {
       //alert($index);
       $('.list-group.checked-list-box .list-group-item').each(function () {
          
          // Settings
          var $widget = $(this),
              $checkbox = $('<input type="checkbox" class="hidden" value="'+$index+'" id="'+$index+ 'checked"/>'),
              color = ($widget.data('color') ? $widget.data('color') : "primary"),
              style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
              settings = {
                  on: {
                      icon: 'fa fa-check-square-o'
                  },
                  off: {
                      icon: 'fa fa-square-o'
                  }
              };
              
          $widget.css('cursor', 'pointer')
          $widget.append($checkbox);
      
          // Event Handlers
          $widget.on('click', function () {
              $checkbox.prop('checked', !$checkbox.is(':checked'));
              $checkbox.triggerHandler('change');
              updateDisplay();
          });
          $checkbox.on('change', function () {
              updateDisplay();
          });
          // Actions
          function updateDisplay() {
              var isChecked = $checkbox.is(':checked');
      //console.log(isChecked);
              // Set the button's state
              $widget.data('state', (isChecked) ? "on" : "off");
                  
              // Set the button's icon
              $widget.find('.state-icon')
                  .removeClass()
                  .addClass('state-icon ' + settings[$widget.data('state')].icon);
      
              // Update the button's color
              if (isChecked) {
                  $widget.addClass(style + color + ' active');
              } else {
                  $widget.removeClass(style + color + ' active');
              }
          }
          // Initialization
          function init() {
              
              if ($widget.data('checked') == true) {
                  $checkbox.prop('checked', !$checkbox.is(':checked'));
              }
              
              updateDisplay();
      
              // Inject the icon if applicable
              if ($widget.find('.state-icon').length == 0) {
                  $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
              }
          }
          init();
      });
      };
      
      
      $scope.getchecklistid=function($index){
      //alert($index);
      //var st = $scope.emparray[$index]['sts'];
      if($scope.emparray[$index]['sts'] == 0)
      {
          $scope.emparray[$index]['sts'] = 1;
      }
      else{
          $scope.emparray[$index]['sts'] = 0;
      }
      
      }
      
      
      $scope.SaveEmpList=function($id){
          //alert($id);
          var total= $("#check-list-box li").length;
              //alert(total);
          var selectcheck= $(".list-group-item.list-group-item-success.active").length;
          
          if(selectcheck!=0){
              var json=angular.toJson($scope.emparray);           
              //console.log(json);
              //alert("json"+json);
              //alert("shift"+$scope.shiftid);
              var xsrf = $.param({ desgid:$scope.desgid,emplist:json});
              $http({
                  url: 'SaveEmpdesgList',
                  method: "POST",
                  data: xsrf,
                  headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
              }).success(function(data, status, headers, config){
                  $scope.hastrue = false;
                  $('#updateDesg').modal('hide');
                  
          doNotify('top','center',2,'Designation assigned successfully');
           setTimeout("location.reload(true);",2000);
                  
              }).error(function(data, status, headers, config){
                  $scope.hastrue=false;
              });
          } else {
              
              doNotify('top','center',4,'Please select at least one employee');
              return false;
        }
      }
      
          
      });
   </script>
   <script type="text/javascript">
      $(document).on("click", ".edit", function () {
              $('#desgNameLableE').text('');
              //$('#descNameLableE').text('');
              $('#desgNameE').attr('placeholder',"");
              //$('#descE').attr('placeholder',"");
              $('#did').val($(this).data('did'));
              $('#descE').val($(this).data('desc'));
              $('#desgNameE').val($(this).data('name'));
              $('#statusE').val($(this).data('sts'));
              $('#numemp').text($(this).data('assign'));
      
               if($(this).data('sts')==1 && parseInt($(this).data('assign')) > 0)
               {
                   $("#statusE").prop('disabled', true);
               }
               else
               {
                   $("#statusE").prop('disabled', false);
               }
          });
      
      $('#saveE').click(function(){
                if($('#desgNameE').val().trim()==''){
                    $('#desgNameE').focus();
                      doNotify('top','center',4,'Please enter the designation name');
                    return false;
                }
                 var did=$('#did').val();
                 var dna=$('#desgNameE').val().trim();
                 var sts=$('#statusE').val();
                 var desc=$('#descE').val();
                 $.ajax({url: "<?php echo URL;?>managesettings/editDesg",
                      data: {"did":did,"dna":dna,"sts":sts,"desc":desc},
                      success: function(result){
                          if(result==1){
                              doNotify('top','center',2,'Designation updated successfully');
                               setTimeout("location.reload(true);",2000);
                              $('#addDesgE').modal('hide');
                              setTimeout("location.reload(true);",2000);
                              document.getElementById('desgFromE').reset();
                               table.ajax.reload();
                          }else if(result==2){
                              doNotify('top','center',3,'Designation '+dna+' already exist');
                          }
                          else{
                              doNotify('top','center',4,'No changes found');
                              document.getElementById('desgFromE').reset();
                              $('#addDesgE').modal('hide');
                          }
                       },
                      error: function(result){
                          doNotify('top','center',4,'Unable to connect API');
                       }
                 });
          });
      
      $(document).on("click", "#delete", function () {
              var id=$('#del_did').val();
              $.ajax({url: "<?php echo URL;?>managesettings/deleteDesg",
                      data: {"did":id},
                      success: function(result){
                          result=JSON.parse(result);
                          if(result.afft){
                            
                              doNotify('top','center',2,'Designation deleted successfully');
                              setTimeout("location.reload(true);",2000);
                               table.ajax.reload();
                                 $('#delDesg').modal('hide');
                              
                          }else{
                              
                              doNotify('top','center',4,'This designation cannot be deleted, It is currently assigned to '+result.emp+' employee(s)');
                              setTimeout("location.reload(true);",2000);
                              $('#delDesg').modal('hide');
                          }
                      
                       },
                      error: function(result){
                          doNotify('top','center',4,'Unable to connect API');
                       }
                 });
          });
      
      $(document).on("click", ".delete", function () {
              $('#del_did').val($(this).data('did'));
              $('#dna').text($(this).data('dname'));
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
