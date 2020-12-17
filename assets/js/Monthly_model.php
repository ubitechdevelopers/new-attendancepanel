<?php
class Monthly_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
		include(APPPATH."PhpMailer/class.phpmailer.php");
		include(APPPATH . "s3.php");
    }
public function getattRoastermonthly_count()
  {
	  $orgid=$_SESSION['orgid'];
	$res 	= 	array();
    $result = 	array();
	$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';
	$emplid=isset($_REQUEST['empl'])?$_REQUEST['empl']:'';
	$deprtid=isset($_REQUEST['deprt'])?$_REQUEST['deprt']:'';
	$shiftid=isset($_REQUEST['shift'])?$_REQUEST['shift']:'';
	//echo $deprtid;
		$q = "";
		$startdate='';
		$enddate='';
						$d = 0;
						$de = "";
						if($date != '')
						{
					        $date1 = '01-'.$date;
							$de = date('Y-m-t',strtotime($date1));
						}
						else
						{
							$de = date('Y-m-d');
						}
		//////////////////////////////////////////////////////////////////////////
				$q1 = '';
				if($emplid!=0)
				{
					$q1.=" AND `id`='$emplid'";
				}
				if($deprtid!=0)
				{
					 $q1.=" AND `Department` = '$deprtid' ";
				}
				if($shiftid!=0)
				{
			     $q1.= " AND `Shift`='$shiftid' ";
			    }
				$sql = $this->db->query("SELECT count(Id) as Totalemp from EmployeeMaster where OrganizationId=? $q1 and archive = '1'  AND Is_Delete = 0  order by Firstname ",array($orgid));
				if($row = $sql->row())
				{
					echo $row->Totalemp;
				}
				
  }
   public function getattRoastermonthly1() //// for count of list of present absent holiday week off //
{
$orgid=$_SESSION['orgid'];
$res = array();
    $result = array();
$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';
$emplid=isset($_REQUEST['empl'])?$_REQUEST['empl']:'';
$deprtid=isset($_REQUEST['deprt'])?$_REQUEST['deprt']:'';
$shiftid=isset($_REQUEST['shift'])?$_REQUEST['shift']:'';
$areaid=isset($_REQUEST['areaid'])?$_REQUEST['areaid']:'';
$desgid=isset($_REQUEST['desg'])?$_REQUEST['desg']:'';
// var_dump($desgid);
// var_dump($deprtid);
// $begin=isset($_REQUEST['begin'])?$_REQUEST['begin']:'0';
// $end=isset($_REQUEST['end'])?$_REQUEST['end']:'0';
$q = "";
$startdate='';
$enddate='';
$d = 0;
$de = "";
if($date != '')
{
$date1 = '01-'.$date;
$de = date('Y-m-t',strtotime($date1));
}
else
{
$de = date('Y-m-d');
}
//////////////////////////////////////////////////////////////////////////
$q1 = '';
if($emplid!=0)
{
$q1.=" AND `id`='$emplid'";
}
if($deprtid!=0)
{
$q1.=" AND `Department` = '$deprtid' ";
}
if($desgid!=0)
{
$q1.=" AND `Designation` = '$desgid' ";
}
if($shiftid!=0)
{
    $q1.= " AND `Shift`='$shiftid' ";
   }
if($areaid!=0)
{
    $q1.= " AND `area_assigned`='$areaid' ";
   }
          //////////////////////////////////////////////////////
 $totalemp = 0;


        $sql = $this->db->query("SELECT Id,if(Lastname!='NULL',CONCAT(Firstname,' ',Lastname),Firstname) as name,EmployeeCode,DOL,DOC,Shift,Designation from EmployeeMaster where OrganizationId=? $q1 and archive = '1'  AND Is_Delete = 0  order by Firstname",array($orgid));

        // var_dump($this->db->last_query());
        // die();

       // $sql = $this->db->query("SELECT Id,CONCAT(Firstname,' ',Lastname) as name,EmployeeCode,DOL,DOC,Shift from EmployeeMaster where OrganizationId=? $q1 and archive = '1'  AND Is_Delete = 0  order by Firstname  ",array($orgid));
        $dateval = array();
        foreach($sql->result() as $rows)
        {  
$present = 0;
$absent  = 0;
$weekoff = 0;
$holyday = 0;
$halfday = 0;
$leave   = 0;

if($date != '')
{
$arr=explode('-',$date);
$arr[0]=date('m',strtotime($arr[0]));
$d=cal_days_in_month(CAL_GREGORIAN,$arr[0],$arr[1]);
$a = $d."-".$date;
$b = "01-".$date;
$enddate= date('Y-m-d',strtotime($a));
$startdate= date('Y-m-d',strtotime($b));
//$q ="AND AttendanceDate BETWEEN  '$startdate' AND '$enddate' ";
}
else
{


$enddate=date('Y-m-t');
$startdate=date('Y-m-01');
//$q=" AND  `AttendanceDate` BETWEEN  '$startdate' AND '$enddate' ";
}
       $dateval = array();
       $data =  array();
  $emplid = $rows->Id;
$data['nadatevalme']= ucwords($rows->name);
$data['department']= ucwords(getDepartmentByEmpID($rows->Id));
$data['designation']= ucwords(getDesignationByEmpID($rows->Id));
$data['shift']= ucwords(getShift($rows->Shift));
//print_r($data['department']);
if($rows->EmployeeCode != "")
$data['empcode'] = $rows->EmployeeCode;
   else
$data['empcode'] = "-";
   $data['totaldurations']=$this->workinghourofmonthlysummary($emplid,$startdate,$enddate);
$data['shifthours']=$this->ShiftHours($emplid,$startdate,$enddate);
$data['lateby']=$this->LateBy1($emplid,$startdate,$enddate);
$data['latecount']=$this->LateCount($emplid,$startdate,$enddate);
$data['earlycount']=$this->EarlyCount($emplid,$startdate,$enddate);
$data['earlyby']=$this->EarlyBy1($emplid,$startdate,$enddate);


//print_r($data['totaldurations']);
// print_r($data['lateby']);
$timein="";
$timeout="";

$timeindate="";
$timeoutdate="";
$latecome="";
$earlyleave="";
$undertime="";
$officehour="";

$overtime='';
$timefrom="";

$temp= array();

       $temptimein  = array();
       $temptimeout = array();
       $temptimeoutdate = array();
       $temptimeindate = array();
       $latecommers = array();
       $earlyleavers= array();
$overtiming= array();
$undertiming=array();
       $officehours = array();
       $timefromoff = array();


while($startdate <= $enddate)
{
   $dateval[] =date('dS M',strtotime($startdate));
if( $startdate != date('Y-m-d'))

$sql="SELECT A.ShiftId,A.TimeIn,A.TimeOut,A.timeindate,A.timeoutdate,A.AttendanceStatus,S.TimeIn as shifttimein,S.TimeOut as shifttimeout,
SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(concat(A.timeoutdate,' ',A.TimeOut),concat(A.timeindate,' ',A.TimeIn)) ) ) as over,SEC_TO_TIME(
CASE WHEN (A.TimeOut > S.TimeOutBreak) THEN TIME_TO_SEC( TIMEDIFF(CONCAT(A.AttendanceDate,' ',S.TimeOut),CONCAT(A.AttendanceDate,' ',S.TimeIn))) ELSE TIME_TO_SEC(TIMEDIFF(CONCAT(A.AttendanceDate,' ',S.TimeOut),CONCAT(A.AttendanceDate,' ',S.TimeIn)) - TIME_TO_SEC( TIMEDIFF(concat(A.AttendanceDate,' ',S.TimeOutBreak),concat(A.AttendanceDate,' ',S.TimeInBreak))))
END ) as under FROM AttendanceMaster A,ShiftMaster S
WHERE A.OrganizationId=? and  A.EmployeeId='$emplid' AND A.AttendanceDate ='$startdate' AND S.Id=A.ShiftId";

else
$sql="SELECT A.ShiftId,A.TimeIn,A.TimeOut,A.timeindate,A.timeoutdate,A.AttendanceStatus,'00:00:00' as officehour,
   '00:00:00' as overtime,S.TimeIn as shifttimein,S.TimeOut as shifttimeout,'00:00:00' as over,'00:00:00' as under,'00:00:00' as undertime FROM AttendanceMaster A,ShiftMaster S
WHERE A.OrganizationId=? and  A.EmployeeId='$emplid' AND A.AttendanceDate = '$startdate' AND S.Id=A.ShiftId";

$query = $this->db->query($sql,array($orgid));
//echo $this->db->affected_rows();
if($this->db->affected_rows()>0)
foreach($query->result() as $row)
{

$sts = $row->AttendanceStatus;
//echo $startdate;
$shiftid =$row->ShiftId;
$timein=substr($row->TimeIn,0,-3);
$timeout=substr($row->TimeOut,0,-3);
$timeindate1=$row->timeindate;
if($timeindate1=='0000-00-00'){
$timeindate1='-';
}else{
$timeindate1=date('d-M',strtotime($row->timeindate));
}

// echo $timeindate ;
$timeoutdate1=$row->timeoutdate;
if($timeoutdate1=='0000-00-00'){
$timeoutdate1='-';
}else{
$timeoutdate1=date('d-M', strtotime($row->timeoutdate));
}

// echo $timeoutdate ;
$timefrom=$this->timeoffmonthly($emplid,$startdate);
$shifttimein=substr($row->shifttimein,0,-3);
$shifttimeout=substr($row->shifttimeout,0,-3);
$over=substr($row->over,0,-3);
$under=substr($row->under,0,-3);

{
$sql1=$this->db->query("SELECT TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) as latecommers FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) And A.AttendanceDate = '$startdate' And E.Is_Delete=0 And A.timeindate!='0000-00-00' And S.shifttype!=3 And  A.EmployeeId='$emplid'");
  if($this->db->affected_rows($sql1))
                       {
if($row1=$sql1->row())
{
                          if($row1->latecommers!='' || $row1->latecommers=='00:00:00')
                          {
                          $latecome=substr($row1->latecommers, 0,5);
                          }
                          else
                          {
                          $latecome="00:00";
                          }
}
   }
   else
   {
    $latecome="00:00";
   }

$sql2=$this->db->query("SELECT (CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END) as earlyleave FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate`='$startdate' And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And S.shifttype!=3 And A.timeoutdate!='0000-00-00' And A.EmployeeId='$emplid'");


  if($this->db->affected_rows($sql2))
                       {
   if($row2=$sql2->row())
{
                          if($row2->earlyleave!='')
                          {
                          $earlyleave=substr($row2->earlyleave, 0,5);
                          }
                          else
                          {
                          $earlyleave="00:00";
                          }
}
}
else
{
$earlyleave="00:00";
}



                     $sql3=$this->db->query("SELECT (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as overtime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate`='$startdate' And A.`EmployeeId`='$emplid' And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='0000-00-00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) > (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END)");

                         //var_dump($this->db->last_query());
                         //die();
  if($this->db->affected_rows($sql3))
                       {
   if($row3=$sql3->row())
{
                          if($row3->overtime!='' || $row3->overtime=='00:00:00')
                          {
                          $overtime=substr($row3->overtime, 0,5);
                          }
                          else
                          {
                          $overtime="00:00";
                          }
}
  }
  else
  {
                            $overtime="00:00";
  }



     $sql4=$this->db->query("SELECT (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as undertime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate` = '$startdate' And A.`EmployeeId`='$emplid' And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='0000-00-00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) < (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END)");


  if($this->db->affected_rows($sql4))
                       {
   if($row4=$sql4->row())
{
                          if($row4->undertime!='')
                          {
                          $undertime=substr($row4->undertime, 1,5);
                          }
                          else
                          {
                          $undertime="00:00";
                          }
}
  }
  else
  {
     $undertime="00:00";
  }


  $sql5=$this->db->query("SELECT A.timeoutdate,A.timeindate,A.TimeIn,A.TimeOut,A.AttendanceStatus,A.`TotalLoggedHours` as officehour FROM AttendanceMaster A, ShiftMaster S WHERE A.OrganizationId='$orgid' and A.EmployeeId='$emplid' AND A.AttendanceDate = '$startdate' AND S.Id=A.ShiftId And A.TimeIn!='00:00:00' And A.TimeOut!='00:00:00' And A.`timeindate`!='0000-00-00' AND A.timeoutdate!='0000-00-00'");

      //var_dump($this->db->last_query());

  if($this->db->affected_rows($sql5))
                       {
   if($row5=$sql5->row())
{
//$officehour=substr($row5->officehour,0,5);
if($row5->officehour!='')
{
$officehour=substr($row5->officehour,0,5);
}
else
{
$officehour = '00:00';
}
}
  }
  else
  {
  $officehour = '00:00';
  }




}


$symbol = "";
//$title = "";
if($sts == 1)
{
$present++;
$symbol="P";
}
else if($sts == 2)
{
$absent++;
$symbol ='A';
// $timein='00:00';
// $timeout='00:00';
// $latecome='00:00';
// $earlyleave='00:00';
// $overtime='00:00';
// $undertime='00:00';
// $officehour='00:00';
// $timefrom='00:00';
// $timeindate1='-';
// $timeoutdate1='-';
}
else if($sts == 3 )
{
if($row->TimeIn!='00:00:00')
{
$present++;
$symbol="P/WO";

}
else
{
$weekoff++;
$symbol ='WO';
$timein='00:00';
$timeout='00:00';
$timeoutdate1='-';
$timeindate1='-';
$latecome='00:00';
$earlyleave='00:00';
$overtime='00:00';
$undertime='00:00';
$officehour='00:00';
$timefrom='00:00';
}

}

elseif($sts == 5){

if($row->TimeIn!='00:00:00')
{
$present++;
$symbol="P/H";

}
else
{
$holyday++;
$symbol ='WO';
$timein='00:00';
$timeout='00:00';
$timeoutdate1='-';
$timeindate1='-';
$latecome='00:00';
$earlyleave='00:00';
$overtime='00:00';
$undertime='00:00';
$officehour='00:00';
$timefrom='00:00';
}





}
else if($sts == 4)
{
$halfday++;
$symbol = 'HD';
$earlyleavehalf=$this->earlyleavehalfday($emplid,$startdate);
if($earlyleavehalf!=null)
{
$earlyleave=$earlyleavehalf;
}
else
{
$earlyleave='-';
}
$overtime='00:00';
$undertime='00:00';
}

else if($sts == 5)
{
$symbol = 'H';
$holyday++;
}
else if($sts == 6){
$leave++;
$symbol = 'L';
$timein='00:00';
$timeout='00:00';
$latecome='00:00';
$earlyleave='00:00';
$overtime='00:00';
$undertime='00:00';
$officehour='00:00';
$timefrom='00:00';
$timeoutdate1='-';
$timeindate1='-';
}
else if($sts == 7)
{
 $symbol = "CO";
}
else if($sts == 8)
{
$symbol = "WFH";
}
else

$symbol = "-";
$temp[] = $symbol;
}


else
{
$timein='00:00';
$timeout='00:00';
$latecome='00:00';
$earlyleave='00:00';
$overtime='00:00';
$undertime='00:00';
$officehour='00:00';
$timefrom='00:00';
$timeoutdate1='-';
$timeindate1='-';

if(date('Y-m-d')>$startdate)
{
$t = $this->getweeklyoff($startdate,$shiftid,$emplid);
$temp[]  = $t;
if($t=="WO")
{
  $weekoff++;
}
else if($t=="H")
{
$holyday++;
}

}
else

$temp[] = "-";
}


$startdate = date('Y-m-d', strtotime($startdate . ' +1 days'));
 
 
$temptimein[] = $timein;
$temptimeout[] = $timeout;
$temptimeoutdate[] = $timeoutdate1;
$temptimeindate[] = $timeindate1;
$latecommers[] = $latecome;
$earlyleavers[] = $earlyleave;
$overtiming[]   = $overtime;
$undertiming[]  = $undertime;
$officehours[]  = $officehour;
$timefromoff[]  = $timefrom;

 }

