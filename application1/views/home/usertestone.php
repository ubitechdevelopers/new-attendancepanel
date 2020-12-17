
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
	<link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/bootstrap-select/css/bootstrap-select.css" />
	
	
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <link href="<?=URL?>../assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
  
  
	<title>Active Employees</title>   
	<style>

.ms-container{
	width: 55rem;
}
 /*div.dt-button-collection button.dt-button:active:not(.disabled), div.dt-button-collection button.dt-button.active:not(.disabled), div.dt-button-collection div.dt-button:active:not(.disabled), div.dt-button-collection div.dt-button.active:not(.disabled), div.dt-button-collection a.dt-button:active:not(.disabled), div.dt-button-collection a.dt-button.active:not(.disabled) {
            background-color: #dadada;
            background-image: -webkit-linear-gradient(top, #76b900 0%, #dadada 100%);
            background-image: -moz-linear-gradient(top, #76b900 0%, #dadada 100%);
            background-image: -ms-linear-gradient(top, #76b900 0%, #dadada 100%);
            background-image: -o-linear-gradient(top, #76b900 0%, #dadada 100%);
            background-image: linear-gradient(to bottom, #76b900 0%, #dadada 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#f0f0f0', EndColorStr='#dadada');
            box-shadow: inset 1px 1px 3px #666;
            font-family: 'Trebuchet MS',sans-serif;
            font-size: 12px;
        }*/

	
		.btn1>input[type='file']
		{
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
		}
		
		.red
		{
			color:red;
			font-weight:'bold';
			font-size:16px;
		}
			
			.delete{
			cursor:pointer;
					}
					
			div.dt-buttons
			{
			position:relative;
			float:left;
			margin-left:15px;
			}
		
				  #example thead tr th.headerSortUp  
				  {
				   background-image: url('<?=URL?>../assets/img/up_arrow.png');
				  }
              #example thead tr th.headerSortDown  {
              background-image: url('<?=URL?>../assets/img/down_arrow.png');
													}
			 #example tbody tr td.lalign 
					{
             text-align: left;
                   }
				   .id
				   {
					   color:grey;
				   }
				 .empname
				 {
					font-Size:18px; 
				 }
	.t2{display:none;}
	</style>
	<style type="text/css" media="print" >
		
		 .print {
			  margin-left:40px;
			 align:center;
			 border:2px #666 solid; padding:5px;  
				}

          .nonPrintable
					{
						display:none;
					} /*class for the element we don’t want to print*/
		  
		  
	#cart_cancel
	{
		background-color: transparent!important;
        border: none;
        float: right;
	}	

	
     </style>
	 <!-- pre loader -->
	 <style>
	  /* Preloader */
	  #preloader {
	  position: fixed;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #fff;
	  /* change if the mask should have another color then white */
	   z-index: 99;
	  /* makes sure it stays on top */
	}
		#status {
		  width: 200px;
		  height: 200px;
		  position: absolute;
		  left: 60%;
		  /* centers the loading animation horizontally one the screen */
		  top: 50%;
		  /* centers the loading animation vertically one the screen */
		  background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
		  background-repeat: no-repeat;
		  background-position: center;
		  margin: -100px 0 0 -100px;
		  /* is width and height divided by two */
		}
	#addEmp{
       overflow: scroll;
   }
   /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  /*width: 55px;
  height: 34px;*/
  width: 50px;
  height: 25px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 30px;
}

.slider.round:before {
  border-radius: 45%;
}
	 </style>
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 
</head>

      <div class="modal fade" id="loadmodel" role="dialog" data-backdrop="static" data-keyboard="false" style="z-index:11111111;" >
			<div class="modal-dialog">
				<center>
					<img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" height="20%" width="20%" />
				</center>
			</div>
       </div> 
<body style="" >
         
	<div class="wrapper">
	
		<?php
			$data['pageid']=2;
			$this->load->view('menubar/sidebar',$data);
		?>
	    <div class="main-panel">
			<?php
				$this->load->view('menubar/navbar');
			?>
			
			<div class="content" id="content">
			  <!-- loader area 
			   <div id = "loader" hidden >
					<center>
					 <img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" height="20%" width="20%" />
					</center>
					 
		       </div>-->
		       <?php 
		       $orgid =$_SESSION['orgid'];
		       $query1 = $this->db->query("SELECT `user_limit` as userlimit,status ,(SELECT COUNT(*)
    FROM EmployeeMaster where`OrganizationId` = $orgid and Is_Delete != 2) as registeredusers from licence_ubiattendance where `OrganizationId`=$orgid"); 

		       if ($r=$query1->result()){
							$userlimit  = $r[0]->userlimit;
							$reguser  = $r[0]->registeredusers;
							$status  = $r[0]->status;

						}




		       ?>
		       <!-- <?php echo $status; ?>  -->

		       <!-- <?php echo $userlimit ; ?> -->
		       <!-- <?php echo $data['userlimit'];?> -->
			   
	            <div class="container-fluid" id="maincontainerdiv" >
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green"> 
	                              <p class="category" style="color:#ffffff;font-size:17px;" > List of Active Employees</p>
								  <a rel="tooltip"  data-placement="bottom" title="Help" class="btn btn-success btn-sm toggle-sidebar pull-right " style="position:relative;margin-top:-30px;" >
								  <i class="fa fa-question"></i></a>
	                            </div>
	                            <div class="card-content">
									<div id="typography">
										<div class="title">
											<div class="row">
												<!--<div class="col-md-2" style="margin-top:-10px;" >
													<h3>Manage Active Employees </h3>
												</div>-->
												<div class="col-md-12 text-left" >
												<button title="Add" class="btn btn-sm btn-success addemp outside" data-toggle="modal" data-target="#addEmp" type="button" style="">	
												 <i class="fa fa-plus"> Add Employee</i>
											   </button>
												
                                               <a href="userprofiles/emport/2" class="btn btn-sm btn-success addemp" title="Add employees through import" style="padding:5px 8px;" style=""><i class="fa fa-file-excel-o">&nbsp;Import </i></a>
											   
												<button title="Self Registration"  class="btn btn-sm btn-success addemp" data-toggle="modal" data-target="#inviteEmp" type="button" style=" font-size:5px ">	
												 <i class="fa fa-plus"> Self Registration </i>
												</button>
												
												<button title="Select employees to assign "  class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" style="" onclick="updateshift();">
												<i class="fa fa-plus"> Assign Shift </i>
												</button>
												
												<button title="Select employees to assign"  class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" style="" onclick="updateDesignation();">
												<i class="fa fa-plus"> Assign Designation </i>
												</button>
												
												<button title="Select employees to assign"  class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" style="" onclick="updateDepartment();">
												<i class="fa fa-plus"> Assign Department </i>
												</button>
												
												 
											<button class="btn btn-sm btn-success" title="Generate QRCode" style="padding:5px 8px;" style="padding:5px 8px;" onclick="QRcode();" id="qrgen"><i class="fa fa-qrcode">&nbsp;QR Code</i></a>	
											</button>
											
												<?php
                                                $permis = getAddonPermission($_SESSION['orgid'],'Addon_GeoFence');
												
												if($permis == 1)
												{
												?>
													<button  title="Select employees to assign" class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" style="" onclick="updateGeolocation();">
														<i class="fa fa-plus"> 
															Assign Geo Center</i>
													</button>
													<?php } ?>

													<?php
                                                $permis = getAddonPermission($_SESSION['orgid'],'Addon_livelocationtracking');
												
												if($permis == 1)
												{
												?>
												<button  title="Select employees to assign" class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" style="" onclick="updatelivelocationtracking();">
														<i class="fa fa-plus"> 
															Track Location</i>
													</button>
													<?php } ?>
													
													<button  class="btn btn-sm btn-success"  id="frm-example" data-toggle="modal"  type="button" onclick="allinactive();" style="font-size:5px;">
										        	<i style="font-size: 18px;" class="fa fa-thumbs-down"></i>
										        	<span style="font-size: 15px;font-family: auto;">Inactive</span>
									            	</button>
												</div>
													<div class="col-md-4 text-right" style="float:right;">	
													</div>
													
											</div>
										</div>
										<div class="row" style="overflow-x:scroll;">
											<table id="example" class="display table" cellspacing="0" width="100%">
											<thead>
												<tr style="background-color:#008067;color:#ffffff;">
													<th style="background-image:none"!important><input type="checkbox" id="select_all" name="select_all" value=""/></th>
													<th>Employee Code</th>
													<th>Photo</th>
													<th>Name</th>
													<th>Username / Email </th>
													<th>Department</th>
													<th>Designation</th>
													<th>Shift</th>
													<th>Shift Type</th>
												    <th>Phone</th>




												    <th>Country</th>
												    <th>Timezone</th>
												    <th>Hourly Rate</th>
													<th style="max-width:100px;" style="background-image:none"!important>Status</th>
													<th style="max-width:100px;" style="background-image:none"!important>Track Location</th>
													<th style="max-width:100px;">Geo Center</th>
													<!--<th>Password</th>-->
													<th>Permissions</th>
													<th class="text-left" width="15%" 
													style="background-image:none"!important>Action</th>
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
	        </div>
			<div class="col-md-3 t2" id="sidebar" style="margin-top:100px;"></div>
	       
			<footer class="footer">
				<div class="container-fluid">	
				</div>
			</footer>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						
					</nav>
					<!--<p class="copyright pull-right" style="padding-right:25px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a></p>-->
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
<!-- Modal open add employee-->


