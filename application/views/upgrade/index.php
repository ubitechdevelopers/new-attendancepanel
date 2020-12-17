
<?php
// session_start();
// session_destroy() ;
$crn = isset($_REQUEST['id'])?$_REQUEST['id']:'';

$orgid1=$_SESSION['orgid'];
$adminmail= getAdminEmail($orgid1);
// var_dump($crn);
// var_dump($sessionmail);
// var_dump($orgid1);
// var_dump($crn);
?>



<!Doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">
	<title>ubiAttendance-Pay Now</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="<?=URL1;?>assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?=URL1;?>assets/img/favicon.png" />
	
	<!--     Fonts and icons     -->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= URL1; ?>assets/fonts/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
    
	<!-- CSS Files -->
	<link href="<?=URL1;?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=URL1;?>assets/css/material-dashboard.css" rel="stylesheet" />
	<link href="<?=URL1;?>assets/css/payment.css" rel="stylesheet" />
    <link href="<?=URL1;?>assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
	 
	<link href="<?=URL1;?>assets/css/demo.css" rel="stylesheet" />	   
	<link href="<?=URL1;?>assets/css/css.css" rel="stylesheet" />
	<link href="<?=URL1;?>assets/css/slider.css" rel="stylesheet" /> 
    <link href="<?=URL1;?>assets/css/jquery-ui.css" rel="stylesheet" />
	<link href="<?=URL1;?>assets/css/jquery.dataTables.min.css" rel="stylesheet" /> 
	   
	   
	<link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/bootstrap-select/css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/jquery.multiselect.css" />
	<link rel="stylesheet" href="<?= URL1; ?>assets/scss/style.css">
	<link href="<?= URL1 ?>assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
    <link href="<?= URL1 ?>assets/css/multi-select.css" rel="stylesheet" type="text/css" />
	<style>
	a:hover{
		text-decoration: underline;
	}

	.container{

		width:1134px;

	}
	
	.nav-pills > li.active > a, .nav-pills > li.active{
		box-shadow: inherit !important;
		   
	}
	.nav-pills > li > a {line-height: 24px;}
	</style>	
</head>

<body ng-app="payapp" ng-controller="payCtrl" style="background-image: linear-gradient(to left, rgb(7 144 118), rgb(218 212 40))" >
 
