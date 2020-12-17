<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shift extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->model('shift_model');
    }
    public function index()
    {
        $this
            ->load
            ->view('home/manageshift');
    }

    public function insertdata()
    {

        $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
        $orgid = $_SESSION['orgid'];

        if ($shifttype == 1)
        {
            $timein = date("H:i:s", strtotime(isset($_REQUEST['ti']) ? $_REQUEST['ti'] : ''));
            $timeout = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ''));
            $timein_break = date("H:i:s", strtotime(isset($_REQUEST['tib']) ? $_REQUEST['tib'] : ''));
            $timeout_break = date("H:i:s", strtotime(isset($_REQUEST['tob']) ? $_REQUEST['tob'] : ''));
            $timegrace = date("H:i:s", strtotime(isset($_REQUEST['tig']) ? $_REQUEST['tig'] : ''));
            $timegraceout = date("H:i:s", strtotime(isset($_REQUEST['gto']) ? $_REQUEST['gto'] : ''));
            //var_dump($timein);
            //var_dump($timegrace);
            $query = $this
                ->db
                ->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");
            if ($orgid == "35171" || $orgid == "10")
            {
                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000) echo 66;
                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /*else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    }*/
                    else if ($timein > $timegrace)
                    {
                        echo 50;
                    }
                    else if ($timegrace > $timeout)
                    {
                        echo 52;
                    }
                    /*else if($timein > $timegraceout)
                    {
                    echo 51;
                    }*/
                    /*else if($timeout < $timegraceout)
                    {
                    echo 60;
                    }*/
                    /*else if($timein_break <= $timein)
                    {
                    echo 44;
                    }*/
                    /*else if($timeout_break >= $timeout)
                    {
                    echo  55;
                    }*/
                    else
                    {
                        $this
                            ->shift_model
                            ->registerShift();
                    }
                }

            }
            else
            {

                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000) echo 66;
                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /*else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    }*/
                    /* else if($timein > $timegrace)
                    {
                    echo 50;
                    } */
                    /* else if($timegrace > $timeout)
                    {
                    echo 52;
                    } */
                    /*else if($timein > $timegraceout)
                    {
                    echo 51;
                    }*/
                    /* else if($timeout < $timegraceout)
                    {
                    echo 60;
                    } */
                    /*else if($timein_break <= $timein)
                    {
                    echo 44;
                    }*/
                    /*else if($timeout_break >= $timeout)
                    {
                    echo  55;
                    }*/
                    else
                    {
                        $this
                            ->shift_model
                            ->registerShift();
                    }
                }

            }
            /* else
            {
            echo 0;
            } */

        }

        elseif ($shifttype == 3)
        {
            $this
                ->shift_model
                ->registerShift();
        }
        else
        {

            $timein = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['ti']) ? '2019-06-25' . ' ' . $_REQUEST['ti'] : ''));
            // $timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
            $timeout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['to']) ? '2019-06-26' . ' ' . $_REQUEST['to'] : ''));
            $timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-25' . ' ' . $_REQUEST['tib'] : ''));
            $timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-25' . ' ' . $_REQUEST['tob'] : ''));
            $timegrace = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tig']) ? '2019-06-25' . ' ' . $_REQUEST['tig'] : ''));
            $timegraceout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['gto']) ? '2019-06-26' . ' ' . $_REQUEST['gto'] : ''));
            /*var_dump($timegrace);
            var_dump($timein);
            die;*/

            if ($timein_break > $timeout_break)
            {
                $timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-25' . ' ' . $_REQUEST['tib'] : ''));
                $timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-26' . ' ' . $_REQUEST['tob'] : ''));
            }
            else if ($timein > $timein_break || $timein > $timeout_break)
            {
                $timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-26' . ' ' . $_REQUEST['tib'] : ''));
                $timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-26' . ' ' . $_REQUEST['tob'] : ''));
            }

            $query = $this
                ->db
                ->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");

            if ($orgid == "35171" || $orgid == "10")
            {
                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000)
                    {
                        echo 66;
                    }

                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /*else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    }*/
                    else if ($timein > $timegrace)
                    {
                        echo 50;
                    }
                    else if ($timeout < $timegraceout)
                    {
                        echo 60;
                    }
                    /*else if($timein_break <= $timein)
                    {
                    echo 44;
                    }*/
                    /*else if($timeout_break >= $timeout)
                    {
                    echo 55;
                    } */
                    // else if(ti > gto){
                    // 	echo 51;
                    // }
                    else
                    {
                        $this
                            ->shift_model
                            ->registerShift();
                    }
                }

            }
            else
            {

                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000)
                    {
                        echo 66;
                    }

                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /*else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    }*/
                    /* else if($timein > $timegrace)
                    {
                    echo 50;
                    } */
                    /* else if($timeout < $timegraceout)
                    {
                    echo 60;
                    } */
                    /*else if($timein_break <= $timein)
                    {
                    echo 44;
                    }
                    else if($timeout_break >= $timeout)
                    {
                    echo 55;
                    } */
                    // else if(ti > gto){
                    // 	echo 51;
                    // }
                    else
                    {
                        $this
                            ->shift_model
                            ->registerShift();
                    }
                }

            }
            /* else
            {
            echo 0;
            } */

        }

        //$this->shift_model->saverecords();
        
    }

    public function shiftdelete()
    {

        $this
            ->shift_model
            ->delshiftsss();
    }

    public function getAllShift()
    {
       $postData = $this->input->post();
        $this->load->model('shift_model');
        $data = $this->shift_model->getAllShift($postData);
        echo json_encode($data);
    }
    public function viewshift()
    {
        $sid = isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';

        $data['orgid'] = $_SESSION['orgid'];

        $data['editdata'] = $this
            ->shift_model
            ->getEditShift($sid);
        $data['getweekdays'] = $this
            ->shift_model
            ->fetchWeeklyOff($sid);

        $this
            ->load
            ->view('home/editviewshift', $data);
    }

    public function editShift()
    {
        $postData = $this
            ->input
            ->post();
        $orgid = $_SESSION['orgid'];
        $shifttype = isset($_REQUEST['shifttype']) ? $_REQUEST['shifttype'] : 0;
        //var_dump($shifttype);
        if ($shifttype == 1)
        {
            $timein_break = date("H:i:s", strtotime(isset($_REQUEST['tib']) ? $_REQUEST['tib'] : ''));
            $timein = date("H:i:s", strtotime(isset($_REQUEST['ti']) ? $_REQUEST['ti'] : ' '));
            $timeout = date("H:i:s", strtotime(isset($_REQUEST['to']) ? $_REQUEST['to'] : ' '));

            //$timein_break =date("H:i:s",strtotime(isset($_REQUEST['tib'])?$_REQUEST['tib']:''));
            //$timeout_break=date("H:i:s",strtotime(isset($_REQUEST['tob'])?$_REQUEST['tob']:''));
            $timegrace = date("H:i:s", strtotime(isset($_REQUEST['tig']) ? $_REQUEST['tig'] : ''));
            $timegraceout = date("H:i:s", strtotime(isset($_REQUEST['tog']) ? $_REQUEST['tog'] : ''));

            $query = $this
                ->db
                ->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");
            if ($orgid == "35171")
            {
                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000) echo 66;

                    /* 	else if($timein > $timein_break )
                    {
                    echo 67;
                    // return false;
                    } */
                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /* else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    } */
                    else if ($timein > $timegrace)
                    {
                        //var_dump($timein);
                        //var_dump($timegrace);
                        echo 50;

                    }
                    else if ($timegrace > $timeout)
                    {
                        echo 52;
                    }
                    /*else if($timein > $timegraceout)
                    {
                    echo 51;
                    }*/
                    else if ($timeout < $timegraceout)
                    {
                        echo 60;
                    }
                    /* else if($timein_break <= $timein)
                    {
                    echo 44;
                    } */
                    /* else if($timeout_break >= $timeout)
                    {
                    echo  55;
                    } */

                    else
                    {
                        $this
                            ->shift_model
                            ->editShift();
                    }
                }

            }
            else
            {

                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000) echo 66;

                    /* 	else if($timein > $timein_break )
                    {
                    echo 67;
                    // return false;
                    } */
                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /* else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    } */
                    /* else if($timein > $timegrace)
                    {
                    
                    echo 50;
                    
                    }
                    else if($timegrace > $timeout)
                    {
                    echo 52;
                    } */
                    /*else if($timein > $timegraceout)
                    {
                    echo 51;
                    }*/
                    else if ($timeout < $timegraceout)
                    {
                        echo 60;
                    }
                    /* else if($timein_break <= $timein)
                    {
                    echo 44;
                    }
                    else if($timeout_break >= $timeout)
                    {
                    echo  55;
                    } */

                    else
                    {
                        $this
                            ->shift_model
                            ->editShift();
                    }
                }
            }
        }

        elseif ($shifttype == 3)
        {
            $this
                ->shift_model
                ->editShift();
        }
        else
        {

            $timein = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['ti']) ? '2019-06-25' . ' ' . $_REQUEST['ti'] : ''));
            // $timein  =  date("H:i:s",strtotime(isset($_REQUEST['ti'])?$_REQUEST['ti']:''));
            $timeout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['to']) ? '2019-06-26' . ' ' . $_REQUEST['to'] : ''));
            $timein_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tib']) ? '2019-06-25' . ' ' . $_REQUEST['tib'] : ''));
            $timeout_break = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tob']) ? '2019-06-25' . ' ' . $_REQUEST['tob'] : ''));
            $timegrace = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tig']) ? '2019-06-25' . ' ' . $_REQUEST['tig'] : ''));
            $timegraceout = date("Y-m-d H:i:s", strtotime(isset($_REQUEST['tog']) ? '2019-06-26' . ' ' . $_REQUEST['tog'] : ''));

            /* if($timein_break > $timeout_break)
            {
            $timein_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tib'])?'2019-06-25'.' '.$_REQUEST['tib']:''));
            $timeout_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tob'])?'2019-06-26'.' '.$_REQUEST['tob']:''));
            } */
            /* else if($timein > $timein_break || $timein > $timeout_break)
            {
            $timein_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tib'])?'2019-06-26'.' '.$_REQUEST['tib']:''));
            $timeout_break = date("Y-m-d H:i:s",strtotime(isset($_REQUEST['tob'])?'2019-06-26'.' '.$_REQUEST['tob']:''));
            } */

            $query = $this
                ->db
                ->query("Select Time_TO_SEC(TIMEDIFF('$timeout' , '$timein') ) as shifthour ");

            // var_dump($row = $query->row());
            if ($orgid == "35171")
            {
                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000)
                    {
                        echo 66;
                    }
                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /* else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    } */

                    else if ($timein > $timegrace)
                    {
                        echo 50;

                    }
                    else if ($timeout < $timegraceout)
                    {
                        echo 60;
                    }
                    /* else if($timein_break <= $timein)
                    {
                    echo 44;
                    } */
                    /* else if($timeout_break >= $timeout)
                    {
                    echo 55;
                    }  */
                    else
                    {

                        $this
                            ->shift_model
                            ->editShift();
                    }
                }
            }
            else
            {

                if ($row = $query->row())
                {
                    $shifthour = $row->shifthour;

                    if ((int)$shifthour > 72000)
                    {
                        echo 66;
                    }
                    else if ($timein > $timeout)
                    {
                        echo 22;
                    }
                    /* else if($timein_break > $timeout_break)
                    {
                    echo 33;
                    } */

                    else if ($timeout < $timegraceout)
                    {
                        echo 60;
                    }
                    /* else if($timein_break <= $timein)
                    {
                    
                    echo 44;
                    } */
                    /* else if($timeout_break >= $timeout)
                    {
                    echo 55;
                    }  */
                    else
                    {

                        $this
                            ->shift_model
                            ->editShift();
                    }
                }

            }
        }

    }

    public function department()
    {

        $response['html'] = $html;
        echo json_encode($response);
    }

    function SaveEmpdeptList()
    {
        $this
            ->load
            ->model('shift_model');
        $employeearray = $this
            ->shift_model
            ->SaveEmpdeptList();
        echo json_encode($employeearray);

    }

    function getemployebyshift()
    {
        $this
            ->load
            ->model('shift_model');
        $employeearray = $this
            ->shift_model
            ->getemployebyshift();
        echo json_encode($employeearray);
    }

}
?>
