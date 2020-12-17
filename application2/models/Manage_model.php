<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Manage_model extends CI_Model {
   
       ///insert department name in db////
       public function createdpt() {
           
           $dna = isset($_REQUEST['deptnm']) ? $_REQUEST['deptnm'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM DepartmentMaster WHERE name='$dna' ");
   
   if($dup->num_rows()>0){
       
       }else{
       $q = $this->db->query("INSERT INTO DepartmentMaster(Name,OrganizationId) VALUES ('$dna','$orgid')");
              
           return $q;
           
       }
       }
     
    public function registerShift()
    {

        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];
        $sna = isset($_REQUEST['sna']) ? $_REQUEST['sna'] : '';
        $thours = isset($_REQUEST['thours']) ? $_REQUEST['thours'] : '';
        $autotimeout_sts = isset($_REQUEST['autotimeout_sts']) ? $_REQUEST['autotimeout_sts'] : '';
        $timeInfs = isset($_REQUEST['timeInfs']) ? $_REQUEST['timeInfs'] : '';

        $res = 0;
        $query = $this
            ->db
            ->query("select Id from `ShiftMaster` where Name=? and OrganizationId=?  ", array(
            $sna,
            $orgid
        ));
        if ($query->num_rows() > 0) $res = 2; // Shift Name already exist
        else
        {
            $ti = date("H:i:s", strtotime(isset($_REQUEST['ti']) ? $_REQUEST['ti'] : ''));
            $to = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ''));
            $tib = date("H:i:s", strtotime(isset($_REQUEST['tib']) ? $_REQUEST['tib'] : ''));
            $tob = date("H:i:s", strtotime(isset($_REQUEST['tob']) ? $_REQUEST['tob'] : ''));
            $tig = date("H:i:s", strtotime(isset($_REQUEST['tig']) ? $_REQUEST['tig'] : ''));
            $gto = date("H:i:s", strtotime(isset($_REQUEST['gto']) ? $_REQUEST['gto'] : ''));
            // $tog=date("H:i:s",strtotime(isset($_REQUEST['tog'])?$_REQUEST['tog']:''));
            $bog = date("H:i:s", strtotime(isset($_REQUEST['bog']) ? $_REQUEST['bog'] : ''));
            $big = date("H:i:s", strtotime(isset($_REQUEST['big']) ? $_REQUEST['big'] : ''));
            $sts = isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 1;
            $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
            $date = date('Y-m-d');

            // echo $shifttype;
            // die();
            if ($shifttype == 3)
            {
                $ti = "";
                $to = "";
                $tib = "";
                $tob = "";
                $tig = "";
                $gto = "";
            }

            if ($shifttype == 1)
            {
                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`,`TimeOutGrace`,`TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`,`CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`,`BreakOutGrace`, `archive`,shifttype,AutoTimeoutHours,AutoTimeoutLoggedHoursStatus,HoursPerDay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($sna,$ti,$to,$tig,$gto,$tib,$tob,$orgid,$date,$id,$date,$id,$id,$big,$bog,$sts,$shifttype,$thours,$autotimeout_sts,$timeInfs));
            }
            else
            {
                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`,`TimeOutGrace`,`TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`,`CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`,`BreakOutGrace`, `archive`,shifttype,AutoTimeoutHours,AutoTimeoutLoggedHoursStatus,HoursPerDay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
                    $sna,
                    $ti,
                    $to,
                    $tig,
                    $gto,
                    $tib,
                    $tob,
                    $orgid,
                    $date,
                    $id,
                    $date,
                    $id,
                    $id,
                    $big,
                    $bog,
                    $sts,
                    $shifttype,
                    $thours,
                    $autotimeout_sts,
                    $timeInfs
                ));
            }
            //$res= $this->db->affected_rows($query);
            $lsid = $this
                ->db
                ->insert_id();
            // var_dump($this->db->last_query());
            //insert weekoff in this shift
            if ($this
                ->db
                ->affected_rows($query) > 0)
            {
                $sun = isset($_REQUEST['sun']) ? $_REQUEST['sun'] : '0,0,0,0,0';
                $mon = isset($_REQUEST['mon']) ? $_REQUEST['mon'] : '0,0,0,0,0';
                $tue = isset($_REQUEST['tue']) ? $_REQUEST['tue'] : '0,0,0,0,0';
                $wed = isset($_REQUEST['wed']) ? $_REQUEST['wed'] : '0,0,0,0,0';
                $thus = isset($_REQUEST['thus']) ? $_REQUEST['thus'] : '0,0,0,0,0';
                $fri = isset($_REQUEST['fri']) ? $_REQUEST['fri'] : '0,0,0,0,0';
                $sat = isset($_REQUEST['sat']) ? $_REQUEST['sat'] : '0,0,0,0,0';

                $user = 0;
                $orgId = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : $_REQUEST['refId'];
                // ref id if fun called by mobile when not set session
                $zname = 'Asia/Kolkata';
                /////////////get time zone
                $zname = getTimeZone($orgId);
                date_default_timezone_set($zname);
                //////////////get time zone///////////
                $today = date('Y-m-d');

                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,1,?,?,?,?,'1')", array(
                    $sun,
                    $orgId,
                    $user,
                    $today
                ));

                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,2,?,?,?,?,'1')", array(
                    $mon,
                    $orgId,
                    $user,
                    $today
                ));

                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,3,?,?,?,?,'1')", array(
                    $tue,
                    $orgId,
                    $user,
                    $today
                ));

                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,4,?,?,?,?,'1')", array(
                    $wed,
                    $orgId,
                    $user,
                    $today
                ));
                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,5,?,?,?,?,'1')", array(
                    $thus,
                    $orgId,
                    $user,
                    $today
                ));
                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,6,?,?,?,?,'1')", array(
                    $fri,
                    $orgId,
                    $user,
                    $today
                ));
                $query = $this
                    ->db
                    ->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,7,?,?,?,?,'1')", array(
                    $sat,
                    $orgId,
                    $user,
                    $today
                ));

                $res = $this
                    ->db
                    ->affected_rows($query);

                if ($res > 0)
                {
                    $query12112 = $this
                        ->db
                        ->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE Name = '$sna' ");
                    if ($r = $query12112->result())
                    {
                        $sname = $r[0]->Name;

                        $date = date("y-m-d H:i:s");
                        $orgid = $_SESSION['orgid'];
                        $id = $_SESSION['id'];

                        $module = "Settings";
                        $actionperformed = " <b>" . $sname . "</b> shift has been <b>added</b>";
                        $activityby = 1;

                        $query = $this
                            ->db
                            ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
                            $date,
                            $id,
                            $module,
                            $actionperformed,
                            $orgid,
                            $activityby,
                            $id
                        ));

                    }
                }

            }
        }
        $this
            ->db
            ->close();
        echo $res;
    }

    public function getshiftdata($sid)
    {
        $res = array();
        $orgid = $_SESSION['orgid'];
        $query = $this
            ->db
            ->query("Select * from ShiftMaster where Id = '$sid' AND OrganizationId = '$orgid' ");
        foreach ($query->result() as $row)
        {
            $data = array();
            $data['sti'] = $row->TimeIn;
            $data['sto'] = $row->TimeOut;
            $data['bsti'] = $row->TimeInBreak;
            $data['bsto'] = $row->TimeOutBreak;
            if ($row->TimeInGrace == '00:00:00')
            {
                $data['tig'] = '-:-';
            }
            else
            {
                $data['tig'] = date('h:i A', strtotime($row->TimeInGrace));
            }
            if ($row->TimeOutGrace == '00:00:00')
            {
                $data['tog'] = '-:-';
            }
            else
            {
                $data['tog'] = date('h:i A', strtotime($row->TimeOutGrace));
            }
            $data['status'] = $row->archive;
            $data['stype'] = $row->shifttype;
            $data['sname'] = $row->Name;
            $data['HoursPerDay'] = $row->HoursPerDay;
            $res[] = $data;
            break;
        }
        return $res;
    }

    public function getAllShift($postData = Null)
    {
        $orgid = $_SESSION['orgid'];

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // 
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
		
		$searchQuery = "";
				 	
		         if($searchValue != ''){
		            $searchQuery = "  And (S.Name like '%".$searchValue."%') ";
					
		         }
				 
				 $query = $this->db->query("SELECT COUNT(S.Id) as allcount FROM `ShiftMaster` S where `OrganizationId`='$orgid'")->result();
		         $totalRecords = $query[0]->allcount;
				 
				 if($searchQuery != '')
		         $query = $this->db->query("SELECT COUNT(S.Id) as allcount FROM `ShiftMaster` S where`OrganizationId`='$orgid' $searchQuery")->result();
		         $totalRecordwithFilter = $query[0]->allcount; 
		        // var_dump($totalRecordwithFilter);
				// die()
		
		
        $query = $this->db->query("SELECT  HoursPerDay,`Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `BreakInGrace`, `BreakOutGrace`,`archive`,TIMEDIFF(`TimeOut`,`TimeIn`) AS shifthpurs, TIMEDIFF(TIMEDIFF(`TimeOut`,`TimeIn`),TIMEDIFF(`TimeOutBreak`,`TimeInBreak`)) AS workhours,TIMEDIFF(`TimeOutBreak`,`TimeInBreak`) as breakhours,shifttype FROM ShiftMaster S WHERE OrganizationId=$orgid $searchQuery order by TimeIn $columnSortOrder,S.Name ASC Limit $start,$rowperpage");
        $d = array();
        $res = array();
        foreach ($query->result() as $row)
        {
            $data = array();

            if ($row->shifttype == 3)
            {
                $data['name'] = $row->Name;
                $data['timein'] = '-';
                $data['timeout'] = '-';
                $data['timeingrace'] = '-';
                $data['timeoutgrace'] = '-';
                $data['timeinbreak'] = '-';
                $data['timeoutbreak'] = '-';
            }
            else
            {
                $data['name'] = $row->Name;
                $data['timein'] = substr($row->TimeIn, 0, 5);
                $data['timeout'] = substr($row->TimeOut, 0, 5);
                $data['timeingrace'] = substr($row->TimeInGrace, 0, 5);
                $data['timeoutgrace'] = substr($row->TimeOutGrace, 0, 5);
                $data['timeinbreak'] = substr($row->TimeInBreak, 0, 5);
                $data['timeoutbreak'] = substr($row->TimeOutBreak, 0, 5);
            }

            if ($row->shifttype == 1)
            {
                if (strtotime($row->TimeIn) < strtotime($row->TimeOut))
                {
                    $a = new DateTime($row->TimeIn);
                    $b = new DateTime($row->TimeOut);
                    $interval1 = $a->diff($b);
                    $data['shifthpurs'] = $interval1->format("%H:%I");
                    $a = new DateTime($interval1->format("%H:%I"));
                    $b = new DateTime(getShiftBreak($row->Id));
                    $interval = $a->diff($b);
                    $data['workhours'] = $interval->format("%H:%I");
                  
                    
                }
                else
                {
                    $time = "24:00:00";
                    $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                    $data['shifthpurs'] = date("H:i", strtotime($time) - $secs);
                    $a = new DateTime($data['shifthpurs']);
                    $b = new DateTime(getShiftBreak($row->Id));
                    $interval = $b->diff($a);
                    $data['workhours'] = $interval->format("%H:%I");
                }
               
                
            }
            elseif ($row->shifttype == 3)
            {
                //var_dump($row->HoursPerDay);
                $data['shifthpurs'] = date("H:i", strtotime($row->HoursPerDay));
                $data['workhours'] = date("H:i", strtotime($row->HoursPerDay));

            }
            else
            {
                $time = "24:00:00";
                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                $data['shifthpurs'] = date("H:i", strtotime($time) - $secs);
                $a = new DateTime($data['shifthpurs']);
                $b = new DateTime(getShiftBreak($row->Id));
                $interval = $b->diff($a);
                $data['workhours'] = $interval->format("%H:%I");
            }
            $data['shifttype'] = $row->shifttype == 1 ? '<div style="background-color:#27AE60;text-align:center; width: 90px; color:white;border-radius:100px;">Single Date</div>' : '<div style="background-color:#d8700d;text-align:center; width: 90px; color:white;border-radius:100px;">
   		Multi Date</div>';

            if ($row->shifttype == 3)
            {
                $data['shifttype'] = '<div style="background-color:#a523ac; width: 90px;text-align:center;color:white;border-radius:100px;">Flexi</div>';
            }
           
            $data['status'] = $row->archive == 1 ? '<div style="background-color:#27AE60;text-align:center;color:white;border-radius:100px; width:80px;">Active</div>' : '<div style="background-color:#de1d1d;text-align:center;color:white;border-radius:100px; width:80px;">
   		Inactive</div>';

            if ($row->Name == 'Trial Shift')
            {

                $data['action'] = ' <div class="dropdown">
                                 
        <!-- three dots -->
        <ul data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <span class="caret"></span>
                                 
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0.0rem 0rem 0.5rem 0rem;margin-left:-25%">

        <li class="" style="height:30px;" >

   
   
         <li class="" style="height:30px;" >
         <i class="test editShift" style="font-size:16px; margin:0px 8px 0px 6px;font-family:poppins; font-weight: 600;"  data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Edit"><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:18px; font-weight: 500; color:#212529;">&nbsp&nbsp Edit</i>
   
          <li class="deleteShift" style="height:30px;" data-toggle="modal" data-target="#delShift"  
             data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"><img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:18px;"> data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"  title="Delete Client"></img> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>
   
           

            <li class="upDept style="height:30px;" data-toggle="modal" data-target="#assign" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')"  
             data-did="' . $row->Id . '" data-name="' . $row->Name . '" title="Assign"><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:18px;"><a href="#" style="color:black; font-size:14px; margin-left:5px;">Assign</a></li> 
             </ul>
             </div> '; 
            }
            elseif ($row->archive == 0)
            {

                $data['action'] = ' <div class="dropdown">
                                 
           <!-- three dots -->
           <ul data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
               <li></li>
               <li></li>
               <li></li>
           </ul>
           <span class="caret"></span>
         
         <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0rem 0rem 0rem 0rem; margin-left:-25%">

         <li class="test editShift hover" style="height:30px;" data-toggle="modal" data-target="#viewshift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="update"><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:18px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:8px;">&nbspEdit</a></li>

         <li class="deleteShift hover" style="height:30px;" data-toggle="modal" data-target="#delShift"  
         data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"><img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:18px;"  data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"  title="Delete Client"></img> <a href="#" style="font-weight: 500; color:black; font-size:13px; margin-left:8px;">Delete</a></li>
   
         <li class="upDept hover" style="height:30px;" data-toggle="modal" data-target="#assign"onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" 
         data-did="' . $row->Id . '" data-name="' . $row->Name . '"><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:18px;" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" data-did="' . $row->Id . '" data-name="' . $row->Name . '"title="Assign"></img> <a href="#" style="color:black; font-size:13px;font-weight: 500; margin-left:8px; ">Assign</a></li>
        </ul>
        </div> ';
            }
            else
            {

                $data['action'] = ' <div class="dropdown">
                       
         <!-- three dots -->
         <ul data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem; line-height: 0.4rem;padding-top: 0.6rem; color:#808080;">
             <li></li>
             <li></li>
             <li></li>
         </ul>
         <span class="caret"></span>
       
       <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.85rem; border-radius:5px; padding: 0rem 0rem 0rem 0rem; margin-left:-10%">
       
      <li class="test editShift hover" style="height:30px;" data-toggle="modal" data-target="#viewshift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="update"><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:18px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:8px;">Edit</a></li>
        
        <li class="deleteShift hover" style="height:30px; margin-top:2px;" data-toggle="modal" data-target="#delShift"  
             data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"><img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:18px;"  data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"  title="Delete Client"></img> <a href="#" style="font-weight: 500; color:black; font-size:13px; margin-left:8px;">Delete</a></li>
   
        <li class="upDept hover" style="height:30px;" data-toggle="modal" data-target="#assign"onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" 
          data-did="' . $row->Id . '" data-name="' . $row->Name . '"><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:18px;" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" data-did="' . $row->Id . '" data-name="' . $row->Name . '"title="Assign"></img> <a href="#" style="color:black; font-size:13px;font-weight: 500; margin-left:8px; ">Assign</a></li>
          </ul>
          </div> ';
            }
            $res[] = $data;
        }
        $d['data'] = $res;
		//return $d;
        $this->db->close();
	    $response = array(
        "draw" => intval($draw) ,
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $res
        );
        //echo json_encode($d);
        return $response;
    }

    // Delete function
    //
    //
    public function delshiftsss()
    {
        $orgid = $_SESSION['orgid'];
        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
        $data = array();
        $data['afft'] = 0;
        $query12112 = $this
            ->db
            ->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE  Id = '$sid' ");
        $query = $this
            ->db
            ->query("select id as totattn from AttendanceMaster where AttendanceMaster.shiftid=? and OrganizationId=?", array(
            $sid,
            $orgid
        ));
        $data['attn'] = $query->num_rows();

        $query = $this
            ->db
            ->query("select id as totemp from EmployeeMaster where EmployeeMaster.shift=? and OrganizationId=? and Is_Delete != 2", array(
            $sid,
            $orgid
        ));
        $data['emp'] = $query->num_rows();

        $query = $this
            ->db
            ->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.ShiftId=? and OrganizationId=?", array(
            $sid,
            $orgid
        ));
        $data['arc'] = $query->num_rows();

        $query = $this
            ->db
            ->query("select Id as totspid from ShiftPlanner where ShiftPlanner.shiftid=? and ShiftPlanner.orgid=?", array(
            $sid,
            $orgid
        ));
        $data['shiftp'] = $query->num_rows();

        if ($data['attn'] == 0 and $data['emp'] == 0 and $data['arc'] == 0 and $data['shiftp'] == 0)
        {
            $query = $this
                ->db
                ->query("DELETE FROM `ShiftMaster` where id=? and OrganizationId=?", array(
                $sid,
                $orgid
            ));
            $data['afft'] = $this
                ->db
                ->affected_rows();
            if ($data['afft'] > 0)
            {
                $query = $this
                    ->db
                    ->query("DELETE FROM `ShiftMasterChild` where ShiftId=? and OrganizationId=?", array(
                    $sid,
                    $orgid
                ));

                /* $count1 = $this->db->affected_rows();*/
            }
        }
        // $this->db->close();
        echo json_encode($data);

        if ($data['afft'] > 0)
        {

            if ($r = $query12112->result())
            {
                $sname = $r[0]->Name;
                $date = date("y-m-d H:i:s");
                $orgid = $_SESSION['orgid'];
                $id = $_SESSION['id'];

                $module = "Settings";
                $actionperformed = " <b>" . $sname . "</b> shift has been <b> Deleted.  </b>.";
                $activityby = 1;

                $query = $this
                    ->db
                    ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
                    $date,
                    $id,
                    $module,
                    $actionperformed,
                    $orgid,
                    $activityby,
                    $id
                ));

            }
        }

    }

    public function getEditShift($sid)
    {
        //echo "$sid";
        $orgid = $_SESSION['orgid'];
        $query = $this
            ->db
            ->query("SELECT  HoursPerDay,`Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `BreakInGrace`, `BreakOutGrace`,`archive`,TIMEDIFF(`TimeOut`,`TimeIn`) AS shifthpurs, TIMEDIFF(TIMEDIFF(`TimeOut`,`TimeIn`),TIMEDIFF(`TimeOutBreak`,`TimeInBreak`)) AS workhours,TIMEDIFF(`TimeOutBreak`,`TimeInBreak`) as breakhours,shifttype,archive FROM `ShiftMaster` WHERE OrganizationId=? AND Id=$sid  order by TimeIn", array(
            $orgid
        ));

        $d = array();
        $res = array();
        foreach ($query->result() as $row)
        {
            $data = array();
            // echo $row->Id;
            if ($row->shifttype == 3)
            {
                $data['name'] = $row->Name;
                $data['sid'] = $row->Id;
                $data['timein'] = '-';
                $data['timeout'] = '-';
                $data['timeingrace'] = '-';
                $data['timeoutgrace'] = '-';
                $data['timeinbreak'] = '-';
                $data['timeoutbreak'] = '-';
                $data['archive'] = '-';
            }
            else
            {
                $data['sid'] = $row->Id;
                $data['name'] = $row->Name;
                $data['timein'] = substr($row->TimeIn, 0, 5);
                $data['timeout'] = substr($row->TimeOut, 0, 5);
                $data['timeingrace'] = substr($row->TimeInGrace, 0, 5);
                $data['archive'] = $row->archive;
                $data['timeoutgrace'] = substr($row->TimeOutGrace, 0, 5);
                $data['timeinbreak'] = substr($row->TimeInBreak, 0, 5);
                $data['timeoutbreak'] = substr($row->TimeOutBreak, 0, 5);
            }

            if ($row->shifttype == 1)
            {
                if (strtotime($row->TimeIn) < strtotime($row->TimeOut))
                {
                    $a = new DateTime($row->TimeIn);
                    $b = new DateTime($row->TimeOut);
                    $interval1 = $a->diff($b);
                    $data['shifthpurs'] = $interval1->format("%H:%I");
                    $a = new DateTime($interval1->format("%H:%I"));
                    $b = new DateTime(getShiftBreak($row->Id));
                    $interval = $a->diff($b);
                    $data['workhours'] = $interval->format("%H:%I");
                    //$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
                    //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
                    
                }
                else
                {
                    $time = "24:00:00";
                    $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                    $data['shifthpurs'] = date("H:i", strtotime($time) - $secs);
                    $a = new DateTime($data['shifthpurs']);
                    $b = new DateTime(getShiftBreak($row->Id));
                    $interval = $b->diff($a);
                    $data['workhours'] = $interval->format("%H:%I");
                }
                //$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
                //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
                
            }
            elseif ($row->shifttype == 3)
            {
                //var_dump($row->HoursPerDay);
                $data['shifthpurs'] = date("H:i", strtotime($row->HoursPerDay));
                $data['workhours'] = date("H:i", strtotime($row->HoursPerDay));

            }
            else
            {
                /*$timearr=array();
                $timearr=explode(':',substr(substr($row->shifthpurs,1),0,5));
                $data['shifthpurs']=(23-$timearr[0]) .':'. (60-$timearr[1]);
                $time = $data['shifthpurs'];
                $time2 = $row->breakhours;
                $secs = strtotime("00:00:00")-strtotime($time2);
                $result = date("H:i:s",strtotime($time)+$secs);
                $data['workhours']=substr(trim($result,'-'),0,5);*/
                $time = "24:00:00";
                $secs = strtotime($row->TimeIn) - strtotime($row->TimeOut);
                $data['shifthpurs'] = date("H:i", strtotime($time) - $secs);
                $a = new DateTime($data['shifthpurs']);
                $b = new DateTime(getShiftBreak($row->Id));
                $interval = $b->diff($a);
                $data['workhours'] = $interval->format("%H:%I");
            }
            //substr(trim($row->Overtime,"-!"),0,5);
            $data['shifttype'] = $row->shifttype;

            //substr(trim($row->Overtime,"-!"),0,5);
            $data['status'] = $row->archive == 1 ? '<div style="background-color:green;text-align:center;color:white;">Active</div>' : '<div style="background-color:red;text-align:center;color:white;">
          Inactive</div>';
            //  var_dump( $data['status']);
            // die;
            $data['action'] = '<a href="#"><i class="material-icons editShift" style="font-size:26px" data-toggle="modal" title="Edit/View" data-sid="' . $row->Id . '"
           data-sid="' . $row->Id . '" 
           data-name="' . $row->Name . '" 
           data-ti="' . date("g:i A", strtotime($row->TimeIn)) . '" 
           data-to="' . date("g:i A", strtotime($row->TimeOut)) . '" 
           data-tig="' . date("g:i A", strtotime($row->TimeInGrace)) . '"
           data-tog="' . date("g:i A", strtotime($row->TimeOutGrace)) . '"
           data-tib="' . date("g:i A", strtotime($row->TimeInBreak)) . '"
           data-tob="' . date("g:i A", strtotime($row->TimeOutBreak)) . '"
           data-big="' . date("g:i A", strtotime($row->BreakInGrace)) . '"
           data-bog="' . date("g:i A", strtotime($row->BreakOutGrace)) . '"
           data-sts="' . $row->archive . '"
          data-target="#addShiftE">edit</i></a>
          <i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Delete" ></i>
          ';

            $data['action'] = '<div class="dropdown">
                                  
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
            if ($row->Name == 'Trial Shift')
            {
                $data['action'] = '<a href = "#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="upShift" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" 
          data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Assign" ></i>';
            }
            elseif ($row->archive == 0)
            {
                $data['action'] = '<i class="udateShift " style="font-size:14px; margin:0px 8px 0px 6px;font-weight:500; " data-toggle="modal" data-target="#updateShift" data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Update" ></i> 
              
              <i class="deleteShift fa fa-trash" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#delShift" data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Update" ></i>
              
              <i class="upShift " style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift1" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" 
              data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Assign" ></i>';
            }
            else
            {
                $data['action'] = '<i class="test  udateShift " style="font-size:16px; margin:0px 8px 0px 6px;font-family:poppins;"  data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Edit" ></i>
        
           <i class="deleteShift fa fa-trash" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#delShift" data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Update" ></i>
     
           
           
          <i class="upShift " style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" 
          data-sid="' . $row->Id . '" data-sname="' . $row->Name . '" title="Assign" ></i>';

            }
            $res[] = $data;
        }
        $d['data'] = $res;
        $this
            ->db
            ->close();
        // echo json_encode($d);
        return $d;
    }

    public function fetchWeeklyOff($sid)
    {

        $shiftid = $sid;
        // var_dump($shiftid);
        

        $orgId = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
        $data = array();
        $res = array();
        $query = $this
            ->db
            ->query("select * from ShiftMasterChild WHERE `OrganizationId`=$orgId  AND ShiftId = $shiftid");

        if ($this
            ->db
            ->affected_rows() > 0) foreach ($query->result() as $row)
        {
            $data['week'] = $row->WeekOff;
            $data['day'] = $row->Day;
            $res[] = $data;
        }

        // else
        // {
        // $query = $this->db->query("select * from WeekOffMaster WHERE `OrganizationId`=?",array($orgId));
        // foreach ($query->result() as $row)
        // {
        // $data['week']=$row->WeekOff;
        // $data['day']=$row->Day ;
        // $res[]=$data;
        // }
        // }
        $d['data'] = $res;
        $this
            ->db
            ->close(); //$query->result();
        //echo json_encode($d);
        return $d;
        /* $weekday=explode (",",$data['week']);
        for($i=0;$i<count($weekday);$i++)
        {
        if($weekday[$i]==0){
        //echo "Sun ";
        }
        else if($weekday[$i]==1){
        //echo "Mon ";
        }
        } */
    }

    public function editShift()
    {
        $orgid = $_SESSION['orgid'];
        $id = $_SESSION['id'];
        $sna = isset($_REQUEST['sna']) ? $_REQUEST['sna'] : '';
        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
        $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
        $sts = isset($_REQUEST['sts']) ? $_REQUEST['sts'] : '';
        // echo "hello".$sts;
        // exit;
        $timeInfs = isset($_REQUEST['timeInfs']) ? $_REQUEST['timeInfs'] : '';
        $date = date('Y-m-d');
        $res = 0;

        $query = $this
            ->db
            ->query("select Id from `ShiftMaster` where Name=? and OrganizationId=? and Id !=? ", array(
            $sna,
            $orgid,
            $sid
        ));

        if ($query->num_rows() > 0)
        {
            $res = 2; // Shift Name already exist
            
        }

        // $query = $this->db->query("select Id from `AttendanceMaster` where OrganizationId=? and ShiftId=? ",array($orgid,$sid));
        // if($query->num_rows()>0)
        // {
        // $res= 3; // Shift  already exist in AttendanceMaster
        // }
        else
        {
            $ti = date("H:i:s", strtotime(isset($_REQUEST['ti']) ? $_REQUEST['ti'] : ''));
            $to = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ''));
            $tib = date("H:i:s", strtotime(isset($_REQUEST['tib']) ? $_REQUEST['tib'] : ''));
            $tob = date("H:i:s", strtotime(isset($_REQUEST['tob']) ? $_REQUEST['tob'] : ''));

            // var_dump($tob);
            // die;
            $tig = date("H:i:s", strtotime(isset($_REQUEST['tig']) ? $_REQUEST['tig'] : ''));
            $tog = date("H:i:s", strtotime(isset($_REQUEST['tog']) ? $_REQUEST['tog'] : ''));
            $tigr = date("H:i:s", strtotime(isset($_REQUEST['tigr']) ? $_REQUEST['tigr'] : ''));
            $togr = date("H:i:s", strtotime(isset($_REQUEST['togr']) ? $_REQUEST['togr'] : ''));

            if ($shifttype == 3)
            {
                $ti = "";
                $to = "";
                $tib = "";
                $tob = "";
                $tig = "";
                $tog = "";
            }

            $query = $this
                ->db
                ->query("UPDATE `ShiftMaster` SET `Name`=?,`LastModifiedDate`=?, `LastModifiedById`=?,`TimeInGrace`=?,`TimeOutGrace`=?,  `archive`=?, `TimeIn`=?, `TimeOut`=?,`TimeInBreak`=?, `TimeOutBreak`=?,shifttype=?,HoursPerDay=? where id=? and OrganizationId=?", array(
                $sna,
                $date,
                $id,
                $tigr,
                $togr,
                $sts,
                $ti,
                $to,
                $tib,
                $tob,
                $shifttype,
                $timeInfs,
                $sid,
                $orgid
            ));

            // var_dump($this->db->last_query());
            // die;
            $res1 = $this
                ->db
                ->affected_rows($query);

            if ($res1 > 0)
            {
                //echo "aaaaaa";exit;
                $query12112 = $this
                    ->db
                    ->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE Name = '$sna' ");
                if ($r = $query12112->result())
                {
                    $sname = $r[0]->Name;

                    $date = date("y-m-d H:i:s");
                    $orgid = $_SESSION['orgid'];
                    $id = $_SESSION['id'];

                    $module = "Settings";
                    $actionperformed = " <b>" . $sname . "</b> shift has been <b>updated</b>";
                    $activityby = 1;

                    $query = $this
                        ->db
                        ->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)", array(
                        $date,
                        $id,
                        $module,
                        $actionperformed,
                        $orgid,
                        $activityby,
                        $id
                    ));

                }
                $res = 1;
                $sun = isset($_REQUEST['sun']) ? $_REQUEST['sun'] : '0,0,0,0,0';
                $mon = isset($_REQUEST['mon']) ? $_REQUEST['mon'] : '0,0,0,0,0';
                $tue = isset($_REQUEST['tue']) ? $_REQUEST['tue'] : '0,0,0,0,0';
                $wed = isset($_REQUEST['wed']) ? $_REQUEST['wed'] : '0,0,0,0,0';
                $thus = isset($_REQUEST['thus']) ? $_REQUEST['thus'] : '0,0,0,0,0';
                $fri = isset($_REQUEST['fri']) ? $_REQUEST['fri'] : '0,0,0,0,0';
                $sat = isset($_REQUEST['sat']) ? $_REQUEST['sat'] : '0,0,0,0,0';

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=1", array(
                    $sun
                ));
                $res2 = $this
                    ->db
                    ->affected_rows($query);

                if ($res2 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=2", array(
                    $mon
                ));
                $res3 = $this
                    ->db
                    ->affected_rows($query);
                if ($res3 > 0)
                {

                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=3", array(
                    $tue
                ));
                $res4 = $this
                    ->db
                    ->affected_rows($query);
                if ($res4 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=4", array(
                    $wed
                ));
                $res5 = $this
                    ->db
                    ->affected_rows($query);
                if ($res5 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=5", array(
                    $thus
                ));
                $res6 = $this
                    ->db
                    ->affected_rows($query);
                if ($res6 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=6", array(
                    $fri
                ));
                $res7 = $this
                    ->db
                    ->affected_rows($query);
                if ($res7 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=7", array(
                    $sat
                ));
                $res8 = $this
                    ->db
                    ->affected_rows($query);
                if ($res8 > 0)
                {

                    $res = 1;
                }
            }
            else
            {
                $sun = isset($_REQUEST['sun']) ? $_REQUEST['sun'] : '0,0,0,0,0';
                $mon = isset($_REQUEST['mon']) ? $_REQUEST['mon'] : '0,0,0,0,0';
                $tue = isset($_REQUEST['tue']) ? $_REQUEST['tue'] : '0,0,0,0,0';
                $wed = isset($_REQUEST['wed']) ? $_REQUEST['wed'] : '0,0,0,0,0';
                $thus = isset($_REQUEST['thus']) ? $_REQUEST['thus'] : '0,0,0,0,0';
                $fri = isset($_REQUEST['fri']) ? $_REQUEST['fri'] : '0,0,0,0,0';
                $sat = isset($_REQUEST['sat']) ? $_REQUEST['sat'] : '0,0,0,0,0';

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=1", array(
                    $sun
                ));
                $res2 = $this
                    ->db
                    ->affected_rows($query);

                if ($res2 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=2", array(
                    $mon
                ));
                $res3 = $this
                    ->db
                    ->affected_rows($query);
                if ($res3 > 0)
                {

                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=3", array(
                    $tue
                ));
                $res4 = $this
                    ->db
                    ->affected_rows($query);
                if ($res4 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=4", array(
                    $wed
                ));
                $res5 = $this
                    ->db
                    ->affected_rows($query);
                if ($res5 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=5", array(
                    $thus
                ));
                $res6 = $this
                    ->db
                    ->affected_rows($query);
                if ($res6 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=6", array(
                    $fri
                ));
                $res7 = $this
                    ->db
                    ->affected_rows($query);
                if ($res7 > 0)
                {
                    $res = 1;
                }

                $query = $this
                    ->db
                    ->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=7", array(
                    $sat
                ));
                $res8 = $this
                    ->db
                    ->affected_rows($query);
                if ($res8 > 0)
                {

                    $res = 1;
                }

            }

        }
        $this
            ->db
            ->close();
        echo $res;

    }
    public function getemployebyshift()
    {
        $result = array();

        $data = array();
        $orgid = $_SESSION['orgid'];
        $shiftid = isset($_REQUEST['shiftid']) ? $_REQUEST['shiftid'] : '';

        $sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and Shift!=? and archive=1 and Is_Delete=0 order by FirstName";

        $query = $this
            ->db
            ->query($sql, array(
            $orgid,
            $shiftid
        ));

        foreach ($query->result() as $row)
        {
            $res = array();
            $res['id'] = $row->Id;
            $res['name'] = $row->EmployeeCode . " - " . ucwords(strtolower($row->FirstName . " " . $row->LastName));
            $res['empfname'] = $row->FirstName;
            $res['emplname'] = $row->LastName;

            $res['sts'] = 0;
            $data[] = $res;
        }
        $result["data"] = $data;
        return $result;
    }

    public function SaveEmpshiftList()
    {
        $result = array();
        $data = array();
        $orgid = $_SESSION['orgid'];
        $shifttid = isset($_REQUEST['shifttid']) ? $_REQUEST['shifttid'] : '';

        $emplistarr = json_decode($_POST['emplist'], true);

        for ($i = 0;$i < count($emplistarr);$i++)
        {
            if ($emplistarr[$i]['sts'] == 1)
            {
               print_r($emplistarr);
                $empid = $emplistarr[$i]['id'];
                $sql = "update EmployeeMaster set shift=? where OrganizationId =? and Id=?";

                $query = $this
                    ->db
                    ->query($sql, array(
                    $shifttid,
                    $orgid,
                    $empid
                ));
                $count = $query->rowCount();

            }
        }

        $result["data"] = $data;
        return $result;
    }
       public function createdsg() {
          $dna = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM DesignationMaster WHERE name='$dna' ");
   
   if($dup->num_rows()>0){
       
           return false;
       }else{
           $q = $this->db->query("INSERT INTO DesignationMaster(Name,OrganizationId) VALUES ('$dna','$orgid')");
   
           return $q;
   
       }
       }
       
       public function createholiday() {
          $name = isset($_REQUEST['name1']) ? $_REQUEST['name1'] : '';
        
          $fromx = isset($_REQUEST['from']) ? $_REQUEST['from'] : '';
          $tox = isset($_REQUEST['to']) ? $_REQUEST['to'] : '';
          $to= date("Y-m-d", strtotime($tox));
          $from= date("Y-m-d", strtotime($fromx));
          
   
   
         
          $desc = isset($_REQUEST['desc']) ? $_REQUEST['desc'] : '';
           $orgid = $_SESSION['orgid'];
   
   $dup=$this->db->query("SELECT * FROM HolidayMaster WHERE name='$name'");
   
   
   if($dup->num_rows()>0){
       
           return false;
       }else{
           $q = $this->db->query("INSERT INTO `HolidayMaster`(`Name`, `Description`, `DateFrom`, `DateTo`,`OrganizationId`) VALUES ('$name','$desc','$from','$to','$orgid')");
   
            
          
   
           return $q;
       }
       }
       
       public function createhourlyrate() {
          $dna = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : '';
           $orgid = $_SESSION['orgid'];
   $dup=$this->db->query("SELECT * FROM HourlyRateMaster WHERE name='$dna' ");
   
   if($dup->num_rows()>0){
       
           return false;
       }else{
           $q = $this->db->query("INSERT INTO HourlyRateMaster(Name,OrganizationId) VALUES ('$dna','$orgid')");
        
           return $q;
       }
       }
       
           
   
            public function getAllDept($postData = null) {
           $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
           $orgid = $_SESSION['orgid'];
   
   
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // 
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
   
       $searchQuery = "";
   	 	
           if($searchValue != ''){
              $searchQuery = "  And (D.Name like '%".$searchValue."%',D.Name like '%".$searchValue."%') ";
   		
             } 
   
             $query = $this->db->query("SELECT COUNT(D.Id) as allcount FROM DepartmentMaster D where `OrganizationId`='$orgid'")->result();
           $totalRecords = $query[0]->allcount;
   	 
   	 if($searchQuery != '')
           $query = $this->db->query("SELECT COUNT(D.Id) as allcount FROM DepartmentMaster D where`OrganizationId`='$orgid' $searchQuery")->result();
           $totalRecordwithFilter = $query[0]->allcount; 
            //  var_dump($totalRecordwithFilter);
            //  die();
           $query = $this->db->query(" SELECT `Id`, `Name`, `archive` FROM DepartmentMaster D WHERE OrganizationId= $orgid $searchQuery order by name $columnSortOrder, D.Name ASC Limit $start,$rowperpage");
           //  var_dump($this->db->last_query());
           // die(); 
           $d = array();
           $res = array();
           $depname = "";
           foreach ($query->result() as $row) {
   
   
               $data = array();
   
               $sql1 = $this->db->query("SELECT GROUP_CONCAT(E.FirstName SEPARATOR ', ') as `EmpName`,GROUP_CONCAT(U.EmployeeId SEPARATOR ', ') as `Empid`, E.Department from UserMaster U ,EmployeeMaster E where Department = $row->Id and E.Id = U.EmployeeId AND U.appSuperviserSts = 2 and U.EmployeeId in  (select Id from EmployeeMaster where OrganizationId = $orgid and Is_Delete = 0) Group by E.Department");
               // var_dump($this->db->last_query());
               // die;
               // $count = $this->db->affected_rows();
   
               $data['depname'] = "";
   
               if ($this->db->affected_rows() > 0) {
                   if ($row1 = $sql1->row()) {
                       // $data['dname'] = $row1[0]->EmployeeId;
                       // print_r($data['dname']);
   
   
                       $data['depname'] = $row1->EmpName;
                   }
               } else {
   
                   $data['depname'] = '--';
               }
               $data['change'] = '<input type="checkbox" name="chk"  Id="' . $row->Id . '" class="checkbox"  value="' . $row->Id . '" >';
   
   
   
               $data['name'] = $row->Name;
   
               $data['status'] = $row->archive == 1 ? '<div style="background-color:#27AE60;text-align:center;color:white; border-radius:100px; width:85px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px; width:85px;">
             Inactive</div>';
             if($row->Name == 'Trial Department')
          {
   
               $data['action']='
          <div class="dropdown">
                                  
                                    <!-- three dots -->
                                    <ul data-toggle="dropdown" 
                                          aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <span class="caret"></span>
                                  
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:7.75em; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem; margin-left:-25%">

            <li class="upDept hover" style="height:30px;" data-toggle="modal" data-target="#updateDept" onclick="angular.element(this).scope().GetEmpLis(\''.$row->Id.'\')"  data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign"> title="Edit"><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li> 
             </ul>
             </div>';
            }
            elseif($row->archive==0)
            {
            $data['action']='<div class="dropdown">
                                  
                                    <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem;margin-left:-25%">

            <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addDeptE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delDept"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><div data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></div><img src=' . URL . "../assets/img/trash-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
   
              <li class="upDept hover" style="height:30px;" data-toggle="modal" data-target="#updateDept1"  
              data-did="'.$row->Id.'" data-name="'.$row->Name.'"><div data-did="'.$row->Id.'" data-name="'.$row->Name.'"  title="Assign"></div> <img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
              </ul>
              </div>  '; 
            }
            else
            {
            $data['action']='<div class="dropdown">
                                  
            <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem; line-height: 0.4rem;padding-top: 0.5rem; color:#808080; ">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height: 5.75rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem; margin-left:-25%">

            <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addDeptE" data-sid="'.$row->Id.'"data-did="'.$row->Id.'" data-name="'.$row->Name.'" data-sts="'.$row->archive.'"data-assign="'.departmentAssignAll($row->Id).'"><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">&nbspEdit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delDept "  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><div   data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></div><img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
   
          <li class="upDept hover" style="height:30px;" data-toggle="modal" data-target="#updateDept "
          onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"><div onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"title="Assign"></div><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
   
                  </ul>
                  </div> '; 
            }
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();
           $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        //echo json_encode($d);
        return $response;
       }
   
       public function getAllDesg($postData = Null) {
           $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
           $draw = $postData['draw'];
           $start = $postData['start'];
           $rowperpage = $postData['length']; // Rows display per page
           $searchValue = $postData['search']['value'];
           $columnIndex = $postData['order'][0]['column']; // Column index
           $columnName = $postData['columns'][$columnIndex]['data']; // 
           $columnSortOrder = $postData['order'][0]['dir']; //asc or desc

           $searchQuery = "";
				 	
		         if($searchValue != ''){
		            $searchQuery = "  And (D.Name like '%".$searchValue."%') ";
					
		         }
				 
				 $query = $this->db->query("SELECT COUNT(D.Id) as allcount FROM `ShiftMaster` D where `OrganizationId`='$orgid'")->result();
		         $totalRecords = $query[0]->allcount;
				 
				 if($searchQuery != '')
		         $query = $this->db->query("SELECT COUNT(D.Id) as allcount FROM `DesignationMaster` D where`OrganizationId`  ='$orgid' $searchQuery")->result();
		         $totalRecordwithFilter = $query[0]->allcount; 
            //  var_dump($totalRecordwithFilter);
            //  die();
           $query = $this->db->query("SELECT `Id`, `Name`,Description, `CreatedDate`,  `LastModifiedDate`,`archive` FROM `DesignationMaster` D  WHERE OrganizationId= $orgid $searchQuery  order by name $columnSortOrder,D.Name ASC Limit $start,$rowperpage");

           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
               $data['name'] = $row->Name;
   
               // var_dump($attsts);
               $data['desc'] = $row->Description;
               $data['cdate'] = date('Y-m-d', strtotime($row->CreatedDate));
               $data['mdate'] = date('Y-m-d', strtotime($row->LastModifiedDate));
               $data['status'] = $row->archive == 1 ? '<div style="background-color:#27AE60;text-align:center;color:white;
   border-radius: 100px; width:95px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white;border-radius: 100px;width:95px;">
             Inactive</div>';
   
              
              
   if($row->Name == 'Trial Designation')
                    {
   $data['action']='
          <div class="dropdown">
                                  
            <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem;margin-left:-25%">

            <li class="upDept hover" style="height:30px;" data-toggle="modal" data-target="#updateDesg" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')"  
             data-did="'.$row->Id.'" data-name="'.$row->Name.'" title="Assign"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  title="Edit"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li> 
             </ul>
             </div>';
            }
   
          
              elseif($row->archive==0)
            {
            $data['action']='<div class="dropdown">
                                  
            <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem;margin-left:-25%">

            <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addDesgE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><div  title="Edit"></div><a href="#" style="color:black; font-size:13px; margin-left:5px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>Edit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delDesg"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><div data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
   
              <li class="upDesg hover" style="height:30px;" data-toggle="modal" data-target="#updateDesg1"  
              data-did="'.$row->Id.'" data-name="'.$row->Name.'"><div data-did="'.$row->Id.'" data-name="'.$row->Name.'"  title="Assign"></div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
              </ul>
              </div>  '; 
            }
            else
            {
            $data['action']='<div class="dropdown">
                                  
            <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
                                  
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem; margin-left:-25%">

            <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addDesgE"  data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->archive.'"
           data-assign="'.departmentAssignAll($row->Id).'"><div title="Edit"></div><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delDesg"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><div data-did="'.$row->Id.'" data-dname="'.$row->Name.'"  title="Delete Client"></div> <img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"  data-sid="' . $row->Id . '" data-sname="' . $row->Name . '"  title="Delete Client"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
   
               <li class="upDesg hover" style="height:30px;" data-toggle="modal" data-target="#updateDesg"
               onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"><div onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-did="'.$row->Id.'" data-name="'.$row->Name.'"title="Assign"></div><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;" onclick="angular.element(this).scope().GetEmpList(\'' . $row->Id . '\')" data-did="' . $row->Id . '" data-name="' . $row->Name . '"title="Assign">
           <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
   
                  </ul>
                  </div> '; 
            }
   
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();      //$query->result();
           $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        return $response;
       }
   
       public function getAllHolidays($postData = null) {
           $orgid = $_SESSION['orgid'];
           $q = "";
           $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
           $draw = $postData['draw'];
           $start = $postData['start'];
           $rowperpage = $postData['length']; // Rows display per page
           $searchValue = $postData['search']['value'];
           $columnIndex = $postData['order'][0]['column']; // Column index
           $columnName = $postData['columns'][$columnIndex]['data']; // 
           $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
           $searchQuery = "";
				 	
		         if($searchValue != ''){
		            $searchQuery = "  And (H.Name like '%".$searchValue."%') ";
					
		         }
				 
				 $query = $this->db->query("SELECT COUNT(H.Id) as allcount FROM `HolidayMaster`H  where `OrganizationId`='$orgid'")->result();
		         $totalRecords = $query[0]->allcount;
				 
				 if($searchQuery != '')
		         $query = $this->db->query("SELECT COUNT(H.Id) as allcount FROM `HolidayMaster` H where`OrganizationId`='$orgid' $searchQuery")->result();
		         $totalRecordwithFilter = $query[0]->allcount; 
		        // var_dump($totalRecordwithFilter);
			    	// die()
   
           $query = $this->db->query("SELECT `Id`, `Name`, `Description`, DATE(DateFrom) AS fromDate, `DateTo`, DATEDIFF(DATE(DateTo),DATE(DateFrom)) + 1  AS DiffDate FROM HolidayMaster H WHERE OrganizationId = $orgid $searchQuery order by name $columnSortOrder,fromDate Desc Limit $start,$rowperpage");
           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
               $data['name'] = $row->Name;
               $data['from'] = date("d-M-Y", strtotime($row->fromDate));
               //$from=date($row->fromDate);
               $data['to'] = date("d-M-Y", strtotime($row->DateTo));
               //$to=date($row->DateTo);
   
   
               $data['days'] = $row->DiffDate;
               /* if($data['days']=='0'){
                 $data['days']=='1';
                 } */
               $data['description'] = $row->Description;
               if($row->fromDate > date("Y-m-d"))
          {
              
               $data['action'] = '<div class="dropdown">
                                  
            <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:4rem; border-radius:5px; padding: 0.1rem 0rem 0.5rem 0rem; margin-left:-25%">

            <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#edit"  data-sid="'.$row->Id.'"
           data-sid="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-from="'.date("m/d/Y", strtotime($row->fromDate)).'" 
           data-to="'.date("m/d/Y", strtotime($row->DateTo)).'" 
           data-description="'.$row->Description.'"><div  title="Edit"></div><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delete"  
              data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" ><div data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Delete Client"></div> <img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
              </ul>
                  </div> '; 
                }
   else
          {
               $data['action'] = '<div class="dropdown">
                                  
                                <!-- three dots -->
                                <ul data-toggle="dropdown" 
                                        aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <span class="caret"></span>
                                
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6rem;
            height:3.9rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem;margin-left:-25%">

            <li class="edit cant12 hover" style="height:30px;" data-toggle="modal" data-target=""  
              data-sid="'.$row->Id.'"
           data-sid="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-from="'.date("m/d/Y", strtotime($row->fromDate)).'" 
           data-to="'.date("m/d/Y", strtotime($row->DateTo)).'" 
           data-description="'.$row->Description.'"><div title="Edit"></div><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">&nbspEdit</a></li>
   
           <li class="delete cant23 hover" style="height:30px;" data-toggle="modal" data-target=""  
              data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" ><div data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Delete Client"></div><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"><a href="#" style="color:black; font-size:13px; margin-left:5px;"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
   
              </ul>
                  </div> '; 
   
          }
   
   
   
   
   
        
               $res[] = $data;
           }
           $d['data'] = $res;
		        //return $d;
            $this->db->close();
	          $response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
                    );
               //echo json_encode($d);
               return $response;
       }
   
       public function getAllrates($postData = null) {
           $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
           $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
           $draw = $postData['draw'];
           $start = $postData['start'];
           $rowperpage = $postData['length']; // Rows display per page
           $searchValue = $postData['search']['value'];
           $columnIndex = $postData['order'][0]['column']; // Column index
           $columnName = $postData['columns'][$columnIndex]['data']; // 
           $columnSortOrder = $postData['order'][0]['dir']; //asc or desc
           $searchQuery = "";
				 	
		         if($searchValue != ''){
		            $searchQuery = "  And (R.Rate like '%".$searchValue."%') ";
					
		         }
				 
				 $query = $this->db->query("SELECT COUNT(R.Id) as allcount FROM HourlyRateMaster R  where `OrganizationId`='$orgid'")->result();
		         $totalRecords = $query[0]->allcount;
				 
				 if($searchQuery != '')
		         $query = $this->db->query("SELECT COUNT(R.Id) as allcount FROM HourlyRateMaster R where`OrganizationId`='$orgid' $searchQuery")->result();
		         $totalRecordwithFilter = $query[0]->allcount; 
		        // var_dump($totalRecordwithFilter);
			    	// die()
           
           $query = $this->db->query("SELECT `Id`,`Name`,Rate, `CreatedDate`,`LastModifiedDate`,`status` FROM HourlyRateMaster R  WHERE OrganizationId = $orgid $searchQuery order by name $columnSortOrder,R.Rate ASC Limit $start,$rowperpage");
           $d = array();
           $res = array();
           foreach ($query->result() as $row) {
               $data = array();
               // $data['name']=$row->Name;/*getName('DesignationMaster','Name','Id',$row->Name);*/
               $data['rate'] = $row->Rate;
               $attsts = $this->getAttendanceStatusBYHourlyRateId($row->Id);
               $data['cdate'] = date('Y-m-d', strtotime($row->CreatedDate));
               $data['mdate'] = date('Y-m-d', strtotime($row->LastModifiedDate));
               $data['status'] = $row->status == 1 ? '<div style="background-color:#27AE60;text-align:center;color:white; border-radius:100px; width:75px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px;width:75px;">
             Inactive</div>';
            $data['action'] = '<div class="dropdown">
                                  
            <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem;  border-radius:5px; height:3.9rem; padding: 0rem 0rem 0.5rem 0rem;margin-left:-25%">

            <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addDesgE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-sts="'.$row->status.'"
           data-rate="'.$row->Rate.'"
           data-attsts="'.$attsts.'"><div   title="Edit"></div><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">Edit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delDesg"  
              data-did="'.$row->Id.'" 
           data-na="'.$row->Name.'"
           data-rate="'.$row->Rate.'"><div   data-did="'.$row->Id.'" 
           data-na="'.$row->Name.'"
           data-rate="'.$row->Rate.'" title="Delete Client"></div><img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;" > <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
              </ul>
                  </div> '; 
   
   
   
   
               // }
               $res[] = $data;
           }
           $d['data'] = $res;
		//return $d;
        $this->db->close();
	$response = array(
            "draw" => intval($draw) ,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        //echo json_encode($d);
        return $response;
       }
   
       public function getAttendanceStatusBYHourlyRateId($HourlyRateId) {
           $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : 0;
   
           $query = $this->db->query("SELECT count(Id) as count from AttendanceMaster WHERE HourlyRateId=$HourlyRateId AND OrganizationId = $orgid");
           // var_dump($this->db->last_query());
           $data = 0;
           if ($row = $query->row()) {
               $data = $row->count;
           }
           return $data;
       }
   
      
         public function saverecords(){
         
        $orgid=$_SESSION['orgid'];
               $id=$_SESSION['id'];
   
           $shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
           $shiftname=isset($_REQUEST['shiftname'])?$_REQUEST['shiftname']:0;
   
               
               $timeinduration  =  date("H:i:s",strtotime(isset($_REQUEST['timeinduration'])?$_REQUEST['timeinduration']:''));
   
               $timeoutduration = date("H:i:s",strtotime(isset($_REQUEST['timeoutduration'])?$_REQUEST['timeoutduration']:''));
               $timeingrace =date("H:i:s",strtotime(isset($_REQUEST['timeingrace'])?$_REQUEST['timeingrace']:''));
               $timeoutgrace =date("H:i:s",strtotime(isset($_REQUEST['timeoutgrace'])?$_REQUEST['timeoutgrace']:''));
   
   
               // var_dump($shiftname);
               // var_dump($timeinduration);
               // var_dump($timeoutduration);
               // var_dump($breakinduration);
               // var_dump($breakoutduration);
               //             die;
               
               $query = $this->db->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`,shifttype,`OrganizationId`) VALUES (?,?,?,?,?,?,?)",array($shiftname,$timeinduration,$timeoutduration,$timeingrace,$timeoutgrace,$shifttype,$orgid));
                     //var_dump($this->db->last_query());
                     //
                     //
               
               echo 1;
               return false;
         } 
   // Delete function 
   //
   //
      public function deleteShift(){
            $orgid=$_SESSION['orgid'];
           $sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
           $data=array();
           $data['afft']=0;
           $query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE  Id = '$sid' ");
          $query = $this->db->query("select id as totattn from AttendanceMaster where AttendanceMaster.shiftid=? and OrganizationId=?",array($sid,$orgid));
          $data['attn']=$query->num_rows();
          
          $query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.shift=? and OrganizationId=? and Is_Delete != 2",array($sid,$orgid));
          $data['emp']=$query->num_rows();
   
          $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.ShiftId=? and OrganizationId=?",array($sid,$orgid));
          $data['arc']=$query->num_rows();
   
          $query = $this->db->query("select Id as totspid from ShiftPlanner where ShiftPlanner.shiftid=? and ShiftPlanner.orgid=?",array($sid,$orgid));
          $data['shiftp']=$query->num_rows();
   
          if($data['attn']==0 and $data['emp']==0 and $data['arc']==0 and $data['shiftp']==0)
          {
            $query = $this->db->query("DELETE FROM `ShiftMaster` where id=? and OrganizationId=?",array($sid,$orgid));
            $data['afft']=$this->db->affected_rows();
            if($data['afft']>0)
            {
              $query = $this->db->query("DELETE FROM `ShiftMasterChild` where ShiftId=? and OrganizationId=?",array($sid,$orgid));
   
             /* $count1 = $this->db->affected_rows();*/
            }
      }
    }
     
   
       // public function getshiftdata($sid) {
           // $res = array();
           // $orgid = $_SESSION['orgid'];
           // $query = $this->db->query("Select * from ShiftMaster where Id = '$sid' AND OrganizationId = '$orgid' ");
           // foreach ($query->result() as $row) {
               // $data = array();
               // $data['sti'] = $row->TimeIn;
               // $data['sto'] = $row->TimeOut;
               // $data['bsti'] = $row->TimeInBreak;
               // $data['bsto'] = $row->TimeOutBreak;
               // if ($row->TimeInGrace == '00:00:00') {
                   // $data['tig'] = '-:-';
               // } else {
                   // $data['tig'] = date('h:i A', strtotime($row->TimeInGrace));
               // }
               // if ($row->TimeOutGrace == '00:00:00') {
                   // $data['tog'] = '-:-';
               // } else {
                   // $data['tog'] = date('h:i A', strtotime($row->TimeOutGrace));
               // }
               // $data['status'] = $row->archive;
               // $data['stype'] = $row->shifttype;
               // $data['sname'] = $row->Name;
               // $data['HoursPerDay'] = $row->HoursPerDay;
               // $res[] = $data;
               // break;
           // }
           // return $res;
       // }
   
       function getGeolocation($postData = Null) {
           $orgid = $_SESSION['orgid'];
   
   
   
           $draw = $postData['draw'];
           $start = $postData['start'];
           $rowperpage = $postData['length']; // Rows display per page
           $searchValue = $postData['search']['value'];
           $columnIndex = $postData['order'][0]['column']; // Column index
           $columnName = $postData['columns'][$columnIndex]['data']; // Column name
           $columnSortOrder = $postData['order'][0]['dir']; //asc or desc 
           //echo  $searchValue;
   
   
           if ($columnName == "name") {
               $columnName = "Name";
           } elseif ($columnName == "Lat_Long") {
               $columnName = "Lat_Long";
           } elseif ($columnName == "radius") {
               $columnName = "Radius";
           } elseif ($columnName == "location") {
               $columnName = "Location";
           } else {
               $columnName = "Status";
           }
   
           $searchQuery = "";
           if ($searchValue != '') {
               $searchQuery = " And (Name like '%" . $searchValue . "%' or Lat_Long like '%" . $searchValue . "%' or Radius like '%" . $searchValue . "%' or Location like '%" . $searchValue . "%' or Status like '%" . $searchValue . "%')";
           }
   
           $query = $this->db->query("SELECT count(*) as allcount FROM `Geo_Settings` WHERE OrganizationId='$orgid'")->result();
           $totalRecords = $query[0]->allcount;
   
   
           if ($searchQuery != '')
               $query = $this->db->query("SELECT count(*) as allcount FROM `Geo_Settings` WHERE OrganizationId='$orgid' $searchQuery")->result();
           $totalRecordwithFilter = $query[0]->allcount;
   
   
   
           $query = $this->db->query("SELECT Id,Name,Lat_Long,Radius,Status,Location FROM `Geo_Settings` WHERE OrganizationId='$orgid' $searchQuery ORDER BY $columnName $columnSortOrder,Name ASC Limit $start,$rowperpage");
   
           $d = array();
           $res = array();
           $response = array();
           foreach ($query->result() as $row) {
               $data = array();
               $id = encode5t($row->Id);
               $data['name'] = $row->Name;
               $attsts = $this->getAttendanceStatusBYAreaId($row->Id);
               $data['latlong'] = $row->Lat_Long;
               $data['location'] = "<a href='http://maps.google.com/?q=$row->Lat_Long' target='_blank' title='Click to see location on map'>$row->Location;</a>";
               $data['radius'] = number_format((float) $row->Radius, 2, '.', '');
               $data['status'] = $row->Status == 1 ? '<div style="background-color:#219653;text-align:center;color:white; border-radius:100px;">Active</div>' : '<div style="background-color:red;text-align:center;color:white; border-radius:100px;">
             Inactive</div>';
              
        $data['action'] = '<div class="dropdown">
                                  
        <!-- three dots -->
        <ul data-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <span class="caret"></span>
        
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:5.75rem; border-radius:5px; padding: 0rem 0rem 0.5rem 0rem; margin-left:-30%;">
        <li class="edit hover" style="height:30px;" data-toggle="modal" data-target="#addDeptE"  
              data-sid="'.$row->Id.'"
           data-did="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-attsts="'.$attsts.'" 
           data-radius="'.number_format((float)$row->Radius, 2, '.', '').'" 
           data-sts="'.$row->Status.'"><div   title="Edit"></div><img src=' . URL . "../assets/img/edit-2.svg" . ' class="test editShift" style=" color: black;font-size:16px; margin-left:12px; font-weight: 500; color:#212529;"><a href="#" style="color:black; font-size:13px; margin-left:5px;">&nbspEdit</a></li>
   
           <li class="delete hover" style="height:30px;" data-toggle="modal" data-target="#delDept"  
              data-did="'.$row->Id.'" data-dname="'.$row->Name.'"><div   data-did="'.$row->Id.'"  data-did="'.$row->Id.'" data-dname="'.$row->Name.'" title="Delete"></div><img src=' . URL . "../assets/img/trash-2.svg" . ' class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li> 
   
               <li class="upGeolocation hover" style="height:30px;" data-toggle="modal" data-target="#updateGeolocation"  
             onclick="angular.element(this).scope().GetEmpList1(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" ><div  onclick="angular.element(this).scope().GetEmpList1(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Assign"></div><img src=' . URL . "../assets/img/check-circle.svg" . '  class="#" style="font-size:16px; font-weight: 500; color:#212529; margin-left:12px;"> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li> 
              </ul>
                  </div> '; 
   
   
   
   
   
          //                          $data['action']='<a href="#"><i class="material-icons edit" data-toggle="modal" title="Edit" data-sid="'.$row->Id.'"
          //  data-did="'.$row->Id.'" 
          //  data-name="'.$row->Name.'" 
          //  data-attsts="'.$attsts.'" 
          //  data-radius="'.number_format((float)$row->Radius, 2, '.', '').'" 
          //  data-sts="'.$row->Status.'"
           
          // data-target="#addDeptE">edit</i>
          // </a>
          //  <i class="delete fa fa-trash" style="font-size:24px; color:purple;" data-toggle="modal" data-target="#delDept" data-did="'.$row->Id.'" data-dname="'.$row->Name.'" title="Delete" ></i>
          // <i class="upGeolocation fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateGeolocation" onclick="angular.element(this).scope().GetEmpList1(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" 
          // title="Assign" ></i>           
          // ';
               // }
               // 
               $res[] = $data;
           }
           $d['data'] = $res;
           $this->db->close();
   
           $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $res
           );
   
           return $response;
       }
   
       public function getAttendanceStatusBYAreaId($areaid) {
           $orgid = $_SESSION['orgid'];
           $query = $this->db->query("Select count(Id) as count from AttendanceMaster where areaId= $areaid and OrganizationId = $orgid");
           // var_dump($this->db->last_query());
           // die;
           $data = 0;
           if ($row = $query->row()) {
               $data = $row->count;
           }
           return $data;
       }
    public function editDept(){
      $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $dna=isset($_REQUEST['dna'])?$_REQUEST['dna']:'';
      $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
      $sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
      $date=date('Y-m-d');
      $res=0;
      $query = $this->db->query("select Id from `DepartmentMaster` where Name=? and OrganizationId=? and Id != ? ",array($dna,$orgid,$did));
      if($query->num_rows()>0)
        $res=2; // Dept Name already exist already exist
      else{
      $query = $this->db->query("UPDATE `DepartmentMaster` SET `Name`=?,`LastModifiedDate`=?,`LastModifiedById`=?,`archive`=? where id=? ",array($dna,$date,$id,$sts,$did));
      $res= $this->db->affected_rows(); 
      // $this->db->close();
      if($res > 0){
        $query121 = $this->db->query("SELECT `Id`, `Name`, `ParentId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `OrganizationId`, `Code`, `archive` FROM `DepartmentMaster` WHERE Name='$dna' and OrganizationId='$orgid' ");
            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
       $zone=getTimeZone($orgid);
          date_default_timezone_set($zone);
       $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> department has been <b>updated</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
      }
      }
      echo $res;
    }
    public function deleteDept(){
      $orgid=$_SESSION['orgid'];
      $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
      $data=array();
      $data['afft']=0;
   
   
      $query121 = $this->db->query("SELECT `Id`, `Name`, `ParentId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `OrganizationId`, `Code`, `archive` FROM `DepartmentMaster` WHERE Id='$did' and OrganizationId='$orgid' ");
      $query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.department=? and OrganizationId=? and Is_Delete != 2 ",array($did,$orgid));
      $data['emp']=$query->num_rows();
      
      $query = $this->db->query("select id as totemp from AttendanceMaster where Dept_id=? and OrganizationId=?",array($did,$orgid));
      $data['A_emp']=$query->num_rows();
   
      $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.Dept_id=? and OrganizationId=?",array($did,$orgid));
      $data['aarc']=$query->num_rows();
      
       if($data['emp']==0 && $data['A_emp']==0 && $data['aarc']==0){
        $query = $this->db->query("DELETE FROM `DepartmentMaster` where id=? and OrganizationId=?",array($did,$orgid));
        $data['afft']=$this->db->affected_rows();
   
        if($data['afft'] > 0){
   
            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
          $zone=getTimeZone($orgid);
              date_default_timezone_set($zone);
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> department has been <b>deleted</b> ";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
        }
      } 
    //}
       $this->db->close();
      echo json_encode($data);  
    }
   
     public function SaveEmpdeptList() {
        $result = array();
        $data = array();
    $orgid=$_SESSION['orgid'];
     $deptid=isset($_REQUEST['deptid'])?$_REQUEST['deptid']:'';
        
        
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 ){  
          //print_r($emplistarr);
          $empid = $emplistarr[$i]['id'];
          $sql = "update EmployeeMaster set Department=? where OrganizationId =? and Id=?";
          
          $query = $this->db->query($sql,array($deptid ,$orgid,$empid));
          //$count=$query->rowCount();
          
                }
            }
          
        $result["data"] =$data;
        return $result;
    }
     public function getemployeebydept() {
    $result = array();
    
    $data = array();
     $orgid=$_SESSION['orgid'];
     $deptid=isset($_REQUEST['deptid'])?$_REQUEST['deptid']:'';
   
   
    
    $sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and Department!=? and archive=1 and Is_Delete=0 order by FirstName";
     // var_dump($sql);
    $query = $this->db->query($sql,array($orgid,$deptid ));
    
      foreach($query->result() as $row)
      {
        $res = array();
        $res['id'] = $row->Id;
        $res['name'] = $row->EmployeeCode." - ". ucwords(strtolower($row->FirstName." ".$row->LastName));
        $res['empfname'] = $row->FirstName;
        $res['emplname'] = $row->LastName;
        
        $res['sts']=0;
        $data[] = $res;
      }
    $result["data"] =$data;
    return $result;
    } 
     public function SaveEmpdesgList() {
        $result = array();
        $data = array();
    $orgid=$_SESSION['orgid'];
     $desgid=isset($_REQUEST['desgid'])?$_REQUEST['desgid']:'';
        
        
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 ){
          //print_r($emplistarr);
          $empid = $emplistarr[$i]['id'];
          $sql = "update EmployeeMaster set Designation=? where OrganizationId =? and Id=?";
          
          $query = $this->db->query($sql,array($desgid ,$orgid,$empid));
          //$count=$query->rowCount();
          
                }
            }
          
        $result["data"] =$data;
        return $result;
    } 
   
      public function getemployeebydesg() {
    $result = array();
    
    $data = array();
     $orgid=$_SESSION['orgid'];
      $desgid=isset($_REQUEST['desgid'])?$_REQUEST['desgid']:'';
      
    $sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and Designation!=? and archive=1 and Is_Delete=0 order by FirstName";
    // var_dump($sql);
    $query = $this->db->query($sql,array($orgid,$desgid ));
    
      foreach($query->result() as $row)
      {
        $res = array();
        $res['id'] = $row->Id;
        $res['name'] = $row->EmployeeCode." - ". ucwords(strtolower($row->FirstName." ".$row->LastName));
        $res['empfname'] = $row->FirstName;
        $res['emplname'] = $row->LastName;
        
        $res['sts']=0;
        $data[] = $res;
      }
    $result["data"] =$data;
    return $result;
    }
   
   
   public function editDesg()
    {
      $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $dna=isset($_REQUEST['dna'])?$_REQUEST['dna']:'';
      $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
      $sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
      $desc=isset($_REQUEST['desc'])?$_REQUEST['desc']:0;
      $date=date('Y-m-d');
      $res=0;
      $query = $this->db->query("select Id from `DesignationMaster` where Name=? and OrganizationId=? and Id != ?",array($dna,$orgid,$did));
      if($query->num_rows()>0)
        $res=2; // Dept Name already exist already exist
      else{
      $query = $this->db->query("UPDATE `DesignationMaster` SET `Name`=?,Description=?,`LastModifiedDate`=?,`LastModifiedById`=?,`archive`=? where id=? ",array($dna,$desc,$date,$id,$sts,$did));
      $res=$this->db->affected_rows();  
       // $this->db->close();
      if($res>0){
   
        $query121 = $this->db->query("SELECT `Id`, `Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `Code`, `RoleId`, `HRSts`, `Description`, `archive`, `daysofnotice` FROM `DesignationMaster` WHERE Name='$dna' and OrganizationId='$orgid' ");
            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> designation has been <b> Updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
        }
      }
      echo $res;
    }
    public function deleteDesg()
    {
      $orgid=$_SESSION['orgid'];
      $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
      $data=array();
      $data['afft']=0;
   
            // $getdesgname=getDesignation($did);
            // if($getdesgname == 'Trial Designation')
            // {
            //  echo 6;
            //  return false;
            // } 
            // else
            // {
   
           $query121 = $this->db->query("SELECT `Id`, `Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `Code`, `RoleId`, `HRSts`, `Description`, `archive`, `daysofnotice` FROM `DesignationMaster` WHERE Id='$did' and OrganizationId='$orgid' ");
   
      $query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.Designation=? and OrganizationId=? and Is_Delete != 2",array($did,$orgid));
      $data['emp']=$query->num_rows();
   
      // $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.Desg_id=? and OrganizationId=?",array($sid,$orgid));
      // $data['atarc']=$query->num_rows();
      
       if($data['emp']==0){
        $query = $this->db->query("DELETE FROM `DesignationMaster` where id=? and OrganizationId=?",array($did,$orgid));
        $data['afft']=$this->db->affected_rows();
   
        if($data['afft']>0){
   
   
            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> designation has been <b> Deleted  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
        }
        } 
   
            //}
   
       $this->db->close();
      echo json_encode($data);  
    }
   
   
   
      public function editHoliday(){
      $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
      $sna=isset($_REQUEST['name'])?$_REQUEST['name']:'';
      $fromdate=date("Y-m-d", strtotime(isset($_REQUEST['from'])?$_REQUEST['from']:''));
      $todate=date("Y-m-d", strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
      $desc=isset($_REQUEST['desc'])?$_REQUEST['desc']:'';
      $date=date('Y-m-d');
      $query = $this->db->query("update HolidayMaster set Name=?, `Description`=?, `DateFrom`=?, `DateTo`=?,`LastModifiedDate`=?, `LastModifiedById`=? where Id=?",array($sna,$desc,$fromdate,$todate,$date,$id,$sid));
       // $this->db->close();
      echo $this->db->affected_rows();
      if($this->db->affected_rows() > 0){
   
        $query1211 = $this->db->query("SELECT `Id`, `Name`, `Description`, `DateFrom`, `DateTo`, `DivisionId`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `FiscalId` FROM `HolidayMaster` WHERE Id=$sid");
        if ($r=$query1211->result()){
              $hname  = $r[0]->Name;
              
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> holiday has been Updated.  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
   
   
      }
    }
   public function deleteHoliday(){
      $did=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
      $query12112 = $this->db->query("SELECT `Id`, `Name`, `Description`, `DateFrom`, `DateTo`, `DivisionId`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `FiscalId` FROM `HolidayMaster` WHERE Id=$did");
      $query = $this->db->query("delete from HolidayMaster where Id=?",array($did));
       // $this->db->close();
      echo $this->db->affected_rows();
      if($this->db->affected_rows() > 0){
        if ($r=$query12112->result()){
              $hname  = $r[0]->Name;
              
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$hname."</b> Holiday has been deleted</b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
      }
    }
   
   public function editRate()
    {
      $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $rna=isset($_REQUEST['rna'])?$_REQUEST['rna']:'';
      $rid=isset($_REQUEST['rid'])?$_REQUEST['rid']:'';
      $sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
      $rate=isset($_REQUEST['rate'])?$_REQUEST['rate']:0;
      $attensts=isset($_REQUEST['attsts'])?$_REQUEST['attsts']:0;
      // var_dump($attensts);
      $date=date('Y-m-d');
      $res=0;
      $query = $this->db->query("select Id from `HourlyRateMaster` where Rate=? and OrganizationId=? and Id !=?",array($rate,$orgid,$rid));
      if($query->num_rows()>0)
        $res=2; // Dept Name already exist already exist
      else{
      $query = $this->db->query("UPDATE `HourlyRateMaster` SET `Name`=?,Rate=?,`LastModifiedDate`=?,`LastModifiedById`=?,`status`=? where id=? ",array($rna,$rate,$date,$id,$sts,$rid));
      // var_dump($this->db->last_query());
      // die;
      $res=$this->db->affected_rows();  
       // $this->db->close();
      if($res > 0){
        $query121 = $this->db->query("SELECT `Id`, `Name`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OrganizationId`, `Rate`, `status` FROM `HourlyRateMaster` WHERE Rate='$rate' and OrganizationId='$orgid' ");
            if ($r=$query121->result()){
              $hname  = $r[0]->Rate;
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           // echo $hname;
            // var_dump($hname);
           $actionperformed = "New Hourly Rate <b>".$hname."</b>  has been <b> Updated  </b>.";
           // var_dump($actionperformed);
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
      }
      }
      echo $res;
    }
    
    
    public function deleteRate(){
      $orgid=$_SESSION['orgid'];
      $rid=isset($_REQUEST['rid'])?$_REQUEST['rid']:'';
      $data=array();
      $data['afft']=0;
      $query = $this->db->query("select id  from EmployeeMaster where EmployeeMaster.hourly_rate=? and OrganizationId=? and Is_Delete != 2",array($rid,$orgid));
      $data['emp']= $query->num_rows();
       if($data['emp']==0){
       $query1 = $this->db->query("select Id  from AttendanceMaster where AttendanceMaster.HourlyRateId=? and OrganizationId=?",array($rid,$orgid));
       $data['emp']= $query1->num_rows();
         
         if($data['emp']==0)
         {
        $query = $this->db->query("DELETE FROM `HourlyRateMaster` where id=? and OrganizationId=?",array($rid,$orgid));
        $data['afft']=$this->db->affected_rows();
         }
      } 
       $this->db->close();
      echo json_encode($data);  
    }
    
   public function editLocation()
   {
      $orgid = $_SESSION['orgid'];
    $did = isset($_REQUEST['did'])?$_REQUEST['did']:'';  
    $name = isset($_REQUEST['dna'])?$_REQUEST['dna']:''; 
    $radius = isset($_REQUEST['dra'])?$_REQUEST['dra']:''; 
    $status = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';
    $attstatus = isset($_REQUEST['attsts'])?$_REQUEST['attsts']:'';
   
        $zone=getTimeZone($orgid);
        date_default_timezone_set($zone);
   
        // echo $orgid;
        // echo $did;
        // echo $name;
        // echo $radius;
        // echo $status;
        // echo $attstatus;
   /*  $query1 = $this->db->query("select AttendanceStatus  from AttendanceMaster A where A.areaId=? and OrganizationId=? AND A.AttendanceStatus in (2,6,7)  ",array($did,$orgid));
   
        $count = $this->db->affected_rows();
        var_dump($this->db->last_query());
        die;
   
        foreach ($query1->result() as $key) {
          $data=array();
           $data['att']=$key->AttendanceStatus;
           var_dump($data['att']);
        }*/
   
       
         $query = $this->db->query("UPDATE Geo_Settings set Name = '$name',Radius= '$radius',Status = '$status' where Id = '$did' AND OrganizationId = '$orgid' ");
       echo $this->db->affected_rows();
       if($this->db->affected_rows() > 0){
        
         // if ($r=$query1->result()){
          //echo "hello";   
         
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           $module = "Settings";
           $actionperformed = "<b>Details</b> has been <b>Updated </b> for <b>".$name." Geo Location</b> ";
           $activityby = 1;
           
         $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
         //var_dump($this->db->last_query());
         //die();
       }
       
   
         
   }
   public function deleteLocation()
   {
    $orgid=$_SESSION['orgid'];
    $did=isset($_REQUEST['did'])?$_REQUEST['did']:'';
    $data=array();
    $zone=getTimeZone($orgid);
        date_default_timezone_set($zone);
    $data['afft']=0;
    $query121 = $this->db->query("SELECT `Id`, `Name`, `Lat_Long`, `Location`, `Radius`, `archive`, `OrganizationId`, `Status`, `LastModifiedById`, `LastModifiedDate` FROM `Geo_Settings` WHERE Id=$did ");
    $query = $this->db->query("select id as totemp from EmployeeMaster where EmployeeMaster.area_assigned=? and OrganizationId=? and Is_Delete != 2",array($did,$orgid));
    $data['emp']=$query->num_rows();
   
    // $query = $this->db->query("select id as totarc from ArchiveAttendanceMaster where ArchiveAttendanceMaster.areaId=? and OrganizationId=?",array($sid,$orgid));
    //  $data['ararc']=$query->num_rows();
    if($data['emp']==0)
    {
    $query = $this->db->query("DELETE FROM `Geo_Settings` where id=? and OrganizationId=?",array($did,$orgid));
    $data['afft']=$this->db->affected_rows();
    if($data['afft'] > 0){
             if ($r=$query121->result()){
           $name  = $r[0]->Name;
                   $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           $module = "Settings";
           $actionperformed = " <b>".$name." Geo Location</b> has been <b>Deleted</b> from <b> Geo Fence</b> ";
           $activityby = 1;
           
            $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module,ActivityBy, ActionPerformed,adminid, OrganizationId) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$activityby,$actionperformed,$id,$orgid));
        }
    }
    }
    $this->db->close();
    echo json_encode($data);
   } 
   
   public function getemployeebygeolocation() {
     
    $result = array();
    $data = array();
     $orgid=$_SESSION['orgid'];
      $geoid=isset($_REQUEST['geoid'])?$_REQUEST['geoid']:'';
       //echo $geoid;
   
        $sql = "SELECT Id,EmployeeCode,FirstName,LastName FROM EmployeeMaster WHERE OrganizationId =? and area_assigned!= ? and archive=1 and Is_Delete=0 order by FirstName";
    
    $query = $this->db->query($sql,array($orgid,$geoid));
    
      foreach($query->result() as $row)
      {
        $res = array();
        $res['id'] = $row->Id;
        $res['name'] = $row->EmployeeCode." - ".ucwords(strtolower($row->FirstName." ".$row->LastName));
        $res['empfname'] = $row->FirstName;
        $res['emplname'] = $row->LastName;
        $res['sts']=0;
        $data[] = $res;
      }
    $result["data"] =$data;
    return $result;
    }
   
   public function SaveEmpGeoList() {
        $result = array();
        $data = array();
    $orgid=$_SESSION['orgid'];
     $geoid=isset($_REQUEST['geoid'])?$_REQUEST['geoid']:'';
   
     $zone=getTimeZone($orgid);
         date_default_timezone_set($zone);
     $today = date('Y-m-d');
         
        $query12112 = $this->db->query("SELECT `Id`, `OrganizationId`,`Lat_Long`,`Location`,`Radius`,`Name` FROM `Geo_Settings` WHERE  Id = '$geoid' ");
            $emplistarr = json_decode($_POST['emplist'], true);
           
            for($i=0; $i<count($emplistarr); $i++)
            {
                if($emplistarr[$i]['sts']==1 ){
          
          $empid = $emplistarr[$i]['id'];
          
          $sql = "update EmployeeMaster set area_assigned=? where OrganizationId =? and Id=?";
          
          $query = $this->db->query($sql,array($geoid,$orgid,$empid));
   
          if ($r=$query12112->result()){
          $sname  = $r[0]->Name;
          $id =$_SESSION['id'];
           
           $module = "Settings";
       $date = date("y-m-d H:i:s");
           $actionperformed = " <b>".$sname."</b> geo location has been assigned to <b>".ucwords(getEmpName($empid))." </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
           //var_dump($this->db->last_query());
          }
                }
            }
          
        $result["data"] =$data;
        return $result;
    } 
   function saveGeolocation()
   {
    $radius =  isset($_REQUEST['radius'])?$_REQUEST['radius']:0;
    $location =  isset($_REQUEST['location'])?$_REQUEST['location']:'';
    $latlong =  isset($_REQUEST['latlong'])?$_REQUEST['latlong']:'';
    $name =  isset($_REQUEST['name'])?$_REQUEST['name']:'';
    $id =  isset($_REQUEST['id'])?$_REQUEST['id']:0;
    $orgid = $_SESSION['orgid'];
    $data = array();
   
    
      $zone=getTimeZone($orgid);
      date_default_timezone_set($zone);
   
   
    if($id != 0)
    {
    $query = $this->db->query("UPDATE Geo_Settings SET Lat_Long=?,Location=?,Radius=?,Name=? WHERE Id = ? AND OrganizationId= ? " ,array($latlong,$location,$radius,$name,$id,$orgid));
     $res= $this->db->affected_rows();
       if($res)
       {
       $data['status']= true; 
       $data['sms']= "Location update successfull"; 
        
       }
       else
       {
         $data['status']= false; 
         $data['sms']= "There is some problem when update a location"; 
       }
       return $data;
    }
    else
    {
        $res=0;
      $query=$this->db->query("select Id from Geo_Settings where Name=? and OrganizationId=?",array($name,$orgid));
      if($query->num_rows()>0)
      {
       $res=2;  
       
      if($res==2)
         {  
         $data['status']= false; 
         $data['sms']= "Geo Center Name Already exist"; 
         }
         else
         {
           $data['status']= 'ok'; 
           $data['sms']= "There is some problem when insert a location"; 
         }
        return $data;
      }
      else
      {
        $query=$this->db->query("INSERT INTO  Geo_Settings (`OrganizationId`,`Lat_Long`,`Location`,`Radius`,`Name`) VALUES (?,?,?,?,?)",array($orgid,$latlong,$location,$radius,$name));
        $res= $this->db->affected_rows() ;
         if($res)
         { 
         $data['status']= true; 
         $data['sms']= "Geo center added successfully";
   
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           $module = "Settings";
           $actionperformed = " <b>".$name." Geo Location</b> is added from <b> Geo Fence.</b>";
           $activityby = 1;
           
            $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module,ActivityBy, ActionPerformed,adminid, OrganizationId) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module, $activityby,$actionperformed,$id,$orgid)); 
   
            // var_dump($this->db->last_query());
         }
         else
         {
           $data['status']= false; 
           $data['sms']= "There is some problem while creating geo fence"; 
         }
         return $data;
        }
       
    }
   
   }
   public function getoutsidefenceStatus(){
   $orgid = $_SESSION['orgid'];
   $sql = $this->db->query("select * FROM admin_login WHERE OrganizationId='$orgid'");
   return $sql->result();
   // echo $sql->result();
   
   }
   public function fencestatus(){
   
   $orgid = $_SESSION['orgid'];
   $id = $_SESSION['id'];
   $sts = isset($_REQUEST['sts'])?$_REQUEST['sts']:'';
   
    $zone=getTimeZone($orgid);
    date_default_timezone_set($zone);
   
   $this->db->query("update admin_login set fencearea='$sts' where OrganizationId=$orgid")
   ;
   
   if($this->db->affected_rows() > 0){
   
   
            
            
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>Fence Area Setting</b>  has been <b>updated  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
       }
   }
   
   
   public function addRate(){
      $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $rna=isset($_REQUEST['rna'])?$_REQUEST['rna']:'';
      $sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
      $rate=isset($_REQUEST['rate'])?$_REQUEST['rate']:0;
      $date=date('Y-m-d');
      $res=0;
      $query = $this->db->query("select Id from `HourlyRateMaster` where Rate=? and OrganizationId=? ",array($rate,$orgid));
      if($query->num_rows()>0)
        $res=2; // Rate already exist already exist
      else{
      $query = $this->db->query("INSERT INTO `HourlyRateMaster`(`Name`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`,`Rate`, `status`) VALUES (?,?,?,?,?,?,?,?)",array($rna,$orgid,$date,$id,$date,$id,$rate,$sts));
      $res= $this->db->affected_rows();
   
      if($res > 0 ){
       // $this->db->close();
      
      $query121 = $this->db->query("SELECT `Id`, `Name`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OrganizationId`, `Rate`, `status` FROM `HourlyRateMaster` WHERE Rate='$rate' and OrganizationId='$orgid' ");
            if ($r=$query121->result()){
              $hname  = $r[0]->Name;
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           
           $module = "Settings";
           $actionperformed = " New Hourly Rate <b>".$hname."</b>  has been <b> Added  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));
   
          }
      }
    }
      echo $res;
    }
}
   
   ?>