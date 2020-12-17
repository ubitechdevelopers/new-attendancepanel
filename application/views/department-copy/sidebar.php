<html>
<head>
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/solid.css">
	<style>
	 .nav>li>a{
          padding-top: 4px !important;
       }
	 .nav>div>ul
	 {
		z-index:1 !important;
		margin-top:-3px !important;
	 }
	.nav>div>ul>li{
	 margin-bottom:-8px !important;
   }
    .nav div li.active a,.nav div li.active a
   {
	   background-color:transparent !important;
	   box-shadow:none !important;
	   color:#45a149 !important;
   }
   .nav div{
	   margin-left:20% !important;
   }
		.active1 a {
			
			background-color: none;
			
		}
		.activeall{
			color: #9c27b0;
			font-size:15px;
			font-weight: bold;
		}
		#navid li > a {
    margin: 0px 5px;
		}

	</style>
</head>
<body>
<div class="sidebar" data-color="green" data-image="" style="height:1000px;position: fixed;">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->
          
			<div class="logo" style="text-align: center;">
				<!-- <a href="<?=URL?>dashboard" class="simple-text">
					<img src="<?=URL?>../assets/img/newlogo.png" alt="Department" height="100px" width="140px"/> -->
				<?php 
				 $link =  $_SERVER['HTTP_HOST']; 
				  $orgid = $_SESSION['orgid'];
				  $q1 = $this->db->query("SELECT * From WhiteLabeling where website = '$link' And OrganizationId = '$orgid' ");
				//var_dump($this->db->last_query());
				//$data =array();
				foreach($q1->result() as $row){
			
					$logo = $row->logo;
					//echo $logo;
					$website = $row->website;
					//$color2 = $row->color2;
					//$color3 = $row->color3;
					
				}
				if($orgid != ''){
				
				   if($website == "ubisales.zentylpro.com" ){?>
					<img src="<?=URL?><?php echo $logo?>" height="120px" width="200px"/>
					<?php }else{?>
					<img src="<?=URL?><?php echo $logo?>" height="120px" width="150px"/>
				   <?php }?>
				<?php }else{?>
				<img src="<?=URL?>../assets/img/newlogo.png" height="120px" width="150px"/>
				<?php }?>
				<!-- </a> -->
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                 <!--<li <?php if(isset($pageid) and $pageid==1)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>departmenthead/dashboard">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li> -->
	        <li <?php if(isset($pageid) and ($pageid >=7 and $pageid <8 ))echo 'class="active "';?> style="margin-bottom:0px;">
			<a href='#' data-toggle="collapse" data-target="#reportmenu" data-parent="#sidenav01" class="collapsed"><i class="fa fa-files-o"></i><p>Attendance Reports</p></a></li>
					 
			<div <?php if(isset($pageid) and ($pageid >= 7 and $pageid <8  )) 
			echo 'class="collapse in" aria-expanded="true" style="margin-left:20%"'; else echo 'class="collapse" aria-controls="navbar" aria-expanded="false" style="height: 0px;margin-left:20%"'; ?> id="reportmenu" style="height: 0px;margin-left:20%;">
	                    
				<ul class="nav nav-list">
					
				    <li <?php if(isset($pageid) and $pageid == 7.1)echo 'class="active"'; ?> ><a href="<?=URL?>departmenthead/both">All Attendance</a> </li>
					
				    <li <?php if(isset($pageid) and $pageid == 7.2)echo 'class="active"'; ?> ><a href="<?=URL?>departmenthead/present">Present</a> </li>

					 <li <?php if(isset($pageid) and $pageid == 7.3)echo 'class="active"'; ?> ><a href="<?=URL?>departmenthead/absapprove">Disapproved/Approved</a> </li>

					 <li <?php if(isset($pageid) and $pageid==7.4)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/absent"> Absent</a></li>
								
					 <li <?php if(isset($pageid) and $pageid==7.5)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/latecoming"> Late Comers</a></li>
								
					 <li <?php if(isset($pageid) and $pageid==7.6)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/Earlyleave">Early Leavers </a></li> 
								
					 <li <?php if(isset($pageid) and $pageid==7.7)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/overtime">Overtime </a></li>
								
					 <li <?php if(isset($pageid) and $pageid==7.8)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/undertime"> Undertime </a></li>
								
					 <?php
                     $permis = getAddonPermission($_SESSION['orgid'],'Addon_TimeOff') ;
					 if($permis == 1)
					 {?>
					 <li <?php if(isset($pageid) and $pageid==7.9)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/timeoff">Time Off </a></li>
					 <?php } ?>
						
                    <?php
					$permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave');
					if($permis == 1)
					{
					?>
					<li <?php if(isset($pageid) and $pageid==7.4321)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/onleave">On Leave</a></li>

					<?php }?>	
					
					 <li <?php if(isset($pageid) and $pageid==7.010)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/notsync">Offline - unsynced</a></li>
							
					<!-- <?php
					$permis = getAddonPermission($_SESSION['orgid'],'Addon_flexi_shif') ;
					if($permis == 1)
					{?>
					 <li <?php if(isset($pageid) and $pageid==7.11)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/flexi">Flexi Report</a></li>
					<?php } ?> -->
					
                     <li <?php if(isset($pageid) and $pageid==7.12)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/attendance_register">Attendance Register
	                  </a></li>
	            	
					 <!--<li <?php if(isset($pageid) and $pageid==7.13)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/depart">Department Summary</a></li>-->
					 
					 


                        <!-- <li <?php if(isset($pageid) and $pageid==7.15778)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/coviddailyreport">Covid Daily Report</a></li>--> 

						 

					</ul>
			     	</div>     
				 <!-- Leave report Start-->
				  <?php
                         $permis = getAddonPermission($_SESSION['orgid'],'Addon_BasicLeave') ;
							  if($permis == 1)
								{
							   ?>
				  <li <?php if(isset($pageid) and ($pageid==45.1 || $pageid==45.2))echo 'class="active "';?> style="margin-bottom:0px;" >
					 
					<a  href='#' data-toggle="collapse" data-target="#leavecol" data-parent="#sidenav01" class="collapsed"  >
					<i class="fas fa-scroll" aria-hidden="true"></i>
					
					<p>Leave</p>
	                </a>
					 </li>
				  	<div <?php if(isset($pageid) and ($pageid==45.1 || $pageid==45.2))echo 'class="collapse in" aria-expanded="true" style="height: 75px;margin-left:25%"'; else echo 'class="panel-collapse collapse" aria-expanded="false" aria-controls="navbar" style="height: 0px;margin-left:25%"' ;?> id="leavecol" style="height: 0px;margin-left:25%">
						<ul class="nav nav-list">
						
						
						  <li <?php if(isset($pageid) and $pageid==45.2)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/leave"> Leave Applications </a></li>
							
		                  <li <?php if(isset($pageid) and $pageid==45.1)echo 'class="active"'; ?>>
						  <a href="<?php echo URL?>departmenthead/getleave">
						  Leave Balance</a>
						  </li>
						   
						  
						</ul>
					 </div>
					 
					 <?php  } ?>
				  
				  
				  <!-- Leave report End-->

				<li <?php if(isset($pageid) and ($pageid==3.1 || $pageid==3.2 || $pageid == 3.3 ||$pageid == 3.4))echo 'class="active"'; ?>>
	                    <a data-toggle="collapse" data-target="#summarymenu" data-parent="#sidenav01" class="collapsed">
	                        <i class="fa fa-list"></i>
	                        <p>Summary Reports</p>
	                    </a>
	                </li>
	                
					<div <?php if(isset($pageid) and ($pageid==3.1 || $pageid==3.2 || $pageid == 3.3 ||$pageid ==  3.4 ))echo 'class="collapse in" aria-expanded="true" style="height:50px;margin-left:25%;"'; else echo 'class="panel-collapse collapse" aria-expanded="false" aria-controls="navbar" style="height: 0px;margin-left:25%;"' ;?> id="summarymenu" style="height: 0px;margin-left:25%">
						<ul class="nav nav-list">
						
						  <li <?php if(isset($pageid) and $pageid==3.1)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/getSummaryData/1" target="_blank">Today's Summary</a></li>
						  
						  <li <?php if(isset($pageid) and $pageid== 3.2)echo 'class="active"'; ?>><a href="<?php echo URL?>departmenthead/getSummaryData/2" target="_blank">Yesterday's Summary</a></li> 
						  
						  <li <?php if(isset($pageid) and $pageid==3.3)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/getWeeklyAverageSummary/1" target="_blank">Weekly Summary</a></li>
						   
						  <li <?php if(isset($pageid) and $pageid==3.4)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/attendanceOutsideThefencedArea" target="_blank">Outside the Fence</a></li> 
						</ul>
					 </div> 
				
				  				  <!--Monthly Reports-->

				<li <?php if(isset($pageid) and ($pageid==4 || $pageid==4.1 || $pageid==4.2 ))echo 'class="active"'; ?>>
	                    <a data-toggle="collapse" data-target="#mreport" data-parent="#sidenav01" class="collapsed">
	                        <i class="fa fa-calendar" aria-hidden="true"></i>
	                        <p>Monthly Reports</p>
	                    </a>
	                </li>

	            <div <?php if(isset($pageid) and ($pageid==4 || $pageid==4.1 || $pageid==4.2))echo 'class="collapse in" aria-expanded="true" style="margin-left:25%"'; else echo 'class="collapse"  aria-controls="navbar" style="height: 0px;margin-left:25%"' ;?> id="mreport" style="height: 0px;margin-left:25%">



				<ul class="nav nav-list">

				   <li <?php if(isset($pageid) and $pageid==4)echo 'class="active"'; ?>>
				  <a href="<?php echo URL?>departmenthead/monthlysummary" >
				  Monthly Employee Wise Summary</a>
				  </li>
				   
				  <li <?php if(isset($pageid) and $pageid==4.1)echo 'class="active"'; ?>>
				  <a href="<?php echo URL?>departmenthead/attendanceRoaster" >
				  Monthly Register
				   </a>
				  </li>	

				   <li <?php if(isset($pageid) and $pageid==4.2)echo 'class="active"'; ?>><a href="<?=URL?>departmenthead/getMonthlyAverageSummary/2" target="_blank">Monthly Summary</a></li>
				  
				 </ul>
				</div>
					              <!--Visit Punched Start-->
                     <?php
                     $permis = getAddonPermission($_SESSION['orgid'],'Addon_VisitPunch') ;
                      if($permis == 1){?>
                     <li <?php if(isset($pageid) and ( $pageid==5 || $pageid==5.1 || $pageid==5.2  || $pageid==5.3 || $pageid==5.4 ))echo 'class="active"'; ?>>
                   <a data-toggle="collapse" data-target="#visit" data-parent="#sidenav01" class="collapsed">

                   
                       <i class="fas" style="font-size:25px"> &#xf554; </i>
                   
                       <p>Visits</p>
                   </a>
               </li>
                <?php } ?>
                        <div <?php if(isset($pageid) and ( $pageid==5 || $pageid==5.1 || $pageid==5.2  || $pageid==5.3 || $pageid==5.4 ))echo 'class="collapse in" aria-expanded="true" style="height: auto;margin-left:20%"'; else echo 'class="collapse"  style="heightauto;margin-left:20%"' ;?> id="visit" style="height:auto;margin-left:20%">

						<ul class="nav nav-list">


						<!-- <?php
						$permis = getAddonPermission($_SESSION['orgid'],'Addon_VisitPunch') ;
						if($permis == 1)
						{?>
						<li <?php if(isset($pageid) and $pageid==9.006)echo 'class="active "'; ?>><a href="<?php echo URL?>admin/planvisit">Plan Visit</a>
						</li>
						<?php } ?> -->
						<!-- client tab -->
						<?php
						$orgid=$_SESSION['orgid'];
				        if($orgid == 10){ ?>
						<li <?php if(isset($pageid) and $pageid==5)echo 'class="active"'; ?>>
						 <a href="<?php echo URL?>departmenthead/activeclient">
						 Clients</a>
						 </li>

						 <li <?php if(isset($pageid) and $pageid==5.1)echo 'class="active"'; ?>>
						 <a href="<?php echo URL?>departmenthead/plannedvisit">
						 Assigned Clients</a>
						 </li>

						<?php } ?>

						 <?php
						$permis = getAddonPermission($_SESSION['orgid'],'Addon_VisitPunch') ;
						if($permis == 1)
						{?>
						<li <?php if(isset($pageid) and $pageid==5.2)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/locationReportemp">Employees wise Visits</a>
						</li>
						<?php } ?>


						 
						 <?php
						$permis = getAddonPermission($_SESSION['orgid'],'Addon_VisitPunch') ;
						if($permis == 1)
						{?>
						<li <?php if(isset($pageid) and $pageid==5.3)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/locationReport">Date wise Visits</a>
						</li>
						<?php } ?>




						<?php
						$permis = getAddonPermission($_SESSION['orgid'],'Addon_VisitPunch') ;
						if($permis == 1){?>

						<li <?php if(isset($pageid) and $pageid==5.4)echo 'class="active "'; ?>><a href="<?php echo URL?>departmenthead/monthlypunchedvisit">Monthly Visits</a>
						</li>
						<?php } ?>

						</ul>
						</div>
                    <!--Visit punched End-->
					<!-- <li <?php if(isset($pageid) and $pageid==9)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/newpackages">
	                        <i class=" fa fa-dropbox"></i>
	                        <p>Plans</p>
	                    </a>
	                </li> -->
					
					
	             <!--    <li <?php if(isset($pageid) and $pageid==4)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/trial_setting">
	                        <i class="material-icons">unarchive</i>
	                        <p>Trial Settings</p>
	                    </a>
	                </li> -->
					<!-- <li <?php if(isset($pageid) and $pageid==2)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/slider">
	                        <i class="fa fa-sliders"></i>
	                        <p>Promotional Banners</p>
	                    </a>
	                </li> -->
	                <!--  <li <?php if(isset($pageid) and $pageid==10)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/attDiscount">
	                        <i class=" fa fa-dropbox"></i>
	                        <p>Promotional Discount</p>
	                    </a>
	                </li> -->
	               
				<!--	<li <?php if(isset($pageid) and $pageid==3)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/organization">
	                        <i class="material-icons">unarchive</i>
	                        <p>Organization</p>
	                    </a>
	                </li> -->
				 
					
					<!--<li <?php if(isset($pageid) and $pageid==5)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/package">
	                        <i class=" fa fa-dropbox"></i>
	                        <p>Packages</p>
	                    </a>
	                </li>-->
					<!-- <li <?php if(isset($pageid) and $pageid==6)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/setAppStorePath">
	                        <i class=" fa fa-play"></i>
	                        <p>Play Store</p>
	                    </a>
	                </li> -->
					
					
					<!-- <li <?php if(isset($pageid) and $pageid==42)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/leadowner">
	                        <i class=" fa fa-cogs"></i>
	                        <p>Lead / Renewal owner</p>
	                    </a>
	                </li> -->
					
					
					
				<!--	<li <?php if(isset($pageid) and $pageid==11)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/getPaymentHistory">
	                        <i class=" fa fa-credit-card"></i>
	                        <p>Payment History</p>
	                    </a>
	                </li> -->
				 
				<!--	<li <?php if(isset($pageid) and $pageid==8)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/packages">
	                        <i class=" fa fa-dropbox"></i>
	                        <p>Plans</p>
	                    </a>
	                </li> -->
					
	               
					<!--<li <?php if(isset($pageid) and $pageid==7)echo 'class="active"'; ?>>
	                    <a href="<?=URL?>ubitech/orginfo">
	                        <i class=" fa fa-file"></i>
	                        <p>Organization Information</p>
	                    </a>
	                </li>-->
	            </ul>
	    	</div>
	    </div>
		
	
</body>

</html>