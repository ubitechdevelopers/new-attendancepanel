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
         border-color: #e1ffe0;}
         table.dataTable thead th {
         border-top: none;
         color: #9FA2B4;
         font-size: 0.85rem;
         
		  font-weight:500;
         }
         table.dataTable tbody {
         font-size: 0.85rem;
        
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
       
         font-weight: 600;
         }
         .subhead
         {font-size: 18px;
         color: #828282;
         display: flex;
         cursor: pointer;
         text-decoration: none;
         font-weight: 500!important;
         
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
         font-weight: 700!important;
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
       #map{ width: 25rem!important;}
#myModal{
         /*padding-left: 62px!important;*/
    width: 27.3rem!important;
  }
}
         .buttons-collection{
         border: none;
         position: relative;
        /* top: -5.9rem;*/
         /* left: 40rem; */
         background-color: white!important;
         color: black!important;
         font-weight: 600;
         color: #4B506D!important;
         font-size: 14px!important;
         }


        button, .shinigami {
        float:right;
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
            #undefinedchecked{
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
  top: 2.9rem!important;
  z-index: 2000;
  
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
   <body ng-app ="adminapp"  ng-controller="attroasterCtrl">
     <?php 
         $data['pageid']=7.4;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main">
         
             
          
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
            
           
           
               <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                     <div class="row" style="margin-left: 0px;">
                        <span> <a href="<?= URL; ?>Managesettings/index" class="subhead">Shifts</a></span>&nbsp;&nbsp;&nbsp;&nbsp; 
                        <span ><a href="<?= URL; ?>Managesettings/department" class="subhead">Department</a></span>&nbsp;&nbsp;&nbsp;      
                        <span ><a href="<?= URL; ?>Managesettings"  class="subhead">Designation</a></span>&nbsp;&nbsp;&nbsp;
                        <span><a href="<?= URL; ?>Managesettings/holidays" class="subhead">Holidays</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="active5"><a href="<?= URL; ?>Managesettings/geofence"  class="subhead">Geo Fence</a></span>&nbsp;&nbsp;&nbsp;
                        <span><a href="<?= URL; ?>Managesettings/hourlyrate" class="subhead">Hourly Rate</a></span>
                     </div>
                  </div>
				   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 shinigami" >
				     <button class="primary-button" data-toggle="modal" data-target="#myModal">
                                <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span>Add GeoFence</div> 
                                </button>
				    <button class="tertiary-button addemp"title="Geo fence restriction" data-toggle="modal" data-target="#addEmp">
                                <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/plus.svg" alt=""> </span>Geofence Restriction</div> 
                                </button>
                         
                              
                
               </div>
            </div>
			</div>
            <!--  -->
            
          
           
             <table id="example" class="table" style="width:100%;">
           <thead>
                        <tr>
                          <th width="16%">Geo Center Name</th>
                          <th width="45">Geo Center Address</th>
                           <th width="8%">Status</th>
                          <th width="10">Center Coordinates </th>
                          
                          <th width="8%">Radius(Km)</th>
                         
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
           
         </table>
         <?php  $this->load->view('menubar/footer');?>

         </main>



         <!-- Modal open add employee-->








  <div class="modal fade" id="addEmp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="<?= URL; ?>Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Geo Fence Restriction</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     
                  
                    <?php foreach(@$outfence as $outfence){
                      //var_dump($outfence);
                      // print_r($outfence->fencearea);
                        ?>  
                      <div class="row" style="min-height: 100px;margin-left:10px;" >
               <div class="col-sm-3 col-md-3" ></div>
               <div style="margin-left:-22px;" class="col-sm-10 col-md-11 pull-left"  >
               <p class="category pull-left" style="font-size:17px;" >Restrict users to punch attendance within the Geo fence only? </p>
            </div>
              </div>
            <br> 

                        <form id="alertmsg">
                         
                      
                            <div class="radio input-group">
                               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <div class="row">
                        <div class="col-lg- col-md- ">
                              <label class="radio-inline" style="color: #000000;">
                              <input  type="radio" name="fenceopt" value="1" id="ena" <?php echo @$outfence->fencearea == 1 ? "checked" : "";?>>  Yes
                              </label>
                            </div>
                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                               <div class="col-lg- col-md- ">
                              <label class="radio-inline" style="color:#000000">
                              <input type="radio" name="fenceopt" value="0" <?php echo @$outfence->fencearea == 0 ? "checked" : "";?>>  No
                              </label>
                            </div>
                          </div>
                              
                            </div>
                         
                          
                          
                        </form>
                    
             
            <?php
                         break;  
                            }
                          ?>


                     <br>
                     <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   
                                 <button type="button" id="myCheck"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="btnfenceset" class="btn btn-success bttn">Save</button>
                      </div>
                    </div> 
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>
<!---modal close add employee--->

<!------Edit location modal start------------>



 <div class="modal fade" id="addDeptE" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update Geo Center</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                   <form id="deptFromE">
      <input type="hidden" id="did" />
      <input type="hidden" id="attsts"/>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group label-floating">
        <label >Geo Center<span class="red">*</span>
            </label>
            <input type="text" id="locationE" class="form-control" >
          </div>
        </div>
      </div>      
      <div class="row">
        
        <div class="col-md-6">
          <div class="form-group label-floating">
            <label>Status<span class="red"></span></label>
            <select class="form-control" id="statusE" >
              <option value='1'>Active</option>
              <option value='0'>Inactive</option>
            </select>
          </div>
        </div>
        <div class="col-md-6" style="">
          <div class="form-group label-floating">
        <label>Radius(Km)<span class="red">*</span>
            </label>
            
            <input type="text" id="radiusE" class="form-control" onkeypress="return isNumberKey(event)" />&nbsp;<span id="errmsg"></span>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>
                     <br>
                     <div class="right">
                    <!--  <div class="row"> -->
                                  <!-- <div class="col-lg-3">
                                  </div> -->
                                   <!--  <div class="col-lg-9" style="text-align: end;"> -->
                                   
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="saveE" class="btn btn-success bttn">Save</button>
                   <!--    </div> -->
                    </div>
                    <!-- </div>  -->
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>

<!------Edit location modal close------------>  

<!---------------------------->




          <div class="modal fade" id="updateGeolocation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Geo Center</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                      <form>
    <input type="hidden" id="uid" />
      
      <div class="panel">
          <div class="panel-body" >
            <p> Select the employee(s) to assign this Geo Center. </p>
            <div class="row">
               <div class="well" style="max-height: 300px;overflow: auto; width: 31rem;">
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
                                   
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button"  class="btn btn-success bttn" ng-click="SaveEmpList1(1)">Save</button>
                      </div>
                    </div> 
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>
<!------------------------------->



<!-----delete dept start--->






          <div class="modal fade" id="delDept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete Geo Center</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                      <form>
      <input type="hidden" id="del_did" />
      <div class="row">
        <div class="col-md-12">
          <h6>Delete "<span id="dna"></span>" Geo Center?</h6>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>
                     <br>
                     <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="delete" class="btn btn-success bttn">Save</button>
                      </div>
                    </div> 
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>
<!-----delete dept close--->




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
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled >&nbsp; Geo Center Name</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp; Geo Center Add. </label><br>
                                       
                                        


                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                      <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;Status  </label><br>
                                      
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3">&nbsp; Center Coordi.</label><br>
                                         
                                       
                                       
                                      

                                       




                                    </div>
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                       
                                         <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" >&nbsp; Radius(km) </label><br>
                                        <!-- <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" >&nbsp;Actions  </label><br> -->
                                        
                                       




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
              </div>
            </div>
     
      <!-- Modal -->
      <form  id="createForm" method="post">
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        </div>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Add Geo Center</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <br>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    
                                                          
                                       <div class="row" id="mapdiv" style="margin-top:-11px;margin-left:-8px;display:none" >
                                          <input id="pac-input" class="controls" type="text" placeholder="Enter Your Location....." style="z-index: 0;position: absolute;margin-top: 0.6rem!important;left: 12rem;font-size: 1rem;width: 13.5rem;height: 2.5rem;">
                                          <div id="map" style="height: 23rem;width: 29rem;" ></div>
                                          <br />
                                          <P> <b>Note* </b>
                                             &nbsp;&nbsp;&nbsp;
                                              <span style="color:green" > Enter your location in the search bar and click on the location marker </span>
                                              <i class="fa fa-map-marker" style="color:#ff6666;font-size:20px; " aria-hidden="true"></i>
                                           </P>
                                      
                                       <!-- <div id="loderdiv" style="padding-top:30%" >
                                          <center>
                                             <img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" id="imagelod" />
                                          </center>
                                       </div> -->
                                    </div>
                                  </div>
                                  <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                 
                                    
                                    
                                       <form  action="#"  method="post" >
                                         

                                                <!-- <div class="form-group row">
                                              <label for="colFormLabel" class="col-sm-4 col-form-label">Geo Center Name</label>
                                              <div class="col-sm-8">
                                                <input type="email" class="form-control" id="colFormLabel name" name="name"value="" required placeholder="Eg. Connaught Place">
                                              </div>
                                            </div> -->
                                            <div class="form-group">
                                              <label for="formGroupExampleInput">Geo Center Name</label>
                                              <input type="text" class="form-control" id="name" name="name"value="" required placeholder="Eg. Connaught Place">
                                            </div>

                                            <div class="form-group">
                                              <label for="formGroupExampleInput">Latitude , Longitude</label>
                                              <input type="text" class="form-control" id="latlong" name="latlong"value="" required  placeholder="Eg. 26.1967067, 78.1969453 " disabled>
                                            </div>


                                            <!-- <div class="row">
                                             <div class="col-sm-4" style="margin-top: 10px;">
                                                <label for="text" class="form-group" style="margin-top:30px;"><strong style="margin-left: -20px;">Latitude , Longitude<span class="red">*</span></strong></label>
                                             </div>
                                             <div class="col-sm-8" >
                                                <input type="text" class="form-control" id="latlong" name="latlong" value="" required  placeholder="Eg. 26.196706799999998 , 78.1969453 " disabled   >
                                             </div>
                                          </div>
 -->


                                          <div class="form-group">
                                              <label for="formGroupExampleInput">Geo Center Address</label>
                                              
                                              <textarea  rows="2" cols="50" class="form-control" id="location" name="location" placeholder="Eg. Rajiv Chowk, Rajeev Chowk, Connaught Place, New Delhi, Delhi 110001, India" disabled > </textarea>
                                            </div>

                                          
                                          <!-- <div class="row" >
                                             <div class="col-sm-4" style="margin-top: 10px;">
                                                <label for="text" class="form-group"style="margin-top:30px;"><strong style="margin-left: -20px;">Geo Center Address<span class="red">*</span></strong></label>
                                             </div>
                                             <div class="col-sm-8" >
                                                <textarea  rows="2" cols="50" class="form-control" id="location" name="location" placeholder="Eg. Rajiv Chowk, Rajeev Chowk, Connaught Place, New Delhi, Delhi 110001, India" disabled > </textarea>
                                             </div>
                                          </div> -->
                                          <div class="form-group">
                                              <label for="formGroupExampleInput">Fence Radius (Km)</label>
                                              <input type="number" min="0" placeholder="" value="0.250" class="form-control" id="radius" name="radius" required >
                                            </div>

                                          <!-- <div class="row" >
                                             <div class="col-sm-4" style="margin-top: 10px;">
                                                <label for="text" class="form-group" style="margin-top:30px;">
                                                <strong style="margin-left: -15px;">Fence Radius (Km)<span class="red">*</span></strong></label>
                                             </div>
                                             <div class="col-sm-8" > 
                                                <input type="number" min="0" placeholder="" value="0.250" class="form-control" id="radius" name="radius" required >
                                             </div>
                                          </div> -->
                                          
                                       </form>
                                   </div>
                                 </div>
                                 
                          <!--  <div class="row">
                                  <div class="col-lg-7">
                                  </div>
                                    <div class="col-lg-5">-->
                                   <div class="right">
                                 <button type="button"  class="btn btn-light bttn" data-dismiss="modal" style="color: #808080">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" name="save" id="submit" value="<?= (isset($name)?'Update':'Add') ?>" class="btn btn-success bttn">Save</button>
                   </div>
                    <!--  </div>
                    </div>-->
                   
                    
                  </div>
                  <!-- <div class="modal-footer">
                     <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" name="save" id="submit" value="<?= (isset($name)?'Update':'Add') ?>" class="btn btn-success">Save</button>
                  </div> -->
               </div>
               <div id="response"></div>
            </div>
         </div>
       </div>
     </div>
      </form>
       </main>
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

                        text: 'CSV',
                        extension: '.csv',
                        exportOptions:

                        {

                            columns: [0,1,2,3,4]
                        },
                        title: 'Geo-Fence'
                    },

                        // {
                        //     extend: 'excelHtml5',
                        //     exportOptions: {
                        //         columns: [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        //     }
                        // },
                        {
                            extend: 'pdf',
                            orientation: 'landscape',
                            pageSize: 'tabloid',
                
                            exportOptions: {
                                columns:  [0,1,2,3,4]
                               
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
      title: 'GeoFence of '+org+' Dated '+isoDateString+'',
      
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
                 "ajax": "<?=  URL;?>Managesettings/getGeolocation",
                 "columns": [
                { "data": "name" },
              { "data": "location" },
              { "data": "status" },
              { "data": "latlong" },
              { "data": "radius" },
              
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
      <!--<script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>-->
   <script>
      setTimeout(function(){   
          var x1 = document.getElementById("mapdiv");
          var x2 = document.getElementById("loderdiv");
       x1.style.display = "block";
       //x2.style.display = "none";
       
      }, 3000);
          
      
        $(document).on("click", "#submit", function (){
      var name=$('#name').val().trim();

      var id=$('#id').val();
      var location=$('#location').val().trim();
      var latlong=$('#latlong').val();
      var radius=$('#radius').val();
      
          if(name == "")
        {
        $('#name').val(name);
        $('#name').focus();
        doNotify('top','center',4,'Please enter the geo center name');
        return false;
                    } 
      else if(latlong=="")
      {
      $('#latlong').focus();
      doNotify('top','center',4,'Latitude and longitude can not be null');
      return false;
               }
      else if(validatelatlong(latlong))
        {
        $('#latlong').focus();
        doNotify('top','center',4,'There is some problem,Please try again');
        return false;
        }
      else if(location == "")
      {
                          $('#location').focus();
                          $('#location').val(location);
          doNotify('top','center',4,'Please enter the geo center address ');
          return false;
               }
      else if(radius=="")
      {
                          $('#radius').focus();
          doNotify('top','center',4,'Please enter fence radius');
          return false;
               }
      else if(radius < 0.05)
      {
                          $('#radius').focus();
          doNotify('top','center',4,'Radius should be greater than 0.05 (km) ');
          return false;
               }
      $.ajax({url: "<?php echo URL;?>Managesettings/saveGeolocation",
          data: {"id":id,"name":name,"location":location,"latlong":latlong,"radius":radius},
          success: function(result){
            var result=JSON.parse(result);
             
            if(result.status)
            {
              doNotify('top','center',2,result.sms);
               setTimeout(function()
                 {
                 window.location.replace("<?=URL?>Managesettings/geofence");
                 }, 2000);
            }
              else
              {
              doNotify('top','center',4,'There is some error while creating geofence');
              }
           },
          error: function(result)
            {
            doNotify('top','center',4,'Unable to connect API');
            }
         });
      });
      
      
       var lat ;
       var lng ; 
      var lat_lang = "";
      
        function validatelatlong(latlong) 
      {
      var re = /[a-z]/;
      return re.test(String(latlong).toLowerCase());
      }
      
      
       
      function getLocation() { 
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition,error,options); 
      
      } else { 
          alert("Geolocation is not supported by this browser");
      }
      }
      function error(err) {
      //alert("Please allow to share your location"); 
           //lat = 26.196706799999998;  
      //lng = 78.1969453;
      // alert(lat);
      }
      function options(err) {
      alert("Other options");   
      }
      function showPosition(position) { 
      
      lat = parseFloat(position.coords.latitude); 
      lng = parseFloat(position.coords.longitude);
      }
      
      
      function getcurrentLocation()
      {
       if (navigator.geolocation)  {
               navigator.geolocation.getCurrentPosition(showPosition1,error1);
               } else  
      {
               alert("Geolocation is not supported by this browser");
               } 
       function showPosition1(position)
             {
                   getcurrentLocation1();
                 }
       function error1(err) {
       // console.log(err);
         // alert("Please allow to share your location");  
       }
         
      }
      getcurrentLocation();
      function getcurrentLocation1()
      {
      getLocation(); 
      setTimeout(function()
      {
       lat_lang = lat+", "+lng;
       //alert(lat);
       $("#latlong").val(lat_lang);
       getAddress(lat,lng);
      },2000);    
      }
      function getAddress (latitude,longitude){
      var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(latitude, longitude);
      geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
        console.log(results)
          if (results[1]) {
           //formatted address
           $("#location").val(results[0].formatted_address);
            //alert(results[0].formatted_address)
          } else {
            alert("No address found");
          }
        } else 
      {
          alert("Geocoder failed due to: " + status);
        }
      });
      }
      
      /* function showmap()
      {
      $("html body #topdiv").animate({ scrollTop: $(document).height() }, 1000);
      var x = document.getElementById("mapdiv");
        if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
      }*/
      
       
        function initAutocomplete(){
      //lat = 26.196706799999998; 
      //lng = 78.1969453
      setTimeout(function(){ 
          var map = new google.maps.Map(document.getElementById('map'),
      {
            center: {lat: 26.196706799999998, lng: 78.1969453},
            //center: {lat: lat, lng: lng},
            zoom: 15,
            mapTypeId: 'roadmap'
          });
          var input = document.getElementById('pac-input');
          var searchBox = new google.maps.places.SearchBox(input);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });
      
          var markers = [];
          google.maps.event.addListener(map, "click", function (e){
            
           //lat and lng is available in e object
      
      setTimeout(function(){
        var latLng = e.latLng.toString();
             latLng = latLng.replace(")", ""); 
             latLng = latLng.replace("(", ""); 
        
         var arr = latLng.split(",");
          latitude = arr[0];
                   longitude = arr[1];
      
      var c = confirm("Your position set on this Latitude and longitude (" + latLng + ")");
      if(!c)
        return false;
      
       setTimeout(function(){
        $("#latlong").val(latLng); 
       getAddress(latitude,longitude);
       },2000);
       
      /* var x = document.getElementById("mapdiv");
                       if (x.style.display === "none") {
                          x.style.display = "block";
                     } else 
         {
                      x.style.display = "none";
                    }*/
        
      },500);
      });
      
          searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
      
            if (places.length == 0) {
              return;
            }
            markers.forEach(function(marker) {
              marker.setMap(null);
            });
            markers = [];
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
              if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
              }
              var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
              };
      
              // Create a marker for each place.
              markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
              }));
      
              if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
                     }
            });
            map.fitBounds(bounds);
          });
      },2000);
        }
      
      
      
   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&libraries=places&callback=initAutocomplete"
      async defer></script> 
   <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
      })
   </script>
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&libraries=places&callback=initAutocomplete"
      async defer></script> --> 

      <script type="text/javascript">
        $(document).on("click", ".edit", function () {
        $('#deptNameLableE').text('');
        $('#deptName').attr('placeholder',"");
        $('#did').val($(this).data('did'));
        $('#locationE').val($(this).data('name'));
        $('#radiusE').val($(this).data('radius'));
        $('#statusE').val($(this).data('sts')); 
        $('#attsts').val($(this).data('attsts')); 
      // alert($(this).data('attsts'));
        
        if($(this).data('attsts')){ 
          // $('#radiusE').disable
          $( "#radiusE" ).prop( "disabled", true );

        }
        else{
          $( "#radiusE" ).prop( "disabled", false );
        }
      });
      $(document).on("click", ".delete", function () {
        $('#del_did').val($(this).data('did'));
        $('#dna').text($(this).data('dname'));
      }); 
      $(document).on("click", "#delete", function () {
        var id=$('#del_did').val();
  
        $.ajax({url: "<?php echo URL;?>Managesettings/deleteLocation",
            data: {"did":id},
            success: function(result){
              result=JSON.parse(result);
              
              if(result.afft){
                $('#delDept').modal('hide');
                doNotify('top','center',2,'Geo center deleted successfully');
                location.reload();
                
              }else{
                $('#delDept').modal('hide');
                doNotify('top','center',4,'Cannot be deleted, It is currently assigned to '+result.emp+' employee(s)');
              }
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });


      $('#saveE').click(function(){
          if($('#locationE').val().trim()==''){
            $('#locationE').focus();
            doNotify('top','center',4,'Enter the Geo Center');
            return false;
          }
          if($('#radiusE').val().trim()==''){
            $('#radiusE').focus();
            doNotify('top','center',4,'Enter the Fence Radius');
            return false;
          }
           var did=$('#did').val();
           var dna =$('#locationE').val();
           var dra =$('#radiusE').val();
           var sts=$('#statusE').val();
           var sts=$('#statusE').val();
           var attsts=$('#attsts').val();
          //  alert(attsts > 0);
          //       if(attsts > 0){

          //        $('#radiusE').prop( "disabled", true );
          //       }
         

           if(dra < 0.05)
       {
                        $('#radius').focus();
            doNotify('top','center',4,'Radius should be greater than 0.05 Km ');
            return false;
             }

           $.ajax({url: "<?php echo URL;?>Managesettings/editLocation",
            data: {"did":did,"dna":dna,"dra":dra,"sts":sts},
            success: function(result){
               
              if(result==1){
                doNotify('top','center',2,'Geo Center updated successfully');
                $('#addDeptE').modal('hide');
                location.reload();
                document.getElementById('deptFromE').reset();
                 table.ajax.reload();
              }else if(result==2){
                doNotify('top','center',3,'Geo Center '+dna+' already exists');
              }
              else{
              doNotify('top','center',4,'No changes done');
              document.getElementById('deptFromE').reset();
                $('#addDeptE').modal('hide');
              }
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect to API');
             }
           });
      }); 
      </script>
        <script>
  var app = angular.module('adminapp', []);
  app.controller('attroasterCtrl', function($scope, $http, $timeout) 
  {
  $scope.hastrue=false;
  
  $scope.GetEmpList1 = function($geoid)
    {
    $scope.emparray=[];
    $scope.geoid=$geoid;
    $scope.hastrue=true;
    var xsrf = $.param({geoid: $scope.geoid});
    $http({
      url: 'getemployeebygeolocation',
      method: "POST",
      data: xsrf,
      headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
    }).success(function (data, status, headers, config){
      
        
        $scope.emparray=data.data;
        //console.log(data.data);
        setTimeout(function(){
          $timeout(function(){  $scope.getrow();}, 500); 
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
 
 
   $scope.getchecklistid=function($index)
    {
      if($scope.emparray[$index]['sts'] == 0)
      {
        $scope.emparray[$index]['sts'] = 1;
      }
      else{
        $scope.emparray[$index]['sts'] = 0;
      }
    }
 $scope.SaveEmpList1=function($id){
  // alert($id);
  // return false;
    var total= $("#check-list-box li").length;
    // alert(total);
    var selectcheck= $(".list-group-item.list-group-item-success.active").length;
   // alert(selectcheck);
  
    if(selectcheck!=0){
      var json=angular.toJson($scope.emparray);     
      console.log(json);
      //alert(json);
      
      var xsrf = $.param({ geoid:$scope.geoid,emplist:json});
      $http({
        url: 'SaveEmpGeoList',
        method: "POST",
        data: xsrf,
        
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function(data, status, headers, config){
        $scope.hastrue = false;
        $('#updateGeolocation').modal('hide');
        location.reload();
        doNotify('top','center',2,'Geo Center assigned successfully');
        
      }).error(function(data, status, headers, config){
      
        $scope.hastrue=false;
      });
    } else 
      {
      //alert("Select atleast one employee ");
      doNotify('top','center',4,'Select at least one employee');
      return false;
      }
  }
    
  });
  </script>
  <script type="text/javascript">
    

  function isNumberKey(evt)
       {
          
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
        
             return false;

          return true;

       }
  </script>
    <script>
  $(document).ready(function() {  
    $('#btnfenceset').click(function()
  {
    var enablevisit = $('input[name=fenceopt]:checked').val();
    $.ajax({
    url: "<?php echo URL;?>Managesettings/fencestatus",
    data:{"sts":enablevisit},
    success:function(result){
    document.getElementById("myCheck").click();
    if(result == "true"){
      doNotify('top','center',2,'Added successfully');
    }else
  {
      doNotify('top','center',2,'Condition applied');
    }
    },
    error: function(result){
        doNotify('top','center',4,'Unable to connect to API');
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
</html>