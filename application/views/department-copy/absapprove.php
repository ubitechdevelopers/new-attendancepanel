<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
  <link href="<?=URL?>../assets/css/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Disapproved Attendance</title>
    <link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/jquery-ui.css" />
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
 
    <style>
      div.dt-button-collection{
        width: 17rem;
      }

      .red{
      color:red;
      font-weight:'bold';
      font-size:16px;
      }
      .delete{
      cursor:pointer;
      }
    .bargraph{
         display:inline-block;
         margin-top:-8px;
         margin-left:-17px;
       }
      div.dt-buttons{
      position:relative;
      float:left;
      margin-left:15px;
      }
      .t2{display:none;}
     .modal-footer .btn+.btn
    {
      margin-bottom: 10px!important;
    }
    a
    {
      cursor:pointer;
     
    }
    $query = $this->db->query("SELECT `Id`,  `Shift`  FROM ` EmployeeMaster`  WHERE OrganizationId=? AND `Id` Not IN(SELECT `EmployeeId` FROM `AttendanceMaster` ) ",array($orgid));
    </style>
  </head>
  <body>
    <div class="wrapper" style="height:0%;">
      <?php
        $data['pageid']=7.3;
        $this->load->view('department/sidebar',$data);
        ?>
      <div class="main-panel">
        <?php
          $this->load->view('department/navbar');
          ?>
        <div class="content" id="content" style="" >
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="green" >
                  <!--  <h4 class="title">Attendance</h4> -->
                    <p class="category" style="color:#ffffff;font-size:17px;" >Disapproved/Approved Attendance </p>
                    <!-- <a rel="tooltip" style="position:relative;margin-top:-30px;"  data-placement="bottom" title="Help" class="btn btn-success btn-sm pull-right toggle-sidebar ">
                    <i class="fa fa-question"></i></a>-->
                  </div>
                  <div class="card-content">
                    <div class=" container-fluid row" style="margin-top:0px;" >

                          <div class="col-sm-3 bargraph" style="margin-top:0px;" >
                            <div id="reportrange" class="pull-left" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 104%;">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                              <span></span> <b class="caret"></b>
                            </div>
                          </div>
             
              <div class="col-sm-2">
              <select id="desg" style="width:158px;height:35px;position:relative;right:10px;" class="">
              <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--All Designations--</option>
                <?php
                $data= json_decode(getAllDesg($_SESSION['orgid']));
                for($i=0;$i<count($data);$i++){
                  echo '<option  value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                }?>
              </select>
               </div>
             
             <!-- <div class="col-sm-2" >
              <select id="deprt" name="deprt" style="width:158px;height:35px;position:relative;right:10px;" class="">
                <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;--All Departments--</option>
                <?php
                $data= json_decode(getAllDept($_SESSION['orgid']));
                for($i=0;$i<count($data);$i++)
                echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                ?>
                </select>    
              </div>-->

                <div class="col-sm-2" >
                <select id="shift" name="shift" style="width:158px;height:35px;position:relative;right:10px;" class="">
                 <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All Shifts--</option>
                <?php
                $data= json_decode(getAllShift($_SESSION['orgid']));
                for($i=0;$i<count($data);$i++)
                  echo '<option  value='.$data[$i]->id.'>'.$data[$i]->name.'  ('.substr(($data[$i]->TimeIn),0,5).' - '.substr(($data[$i]->
                TimeOut),0,5).')</option>';
                ?></select>
                </div>

                <div class="col-sm-2">
                <select id="empl" style="width:158px;height:35px;position:relative;right:10px;" class="">
                 <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All Employees--</option>
                <?php
                $data= json_decode(getDeptEmpName($_SESSION['departid']));
                for($i=0;$i<count($data);$i++){
                  echo '<option  value='.$data[$i]->id.'>'.$data[$i]->FirstName.'  '.$data[$i]->LastName.'</option>';
                }?>
                  </select>
                 </div>
                <div class="col-sm-2">
				<select id="disl" style="width:158px;height:35px;position:relative;right:10px;" class="">
                <option value="0,1,2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All Status--</option>
                <option value="0">Disapprove</option>
                <option value="1">Approve</option>
                <option value="2">Delete</option>
                </select>
				</div>
                 <div class="col-sm-1">
                 <button class="btn btn-success pull-left" style="position:relative;margin-top:-3px;margin-left:5px;" id="getAtt" ><i class="fa fa-search"></i></button>
                 </div>

               
                       

                </div>
			 
                     <!--   <div class="row">
                          <div class="col-md-12 text-right">
                            <a rel="tooltip"  data-placement="bottom" title="Help" class="btn btn-success btn-sm toggle-sidebar">
                            <i class="fa fa-question"></i></a>
                          </div>
                        </div> -->
            <br>
                        <div class="row" style="overflow-x:scroll;">
                          <table id="example" class="display table"  width="100%">
                            <thead>
                              <tr style="background-color:#008067;color:#ffffff;">
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Shift</th>
                                <th>Date</th>
                                <th>Time In Date</th>
                                <th>Time In</th>
                                <th>Time Out Date</th>
                                <th>Time Out</th>
                                <th>Disapprove/Delete Date & Time</th>
                                <th>Approve Date & Time</th>
                                <th>Reason for Disapproval/Delete</th>
                                <th>Remark for Disapproval/Delete</th>
                                <th>Remark for Approval</th>
                                <th style="background-image:none"!important>Action</th>
                              </tr>
                            </thead>
                          </table>
                        </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        <div class="col-md-3 t2" id="sidebar" style=" margin-top:100px;"></div>
        <footer class="footer">
          <div class="container-fluid" style="" >
            <nav class="pull-left">
            </nav>
           <!-- <p class="copyright pull-right" style="padding-right:35px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a>
            </p>-->
      <a href="http://www.ubitechsolutions.com/" target="_blank" >
          <p class="copyright pull-right" style="padding-right:25px;padding-top:0px;" >
          Copyright &copy;<script>document.write(new Date().getFullYear())</script>
          Ubitech Solutions. All rights reserved.
          </p>
        </a>
          </div>
        </footer>
      </div>
    </div>
     <!--Edit attendance modal start-->
    <div id="addAttATO" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            <h4 class="modal-title" id="title">Update TimeOut</h4>
          </div>
          <div class="modal-body">
            <form id="AttFrom">
              <input type="hidden" id="id" />
         <!--<input  type="hidden" id="attDateE"   >-->
         <input  type="hidden" id="shifttype"   >
         <input  type="hidden" id="timeInE"   >
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Time Out <span class="red">*</span></label>
                    <input type="text"  id="timeOutE"   class="form-control timepicker2" >
                  </div>
                </div>
              </div>
              <div class="row" id="shifttypedate">
          <div class="col-md-6">
            <div class="form-group ">
            <label class="control-label">Time Out Date <span class="red">*</span></label>
            <input type="text"  id="attDateE"   class="form-control datepicker" >
            </div>
          </div>  
              </div>
       
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="saveEE"  class="btn btn-success">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Edit attendance modal close-->
    <!-- data inset -->

      <!--Edit attendance modal start-->
    <div id="addAttsk" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            <h4 class="modal-title" id="title">Update Attendance</h4>
          </div>
          <div class="modal-body">
            <form id="AttFrom">
              <input type="hidden" id="id"/>
              <input  type="hidden" id="sid"/>
              <input  type="hidden" id="deptid"/>
              <input  type="hidden" id="desgid"/>
              <input  type="hidden" id="areaid"/>
              <input type="hidden" id="aname" />
              <input type="hidden" id="attendancedate" />
         <!--<input  type="hidden" id="attDateE"   >-->
         <!-- <input  type="hidden" id="shifttype"   > -->
         <!--<input  type="hidden" id="timeInE"   >-->
              <!--<div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label>Name</label>
                    <input type="text" readonly='true' placeholder="Employee Name"  id="attNameE" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label>Date</label>
                    <input placeholder="Attendance Date" readonly='true' type="text" id="attDateE"  class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Shift</label>
                    <select class="form-control" id="shiftE" >
                    <?php
                      $data= json_decode(getAllShift($_SESSION['orgid']));
                      for($i=0;$i<count($data);$i++)
                        echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Status</label>
                    <select class="form-control" id="statusE" >
                      <option value='1'>Present</option>
                      <option value='0'>Absent</option>
                    </select>
                  </div>
                </div>
              </div>-->
              <div class="row">
        <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Time In<span class="red">*</span></label>
                    <input type="text"  id="timein"   class="form-control timepicker" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Time Out<span class="red">*</span></label>
                    <input type="text"  id="timeout"   class="form-control timepicker1" >
                  </div>
                </div>
              </div>
       
         
       
              <div class="row" id="shifttypedate">
          <div class="col-md-6">
            <div class="form-group ">
            <label class="control-label">Time In Date<span class="red">*</span></label>
            <input type="text" id="attInDateE1" class="form-control datepicker" readonly="readonly" style="margin-top: -7px;">
            </div>
          </div>
         
          <div class="col-md-6">
            <div class="form-group ">
            <label class="control-label">Time Out Date<span class="red">*</span></label>
            <input type="text" id="attOutDateE1" class="form-control datepicker" readonly="readonly" style="margin-top: -7px;">
            </div>
          </div>  
              </div>
       
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="savesk"  class="btn btn-success" style="margin-top: -10px;">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Edit attendance modal close-->


    <!-- data insert end -->
 
 
 
   <!--Edit attendance modal start-->
    <div id="addAttE" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            <h4 class="modal-title" id="title">Update Attendance</h4>
          </div>
          <div class="modal-body">
            <form id="AttFrom">
              <input type="hidden" id="id" />
              <input  type="hidden" id="sid">
              <input  type="hidden" id="deptid">
              <input  type="hidden" id="desgid">
              <input  type="hidden" id="areaid">
              <input type="hidden" id="aname" />
              <input type="hidden" id="attendancedate" />
         <!--<input  type="hidden" id="attDateE"   >-->
         <!-- <input  type="hidden" id="shifttype"   > -->
         <!--<input  type="hidden" id="timeInE"   >-->
              <!--<div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label>Name</label>
                    <input type="text" readonly='true' placeholder="Employee Name"  id="attNameE" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label>Date</label>
                    <input placeholder="Attendance Date" readonly='true' type="text" id="attDateE"  class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Shift</label>
                    <select class="form-control" id="shiftE" >
                    <?php
                      $data= json_decode(getAllShift($_SESSION['orgid']));
                      for($i=0;$i<count($data);$i++)
                        echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Status</label>
                    <select class="form-control" id="statusE" >
                      <option value='1'>Present</option>
                      <option value='0'>Absent</option>
                    </select>
                  </div>
                </div>
              </div>-->
              <div class="row">
        <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Time In<span class="red">*</span></label>
                    <input type="text"  id="timeInE1"   class="form-control timepicker1" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Time Out<span class="red">*</span></label>
                    <input type="text"  id="timeOutE1"   class="form-control timepicker1" >
                  </div>
                </div>
              </div>
       
         
       
              <div class="row" id="shifttypedate">
          <div class="col-md-6">
            <div class="form-group ">
            <label class="control-label">Time In Date<span class="red">*</span></label>
            <input type="text"  id="attInDateE"   class="form-control datepicker" readonly="readonly" disabled>
            </div>
          </div>
         
          <div class="col-md-6">
            <div class="form-group ">
            <label class="control-label">Time Out Date<span class="red">*</span></label>
            <input type="text"  id="attOutDateE"   class="form-control datepicker" readonly="readonly">
            </div>
          </div>  
              </div>
       
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="saveE"  class="btn btn-success" style="margin-top: -10px;">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Edit attendance modal close-->
 
 
    <!--image modal-->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style="height: 50%;width: 55%;margin-left: 150px;">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <form id="imgE" method="POST" enctype="multipart/form-data" name="myformE">
    <input type="hidden" id="imgid">
        <img src="" class="imagepreview"style="width:100%!important;" id="profileimg" >
      </div>
    <div class="modal-footer">
            <button type="button" id="setprofile"  class="btn btn-success" style="margin-right: 15px;">Set as Profile</button>
    </div>
     </form>
    </div>
  </div>
</div>
    
<!-- profile modal Start -->


<div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style="height: 50%;width: 55%;margin-left: 150px;">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <form id="imgE1" method="POST" enctype="multipart/form-data" name="myformE1">
    <input type="hidden" id="imgid1">
      <img src="" class="imagepreview1" style="width:100%!important;" id="profileimg1" >
     </div>
    <div class="modal-footer">
            <button type="button" id="setprofile"  class="btn btn-success" style="margin-right: 15px;">Set as Profile</button>
    </div>
     </form>
    </div>
  </div>
</div>



<!-- profile modal End -->

 
  <!--Location Modal -->
<div class="modal fade" id="locationmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content">
   <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            <h4 class="modal-title" id="title"></h4>
          </div>
      <div class="modal-body">
    <form>
    <input type="hidden" id="latitid">
    <input type="hidden" id="latitinid">
    <input type="hidden" id="longiid">
    <input type="hidden" id="checkinloc">
    <div class="row">
                <div class="col-md-12">
                  <h4> Choose an option</h4>
                </div>
        </div>
              <div class="clearfix"></div>
    <div class="modal-footer">
           <!-- <button type="button" id="showgoogle"  class="btn btn-danger">Show Google Map</button>-->
      <a href="#"  class="btn btn-success" id="showgoogle" >Open In Google Maps</a>
      <a href="#"  id="creategeo" class="btn btn-success"  >Create GeoFence</a>
            <!--<button type="button" class="btn btn-danger" >Create GeoFence</button>-->
    </div>
     </form>
    </div>
  </div>
</div>
</div>

 
 
 
 
 
 
  <!-- edit attendance modal for current day -->
<div id="addAttc" class="modal fade" role="dialog">
 <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            <h4 class="modal-title" id="title">Update Attendance</h4>
          </div>
          <div class="modal-body">
            <form id="AttForm">

              <input type="hidden" id="idc" />
              <input type="hidden" id="anamec" />
              <input type="hidden" id="attInDatec1" />
         <!--<input  type="hidden" id="attDateE"   >-->
         <input  type="hidden" id="shifttypec"   >

          <div class="row">
        <div class="col-md-6">
                  <div class="form-group ">
                    <label class="control-label">Time In <span class="red">*</span></label>
                    <input type="text"  id="timeInc1"   class="form-control timepicker" style="margin-top:-7px;">
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>

 </form>
</div>

     <div class="modal-footer">
            <button type="button" id="savec"  class="btn btn-success">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top: 10px;">Close</button>
          </div>



			</div>
		</div>  
	</div>

<!-- end edit attendance modal for current day -->
 
 
 
    <!--delete attendance start-->
     <div id="delAtt" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            <h4 class="modal-title" id="title">Disapprove Attendance</h4>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="del_aid" />
              <input type="hidden" id="del_att" />
             
              <div class="row">
                <div class="col-md-12">
               <!--<h4>Delete "<span id="ana"></span>'s" Attendance?</h4>-->
               <!--<h4>Delete "<span id="del_in"></span>'s" Attendance?</h4>-->

<!-- 				<input type="checkbox" id="timein" name="deletein" value="in">
				<label for="timein" style='color:black'>Delete "Time In"</label><br>
				<input type="checkbox" id="timeout" name="deleteout" value="out">
				<label for="timeout" style='color:black'>Delete "Time Out"</label><br> -->
        
  <input type="radio" name="abssts" value="Not reported" />
  <label for="Notreported" style='color:black'> Not reported</label><br>
  <input type="radio" name="abssts" value="Fake location" />
  <label for="Fakelocation" style='color:black'>  Fake location</label><br>
  <input type="radio" name="abssts" value="Outside Geofence" />
  <label for="OutsideGeofence" style='color:black'> Outside Geofence</label><br>
  <input type="radio" name="abssts" value="Suspicious Selfie" />
  <label for="SuspiciousSelfie" style='color:black'> Suspicious Selfie</label><br>
  <input type="radio" name="abssts" value="Suspicious Device" />
  <label for="SuspiciousDevice" style='color:black'> Suspicious Device</label><br>
  <input type="radio" name="abssts" value="Deleted by Admin" />
  <label for="DeletedbyAdmin" style='color:black'> Deleted by Admin</label><br>
				</div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="disapprove"  class="btn btn-warning" style="margin-top: -10px;">Ok</button>
            <button type="button"  class="btn btn-default " data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--delete Attn close-->
	
	
	<!--delete attendance start-->
<div id="delAtttimein" class="modal fade" role="dialog">
      <div class="modal-dialog"> 

        <!-- Modal content-->

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            <h4 class="modal-title" id="title">Delete Attendance</h4>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="del_aid" />
              <input type="hidden" id="del_att" />
             
              <div class="row">
                <div class="col-md-12">

               <!--<h4>Delete "<span id="ana"></span>'s" Attendance?</h4>-->
               <!-- <h4>Delete "<span id="del_in"></span>'s" Attendance?</h4> -->
 
				<input type="radio" id="timein" name="deletein" value="in">
				<label for="timein" style='color:black'>Delete "Time In"</label><br>
<!-- 				<input type="radio" id="timeout" name="deleteout" value="out">
				<label for="timeout" style='color:black'>Delete "Time Out"</label><br> -->
				</div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="deletetimein"  class="btn btn-warning" style="margin-top: -10px;">Ok</button>
            <button type="button" id="unchk" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--delete Attn close-->


      <!--ApproveAtt attendance start-->
<div id="ApproveAtt" class="modal fade" role="dialog">
      <div class="modal-dialog"> 

        <!-- Modal content-->

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
            <h4 class="modal-title" id="title">Approve Attendance</h4>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="del_aid" />
              <input type="hidden" id="del_aname" />
              <input type="hidden" id="del_att" />
             
              <div class="row">
                <div class="col-md-12">
                <h4>Approve Attendance?</h4>
               <!--<h4>Delete "<span id="ana"></span>'s" Attendance?</h4>-->
               <!-- <h4>Delete "<span id="del_in"></span>'s" Attendance?</h4> -->
 
<!--         <input type="radio" id="timein" name="deletein" value="in">
        <label for="timein" style='color:black'>Delete "Time In"</label><br> -->
<!--        <input type="radio" id="timeout" name="deleteout" value="out">
        <label for="timeout" style='color:black'>Delete "Time Out"</label><br> -->
        </div>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="approveatt"  class="btn btn-warning" style="margin-top: -10px;">Approve</button>
            <button type="button" id="unchk" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--ApproveAtt Attn close-->
  </body>
 
   
 
     <script src="<?=URL?>../assets/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
 
  <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
  <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jquery-ui.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>
 
  <script type="text/javascript">
            $('.timepicker').timepicker({
      });
    </script>
  <script type="text/javascript">
   // $(document).ready(function() {
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
    var datestring="&date=";
    var date = new Date();
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);
    var isoDateString = date.toISOString().substring(0,10);
    var datestring="&date=";
    var ts;
    var ts1;
    var ss;
    var table= $('#example').DataTable( {
   
    order: [[ 1, 'asc' ],[3, "desc"]],
	'serverSide': true,
    'serverMethod': 'post',
    "searching":true,
  //aaSorting: [],
    //"scrollX": true,
    dom: 'Bfrtip',
 
    //"bDestroy": true, // destroy data table before reinitializing
    buttons: [
    'pageLength',
	/* 
	{
		extend:'excel',
		action: function myexcel() {
			//alert('shakir');

                    var range = $('#reportrange').text();
					
	  window.location.href = '<?php '.URL.'?>getexcelabsapprove?date='+range;
	 //window.location.href = 'http://ubiattendance.zentylpro.com/index.php/admin/getexcelabsapprove?date='+range;
                }
	}, */
	
     {
          extend: 'csv',
          exportOptions: {
		  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]}
        }, 
     {
          extend: 'excel',
          exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10]}
        }, 'copy',
    {
            extend: 'print',
            // autoPrint: false,
            title: '',
            exportOptions: {
                // columns: ':visible',
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8,9,10],
                stripHtml: false,
            },
               repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
               logoStyle: 'height:100px;width:130px;',
               title: 'All Attendances report of '+org+' Dated '+isoDateString+'',
               
            },
               text: '<i class="fa fa-print"></i> Print',
              
                customize: function (win) {
                $(win.document.body)
                .css('font-size', '7px')
                   
                    // .prepend(
                    //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                    // );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        },
					{
					  "extend":'colvis',
					  // "columns":':not(:last-child)',
					}
		],
			"columnDefs": [ { orderable: false, targets: [0,3]}],
			"contentType": "application/json",
			"ajax": "<?php echo URL;?>departmenthead/getabsapprove?datestatus="+1+datestring,
			"columnDefs":
    		[
    			{ "visible": false, "targets": [0,3,9,12] }
    		],
 
		"columns": [
					{ "data": "ecode" },
					{ "data": "name" },
  				{ "data": "shift" },
					{ "data": "date" },
					{ "data": "timeindate" },
					{ "data": "ti" },
					{ "data": "timeoutdate" },
					{ "data": "to" },
          { "data": "disapprovedatetime" },
          { "data": "approvedatetime" },
					{ "data": "disapprovereason" },
          { "data": "disapproveremark" },
          { "data": "approvedremark" },
					{ "data": "action" }
				],
   "drawCallback": function ( settings ) {
          var api = this.api();
          var rows = api.rows( {page:'current'} ).nodes();
          var last=null;
     
          api.column(3, {page:'current'} ).data().each( function ( group, i ) {
            if ( last !== group ) {
              $(rows).eq( i ).before(
                '<tr class="group"><td bgcolor="#d59ff2" colspan=16><b>'+group+'</b><b> &nbsp; &nbsp;  </b></td></tr>'
              );
              last = group;
            }
          } );
        }
 
    });


  //  $('input.timepicker').timepicker();
   
   
 
   
       ////---------date picker
	  var minDate = moment();
      var start = moment().subtract(0, 'days');
      var end = moment().subtract(0, 'days');
      function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      }
      $('#reportrange').daterangepicker({
        maxDate:minDate,
        //minDate:'-4M',
        minDate : moment().subtract(4 , 'month').startOf('month'),
        startDate: start,
        endDate: end,
        ranges:{
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
           'Last 30 Days': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
    ////---------/date picker
    //$('#reportrange').on('DOMNodeInserted',function(){
		$('#getAtt').click(function(){
		  var range=$('#reportrange').text();
		  var shift=$('#shift').val();
		  var dept=$('#deprt').val();
		  var empl=$('#empl').val();
		  var desg=$('#desg').val();
      var dis1=$("#disl").val();
     //alert(dis1);
 
		$('#example').DataTable({
          //order:[[0, "asc"]],
          order:[[ 1, 'asc' ],[3, "desc"]],
		  'serverSide': true,
		  'serverMethod': 'post',
		  "searching":true,
          dom: 'Bfrtip',
          "bDestroy": true,// destroy data table before reinitializing
		buttons: [
          'pageLength',
		  {
		extend:'excel',
		action: function myexcel() {
			//alert('shakir');

                    var range = $('#reportrange').text();
					
	  window.location.href = '<?php '.URL.'?>getexcelabsapprove?date='+range;
	 //window.location.href = 'http://ubiattendance.zentylpro.com/index.php/admin/getexcelabsapprove?date='+range;
                }
	},
		  
          /* {
          extend: 'csv',
          exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]}
        }, */
        /* {
          extend: 'excel',
          exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8]}
        }, */'copy',
          {
           extend: 'print',
            // autoPrint: false,
           title: '',
           exportOptions: {
           columns: ':visible',
           columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8],
           stripHtml: false,
            },
           repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
               logoStyle: 'height:100px;width:130px;',
               title: 'All Attendances report of '+org+' Dated '+isoDateString+'',
               
            },
               text: '<i class="fa fa-print"></i> Print',
             
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
        },
				{
				  "extend":'colvis',
				  // "columns":':not(:last-child)',
				}
            ],
  //columnDefs: [ { orderable: false, targets: [14,15]}],
       
 
			"contentType": "application/json",
			"ajax": "<?php echo URL;?>departmenthead/getabsapprove?date="+range+"&shift="+shift+"&dept="+dept+"&empl="+empl+"&desg="+desg+"&dis1="+dis1,
			"columnDefs": [
			{ "visible": false, "targets": [0,3,9,12] }
			],
    "columns": [
          { "data": "ecode" },
          { "data": "name" },
          { "data": "shift" },
          { "data": "date" },
          { "data": "timeindate" },
          { "data": "ti" },
          { "data": "timeoutdate" },
          { "data": "to" },
          { "data": "disapprovedatetime" },
          { "data": "approvedatetime" },
          { "data": "disapprovereason" },
          { "data": "disapproveremark" },
          { "data": "approvedremark" },
          { "data": "action" }
        ],
      "drawCallback": function ( settings ) {
          var api = this.api();
          var rows = api.rows( {page:'current'} ).nodes();
          var last=null;
     
          api.column(3, {page:'current'} ).data().each( function ( group, i ) {
            if ( last !== group ) {
              $(rows).eq( i ).before(
                '<tr class="group"><td bgcolor="#d59ff2" colspan=16><b>'+group+'</b><b> &nbsp; &nbsp;  </b></td></tr>'
              );
              last = group;
            }
          });
          }
		} );
    });
    // $('#saveE').click(function(){
      // var id=$('#id').val();
          // // var na=$('#attNameE').val();
      // var ti=$('#timeInE').val();
      // var to=$('#timeOutE').val();
          // // var ad=$('#attDateE').val();
      // var sh=$('#shiftE').val();
      // var sts=$('#statusE').val();
      // $.ajax({url: "<?php echo URL;?>admin/editAtt",
      // data: {"id":id,"ti":ti,"to":to,"sh":sh,"sts":sts},
      // success: function(result){
        // if(result==1){
          // doNotify('top','center',2,'Attendance Updated Successfully.');
          // $('#addAttE').modal('hide');
           // table.ajax.reload();
        // }else{
          // doNotify('top','center',4,'can not be updated.');
        // }
       
       // },
      // error: function(result){
        // doNotify('top','center',4,'Unable to connect API');
       // }
      // });
    // });
   //////////////////////////
   $(document).on("click", ".loc",function ()
      {
        $('#latitid').val($(this).data('latit'));
        $('#latitinid').val($(this).data('latitin'));
        $('#longiid').val($(this).data('longiin'));
        $('#checkinloc').val($(this).data('checkinloc'));
        $('#locationmodal').modal('show');  
      });
     
     
    $('#showgoogle').click(function(){
       var latitid=$('#latitid').val();
       window.open("http://maps.google.com/?q="+latitid);
       //$("a").attr("href", "http://maps.google.com/?q="+latitid);
       //$("a").attr("target", "_blank");
       $('#locationmodal').modal('hide');  
       
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
     
   //////////////////////
 
  $(document).on("click", ".pop",function ()
      {
       
        $('#imgid').val($(this).data('id'));
      //  $('#profileimg').val($(this).data('enimage'));
      //  alert($(this).data('enimage'));
		$('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');  
      });


	$(document).on("click", ".pop1",function ()
      {
       
        $('#imgid1').val($(this).data('id'));
      //  $('#profileimg').val($(this).data('enimage'));
      //  alert($(this).data('enimage'));
		$('.imagepreview1').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal1').modal('show');  
      });
 
  $(document).on("click", "#approveatt",function ()
      {
    var id=$('#del_aid').val();
    var disapp_aname=$('#del_aname').val();
    var disapp_date=$('#del_att').val();

    //alert(id);
    //alert(disapp_date);

    var formdata = new FormData();
    formdata.append('id',id);
    formdata.append('disapp_aname',disapp_aname);
    formdata.append('disapp_date',disapp_date);
    $.ajax({
    processData: false,
    contentType: false,
    url: "<?php echo URL;?>departmenthead/approveattendance",
    data: formdata,
    datatype:"json",
    type:"post",
    success: function(result){
        if(result==1)
      {
        doNotify('top','center',2,'Attendance is approved & moved to Present List');
        $('#ApproveAtt').modal('hide');  
          $('#example').DataTable().ajax.reload();
        }
      else
      {
          doNotify('top','center',4,'Cannot be updated');
        }
       
       },
        error: function(result)
      {
          doNotify('top','center',4,'Unable to connect to API');
    }
       });
    });


	$('#setprofile').click(function(){
      var id=$('#imgid').val();
   // alert($('#profileimg').prop("files")[0]);
	  var imgg=$('#profileimg').attr('src');
 
	  var  formdata = new FormData();
      formdata.append('profimg',imgg);
      formdata.append('id',id);
   
		$.ajax({
		processData: false,
		contentType: false,
		url: "<?php echo URL;?>admin/editimg",
		data: formdata,
		datatype:"json",
		type:"post",
		success: function(result){
        if(result==1)
      {
          datestring='&date='+$('#reportrange').text();
          doNotify('top','center',2,'Updated successfully');
		  $('#imagemodal').modal('hide');  
          $('#example').DataTable().ajax.reload();
        }
      else
      {
          doNotify('top','center',4,'Cannot be updated');
        }
       
		   },
   		  error: function(result)
		  {
          doNotify('top','center',4,'Unable to connect to API');
		}
       });
    });

 
 
		$(document).on("click", ".delete", function () {
		$('#del_aid').val($(this).data('aid'));
		$('#ana').text($(this).data('aname').trim());
		$('#del_att').val($(this).data('attdate'));
		$('#del_in').val($(this).data('atttimein'));
		$('#del_out').val($(this).data('atttimeout'));

		});


    $(document).on("click", ".disapprove", function () {
    $('#del_aid').val($(this).data('aid'));
    $('#del_aname').val($(this).data('aname'));
    $('#del_att').val($(this).data('attdate'));

    });
 
 
 
   /*  $(document).on("click", "#delete", function()
  {
    var id=$('#del_aid').val();
    var ana=$('#ana').text();
    var del_att=$('#del_att').val();
    $.ajax({url: "<?php echo URL;?>admin/deleteAtt",
      data: {"aid":id,"ana":ana,"del_att":del_att},
      success: function(result)
    {
        if(result==1){
        datestring='&date='+$('#reportrange').text();
          $('#delAtt').modal('hide');
          doNotify('top','center',2,'Attendance deleted successfully');
           $('#example').DataTable().ajax.reload();
        }else{
          $('#delAtt').modal('hide');
          doNotify('top','center',4,'There may problem(s) in deleting attendance , try later');
        }
     
       },
      error: function(result){
        doNotify('top','center',4,'Unable to connect API');
       }
      });
    }); */

    $(document).on("click", "#disapprove", function () {

       var disattid=$('#del_aid').val();
       var disattdate=$('#del_att').val();
       var disattreason = $('input[name="abssts"]:checked').val();
       alert(disattid);
       alert(disattdate);
       alert(disattreason);

        $.ajax({url: "<?php echo URL;?>disapprove/disapproveatt",
        data: {"disattid":disattid,"disattdate":disattdate,"disattreason":disattreason},
        success: function(result)
        {
        if(result==1){
        doNotify('top','center',2,'Disapproved successfully');
        $('#delAtt').modal('hide');
        var table=$('#example').DataTable();
        table.ajax.reload(null, false);
        }else{
        $('#delAtt').modal('hide');
        doNotify('top','center',4,'Attendance cannot be disapproved');
        }
           
        },
        error: function(result){
        doNotify('top','center',4,'Unable to connect API');
        }
        });

    });
      
      // $(document).on("click", "#disapprove", function()
      // {
      //  var curdate = '<?php echo date('Y-m-d');?>';
      //  var disappreason $('input[name="disapprove"]:checked').val();
      //  alert(curdate);
      //  alert(disappreason);
      // });

			$(document).on("click", "#delete", function()
			{

			var curdate = '<?php echo date('Y-m-d');?>';
			var del_att=$('#del_att').val();


			var timein ='';
			var timeout ='';
//alert(timeout);







           
	if($("#delAtt #timein").is(":checked") && $("#delAtt #timeout").is(":not(:checked)")){

	doNotify("top","center",4,"Time in cannot deleted");

	}
	else{

	if($("#delAtt #timein").is(":not(:checked)") && $("#delAtt #timeout").is(":checked")){

	if(curdate == del_att){


	var id=$('#del_aid').val();
	var ana=$('#ana').text();
//alert(ana);
	var del_att=$('#del_att').val();
//alert(del_att);
	$.ajax({url: "<?php echo URL;?>admin/updatetime",
	data: {"aid":id,"ana":ana,"del_att":del_att},
	success: function(result)
	{
  if(result==1){
	datestring='&date='+$('#reportrange').text();
	$('#delAtt').modal('hide');
	doNotify('top','center',2,'Time out deleted successfully');
	var table=$('#example').DataTable();
	table.ajax.reload(null, false);
	}else{
	$('#delAtt').modal('hide');
	doNotify('top','center',4,'Time out cannot be deleted');
	}
     
	},
	error: function(result){
	doNotify('top','center',4,'Unable to connect API');
	}
	});

	}else{
	doNotify('top','center',4,'Time out cannot be deleted');
	}



	}else{

	if($("#delAtt #timein").is(":checked") && $("#delAtt #timeout").is(":checked")){


	var id=$('#del_aid').val();
	var ana=$('#ana').text();	
//alert(ana);
	var del_att=$('#del_att').val();
//alert(del_att);
	$.ajax({url: "<?php echo URL;?>admin/deleteAtt",
	data: {"aid":id,"ana":ana,"del_att":del_att},
	success: function(result)
	{
	if(result==1){
	datestring='&date='+$('#reportrange').text();
	$('#delAtt').modal('hide');
	doNotify('top','center',2,'Attendance deleted successfully');
	var table=$('#example').DataTable();
	table.ajax.reload(null, false);
	}else{
	$('#delAtt').modal('hide');
	doNotify('top','center',4,'There may problem(s) in deleting attendance , try later');
	}

	},
 error: function(result){
 doNotify('top','center',4,'Unable to connect API');
  }
 });




}
else{

doNotify('top','center',3,'Select atleast one record');
}




}



}




   
    });
	
	
	
	
	
	
	
	$(document).on("click", "#deletetimein", function()
			{

			var curdate = '<?php echo date('Y-m-d');?>';
			var del_att=$('#del_att').val();


			var timein ='';
			var timeout ='';
//alert(timeout);

	

	if($("#delAtttimein #timein").is(":checked") ){  
		
		//alert('shakir');


	var id=$('#del_aid').val();
	var ana=$('#ana').text();	
//alert(ana);
	var del_att=$('#del_att').val();
//alert(del_att);
	$.ajax({url: "<?php echo URL;?>admin/deleteAtt",
	data: {"aid":id,"ana":ana,"del_att":del_att},
	success: function(result)
	{
	if(result==1){
	datestring='&date='+$('#reportrange').text();
	$('#delAtttimein').modal('hide');
	doNotify('top','center',2,'Attendance deleted successfully');
	var table=$('#example').DataTable();
	table.ajax.reload(null, false);
	}else{
	$('#delAtttimein').modal('hide');
	doNotify('top','center',4,'There may problem(s) in deleting attendance , try later');
	}

	},
 error: function(result){
 doNotify('top','center',4,'Unable to connect API');
  }
 });




}
else{

doNotify('top','center',3,'Select record');
}
 
    });
	
	

 
 
 
 $('#saveEE').click(function(){


      var id=$('#id').val();
      var ti=$('#timeInE').val();
      var to=$('#timeOutE').val();
      var date=$('#attDateE').val();
      var shifttype=$('#shifttype').val();
   
      if(shifttype==1)
      {
        if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal to time out');
        return false;  
        }
       if(ti>to)
       {
        doNotify('top','center',4,'Time in cannot be greater than time out');
        return false;
       }        
      }
       if(shifttype==2)
      {
        if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal to time out');
        return false;  
        }
       // if(ti<to)
       // {
        // doNotify('top','center',4,'Time Out can not be greater than Time In');
        // return false;
       // }        
      }
     
      $.ajax({url: "<?php echo URL;?>admin/editAttUBI",
      data: {"id":id,"ti":ti,"to":to,"date":date,"shifttype":shifttype},
      success: function(result){
        //alert(result);
        if(result==1)
        {
          datestring='&date='+$('#reportrange').text();
          // alert(datestring);
          doNotify('top','center',2,'Time out updated successfully');
          $('#addAttATO').modal('hide');
          //table.ajax.reload();
          $('#example').DataTable().ajax.reload();
         
        }
        else
        {
          doNotify('top','center',4,'Cannot be updated');
        }
       
       },
      error: function(result)
        {
          doNotify('top','center',4,'Unable to connect API');
        }
      });
    });

 $('#saveE').click(function(){


      var id=$('#id').val();
      var aname=$('#aname').text();
      var ti=$('#timeInE1').val();
      var to=$('#timeOutE1').val();
      var dateIn=$('#attInDateE').val();
      var dateOut=$('#attOutDateE').val();
      var shifttype=$('#shifttype').val();
      var to1 = dateOut+' '+to;

      // alert(to1);


      var now = new Date();
      var hh = now.getHours();
      var min = now.getMinutes();
             
      var ampm = (hh>=12)?'PM':'AM';
      hh = hh%12;
      hh = hh?hh:12;
      hh = hh<10?+hh:hh;
      min = min<10?'0'+min:min;
             
      var time1 = hh+":"+min+" "+ampm;

      var today = new Date();


      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      var today1 = yyyy + '-' + mm + '-' + dd;
      var today2 = yyyy + '-' + mm + '-' + dd +' '+time1;


      // alert(today2);


     
      if(shifttype==1)
      {
       //  if(ti==to)
       //  {
        // doNotify('top','center',4,'Time In can not be equal to Time Out');
        // return false;  
       //  }
 

      /*  if(to1 > today2){
        doNotify('top','center',4,'Time out date cannot be later than current date');
        return false;
       } */
       
        if(dateIn > dateOut){
          doNotify('top','center',4,'Time in date cannot be greater than time out date');
        return false;
        }
        if(dateIn==dateOut){
          if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal to time out');
        return false;  
        }

        }
        if(dateIn == ''){
          doNotify('top','center',4,'Please select a value for time in date');
        return false;
        }
        if(dateOut == ''){
          doNotify('top','center',4,'Please select a value for time out date');
        return false;
        }
        if( ti== ''){
          doNotify('top','center',4,'Please select a value for time in');
        return false;
        }
         if( to== ''){
          doNotify('top','center',4,'Please select a value for time out');
        return false;
        }
        // alert(fromd>tod);
        // alert(fromd);
        // alert(tod);
       // if(tidp>todp)
       // {
        // doNotify('top','center',4,'Time In can not be greater than Time Out');
        // return false;
       // }        
      }
       if(shifttype==2)
      {

       /*  if(to1 > today2){
        doNotify('top','center',4,'Time out date cannot be later than current date');
        return false;
       } */
       //  if(ti==to)
       //  {
        // doNotify('top','center',4,'Time In can not be equal to Time Out');
        // return false;  
       //  }  
         if( ti== ''){
          doNotify('top','center',4,'Please select a value for time in');
        return false;
        }
         if( to== ''){
          doNotify('top','center',4,'Please select a value for time out');
        return false;
        }
        if(dateIn > dateOut){
          doNotify('top','center',4,'Time in date cannot be greater than time out date');
        return false;
        }
        if(dateIn == ''){
          doNotify('top','center',4,'Please select a value for time in date');
        return false;
        }
        if(dateOut == ''){
          doNotify('top','center',4,'Please select a value for time out date');
        return false;
        }
        if(dateIn==dateOut){
          if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal to time out');
        return false;  
        }


        }
      }
   
   
      $.ajax({url: "<?php echo URL;?>admin/editAtt",
      data: {"id":id,"ti":ti,"to":to,"dateIn":dateIn,"dateOut":dateOut,"shifttype":shifttype,"aname":aname,"ts":ts,"ts1":ts1},
      success: function(result){
         // alert(result);

        //console.log(result);
       
        if(result==1)
        {
          datestring='&date='+$('#reportrange').text();
          doNotify('top','center',2,'Attendance updated successfully');
          $('#addAttE').modal('hide');
          var table=$('#example').DataTable();
		  table.ajax.reload(null,false);
        }
        else if(result== 22)
              {
                doNotify('top','center',4,'Time in should be lesser than time out ');
              }
              else if(result== 114)
              {
                doNotify('top','center',4,'Time in should be lesser than or equal to current time ');
                return false;
              }
 else if(result== 1947)
              {
                doNotify('top','center',4,'Date diffrence cannot be greater than one day');
                return false;
              }
 else if(result== 89)
              {
                doNotify('top','center',4,'Time out cannot be later than current date and time ');
                return false;
              }
 
 else if(result == 90){
doNotify('top','center',4,'Time out date cannot be later than current date ');
          return false;
}
              else if(result== 111)
              {
                doNotify('top','center',4,'Time out should be lesser than or equal to current time ');
                return false;
              }
              else if(result== 112)
              {
                doNotify('top','center',4,'Time in date should be equal to current date ');
                return false;
              }
             
              else if(result== 113)
              {
                doNotify('top','center',4,'Time out date should be equal to current date ');
                return false;
              }
        else
        {
          doNotify('top','center',4,'Cannot be updated');
        }
       },
      error: function(result)
        {
          doNotify('top','center',4,'Unable to connect API');
        }
      });
    });
   
     
      $('#savesk').click(function(){
       var id=$('#id').val();
        var sid=$('#sid').val();
        var deptid=$('#deptid').val();
        var desgid=$('#desgid').val();
        var areaid=$('#areaid').val();
        var aname=$('#aname').text();
        // alert(aname);
        var areaid=$('#areaid').val();
        var tin=$('#timein').val();
        // alert(tin);
        var tout=$('#timeout').val();
        // if(tout== '12:00 AM'){
        //   tout = '11:59 PM'
        // }
        // alert(tout);
        var datein=$('#attInDateE1').val();
        var dateout=$('#attOutDateE1').val();
        var shifttype=$('#shifttype').val();


      // alert(id);
      // alert(sid);
      // alert(deptid);
      // alert(desgid);
      // alert(areaid);
      // alert(shifttype);
      // alert(tin);
      // alert(tout);
      // alert(datein);
      // alert(dateout);
     
      if(shifttype==1)
      {
        if(tin== ''){
          doNotify('top','center',4,'Please select a value for time in');
        return false;
        }
        if(tout== ''){
          doNotify('top','center',4,'Please select a value for time out');
        return false;
        }
       
       
        if(datein == dateout){
          if(tin==tout)
        {
        doNotify('top','center',4,'Time in cannot be equal to time out');
        return false;  
        }
       

        }
        if(datein == ''){
          doNotify('top','center',4,'Please select the time in date');
        return false;
        }
        if(dateout == ''){
          doNotify('top','center',4,'Please select the time out date');
        return false;
        }
       
         if(tout== ''){
          doNotify('top','center',4,'Please select a value for time out');
        return false;
        }
       if(datein > dateout){
          doNotify('top','center',4,'Time in date cannot be greater than time out date');
        return false;
        }
      }

      if (shifttype == 2) {
        if(tin== ''){
          doNotify('top','center',4,'Please select a value for time in');
        return false;
        }
        if(tout== ''){
          doNotify('top','center',4,'Please select a value for time out');
        return false;
        }
       
       
        if(datein == dateout){
          if(tin==tout)
        {
        doNotify('top','center',4,'Time in cannot be equal to time out');
        return false;  
        }
       

        }
        if(datein == ''){
          doNotify('top','center',4,'Please select a value for time in date');
        return false;
        }
        if(dateout == ''){
          doNotify('top','center',4,'Please select a value for time out date');
        return false;
        }
       
         if(tout== ''){
          doNotify('top','center',4,'Please select a value for time out');
        return false;
        }
        if(datein > dateout){
          doNotify('top','center',4,'Time in date cannot be greater than time out date');
        return false;
        }
      }
     

     $.ajax({url: "<?php echo URL;?>admin/Attask",
      data: {"id":id,"tin":tin,"tout":tout,"datein":datein,"dateout":dateout,"shifttype":shifttype,"aname":aname,"sid":sid,"deptid":deptid,"desgid":desgid,"areaid":areaid,"ts":ts,"ts1":ts1},

       success: function(result){


       
       if(result==1)
        {
       
          datestring='&date='+$('#reportrange').text();
          doNotify('top','center',2,'Attendance updated successfully');
          $('#addAttsk').modal('hide');
          var table = $('#example').DataTable();
		  table.ajax.reload(null, false);    
        }
         else if(result== 22)
              {
                doNotify('top','center',4,'Time in should be lesser than time out ');
                return false;
              }
              else if(result== 111)
              {
                doNotify('top','center',4,'Time out should be lesser than or equal to current time ');
                return false;
              }
              else if(result== 112)
              {
                doNotify('top','center',4,'Time in date should be equal to current date ');
                return false;
              }
              else if(result== 114)
              {
                doNotify('top','center',4,'Time in should be lesser than or equal to current time ');
                return false;
              }
              else if(result== 113)
              {
                doNotify('top','center',4,'Time out date should be equal to current date ');
                return false;
              }
     
         else
        {
          doNotify('top','center',4,'Cannot be updated');
        }
      },

       error: function(result)
        {
          doNotify('top','center',4,'Unable to connect API');
        }


      });
      });


     
   
   
   
   
 
     $('#savec').click(function(){
    // alert("hiii");
      var id=$('#idc').val();
      var aname=$('#anamec').text();
      var ti=$('#timeInc1').val();
      var shifttype=$('#shifttypec').val();
      var dateIn=$('#attInDatec1').val();
      var dateOut='0000-00-00';
      var to='00:00:00';
      //alert(id);
     // alert(aname);

      if(ti =='12:00 AM' ){
         

          ti='12:01 AM';

         

          // return false;
        }
      // var today = new Date();
      // var timec = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  //     var date = new Date();
  //       var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
  //       var am_pm = date.getHours() >= 12 ? "PM" : "AM";
  //       hours = hours < 10 ? "0" + hours : hours;
  //       var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
  //       var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
  //       timec = hours + ":" + minutes + ":" + seconds + " " + am_pm;
  // alert(timec);
  // alert(ti);

  // // return strTime;

  //     if(ti > timec){
  //       doNotify('top','center',4,'TimeIN Should be lesser than or equal to current Time.');
  //       return false;
  //     }

      // alert(shifttype);
      // alert(id);
      // alert(dateIn);
//       $('#addAttc').on('hidden.bs.modal', function () {
//  location.reload();
// })

        // $('#addAttc').on("hidden.bs.mo", function() {
        //   $('#example').DataTable().ajax.reload();
        //  });
       

      $.ajax({url: "<?php echo URL;?>admin/editAtt",
        data: {"id":id,"ti":ti,"to":to,"dateIn":dateIn,"dateOut":dateOut,"shifttype":shifttype,"aname":aname,"ts":ts,"ts1":ts1},
        success: function(result){
        if(result==1)
        {
          datestring='&date='+$('#reportrange').text();
          doNotify('top','center',2,'Attendance updated successfully');
          $('#addAttc').modal('hide');
          var table=$('#example').DataTable();
		  table.ajax.reload(null,false);
        }
        else if(result== 22)
              {
                doNotify('top','center',4,'Time in should be lesser than time out');
                return false;
              }
              else if(result== 110)
              {
                doNotify('top','center',4,'Time in should be lesser than or equal to current time ');
                return false;
              }
             
             
        else
        {
          doNotify('top','center',4,'Cannot be updated');
        }
       },
       error: function(result)
        {
          doNotify('top','center',4,'Unable to connect API');
        }

      });
      });

