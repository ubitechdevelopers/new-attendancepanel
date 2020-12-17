<?php
class Userprofiles_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //include(APPPATH."PhpMailer/class.phpmailer.php");
		include_once(APPPATH . "s3.php");
    }

    public function getEmployeesData() {
        $orgid = $_SESSION['orgid'];

        $sname = $_SESSION['name'];
        $id = $_SESSION['id'];

        $res = array();
        $d = array();

        $query1 = $this->db->query("SELECT `user_limit` as userlimit, (SELECT COUNT(*)
    FROM EmployeeMaster where`OrganizationId` = $orgid and Is_Delete != 2) as registeredusers from licence_ubiattendance where `OrganizationId`=$orgid");
        // var_dump($this->db->last_query());

        $imgname = '';
        foreach ($query1->result() as $row) {

            $data = array();

            $data['userlimit'] = $row->userlimit;
            $data['reguser'] = $row->registeredusers;


            $res[] = $data;
        }
        $d['data'] = $res;
        // echo json_encode($d);

        $query = $this->db->query("SELECT EmployeeMaster.id as id,EmployeeMaster.EmployeeCode as ecode,EmployeeMaster.area_assigned as area ,EmployeeMaster.Location,(CASE WHEN (EmployeeMaster.entitledleave!='') THEN EmployeeMaster.entitledleave ELSE (SELECT entitled_leave from Organization Where Id=EmployeeMaster.OrganizationId Limit 1) END) as entitledleave,EmployeeMaster.livelocationtrack,`FirstName`,lastname,concat(FirstName,'',lastname)as name,archive,department,designation,shift,PersonalNo,DOB, Nationality,hourly_rate, `MaritalStatus`,`Religion`,`BloodGroup`,`DOJ`, `DOC`,`Gender`,`HomeAddress`, EmployeeMaster.CurrentCountry,EmployeeMaster.CurrentCity,`CurrentCountry`,`timezone`, `HomeCity`, `HomeZipCode`,(Select shifttype from ShiftMaster WHERE ShiftMaster.Id=EmployeeMaster.`Shift` LIMIT 1) as shifttype,(select appSuperviserSts from UserMaster where EmployeeId= EmployeeMaster.id and OrganizationId  = '$orgid'  LIMIT 1)as appSuperviserSts,(select username_mobile from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as una,(select Name from CityMaster where Id = EmployeeMaster.CurrentCity LIMIT 1 )as city123,(select Website from Organization where   Id = EmployeeMaster.OrganizationId)as web,(select qrselector from `admin_login` where  id = '$id' and OrganizationId  = '$orgid' )as qroption,(select Password from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as upa,ImageName FROM `EmployeeMaster` where OrganizationId=? AND archive=1 AND Is_Delete = '0' order by  FirstName ", array($orgid));
        // var_dump($this->db->last_query());



        $d = array();
        $res = array();
        $userstts = '';
        $resetpassword = '';
        foreach ($query->result() as $row) {
            if ($row->archive == 1)
                $userstts = '<i class=" status fa fa-thumbs-down" style="font-size:16px; color:red" data-id="' . $row->id . '" data-sts="' . $row->archive . '" data-ena="' . $row->FirstName . ' ' . $row->lastname . '" title="Inactive" ></i>';
            else
                $userstts = '<i class=" status fa fa-thumbs-up" style="font-size:16px; color:green" data-toggle="modal" data-id="' . $row->id . '" data-ena="' . $row->FirstName . '"  title="Click to make user Active" ></i>';
            $pass = decode5t($row->upa);
            $resetpassword = '<i class=" resetpwd fa fa-key" style="font-size:16px; color:purple" data-toggle="modal" data-target="#resetpwd" typographi="' . $pass . '" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Reset password Only App " ></i>';

            $activitylog = '<a href=' . URL . 'Userprofiles/empactivitylog/' . $row->id . '><i class="activitylog fa fa-history" style="font-size:16px; color:purple" data-toggle="modal" data-target="#activitylog"title="Activity Log" ></i></a>';

            $leaveandtimeoff = '<a href=' . URL . 'Userprofiles/empleaveandtimeoff/' . $row->id . '><i class="fa fa-calendar" style="font-size:16px; color:purple" data-toggle="modal" data-target="#leaveandtimeoff"title="Leave & Timeoff" ></i></a>';

            $data = array();
            $eno = '';
            //  if($_SESSION['specialCase']=='RAKP')
            //$eno='<br/><b>'.$row->ecode.' </b>';
            $data['change'] = '<input type="checkbox" name="chk" style="padding-top: 2rem!important;"  id="' . $row->id . '" class="checkbox"  value="' . $row->id . '" >';
            if ($row->ImageName != "" || $row->ImageName != 0) {
                $photo = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1"><img class="rounded-circle" src="' . PROFILEIMG . "$orgid/" . $row->ImageName .'"    style="width:42px!important;height:41px!important;border-radius:50%"  /></i>';
                $imgname = PROFILEIMG . "$orgid/" . $row->ImageName;
                $data['imgpic'] = $row->ImageName;
            } else {
                if ($row->Gender == 1) {
                    $photo = 
                            '<i class="pop1" data-toggle="modal" data-target="#imagemodal1"><img class="rounded-circle" src="' . URL . "../assets/image/user_png.png" . '"    style="width:42px!important;height:42px!important;border-radius:50%"  /></i>';
                } else if ($row->Gender == 2) {
                    $photo = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1"><img class="rounded-circle" src="' . URL . "../assets/image/user_png.png" . '"    style="width:42px!important;height:42px!important;border-radius:50%"  /></i>';
                } else {
                    $photo = '<i class="pop1" data-toggle="modal" data-target="#imagemodal1"><img class="rounded-circle" src="' . URL . "../assets/image/user_png.png" . '"    style="width:42px!important;height:42px!important;border-radius:50%"  /></i>';
                }
            }
            if ($row->lastname != "") {
                $uname = $row->FirstName . ' ' . $row->lastname;
            } else {
                $uname = $row->FirstName;
            }
            //  $data['employeedetails'] = $photo . "   " . $uname;
            $data['profile'] = $photo;
            $data['name'] = $uname;

            if ($row->DOJ == '0000-00-00') {
                $dateofjoining = '00/00/0000';
            } else {
                $dateofjoining = date("m/d/Y", strtotime($row->DOJ));
            }

            if ($row->DOJ == '0000-00-00') {
                $balleave = "N/A";
            } else {
                $balleave = intval($this->getBalanceLeave($orgid, $row->id));
            }

            $data['code'] = $row->ecode;
            $data['hourlyrate'] = getAllRate1($_SESSION['orgid'], $row->hourly_rate);
            // json_decode(getAllRate($_SESSION['orgid']))
            $data['location'] = $this->locationname($row->Location);
            $data['username'] = decode5t(getUserName($row->id));
            // $data['date'] = date('d-M-Y',strtotime($row->TimeofDate));
            //$data['password']=decode5t($row->upa);

            $data['pemissions'] = "";
            if ($row->appSuperviserSts == 1) {
               // $data['pemissions'] = '<div style="background-color:#219653;text-align:center;color:white;border-radius:100px; width:70px;" title="for App only" >Admin</div>';
           $data['pemissions'] = '<div style="background-color:#219653;text-align:center;color:white;border-radius:100px; font-size:13px; padding:3px;" title="for App only" >Admin</div>';
           
                } elseif ($row->appSuperviserSts == 2) {
                $data['pemissions'] = '<div style="background-color:#8a84ef; text-align:center;color:white;border-radius:100px; font-size:13px; padding:3px; " title="for App only" >Dept Head</div>';
            } else {
                
                $data['pemissions'] = '<div style="background-color:#F2C94C;text-align:center;color:white;border-radius:100px; font-size:13px; padding:3px;" title="user" >User</div>';
            }

            $data['shifttype'] = "";
            if ($row->shifttype == 1) {
                $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
            } elseif ($row->shifttype == 2) {
                $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
            } else {
                $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
            }

            $data['designation'] = getDesignation($row->designation);

            if ($row->area != 0)
                $data['area'] = getName('Geo_Settings', 'Name', 'Id', $row->area);
            else
                $data['area'] = '--';
            if ($row->shifttype == 3) {
                $data['shift'] = '<span title="Shift Hours: ' . $this->getFlexiShift($row->shift) . '">' . getShift($row->shift) . '</span>';
            } else {
                $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->shift) . ', Break Hours: ' . getShiftBreaks($row->shift) . '">' . getShift($row->shift) . '</span>';
            }

            $data['department'] = getDepartment($row->department);
            $data['contact'] = decode5t($row->PersonalNo);


            $data['status'] = $row->archive == 1 ? '<div style="background-color:#219653;text-align:center;color:white; border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px">Inactive</div>';


            $data['livetrack'] = $row->livelocationtrack == 1 ? '<div style="background-color:#219653;text-align:center;color:white;border-radius:100px; width:40px; font-size:13px; padding:2px;">ON</div>' : '<div style="background-color:#f15353;text-align:center;color:white; border-radius:100px; font-size:13px; width:40px; padding:2px;">OFF</div>';

            if ($data['contact'] != "")
                $qr = '<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '"
          data-ecode="' . $row->ecode . '" data-shift="' . substr(getShift($row->shift), 0, 15) . '" data-hourlyrate="' . getAllRate1($_SESSION['orgid'], $row->hourly_rate) . '"
          data-desg="' . getDesignation($row->designation) . '" data-city123="' . $row->city123 . '" data-web123="' . $row->web . '"data-dept="' . getDepartment($row->department) . '" data-shifttime="' . getShiftTimes($row->shift) . '" data-una="' . decode5t($row->una) . '" data-firstname="' . $row->FirstName . '" data-lastname="' . $row->lastname . '" data-location="' . $this->locationname($row->Location) . '" data-email="' . decode5t(getUserName($row->id)) . '" data-cont="' . decode5t($row->PersonalNo) . '" data-image="' . $row->ImageName . '" data-addr="' . decode5t($row->HomeAddress) . '" data-qrc="' . $row->qroption . '" data-upa="ykks==' . $row->upa . '" title="Generate QR Code" ></i>';

            else {
                $qr = '<i class="qr1 fa fa-qrcode" style="font-size:16px; color:purple"    data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Generate QR Code" ></i>';
            }

           

            $countryidd = ($row->CurrentCountry == 0) ? getCountryIdByOrg($orgid) : $row->CurrentCountry;
            $timezonnidd = 0;
            if ($row->timezone == '0' || $row->timezone == '') {
                $sql1 = $this->db->query("select Id from ZoneMaster where CountryId=  $countryidd");
                if ($row1 = $sql1->row()) {
                    $timezonnidd = $row1->Id;
                }
            } else {
                $timezonnidd = $row->timezone;
            }

            $data['country'] = getCountryNameById($countryidd);
            $data['timezone'] = gettimezonebyid($timezonnidd);

            $data['action'] = '<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 10rem; height:14rem; border-radius:5px; margin-left:10%";>
                                  <li style="height:30px; margin-top:-5%; padding-top:-4%; " class="edit modnew hover" id="getnew" data-toggle="modal" data-target="#addEmpE"  data-id="' . $row->id . '"
              data-name="' . $row->name . '"
              data-firstname="' . $row->FirstName . '"
              data-lastname="' . $row->lastname . '"
              data-area="' . $row->area . '"
              data-hourlyrate="' . getAllRate1($_SESSION['orgid'], $row->hourly_rate) . '"
    
              data-doj="' . $dateofjoining . '"
             
              data-doc="' . $row->DOC . '"
 
              data-cont="' . decode5t($row->PersonalNo) . '"
              data-addr="' . decode5t($row->HomeAddress) . '"
              data-password="' . $pass . '"
              data-email="' . decode5t(getUserName($row->id)) . '"
              data-country="' . $countryidd . '"
              data-timezone="' . $timezonnidd . '"
              data-city="' . $row->HomeCity . '"
              data-location="' . $this->locationname($row->Location) . '"
              data-status="' . $row->archive . '"
              data-shift="' . $row->shift . '"
              data-desg="' . $row->designation . '"
              data-dept="' . $row->department . '"
            
              data-hourlypay="' . $row->hourly_rate . '"
              data-sstatus="' . $row->appSuperviserSts . '"
              data-image="' . $imgname . '"
              data-ecode="' . $row->ecode . '"
              data-city123="' . $row->city123 . '"
              data-web123="' . $row->web . '"
              data-qrc="' . $row->qroption . '"
              data-entitledleave="' . $row->entitledleave . '"
              data-balanceleave="' . $balleave . '" ><img src="' . URL . "../assets/img/Vector.svg" . '" class="  material-icons " style="font-size:16px; margin-left:15px;"  title="Edit"><a href="#" style="color:black; font-size:13px; margin-left:8px; font-weight:500;">Edit</a></li> 
            

                                  <li style="height:30px;" data-toggle="modal" class="delete hover" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" data-target="#delEmp" style="height:33px; margin-left:5%;"> <img src="' . URL . "../assets/img/trash-2.svg" . '"   style="font-size:16px; margin-left:15px;"  data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Archive" ><a href="#" style="color:black; font-size:13px; margin-left:8px; font-weight:500;">Delete</a> </li>
                                  
                                 <li style="height:30px;" class="status hover" data-toggle="modal" data-target="#changestatus" data-id="' . $row->id . '" data-sts="' . $row->archive . '" data-ena="' . $row->FirstName . ' ' . $row->lastname . '"><i class="  fa fa-thumbs-down"  style="font-size:16px; color:black;  margin-left:15px;" title="Inactive" ></i><a href="#" style="color:black; font-size:13px; margin-left:8px; font-weight:500;">Inactive</a></li>

                                  <li style="height:30px;" class="resetpwd hover" data-toggle="modal" data-target="#resetpwd" typographi="' . $pass . '" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '"><i class="  fa fa-key" style="font-size:16px; margin-left:15px; "  title="Reset password Only App " ></i><a href="#" style="color:black; font-size:13px; margin-left:8px; font-weight:500;">Reset Password</a></li>
                                 
                                <li style="height:30px;" class="qr hover" data-toggle="modal" data-target="#genQR" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" data-desg="' . getDesignation($row->designation) . '" data-dept="' . getDepartment($row->department) . '" data-una="' . decode5t($row->una) . '" data-upa="ykks==' . $row->upa . '"><i class="fa fa-qrcode" style="font-size:16px; margin-left:15px;"  title="Generate QR Code" ></i><a href="#" style="color:black; font-size:13px; margin-left:8px; font-weight:500;">QR Code</a> <li>

                                 <li style="height:30px;" data-toggle="modal" data-target="#activitylog" class="hover"><i class="activitylog fa fa-history" style="font-size:16px; margin-left:15px;" title="Activity Log" ></i><a href=' . URL . 'Userprofiles/empactivitylog/' . $row->id . ' style="color:black; font-size:13px; margin-left:8px; font-weight:500;">Acitivity Log</a></li>

                                 <li style="height:30px;" data-toggle="modal" data-target="#leaveandtimeoff" class="hover"><i class="fa fa-calendar" style="font-size:16px; margin-left:15px;" title="Leave & Timeoff" ></i><a href=' . URL . 'Userprofiles/empwisecalendar/' . $row->id . ' style="color:black; font-size:13px; margin-left:8px; font-weight:500;">Leave & Timeoff</a></li></ul></div>';


            $res[] = $data;
        }
        $d['data'] = $res;
        $this->db->close();     //$query->result();
        echo json_encode($d);
        return false;
    }

    public function getEmpotTmp() {
        $orgid = $_SESSION['orgid'];
        $date = date('y-m-d');
        $res = array();
        $d = array();
        $query = $this->db->query("select FirstName,CreatedDate,Designation,Department,Shift,PersonalNo,email,EmployeeCode,remark FROM Temp_user_csv WHERE CreatedDate='$date' AND OrganizationId='$orgid' ");

        foreach ($query->result() as $row) {
            $data = array();
            $data['fname'] = $row->FirstName;
            //$data['lname'] = $row->LastName;
            $data['desg'] = $row->Designation;
            $data['deprt'] = $row->Department;
            $data['shift'] = $row->Shift;
            // var_dump( $data['shift']);
            $data['cont'] = $row->PersonalNo;
            $data['email'] = $row->email;
            $data['ecode'] = $row->EmployeeCode;
            $data['Date'] = $row->CreatedDate;
            $data['remark'] = $row->remark;
            $res[] = $data;
        }
        $d['data'] = $res;

        echo json_encode($d);
    }

    public function editdepartment() {
        $orgid = $_SESSION['orgid'];
        $deptS = isset($_REQUEST['deptS']) ? $_REQUEST['deptS'] : 0;
        $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;
        $favorite1 = implode(",", $favorite);
        $sql = "update EmployeeMaster set Department=$deptS  where OrganizationId =$orgid and id IN ($favorite1)";
        $query = $this->db->query($sql);
        echo $query;
        if ($query == true) {
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;

            $favorite1 = implode(",", $favorite);
            // $name = getEmpName($favorite1);
            $i = 0;
            for ($i = 0; $i < count($favorite); $i++) {
                $empid121 = $favorite[$i];
                $module = "Employees";
                $actionperformed = " <b>Department</b> has been <b>Updated </b>for <b>" . getEmpName($empid121) . "</b> from <b>Active Employees </b>.";
                $activityby = 1;

                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
            }
        } else {
            return false;
        }
    }

    public function getInactiveEmpData() {
        $orgid = $_SESSION['orgid'];
        $query = $this->db->query("SELECT EmployeeMaster.id as id, `FirstName`,lastname,archive,department,designation,shift,PersonalNo,DOB, Nationality, `MaritalStatus`,`Religion`,`BloodGroup`,`DOJ`, `DOC`,`Gender`,`HomeAddress`, `HomeCountry`, `HomeCity`, `HomeZipCode`,(select appSuperviserSts from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1 )as appSuperviserSts,(select Username from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1 )as una,(select Password from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as upa FROM `EmployeeMaster` where OrganizationId=? AND archive = 0 AND Is_Delete = '0' ", array($orgid));
        $d = array();
        $res = array();
        $userstts = '';
        foreach ($query->result() as $row) {
            //   if ($row->archive == 1)
            //$userstts = '<i class=" status fa fa-thumbs-down" style="font-size:16px; color:red" data-target="#delEmp" data-id="' . $row->id . '" title="Click to make user Inactive" data-ena="' . $row->FirstName . ' ' . $row->lastname . '" ></i>';
            // else
            // $userstts = '<i class=" status fa fa-thumbs-up" style="font-size:16px; color:green" data-target="#delEmp" data-id="' . $row->id . '"  title="Make user Active" data-ena="' . $row->FirstName . ' ' . $row->lastname . '" ></i>';

            $data = array();
            $data['name'] = $row->FirstName . ' ' . $row->lastname;
            $data['username'] = decode5t(getUserName($row->id));
            $data['designation'] = getDesignation($row->designation);
            $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->shift) . ', Break Hours: ' . getShiftBreaks($row->shift) . '">' . getShift($row->shift) . '</span>';
            $data['department'] = getDepartment($row->department);
            $data['contact'] = decode5t($row->PersonalNo);
            $data['status'] = $row->archive == 1 ? '<div style="background-color:green;text-align:center;color:white;border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white;border-radius:100px;">Inactive</div>';
            $data['action'] = '
          <!--  <a href="#"><i class="material-icons edit" style="font-size:26 px" data-toggle="modal" title="Edit" data-target="#addEmpE"  
             data-id="' . $row->id . '"
             data-firstname="' . $row->FirstName . '" 
             data-lastname="' . $row->lastname . '" 
             data-dob="' . $row->DOB . '"
             data-doj="' . $row->DOJ . '"
             data-gen="' . $row->Gender . '"
             data-doc="' . $row->DOC . '"
             data-nat="' . $row->Nationality . '"
             data-cont="' . decode5t($row->PersonalNo) . '"
             data-addr="' . decode5t($row->HomeAddress) . '"
             data-password="' . '' . '"
             data-email="' . decode5t(getUserName($row->id)) . '"
             data-country="' . $row->HomeCountry . '"
             data-city="' . $row->HomeCity . '"
             data-status="' . $row->archive . '"
             data-shift="' . $row->shift . '"
             data-desg="' . $row->designation . '"
             data-dept="' . $row->department . '"
             data-bg="' . $row->BloodGroup . '"
             data-rel="' . $row->Religion . '"
             data-ms="' . $row->MaritalStatus . '"
             data-sstatus="' . $row->appSuperviserSts . '"
             >edit</i></a> -->
           
<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6rem; height:4.3rem; border-radius:5px; margin-left:-25%; margin-top:-7%;">

                                    <li data-toggle="modal" class="delete hover" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" data-target="#delEmp" style="height:33px; margin-top:-7%; padding-top:4%;"> <i class=" fa fa-trash"   style="font-size:16px; margin-left:15px;"  data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Archive" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Delete</a> </li>
                                   <li data-toggle="modal"class="status hover" data-id="' . $row->id . '" data-target="#changestatus" data-ena="' . $row->FirstName . ' ' . $row->lastname . '" style="height:33px; padding-top:4%;"><i class=" fa fa-thumbs-up" style="font-size:16px; margin-left:15px;"  data-id="' . $row->id . '"  title="Make user Active" data-ena="' . $row->FirstName . ' ' . $row->lastname . '" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Active</a></li>
                                  </ul>
                                </div>             
<!--<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" data-desg="' . getDesignation($row->designation) . '" data-dept="' . getDepartment($row->department) . '" data-una="' . decode5t($row->una) . '" data-upa="ykks==' . $row->upa . '" title="Generate QR Code" ></i> -->
            ' . $userstts;
            $res[] = $data;
        }
        $d['data'] = $res;
        $this->db->close();      //$query->result();
        echo json_encode($d);
    }

    public function getBalanceLeave($orgid, $empid) {

        $query = $this->db->query("SELECT E.FirstName,E.entitledleave,E.DOJ,O.fiscal_start,O.fiscal_end,O.entitled_leave FROM `EmployeeMaster` E, Organization O where E.OrganizationId=O.Id And E.Id='$empid' And E.OrganizationId='$orgid'");
        $res = array();
        $balanceleave = 0;
        $entitledleave = 0;
        foreach ($query->result() as $row) {

            if ($row->entitledleave == '') {
                $entitledleave = $row->entitled_leave;
            } else {
                $entitledleave = $row->entitledleave;
            }


            ////fiscal start/////
            $dateofjoin = date("m/d/Y", strtotime($row->DOJ));
            $fiscalstart = date("m/d", strtotime($row->fiscal_start));
            $fiscalstartmon = substr($fiscalstart, 0, 2);
            $dateofjoinmon = substr($dateofjoin, 0, 2);
            $fiscalstartdate = substr($fiscalstart, 3, 2);
            $joindate = substr($dateofjoin, 3, 2);


            if ($dateofjoinmon < $fiscalstartmon) {
                $doj = date("Y", strtotime($dateofjoin)) - 1;
                $fiscalstartdate = $fiscalstart . "/" . $doj;
            } elseif ($dateofjoinmon == $fiscalstartmon && $joindate < $fiscalstartdate) {
                $doj = date("Y", strtotime($dateofjoin)) - 1;
                $fiscalstartdate = $fiscalstart . "/" . $doj;
            } elseif ($dateofjoinmon == $fiscalstartmon && $joindate == $fiscalstartdate) {
                $doj = date("Y", strtotime($dateofjoin));
                $fiscalstartdate = $fiscalstart . "/" . $doj;
            } else {
                $doj = date("Y", strtotime($dateofjoin));
                $fiscalstartdate = $fiscalstart . "/" . $doj;
            }
            ////fiscal start////
            ////fiscal end////
            $dateofjoin = date("m/d/Y", strtotime($row->DOJ));
            $fiscalend = date("m/d", strtotime($row->fiscal_end));
            $fiscalendmon = substr($fiscalend, 0, 2);
            $dateofjoinmon = substr($dateofjoin, 0, 2);
            $fiscalenddate = substr($fiscalend, 3, 2);
            $joindate = substr($dateofjoin, 3, 2);

            if ($dateofjoinmon > $fiscalendmon) {
                $doj = date("Y", strtotime($dateofjoin)) + 1;
                $fiscalenddate = $fiscalend . "/" . $doj;
            } elseif ($dateofjoinmon == $fiscalendmon && $joindate > $fiscalenddate) {
                $doj = date("Y", strtotime($dateofjoin)) + 1;
                $fiscalenddate = $fiscalend . "/" . $doj;
            } elseif ($dateofjoinmon == $fiscalendmon && $joindate == $fiscalenddate) {
                $doj = date("Y", strtotime($dateofjoin));
                $fiscalenddate = $fiscalend . "/" . $doj;
            } else {
                $doj = date("Y", strtotime($dateofjoin));
                $fiscalenddate = $fiscalend . "/" . $doj;
            }
            ////fiscal end////
            // echo $fiscalstartdate;
            // echo $fiscalenddate;
            // exit(); 


            $currentDate = date('Y-m-d');
            $currentDate = date('Y-m-d', strtotime($currentDate));
            $startDate = date('Y-m-d', strtotime($fiscalstartdate));
            $endDate = date('Y-m-d', strtotime($fiscalenddate));

            if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
                //echo "Current date is between two dates";
                //Calculating the difference in timestamps 
                $diff = strtotime($fiscalenddate) - strtotime($dateofjoin);

                //1 day = 24 hours 
                //24 * 60 * 60 = 86400 seconds 
                $Difference_In_Days = abs(round($diff / 86400));
                //echo $Difference_In_Days;
                $bal1 = (intval($entitledleave) / 12);
                $bal2 = ($Difference_In_Days / 30.4167);

                $balanceleave = $bal1 * $bal2;
                return strstr($balanceleave, '.', true);
            } else {
                //echo "Current date is not between two dates"; 
                $balanceleave = $entitledleave;
                return $balanceleave;
            }
        }
    }

    public function locationname($id) {

        $sql = "select  Name from LocationMaster where id=$id";

        $query1 = $this->db->query($sql);

        if ($row = $query1->result()) {

            return $row[0]->Name;
        }
    }

    public function getArchiveEmp() {
        $org_id = $_SESSION['orgid'];
        $res = array();
        $query = $this->db->query("Select Id ,Shift,Department,Designation  FROM EmployeeMaster Where OrganizationId = " . $org_id . " AND Is_Delete = 1 Order By FirstName ");
        foreach ($query->result() as $row) {
            $data = array();
            //$data['change'] = '<input type="checkbox" name="chk"  id="' . $row->Id . '" class="checkbox"  value="' . $row->Id . '" >';
            $data['FirstName'] = getDeleteEmpName($row->Id);
            $data['desg'] = ucwords(getDesignationByEmpID($row->Id));
            $data['deprt'] = ucwords(getDepartmentByEmpID($row->Id));
            $data['action'] = '<div class="dropdown">
                                 
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 8rem; height:4.15rem; border-radius:5px;   margin-left:-25%">
                                   <li style="font-size:0.8rem; margin-top:-6%; padding-top:4%; height:32px;" class="unarchive hover" data-toggle="modal" data-target="#unarchive"   data-id="' . $row->Id . '" data-name="' . $data['FirstName'] . '" ><i class=" fa fa-archive" style="font-size:16px; margin-left:15px;" data-toggle="modal" data-target="#unarchive"   data-id="' . $row->Id . '" data-name="' . $data['FirstName'] . '" title="Unarchive Employee" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Unarchive</a></li>
                                    <li style="font-size:0.8rem; height:32px; padding-top:4%;" class="delete hover" data-toggle="modal" data-target="#delE"  data-id="' . $row->Id . '" data-name="' . $data['FirstName'] . '"><i class=" fa fa-trash" style="font-size:16px; margin-left:15px;" data-toggle="modal" data-target="#delE"  data-id="' . $row->Id . '" data-name="' . $data['FirstName'] . '" title="Delete Permanently" ></i><a href="#" style="color:black; font-size:13px; margin-left:10px;">Delete</a></li>
                                  </ul>
                                </div>';
            $res[] = $data;
        }
        $d['data'] = $res;          //$query->result();
        $this->db->close();
        echo json_encode($d);
        return false;
    }

    public function UnarchiveUser() {
        $orgid = $_SESSION['orgid'];
        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : 0;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $sql = "update EmployeeMaster set Is_Delete = '0' where Id = $sid";
        $query = $this->db->query($sql);
        /// Activity log by sohan
        $date = date("y-m-d H:i:s");
        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];
        //$module = "Archived Employee";
        $module = "Employee";
        $actionperformed = "<b>" . getEmpName($sid) . "</b> has been <b>Unarchived</b> from <b>Archive employess</b>";
        $activityby = 1;
        $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
        echo $this->db->affected_rows();
    }

    public function deleteUserpermanent__New() {
        /* echo 1;
          return false; */
        $orgid = $_SESSION['orgid'];
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $todaydate = date('Y-m-d');
        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : 0;
        $query = $this->db->query("Select Id from UserMaster where EmployeeId = $sid AND appSuperviserSts = 0 ");
        if ($this->db->affected_rows() > 0) {
            /// Activity log by sohan
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            $module = "Employees";
            $actionperformed = "<b>" . getDeleteEmpName($sid) . "</b> has been <b>deleted</b> from <b>Archived Employees List</b>";
            $activityby = 1;
            $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));

            /// clase activity log
            $sql = "Delete from AttendanceMaster  where EmployeeId= $sid";
            $query = $this->db->query($sql);
            if ($query > 0) {
                $sql = "update  EmployeeMaster set  Is_Delete = 2 where Id = $sid";
                $query = $this->db->query($sql);
                if ($query > 0) {
                    $sql = "Delete from  UserMaster  where EmployeeId = $sid";
                    $query = $this->db->query($sql);
                    if ($this->db->affected_rows() > 0) {
                        $sql = "Delete from  `Timeoff` WHERE EmployeeId=$sid and `OrganizationId`='$orgid'";
                        $query = $this->db->query($sql);
                        if ($query > 0) {
                            $sql = " Delete from  `checkin_master`  WHERE EmployeeId = $sid and OrganizationId ='$orgid'";
                            $queryn = $this->db->query($sql);
                            if ($queryn > 0) {
                                /* start updating previous dues */
                                $query = $this->db->query("select count(id) as totalUsers,(select NoOfEmp from Organization where Organization.Id =$orgid) as ulimit,(select status from licence_ubiattendance where licence_ubiattendance.OrganizationId =$orgid) as orgstatus from UserMaster where OrganizationId = $orgid");
                                if ($r = $query->result()) {
                                    if ($r[0]->totalUsers >= $r[0]->ulimit) {
                                        $range = '1-20';
                                        if ($r[0]->totalUsers < 21)
                                            $range = '1-20';
                                        else if ($r[0]->totalUsers >= 21 && $r[0]->totalUsers < 41)
                                            $range = '21-40';
                                        else if ($r[0]->totalUsers >= 41 && $r[0]->totalUsers < 61)
                                            $range = '41-60';
                                        else if ($r[0]->totalUsers >= 61 && $r[0]->totalUsers < 81)
                                            $range = '61-80';
                                        else if ($r[0]->totalUsers >= 81 && $r[0]->totalUsers < 101)
                                            $range = '81-100';
                                        else if ($r[0]->totalUsers >= 101 && $r[0]->totalUsers < 121)
                                            $range = '101-120';
                                        else
                                            $range = '120+';
                                        $sdate = '-';
                                        $edate = '-';
                                        $country = 93;
                                        $rate_per_day = 0;
                                        $days = 0;
                                        $currency = '';
                                        $due = 0;

                                        $bulk_att_price1 = 0;
                                        $location_tracing_price1 = 0;
                                        $visit_punch_price1 = 0;
                                        $geo_fence_price1 = 0;
                                        $payroll_price1 = 0;
                                        $time_off_price1 = 0;

                                        $bulk_att_price_per_day = 0;
                                        $location_tracing_price_per_day = 0;
                                        $visit_punch_price_per_day = 0;
                                        $geo_fence_price_per_day = 0;
                                        $payroll_price_per_day = 0;
                                        $time_off_price_per_day = 0;

                                        $orgstatus = $r[0]->orgstatus;

                                        $query1 = $this->db->query("select start_date,end_date,due_amount,DATEDIFF(end_date,CURDATE())as days,(SELECT `Country` FROM `Organization` WHERE `Id`=$orgid)as country,Addon_BulkAttn,Addon_LocationTracking,Addon_VisitPunch,Addon_GeoFence,Addon_Payroll,Addon_TimeOff from licence_ubiattendance where OrganizationId = $orgid");
                                        if ($r1 = $query1->result()) {
                                            $sdate = $r1[0]->start_date;
                                            $edate = $r1[0]->end_date;
                                            $days = $r1[0]->days;
                                            $due = $r1[0]->due_amount;
                                            $currency = $r1[0]->country == 93 ? 'INR' : 'USD';

                                            $bulk_att_addon = $r1[0]->Addon_BulkAttn;
                                            $location_addon = $r1[0]->Addon_LocationTracking;
                                            $visitpunch_addon = $r1[0]->Addon_VisitPunch;
                                            $geofence_addon = $r1[0]->Addon_GeoFence;
                                            $payroll_addon = $r1[0]->Addon_Payroll;
                                            $timeoff_addon = $r1[0]->Addon_TimeOff;

                                            $query2 = $this->db->query("SELECT  monthly  FROM `Attendance_plan_master` WHERE `range`='$range' and `currency`='$currency'");
                                            if ($r2 = $query2->result())
                                                $rate_per_day = ($r2[0]->monthly) / 30;

                                            $query2 = $this->db->query("SELECT  bulk_attendance,location_tracing,visit_punch,geo_fence,payroll,
              time_off  FROM `Attendance_plan_master` WHERE `range`='$range' and `currency`='$currency' ");
                                            if ($r2 = $query2->result()) {
                                                $bulk_att_price_per_day = ($r2[0]->bulk_attendance) / 30;
                                                $location_tracing_price_per_day = ($r2[0]->location_tracing) / 30;
                                                $visit_punch_price_per_day = ($r2[0]->visit_punch) / 30;
                                                $geo_fence_price_per_day = ($r2[0]->geo_fence) / 30;
                                                $payroll_price_per_day = ($r2[0]->payroll) / 30;
                                                $time_off_price_per_day = ($r2[0]->time_off) / 30;
                                            }


                                            if ($bulk_att_addon != 0) {
                                                $bulk_att_price1 = $bulk_att_price_per_day;
                                            }
                                            if ($location_addon != 0) {
                                                $location_tracing_price1 = $location_tracing_price_per_day;
                                            }
                                            if ($visitpunch_addon != 0) {
                                                $visit_punch_price1 = $visit_punch_price_per_day;
                                            }
                                            if ($geofence_addon != 0) {
                                                $geo_fence_price1 = $geo_fence_price_per_day;
                                            }
                                            if ($payroll_addon != 0) {
                                                $payroll_price1 = $payroll_price_per_day;
                                            }
                                            if ($timeoff_addon != 0) {
                                                $time_off_price1 = $time_off_price_per_day;
                                            }
                                        }



                                        $payable_amt = 0;
                                        $tax = 0;
                                        $total = 0;
                                        if ($currency == 'INR')
                                            $tax = ($bulk_att_price1 + $location_tracing_price1 + $visit_punch_price1 + $geo_fence_price1 + $payroll_price1 + $time_off_price1 + $rate_per_day) * ($days) * (0.18);

                                        $payable_amt = ($bulk_att_price1 + $location_tracing_price1 + $visit_punch_price1 + $geo_fence_price1 + $payroll_price1 + $time_off_price1 + $rate_per_day) * $days;
                                        $payamtwidtax = round(($payable_amt + $tax), 2);
                                        $total = round(($due - ($tax + $payable_amt)), 2);

                                        /////////////update due amount-start
                                        if ($total < 0) {
                                            Trace("Total is less than zero" . $total);
                                            $total = 0;
                                            $query1 = $this->db->query("UPDATE `licence_ubiattendance` SET `due_amount`=$total WHERE `OrganizationId` = $orgid");
                                        } else {
                                            $query1 = $this->db->query("UPDATE `licence_ubiattendance` SET `due_amount`=$total WHERE `OrganizationId` = $orgid");
                                            /////////////update due amount-close
                                            if ($orgstatus == 1) {
                                                $subject = getOrgName($orgid) . " -Billing details for changed users";
                                                //$subject="ubiAttendance - Exceeded User Limit";
                                                $message = "<div style='color:black'>
            Greetings from ubiAttendance App<br/><br/>
            The no. of users in your ubiAttendance Plan have reduced. We have updated your plan.<br/>
            <h4 style='color:blue'>Plan Details:</h4>
            Company name: " . getOrgName($orgid) . "<br/>
            Plan Start Date:" . date('d-M-Y', strtotime($sdate)) . "<br/>
            Plan End Date:" . date('d-M-Y', strtotime($edate)) . "<br/>
            User limit: " . $r[0]->ulimit . "<br/>
            Registered Users: " . ($r[0]->totalUsers) . "<br/>
            <br/>
            <h4 style='color:blue'>Billing Details:</h4>
            Previous Dues: " . $due . ' ' . $currency . " <br/>
            Reduction for deleted Users: -" . $payamtwidtax . ' ' . $currency . "<br/>
            Amount Payable: " . $due . " - " . $payamtwidtax . " = " . $total . " " . $currency . " <br/>
            <br/>
            ";
                                                $message .= "Cheers,<br/>
            Team ubiAttendance<br/><a target='_blank' href='http://www.ubiattendance.com'>www.ubiattendance.com</a><br/> Tel/ Whatsapp: +91 70678 22132<br/>Email: ubiattendance@ubitechsolutions.com<br/>Skype: ubitech.solutions</div>";
                                                $headers = "MIME-Version: 1.0" . "\r\n";
                                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                $headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
                                                $adminMail = getAdminEmail($orgid);
                                                Trace("<br/><br/>Delete Message:   " . $message);
                                                sendEmail_new($adminMail, $subject, $message, $headers);
                                                sendEmail_new('ubiattendance@ubitechsolutions.com', $subject, $message, $headers);
                                                //sendEmail_new('deeksha@ubitechsolutions.com',$subject,$message,$headers); 
                                                //sendEmail_new('sohan@ubitechsolutions.com',$subject,$message,$headers); 
                                            }
                                        }
                                    }
                                }

                                /* end updating previous dues */


                                $this->db->close();
                                echo $queryn;
                            }
                        }
                    }
                }
            }
        } else {
            echo 2;
        }
    }



    public function insertUsermaster() {

        $orgid = $_SESSION['orgid'];
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $fname = isset($_REQUEST['firstName']) ? ucfirst($_REQUEST['firstName']) : 0;
        $x = isset($_REQUEST['areaAssign']) ? $_REQUEST['areaAssign'] : 0;
        $area = str_replace(' ', '', $x);


        $ecode = isset($_REQUEST['ecode']) ? $_REQUEST['ecode'] : 0;
        $dofj = isset($_REQUEST['doj']) ? $_REQUEST['doj'] : 0;
        $doj = date("Y-m-d", strtotime($dofj));
        $doc = $doj;
        $dept = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $desg = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $shift = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $sts = isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 0;
        $sts1 = isset($_REQUEST['sts1']) ? $_REQUEST['sts1'] : 0;
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : 0;
        $timezone = isset($_REQUEST['timezone']) ? $_REQUEST['timezone'] : 0;
        $hourlyrate = isset($_REQUEST['hourlyrate']) ? $_REQUEST['hourlyrate'] : 0;
        $password = encode5t(isset($_REQUEST['password']) ? $_REQUEST['password'] : 0);
        $email = encode5t(isset($_REQUEST['email']) ? strtolower($_REQUEST['email']) : 0);
        $cont = isset($_REQUEST['PersonalNo']) ? encode5t($_REQUEST['PersonalNo']) : 0;
        $entitledleave = isset($_REQUEST['entitledleave']) ? $_REQUEST['entitledleave'] : 0;
        $restrictfence  =  isset($_REQUEST['restrictfence'])?$_REQUEST['restrictfence']:0;
        
        //$entitledleave = str_replace(' ', '', $enttldlv);
        if ($area == 'undefined') {
            $area = '0';
        }

        if ($entitledleave == 'undefined') {
            $entitledleave = '';
        }

        $profile = isset($_FILES['prof']) ? $_FILES['prof'] : 0;
        // echo "<pre>";
        //print_r($profile);
        //exit;
        $check = true;

        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $date = date('Y-m-d H:i:s');
        //  $location = IMGURL . "$orgid/";
        $mailtrigger = $this->db->query("SELECT employee_mail_trigger FROM admin_login WHERE OrganizationId='$orgid'");
        if ($row = $mailtrigger->result()) {
            $mailsts = $row[0]->employee_mail_trigger;
            /////////var_dump($mailsts);
        }
        if ($email != '') {
            $sql = "Select Id from UserMaster where Username = '$email'";
            $query = $this->db->query($sql);
            $query->num_rows();
            if ($query->num_rows() > 0) {
                $check = false;
                echo 1;
                return;
            }
        }

        if ($cont != '') {
            $sql = "Select Id from EmployeeMaster where (PersonalNo = ' $cont' and Is_Delete != 2)  ";
            //echo $sql;
            $query = $this->db->query($sql);
            $query->num_rows();
            if ($query->num_rows() > 0) {
                $check = false;
                echo 2;
                return;
            }
        }
        ///echo $query->num_rows() ;
        //exit;

        if ($ecode != '' && $ecode != '0') {
            $sql = "Select * from EmployeeMaster where EmployeeCode = ? and OrganizationId=? and Is_Delete != 2";
            $query = $this->db->query($sql, array($ecode, $orgid));
            $query->num_rows();
            if ($query->num_rows() > 0) {
                $check = false;
                echo 3;
                return;
            }
        }
        if ($check) {
            if ($profile) {
                $sql = ("INSERT INTO EmployeeMaster (FirstName,EmployeeCode,DOJ,DOC,Department,Designation,Shift,archive,CurrentCountry,timezone,hourly_rate,PersonalNo,OrganizationId,area_assigned,CompanyEmail,entitledleave,fencearea) VALUES ('$fname','$ecode',' $doj',' $doc','$dept',' $desg',' $shift',' $sts',' $country','$timezone',' $hourlyrate',' $cont',' $orgid',' $area',' $email',' $entitledleave','$restrictfence')");
                $q = $this->db->query($sql);

                $emp_id = $this->db->insert_id();
                $uid = $emp_id . ".jpg";
				
                ///////////////////////////////move profile images on local folder/////////////////////////////////
                 $locProfile=$uid;
                 if(LOCATION=='online')
        {
         $tmpfile = $_FILES['prof']['tmp_name'];
         $result_save = S3::putObject(S3::inputFile($tmpfile), 'ubihrmimages',''.$orgid.'/'.$uid, S3::ACL_PUBLIC_READ);
          $sql = "update EmployeeMaster set ImageName=? where OrganizationId = ? and id =? ";
          $query = $this->db->query($sql,array($locProfile,$orgid,$emp_id));
        }
                ///////////////////////////////move profile images on s3 bucket folder////////////////////////////
            } else {
                $q = ("INSERT INTO EmployeeMaster (FirstName,EmployeeCode,DOJ,DOC,Department,Designation,Shift,archive,CurrentCountry,timezone,hourly_rate,PersonalNo,OrganizationId,area_assigned,CompanyEmail,entitledleave,fencearea) VALUES ( '$fname','$ecode', '$doj', '$doc',' $dept',' $desg','$shift','$sts',' $country','$timezone',' $hourlyrate',' $cont',' $orgid',' $area',' $email',' $entitledleave','$restrictfence')");
                $sql = $this->db->query($q);
                $emp_id = $this->db->insert_id();
            }
            $result = $this->db->affected_rows();
            if ($result > 0) {
                $sql = "INSERT INTO UserMaster (EmployeeId,Password,Username,username_mobile,appSuperviserSts,Archive,OrganizationId) VALUES ($emp_id,'$password','$email','$cont','$sts1','$sts',$orgid)";
                $this->db->query($sql);
                //echo $sql;
                //exit;
                echo 4;


            }
            $result = $this->db->affected_rows();
            if ($result > 0) {

                ///////////////////mail drafted
                ///////////////////////mail drafted
                //////////////////mail to emp
                $empmailid = $_REQUEST['email'];



                if ($empmailid != '') {


                    $message = "<html>
              <head>
              <title>ubiAttendance</title>
              </head>
              <body>Hello " . $fname . ",<br/>
              <p>
              You are successfully registered on ubiAttendance app.<br/><br/>
              Follow below steps to start punching your attendance:<br/><br/>
              
            1. Download & Install the App through the following links:
              <ol>
            <li>Android -<a href='https://play.google.com/store/apps/details?id=org.ubitech.ubiattendance'>https://play.google.com/store/apps/details?id=org.ubitech.ubiattendance</a></li>
            <li>Ios -<a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a></li>
              </ol>
            2. Open the App & <b>sign in.</b><br/>
              
              
               Username: " . $_REQUEST['email'] . "<br/>
               Password: " . decode5t($password) . "<br/>           
              <br/>
              3. Click on  <b>Time In</b> to punch your Attendance.</br>
              
              
            </body>
            </html>";
                    //echo $message;
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
                    //$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
                    $subject = "You have registered on ubiAttendance.";
                    //  sendEmail_new($email,$subject,$message,$headers);


                    sendEmail_new($empmailid, $subject, $message, $headers);




                    //sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
                    //sendEmail_new('sohan@ubitechsolutions.com',$subject,$message,$headers);
                    sendEmail_new('ubiattendance@ubitechsolutions.com', $subject, $message, $headers);
                }

                //////////////////mail to emp-close
                else {
                    $message = "<html>
              <head>
              <title></title>
              </head>
            <body>
            <h3>Dear Admin,</h3>
            <p>Please send the below message through text or Email to the Employee to get him started. The message below is already sent to the Employees with valid Email ID</p>
            <p>You are registered in ubiAttendance App for � Ubitech Solutions�. Kindly punch your attendance through the following steps.</p>
            <ol>
            <li> 
              Download the Android App by clicking <a  
              href='https://play.google.com/store/apps/details?id=org.ubitech.attendance.'>https://play.google.com/store/apps/details?id=org.ubitech.attendance.</a> 
              iPhone users can download through 
              <a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a>
            </li>
            <li>Install the App.  It will be added to the home screen</li>
            <li>Open the App & sign in. User name will be the registered Email/Phone no.</li>
            <li>Initial Sign in Password is " . decode5t($password) . "</li>
            <li>You can now start punching the attendance.</li>
            <li>Download the detailed Employee guide</li>
            </ol>
            <p>For further assistance, kindly contact your system administrator.</p>
            <h5>Cheers,</h5>
            <h5>ubiAttendance Team</h5>
            </body>
            </html>";

                    /*
                      You can edit Employee�s Profile through the Web Application.<br/>
                      Admin Login for Web Application<br/>
                      Login URL: https://ubiattendance.ubihrm.com<br/>
                      Company's Reference No. (CRN): <b>".encode_vt5($orgid)."</b><br/>
                      User Id: <b>".getAdminUsername($orgid)."</b><br/>
                      Password: Sent in the registration<br/> */
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
                    //$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
                    $subject = "UbiAttendance New Employee Registration.";
                    //  sendEmail_new($email,$subject,$message,$headers);
                    $adminMail = getAdminEmail($orgid);


                    sendEmail_new('ubiattendance@ubitechsolutions.com', $subject, $message, $headers);
                    if ($mailsts == '1') {

                        sendEmail_new($adminMail, $subject, $message, $headers);

                        //sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
                        sendEmail_new('devendra@ubitechsolutions.com', $subject, $message, $headers);
                        sendEmail_new('shakir@ubitechsolutions.com', $subject, $message, $headers);

                        //echo $message;
                    }
                }
            }
        }
    }

    public function timezone() {
        $Id = isset($_REQUEST['country']) ? $_REQUEST['country'] : '';
        //echo $Id;
        $data = array();
        $data['timezone'] = 0;
        $query = $this->db->query("SELECT Z.CountryId,Z.`Id`, Z.`Name` FROM `ZoneMaster`Z,  CountryMaster C WHERE Z.CountryId=C.Id and Z.CountryId='$Id' ");
        //var_dump($this->db->last_query());
        $d = array();
        $res = array();
        foreach ($query->result() as $row) {
            $data['timezone'] = $row->Name;
            $data['timezone_id'] = $row->Id;
            //echo $data['code'];
            $res[] = $data;
        }
        $d['data'] = $res;          //$query->result();
        echo json_encode($d);
        return false;
    }

    public function deleteUser__New() {
        $orgid = $_SESSION['orgid'];
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $todaydate = date('Y-m-d');

        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : 0;
        // echo 'hello'.$sid;
        // exit;
        $query = $this->db->query("Select Id, archive as arc from UserMaster where EmployeeId = $sid AND appSuperviserSts = 0 ");

        if ($this->db->affected_rows() > 0) {
            $query1 = $this->db->query("Select Id, archive from UserMaster where EmployeeId = $sid AND appSuperviserSts = 0 ");
            if ($r1 = $query1->result()) {
                $arc = $r1[0]->archive;
                // echo $arc;
            }
            $sql = "update EmployeeMaster set Is_Delete = 1, Deleted_Date = '$todaydate'  where Id = $sid";

            $query2 = $this->db->query($sql);




            $faceperm = getAddonPermission($orgid, 'Addon_FaceRecognition');
            if ($faceperm == '1') {

                $sql3 = "select PersistedFaceId,PersonId from Persisted_Face where EmployeeId= $sid";
                $query3 = $this->db->query($sql3);
                if ($row = $query3->row()) {
                    $persistedfaceid = $row->PersistedFaceId;
                    $personid = $row->PersonId;
                    face_delete($persistedfaceid, $personid, $orgid);
                    persongrouptrain($orgid);
                }


                $sql4 = "update Persisted_Face set PersistedFaceId='0',profileimage='0'  where EmployeeId = $sid";
                $query4 = $this->db->query($sql4);
            }
            // var_dump($query);
            $sts = "";
            if ($arc == 1) {
                $sts = "Active employee";
            }
            if ($arc == 0) {
                $sts = "Inactive employee";
            }
            /// Activity log by sohan
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            $module = "Employees";



            $actionperformed = "<b>" . getDeleteEmpName($sid) . "</b> has been <b>archived</b> from <b>" . $sts . " </b> and moved to <b>Archived Employees List</b>";
            $activityby = 1;

            $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));


            echo $this->db->affected_rows();
        } else {
            echo 2;
        }
    }

    public function updateUserStatus() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        // echo 'hello'.$empid;
        // exit;
        $sts = ( isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 0) == 1 ? 0 : 1;
        //echo 'hello'. $sts;
        //exit;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $updSts = 0;
        $sql = "update EmployeeMaster set archive = $sts where id = $empid";
        $query = $this->db->query($sql);

        $faceperm = getAddonPermission($orgid, 'Addon_FaceRecognition');
        if ($faceperm == '1' && $sts == 0) {

            $sql3 = "select PersistedFaceId,PersonId from Persisted_Face where EmployeeId= $empid";
            $query3 = $this->db->query($sql3);
            if ($row = $query3->row()) {
                $persistedfaceid = $row->PersistedFaceId;
                $personid = $row->PersonId;
                face_delete($persistedfaceid, $personid, $orgid);
                persongrouptrain($orgid);
            }


            $sql4 = "update Persisted_Face set PersistedFaceId='0',profileimage='0'  where EmployeeId = $empid";
            $query4 = $this->db->query($sql4);
        }

        $updSts += $this->db->affected_rows();
        $sql = "update UserMaster set VisibleSts=$sts, archive = $sts where EmployeeId = $empid";
        $query1 = $this->db->query($sql);
        $updSts += $this->db->affected_rows();
        if ($updSts > 0) {

            /// Activity log by sohan
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            if ($sts == 1) {
                $module = "Employees";
                $actionperformed = "<b>" . getEmpName($empid) . "</b> status has been changed to <b>Active</b> from <b> Inactive employees</b>";
            } else {
                $module = "Employees";
                $actionperformed = "<b>" . getEmpName($empid) . "</b> status has been changed to <b>Inactive</b> from <b> Active employees</b>";
            }
            $activityby = 1;

            $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
            $this->db->close();
        }
        echo $query;
    }

    public function editdesignation() {
        $orgid = $_SESSION['orgid'];
        $desgS = isset($_REQUEST['desgS']) ? $_REQUEST['desgS'] : 0;
        $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;
        $favorite1 = implode(",", $favorite);
        $sql = "update EmployeeMaster set Designation=$desgS  where OrganizationId =$orgid and id IN ($favorite1)";
        $query = $this->db->query($sql);
        echo $query;
        if ($query == true) {
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];

            //       $i= 1;
            // for($i=1; $i<=count($favorite); $i++)
            //       {
            $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;

            $favorite1 = implode(",", $favorite);
            // $name = getEmpName($favorite1);
            $i = 0;
            for ($i = 0; $i < count($favorite); $i++) {
                $empid121 = $favorite[$i];
                $module = "Employees";
                $actionperformed = " <b>Designation</b> has been <b>Updated</b> for <b>" . getEmpName($empid121) . "</b> from <b>Active Employees </b>.";
                $activityby = 1;

                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
            }
        }
    }

    public function editshifts() {
        $orgid = $_SESSION['orgid'];
        $shift = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;



        $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;

        $favorite1 = implode(",", $favorite);
        $name = getEmpName($favorite1);

        // print_r ($name);
        $sql = "update EmployeeMaster set Shift = $shift  where OrganizationId =$orgid and id IN ($favorite1)";

        $query = $this->db->query($sql);
        echo $query;
        if ($query == true) {

            // return true;
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            $sname = $_SESSION['name'];
            $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;

            $favorite1 = implode(",", $favorite);

            $i = 0;
            for ($i = 0; $i < count($favorite); $i++) {
                $empid121 = $favorite[$i];
                // print_r($empid);
                // $querye= array($empid,$orgid);
                $module = "Employees";
                $actionperformed = " <b>Shift</b> has been <b>updated </b>for <b>" . getEmpName($empid121) . "</b> in <b>Active Employees List</b>.";
                $activityby = 1;
                // $adminid = ;


                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
                // var_dump($this->db->last_query());
                // $this->db->close();
                // echo 4;
            }
        } else {
            return false;
        }
    }

    public function emportEmp($request) {
        //$result1 = array();
        $errormsg = "";
        $count = "";
        $success = "";
        $user_id = $_SESSION['id'];
        $orgid = $_SESSION['orgid'];
        //return print_r($request);
        $fname = $request[0];
        // $lname =  $request[1];
        $email = $request[1];
        $cont = $request[2];
        $shift = $request[3];
        $dept = $request[4];
        $desg = $request[5];
        $password = '';
        $ecode = $request[6];
        $country = $request[7];
        $doj = $request[8];
        $country1 = '';
        // echo $request[7];
        // exit();




        $check = true;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $date = date('Y-m-d');
        $file_name = "newjoining.csv";
        $location = IMGURL6 . "employee/$orgid/";
        $fp = $location . $file_name;
        //var_dump($fp);
        //die;

        $mailtrigger = $this->db->query("SELECT employee_mail_trigger FROM admin_login WHERE OrganizationId='$orgid'");
        if ($row = $mailtrigger->result()) {
            $mailsts = $row[0]->employee_mail_trigger;
            //var_dump($mailsts);
        }

        $sts = 0;
        $i = 0;
        $j = 0;
        $rer = "";
        $count = 0;
        $totalcount = 0;
        if (($file = fopen($fp, 'r')) !== FALSE) {//select file //
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {//get the data of file//
                $remark1 = '';
                //var_dump($data[1]);
                //var_dump($data[$fname]);
                //die;
                // var_dump($data[$doj]);
                //die();


                $check = true;
                if ($i > 0) {
                    $totalcount = $totalcount + 1;
                    if ($data[3] == "" || $data[4] == "" || $data[5] == "" || $data[$fname] == "" || $data[2] == "") {

                        $remark = "Data insufficient.";
                        $sql1 = "INSERT INTO Temp_user_csv(FirstName,EmployeeCode,Department,Designation,Shift,PersonalNo,OrganizationId,CreatedDate,email,Archive,createdBy,remark,country,doj) VALUES 
              (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $this->db->query($sql1, array($data[$fname],
                            $data[$ecode], $data[4], $data[5], $data[3], $data[2], $orgid, $date, $data[$email], $sts, $user_id, $remark, $data[7], $data[8]));




                        $result = $this->db->affected_rows();

                        continue;
                        if ($result > 0) {
                            $check = false;
                        }
                    }


                    $countries = $data[$country];
                    $newcountry = trim($countries);
                    // echo $countries;          
                    // exit();
                    if ($newcountry != '') {
                        $query = $this->db->query("select Id FROM CountryMaster WHERE Name='" . $newcountry . "'");
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                                $country1 = $row->Id;
                                // echo $country1;
                                // exit();
                            }
                        }
                    } else {
                        $country1 = 0;
                        // echo $country1;
                        // exit();
                    }


                    if ($data[1] != '') {
                        $query = $this->db->query("select Id FROM UserMaster WHERE Username =? ", array(encode5t(strtolower($data[$email]))));

                        if ($query->num_rows() > 0) {
                            $check = false;
                            if ($remark1 == "") {
                                $remark1 = $remark1 . " Email Id already exist.";
                            }
                        }
                    }

                    if ($data[2] != '') {
                        if (is_numeric($data[2])) {
                            // $remark1=$remark1. " characters not allaw in contact field.";
                            $query1 = $this->db->query("select Id FROM EmployeeMaster WHERE PersonalNo =? And Is_Delete!=2 ", array(encode5t($data[$cont])));

                            $query1->num_rows();
                            if ($query1->num_rows() > 0) {
                                $j++;
                                $check = false;
                                if ($remark1 == " Email Id already exist.") {
                                    $remark1 = $remark1 . " /Contact number already exist.";
                                } else {
                                    $remark1 = $remark1 . " Contact number already exist.";
                                }
                            }
                        } else {
                            $check = false;
                            if ($remark1 == " Email Id already exist.") {
                                $remark1 = $remark1 . " /Characters not allowed in contact field.";
                            } else {
                                $remark1 = $remark1 . " Characters not allowed in contact field.";
                            }
                        }
                    }
                    if ($data[6] != '') {
                        $query2 = $this->db->query("select Id FROM EmployeeMaster WHERE EmployeeCode=? And Is_Delete!=2 AND OrganizationId = ?", array($data[$ecode], $orgid));
                        $query2->num_rows();
                        if ($query2->num_rows() > 0) {
                            $check = false;
                            if ($remark1 == " Email Id already exist." || $remark1 == " /Contact number already exist." || $remark1 == " Email Id already exist. /Contact number already exist." || $remark1 == " Contact number already exist." || $remark1 == " Email Id already exist. /Characters not allowed in contact field." || $remark1 == " Characters not allowed in contact field.") {
                                $remark1 = $remark1 . " /Employee code already exist.";
                            } else {
                                $remark1 = $remark1 . " Employee code already exist.";
                            }
                        }
                    }

                    $dojdate = strtotime($data[$doj]);
                    $empdoj = date('Y-m-d', $dojdate);
                    //echo $empdoj;
                    //exit();

                    if ($remark1 != '') {

                        $sql3 = "INSERT INTO Temp_user_csv(FirstName,EmployeeCode,Department,Designation,Shift,PersonalNo,OrganizationId,CreatedDate,email,Archive,createdBy,remark,country,doj) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $this->db->query($sql3, array($data[$fname],
                            $data[$ecode], $data[$dept], $data[$desg], $data[$shift], $data[$cont], $orgid, $date, $data[$email], $sts, $user_id, $remark1, $country1, $empdoj));
                    }

                    // edit by sohan
                    if ($check) {

                        $dept1 = getDepartmentId_create($data[4], $orgid);
                        $desg1 = getDesignationId_create($data[5], $orgid);
                        $shift1 = getshiftId($data[3], $orgid);
                        $remarks = "";
                        if ($dept1 == 0) {// if department not found
                            $remarks = "department not found.";
                        }

                        if ($desg1 == 0) { // if destination not found
                            $remarks = "Designation not found.";
                        }
                        if ($shift1 == 0) { // if shift not found
                            $remarks = "Shift not found.";
                        }

                        if ($remarks != "") {
                            $sql = $this->db->query("INSERT INTO Temp_user_csv(FirstName,EmployeeCode,Department,Designation,Shift,PersonalNo,OrganizationId,CreatedDate,email,Archive,createdBy,remark,country,doj) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($data[$fname], $data[$ecode], $data[$dept], $data[$desg], $data[$shift], $data[$cont], $orgid, $date, $data[$email], $sts, $user_id, $remarks, $country1, $empdoj));
                        } else {




                            $sql2 = "INSERT INTO EmployeeMaster(FirstName,EmployeeCode,Department,Designation,Shift,PersonalNo,OrganizationId,CreatedDate,DOC,DOJ,CompanyEmail,CurrentCountry) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                            $this->db->query($sql2, array($data[$fname],
                                $data[$ecode], $dept1, $desg1, $shift1, encode5t($data[$cont]), $orgid, $date, $date, $empdoj, $data[$email], $country1));
                            //$arr=array();
                            $arr[] = $data[$email];
                            $string_version = implode(',', $arr);
                            //$dizin.=("'$dizi[$i]',");
                            //print_r($string_version);

                            $result = $this->db->affected_rows($sql2);
                            $emp_id = $this->db->insert_id();
                            $count = $count + 1;

                            if ($result > 0) {
                                $password = 123456;
                                $pass = encode5t($password);
                                $sql3 = $this->db->query("INSERT INTO UserMaster (CreatedDate,EmployeeId,Username,username_mobile,Password,OrganizationId) VALUES ('$date','$emp_id','" . encode5t(strtolower($data[$email])) . "','" . encode5t($data[$cont]) . "','$pass','$orgid')");
                                $result = $this->db->affected_rows($sql3);
                            }
                            ////////////////////////////
                        }
                    }
                }
                $i++;
            }
        }

        $message = "<html>
              <head>
              <title></title>
              </head>
            <body>
            <h3>Dear Admin,</h3>
            <p>Please send the below message through text or Email to the Employee to get him started. The message below is already sent to the Employees with valid Email ID</p>
            <p>You are registered in ubiAttendance App for � Ubitech Solutions�. Kindly punch your attendance through the following steps.</p>
            <ol>
            <li> 
              Download the Android App by clicking <a  
              href='https://play.google.com/store/apps/details?id=org.ubitech.attendance.'>https://play.google.com/store/apps/details?id=org.ubitech.attendance.</a> 
              iPhone users can download through 
              <a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a>
            </li>
            <li>Install the App.  It will be added to the home screen</li>
            <li>Open the App & sign in. User name will be the registered Email/Phone no.</li>
            <li>Initial Sign in Password is " . $password . "</li>
            <li>You can now start punching the attendance.</li>
            <li>Download the detailed Employee guide</li>
            </ol>
            <p>For further assistance, kindly contact your system administrator.</p>
            <h5>Cheers,</h5>
            <h5>ubiAttendance Team</h5>
            </body>
            </html>";

        $messageemp = "<html>
            <head>
            <title>ubiAttendance</title>
            </head>
            <body>Congratulations,<br/>
            <p>
            You are successfully registered on ubiAttendance app.<br/><br/>
            Follow below steps to start punching your attendance:<br/><br/>
              
            1. Download & Install the App through the following links:
              <ol>
            <li>Android -<a href='https://play.google.com/store/apps/details?id=org.ubitech.ubiattendance'>https://play.google.com/store/apps/details?id=org.ubitech.ubiattendance</a></li>
            <li>Ios -<a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a></li>
              </ol>
            2. Open the App & <b>sign in.</b><br/>
              
              
               Username: Your registered email id or phone number.<br/>
               Password: " . $password . "<br/>           
              <br/>
              3. Click on  <b>Time In</b> to punch your Attendance.</br>
              
              
            </body>
            </html>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
        $subject = "Import employee";
        $adminMail = getAdminEmail($orgid);


        if ($mailsts == '1') {

            sendEmail_new($adminMail, $subject, $message, $headers);
            sendEmail_new('devendra@ubitechsolutions', $subject, $message, $headers);
            sendEmail_new('shakir@ubitechsolutions.com', $subject, $message, $headers);
        }


        $result1 = array("repeatemp" => $totalcount, "importemp" => $count, "sts" => "true", "rer" => $j);
        $check = true;
        return $result1;
    }

    public function deleteTmp() {
        $orgid = $_SESSION['orgid'];
        $query = $this->db->query("DELETE FROM Temp_user_csv WHERE OrganizationId ='$orgid'");
        if ($query > 0) {
            return TRUE;
        }
    }

    public function updateUserStatusinact() {
        //echo "string";
        //echo "string";
        $orgid = $_SESSION['orgid'];
        // $empid =  isset($_REQUEST['id'])?$_REQUEST['id']:0;
        $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : '';
        // print_r($favorite);
        $favorite1 = implode(",", $favorite);
        // var_dump($favorite1);
        //echo $favorite1;
        //die();
        $sts = (isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 1) == 1 ? 0 : 1;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);


        $updSts = 0;
       
        $sql = "update EmployeeMaster set archive = $sts where id IN ($favorite1) limit1";
        $query = $this->db->query($sql);
        $updSts += $this->db->affected_rows();
        // var_dump($this->db->last_query());
        // die();


        $faceperm = getAddonPermission($orgid, 'Addon_FaceRecognition');
        if ($faceperm == '1' && $sts == 0) {

            $sql3 = "select PersistedFaceId,PersonId from Persisted_Face where id IN ($favorite1)";
            $query3 = $this->db->query($sql3);
            if ($row = $query3->row()) {
                $persistedfaceid = $row->PersistedFaceId;
                $personid = $row->PersonId;
                face_delete($persistedfaceid, $personid, 'test');
                persongrouptrain('test');
            }


            $sql4 = "update Persisted_Face set PersistedFaceId='0',profileimage='0'  where id IN ($favorite1)";
            $query4 = $this->db->query($sql4);
        }

        $updSts += $this->db->affected_rows();
        $sql = "update UserMaster set VisibleSts=$sts, archive = $sts where id IN ($favorite1)";
        $query1 = $this->db->query($sql);
        $updSts += $this->db->affected_rows();
        // echo $updSts;
        // die(); 
        if ($updSts > 0) {
            //echo "string";
            /// Activity log by sohan
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            if ($sts == 0) {
                $module = "Employees";
                $actionperformed = "<b>" . getEmpName($favorite1) . "</b> status has been changed to <b>Active</b> from <b> Inactive employees</b>";
            } else {
                $module = "Employees";
                $actionperformed = "<b>" . getEmpName($favorite1) . "</b> status has been changed to <b>Inactive</b> from <b> Active employees</b>";
            }

            $i = 0;
            for ($i = 0; $i < count($favorite); $i++) {
                $empid121 = $favorite[$i];
                // echo $empid121;
                //die();

                $module = "Employees";
                $actionperformed = " <b>" . getEmpName($empid121) . "</b> has been <b>Inactivated</b>  from <b>Active Employees </b>.";

                $activityby = 1;

                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
                // var_dump($this->db->last_query());
                // die();
            }
        }
        echo $query;
    }

    public function QRcode($Id) {
        $res = array();
        $result = array();
        $orgid = $_SESSION['orgid'];
        $id1 = $_SESSION['id'];
        $sname = $_SESSION['name'];
        $query = $this->db->query("select Id,department,designation,shift,(select username_mobile from UserMaster where EmployeeId = EmployeeMaster.id LIMIT 1)as una,(select Username from UserMaster where EmployeeId = EmployeeMaster.id LIMIT 1)as email,(select Password from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as upa,(select qrselector from `admin_login` where id = '$id1' )as qrselect,(select Website from Organization where   Id = EmployeeMaster.OrganizationId)as web,PersonalNo,EmployeeCode,(select Name from CityMaster where Id = EmployeeMaster.CurrentCity LIMIT 1 )as city123,FirstName,LastName,ImageName,CurrentAddress,Location from  EmployeeMaster  where `OrganizationId`=$orgid AND archive=1 AND Is_Delete = '0' and Id IN ($Id)");



        foreach ($query->result() as $row) {
            if (decode5t($row->PersonalNo) != "") {
                $data = array();
                $data['name'] = getEmpName($row->Id);
                $data['firstname'] = $row->FirstName;
                $data['location'] = $this->locationname($row->Location);
                // data-shift="'. substr(getShift($row->shift),0,15)."&hellip;" .'"

                $data['lastname'] = $row->LastName;
                $data['code'] = $row->EmployeeCode;
                $data['mobile'] = decode5t($row->upa);
                $data['email'] = decode5t($row->email);
                // $data['address'] =decode5t($row->CurrentAddress);

                $data['profile'] = '';
                if ($row->ImageName == '' && $orgid == 36706) {
                    $img = '<img src="' . IMGURL . "avatars/male.png" . '" style="width:60px!important;" />';
                    $data['profile'] = '';
                } else {

                    $data['profile'] = $row->ImageName;
                }


                $data['city'] = $row->city123;
                $data['web'] = $row->web;
                $data['designation'] = //strlen(getDesignation($row->designation)) > 5 ? substr(getDesignation($row->designation),0,10)."&hellip;" : getDesignation($row->designation);
                        getDesignation($row->designation);
                $data['department'] = //strlen(getDepartment($row->department)) > 5 ? substr(getDepartment($row->department),0,10)."&hellip;" : getDepartment($row->department);
                        getDepartment($row->department);
                $shiftname = getShiftByEmpID($row->Id);
                $data['shiftname'] = strlen($shiftname) > 5 ? substr($shiftname, 0, 15) : $shiftname;
                $data['shift'] = getShiftTimes($row->shift);
                $str = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . decode5t($row->una) . "ykks==" . $row->upa . "&choe=UTF-8";
                $data['qrcode'] = "";
                if ($orgid == 36706) {
                    $data['qrcode'] = " <img  width='100px' src= '$str' />";
                } else {
                    $data['qrcode'] = "<img  width='150px' src= '$str' />";
                }
                $data['qrselect'] = $row->qrselect;

                $res[] = $data;
            }
        }
        $result['data'] = $res;
        // print_r($result['data']);
        return $result;
    }

    function resetPassword() {
        $pass = encode5t(isset($_REQUEST['pass']) ? $_REQUEST['pass'] : '');
        //echo $pass;
        //exit;
        $empid = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
//echo 'hello'.$empid;
//exit;
        $sts = 0;
        $sql = "Update UserMaster set Password='$pass' where EmployeeId=$empid";
        //echo $sql;
        //exit;
        $query = $this->db->query($sql);
        $sts = $this->db->affected_rows();

        /// Activity log by sohan
        $date = date("y-m-d H:i:s");
        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];

        $module = "Employees";
        $actionperformed = " <b> Password </b>  has been updated for <b>" . getEmpName($empid) . "</b> from <b> Active employees </b>";
        $activityby = 1;
        $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));

        $this->db->close();
        echo json_encode($sts);
    }

    public function editUsermaster() {

        $orgid = $_SESSION['orgid'];
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : 0;
        $ecode = isset($_REQUEST['ecode']) ? $_REQUEST['ecode'] : '';
        $area = isset($_REQUEST['areaE']) ? $_REQUEST['areaE'] : 0;
        $doj = isset($_REQUEST['doj']) ? $_REQUEST['doj'] : 0;
        $dept = isset($_REQUEST['dept']) ? $_REQUEST['dept'] : 0;
        $desg = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : 0;
        $shift = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : 0;
        $sts = isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 0;
        $sstatus = isset($_REQUEST['sstatus']) ? $_REQUEST['sstatus'] : 0;
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : 0;
        $timezone = isset($_REQUEST['timezone']) ? $_REQUEST['timezone'] : 0;

        $hourlyrate = isset($_REQUEST['hourlyrateE']) ? $_REQUEST['hourlyrateE'] : 0;
        $email = encode5t(isset($_REQUEST['email']) ? strtolower($_REQUEST['email']) : "");
       
        $password = encode5t(isset($_REQUEST['password']) ? $_REQUEST['password'] : 0);
       
        $PersonalNo = encode5t(isset($_REQUEST['PersonalNo']) ? $_REQUEST['PersonalNo'] : 0);
        
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : 0;

        $entitledleave = isset($_REQUEST['entitledleaveE']) ? $_REQUEST['entitledleaveE'] : 0;
        $balanceleave = isset($_REQUEST['balanceleaveE']) ? $_REQUEST['balanceleaveE'] : 0;
        $olddoj = date("m/d/Y", strtotime($this->getEmpDoj($orgid, $empid)));
        $newdoj = date("Y-m-d", strtotime($doj));
        $restrictfence  =  isset($_REQUEST['restrictfence'])?$_REQUEST['restrictfence']:0;
        //$locProfile=IMGURL2."uploads/$orgid/";
        //$locProfile=IMGPATH.'attendance_images/'.$orgid.'/'.$new_name;
        $profileE = isset($_FILES["profE"]) ? $_FILES["profE"] : "";

        $new_name = $empid . ".jpg";
        

        if ($PersonalNo != '') {
            $sql = "Select Id from UserMaster where username_mobile = '$PersonalNo' and OrganizationId = $orgid and EmployeeId != $empid";
            $query = $this->db->query($sql);
            $query->num_rows();
            if ($query->num_rows() > 0) {
                echo 4;
                return;
            }
        }

        if ($PersonalNo != '') {
            $sql = "Select Id from EmployeeMaster where PersonalNo = '$PersonalNo' and OrganizationId = $orgid and Id != $empid and Is_Delete != 2";
            $query = $this->db->query($sql);
            $query->num_rows();
            if ($query->num_rows() > 0) {
                echo 4;
                return;
            }
        }

        if ($email != '') {
            $sql = "Select Id from UserMaster where Username = ? and OrganizationId = ? and EmployeeId != ? ";
            $query = $this->db->query($sql, array($email, $orgid, $empid));
            $query->num_rows();
            if ($query->num_rows() > 0) {
                echo 2;
                return;
            }
        }
        if ($ecode != '' && $ecode != '0') {
            $sql = "Select Id from EmployeeMaster where EmployeeCode =?  and OrganizationId=? and id != ? and Is_Delete != 2 ";
            $query = $this->db->query($sql, array($ecode, $orgid, $empid));
            $query->num_rows();
            if ($query->num_rows() > 0) {
                $check = false;
                echo 3;
                return;
            }
        }

        if ($profileE) {
            // if (move_uploaded_file($_FILES["profE"]["tmp_name"], $locProfile.$new_name))
            // {

            $locProfile = $new_name;

             if(LOCATION=='online')
           {
            $tmpfile = $_FILES['profE']['tmp_name'];
           // $tmpfile = $_FILES['profE']['tmp_name'];
        //echo $tmpfile;die();
        $result_save = S3::putObject(S3::inputFile($tmpfile), 'ubihrmimages',''.$orgid.'/'.$new_name, S3::ACL_PUBLIC_READ);

            $updSts = 0;
            $sql = "update EmployeeMaster set FirstName =? ,EmployeeCode=?,DOJ =?, Department =? ,Designation = ?,Shift = ? ,archive = ?,CurrentCountry = ?,timezone = ?,PersonalNo =?,area_assigned =?,hourly_rate=?,CurrentEmailId= ?,ImageName=?,CompanyEmail=?,entitledleave=?, fencearea=?  where OrganizationId = ? and id =?";

            $query = $this->db->query($sql, array($fname, $ecode, $newdoj, $dept, $desg, $shift, $sts, $country, $timezone, $PersonalNo, $area, $hourlyrate, $email, $locProfile, $email, $entitledleave,$restrictfence,$orgid, $empid));
            $updSts += $this->db->affected_rows();
            $sql = "update UserMaster set VisibleSts=?,appSuperviserSts=? ,username_mobile =?,Username=?,Password=? where OrganizationId = ? and EmployeeId = ?";
            $query1 = $this->db->query($sql, array($sts, $sstatus, $PersonalNo, $email, $password, $orgid, $empid));


            $updSts += $this->db->affected_rows();

            if ($updSts > 0) {
                /// Activity log data insert by sohan
                $date = date("y-m-d H:i:s");
                $orgid = $_SESSION['orgid'];
                $id = $_SESSION['id'];
                $module = "Employees";
                $actionperformed = "Update Employees Details <b> " . $fname . "</b>";
                $activityby = 1;
                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));

                $affected_rows = $this->db->affected_rows();
                if ($affected_rows > 0) {

                    if (strtotime($olddoj) != strtotime($doj)) {
                        $date = date("y-m-d H:i:s");
                        $orgid = $_SESSION['orgid'];
                        $id = $_SESSION['id'];
                        $module = "Employees";
                        $actionperformed = "Date Of Joining has been updated for<b> " . $fname . "</b> Old DOJ <b> " . date("d M, Y", strtotime($olddoj)) . "</b> and New DOJ <b> " . date("d M, Y", strtotime($newdoj)) . "</b>";
                        $activityby = 1;
                        $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
                    }
                }
                $this->db->close();
            }
            echo $query;
            }
        } else {
            $updSts = 0;
            $sql = "update EmployeeMaster set FirstName =? ,EmployeeCode=? ,DOJ =?, Department =? ,Designation = ?,Shift = ? ,archive = ?,CurrentCountry = ?,timezone = ?,PersonalNo =?,area_assigned =?,hourly_rate=?,CurrentEmailId= ?,CompanyEmail=?,entitledleave=?,fencearea=?   where OrganizationId = ? and id =?";

            $query = $this->db->query($sql, array($fname, $ecode, $newdoj, $dept, $desg, $shift, $sts, $country, $timezone, $PersonalNo, $area, $hourlyrate, $email, $email, $entitledleave,$restrictfence, $orgid, $empid));

            $updSts += $this->db->affected_rows();
            $sql = "update UserMaster set VisibleSts=?,appSuperviserSts=? ,username_mobile =?,Username=?,Password=? where OrganizationId = ? and EmployeeId = ?";
            $query1 = $this->db->query($sql, array($sts, $sstatus, $PersonalNo, $email, $password, $orgid, $empid));
            //var_dump($this->db->last_query());
            $updSts += $this->db->affected_rows();
            if ($updSts > 0) {
                // Activity log data insert by sohan
                $date = date("y-m-d H:i:s");
                $orgid = $_SESSION['orgid'];
                $id = $_SESSION['id'];
                $module = "Employees";

                $actionperformed = "<b>" . $fname . "</b> details has been <b>updated</b> from <b>Edit Employee</b>";

                $activityby = 1;
                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));

                $affected_rows = $this->db->affected_rows();
                if ($affected_rows > 0) {
                    if (strtotime($olddoj) != strtotime($doj)) {
                        $date = date("y-m-d H:i:s");
                        $orgid = $_SESSION['orgid'];
                        $id = $_SESSION['id'];
                        $module = "Employees";
                        $actionperformed = "Date Of Joining has been updated for<b> " . $fname . "</b> Old DOJ <b> " . date("d M, Y", strtotime($olddoj)) . "</b> and New DOJ <b> " . date("d M, Y", strtotime($newdoj)) . "</b>";
                        $activityby = 1;
                        $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
                    }
                }


                $this->db->close();
            }
            echo 1;
        }
    }

    public function getEmpDoj($orgid, $empid) {

        $query = $this->db->query("SELECT DOJ FROM EmployeeMaster where Id='$empid' And OrganizationId='$orgid'");

        foreach ($query->result() as $row) {

            $dateofjoining = $row->DOJ;
            return $dateofjoining;
        }
    }

    public function getCity() {
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : 0;
        $sql = "SELECT * FROM CityMaster where CountryId = $country";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
    }

    public function getgeoname() {
        $geovalue = isset($_REQUEST['geo']) ? $_REQUEST['geo'] : '';

        $g = implode("','", $geovalue);


        $geo = $this->db->query("SELECT * FROM `Geo_Settings` WHERE Id IN('" . $g . "')")->result_array();


        $d = array();
        $res = array();
        foreach ($geo as $row) {
            $data['Name'] = $row['Name'];
            $data['Id'] = $row['Id'];
            //echo $data['code'];
            $res[] = $data;
        }
        $d['data'] = $res;          //$query->result();
        echo json_encode($d);
    }

    public function getEmployeesDatausernew($eid) {
        $orgid = $_SESSION['orgid'];

        $sname = $_SESSION['name'];
        $id = $_SESSION['id'];

        $res = array();
        $d = array();

        $query1 = $this->db->query("SELECT `user_limit` as userlimit, (SELECT COUNT(*)
    FROM EmployeeMaster where`OrganizationId` = 10 and Is_Delete != 2) as registeredusers from licence_ubiattendance where `OrganizationId`=$orgid");
        // var_dump($this->db->last_query());

        $imgname = '';
        foreach ($query1->result() as $row) {

            $data = array();

            $data['userlimit'] = $row->userlimit;
            $data['reguser'] = $row->registeredusers;


            $res[] = $data;
        }
        $d['data'] = $res;
        // echo json_encode($d);
//echo "SELECT EmployeeMaster.id as id,EmployeeMaster.fencearea,EmployeeMaster.EmployeeCode as ecode,EmployeeMaster.area_assigned as area ,EmployeeMaster.Location,(CASE WHEN (EmployeeMaster.entitledleave!='') THEN EmployeeMaster.entitledleave ELSE (SELECT entitled_leave from Organization Where Id=EmployeeMaster.OrganizationId Limit 1) END) as entitledleave,EmployeeMaster.livelocationtrack,`FirstName`,lastname,concat(FirstName,'',lastname)as name,archive,department,designation,shift,PersonalNo,DOB, Nationality,hourly_rate, `MaritalStatus`,`Religion`,`BloodGroup`,`DOJ`, `DOC`,`Gender`,`HomeAddress`, EmployeeMaster.CurrentCountry,EmployeeMaster.CurrentCity,`CurrentCountry`,`timezone`, `HomeCity`, `HomeZipCode`,(Select shifttype from ShiftMaster WHERE ShiftMaster.Id=EmployeeMaster.`Shift` LIMIT 1) as shifttype,(select appSuperviserSts from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as appSuperviserSts,(select username_mobile from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as una,(select Name from CityMaster where Id = EmployeeMaster.CurrentCity LIMIT 1 )as city123,(select Website from Organization where   Id = EmployeeMaster.OrganizationId)as web,(select qrselector from `admin_login` where  id = '$id' and OrganizationId  = '$orgid' )as qroption,(select Password from UserMaster where EmployeeId= EmployeeMaster.id  LIMIT 1)as upa,ImageName FROM  `EmployeeMaster` where    id=$eid AND OrganizationId=? AND archive=1 AND Is_Delete = '0' order by  FirstName ";
        $query = $this->db->query(" SELECT EmployeeMaster.id as id,EmployeeMaster.fencearea,EmployeeMaster.EmployeeCode as ecode,EmployeeMaster.area_assigned as area ,EmployeeMaster.Location,(CASE WHEN (EmployeeMaster.entitledleave!='') THEN EmployeeMaster.entitledleave ELSE (SELECT entitled_leave from Organization Where Id=EmployeeMaster.OrganizationId Limit 1) END) as entitledleave,EmployeeMaster.livelocationtrack,`FirstName`,lastname,concat(FirstName,'',lastname)as name,archive,department,designation,shift,PersonalNo,DOB, Nationality,hourly_rate, `MaritalStatus`,`Religion`,`BloodGroup`,`DOJ`, `DOC`,`Gender`,`HomeAddress`, EmployeeMaster.CurrentCountry,EmployeeMaster.CurrentCity,`CurrentCountry`,`timezone`, `HomeCity`, `HomeZipCode`,(Select shifttype from ShiftMaster WHERE ShiftMaster.Id=EmployeeMaster.`Shift` LIMIT 1) as shifttype,(select appSuperviserSts from UserMaster where EmployeeId= EmployeeMaster.id and OrganizationId  = '$orgid' LIMIT 1)as appSuperviserSts,(select username_mobile from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as una,(select Name from CityMaster where Id = EmployeeMaster.CurrentCity LIMIT 1 )as city123,(select Website from Organization where   Id = EmployeeMaster.OrganizationId)as web,(select qrselector from `admin_login` where  id = '$id' and OrganizationId  = '$orgid' )as qroption,(select Password from UserMaster where EmployeeId= EmployeeMaster.id and OrganizationId ='$orgid' LIMIT 1)as upa,ImageName FROM  `EmployeeMaster` where    id=$eid AND OrganizationId=? AND archive=1 AND Is_Delete = '0' order by  FirstName ", array($orgid));
        //var_dump($this->db->last_query());



        $d = array();
        $res = array();
        $userstts = '';
        $resetpassword = '';
        foreach ($query->result() as $row) {
            if ($row->archive == 1)
                $userstts = '<i class=" status fa fa-thumbs-down" style="font-size:16px; color:red" data-id="' . $row->id . '" data-sts="' . $row->archive . '" data-ena="' . $row->FirstName . ' ' . $row->lastname . '" title="Inactive" ></i>';
            else
                $userstts = '<i class=" status fa fa-thumbs-up" style="font-size:16px; color:green" data-toggle="modal" data-id="' . $row->id . '" data-ena="' . $row->FirstName . '"  title="Click to make user Active" ></i>';
            $pass = decode5t($row->upa);
            $resetpassword = '<i class=" resetpwd fa fa-key" style="font-size:16px; color:purple" data-toggle="modal" data-target="#resetpwd" typographi="' . $pass . '" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Reset password Only App " ></i>';

            $activitylog = '<a href=' . URL . 'Userprofiles/empactivitylog/' . $row->id . '><i class="activitylog fa fa-history" style="font-size:16px; color:purple" data-toggle="modal" data-target="#activitylog"title="Activity Log" ></i></a>';

            $data = array();
            $eno = '';
            $data['imgpic'] = IMGURL3 . "avatars/male.png";
            //  if($_SESSION['specialCase']=='RAKP')
            //$eno='<br/><b>'.$row->ecode.' </b>';
            //$data['change']='<input type="checkbox" name="chk"  id="'.$row->id.'" class="checkbox"  value="'.$row->id.'" >';  
            $data['change'] = $row->id;
            $data['pass'] = decode5t($row->upa);
            //echo 'hello'.$data['pass'];
            if ($row->ImageName != "" || $row->ImageName != 0) {

                //$imgname = PROFILEIMG."$orgid/".$row->ImageName;

                if ($this->checkRemoteFile(PROFILEIMG . "$orgid/" . $row->ImageName)) {
                    //found url, its mean
                    //echo "this is image";

                    $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . PROFILEIMG . "$orgid/" . $row->ImageName . '" style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';

                    $imgname = PROFILEIMG . "$orgid/" . $row->ImageName;
                    $data['imgpic'] = PROFILEIMG . "$orgid/" . $row->ImageName;
                } else {

                    // if($this->checkRemoteFile(IMGURL3."uploads/$orgid/".$row->ImageName))
                    // {
                    //  //echo "this is image";
                    //  $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.IMGURL3."uploads/$orgid/".$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';  
                    //  $imgname = IMGURL3."uploads/$orgid/".$row->ImageName;
                    // }
                    // else
                    // {
                    //  //echo 'over';
                    //     $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.IMGURL3."avatars/male.png".'"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
                    // $imgname = IMGURL3."avatars/male.png";
                    // }


                    $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "avatars/male.png" . '"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';


                    $imgname = IMGURL3 . "avatars/male.png";
                    $data['imgpic'] = IMGURL3 . "avatars/male.png";
                }


                /*                 * ************** fetch image from s3 bucket ******************* */

                // $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.PROFILEIMG."$orgid/".$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';  
                // $imgname = PROFILEIMG."$orgid/".$row->ImageName;

                /*                 * ************** fetch image from s3 bucket ******************* */




                /* $data['photo']='<img src="'.IMGURL3."uploads/$orgid/".$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%" />'; */

                // $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.IMGURL3."uploads/$orgid/".$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';  
                // $data['photo']='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$row->ImageName.'" style="width:50px!important;height:50px!important;border-radius:50%"  /></i>'; 
            } else {
                if ($row->Gender == 1) {
                    $data['photo'] = /* '<img src="'.IMGURL3."avatars/male.png".'" style="width:60px!important;border-radius:50%" />'; */
                            '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "avatars/male.png" . '"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
                } else if ($row->Gender == 2) {
                    $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "avatars/female.png" . '"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
                } else {
                    $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "avatars/male.png" . '"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
                }
            }
            if ($row->lastname != "") {
                $data['name'] = $row->FirstName . ' ' . $row->lastname;
            } else {
                $data['name'] = $row->FirstName;
            }
            $data['doj'] = '';
            if ($row->DOJ == '0000-00-00') {
                $dateofjoining = '00/00/0000';
                $data['doj'] = '00/00/0000';
            } else {
                $dateofjoining = date("m/d/Y", strtotime($row->DOJ));
                $data['doj'] = date("m/d/Y", strtotime($row->DOJ));
            }
            $data['balleave'] = '';
            if ($row->DOJ == '0000-00-00') {
                $balleave = "N/A";
                $data['balleave'] = "N/A";
            } else {
                $balleave = intval(getBalanceLeave($orgid, $row->id));
                $data['balleave'] = intval(getBalanceLeave($orgid, $row->id));
            }

            $data['code'] = $row->ecode;
            $data['hourlyrate'] = getAllRate1($_SESSION['orgid'], $row->hourly_rate);
            $data['hourlyrateids'] = $row->hourly_rate;
            // json_decode(getAllRate($_SESSION['orgid']))
            $data['location'] = $this->locationname($row->Location);
            $data['username'] = decode5t(getUserName($row->id));
            //echo "emailid".$data['username'];
            // $data['date'] = date('d-M-Y',strtotime($row->TimeofDate));
            //$data['password']=decode5t($row->upa);

            $data['pemissions'] = "";
            $data['pemissionsids'] = $row->appSuperviserSts;
            $data['fencearea'] = $row->fencearea;
            if ($row->appSuperviserSts == 1) {
                $data['pemissions'] = '<div style="background-color:green;text-align:center;color:white;" title="for App only" >Admin</div>';
            } elseif ($row->appSuperviserSts == 2) {
                $data['pemissions'] = '<div style="background-color:#9c27b0;text-align:center;color:white;" title="for App only" >Supervisor</div>';
            } else {
                $data['pemissions'] = '<div style="background-color:#ff9800;text-align:center;color:white;" title="user" >User</div>';
            }

            $data['shifttype'] = "";
            if ($row->shifttype == 1) {
                $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
            } elseif ($row->shifttype == 2) {
                $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
            } else {
                $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
            }

            $data['designation'] = getDesignation($row->designation);
            $data['designationids'] = $row->designation;

            if ($row->area != 0)
            //$data['area'] = getName('Geo_Settings','Name', 'Id', $row->area);
                $data['area'] = $row->area;
            else
                $data['area'] = '--';
            $data['shiftids'] = "";
            if ($row->shifttype == 3) {
                $data['shift'] = '<span title="Shift Hours: ' . $this->getFlexiShift($row->shift) . '">' . getShift($row->shift) . '</span>';
                $data['shiftids'] = $row->shift;
            } else {
                $data['shift'] = '<span title="Shift Timing: ' . getShiftTimes($row->shift) . ', Break Hours: ' . getShiftBreaks($row->shift) . '">' . getShift($row->shift) . '</span>';
                $data['shiftids'] = $row->shift;
            }

            $data['department'] = getDepartment($row->department);
            $data['departmentids'] = $row->department;
            $data['contact'] = decode5t($row->PersonalNo);


            $data['status'] = $row->archive == 1 ? '<div style="background-color:green;text-align:center;color:white;">Active</div>' : '<div style="background-color:red;text-align:center;color:white;">Inactive</div>';


            $data['livetrack'] = $row->livelocationtrack == 1 ? '<div style="background-color:green;text-align:center;color:white;">ON</div>' : '<div style="background-color:#808080;text-align:center;color:white;">OFF</div>';

            if ($data['contact'] != "")
                $qr = '<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '"
          data-ecode="' . $row->ecode . '" data-shift="' . substr(getShift($row->shift), 0, 15) . '" data-hourlyrate="' . getAllRate1($_SESSION['orgid'], $row->hourly_rate) . '"
          data-desg="' . getDesignation($row->designation) . '" data-city123="' . $row->city123 . '" data-web123="' . $row->web . '"data-dept="' . getDepartment($row->department) . '" data-shifttime="' . getShiftTimes($row->shift) . '" data-una="' . decode5t($row->una) . '" data-firstname="' . $row->FirstName . '" data-lastname="' . $row->lastname . '" data-location="' . $this->locationname($row->Location) . '" data-email="' . decode5t(getUserName($row->id)) . '" data-cont="' . decode5t($row->PersonalNo) . '" data-image="' . $row->ImageName . '" data-addr="' . decode5t($row->HomeAddress) . '" data-qrc="' . $row->qroption . '" data-upa="ykks==' . $row->upa . '" title="Generate QR Code" ></i>';




            else {
                $qr = '<i class="qr1 fa fa-qrcode" style="font-size:16px; color:purple"    data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Generate QR Code" ></i>';
            }



            $countryidd = ($row->CurrentCountry == 0) ? getCountryIdByOrg($orgid) : $row->CurrentCountry;
            $timezonnidd = 0;
            if ($row->timezone == '0' || $row->timezone == '') {
                $sql1 = $this->db->query("select Id from ZoneMaster where CountryId=  $countryidd");
                if ($row1 = $sql1->row()) {
                    $timezonnidd = $row1->Id;
                }
            } else {
                $timezonnidd = $row->timezone;
            }

            $data['country'] = getCountryNameById($countryidd);
            $data['countryids'] = $countryidd;
            $data['timezone'] = gettimezonebyid($timezonnidd);
            $data['timezoneids'] = $timezonnidd;
            $data['entitledleaveids'] = $row->entitledleave;



            $data['action'] = '<a href="#"><i id="get" class="material-icons edit mod" style="font-size:16px" data-toggle="modal" title="Edit" data-target="#addEmpE"  
             data-id="' . $row->id . '"
             data-name="' . $row->name . '"
             data-firstname="' . $row->FirstName . '"
             data-lastname="' . $row->lastname . '"
             data-area="' . $row->area . '"
             data-hourlyrate="' . getAllRate1($_SESSION['orgid'], $row->hourly_rate) . '"
             data-dob="' . $row->DOB . '"
             data-doj="' . $dateofjoining . '"
             data-gen="' . $row->Gender . '"
             data-doc="' . $row->DOC . '"
             data-nat="' . $row->Nationality . '"
             data-cont="' . decode5t($row->PersonalNo) . '"
             data-addr="' . decode5t($row->HomeAddress) . '"
             data-password="' . $pass . '"
             data-email="' . decode5t(getUserName($row->id)) . '"
             data-country="' . $countryidd . '"
             data-timezone="' . $timezonnidd . '"
             data-city="' . $row->HomeCity . '"
             data-location="' . $this->locationname($row->Location) . '"
             data-status="' . $row->archive . '"
             data-shift="' . $row->shift . '"
             data-desg="' . $row->designation . '"
             data-dept="' . $row->department . '"
             data-bg="' . $row->BloodGroup . '"
             data-rel="' . $row->Religion . '"
             data-ms="' . $row->MaritalStatus . '"
           data-hourlypay="' . $row->hourly_rate . '"
             data-sstatus="' . $row->appSuperviserSts . '"
           data-image="' . $imgname . '"
             data-ecode="' . $row->ecode . '"
             data-city123="' . $row->city123 . '"
             data-web123="' . $row->web . '"
             data-qrc="' . $row->qroption . '"
             data-entitledleave="' . $row->entitledleave . '"
             data-balanceleave="' . $balleave . '"
             >edit</i></a>
            <i class=" delete fa fa-trash" style="font-size:16px; color:purple" data-toggle="modal" data-target="#delEmp" data-id="' . $row->id . '" data-name="' . $row->FirstName . ' ' . $row->lastname . '" title="Archive Employee"></i> ' . $qr . ' ' . $userstts . ' ' . $resetpassword . ' ' . $activitylog;

            //$data['country']=$row->CurrentCountry;
            //echo $data['country'];

            $res[] = $data;
        }
        $d['data'] = $res;
        $this->db->close();     //$query->result();

        return $d;
    }

    public function emplpresentcal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';


        $query = $this->db->query("SELECT 'Present' as event,A.`EmployeeId` as EmployeeId,A.`AttendanceDate` as eventdate FROM `AttendanceMaster` A, EmployeeMaster E WHERE E.Id=A.EmployeeId And A.AttendanceStatus IN (1,8,4) And A.TimeIn != '00:00:00' And E.`OrganizationId`='$orgid' And A.OrganizationId='$orgid' And E.Is_Delete=0 And E.archive='1' And E.Id='$empid'");

        return $query;
    }

    public function emplabsentcal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';


        $query = $this->db->query("SELECT 'Absent' as event,A.`EmployeeId` as EmployeeId,A.`AttendanceDate` as eventdate FROM `AttendanceMaster` A, EmployeeMaster E WHERE E.Id=A.EmployeeId And A.AttendanceStatus IN (2,7) And A.TimeIn != '00:00:00' And E.`OrganizationId`='$orgid' And A.OrganizationId='$orgid' And E.Is_Delete=0 And E.archive='1' And E.Id='$empid'");

        return $query;
    }

    public function emplweekoffcal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';
        $shiftid = getShiftIdByEmpID($empid);
        //$cretedate = getCreatedDatebyshiftid($shiftid);
        // $startDate = date("Y-m-d", strtotime($cretedate)); 
        // $endDate = date('Y-m-d', strtotime('last day of december'));
        $startDate = date('Y-m-d', strtotime('-1 years'));
        $endDate = date('Y-m-d', strtotime('+1 years'));
        //echo $shiftid;
        $end = $endDate;
        $start = $startDate;
        $datediff = strtotime($end) - strtotime($start);
        $datediff = floor($datediff / (60 * 60 * 24));
        $data = array();
        $row = array();
        for ($i = 0; $i < $datediff + 1; $i++) {
            $date = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));
            //echo $date;
            $shiftid = getShiftIdByEmpID($empid);

            $row['date'] = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));
            $row['shiftid'] = $shiftid;
            $row['weekoff'] = getweeklyoffnew($date, $shiftid, $empid, $orgid);
            //var_dump($row['weekoff']);

            if ($row['weekoff'] == 'Week Off') {
                $data[] = array(
                    'id' => $row['shiftid'],
                    'title' => $row['weekoff'],
                    'start' => $row['date'],
                );
            }
        }

        echo json_encode($data);
    }

    public function empholidaycal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';


        $query = $this->db->query("SELECT `Id`,`Name`,`DateFrom`,`DateTo` FROM `HolidayMaster` WHERE `OrganizationId`='$orgid'");
        $data = array();
        $res = array();
        foreach ($query->result() as $row) {
            $res = array();
            $res['holidayid'] = $row->Id;
            $res['holidayname'] = $row->Name;
            $startDate = $row->DateFrom;
            $DateTo = $row->DateTo;
            $end = $DateTo;
            $start = $startDate;
            $datediff = strtotime($end) - strtotime($start);
            $datediff = floor($datediff / (60 * 60 * 24));

            for ($i = 0; $i < $datediff + 1; $i++) {
                $date = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));

                $res['date'] = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));

                $data[] = array(
                    'id' => $res['holidayid'],
                    'title' => $res['holidayname'],
                    'start' => $res['date'],
                );
            }
        }
        echo json_encode($data);
    }
    public function editimg()
    {  
       $orgid =$_SESSION['orgid'];
       $empid =  isset($_REQUEST['id'])?$_REQUEST['id']:'';
       $locProfile=IMGURL2."uploads/$orgid/";
       $profileE=isset($_REQUEST["profimg"])?$_REQUEST["profimg"]:"";
       $name = substr($profileE, strrpos($profileE, '/') + 1);
       $title = explode('_', $name);
       $copyfile='attendance_images/'.$name;
       $new_name = $empid.".jpg";
       
       //$destination='attendance/'.$orgid.'/'.$new_name;
       //echo $profileE;
       //die(); 
       $path=$new_name;
       if (!file_exists($locProfile))
       {
       mkdir($locProfile ,0777,true);
       }
        if(LOCATION=='online')
        {
          $file = file_get_contents($profileE);
          //echo $file;
          //exec("aws s3 mv $file s3://ubihrmimages/attendance_images/");
          S3::putObjectString($file,'ubihrmimages',''.$orgid.'/'.$new_name);
          $updSts=0;
          $sql = "update EmployeeMaster set ImageName=? where OrganizationId = ? and id =? ";
          $query = $this->db->query($sql,array($path,$orgid,$empid));
          $updSts+=$this->db->affected_rows();
          echo $query;
        }
         
    }



    public function empleavecal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';


        $query = $this->db->query("SELECT 'Leave' as event,A.`EmployeeId` as EmployeeId,A.`AttendanceDate` as eventdate FROM `AttendanceMaster` A, EmployeeMaster E WHERE A.`AttendanceStatus`=6 AND A.`OrganizationId`='$orgid' AND A.`EmployeeId`=E.Id And E.`Is_Delete`=0 And E.`archive`='1' And E.Id='$empid'");

        //var_dump($this->db->last_query());
        // die();


        return $query;
    }

    public function empshiftplannercal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';
        //echo $empid;
        //exit;

        $query = $this->db->query("SELECT (CASE WHEN (C.shifttype=1) THEN C.Name WHEN (C.shifttype=2) THEN C.Name ELSE C.Name END) as event,S.`empid` as EmployeeId,S.`ShiftDate` as eventdate FROM `ShiftPlanner` S,ShiftMaster C,EmployeeMaster E WHERE S.empid=E.Id And C.Id=S.`shiftid` And E.`OrganizationId`='$orgid' And E.Is_Delete=0 And E.archive='1' And E.Id='$empid'");
        // var_dump($this->db->last_query());
        //die();
        return $query;
    }

    public function emptimeoffcal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';