<div id="addEmp" class="modal fade" role="dialog" style="z-index:10000000;" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Add Employee</h4>
      </div>
      <div class="modal-body">
		<form method="POST" id="empFrom" enctype="multipart/form-data" name="myform">


			<div class="row">
               <b class="row" >&nbsp;&nbsp;Personal Details</b>
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label" id="FNLable">Full Name<span class="red">*</span></label>
						<input type="text" id="firstName" class="form-control " required>
					</div>
				</div>

				<?php 
				if($_SESSION['specialCase']=='RAKP') { //mandatory ?>
					<div class="col-md-6">
						<div class="form-group label-floating">
							<label class="control-label">Employee Code<span class="red">*</span></label>
							<input type="text" id="ecode" class="form-control" required>
						</div>
					</div>
				<?php }else {?>
				
					<div class="col-md-6">
						<div class="form-group label-floating">
							<label class="control-label">Employee Code(optional)</label>
							<input type="text" id="ecode" class="form-control" >
						</div>
					</div>
				<?php }?>

			</div>


		    <div class="row">

 			<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Phone<span class="red">*</span></label>
						<input type="text"  maxlength="15" pattern="[0-9]{1}[0-9]{9}" class="form-control numeric" id="cont" required>
					</div>
			</div>

			<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Email<?php if($_SESSION['specialCase']=='RAKP') { ?><span class="red">*</span><?php }else{?>(optional)<?php } ?> <span class="red"> </span></label>
						<input type="email" id="email" class="form-control " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
					</div>
			</div>

			</div>
			
			
			<div class="row">


				<div class="col-md-6">
					<div class="form-group label-floating ">
						   <label class="control-label">Country<span class="red">*</span></label>
						   <select id="country" title="Please fill the required field" class="form-control">
							<option value="0">-Select-</option>
							<?php
							$data= json_decode(getAllCountries());
							for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
							?>
						</select>
					</div>
				</div>

                <div class="col-md-6">
						<div class="form-group label-floating">
							<label class="control-label">Time Zone<span class="red">*</span></label>
							<select id="timezone" name="timezone" class="form-control" >
							<option value="0" >-Select-</option>
							</select>
						</div>
				</div>


			</div>


			<div class="row">
               <div class="col-md-6">
					<div class="form-group label-floating" >
						<label class="control-label">Password<span class="red">*</span></label>
						<input type="text" id="password" class="form-control" value="123456"  title="Password is initially set. It can be changed later on by the Admin or the Employee" readonly>
				    </div>
			    </div>
            </div>
			

			
			
			<div class="row">
		    <b class="row" >&nbsp;&nbsp;Company Details</b>
			<div class="col-md-6">
				<div class="form-group label-floating">		
					<label class="control-label">Shift<span class="red">*</span></label>
						<select id="shift" class="form-control ">
							<option value="0">-Select-</option>
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
					<label class="control-label">Department<?php if($_SESSION['specialCase']!='RAKP') { ?><span class="red">*</span> <?php } ?></label>
						<select id="dept" title="Please fill the required field"class="form-control ">
							<option value="0">-Select-</option>
												<?php
												$data= json_decode(getAllDept($_SESSION['orgid']));
												for($i=0;$i<count($data);$i++)
													echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
												?>
						</select>
				</div>
			</div>
			</div>
			
			<div class="row">
				
			<div class="col-md-6">
				<div class="form-group label-floating">
						<label class="control-label">Designation<?php if($_SESSION['specialCase']!='RAKP') { ?><span class="red">*</span> <?php } ?></label>
							<select id="desg" class="form-control">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllDesg($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							</select>
					</div>
			</div>

			<div class="col-md-6" style="margin-top: -36px;">
					<div class="form-group labelfloating">
						<label class="control-label">DOJ<span class="red">*</span></label>
						<input type="text" id="doj" class="form-control datepicker" value="00/00/0000">  
									<!-- <input type="date" class="form-control doj" id="doj" title="Please fill the date of joining" required> -->
					</div>
			</div>

			</div>

			        <?php
			        $permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
					if($permis == 1)
				    {
					?>
			        <div class="row">
                        <div class="col-md-6" >
							<div class="form-group label-floating">
							  <label class="control-label">Entitled Leave/Year<span class="red">*</span></label>
							  <input type="number" id="entitledleave" title="Please fill the required field" class="form-control " value="<?php echo getLeave($orgid);?>" onkeypress="if(this.value.length==2) return false;" max="120" min='0'>
							 </div>
						</div> 

					    <div class="col-md-6" >
							<div class="form-group label-floating" id="MyElement" >
							  <label class="control-label">Entitled Leave this Year<span class="red">*</span></label>
							  <input type="text" id="balanceleave" title="Please fill the required field" class="form-control " style="margin-top: -10px;" disabled>
							</div>
						</div> 
					</div>	
					<?php  } ?>



			<div class="row">
				<div class="col-md-6" >
					<div class="form-group label-floating">
					<label class="control-label">Hourly Rate(optional) </label>
					<select id="hourlyrate" class="form-control "  >
						<option value="0">-Select-</option>
						<?php
						$data= json_decode(getAllRate($_SESSION['orgid']));
						for($i=0;$i<count($data);$i++)
							echo '<option value='.$data[$i]->Id.'>'.$data[$i]->Rate.'</option>';
						?>
					</select>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group label-floating">
					<label class="control-label">Permission</label>
					<select class="form-control" id="sstatus" >
						<option value='1' >Admin - <small>for App only</small></option>
						<option value='2' >Dept Head</option>
						<option value='0' selected>User</option>
					</select>
				</div>
			  </div>
			</div>

<!-- 			<div class="row">
			<?php 
			if($_SESSION['specialCase']=='RAKP') { //mandatory ?>
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Employee Code<span class="red">*</span></label>
						<input type="text" id="ecode" class="form-control" required>
					</div>
				</div>
			<?php }else {?>
			
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Employee Code(optional)</label>
						<input type="text" id="ecode" class="form-control" >
					</div>
				</div>
			<?php }?>
			</div> -->


			<!-- row end -->
			<!--<div class="row">
			<div class="col-md-6" >
			     <div class="form-group" >
						<label class="control-label">Profile Photo<span class="red"> *</span></label>
						<input id="profile" class="form-control" type="file" name="profile" onchange="changeImgUpload1(this)">
				</div>
			  </div>
			  <div class="col-md-6" >
			     <div class="form-group" >
			  <img id="imageAdd" src="" width="150px" height="150px" class="thumbnail"  
			  onerror="this.src='<?php echo IMGURL3."avatars/male.png"?>'"/>
			  </div>
			  </div>
			</div>-->
			     <hr>				

			<!--<div class="row">
				<div class="col-md-6">
						<div class="form-group label-floating">
							<label class="control-label">Permissions</label>
							<select class="form-control" id="sstatus" >
								<option value='1' >Admin - <small>for App only</small></option>
								<option value='0' selected>User</option>
							</select>
						</div>
				</div>
				<?php 
             $permis = getAddonPermission($_SESSION['orgid'],'Addon_Payroll') ;
			 ?> 
			
			  <div class="col-md-6" >
			     <div class="form-group label-floating">
						<label class="control-label">Hourly Rate (optional)</label>
						<select id="hourlyrate" class="form-control " <?php if( $permis==0) echo "disabled" ?> >
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllRate($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->Id.'>'.$data[$i]->Rate.'</option>';
								?>
							</select>
					
				</div>
			  </div>
            
			
				<!<div class="col-md-6">
					<div class="form-group label-floating" style="display:none">
						<label class="control-label"> Employment Status<span class="red"> *</span></label>
						<select class="form-control" id="status" >
							<option value='1' selected>Active</option>
							<option value='0'>Inactive</option>
						</select>
					</div>
				</div>
			</div>-->
			            <?php 
                           $permis = getAddonPermission($_SESSION['orgid'],'Addon_Payroll') ;
						 ?> 
			<!--<div class="row" >
			  <div class="col-lg-6" >
			     <div class="form-group label-floating">
						<label class="control-label">Hourly Rate </label>
						<select id="hourlyrate" class="form-control " <?php if( $permis==0) echo "disabled" ?> >
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllRate($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->Id.'>'.$data[$i]->Rate.'</option>';
								?>
							</select>
					
				</div>
			  </div>
            </div>	-->		
			
			<!---<div class="row">
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">Blood Group<span class="red"> *</span></label>
							<select id="bg" class="form-control ">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllBloodGroup());
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							</select>
					</div>
				</div>-->
				
				<!--<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">Marriatal Status<span class="red"> *</span></label>
							<select id="ms" class="form-control ">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllOther('MaritalStatus'));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							</select>
					</div>
				</div>-->
				<!--<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">Religion<span class="red"> *</span></label>
						<select id="rel" class="form-control ">
							<option value="0">-Select-</option>
							<?php
							$data= json_decode(getAllReligion());
							for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
							?>
						</select>
					</div>
				</div>
				
			</div>-->
			<!--<div class="row">
			<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">Gender<span class="red"> *</span></label>
							<select id="gen" class="form-control">
								<option value="0">Female</option>
								<option value="1">Male</option>
								<option value="2">Transgender</option>
							</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">Nationality<span class="red"> *</span></label>
							<select id="nationality" class="form-control ">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllNationality());
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">Country<span class="red"> *</span></label>
						<select id="country" class="form-control">
							<option value="0">-Select-</option>
							<?php
							$data= json_decode(getAllCountries());
							for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
							?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">City<span class="red"> *</span></label>
						<select id="city" class="form-control ">
							<option value="0">-Select-</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Status<span class="red"> *</span></label>
						<select class="form-control" id="status" >
							<option value='1' selected>Active</option>
							<option value='0'>Inactive</option>
						</select>
					</div>
				</div>
				
					<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Shift<span class="red"> *</span></label>
							<select id="shift" class="form-control ">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllShift($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							</select>
					</div>
				</div>
				
			</div>-->
			
				<!--<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Address<span class="red"> *</span></label>
						<textarea class="form-control" id="addr"></textarea>
					</div>
				</div>-->
			<?php
			$permis = getAddonPermission($_SESSION['orgid'],'Addon_GeoFence');
			if($permis == 1)
			{
			?>

			<div class="row">
				   <?php 
                      $permis = getAddonPermission($_SESSION['orgid'],'Addon_GeoFence') ;
					?> 
				
					<span><b class="row" >Geo Center</b></span><br>
					<div class="toggle">
					      <b>Restrict users to punch attendance within the Geo fence only?</b>&nbsp&nbsp&nbsp&nbsp
						  <label class="switch">
						  <input type="checkbox" name="fenceopt" value="1">
						  <span class="slider round"></span>
						</label>
				    </div>

									
									 <br>
									



 



				 <div class="form-group label-floating" style="margin-top: 0px;">
					
						<select class="form-control" id="areaAssign" <?php if($permis==0) echo "disabled" ?>  multiple data-hide-disabled="true" data-live-search="true" data-actions-box="true">
						
						<?php
							$data= json_decode(getAllArea($_SESSION['orgid']));
							for($i=0;$i<count($data);$i++) {
						
							echo "<option value='".$data[$i]->id."'>".$data[$i]->Name."</option>";
					}	
						?>
						</select>
				</div>
				</div>
				
				
			</div>

			<?php } ?>

			<div class="row">
			<div class="col-md-6">
									<div class="form-group label-floating">
										<div style="display:inline-flex;align-items:center;">
											<label class="">Profile Photo
											</label>&nbsp;&nbsp;&nbsp;
											<img id="imageAdd" src="" width="150px" height="150px" class="thumbnail" onerror="this.src=
									  '<?php echo IMGURL3."avatars/male.png"?>'"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<!--<i class="pencil fa fa-pencil" style="color:purple	;" 
											 title="choose a file">
											</i>
											<input type="file" name="profileE" id="profileE"  onchange="changeImgUpload(this)">-->
										<span  style="margin-bottom:50px;margin-right:-30px">
											<i class="fa fa-remove delete1" rel="tooltip" style="color:purple;" data-placement="bottom" title="Remove Image"></i>
								</span>	
										<span class="btn1 fa fa-pencil" style="color:purple;margin-left:20px">
										<input type="file" class="form-control" name="profile" id="profile"  onchange="changeImgUpload1(this)" file-upload accept="image/*">
										</span>
										</div>
									</div>
								</div>	
				</div>					
			<div class="clearfix"></div>
		
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" id="save"  class="btn btn-success">Save</button>
    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <button type="button" id="resetAdd" class="btn btn-default">Reset</button>
      </div>
	  </form>
    </div>
  </div>
  </div>
 
<!--modal close add employee-->
<!-- link sent and failed model start -->


<div id="linkdetails" class="modal fade" role="dialog" style="z-index:10000000;" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        </div>
           
				<div class="modal-body">
					<table class="failedtable" id="exisiting1" style="border-top: 1px solid;display:none;" cellspacing="0" width="100%">
					
					<thead>
					<!--<h4 class="modal-title failedtable" style="color:red;display:none;">Already exist employee ids</h4>-->
					<h4 class="modal-title failedtable" style="color:red;display:none;">Employee which are already added</h4>
					
						<tr>
							<th>S.No.</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody id="existemail">
						
					</tbody>
				</table>	
				<table class="successtable" id="exisiting2" cellspacing="0" style="border-top: 1px solid;margin-top:10px;display:none;" width="100%">
					<thead>
					<!--<h4 class="modal-title successtable" style="color:green;display:none;">Successfully sent link</h4>-->
					<h4 class="modal-title successtable" style="color:green;display:none;">Mail sent to the employees below</h4>
						<tr>
							<th>S.No.</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody id="insertedemail">
						
					</tbody>
											
				</table>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-defult" data-dismiss="modal">Cancel</button>
					
				</div>
			
		
        </div>
        </div>	
       </div>

<!-- link sent and failed model end   -->

<!-- Modal open Invite employee-->
<div id="inviteEmp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Employee Self Registration</h4>
      </div>
      <div class="modal-body">
		<div>
			<!-- <h3>Employee Self Registration</h3> -->
		</div>
			<form>
					<input id="inveitedEmails" class="form-control" type="email" placeholder="Employee Email(s)  "/>
					<strong>Note: Seperate multiple emails by comma</strong>
				
			</form>
		<div class="clearfix"></div>		
      </div>
      <div class="modal-footer">
        <button type="button" id="sendInvitation"  class="btn btn-success">Send Registration Link</button>
        <button type="button" id="resetInvitation" class="btn btn-default">Reset</button>
      </div>
    </div>
  </div>
  </div>
<!--modal close Invite employee-->
<!-- Modal open edit employee-->
<div id="addEmpE" class="modal fade" data-backdrop="static" role="dialog" style="z-index:10000000"    >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Update Employee Details</h4>
      </div>
      <div class="modal-body">
	  
	  </div>
		
	  <div class="modal-footer">
        <button type="button" id="saveE"  class="btn btn-success click_to_submit">Update</button>
        <button type="button" id='close' class=" btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
  </div>
</div>
</div>

<!---modal close edit employee-->
<!--image modal -->


<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content"style="height:50%;width: 55%;margin-left: 140px;"> 
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<form id="imgE" method="POST" enctype="multipart/form-data" name="myformE">
		<input type="hidden" id="imgid">
        <img src="" class="imagepreview" style="width:100%!important;" 
		id="profileimg" >
      </div>
		
	   </form>
    </div>
  </div>
</div>
		
<!--Archive employee start-->
<div id="delEmp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Archive Employee</h4>
      </div>
      <div class="modal-body">		
		<form>
			<input type="hidden" id="del_id" />
			<div class="row">
				<div class="col-md-12">
				  <h4>Move "<span id="na"></span>" to the archive employees?</h4>
				  <p><b>Note:</b> Archived employees will still be counted in registered employees. To reduce the no. of registered employees, delete the employee from the archived employees also.</p>
				</div>
			</div>
			
			<div class="clearfix"></div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="delete"  class="btn btn-warning" data-dismiss="modal">Archive</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--delete employee close-->
<!--START shift changes of more than one employee simultaneously-->

<div id="shifts" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Assign Shift</h4>
			  </div>
      <div class="modal-body">
		<form id="shiftC">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Shift<span class="red">*</span></label>
							<select id="shiftEE" class="form-control ">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllShift($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.	'</option>';
								?>
							</select>
					</div>

				</div>
			</div>
		</form>
			<div class="clearfix"></div>

      </div>
			  <div class="modal-footer">
					<button type="button" id="saveshift" class="btn btn-success">Save</button>
					<button type="button" id="resetshift" data-dismiss="modal" class="btn btn-default">Close</button>
			  </div>
    </div>
  </div>
  </div>
  
  
  <div id="geolocation" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Assign Geo Center</h4>
			  </div>
			  
      <div class="modal-body">
		<form id="geolocationF">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Geo Center<span class="red">*</span></label>
							<select id="geolocationS" class="form-control selectpicker" multiple data-hide-disabled="true" data-live-search="true" data-actions-box="true">
								
								<?php
									$data= json_decode(getAllArea($_SESSION['orgid']));
									for($i=0;$i<count($data);$i++) 
									{
										echo "<option value='".$data[$i]->id."'>".$data[$i]->Name."</option>";
									}	
								?>
							</select>
					</div>
				</div>
			</div>
		</form>
			<div class="clearfix"></div>

      </div>
			  <div class="modal-footer">
				<button type="button" id="savegeolocation" class="btn btn-success">Save</button>
				<button type="button" id="resetgeolocation" data-dismiss="modal" class="btn btn-default">Close</button>
			  </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  <!-- live location tracking modal start -->

<div id="tracklivelocation" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Track Location</h4>
			  </div>
			  
      <div class="modal-body">
			<div class="row">
				<form id="trackloc">
				<div class="col-md-6">

					<div class="form-group label-floating">
						<label class="control-label" style="font-size:14px;margin-left:8px;">Track Location? <span class="red">*</span></label>

						 <div class="radio input-group" style="padding-top:20px;">
                              <label class="radio-inline" style="color: #7d8088;">
                              <input  type="radio" name="track" value="1"  >ON
                              </label>
                              <label class="radio-inline" style="color:#7d8088">
                              <input type="radio" name="track" value="0">OFF
                              </label>
                              
                            </div>
							
					</div>
				</div>
			</div>
		
			<div class="clearfix"></div>

      </div>
			  <div class="modal-footer">
				<div class="col-sm-1 col-md-1 col-xs-12"> 
                            <button type="button" id="btntrack" class="btn btn-success" style="margin:0;padding:10px 29px;font-size:12px;margin-left: 150px;margin-top:-110px">OK</button>
                          </div>
                      </form>
			  </div>
    </div>
  </div>
  </div>



  <!-- live location tracking modal end   -->
  
   <div id="designation" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Assign Designation</h4>
			  </div>
			  
      <div class="modal-body">
		<form id="">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Designation<span class="red">*</span></label>
							<select id="desgS" class="form-control ">
								<option value="0">-Select-</option>
								<?php
								$data= json_decode(getAllDesg($_SESSION['orgid']));
								for($i=0;$i<count($data);$i++)
									echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
								?>
							</select>
					</div>
				</div>
			</div>
		</form>
			<div class="clearfix"></div>

      </div>
			  <div class="modal-footer">
				<button type="button" id="savedesignation" class="btn btn-success">Save</button>
				<button type="button" id="resetdesignation" data-dismiss="modal" class="btn btn-default">Close</button>
			  </div>
    </div>
  </div>
  </div>
  
  
  <div id="department" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Assign Department</h4>
			  </div>
			  
      <div class="modal-body">
		<form id="">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group label-floating">
						<label class="control-label">Department<span class="red">*</span></label>
							<select id="deptS" class="form-control ">
							<option value="0">-Select-</option>
							<?php
							$data= json_decode(getAllDept($_SESSION['orgid']));
							for($i=0;$i<count($data);$i++)
								echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
							?>
						</select>
					</div>
				</div>
			</div>
		</form>
			<div class="clearfix"></div>

      </div>
			  <div class="modal-footer">
				<button type="button" id="savedepartment" class="btn btn-success">Save</button>
				<button type="button" id="resetdepartment" data-dismiss="modal" class="btn btn-default">Close</button>
			  </div>
    </div>
  </div>
  </div>
  
  
  
  
  
  
  
  <!--Confirm change status-->
  
  <div id="changestatus" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Change Status</h4>
			  </div>
      <div class="modal-body">
				<h4  id="sname">
				</h4>	
			<div class="clearfix"></div>
      </div>
			  <div class="modal-footer">
				<button type="button" id="savestatus" class="btn btn-success">Yes</button>
				<button type="button" data-dismiss="modal" class="btn btn-default">No</button>
			  </div>
    </div>
  </div>
  </div>

  
  <!-- jalsa qr start-->

  <div id="genQRjal"  class="modal fade "  style="margin-left:40px;" >
  <div class="modal-dialog" style="width: 250px;  align:center;  " >
    <!-- Modal content-->
    <div class="modal-content print" style="background-image:url('<?=URL?>../assets/img/jalfinallogo.png'); background-size:100%;background-repeat:no-repeat;-webkit-print-color-adjust:exact;">
      
        <button type="button" style="background-color: transparent!important;
        border: none;
        float: right;padding-top:2px;" onclick="closemodel()" id="cart_cancel"><i class="material-icons" ></i>
		</button><br/>
        <p class="modal-title" id="title" style="font-size:18px;text-align:center;">
		</p>
        
      
      <div class="modal-body" >		
		<div>
			<div>
				<strong>
					<!-- <div style="width:240px;">
						<img src ="<?=URL?>../assets/img/jalsa.png"  style="margin-top: -37px;
    margin-left: 0px;height:240px ;width:210px">
					</div> -->
				 <center> 
				 
				  <p style="color:#000;margin-top:37%;font-size:10px;">www.alislam.org | www.ahmadiyya.ng</p>
				    
					<!-- <div style="margin-top:80%;">
						<label for="user_name" style="font-weight: 600" > <span class="lnamejal" id="lNamejal" style="font-weight: 700"></span><span class="fnamejal" id="fnamejal"></span></label> 
					</div> -->
					<div style="font-weight:bold;font-size: 18px;"><span class="lnamejal" id="lNamejal"></span>
					<span class="fnamejal" id="fNamejal"></span></div>
					<!-- <div><span class="empecodejal" id="empecodejal"></span></div> -->
					<div><span style="color:#000" class="idjal" id="deptNamejal"></span></div>
					<div> <span style="color:#000" class="idjal" id="desgName23"></span></div>
					
			    	<div><span class="idjal" id="shiftnamejal"></span></div>
			    	<!-- <b><?php echo isset($_SESSION['orgName'])?$_SESSION['orgName']:'';?></b> -->
			    	<!-- <div><span class="id" id="shiftname23"></span></div> -->
				</center>

				</strong>
				
				<center>
					<img width="130px" id="qrCodejal" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=testing data found &choe=UTF-8"/>
				</center>
			
				<!-- <div> pulkit</div> -->
				
			</div>
			<button class="btn btn-warning btn-block nonPrintable" onclick="printDiv('genQRjal')" value="print a div!" data-dismiss="modal">Print</button>
      </div>
	  
      
    </div>
  </div>
</div>
</div>

  <!-- jalsa qr end-->
  
  <!-- qr real one -->

<div id="genQR23"  class="modal fade "  style="margin-left:40px;" >
  <div class="modal-dialog" style="width: 250px; align:center;">
    <!-- Modal content-->
    <div class="modal-content print">
      <div class="modal-header">
        <!--<button type="button" style="background-color: transparent!important;
        border: none;
        float: right;padding-top:2px;" onclick="closemodel()" id="cart_cancel"><i class="material-icons" ></i>
		</button>--><br/>
		 <button type="button" class="close" data-dismiss="modal" style="color:white; font-Size:20px; margin-top:-30px;">&times;</button>
        
        
      </div>
      <div class="modal-body" >		
		<div>
			<div>
				<strong>
				 <center>   
				    <b><?php echo isset($_SESSION['orgName'])?$_SESSION['orgName']:'';?></b>
				    <!-- this organization work for bankabio -->
				    <?php if($_SESSION['orgid']=='57239'){?>
					<div><span class="empname23" id="empName23"></span></div>
					<div><span class="empecode23" id="empecode23"></span></div>
					<!-- <div><span class="id23" id="desgName24"></span></div> -->
					<div><span class="id" id="location23" style="color:#3C4858;font-weight:700"></span></div>
			    	<!-- <div><span class="id" id="shiftname23"></span>(<span class="id" id="shiftime23"></span>)</div> -->
			    <?php }else{ ?>
			    	<div><span class="empname23" id="empName23"></span></div>
					<div><span class="empecode23" id="empecode23"></span></div>
					<div> <span class="id23" id="desgName24"></span></div>
					<div><span class="id" id="deptName23"></span></div>
					<div><span class="id" id="shiftname23"></span>(<span class="id" id="shiftime23"></span>)</div>

			    <?php } ?>
			    	<!-- <div><span class="id" id="shiftname23"></span></div> -->
				</center>

				</strong>
				
				<center>
					<img width="200px" id="qrCode321" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=testing data found &choe=UTF-8"/>
				</center>
			
				<!-- <div> pulkit</div> -->
				
			</div>
			<button class="btn btn-warning btn-block nonPrintable" onclick="printDiv('genQR23')" value="print a div!" data-dismiss="modal">Print</button>
      </div>
	  
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
</div>


  <!-- //qr real one -->
 
  

<!--....................END........-->
<!--Generate QR code start-->
<div id="genQR121"  class="modal fade "  style="margin-left:420px; background:transparent;" >
  <div class="modal-dialog">

  	<button type="button" style="background-color: transparent!important;
        border: none;
        float: right;padding-top:2px;" onclick="closemodel()" id="cart_cancel"><i class="material-icons" ></i>
		</button><br/>

    <!-- Modal content-->
    <!-- <div class="modal-content print"> -->
     <!--  <div class="modal-header">
        <button type="button" 
        border: none;
        float: right;padding-top:2px;" onclick="closemodel()" id="cart_cancel"><i class="material-icons" ></i>
		</button><br/>
        <p class="modal-title" id="title" style="font-size:18px;text-align:center;">
		</p> -->
		<!-- <div class="modal-content print"> -->
        <!-- <div class="modal-header">
        <button type="button"  onclick="closemodel()" id="cart_cancel">&times;</button>
         <h4 class="modal-title">Modal Header</h4> -->
      <!-- </div>  -->
      <!-- <div class="modal-header">
        <button type="button" class="close nonPrintable" data-dismiss="modal"><i class="material-icons">close</i></button>
        <p class="modal-title" id="title" style="font-size:18px;text-align:center;">
		</p>
        
      </div> -->
      <!-- </div> -->
      <div class="modal-body" >	
      	
		<div class="" >

        <!-- row -->
        <div class="">

            <!-- main card -->
            <div id="dayt_qrCard1">

                <!-- left side card blue -->
                <div id="dayt-leftSide"  >

                    <!-- user circle image -->
                    <div id="dayt-image_circle">
                    	<!-- <span class="profile" id="profile"></span> -->
                        <img id="profile1" width="60px" height="60px" style="border-radius: 50%;
   							 border-width:5px;"src=""  alt="user profile image">
                    </div>

                    <!-- username -->
                    <div id="dayt-user_name">
                        <label for="user_name" style="font-weight:600;"><span class="firstname" id="firstName1"></span> <span class="lastname" id="lastName1" style="font-weight: 700"></span></label>     
                    </div>

                    <!-- user designation -->
                    <div id="dayt-designation">
                        <label for="designation" style="font-weight: 400" ><span class="id" id="desgName"></span></label>     
                    </div>

                    <!-- User ID -->
                    <div id="dayt-empid">
                        <label for="empid" style="font-weight: 400" ><span class="empecode" id="empecode"></span></label>     
                    </div>
                    

                    <!-- user details email, address, phone number-->
                    <div id="dayt-user_details">
                        <div id="dayt-email_id">
                            <!-- <img id="email_icon" src="email.svg" alt=""> -->
                            <label for="email_id"><span class="email" id="email1"></span></label>
                        </div>
                        <div id="dayt-phone_no">
                                <!-- <img id="phone_no_icon" src="phone-call.svg" alt=""> -->
                                <label for="phone_no"><span class="mobile" id="mobile1"></span></label>
                            </div>
                            <div id="dayt-address">
                                    <!-- <img id="address_icon" src="location.svg" alt=""> -->
                                    <label for="address"><span class="address" id="address1"></span></label>
                                </div>
                    </div>
                </div>

                <!-- right side card  -->
                <div id="dayt-rightSide">

                    <!-- companys name  -->
                    <div id="dayt-company_name">
                       <label for="title"><b><?php echo isset($_SESSION['orgName'])?$_SESSION['orgName']:'';?></b></label>     
                    </div>


                    <!-- qr code -->
                    <div id="dayt-qrcode_rectangle_dotted">
                       <div id="dayt-qrcode_rectangle_line">
                        <img id="qrcode111" width="75px" height="75px" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=testing data found &choe=UTF-8" alt="">
                       </div> 
                    </div>

                    <!-- company's email website -->
                    <div id="dayt-company_website">
                            <label for="title"><span id="web123" class="web123"></span></label>     
                         </div>
                </div>
               
            </div>
        </div>
        
       <button id="dayt-image-print-btn" class="btn btn-warning nonPrintable"
            onclick="printDiv('dayt_qrCard1')" value="print a div!"
            data-dismiss="modal" style="">Print</button>
            <!-- <center><button class="btn btn-warning nonPrintable"
            onclick="printDiv('qrCard1')" value="print a div!"
            data-dismiss="modal">Print</button></center> -->
            <!-- <button class="btn btn-warning btn-block nonPrintable" onclick="printDiv('qrcard1')" value="print a div!" data-dismiss="modal">Print</button> -->
    </div>
	  
      <div class="modal-footer" style="border-top:none; !important">
       
      </div>
    </div>
  </div>
<!-- </div> -->
</div>
<!--Generate QR code close-->

<!-- generate qrcode optional -->

<div id="genQR1"  class="modal fade "  style="margin-left:500px;margin-top:70px; background:transparent;" >
	<div class="modal-dialog">

  	
		<button type="button" style="background-color: transparent!important;
        border: none;
        float: right;padding-top:2px;" onclick="closemodel()" id="cart_cancel"><i class="material-icons" ></i>
		</button><br/>
  <!-- <div class="modal-dialog"> -->
    <!-- <div class="modal-header">
        <button type="button" class="close nonPrintable" data-dismiss="modal"><i class="material-icons"><span style="color:#000">close</span></i></button>
        <p class="modal-title" id="title" style="font-size:18px;text-align:center;">
    </p>
        
      </div> -->
       <div class="modal-body" >
       

    <!-- container -->
    <div class="">

        <!-- row -->
        <div class="" style="">

            <!-- main card -->
            <div id="dytaa_qrCard">
              
                <!-- top side card -->
                <div id="dytaa_topSide">

                      <!-- companys name  -->
                <div id="dytaa_company_name" >
                        <label for="title" ><b><?php echo isset($_SESSION['orgName'])?$_SESSION['orgName']:'';?></b></label>     
                </div>

                    <!-- user circle image -->
                    <div id="dytaa_image_circle">
                             <img id="profile2" width="60px" height="60px" style="border-radius: 50%;
                 border-width:5px;"src=""  alt="user profile image">
                    </div>

                    <!-- username -->
                    <div id="dytaa_user_name">
                            <label for="user_name" style="font-weight: 600" ><span class="firstname2" id="firstName2"></span> <span class="lastname2" id="lastName2" style="font-weight: 700"></span></label>     
                        </div>
    
                        <!-- user designation -->
                        <div id="dytaa_designation">
                            <label for="designation" style="font-weight: 400" > <span class="id1" id="desgName1"  style="font-weight: 700"></span></label>     
                        </div>
    
                        <!-- User ID -->
                        <div id="dytaa_empid">
                            <label for="empid" style="font-weight: 800" ><span class="empecode1" id="empecode1"></span></label>     
                        </div>
    

                         <!-- qr code -->
                         
                   <div id="dytaa_qrcode_rectangle_dotted">
                    <div id="dytaa_qrcode_rectangle_line">
                     <img id="qrcode123" width="75px" height="75px" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=testing data found &choe=UTF-8" alt="">
                    </div> 

                 </div>
            

                 <!-- company's email website -->
                 <div id="company_website">
                         <label for="title"><span id="web1234" class="web1234"></span></label>     
                      </div>
              </div>
                  
            </div>
        </div>
        
          <button id="dytaa_prntbtn" class="btn btn-warning nonPrintable"
            onclick="printDiv('dytaa_qrCard')" value="print a div!"
            data-dismiss="modal">Print</button>
            

    </div>
  </div>
</div>
<!-- </div> -->
</div>

<!-- //generate qrcode optional -->


<!--Generate QR code start-->
<div id="genqrcode"  class="modal fade"  style="margin-left:40px;" >
  <div class="modal-dialog" style="width: 250px; align:center;">
    <!-- Modal content-->
  <div class="modal-content print">
      <div class="modal-header">
        <button type="button" style="background-color: transparent!important;
        border: none;
        float: right;" onclick="closemodel()" id="cart_cancel"><i class="material-icons">close</i></button>
        <p class="modal-title" id="title" style="font-size:18px;text-align: center;border-bottom: 1px solid #42a545;">
		</p>
        
      </div>
      <div class="modal-body" >		
		<div>
			<div >
				<strong>
				 <center>   <div>
				    <b><?php echo isset($_SESSION['orgName'])?$_SESSION['orgName']:'';?></b>
				   </div>
					<div><span class="id" id="empName"></span></div>
					<div><span class="id" id="desgName"></span></div>
					<div><span class="id" id="deptName"></span></div>
			    	<div><span class="id" id="shiftime"></span></div>
				</center>
				</strong>
				<center>
					<img width="150px" id="qrCode" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=testing data found &choe=UTF-8"/>
				</center>
			</div>
			<button class="btn btn-warning btn-block nonPrintable" onclick="printDiv('genQR')" value="print a div!" data-dismiss="modal" >Print</button>
      </div>
	  
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
</div>
<!--Generate QR code close-->





<div id="confirm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title">Remove Profile Photo</h4>
      </div>
      <div class="modal-body">		
		<form>
			<input type="hidden" id="del_id" />
			<div class="row">
				<div class="col-md-12">
					<h4>Do you want to remove the Profile picture?</h4>
					
				</div>
			</div>
			
			<div class="clearfix"></div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="delete"  class="btn btn-warning" data-dismiss="modal">Remove</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<form id="myFormid" method="post" action="<?php echo URL; ?>userprofiles/QRcode" target="_blank">
	<input type="hidden" id="favorite" name="favorite"/>
	<input type="hidden" id="tempides" name="tempides" value="1"/>
</form>



<!--Request for reset password-->
<div id="resetpwd"  class="modal fade " role="dialog" style="margin-left:40px;" >
  <div class="modal-dialog" >
    <!-- Modal content-->
    <div class="modal-content print">
      <div class="modal-header">
        <button type="button" class="close nonPrintable" data-dismiss="modal"><i class="material-icons">close</i></button>
        <h4 class="modal-title" id="title" >Reset Password</h4>
      </div>
      <div class="modal-body" >		
		<div>
			<form id='resetpwdform'  >
			<input type='hidden' id="idResetPassword"/>
			Set new password for <b><span id="nameResetPassword"></span></b>
			<div class="form-group label-floating">
						<label class="control-label">New Password<span style="color:red;">*</span></label>
						<input class="form-control" type="password" id="resetPassword" />
			</div>
			<div class="form-group label-floating">
						<label class="control-label">Confirm Password<span style="color:red;">*</span></label>
						<input class="form-control" type="password" id="confirmResetPassword" />
			</div>
			<span id='resetError' style="color:red"></span>
			<div class="col-md-6 col-lg-6 col-sm-12 form-group label-floating">
				
			</div>
			<div class="">
				<input type="button" value="Submit" id="submitResetPassword" class="btn btn-success" style="margin-left: 95px;" />
				<input type="button" data-dismiss="modal" value="cancel" class="btn btn-default" />
			</div>
			
			</form>
        </div>
	   
      <!--<div class="modal-footer"></div>-->
    </div>
  </div>
</div>
</div>
		
<!--Request for reset password close-->



<!--- Delete Modal close here -->
		<!---->
		  <div id="inactiveallemp" class="modal fade" role="dialog">
			 <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
				<h4 class="modal-title" id="title">Inactive Employee</h4>
			  </div>
			  <div class="modal-body">		
				<form>
					<input type="hidden" id="emp_id" />
					<div class="row">
						<div class="col-md-12">
							<h4>Inactive Employee(s)?</h4>
						</div>
					</div>
					
					<div class="clearfix"></div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" id="allinactiveE"  class="btn btn-success" data-dismiss="modal">Inactive</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>

</body>


<!--<script type="text/javascript" src="<?=URL?>../assets/js/inspect.js"></script>-->

<script type="text/javascript" src="<?=URL?>../assets/js/jquery.lwMultiSelect.js"></script>
<script type="text/javascript" src="<?=URL?>../assets/bootstrap-select/js/bootstrap-select.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
       <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
	   <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
	   <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
	  
       <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
       <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
	   <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>


	   <!--  <script>
	var table=$('#example').DataTable(); 
$('#


').on('click',function(){

		$('#example').DataTable().ajax.reload(null, false);
}
// 

</script> -->

	    <!-- dayitava script start -->




	    <!-- dayitava script end -->
	<div id="mySidenav" class="pull-right sidenav" style="background-image:url(<?=URL?>../assets/img/bg7.jpg);background-repeat:no-repeat;">
		<div class="helpHeader" ><span><b>&nbsp;&nbsp;<i style="font-size:24px; color:black;"class="fa fa-question-circle" ></i ></b></span><a style="color:black;" href="javascript:void(0)" class="closebtn text-right" onclick="closeNav()">x</a></div>
						<div id="sidenavData" class="sidenavData">
						</div>
					</div>
	<script>
	
	function openNav() {
						document.getElementById("mySidenav").style.width = "360PX";
						$('#sidenavData').load('<?=URL?>admin/helpNav',{'pageid': 'useri'});	
						}
						function closeNav() {
							document.getElementById("mySidenav").style.width = "0";
						}
						
						
						
			var specialKeys = new Array();
			specialKeys.push(8); //Backspace
			$(function () 
			{
				$(".numeric").bind("keypress", function (e) 
				{
					var keyCode = e.which ? e.which : e.keyCode
					var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
					$(".error").css("display", ret ? "none" : "inline");
					return ret;
				});
				
				$(".numeric").bind("drop", function (e) {
					return false;
				});
			});
			
			
			
			$(".alpha").keydown(function(e)
			{
				if ($.inArray(e.keyCode, [46, 8, 9]) !== -1 ||
				// Allow: Ctrl+A, Command+A
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				(e.keyCode >= 35 && e.keyCode <= 40)) 
				{
				return;
				}// Ensure that it is a number and stop the keypress
				if ((e.keyCode < 65 || e.keyCode > 90) && (e.keyCode !=95 || e.keyCode > 123) && e.keyCode != 32)
				{
				e.preventDefault();
				}
			});
						</script>
						<script>
						
						
	  function printDiv(qrCard1) {
      setTimeout(function(){
     var printContents = document.getElementById(dayt_qrCard1).innerHTML;
	  
      var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
	  },500);
	  /*  var popupWin = window.open('', '', 'width=300,height=300,align=center');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + genQR.innerHTML + '</html>');  */
}

  function printDiv(genQR23) {
      setTimeout(function(){
     var printContents = document.getElementById(genQR23).innerHTML;
	  
      var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
	  },500);
	  /*  var popupWin = window.open('', '', 'width=300,height=300,align=center');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + genQR.innerHTML + '</html>');  */
}
function printDiv(genQRjal) {
      setTimeout(function(){
     var printContents = document.getElementById(genQRjal).innerHTML;
	  
      var originalContents = document.body.innerHTML;
printContents+="<style>"+
+"@media screen {"
+"	@page {"
+"	    margin-top: 2cm;"
+"	    margin-bottom: 2cm;"
+"	    margin-left: 2cm;"
+"	    margin-right: 2cm;"
+"	}"
+"#genQRjal {"
+"    width: 153pt!important;"
+"    height: 244.64pt!important;"
    
+"  }"
+"}"+


+"</style>";
     document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
	  },500);
	  /*  var popupWin = window.open('', '', 'width=300,height=300,align=center');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + genQR.innerHTML + '</html>');  */
}

  function printDiv(dytaa_qrCard) {
      setTimeout(function(){
     var printContents = document.getElementById(dytaa_qrCard).innerHTML;
	  
      var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
	  },500);
	  /*  var popupWin = window.open('', '', 'width=300,height=300,align=center');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + genQR.innerHTML + '</html>');  */
}
			
</script>

<script type="text/javascript">

$(document).ready(function() {
	    var entitledleave = $('#entitledleave').val();
	    var fiscalend = "<?php echo getFiscalEndDate($orgid)?>";
        var doj = $('#doj').val();

        if(doj == '00/00/0000')
        {
	        <?php
			$permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
			if($permis == 1)
			{
			?>
	        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
	        document.getElementById('balanceleave').value = "N/A";
	        // $("#MyElement").addClass("form group label-floating is-empty is-focused");
	        // $('#balanceleave').val(parselInt(balanceleave));
	        <?php
	        }
			?>
        }
        else
        {
	        var fiscalendmonth = fiscalend.substring(0, 2);
	        var joinmonth = doj.substring(0, 2);
	        var fiscalenddate = fiscalend.substring(3, 5);
	        var joindate = doj.substring(3, 5);
	        // alert(fiscalendmonth);
	        // alert(joinmonth); 

		    if(joinmonth > fiscalendmonth)
		    {
		     var newdoj=Number(doj.substr(doj.length - 4))+Number(1); 
		     var fiscalenddata = fiscalend+"/"+newdoj; 
		    }
		    else if(joinmonth == fiscalendmonth && joindate > fiscalenddate)
		    {
		     var newdoj=Number(doj.substr(doj.length - 4))+Number(1); 
		     var fiscalenddata = fiscalend+"/"+newdoj; 
		    }
		    else if(joinmonth == fiscalendmonth && joindate == fiscalenddate)
		    {
		     var newdoj=Number(doj.substr(doj.length - 4)); 
		     var fiscalenddata = fiscalend+"/"+newdoj; 
		    }
	        else 
	        {
	        var newdoj=Number(doj.substr(doj.length - 4)); 
	        var fiscalenddata = fiscalend+"/"+newdoj;
	        }
	        var date1 = new Date(doj); 
			var date2 = new Date(fiscalenddata); 
			var Difference_In_Time = date2.getTime() - date1.getTime(); 
			var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
	        var bal1=(entitledleave/12);
			var bal2=(Difference_In_Days/30.4167);
			var balanceleave=bal1*bal2;



	        <?php
			$permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
			if($permis == 1)
			{
			?>
		    document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
		    document.getElementById('balanceleave').value = parseInt(balanceleave);
		    // $("#MyElement").addClass("form group label-floating is-empty is-focused");
		    // $('#balanceleave').val(parseInt(balanceleave));
		    <?php
		    }
			?>
	    }

});	


$(document).on("change","#entitledleave",function() {

	    var entitledleave = $('#entitledleave').val();
	    var fiscalend = "<?php echo getFiscalEndDate($orgid)?>";
        var doj = $('#doj').val();

        if(doj == '00/00/0000')
        {
	        <?php
			$permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
			if($permis == 1)
			{
			?>
			doNotify('top','center',3,'Please first select date of joining');
	        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
	        document.getElementById('balanceleave').value = "N/A";
	        return false;
	        <?php
	        }
			?>
        }
        else
        {
	        var fiscalendmonth = fiscalend.substring(0, 2);
	        var joinmonth = doj.substring(0, 2);
	        var fiscalenddate = fiscalend.substring(3, 5);
	        var joindate = doj.substring(3, 5);
	        // alert(fiscalendmonth);
	        // alert(joinmonth); 

	        if(joinmonth > fiscalendmonth)
		    {
		     var newdoj=Number(doj.substr(doj.length - 4))+Number(1); 
		     var fiscalenddata = fiscalend+"/"+newdoj; 
		    }
		    else if(joinmonth == fiscalendmonth && joindate > fiscalenddate)
		    {
		     var newdoj=Number(doj.substr(doj.length - 4))+Number(1); 
		     var fiscalenddata = fiscalend+"/"+newdoj; 
		    }
		    else if(joinmonth == fiscalendmonth && joindate == fiscalenddate)
		    {
		     var newdoj=Number(doj.substr(doj.length - 4)); 
		     var fiscalenddata = fiscalend+"/"+newdoj; 
		    }
	        else 
	        {
	        var newdoj=Number(doj.substr(doj.length - 4)); 
	        var fiscalenddata = fiscalend+"/"+newdoj;
	        }
	        var date1 = new Date(doj); 
			var date2 = new Date(fiscalenddata); 
			var Difference_In_Time = date2.getTime() - date1.getTime(); 
			var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
	        var bal1=(entitledleave/12);
			var bal2=(Difference_In_Days/30.4167);
			var balanceleave=bal1*bal2;

	        //alert(balanceleave);

	        // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
	        // document.getElementById('balanceleave').value = parseInt(balanceleave);

	        <?php
			$permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
			if($permis == 1)
			{
			?>
		    document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
		    document.getElementById('balanceleave').value = parseInt(balanceleave);
		    // $("#MyElement").addClass("form group label-floating is-empty is-focused");
		    // $('#balanceleave').val(parseInt(balanceleave));
		    <?php
		    }
		    ?>
	    }

});	



</script>



<script type="text/javascript">
            $( "#doj" ).datepicker({
            	 format: 'mm/dd/yyyy',
            	 changeMonth: true,
	             changeYear: true,
	             yearRange: "-100:+100",
            	 //minDate: new Date(),
            	 onSelect: function(dateText, inst) {
            	 	//alert("hello");
				  	var entitledleave = $('#entitledleave').val();
				    var fiscalend = "<?php echo getFiscalEndDate($orgid)?>";
			        var doj = $('#doj').val();
			        var fiscalendmonth = fiscalend.substring(0, 2);
			        var joinmonth = doj.substring(0, 2);
			        var fiscalenddate = fiscalend.substring(3, 5);
                    var joindate = doj.substring(3, 5);

			        if(joinmonth > fiscalendmonth)
				    {
				     var newdoj=Number(doj.substr(doj.length - 4))+Number(1); 
				     var fiscalenddata = fiscalend+"/"+newdoj; 
				    }
				    else if(joinmonth == fiscalendmonth && joindate > fiscalenddate)
				    {
				     var newdoj=Number(doj.substr(doj.length - 4))+Number(1); 
				     var fiscalenddata = fiscalend+"/"+newdoj; 
				    }
				    else if(joinmonth == fiscalendmonth && joindate == fiscalenddate)
				    {
				     var newdoj=Number(doj.substr(doj.length - 4)); 
				     var fiscalenddata = fiscalend+"/"+newdoj; 
				    }
			        else 
			        {
			        var newdoj=Number(doj.substr(doj.length - 4)); 
			        var fiscalenddata = fiscalend+"/"+newdoj;
			        }
			        var date1 = new Date(doj); 
					var date2 = new Date(fiscalenddata); 
					var Difference_In_Time = date2.getTime() - date1.getTime(); 
					var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
			        var bal1=(entitledleave/12);
					var bal2=(Difference_In_Days/30.4167);
					var balanceleave=bal1*bal2;

			        //alert(balanceleave);
			        
			      // document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
			      // document.getElementById('balanceleave').value = parseInt(balanceleave);

					<?php
					$permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
					if($permis == 1)
					{
					?>
			        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
			        document.getElementById('balanceleave').value = parseInt(balanceleave);
			        // $("#MyElement").addClass("form group label-floating is-empty is-focused");
			        // $('#balanceleave').val(parseInt(balanceleave));
			        <?php
			        }
					?>


				}
            }).attr('readonly', 'readonly');
			
</script>




<script type="text/javascript">

$(document).ready(function() {
	    var entitledleaveE = $('#entitledleaveE').val();
	    var fiscalendE = "<?php echo getFiscalEndDate($orgid)?>";
        var dojE = $('#dojE').val();
        var fiscalendmonthE = fiscalendE.substring(0, 2);
        var joinmonthE = dojE.substring(0, 2);
        var fiscalenddateE = fiscalendE.substring(3, 5);
        var joindateE = dojE.substring(3, 5);
        // alert(fiscalendmonthE);
        // alert(joinmonthE); 


	    if(joinmonthE > fiscalendmonthE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4))+Number(1); 
	     var fiscalenddataE = fiscalendE+"/"+newdojE; 
	    }
	    else if(joinmonthE == fiscalendmonthE && joindateE > fiscalenddateE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4))+Number(1); 
	     var fiscalenddataE = fiscalendE+"/"+newdojE; 
	    }
	    else if(joinmonthE == fiscalendmonthE && joindateE == fiscalenddateE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4)); 
	     var fiscalenddataE = fiscalendE+"/"+newdojE; 
	    }
        else 
        {
        var newdojE=Number(dojE.substr(dojE.length - 4)); 
        var fiscalenddataE = fiscalendE+"/"+newdojE;
        }
        var date1E = new Date(dojE); 
		var date2E = new Date(fiscalenddataE); 
		var Difference_In_TimeE = date2E.getTime() - date1E.getTime(); 
		var Difference_In_DaysE = Difference_In_TimeE / (1000 * 3600 * 24); 
        var bal1E=(entitledleaveE/12);
		var bal2E=(Difference_In_DaysE/30.4167);
		var balanceleaveE=bal1E*bal2E;
        //alert(balanceleave);
        <?php
	    $permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
		if($permis == 1)
		{
		?>
        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
        document.getElementById('balanceleaveE').value = parseInt(balanceleaveE);
        <?php
	    }
		?>

});	