<div style="width:100vw;height:100vh">
 
 <div class="container-fluid">
    <div class ="row"style="position:fixed;width:100vw;">
		<div class = "col-lg-3"><img  class="logo" style="width:100px;position:fixed;text-align:center" src="<?=URL?>../assets/image/logo.png" alt=""></div>
		<div class = "col-lg-6">
			
		</div>
		<div class = "col-lg-3" style="text-align: -webkit-center;padding-left: 80px; color:#e8aa0a;"> 
		<button class="btn" type="button" style="background-color:#ff9640"><a href="<?=URL?>Dashboard">Go To Dashboard</a></button>
        <!--<a href="<?=URL;?>"><i class="fa fa-sign-out"  title="Logout" style="font-size:20px;color:#ff9800;padding-left:5px;"></i></a>-->	
		</div>
	</div>
	 
	<div class="row">
		 <div class="col-lg-2"></div>
			<div  class="col-lg-8">
			 <div class="wizard-container">
				<div class="card wizard-card" data-color="green" id="wizardProfile">
		                    <form action="" method="post" name="myForm" id="myForm">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	    Upgrade ubiAttendance
		                        	</h3>
									
		                    	</div>
								<div class="wizard-navigation">
									<ul id="TabList" >
			                            <li><a href="#about"  data-toggle="tab" >Existing Plan</a></li>
			                            <li><a href="#two" data-toggle="tab">Upgrade Plan</a></li>
			                            <li><a href="#Addons" ng-click="calculate()" data-toggle="tab">Select Add-ons</a></li>
			                            <li ng-click="calculate()" ><a href="#account" data-toggle="tab">Order Summary</a></li>
			                            <li><a href="#address" data-toggle="tab">billing Details</a></li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row" style="margin-bottom: 0px;">
		                                	<div class="col-sm-6 col-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
													</span>
													<!-- <div class="form-group"> -->
			                                          <!-- <label id="crnlable" class="control-label">Registered Email Id <!--- <small>(required)</small></label> --->
			                                          <!-- <input name="crn" type="email" class="form-control" id="crn" value="<?php echo $adminmail;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Registered Email ID" style="margin-top: -5px;" readonly>
			                                        </div> -->
												</div>
		                                	</div>
											<!-- <div class="col-sm-6" >
												<div class="pull-left">
												  <input type='button' class='btn btn-warning' id="serch" value='Go' style="margin: 20px 1px;" />
												</div>	
											</div> -->
		                             </div>
								<!--    <div class="row">
										<div id="registerlink" class="col-sm-6">
											<div class="input-group">
												<span class="input-group-addon">
												</span>
												<div class="form-group label-floating" style="margin-top:0px;">
													<label class="text-right" style="color:#1abc9c">Not Registered?    
														<a style="color:#0095d0;" href="https://www.ubihrm.com/attendance-app/sign-up">Register Now</a>
													</label>
												</div>
											</div>
										</div>
								   </div> -->
								 <div id="orgdetail" style="padding: 6px 15px 0px;" hidden >
								   <div class="row">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">Plan Name</label>
									   <label class="col-sm-6 col-xs-6 text-left" id="planname" >.....</label>
									 </div>
								   </div> 
								   <div class="row">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">Organization</label>
									   <label class="col-sm-6 col-xs-6 text-left" id="orgname" >.....</label>
									 </div>
								   </div>
								    
								   	<div class="row" style="display:none;" >
								     <div class="col-sm-12" >
									 
									 <label class="col-sm-6 col-xs-6 text-left" id="bulk111" >.....</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="visit111" >.....</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="geo111" >.....</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="hourly111" >.....</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="timeoffs111" >.....</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="face111" >.....</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="device111" >.....</label>
									 </div>
									</div>

								    <div class="row">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">Start Date</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="startdate" >.....</label>
									 </div>
								   </div>
								    
								    <div class="row">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">End Date</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="enddate" > .....</label>
									 </div>
								   </div>
								   
								    <div class="row">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">Registered Users</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="noemp" > .....</label>
									 </div>
								   </div>
								   <div class="row" style="display:none;">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">User Limit</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="planuserlimit" > .....</label>
									 </div>
								   </div>
								   
								   
								   <!--  -<div class="row">
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">Users Limit : </label>
									 <label class="col-sm-6 col-xs-6 text-left" id="userlimit" > .....</label>
									 </div>
								   </div>- -->
								   
								   <div class="row" hidden >
								     <div class="col-sm-12" >
									 <label class="col-sm-3 col-xs-6">Organization Id</label>
									 <label class="col-sm-6 col-xs-6 text-left" id="OrganizationId" > .....</label>
									 </div>
								   </div>
								   
								 </div>
								   
		                          </div>
								  
								  
								  
									<div class="tab-pane" id="two">
									<div class="row" >
									  
									</div>
		                              <div class="row">
									   <div class="col-sm-6 col-sm-offset-1" >
		                                    <!-- <label><b>Current Plan : Free Trial</b></label> -->
												<div class="form-group label-floating">
		                                            <label class="control-label">Currency <!--- <small> (required)</small>---></label>
	                                            	<select name="currency" id="currency" class="form-control" ng-model="currency" ng-click="fetchdiscount()" >
	                                                	<option value="USD" ng-show="currency=='USD'" selected> USD </option>
	                                                	<option value="INR" ng-show="currency=='INR'" selected> INR</option>
	                                            	</select>
		                                        </div>
		                                  <div class="form-group label-floating" > 

		                                    <label class="control-label"> Upgrade</label>
											
		                                        <label class="radio-inline1">
										  <input type="radio" id="durationupg" ng-model="userlmt1" value="duration" name="optradio1" ng-click="show()" style="height:18px; width:18px;margin-right:2px;" checked >Duration</label>
										   <label class="radio-inline1"><input type="radio" id="userlimitupg" ng-model="userlmt1"ng-click="hide()"  value="userlimit"  style="height:18px;width:18px;margin-right:2px;" name="optradio1" >Users </label>
										   <label class="radio-inline1"><input type="radio" id="Bothupg" ng-model="userlmt1" value="bothud" ng-click="showhide()" style="height:18px; width:18px;margin-right:2px;" name="optradio1" >Both Duration & Users </label>
													
		                                     
		                                   </div>
		                                        
										<div class="form-group label-floating" id="duration1" >
											<label class="control-label"> Duration</label>
										  <label class="radio-inline1">
										  <input type="radio" id="yearly" value="Year" ng-model="month"  name="optradio" style="height:18px; width:18px;margin-right:2px;" ng-click="fetchdiscount()" >Yearly</label>
										   <label class="radio-inline1"><input type="radio" id="monthly" ng-model="month"  value="Month" style="height:18px; width:18px;margin-right:2px;" name="optradio" ng-click="fetchdiscount()" >Monthly </label>
										 </div>
										 
										 <div class="form-group" id="duration2">

		                                            <label id="mytext" class="control-label">How many {{month}}s<!--- <small> (required)</small>---> </label>
		                                           
		                                            <input type="number" ng-show="month== 'Month'"  name="monthyear" ng-model="monthyear" max=360  class="form-control" id="duration" ng-change="getamounts();">
		                                        

		                                        
		                                            <input type="number" ng-show="month== 'Year'" name="monthyear" ng-model="monthyear"  class="form-control" id="duration" max=30 ng-change="getamounts();">
		                                        
										 </div>
		                                       
												<div class="form-group" style="margin: 0px 0 0 0;" id="slider1">
													<label class="control-label">Choose the no. of users to be added</label>
													<div class="range-slider">
													  <input class="range-slider__range" type="range" value="0" ng-model="nouser" min="0" max="200"  step="1" ng-change="getamounts();" required/>
													  <span class="range-slider__value">0</span>
													</div>
												</div>
													
												<input type="text" name="addition" ng-model="addition" style="visibility:hidden;"  id="addition" required>

												<input type="text" name="addition2" ng-model="addition2" ng-show="userlmt1 == 'userlimit1'" style="visibility:hidden;"  id="addition2" required>

												<input type="text" name="addition3" ng-model="addition3" ng-show="userlmt1 == 'userlimit1'" style="visibility:hidden;"  id="addition3" required>
											

												


												 
												<div ng-show="discount" >
													<small style="color:green" >Buy <b>{{month}}ly </b>ubiAttendance plan and get <b>{{discount}}</b> % Instant discount on billing amount. </small>   
		                                        </div>
		                                    </div>
											
											<div class="col-sm-4 col-sm-offset-1" style="margin-top: 15px;background-color:#1abc9c;color:white; padding: 8px 8px 8px 8px;text-align: center;margin-left: 35px">
											
												<div style="background-color:#1abc9c;color:white; padding: 3px 3px 3px 3px;text-align: center;">
													<!-- {{month+"ly"}} -->
													<b>Upgrade Details</b>
												</div>
												
												<div style="padding: 3px 3px 3px 3px;text-align: center;"> 
													<p> Duration: {{monthyear+"  "+month}}(s) </p>
													<!-- {{useramount+" "+currency+" / User"}} -->
												</div>
												
												<div style="padding: 3px 3px 3px 3px;text-align: center;"> 
													<p>Additional Users: {{nouser}} User(s)	 </p>
												</div>

												<!-- <div style="padding: 3px 3px 3px 3px;text-align: center;"ng-show="nouser!= 0"> 
													<p>Remaining Days: {{dayDifference}} day(s)	 </p>
												</div> -->
												
												<div style="padding: 3px 3px 3px 3px;text-align: center;" ng-show="monthyear == 0 && month== 'Month'"> 
													<p>Price: {{currency}} {{useramountmonth}} / User / Day
												</div>

												<div style="padding: 3px 3px 3px 3px;text-align: center;"ng-show="monthyear == 0 && month=='Year'"> 
													<p>Price: {{currency}} {{useramountyear}} / User / Day
												</div>
												<div style="padding: 3px 3px 3px 3px;text-align: center;"ng-show="monthyear != 0"> 
													<p>Price: {{currency+" "+useramount+" / User / "+month}}
												</div>
