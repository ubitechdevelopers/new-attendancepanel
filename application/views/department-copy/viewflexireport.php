<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	
    <link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View Flexi Attendance</title>
    <link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
    <style>
      $query = $this->db->query("SELECT `Id`,  `Shift`  FROM ` EmployeeMaster`  WHERE OrganizationId=? AND `Id` Not IN(SELECT `EmployeeId` FROM `AttendanceMaster` ) ",array($orgid)); 
      .red{
      color:red;
      font-weight:'bold';
      font-size:16px;
      }
      .delete{
      cursor:pointer;
      }
      div.dt-buttons{
      position:relative;
      float:left;
      margin-left:15px;
      }
      .t2{display:none;}
	  .card .table tfoot tr:first-child td {
     border-top: 1px solid black !important;
}
    </style>
  </head>
  <body>
    <div class="wrapper">
      <?php
        $data['pageid']=7.7513;
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
                    <p class="category" style="color:#ffffff;font-size:17px;" >Interim Attendance of <?= getEmpName($empid); ?><?php /*foreach($adata['data'] as $data){ echo "(Hourly Rate: " .$data['rate'].")"; } */?> </p>
                  </div>
                  <div class="card-content">
                    <div id="typography">
                      <div class="title">
                       <!--<div class=" container-fluid row" style="margin-top:0px;" >
                          <div class="col-sm-3" >
                            <div id="reportrange" class="" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 104%;margin-left:-12px;">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                              <span></span> <b class="caret"></b>
                            </div>
                          </div>
						  
						  <div class="col-sm-2">
						  <div class="row" >
						  <select id="desg" style="height:35px;position:relative;" class="col-sm-11">
							<option value="0">--All Designations--</option>
								<?php
								$data= json_decode(getAllDesg($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++){
									echo '<option  value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								}?>
							</select>
							 </div>
							</div>
							
                            <div class="col-sm-2" >	
                            <div class="row" >							
							<select id="deprt" name="deprt" style=" height:35px;position:relative;" class="col-sm-11">
						    <option value="0">--All Departments--</option>
								<?php
								$data= json_decode(getAllDept($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							  </select>		 
							  </div>
							  </div>
							  <div class="col-sm-2" >
							  <div class="row" >
                              <select id="shift" name="shift" style=" height:35px;position:relative;" class="col-sm-11">
							   <option value="0">--All Shifts--</option>
								<?php
								$data= json_decode(getAllShift($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option  value='.$data[$i]->id.'>'.$data[$i]->name.'  ('.substr(($data[$i]->TimeIn),0,5).' - '.substr(($data[$i]->
								TimeOut),0,5).')</option>';
								?></select>
								</div>
								</div>
								<div class="col-sm-2">
								<div class="row">
								<select id="empl" style="height:35px;position:relative;" class="col-sm-12">
							   <option value="0">--All Employees--</option>
								<?php
								$data= json_decode(getAllemp($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++){
									echo '<option  value='.$data[$i]->id.'>'.$data[$i]->FirstName.'  '.$data[$i]->LastName.'</option>';
								}?>
							    </select>
								 </div>
								</div>
								 <div class="col-sm-1">
								 <button class="btn btn-success pull-left" style="position:relative; right:10px;margin-top:0px;height:35px;padding-top:8px;" id="getAtt" ><i class="fa fa-search"></i></button>
						    </div>
                        </div>
                       <div class="row">
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
                                <th>Attendance Date</th>
                                <th>Shift</th>
                                <th>Time In Image</th>
                								<th>Time In</th>
                								<th width="15%">Time In Location</th>
                								<th>Time In City</th>
                								<th>Time In App Version</th>
                								<th>Time Out Image</th>
                								<th>Time Out</th>
                								<th  width="15%">Time Out Location</th>
                								<th>Time Out City</th>
                								<th>Time Out App Version</th>
                                <th>Device</th>
                                <th>Platform</th>
                                <th>LoggedHours</th>
                              </tr>
                            </thead>
							
							
							
							<tbody>
							<?php 
							foreach($adata['data'] as $data)
							{
							?> 
								<tr>
								<td><?= $data['AttendanceDate'] ?></td>
								<td><?= $data['ShiftId'] ?></td>
                <td>
                  <?php if($data['TimeInImage']!=''){?>
                  <img src=<?= $data['TimeInImage']?> width=80px>
                  <?php }else {?>
                  <center><span>--</span> </center>
                  <?php }?> 
                </td>
								<td><?= $data['TimeIn'] ?></td>
								<td><?= $data['TimeInLocation'] ?></td>
								<td><?= $data['TimeInCity'] ?></td>
								<td><?= $data['TimeInAppVersion'] ?></td>
                <td>
                  <?php if($data['TimeOutImage']!=''){?>
                  <img src=<?= $data['TimeOutImage']?> width=80px>
                  <?php }else {?>
                  <center><span>--</span> </center>
                  <?php }?> 
                </td>
								<td><?= $data['TimeOut'] ?></td>
								<td><?= $data['TimeOutLocation'] ?></td>
								<td><?= $data['TimeOutCity'] ?></td>
								<td><?= $data['TimeOutAppVersion'] ?></td>
								<td><?= $data['Device'] ?></td>
								<td><?= $data['Platform'] ?></td>
								<td><?= $data['LoggedHours'] ?></td>
								</tr>
													
							<?php } ?>
							</tbody>
									
									  <tfoot>
										<tr>
										<td colspan="1"></td>

                    <td style="font-weight:bold;width:20%;padding: 22px 0px 0px 1px;" rowspan="1" colspan="1"><?= $adata['AttendanceDate1'] ?>:</td>

										<td style="font-weight:bold;width:54%;padding: 22px 0px 2px 0px;" rowspan="1" colspan="1">Logged Hours: <?= $adata['totalloghrs'] ?>&nbsp;&nbsp;&nbsp;|</td>
										<!-- <td colspan="6"></td> -->
										
										<td style="font-weight:bold;width:31%;padding: 22px 2px 0px 0px;" rowspan="1" colspan="2">&nbsp;
											<?php 
											$time="";
											if(substr($adata['UnderOver'],0,1) == "-")
										    {
										    	$time=substr($adata['UnderOver'],1,5);
										    	echo "Undertime Hours: " .$time; 
										    }
										    else
										    {
                          $time=substr($adata['UnderOver'],0,5);
										    	echo "Overtime Hours: " .$time;
										    }
										    ?>&nbsp;&nbsp;&nbsp;|
                                        </td>

                                        <td style="font-weight:bold;width:0%;padding: 22px 190px 5px 2px;" rowspan="1" colspan="10">Minimum Work Hours / Day: <?= $adata['HoursPerDay'] ?></td>

										<!-- <td colspan="6" style="font-weight:bold">OverTime: <?= $adata['Undertime'] ?></td> -->
										
										
										
										
										</tr>									
									</tfoot> 							
                  </table>
						  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 t2" id="sidebar" style=" margin-top:50px;"></div>
        <footer class="footer">
          <div class="" style="position:relative; margin-bottom:0px;" >
            <nav class="pull-left">
            </nav>
           <!-- <p class="copyright pull-right" style="padding-right:35px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a>
            </p>-->
			<a href="http://www.ubitechsolutions.com/" target="_blank" >
					<p class="copyright pull-right" style="padding-right:25px;" >
					Copyright &copy;<script>document.write(new Date().getFullYear())</script>
					Ubitech Solutions. All rights reserved.
					</p>
				</a>
          </div>
        </footer>
      </div>
    </div>
    
   
  </body>
  <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
  <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
  var datestring="&date=";
  var date = new Date();
  date.setMinutes(0);
  date.setSeconds(0);
  date.setMilliseconds(0);
  var isoDateString = date.toISOString().substring(0,10);
    var table= $('#example').DataTable( {
		
    order: [[ 3, 'desc' ]],
	//aaSorting: [],
    //"scrollX": true,
    dom: 'Bfrtip',
    //"bDestroy": true, // destroy data table before reinitializing
    buttons: [
			'pageLength','csv','copy',
      {
            extend: 'print',
            // autoPrint: false,
            title: '',
            exportOptions: {
                columns: ':visible',
                columns: [ 0, 1, 2, 3,4,5,6],
                stripHtml: false,
            },
            repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
                logoStyle: 'height:100px;width:130px;',
                title: 'Payroll report of '+org+' Dated '+isoDateString+'',
                
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
			
			  { extend: 'excelHtml5', footer: true },
        {
        "extend":'colvis',
        "columns":':not(:first-child)',
      },
			],
			footer: true,
			columnDefs: [
			{
				// targets: -1,
				className: 'dt-body-center',
			}
		  ],
	//"contentType": "application/json",
	//"ajax": "<?php echo URL;?>admin/gethourlypayview?datestatus="+7,
		"columnDefs": [
    { "visible": false, "targets": [0,6,11,13]}
    
    ],
	
     "columns": [
  	 { "data": "AttendanceDate" },
  	 { "data": "ShiftId" },
  	 { "data": "TimeInImage" },
  	 { "data": "TimeIn" },
  	 { "data": "TimeInLocation" },
  	 { "data": "TimeInCity" },
     { "data": "TimeInAppVersion" },
     { "data": "TimeOutImage" },
  	 { "data": "TimeOut" },
  	 { "data": "TimeOutLocation" },
  	 { "data": "TimeOutCity" },
  	 { "data": "TimeOutAppVersion" },
     { "data": "Device" },
     { "data": "Platform" },
	   { "data": "LoggedHours" },
   
    ],
    "drawCallback": function ( settings ) {
    var api = this.api();
    var rows = api.rows( {page:'current'} ).nodes();
    var last=null;
    
    api.column(0, {page:'current'} ).data().each( function ( group, i ) {
    	if ( last !== group ) 
		{
    		$(rows).eq( i ).before(
    			'<tr class="group"><td bgcolor="#d59ff2" colspan=16><b>'+group+'</b><b> &nbsp; &nbsp;  </b></td></tr>'
    		);
    		last = group;
    	}
    });
	 
    }
    });
    
    
       ////---------date picker
      //var start = moment().subtract(29, 'days');
        var minDate = moment();
		//var start = moment().subtract(29, 'days');
		var start = moment().subtract(7,'days');
		var end = moment().subtract(0,'days');
    function cb(start, end) {
    $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
    maxDate:minDate,
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
    
    });
  </script>
  <script>
    $(document).ready(function(){
    $('.toggle-sidebar').click(function(){
    $("#sidebar").toggleClass("collapsed t2");
    $("#content").toggleClass("col-md-9");
    $("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'attendanceH'});	
    });
    
    });
  </script>
</html>