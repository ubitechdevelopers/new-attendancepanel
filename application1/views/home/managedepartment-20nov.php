<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link href="<?= URL ?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">

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
                padding-top: 2.1rem!important;
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
                    /*padding-left: 76px!important;*/
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
         $data['pageid']=7.1;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
        <main class="main">
            
               
                                <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
                                     <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="primary-text">Manage</div>


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="    padding-left: 10.8rem;">
                        <button class="tertiary-button" data-toggle="modal" data-target="#printemp">
                            <div> <span class="side-item-icon" > <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span> Import Department </div>   
                        </button>
                        <button class="primary-button" data-toggle="modal" data-target="#myModal">
                            <div> <span class="side-item-icon" ><img src="<?= URL ?>../assets/icons/plus.svg" alt=""> </span>Add Department</div> 
                        </button>


                    </div>
                </div>
                                    <br>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row" style="margin-left: 0px;">
                                <span> <a href="<?= URL; ?>Managesettings/index" class="subhead">Shifts</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                <span class="active5"><a href="<?= URL; ?>Managesettings/department" class="subhead">Department</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                                <span><a href="<?= URL; ?>Managesettings/designation"  class="subhead">Designation</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span><a href="<?= URL; ?>Managesettings/holidays" class="subhead">Holidays</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span><a href="<?= URL; ?>Managesettings/geofence" class="subhead">Geo Fence</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span><a href="<?= URL; ?>Managesettings/hourlyrate" class="subhead">Hourly Rate</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!--  -->


            <table id="example" class="table" style="width:100%;">
                <thead>
                    <tr style="">
                       <!-- <th style="background-image:none"!important><input type="checkbox" id="select_all" name="select_all" value=""/></th> -->
                        <th width="40%">Departments</th>
                        <th width="30%">Department Head</th>

                        <th width="30%" >Status</th>
                        <th width="40%!important"  >Action</th>
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
                                       <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp; Department</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Department Head </label><br>
                                       
                                        


                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                      
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled >&nbsp; Status</label><br>
                                       <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" >&nbsp;Action </label><br>  -->
                                       
                                      

                                       




                                    </div>
                                
                                       




                                    </div>
                                 

                                </div>
                            </div>
                            
                            <div class="right">
                                <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                            </div>
                           
                        


                    </form>
                  
                </div>
            </div>
        </div>

 <!-- assign department -->



          <div class="modal fade" id="updateDept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Department</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form>
        <input type="hidden" id="uid" />

        <p> Select the employee(s) to assign this department </p>
            
            <div class="panel">
                    <div class="panel-body" >
                        <div class="row">
                             <div class="well" style="max-height: 300px;overflow: auto; width: 31rem;">
                                    <ul  class="list-group-item list-group-item-success active" id="check-list-box">
                                        <div ng-if="emparray!=''">
                                        
                                        
                                        <div ng-repeat="c in emparray" >
                                            <li class=" list-group-item list-group-item-success active" data-color="success" id="{{c.id}}" ng-click="getchecklistid($index)">
                                                <label >{{$index+1}}.  {{c.name}} </label>
                                                
                                            </li>   
                                        </div>  
                                        </div>  
                                        <div ng-if="emparray==''">  
                                            <p>This department has already been assigned to all employees</p>
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

        <div ng-if="emparray!=''">
        <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-success bttn fit" ng-click="SaveEmpList(1)">Assign</button>

       

        </div>
        <div ng-if="emparray==''">
        <!-- <button type="button"  class="btn btn-success" ng-click="SaveEmpList(1)">Assign</button> -->
        <button type="button" class="btn btn-secondary bttn" data-dismiss="modal">Close</button>
        </div>  
     
                      </div>
                    </div> 
                  </div>
                
               </div>
               <div id="response"></div>
            </div>
         </div>

       
        
          <!--end assign department -->

          <!-- assign department -->



          <div class="modal fade" id="updateDept1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Assign Department</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form>
        <input type="hidden" id="uid" />

        <p> Select the employee(s) to assign this department </p>
            
           
                <div>This department is inactive. Change the status to Active to assign it to employees.</div>
            
            
            <div class="clearfix"></div>
    </form>
                     <br>
                     <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">

        <div ng-if="emparray!=''">
        <button type="button" class="btn btn-secondary bttn" data-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-success bttn" ng-click="SaveEmpList(1)">Assign</button>

       

        </div>
        <div ng-if="emparray==''">
        <!-- <button type="button"  class="btn btn-success" ng-click="SaveEmpList(1)">Assign</button> -->
        <button type="button" class="btn btn-secondary bttn" data-dismiss="modal">Close</button>
        </div>  
     
                      </div>
                    </div> 
                  </div>
                
               </div>
               <div id="response"></div>
            </div>
         </div>

       
        
          <!--end assign department -->

          <!------Edit department modal start------------>



 <div class="modal fade" id="addDeptE" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update Department</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                      <form id="deptFromE">
            <input type="hidden" id="did" />
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                        <label >Department Name<span class="red">*</span></label>
                        <input type="text" id="deptNameE" class="form-control" >
                    </div>
                </div>
            </div>          
            
                    <div class="form-group label-floating">
                        <label class="control-label">Status <span class="red"> </span></label>
                        <select class="form-control" id="statusE" >
                            <option value='1'>Active</option>
                            <option value='0'>Inactive</option>
                        </select>
                        <small style="color:green" >Department assigned to <span id="numemp" > </span> employee(s)</small>
                    </div>
                
            
            <div class="clearfix"></div>
        </form>
                     <br>
                     <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   
                                 <button type="button"  class="btn btn-light bttn fit" data-dismiss="modal">Close</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="saveE" class="btn btn-success bttn fit">Update</button>
                      </div>
                    </div> 
                  </div>
                 
               </div>
               <div id="response"></div>
            </div>
         </div>

