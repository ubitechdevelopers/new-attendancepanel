<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientmodel extends CI_Model
{

    public function createclient()
    {
        $companyname = isset($_REQUEST['companyname']) ? $_REQUEST['companyname'] : '';
        $firstName = isset($_REQUEST['contactperson']) ? $_REQUEST['contactperson'] : '';
        $cont = isset($_REQUEST['contactnumber']) ? $_REQUEST['contactnumber'] : '';
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $addr = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
        $city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
        $country = isset($_REQUEST['country']) ? $_REQUEST['country'] : '';
        //echo $country;
        //exit;
        $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
        $orgid = $_SESSION['orgid'];
        $zonecity = isset($_REQUEST['zone']) ? $_REQUEST['zone'] : '';
        //$dup=$this->db->query("SELECT * FROM HolidayMaster WHERE name='$name'");
        //if($dup->num_rows()>0){
        //return false;
        //}else{
        $q = $this->db->query("INSERT INTO ClientMaster(Company,Name,Contact,Email,Address,City,Country,Description,OrganizationId,Zone,status) VALUES ('$companyname','$firstName','$cont','$email','$addr','$city','$country','$description','$orgid','$zonecity',1)");

        // var_dump($this->db->last_query());
        // die;

        return $q;
        //}
    }
    public function punchedLocations($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
        $shiftid = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $deprtid = isset($_REQUEST['deprt']) ? $_REQUEST['deprt'] : '';
        $emplid = isset($_REQUEST['empl']) ? $_REQUEST['empl'] : '';
        $desgid = isset($_REQUEST['desg']) ? $_REQUEST['desg'] : '';
		

        $zname = getTimeZone($orgid);
        // date_default_timezone_set ($zname);
        $q = "";
        $startdate = '';
        if ($date != '') {
            $arr = explode('-', trim($date));
            $enddate = date('Y-m-d', strtotime($arr[1]));
            $startdate = date('Y-m-d', strtotime(substr($arr[0], 2, strlen($arr[0]) - 3)));
            $q = "AND date BETWEEN  '$startdate' AND '$enddate' ";
        } else {
            $zname = getTimeZone($orgid);
            date_default_timezone_set($zname);
            $today = date("Y-m-d");
            $q = " AND  date =  '$today' ";
        }
        $q1 = '';
        if ($deprtid != 0) {
            $q1 .= " AND  `Department` = '$deprtid' ";
        }
        if ($shiftid != 0) {
            $q1 .= " AND `Shift`='$shiftid' ";
        }
        if ($desgid != 0) {
            $q1 .= " AND  `Designation` = '$desgid'  ";
        }
        if ($emplid != 0) {
            $q1 .= " AND EMP.Id='$emplid' ";
        }
        $res = array();

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // 
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc

        $searchQuery = "";

        if ($searchValue != '') {
            $searchQuery = "  And (EMP.FirstName like '%" . $searchValue . "%') ";
        }

        $query = $this->db->query("SELECT EMP.Id,EMP.EmployeeCode,CONCAT(FirstName,' ',LastName) as name, CM.FakeVisitOutTimeStatus, CM.FakeVisitInTimeStatus ,CM.location,CM.checkin_img,CM.checkout_img, CM.`latit`,CM.`FakeLocationStatusVisitIn`,CM.`FakeLocationStatusVisitOut`, CM.`longi`,CM.`latit_out`, CM.`longi_out`,CASE WHEN(CM.time_out > CM.time) THEN (TIMEDIFF(CM.time_out,CM.time)) ELSE('-') END as total,CM.`time_out`, CM.`time`, CM.`date`, CM.`client_name`,CM.location_out, CM.`description` FROM `checkin_master` CM,EmployeeMaster EMP  WHERE CM.OrganizationId=$orgid   and EMP.Id=CM.EmployeeId   AND EMP.Is_Delete = '0'   $q $q1 order by date(date) Desc , CM.time asc");
        $totalRecords = $query->num_rows();

        if ($searchQuery != '')
            $query = $this->db->query("SELECT EMP.Id,EMP.EmployeeCode,CONCAT(FirstName,' ',LastName) as name, CM.FakeVisitOutTimeStatus, CM.FakeVisitInTimeStatus ,CM.location,CM.checkin_img,CM.checkout_img, CM.`latit`,CM.`FakeLocationStatusVisitIn`,CM.`FakeLocationStatusVisitOut`, CM.`longi`,CM.`latit_out`, CM.`longi_out`,CASE WHEN(CM.time_out > CM.time) THEN (TIMEDIFF(CM.time_out,CM.time)) ELSE('-') END as total,CM.`time_out`, CM.`time`, CM.`date`, CM.`client_name`,CM.location_out, CM.`description` FROM `checkin_master` CM,EmployeeMaster EMP  WHERE CM.OrganizationId=$orgid $searchQuery  and EMP.Id=CM.EmployeeId   AND EMP.Is_Delete = '0'   $q $q1 order by date(date) Desc , CM.time asc");
        $totalRecordwithFilter =  $query->num_rows();

        $query = $this->db->query("SELECT CM.id,EMP.Id,EMP.EmployeeCode,CONCAT(FirstName,' ',LastName) as name, CM.FakeVisitOutTimeStatus, CM.FakeVisitInTimeStatus ,CM.location,CM.checkin_img,CM.checkout_img, CM.`latit`,CM.`FakeLocationStatusVisitIn`,CM.`FakeLocationStatusVisitOut`, CM.`longi`,CM.`latit_out`, CM.`longi_out`,CASE WHEN(CM.time_out > CM.time) THEN (TIMEDIFF(CM.time_out,CM.time)) ELSE('-') END as total,CM.`time_out`, CM.`time`, CM.`date`, CM.`client_name`,CM.location_out, CM.`description` FROM `checkin_master` CM,EmployeeMaster EMP  WHERE CM.OrganizationId=$orgid $searchQuery  and EMP.Id=CM.EmployeeId   AND EMP.Is_Delete = '0'   $q $q1 order by date(date) Desc , CM.time asc Limit $start,$rowperpage ");
		
		 /* var_dump($this->db->last_query());
		die;  */


        $queryaddon = $this->db->query("SELECT `addon_livelocationtracking` FROM `licence_ubiattendance` WHERE `OrganizationId`=$orgid");
        foreach ($queryaddon->result() as $row) {
            $addonlive = $row->addon_livelocationtracking;
        }
        foreach ($query->result() as $row) {
            $data = array();
            $data['name'] = $row->name;
            $data['eid'] = $row->Id;
            $data['code'] = $row->EmployeeCode;
            //$data['device']=$row->device;

            // $data['locationin']= '<a href="http://maps.google.com/?q='.$row->latit.','.$row->longi.'" target="_blank" title="Click to see location on map">'.$row->location.'</a>';  

            if ($row->FakeLocationStatusVisitIn == 1) {
                $data['locationin'] = '<a href="http://maps.google.com/?q=' . $row->latit . ',' . $row->longi . '" target="_blank" title="Click to see location on map">' . $row->location . '</a>
                           </br> </br>
                           <div title="Lacation recorded maliciously" class="text-center"  data-background-color="red" style="margin-right:10px;">Fake Location</div>';
            } else {
                $data['locationin'] = '<a href="http://maps.google.com/?q=' . $row->latit . ',' . $row->longi . '" target="_blank" title="Click to see location on map">' . $row->location . '</a>';
            }




            // $data['locationout']= '<a href="http://maps.google.com/?q='.$row->latit_out.','.$row->longi_out.'" target="_blank" title="Click to see location on map">'.$row->location_out.'</a>';


            if ($row->FakeLocationStatusVisitOut == 1) {
                $data['locationout'] = '<a href="http://maps.google.com/?q=' . $row->latit_out . ',' . $row->longi_out . '" target="_blank" title="Click to see location on map">' . $row->location_out . '</a>
                           </br> </br>
                           <div title="Lacation recorded maliciously" class="text-center"  data-background-color="red" style="margin-right:10px;">Fake Location</div>';
            } else {
                $data['locationout'] = '<a href="http://maps.google.com/?q=' . $row->latit_out . ',' . $row->longi_out . '" target="_blank" title="Click to see location on map">' . $row->location_out . '</a>';
            }



            $data['hyperlink'] = 'http://maps.google.com/?q=' . $row->latit . ',' . $row->longi;
            if (strtotime($row->time) <= strtotime($row->time_out)) {
                $data['total'] = substr($row->total, 0, 5);
            } else {
                if (strtotime($row->time) > strtotime($row->time_out) && $row->time != '00:00:00' && $row->time_out != '00:00:00') {
                    $time = "24:00:00";
                    $actualtime = strtotime($row->time) - strtotime($row->time_out);
                    $data['total'] = date("H:i", strtotime($time) - $actualtime);
                } else {
                    $data['total'] = '-';
                }
            }



            $data['date'] = date('M d,Y', strtotime($row->date));
            $data['date2'] = $row->date;
            $data['totaltime'] = substr($row->total, 0, 5);
            $data['timein'] = substr($row->time, 0, 5);
            if ($row->FakeVisitInTimeStatus == 1) {
                $data['fti'] = '<div title="TimeIn recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
            } else {
                $data['fti'] = "";
            }

            $data['tif'] = "";
            if ($row->FakeVisitInTimeStatus == 0) {
                $data['tif'] =  substr($row->time, 0, 5);
            } else {
                $data['tif'] = substr($row->time, 0, 5) . ' ' . $data['fti'];
            }
            $data['timeout'] = substr($row->time_out, 0, 5);
            if ($row->time_out == "00:00:00")
                $data['timeout'] = "-";
            if ($row->FakeVisitOutTimeStatus == 1) {

                $data['fto'] = '<div title="TimeOut recorded maliciously" class="text-center"  data-background-color="red" style="font-size:11px;">Fake</div>';
            } else {
                $data['fto'] = "";
            }

            $data['tof'] = "";
            if ($row->FakeVisitOutTimeStatus == 0) {
                $data['tof'] =  substr($row->time_out, 0, 5);
            } else {
                $data['tof'] = substr($row->time_out, 0, 5) . ' ' . $data['fto'];
            }
            $data['client'] = $row->client_name;
            $data['totaltime'] = substr($row->total, 0, 5);
            // echo $data['totaltime'];
            $data['comments'] = $row->description;

            if ($row->checkin_img != "") {
                $imgarr = explode("visits", $row->checkin_img);
                $imgurl = isset($imgarr[1]) ? URL . 'cron/visitimage' . $imgarr[1] : 'https://ubitech.ubihrm.com/public/avatars/male.png';
				
				 $data['test'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->id . '"   data-latit="' . $row->latit . ',' . $row->longi . '" data-latitin="' . $row->latit . '" data-longiin="' . $row->longi . '" ><img src="' . URL . "../assets/icons/clientvisit.svg" . '"  style="width:28.33px!important;height:28.33px!important;" title="' . $row->location . '"/></span>';


                $data['entryimg'] =  '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$imgurl.'"  style="width:60px!important; "/></i>';
                   
                $data['tif'] = substr($row->time, 0, 5)  . '<br>' . $data['test'];

               
            } else {
                $data['entryimg'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$imgurl.'"  style="width:60px!important; "/></i>';
				
                     $data['test'] = '<span  class="test" data-toggle="modal" data-target="#locationmodal" data-attid="' . $row->id . '"   data-latit="' . $row->latit . ',' . $row->longi . '" data-latitin="' . $row->latit . '" data-longiin="' . $row->longi . '" ><img src="' . URL . "../assets/icons/clientvisit.svg" . '"  style="width:28.33px!important;height:28.33px!important;" title="' . $row->location . '"/></span>';

                $data['tif'] = substr($row->time, 0, 5)  . '<br>' . $data['test'];

            }
            if ($row->checkout_img != "") {
                $imgarr = explode("visits", $row->checkout_img);
                $imgurl = isset($imgarr[1]) ? URL . 'cron/visitimage' . $imgarr[1] : 'https://ubitech.ubihrm.com/public/avatars/male.png';
				
			
				
                $data['exitimg'] ='<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$row->checkout_img.'"  style="width:60px!important; "/></i>';
				
                    $data['test1'] ='<span  class="test1" data-checkin="' . $row->id . '" data-latit="' . $row->latit . ',' . $row->longi . '" data-latitin="' . $row->latit . '" data-attid="' . $row->id . '" data-longiin="' . $row->longi . '" data-checkinloc="' . encode5t($row->location) . '" data-checkinloc="' . encode5t($row->location) . '" ><img src="' . URL . "../assets/icons/clientvisit.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->location_out . '"/></span>';

                $data['tof'] = substr($row->time_out, 0, 5)  . '<br>' . $data['test1'];
                
            } else {

                $data['exitimg'] =
                    '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$row->checkout_img.'"  style="width:60px!important; "/></i>';
					
                    $data['test1'] ='<span  class="test1" data-checkin="' . $row->id . '" data-latit="' . $row->latit . ',' . $row->longi . '" data-latitin="' . $row->latit . '" data-attid="' . $row->id . '" data-longiin="' . $row->longi . '" data-checkinloc="' . encode5t($row->location) . '" data-checkinloc="' . encode5t($row->location) . '" ><img src="' . URL . "../assets/icons/clientvisit.svg" . '"  style="width:28.33px!important;height:28.33px!important;"title="' . $row->location_out . '"/></span>';

                $data['tof'] = substr($row->time_out, 0, 5)  . '<br>' . $data['test1'];
                /*'<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="'.$row->checkout_img.'"  style="width:60px!important; "/></i>';*/
            }

            // if($addonlive==1){
            // $data['action']='<a href="trackempvisit/'.$data['eid'].'/'.$data['date2'] . '/'.$data['timein'].'/'.$data['timeout'].'/'.$data['total'].'" target="_self"><i class="fas fa-walking" style="font-size:24px; color:purple;" title="Track punched visits"></i></a>';
            // }else{
            //     $data['action']='';
            // }
            $data['action'] = '<div class="dropdown">
                                     
                <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 11rem; height:2.4rem;   border-radius:5px;   margin-left:-25%"">

           <li class="hover" style="height:37px; padding-top:2%; margin-top:-5%; font-size:14px;" data-toggle="modal"><a class="hover" style="color:black; font-size:13px; margin-left:10px;"  href="trackempvisit/' . $data['eid'] . '/' . $data['date2'] . '/' . $data['timein'] . '/' . $data['timeout'] . '/' . $data['total'] . '" target="_self"><i class="fa fa-street-view" style="font-size:24px; color:black;" title="Track punched visits"></i>Track punched visits</a></li>';


            $res[] = $data;
        }
        $d['data'] = $res;
        //return $d;
        $this->db->close();
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        //echo json_encode($d);
        return $response;
    }
public function getlattitude(){
	$orgid = $_SESSION['orgid'];
	$attid=isset($_REQUEST['aid'])?$_REQUEST['aid']:0;
	/* var_dump($attid);
	die; */
	
	$query=$this->db->query("SELECT latit,longi,latit_out,longi_out,location,location_out,time,time_out,EmployeeId FROM checkin_master Where id=$attid AND OrganizationId=$orgid")->result();
	return $query;
	
}


    function getClientData($postData = Null)
    {
        $orgid = $_SESSION['orgid'];
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // 
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc

        $zonename = isset($_REQUEST['zonecityfilter']) ? $_REQUEST['zonecityfilter'] : '';
        $statusfilter = isset($_REQUEST['statusfilter']) ? $_REQUEST['statusfilter'] : '1';


        $q1 = '';
        if ($zonename != '0') {
            $q1 .= " AND Zone LIKE '%$zonename%' ";
        }if($statusfilter == 1)
        {
        $q1.= " AND status IN(1,2) ";
        
        }else if($statusfilter == 0){
        $q1.= " AND status = 0 ";
        }
            $searchQuery = "";

            if ($searchValue != '') {
                $searchQuery = "  And (CM.Company like '%" . $searchValue . "%' || CM.Name like '%" . $searchValue . "%' || CM.Email like '%" . $searchValue . "%') ";
            }

            $query = $this->db->query("SELECT COUNT(CM.Id) as allcount FROM ClientMaster CM  where OrganizationId=$orgid  $q1 AND  status IN('1','0','2')")->result();
            $totalRecords = $query[0]->allcount;

            if ($searchQuery != '')
                $query = $this->db->query("SELECT COUNT(CM.Id) as allcount FROM ClientMaster CM where OrganizationId=$orgid  $q1 AND  status IN('1','0','2') $searchQuery")->result();
            $totalRecordwithFilter = $query[0]->allcount;
            //   var_dump($totalRecordwithFilter);
            //  die();
            $query = $this->db->query("SELECT id,(select count(id)as ids from clientlist where clientid = CM.Id) as coutnemp,Company,Name,Contact,Email,Address,City,Country,Description,status,Zone FROM ClientMaster CM WHERE OrganizationId=$orgid  $searchQuery $q1 AND  status IN('1','0','2') order by Company $columnSortOrder  Limit $start,$rowperpage  ");
              //var_dump($this->db->last_query());
     
             //die;

   

        $res = array();
        $d = array();
        
        foreach ($query->result() as $row) {
            $data = array();
            $data['change'] = '<input type="checkbox" name="chk"  id="' . $row->id . '" class="checkbox"  value="' . $row->id . '" data-status="' . $row->status . '" >';
			 
            $data['company'] = $row->Company;
            $data['name'] = $row->Name;
            $data['email'] = $row->Email;
            $data['addr'] = $row->Address;
            $data['city'] = $row->City;
            
            $data['contact'] = $row->Contact;
            $data['desc'] = $row->Description;
            $data['sts'] = $row->status;
            $data['zone'] = $row->Zone;
            if ($data['sts'] == '1' || $data['sts'] == '2' ) {
                $data['sts'] = '<div style="background-color:#27AE60;text-align:center;color:white; border-radius:100px;">Active</div>';
            }
            if ($data['sts'] == '0') {
                $data['sts'] = '<div style="background-color:red;text-align:center;color:white; border-radius:100px;">Inactive</div>';

                $data['thump'] = '<i class="  statusactive fa fa-thumbs-up" style="font-size:16px; margin-left:15px; color:black;"  data-id="' . $row->id . '" data-cname="' . $row->Company . '" data-sts="' . $row->status . '" data-ena="' . $row->Name . '" title="Make Active"><a class="  statusactive" href="#" style="color:black;font-weight:500; font-size:13px; font-family:poppins; margin-left:10px;" data-toggle="modal" data-target="#changestatusactive">  Status</a></i>';
            } else {
                $data['thump'] = '<i  class=" statusinactive fa fa-thumbs-down" style="font-size:16px; margin-left:15px; color:black"  data-id="' . $row->id . '" data-cname="' . $row->Company . '" data-sts="' . $row->status . '" data-countsts="' . $row->coutnemp . '" data-ena="' . $row->Name . '" title="Make Inactive"><a class=" statusinactive" href="#" style="color:black;font-weight:500; font-size:13px; font-family:poppins; margin-left:10px;" data-toggle="modal" data-target="#changestatus">  Status</a></i>';
            }




            $data['action'] = '<div class="dropdown">
                                     
                                       <!-- three dots -->
                                       <ul data-toggle="dropdown" 
                                             aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                       </ul>
                                       <span class="caret"></span>
                                     
                                     <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 6.6rem; height:5.7rem;  border-radius:5px;   margin-left:-25%">
   
                                     <li data-toggle="modal" data-target="#addClientE" class="edit hover"  style="height:30px; padding-top:4%;  margin-top:-8%;"
            data-id="' . $row->id . '"data-comp="' . $row->Company . '"data-name="' . $row->Name . '"data-email="' . $row->Email . '"data-addr="' . $row->Address . '"data-city="' . $row->City . '"data-contact="' . $row->Contact . '"data-country="' . $row->Country . '"data-desc="' . $row->Description . '"data-zone="' . $row->Zone . '"data-sts="' . $row->status . '"><img src="' . URL . "../assets/img/Vector.svg" . '" id="get" class="  material-icons  mod" style="font-size:16px; margin-left:15px;"  title="Edit"><a href="#" style="color:black; font-weight:500; font-size:13px; margin-left:10px; ">Edit</a></li> 

   
                <li class="delete hover" style="height:30px; padding-top:4%;" data-toggle="modal" data-target="#delClient"  
                 data-id="' . $row->id . '"
                  data-cname="' . $row->Company . '"
                   data-ena="' . $row->Name . '" 
                   data-countsts="' . $row->coutnemp . '"><img src="' . URL . "../assets/img/trash-2.svg" . '"  class=" delete" style="font-size:16px; margin-left:15px;"  data-id="' . $row->id . '" data-cname="' . $row->Company . '" data-ena="' . $row->Name . '" data-countsts="' . $row->coutnemp . '"  title="Delete Client"><a href="#" style="color:black; font-weight:500; font-size:13px; margin-left:10px;">Delete</a></li>
   
                 <li class="Status hover" style="height:30px; padding-top:4%;" >' . $data['thump'] . ' </li></div>';

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
        //echo json_encode($d);
        return $response;
    }


    public function emportEmp($request)
    {
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
        //die();

        $check = true;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $date = date('Y-m-d');
        $file_name = "newjoining.csv";
        $location = IMGURL . "employee/$orgid/";
        $fp = $location . $file_name;

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
        if (($file = fopen($fp, 'r')) !== FALSE) { //select file //
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) { //get the data of file//
                $remark1 = '';
                //var_dump($data[1]);
                // var_dump($data[$fname]);
                // die;
                // var_dump($data[$doj]);
                // die();


                $check = true;
                if ($i > 0) {
                    $totalcount = $totalcount + 1;
                    if ($data[3] == "" || $data[4] == "" || $data[5] == "" || $data[$fname] == "" || $data[2] == "") {

                        $remark = "Data insufficient.";
                        $sql1 = "INSERT INTO Temp_user_csv(FirstName,EmployeeCode,Department,Designation,Shift,PersonalNo,OrganizationId,CreatedDate,email,Archive,createdBy,remark,country,doj) VALUES 
                 (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $this->db->query($sql1, array(
                            $data[$fname],
                            $data[$ecode], $data[4], $data[5], $data[3], $data[2], $orgid, $date, $data[$email], $sts, $user_id, $remark, $data[7], $data[8]
                        ));


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
                        $this->db->query($sql3, array(
                            $data[$fname],
                            $data[$ecode], $data[$dept], $data[$desg], $data[$shift], $data[$cont], $orgid, $date, $data[$email], $sts, $user_id, $remark1, $country1, $empdoj
                        ));
                    }

                    // edit by sohan
                    if ($check) {

                        $dept1 = getDepartmentId_create($data[4], $orgid);
                        $desg1 = getDesignationId_create($data[5], $orgid);
                        $shift1 = getshiftId($data[3], $orgid);
                        $remarks = "";
                        if ($dept1 == 0) { // if department not found
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
                            $this->db->query($sql2, array(
                                $data[$fname],
                                $data[$ecode], $dept1, $desg1, $shift1, encode5t($data[$cont]), $orgid, $date, $date, $empdoj, $data[$email], $country1
                            ));
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
               <p>You are registered in ubiAttendance App for “ Ubitech Solutions”. Kindly punch your attendance through the following steps.</p>
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

    public function deleteTmp()
    {
        $orgid = $_SESSION['orgid'];
        $query = $this->db->query("DELETE FROM Temp_user_csv WHERE OrganizationId ='$orgid'");
        if ($query > 0) {
            return TRUE;
        }
    }

	public function emportCli($request)
{
//$result1 = array();

  $errormsg = ""; $count = ""; $success = "";
  $adminid = $_SESSION['id'];
  $orgid = $_SESSION['orgid'];
  //return print_r($request);
  $company =  $request[0];
  $clientname =  $request[1];
  $email =  $request[2];
  $city = $request[3];
  $phone =  $request[4];
  $address = $request[5];
  $desc =  $request[6];
$zonecitye =  $request[7];



 
  $status=0;
    $check = true;
  $zone=getTimeZone($orgid);
  date_default_timezone_set($zone);
  $date=date('Y-m-d');
  $file_name = "newclient.csv";
  $location = IMGURL."employee/$orgid/";
  //var_dump($location);
  //die;
  //$location = "http://ubiattendance.zentylpro.com/ubiattnew1/uploads/employee/10/";
  //var_dump($location);
  $fp = $location.$file_name;

  $sts = 1;
  $i = 0;
	$j = 0;
	$rer = "";
  $count = 0;
  $totalcount = 0;
  if(($file = fopen($fp,'r')) !== FALSE)//select file
  {
  while(($data = fgetcsv($file,1000,",")) !== FALSE)//get the data of file//
  {
 $check = true;
 
   if($i>0 )
  {
    $totalcount = $totalcount+1;
  if($data[0] == "")
  {  
 $check = false;
         }
          if($data[1] == "")
  {
 $data[1] = 'NO NAME';
  }
         if($check)
  {
/*  var_dump($data[$clientname]);
var_dump($data[$company]);
var_dump($data[$address]);
var_dump($data[$phone]);

die; */

$qr11 = "select id from ClientMaster where OrganizationId = ? and Company = ? ";
$query11 = $this->db->query($qr11,array($orgid,$data[$company]));
 
if($query11->num_rows() == 0)
{
 $sql = "INSERT INTO ClientMaster (Name,Company,Email,Description,City,Address,Contact,Status,
OrganizationId,createdBy,ModifiedDate,Zone) VALUES
(?,?,?,?,?,?,?,?,?,?,?,?)";
$this->db->query($sql,array($data[$clientname],$data[$company],
$data[$email],$data[$desc],$data[$city],$data[$address],$data[$phone],$sts,$orgid,$adminid,$date,$data[$zonecitye]));

//var_dump($this->db->last_query());




$count = $count+1;
$status = 1;
}
}
 }
      $i++;
    }
   }
  $data = array('status'=>$status,'count'=>$count);
return $data;
}


    public function deleteclient()
    {

        $orgid = $_SESSION['orgid'];
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $todaydate = date('Y-m-d');
        $id =  isset($_REQUEST['clientid']) ? $_REQUEST['clientid'] : 0;
        // var_dump($id);

        $query = $this->db->query("DELETE FROM `ClientMaster` WHERE id=$id");

        $check = $this->db->affected_rows($query);
        if ($check > 0) {
            echo 1;
            return;
        }
    }
    public function updateClientStatus()
    {
        $orgid = $_SESSION['orgid'];
        $id =  isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $sts = (isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 0) == 1 ? 0 : 1;
        //var_dump($sts);
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $updSts = 0;
        $sql = "update ClientMaster set status = $sts where id = $id";

        $query = $this->db->query($sql);


        $check = $this->db->affected_rows($sql);
        if ($check > 0) {
            echo 1;
            return;
        }
        $this->db->close();
    }

    function getClientlist()
    {
        $orgid = $_SESSION['orgid'];

       /*  $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $searchValue = $postData['search']['value'];
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // 
        $columnSortOrder = $postData['order'][0]['dir']; //asc or desc

        $searchQuery = "";

        if ($searchValue != '') {
            $searchQuery = "  And (CM.Company like '%" . $searchValue . "%'|| E.FirstName like '%" . $searchValue . "%') ";
        }

        $query = $this->db->query("SELECT COUNT(CM.Id) as allcount FROM ClientMaster CM,clientlist S where S.organizationid='$orgid' and  S.clientid=CM.Id group by S.employeeid");
        // $totalRecords = $query[0]->allcount;
        $totalRecords = $query->num_rows();

        if ($searchQuery != '')
            $query = $this->db->query("SELECT COUNT(CM.Id) as allcount FROM ClientMaster CM,clientlist S , EmployeeMaster E where S.organizationid ='$orgid' And E.OrganizationId = CM.OrganizationId AND E.Id = S.employeeid and  S.clientid=CM.Id $searchQuery  group by S.employeeid ");
        $totalRecordwithFilter = $query->num_rows(); */

        //    var_dump($totalRecordwithFilter);
        //    die() ;    

       /*  $query = $this->db->query("SELECT E.FirstName,S.clientid,S.employeeid,GROUP_CONCAT(CM.Company SEPARATOR ', ') as compname ,GROUP_CONCAT(S.clientid SEPARATOR ', ') as `cid` from clientlist S, ClientMaster CM, EmployeeMaster E where S.clientid= CM.Id And S.organizationid='$orgid' $searchQuery   Group by S.employeeid Limit $start,$rowperpage "); */
		
		$query = $this->db->query("SELECT S.clientid,S.employeeid,GROUP_CONCAT(M.Company SEPARATOR ', ') as compname ,GROUP_CONCAT(S.clientid SEPARATOR ', ') as `cid` from clientlist S, ClientMaster M where S.clientid=M.Id AND S.organizationid=$orgid  Group by S.employeeid");     
		
		

        //     var_dump($this->db->last_query());
        //    die() ;  


        $d = array();
        $res = array();
        foreach ($query->result() as $row) {
            $data = array();
            $data['Name'] = $row->compname;
            //$data['Name']=getAllListclient($row->clientid);
            $data['empname'] = getEmpName($row->employeeid);
            //$data['empname']=$row->empname;
            $data['action'] = '<div class="dropdown">
                                     
                <!-- three dots -->
            <ul data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false" style="font-size: 0.5rem;line-height: 0.4rem;padding-top: 0.5rem; color:#808080;">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <span class="caret"></span>
            
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="min-width: 5.8rem; height:3.9rem;   border-radius:5px;   margin-left:-25%"">

           <li class="hover" style="height:30px; padding-top:6%; margin-top:-9%; font-size:14px;" data-toggle="modal"> 
             <a href="#" style="font-size:13px; margin-left:10px; color:black; font-weight:500;font-family:poppins!important;"><i class="fa fa-eye  " id="showclientlist"   style="font-size:13px;   color:black; font-weight:500; " data-toggle="modal" title="View"
              data-eid="' . $row->employeeid . '"
              data-client="' . $row->clientid . '"
              data-name="' . $data['empname'] . '"
              data-target="#editclient">&nbsp&nbspView</a></i></li>
        
             <li  class="hover" style="height:30px; padding-top:6%; font-size:14px;" data-toggle="modal">  
            <a href="#" style="font-size:13px; margin-left:10px; font-weight:500;  color:black; font-family:poppins!important;"><i class="getassignclient  fa fa-tasks " id="getempnameforclient"  style="font-size:13px;    color:black; font-weight:500;" data-toggle="modal" title="Assign"
              data-empid="' . $row->employeeid . '"
              data-clientid="' . $row->clientid . '"
              data-empname="' . $data['empname'] . '">&nbsp&nbsp&nbspAssign
              </a></i></li>';
            //$data['action']='<span onclick="openmodal('.$row->clientid.')" ><i id="" class="fas fa-user-times" style="font-size:26px; color:purple;"  title="unassign"></i></span>';

            $res[] = $data;
        }

       // $d['data'] = $res;
        /* $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $res
        );
        // echo json_encode($d);
        return $response; */
       // $this->db->close();
	   
	    $d['data']=$res;
      $this->db->close();
      echo json_encode($d);
      return false;
    }




    public function showselectedclient()
    {
        $orgid = $_SESSION['orgid'];
        $eid = isset($_REQUEST['eid']) ? $_REQUEST['eid'] : '';
        $id = $_SESSION['id'];


        $query = $this->db->query("SELECT * FROM `clientlist` WHERE `employeeid`=$eid AND organizationid=$orgid");



        $d = array();

        $res = array();

        foreach ($query->result() as $row) {
            $data = array();
            $data['Name'] = getAllListclient($row->clientid);
            $name23 = getAllListclient($row->clientid);
            //$data['action']= '<button onclick=openmodal('Harry Potter','Wizard')">Try it</button>'

            $data['action'] = '
             <span onclick="openmodal(' . $row->clientid . ',' . $row->employeeid . ',\'' . $name23 . '\')" ><i id="" class="fa fa-user-times" style="font-size:20px; color:black;"  title="unassign"></i></span>';

            $res[] = $data;
        }

        //$d['data']=$res;
        $this->db->close();
        //echo json_encode($d);
        return $res;
    }
    function editClient()
    {

        $orgid = $_SESSION['orgid'];
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $id =  isset($_REQUEST['sid']) ? $_REQUEST['sid'] : 0;
        $company =  isset($_REQUEST['comp']) ? $_REQUEST['comp'] : 0;
        $name =  isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $email =  isset($_REQUEST['email']) ? $_REQUEST['email'] : 0;
        $cont = isset($_REQUEST['cont']) ? $_REQUEST['cont'] : 0;
        $addr =  isset($_REQUEST['addr']) ? $_REQUEST['addr'] : 0;
        $city =  isset($_REQUEST['city']) ? $_REQUEST['city'] : 0;
        $country =  isset($_REQUEST['countr']) ? $_REQUEST['countr'] : 0;
        // var_dump($country);
        // exit();
        $sts =  isset($_REQUEST['sts']) ? $_REQUEST['sts'] : 0;
        $desc =  isset($_REQUEST['desc']) ? $_REQUEST['desc'] : 0;
        $zonecitye =  isset($_REQUEST['zonecitye']) ? $_REQUEST['zonecitye'] : 0;



        $query = $this->db->query("SELECT * FROM ClientMaster WHERE Id!='$id' AND Company Like '$company'");

        $check = $this->db->affected_rows($query);

        $query1 = $this->db->query("SELECT * FROM ClientMaster WHERE Id!='$id' AND Email Like '%$email%'");

 
        $check1 = $this->db->affected_rows($query1);

        $query2 = $this->db->query("SELECT * FROM ClientMaster WHERE Id!='$id' AND Contact='$cont'");

        $check2 = $this->db->affected_rows($query2);

        if ($check > 0) {
             echo 2;
            return;
        } 
		 else
		 if ($check1 > 0) {
            echo 3;
            return;
        }  
		
		elseif ($check2 > 0) {
            echo 4;
            return;
        }



        $query = $this->db->query("UPDATE ClientMaster SET Company = ?, Name=?,Contact=?,Email=?,Address=?,City=?,Country=?,Description=?,Zone=? Where OrganizationId=? AND Id=?", array($company, $name, $cont, $email, $addr, $city, $country, $desc, $zonecitye, $orgid, $id));
        //   var_dump($this->db->last_query());
        //   die;
        $check = $this->db->affected_rows($query);

        if ($check > 0) {

            echo 1;
            //return

        } else {
            echo 0;
        }
    }

    public function updateclient()
    {
        $orgid = $_SESSION['orgid'];
        $clientid = isset($_REQUEST['clientid']) ? $_REQUEST['clientid'] : '';


        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : 0;
        $ids = implode(', ', $clientid);


        $cdate = date("Y-m-d");
        // var_dump($ids);
        // die;
        $categories = '';
        // $cats = explode(",", $ids);
        $fruits_ar = explode(', ', $ids);
        // var_dump($cats);
        // die;






        foreach ($fruits_ar as $cat) {
            $cat = trim($cat);

            $queryselect = $this->db->query("SELECT clientid FROM clientlist WHERE clientid = $cat and employeeid=$empid");
            $count = $this->db->affected_rows($queryselect);
            //var_dump($count);

            if ($count > 0) {
                echo 4;
            } else {

                $sql1 = "INSERT INTO `clientlist`(`employeeid`, `clientid`, `organizationid`, `createddate`) VALUES (?,?,?,?)";
                $query = $this->db->query($sql1, array($empid, $cat, $orgid, $cdate));
                echo $query;
            }
        }
    }

    public function unassignclient()
    {
        $orgid = $_SESSION['orgid'];
        $cid = isset($_REQUEST['clientid']) ? $_REQUEST['clientid'] : '';
        $eid = isset($_REQUEST['emplid']) ? $_REQUEST['emplid'] : '';

        $data = array(); {
            $query = $this->db->query("DELETE FROM `clientlist` where clientid=? AND employeeid=? and OrganizationId=?", array($cid, $eid, $orgid));
            echo $this->db->affected_rows();
        }
    }
    public function assignclientforemp()
    {
        $orgid = $_SESSION['orgid'];
        $empid = isset($_REQUEST['empid']) ? $_REQUEST['empid'] : '';
        $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : '';


        $res = array();

        $query = $this->db->query("SELECT id,Company FROM `ClientMaster` where OrganizationId=$orgid and `status`='1' AND `DisapproveSts`='0' AND id NOT IN(SELECT `clientid` FROM `clientlist` WHERE `organizationid`=$orgid AND employeeid=$empid ) order by Company");

        //var_dump($this->db->last_query());


        foreach ($query->result() as $row) {
            $data = array();
            $data['id'] = $row->id;
            $data['Company'] = $row->Company;



            $res[] = $data;
        }


        $this->db->close();
        return $res;
    }


    public function trackLocationsvisit($eid, $date, $timein, $timeout)
    {
        //var_dump($timeout);
        header('Access-Control-Allow-Origin: *');
        $orgid = isset($_SESSION['orgid']) ? $_SESSION['orgid'] : '0';

        $timeoutss = strtotime($timeout);
        $timeout1 = date("H:i:s", strtotime('+1 minutes', $timeoutss));



        $query = $this->db->query("SELECT EMP.Id,EMP.EmployeeCode,CONCAT(FirstName,' ',LastName) as name, CM.FakeVisitOutTimeStatus, CM.FakeVisitInTimeStatus ,CM.location,CM.checkin_img,CM.checkout_img, CM.`latit`,CM.`FakeLocationStatusVisitIn`,CM.`FakeLocationStatusVisitOut`, CM.`longi`,CM.`latit_out`, CM.`longi_out`,CASE WHEN(CM.time_out > CM.time) THEN (TIMEDIFF(CM.time_out,CM.time)) ELSE('-') END as total,CM.`time_out`, CM.`time`, CM.`date`, CM.`client_name`,CM.location_out, CM.`description` FROM `checkin_master` CM,EmployeeMaster EMP  WHERE CM.OrganizationId=$orgid and EMP.Id=? AND CM.EmployeeId=? AND CM.date='$date'  AND EMP.Is_Delete = '0'   order by date(date) Desc, CM.time asc ", array($eid, $eid));

        //var_dump($this->db->last_query());
        //}

        $res = array();
        foreach ($query->result() as $row) {
            // if($row->time_out !='00:00:00' && $row->time_out =='00:00:00'){
            $data = array();
            //$chid=$row->Id;
            $data['client_name'] = $row->client_name;
            $data['location'] = $row->location;
            $data['latit'] = $row->latit;
            $data['longi'] = $row->longi;




            $data['time'] = $row->time;
            $data['location_out'] = $row->location_out == '' ? '-' : $row->location_out;
            $data['latit_out'] = $row->latit_out;
            $data['longi_out'] = $row->longi_out;
            $data['time_out'] = $row->time_out == '00:00:00' ? '-' : $row->time_out;
            $data['description'] =  $row->description;
            $data['total'] =  substr($row->total, 0, 5);
            //$data['descriptionIn'] =  $row->descriptionIn;
            //$data['workhour'] =$row->workhour;

            $data['entryimage'] = $row->checkin_img;
            if ($data['entryimage'] == '') {
                $data['entryimage'] = '-';
            } else {
                $data['entryimage'] = $row->checkin_img;
            }

            $data['exitimage'] = $row->checkout_img;

            if ($data['exitimage'] == '') {
                $data['exitimage'] = '-';
            } else {
                $data['exitimage'] = $row->checkout_img;
            }




            $res[] = $data;
        }
        // }
        return ($res);
    }
    public function livetrack($dateSelected)
    {
        $orgid = $_SESSION['orgid'];
        //var_dump($dateSelected);
        $query = $this->db->query("SELECT * FROM `EmployeeMaster` WHERE `OrganizationId` = $orgid AND `livelocationtrack` = 1 AND archive=1 and Is_Delete = 0 order by FirstName Asc
   ");
        $data = array();
        $res = array();
        foreach ($query->result() as $row) {
            //$data['name']=$row->FirstName;
            $data['name'] = '<a  style="color:#000;" href="' . URL . 'admin/livetrack/' . $row->Id . '/' . $dateSelected . '">' . $row->FirstName . '</a>';
            $data['empid'] = $row->Id;

            $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "avatars/female.png" . '"    style="width:50px!important;height:50px!important;border-radius:50%"  /></i>';


            if ($row->ImageName != "" || $row->ImageName != 0) {

                $imglength = strlen($row->ImageName);
                $imghttps = substr($row->ImageName, 0, 5);
                $imghttp = substr($row->ImageName, 0, 4);

                if ($imglength > 30) {
                    if ($imghttps == 'https' || $imghttp == 'http') {

                        $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . $row->ImageName . '" style="width:50px!important;height:50px!important;border-radius:50%;object-fit:cover;"  /></i>';

                        $imgname = $row->ImageName;
                    } else {
                        $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "avatars/female.png" . '"    style="width:50px!important;height:50px!important;border-radius:50%;object-fit:cover;"  /></i>';
                    }
                } else {

                    $data['photo'] = '<i class="pop" data-toggle="modal" data-target="#imagemodal"><img src="' . IMGURL3 . "uploads/$orgid/" . $row->ImageName . '" style="width:50px!important;height:50px!important;border-radius:50%;object-fit:cover;"  /></i>';

                    $imgname = IMGURL3 . "uploads/$orgid/" . $row->ImageName;
                }
            }


            $res[] = $data;
        }

        return ($res);
    }

    public function insertclient()


    {
        $orgid = $_SESSION['orgid'];
        $company =  isset($_REQUEST['companyname']) ? $_REQUEST['companyname'] : 0;
		
        $fname =  isset($_REQUEST['contactperson']) ? ucfirst($_REQUEST['contactperson']) : 0;
        $sts =  isset($_REQUEST['sts']) ? $_REQUEST['sts'] : '';
        $contry =  isset($_REQUEST['country']) ? $_REQUEST['country'] : 0;
        $city =  isset($_REQUEST['city']) ? $_REQUEST['city'] : 0;
        $email = isset($_REQUEST['email']) ? strtolower($_REQUEST['email']) : 0;
        $addr =  isset($_REQUEST['address']) ? $_REQUEST['address'] : 0;
        $desc = isset($_REQUEST['description']) ? $_REQUEST['description'] : 0;
        $cont = isset($_REQUEST['contactnumber']) ? $_REQUEST['contactnumber'] : 0;
        $zonecity = isset($_REQUEST['zone']) ? $_REQUEST['zone'] : 0;

        $check = true;
        $zone = getTimeZone($orgid);
        date_default_timezone_set($zone);
        $date = date('Y-m-d H:i:s');

        $query = $this->db->query("SELECT * FROM `ClientMaster` WHERE Email='$email'");
        $check1 = $this->db->affected_rows($query);

        $query1 = $this->db->query("SELECT * FROM `ClientMaster` WHERE Contact='$cont'");

        $check2 = $this->db->affected_rows($query1);

        $query2 = $this->db->query("SELECT *  FROM `ClientMaster` WHERE `Company` LIKE '%$company%'");  
//echo "SELECT *  FROM `ClientMaster` WHERE `Company` LIKE '% $company %'";
//exit;
        $check3 = $this->db->affected_rows($query2);


        if ($check1 > 0) {
            echo 2;
            return;
        } else if ($check2 > 0) {
            echo 3;
            return;
        } else if ($check3 > 0) {
            echo 5;
            return;
        } else {


            $sql = "INSERT INTO ClientMaster (Company,Name,Contact,Email,Address,City,Country,Description,status,OrganizationId,Zone) VALUES
       (?,?,?,?,?,?,?,?,?,?,?)";
            $this->db->query($sql, array($company, $fname, $cont, $email, $addr, $city, $contry, $desc, $sts, $orgid, $zonecity));


            $result = $this->db->affected_rows($sql);

            if ($result > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    public function timezone(){
        $Id = isset($_REQUEST['country'])?$_REQUEST['country']:''; 
        //echo $Id;
         $data=array();
         $data['timezone']=0;
         $query = $this->db->query("SELECT Z.CountryId,Z.`Id`, Z.`Name` FROM `ZoneMaster`Z,  CountryMaster C WHERE Z.CountryId=C.Id and Z.CountryId=? ",array($Id));
              //var_dump($this->db->last_query());
         $d=array();
         $res=array();
               foreach ($query->result() as $row)
         {
                $data['timezone']=$row->Name;
                $data['timezone_id']=$row->Id;
                //echo $data['code'];
                $res[]=$data;
         }
               $d['data']=$res;          //$query->result();
         echo  json_encode($d); 
         return false;
     
       }

       public function getCity()
    {
       
        $country =  isset($_REQUEST['country'])?$_REQUEST['country']:0;
        $sql = "SELECT * FROM CityMaster where CountryId = $country ";
       $query = $this->db->query($sql);
        echo json_encode($query->result());
      }
} 