//      $('#addAttc').on('hidden.bs.modal', function () {
//     // $('#example').dataTable().reload();
//     location.reload();

  </script>
  <script>
$(document).ready(function(){
$(document).on("click", ".edit", function ()
  {
    $('#id').val($(this).data('id'));
    $('#aname').text($(this).data('aname'));
    $('#timeInE1').val($(this).data('timein'));
    $('#timeInE11').val($(this).data('timeInE1'));
    $('#timeInc1').val($(this).data('timein'));
    $('#timeOutE1').val($(this).data('timeout'));
    $('#timeOutE11').val($(this).data('timeOutE1'));
    $('#attInDateE').val($(this).data('attendancedate'));
    if($(this).data('todate') == '0000-00-00'){
    $('#attOutDateE').val($(this).data('attendancedate'));
    // alert($(this).data('attendancedate'));
  }
  else{
    $('#attOutDateE').val($(this).data('todate'));
    // alert($(this).data('todate'));
  }
    // $('#attOutDateE').val($(this).data('attendancedate'));
    $('#attInDateE1').val($(this).data('attendancedate'));
    $('#attOutDateE1').val($(this).data('attendancedate'));
    $('#shifttype').val($(this).data('shifttype'));
    $('#attInDatec1').val($(this).data('tidate'));
    $('#shifttypec').val($(this).data('shifttype'));
    $('#anamec').text($(this).data('aname'));
    $('#idc').val($(this).data('id'));
    $('#sid').val($(this).data('sid'));
    $('#deptid').val($(this).data('deptid'));
    $('#desgid').val($(this).data('desgid'));
    $('#areaid').val($(this).data('areaid'));
 
  if($(this).data('shifttype')==1)
  {
    $('#shifttypedate').hide();
  }
  else
  {
  $('#shifttypedate').show();
  }
   ts=$(this).data('timein');
  ts1=$(this).data('timeout');
      setTimeout(function(){  
        $('.timepicker').timepicker({
        defaultTime: ts,
        //timeFormat: 'H:i',
                          });
   $('.timepicker1').timepicker({
        //timeFormat: 'H:i',
        defaultTime: ts1,
      });
      }, 1);

      if($(this).data('sid')==1)
  {
    $('#shifttypedate123').hide();
  }
  else
  {
  $('#shifttypedate123').show();
  }
   ts=$(this).data('timein');
  ts1=$(this).data('timeout');
      setTimeout(function(){  
        $('.timepicker').timepicker({
        defaultTime: ts,
        //timeFormat: 'H:i',
                          });
   $('.timepicker1').timepicker({
        //timeFormat: 'H:i',
        defaultTime: ts1,
      });
      }, 1000);

  // var dateSelected=$(this).data('date');
  // $(".datepicker").datepicker
  //  ({
  //  "minDate": dateSelected ,
  //  "maxDate": "+0d",
  //  "dateFormat": 'yy-mm-dd'
  //  });
  var attdatein = $(this).data('tidate');



     
  // var dateSelected=$(this).data('date');
  // $(".datepicker").datepicker
  //  ({
  //  "minDate": dateSelected ,
  //  "maxDate": "+0d",
  //  "dateFormat": 'yy-mm-dd'
  //  });
  // var attdatein = $(this).data('tidate');
 
  // alert(dateSelected);
  $("#attInDateE1").datepicker
    ({
    "minDate": 0,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
    });
    var attdateout = $(this).data('todate');
    var attdateint = $(this).data('tidate');
    // alert(attdateout);
    $("#attOutDateE1").datepicker
    ({
    "minDate": 0 ,
    "maxDate": "+d",
    "dateFormat": 'yy-mm-dd'
    });
    });
});