<!------Edit dept modal close------------>

<!-----delete dept start--->

<!-----delete dept close--->

  <div class="modal fade" id="delDept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete Department</a></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                    <br>
                     <form>
            <input type="hidden" id="del_did" />
            <div class="row">
                <div class="col-md-12">
                    <h6>Delete the "<span id="dna"></span>" department?</h6>
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
                     <br>
                      <br>
                     <div class="row">
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   
                                 <button type="button"  class="btn btn-secondary bttn" data-dismiss="modal">Cancel</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="delete" class="btn btn-success bttn">Delete</button>
                      </div>
                    </div> 
                  </div>
             
               </div>
               <div id="response"></div>
            </div>
         </div>

         <!-----delete dept close--->
     


         



          <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Department List</a></h5>
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
                                  <div class="col-lg-3">
                                  </div>
                                    <div class="col-lg-9" style="text-align: end;">
                                   
                                 <button type="button"  class="btn btn-light bttn fit" data-dismiss="modal">Close</button>
                                 &nbsp;&nbsp;
                     <button type="button" id="save12" class="btn btn-success bttn fit">Save</button>
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
     
        <!--modal-->
       
       


        <div class="modal fade" id="printemp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="#"class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;Import Department</a></h5>
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
                                    <button type="button" class="btn" style="width:12rem; font-weight: 700px;  color:rgba(122, 122, 122, 1);   border-color: #E5E5E5;"><a href="<?php echo IMGURL5; ?>../assets/newdepartment.csv" style="color:rgba(122, 122, 122, 1); ">Download Sample</a></button>
                                </div>
                                <div class="col-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <div class="col-4 mt-3 ml-5 mb-3">
                                    <!--<button type="submit" id="btn1" class="btn btn-success btnfile call" style="width:8rem;" disabled>Import</button>-->
                               <input type="submit" id="btn1" class="btn btn-success btnfile call" value="Next" disabled style="display: none;">
                                                            <button type="button" class="btn btn-success" id="registers"  style="width:8rem;"  disabled>Import</button>
                                </div>
                                <div class="col-4">
                                    
                                </div>
                            </div> </form>  
                    </div>
                    <div class="modal-footer" style="float:left;">
                            <div class="showresult" style="display:none;">
                                            <p>Total records : <span id="repeatemp"></span></p>
                                            <p>Total inserted records : <span id="importemp"></span></p>
                                            <a href="<?php echo URL; ?>admin/showTMPDes/2" class="btn btn-link">show insufficient record</a>
                                        </div>                         </div>
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
    <script type="text/javascript" src="<?= URL ?>../assets/js/repeatheadeerprint.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
    <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>
    <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?=URL?>../assets/js/angular.min.js"></script>
        <script type="text/javascript" src="<?=URL?>../assets/js/angular-datatables.min.js"></script>

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
                                        columns: [1, 2, 3],
                                        stripHtml: false,
                                    },
                                    repeatingHead: {

                                        logo: '<?= URL ?>../assets/image/logo.png',
                                        logoPosition: 'center',
                                        logoStyle: 'height:100px;width:130px;',
                                        title: 'Department List of ' + org + ' Dated ' + isoDateString + '',

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
                    // "scrollX": true,                  
                  "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: " Search",
                     sLengthMenu: "Row   _MENU_"
                 },
                 
          "contentType": "application/json",
                 "ajax": "<?=  URL;?>Managesettings/getAllDept1",

                    "columns": [
                        {"data": "name"},
                        {"data": "depname"},
                        ///{ "data": "cdate" },
                        //{ "data": "mdate" },
                        // { "data": "username"},
                        // { "data": "pwd"},
                        //    { "data": "date"},
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
                            if (i < 3) {
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
    <script>
        $("#save12").click(function () {
            var deptnm = $('#deptName').val();
            // alert(deptnm);
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
                    doNotify('top', 'center', 2, 'Department added successfully');
                            setTimeout("location.reload(true);",2000);

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
                ///////csv file read/////////////////////
                $(function () {
                    $("#btn1").bind("click", function () {
                        
                        $('#registers').attr('disabled', true);
                        var regex = /^([a-zA-Z0-9(0-9)\s_\\.\-:])+(.csv|.txt)$/;
                        if (regex.test($("#fileUpload").val().toLowerCase())) {
                            if (typeof (FileReader) != "undefined") {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var line = [];
                                    var rows = e.target.result.split("\n");

                                    var row = [];
                                    //cells != 'Department'
                                    var cells = rows[0];
                                    cells = cells.trim();
                                    if (cells != "Department")
                                    {
                                        alert("Please make Format as sample file");
                                    } else {

                                        $('#registers').attr('disabled', false);
                                        $('#btn1').attr('disabled', true);
                                        console.log('---' + line[0]);
                                        //drawOutput(line[0]);
                                    }
                                }
                                reader.readAsText($("#fileUpload")[0].files[0]);
                            } else {
                                alert("This browser does not support HTML5");
                            }
                        } else {
                            alert("Please upload a valid CSV file");
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
            $.ajax({url: "<?php echo URL; ?>admin/importUploadsDep",
            
                //$.ajax({url: "http://ubiattendance.zentylpro.com/index.php/admin/importUploadsDep",
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
                        setTimeout("location.reload(true);",2000);
                    }
                },
                error: function () {
                    alert("An error occured");
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
                 $.ajax({url: "<?php echo URL; ?>admin/emportDep",
                //$.ajax({url: "http://ubiattendance.zentylpro.com/index.php/admin/emportDep",
                    method: "POST",
                    contentType: 'application/json',
                    success: function (result) {

                        var obj = JSON.parse(result);
                        var totlemp = obj["importemp"];
                        //$(".importemp").text(totalemp);
                        var totalrecod = obj["repeatemp"];
                        if (obj["sts"] == "true") {
                            $("#contactForm").trigger("reset");
                            doNotify('top', 'center', 2, 'Department added successfully');
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
                $.ajax({
                    type: "GET",
                    url: "<?php echo URL; ?>Userprofiles/deleteTmp",
                    //url: "http://ubiattendance.zentylpro.com/index.php/Userprofiles/deleteTmp",
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
        $scope.GetEmpList = function($deptid)
          {
            //alert();
            $scope.emparray=[];
            $scope.deptid=$deptid;
            $scope.hastrue=true;
            var xsrf = $.param({deptid: $scope.deptid});
            $http({
                url: 'getemployeebydept',
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
       // alert($id);
        var total= $("#check-list-box li").length;
       // alert(total);
        var selectcheck= $(".list-group-item.list-group-item-success.active").length;
        
        if(selectcheck!=0){
            var json=angular.toJson($scope.emparray);           
            //console.log(json);
            //alert("json"+json);
            //alert("shift"+$scope.shiftid);
            var xsrf = $.param({ deptid:$scope.deptid,emplist:json});
            $http({
                url: 'SaveEmpdeptList',
                method: "POST",
                data: xsrf,
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
            }).success(function(data, status, headers, config){
                $scope.hastrue = false;
                
                // location.reload();
                
        doNotify('top','center',2,' Department assigned successfully');
        setTimeout("location.reload(true);",2000);
        $('#updateDept').modal('hide');
                
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
        $('#saveE').click(function(){
                  if($('#deptNameE').val().trim() == ''){
                      $('#deptNameE').focus();
                        doNotify('top','center',4,'Please enter the department name');
                      return false;
                  }
                   var did=$('#did').val();
                   var dna=$('#deptNameE').val().trim();
                   var sts=$('#statusE').val();
                   $.ajax({url: "<?php echo URL;?>Managesettings/editDept",
                        data: {"did":did,"dna":dna,"sts":sts},
                        success: function(result){
                            if(result==1){
                                doNotify('top','center',2,'Department updated successfully');
                                $('#addDeptE').modal('hide');
                                 // location.reload();
                                document.getElementById('deptFromE').reset();
                                setTimeout("location.reload(true);",2000);
                               
                                 table.ajax.reload(null,false); 
                            }else if(result==2){
                                doNotify('top','center',3,'Department '+dna+' already exist');
                            }
                            else{
                            doNotify('top','center',4,'No changes found');
                            document.getElementById('deptFromE').reset();
                            setTimeout("location.reload(true);",2000);
                                $('#addDeptE').modal('hide');
                            }
                         },
                        error: function(result){
                            doNotify('top','center',4,'Unable to connect API');
                         }
                   });
            });
            

            $(document).on("click", ".edit", function () {
                $('#deptNameLableE').text('');
                $('#deptName').attr('placeholder',"");
                $('#did').val($(this).data('did'));
                $('#deptNameE').val($(this).data('name'));
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


            $(document).on("click", "#delete", function () 
            {
                var id=$('#del_did').val();
               // alert(id);
                $.ajax({url: "<?php echo URL;?>Managesettings/deleteDept",
                        data: {"did":id},
                        success: function(result){
                            result=JSON.parse(result);
                            if(result.afft){
                               
                                doNotify('top','center',2,'Department deleted successfully');
                                setTimeout("location.reload(true);",2000);
                                 $('#delDept').modal('hide');
                                location.reload();
                                 table.ajax.reload(null, false);
                            }
                            else if(result.emp){
                                
                                doNotify('top','center',4,'This department cannot be deleted, it is currently assigned to '+result.emp+' employee(s)');
                                setTimeout("location.reload(true);",2000);
                                $('#delDept').modal('hide');

                            }
                            else if(result.aarc){
                                
                                doNotify('top','center',4,'This department cannot be deleted, some employee punched attendance from this department');
                                setTimeout("location.reload(true);",2000);
                                $('#delDept').modal('hide');
                            }
                            // else if(result == 6){
                            //  $('#delDept').modal('hide');
                            //  doNotify('top','center',4,'Trial Department cannot be deleted');
                            // }
                            else
                            {
                               
                                doNotify('top','center',4,'Department cannot be deleted, some employee punched attendance from this department  ');
                                setTimeout("location.reload(true);",2000);
                                 $('#delDept').modal('hide');
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