//echo $empid;
//exit;

        $query = $this->db->query("SELECT 'TimeOff' as event,T.`EmployeeId`,T.`TimeofDate` as eventdate FROM `Timeoff` T,EmployeeMaster E WHERE T.EmployeeId=E.Id And E.`OrganizationId`='$orgid' And E.Is_Delete=0 And E.archive='1' And E.Id='$empid'");
//var_dump($this->db->last_query());
        //die();

        return $query;
    }

    public function geteventdetails() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';
        $eventtitle = isset($_REQUEST['eventtitle']) ? $_REQUEST['eventtitle'] : '';
        $eventdate = isset($_REQUEST['eventdate']) ? $_REQUEST['eventdate'] : '';

        $data = array();
        $query = $this->db->query("SELECT S.`Name` as Name, CONCAT(SUBSTRING(S.`TimeIn`, 1, 5),'-',SUBSTRING(S.`TimeOut`, 1, 5)) as timing, (CASE WHEN (S.`shifttype`=1) THEN '(Single Shift)' WHEN (S.`shifttype`=2) THEN '(Multi Date)' ELSE '(Flexi)' END) as stype FROM `ShiftMaster` S, ShiftPlanner C WHERE S.`Id`=C.shiftid And C.empid='$empid' And C.ShiftDate='$eventdate' And C.orgid='$orgid'");
        //var_dump($this->db->last_query());
        $d = array();
        $res = array();
        foreach ($query->result() as $row) {
            $data['Name'] = $row->Name;
            $data['timing'] = $row->timing;
            $data['stype'] = $row->stype;
            $res[] = $data;
        }

        $d['data'] = $res;          //$query->result();
        echo json_encode($d);
        return false;
    }

    public function emplcountcal() {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';
        $startDate = isset($_REQUEST['startDate']) ? $_REQUEST['startDate'] : '';
        $endDate = isset($_REQUEST['endDate']) ? $_REQUEST['endDate'] : '';

        $d = array();
        $res = array();
        $data = array();

        $end = date('Y-m-d', (strtotime('-1 day', strtotime($endDate))));
        $start = $startDate;
        $datediff = strtotime($end) - strtotime($start);
        $datediff = floor($datediff / (60 * 60 * 24));
        $row = array();
        $j = 0;
        for ($i = 0; $i < $datediff + 1; $i++) {
            $date = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));
            $shiftid = getShiftIdByEmpID($empid);

            $row['date'] = date("Y-m-d", strtotime($start . ' + ' . $i . 'day'));
            $row['shiftid'] = getShiftIdByEmpID($empid);
            $row['weekoff'] = getweeklyoffnew($date, $shiftid, $empid, $orgid);

            if ($row['weekoff'] == 'Week Off') {
                $j++;
            }
        }
        $data['weekoffcount'] = $j;


        $query1 = $this->db->query("SELECT A.`EmployeeId` as EmployeeId FROM `AttendanceMaster` A, EmployeeMaster E WHERE E.Id=A.EmployeeId And A.AttendanceStatus IN (1,8,4) And A.TimeIn != '00:00:00' And E.`OrganizationId`='$orgid' And A.OrganizationId='$orgid' And E.Is_Delete=0 And E.archive='1' And E.Id='$empid' And A.AttendanceDate BETWEEN '$startDate' And '$end'");

        $data['presentcount'] = $this->db->affected_rows($query1);

        $query2 = $this->db->query("SELECT A.`EmployeeId` as EmployeeId FROM `AttendanceMaster` A, EmployeeMaster E WHERE E.Id=A.EmployeeId And A.AttendanceStatus IN (2,7) And A.TimeIn != '00:00:00' And E.`OrganizationId`='$orgid' And A.OrganizationId='$orgid' And E.Is_Delete=0 And E.archive='1' And E.Id='$empid' And A.AttendanceDate BETWEEN '$startDate' And '$end'");

        $data['absentcount'] = $this->db->affected_rows($query2);

        $query3 = $this->db->query("SELECT A.`EmployeeId` as EmployeeId FROM `AttendanceMaster` A, EmployeeMaster E WHERE A.`AttendanceStatus`=6 AND A.`OrganizationId`='$orgid' AND A.`EmployeeId`=E.Id And E.`Is_Delete`=0 And E.`archive`='1' And E.Id='$empid' And A.AttendanceDate BETWEEN '$startDate' And '$end'");

        $data['leavecount'] = $this->db->affected_rows($query3);

        $query4 = $this->db->query("SELECT SUM(DATEDIFF(`DateTo`,`DateFrom`)+1) as Id,`DateFrom`,`DateTo` FROM `HolidayMaster` WHERE `OrganizationId`='$orgid' And `DateTo` BETWEEN '$startDate' And '$end'");
        foreach ($query4->result() as $row) {
            $holicount = $row->Id;
        }

        $data['holidaycount'] = $holicount;


        $res[] = $data;
        $d['data'] = $res;
        echo json_encode($d);
    }

    public function checkRemoteFile($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($ch) !== FALSE) {
            return true;
        } else {
            return false;
        }
    }

    public function editgeolocation() {
        $orgid = $_SESSION['orgid'];
        $geolocation = isset($_REQUEST['geolocation']) ? $_REQUEST['geolocation'] : 0;
        //echo $geolocation;
        //exit;
        $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;
        $favorite1 = implode(",", $favorite);
        $geolocation1 = implode(",", $geolocation);
        //echo $geolocation1;
        $sql = "update EmployeeMaster set area_assigned = ('$geolocation1') where OrganizationId =$orgid and id IN ($favorite1)";
        $query = $this->db->query($sql);
        echo $query;
        if ($query == true) {
            $date = date("y-m-d H:i:s");
            $orgid = $_SESSION['orgid'];
            $id = $_SESSION['id'];
            $favorite = isset($_REQUEST['favorite']) ? $_REQUEST['favorite'] : 0;
            $favorite1 = implode(",", $favorite);
            $i = 0;
            for ($i = 0; $i < count($favorite); $i++) {
                $empid121 = $favorite[$i];
                //var_dump($empid121);

                $module = "Employees";
                $actionperformed = " <b>Geo location</b> has been updated for <b>" . getEmpName($empid121) . "</b> from <b>Active Employees </b>.";
                $activityby = 1;

                $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array($date, $id, $module, $actionperformed, $orgid, $activityby, $id));
                //var_dump($this->db->last_query());
            }
        } else {
            return false;
        }
    }

    public function getFlexiShift($id) {
        $ci = & get_instance();
        $ci->load->database();
        $query = $ci->db->query("SELECT HoursPerDay FROM `ShiftMaster` where id='$id'");
        $res = array();
        foreach ($query->result() as $row) {
            return substr(($row->HoursPerDay), 0, 5);
        }
    }

    public function ActivityData($id) {
        $orgid = $_SESSION['orgid'];
        $adminid = $_SESSION['id'];
        $name = getEmpName($id);
        $name = trim($name);
        $q = '';

        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        if ($date == '') {
            $datestatus = isset($_REQUEST['datestatus']) ? $_REQUEST['datestatus'] : 0;
            $range = "";
            if ($datestatus == 7) {
                $enddate = date("Y-m-d");
                $startdate = date('Y-m-d', strtotime('-7 day', strtotime($enddate)));
                $begin = new DateTime($startdate);
                $interval = new DateInterval('P1D'); // 1 Day
                $realEnd = new DateTime($enddate);
                $realEnd->add($interval);
                $dateRange = new DatePeriod($begin, $interval, $realEnd);
                foreach ($dateRange as $date) {
                    $dt = $date->format('Y-m-d');
                    if ($range == "")
                        $range = "'" . $date->format('Y-m-d') . "'";
                    else
                        $range .= ",'" . $date->format('Y-m-d') . "'";
                }
            } else {
                $enddate = date("Y-m-d");
                $range = "'" . date('Y-m-d') . "'";
                // $enddate=date("Y-m-d");
                //$startdate=date("Y-m-d");
            }
            $query = $this->db->query("SELECT *  FROM `ActivityHistoryMaster` WHERE `ActionPerformed` LIKE '%$name%' AND  OrganizationId = ? AND ActivityBy = 1 AND DATE(LastModifiedDate ) IN ( " . $range . " )  ORDER BY DATE(LastModifiedDate ) DESC ", array($orgid));
        }
        // var_dump($this->db->last_query());
        else {
            $arr = explode('-', trim($date));
            $end = date('Y-m-d', strtotime($arr[1]));
            $strt = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));

            $begin = new DateTime($strt);
            $interval = new DateInterval('P1D'); // 1 Day
            $realEnd = new DateTime($end);
            $realEnd->add($interval);
            $dateRange = new DatePeriod($begin, $interval, $realEnd);
            $range = "";
            foreach ($dateRange as $date) {
                $dt = $date->format('Y-m-d');
                if ($range == "")
                    $range = "'" . $date->format('Y-m-d') . "'";
                else
                    $range .= ",'" . $date->format('Y-m-d') . "'";
            }
            //echo $range;
            $rangedate = $range;
            // var_dump($rangedate)


            if ($rangedate == "") {
                $rangedate = 1;
            }
            $query = $this->db->query("SELECT *  FROM `ActivityHistoryMaster` WHERE `ActionPerformed` LIKE '%$name%' AND  OrganizationId = ? AND ActivityBy = 1 AND DATE(LastModifiedDate ) IN ( " . $range . " )  ORDER BY DATE(LastModifiedDate ) DESC ", array($orgid));
            //var_dump($this->db->last_query());
            //die;
        }
        $d = array();
        $res = array();
        foreach ($query->result() as $row) {
            $data = array();
            $data['ActionPerformed'] = $row->ActionPerformed;
            $data['Module'] = $row->Module;
            $data['LastModifiedById'] = "";
            if (strtolower(trim($row->Module)) == 'attendance app') {

                if ($row->adminid != 0) {

                    $data['LastModifiedById'] = ucwords(getEmpName($row->adminid));
                } else {

                    $data['LastModifiedById'] = ucwords(getEmpName($row->ActivityBY));
                }
            } else {
                if ($row->adminid != 0) {
                    $data['LastModifiedById'] = ucwords(getAdminName($row->adminid));
                } else {
                    $data['LastModifiedById'] = ucwords(getAdminName($row->ActivityBY));
                }
            }
            $data['LastModifiedDate'] = date("d-m-Y H:i", strtotime($row->LastModifiedDate));
            $res[] = $data;
        }
        $d['data'] = $res;
        $this->db->close();
        echo json_encode($d);
        return false;
    }

    public function sendInvitation_new() {
        header('Access-Control-Allow-Origin: *');
        $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : '0';
        $orgName = isset($_SESSION['orgName']) ? $_SESSION['orgName'] : '';
        $admin = getAdminName($orgid);
        //echo $admin;
        $emails = isset($_REQUEST['emails']) ? explode(',', $_REQUEST['emails']) : '';
        $headers = 'From: <noreply@ubiattendance.com>' . "\r\n";
        $subject = "Employee Registeration Invitation from " . $orgName;
        $i = 0;
        foreach ($emails as $email) {
            $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title>ubiAttendance</title>
			<style type="text/css">
			body 
			{
			  margin-left: 0px;
			  margin-top: 0px;
			  margin-right: 0px;
			  margin-bottom: 0px;
			 -webkit-text-size-adjust:none; -ms-text-size-adjust:none;
			  background: white;
			} 
			table{border-collapse: collapse;}  
			.icon-row{
			  border-bottom: 2px solid #00aad4;
			}
			.icons{
			  padding: 50px;
			}
			.icons img{
			  width:100px;
			  height: auto;
			}
			</style></head>
			<body>
			<table  width="650" align="center" >
			  <tr>
				<td  valign="center" align="center" >
				  <a href="http://www.ubihrm.com/attendance-app/" "><img style="width: 150px;padding-top: 50px;" src="http://ubitechsolutions.com/ubitechsolutions/Mailers/ubiAttendance/Clock_time_in_with_4_easy_steps/logo.png"></a>
				</td>
			  </tr>
			   <tr>
				<td  valign="center" align="center">
				  <h1 style="font-family: Arial">
					You are invited to join ubiAttendance
				  </h1>
				</td>
			  </tr>
			  <tr>
				<td  valign="center" align="center">
				  <p style="font-family: Arial;">
					' . $admin . ' from ' . $orgName . ' has invited you to use ubiAttendance for easy marking of Time In & Time Out from your mobile device! 
				  </p>   
				</td>
			  </tr>
			   <tr>
				<td  valign="center" align="center" style="padding-top: 50px;padding-bottom: 50px;  ">
					<a href="' . URL . 'userprofiles/regInvEmp?tocken=' . encode5t($orgid) . '&tocken1=' . encode5t($email) . '" style="padding:20px 50px;font-family: Arial;background-color: #22be2a;color: white;text-decoration: none;border-radius: 5px;">Accept</a>
				</td> 
				</tr>
			<tr>
				<td  valign="center" align="center" style="padding-top: 50px; display:none">
				   <p style="font-family: Arial;color: grey;"> You may copy/paste this link into your browser:' . URL . 'services/regInvEmp?tocken=' . encode5t($orgid) . '&tocken1=' . encode5t($email) . '</p>
				</td> 
			</tr>
			  </table>
			</body>
			</html>';
            sendEmail_new($email, $subject, $message, $headers);
            $i++;
        }
        echo $i;
    }
    
    public function registerEmp(){
		$f_name = isset($_REQUEST['f_name'])?ucfirst($_REQUEST['f_name']):'';
		// $l_name = isset($_REQUEST['l_name'])?ucfirst($_REQUEST['l_name']):'';
		$password1 = encode5t(isset($_REQUEST['password'])?$_REQUEST['password']:'');
		$username = isset($_REQUEST['username'])?encode5t(strtolower($_REQUEST['username'])):'';
		$shift = isset($_REQUEST['shift'])?$_REQUEST['shift']:''; 
		$designation = isset($_REQUEST['designation'])?$_REQUEST['designation']:'';
		$department = isset($_REQUEST['department'])?$_REQUEST['department']:'';
		$contact = isset($_REQUEST['contact'])?encode5t($_REQUEST['contact']):'';
		$org_id = isset($_REQUEST['org_id'])?$_REQUEST['org_id']:'';
		$countrycode =isset($_REQUEST['countrycode'])?$_REQUEST['countrycode']:"";
		$country =  isset($_REQUEST['country'])?$_REQUEST['country']:0;
		$admin =  isset($_REQUEST['admin'])?$_REQUEST['admin']:0; // 1 if emp added by admin
		$doj='0000-00-00';
		$data=array();
		$zone=getTimeZone($org_id);
		date_default_timezone_set($zone);
		$date=date('Y-m-d H:i:s');
		$data['id']	=0;
		$data['sts']=0;
		$ml=0;
		$con=0;
		$mailtrigger=$this->db->query("SELECT employee_mail_trigger FROM admin_login WHERE OrganizationId='$org_id'");
      if($row=$mailtrigger->result()){
      $mailsts  = $row[0]->employee_mail_trigger; 
      //var_dump($mailsts);
      }
		 if($username!=''){
			$sql = "SELECT * FROM UserMaster where username = '".$username."'";
			$this->db->query($sql);
			$ml=$this->db->affected_rows();
		 }
		 if($contact!=''){
			$sql = "SELECT * FROM UserMaster where username_mobile = '".$contact."' ";
			$this->db->query($sql);
			$con=$this->db->affected_rows();
		 }
			if($con>0){
				$data['sts']=3; // if Contact already exist
			}else if($ml>0){
					$data['sts']=2; // if email id already exist
			}else{
				/*----------------default shift/dept/designation-------------------*/
				if($shift=='' || $shift=='0')
				{
					$qry=$this->db->query("SELECT Id FROM `ShiftMaster` WHERE OrganizationId=$org_id  order by Id ASC limit 1");
					if ($r=$qry->result())
							$shift  = $r[0]->Id;
				}
				if($department=='' || $department=='0')
				{
					$qry=$this->db->query("SELECT Id FROM `DepartmentMaster` WHERE OrganizationId=$org_id order by Id ASC limit 1 ");
					if ($r=$qry->result())
							$department  = $r[0]->Id;
				}
				if($designation=='' || $designation=='0')
				{
					$qry=$this->db->query("SELECT Id FROM `DesignationMaster` WHERE OrganizationId=$org_id  order by Id ASC limit 1");
					if ($r=$qry->result())
							$designation  = $r[0]->Id;
				}
				/*----------------default shift/dept/designation-close-------------------*/
			  $query = $this->db->query("insert into EmployeeMaster(FirstName,PersonalNo,Shift,OrganizationId,Department,Designation,
			  CompanyEmail,countrycode,CurrentCountry,CreatedDate,doj) values('$f_name','$contact',$shift,$org_id,$department,$designation,'$username','$countrycode',$country,'$date','$doj')");

			 
  					 	
  						

			 if($query>0){
				 $emp_id = $this->db->insert_id();
				 $query1 = $this->db->query("INSERT INTO `UserMaster`(`EmployeeId`, `Password`, `Username`,`OrganizationId`,CreatedDate,LastModifiedDate,username_mobile) VALUES ($emp_id,'$password1','$username',$org_id,'$date','$date','$contact')");
				 if($query1>0){
					 $data['sts']=1;
					 $data['id']=$emp_id;

					 // var_dump($admin);
					 // die;
					if($admin==1){ //emp added by admin
					 ///////////////////mail drafted to admin
					 	$message="<html>
						<head>
						<title>ubiAttendance</title>
						</head>
						<body>Dear Admin,<br/>
						<p>
						Congratulations!! <b>".$f_name."</b> has been added to the Employees’ List of<b> ".getOrgName($org_id)."</b>.
						<br/> The details registered are:<br/><br/>
						<b>
						
						Employee: ".$f_name." <br/>
						
						Username(Phone#): ".$_REQUEST['contact']."<br/>	
						Password: ".$_REQUEST['password']."<br/>	
						</b>
						</p>
						<p>
							<a href='https://ubiattendance.ubihrm.com/index.php/services/useridcard/".$org_id."/".$emp_id."' target='_blank' >
							Generate".$f_name." ’s
							 QR code </a>						
						</p>
						
						
						<h5>Regards,</h5>
						<h5>Team ubiAttendance </h5>
					</body>
					</html>
					";
						
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					// More headers
					$headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
					//$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
					$subject=$f_name." is registered on ubiAttendance.";
					
					$adminMail=getAdminEmail($org_id);
					if($mailsts == 1){
					sendEmail_new($adminMail,$subject,$message,$headers);
					sendEmail_new('shakir@ubitechsolutions.com',$subject,$message,$headers);
				}
				//	sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
					sendEmail_new('ubiattendance@ubitechsolutions.com',$subject,$message,$headers);
		 ///////////////////mail drafted to admin/
					 
					  
				}
			
				 $date = date("y-m-d H:i:s");
				   $orgid =$org_id;
				   $id =$emp_id;
				   $module = "Employees";
				   $actionperformed = " <b>".$f_name." </b> has been added from <b>Self registration. </b>.";
				   $activityby = 1;
				   if($query1>0){
				   $query222 = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy) VALUES (?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby));
					
		///////////////////mail drafted to employee
					 $empmailid=$_REQUEST['username'];
					 if($empmailid!=''){ // trigger mail to employee
							 $message="<html>
							<head>
							<title>ubiAttendance</title>
							</head>
							<body>Hello ".$f_name.",<br/>
							<p>
						     You are added successfully added as an Employee in ubiAttendance app.<br/><br/>
							 Follow below steps to start punching your Time:<br/><br/>
							
						1. Download & Install the App through the following links:
							<ol>
						<li>Android -<a href='https://play.google.com/store/apps/details?id=org.ubitech.attendance'>https://play.google.com/store/apps/details?id=org.ubitech.attendance</a></li>
						<li>Ios -<a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a></li>
							</ol>
						2. Open the App & <b>sign in.</b><br/>
							
							
							Username: <b>".$empmailid." or  ".$_REQUEST['contact']."</b><br/>
							Password: ".$_REQUEST['password']."<br/><br/>							
						
							3. Click on  <b>Time In</b> to punch your Attendance.</br>
							
							
						</body>
						</html>";
							
						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						// More headers
						$headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
						//$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
						$subject="Download the ubiAttendance App. .";
					//	sendEmail_new($email,$subject,$message,$headers);
						
						sendEmail_new($empmailid,$subject,$message,$headers);
						sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
						 
						sendEmail_new('ubiattendance@ubitechsolutions.com',$subject,$message,$headers);
					 ///////////////////mail drafted to employee/
					} // emp added by admn/
					 
					}
					else{ // if emp get registered by himself
					 
					 ///////// mail drafted to admin
					/* $message="<html>
						<head>
						<title>ubiAttendance</title>
						</head>
						<body>Dear Admin,<br/>
						<p>
						Congratulations!! <b>".$f_name." ".$l_name."</b> has been added to the Employees’ List of<b> ".getOrgName($org_id)."</b>.
						<br/><br/>
						<b>
						Employee: ".$f_name." ".$l_name." <br/>
						Username(Phone#): ".$_REQUEST['contact']."<br/>	
						Password: ".$_REQUEST['password']."<br/>						
						</b>
						</p>
						<p>
							<a href='http://ubiattendance.ubihrm.com/index,php/services/useridcard/".$org_id."/".$emp_id."' target='_blank' >
							Generate ".$f_name." ".$l_name."’s
							 QR code </a>						
						</p>
						<h5>Regards,</h5>
						<h5>Team ubiAttendance </h5>
					</body>
					</html>
					";*/
					$message="<html>
  						<head>
							<title>ubiAttendance</title>
  						</head>
						<body>
						<h3>Dear Admin,</h3>
						<p>Employee are registered in ubiAttendance App for “ Ubitech Solutions�?. Kindly punch your attendance through the following steps.</p>
						<ol>
						<li> 
							Download the Android App by clicking <a  href='https://play.google.com/store/apps/details?id=org.ubitech.attendance'>https://play.google.com/store/apps/details?id=org.ubitech.attendance</a> 
							iPhone users can download through 
							<a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a>
						</li>
						<li>Install the App.  It will be added to the home screen</li>
						<li>Open the App & sign in. User name will be the registered Email/Phone no.</li>
						<li>Initial Sign in Password is ".$_REQUEST['password']."</li>
						<li>You can now start punching the attendance.</li>
						<li><a download href='http://192.168.0.200/ubiattendance/assets/PDF/Get%20started%20with%20ubiAttendance%20-%20Employees.pdf'>Download</a> the detailed Employee guide</li>
						</ol>
						</body>
						</html>";
						//echo $message;
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					// More headers
					$headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
					//$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
					$subject=$f_name." is registered on ubiAttendance.";
				//	sendEmail_new($email,$subject,$message,$headers);
					$adminMail=getAdminEmail($org_id);
					// var_dump($mailsts);
					if($mailsts == 1){
						// var_dump($mailsts."hiiii");
					sendEmail_new($adminMail,$subject,$message,$headers);
					sendEmail_new('shakir@ubitechsolutions.com',$subject,$message,$headers);
				}
					//sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
					sendEmail_new('ubiattendance@ubitechsolutions.com',$subject,$message,$headers);
					 ///////// mail drafted to admin/
					 
					 ///////// mail drafted to employee
					$empmailid=$_REQUEST['username'];
					 if($empmailid!=''){ // trigger mail to employee
						/*	 $message="<html>
							<head>
							<title>ubiAttendance</title>
							</head>
							<body>Dear ".$f_name." ".$l_name.",<br/>
							<p>
							Congratulations!! You have been registered as an Employee of  ".getOrgName($org_id).".<br/><br/>
							Kindly <a> Download ubiAttendance App from <a href='https://play.google.com/store/apps/details?id=org.ubiubitech.attendance'>Google Play Store</a>. 
							<b>
							<br/>
							Login details:<br/>
							
							Username(Phone#): ".$empmailid." or  ".$_REQUEST['contact']."<br/>
							Password: ".$_REQUEST['password']."<br/><br/>
														
							</b> 	
							<br/>
							<br/>
							
							<h5>Cheers,</h5>
							<h5>Team ubiAttendance </h5>
						</body>
						</html>
						";
					*/
							/*$message="<html>
  							<head>
  							<title>ubiAttendance</title>
  							</head>
  							<body>Dear ".$f_name." ".$l_name.",<br/>
  							<p>
  							Congratulations!! You have been added to the Employees’ List of <b> ".getOrgName($org_id)."</b>.
  							<br/><br/>
  							</b>Your Login Details are:<b/><br/><br/>
  							Username(Phone#): ".$_REQUEST['contact']."<br/>
  							Password: ".$_REQUEST['password']."<br/>
  							</b>
  							</p>
  							<p>
  								Get QR code by clicking <b> <a href='https://ubiattendance.ubihrm.com/index.php/services/useridcard/".$org_id."/".$emp_id."' target='_blank' >Generate QR Code</a></b>						
  							</p>
  							<p>
  								<a href='https://play.google.com/store/apps/details?id=org.ubitech.attendance'>Download</a> App on Google Play Store. You can refer to our <a href='http://www.ubitechsolutions.com/images/ubiAttendance%20User%20Guide%20(For%20Employees).pdf'>Get Started Guide</a> for quick onboarding. 
  							</p>
  							<h5>Regards,</br>
  							Team ubiAttendance</h5>
  						</body>
  						</html>
  						";*/

//////////////new mail body by vanshika/////////
//new comment else part
					/* $message="<html>
					<head>
					<title>ubiAttendance</title>
					</head>
					<body>
					Congratulations <b>".$f_name."</b>!!<br/>
					You are registered on ubiAttendance App for ".getOrgName($org_id)." .<br/>
					<ol>
					<li>Download & install the App through any of the links below:</li>
						<ol>
						<li>Android -<a href='https://play.google.com/store/apps/details?id=org.ubitech.attendance'>https://play.google.com/store/apps/details?id=org.ubitech.attendance</a></li>
						<li>iPhone -<a href='https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8 '>https://itunes.apple.com/us/app/ubiattendance-ubitech/id1375252261?mt=8</a></li>
						</ol>
						<li>Open the App & sign in.</li>
						Login details for Mobile App<br/>
						Username: ".$_REQUEST['username']."<br/>
						Password: ".$_REQUEST['password']."<br/>
						OR<br/>
						Username: ".$_REQUEST['contact']."<br/>
						Password: ".$_REQUEST['password']."<br/>
						<li>Click on “Time In�? button to punch attendance.</li>
					</ol>
					<p>For further assistance, kindly contact your system administrator.</p>
					<h5>Cheers,</h5>
					<h5>ubiAttendance Team</h5>
					</body>
					</html>";	 */
////////////////////////////////////////




						
						// Always set content-type when sending HTML email
						/* $headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						// More headers
						$headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
					//$headers .= 'Cc: vijay@ubitechsolutions.com' . "\r\n";
						$subject="You have registered on ubiAttendance.";
					//	sendEmail_new($email,$subject,$message,$headers);
						sendEmail_new($empmailid,$subject,$message,$headers);//sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
						sendEmail_new('ubiattendance@ubitechsolutions.com',$subject,$message,$headers); */
						///////// mail drafted to employee/
					 }
					 }
			 }else{ 
				 $data['sts']=0;
			 }
			 //////////---------check users limit
		$query = $this->db->query("select count(id) as totalUsers,(select NoOfEmp from Organization where Organization.Id =$org_id) as ulimit,(select status from licence_ubiattendance where licence_ubiattendance.OrganizationId =$org_id) as orgstatus from UserMaster where OrganizationId = $org_id");
			if ($r=$query->result())
			{
				if($r[0]->totalUsers>$r[0]->ulimit)
				{
					$range='1-20';
					if($r[0]->totalUsers<21)
						$range='1-20';
					else if($r[0]->totalUsers>=21 && $r[0]->totalUsers<41)
						$range='21-40';
					else if($r[0]->totalUsers>=41 && $r[0]->totalUsers<61)
						$range='41-60';
					else if($r[0]->totalUsers>=61 && $r[0]->totalUsers<81)
						$range='61-80';
					else if($r[0]->totalUsers>=81 && $r[0]->totalUsers<101)
						$range='81-100';
					else if($r[0]->totalUsers>=101 && $r[0]->totalUsers<121)
						$range='101-120';
					else
						$range='120+';
					
					
					$sdate='-';	
					$edate='-';	
					$country=93;	
					$rate_per_day=0;
					$days=0;
					$currency='';
					$due=0;
					$orgstatus=$r[0]->orgstatus;
					
					$query1 = $this->db->query("select start_date,end_date,status, due_amount,DATEDIFF(end_date,CURDATE())as days,(SELECT `Country` FROM `Organization` WHERE `Id`=$org_id)as country from licence_ubiattendance where OrganizationId  =$org_id");
					if ($r1=$query1->result()){
						$sdate	=	$r1[0]->start_date;	
						$edate	=	$r1[0]->end_date;
						$days	=	$r1[0]->days;
						$due	=	$r1[0]->due_amount;
						$currency=	$r1[0]->country==93?'INR':'USD';
						
						$data['trialstatus']= $r1[0]->status;
							if(date('Y-m-d',strtotime($edate)) < $date){
								$data['trialstatus']= 2;
							}
							$data['buysts']= $r1[0]->status;
							
						$query2 = $this->db->query("SELECT  monthly  FROM `Attendance_plan_master` WHERE `range`='$range' and `currency`='$currency' ");
						if ($r2=$query2->result())
							$rate_per_day	=	($r2[0]->monthly)/30 ;
					}
					
					$payable_amt=0;
					$tax=0;
					$total=0;
					if($currency=='INR')
						$tax		=	($rate_per_day)*($days)*(0.18);
						$payable_amt=	$rate_per_day*$days;
						$payamtwidtax = round(($payable_amt+$tax),2);
						$total		=	round(($due+$tax+$payable_amt),2);
				/////////////update due amount-start
					$query1 = $this->db->query("UPDATE `licence_ubiattendance` SET `due_amount`=$total WHERE `OrganizationId` =$org_id");
				/////////////update due amount-close
					if($orgstatus==1){
						$subject=getOrgName($org_id)." -Billing details for changed users";
						//$subject="ubiAttendance - Exceeded User Limit";
						$message="<div style='color:black'>
					Greetings from ubiAttendance App<br/><br/>
					The no. of users in your ubiAttendance Plan have exceeded. We have updated your plan.  Below are the payment details for the additional Users. <br/>
					<h4 style='color:blue'>Plan Details:</h4>
					Company name: ".getOrgName($org_id)."<br/>
					Plan Start Date:".date('d-M-Y',strtotime($sdate))."<br/>
					Plan End Date:".date('d-M-Y',strtotime($edate))."<br/>
					User limit: ".$r[0]->ulimit."<br/>
					Registered Users: ".($r[0]->totalUsers)."<br/>
					<br/>
					<h4 style='color:blue'>Billing Details:</h4>
					Previous Dues: ".$due.' '.$currency." <br/>
					Amount Payable for additional Users: ".$payamtwidtax.' '.$currency."<br/>
					Amount Payable: ".$payamtwidtax." + ".$due." = ".$total." ".$currency." <br/>
					<br/>
					<a href='".URL."'>Update your plan now</a> so that there is no disruption in our services<br/><br/>";
					$message.="Cheers,<br/>
					Team ubiAttendance<br/><a target='_blank' href='http://www.ubiattendance.com'>www.ubiattendance.com</a><br/> Tel/ Whatsapp: +91 70678 22132<br/>Email: ubiattendance@ubitechsolutions.com<br/>Skype: ubitech.solutions</div>";
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= 'From: <noreply@ubiattendance.com>' . "\r\n";
						$adminMail=getAdminEmail($org_id);
						//echo $message;
						sendEmail_new($adminMail,$subject,$message,$headers);
						//sendEmail_new('vijay@ubitechsolutions.com',$subject,$message,$headers);
						sendEmail_new('ubiattendance@ubitechsolutions.com',$subject,$message,$headers);
						//sendEmail_new('deeksha@ubitechsolutions.com',$subject,$message,$headers);
					}
				}
			}
		//////////---------check user's limit--close
			}
			} 
		echo json_encode($data);
		}
        public function updatelivetracking(){

        $orgid =$_SESSION['orgid'];
        
        $favorite =  isset($_REQUEST['favorite'])?$_REQUEST['favorite']:0;
        $enable =  isset($_REQUEST['enable'])?$_REQUEST['enable']:0;
       
        
        //  var_dump($enable);
        //  exit();
        $favorite1=implode(",",$favorite);
     
    //    var_dump($favorite1);
    //    exit();
       $sql = "update EmployeeMaster set livelocationtrack= $enable where OrganizationId =$orgid and id IN ($favorite1)";
        $query = $this->db->query($sql);
        // var_dump($this->db->last_query());
            echo $query;
            if($query==true)
            {
              $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
            $favorite =  isset($_REQUEST['favorite'])?$_REQUEST['favorite']:0;
        
            $favorite1=implode(",",$favorite);
           
      // $name = getEmpName($favorite1);
            $i= 0;
           for($i=0; $i<count($favorite); $i++)
            {
              $empid121 = $favorite[$i];
           $module = "Employees";
           $actionperformed = " <b>Live LocationTracking</b> has been updated for <b>".getEmpName($empid121)."</b> from <b>Active Employees </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
            }
          }
            else
            {
              return false;
            }


                
                }

}
?>