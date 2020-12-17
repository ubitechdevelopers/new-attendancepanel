<?php
class Userprofiles_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
		//include(APPPATH."PhpMailer/class.phpmailer.php");
    }
      public function getEmployeesData()
      {
         $orgid=$_SESSION['orgid'];

         $sname=$_SESSION['name'];
         $id =$_SESSION['id'];
         
          $res = array();
          $d = array();

    $query1 = $this->db->query("SELECT `user_limit` as userlimit, (SELECT COUNT(*)
    FROM EmployeeMaster where`OrganizationId` = $orgid and Is_Delete != 2) as registeredusers from licence_ubiattendance where `OrganizationId`=$orgid");
          // var_dump($this->db->last_query());

         $imgname='';
         foreach ($query1->result() as $row){

          $data = array();

            $data['userlimit']=$row->userlimit;
            $data['reguser']=$row->registeredusers;


          $res[]=$data;
         
        }  
        $d['data'] = $res;
        // echo json_encode($d);
       
         $query = $this->db->query("SELECT EmployeeMaster.id as id,EmployeeMaster.EmployeeCode as ecode,EmployeeMaster.area_assigned as area ,EmployeeMaster.Location,(CASE WHEN (EmployeeMaster.entitledleave!='') THEN EmployeeMaster.entitledleave ELSE (SELECT entitled_leave from Organization Where Id=EmployeeMaster.OrganizationId Limit 1) END) as entitledleave,EmployeeMaster.livelocationtrack,`FirstName`,lastname,concat(FirstName,'',lastname)as name,archive,department,designation,shift,PersonalNo,DOB, Nationality,hourly_rate, `MaritalStatus`,`Religion`,`BloodGroup`,`DOJ`, `DOC`,`Gender`,`HomeAddress`, EmployeeMaster.CurrentCountry,EmployeeMaster.CurrentCity,`CurrentCountry`,`timezone`, `HomeCity`, `HomeZipCode`,(Select shifttype from ShiftMaster WHERE ShiftMaster.Id=EmployeeMaster.`Shift` LIMIT 1) as shifttype,(select appSuperviserSts from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as appSuperviserSts,(select username_mobile from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as una,(select Name from CityMaster where Id = EmployeeMaster.CurrentCity LIMIT 1 )as city123,(select Website from Organization where   Id = EmployeeMaster.OrganizationId)as web,(select qrselector from `admin_login` where  id = '$id' and OrganizationId  = '$orgid' )as qroption,(select Password from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as upa,ImageName FROM `EmployeeMaster` where OrganizationId=? AND archive=1 AND Is_Delete = '0' order by  FirstName ",array($orgid));
         // var_dump($this->db->last_query());

         
         
         $d=array();
         $res=array();
         $userstts='';
         $resetpassword='';
         foreach ($query->result() as $row)
        {
          if($row->archive==1)
            $userstts='<i class=" status fa fa-thumbs-down" style="font-size:16px; color:red" data-id="'.$row->id.'" data-sts="'.$row->archive.'" data-ena="'.$row->FirstName.' '.$row->lastname.'" title="Inactive" ></i>';
          else
            $userstts='<i class=" status fa fa-thumbs-up" style="font-size:16px; color:green" data-toggle="modal" data-id="'.$row->id.'" data-ena="'.$row->FirstName.'"  title="Click to make user Active" ></i>';
              $pass = decode5t($row->upa);
            $resetpassword='<i class=" resetpwd fa fa-key" style="font-size:16px; color:purple" data-toggle="modal" data-target="#resetpwd" typographi="'.$pass.'" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'" title="Reset password Only App " ></i>';
      
      $activitylog='<a href='.URL.'Userprofiles/empactivitylog/'.$row->id.'><i class="activitylog fa fa-history" style="font-size:16px; color:purple" data-toggle="modal" data-target="#activitylog"title="Activity Log" ></i></a>';

       $leaveandtimeoff='<a href='.URL.'Userprofiles/empleaveandtimeoff/'.$row->id.'><i class="fa fa-calendar" style="font-size:16px; color:purple" data-toggle="modal" data-target="#leaveandtimeoff"title="Leave & Timeoff" ></i></a>';
         
             $data=array();
            $eno='';
            //  if($_SESSION['specialCase']=='RAKP')
                //$eno='<br/><b>'.$row->ecode.' </b>';
            $data['change']='<input type="checkbox" name="chk" style="padding-top: 2rem!important;"  id="'.$row->id.'" class="checkbox"  value="'.$row->id.'" >';  
          if($row->ImageName!="" || $row->ImageName!=0)
          { 
            $photo='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img class="rounded-circle" src="'.URL."../assets/image/user_png.png".'"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';

          }
          else
          {
           if($row->Gender==1)
           {
          $photo=/*'<img src="'.IMGURL3."avatars/male.png".'" style="width:60px!important;border-radius:50%" />';*/
          '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img class="rounded-circle" src="'.URL."../assets/image/user_png.png".'"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
           }
           else if($row->Gender==2)
           {
          $photo='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img class="rounded-circle" src="'.URL."../assets/image/user_png.png".'"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
           }
           else
           {
          $photo='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img class="rounded-circle" src="'.URL."../assets/image/user_png.png".'"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';
           }
          }
            if($row->lastname != "")
            {
             $uname=$row->FirstName.' '.$row->lastname;
            }else
            {
            $uname=$row->FirstName;
            }
            $data['employeedetails']=$photo."   ".$uname;

            if($row->DOJ == '0000-00-00')
            {
              $dateofjoining='00/00/0000';
            }
            else
            {
              $dateofjoining=date("m/d/Y", strtotime($row->DOJ));
            }

            if($row->DOJ == '0000-00-00')
            {
              $balleave="N/A";
            }
            else
            {
              $balleave=intval($this->getBalanceLeave($orgid,$row->id));
            }

            $data['code']=$row->ecode;
            $data['hourlyrate']=getAllRate1($_SESSION['orgid'],$row->hourly_rate);
             // json_decode(getAllRate($_SESSION['orgid']))
            $data['location']=$this->locationname($row->Location);
            $data['username']=decode5t(getUserName($row->id));
            // $data['date'] = date('d-M-Y',strtotime($row->TimeofDate));
            //$data['password']=decode5t($row->upa);
         
            $data['pemissions']="";
          if($row->appSuperviserSts==1)
          {
            $data['pemissions'] = '<div style="background-color:green;text-align:center;color:white;border-radius:50%" title="for App only" >Admin</div>';
          }
          elseif($row->appSuperviserSts==2)
          {
            $data['pemissions'] = '<div style="background-color:#9c27b0;text-align:center;color:white;border-radius:50%" title="for App only" >Supervisor</div>';
          }
          else
          {
            $data['pemissions'] = '<div style="background-color:#ff9800;text-align:center;color:white;border-radius:50%" title="user" >User</div>';
          }

          $data['shifttype']="";
          if($row->shifttype==1)
          {
            $data['shifttype'] = '<div style="text-align:center;" title="Single Date" >Single Date</div>';
          }
          elseif($row->shifttype==2)
          {
            $data['shifttype'] = '<div style="text-align:center;" title="Multi Date" >Multi Date</div>';
          }
          else
          {
            $data['shifttype'] = '<div style="text-align:center;" title="Flexi" >Flexi</div>';
          }

            $data['designation']=getDesignation($row->designation);
         
            if($row->area != 0)
            $data['area'] = getName('Geo_Settings','Name', 'Id', $row->area);
          else
            $data['area'] = '--';
            if($row->shifttype==3)
            {
               $data['shift']='<span title="Shift Hours: '.$this->getFlexiShift($row->shift).'">'.getShift($row->shift).'</span>';
             
            }
            else
            {
               $data['shift']='<span title="Shift Timing: '.getShiftTimes($row->shift).', Break Hours: '.getShiftBreaks($row->shift).'">'.getShift($row->shift).'</span>';
            }
           
            $data['department']=getDepartment($row->department);
            $data['contact']=decode5t($row->PersonalNo);

         
            $data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">Inactive</div>';
            
      
      $data['livetrack']=$row->livelocationtrack==1?'<div style="background-color:green;text-align:center;color:white;">ON</div>':'<div style="background-color:#808080;text-align:center;color:white;">OFF</div>';
         
          if($data['contact'] != "")
          $qr = '<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'"
          data-ecode="'.$row->ecode.'" data-shift="'. substr(getShift($row->shift),0,15) .'" data-hourlyrate="'.getAllRate1($_SESSION['orgid'],$row->hourly_rate).'"
          data-desg="'.getDesignation($row->designation).'" data-city123="'.$row->city123.'" data-web123="'.$row->web.'"data-dept="'.getDepartment($row->department).'" data-shifttime="'.getShiftTimes($row->shift).'" data-una="'.decode5t($row->una).'" data-firstname="'.$row->FirstName.'" data-lastname="'.$row->lastname.'" data-location="'.$this->locationname($row->Location).'" data-email="'.decode5t(getUserName($row->id)).'" data-cont="'.decode5t($row->PersonalNo).'" data-image="'.$row->ImageName.'" data-addr="'.decode5t($row->HomeAddress).'" data-qrc="'.$row->qroption.'" data-upa="ykks=='.$row->upa.'" title="Generate QR Code" ></i>';

          

          // elseif($data['contact'] != "")
          // $qr = '<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR1" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'"
          // data-ecode="'.$row->ecode.'"
          // data-desg="'.getDesignation($row->designation).'" data-city123="'.$row->city123.'" data-web123="'.$row->web.'"data-dept="'.getDepartment($row->department).'" data-shifttime="'.getShiftTimes($row->shift).'" data-una="'.decode5t($row->una).'" data-firstname="'.$row->FirstName.'" data-lastname="'.$row->lastname.'" data-email="'.decode5t(getUserName($row->id)).'" data-cont="'.decode5t($row->PersonalNo).'" data-image="'.$row->ImageName.'" data-addr="'.decode5t($row->HomeAddress).'" data-qrc="'.$row->qroption.'" data-upa="ykks=='.$row->upa.'" title="Generate QR Code" ></i>';
          else
          {
            $qr = '<i class="qr1 fa fa-qrcode" style="font-size:16px; color:purple"    data-name="'.$row->FirstName.' '.$row->lastname.'" title="Generate QR Code" ></i>';  
          }
         
          // if($data['code'] != "")
          // $qr = '<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'" data-desg="'.getDesignation($row->designation).'"  data-dept="'.getDepartment($row->department).'" data-shifttime="'.getShiftTimes($row->shift).'" data-una="'.decode5t($row->una).'" data-upa="ykks=='.$row->upa.'" title="Generate QR Code" ></i>';
          // else
          // {
            // $qr = '<i class="qr2 fa fa-qrcode" style="font-size:16px; color:purple"    data-name="'.$row->FirstName.' '.$row->lastname.'" title="Generate QR Code" ></i>';
          // }
         
          $countryidd =($row->CurrentCountry==0)?getCountryIdByOrg($orgid):$row->CurrentCountry;
             $timezonnidd = 0;
            if($row->timezone == '0' || $row->timezone == '')
             {
             $sql1=$this->db->query("select Id from ZoneMaster where CountryId=  $countryidd");
             if( $row1=$sql1->row())
              {
               $timezonnidd=$row1->Id;
              }
             }
              else
              {
              $timezonnidd=$row->timezone;
              }

              $data['country']=getCountryNameById($countryidd);
              $data['timezone']=gettimezonebyid($timezonnidd);

              $data['action']='<div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="    font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 7rem;    padding: 0.5rem 0rem 0.5rem 0.5rem;">
                                    <li style="font-size:0.8rem; "><a href="#" style="color:#808080;">Action</a></li>
                                    <li style="font-size:0.8rem; "><a href="#" style="color:#808080;">Another action</a></li>
                                  </ul>
                                </div>';

           /* $data['action']='<a href="#"><i id="get" class="material-icons edit mod" style="font-size:16px" data-toggle="modal" title="Edit" data-target="#addEmpE"  
             data-id="'.$row->id.'"
             data-name="'.$row->name.'"
             data-firstname="'.$row->FirstName.'"
             data-lastname="'.$row->lastname.'"
             data-area="'.$row->area.'"
             data-hourlyrate="'.getAllRate1($_SESSION['orgid'],$row->hourly_rate).'"
             data-dob="'.$row->DOB.'"
             data-doj="'.$dateofjoining.'"
             data-gen="'.$row->Gender.'"
             data-doc="'.$row->DOC.'"
             data-nat="'.$row->Nationality.'"
             data-cont="'.decode5t($row->PersonalNo).'"
             data-addr="'.decode5t($row->HomeAddress).'"
             data-password="'.$pass.'"
             data-email="'.decode5t(getUserName($row->id)).'"
             data-country="'.$countryidd.'"
             data-timezone="'.$timezonnidd.'"
             data-city="'.$row->HomeCity.'"
             data-location="'.$this->locationname($row->Location).'"
             data-status="'.$row->archive.'"
             data-shift="'.$row->shift.'"
             data-desg="'.$row->designation.'"
             data-dept="'.$row->department.'"
             data-bg="'.$row->BloodGroup.'"
             data-rel="'.$row->Religion.'"
             data-ms="'.$row->MaritalStatus.'"
           data-hourlypay="'.$row->hourly_rate.'"
             data-sstatus="'.$row->appSuperviserSts.'"
           data-image="'.$imgname.'"
             data-ecode="'.$row->ecode.'"
             data-city123="'.$row->city123.'"
             data-web123="'.$row->web.'"
             data-qrc="'.$row->qroption.'"
             data-entitledleave="'.$row->entitledleave.'"
             data-balanceleave="'.$balleave.'"
             >edit</i></a>
            <i class=" delete fa fa-trash" style="font-size:16px; color:purple" data-toggle="modal" data-target="#delEmp" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'" title="Archive Employee"></i> '.$qr.' '.$userstts.' '.$resetpassword.' '.$activitylog.' '.$leaveandtimeoff;*/
           
            //$data['country']=$row->CurrentCountry;
            //echo $data['country'];

            $res[]=$data;
        }  
        $d['data']=$res;  
        $this->db->close();     //$query->result();
        echo json_encode($d);
        return false;

      }