$(document).on("change","#entitledleaveE",function() {

       
	    var entitledleaveE = $('#entitledleaveE').val();
	    var fiscalstartE = "<?php echo getFiscalStartDate($orgid)?>";
	    var fiscalendE = "<?php echo getFiscalEndDate($orgid)?>";
        var dojE = $('#dojE').val();


        if(dojE == '00/00/0000')
        {
        	doNotify('top','center',3,'Please first select date of joining');
        	return false;
        }


        var fiscalstartmonthE = fiscalstartE.substring(0, 2);
        var joinmonthE = dojE.substring(0, 2);
        var fiscalstartdateE = fiscalstartE.substring(3, 5);
        var joindateE = dojE.substring(3, 5);
 

	    if(joinmonthE < fiscalstartmonthE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4))-Number(1); 
	     var fiscalstartdataE = fiscalstartE+"/"+newdojE; 
	    }
	    else if(joinmonthE == fiscalstartmonthE && joindateE < fiscalstartdateE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4))-Number(1); 
	     var fiscalstartdataE = fiscalstartE+"/"+newdojE; 
	    }
	    else if(joinmonthE == fiscalstartmonthE && joindateE == fiscalstartdateE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4)); 
	     var fiscalstartdataE = fiscalstartE+"/"+newdojE; 
	    }
        else 
        {
        var newdojE=Number(dojE.substr(dojE.length - 4)); 
        var fiscalstartdataE = fiscalstartE+"/"+newdojE;
        }


        var fiscalendmonthE = fiscalendE.substring(0, 2);
        var joinmonthE = dojE.substring(0, 2);
        var fiscalenddateE = fiscalendE.substring(3, 5);
        var joindateE = dojE.substring(3, 5);
 

	    if(joinmonthE > fiscalendmonthE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4))+Number(1); 
	     var fiscalenddataE = fiscalendE+"/"+newdojE; 
	    }
	    else if(joinmonthE == fiscalendmonthE && joindateE > fiscalenddateE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4))+Number(1); 
	     var fiscalenddataE = fiscalendE+"/"+newdojE; 
	    }
	    else if(joinmonthE == fiscalendmonthE && joindateE == fiscalenddateE)
	    {
	     var newdojE=Number(dojE.substr(dojE.length - 4)); 
	     var fiscalenddataE = fiscalendE+"/"+newdojE; 
	    }
        else 
        {
        var newdojE=Number(dojE.substr(dojE.length - 4)); 
        var fiscalenddataE = fiscalendE+"/"+newdojE;
        }

        
        var currentTime = new Date()
		var month = currentTime.getMonth() + 1
		var day = currentTime.getDate()
		var year = currentTime.getFullYear()
		var currentdate=(month + "/" + day + "/" + year);

		var startfiscal = Date.parse(fiscalstartdataE);
		var endfiscal = Date.parse(fiscalenddataE);
		var cur_date = Date.parse(currentdate);

		if((cur_date >= startfiscal) && (cur_date <= endfiscal))
		{
			var date1E = new Date(dojE); 
			var date2E = new Date(fiscalenddataE); 
			var Difference_In_TimeE = date2E.getTime() - date1E.getTime(); 
			var Difference_In_DaysE = Difference_In_TimeE / (1000 * 3600 * 24); 
	        var bal1E=(entitledleaveE/12);
			var bal2E=(Difference_In_DaysE/30.4167);
			var balanceleaveE=bal1E*bal2E;
	        //alert(balanceleave);
	        <?php
		    $permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
			if($permis == 1)
			{
			?>
	        //document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
	        document.getElementById('balanceleaveE').value = parseInt(balanceleaveE);
	        <?php
		    }
			?>

		}
        else
        {
            var balanceleaveE=+entitledleaveE;
	        <?php
		    $permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
			if($permis == 1)
			{
			?>
	        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
	        document.getElementById('balanceleaveE').value = parseInt(balanceleaveE);
	        <?php
		    }
			?>
        }

});	