<!-- 
												<div style="padding: 8px 8px 8px 8px;text-align: center;"> 
													Total: {{amountper+" "+currency+" "monthyear+" / "+month}
												</div> -->


												<div style="padding: 3px 3px 3px 3px;text-align: center;" ng-show="monthyear!= 0"> 
													Order Value: {{currency}} {{(monthyear*amountper1).toFixed(2) }}
												</div>
												<div style="padding: 3px 3px 3px 3px;text-align: center;" ng-show="monthyear == 0"> 
													Order Value: {{currency}} {{amountper1}}
												</div>
												
											</div>
<div class="col-sm-4 col-sm-offset-1" style="margin-top: 15px;background-color:#1abc9c;color:white; padding: 8px 8px 8px 8px;text-align: center;margin-left: 35px">
										  <div style="background-color:#1abc9c;color:white; padding: 8px 8px 8px 8px;text-align: center;border-radius:4px;">
										  	</p><b>Existing Plan </b></p>
										  	 <p >Start Date: 
												<span id="startdate1"> </span></p>	
												 <p > End Date:  
												<span id="enddate1"></span></p>
												<!-- <p>Add-ons Total: <span>{{currency}} {{price_withaddon}}</span></p>-->
												 <p>Users: 
												<span id="noemp1"> </span></p>	
												<!-- <div style="padding: 3px 3px 3px 3px;text-align: center;">  -->
													<p ng-show="nouser!= 0">Remaining Days: {{dayDifference1}} Day(s)	 </p>
												<!-- </div> -->
													
										  </div>
										  
										</div>
		                             </div>

		                            </div>
									
									<div class = "tab-pane" id="Addons">
									  <div class="row">
									  <div class="col-sm-8">
									   <center>
					
										<table class="table table-responsive" style="width:100%" id="ordertable">
										<!---<h5 align="center"><strong>Addons</strong></h5>--->
										
										<tr>
										<th width="50%" align="left">Add-ons  </th>
										<!-- <th width="50%" align="right">Users  </th> -->
										<th width="25%" style="text-align: right;">Amount<br/><span style="font-weight:none; font-size:11px;">({{currency}}/ {{month}}) </span></th>
										<th width="20%" style="text-align: right;">Select</th>
										</tr>
									  

										
										<tr style="font-size:14px;">
										<td width="50%" align="left" id="bulkatt_perprice"style="font-size:14px;">Bulk Attendance {{(bulk_attprice1)}}
											<!-- <span ng-bind="bulk_attprice1" ></span> -->
											</td>
										
										<td width="25%" align="right"><span  id="bulk_attprice">{{bulk_attprice.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="bulk_attcheck" ng-model="bulk_attcheck" ng-click="add_addons()" id="bulk_attcheck" ng-disabled="bulk111=='1'" /></td>
										</tr>
<!-- 
										<tr style="font-size:14px;" ng-show="monthyear == ''&& bulk111 != 0">
										<td width="50%" align="left" id="bulkatt_perprice"style="font-size:14px;">Bulk Attendance  @ {{currency}} {{tabledata[7]['bulk_attendance']}} -->
											<!-- <span ng-bind="bulk_attprice1" ></span> -->
											<!-- </td>
										<td width="25%" align="right"><span ng-bind="bulk_attprice" id="bulk_attprice"></span></td>
										<td width="20%" align="right"><input type='checkbox' name="bulk_attcheck" ng-model="bulk_attcheck" ng-click="add_addons()" id="bulk_attcheck" /></td>
										</tr> -->
										
										<tr style="display:none">
										<td width="50%" align="left" id="loctrace_perprice"style="font-size:14px;">Location Tracing
											<!-- <span ng-bind="location_traceprice1" ></span> -->
											</td>
										<td width="25%" align="right"><span  id="location_traceprice">{{location_traceprice.toFixed(2)}}</span></td>
										
										<td width="20%" align="right"><input type='checkbox'  name="location_tracecheck" ng-model="location_tracecheck" ng-click="add_addons()" id="location_tracecheck"/></td>
										</tr>
										
										<!-- <tr style="font-size:14px;" ng-show="monthyear == ''&& visit111 != 0">
										<td width="50%" align="left"  id="visit_perprice"style="font-size:14px;">Visit Punch @ {{currency}} {{tabledata[7]['visit_punch']}} -->
											<!-- `<span ng-bind="visit_punchprice1" ></span> -->
										<!-- </td>
										<td width="25%" align="right"><span ng-bind="visit_punchprice"  id="visit_punchprice"></span></td>
										<td width="20%" align="right"><input type='checkbox' name="visit_punchcheck" ng-model="visit_punchcheck" ng-click="add_addons()" id="visit_punchcheck" /></td>
										</tr> -->

										<tr style="font-size:14px;" >
										<td width="50%" align="left"  id="visit_perprice"style="font-size:14px;">Visit Punch {{visit_punchprice1}}
											<!-- `<span ng-bind="visit_punchprice1" ></span> -->
										
										</td>
									
										<td width="25%" align="right"><span   id="visit_punchprice">{{visit_punchprice.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="visit_punchcheck" ng-model="visit_punchcheck" ng-click="add_addons()" ng-disabled="visit111=='1'" id="visit_punchcheck" /></td>
										</tr>
									   
										<!-- <tr style="font-size:14px;" ng-show="monthyear == ''&& geo111 != 0">
										<td width="50%" align="left" id="gfence_perprice"style="font-size:14px;">Geo Fence @ {{currency}} {{tabledata[7]['geo_fence']}} -->
											<!-- <span ng-bind="geo_fenceprice1" ></span> -->
										
										<!-- </td>
										<td width="25%" align="right"><span ng-bind="geo_fenceprice" id="geo_fenceprice"></span></td>
										<td width="20%" align="right"><input type='checkbox' name="geo_fencecheck" ng-model="geo_fencecheck" ng-click="add_addons()" id="geo_fencecheck" /></td>
										</tr> -->

										<tr style="font-size:14px;" >
										<td width="50%" align="left" id="gfence_perprice"style="font-size:14px;">Geo Fence {{geo_fenceprice1}}
											<!-- <span ng-bind="geo_fenceprice1" ></span> -->
										</td>
										
										<td width="25%" align="right"><span  id="geo_fenceprice">{{geo_fenceprice.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="geo_fencecheck" ng-model="geo_fencecheck" ng-click="add_addons()" id="geo_fencecheck" ng-disabled="geo111=='1'" /></td>
										</tr>
										
										<!-- <tr style="font-size:14px;" ng-show="monthyear == ''&& hourly111 != 0">
										<td width="50%" align="left" id="payroll_perprice"style="font-size:14px;">Hourly Pay @ {{currency}} {{tabledata[7]['payroll']}} -->
											<!-- <span ng-bind="payroll_price1" ></span> -->
						
										<!-- </td>
										<td width="25%" align="right"><span ng-bind="payroll_price" id="payroll_price"></span></td>
										<td width="20%" align="right"><input type='checkbox' name="payroll_check" ng-model="payroll_check" ng-click="add_addons()" id="payroll_check" /></td>
										</tr>
 -->
										<tr style="font-size:14px;" >
										<td width="50%" align="left" id="payroll_perprice"style="font-size:14px;">Hourly Pay {{payroll_price1}}
											<!-- <span ng-bind="payroll_price1" ></span> -->
										</td>
									
										<td width="25%" align="right"><span  id="payroll_price">{{payroll_price.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="payroll_check" ng-model="payroll_check" ng-click="add_addons()" id="payroll_check" ng-disabled="hourly111=='1'" /></td>
										</tr>
										
										<!-- <tr style="font-size:14px;" ng-show="monthyear == '' && timeoffs111 != 0">
										<td width="50%" align="left" id="timeoff_perprice">Time Off Pay @ {{currency}} {{tabledata[7]['time_off']}} -->
											<!-- <span ng-bind="timeoff_price1" ></span> -->
										<!-- </td>
										<td width="25%" align="right"><span ng-bind="timeoff_price" id="timeoff_price"></span></td>
										<td width="20%" align="right"><input type='checkbox' name="timeoff_check" ng-model="timeoff_check" ng-click="add_addons()" id="timeoff_check"  /></td>
										</tr> -->

										<tr style="font-size:14px;" >
										<td width="50%" align="left" id="timeoff_perprice">Time Off  {{timeoff_price1}} 
											<!-- <span ng-bind="timeoff_price1" ></span> -->
										</td>
										
										<td width="25%" align="right"><span  id="timeoff_price">{{timeoff_price.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="timeoff_check" ng-model="timeoff_check" ng-click="add_addons()" id="timeoff_check" ng-disabled="timeoffs111=='1'" /></td>
										</tr>

										<tr style="font-size:14px;" >
										<td width="50%" align="left" id="face_perprice">Face Recognization  {{face_price1}} 
											
										</td>
										
										<td width="25%" align="right"><span  id="face_price">{{face_price.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="face_check" ng-model="face_check" ng-click="add_addons()" id="face_check" ng-disabled="face111=='1'" /></td>
										</tr>

										<tr style="font-size:14px;" >
										<td width="50%" align="left" id="device_perprice">Device Verification  {{device_price1}} 
											<!-- <span ng-bind="timeoff_price1" ></span> -->
										</td>
										
										<td width="25%" align="right"><span  id="device_price">{{device_price.toFixed(2)}}</span></td>
										<td width="20%" align="right"><input type='checkbox' name="device_check" ng-model="device_check" ng-click="add_addons()" id="device_check" ng-disabled="device111=='1'" /></td>
										</tr>


										
										</tbody>
										</table>
										
										</center>
										</div>
										<div class="col-sm-4" >
										  <div style="background-color:#1abc9c;color:white; padding: 8px 8px 8px 8px;text-align: center;border-radius:4px;">
										  	</p><b>Upgrade Details</b></p>


												
												
												
												
											
<!-- 
												<div style="padding: 8px 8px 8px 8px;text-align: center;"> 
													Total: {{amountper+" "+currency+" "monthyear+" / "+month}
												</div> -->


												<div style="padding: 3px 3px 3px 3px;text-align: center;"> 
													
												</div>



												<p> Duration: {{monthyear+"  "+month}}(s) </p>	
												<p>Additional Users: {{nouser}} User(s)	 </p>
												<p>Price: {{currency+" "+useramount+" / User / "+month}}</p>
												
												<p ng-show="monthyear != 0">Plan Amount: {{currency}} {{(monthyear*amountper1).toFixed(2) }}</p>

												<p ng-show="monthyear == 0">Plan Amount: {{currency}} {{amountper1 }}</p>
												 <p>Add-ons Value: <span>{{currency}} {{(price_withaddon).toFixed(2)}}</span></p>
												
												
												<p>Order Value: <span> {{currency}} {{amount}}</span></p>

													
										  </div>
										  
										</div>

										

										</div>
										
									</div>
									
									
		                            <div class="tab-pane" id="account">
		                                <h4 class="info-text"> <b>Order Summary</b> </h4>
		                                <div class="row" style="margin-top:-25px;">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                       <table class="table table-bordered" width="100"  >

		                                       	<!-- {{calculatedAmt}} -->
											<!-- <thead>
											 <tr class="success" >
											  <th>Particulars</th>
											  <th>Amount</th>
											  </tr>
											 </thead> -->
											 <tbody>
											 <!--  <tr class="active" >
											   <td><b>My Plan</b></td>
											   <td align="right" ><b>Premium</b></td>
											  </tr> -->
											  <tr class="active"  style="font-size:14px;">
											   <td>Users Added</td>
											   <td align="right" >{{nouser}}</td>
											  </tr>
											  <tr class="active" style="font-size:14px;" >
											   <td>Duration Extended</td>
											   <td align="right" >{{monthyear+" "+month}}(s)</td>
											  </tr>
											  
											  <!-- <tr class="active"  style="font-size:14px;">
											   <td>Start Date</td>
											   <td align="right" >{{today | date : 'dd-MMM-yyyy'}}

											   </td>

											  </tr>  -->
											  <tr class="active"  style="font-size:14px;">
											   <td>Plan End Date</td>
											   <td align="right" ng-show="monthyear != 0">{{enddate}}</td>
											   <td align="right" ng-show="monthyear == 0">{{enddateupg}}</td>
											  </tr>
											  
											  <tr class="active" style="font-size:14px;">
											   <td>Plan Amount</td>
											   <td align="right" >{{amount1}}</td>
											  </tr>
											  <tr class="active" ng-show="bulk_attcheck || bulk111 == 1" style="font-size:14px;" >
											   <td>Group Attendance</td>
											   <td align="right" >{{(bulk_attprice).toFixed(2)}}</td>
											  </tr>
											  <tr class="active" ng-show="location_tracecheck" style="font-size:14px;">
											   <td>Location Tracing</td>
											   <td align="right" >{{(location_traceprice).toFixed(2)}}</td>
											  </tr>
											  
											  <tr class="active" ng-show="geo_fencecheck || geo111 == 1" style="font-size:14px;">
											   <td>Geo Fence</td>
											   <td align="right" >{{(geo_fenceprice).toFixed(2)}}</td>
											  </tr>
											  <tr class="active" ng-show="payroll_check || hourly111 == 1" style="font-size:14px;" >
											   <td>Basic Hourly Pay </td>
											   <td align="right" >{{(payroll_price).toFixed(2)}}</td>
											  </tr>
											  
											  <tr class="active" ng-show="timeoff_check || timeoffs111 == 1" style="font-size:14px;">
											   <td>Time Off</td>
											   <td align="right" >{{(timeoff_price).toFixed(2)}}</td>

											  </tr>
											  
											    <tr class="active" ng-show="face_check || face111 == 1" style="font-size:14px;">
											   <td>Face Recognization</td>
											   <td align="right" >{{(face_price).toFixed(2)}}</td>
											  </tr>

											  <tr class="active" ng-show="device_check || device111 == 1" style="font-size:14px;">
											   <td>Device Verificatioin</td>
											   <td align="right" >{{(device_price).toFixed(2)}}</td>
											  </tr>
											  
											  <tr class="active" ng-show="visit_punchcheck || visit111 == 1" style="font-size:14px;">
											   <td>Visit Punch</td>
											   <td align="right" >{{(visit_punchprice).toFixed(2)}}</td>
											  </tr>
											  
											  
											  <tr class="active" style="font-size:14px;">
											   <td>SubTotal</td>
											   <td align="right" id="razoramt">{{amount}}</td>
											  </tr>
											  
											  <!-- <tr class="active" style="font-size:14px;">
											   <td>Referral Discount</td>
											   <td align="right" >{{(referralDiscount).toFixed(2)}}</td>
											  </tr> -->
											  
											  <tr class="active" ng-show="discount" style="font-size:14px;">
											   <td>Discount</td>
											   <td align="right" >{{(amount*discount)/100}}</td>
											  </tr>
											  <tr class="active" ng-show="tax" style="font-size:14px;" >
											    <td>Taxes</td>
												<td align="right" >{{(((calculatedTax=amount-referralDiscount)-((amount-referralDiscount)*discount)/100)/1.18*18/100).toFixed(2)}}</td>
											  </tr>
											  <tr id="trdueamount"  >
											 <td>Due Amount</td>
											  
											   <td  align="right"><span class=""></span><span id="dueamount">{{dueamount.toFixed(2)}}</span></td>
											</tr>
											  <tr class="success"   style="font-size:14px;">
												  <th >Total{{" ("+currency+")"}}</th>
												  <th style="text-align:right" >{{calculatedAmt=(((amount-referralDiscount)-((amount-referralDiscount)*discount)/100+((amount-referralDiscount)-((amount-referralDiscount)*discount)/100)*tax/100+(dueamount)).toFixed(2))}}
												  </th>
												  <!-- {{calculatedAmt}} -->
											  </tr>
											  
											   <tr id="tradditionaluse" style="opacity: 0.5;"  >
											    <td >Additional Registered User</td>
											    <td  align="right"><span class=""></span><span id="additionaluse">{{additionaluser}}</span></td>
											</tr>
					
											<!-- <tr id="trdueamount" style="opacity: 0.5;"  >
											 <td>Due Amount</td>
											  
											   <td  align="right"><span class=""></span><span id="dueamount">{{dueamount.toFixed(2)}}</span></td>
											</tr>  -->
										
											 </tbody>
											</table>
											<p> * Taxes mentioned may vary. The final tax amount will be reflected in your invoice.</p>
		                                    </div>
		                                </div>
		                            </div>
		                           
								   <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12" style="margin-bottom:0px;" >
		                                        <!-- <h4 class="info-text"> Billing Details </h4> -->
		                                    </div>
										<div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label class="control-label">Company Name</label>
		                                            <input type="text" class="form-control" 
													 name='companyname'
													 ng-model="companyname" ng-disabled="true">
		                                        </div>
		                                  </div>
											 <div class="col-sm-5 ">
		                                        <div class="form-group">
		                                            <label class="control-label">Phone no</label>
		                                            <input type="number" class="form-control" name='phoneno' id='phoneno' ng-model="phoneno" ng-disabled="true" >
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
	                                        	<div class="form-group label-floating con">
	                                        		<label class="control-label">Country</label>
	                                    			<select name="country" ng-model="country" id="country" class="form-control" ng-options="a.id as a.name for a in countryarr" ng-change ="refreshdata()" >
														<option disabled=""	selected=""></option>
	                                            	</select>
	                                        	</div>
		                                    </div>
											<div class="col-sm-5" ng-show="country== 93" >
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">State</label>
	                                            	<select name="state" id="state" ng-model="state" class="form-control" ng-options="a.code as a.name for a in statearr"  ng-required="country==93" >
														<option disabled="" selected=""></option>
	                                                	
	                                            	</select>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1" ng-show="country== 93">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">City</label>
		                                            <input type="text" class="form-control" name="city" ng-model="city" ng-required="country==93" >
		                                        </div>
		                                    </div>
		                                    
											 <div class="col-sm-5"  >
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Pin Code / Zip Code</label>
		                                            <input type="text" class="form-control" ng-model="zipcode"name="zipcode" >
		                                        </div>
		                                    </div>
<div class="col-sm-6" ng-show="country == 93" >
	<div class="col-sm-1" style="padding-top:28px;padding-left: 42px;" >
		<label class="radio-inline"><input type="radio" value="m" style="height:18px; width:18px;" name="gst" ng-model="gst" checked  />
		</label>
	</div>
	<div class="col-sm-5">
	   <div class="form-group label-floating">
	   <label class="control-label">GST No.</label>
		 <input type="text" class="form-control" ng-model='gstno' name="gstno" ng-required="country==93 && gst=='m'" size="40"/>
		</div>
	 </div>
	<div class="col-sm-5 " style="padding-top:37px;" >
	   <label class="radio-inline"><input type="radio" value="y" name="gst" ng-model="gst" style="height:18px; width:18px;" ><small>&nbsp;&nbsp;&nbsp;Not Applicable</small>
	   </label>
	</div>

	
  </div>
	<!--<div class="col-sm-5" style="padding-left: 77px">
		<div class="form-group label-floating">
			<label class="control-label">Promo Code</label>
			<input type="text" class="form-control" ng-model="promocode" name="promocode" size="40">
		</div>
	</div>-->								  
									  
		                           </div>
		                         </div>
		                       
							   </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' id="next" class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' ng-click="calculate()" />
										
		                               <!-- <input type='button' ng-if="currency=='USD'" class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' ng-click="payment()" />-->
		                                <input type='button' ng-if="currency=='USD'" class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Proceed' id="razorpay" ng-click="razorpay()"/>
										<div id="nextbtn"></div> 
		                                <input type='button' ng-if="currency=='INR'" class='btn btn-finish btn-fill btn-warning btn-wd ' name='payumoney' value='Finish' ng-click="payumoneypay();" />
										
										<!--- onClick="paybypayu();" --->
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
				<div class="col-lg-2"></div>
	        </div><!-- end row -->
			 
	    </div> 
</div>

	   
	<?php
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	// $MERCHANT_KEY = "hDkYGPQe"; //Test Key
	$MERCHANT_KEY = "dv1tL3LP";				//LIVE KEY
	// $MERCHANT_KEY = "dv1tL3LP";				//LIVE KEY
	// $furl = "http://192.168.0.200/vijay/pay/payufailed.php";//Test Key
	// $furl = "http://192.168.0.200/ubiattendance/index.php/upgrade/payufailed";//Test Key zentyl
	$furl = "http://ubiattendance.ubihrm.com/index.php/upgrade/payufailed";
	// $furl = "https://buy.ubiattendance.com/payufailed.php";			//LIVE url
	// $surl = "http://192.168.0.200/vijay/pay/payusuccess.php";
	//$surl = "http://ubiattendance.zentylpro.com/index.php/upgrade/curl1";//test zentyl
	// $surl = "https://buy.ubiattendance.com/payusuccess.php";   //LIVE url
	$surl = "https://ubiattendance.ubihrm.com/index.php/upgrade/curl1";// live
	?>
	
	
 
	
	
<form action="" method="post" name="inrpay" id="inrpay">
	<div class="panel price panel-red">
			<input type="hidden" name="productinfo" value="ubiAttendance Payment">
			<!--<input type="hidden" name="amount" value ="{{amount-(amount*discount)/100+(amount-(amount*discount)/100)*tax/100}}">-->
			<input type="hidden" name="amount" value ="{{calculatedAmt}}">
			
			
			<input type="hidden" name="bulk_attprice2" value="{{bulk_attprice2}}">
			<input type="hidden" name="geo_fenceprice2" value="{{geo_fenceprice2}}">
			<input type="hidden" name="location_traceprice2" value="{{location_traceprice2}}">
			<input type="hidden" name="payroll_price2" value="{{payroll_price2}}">
			<input type="hidden" name="visit_punchprice2" value="{{visit_punchprice2}}">
			<input type="hidden" name="timeoff_price2" value="{{timeoff_price2}}">
			<input type="hidden" name="face_price2" value="{{face_price2}}">
			<input type="hidden" name="device_price2" value="{{device_price2}}">
			
			<input type="hidden" name="country" value="{{country}}">
			<input type="hidden" name="state" value="{{state}}">
			<input type="hidden" name="city" value="{{city}}">  
			<input type="hidden" name="zipcode" value="{{zipcode}}">  
			<input type="hidden" name="email" id="email" >
			<input type="hidden" name="phone" value="{{phoneno}}">
			<input type="hidden" name="firstname" value="{{companyname}}">
			
			<input type="hidden" name="discount" value="{{(amount*discount)/100}}">
			<!--<input type="hidden" name="promocode" value="{{promocode}}">-->
			
			<input type="hidden" name="currency" value="{{currency}}">
			<input type="hidden" name="plan" value="{{month}}ly">
			<input type="hidden" name="noofusers" value="{{nouser}}">
			<input type="hidden" name="taxforinr" value="{{(amount-(amount*discount)/100)*18/100}}">
			<input type="hidden" name="OrganizationId" value="{{orgid}}">  
			<input type="hidden" name="duration" value="{{monthyear}}">  
			<input type="hidden" name="gstin" value="{{gstno}}" >  
			<input type="hidden" name="action" value="{{userlmt1}}" >  

			<input type="hidden" name="bulk_attsts" value="{{bulk_attcheck}}" >  
			<input type="hidden" name="visit_punchsts" value="{{visit_punchcheck}}" >  
			<input type="hidden" name="geo_fencests" value="{{geo_fencecheck}}" >  
			<input type="hidden" name="timeoffsts" value="{{timeoff_check}}" >  
			<input type="hidden" name="facests" value="{{face_check}}" >  
			<input type="hidden" name="devicests" value="{{device_check}}" >  
			<input type="hidden" name="payrollsts" value="{{payroll_check}}" >  
			
			
			<input type="hidden" name="txnid" value="<?=$txnid;?>">  
			<input type="hidden" name="key" value="<?=$MERCHANT_KEY;?>">  
			<input type="hidden" name="surl" value="<?=$surl;?>">  
			<input type="hidden" name="furl" value="<?=$furl;?>">  
			<input type="hidden" name="service_provider" value="payu_paisa">  
			<input type='button' name='save' hidden />
	</div>
</form>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="<?= URL ?>../assets/vendor/jquery/jquery.min.js"></script>
 <script src="<?= URL ?>../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 <script src="<?= URL ?>../assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
 <script src="<?= URL ?>../assets/vendor/jquery-steps/jquery.steps.min.js"></script>
 
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

	<!--   Core JS Files   -->
    <script src="<?=URL;?>../assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	
	<script src="<?=URL;?>../assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	
	<script src="<?=URL;?>../assets/js/jquery.bootstrap.js" type="text/javascript"></script>
	
	<script src="<?=URL;?>../assets/js/angular.min.js" type="text/javascript"></script>
	<script src="<?=URL;?>../assets/js/upgradepaypal.js" type="text/javascript"></script>


	<!--  Plugin for the Wizard -->
	<script src="<?=URL;?>../assets/js/material-bootstrap-wizard.js"></script>
	

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="<?=URL;?>../assets/js/jquery.validate.min.js"></script>
	
	<script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
	
    <script src="<?= URL ?>../assets/js/demo.js"></script>
    <!--my js-->
    <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
	<script>
	
	   $(window).on('load', function() {

		  if($("#crn").val()=="")
		  {
		    $("#crnlable").css("color", "red");
			return false;
		  }
		  var crn = '<?php echo $adminmail;?>';
		  // alert(crn);
		  $.ajax({
		               url: 'upgrade/orgdetails',
						data: {"name":crn,"sts":1},
						method:'post',
						success: function(result){
						var result=JSON.parse(result);
						//alert("aaaa");
						if(result.status)
						{
							//alert(result.cleaned_up);
							 if(result.planStatus==0){ 
								 document.getElementById("inrpay").elements.namedItem("email").value = crn;
								 console.log(result);
								 orgIdForReferrals=result.OrganizationId;
								 $("#orgname").text(result.orgname);

								 $("#startdate").text(result.startdate1);
								
								 $("#enddate").text(result.enddate1);
								
								 $("#noemp").text(result.noemp);
								 $("#planuserlimit").text(result.userlimit);
								
								 // $("#userlimit").text(result.userlimit);
								 $("#OrganizationId").text(result.OrganizationId);
								 $("#companyname").text(result.orgname);
								 $("#phoneno").val(result.PhoneNumber);
								 $("#bulk111").val(result.bulkatt);
								 $("#visit111").val(result.visit);
								 $("#geo111").val(result.geo);
								 $("#hourly111").val(result.hourly);
								 $("#timeoffs111").val(result.timeoff);
								 $("#face111").val(result.face1);
								 $("#device111").val(result.device);
								 //$("#country").val(result.Country);
								 $("#orgdetail").show();
								 $("#serch").hide();
								 $("#registerlink").hide();
								 
								 if(result.Country=='93')
								 {
									  $("#currency").val("INR");
								 }
								 else
								 {
									 $("#currency").val("USD");
								 }
								 
								 if(result.planStatus==0)
								 {
									  $("#planname").text("Free Trial");
								 }
								
								 else{
									 $("#planname").text("Premium");
								 }
							 }
							
							 else{
							 // var id = result.username;
							 	
								//  window.location.href = "http://ubiattendance.ubihrm.com/index.php?username="+id;

								document.getElementById("inrpay").elements.namedItem("email").value = crn;
								 console.log(result);
								 orgIdForReferrals=result.OrganizationId;
								 $("#orgname").text(result.orgname);
								 // $("#planname").text("Premium");
								 $("#startdate").text(result.startdate1);
								 $("#startdate1").text(result.startdate1);
								 $("#enddate").text(result.enddate1);
								 $("#enddate1").text(result.enddate1);
								 $("#noemp").text(result.noemp);
								 $("#planuserlimit").text(result.userlimit);
								 $("#noemp1").text(result.noemp);
								 // $("#userlimit").text(result.userlimit);
								 $("#OrganizationId").text(result.OrganizationId);
								 $("#companyname").text(result.orgname);
								 $("#phoneno").text(result.PhoneNumber);
								  $("#bulk111").text(result.bulkatt);
								 $("#visit111").text(result.visitpunch);
								 $("#geo111").text(result.geofence);
								 $("#hourly111").text(result.hourlypay);
								 $("#timeoffs111").text(result.timeoff);
								 $("#face111").val(result.face1);
								 $("#device111").val(result.device);
								 //$("#country").val(result.Country);
								 $("#orgdetail").show();
								 $("#serch").hide();
								 $("#registerlink").hide();

								 if(result.Country=='93')
								 {
									  $("#currency").val("INR");
								 }
								 else
								 {
									 $("#currency").val("USD");
								 }
								 
								 if(result.planStatus==0)
								 {
									  $("#planname").text("Free Trial");
								 }
								 
								 else{
									 $("#planname").text("Premium");
								 }
							} 
						}
						
                        else
                        {
						  $("#orgname").text("");
						  $("#startdate").text("");
						  $("#enddate").text("");
						  $("#noemp").text("");
						  $("#planuserlimit").text("");
						  $("#OrganizationId").text("");
						  $("#companyname").text("");
						  $("#phoneno").text("");
						  $("#orgdetail").hide();
						  $("#registerlink").show();
						  alert("Data not found");

						}	 
					},
						error: function(result)
						{
							alert("Error"+result);
							console.log(result);
						 }
				   });
	   });
	   /*$("input[type='radio']").click(function(){
	      var val = $(this).val();
		   if(val=='Monthly')
		   {
		     $("#monthlytable").show();
		     $("#yearlytable").hide();
			 $("#mytext").text("How many months");
		   }
		   else
		   {
		      $("#monthlytable").hide();
		      $("#yearlytable").show();
			  $("#mytext").text("How many years");
		   }
	   });*/
	   // payment function
	   
	</script>
<script>
document.getElementById("startdate").style.fontWeight = "900";
document.getElementById("planname").style.fontWeight = "900";
document.getElementById("orgname").style.fontWeight = "900";
document.getElementById("enddate").style.fontWeight = "900";
document.getElementById("noemp").style.fontWeight = "900";
// document.getElementById("userlimit").style.fontWeight = "900";

// document.getElementById("p2").style.fontFamily = "Arial";
// document.getElementById("p2").style.fontSize = "larger";
</script>

<script>
// window.onload = function(){
// 	// alert("hii");
// 	// document.getElementByName("next").style.visibility = "hidden"; 
// 	document.getElementById('next').style.visibility='disable';

// };


// $(document).ready(function(){
//     $('#next').attr('disabled',true);
// });
// window.onload=function() {
//   document.getElementById("next").disabled=true;
//   // document.getElementById('next').style.visibility='hidden';

// }



$("#serch").click(function(){
   $("#next").attr("disabled",false); 
   // $("#next").attr("visibility",false); 
    $("#next").show();
});

// $(document).ready(function() {
//     $("#next").removeClass("hidden");
// });
// $(document).ready(function(){
// $('#next').hide();
// };

	</script>

	<?php
     $orgid = isset($_REQUEST['orgid'])?$_REQUEST['orgid']:"";
     if($orgid != "")
	 {
		 $crnno = ($orgid*$orgid)+99;
   ?>
     <script> 
        var no = <?= $crnno ?>;
        $("#crn").val(no);
         $("#serch").click();		
     </script>  
   <?php
     }
    ?>
    <!-- <script>
    	$(document).on("click", "#next", function ()
	   {
    	var year = $("#duration").val();

    	if(document.getElementById("yearly").checked = true  && year > 30){


    			alert("Plan duration cannot be greater than 30 years.");

    			return false;
    		
    	}
    	
    	
    });
    </script> -->
	<script>
		var crn = '<?= $crn ?>';
	
		
		if(crn!='' && crn!=0){
			$("#serch").click();	
		}
	</script>
	<script>
	function paybypayu(){
		$('#inrpay').attr('action', "payumoney").submit();
	}
	
	</script>
	<script>
/* 	 $(document).on("click", "#razorpay", function ()
	   {
		   var scope = angular.element($("#razoramt")).scope();
		  
			var newvalue = scope.calculatedAmt;
			
		$.ajax
    ({ 
        url: 'upgrade/curl',
        data: {"Amount": newvalue},
        type: 'post',
        success: function(result)
        {
			
           $("#nextbtn").html(result);
        }
    });
	   }); */
	</script>
<!-- <script>

	$('#durationupg').click(function(){
		  
		  $('#slider1').hide();
	      $('#duration1').show();
	      $('#duration2').show();
	      
	  });

	$('#userlimitupg').click(function(){
		  
		  $('#slider1').show();
	      $('#duration1').hide();
	      $('#duration2').hide();
	      $('#duration').val(0);
	      // alert("hello");

	      var app = angular.module('payapp', []);
	      alert("123");
	      var scope = angular.element($("#duration")).scope();
var newvalue = scope.monthyear;
	 var scope1 =  angular.element(document.getElementById('duration')).scope();
	 // var scope = angular.element($("#duration")).scope();
	  alert("456");
	      newvalue = 0;
	      alert( newvalue);
	      

// 	 var app = angular.module('payapp', []);
// app.controller('payCtrl', function($scope) {
//     $scope.monthyear = 0;
//     alert("hiii");
// });

	      
	  });


	$('#Bothupg').click(function(){
		  
		  $('#slider1').show();
	      $('#duration1').show();
	      $('#duration2').show();
	      
	  });
</script> -->
	

	<!-- <script>
		$(document).on("click", "#next", function ()
	   {
	   	var scope = angular.element($("#duration")).scope();
var newvalue = scope.month;
alert(newvalue);
if(newvalue == 'Year'){

var duration = $("#duration").val();
// alert(duration);
alert(duration > 30);
if(duration > 30){
alert("hiiiiiii");
	return false;
	// alert("hahaha");
}
	
}
});

	</script> -->
	

		<!-- <script>
var app = angular.module('payapp', []);
app.controller('payCtrl', function($scope) {
    $scope.today = new Date();
});
</script> -->
	
</html>
