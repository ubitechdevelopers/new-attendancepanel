        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <style type="text/css">
        .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 20px;
        top:8px;
        }

        .switch input {
        display: none;
        }

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
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked+.slider {
        background-color: #2196F3;
        }

        input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(14px);
        }


        /* Rounded sliders */

        .slider.round {
        border-radius: 34px;
        margin-left: -3px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
        </style>

    <!-- sideBar -->
<?php
$orgid = $_SESSION['orgid'];
?>
           <div class="sidebar">
            <div class="logo-container">
                <img class="logo" src="<?=URL?>../assets/image/logo.png" alt="">
                <div class="card" style="border:none;box-shadow: 0px 2px 4px -2px #acacac;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <label class="switch">
                          <input id="toggle" checked name='toggle' type="checkbox" autocomplete="off" >
                          <span class="slider round"></span>
                        </label>
                        <span class="new-experience-text" style="margin-right: 45px;">Old UI Experience</span>
                        <p class="tell-us-text">Tell us what you think</p>
                    </li>
                  </ul>
                </div>
            </div>

            <section class="sidebar-item">
              <a href="<?=URL?>Dashboard">
                  <div  class="side-item-container"<?php if(isset($pageid) and $pageid==1)echo 'id="active"'; ?>>
                    <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/dashboard_icon.svg" alt=""> </span>  Dashboard
                  </div>
              </a>
             



              <a href="<?=URL?>Userprofiles/employeelist">
                  <div  class="side-item-container" <?php if(isset($pageid) and ($pageid==2 || $pageid==2.1 || $pageid==2.2|| $pageid==2.3 || $pageid==2.4))echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/employee_icon.svg" alt=""> </span>    Employees
                  </div>
              </a>
              <a href="<?=URL?>Attendance/allattendance">

                  <div class="side-item-container" <?php if(isset($pageid) and ($pageid==3 || $pageid==3.1 || $pageid==3.2 || $pageid==3.3 || $pageid==3.4 || $pageid==3.5 || $pageid==3.6 || $pageid==3.7 || $pageid==3.8 || $pageid==3.9 || $pageid==3.10 || $pageid==3.11 || $pageid==3.13|| $pageid==3.14))echo 'id="active"'; ?> >
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/attendance_icon.svg" alt=""> </span>   Attendances
                  </div>
              </a>
              <a href="<?=URL?>Report/">
                  <div class="side-item-container"<?php if(isset($pageid) and ($pageid==4 || $pageid==4.1))echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/report_icon.svg" alt=""> </span> Reports
                  </div>
              </a>
              <a href="<?=URL?>Clientsettings/">
                  <div class="side-item-container"<?php if(isset($pageid) and ($pageid==5 || $pageid==5.1 || $pageid==5.2))echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/client_icon.svg" alt=""> </span> Clients
                  </div>





              </a>
             <!--  <a href="#clients">
                  <div class="side-item-container">
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/visits_icon.svg" alt=""> </span>  Visits
                  </div>
              </a> -->
              <a href="<?=URL?>Leave/">
                  <div class="side-item-container"<?php if(isset($pageid) && $pageid==6)echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/leave_icon.svg" alt=""> </span> Leave
                  </div>
              </a>
              <!-- <a href="#clients">
                  <div class="side-item-container">
                      <span class="side-item-icon" > <img src="<?=URL?>../assets//icons/payroll_icon.svg" alt=""> </span> Payroll
                  </div>
              </a> -->
              <a href="<?=URL?>shift/">
                  <div class="side-item-container"<?php if(isset($pageid) and ($pageid==7 || $pageid==7.1 || $pageid==7.2 || $pageid==7.3 || $pageid==7.4 || $pageid==7.5 ))echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets//icons/manage_icon.svg" alt=""> </span>   Manage
                  </div>
              </a>
              <a href="<?=URL?>Settings/">
                  <div class="side-item-container"<?php if(isset($pageid) and ($pageid==8 || $pageid==8.1 || $pageid==8.2))echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/settings_icon.svg" alt=""> </span>   Settings
                  </div>
              </a>
      <?php $orgid= $_SESSION['orgid'];?>

              <a href="<?=URL?>addon/editorg/<?php echo $orgid ?>">
                  <div class="side-item-container"<?php if(isset($pageid) and $pageid==9)echo 'id="active"'; ?>>
                      <span class="side-item-icon" > <img src="<?=URL?>../assets/icons/addon_icon.svg" alt=""> </span>   Addons
                  </div>
              </a>
            </section>




      </div>


    <!-- /sideBar -->

       <script>
    $( document ).ready(function() {
        $('#toggle').prop('checked', false);
    });

    $(document).on("change","#toggle",function(){
      var checkurl=window.location.href;
	  // alert(checkurl);
	  
	  var org = '<?php echo ($_SESSION['orgid']) ?>';
//alert('<?= URL ?>');
//alert(org);

  //       if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Dashboard")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/dashboard";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/employeelist")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/userprofiles";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/inactiveemployee")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/userprofiles/inctiveemp";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/archiveemployee")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/userprofiles/archiveemployee";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/addemployee")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/userprofiles/addemployee";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/allattendance")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/both";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/index")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/attendances1";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/absent")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/absent";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/latecomer")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/latecoming";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/earlyleaver")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/Earlyleave";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/overtime")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/overtime";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/undertime")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/undertime";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/notsynced")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/notsync";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/ontimeoff")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/timeoff";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/onleave")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/onleave";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/attregister")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/attendance_register";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/deptsummary")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/depart";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/disapproved")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/absapprove";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Report/")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/monthly/monthlysummary";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Report/monthlyreports")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/monthly/attendanceRoaster";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Clientsettings/")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/visit/activeclient";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Clientsettings/assignedclient")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/visit/plannedvisit";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Clientsettings/visit")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/visit/locationReport";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Leave/")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/leave";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/shift/")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/shifts";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/index")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/shifts";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/department")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/departments";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/designation")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/designations";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/holidays")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/holiday";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/geofence")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/geoLocations";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/hourlyrate")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/hourlypaySetting";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Settings/")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/notificationsetting";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Settings/alertsettings")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/alertSetting";
  //       }


  //       else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Settings/activity")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/activitylog";
  //       }
		
		
		
		
		
		
		// else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Attendance/notreport")
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/admin/both";
  //       }

        
		// else if(checkurl == "http://ubiattendance.zentylpro.com/ubiattnew2/index.php/addon/editorg/<?php echo ($_SESSION['orgid']) ?>")
		
  //       {
  //         window.location.href="http://ubiattendance.zentylpro.com/index.php/setting/geoLocations";
  //       }


       if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Dashboard" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Dashboard")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/dashboard";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Userprofiles/employeelist" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Userprofiles/employeelist")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/userprofiles";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Userprofiles/inactiveemployee" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Userprofiles/inactiveemployee")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/userprofiles/inctiveemp";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Userprofiles/archiveemployee" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Userprofiles/archiveemployee")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/userprofiles/archiveemployee";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Userprofiles/addemployee" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Userprofiles/addemployee")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/userprofiles/addemployee";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/allattendance" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/allattendance")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/both";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/index" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/index")
        {
          //$_SESSION['attendanceAdmin']=true;
          // alert('<%=Session["attendanceAdmin"] %>');
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/attendances1";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/absent" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/absent")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/absent";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/latecomer" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/latecomer")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/latecoming";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/earlyleaver" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/earlyleaver")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/Earlyleave";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/overtime" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/overtime")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/overtime";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/undertime" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/undertime")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/undertime";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/notsynced" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/notsynced")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/notsync";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/ontimeoff" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/ontimeoff")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/timeoff";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/onleave" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/onleave")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/onleave";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/attregister" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/attregister")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/attendance_register";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/deptsummary" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/deptsummary")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/depart";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/disapproved" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/disapproved")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/absapprove";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Report/" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Report")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/monthly/monthlysummary";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Report/monthlyreports" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Report/monthlyreports")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/monthly/attendanceRoaster";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Clientsettings/" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Clientsettings/index.php")
        {
          // alert("hello");
          window.location.href="https://ubiattendance.ubihrm.com/index.php/visit/activeclient";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Clientsettings/assignedclient" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Clientsettings/assignedclient")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/visit/plannedvisit";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Clientsettings/visit" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Clientsettings/visit")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/visit/locationReport";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Leave/" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Leave/")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/leave";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/shift/" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/shift/")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/shifts";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Managesettings/index" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Managesettings/index")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/shifts";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Managesettings/department" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Managesettings/department")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/departments";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Managesettings/designation" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Managesettings/designation")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/designations";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Managesettings/holidays" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Managesettings/holidays" )
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/holiday";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Managesettings/geofence" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Managesettings/geofence")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/geoLocations";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Managesettings/hourlyrate" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Managesettings/hourlyrate")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/hourlypaySetting";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Settings/" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Settings/" )
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/notificationsetting";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Settings/alertsettings" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Settings/alertsettings")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/alertSetting";
        }


        else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Settings/activity" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Settings/activity")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/activitylog";
        } 
		
		
		
		
		
		
		else if(checkurl == "https://ubiattendance.ubihrm.com/newpanel/index.php/Attendance/notreport" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/Attendance/notreport")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/admin/both";
        }

       
        
		else if(checkurl == "https://ubinewpanel.ubihrm.com/index.php/addon/editorg/<?php echo ($_SESSION['orgid']) ?>" || checkurl == "https://ubinewpanel.ubihrm.com/index.php/addon/editorg/<?php echo ($_SESSION['orgid']) ?>")
        {
          window.location.href="https://ubiattendance.ubihrm.com/index.php/setting/geoLocations";
        }
		

    });

    </script>