</script>


<script type="text/javascript">
            
			
</script>




<script>
var favorite = [];
function allinactive(){
	if($('.checkbox:checked').length > 0)
	{
		$('#inactiveallemp').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"), function(){            
				favorite.push($(this).val());
			});
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 record to delete');
		
		return false;
	}
}
$(document).on("click", "#allinactiveE", function (e)
				{
				$.ajax({url: "<?php echo URL;?>userprofiles/updateUserStatusinact",
						data: {"favorite":favorite}, 
						
						success: function(result){
						//alert(result);
							if(result == 1)
							{
							$('#inactiveallemp').modal('hide');
							doNotify('top','center',2,'Employee(s) inactivated  successfully'); 
							var table = $("#example").DataTable();
							table.ajax.reload();
							}
						else
							doNotify('top','center',3,'Error occured, try later'); 
								},
						error: function(result)	
						{
							//alert("error");
							doNotify('top','center',4,'Unable to connect API');
						}								
});
				
			});
</script>
		







<script>
	 // $(document).on("change", "#desg", function ()
			// {
            // var id = $(this).val();
			// $.ajax({url: "<?php echo URL;?>userprofiles/getDesignationType",
						// data: {"id":id}, 
						// success: function(result)
						// {
							
						// },
						// error: function(result)	
						// {
							// alert("error");
							
						// }								
				// });
            // });
			