$data['sts']=$temp;
$data['timein']=$temptimein;
$data['timeout']=$temptimeout;
$data['timeoutdate']=$temptimeoutdate;
$data['timeindate']=$temptimeindate;
$data['latecome']=$latecommers;
$data['earlyleave']=$earlyleavers;
$data['overtime']=$overtiming;
$data['undertimee']=$undertiming;
$data['officehours']=$officehours;
$data['timeoff']=$timefromoff;

$data['present']=$present;
$data['absent']=$absent;
$data['weekoff']=$weekoff;
$data['holyday']=$holyday;
$data['halfday']=$halfday;
$data['leave']=$leave;
$res[] = $data;

}

$result['data']= $res;
$result['date']= $dateval;
   return($result);


} 

public function getattRoastermonthly() //// for count of list of present absent holiday week off //
	{
	$orgid=$_SESSION['orgid'];
	$res 	= 	array();
    $result = 	array();
	$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';
	$emplid=isset($_REQUEST['empl'])?$_REQUEST['empl']:'';
	$deprtid=isset($_REQUEST['deprt'])?$_REQUEST['deprt']:'';
	$shiftid=isset($_REQUEST['shift'])?$_REQUEST['shift']:'';
	$areaid=isset($_REQUEST['areaid'])?$_REQUEST['areaid']:'';
	$desgid=isset($_REQUEST['desg'])?$_REQUEST['desg']:'';
	// var_dump($desgid);
	// var_dump($deprtid);
	$begin=isset($_REQUEST['begin'])?$_REQUEST['begin']:'0';
	$end=isset($_REQUEST['end'])?$_REQUEST['end']:'0';
		$q = "";
		$startdate='';
		$enddate='';
						$d = 0;
						$de = "";
						if($date != '')
						{
							$date1 = '01-'.$date;
							$de = date('Y-m-t',strtotime($date1));
						}
						else
						{
							$de = date('Y-m-d');
						}
		//////////////////////////////////////////////////////////////////////////
				$q1 = '';
				if($emplid!=0)
				{
					$q1.=" AND `id`='$emplid'";
				}
				if($deprtid!=0)
				{
					 $q1.=" AND `Department` = '$deprtid' ";
				}
				if($desgid!=0)
				{
					 $q1.=" AND `Designation` = '$desgid' ";
				}
				if($shiftid!=0)
				{
			     $q1.= " AND `Shift`='$shiftid' ";
			    }
				if($areaid!=0)
				{
			     $q1.= " AND `area_assigned`='$areaid' ";
			    }
          //////////////////////////////////////////////////////	
		  $totalemp = 0;
		
		 
        $sql = $this->db->query("SELECT Id,if(Lastname!='NULL',CONCAT(Firstname,' ',Lastname),Firstname) as name,EmployeeCode,DOL,DOC,Shift,Designation from EmployeeMaster where OrganizationId=? $q1 and archive = '1'  AND Is_Delete = 0  order by Firstname limit $begin,$end ",array($orgid));


        $dateval = array();
        foreach($sql->result() as $rows)
        {  
				$present = 0;
				$absent  = 0;
				$weekoff = 0;
				$holyday = 0;
				$halfday = 0;
				$leave   = 0;
				
			if($date != '')	
			{
				$arr=explode('-',$date);
				$arr[0]=date('m',strtotime($arr[0]));
				$d=cal_days_in_month(CAL_GREGORIAN,$arr[0],$arr[1]);
				$a = $d."-".$date;
				$b = "01-".$date;
				$enddate= date('Y-m-d',strtotime($a));
				$startdate= date('Y-m-d',strtotime($b)); 
				//$q ="AND AttendanceDate BETWEEN  '$startdate' AND '$enddate' ";
			}
			else
			{
				
				
				$enddate=date('Y-m-t');	
				$startdate=date('Y-m-01');
			//$q=" AND  `AttendanceDate` BETWEEN  '$startdate' AND '$enddate' ";
			}		
		        $dateval = array();
		        $data =  array();
		  		$emplid = $rows->Id;
		 		$data['nadatevalme']= ucwords($rows->name);
		 		$data['department']= ucwords(getDepartmentByEmpID($rows->Id));
		 		$data['designation']= ucwords(getDesignationByEmpID($rows->Id));
		 		$data['shift']= ucwords(getShift($rows->Shift));
				//print_r($data['department']);
				if($rows->EmployeeCode != "")
				$data['empcode'] = $rows->EmployeeCode;
			    else
				$data['empcode'] = "-";
			    $data['totaldurations']=$this->workinghourofmonthlysummary($emplid,$startdate,$enddate);
				$data['shifthours']=$this->ShiftHours($emplid,$startdate,$enddate);
				$data['lateby']=$this->LateBy1($emplid,$startdate,$enddate);
				$data['latecount']=$this->LateCount($emplid,$startdate,$enddate);
				$data['earlycount']=$this->EarlyCount($emplid,$startdate,$enddate);
				$data['earlyby']=$this->EarlyBy1($emplid,$startdate,$enddate);


				//print_r($data['totaldurations']);
				// print_r($data['lateby']);
				 $timein="";
				 $timeout="";
				 
				 $timeindate="";
				 $timeoutdate="";
				 $latecome="";
				 $earlyleave="";
				 $undertime="";
				 $officehour="";	
				
				 $overtime='';
				 $timefrom="";
				 
				$temp= array();
			
		        $temptimein  = array();
		        $temptimeout = array();
		        $temptimeoutdate = array();
		        $temptimeindate = array();
		        $latecommers = array();
		        $earlyleavers= array();
				$overtiming= array();
				$undertiming=array();
		        $officehours = array();
		        $timefromoff = array();
				
				
				while($startdate <= $enddate)
				{
			    $dateval[] =date('dS M',strtotime($startdate));
					if( $startdate != date('Y-m-d'))

				 $sql="SELECT A.ShiftId,A.TimeIn,A.TimeOut,A.timeindate,A.timeoutdate,A.AttendanceStatus,A.Wo_H_Hd,S.TimeIn as shifttimein,S.TimeOut as shifttimeout,
					SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(concat(A.timeoutdate,' ',A.TimeOut),concat(A.timeindate,' ',A.TimeIn)) ) ) as over,SEC_TO_TIME( 
					CASE WHEN (A.TimeOut > S.TimeOutBreak) THEN TIME_TO_SEC( TIMEDIFF(CONCAT(A.AttendanceDate,' ',S.TimeOut),CONCAT(A.AttendanceDate,' ',S.TimeIn))) ELSE TIME_TO_SEC(TIMEDIFF(CONCAT(A.AttendanceDate,' ',S.TimeOut),CONCAT(A.AttendanceDate,' ',S.TimeIn)) - TIME_TO_SEC( TIMEDIFF(concat(A.AttendanceDate,' ',S.TimeOutBreak),concat(A.AttendanceDate,' ',S.TimeInBreak)))) 
					END ) as under FROM AttendanceMaster A,ShiftMaster S 
					WHERE A.OrganizationId=? and  A.EmployeeId='$emplid' AND A.AttendanceDate ='$startdate' AND S.Id=A.ShiftId";
					
					else 
					$sql="SELECT A.ShiftId,A.TimeIn,A.TimeOut,A.timeindate,A.timeoutdate,A.AttendanceStatus,A.Wo_H_Hd,'00:00:00' as officehour,
				    '00:00:00' as overtime,S.TimeIn as shifttimein,S.TimeOut as shifttimeout,'00:00:00' as over,'00:00:00' as under,'00:00:00' as undertime FROM AttendanceMaster A,ShiftMaster S 
					WHERE A.OrganizationId=? and  A.EmployeeId='$emplid' AND A.AttendanceDate = '$startdate' AND S.Id=A.ShiftId";
					
			$query = $this->db->query($sql,array($orgid));

			//echo $this->db->last_query();
			//die();
			//echo $this->db->affected_rows();
			if($this->db->affected_rows()>0)
			foreach($query->result() as $row)
				{
					
					$HW = $row->Wo_H_Hd;
					$sts = $row->AttendanceStatus;
					//echo $startdate;
					$shiftid =$row->ShiftId;
					$timein=substr($row->TimeIn,0,-3);
					$timeout=substr($row->TimeOut,0,-3);
					$timeindate1=$row->timeindate;
					if($timeindate1=='0000-00-00'){
						$timeindate1='-';
					}else{
						$timeindate1=date('d-M',strtotime($row->timeindate));
					}
					
					// echo $timeindate ;
					$timeoutdate1=$row->timeoutdate;
					if($timeoutdate1=='0000-00-00'){
						$timeoutdate1='-';
					}else{
						$timeoutdate1=date('d-M', strtotime($row->timeoutdate));
					}
					
					// echo $timeoutdate ;
					$timefrom=$this->timeoffmonthly($emplid,$startdate);
					$shifttimein=substr($row->shifttimein,0,-3);
					$shifttimeout=substr($row->shifttimeout,0,-3);
					$over=substr($row->over,0,-3);
					$under=substr($row->under,0,-3);

					{
					$sql1=$this->db->query("SELECT TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) as latecommers FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) And A.AttendanceDate = '$startdate' And E.Is_Delete=0 And A.timeindate!='0000-00-00' And S.shifttype!=3 And  A.EmployeeId='$emplid'");
					   if($this->db->affected_rows($sql1))
                       {
						if($row1=$sql1->row())
						 {
                          if($row1->latecommers!='' || $row1->latecommers=='00:00:00')
                          {
                          	$latecome=substr($row1->latecommers, 0,5);
                          }
                          else
                          {
                          	$latecome="00:00";
                          }
						 }
					    }
					    else
					    {
					    	$latecome="00:00";
					    }

					$sql2=$this->db->query("SELECT (CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END) as earlyleave FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate`='$startdate' And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And S.shifttype!=3 And A.timeoutdate!='0000-00-00' And A.EmployeeId='$emplid'");
					

					   if($this->db->affected_rows($sql2))
                       {
					    if($row2=$sql2->row())
						 {
                          if($row2->earlyleave!='')
                          {
                          	$earlyleave=substr($row2->earlyleave, 0,5);
                          }
                          else
                          {
                          	$earlyleave="00:00";
                          }
						 }
						}
						else
						{
							$earlyleave="00:00";
						}	



                     $sql3=$this->db->query("SELECT (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as overtime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate`='$startdate' And A.`EmployeeId`='$emplid' And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='0000-00-00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) > (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) > (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END)");

                         //var_dump($this->db->last_query());
                         //die();
					   if($this->db->affected_rows($sql3))
                       {
					    if($row3=$sql3->row())
						{
                          if($row3->overtime!='' || $row3->overtime=='00:00:00')
                          {
                          	$overtime=substr($row3->overtime, 0,5);
                          }
                          else
                          {
                          	$overtime="00:00";
                          }
						}
					   }
					   else
					   {
                            $overtime="00:00";
					   }	



				      $sql4=$this->db->query("SELECT (CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END) as undertime FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate` = '$startdate' And A.`EmployeeId`='$emplid' And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='0000-00-00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) < (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END)");


					   if($this->db->affected_rows($sql4))
                       {
					    if($row4=$sql4->row())
						{
                          if($row4->undertime!='')
                          {
                          	$undertime=substr($row4->undertime, 1,5);
                          }
                          else
                          {
                          	$undertime="00:00";
                          }
						}
					   }
					   else
					   {
					   	    $undertime="00:00";
					   }


				   $sql5=$this->db->query("SELECT A.timeoutdate,A.timeindate,A.TimeIn,A.TimeOut,A.AttendanceStatus,A.`TotalLoggedHours` as officehour FROM AttendanceMaster A, ShiftMaster S WHERE A.OrganizationId='$orgid' and A.EmployeeId='$emplid' AND A.AttendanceDate = '$startdate' AND S.Id=A.ShiftId And A.TimeIn!='00:00:00' And A.TimeOut!='00:00:00' And A.`timeindate`!='0000-00-00' AND A.timeoutdate!='0000-00-00'");

				       //var_dump($this->db->last_query());

					   if($this->db->affected_rows($sql5))
                       {
					    if($row5=$sql5->row())
						{
							//$officehour=substr($row5->officehour,0,5);
							if($row5->officehour!='')
							{
								$officehour=substr($row5->officehour,0,5);
							}
							else
							{
								$officehour = '00:00';
							}
						}
					   }
					   else
					   {
					   	$officehour = '00:00';
					   }




					}

		
			$symbol = "";
			//$title = "";
			if($sts == 1)
			{
				if( $HW == 13){
				$present++;
				$symbol="HP";
			    }else{
				$present++;
				$symbol="P";
				}
			} 
			/* else if( $HW == 13){
				$present++;
				$symbol="HP";
			} */
			else if($sts == 2)
			{	
				 $absent++;
				 $symbol ='A';
				 // $timein='00:00';
				 // $timeout='00:00';
				 // $latecome='00:00';
				 // $earlyleave='00:00';
				 // $overtime='00:00';
				 // $undertime='00:00';
				 // $officehour='00:00';
				 // $timefrom='00:00';
				 // $timeindate1='-';
				 // $timeoutdate1='-';
			}
			else if($sts == 3 )
			{	
			if($row->TimeIn!='00:00:00')
				 {
					$present++;
					$symbol="P/WO";	
			
				 }
				 else
				 {
				 $weekoff++;
				 $symbol ='WO';
				 $timein='00:00';
				 $timeout='00:00';
				 $timeoutdate1='-';
				 $timeindate1='-';
				 $latecome='00:00';
				 $earlyleave='00:00';
				 $overtime='00:00';
				 $undertime='00:00';
				 $officehour='00:00';
				 $timefrom='00:00';
				 }

			}

			elseif($sts == 5){

				if($row->TimeIn!='00:00:00')
				 {
					$present++;
					$symbol="P/H";	
			
				 }
				 else
				 {
				 $holyday++;
				 $symbol ='WO';
				 $timein='00:00';
				 $timeout='00:00';
				 $timeoutdate1='-';
				 $timeindate1='-';
				 $latecome='00:00';
				 $earlyleave='00:00';
				 $overtime='00:00';
				 $undertime='00:00';
				 $officehour='00:00';
				 $timefrom='00:00';
				 }





			}
			else if($sts == 4)
			{
				$halfday++;
				$symbol = 'HD';
				$earlyleavehalf=$this->earlyleavehalfday($emplid,$startdate);
				if($earlyleavehalf!=null)
					{
						$earlyleave=$earlyleavehalf;
					}
				else
					{
						$earlyleave='-';
					}
				 $overtime='00:00';
				 $undertime='00:00';
			}
			
			else if($sts == 5)
			{
				$symbol = 'P/H';
				$holyday++;
			}
			else if($sts == 6){
				$leave++;
					$symbol = 'L';
				 $timein='00:00';
				 $timeout='00:00';
				 $latecome='00:00';
				 $earlyleave='00:00';
				 $overtime='00:00';
				 $undertime='00:00';
				 $officehour='00:00';
				 $timefrom='00:00';
				 $timeoutdate1='-';
				 $timeindate1='-';
			}
			else if($sts == 7 and $HW == 0)
			{
			  $symbol = "CO";
			}
			else if($sts == 8)
			{
				$symbol = "WFH";
			}
			else if($HW == 11)
			{
				$symbol = "WO";
			}
			else if($HW == 12)
			{
				$symbol = "H";
			}
			
			else
			
			 	 $symbol = "-";
			$temp[] = $symbol;
		 }
		 	
			
		 else
		 {
			 $timein='00:00';
			 $timeout='00:00';
			 $latecome='00:00';
			 $earlyleave='00:00';
			 $overtime='00:00';
			 $undertime='00:00';
			 $officehour='00:00';
			 $timefrom='00:00';
			 $timeoutdate1='-';
			 $timeindate1='-';
			 
				if(date('Y-m-d')>$startdate)
				{
					 $t = $this->getweeklyoff($startdate,$shiftid,$emplid);
					 $temp[]  = $t; 
					if($t=="WO")
					{
					   $weekoff++;
					}
					else if($t=="H")
					{
						$holyday++;
					}
					
				}
				 else
				 
					$temp[] = "-";
		 }
			
				
			 $startdate = date('Y-m-d', strtotime($startdate . ' +1 days'));
			   
			   
			$temptimein[] 	= $timein;
			$temptimeout[] 	= $timeout;
			$temptimeoutdate[] 	= $timeoutdate1;
			$temptimeindate[] 	= $timeindate1;
			$latecommers[] 	= $latecome;
			$earlyleavers[] = $earlyleave;
			$overtiming[]   = $overtime;
			$undertiming[]  = $undertime;
			$officehours[]  = $officehour;
			$timefromoff[]  = $timefrom;
			
		  }
			
			$data['sts']=$temp;
			$data['timein']=$temptimein;
			$data['timeout']=$temptimeout;
			$data['timeoutdate']=$temptimeoutdate;
			$data['timeindate']=$temptimeindate;
			$data['latecome']=$latecommers;
			$data['earlyleave']=$earlyleavers;
			$data['overtime']=$overtiming;
			$data['undertimee']=$undertiming;
			$data['officehours']=$officehours;
			$data['timeoff']=$timefromoff;
			
			$data['present']=$present;
			$data['absent']=$absent;
			$data['weekoff']=$weekoff;
			$data['holyday']=$holyday;
			$data['halfday']=$halfday;
			$data['leave']=$leave;
			$res[] = $data;
			
		}
		
		$result['data']= $res;
		$result['date']= $dateval;
	    return($result);


		}
	function workinghourofmonthlysummary($empid,$startdate,$enddate)
		{
			// if(A.timeoutdate!='0000-00-00',sec_to_time(time_to_sec(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.TimeOut),CONCAT(A.timeindate,' ',A.TimeIn)))),sec_to_time(time_to_sec(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.TimeOut),CONCAT(A.timeindate,' ',A.TimeIn)))))
		
			$org_id = $_SESSION['orgid'];
			$query = $this->db->query("SELECT SEC_TO_TIME(sum(time_to_sec(A.TotalLoggedHours))) as time FROM AttendanceMaster A,ShiftMaster S WHERE A.EmployeeId = ($empid) AND A.OrganizationId= $org_id AND A.AttendanceDate between '$startdate' and '$enddate' AND A.TimeOut > A.TimeIn AND A.TimeIn != '00:00:00' AND A.TimeOut != '00:00:00' AND S.Id = A.ShiftId");
			// var_dump($this->db->last_query());
		    if($row = $query->result_array())
			 {
				if($row[0]["time"] != null)
				{
					$length = strlen($row[0]["time"])-3;
					return (substr($row[0]["time"],0,$length));
				}
				else 
					return "00:00";
			 }
		  
	   }
	   
  function ShiftHours($empid,$startdate,$enddate)
		{
			$org_id = $_SESSION['orgid'];
			
			
			$query = $this->db->query("SELECT A.AttendanceDate,A.AttendanceStatus, sec_to_time(sum(time_to_sec(CASE WHEN (S.shifttype=3) THEN S.HoursPerDay ELSE TIMEDIFF(S.TimeOut,S.TimeIn) END))) as shifttime,A.AttendanceDate FROM AttendanceMaster A,ShiftMaster S WHERE A.EmployeeId = $empid AND A.OrganizationId= $org_id  AND A.AttendanceDate between '$startdate' and '$enddate'  AND S.Id = A.ShiftId");
			//var_dump($this->db->last_query());
		    if($row = $query->result_array())
			 {
				if($row[0]["shifttime"] != null)
				{
					$length = strlen($row[0]["shifttime"])-3;
					return (substr($row[0]["shifttime"],0,$length));
					//return $row[0]["shifttime"];
				}
				else 
					
					return "00:00";
			 }
		  
	   }

   function LateBy1($empid,$startdate,$enddate)
		{
			$org_id = $_SESSION['orgid'];

			$query=$this->db->query("SELECT  A.TimeIn, S.TimeIn,S.TimeInGrace,SEC_TO_TIME(abs(SUM(TIME_TO_SEC(TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END))))) AS lateby FROM AttendanceMaster A, ShiftMaster S WHERE A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) AND A.EmployeeId = $empid AND A.OrganizationId = $org_id AND S.Id = A.ShiftId AND A.AttendanceDate between '$startdate' and '$enddate'and A.TimeIn !='00:00:00' And S.shifttype!=3");
			// var_dump($this->db->last_query());
			//exit();
		    if($row = $query->result_array())
			 {
				if($row[0]["lateby"] != null)
				{
					$length = strlen($row[0]["lateby"])-3;
					return (substr($row[0]["lateby"],0,$length));
					//var_dump($length);
				}
				else 
					return "00:00";
			 }
		  
	   }

   function LateCount($empid,$startdate,$enddate)
		{
			$org_id = $_SESSION['orgid'];
			$query=$this->db->query("SELECT COUNT(A.Id) as latecount FROM AttendanceMaster A, ShiftMaster S WHERE A.TimeIn > (select(case when(S.TimeInGrace !='00:00:00') then S.TimeInGrace else S.TimeIn end) from ShiftMaster S where A.EmployeeId=$empid And S.Id=ShiftId) AND  AttendanceStatus = 1 AND A.EmployeeId = $empid AND A.OrganizationId = $org_id AND S.Id = A.ShiftId AND A.AttendanceDate between '$startdate' and '$enddate'and A.TimeIn !='00:00:00' And S.shifttype!=3 ");
			// var_dump($this->db->last_query());
		    if($row = $query->result_array())
			 {
				if($row[0]["latecount"] != null)
				{
					
					return (substr($row[0]["latecount"],0));
				}
				else 
					return "00:00";
				// $length = strlen($row[0]["latecount"])-3;
				// 	// var_dump($length );
					
			 }
		  
	    }

	    function EarlyCount($empid,$startdate,$enddate)
		{
			$org_id = $_SESSION['orgid'];
			$query=$this->db->query("SELECT COUNT(A.Id) as earlycount FROM AttendanceMaster A, ShiftMaster S WHERE A.TimeOut < S.TimeOut AND  AttendanceStatus = 1 AND A.EmployeeId = $empid AND A.OrganizationId = $org_id AND S.Id = A.ShiftId AND A.AttendanceDate between '$startdate' and '$enddate'and A.TimeOut !='00:00:00' And S.shifttype!=3");
			// var_dump($this->db->last_query());
		    if($row = $query->result_array())
			 {
				if($row[0]["earlycount"] != null)
				{
					
					return (substr($row[0]["earlycount"],0));
				}
				else 
					return "00:00";
				// $length = strlen($row[0]["latecount"])-3;
				// 	// var_dump($length );
					
			 }
		  
	    }
    
   function EarlyBy1($empid,$startdate,$enddate)
		{
			$org_id = $_SESSION['orgid'];
			$query=$this->db->query("SELECT SEC_TO_TIME(abs(SUM(TIME_TO_SEC(CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END)))) AS earlyby FROM AttendanceMaster A, ShiftMaster S WHERE  (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) AND  AttendanceStatus = 1 AND A.EmployeeId = $empid AND A.OrganizationId = $org_id AND S.Id = A.ShiftId AND A.AttendanceDate between '$startdate' and '$enddate'and A.TimeOut !='00:00:00' And S.shifttype!=3");
			//var_dump($this->db->last_query());
		    if($row = $query->result_array())
			 {
				if($row[0]["earlyby"] != null)
				{
					$length = strlen($row[0]["earlyby"])-3;
					return (substr($row[0]["earlyby"],0,$length));
					//var_dump($length);
				}
				else 
					return "00:00";
			 }
		  
	   }

    function getweeklyoff($date,$shiftid,$emplid)
		         { 
				 // echo $date;
			        $orgid=$_SESSION['orgid'];
	                $dt=$date;
	               
					$dayOfWeek = 1 + date('w',strtotime($dt));
					$weekOfMonth = weekOfMonth($dt);
					$week='';
					$query = $this->db->query("Select ShiftId from AttendanceMaster where AttendanceDate < '$date' AND EmployeeId = '$emplid' ORDER BY AttendanceDate DESC LIMIT 1");
					
					if($row=$query->result())
					{
						$shiftid = $row[0]->ShiftId;
					}
					else
					{
						return "N/A";
					}
					
					$query = $this->db->query("SELECT `WeekOff` FROM  `ShiftMasterChild` WHERE  `OrganizationId` =? AND  `Day` =  ? AND ShiftId=? ",array($orgid,$dayOfWeek,$shiftid));
                     $flage = false;					
					if($row=$query->result())
					{
							$week =	explode(",",$row[0]->WeekOff);
							$flage = true;
					}
					if($flage && $week[$weekOfMonth-1]==1)
					{
						return "WO";
					}
					else
					{
						// echo $dt;
						// echo "<br/>";
						$query = $this->db->query("SELECT `DateFrom`, `DateTo` FROM `HolidayMaster` WHERE OrganizationId=? and (? between `DateFrom` and `DateTo`) ",array($orgid,$dt));
						if($query->num_rows()>0)
						{
							return "H";
						}
						else
						{
							return "N/A";
						}
					}
		}

    public function  timeoffmonthly($empid,$date)
      {
	        $org_id = $_SESSION['orgid'];
			$query = $this->db->query("SELECT T.TimeFrom as timefrom ,T.TimeTo as timeto  FROM Timeoff T,AttendanceMaster A WHERE T.EmployeeId = ($empid) AND T.OrganizationId= '$org_id' AND TimeofDate= '$date'   AND A.AttendanceDate='$date' AND A.EmployeeId='$empid' AND A.OrganizationId='$org_id'");
		     if($row = $query->result_array())
			 {
			return (substr($row[0]["timefrom"],0,5)."-".substr($row[0]["timeto"],0,5) ); 
			 }
			 else
			 {
				return "00:00"; 
			 }
     }	


   public function getattRoaster(){
		        $orgid=$_SESSION['orgid'];
				 $res = array();
                 $result = array();
				$date=isset($_REQUEST['date'])?$_REQUEST['date']:'';
	            $shiftid=isset($_REQUEST['shift'])?$_REQUEST['shift']:'';
		        $deprtid=isset($_REQUEST['deprt'])?$_REQUEST['deprt']:'';
			    $emplid=isset($_REQUEST['empl'])?$_REQUEST['empl']:'';
			    // var_dump($emplid);
			    $desgid=isset($_REQUEST['desg'])?$_REQUEST['desg']:'';
			    $areaid=isset($_REQUEST['areaid'])?$_REQUEST['areaid']:'';
				  $q = "";
				  $startdate='';
				  $enddate='';
				  $d = 0;
				  
						$de = "";
						if($date != '')
						{   
					     $date1 = '01-'.$date;
						 $de = date('Y-m-t',strtotime($date1));
						}
						else
						{
							$de = date('Y-m-d');
						}
						
		//////////////////////////////////////////////////////////////////////////
		       $q1 = '';
				if($deprtid!=0)
				{
					 $q1.=" AND  `Department` = '$deprtid' ";
			    } 
		    	if($shiftid!=0)
				{
			     $q1.= " AND `Shift`='$shiftid' ";
			    }
                if($desgid!=0)
				{
			      $q1.=" AND  `Designation` = '$desgid'  ";
			    } 

				if($emplid!=0)
				{
					$q1.=" AND `id`='$emplid' ";
				}
				if($areaid!=0)
				{
					$q1.=" AND `area_assigned`='$areaid' ";
				}
          /////////////////////////////////////////////////////////////////////////	AND DOJ != '0000-00-00' AND  DOJ <= '$de'  AND (DOL='0000-00-00' OR DOL >='$de' )
        $sql = $this->db->query("SELECT Id, if(Lastname!='NULL',CONCAT(Firstname,' ',Lastname),Firstname) as name,EmployeeCode,DOL,DOC,DOJ,Shift,Designation  from EmployeeMaster where OrganizationId=? $q1  and  archive = '1' AND Is_Delete = 0  order by Firstname",array($orgid));
        // var_dump($this->db->last_query());
		
         $dateval = array();
        foreach($sql->result() as $rows)
         {  
			//$DOJ = $rows->DOJ;
		   $present = 0;
		   $absent = 0;
		   $weekoff = 0;
		   $holyday = 0;
		   $halfday = 0;
		   $leave = 0;
           if($date != '')
						{   
					         //$date = date('m-Y',strtotime($date));
							$arr=explode('-',$date);
							$d=cal_days_in_month(CAL_GREGORIAN,$arr[0],$arr[1]);
							$a = $d."-".$date;
							$b = "01-".$date;
							$enddate= date('Y-m-d',strtotime($a));
							$startdate= date('Y-m-d',strtotime($b)); 
							//echo strlen(trim($arr[0]));
						   $q ="AND `AttendanceDate` BETWEEN  '$startdate' AND '$enddate' ";
						}
						else
						{
							$enddate=date('Y-m-t');	
							$startdate=date('Y-m-01');
							$q=" AND  `AttendanceDate` BETWEEN  '$startdate' AND '$enddate' ";
						}
						
		        $dateval = array();
		        $data =  array();
				
		  		$emplid = $rows->Id;
				$shiftid = $rows->Shift;
		 		$data['name']= ucwords($rows->name);
		 		$data['desg'] = '';
		 	
		 	if($rows->Designation == ' ' ||  $rows->Designation == 0){

		 		$data['desg'] = "-";

		 	}
		 	else{
		 		$data['desg']= getDesignation($rows->Designation);
		 	}
				if($rows->EmployeeCode != "")
				$data['empcode'] = $rows->EmployeeCode;
			    else
				$data['empcode'] = "-";
			
				$temp= array();
				//$temp1329= array();
		       
				$flage = false;
				
		while( $startdate <= $enddate)
			{
				
			 $dateval[] =date('dS M',strtotime($startdate));
             $flage = true;	
		   $query = $this->db->query("SELECT TimeIn,TimeOut,AttendanceStatus,Wo_H_Hd,AttendanceDate,device FROM AttendanceMaster WHERE OrganizationId=? AND AttendanceDate='$startdate' AND EmployeeId=?  limit 1",array($orgid,$emplid));
		   // var_dump($this->db->last_query());
		   // die;

		   $n = $this->db->affected_rows();
		   if($n>0)
		   foreach($query->result() as $row)
		   {
			//$data['name']=ucwords(getEmpName($row->EmployeeId));
			$HW = $row->Wo_H_Hd;
			//var_dump($HW);
//die;
			$sts = $row->AttendanceStatus;
			$symbol = "";
			$title = "";
			if($sts == 1)
			{
				if($row->TimeOut=='00:00:00' || $row->device=='Auto Time Out')
				{
				$present++;
				$symbol='P*';
				}
				else if( $HW == 13){
				$present++;
				$symbol="HP";
			    }
				else
				{
				$present++;
				$symbol="P";
				
				}
				
			}
			
			else if($sts == 2){
				$symbol = 'A';
				$absent++;
		
		
			}
			else if($sts == 3 )
			{
				 if($row->TimeIn!='00:00:00')
				 {
					$present++;
					$symbol="P/WO";	    
			
				 }
				 else
				 {
				   $symbol = 'WO';
				   $weekoff++;
				  
				 }
		   
			}else if($sts == 4)
			{	
				$halfday++;
				$symbol = 'HD';
				 
				
			}
			/* else if($sts == 5){
				$symbol = 'H';
		        $holyday++;
				
		       
			} */
			else if($sts == 5){
				
				 if($row->TimeIn!='00:00:00')
				 {
					$present++;
					$symbol="P/H"; 	
			
				 }
				 else
				 {
				 $symbol = 'H';
		        $holyday++;
				  
				 }
				
				
		       
			}else if($sts == 6 || $sts == 9){
				$symbol = 'L';
		        $leave++;
				
		       
			}else if($sts == 7 and $HW == 0){
				$symbol = "CO";
				
				
			}
			else if($sts == 8){
				$symbol = "WFH";
				
				
			}
			else if($HW == 11){
				$symbol = "WO";
				
				
			}
			else if($HW == 12){
				$symbol = "H";
				
				
			}
			else
				 $symbol = "-";
			$temp[] = $symbol;
		}
		 
			 else
			 {
				  
					if(date('Y-m-d')>$startdate)
					{
						 $t = $this->getweeklyoff($startdate,$shiftid,$emplid);
						 $temp[] = $t;
						 
					  if($t=="WO")
					  {
						
						$weekoff++;
						
					  }
					  else if($t=="H")
					  {
						$holyday++;
					  }
					  
					  
					}
					
					 else
					 
					$temp[]= "-"; 
				
					 

					

			 }
			 $startdate = date('Y-m-d', strtotime($startdate . ' +1 days'));
		  }
		   if($flage)
		   {
			     $dateval[] = 'Total Present';
			     $dateval[] = 'Total Absent';
			     $dateval[] = 'Weekly Offs';
			     $dateval[] = 'Total Holiday';
			     $dateval[] = 'Total Half Day';
			     $dateval[] = 'Total Leave';
		       
				 $temp[] = $present;
				 $temp[] = $absent;
				 $temp[] = $weekoff;
				 $temp[] = $holyday;
				 $temp[] = $halfday;
				 $temp[] = $leave;
		   }
		  
		  $data['sts']=$temp;
		  
		  $res[] = $data;
		  // var_dump($data['sts']);
		}
		$result['data']= $res;
	
		$result['date']= $dateval;
	    return($result);
	}
