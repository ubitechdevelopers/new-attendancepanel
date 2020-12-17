 <?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Shift_model extends CI_Model {
   

  public function registerShift(){
         
       $orgid=$_SESSION['orgid'];
      $id=$_SESSION['id'];
      $sna=isset($_REQUEST['sna'])?$_REQUEST['sna']:'';
      $thours=isset($_REQUEST['thours'])?$_REQUEST['thours']:'';
      $autotimeout_sts=isset($_REQUEST['autotimeout_sts'])?$_REQUEST['autotimeout_sts']:'';
      $timeInfs=isset($_REQUEST['timeInfs'])?$_REQUEST['timeInfs']:'';

      //echo "pravesh";
       //echo $timeInfs;
      // echo $autotimeout_sts;
       //die();
      $res=0;
      $query = $this->db->query("select Id from `ShiftMaster` where Name=? and OrganizationId=?  ",array($sna,$orgid));
      if($query->num_rows()>0)
        $res=2; // Shift Name already exist 
      else
      {
      $ti=date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
      $to=date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
      $tib=date("H:i:s",strtotime(isset($_REQUEST['tib'])?$_REQUEST['tib']:''));
      $tob=date("H:i:s",strtotime(isset($_REQUEST['tob'])?$_REQUEST['tob']:''));
      $tig=date("H:i:s",strtotime(isset($_REQUEST['tig'])?$_REQUEST['tig']:''));
      $gto=date("H:i:s",strtotime(isset($_REQUEST['gto'])?$_REQUEST['gto']:''));
      // $tog=date("H:i:s",strtotime(isset($_REQUEST['tog'])?$_REQUEST['tog']:''));
      $bog=date("H:i:s",strtotime(isset($_REQUEST['bog'])?$_REQUEST['bog']:''));
      $big=date("H:i:s",strtotime(isset($_REQUEST['big'])?$_REQUEST['big']:''));
      $sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:1;
      $shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
      $date=date('Y-m-d');

      // echo $shifttype;
      // die();
      if($shifttype==3)
      {
                 $ti="";
                 $to="";
                 $tib="";
                 $tob="";
                 $tig="";
                 $gto="";
      }

            if($shifttype==1){     
      $query = $this->db->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`,`TimeOutGrace`,`TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`,`CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`,`BreakOutGrace`, `archive`,shifttype,AutoTimeoutHours,AutoTimeoutLoggedHoursStatus,HoursPerDay,MultipletimeStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)",array($sna,$ti,$to,$tig,$gto,$tib,$tob,$orgid,$date,$id,$date,$id,$id,$big,$bog,$sts,$shifttype,$thours,$autotimeout_sts,$timeInfs));
      }
      else{
        $query = $this->db->query("INSERT INTO `ShiftMaster`(`Name`, `TimeIn`, `TimeOut`, `TimeInGrace`,`TimeOutGrace`,`TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`,`CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`,`BreakOutGrace`, `archive`,shifttype,AutoTimeoutHours,AutoTimeoutLoggedHoursStatus,HoursPerDay) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($sna,$ti,$to,$tig,$gto,$tib,$tob,$orgid,$date,$id,$date,$id,$id,$big,$bog,$sts,$shifttype,$thours,$autotimeout_sts,$timeInfs));
      }
      //$res= $this->db->affected_rows($query);
      $lsid = $this->db->insert_id();
      // var_dump($this->db->last_query());
      //insert weekoff in this shift
        if($this->db->affected_rows($query)>0)
      {
      $sun=isset($_REQUEST['sun'])?$_REQUEST['sun']:'0,0,0,0,0';
      $mon=isset($_REQUEST['mon'])?$_REQUEST['mon']:'0,0,0,0,0';
      $tue=isset($_REQUEST['tue'])?$_REQUEST['tue']:'0,0,0,0,0';
      $wed=isset($_REQUEST['wed'])?$_REQUEST['wed']:'0,0,0,0,0';
      $thus=isset($_REQUEST['thus'])?$_REQUEST['thus']:'0,0,0,0,0';
      $fri=isset($_REQUEST['fri'])?$_REQUEST['fri']:'0,0,0,0,0';
      $sat=isset($_REQUEST['sat'])?$_REQUEST['sat']:'0,0,0,0,0';
      
     
      $user=0;
      $orgId=isset($_SESSION['orgid'])?$_SESSION['orgid']:$_REQUEST['refId']; 
      // ref id if fun called by mobile when not set session
      $zname='Asia/Kolkata';
      /////////////get time zone
        $zname=getTimeZone($orgId);
        date_default_timezone_set ($zname);
      //////////////get time zone///////////
      $today=date('Y-m-d');
      
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,1,?,?,?,?,'1')",array($sun,$orgId,$user,$today));
      
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,2,?,?,?,?,'1')",array($mon,$orgId,$user,$today));
      
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,3,?,?,?,?,'1')",array($tue,$orgId,$user,$today));
      
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,4,?,?,?,?,'1')",array($wed,$orgId,$user,$today));
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,5,?,?,?,?,'1')",array($thus,$orgId,$user,$today));
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,6,?,?,?,?,'1')",array($fri,$orgId,$user,$today));
      $query = $this->db->query("INSERT INTO `ShiftMasterChild`(`ShiftId`,`Day`,`WeekOff`, `OrganizationId`, `ModifiedBy`, `ModifiedDate`, `Archive`) VALUES ($lsid,7,?,?,?,?,'1')",array($sat,$orgId,$user,$today));

        


      $res= $this->db->affected_rows($query); 

      if($res > 0){
        $query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE Name = '$sna' ");
      if ($r=$query12112->result()){
              $sname  = $r[0]->Name;
              
          $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been <b>added</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

          }
      }


       }      
    }
      $this->db->close();
        echo $res;
         } 
 
     
   
       public function getshiftdata($sid) {
           $res = array();
           $orgid = $_SESSION['orgid'];
           $query = $this->db->query("Select * from ShiftMaster where Id = '$sid' AND OrganizationId = '$orgid' ");
           foreach ($query->result() as $row) {
               $data = array();
               $data['sti'] = $row->TimeIn;
               $data['sto'] = $row->TimeOut;
               $data['bsti'] = $row->TimeInBreak;
               $data['bsto'] = $row->TimeOutBreak;
               if ($row->TimeInGrace == '00:00:00') {
                   $data['tig'] = '-:-';
               } else {
                   $data['tig'] = date('h:i A', strtotime($row->TimeInGrace));
               }
               if ($row->TimeOutGrace == '00:00:00') {
                   $data['tog'] = '-:-';
               } else {
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

     public function getAllShift()
    {
			 $orgid=$_SESSION['orgid'];
			 $query = $this->db->query("SELECT  HoursPerDay,`Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `BreakInGrace`, `BreakOutGrace`,`archive`,TIMEDIFF(`TimeOut`,`TimeIn`) AS shifthpurs, TIMEDIFF(TIMEDIFF(`TimeOut`,`TimeIn`),TIMEDIFF(`TimeOutBreak`,`TimeInBreak`)) AS workhours,TIMEDIFF(`TimeOutBreak`,`TimeInBreak`) as breakhours,shifttype FROM `ShiftMaster` WHERE OrganizationId=? order by TimeIn",array($orgid));
			$d=array();
			$res=array();
			 foreach ($query->result() as $row)
			{
					$data=array();

					if($row->shifttype==3){
					$data['name']=$row->Name;
					$data['timein']='-';
					$data['timeout']='-';
					$data['timeingrace']='-';
					$data['timeoutgrace']='-';
					$data['timeinbreak']='-';
					$data['timeoutbreak']='-';
					}else{
					$data['name']=$row->Name;
					$data['timein']=substr($row->TimeIn,0,5);
					$data['timeout']=substr($row->TimeOut,0,5);
					$data['timeingrace']=$row->TimeInGrace;
					$data['timeoutgrace']=$row->TimeOutGrace;
					$data['timeinbreak']=substr($row->TimeInBreak,0,5);
					$data['timeoutbreak']=substr($row->TimeOutBreak,0,5);
				}
					
					if($row->shifttype==1)
					{
						if(strtotime($row->TimeIn) < strtotime($row->TimeOut))
						  {
							$a = new DateTime($row->TimeIn);
							$b = new DateTime($row->TimeOut);
							$interval1 = $a->diff($b);
							$data['shifthpurs']= $interval1->format("%H:%I");
							$a = new DateTime($interval1->format("%H:%I"));
						    $b = new DateTime(getShiftBreak($row->Id));
							$interval = $a->diff($b);
							$data['workhours']= $interval->format("%H:%I");
							//$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
						    //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
						  }
						  else
						  {
							    $time = "24:00:00";
								$secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
								$data['shifthpurs'] = date("H:i",strtotime($time)-$secs);
								$a = new DateTime($data['shifthpurs']);
								$b = new DateTime(getShiftBreak($row->Id));
								$interval = $b->diff($a);
								$data['workhours']= $interval->format("%H:%I");
						 }
						//$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
						//$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
					}elseif($row->shifttype == 3){
						//var_dump($row->HoursPerDay);
						$data['shifthpurs'] = date("H:i",strtotime($row->HoursPerDay));
						$data['workhours']=  date("H:i",strtotime($row->HoursPerDay));

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
								$secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
								$data['shifthpurs'] = date("H:i",strtotime($time)-$secs);
								$a = new DateTime($data['shifthpurs']);
								$b = new DateTime(getShiftBreak($row->Id));
								$interval = $b->diff($a);
								$data['workhours']= $interval->format("%H:%I");
					}

					//substr(trim($row->Overtime,"-!"),0,5);
					$data['shifttype']=$row->shifttype==1?'<div style="background-color:green;text-align:center;color:white;">Single Date</div>':'<div style="background-color:orange;text-align:center;color:white;">
					Multi Date</div>';

					if($row->shifttype==3){
						$data['shifttype']='<div style="background-color:#a523ac;text-align:center;color:white;">Flexi</div>';
					}
					//substr(trim($row->Overtime,"-!"),0,5);
					$data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
					Inactive</div>';
					/*
					$data['action']='<a href="#"><i class="material-icons editShift" style="font-size:26px" data-toggle="modal" title="Edit/View" data-sid="'.$row->Id.'"
					 data-sid="'.$row->Id.'" 
					 data-name="'.$row->Name.'" 
					 data-ti="'.date("g:i A", strtotime($row->TimeIn)).'" 
					 data-to="'.date("g:i A", strtotime($row->TimeOut)).'" 
					 data-tig="'.date("g:i A", strtotime($row->TimeInGrace)).'"
					 data-tog="'.date("g:i A", strtotime($row->TimeOutGrace)).'"
					 data-tib="'.date("g:i A", strtotime($row->TimeInBreak)).'"
					 data-tob="'.date("g:i A", strtotime($row->TimeOutBreak)).'"
					 data-big="'.date("g:i A", strtotime($row->BreakInGrace)).'"
					 data-bog="'.date("g:i A", strtotime($row->BreakOutGrace)).'"
					 data-sts="'.$row->archive.'"
					data-target="#addShiftE">edit</i></a>
					<i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>
					'; */














					if($row->Name == 'Trial Shift')
					{


           // $data['action'] =' <div class="dropdown">
                                 
                                   // <!-- three dots -->
                                   // <ul data-toggle="dropdown"
                                         // aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       // <li></li>
                                       // <li></li>
                                       // <li></li>
                                   // </ul>
                                   // <span class="caret"></span>
                                 
                                 // <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">

                                 // <li class="test editShift" style="height:30px;" ><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"
                                 // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Update"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Update</a></li>

          // <li class="deleteShift" style="height:30px;" data-toggle="modal" data-target="#delShift"  
             // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

             // <li class="upShift" style="height:30px;" data-toggle="modal" data-target="#updateShift"  
             // onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
             // </ul>
             // </div> ';




				    $data['action'] = '<i class="test editShift  fas fa-edit" style="font-size:24px; color:aqua"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update"  ></i>
        
           <i class="deleteShift fa fa-trash" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i>
           
           
          <i class="upShift fa fa-check-square-o" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';

				    }
				    elseif($row->archive==0)
				    {

                // $data['action'] =' <div class="dropdown">
                                 
                                   // <!-- three dots -->
                                   // <ul data-toggle="dropdown"
                                         // aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       // <li></li>
                                       // <li></li>
                                       // <li></li>
                                   // </ul>
                                   // <span class="caret"></span>
                                 
                                 // <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">

                                 // <li class="test editShift" style="height:30px;" ><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"
                                 // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Update"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Update</a></li>

          // <li class="deleteShift" style="height:30px;" data-toggle="modal" data-target="#delShift"  
             // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

             // <li class="upShift" style="height:30px;" data-toggle="modal" data-target="#updateShift"  
             // onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
             // </ul>
             // </div> ';







				    	$data['action'] = $data['action'] = '<i class="test editShift  fas fa-edit" style="font-size:24px; color:red;"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update"  ></i>
        
           <i class="deleteShift fa fa-trash" style="font-size:24px; color:black;" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i>
           
           
          <i class="upShift fa fa-check-square-o" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';

				   	}
				    else
				    {

              
                // $data['action'] =' <div class="dropdown">
                                 
                                   // <!-- three dots -->
                                   // <ul data-toggle="dropdown"
                                         // aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                       // <li></li>
                                       // <li></li>
                                       // <li></li>
                                   // </ul>
                                   // <span class="caret"></span>
                                 
                                 // <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.3rem; height:6.5rem; border-radius:5px; padding: 0.7rem 0.5rem 0.5rem 0.5rem;margin-left:-25%">

                                 // <li class="test editShift" style="height:30px;" ><i class="fa fa-pencil  material-icons" style="font-size:16px; margin:0px 8px 0px 6px;"
                                 // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Update"></i><a href="#" style="color:black; font-size:13px; margin-left:5px;">Update</a></li>

          // <li class="deleteShift" style="height:30px;" data-toggle="modal" data-target="#delShift"  
             // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"><i class="fa fa-trash" style="font-size:16px; margin:0px 8px 0px 6px;"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"  title="Delete Client"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Delete</a></li>

             // <li class="upShift" style="height:30px;" data-toggle="modal" data-target="#updateShift"  
             // onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'"><i class="fa fa-check-square-o" style="font-size:16px; margin:0px 8px 0px 6px;"  onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          // data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign"></i> <a href="#" style="color:black; font-size:13px; margin-left:5px;">Assign</a></li>
             // </ul>
             // </div> ';



				    $data['action'] = '<i class="test editShift  fas fa-edit" style="font-size:24px; color:red"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update"  ></i>
        
         <i class="deleteShift fa fa-trash" style="font-size:24px; color:black;" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i>
           
           
         <i class="upShift fa fa-check-square-o" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
				    }
					$res[]=$data;
			}  	
			$d['data']=$res; 
			 $this->db->close();
			echo json_encode($d);
			return false;
    }
   
  // Delete function 
   //
   //

   public function delshiftsss()
    {
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
       // $this->db->close();
      echo json_encode($data);

      if($data['afft'] > 0){



      if ($r=$query12112->result()){
              $sname  = $r[0]->Name;
            $date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been <b> Deleted.  </b>.";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

          }
        }

    }


     public function getEditShift($sid)
    {
       
       $orgid=$_SESSION['orgid'];
       $query = $this->db->query("SELECT  HoursPerDay,`Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `BreakInGrace`, `BreakOutGrace`,`archive`,TIMEDIFF(`TimeOut`,`TimeIn`) AS shifthpurs, TIMEDIFF(TIMEDIFF(`TimeOut`,`TimeIn`),TIMEDIFF(`TimeOutBreak`,`TimeInBreak`)) AS workhours,TIMEDIFF(`TimeOutBreak`,`TimeInBreak`) as breakhours,shifttype FROM `ShiftMaster` WHERE OrganizationId=? AND Id=$sid  order by TimeIn",array($orgid));
      
      $d=array();
      $res=array();
       foreach ($query->result() as $row)
      {
          $data=array();

          if($row->shifttype==3){
          $data['name']=$row->Name;
          $data['timein']='-';
          $data['timeout']='-';
          $data['timeingrace']='-';
          $data['timeoutgrace']='-';
          $data['timeinbreak']='-';
          $data['timeoutbreak']='-';
          }else{
          $data['name']=$row->Name;
          $data['timein']=substr($row->TimeIn,0,5);
          $data['timeout']=substr($row->TimeOut,0,5);
          $data['timeingrace']=$row->TimeInGrace;
          $data['timeoutgrace']=$row->TimeOutGrace;
          $data['timeinbreak']=substr($row->TimeInBreak,0,5);
          $data['timeoutbreak']=substr($row->TimeOutBreak,0,5);
        }
          
          if($row->shifttype==1)
          {
            if(strtotime($row->TimeIn) < strtotime($row->TimeOut))
              {
              $a = new DateTime($row->TimeIn);
              $b = new DateTime($row->TimeOut);
              $interval1 = $a->diff($b);
              $data['shifthpurs']= $interval1->format("%H:%I");
              $a = new DateTime($interval1->format("%H:%I"));
                $b = new DateTime(getShiftBreak($row->Id));
              $interval = $a->diff($b);
              $data['workhours']= $interval->format("%H:%I");
              //$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
                //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
              }
              else
              {
                  $time = "24:00:00";
                $secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
                $data['shifthpurs'] = date("H:i",strtotime($time)-$secs);
                $a = new DateTime($data['shifthpurs']);
                $b = new DateTime(getShiftBreak($row->Id));
                $interval = $b->diff($a);
                $data['workhours']= $interval->format("%H:%I");
             }
            //$data['shifthpurs']=substr(ltrim($row->shifthpurs,'-'),0,5);
            //$data['workhours']=substr(trim($row->workhours,"-!"),0,5);
          }elseif($row->shifttype == 3){
            //var_dump($row->HoursPerDay);
            $data['shifthpurs'] = date("H:i",strtotime($row->HoursPerDay));
            $data['workhours']=  date("H:i",strtotime($row->HoursPerDay));

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
                $secs = strtotime($row->TimeIn)-strtotime($row->TimeOut);
                $data['shifthpurs'] = date("H:i",strtotime($time)-$secs);
                $a = new DateTime($data['shifthpurs']);
                $b = new DateTime(getShiftBreak($row->Id));
                $interval = $b->diff($a);
                $data['workhours']= $interval->format("%H:%I");
          }
          //substr(trim($row->Overtime,"-!"),0,5);
          $data['shifttype']=$row->shifttype==1?'<div style="background-color:green;text-align:center;color:white;">Single Date</div>':'<div style="background-color:orange;text-align:center;color:white;">
          Multi Date</div>';

          if($row->shifttype==3){
            $data['shifttype']='<div style="background-color:#a523ac;text-align:center;color:white;">Flexi</div>';
          }
          //substr(trim($row->Overtime,"-!"),0,5);
          $data['status']=$row->archive==1?'<div style="background-color:green;text-align:center;color:white;">Active</div>':'<div style="background-color:red;text-align:center;color:white;">
          Inactive</div>';
          /*
          $data['action']='<a href="#"><i class="material-icons editShift" style="font-size:26px" data-toggle="modal" title="Edit/View" data-sid="'.$row->Id.'"
           data-sid="'.$row->Id.'" 
           data-name="'.$row->Name.'" 
           data-ti="'.date("g:i A", strtotime($row->TimeIn)).'" 
           data-to="'.date("g:i A", strtotime($row->TimeOut)).'" 
           data-tig="'.date("g:i A", strtotime($row->TimeInGrace)).'"
           data-tog="'.date("g:i A", strtotime($row->TimeOutGrace)).'"
           data-tib="'.date("g:i A", strtotime($row->TimeInBreak)).'"
           data-tob="'.date("g:i A", strtotime($row->TimeOutBreak)).'"
           data-big="'.date("g:i A", strtotime($row->BreakInGrace)).'"
           data-bog="'.date("g:i A", strtotime($row->BreakOutGrace)).'"
           data-sts="'.$row->archive.'"
          data-target="#addShiftE">edit</i></a>
          <i class="deleteShift fa fa-trash" style="font-size:24px; color:purple" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Delete" ></i>
          '; */
          
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
          if($row->Name == 'Trial Shift')
          {
           $data['action'] = '<a href = "#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="upShift fa fa-check-square-o" style="font-size:24px; color:purple" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
            }
            elseif($row->archive==0)
            {
              $data['action'] = '<i class="udateShift fas fa-edit" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i> 
              
              <i class="deleteShift fa fa-trash" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i>
              
              <i class="upShift fas fa-check-square" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift1" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
              data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
                }
            else
            {
           $data['action'] = '<i class="test  udateShift fas fa-edit" style="font-size:24px; color:aqua"  data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i>
        
           <i class="deleteShift fa fa-trash" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#delShift" data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Update" ></i>
		   
           
           
          <i class="upShift fas fa-check-square" style="font-size:24px; color:aqua" data-toggle="modal" data-target="#updateShift" onclick="angular.element(this).scope().GetEmpList(\''.$row->Id.'\')" 
          data-sid="'.$row->Id.'" data-sname="'.$row->Name.'" title="Assign" ></i>';
		  
		  
		  
            }
          $res[]=$data;
      }   
      $d['data']=$res; 
       $this->db->close();
     // echo json_encode($d);
      return $d;
    } 



	public function fetchWeeklyOff($sid){
			
           $shiftid = $sid;
			// var_dump($shiftid);
         
             
		 $orgId=isset($_SESSION['orgid'])?$_SESSION['orgid']:0;
			$data=array();
			$res=array();
      $query = $this->db->query("select * from ShiftMasterChild WHERE `OrganizationId`=$orgId  AND ShiftId = $shiftid");
      
			if($this->db->affected_rows()>0)
			foreach($query->result() as $row)
			{
				$data['week']=$row->WeekOff;
				$data['day']=$row->Day ;
				$res[]=$data;
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
			$d['data']=$res;  
            $this->db->close();			//$query->result();
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
			$orgid=$_SESSION['orgid'];
			$id=$_SESSION['id'];
			$sna=isset($_REQUEST['sna'])?$_REQUEST['sna']:'';
			$sid=isset($_REQUEST['sid'])?$_REQUEST['sid']:'';
			$shifttype=isset($_REQUEST['shifttype'])?$_REQUEST['shifttype']:0;
			$sts=isset($_REQUEST['sts'])?$_REQUEST['sts']:0;
			$timeInfs=isset($_REQUEST['timeInfs'])?$_REQUEST['timeInfs']:'';
			$date=date('Y-m-d');
			$res=0;

			
			$query = $this->db->query("select Id from `ShiftMaster` where Name=? and OrganizationId=? and Id !=? ",array($sna,$orgid,$sid));
			
			if($query->num_rows()>0)
				{
					$res= 2;// Shift Name already exist 
				} 
			
		 	// $query = $this->db->query("select Id from `AttendanceMaster` where OrganizationId=? and ShiftId=? ",array($orgid,$sid));
		 	
	  		// if($query->num_rows()>0)
				// {
				// $res= 3; // Shift  already exist in AttendanceMaster
				// }
			else
			{
			$ti=date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
			$to=date("H:i:s",strtotime(isset($_REQUEST['to'])?$_REQUEST['to']:''));
			$tib=date("H:i:s",strtotime(isset($_REQUEST['tib'])?$_REQUEST['tib']:''));
			$tob=date("H:i:s",strtotime(isset($_REQUEST['tob'])?$_REQUEST['tob']:''));

			// var_dump($tob);
			// die;
			$tig=date("H:i:s",strtotime(isset($_REQUEST['tig'])?$_REQUEST['tig']:''));
			$tog=date("H:i:s",strtotime(isset($_REQUEST['tog'])?$_REQUEST['tog']:''));

			if($shifttype==3)
			{
                 $ti="";
                 $to="";
                 $tib="";
                 $tob="";
                 $tig="";
                 $tog="";
			}

			
			$query = $this->db->query("UPDATE `ShiftMaster` SET `Name`=?,`LastModifiedDate`=?, `LastModifiedById`=?,`TimeInGrace`=?,`TimeOutGrace`=?,  `archive`=?, `TimeIn`=?, `TimeOut`=?,`TimeInBreak`=?, `TimeOutBreak`=?,shifttype=?,HoursPerDay=? where id=? and OrganizationId=?",array($sna,$date,$id,$tig,$tog,$sts,$ti,$to,$tib,$tob,$shifttype,$timeInfs,$sid,$orgid));

			// var_dump($this->db->last_query());
			// die;
			  $res1=$this->db->affected_rows($query);

			  if($res1>0)
			  {
			  	$query12112 = $this->db->query("SELECT `Id`, `Name`, `TimeIn`, `TimeOut`, `TimeInGrace`, `TimeOutGrace`, `TimeInBreak`, `TimeOutBreak`, `OrganizationId`, `CreatedDate`, `CreatedById`, `LastModifiedDate`, `LastModifiedById`, `OwnerId`, `BreakInGrace`, `BreakOutGrace`, `archive`, `shifttype` FROM `ShiftMaster` WHERE Name = '$sna' ");
			if ($r=$query12112->result()){
							$sname  = $r[0]->Name;
							
					$date = date("y-m-d H:i:s");
           $orgid =$_SESSION['orgid'];
           $id =$_SESSION['id'];
           
           $module = "Settings";
           $actionperformed = " <b>".$sname."</b> shift has been <b>updated</b>";
           $activityby = 1;
           
           $query = $this->db->query("INSERT INTO ActivityHistoryMaster( LastModifiedDate,LastModifiedById,Module, ActionPerformed, OrganizationId,ActivityBy,adminid) VALUES (?,?,?,?,?,?,?)",array($date,$id,$module,$actionperformed,$orgid,$activityby,$id));

					}
			  	$res=1;
			  }
			  else
			  {
				$sun=isset($_REQUEST['sun'])?$_REQUEST['sun']:'0,0,0,0,0';
				$mon=isset($_REQUEST['mon'])?$_REQUEST['mon']:'0,0,0,0,0';
				$tue=isset($_REQUEST['tue'])?$_REQUEST['tue']:'0,0,0,0,0';
				$wed=isset($_REQUEST['wed'])?$_REQUEST['wed']:'0,0,0,0,0';
				$thus=isset($_REQUEST['thus'])?$_REQUEST['thus']:'0,0,0,0,0';
				$fri=isset($_REQUEST['fri'])?$_REQUEST['fri']:'0,0,0,0,0';
				$sat=isset($_REQUEST['sat'])?$_REQUEST['sat']:'0,0,0,0,0';
				//var_dump($sun);
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=1",array($sun));
				$res2=$this->db->affected_rows($query);
				if($res2>0)
				{
				$res=1;
				}

				
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=2",array($mon));
				$res3=$this->db->affected_rows($query);
				if($res3>0)
				{

					$res=1;
				}
				
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=3",array($tue));
				$res4=$this->db->affected_rows($query);
				if($res4>0)
				{
					$res=1;
				}

				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=4",array($wed));
				$res5=$this->db->affected_rows($query);
				if($res5>0 )
				{
					$res=1;
				}

				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=5",array($thus));
				$res6=$this->db->affected_rows($query);
				if($res6>0 )
				{
					$res=1;
				}

				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=6",array($fri));
				$res7=$this->db->affected_rows($query);
				if($res7>0 )
				{
					$res=1;
				}
				
				$query = $this->db->query("update `ShiftMasterChild` set `WeekOff`=? where `ShiftId`=$sid and `Day`=7",array($sat));
				$res8=$this->db->affected_rows($query);
				if($res8>0 )
				{
					

					$res=1;
				}
				
			}
			
			}
			 $this->db->close();
			 echo $res;


		}		

   }
   ?>