</script>
<script>

var favorite = [];
function QRcode()
{
	if($('.checkbox:checked').length > 0)
	{
			//alert($('.checkbox:checked').length);
			favorite = [];
			$.each($("input[name='chk']:checked"), function(e)
			{ 
 		     
			favorite.push($(this).val());
			//alert(favorite);
		    
			});
			
		$("#favorite").val(favorite);	
		//var test=document.getElementById('favorite').innerHTML = favorite;
	//	alert(test);
        document.getElementById("myFormid").submit();
			//window.open("<?php echo URL; ?>userprofiles/QRcode?favorite="+favorite);
	}
	else
	{
		doNotify('top','center',3,'Select at least 1 employee to generate QR code');
		return false;
	}
	
}
</script>		
	<!-- <script>

		$('input[name="select_all"]').click(function() {
  table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
     var $tr = this.nodes().to$()
     $tr.find('input[name="batch-select"]').prop('checked', true)
   })     
})
	</script> -->
	
<script>
var favorite;
function updateshift(){
	if($('.checkbox:checked').length > 0)
	{
		
		$('#shiftEE').val('0');
		$('#shifts').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"), function(){            
			favorite.push($(this).val());
			 // $('input[name="chk"]:checked').each(function(i, e) {
				// favorite[i] = $(this).val();
			});
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 employee to assign shift');
		return false;
	}
}
$(document).on("click", "#saveshift", function ()
				{
					if($('#shiftEE').val()==0)
					{
						$('#shiftEE').focus();
						doNotify('top','center',4,'Please select the shift');
						return false;
					}
					
						var shift=$('#shiftEE').val();
						// alert(favorite);
				   // alert(lname);
						//console.log(favorite);
						// favorite=JSON.stringify(favorite);
						// console.log(favorite);
						// favorite=JSON.parse(favorite);
						// console.log(favorite);
						$.ajax({url: "<?php echo URL;?>userprofiles/editshifts",
						data: {"shift":shift,"favorite":favorite},
						dataType: "json",						
						success:function(result)
						{
					//	result=JSON.parse(result);
					//	alert(result);
							if(result == 1)
							{
								$('#shifts').modal('hide');
								doNotify('top','center',2,'Shift assigned successfully '); 
								var table = $('#example').DataTable();
								table.ajax.reload();
							}
						else
							doNotify('top','center',3,'Error occured, try later'); 
						},
							error: function(result)	{
							alert("error");
							doNotify('top','center',4,'Unable to connect API');
													}								
								});
					
			});
		
</script>
<script>
var favorite = [];
function updateDepartment(){
	if($('.checkbox:checked').length > 0)
	{
		$('#deptS').val('0');
		$('#department').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"),function(){            
				favorite.push($(this).val());
			});
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 employee to assign department');
		//$('#shifts').modal('hide');
		return false;
	}
}

$(document).on("click", "#savedepartment", function ()
				{
					if($('#deptS').val()==0)
					{
						$('#deptS').focus();
						doNotify('top','center',4,'Please select the department');
						return false;
					}
					
						var deptS=$('#deptS').val();
						$.ajax({url: "<?php echo URL;?>userprofiles/editdepartment",
						data: {"deptS":deptS,"favorite":favorite}, 
						success: function(result){
							//alert(result);
							if(result == 1)
							{
								$('#department').modal('hide');
								doNotify('top','center',2,'Department assigned successfully'); 
								var table =$("#example").DataTable();
								table.ajax.reload();
							}
						else
							doNotify('top','center',3,'Error occured, try later'); 
								},
						error: function(result)	
						{
							
							doNotify('top','center',4,'Unable to connect API');
						}								
});
					
			});
</script>
<script>

var favorite = [];
function updateDesignation(){
	if($('.checkbox:checked').length > 0)
	{
		$('#desgS').val('0');
		$('#designation').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"),function(){            
				favorite.push($(this).val());
			});
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 employee to assign designation');
		//$('#shifts').modal('hide');
		return false;
	}
}

$(document).on("click", "#savedesignation", function ()
				{
					if($('#desgS').val()==0)
					{
						$('#desgS').focus();
						doNotify('top','center',4,'Please select the designation');
						return false;
					}
					
						var desgS=$('#desgS').val();
						$.ajax({url: "<?php echo URL;?>userprofiles/editdesignation",
						data: {"desgS":desgS,"favorite":favorite}, 
						success: function(result){
							//alert(result);
							if(result == 1)
							{
								var table= $("#example").DataTable();
								table.ajax.reload();
								$('#designation').modal('hide');
								doNotify('top','center',2,'Designation assigned successfully');
								// var table= $("#example").DataTable();
								// table.ajax.reload();
							}
						else
							doNotify('top','center',3,'Error occured, try later'); 
								},
						error: function(result)	
						{
							doNotify('top','center',4,'Unable to connect API');
						}								
});
					
			});
</script>

<script>
var favorite = [];
function updateGeolocation(){

$('#geolocationS').selectpicker("deselectAll", true).selectpicker("refresh");
	if($('.checkbox:checked').length > 0)
	{
     $('#geolocationS').selectpicker("deselectAll", true).selectpicker("refresh");
		$('#geolocationS').val('0');
		$('#geolocation').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"), function(){            
				favorite.push($(this).val());
			});
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 employee to assign geo center');
		//$('#shifts').modal('hide');
		return false;
	}
}

function updatelivelocationtracking(){
	if($('.checkbox:checked').length > 0)
	{
		// $('#geolocationS').val('0');
		$('#tracklivelocation').modal('show');
		 favorite = [];
			$.each($("input[name='chk']:checked"), function(){            
				favorite.push($(this).val());
			});
			
		
	}
	else
	{
		//alert('select atleast 1 record to update');
		doNotify('top','center',3,'Select at least 1 employee to Track location');
		//$('#shifts').modal('hide');
		return false;
	}
}
$(document).on("click","#btntrack", function(){

// if (!$("input[name='html_elements']:checked").val()) {
//    alert('Nothing is checked!');
// }
if(!$("input[name='track']:checked").val() )
					{
						// alert("hii");
						// $('input[name=track]'.focus());
						doNotify('top','center',4,'Please select an option');
						return false;
					}
					var enable=$('input[name=track]:checked').val();
					$.ajax({url: "<?php echo URL;?>userprofiles/updatelivetracking",
						data: {"favorite":favorite,"enable":enable}, 
						success: function(result){
							//alert(result);
							if(result == 1)
							{
								document.getElementById('trackloc').reset();
								$('#tracklivelocation').modal('hide');
								doNotify('top','center',2,'Location tracking updated successfully'); 
								var table=$('#example').DataTable();
								table.ajax.reload();
								
							}
						else
							doNotify('top','center',3,'Error occured, try later'); 
								},
						error: function(result)	
						{
							
							doNotify('top','center',4,'Unable to connect API');
						}								
                    });
                });


                $(document).on("click", "#savegeolocation", function ()
				{
					
					if($("#geolocationS").val().length > 10)
				    {
					  doNotify('top','center',4,'Select  atmost 10 geolocation.');
				      return false;
					}
					
					if($('#geolocationS').val()==0)
					{
						$('#geolocationS').focus();
						doNotify('top','center',4,'Please select the geo location');
						return false;
					}
						var geolocation=$('#geolocationS').val();
						
						
						$.ajax({url: "<?php echo URL;?>userprofiles/editgeolocation",
						data: {"geolocation":geolocation,"favorite":favorite}, 
						success: function(result){
							//alert(result);
							if(result == 1)
							{
								$('#geolocation').modal('hide');
								doNotify('top','center',2,'Geo location assigned successfully'); 
								var table = $('#example').DataTable();
								table.ajax.reload();
							}
						    else
							doNotify('top','center',3,'Error occured, try later'); 
								},
						error: function(result)	
						{
							
							doNotify('top','center',4,'Unable to connect API');
						}								
                  });
					
			});
		