public function getMonthlyAverageSummary($type)
            { 
				$result = array();
				$res = array();
				$count=0;
				$total=0;$total1=0;$total2=0;$total3=0;$total4=0;
				$latecomingcount=0;
				$Absentcont=0;
				$Presentcount=0;
				$orgid = isset($_SESSION['orgid'])?$_SESSION['orgid']:0;
				$zname=getTimeZone($orgid);

				date_default_timezone_set($zname);           
				//$date = date("d-M-Y");
				$time = date("H:i");
				$enddate="";
				$startdate="";
				 $q = "";
				$da = $this->getStartAndEndDate1();
				$enddate=$da['end_date'];
				$startdate= $da['start_date'];
				
				// $enddate='2019-07-02';
				// $startdate='2019-07-01';
				
				$begin = new DateTime($startdate);
				$interval = new DateInterval('P1D'); // 1 Day
				$realEnd = new DateTime($enddate);           
				$realEnd->add($interval);
				$dateRange = new DatePeriod($begin,$interval,$realEnd);
				$range = "";
				foreach ($dateRange as $date) 
				{
					$dt= $date->format('Y-m-d');
					if($range=="")
					$range = "'".$date->format('Y-m-d')."'";
					else
					$range .= ",'".$date->format('Y-m-d')."'";
				}
				$rangedate = $range;
				// echo $rangedate;
				if($rangedate=="")
				{
				$rangedate = 1;
				} 
					$list=array();
					$list['orgid']=$orgid;
					$list['admin']=getAdminName($orgid);
					$list['email']=getAdminEmail($orgid);
					$q1=$this->db->query("Select if(E.LastName!='NULL',concat(E.FirstName, ' ' ,E.LastName),E.FirstName) as name,EmployeeCode , D.Name as desg ,E.Id,Shift,(select COUNT(AttendanceStatus) FROM AttendanceMaster where AttendanceStatus IN (1,3,4,8) AND   EmployeeId=E.Id  and `AttendanceDate` In($rangedate)) as present, (SELECT COUNT(AttendanceStatus) FROM AttendanceMaster where AttendanceStatus = 2 AND EmployeeId=E.Id and `AttendanceDate` In($rangedate)) as absent, (SELECT COUNT(A.Id) FROM AttendanceMaster A, ShiftMaster S where  A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) And AttendanceStatus = 1 AND EmployeeId=E.Id AND S.Id=A.ShiftId And S.shifttype!=3 and A.`AttendanceDate` In($rangedate)) as latecoming from EmployeeMaster E , DesignationMaster D where E.Designation = D.id and E.OrganizationId = $orgid and E.archive = 1 and E.Is_Delete = 0 order by E.FirstName" );
					 //var_dump($this->db->last_query());
					 //die;
					$data=array();
					$data['latecoming']='';
					$data['earlyleaving']='';

					foreach($q1->result() as $row1)
					{			
					
					$empid=$row1->Id;
					
					
					$data['name']=$row1->name;
					$data['ecode']=$row1->EmployeeCode;
					
					if($data['ecode']==""){
						$data['ecode']='-';
					}else{
						$data['ecode']=$row1->EmployeeCode;
					}
					$data['Presentcount']=$row1->present;
					// var_dump($data['Presentcount']);
					$Presentcount=$Presentcount+$row1->present;
					// var_dump($Presentcount);
					$data['Absentcont']=$row1->absent;
					$Absentcont=$Absentcont+$row1->absent;
					// var_dump($Absentcont);
					$data['latecomingcount']=$row1->latecoming;
					$latecomingcount=$latecomingcount+$row1->latecoming;
					

					// $timeFormat152    = 	sprintf('%2d', $latconut);
					// var_dump($latconut);


			
					// var_dump($latecomingcount1);

					// var_dump($data['latecoming']);
					$data['desg']=$row1->desg;
					$shiftid = $row1->Shift;
					//echo $shiftid;

					$q3=$this->db->query("SELECT (SELECT SEC_TO_TIME(SUM(abs(TIME_TO_SEC(TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END))))) FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.`EmployeeId`='$empid' And A.TimeIn!='00:00:00' And A.timeoutdate!='0000-00-00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) And A.`AttendanceDate` IN (".$rangedate.") And E.Is_Delete=0 And S.shifttype!=3) as latecommers,(SELECT SEC_TO_TIME(SUM(abs(TIME_TO_SEC(CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END)))) FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`=10 And E.Is_Delete=0 And A.`AttendanceDate` IN (".$rangedate.") And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And A.timeoutdate!='0000-00-00' And S.shifttype!=3 AND A.`EmployeeId`='$empid') as earlyleavers FROM AttendanceMaster A, EmployeeMaster E, ShiftMaster S WHere A.EmployeeId=E.Id And S.Id=A.`ShiftId` And A.AttendanceDate IN (".$rangedate.") And A.`OrganizationId`='$orgid' And E.Is_Delete=0 AND A.`TimeIn`!='00:00:00' And A.timeoutdate!='0000-00-00' And S.shifttype!=3 AND A.`EmployeeId`='$empid' GROUP By A.`EmployeeId`");

					//var_dump($this->db->last_query());
					//die();

					    if($row2 = $q3->row())
					    {
					       if($row2->latecommers!='')
					       {
                           $data['latecoming']=substr($row2->latecommers, 0,5);
                           $total=(int)$total+(int)$row2->latecommers;
                           }
                           else
                           {
                           $data['latecoming']="<div style='padding-right:15px'>-</div>";
                           $total="<div style='padding-right:15px'>-</div>";
                           }
                           if($row2->earlyleavers!='')
                           {
                           $data['earlyleaving']=substr($row2->earlyleavers, 0,5);
                           $total1=(int)$total1+(int)$row2->earlyleavers;
                           }
                           else
                           {
                           $data['earlyleaving']="<div style='padding-right:15px'>-</div>";
						   $total1="<div style='padding-right:15px'>-</div>";
                           }

					    }

			
		//////////////////Average  Time Off ////////////////////
		$q5=$this->db->query("SELECT SEC_TO_TIME(sum(TIME_TO_SEC(TIMEDIFF(T.TimeTo,T.TimeFrom)))) AS timeoff,TIME_TO_SEC(SEC_TO_TIME(sum(TIME_TO_SEC(TIMEDIFF(T.TimeTo,T.TimeFrom)))
		)) AS cumtimeoff,T.`TimeofDate` FROM Timeoff T WHERE  T.OrganizationId =$orgid and T.ApprovalSts=2 and T.`TimeofDate` IN (".$rangedate.") AND T.TimeFrom != '00:00:00' AND T.TimeTo != '00:00:00'  AND T.EmployeeId=$empid");
		// var_dump($this->db->last_query());
		// die;
		
				if($row5 = $q5->row())
				{
					$data['timeoff']=substr($row5->timeoff,0,-3);
					// var_dump($data['timeoff']);
					$total3=$total3+$row5->cumtimeoff;
					if($row5->timeoff=='')
					{
					$data['timeoff']="<div style='padding-right:15px'>-</div>";
					}
				}


				
				///////undertime////////	
		$q6=$this->db->query("SELECT A.AttendanceStatus,A.AttendanceDate,

			SEC_TO_TIME(abs(SUM(TIME_TO_SEC(IF(A.AttendanceStatus=3 And A.`TotalLoggedHours` < TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.timeindate,' ',S.TimeIn)),'00:00:00',(CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END)))))) as undertime,

			abs(SUM(TIME_TO_SEC(IF(A.AttendanceStatus=3 And A.`TotalLoggedHours` < TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.timeindate,' ',S.TimeIn)),'00:00:00',(CASE WHEN (S.shifttype=3) THEN SUBTIME(A.TotalLoggedHours,S.HoursPerDay) ELSE (CASE WHEN (A.`TimeIn`!='00:00:00' And A.`TimeOut`!='00:00:00') THEN (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) ELSE SUBTIME(TIMEDIFF(CONCAT(A.timeoutdate,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)),TIMEDIFF(CONCAT(A.timeoutdate,' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))) END) ELSE ('00:00:00') END) ELSE ('00:00:00') END) END))))) as cumundertime

				FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.`EmployeeId` And S.Id=A.ShiftId And A.`AttendanceStatus`!=3 And A.EmployeeId='$empid' And A.`OrganizationId`='$orgid' AND E.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.AttendanceDate IN (".$rangedate.") And A.`TimeIn`!='00:00:00' And A.`timeindate`!='0000-00-00' And A.`timeoutdate`!='00:00:00' And (CASE WHEN(S.shifttype=3) THEN (TIME_TO_SEC(A.TotalLoggedHours)) < (TIME_TO_SEC(S.HoursPerDay)) ELSE (CASE WHEN(A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN(S.shifttype=2 AND A.timeoutdate=A.timeindate) THEN ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.TimeOut),CONCAT(A.`AttendanceDate`,' ',S.TimeIn))))) ELSE ((TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',A.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.`TimeIn`)))) < (TIME_TO_SEC(TIMEDIFF(CONCAT(A.`timeoutdate`,' ',S.TimeOut),CONCAT(A.`timeindate`,' ',S.TimeIn))))) END) ELSE ('00:00:00') END) END) ");

					// var_dump($q6);
		             //var_dump($this->db->last_query());
		             //die();

						if($row6 = $q6->row())	
						{		
							if($row6->AttendanceStatus==4)
							{
							//$data['undertime']="fd";
							$data['undertime']='00:00';
							$total2='00:00';
							}
							
							else
							{
							$data['undertime']=substr($row6->undertime,0,-3);
							 (int)$total2= (int)$total2+ (int)$row6->cumundertime;
							}
							
							if($row6->undertime=='')
							{
							$data['undertime']="<div style='padding-right:15px'>-</div>";
							}
							
						if(strpos($row6->undertime, '-') !== false) 
						{
						$data['undertime']="<div style='padding-right:15px'>-</div>";	
						}
						}

						
			///////////logged hours///////////////			
			$queryy=$this->db->query("SELECT 
					sec_to_time(sum(Time_to_Sec(TIMEDIFF(A.TimeOut,A.TimeIn))) ) as difference,
					time_to_sec(sec_to_time (sum(Time_to_Sec(TIMEDIFF(A.TimeOut,A.TimeIn)))))
					as avgsum FROM AttendanceMaster A WHERE (A.TimeIn != '00:00:00') and  A.OrganizationId = $orgid  AND 
					(A.TimeOut != '00:00:00') and A.EmployeeId = $empid and   A.AttendanceDate IN(".$rangedate.")");			
						
				if($rw = $queryy->row())	
						{				
						$data['avglog']=substr($rw->difference,0,-3);
						// var_dump($data['avglog']);
						$total4=$total4+$rw->avgsum;
						if($rw->difference=='')
							{
							$data['avglog']="<div style='padding-right:15px'>-</div>";
							}
						}		
						
				$count++;
				$res[] = $data;
		}


		    $querylate=$this->db->query("SELECT SEC_TO_TIME(abs(SUM(TIME_TO_SEC(TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END))))) as totallate FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.`EmployeeId`=E.Id And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) And A.`AttendanceDate` IN (".$rangedate.") And E.Is_Delete=0 And S.shifttype!=3");

		    if($rowlate = $querylate->row())
				{
					$timeFormatlate=$rowlate->totallate;
				}


		    $queryearly=$this->db->query("SELECT SEC_TO_TIME(abs(SUM(TIME_TO_SEC(CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END)))) as totalearly FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate` IN (".$rangedate.") And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And S.shifttype!=3");

		    //var_dump($this->db->last_query());

		    if($rowearly = $queryearly->row())
			{
				$timeFormatearly=$rowearly->totalearly;
			}


		    $querylateavg=$this->db->query("SELECT SEC_TO_TIME(abs(AVG(TIME_TO_SEC(TIMEDIFF(A.TimeIn,CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END))))) as totallateavg FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE E.Id=A.EmployeeId And S.Id=A.`ShiftId` And A.`EmployeeId`=E.Id And A.TimeIn!='00:00:00' And A.`OrganizationId`='$orgid' And A.TimeIn > (CASE WHEN(S.TimeInGrace!='00:00:00') THEN S.TimeInGrace ELSE S.TimeIn END) And A.`AttendanceDate` IN (".$rangedate.") And E.Is_Delete=0 And S.shifttype!=3");

		    if($rowlateavg = $querylateavg->row())
				{
					$timeFormatlateavg=strstr($rowlateavg->totallateavg, '.', true);
				}


		    $queryearlyavg=$this->db->query("SELECT SEC_TO_TIME(abs(AVG(TIME_TO_SEC(CASE WHEN (A.`timeoutdate`!='0000-00-00') THEN (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN TIMEDIFF(CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`),CONCAT(A.`AttendanceDate`,' ',A.TimeOut)) ELSE TIMEDIFF(CONCAT(A.`AttendanceDate`,' ',S.TimeOut),CONCAT(A.`timeoutdate`,' ',A.TimeOut)) END) ELSE SUBTIME(S.TimeOut, A.`TimeIn`) END)))) as totalearlyavg FROM `AttendanceMaster` A, EmployeeMaster E, ShiftMaster S WHERE A.`EmployeeId`=E.Id And S.Id=A.`ShiftId` And A.`OrganizationId`='$orgid' And E.Is_Delete=0 And A.`AttendanceDate` IN (".$rangedate.") And (CASE WHEN (S.shifttype=2 AND A.`timeindate`=A.`timeoutdate`) THEN CONCAT(DATE_ADD(A.`AttendanceDate`, INTERVAL 1 DAY),' ',S.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',S.TimeOut) END) > (CASE WHEN (A.`timeoutdate`!='00:00:00') THEN CONCAT(A.`timeoutdate`,' ',A.`TimeOut`) ELSE CONCAT(A.`AttendanceDate`,' ',A.`TimeOut`) END) And A.`TimeIn`!='00:00:00' And S.shifttype!=3");

		    //var_dump($this->db->last_query());

		    if($rowearlyavg = $queryearlyavg->row())
			{
				$timeFormatearlyavg=strstr($rowearlyavg->totalearlyavg, '.', true);
			}


			$querytimeoffavg=$this->db->query("SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(T.TimeTo,T.TimeFrom)))) AS timeoffavg,TIME_TO_SEC(SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(T.TimeTo,T.TimeFrom))))) AS cumtimeoffavg,T.`TimeofDate` FROM Timeoff T, EmployeeMaster E WHERE  T.OrganizationId =$orgid and T.ApprovalSts=2 and T.`TimeofDate` IN (".$rangedate.") AND T.TimeFrom != '00:00:00' AND T.TimeTo != '00:00:00'  AND T.EmployeeId=E.Id");

		    //var_dump($this->db->last_query());

		    if($rowtimeoffavg = $querytimeoffavg->row())
			{
				$timeFormattimeoffavg=strstr($rowtimeoffavg->timeoffavg, '.', true);
			}
					
				// echo $count;	
			$hours 		= 	floor($total / 3600);
			$mins 		= 	floor($total / 60 % 60);
			$cumtotal	= 	sprintf('%02d:%02d',$hours,$mins);
			$total		=	$total/$count;
			$hours 		= 	floor($total / 3600);
			$mins 		= 	floor($total / 60 % 60);
			$timeFormat = 	sprintf('%02d:%02d', $hours, $mins);

			$latconut =	floor($latecomingcount);
			$avglatcount= $latecomingcount/$count;
			$avg1=substr($avglatcount,0,3);
			// var_dump($avg1);
			$absentconut = floor($Absentcont);
			$absentavg=$Absentcont/$count;
			$absentavg1=substr($absentavg,0,3);
			// var_dump($absentconut);
			// var_dump($absentavg1);
			$presentcont=floor($Presentcount);
			$presentavg=$Presentcount/$count;
			$presentavg1=substr($presentavg,0,3);
			// var_dump($presentcont);
			// var_dump($presentavg1);


			
			
			$hours 		= 	floor((float)$total1 / 3600);
			$mins 		= 	floor((float)$total1 / 60 % 60);
			$cumtotal1	=	sprintf('%02d:%02d', $hours, $mins);
			$total1		=	(float)$total1/$count;
			$hours		= 	floor($total1 / 3600);
			$mins 		= 	floor($total1 / 60 % 60);
		$timeFormat1    = 	sprintf('%02d:%02d', $hours, $mins);
			
			
			$hours 		= 	floor($total2 / 3600 );
			$mins 		= 	floor($total2 / 60 % 60);
			$cumtotal2 	= 	sprintf('%02d:%02d',$hours,$mins);
			$total2		=	$total2/$count;
			$hours 		= 	floor($total2 / 3600);
			$mins 		= 	floor($total2 / 60 % 60);
		$timeFormat2 	= 	sprintf('%02d:%02d', $hours, $mins);
			
			
			$hours 		= 	floor($total3 / 3600);
			$mins 		= 	floor($total3 / 60 % 60);
			$cumtotal3 	= 	sprintf('%02d:%02d', $hours, $mins);
			$total3		=	$total3/$count;
			$hours 		= 	floor($total3 / 3600);
			$mins 		= 	floor($total3 / 60 % 60);
		$timeFormat3 	= 	sprintf('%02d:%02d', $hours, $mins);
		
			$hours 		= 	floor($total4 / 3600);
			$mins 		= 	floor($total4 / 60 % 60);
			$cumtotal4 	= 	sprintf('%02d:%02d', $hours, $mins);
			$total4		=	$total4/$count;
			$hours 		= 	floor($total4 / 3600);
			$mins 		= 	floor($total4 / 60 % 60);
		$timeFormat4 	= 	sprintf('%02d:%02d',$hours, $mins);
		
			$list['report']=$res;
			$result[]=$list;
			$message='';
			
			// var_dump($result);
			foreach($result as $r)
			{
				$message ='<center>';
				$index=1;
				if(count($r['report'])>0)
				{
					$date=date('M-Y',strtotime('last day of last month'));
					$date1=date('d-M-Y');

					$message ='<center>
					
					<img src=" https://ubiattendance.ubihrm.com/assets/img/newlogo.png" width="150px;"/></center>';
					if($_SESSION['orgid']==57239 || $_SESSION['orgid']==10 ){
						
						$message.= 
					'<center><div style="width:55%;margin-bottom:5%;">
					<h3 style="color:green;padding:0px; margin:0px;">Attendance Summary - Last Month 
					</h3>
					<h4 style="color:black;padding:0px; margin:0px;">'.$_SESSION['orgName'].'</h4>
					['.$date.']
			     <div style="margin-top:5%;">
					<table style="border-collapse: collapse;" border width="100%"><tr style="color:#fa6804">
						<th>S.No</th>
						<th style="width:25%">Employee Code</th>
						<th style="width:25%">Employees</th>
						<th style="width:25%;">Designation</th>
						<th style="width:25%;">Present Days</th>
						<th style="width:25%;">Absent Days</th>
						<th style="width:15%;">Total Logged Hours</th>
						<th style="width:25%;">Late Count</th>
						<th style="width:15%;">Total Late Coming</th>
						<th style="width:15%;">Total Early Leaving</th>
						<th style="width:15%;">Total Time <br/>Off</th>
					<th style="width:15%;">Total Undertime</th>
					</tr>';	
					foreach($r['report'] as $emp)
						// var_dump($r['report']);
					{
							$message.= '<tr>
							<td align="center"  style="padding-left:1%">'.($index++).'</td>
							<td align="center" style="width:25%;">'.$emp['ecode'].'</td>  
							<td align="left" style="width:25%;padding-left:1%">'.$emp['name'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['desg'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['Presentcount'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['Absentcont'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['avglog'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['latecomingcount'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['latecoming'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['earlyleaving'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['timeoff'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['undertime'].'</td>
							</tr>';
					}
				$message.= '<tfoot>
				<tr style="font-weight:bold">
				<td align="right" style="padding-right:1%"></td>
				<td style="text-align:left;padding-left:1%">Team’s Total</td>
				<td></td>
				<td></td>
				<td align="right" style="padding-right:4%">'.$presentcont.'</td>
				<td align="right" style="padding-right:4%">'.$absentconut.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal4.'</td>
				<td align="right" style="padding-right:4%">'.$latconut.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormatlate.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormatearly.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal3.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal2.'</td>
				</tr>
				
				<tr style="color:#f19240;font-weight:bold">
				<td align="right" style="padding-right:1%"></td>
				<td style="text-align:left;padding-left:1%">Team’s Average</td>
				<td></td>
				<td></td>
				<td align="right" style="padding-right:4%">'.$presentavg1.'</td>
				<td align="right" style="padding-right:4%">'.$absentavg1.'</td>
			<td align="right" style="padding-right:4%">'.$avg1.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat4.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormatlateavg.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormatearlyavg.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormattimeoffavg.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat2.'</td>
				
				</tr></tfoot>
				</div>
			</table>
					
			
					
			<div>
				<p style="font-weight:bold;text-align:left">
				Note: Team’s Average = <span style="text-align:center;font-weight:bold">
				 Team’s Total / No. of Employees</span>
				</p>
			</div>
			
			<!--<div>
			<p style="text-align:left">
			Report sent on 
			<b>'.$date1.'</b> at <b>'.$time.'</b><br/>
			View more details on  <span><a href="https://ubiattendance.ubihrm.com">https://ubiattendance.ubihrm.com/</a><span></p>
			<p style="text-align:left;font-weight:bold">Cheers,<br/>
			Team ubiAttendance<br/>
			<a href="www.ubiattendance.com">www.ubiattendance.com</a><br/>
			Tel/ Whatsapp: +91 70678 22132<br/>
			Email: <a href="ubiattendance@ubitechsolutions.com">ubiattendance@ubitechsolutions.com<a><br/>
			Skype: ubitech.solutions
			</p>
			
			<p style="text-align:left;font-size:13px">You have received this email because your are a registered member on ubiAttendance App. If you do not want to receive this mailer, <a href="#">unsubscribe<a>. To make sure this email is not sent to your "junk" folder, Add “<a href="ubiattendance@ubitechsolutions.com">ubiattendance@ubitechsolutions.com</a>” to your Address Book</p>
			<p style="text-align:left;font-size:13px">* Disclaimer: These GPS data files are made available with the understanding that data is provided with no warranties, expressed or implied, concerning data accuracy, completeness, reliability, or suitability. Ubitech Solutions’ service shall not be liable regardless of the cause or duration, for any errors, inaccuracies, omissions, or other defects in, or untimeliness or inauthenticity of, the Information, or for any delay or interruption in the transmission thereof to the user, or for any Claims or Losses arising therefrom or occasioned thereby. The end user assumes the entire risk as to the quality of the data. Although every effort has been made to ensure the correctness and accuracy of the GPS Dataset, the Supplier makes no representations, either express or implied, as to the accuracy, completeness or suitability for any particular purpose of the information and accepts no liability for any use of the GPS Dataset or any responsibility for any reliance placed on that information. The user acknowledges that the Dataset cannot be guaranteed error free and that use of the Dataset is at the user’s sole risk and that the information contained in the Dataset may be subject to change without notice.</p>
			</div>--!>


			</div>';
						
					}else{
					$message.= 
					'<center><div style="width:55%;margin-bottom:5%;">
					<h3 style="color:green;padding:0px; margin:0px;">Attendance Summary - Last Month 
					</h3>
					<h4 style="color:black;padding:0px; margin:0px;">'.$_SESSION['orgName'].'</h4>
					['.$date.']
			     <div style="margin-top:5%;">
					<table style="border-collapse: collapse;" border width="100%"><tr style="color:#fa6804">
						<th>S.No</th>
						<th style="width:25%">Employees</th>
						<th style="width:25%;">Designation</th>
						<th style="width:25%;">Present Days</th>
						<th style="width:25%;">Absent Days</th>
						<th style="width:15%;">Total Logged Hours</th>
						<th style="width:25%;">Late Count</th>
						<th style="width:15%;">Total Late Coming</th>
						<th style="width:15%;">Total Early Leaving</th>
						<th style="width:15%;">Total Time <br/>Off</th>
					<th style="width:15%;">Total Undertime</th>
					</tr>';	
					foreach($r['report'] as $emp)
						// var_dump($r['report']);
					{
							$message.= '<tr>
							<td align="center"  style="padding-left:1%">'.($index++).'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['name'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['desg'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['Presentcount'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['Absentcont'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['avglog'].'</td>
							<td align="left" style="width:25%;padding-left:1%">'.$emp['latecomingcount'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['latecoming'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['earlyleaving'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['timeoff'].'</td>
							<td align="right" style="width:15%;padding-right:4%">'.$emp['undertime'].'</td>
							</tr>';
					}
				$message.= '<tfoot>
				<tr style="font-weight:bold">
				<td align="right" style="padding-right:1%"></td>
				<td style="text-align:left;padding-left:1%">Team’s Total</td>
				<td></td>
				<td align="right" style="padding-right:4%">'.$presentcont.'</td>
				<td align="right" style="padding-right:4%">'.$absentconut.'</td>
				<td align="right" style="padding-right:4%">'.$latconut.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal4.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal1.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal3.'</td>
				<td align="right" style="padding-right:4%">'.$cumtotal2.'</td>
				</tr>
				
				<tr style="color:#f19240;font-weight:bold">
				<td align="right" style="padding-right:1%"></td>
				<td style="text-align:left;padding-left:1%">Team’s Average</td>
				<td></td>
				<td align="right" style="padding-right:4%">'.$presentavg1.'</td>
				<td align="right" style="padding-right:4%">'.$absentavg1.'</td>
			<td align="right" style="padding-right:4%">'.$avg1.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat4.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat1.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat3.'</td>
				<td align="right" style="padding-right:4%">'.$timeFormat2.'</td>
				
				</tr></tfoot>
				</div>
			</table>
					
			
					
			<div>
				<p style="font-weight:bold;text-align:left">
				Note: Team’s Average = <span style="text-align:center;font-weight:bold">
				 Team’s Total / No. of Employees</span>
				</p>
			</div>
			
			<!--<div>
			<p style="text-align:left">
			Report sent on 
			<b>'.$date1.'</b> at <b>'.$time.'</b><br/>
			View more details on  <span><a href="https://ubiattendance.ubihrm.com">https://ubiattendance.ubihrm.com/</a><span></p>
			<p style="text-align:left;font-weight:bold">Cheers,<br/>
			Team ubiAttendance<br/>
			<a href="www.ubiattendance.com">www.ubiattendance.com</a><br/>
			Tel/ Whatsapp: +91 70678 22132<br/>
			Email: <a href="ubiattendance@ubitechsolutions.com">ubiattendance@ubitechsolutions.com<a><br/>
			Skype: ubitech.solutions
			</p>
			
			<p style="text-align:left;font-size:13px">You have received this email because your are a registered member on ubiAttendance App. If you do not want to receive this mailer, <a href="#">unsubscribe<a>. To make sure this email is not sent to your "junk" folder, Add “<a href="ubiattendance@ubitechsolutions.com">ubiattendance@ubitechsolutions.com</a>” to your Address Book</p>
			<p style="text-align:left;font-size:13px">* Disclaimer: These GPS data files are made available with the understanding that data is provided with no warranties, expressed or implied, concerning data accuracy, completeness, reliability, or suitability. Ubitech Solutions’ service shall not be liable regardless of the cause or duration, for any errors, inaccuracies, omissions, or other defects in, or untimeliness or inauthenticity of, the Information, or for any delay or interruption in the transmission thereof to the user, or for any Claims or Losses arising therefrom or occasioned thereby. The end user assumes the entire risk as to the quality of the data. Although every effort has been made to ensure the correctness and accuracy of the GPS Dataset, the Supplier makes no representations, either express or implied, as to the accuracy, completeness or suitability for any particular purpose of the information and accepts no liability for any use of the GPS Dataset or any responsibility for any reliance placed on that information. The user acknowledges that the Dataset cannot be guaranteed error free and that use of the Dataset is at the user’s sole risk and that the information contained in the Dataset may be subject to change without notice.</p>
			</div>--!>


			</div>';
				}
				}
				
				$message.='</center>';
				print_r($message);

				}
								
			}

    ////get last month/////////
			function  getStartAndEndDate1()
			{
			$firstday=date('Y-m-d', strtotime('first day of last month'));
			$lastday=date('Y-m-d', strtotime('last day of last month'));
			$result['start_date'] = $firstday;
			$result['end_date'] = $lastday;
			return $result;
			}
    function earlyleavehalfday($empid,$date)
		{
			$org_id = $_SESSION['orgid'];
			$query = $this->db->query("SELECT  TIMEDIFF(S.TimeInBreak,A.TimeOut) AS early FROM AttendanceMaster A,ShiftMaster S WHERE A.EmployeeId = ($empid) AND A.OrganizationId= $org_id AND A.AttendanceDate = '$date'  and S.TimeInBreak >A.TimeOut AND S.TimeInBreak !='00:00:00' AND A.TimeOut != '00:00:00'  AND S.Id = A.ShiftId ");
		    if($row = $query->result_array())
			 {
				if($row[0]["early"] != null)
				{
					$length = strlen($row[0]["early"])-3;
					return (substr($row[0]["early"],0,$length));
				}
				else 
					return "00:00";
			 }
		}			
  
}?>