</script>
<script>
   $("#attInDateE").datepicker
    ({
    "minDate": 0,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
    });
    //var attdateout = $(this).data('todate');
    //var attdateint = $(this).data('tidate');
   
    $("#attOutDateE").datepicker
    ({
    "minDate": "-6" ,
    "maxDate": "+0",
    "dateFormat": 'yy-mm-dd'
    });
   

</script>>
  <script>
  $(document).ready(function(){
   $(document).on("click", ".editATT", function ()
  {
    $('#id').val($(this).data('id'));
    $('#timeOutE').val($(this).data('timeout'));
    $('#attDateE').val($(this).data('date'));
    $('#shifttype').val($(this).data('shifttype'));
 
  if($(this).data('shifttype')==1)
  {
    $('#shifttypedate').hide();
  }
  else
  {
  $('#shifttypedate').show();
  }
   
 
     ts=$(this).data('ti');
  ss=$(this).data('timeout');
      setTimeout(function(){
   $('.timepicker2').timepicker({
        defaultTime: ss,
      });
      $('.timepicker').timepicker({
        defaultTime: ts,
      });

      },1000);  
     
     
  var dateSelected=$(this).data('date');  
 
  $(".datepicker").datepicker
    ({
    "minDate": dateSelected ,
    "maxDate": "+0d",
     "dateFormat": 'yy-mm-dd'
    });
    });
  });
  </script>
 
  <script>
    $(document).ready(function(){
    $('.toggle-sidebar').click(function(){
    $("#sidebar").toggleClass("collapsed t2");
    $("#content").toggleClass("col-md-9");
    $("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'allattendance'});  
    });
   
    });
  </script>

   <script>
    $(".pencil").click(function ()
      {
      $("input[type='file']").trigger('click');
    });
   
    </script>

    <script>
      $("#TimeInDate").datepicker
    ({
    "minDate": 0 ,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
    });
    var attdateout = $(this).data('todate');
    var attdateint = $(this).data('tidate');
    // alert(attdateout);
    $("#TimeOutDate").datepicker
    ({
    "minDate": 0 ,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
    });
    </script>
	
	<script>
	function unchk1(){
		
			 // alert('');
		document.getElementById("timein").checked = false;
        document.getElementById("timeout").checked = false;
	}
	/* $(document).on("click", ".unchk1", function ()
  {
	  
 */
	
        
		
  //});
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
  
  
  



</html>