</script>


	<script type="text/javascript">
			var names=[];
			//alert(names);
	
	
	  
    	//$(document).ready(function() { 
		// $(".datepicker" ).datepicker({
		// 		format: 'mm/dd/yyyy',
		// 		changeMonth: true,
		// 		changeYear: true,
  //               yearRange: "1900:2050"				
		// 	}); 
			
			
		$(document).ready(function(){		
	    var table;
		
		$(function(){
		

		var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
		var datestring="&date=";
	    var date = new Date();
		date.setMinutes(0);
		date.setSeconds(0);
		date.setMilliseconds(0);

		var isoDateString = date.toISOString().substring(0,10);

   
		var ts;
		var ts1;
		var ss;
		
		
		
		var table=$('#example').DataTable( {
					//"bProcessing": true,
					"StateSave":true,
					"printable": true,
					"paging": true,
					//order: [[ 0, 'asc' ]],
					"orderable": true,
					dom: 'Bfrtip',
				    //order: [[ 5, 'asc' ]],
					//"paging": true,
					 // "processing": true,
					/*  language: {
							'loadingRecords': '&nbsp;',
							//'emptyTable':     'Loading...',
							'processing': 'Loading...'
						}, */ 
					  //"ServerSide": true,
					  //"Filter": true,
					   //"bSortable": true,
					   //"bSort": false,  
					   //"ordering": false,           
						
						//"searching": true,   
						
						 
						//"bRetrieve": true,
					
			 		
					//dom: 'Bfrtip',
					//"bDestroy": true,// destroy data table before reinitializing
				   //"scrollX": true,
				    //"contentType": "application/json",
					
					
					"columnDefs": [
                  { "className": "dt-center", "visible": false, "targets": [4,8,10,11,12,13,14,15] },
				  
				  
                  ],
					
					
					buttons: [

				    'pageLength',
					{
		                extend: 'csvHtml5',
		                exportOptions: {
		                columns: [ 1, 3, 4, 5, 6, 7, 8, 9,11 ]
		                }
		            },

		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [ 1, 3, 4, 5, 6, 7, 8,9, 11]
		                }
		            },
							   
					{
		                extend: 'copyHtml5',
		                exportOptions: {
		                    columns: [ 0, ':visible' ]
		                }
		            },
					  {
			            extend: 'print',
			            // autoPrint: false,
			            title: '',
			            exportOptions: {
			                // columns: ':visible',
			               columns: [ 1, 2, 3, 4, 5, 6, 7, 8,9, 11],
			                stripHtml: false,
			            },
			            repeatingHead:{
			               logo: '<?=URL?>../assets/img/newlogo.png',
			               logoPosition: 'center',
			                logoStyle: 'height:100px;width:130px;',
			                title: 'Active employees of '+org+' Dated '+isoDateString+'',
			                
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
					  "columns":':not(:first-child)',
					}

					
				],
				
				
				
				
				 // columnDefs: [ { orderable: false, targets: [0]}],
	            
				  
				  // "lengthMenu": [[10,100],[10,100]],
				// "bDestroy": false,
				//"searchable": false,
				
				
				//"targets"  : 'no-sort'
				"contentType": "application/json",
				"ajax": "<?php echo URL;?>userprofiles/getEmployeesData",
				//"dom": 'T<"clear">lfrtpi<"clear">',	
				"columns": [
					{ "data": "change"},
					{ "data": "code" },
					{ "data": "photo"},
					{ "data": "name" },
					
					{ "data": "username" },
					{ "data": "department"},
					{ "data": "designation"},
					{ "data": "shift" },
					{ "data": "shifttype" },
					{ "data": "contact" },
					{ "data": "country" },
					{ "data": "timezone" },
					{ "data": "hourlyrate" },
					{ "data": "status" },
					{ "data": "livetrack" },
					{ "data": "area" },
					//{ "data": "password" },
					{ "data": "pemissions" },
					{ "data": "action"}
				]
			});
			
			
		});   
		
		
		//});

           

			  
			
			//table.columns( [0] ).visible( true );
			// var dataSelected = dataTable.rows({ selected: true }).data();
			
			
			
			
			
			
			$('.addemp').click(function(){ 


			    var userlimit = '<?php echo $userlimit ?>';
			    var regusers = '<?php echo $reguser ?>';
			    var status = '<?php echo $status ?>';
			    // alert(parseInt(userlimit) + 5);

			    if(regusers > parseInt(userlimit) + 5 && status == 1){
			    	doNotify('top','center',4,'Please upgrade your plan as userlimit exceeded.');
			    	return false;
			    }
			});


			


			 $('#save').click(function(){
			
			var restrictfence = $('input[name=fenceopt]:Checked').val();
			if(restrictfence==undefined){
				restrictfence=0;

			}
			//alert(restrictfence);
	    	var len = $("#cont").val().length;
			    var email = $('#email').val();
				//alert($('#cont').val().length);
				  var check=1;
				  if($('#firstName').val().trim()==''){
					  $('#firstName').focus();
						doNotify('top','center',4,'Please enter the full name');
						return false;
				  }
				  <?php  $permis = getAddonPermission($_SESSION['orgid'],'Addon_GeoFence');
				  if($permis == 1)
				  {
				  ?>
				  if($('#areaAssign').val()=='')
				  {  
				    if($("#areaAssign").val().length > 10)
				    {
					  doNotify('top','center',4,'Select  atmost 10 geolocation.');
				      return false;
					}
				  }

				  <?php  } ?>  

				  //   if($('#country').val()=='0'){
					   
					 //  $('#country').focus();
						// doNotify('top','center',4,'Please select the country');
						// return false;
				  // }
				 //  	if($("#areaAssign").val().length > 10)
				 //    {
					//   doNotify('top','center',4,'Select  atmost 10 geolocation.');
				 //      return false;
					// }
				  //     if($('#country').val()=='0'){
					 //   <?php if($_SESSION['specialCase']!='RAKP') { ?>  
					 //  $('#country').focus();
						// doNotify('top','center',4,'Please select the country');
						// return false;
						// <?php } ?>
				  // }
				  // if($('#lastName').val().trim()==''){
					 //  $('#lastName').focus();
						// doNotify('top','center',4,'Please enter the last name.');
						// return false;
				  // }
				  <?php //if($_SESSION['specialCase']=='RAKP') { ?>
					  // if($('#ecode').val().trim()==''){
						  // $('#ecode').focus();
							// doNotify('top','center',4,'Please enter the Employee code.');
							// return false;
					  // }
				   <?php //} ?>
				  // if($('#email').val().trim()==''){
					  // <?php //if($_SESSION['specialCase']=='RAKP') { ?>
					  // $('#email').focus();
						// doNotify('top','center',4,'Please enter the Email Id.');
						// return false;
					  // <?php //} ?>
				  // }

				
				  		 
				if(!$('#email').val().trim()==''){						 
					if (!validate_Email(email)) {
					doNotify('top','center',4,'Please enter valid email Id');
						return false;
						e.preventDefault();
						}
				}
				function validate_Email(email) 
				{
						var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
						if (expression.test(email))
							{
								return true;
							}
						else {
							return false;
							}
					}
				 /*   
			  if($('#email').val()==''){
					  $('#email').focus();
						doNotify('top','center',4,'Please enter the email.');
						return false;
				  }
	
     			
    			if (validate_Email(email)) {
    			alert('Nice!! your Email is valid, now you can continue..');
    				}
    			else {
    				alert('Invalid Email Address');
    				e.preventDefault();
    				}
 
    			  function validate_Email(email) {
    				var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    				if (expression.test(email)) {
    				return true;
    				}
    				else {
    					return false;
    					}
    					}
	
				  
				if($("#email").val().match(' /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/')){
					$('#email').focus();
					doNotify('top','cenetr',4,'please enter the correct email');
					return false;
				}*/
				
				   if($('#cont').val().trim()==''){
					  $('#cont').focus();
						doNotify('top','center',4,'Please enter the contact no.');
						return false;
				  }
				     if(len < 8){
					  $('#cont').focus();
						doNotify('top','center',4,'Please enter the valid contact no.');
						return false;
				  }	
				  if(isNaN($('#cont').val())){
					 // alert('ok');
					  $('#cont').focus();
						doNotify('top','center',4,'Contact no. can contains digits only');
						return false;
				  }	 
				 
				  // if($('#password').val().trim()==''){
					  // $('#password').focus();
						// doNotify('top','center',4,'Please enter the Password.');
						// return false;
				  // }
				   // if($('#password').val().trim().length<6){
					  // $('#password').focus();
						// doNotify('top','center',4,'Password must contains at least 6 characters');
						// return false;
				  // }
				  
				  // if($('#cpassword').val().trim() == ''){
					  // $('#cpassword').focus();
						// doNotify('top','center',4,'Please enter the confirm password.');
						// return false;
				  // }
				  
				  // if($('#password').val().trim() != $('#cpassword').val().trim()){
					 // $('#password').focus();
                     // $('#cpassword').focus();
                        // doNotify('top','center',4,'Please check confirm password.');
						// return false;					 
					  
				  // }
				  
				  if($('#shift').val()=='0')
				  {
					  $('#shift').focus();
						doNotify('top','center',4,'Please select the shift');
						return false;
				  }
				    // if($('#profile').val()=='')
					// {
					  // $('#profile').focus();
						// doNotify('top','center',4,'Please browse the file.');
						// return false;
				    // }
				  if($('#dept').val()=='0')
				  {
					  <?php if($_SESSION['specialCase']!='RAKP') { ?>  
					  $('#dept').focus();
						doNotify('top','center',4,'Please select the department');
						return false;
					<?php } ?>
				  }
				   if($('#desg').val()=='0'){
					   <?php //if($_SESSION['specialCase']!='RAKP') { ?>  
					  $('#desg').focus();
						doNotify('top','center',4,'Please select the designation');
						return false;
						<?php //} ?>
				  }
				  if($('#dob').val()=='')
				  {
					  $('#dob').focus();
						doNotify('top','center',4,'Please enter the date of birth');
						check=0;
				  }
				  if($('#doj').val()=='')
				  {
					  $('#doj').focus();
						doNotify('top','center',4,'Please enter the date of joining');
						check=0;
				  }
				  if($('#doc').val()=='')
				  {
					  $('#doc').focus();
						doNotify('top','center',4,'Please enter the DOC');
						check=0;
				  }
				  
				  if($('#bg').val()=='0')
				  {
					  $('#bg').focus();
						doNotify('top','center',4,'Please select the blood group');
						check=0;
				  }
				 
				  if($('#ms').val()=='0'){
					  $('#ms').focus();
						doNotify('top','center',4,'Please select the marital status');
						check=0;
				  }
				  
				  if($('#rel').val()=='0'){
					  $('#rel').focus();
						doNotify('top','center',4,'Please select the religion');
						check=0;
				  }
				  
				  if($('#nationality').val()=='0'){
					  $('#nationality').focus();
						doNotify('top','center',4,'Please select the nationality');
						check=0;
				  }
				  
				  if($('#country').val()=='0'){
					  $('#country').focus();
						doNotify('top','center',4,'Please select the country');
						check=0;
				  }
				  //  if($('#timezone').val()=='0'){
					 //  $('#timezone').focus();
						// doNotify('top','center',4,'Please select the timezone');
						// check=0;
				  // }

				  if($('#city').val()=='0'){
					  $('#city').focus();
						doNotify('top','center',4,'Please select the city');
						check=0;
				  }
				  if($('#addr').val()==''){
					  $('#ms').focus();
						doNotify('top','center',4,'Please enter the corresponding address');
						check=0;
				  }
				  if(check==0)
					  return false;
				  
				   var fname=$('#firstName').val().trim();
				   // var lname=$('#lastName').val().trim();
				   var area=$("#areaAssign").val();
				   var dob=$('#dob').val();
				   var doj = $('#doj').val();
			       var entitledleave = $('#entitledleave').val();
			       var balanceleave = $('#balanceleave').val();
				   var doc=$('#doc').val();
				   var gen=$('#gen').val();
				   var nat=$('#nationality').val();
				   var ms=$('#ms').val();
				   var rel=$('#rel').val();
				   var bg=$('#bg').val();
				   var dept=$('#dept').val();
				   var desg=$('#desg').val();
				   var shift=$('#shift').val();
				   var sts= 1;//$('#status').val();
				   var sts1=$('#sstatus').val();
				   var country=$('#country').val();
				   var timezone=$('#timezone').val();
				   var city=$('#city').val();
				   var email=$('#email').val().trim();
				   //var password=$('#password').val().trim();
				   var password=123456;
				   var addr=$('#addr').val();
				   var cont=$('#cont').val().trim();
				 //  alert(cont);
			       var hourlyrate=$('#hourlyrate').val();
			       var ecode='';
			   if($('#ecode').val()!=undefined)
					 ecode=$('#ecode').val().trim();


				 // if(entitledleave > 50){
				 //  doNotify('top','center',4,'Entitled leave should not be greater than 50');
				 //  return false;
			  //    }

			  	<?php
				if($orgid == 69640)
				{
				?>
					if(entitledleave > 120)
					{
					doNotify('top','center',4,'Entitled leave should not be greater than 120');
					return false;
				    }
			    <?php
				}
				else
				{
				?>
					if(entitledleave > 50)
					{
				    doNotify('top','center',4,'Entitled leave should not be greater than 50');
					return false;
				    }
				<?php
				}
				?>
				 
				 var  formdata = new FormData();
				//formdata.append("file", document.getElementById('profile').files[0]);
				  formdata.append('prof',$('#profile').prop("files")[0]);
				  formdata.append('fname',fname);
				  formdata.append('area',area);
				  // formdata.append('lname',lname);
				  formdata.append('dob',dob);
				  formdata.append('doj',doj);
				  formdata.append('entitledleave',entitledleave);
				  formdata.append('balanceleave',balanceleave);
				  formdata.append('doc',doc);
				  formdata.append('gen',gen);
				  formdata.append('nat',nat);
				  formdata.append('ms',ms);
				  formdata.append('rel',rel);
				  formdata.append('bg',bg);
				  formdata.append('dept',dept);
				  formdata.append('desg',desg);
				  formdata.append('shift',shift);
				  formdata.append('sts',sts);
				  formdata.append('sts1',sts1);
				  formdata.append('country',country);
				  formdata.append('timezone',timezone);
				  formdata.append('city',city);
				  formdata.append('email',email);
				  formdata.append('password',password);
				  formdata.append('addr',addr);
				  formdata.append('PersonalNo',cont);
				  formdata.append('ecode',ecode);
				  formdata.append('ecode',ecode);
				  formdata.append('hourlyrate',hourlyrate);
				 
				  formdata.append('restrictfence',restrictfence);
				 
					///// pre loader////
					
					
				   $("#loadmodel").modal('show'); 
				   
				   $.ajax({
					    processData: false,
						contentType: false,
					     url: "<?php echo URL;?>userprofiles/insertUsermaster",
						 data: formdata,
						 datatype:"json",
						 type:"post",
						
				  // data: {"fname":fname,"area":area,"lname":lname,"dob":dob,"doj":doj,"doc":doc,"gen":gen,"nat":nat,"ms":ms,"rel":rel,"bg":bg ,"dept":dept ,"desg":desg ,"shift":shift ,"sts":sts ,"sts1":sts1,"country":country ,"city":city ,"email":email ,"password":password ,"addr":addr ,"PersonalNo":cont,"ecode":ecode,"hourlyrate":hourlyrate},
				   
				   // data: {"fname":fname,"lname":lname,"dob":dob,"doj":doj,"doc":doc,"gen":gen,"nat":nat,"ms":ms,"rel":rel,"bg":bg ,"dept":dept ,"desg":desg ,"shift":shift ,"sts":sts ,"country":country ,"city":city ,"email":email ,"password":password ,"addr":addr ,"PersonalNo":cont},
					 
						success: function(result){
							 $("#loadmodel").modal('hide'); 
							if(result == 4){
								//$('#addEmp').modal('hide');
								doNotify('top','center',2,'Employee added successfully');
								//table.ajax.reload();
								document.getElementById('empFrom').reset();
								$('#addEmp').modal('hide');
								var table = $('#example').DataTable();   
								table.ajax.reload();
						 // 	setInterval(function() {
							// 	 location.reload();
							// }, 1200);
								
								
							}else if(result == 1){
								doNotify('top','center',4,'Duplicate email id found');
							
							}else if(result == 2){
								doNotify('top','center',4,'Duplicate phone no. found');
							
							}else if(result == 3){
								doNotify('top','center',4,'Employee code is already exist');
							}

						 },
						error: function(result){
							$("#loadmodel").modal('hide');
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
			});
			 var emailV = 0; // this var use for email... if email exist then it can not left blank


       //first name field not contain space

			 	// $(function() {
			  //   $('#firstNameE').keydown(function(e) {
			  //     if (e.shiftKey || e.ctrlKey || e.altKey) {
			  //       e.preventDefault();
			  //     } else {
			  //       var key = e.keyCode;
			  //       if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
			  //         e.preventDefault();
			  //       }
			  //     }
			  //   });
			  // });

			 	// $(function() {
			  //   $('#firstName').keydown(function(e) {
			  //     if (e.shiftKey || e.ctrlKey || e.altKey) {
			  //       e.preventDefault();
			  //     } else {
			  //       var key = e.keyCode;
			  //       if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
			  //         e.preventDefault();
			  //       }
			  //     }
			  //   });
			  // });


		//first name field only contain single space
		

		// var i=0;
  //       jQuery("#firstNameE").on('keypress',function(e){
  //           //alert();
  //           if(jQuery(this).val().length < 1){
  //               if(e.which == 32){
  //                   // alert("Space Should not allow in first name but it will allows only a single space in between middle name!!!");
  //               return false;
  //               }   
  //           }
  //           else {
  //           if(e.which == 32){
  //               if(i != 0){
  //               return false;
  //               }
  //               i++;
  //           }
  //           else{
  //               i=0;
  //           }
  //           }
  //       });	 	


			$('#saveE').click(function(){
				
	var restrictfence = $('input[name=fenceopt]:Checked').val();
	if(restrictfence==undefined){
				restrictfence=0;
			}
			//alert(restrictfence);


				var len = $("#contE").val().length;
				  var check=1;
				  
			

				  
				  
				 if($('#firstNameE').val().trim()==''){
					  $('#firstNameE').focus();
						doNotify('top','center',4,'Please enter the first name');
						return false;
						check=0;
						
				  }

                    

				  <?php  $permis = getAddonPermission($_SESSION['orgid'],'Addon_GeoFence');
				  if($permis == 1)
				  {
				  ?>  
				  if($('#areaAssignE').val()=='')
				  {
				    if($("#areaAssignE").val().length > 10)
				    {
					  doNotify('top','center',4,'Select  atmost 10 geolocation.');
				      return false;
					}
				  }
                  <?php  } ?>  

				 /* if($('#lastNameE').val().trim()==''){
					  $('#lastNameE').focus();
						doNotify('top','center',4,'Please enter the last name.');
						return false;
						check=0;
				  }	*/
				// if($('#ecode').val().trim()==''){
						  // $('#ecode').focus();
							// doNotify('top','center',4,'Please enter the Employee code.');
							// return false;
					  // }				  
				  if($('#dobE').val()==''){
					  $('#dobE').focus();
						doNotify('top','center',4,'Please enter the date of birth');
						return false;
						check=0;
				  }
				  if($('#dojE').val()=='')
				  {
					$('#dojE').focus();
					doNotify('top','center',4,'Please enter the date of joining');
					return false;
					check=0;
				  }
				  if($('#docE').val()==''){
					  $('#docE').focus();
						doNotify('top','center',4,'Please enter the DOC');
						return false;
						check=0;
						
				  }
				  if($('#deptE').val()=='0'){
					
					  $('#deptE').focus();
						doNotify('top','center',4,'Please select the department');
						return false;
						check=0;
				  }
				  if($('#desgE').val()=='0'){
					  <?php //if($_SESSION['specialCase']!='RAKP') { ?>
					  $('#desg').focus();
						doNotify('top','center',4,'Please enter the designation');
						return false;
						check=0;
						
					  <?php //} ?>
				  }
				  if($('#shiftE').val()=='0')
				  {
					  $('#shiftE').focus();
						doNotify('top','center',4,'Please enter the shift');
						return false;
						check=0;
						
				  }
				  /*if($('#emailEE1').val()==''){
					  $('#emailE').focus();
						doNotify('top','center',4,'Please enter the email.');
						check=0;
				  }*/
				  if($('#contE').val().trim()=='')
				  {
				  	$('#contE').focus();
				  	doNotify('top','center',4,'Please enter the contact no.');
					return false;
				  	check=0;
				  }
				
				  if(len< 8)
				  {
				  	$('#contE').focus();
				  	doNotify('top','center',4,'Please enter the valid contact no.');
					return false;
					check=0;
					
					
				  }
				  if($('#passwordE').val().trim()==''){
					  $('#passwordE').focus();
						doNotify('top','center',4,'Please enter the password');
						return false;
				  }
				   if($('#passwordE').val().trim().length<6){
					  $('#passwordE').focus();
						doNotify('top','center',4,'Password must contain at least 6 characters');
						return false;
				  }
				  // if($('#emailEE1').val().trim()=='' && emailV==1 ){
				  	// $('#emailEE1').focus();
				  	// doNotify('top','center',4,'Please enter the Email.');
				  	// check=0;
				  // }
				  // if(!$('#email').val()=='')
				  // {						 
					// if (!validate_Email(email)) {
					// doNotify('top','center',4,'Please enter valid email Id');
						// return false;
						// e.preventDefault();
						// }
			   	 // }
				// if(emailV==1)
				 // {
				  	// $('#emailEE1').focus();
				  	// doNotify('top','center',4,'Please enter the Email.');
				  	// check=0;
				 // }

				 /* if(!$('#emailEE1').val().trim()==''){	      					 
					if (!validate_Email(email)) {
					doNotify('top','center',4,'Please enter valid email Id');
						return false;
						e.preventDefault();
						}
				} */
				 
				function validate_Email(email) {
						var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
						if (expression.test(email)) {
						return true;
						}
						else {
							return false;
							 }
					}
				  if($('#bgE').val()=='0'){
					  $('#bgE').focus();
						doNotify('top','center',4,'Please select the blood group');
						return false;
						check=0;
						
				  }
				  if($('#msE').val()=='0'){
					  $('#msE').focus();
						doNotify('top','center',4,'Please select the marital status');
						return false;
						check=0;
						
				  }
				  if($('#relE').val()=='0'){
					  $('#relE').focus();
						doNotify('top','center',4,'Please select the religion');
						return false;
						check=0;
						
				  }
				  if($('#nationalityE').val()=='0'){
					  $('#nationalityE').focus();
						doNotify('top','center',4,'Please select the nationality');
						return false;
						check=0;
						
				  }
				  if($('#countryE').val()=='0'){
					  $('#countryE').focus();
						doNotify('top','center',4,'Please select the country');
						return false;
						check=0;
						
				  }
				  if($('#timezoneE').val()=='0'){
					  $('#timezoneE').focus();
						doNotify('top','center',4,'Please select the timezone');
						return false;
						check=0;
						
				  }

				  if($('#cityE').val()=='0')
				  {
					  $('#cityE').focus();
						doNotify('top','center',4,'Please select the city');
						return false;
						check=0;
						
				  }
				  if($('#addrE').val()==''){
					  $('#msE').focus();
						doNotify('top','center',4,'Please enter the corresponding address');
						return false;
						check=0;
				  }
				
			  if(check==0)
					  return false;
				  
				   var fname=$('#firstNameE').val().trim();
				   //alert($('#firstNameE').val().trim());
				   // var lname=  "";//$('#lastNameE').val().trim();
				   var areaE=$('#areaAssinE').val();
				   
				 
				   
				   if(areaE=="" || areaE==null){
					   for(var i=0; i<names.length; i++){
						   areaE+=names[i];
						   if(i!=names.length-1){
							   areaE+=',';
							   
						   }
						   
					   }
					   //alert(areaE);
					   //console.log(names);
				   }
				   var dob=$('#dobE').val();
				   var doj=$('#dojE').val();
				   //alert(doj);
				   var doc=$('#docE').val();
				   var gen=$('#genE').val();
				   var nat=$('#nationalityE').val();
				   var ms=$('#msE').val();
				   var rel=$('#relE').val();
				   var bg=$('#bgE').val();
				   var dept=$('#deptE').val();
				   var desg=$('#desgE').val();
				   var shift=$('#shiftE').val();
				   var sts=$('#statusE').val();
				   var country=$('#countryE').val();
				   var timezone=$('#timezoneE').val();
				   //alert(timezone);
				   var city=$('#cityE').val();
				   var email=$('#emailEE1').val().trim();
				   var password=$('#passwordE').val();
				   
				   var addr=$('#addrE').val();
				   var cont=$('#contE').val();
				   var empid = $("#id").val();
				   
				   var sstatus = $("#sstatusE").val();
				   var hourlyrateE = $("#hourlyrateE").val();
				   var entitledleaveE = $("#entitledleaveE").val();
				   var balanceleaveE = $("#balanceleaveE").val();

				   


                // if(entitledleaveE > 50){
				// doNotify('top','center',4,'Entitled leave should not be greater than 50');
				// return false;
			    // }

				<?php
				if($orgid == 69640)
				{
				?>
					if(entitledleaveE > 120){
					doNotify('top','center',4,'Entitled leave should not be greater than 120');
					return false;
				    }
			    <?php
				}
				else
				{
				?>
					if(entitledleaveE > 50){
				    doNotify('top','center',4,'Entitled leave should not be greater than 50');
					return false;
				    }
				<?php
				}
				?>


				 /* if(entitledleaveE == ""){
				doNotify('top','center',4,'Please enter leave entitled');
				return false;
			    } */




	
				 // alert($("#hourlyrateE").val());
				   var ecode='';
				   if($('#ecodeE').val()!=undefined)
						ecode=$('#ecodeE').val().trim(); 
				   var areaE = '';
				   if($('#areaAssinE').val()!=undefined)
				   areaE=$('#areaAssinE').val();
			   
			   
			   
			   
			   var  formdata = new FormData();
				  formdata.append('profE',$('#profileE').prop("files")[0]);
				  formdata.append('fname',fname);
				  formdata.append('areaE',areaE);
				  //formdata.append('lname',lname);
				  formdata.append('dob',dob);
				  formdata.append('doj',doj);
				  formdata.append('doc',doc);
				  formdata.append('gen',gen);
				  formdata.append('nat',nat);
				  formdata.append('ms',ms);
				  formdata.append('rel',rel);
				  formdata.append('bg',bg);
				  formdata.append('dept',dept);
				  formdata.append('desg',desg);
				  formdata.append('shift',shift);
				  formdata.append('sts',sts);
				  formdata.append('sstatus',sstatus);
				  formdata.append('country',country);
				  formdata.append('timezone',timezone);
				  formdata.append('city',city);
				  formdata.append('email',email);
				  formdata.append('password',password);
				  formdata.append('addr',addr);
				  formdata.append('PersonalNo',cont);
				  formdata.append('ecode',ecode);
				  formdata.append('hourlyrateE',hourlyrateE);
				  formdata.append('empid',empid);
				  formdata.append('entitledleaveE',entitledleaveE);
				  formdata.append('balanceleaveE',balanceleaveE);
				  formdata.append('restrictfence',restrictfence);
			//alert(formdata);
				   
				   $.ajax({
					   processData: false,
					contentType: false,
					url: "<?php echo URL;?>userprofiles/editUsermaster",
					data: formdata, //,"email":email
					datatype:"json",
					 type:"post",
                   //data: {"fname":fname,"areaE":areaE,"lname":lname,"dob":dob,"doj":doj,"doc":doc,"gen":gen,"nat":nat,"ms":ms,"rel":rel,"bg":bg ,"dept":dept ,"desg":desg ,"shift":shift ,"sts":sts ,"sstatus":sstatus,"country":country ,"city":city  ,"password":password ,"addr":addr ,"PersonalNo":cont, "empid":empid,"ecode":ecode,"hourlyrateE":hourlyrateE,"email":email}, //,"email":email
				   success: function(result)
				   {
					  if(result==3)
					  {
						   doNotify('top','center',3,'Employee code already exist'); 
					  }else if(result==4){
						   doNotify('top','center',3,'Duplicate phone no. found'); 
					  }
					  else if(result==2)
					  {
						 doNotify('top','center',3,'Duplicate email id found');  
					  }
					  else if(result == 1){
						
						 doNotify('top','center',2,'Employee details updated successfully'); 
						 $('#addEmpE').modal('hide');
						var table=$('#example').DataTable();
								  //table.ajax.reload(null, false);
						 	setInterval(function() {
								 window.location.reload();
							}, 2000); 
							//table.ajax.reload(); 
							//window.location.reload();
					  }
					  else
						doNotify('top','center',3,'Error occured, try later'); 
					}
					});
			});
             
            var zone="";

			$(document).on("click", ".edit", function (){
				
			     	$('.checkbox').each(function()
						 {
							this.checked = false;
						});
						
						
					$('#select_all').each(function()
						 {
							this.checked = false;
						});
						
				 emailV = 0;
				$('#id').val($(this).data('id'));
				if($(this).data('lastname')!=""){
				$('#firstNameE').val($(this).data('firstname') + ' ' + $(this).data('lastname'));
			}
			else{
				$('#firstNameE').val($(this).data('firstname'));
			}
				//$('#lastNameE').val();
				//alert($(this).data('area'));
				$('#areaAssinE').val($(this).data('area'));
				//alert($(this).data('area'));
				$('#passwordE').val($(this).data('password'));	
				//alert($(this).data('password'));
				$('#dobE').val($(this).data('dob'));
				$('#dojE').val($(this).data('doj'));	
				$('#docE').val($(this).data('doc'));	
				$('#nationalityE').val($(this).data('nat'));	
				$('#msE').val($(this).data('ms'));	
				$('#relE').val($(this).data('rel'));	
				$('#bgE').val($(this).data('bg'));	
				$('#desgE').val($(this).data('desg'));	
				$('#shiftE').val($(this).data('shift'));	 
				$('#statusE').val($(this).data('status'));	
				$('#countryE').val($(this).data('country'));
				//var timezonename=$(this).data('timezonename');
				
				zone=$(this).data('timezone');
				//alert(zone);
                //var options="";
				//options+="<option value='"+timezone+"'>"+timezonename+"</option>";
				//$("#timezoneE").html(options);

                $('#cityE').val($(this).data('city'));	
				$('#emailEE1').val($(this).data('email'));	
				$('#imageE').val($(this).data('image'));
				$('#hourlyrateE').val($(this).data('hourlypay'));
				// alert ($(this).data('desg'));
				$as=$(this).data('area');
			    $ass=($as).toString().split(",");
			    $('.selectpicker').selectpicker('val',$ass);
				
				// var img="<?php echo base_url()."uploads/".$_SESSION['orgid']."/"?>"+$(this).data('image');
				// $("#imageE").attr("src",img);	
				
				if($(this).data('image') != "")
				{
				 // var ii="<?php echo IMGURL3."uploads/".$_SESSION['orgid']."/"?>"+$(this).data('image');
					// $("#imageE").attr("src",ii);

				var ii=$(this).data('image');
					$("#imageE").attr("src",ii);
				}
				else
				{
				if($(this).data('gen')==1)
				{
				var ii="<?php echo IMGURL3."avatars/male.png"?>";
				$("#imageE").attr("src",ii);	
				}
				else if($(this).data('gen')==2)
				{
				var ii="<?php echo IMGURL3."avatars/female.png"?>";
				$("#imageE").attr("src",ii);	
				}
				else
				{
				var ii="<?php echo IMGURL3."avatars/male.png"?>";
				$("#imageE").attr("src",ii);	
				}
				}
				
				
				  if($(this).data('email') != "")
				 {
					 emailV = 1;
				 }
				
				$('#addrE').val($(this).data('addr'));	
				$('#contE').val($(this).data('cont'));			
				$('#deptE').val($(this).data('dept'));			
				$('#genE').val($(this).data('gen'));
				$('#sstatusE').val($(this).data('sstatus'));
				$('#ecodeE').val($(this).data('ecode'));
				$('#hourlyrateE').val($(this).data('hourlypay'));
                $('#entitledleaveE').val($(this).data('entitledleave'));
                if($(this).data('balanceleave')=='00/00/0000')
                {
                $('#balanceleaveE').val("N/A");
                }
                else
                {
                $('#balanceleaveE').val($(this).data('balanceleave'));	
                }
                


			
			
			var geoArr12 = $(this).data('area')+',';
			
			//var geoArr= $(this).data('area').split(',');
			var geoArr= geoArr12.split(',');
			
			
				
			});





			var sid = 0;
			var ssts =  "";
			$(document).on("click", ".status", function (){
				//alert($(this).data('id'));
				   $('.checkbox').each(function()
						 {
							this.checked = false;
						});
							
					$('#select_all').each(function()
						 {
							this.checked = false;
						 });  
				   // $("#sname").text("Do you want to change '"+$(this).data('ena')+"' status as Inactive?");
				   $("#sname").text('Make "'+$(this).data('ena').trim()+'" Inactive?');
				   $("#changestatus").modal("show");
				   sid = $(this).data('id');
				   ssts = $(this).data('sts');;
				});
			$("#savestatus").click(function(){
				 id=sid;
				 sts=ssts;
				 // alert (sts);
				 // return;
				$.ajax({url: "<?php echo URL;?>userprofiles/updateUserStatus",
				
						data: {"id":id,"sts":1},
						success: function(result){
							if(result == 1){	
								 doNotify('top','center',2,'Employee status updated successfully');
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
			
			
		<!---------------start-------------->
		
		
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
			});
			
			$(document).on("click", ".pop",function ()
			{
				$('#imgid').val($(this).data('id'));
			//	$('#profileimg').val($(this).data('enimage'));
			//	alert($(this).data('enimage'));
				$('.imagepreview').attr('src', $(this).find('img').attr('src'));
				
				$('#imagemodal').modal('show');   
			});
		



$('.delete1').on('click', function(e) {
	 $("#profile").val(null);
	 $("#imageAdd").attr("src","<?php IMGURL3."avatars/male.png"?>");
      
   });
$('.delete2').on('click', function(e) 
{ 
$("#imageE").attr("src","<?php IMGURL3."avatars/male.png"?>");
 //$("#profileE").val(null);
var empid = $("#id").val();
var imageE = $("#imageE").val();
	  $.ajax({
					 
					url: "<?php echo URL;?>userprofiles/deleteimg",
					datatype:"json",
					 type:"post",
                  data:{"empid":empid,"imageE":imageE}, 
				   success: function(result)
				   {
					   
					   $('#example').DataTable().ajax.reload();	
				   }
					});
	 
   }); 
   
   
			$(document).on("click", ".delete", function () {
				$('.checkbox').each(function()
					 {
						this.checked = false;
					});
						
					$('#select_all').each(function()
						{
							this.checked = false;
						});
				
				$('#del_id').val($(this).data('id'));
				$('#na').text($(this).data('name').trim());
			});
			$(document).on("click", "#delete", function (){
						$("#maincontainerdiv").css("opacity","0.08");
						$("#addEmp").css("opacity","0.02");
						$("#loader").show("slow");
					  
				var id=$('#del_id').val(); 
				// alert(id);
				// return;
				$.ajax({url: "<?php echo URL;?>userprofiles/deleteUser",
						data: {"sid":id},
						success: function(result){
							
							if(result == 1){
								 $('#delEmp').modal('hide');
								 doNotify('top','center',2,'Employee archived successfully'); 
								 var table= $('#example').DataTable();
								 table.ajax.reload(null, false);  
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
			
		
       <!-- This code for get the time zone according to country on edit button (start)-->

        

		$(document).on("click", "#get",function () {
			
				var country = $("#countryE").val();
				//alert(country);
				$.ajax({url: "<?php echo URL;?>userprofiles/timezone",
				data: {"country":country},
					success: function(result){
					result=JSON.parse(result);
                    //alert(result);
					
					var options="";
					
					//alert(zone);
					for(var i=0;i<result.data.length;i++){
						
						options+="<option value='"+result.data[i].timezone_id+"'>"+result.data[i].timezone+"</option>";
						
					}
					
					
                   var temp="";
				   
				   temp=temp+options;
				   
				   $("#timezoneE").html(temp);
				   $("#timezoneE").val(zone);

				   
					},
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})

		<!-- This code for get the time zone according to country on edit button  (end)-->

        <!-- This code for get the time zone according to country (start)-->

        $(document).on("change", "#countryE", function () {
			
				var country = $(this).val();
				//alert(country);
				$.ajax({url: "<?php echo URL;?>userprofiles/timezone",
						data: {"country":country},
					success: function(result){
					result=JSON.parse(result);

					
					var options="";
					
					for(var i=0;i<result.data.length;i++){
						
						options+="<option value='"+result.data[i].timezone_id+"'>"+result.data[i].timezone+"</option>";
						
					}
					
					
                   var temp="";
				   
				   temp=temp+options;
				   
				   $("#timezoneE").html(temp);
				   

				   
					},
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})

		<!-- This code for get the time zone according to country (end)-->

        
        <!-- This code for get the time zone according to country (start)-->

		$(document).on("change", "#country", function () {
			
				var country = $(this).val();
				//alert(country);
				$.ajax({url: "<?php echo URL;?>userprofiles/timezone",
						data: {"country":country},
					success: function(result){
					result=JSON.parse(result);

					
					var options="";
					
					for(var i=0;i<result.data.length;i++){
						
						options+="<option value='"+result.data[i].timezone_id+"'>"+result.data[i].timezone+"</option>";
						
					}
					
					
                   var temp="";
				   
				   temp=temp+options;
				   
				   $("#timezone").html(temp);
				   

				   
					},
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})

		<!-- This code for get the time zone according to country (end)-->


		<!-- This code for when add the country (start)-->
			$(document).on("change", "#country", function () {
					var country = $(this).val();
					$.ajax({url: "<?php echo URL;?>userprofiles/getCity",
							data: {"country":country},
							success: function(result){
								var result=JSON.parse(result);
								 var i = 0;
								for(i=0; i<result.length; i++){
									$('#city').append('<option value="' + result[i].Id + '">' + result[i].Name + '</option>');	
								}		   				
							 },
							error: function(result){
								doNotify('top','center',4,'Unable to connect API');
							 }
					   });
					
				})
			<!-- This code for when add  the country (end)-->
			<!-- This code for when edit  the country (start)-->
			$(document).on("change", "#countryE", function () {
				var country = $(this).val();
				$.ajax({url: "<?php echo URL;?>userprofiles/getCity",
						data: {"country":country},
						success: function(result){
							
							var result=JSON.parse(result);
							 var i = 0;
							for(i=0; i<result.length; i++){
								$('#cityE').append('<option value="' + result[i].Id + '"  >' + result[i].Name + '</option>');	
							}		   				
						 },
						error: function(result){
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
				
			})
			<!-- This code for when edit  the country (end)-->
			//////qr code
			$(document).on("click", ".qr", function () {
				$('#firstName1').text($(this).data('firstname'));
				$('#firstName2').text($(this).data('firstname'));
				$('#empName23').text($(this).data('name'));
				$('#fNamejal').text($(this).data('firstname'));
				// alert($(this).data('firstname'));
				$('#lastName1').text($(this).data('lastname'));
				$('#lastName2').text($(this).data('lastname'));
				$('#lNamejal').text($(this).data('lastname'));
				$('#empecode').text($(this).data('ecode'));
				$('#empecode1').text($(this).data('ecode'));
				$('#empecode23').text($(this).data('ecode'));
				$('#empecodejal').text($(this).data('ecode'));
				$('#location23').text($(this).data('location'));
				// alert($(this).data('ecode'));
				$('#desgName').text($(this).data('desg'));
				$('#desgName1').text($(this).data('desg'));
				$('#desgName24').text($(this).data('desg'));
				$('#desgName23').text($(this).data('desg'));
				// alert($('#desgName23'));
				$('#desgNamejal').text($(this).data('desg'));
				$('#deptName').text($(this).data('dept'));
				$('#deptName23').text($(this).data('dept'));
				$('#deptNamejal').text($(this).data('dept'));
				
				$('#shiftime23').text($(this).data('shifttime'));
				$('#shiftname23').text($(this).data('shift'));
				$('#shiftnamejal').text($(this).data('shift'));
				$('#mobile1').text($(this).data('cont'));
				$('#email1').text($(this).data('email'));
				$('#address1').text($(this).data('city123'));
				$('#web123').text($(this).data('web123'));
				$('#web1234').text($(this).data('web123'));
				// alert($(this).data('addr'));
				$('#profile1').text($(this).data('image'));
				$('#profile2').text($(this).data('image'));
				
				// alert($(this).data('qrc'));
				// alert($(this).data('image'));
				$('#qrCode111').attr('src',"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl="+$(this).data('una')+""+$(this).data('upa')+"&choe=UTF-8");
				$('#qrCode123').attr('src',"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl="+$(this).data('una')+""+$(this).data('upa')+"&choe=UTF-8");
				$('#qrCode321').attr('src',"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl="+$(this).data('una')+""+$(this).data('upa')+"&choe=UTF-8");
				$('#qrCodejal').attr('src',"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl="+$(this).data('una')+""+$(this).data('upa')+"&choe=UTF-8");
			
			if($(this).data('qrc')==1){
					
					// $('#genQR').show();
					$('#genQR121').modal('show');
					// $('#genQR').modal('show');
					// alert('vanshika');
					// $('#genQR1').modal('hide');
					// $('#genQR1').hide();
				}
				else if($(this).data('qrc')==2) {
					// $('#genQR').modal('hide');
					$('#genQR1').modal('show');

					// $('#genQR1').show();
					// alert('pulkit');
					// $('#genQR').modal('hide');
					// $('#genQR').hide();

				}
				else if($(this).data('qrc')==3){
					$('#genQR23').modal('show');
					// alert('sohan');

				}
				else if($(this).data('qrc')==4){
					$('#genQRjal').modal('show');
					// alert('sohan');

				}
				else{

					doNotify('top','center',4,'Unable to connect API');
				}

				
			var iii="<?php echo IMGURL3."uploads/".$_SESSION['orgid']."/"?>"+$(this).data('image');
			if($(this).data('image') != "")
				{
				 var iii="<?php echo IMGURL3."uploads/".$_SESSION['orgid']."/"?>"+$(this).data('image');
				 // alert(iii);
					$("#profile1").attr("src",iii);
					$("#profile2").attr("src",iii);
				}
				else
				{
				if($(this).data('gen')==1)
				{
				var iii="<?php echo IMGURL3."avatars/male.png"?>";
				$("#profile1").attr("src",iii);	
				$("#profile2").attr("src",iii);	
				}
				else if($(this).data('gen')==2)
				{
				var iii="<?php echo IMGURL3."avatars/female.png"?>";
				$("#profile1").attr("src",iii);	
				$("#profile2").attr("src",iii);	
				}
				
				else
				{
				var iii="<?php echo IMGURL3."avatars/male.png"?>";
				$("#profile1").attr("src",iii);	
				$("#profile2").attr("src",iii);	
				}

				
				}
				

				});
			//////qr code///////
			$(document).on("click", ".resetpwd", function () {
				$('#idResetPassword').val($(this).data('id'));
				$('#nameResetPassword').text($(this).data('name'));
		//		alert($(this).data('name'));
			});
			
			
			$('#resetAdd').click(function(){$('#empFrom')[0].reset();});
			
		$("#submitResetPassword").click(function(){ 
				$('#resetError').text("");
				var pwd=$('#resetPassword');
				var cpwd=$('#confirmResetPassword');
				var id=$('#idResetPassword');
				//alert(id);
				
				if(pwd.val().trim().length<6)
				{
					$('#resetError').text('Password must contains at least 6 characters');
					pwd.val(pwd.val().trim());
					pwd.focus();
					return false;
				}
			if(pwd.val().trim() != cpwd.val().trim())
				{
					$('#resetError').text("Confirm password didn't match");
					cpwd.focus();
					return false;
				}
			$.ajax({
				url: "<?php echo URL;?>userprofiles/resetPassword",
						data: {"pass":pwd.val(),"id":id.val()},
						type: 'post',
						success: function(result)
						{
							result=JSON.parse(result);
							if(result)
							{
								  
								doNotify('top','center',2,'Password is reset successfully');
								document.getElementById('resetpwdform').reset();
								$('#resetpwd').modal('hide');
								var table = $('#example').DataTable();
								table.ajax.reload(null, false);
							}
							else
								doNotify('top','center',3,'You cannot use your current password as new password, try again');
						 },
						error: function(result)
					     {
							doNotify('top','center',4,'Unable to connect API');
						 }
				   });
			
			});
			
		});
	</script>

	<!-- <script>
$(document).on('keydown', '#inveitedEmails', function(e) {
		 
        // alert();
        if (e.which == 32)
            return false;
   
});
	</script> -->
	<script>
		$(document).ready(function(){
			$('#sendInvitation').click(function(){
				var y  = $('#inveitedEmails').val();
				// var x = y.trim();
				// alert(x);
				 var x = y.replace(/ /g,'');
      // alert(remove_space);
				// alert(x.trim());


				var temp = 1;
				if(x==''){
					$('#inveitedEmails').focus();
					return false;
				}
				var emails = x.split(",");
				emails.forEach(function (email) 
				{
				  if(!validateEmail(email.trim()))
					{
					doNotify('top','center',4,email+' is not a valid mail id, please check');
					temp = 0;
											return false;
					}
				});
				///ajax-start
				if(temp==0)
					return false;
				$.ajax({url: "<?php echo URL;?>admin/sendInvitation",
                   data: {"emails":x},
				   success: function(result){
				   	   // alert(result);
				   	   
							   
		                       
					 
					        	result = JSON.parse(result);
					        	// alert(result.fail.length);
							
							    for (var i = 0; i < result.fail.length; i++){
							
							$('.failedtable').show();
							     // alert(result.fail.length);

							// $("#insertedemail").append("<tr><td>" + i +"</td><td>" + result.data[i].pass + "</td></tr>");
				               $("#existemail").append("<tr><td>" + (i+1) +"</td><td>" + result.fail[i] + "</td></tr>");
						
                             }
                             for (var i = 0; i < result.pass.length; i++) {
							
							   	$('.successtable').show();
							    // alert(result.pass.length);

							$("#insertedemail").append("<tr><td>" + (i+1) +"</td><td>" + result.pass[i] + "</td></tr>");
				               
                             }
                             $('#linkdetails').modal('show');
                              $('#inviteEmp').modal('hide');

      },

                  
					error: function(result){
						doNotify('top','center',4,'Unable to connect API');
				  }
				});
				  ////ajax-close
				
				});
				});
				$('#resetInvitation').click(function(){
					$("#inveitedEmails").val('');
				});
			
			function validateEmail(email) 
			{
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
			}
		</script>
	<script>
	$(document).ready(function(){
	$(".toggle-sidebar").click(function()
	{
	 // if($(".t2").is(':hidden'))
	 //   setTimeout(function(){
		$("#content").toggleClass("col-md-9");
		$("#sidebar").toggleClass("collapsed t2");
		$("#sidebar").load("<?=URL?>admin/helpnav",{'pageid':'useri'});
	 // }, 300);
	});
	
  //   $('.main-panel').click(function(){
		// if(!$(".t2").is(':hidden'))
		// {
		// 	 $("#sidebar").toggleClass("collapsed t2");
		// 	 $("#content").toggleClass("col-md-9");
		// }
	 //  });
 
	}); 
	 function closemodel()
	{
	  $("#genQR121").modal('toggle');   ///// ***********close the dialog *************** 
	  $("#genQR1").modal('toggle');   ///// ***********close the dialog *************** 
	  $("#genQR23").modal('toggle');   ///// ***********close the dialog *************** 
	  $("#genQRjal").modal('toggle');   ///// ***********close the dialog *************** 
    }
	</script>
	
        <script>
	  function changeImgUpload(input)
		{
			if (input.files && input.files[0]) 
			{
			var reader = new FileReader();

			reader.onload = function (e) 
			{
		    $('#imageE').attr('src', e.target.result);
			};
		reader.readAsDataURL(input.files[0]);
	      }
		}
	  </script>
	  <script>
	  function changeImgUpload1(input)
		{
			if (input.files && input.files[0]) 
			{
			var reader = new FileReader();
			reader.onload = function (e) 
			{
			$('#imageAdd').attr('src', e.target.result);
			};
		reader.readAsDataURL(input.files[0]);
	      }
		}
	  </script>
	  <script>
	  $(".pencil").click(function () 
	    {
			$("input[type='file']").trigger('click');
		});
		
	  </script>
	  <script>
	$(document).ready(function(){
        $(".btn-info").click(function(){
          location.reload(true);
          // alert();
        });
    });
    $(document).ready(function(){
        $("#linkdetails").click(function(){
          location.reload(true);
          // alert();
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
					 	});
					 }
					else{
					 	$('.checkbox').each(function()
					 	{
					 		this.checked = false;
					 	});
			        }
 
		
	        	$('input[name="select_all"]').attr('click',function(){

		      
                   if(this.checked){


		


                    $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
                 
                     
        
                       } else {
                         $('#example tbody input[type="checkbox"]:checked').trigger('click');
                      
                           
         
                     }

   
                      e.stopPropagation();
                        });
	             });
			
	    $('#select_all').click();

			
		          });



</script>

<script>
/* $('#areaAssinE').lwMultiSelect({
	 addAllText:"Select All",
	 removeAllText:"Remove All",
     selectedLabel:"Values accepted",

}); */



$(document).ready(function() {

 $('#areaAssign').lwMultiSelect({
  
  maxSelect: 10,//0 = no restrictions
  maxText:'Available Geo-fence'
}); 
});




</script>

  <script>
  $(document).on("click",".mod",function(){
  var restrictfence = $('input[name=fenceopt]:Checked').val();
			if(restrictfence==undefined){
				restrictfence=0;

			}
			
		
			//alert(restrictfence);
 		var eid = $(this).data('id')


 		$.ajax({

 			
				type:"post",
				datatype:"html",
				url: "<?php echo URL;?>userprofiles/showedituser",
                data: {"eid":eid},
				   success: function(result)

				   {

					$("#addEmpE .modal-body").empty();        
					$("#addEmpE .modal-body").html(result);        
					$("#addEmpE").modal('show');
					$( "#dojE" ).datepicker({
					format: 'mm/dd/yyyy',
					changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+100",
            	    //minDate: new Date(),
					onSelect: function(dateText, inst) {
            	 	//alert("hello");
				    var entitledleaveE = $('#entitledleaveE').val();
				    var fiscalendE = "<?php echo getFiscalEndDate($orgid)?>";
			        var dojE = $('#dojE').val();
			        var fiscalendmonthE = fiscalendE.substring(0, 2);
			        var joinmonthE = dojE.substring(0, 2);
			        var fiscalenddateE = fiscalendE.substring(3, 5);
			        var joindateE = dojE.substring(3, 5);
			        // alert(fiscalendmonth);
			        // alert(joinmonth); 

				    if(joinmonthE > fiscalendmonthE)
				    {
				     var newdojE=Number(dojE.substr(dojE.length - 4))+Number(1); 
				     var fiscalenddataE = fiscalendE+"/"+newdojE; 
				    }
				    else if(joinmonthE == fiscalendmonthE && joindateE > fiscalenddateE)
				    {
				     var newdojE=Number(dojE.substr(dojE.length - 4))+Number(1); 
				     var fiscalenddataE = fiscalendE+"/"+newdojE; 
				    }
				    else if(joinmonthE == fiscalendmonthE && joindateE == fiscalenddateE)
				    {
				     var newdojE=Number(dojE.substr(dojE.length - 4)); 
				     var fiscalenddataE = fiscalendE+"/"+newdojE; 
				    }
			        else 
			        {
			        var newdojE=Number(dojE.substr(dojE.length - 4)); 
			        var fiscalenddataE = fiscalendE+"/"+newdojE;
			        }
			        var date1E = new Date(dojE); 
					var date2E = new Date(fiscalenddataE); 
					var Difference_In_TimeE = date2E.getTime() - date1E.getTime(); 
					var Difference_In_DaysE = Difference_In_TimeE / (1000 * 3600 * 24); 
			        var bal1E=(entitledleaveE/12);
					var bal2E=(Difference_In_DaysE/30.4167);
					var balanceleaveE=bal1E*bal2E;
			        //alert(Difference_In_DaysE);
			        //alert(fiscalenddataE);
			        <?php
				    $permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
					if($permis == 1)
					{
					?>
			        document.getElementById("MyElement").className = "form group label-floating is-empty is-focused"; 
			        document.getElementById('balanceleaveE').value = parseInt(balanceleaveE);
			        <?php
				    }
					?>
				}
            }).attr('readonly', 'readonly');
					}

 		});


 	});
  </script>



  
  
  
 

</html>
			