public function getInactiveEmpData()
      {
         $orgid=$_SESSION['orgid'];
         $query = $this->db->query("SELECT EmployeeMaster.id as id, `FirstName`,lastname,archive,department,designation,shift,PersonalNo,DOB, Nationality, `MaritalStatus`,`Religion`,`BloodGroup`,`DOJ`, `DOC`,`Gender`,`HomeAddress`, `HomeCountry`, `HomeCity`, `HomeZipCode`,(select appSuperviserSts from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1 )as appSuperviserSts,(select Username from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1 )as una,(select Password from UserMaster where EmployeeId= EmployeeMaster.id LIMIT 1)as upa FROM `EmployeeMaster` where OrganizationId=? AND archive = 0 AND Is_Delete = '0' ",array($orgid));
         $d=array();
         $res=array();
         $userstts='';
         foreach ($query->result() as $row)
        {
          if($row->archive==1)
            $userstts='<i class=" status fa fa-thumbs-down" style="font-size:16px; color:red" data-target="#delEmp" data-id="'.$row->id.'" title="Click to make user Inactive" data-ena="'.$row->FirstName.' '.$row->lastname.'" ></i>';
          else
            $userstts='<i class=" status fa fa-thumbs-up" style="font-size:16px; color:green" data-target="#delEmp" data-id="'.$row->id.'"  title="Make user Active" data-ena="'.$row->FirstName.' '.$row->lastname.'" ></i>';
        
          $data=array();
            $data['name']=$row->FirstName.' '.$row->lastname;
            $data['username']=decode5t(getUserName($row->id));
            $data['designation']=getDesignation($row->designation);
            $data['shift']='<span title="Shift Timing: '.getShiftTimes($row->shift).', Break Hours: '.getShiftBreaks($row->shift).'">'.getShift($row->shift).'</span>';
            $data['department']=getDepartment($row->department);
            $data['contact']=decode5t($row->PersonalNo);
            $data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">Inactive</div>';
            $data['action']='
          <!--  <a href="#"><i class="material-icons edit" style="font-size:26 px" data-toggle="modal" title="Edit" data-target="#addEmpE"  
             data-id="'.$row->id.'"
             data-firstname="'.$row->FirstName.'" 
             data-lastname="'.$row->lastname.'" 
             data-dob="'.$row->DOB.'"
             data-doj="'.$row->DOJ.'"
             data-gen="'.$row->Gender.'"
             data-doc="'.$row->DOC.'"
             data-nat="'.$row->Nationality.'"
             data-cont="'.decode5t($row->PersonalNo).'"
             data-addr="'.decode5t($row->HomeAddress).'"
             data-password="'.''.'"
             data-email="'.decode5t(getUserName($row->id)).'"
             data-country="'.$row->HomeCountry.'"
             data-city="'.$row->HomeCity.'"
             data-status="'.$row->archive.'"
             data-shift="'.$row->shift.'"
             data-desg="'.$row->designation.'"
             data-dept="'.$row->department.'"
             data-bg="'.$row->BloodGroup.'"
             data-rel="'.$row->Religion.'"
             data-ms="'.$row->MaritalStatus.'"
             data-sstatus="'.$row->appSuperviserSts.'"
             >edit</i></a> -->
            <i class=" delete fa fa-trash"   style="font-size:16px; color:purple" data-toggle="modal" data-target="#delEmp" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'" title="Archive" ></i> 
              <!--<i class=" qr fa fa-qrcode" style="font-size:16px; color:purple" data-toggle="modal" data-target="#genQR" data-id="'.$row->id.'" data-name="'.$row->FirstName.' '.$row->lastname.'" data-desg="'.getDesignation($row->designation).'" data-dept="'.getDepartment($row->department).'" data-una="'.decode5t($row->una).'" data-upa="ykks=='.$row->upa.'" title="Generate QR Code" ></i> -->
            '. $userstts;
            $res[]=$data;
        }   
        $d['data']=$res;
           $this->db->close();      //$query->result();
        echo json_encode($d);
      }
          public function getBalanceLeave($orgid,$empid)
    {

     $query = $this->db->query("SELECT E.FirstName,E.entitledleave,E.DOJ,O.fiscal_start,O.fiscal_end,O.entitled_leave FROM `EmployeeMaster` E, Organization O where E.OrganizationId=O.Id And E.Id='$empid' And E.OrganizationId='$orgid'");
      $res=array();
      $balanceleave=0;
      $entitledleave=0;
      foreach ($query->result() as $row)
      {    

            if($row->entitledleave == '')
            {
            $entitledleave=$row->entitled_leave;  
            }
            else
            {
            $entitledleave=$row->entitledleave; 
            }
            

            ////fiscal start/////
            $dateofjoin=date("m/d/Y", strtotime($row->DOJ));
            $fiscalstart=date("m/d", strtotime($row->fiscal_start));
            $fiscalstartmon=substr($fiscalstart, 0,2);
            $dateofjoinmon=substr($dateofjoin, 0,2);
            $fiscalstartdate=substr($fiscalstart, 3,2);
            $joindate=substr($dateofjoin, 3,2);

            
            if($dateofjoinmon < $fiscalstartmon)
            {
              $doj=date("Y", strtotime($dateofjoin)) - 1;
              $fiscalstartdate = $fiscalstart."/".$doj;
            }
            elseif($dateofjoinmon == $fiscalstartmon && $joindate < $fiscalstartdate)
            {
              $doj=date("Y", strtotime($dateofjoin)) - 1;
              $fiscalstartdate = $fiscalstart."/".$doj;
            }
            elseif($dateofjoinmon == $fiscalstartmon && $joindate == $fiscalstartdate)
            {
              $doj=date("Y", strtotime($dateofjoin));
              $fiscalstartdate = $fiscalstart."/".$doj;
            }
            else
            {
              $doj=date("Y", strtotime($dateofjoin));
              $fiscalstartdate = $fiscalstart."/".$doj;
            }
            ////fiscal start////
 

            ////fiscal end////
            $dateofjoin=date("m/d/Y", strtotime($row->DOJ));
            $fiscalend=date("m/d", strtotime($row->fiscal_end));
            $fiscalendmon=substr($fiscalend, 0,2);
            $dateofjoinmon=substr($dateofjoin, 0,2);
            $fiscalenddate=substr($fiscalend, 3,2);
            $joindate=substr($dateofjoin, 3,2);

            if($dateofjoinmon > $fiscalendmon)
            {
              $doj=date("Y", strtotime($dateofjoin)) + 1;
              $fiscalenddate = $fiscalend."/".$doj;
            }
            elseif($dateofjoinmon == $fiscalendmon && $joindate > $fiscalenddate)
            {
              $doj=date("Y", strtotime($dateofjoin)) + 1;
              $fiscalenddate = $fiscalend."/".$doj;
            }
            elseif($dateofjoinmon == $fiscalendmon && $joindate == $fiscalenddate)
            {
              $doj=date("Y", strtotime($dateofjoin));
              $fiscalenddate = $fiscalend."/".$doj;
            }
            else
            {
              $doj=date("Y", strtotime($dateofjoin));
              $fiscalenddate = $fiscalend."/".$doj;
            }
            ////fiscal end////

            // echo $fiscalstartdate;
            // echo $fiscalenddate;
            // exit(); 


                $currentDate = date('Y-m-d');
            $currentDate = date('Y-m-d', strtotime($currentDate));
            $startDate = date('Y-m-d', strtotime($fiscalstartdate));
            $endDate = date('Y-m-d', strtotime($fiscalenddate));
               
            if (($currentDate >= $startDate) && ($currentDate <= $endDate))
            {
                //echo "Current date is between two dates";
                //Calculating the difference in timestamps 
                    $diff = strtotime($fiscalenddate) - strtotime($dateofjoin); 
                  
                    //1 day = 24 hours 
                    //24 * 60 * 60 = 86400 seconds 
                    $Difference_In_Days=abs(round($diff / 86400)); 
                    //echo $Difference_In_Days;
                    $bal1=(intval($entitledleave)/12);
                    $bal2=($Difference_In_Days/30.4167);
               
                    $balanceleave=$bal1*$bal2;
                    return strstr($balanceleave,'.',true);
            }
            else
            {
                //echo "Current date is not between two dates"; 
                $balanceleave=$entitledleave;
                return $balanceleave; 
            }
        }
    }
    public function locationname($id){

     $sql = "select  Name from LocationMaster where id=$id";

     $query1 = $this->db->query($sql);
      
      if($row = $query1->result()){

      return $row[0]->Name;
      }

    }
	public function getArchiveEmp()
	{
    $org_id=$_SESSION['orgid'];
    $res = array();
    $query = $this->db->query("Select Id ,Shift,Department,Designation  FROM EmployeeMaster Where OrganizationId = ".$org_id ." AND Is_Delete = 1 Order By FirstName ");
    foreach($query->result() as $row)
       {
          $data=array();
        $data['change']='<input type="checkbox" name="chk"  id="'.$row->Id.'" class="checkbox"  value="'.$row->Id.'" >';
        $data['FirstName']= getDeleteEmpName($row->Id);
        $data['desg']=ucwords(getDesignationByEmpID($row->Id));
        $data['deprt']=ucwords(getDepartmentByEmpID($row->Id));
        $data['action'] = '<i class="unarchive fa fa-archive" style="font-size:16px; color:purple" data-toggle="modal" data-target="#unarchive"   data-id="'.$row->Id.'" data-name="'.$data['FirstName'].'" title="Unarchive Employee" ></i> &nbsp;&nbsp;&nbsp;&nbsp;';
        
        $data['action'] .= '<i class="delete fa fa-trash" style="font-size:16px; color:purple" data-toggle="modal" data-target="#delE"  data-id="'.$row->Id.'" data-name="'.$data['FirstName'].'" title="Delete Permanently" ></i> ';
        
        $res[]=$data;     
        }
    $d['data']=$res;          //$query->result();
    $this->db->close();
    echo json_encode($d);
    return false;
  }
    public function insertemployeedetails(){
      $orgid =$_SESSION['orgid'];
        $fname =  isset($_REQUEST['fname'])?ucfirst($_REQUEST['fname']):0;
        $ecode =  isset($_REQUEST['emp_code'])?$_REQUEST['emp_code']:'';
        $dob =  isset($_REQUEST['dob'])?$_REQUEST['dob']:0;
        $zone=getTimeZone($orgid);
        date_default_timezone_set($zone);
        $dofj =  isset($_REQUEST['doj'])?$_REQUEST['doj']:0;
        $doj = date("Y-m-d", strtotime($dofj));
        $doc =  $doj;//isset($_REQUEST['doc'])?$_REQUEST['doc']:0;
        $gen =  isset($_REQUEST['gen'])?$_REQUEST['gen']:0;
        $nat =  isset($_REQUEST['nat'])?$_REQUEST['nat']:0;
        $ms  =  isset($_REQUEST['ms'])?$_REQUEST['ms']:0;
        $rel =  isset($_REQUEST['rel'])?$_REQUEST['rel']:0;
        $bg  =  isset($_REQUEST['bg'])?$_REQUEST['bg']:0;
        $dept =  isset($_REQUEST['dept'])?$_REQUEST['dept']:0;
        $desg =  isset($_REQUEST['desg'])?$_REQUEST['desg']:0;
        $shift =  isset($_REQUEST['shift'])?$_REQUEST['shift']:0;
        $sts1  =  isset($_REQUEST['permission'])?$_REQUEST['permission']:0;
        $country  =  isset($_REQUEST['country'])?$_REQUEST['country']:0;

        $hourlyrate =  isset($_REQUEST['hrate'])?$_REQUEST['hrate']:0;
        $password = encode5t(isset($_REQUEST['password'])?$_REQUEST['password']:0);
        $email =  encode5t(isset($_REQUEST['email'])?strtolower($_REQUEST['email']):0);
        $cont = isset($_REQUEST['contact'])? encode5t($_REQUEST['contact']):0;
        $entitledleave  =  isset($_REQUEST['eleave'])?$_REQUEST['eleave']:0;
        $restrictfence  =  isset($_REQUEST['restrictfence'])?$_REQUEST['restrictfence']:0;

                  if($email!=''){
             $sql = "Select Id from UserMaster where Username = '$email'";
             $query = $this->db->query($sql);
           $query->num_rows();
          if($query->num_rows() > 0 )
        {
            $check=false;
            echo 1;
            return;
          }
          }
          if($cont!='')
        {
              $sql = "Select Id from EmployeeMaster where (PersonalNo = '$cont' AND Is_Delete != 2)  ";
            $query = $this->db->query($sql);
            $query->num_rows();
            if($query->num_rows() > 0 )
          {
              $check=false;
              echo 2;
              return;
          }
            
          }
        if($ecode!='' && $ecode!='0')
        {
             $sql = "Select * from EmployeeMaster where EmployeeCode = ? and OrganizationId=? and Is_Delete != 2";
           $query = $this->db->query($sql,array($ecode,$orgid));
           $query->num_rows();
          if($query->num_rows() > 0 )
            {
            $check=false;
            echo 3;
            return;
            }
          
        }
        
    }

}
?>