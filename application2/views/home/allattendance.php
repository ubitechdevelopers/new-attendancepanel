<!DOCTYPE html>
<html>

<head>
    <title></title>
	 <?php 
         $this->load->view('menubar/allnewcss');
         ?>
    
    <style type="text/css">
    div.dataTables_wrapper div.dataTables_filter input {
        /* margin-left: 0.5em; */
        /* display: inline-block; */
        /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
        margin-top: -1rem;
        position: absolute;
        box-sizing: border-box;
        width: 3rem;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        background-image: url('<?= URL ?>../assets/icons/u_search.svg');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        padding: 21px 20px 23px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    div.dataTables_wrapper div.dataTables_filter input:focus {
        width: 20rem;
        background-color: #e9f1e8;
    }

    div.dataTables_wrapper div.dataTables_filter
    /* text-align: right; */
    margin-left: -104% !important;
    }

    input[class="checkbox"] {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    #select_all {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    table.dataTable>thead .sorting:after {
        display: none;
    }

    table.dataTable>thead .sorting:before {
        display: none;
    }

    table.dataTable>thead .sorting:before,
    table.dataTable>thead .sorting:after,
    table.dataTable>thead .sorting_asc:before,
    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:before,
    table.dataTable>thead .sorting_desc:after,
    table.dataTable>thead .sorting_asc_disabled:before,
    table.dataTable>thead .sorting_asc_disabled:after,
    table.dataTable>thead .sorting_desc_disabled:before,
    table.dataTable>thead .sorting_desc_disabled:after {
        display: none;
    }

    element.style {}

    .page-item.active .page-link {
        z-index: 3;
        color: #000;
        background-color: #e1ffe0;
        border-color: #e1ffe0;
    }

    table.dataTable thead th {
        border-top: none;
        color: #9FA2B4;
        font-size: 15px;
        font-style: 'Poppins';
		font-weight:500;
    }

    table.dataTable tbody {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #3f424c;
    }

    .dat {
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #000000;
    }

    .dot-button {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: black;
        box-shadow: 0px 40px 0px black, 0px 80px 0px black;
    }

    a:hover {
        color: black;
        text-decoration: none;
    }

    .a {
        text-decoration: none;
        color: black;
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .subhead {
        font-size: 18px;
        color: #828282;
        display: flex;
        cursor: pointer;
        /* text-decoration: none;*/
        
        font-family: 'Poppins', sans-serif;
    }

    .bttn {
        width: 8rem;
    }

    .filtr {
        font-size: 0.8rem;
        font-weight: 500;
    }

    /*b{
         font-weight: 700!important;
         }*/
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    #heading2 .active5 a {
        border-bottom: 3.5px solid green;
        /*border-radius: 3%;*/
        width: 100%;
        /* text-decoration: none;*/
        height: auto;
        font-weight: bold;
        color: black;
    }

    .checkbox {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    .mobview {
        display: none;
    }

    @media only screen and (max-width: 600px) {

        /*.uu1{
         display: none;
         }*/
        .mobview {
            display: unset !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            /*display: none;*/
            width: 13.5rem;
        }

        #columnv {
            display: none;
        }
    }

    table.dataTable tbody td:nth-child(1) {
        /*padding-top: 1.8rem!important;*/
        width: 12rem !important;
    }

    table.dataTable tbody td:nth-child(2) {
        padding-top: 1.2rem !important;
        text-align: center !important;
        /*width: 18rem!important;*/
    }

    table.dataTable tbody td:nth-child(3) {
        padding-top: 1.2rem !important;
        text-align: center !important;
        /*width: 10rem!important;*/
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.2rem !important;
        text-align: center !important;

    }

    table.dataTable tbody td:nth-child(5) {
        padding-top: 1.2rem !important;
        text-align: center !important;
    }

    table.dataTable tbody td:nth-child(6) {
        padding-top: 1.2rem !important;
        text-align: center !important;
    }

    table.dataTable tbody td:nth-child(7) {
        padding-top: 1.2rem !important;
        text-align: center !important;
        width: 8.32rem !important;
    }

    table.dataTable tbody td:nth-child(8) {
        padding-top: 1.2rem !important;
        /*width: 8rem!important;*/
    }

    table.dataTable tbody td:nth-child(9) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(10) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(11) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(12) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(13) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(14) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(15) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(16) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(17) {
        padding-top: 1.2rem !important;
    }

    @media only screen and (max-width: 568px) {
        #myModal {
            /*padding-left: 76px!important;*/
            width: 22.4rem !important;
        }
    }

    /* */
    .owl-nav {
        position: absolute;
        top: -6rem;
        right: 0;
    }

    .owl-theme .owl-nav {
        /*margin-top: 2rem;*/
        /*width: 68.6rem;*/
    }

    button.owl-prev {
        width: 2rem;
        /* margin-right: 32.9rem!important;*/
    }

    button.owl-next {
        width: 2rem;
        /*margin-left: 31rem!important;*/
    }

    button.owl-next span {
        font-size: 2rem;
    }

    button.owl-prev span {
        font-size: 2rem;
    }

    /*.owl-carousel.owl-drag .owl-item {
         margin-right:1!important;
         }*/
    /*swiper*/
    /* html,
         body {
         position: relative;
         height: 100%;
         }
         */
    /* body {
         background: #eee;
         font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
         font-size: 14px;
         color: #000;
         margin: 0;
         padding: 0;
         }*/
    .swiper-container {
        /* width: 60vw !important; */
        height: 100%;
        
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        width: auto !important;
        /*margin-right: 0px!important;*/
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-button-next,
    .swiper-button-prev {
        background-color: white;
        background-color: rgba(255, 255, 255, 0.5);
        color: #000 !important;
        fill: black !important;
        stroke: black !important;
    }

    .buttons-collection {
        border: none;
        position: fixed;
        /*top: -11rem;*/
        /*left: 44rem;*/
       
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';
        font-weight: 600;
        color: #4B506D !important;
        font-size: 14px !important;
    }
	.dt-buttons{
	  float:right;
  }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {
        margin-left: 1.5rem;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin-top: -2rem !important;
    }

    div.sticky {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 1rem !important;
        z-index: 2000;
    }

    div.sticky.active {
        background: white;
        /* box-shadow: 0px 5px 10px -5px #acacac;*/
        transition: ease-in-out .5s;
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 2.9rem !important;
        z-index: 2000;
    }

    .right {
        float: right;
        margin-bottom: 5px;
    }

    .flex-wrap {
        margin-left: 37rem !important;
    }

    .nohover:hover {
        background: white !important;
        border-color: white !important;
    }

    .nohover {
        background: white !important;
        border-color: white !important;
    }
  
   .modal-xl {
      width: 67%; 
   }
   .modal-content {
  -webkit-border-radius: 10px !important;
  -moz-border-radius: 10px !important;
  border-radius: 10px !important;
  -webkit-border: 10px !important;
  -moz-border: 10px !important;
  border: 10px !important;
}
.hover:hover {
        background-color:#ECECEC;"
        text-decoration: none;
    }

    </style>
</head>

<body>
    <?php 
      $query=$this->db->query("SELECT latit_in,longi_in FROM
       AttendanceMaster WHERE OrganizationId=".$_SESSION['orgid']." AND latit_in!=(''||'0.0') AND longi_in!=(''||'0.0') LIMIT 1");
       //$lat="";
       //$long="";
       foreach($query->result() as $row1 ){
          $long=$row1->longi_in;
          $lat=$row1->latit_in;
         
         }
         // echo $long;exit;
         $data['pageid']=3.1;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
    <main class="main" style="width: 83.3%;">
        <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">


            <div class="row">
                <div class="col-lg-11">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><span class="active5"> <a
                                        href="<?= URL; ?>Attendance/allattendance" class="subhead">All
                                        Attendance</a></span></div>
                           <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/notreport"
                                        class="subhead" style="margin-left:70px;">Not Reported</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/latecomer"
                                        class="subhead" style="margin-left:70px;">Late Comers</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/earlyleaver"
                                        class="subhead" style="margin-left:70px;">Early Leavers</a></span> </div>
                            <div class="swiper-slide"> <span><a href="<?= URL; ?>Attendance/overtime"
                                        class="subhead" style="margin-left:70px;">Overtime</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/undertime"
                                        class="subhead" style="margin-left:70px;">Undertime</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/notsynced"
                                        class="subhead" style="margin-left:70px;">Not Synced</a></span></div>
                            <div class="swiper-slide"> <span><a href="<?= URL; ?>Attendance/ontimeoff"
                                        class="subhead" style="margin-left:70px;">On Time off</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/onleave" class="subhead">On
                                        Leave</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/disapproved"
                                        class="subhead" style="margin-left:70px;">Disapproved & Approved</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/attregister"
                                        class="subhead" style="margin-left:70px;">Attendance Register</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/deptsummary"
                                        class="subhead" style="margin-left:70px;">Department Summary</a></span></div>
                            <div class="swiper-slide"><span><a href="<?= URL; ?>Attendance/customizedrept"
                                        class="subhead" style="margin-left:70px;">Customized Report</a></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <!--  </div>
               </div>
               </div> -->
        </div>
        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>
                    <th style="">Name</th>
                    <!-- <th>Shift</th> -->

                    <th style="text-align: center;">Time In</th>
                    <th style="text-align: center;">Time In Image</th>
                    <!--  <th width='20%'>Time In Location</th> -->

                    <th style="text-align: center;">Time Out</th>
                    <th style="text-align: center;">Time Out Image</th>
                    <!-- <th width='20%'>Time Out Location</th> -->
                    <th style="text-align: center;">Logged Hours</th>

                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Time In Date</th>
                    <th style="text-align: center;">Time Out Date</th>
                    <th style="text-align: center;">Shift Type</th>
                    <th style="text-align: center;">Profile Image</th>
                    <th style="text-align: center;">Time In City</th>
                    <th style="text-align: center;">Time In App Version</th>
                    <th style="text-align: center;">Time Out City</th>
                    <th style="text-align: center;">Time Out App Version</th>
                    <th style="text-align: center;">Device</th>
                    <th style="text-align: center;">Employee Code</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
        </table>
        </table>
        <?php  $this->load->view('menubar/footer');?>
    </main>
    <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns
                            Visibility</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form1">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">

                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0"
                                            disabled>&nbsp;Name</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1"
                                            disabled>&nbsp;Time In</label>
                                    <br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2"
                                            disabled>&nbsp;Time In Image</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3"
                                            disabled>&nbsp;Time Out</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4"
                                            disabled>&nbsp;Time Out Image </label><br>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5"
                                            disabled>&nbsp;Logged Hours</label><br>

                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6"
                                            disabled>&nbsp;Status</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk7">&nbsp;Date</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk8">&nbsp;Time In Date</label>
                                    <br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk9">&nbsp;Time Out Date</label><br>

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk10">&nbsp;Shift type</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk11">&nbsp;Profile Image</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk12">&nbsp;Time In City</label>
                                    <br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk13">&nbsp;Time In App version</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk14">&nbsp;Time Out city </label>
                                    <br>

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk15">&nbsp;Time Out App version </label>
                                    <br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk16">&nbsp;Device</label>
                                    <br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk17">&nbsp;Employee code</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
                            <button type="button" id="button1" class="btn btn-success bttn fit "
                                data-dismiss="modal">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit attendance modal for current day -->
    <div id="addAttc" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AttForm">
                        <input type="hidden" id="idc" />
                        <input type="hidden" id="anamec" />
                        <input type="hidden" id="attInDatec1" />
                        <!--<input  type="hidden" id="attDateE"   >-->
                        <input type="hidden" id="shifttypec">
                        <div class="row ">
                            <div class="col-md-10">
                                <!--<div class="form-group ">
                              <label class="control-label">Time In <span class="red">*</span></label>
                              <input type="text"  id="timeInc1"   class="form-control timepicker" style="margin-top:-7px;">
                              </div>-->
                                <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                    In<span class="red">*</span></label>
                                <div class="input-group mb-3 clockpicker form-group" data-placement="bottom"
                                    data-align="top" data-autoclose="true">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="timeInc1" id="timeInc1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2" style="padding :5px;"><i
                                                    class="fa fa-clock-o" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="savec" class="addAttcColHide btn btn-success dates">Save</button>
                    <button type="button" class="btn btn-default " data-dismiss="modal"
                        style="margin-top: 10px;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit attendance modal for current day -->
    <!--Edit attendance modal start-->
    <div id="addAttENew" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <!--          <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
                  <h4 class="modal-title" id="title">Update Attendance</h4>
                  </div>-->
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AttFrom">
                        <input type="hidden" id="idnew" />
                        <input type="hidden" id="sidnew">
                        <input type="hidden" id="deptidnew">
                        <input type="hidden" id="desgidnew">
                        <input type="hidden" id="areaidnew">
                        <input type="hidden" id="anamenew" />
                        <input type="hidden" id="attendancedatenew" />
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" id="EditTimeInnew" name="statusnew" value="1" checked="checked">
                                <label for="male">Edit Time In/Out</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="weekoffnew" name="statusnew" value="11">
                                <label for="male">Mark WeekOff</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="holidaynew" name="statusnew" value="12">
                                <label for="male">Mark Holiday</label>
                            </div>
                        </div>
                        <div class="row addAttENewcoHide">
                            <!-- <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Time In<span class="red">*</span></label>
                              <input type="text"  id="timeInEnew"   class="form-control clockpicker" >
                            </div>-->
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                        In<span class="red">*</span></label>
                                    <div class="input-group mb-3 clockpicker form-group" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="timeInEnew" id="timeInEnew"
                                                readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"
                                                    style="padding :5px;"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                <div class="col-md-6">
                           <div class="form-group">
                             <label class="control-label">Time Out<span class="red">*</span></label>
                             <input type="text"  id="timeOutEnew"   class="form-control clockpicker" >
                           </div>
                           </div>-->
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                        Out<span class="red">*</span></label>
                                    <div class="input-group mb-3 clockpicker form-group" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="timeOutEnew" id="timeOutEnew"
                                                readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"
                                                    style="padding :5px;"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row addAttENewcoHide " id="shifttypedate">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Time In Date<span class="red">*</span></label>
                                    <input type="text" id="attInDateEnew" class="form-control datepicker"
                                        readonly="readonly" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Time Out Date<span class="red">*</span></label>
                                    <input type="text" id="attOutDateEnew" class="form-control datepicker"
                                        readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveENew" class="addAttENewcoHide btn btn-success dates">Update</button>
                    <button type="button" id="saveEStatus" class="addAttENewUpsts btn btn-success dates">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Edit attendance modal close-->
    <!--------Edit Attendance Modal Start----------->
    <div class="modal fade" id="addAttsk" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AttFrom">
                        <input type="hidden" id="id" />
                        <input type="hidden" id="sid" />
                        <input type="hidden" id="deptid" />
                        <input type="hidden" id="desgid" />
                        <input type="hidden" id="areaid" />
                        <input type="hidden" id="shifttype" />
                        <input type="hidden" id="aname" />
                        <input type="hidden" id="attendancedate" />
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" id="EditTimeIn" name="status" value="1" checked="checked">
                                <label for="male">Edit Time In/Out</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="weekoff" name="status" value="11">
                                <label for="male">Mark WeekOff</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="holiday" name="status" value="12">
                                <label for="male">Mark Holiday</label>
                            </div>
                        </div>
                        <div class="row addAttskColHide">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                        In<span class="red">*</span></label>
                                    <div class="input-group mb-3 clockpicker form-group" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="timein" id="timein" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"
                                                    style="padding :5px;"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                        Out<span class="red">*</span></label>
                                    <div class="input-group mb-3 clockpicker form-group" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="timein" id="timeout" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"
                                                    style="padding :5px;"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row addAttskColHide" id="shifttypedate">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Time In Date<span class="red">*</span></label>
                                    <input type="text" id="attInDateE1" class="form-control datepicker"
                                        readonly="readonly" style="margin-top: -7px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Time Out Date<span class="red">*</span></label>
                                    <input type="text" id="attOutDateE1" class="form-control datepicker"
                                        readonly="readonly" style="margin-top: -7px;">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Close</button>
                    <button type="button" id="savesk" class="addAttskColHide btn btn-success bttn fit">Update</button>
                    <button type="button" id="saveskStatus"
                        class="addAttskStatusUp btn btn-success bttn fit">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!--------Edit Attendance Modal End----------->
    <!--Edit attendance modal start-->
    <div class="modal fade" id="addAttsts" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AttFrom">
                        <input type="hidden" id="id" />
                        <input type="hidden" id="sid" />
                        <input type="hidden" id="deptid" />
                        <input type="hidden" id="desgid" />
                        <input type="hidden" id="areaid" />
                        <input type="hidden" id="aname" />
                        <input type="hidden" id="attendancedate" />
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" id="weekoff" name="weekstatus" value="11">
                                <label for="male">Mark WeekOff</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="holiday" name="weekstatus" value="12">
                                <label for="male">Mark Holiday</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                    <button type="button" id="savests" class="btn btn-success bttn fit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div id="addAttEsts" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AttFrom">
                        <input type="hidden" id="id" />
                        <input type="hidden" id="sid" />
                        <input type="hidden" id="deptid" />
                        <input type="hidden" id="desgid" />
                        <input type="hidden" id="areaid" />
                        <input type="hidden" id="aname" />
                        <input type="hidden" id="attendancedate" />
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" id="weekoff" name="holistatus" value="11">
                                <label for="male">Mark WeekOff</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" id="holiday" name="holistatus" value="12">
                                <label for="male">Mark Holiday</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveESts" class="btn btn-success" style="margin-top: -10px;">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!--Edit attendance modal close-->
    <!--------Edit Attendance with present Modal Start----------->
    <div class="modal fade" id="addAttE" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Update
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AttFrom">
                        <input type="hidden" id="id" />
                        <input type="hidden" id="sid">
                        <input type="hidden" id="deptid">
                        <input type="hidden" id="desgid">
                        <input type="hidden" id="areaid">
                        <input type="hidden" id="aname" />
                        <input type="hidden" id="attendancedate" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                        In<span class="red">*</span></label>
                                    <div class="input-group mb-3 clockpicker1 form-group" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="timeInE1" id="timeInE1"
                                                readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"
                                                    style="padding :5px;"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Time
                                        Out<span class="red">*</span></label>
                                    <div class="input-group mb-3 clockpicker1 form-group" data-placement="bottom"
                                        data-align="top" data-autoclose="true">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="timeOutE1" id="timeOutE1"
                                                readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"
                                                    style="padding :5px;"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row " id="shifttypedate">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Time In Date<span class="red">*</span></label>
                                    <input type="text" id="attInDateE" class="form-control datepicker"
                                        readonly="readonly" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Time Out Date<span class="red">*</span></label>
                                    <input type="text" id="attOutDateE" class="form-control datepicker"
                                        readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" style="width:6rem;">Cancel</button>
                    <button type="button" id="saveE" class="addAttEColHide btn btn-success dates">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--------Edit Attendance with present Modal End----------->
    <!--------Attendance date range filter modal start----------->
    <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form1">
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8">
                                    <div class="input-group-prepend ">
                                        <div id="reportrange" class="pull-left  form-control"
                                            style="background: #fff; cursor: pointer; padding: 6px, 10px; border: 1px solid #acadaf; width: 104%; border-radius:7px 0px 0px 7px;">
                                            &nbsp;
                                            <span></span> <b class="caret"></b>
                                        </div>
                                        <div class="input-group-text" style="border-radius:0px 7px 7px 0px;"> <i
                                                class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <select id="deprt" class="form-control ">
                                        <option value="0">-Select Department-</option>
                                        <?php
                  $data = json_decode(getAllDept($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++)
                      echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Shift</label>
                                <div class="col-sm-8">
                                    <select id="shift" class="form-control ">
                                        <option value="0">-Select Shift-</option>
                                        <?php
                  $data = json_decode(getAllShift($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++)
                      echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Designation</label>
                                <div class="col-sm-8">
                                    <select id="desg" class="form-control ">
                                        <option value="0">-Select Designation-</option>
                                        <?php
                  $data = json_decode(getAllDesg($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++)
                      echo '<option value=' . $data[$i]->id . '>' . $data[$i]->name . '</option>';
                  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Employees</label>
                                <div class="col-sm-8">
                                    <select id="empl" class="form-control ">
                                        <option value="0">-Select Employee-</option>
                                        <?php
                  $data = json_decode(getAllemp($_SESSION['orgid']));
                  for ($i = 0; $i < count($data); $i++) {
                      echo '<option  value=' . $data[$i]->id . '>' . $data[$i]->FirstName . '  ' . $data[$i]->LastName . '</option>';
                  }
                  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Attendance type</label>
                                <div class="col-sm-8">
                                    <select id="attendance" class="form-control ">
                                        <option value="0">-Select Type-</option>
                                        <option value="1">Present</option>
                                        <option value="2">Absent</option>
										<option value="0">Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-8" style="text-align: end;">
                                    <div class="right">
                                        <button type="button" class="btn btn-light bttn fit "
                                            data-dismiss="modal">Cancel</button>
                                        <button type="button" id="getAtt" class="btn btn-success bttn fit "
                                            data-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
                <!--  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" id="save12" class="btn btn-success">Save</button>
                  </div> -->
            </div>
        </div>
    </div>
    <!--------Attendance date range filter modal End----------->
    <!--disapprove attendance start-->
    <div class="modal fade" id="disAtt" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Disapprove Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="disapp">
                        <input type="hidden" id="del_aid" />
                        <input type="hidden" id="del_att" />
                        <input type="hidden" id="outside_loca" />
                        <input type="hidden" id="fake_loca" />
                        <input type="hidden" id="sd" />
                        <input type="hidden" id="ss" />
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Reasons reported:</h6>
                                <div id="disapprovereason"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">
                                                Remarks(If any)
                                                <!-- <span class="red">*</span> -->
                                            </label>
                                            <input type="text" id="remarkfordisapprove" class="form-control"
                                                autocomplete="off" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="disapproveid1" class="btn btn-light bttn fit"
                        data-dismiss="modal">Cancel</button>
                    <button type="button" id="disapprove" class="btn btn-success bttn fit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--disapprove attendance start-->
    <!--delete attendance start-->
    <div class="modal fade" id="delAtt" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="disapp">
                        <input type="hidden" id="del_aid" />
                        <input type="hidden" id="del_att" />
                        <div class="row">
                            <div class="col-md-12">
                                <!--<h4>Delete "<span id="ana"></span>'s" Attendance?</h4>-->
                                <!--<h4>Delete "<span id="del_in"></span>'s" Attendance?</h4>-->
                                <input type="checkbox" id="timein" name="deletein" value="in">
                                <label for="timein" style='color:black'>Delete "Time In"</label><br>
                                <input type="checkbox" id="timeout" name="deleteout" value="out">
                                <label for="timeout" style='color:black'>Delete "Time Out"</label><br>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                            <button type="button" id="delete1" class="btn btn-light bttn fit"
                                data-dismiss="modal">Cancle</button>
                            <button type="button" id="delete" class="btn btn-success bttn fit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delAttnew" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Delete</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="disapp">
                        <input type="hidden" id="del_aidnew" />
                        <input type="hidden" id="del_attnew" />
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Delete "<span id="ananew"></span>'s" record?</h6>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete1" class="btn btn-light bttn fit"
                        data-dismiss="modal">Cancle</button>
                    <button type="button" id="deletenew" class="btn btn-success bttn fit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--delete attendance End-->
    <!--delete attendance timein start-->
    <div class="modal fade" id="delAtttimein" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete
                            Attendance</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="del_aid" />
                        <input type="hidden" id="del_att" />
                        <div class="row">
                            <div class="col-md-12">
                                <!--<h4>Delete "<span id="ana"></span>'s" Attendance?</h4>-->
                                <!-- <h4>Delete "<span id="del_in"></span>'s" Attendance?</h4> -->
                                <input type="checkbox" id="timein" name="deletein" value="in">
                                <label for="timein" style='color:black'>Delete "Time In"</label><br>
                                <!--                <input type="radio" id="timeout" name="deleteout" value="out">
                              <label for="timeout" style='color:black'>Delete "Time Out"</label><br> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="unchk" class="btn btn-light" data-dismiss="modal"
                        style="width:7rem;">Cancel</button>
                    <button type="button" id="deletetimein" class="btn btn-success" style="width:7rem;">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--delete attendance timein End-->
    <!--Location Modal -->
    <div class="modal fade" id="locationmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                
                <input type="hidden" id="empid">
                <input type="hidden" id="latitid">
                <input type="hidden" id="latitinid">
                <input type="hidden" id="longiid">
                <input type="hidden" id="checkinloc">

                <div class="modal-body"style="padding-top: 0px;padding-bottom: 0px;">



                    <div class="clearfix"></div>
                    </div>
                   
                    <div class="modal-footer" style="border-top: none;">
                        <button class="btn btn-success fnt" id="map_toggler" style="width: 11rem; color: white;"  >View in Fullsite</button>

                     <button class="btn btn-success fnt" id="creategeo"style="width: 11rem; color: white;"  >Create GeoFence</button>
                        
                    </div>
                   
                   
                </div>

            </div>
        </div>
   
    <!---->


 <!--Location Modal -->
    <div class="modal fade" id="locationmodal1" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                
                <input type="hidden" id="empid">
                <input type="hidden" id="latitid">
                <input type="hidden" id="latitinid">
                <input type="hidden" id="longiid">
                <input type="hidden" id="checkinloc">

                <div class="modal-body"style="padding-top: 0px;padding-bottom: 0px;">



                    <div class="clearfix"></div>
                    </div>
                   
                    <div class="modal-footer" style="border-top: none;">
                        <button class="btn btn-success fnt" id="map_toggler" style="width: 11rem; color: white;"  >View in Fullsite</button>

                    <a href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/geofence"> <button class="btn btn-success fnt"style="width: 11rem; color: white;"  >Create GeoFence</button></a>
                        
                    </div>
                   
                   
                </div>

            </div>
        </div>
   
    <!---->






    <!--image modal -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 20%;width: 55%;margin-left: 150px;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" style="color:black"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <form id="imgE" method="POST" enctype="multipart/form-data" name="myformE">
                        <input type="hidden" id="imgid">
                        <img src="" class="imagepreview" style="width:100%!important;" id="profileimg">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="setprofile" class="btn btn-success" style="margin-right: 15px;">Set as
                        Profile</button>
                </div>

            </div>
        </div>
    </div>

    <!-- profile modal Start -->


    <div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 20%;width: 55%;margin-left: 150px;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" style="color:black"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <form id="imgE1" method="POST" enctype="multipart/form-data" name="myformE1">
                        <input type="hidden" id="imgid1">
                        <img src="" class="imagepreview1" style="width:100%!important;" id="profileimg1">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="setprofile" class="btn btn-success" style="margin-right: 15px;">Set as
                        Profile</button>
                </div>

            </div>
        </div>
    </div>


</body>
 <?php 
         $this->load->view('menubar/allnewjs');
         ?>
<script>
$(document).ready(function() {
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
    var datestring = "&date=";
    var date = new Date();
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);

    var isoDateString = date.toISOString().substring(0, 10);
    var table = $('#example').DataTable({
        //"dom": '<"pull-left"f><"pull-right"l>tip',
        order: [
            [7, 'desc'],
            [0, "asc"]
        ],
        "bDestroy": true,

        buttons: [{
                extend: 'colvis',
                action: function myexcel() {

                    $('#column_modal').modal('show');

                }
            },

            {

                text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                className: "btn btn-light nohover",
                action: function() {

                    $('#filtermodal').modal('show');

                }
            },





            {
                extend: 'collection',
                text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                buttons: [{
                        extend: 'csv',

                        text: 'csv',
                        extension: '.csv',
                        exportOptions:

                        {

                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15, 16]
                        },
                        title: 'allattendance'
                    },

                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15, 16]
                        }
                    },
                    {
                        extend: 'pdf',
                        pageSize: 'TABLOID',
                        exportOptions: {

                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15, 16]
                        }
                    }, {
                        extend: 'print',
                        // autoPrint: false,
                        pageSize: 'TABLOID',
                        title: '',
                        exportOptions: {
                            // columns: ':visible',
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15, 16],
                            stripHtml: false,
                        },
                        repeatingHead: {

                            logo: '<?= URL ?>../assets/image/logo.png',
                            logoPosition: 'center',
                            logoStyle: 'height:100px;width:130px;',
                            title: 'Active employees of ' + org + ' Dated ' + isoDateString +
                                '',

                        },
                        // text: '<i class="fa fa-print"></i> Print',
                        text: 'Print',

                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10px')

                            // .prepend(
                            //     '<img src="<?= URL ?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                            // );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }
        ],
        //"dom": 'Bfrtip',

        "scrollX": true,
        "dom": '<"pull-left"l>B<"pull-left"f>rtip',



        language: {
            search: "",
            searchPlaceholder: "search",
            sLengthMenu: "Row   _MENU_"
        },

        "contentType": "application/json",
        "ajax": "<?= URL; ?>Attendance/getAttendances__both",
        "columns": [

            {
                "data": "name"
            },
            // {"data": "shift"},

            {
                "data": "ti"
            },
            {
                "data": "entryimg"
            },
            /* {"data": "chiloc"},*/

            {
                "data": "to"
            },
            {
                "data": "exitimg"
            },
            // {"data": "choloc"},
            {
                "data": "wh"
            },

            {
                "data": "status"
            },
            {
                "data": "date"
            },
            {
                "data": "timeindate"
            },
            {
                "data": "timeoutdate"
            },
            {
                "data": "shifttype"
            },
            {
                "data": "proimage"
            },
            {
                "data": "tymincity"
            },
            {
                "data": "TimeInAppVersion"
            },
            {
                "data": "tymoutcity"
            },
            {
                "data": "TimeOutAppVersion"
            },
            {
                "data": "device"
            },
            {
                "data": "code"
            },
            {
                "data": "action"
            }

        ],
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;

            api.column(7, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="group"><td bgcolor="white" colspan=16><span class="dat">' +
                        group + '</span><span> &nbsp; &nbsp;  </span></td></tr>'
                    );
                    last = group;
                }
            });
        }
    });

    // column visibility
    var total = table.columns().visible().length - 1;
    //  alert(total);
    setTimeout(function() {

        var checkbox = 0;
        //var total=9;
        for (var i = 0; i < total; i++) {

            if (table.column(i).visible()) {
                checkbox++;
                $("#chk" + i).iCheck("check");
            }
        }
        if (checkbox == total) {
            // alert(checkbox);
            for (var i = 0; i < total; i++) {
                if (i < 7) {
                    table.column(i).visible(true);
                    $("#chk" + i).iCheck("check");
                } else {
                    table.column(i).visible(false);
                    $("#chk" + i).iCheck("uncheck");
                }
            }
        }
    }, 500);


    $('input[type="checkbox"]').on('ifChecked', function() {
        var checkbox = $("input[type='checkbox']:checked ").length;
        for (var i = 0; i < checkbox; i++) {
            var ischecked = $("#chk" + i).is(":checked");
            if (checkbox > 17) {

                if (ischecked == true) {
                    $("#chk" + i).iCheck(":checked");
                } else {
                    $("#chk" + i).iCheck(":unchecked");
                }
            }
        }
    });

    $("#button1").click(function() {
        var checkbox = $(".modal_checkbox");
        //alert(checkbox.length);
        for (var i = 0; i < checkbox.length; i++) {
            var column = table.column(i);
            var ischecked = $("#chk" + i).is(":checked");
            // // alert(ischecked);
            if (ischecked == true) {
                column.visible(true);
            } else {

                column.visible(false);
            }

        }
        //$('#column_modal').hide();
        //$('#example').DataTable().ajax.reload(null, false);
    });

    //date range picker start




    var minDate = moment();
    var start = moment().subtract(0, 'days');
    var end = moment().subtract(0, 'days');

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({

        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf('month')
            ]
        }
    }, cb);

    cb(start, end);

    $('#getAtt').click(function() {
        var range = $('#reportrange').text();
        var shift = $('#shift').val();
        //alert(shift);
        var dept = $('#deprt').val();
		//alert(dept);
        var empl = $('#empl').val();
        var desg = $('#desg').val();
        var attendance = $('#attendance').val();

        if (attendance == 2) {
            var table = $('#example').DataTable({
                //"dom": '<"pull-left"f><"pull-right"l>tip', 
                order: [
                    [7, 'desc'],
                    [1, "asc"]
                ],
                'bDestroy': true,


                buttons: [{
                        extend: 'colvis',
                        action: function myexcel() {
                            //alert('shakir');
                            $('#column_modal').modal('show');

                        }
                    },
                    {

                        text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                        className: "btn btn-light nohover",
                        action: function() {

                            $('#filtermodal').modal('show');

                        }
                    },
                    {
                        extend: 'collection',
                        text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                        buttons: [{
                                extend: 'csv',

                                text: 'csv',
                                extension: '.csv',
                                exportOptions:

                                {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                },
                                title: 'allattendance'
                            },

                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                }
                            },
                            {
                                extend: 'pdf',
                                pageSize: 'TABLOID',
                                exportOptions: {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                }
                            }, {
                                extend: 'print',
                                // autoPrint: false,
                                pageSize: 'TABLOID',
                                title: '',
                                exportOptions: {
                                    // columns: ':visible',
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ],
                                    stripHtml: false,
                                },
                                repeatingHead: {

                                    logo: '<?=URL?>../assets/image/logo.png',
                                    logoPosition: 'center',
                                    logoStyle: 'height:100px;width:130px;',
                                    title: 'Active employees of ' + org + ' Dated ' +
                                        isoDateString + '',

                                },
                                // text: '<i class="fa fa-print"></i> Print',
                                text: 'Print',

                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10px')

                                    // .prepend(
                                    //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                                    // );

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ]
                    }
                ],
                //"dom": 'Bfrtip',    
                "scrollX": true,
                "dom": '<"pull-left"l>B<"pull-left"f>rtip',

                language: {
                    search: "",
                    searchPlaceholder: "",
                    sLengthMenu: "Row   _MENU_"
                },
                "contentType": "application/json",
                "ajax": "<?= URL; ?>Attendance/getAbsent__new?date=" + range + "&shift=" +
                    shift + "&dept=" + dept + "&empl=" + empl + "&desg=" + desg +
                    "&attendance=" + attendance,
                "columns": [{
                        "data": "name"
                    },
                    // {"data": "shift"},

                    {
                        "data": "ti"
                    },
                    {
                        "data": "entryimg"
                    },
                    /* {"data": "chiloc"},*/

                    {
                        "data": "to"
                    },
                    {
                        "data": "exitimg"
                    },
                    // {"data": "choloc"},
                    {
                        "data": "wh"
                    },

                    {
                        "data": "status"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "timeindate"
                    },
                    {
                        "data": "timeoutdate"
                    },
                    {
                        "data": "shifttype"
                    },
                    {
                        "data": "proimage"
                    },
                    {
                        "data": "tymincity"
                    },
                    {
                        "data": "TimeInAppVersion"
                    },
                    {
                        "data": "tymoutcity"
                    },
                    {
                        "data": "TimeOutAppVersion"
                    },
                    {
                        "data": "device"
                    },
                    {
                        "data": "code"
                    },
                    {
                        "data": "action"
                    }

                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(7, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td bgcolor="white" colspan=16><span class="dat">' +
                                group +
                                '</span><span> &nbsp; &nbsp;  </span></td></tr>'
                            );
                            last = group;
                        }
                    });
                }
            });
            // column visibility
            var total = table.columns().visible().length - 1;
            //  alert(total);
            setTimeout(function() {

                var checkbox = 0;
                //var total=9;
                for (var i = 0; i < total; i++) {

                    if (table.column(i).visible()) {
                        checkbox++;
                        $("#chk" + i).iCheck("check");
                    }
                }
                if (checkbox == total) {
                    // alert(checkbox);
                    for (var i = 0; i < total; i++) {
                        if (i < 7) {

                            table.column(i).visible(true);
                            $("#chk" + i).iCheck("check");
                        } else {
                            table.column(i).visible(false);
                            $("#chk" + i).iCheck("uncheck");
                        }
                    }
                }
            }, 500);


            $('input[type="checkbox"]').on('ifChecked', function() {
                var checkbox = $("input[type='checkbox']:checked ").length;
                for (var i = 0; i < checkbox; i++) {
                    var ischecked = $("#chk" + i).is(":checked");
                    if (checkbox > 17) {

                        if (ischecked == true) {
                            $("#chk" + i).iCheck(":checked");
                        } else {
                            $("#chk" + i).iCheck(":unchecked");
                        }
                    }
                }
            });

            $("#button1").click(function() {
                var checkbox = $(".modal_checkbox");
                //alert(checkbox.length);
                for (var i = 0; i < checkbox.length; i++) {
                    var column = table.column(i);
                    var ischecked = $("#chk" + i).is(":checked");
                    // // alert(ischecked);
                    if (ischecked == true) {
                        column.visible(true);
                    } else {

                        column.visible(false);
                    }

                }
                //$('#column_modal').hide();
                //$('#example').DataTable().ajax.reload(null, false);
            });

        } else if (attendance == 1) {
            var table = $('#example').DataTable({
                //"dom": '<"pull-left"f><"pull-right"l>tip', 
                order: [
                    [7, 'desc'],
                    [1, "asc"]
                ],
                "bDestroy": true,


                buttons: [{
                        extend: 'colvis',
                        action: function myexcel() {
                            //alert('shakir');
                            $('#column_modal').modal('show');

                        }
                    },
                    {

                        text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                        className: "btn btn-light nohover",
                        action: function() {

                            $('#filtermodal').modal('show');

                        }
                    },
                    {
                        extend: 'collection',
                        text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                        buttons: [{
                                extend: 'csv',

                                text: 'csv',
                                extension: '.csv',
                                exportOptions:

                                {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                },
                                title: 'allattendance'
                            },

                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                }
                            },
                            {
                                extend: 'pdf',
                                pageSize: 'TABLOID',
                                exportOptions: {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                }
                            }, {
                                extend: 'print',
                                // autoPrint: false,
                                pageSize: 'TABLOID',
                                title: '',
                                exportOptions: {
                                    // columns: ':visible',
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ],
                                    stripHtml: false,
                                },
                                repeatingHead: {

                                    logo: '<?=URL?>../assets/image/logo.png',
                                    logoPosition: 'center',
                                    logoStyle: 'height:100px;width:130px;',
                                    title: 'Active employees of ' + org + ' Dated ' +
                                        isoDateString + '',

                                },
                                // text: '<i class="fa fa-print"></i> Print',
                                text: 'Print',

                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10px')

                                    // .prepend(
                                    //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                                    // );

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ]
                    }
                ],
                //"dom": 'Bfrtip',    
                "scrollX": true,
                "dom": '<"pull-left"l>B<"pull-left"f>rtip',



                language: {
                    search: "",
                    searchPlaceholder: "",
                    sLengthMenu: "Row   _MENU_"
                },
                "contentType": "application/json",
                "ajax": "<?= URL; ?>Attendance/getAttendances__new?date=" + range + "&shift=" +
                    shift + "&dept=" + dept + "&empl=" + empl + "&desg=" + desg +
                    "&attendance=" + attendance,
                "columns": [{
                        "data": "name"
                    },
                    // {"data": "shift"},

                    {
                        "data": "ti"
                    },
                    {
                        "data": "entryimg"
                    },
                    /* {"data": "chiloc"},*/

                    {
                        "data": "to"
                    },
                    {
                        "data": "exitimg"
                    },
                    // {"data": "choloc"},
                    {
                        "data": "wh"
                    },

                    {
                        "data": "status"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "timeindate"
                    },
                    {
                        "data": "timeoutdate"
                    },
                    {
                        "data": "shifttype"
                    },
                    {
                        "data": "proimage"
                    },
                    {
                        "data": "tymincity"
                    },
                    {
                        "data": "TimeInAppVersion"
                    },
                    {
                        "data": "tymoutcity"
                    },
                    {
                        "data": "TimeOutAppVersion"
                    },
                    {
                        "data": "device"
                    },
                    {
                        "data": "code"
                    },
                    {
                        "data": "action"
                    }


                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(7, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td bgcolor="white" colspan=16><span class="dat">' +
                                group +
                                '</span><span> &nbsp; &nbsp;  </span></td></tr>'
                            );
                            last = group;
                        }
                    });
                }
            });
            // column visibility
            var total = table.columns().visible().length - 1;
            //  alert(total);
            setTimeout(function() {

                var checkbox = 0;
                //var total=9;
                for (var i = 0; i < total; i++) {

                    if (table.column(i).visible()) {
                        checkbox++;
                        $("#chk" + i).iCheck("check");
                    }
                }
                if (checkbox == total) {
                    // alert(checkbox);
                    for (var i = 0; i < total; i++) {
                        if (i < 7) {

                            table.column(i).visible(true);
                            $("#chk" + i).iCheck("check");
                        } else {
                            table.column(i).visible(false);
                            $("#chk" + i).iCheck("uncheck");
                        }
                    }
                }
            }, 500);


            $('input[type="checkbox"]').on('ifChecked', function() {
                var checkbox = $("input[type='checkbox']:checked ").length;
                for (var i = 0; i < checkbox; i++) {
                    var ischecked = $("#chk" + i).is(":checked");
                    if (checkbox > 17) {

                        if (ischecked == true) {
                            $("#chk" + i).iCheck(":checked");
                        } else {
                            $("#chk" + i).iCheck(":unchecked");
                        }
                    }
                }
            });

            $("#button1").click(function() {
                var checkbox = $(".modal_checkbox");
                //alert(checkbox.length);
                for (var i = 0; i < checkbox.length; i++) {
                    var column = table.column(i);
                    var ischecked = $("#chk" + i).is(":checked");
                    // // alert(ischecked);
                    if (ischecked == true) {
                        column.visible(true);
                    } else {

                        column.visible(false);
                    }

                }
                //$('#column_modal').hide();
                //$('#example').DataTable().ajax.reload(null, false);
            });

        }
		
		else {

            var table = $('#example').DataTable({
                //"dom": '<"pull-left"f><"pull-right"l>tip',
                "bDestroy": true,
                order: [
                    [7, 'desc'],
                    [1, "asc"]
                ],

                buttons: [{
                        extend: 'colvis',
                        action: function myexcel() {
                            //alert('shakir');
                            $('#column_modal').modal('show');



                        }
                    },
                    {

                        text: '<span class="side-item-icon"><img src="<?= URL ?>../assets/icons/filter.svg" alt=""> </span><span style="background: none;border: none;font-weight: 600;color: #4B506D!important;font-size: 14px!important;font-style: normal;">Filter</span>',
                        className: "btn btn-light nohover",
                        action: function() {

                            $('#filtermodal').modal('show');

                        }
                    },


                    {
                        extend: 'collection',
                        text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                        buttons: [{
                                extend: 'csv',

                                text: 'csv',
                                extension: '.csv',
                                exportOptions:

                                {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                },
                                title: 'allattendance'
                            },

                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                }
                            },
                            {
                                extend: 'pdf',
                                pageSize: 'TABLOID',
                                exportOptions: {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ]
                                }
                            }, {
                                extend: 'print',
                                // autoPrint: false,
                                pageSize: 'TABLOID',
                                title: '',
                                exportOptions: {
                                    // columns: ':visible',
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13,
                                        14, 15, 16
                                    ],
                                    stripHtml: false,
                                },
                                repeatingHead: {

                                    logo: '<?= URL ?>../assets/image/logo.png',
                                    logoPosition: 'center',
                                    logoStyle: 'height:100px;width:130px;',
                                    title: 'Active employees of ' + org + ' Dated ' +
                                        isoDateString + '',

                                },
                                // text: '<i class="fa fa-print"></i> Print',
                                text: 'Print',

                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10px')

                                   

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ]
                    }
                ],
                //"dom": 'Bfrtip',    

                "scrollX": true,

                "dom": '<"pull-left"l>B<"pull-left"f>rtip',



                language: {
                    search: "",
                    searchPlaceholder: "",
                    sLengthMenu: "Row   _MENU_"
                },

                "contentType": "application/json",
                "ajax": "<?= URL; ?>Attendance/getAttendances__both?date=" + range + "&shift=" +
                    shift + "&dept=" + dept + "&empl=" + empl + "&desg=" + desg +
                    "&attendance=" + attendance,
                "columns": [{
                        "data": "name"
                    },
                    // {"data": "shift"},

                    {
                        "data": "ti"
                    },
                    {
                        "data": "entryimg"
                    },
                    /* {"data": "chiloc"},*/

                    {
                        "data": "to"
                    },
                    {
                        "data": "exitimg"
                    },
                    // {"data": "choloc"},
                    {
                        "data": "wh"
                    },

                    {
                        "data": "status"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "timeindate"
                    },
                    {
                        "data": "timeoutdate"
                    },
                    {
                        "data": "shifttype"
                    },
                    {
                        "data": "proimage"
                    },
                    {
                        "data": "tymincity"
                    },
                    {
                        "data": "TimeInAppVersion"
                    },
                    {
                        "data": "tymoutcity"
                    },
                    {
                        "data": "TimeOutAppVersion"
                    },
                    {
                        "data": "device"
                    },
                    {
                        "data": "code"
                    },
                    {
                        "data": "action"
                    }


                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(7, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td bgcolor="white" colspan=16><span class="dat">' +
                                group +
                                '</span><span> &nbsp; &nbsp;  </span></td></tr>'
                            );
                            last = group;
                        }
                    });
                }
            });

            // column visibility
            var total = table.columns().visible().length - 1;
            //  alert(total);
            setTimeout(function() {

                var checkbox = 0;
                //var total=9;
                for (var i = 0; i < total; i++) {

                    if (table.column(i).visible()) {
                        checkbox++;
                        $("#chk" + i).iCheck("check");
                    }
                }
                if (checkbox == total) {
                    // alert(checkbox);
                    for (var i = 0; i < total; i++) {
                        if (i < 7) {

                            table.column(i).visible(true);
                            $("#chk" + i).iCheck("check");
                        } else {
                            table.column(i).visible(false);
                            $("#chk" + i).iCheck("uncheck");
                        }
                    }
                }
            }, 500);


            $('input[type="checkbox"]').on('ifChecked', function() {
                var checkbox = $("input[type='checkbox']:checked ").length;
                for (var i = 0; i < checkbox; i++) {
                    var ischecked = $("#chk" + i).is(":checked");
                    if (checkbox > 17) {

                        if (ischecked == true) {
                            $("#chk" + i).iCheck(":checked");
                        } else {
                            $("#chk" + i).iCheck(":unchecked");
                        }
                    }
                }
            });

            $("#button1").click(function() {
                var checkbox = $(".modal_checkbox");
                //alert(checkbox.length);
                for (var i = 0; i < checkbox.length; i++) {
                    var column = table.column(i);
                    var ischecked = $("#chk" + i).is(":checked");
                    // // alert(ischecked);
                    if (ischecked == true) {
                        column.visible(true);
                    } else {

                        column.visible(false);
                    }

                }
                //$('#column_modal').hide();
                //$('#example').DataTable().ajax.reload(null, false);
            });
        }

    });

});

$('#showgoogle').click(function() {
    var latitid = $('#latitid').val();
    window.open("http://maps.google.com/?q=" + latitid);
    //$("a").attr("href", "http://maps.google.com/?q="+latitid);
    //$("a").attr("target", "_blank");
    $('#locationmodal').modal('hide');

});

$('#creategeo').click(function() {
    //var latitid=$('#latitid').val();$(this).data('attid');
    var latitid = $('#latitinid').val();
    var longiid = $('#longiid').val();
    var checkinloc = $('#checkinloc').val();
    window.open("<?= URL ?>Attendance/creategeofence/" + latitid + "/" + longiid + "/" + checkinloc);
   
    $('#locationmodal').modal('hide');

});

//////////////////////

$(document).on("click", ".pop", function() {
//alert($(this).data('id'));
    $('#imgid').val($(this).data('id'));
    
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
});


$(document).on("click", ".pop1", function() {
//alert(val($(this).data('id')));
    $('#imgid1').val($(this).data('id'));
   
    $('.imagepreview1').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal1').modal('show');
});

$('#setprofile').click(function() {
    var id = $('#imgid').val();
    // alert($('#profileimg').prop("files")[0]);
    var imgg = $('#profileimg').attr('src');

    var formdata = new FormData();
    formdata.append('profimg', imgg);
    formdata.append('id', id);

    $.ajax({
        processData: false,
        contentType: false,
        url: "<?php echo URL; ?>attendance/editimg",
        data: formdata,
        datatype: "json",
        type: "post",
        success: function(result) {
            if (result == 1) {
                datestring = '&date=' + $('#reportrange').text();
                doNotify('top', 'center', 2, 'Updated successfully');
                $('#imagemodal').modal('hide');
                $('#example').DataTable().ajax.reload();
            } else {
                doNotify('top', 'center', 4, 'Cannot be updated');
            }

        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});






$(document).on("click", "#deletenew", function() {
    var id = $('#del_aidnew').val();
    var ana = $('#ananew').text();
    var del_att = $('#del_attnew').val();
    //alert(id);
    //alert(ana);
    //alert(del_att);
    $.ajax({
        url: "<?php echo URL; ?>attendance/deleteAtt",
        data: {
            "aid": id,
            "ana": ana,
            "del_att": del_att
        },
        success: function(result) {
            if (result == 1) {
                datestring = '&date=' + $('#reportrange').text();
                $('#delAttnew').modal('hide');
                doNotify('top', 'center', 2, 'Record deleted successfully');
                $('#example').DataTable().ajax.reload();
            } else {
                $('#delAttnew').modal('hide');
                doNotify('top', 'center', 4,
                    'There may problem(s) in deleting attendance , try later');
            }

        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});

$(function() {

    $('#remarkfordisapprove').keydown(function(e) {

        if (e.shiftKey || e.ctrlKey || e.altKey) {

            e.preventDefault();

        } else {

            var key = e.keyCode;

            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 &&
                    key <= 90))) {

                e.preventDefault();

            }

        }

    });

});






$(document).on("click", "#disapprove", function() {
    //alert();
    var disattid = $('#del_aid').val();
    var disattdate = $('#del_att').val();
    var loac = $('#outside_loca').val();
    var fakeloc = $('#fake_loca').val();
    var sd = $('#sd').val();
    var ss = $('#ss').val();
    var remarkfordisapprove = $('#remarkfordisapprove').val();

    if (remarkfordisapprove.length > 50) {
        $('#remarkfordisapprove').focus();
        doNotify('top', 'center', 4, 'Characters length should be lesser then 50');
        return false;
    }

    var disattreason = ss + ',' + sd + ',' + fakeloc + ',' + loac;
    var s = disattreason.replace(/,+/g, ',');
    var str = s.replace(/^,|,$/g, '');
    // alert(str);
    // alert(disattid);
    // alert(disattdate);
    // alert(loac);
    // alert(fakeloc);
    // alert(sd);
    // alert(ss);

    //return false;
    $.ajax({
        url: "<?php echo URL; ?>attendance/disapproveatt",
        data: {
            "disattid": disattid,
            "disattdate": disattdate,
            "disattreason": str,
            "remarkfordisapprove": remarkfordisapprove
        },
        success: function(result) {
            if (result == 1) {
                doNotify('top', 'center', 2, 'Attendance is disapproved & moved to Absent List');
                document.getElementById("disapp").reset();
                //document.getElementById("disapproveid").click();
                $('#disAtt').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload();
            } else {
                $('#disAtt').modal('hide');
                doNotify('top', 'center', 4, 'Attendance cannot be disapproved');
            }

        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });

});

// $(document).on("click", "#disapprove", function()
// {
//  var curdate = '<?php echo date('Y-m-d'); ?>';
//  var disappreason $('input[name="disapprove"]:checked').val();
//  alert(curdate);
//  alert(disappreason);
// });

$(document).on("click", "#delete", function() {
    //alert();
    var curdate = '<?php echo date('Y-m-d'); ?>';
    var del_att = $('#del_att').val();


    var timein = '';
    var timeout = '';
    //alert(timeout);


    if ($("#delAtt #timein").is(":checked") && $("#delAtt #timeout").is(":not(:checked)")) {

        doNotify("top", "center", 4, "Time in cannot deleted");

    } else {

        if ($("#delAtt #timein").is(":not(:checked)") && $("#delAtt #timeout").is(":checked")) {

            if (curdate == del_att) {


                var id = $('#del_aid').val();
                //alert(id);
                var ana = $('#ana').text();
                //alert(ana);
                var del_att = $('#del_att').val();
                //alert(del_att);
                $.ajax({
                    url: "<?php echo URL; ?>attendance/updatetime",
                    data: {
                        "aid": id,
                        "ana": ana,
                        "del_att": del_att
                    },
                    success: function(result) {
                        if (result == 1) {
                            datestring = '&date=' + $('#reportrange').text();
                            $('#delAtt').modal('hide');
                            doNotify('top', 'center', 2, 'Time out deleted successfully');
                            var table = $('#example').DataTable();
                            table.ajax.reload(null, false);
                        } else {
                            $('#delAtt').modal('hide');
                            doNotify('top', 'center', 4, 'Time out cannot be deleted');
                        }

                    },
                    error: function(result) {
                        doNotify('top', 'center', 4, 'Unable to connect API');
                    }
                });

            } else {
                doNotify('top', 'center', 4, 'Time out cannot be deleted');
            }



        } else {

            if ($("#delAtt #timein").is(":checked") && $("#delAtt #timeout").is(":checked")) {


                var id = $('#del_aid').val();
                var ana = $('#ana').text();
                //alert(ana);
                //alert(id);
                // return false;
                var del_att = $('#del_att').val();
                //alert(del_att);
                $.ajax({
                    url: "<?php echo URL; ?>attendance/deleteAtt",
                    data: {
                        "aid": id,
                        "ana": ana,
                        "del_att": del_att
                    },
                    success: function(result) {
                        if (result == 1) {
                            datestring = '&date=' + $('#reportrange').text();
                            $('#delAtt').modal('hide');
                            doNotify('top', 'center', 2, 'Attendance deleted successfully');
                            var table = $('#example').DataTable();
                            table.ajax.reload(null, false);
                        } else {
                            $('#delAtt').modal('hide');
                            doNotify('top', 'center', 4,
                                'There may problem(s) in deleting attendance , try later');
                        }

                    },
                    error: function(result) {
                        doNotify('top', 'center', 4, 'Unable to connect API');
                    }
                });




            } else {

                doNotify('top', 'center', 3, 'Select atleast one record');
            }




        }



    }





});







$(document).on("click", "#deletetimein", function() {

    var curdate = '<?php echo date('Y-m-d'); ?>';
    var del_att = $('#del_att').val();


    var timein = '';
    var timeout = '';
    //alert(timeout);



    if ($("#delAtttimein #timein").is(":checked")) {

        //alert('shakir');


        var id = $('#del_aid').val();
        var ana = $('#ana').text();
        // alert(ana);
        // return false;
        var del_att = $('#del_att').val();
        //alert(del_att);
        $.ajax({
            url: "<?php echo URL; ?>attendance/deleteAtt",
            data: {
                "aid": id,
                "ana": ana,
                "del_att": del_att
            },
            success: function(result) {
                if (result == 1) {
                    datestring = '&date=' + $('#reportrange').text();
                    $('#delAtttimein').modal('hide');
                    doNotify('top', 'center', 2, 'Attendance deleted successfully');
                    var table = $('#example').DataTable();
                    table.ajax.reload(null, false);
                } else {
                    $('#delAtttimein').modal('hide');
                    doNotify('top', 'center', 4,
                        'There may problem(s) in deleting attendance , try later');
                }

            },
            error: function(result) {
                doNotify('top', 'center', 4, 'Unable to connect API');
            }
        });




    } else {

        doNotify('top', 'center', 3, 'Select record');
    }

});






$('#saveEE').click(function() {


    var id = $('#id').val();
    var ti = $('#timeInE').val();
    var to = $('#timeOutE').val();
    var date = $('#attDateE').val();
    var shifttype = $('#shifttype').val();

    if (shifttype == 1) {
        if (ti == to) {
            doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
            return false;
        }
        if (ti > to) {
            doNotify('top', 'center', 4, 'Time in cannot be greater than time out');
            return false;
        }
    }
    if (shifttype == 2) {
        if (ti == to) {
            doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
            return false;
        }
        // if(ti<to)
        // {
        // doNotify('top','center',4,'Time Out can not be greater than Time In');
        // return false;
        // }        
    }

    $.ajax({
        url: "<?php echo URL; ?>attendance/editAttUBI",
        data: {
            "id": id,
            "ti": ti,
            "to": to,
            "date": date,
            "shifttype": shifttype
        },
        success: function(result) {
            //alert(result);
            if (result == 1) {
                datestring = '&date=' + $('#reportrange').text();
                // alert(datestring);
                doNotify('top', 'center', 2, 'Time out updated successfully');
                $('#addAttATO').modal('hide');
                //table.ajax.reload();
                $('#example').DataTable().ajax.reload();

            } else {
                doNotify('top', 'center', 4, 'Cannot be updated');
            }

        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});

$('#saveE').click(function() {


    var id = $('#id').val();
    var aname = $('#aname').text();
    var ti = $('#timeInE1').val();
    var to = $('#timeOutE1').val();
    var dateIn = $('#attInDateE').val();
    var dateOut = $('#attOutDateE').val();
    var shifttype = $('#shifttype').val();
    var to1 = dateOut + ' ' + to;



    var now = new Date();
    var hh = now.getHours();
    var min = now.getMinutes();

    var ampm = (hh >= 12) ? 'PM' : 'AM';
    hh = hh % 12;
    hh = hh ? hh : 12;
    hh = hh < 10 ? +hh : hh;
    min = min < 10 ? '0' + min : min;

    var time1 = hh + ":" + min + " " + ampm;

    var today = new Date();


    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var today1 = yyyy + '-' + mm + '-' + dd;
    var today2 = yyyy + '-' + mm + '-' + dd + ' ' + time1;


    // alert(today2);



    if (shifttype == 1) {
        //  if(ti==to)
        //  {
        // doNotify('top','center',4,'Time In can not be equal to Time Out');
        // return false;  
        //  }


        /*  if(to1 > today2){
         doNotify('top','center',4,'Time out date cannot be later than current date');
         return false;
         } */

        if (dateIn > dateOut) {
            doNotify('top', 'center', 4, 'Time in date cannot be greater than time out date');
            return false;
        }
        if (dateIn == dateOut) {
            if (ti == to) {
                doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
                return false;
            }

        }
        if (dateIn == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in date');
            return false;
        }
        if (dateOut == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out date');
            return false;
        }
        if (ti == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in');
            return false;
        }
        if (to == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }
        // alert(fromd>tod);
        // alert(fromd);
        // alert(tod);
        // if(tidp>todp)
        // {
        // doNotify('top','center',4,'Time In can not be greater than Time Out');
        // return false;
        // }        
    }
    if (shifttype == 2) {

        /*  if(to1 > today2){
         doNotify('top','center',4,'Time out date cannot be later than current date');
         return false;
         } */
        //  if(ti==to)
        //  {
        // doNotify('top','center',4,'Time In can not be equal to Time Out');
        // return false;  
        //  }  
        if (ti == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in');
            return false;
        }
        if (to == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }
        if (dateIn > dateOut) {
            doNotify('top', 'center', 4, 'Time in date cannot be greater than time out date');
            return false;
        }
        if (dateIn == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in date');
            return false;
        }
        if (dateOut == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out date');
            return false;
        }
        if (dateIn == dateOut) {
            if (ti == to) {
                doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
                return false;
            }


        }
    }


    $.ajax({
        url: "<?php echo URL; ?>attendance/editAtt",
        data: {
            "id": id,
            "ti": ti,
            "to": to,
            "dateIn": dateIn,
            "dateOut": dateOut,
            "shifttype": shifttype,
            "aname": aname,
            "ts": ts,
            "ts1": ts1
        },
        success: function(result) {
            // alert(result);

            //console.log(result);

            if (result == 1) {
                datestring = '&date=' + $('#reportrange').text();
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttE').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
            } else if (result == 22) {
                doNotify('top', 'center', 4, 'Time in should be lesser than time out ');
            } else if (result == 114) {
                doNotify('top', 'center', 4,
                    'Time in should be lesser than or equal to current time ');
                return false;
            } else if (result == 1947) {
                doNotify('top', 'center', 4, 'Date diffrence cannot be greater than one day');
                return false;
            } else if (result == 89) {
                doNotify('top', 'center', 4,
                    'Time out cannot be later than current date and time ');
                return false;
            } else if (result == 90) {
                doNotify('top', 'center', 4, 'Time out date cannot be later than current date ');
                return false;
            } else if (result == 111) {
                doNotify('top', 'center', 4,
                    'Time out should be lesser than or equal to current time ');
                return false;
            } else if (result == 112) {
                doNotify('top', 'center', 4, 'Time in date should be equal to current date ');
                return false;
            } else if (result == 113) {
                doNotify('top', 'center', 4, 'Time out date should be equal to current date ');
                return false;
            } else {
                doNotify('top', 'center', 4, 'Cannot be updated');
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});



$('#saveENew').click(function() {


    var id = $('#idnew').val();
    var aname = $('#anamenew').text();
    var ti = $('#timeInEnew').val();
    var to = $('#timeOutEnew').val();
    var dateIn = $('#attInDateEnew').val();
    var dateOut = $('#attOutDateEnew').val();
    var shifttype = $('#shifttype').val();
    var to1 = dateOut + ' ' + to;



    var now = new Date();
    var hh = now.getHours();
    var min = now.getMinutes();

    var ampm = (hh >= 12) ? 'PM' : 'AM';
    hh = hh % 12;
    hh = hh ? hh : 12;
    hh = hh < 10 ? +hh : hh;
    min = min < 10 ? '0' + min : min;

    var time1 = hh + ":" + min + " " + ampm;

    var today = new Date();


    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var today1 = yyyy + '-' + mm + '-' + dd;
    var today2 = yyyy + '-' + mm + '-' + dd + ' ' + time1;


    // alert(today2);



    if (shifttype == 1) {


        if (dateIn > dateOut) {
            doNotify('top', 'center', 4, 'Time in date cannot be greater than time out date');
            return false;
        }
        if (dateIn == dateOut) {
            if (ti == to) {
                doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
                return false;
            }

        }
        if (dateIn == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in date');
            return false;
        }
        if (dateOut == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out date');
            return false;
        }
        if (ti == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in');
            return false;
        }
        if (to == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }

    }
    if (shifttype == 2) {


        if (ti == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in');
            return false;
        }
        if (to == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }
        if (dateIn > dateOut) {
            doNotify('top', 'center', 4, 'Time in date cannot be greater than time out date');
            return false;
        }
        if (dateIn == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in date');
            return false;
        }
        if (dateOut == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out date');
            return false;
        }
        if (dateIn == dateOut) {
            if (ti == to) {
                doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
                return false;
            }


        }
    }


    $.ajax({
        url: "<?php echo URL; ?>attendance/editAtt",
        data: {
            "id": id,
            "ti": ti,
            "to": to,
            "dateIn": dateIn,
            "dateOut": dateOut,
            "shifttype": shifttype,
            "aname": aname,
            "ts": ts,
            "ts1": ts1
        },
        success: function(result) {
            // alert(result);

            //console.log(result);

            if (result == 1) {
                datestring = '&date=' + $('#reportrange').text();
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttEnew').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
            } else if (result == 22) {
                doNotify('top', 'center', 4, 'Time in should be lesser than time out ');
            } else if (result == 114) {
                doNotify('top', 'center', 4,
                    'Time in should be lesser than or equal to current time ');
                return false;
            } else if (result == 1947) {
                doNotify('top', 'center', 4, 'Date diffrence cannot be greater than one day');
                return false;
            } else if (result == 89) {
                doNotify('top', 'center', 4,
                    'Time out cannot be later than current date and time ');
                return false;
            } else if (result == 90) {
                doNotify('top', 'center', 4, 'Time out date cannot be later than current date ');
                return false;
            } else if (result == 111) {
                doNotify('top', 'center', 4,
                    'Time out should be lesser than or equal to current time ');
                return false;
            } else if (result == 112) {
                doNotify('top', 'center', 4, 'Time in date should be equal to current date ');
                return false;
            } else if (result == 113) {
                doNotify('top', 'center', 4, 'Time out date should be equal to current date ');
                return false;
            } else {
                doNotify('top', 'center', 4, 'Cannot be updated');
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }
    });
});




$('#savesk').click(function() {
    var id = $('#id').val();
    var sid = $('#sid').val();
    var deptid = $('#deptid').val();
    var desgid = $('#desgid').val();
    var areaid = $('#areaid').val();
    var aname = $('#aname').text();
    // alert(aname);
    var areaid = $('#areaid').val();
    var tin = $('#timein').val();
    //alert(tin);
    var tout = $('#timeout').val();
    // if(tout== '12:00 AM'){
    //   tout = '11:59 PM'
    // }
    //alert(tout);
    var datein = $('#attInDateE1').val();
    var dateinnew = $('#attInDateEnew').val();
    var dateout = $('#attOutDateE1').val();
    var dateoutnew = $('#attOutDateEnew').val();
    var shifttype = $('#shifttype').val();

    if (shifttype == 1) {
        if (tin == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in');
            return false;
        }
        if (tout == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }


        if (datein == dateout) {
            if (tin == tout) {
                doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
                return false;
            }


        }
        if (datein == '') {
            doNotify('top', 'center', 4, 'Please select the time in date');
            return false;
        }
        if (dateout == '') {
            doNotify('top', 'center', 4, 'Please select the time out date');
            return false;
        }

        if (tout == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }
        if (datein > dateout) {
            doNotify('top', 'center', 4, 'Time in date cannot be greater than time out date');
            return false;
        }
    }

    if (shifttype == 2) {
        if (tin == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in');
            return false;
        }
        if (tout == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }


        if (datein == dateout) {
            if (tin == tout) {
                doNotify('top', 'center', 4, 'Time in cannot be equal to time out');
                return false;
            }


        }
        if (datein == '') {
            doNotify('top', 'center', 4, 'Please select a value for time in date');
            return false;
        }
        if (dateout == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out date');
            return false;
        }

        if (tout == '') {
            doNotify('top', 'center', 4, 'Please select a value for time out');
            return false;
        }
        if (datein > dateout) {
            doNotify('top', 'center', 4, 'Time in date cannot be greater than time out date');
            return false;
        }
    }


    $.ajax({
        url: "<?php echo URL; ?>attendance/Attask",
        data: {
            "id": id,
            "tin": tin,
            "tout": tout,
            "datein": datein,
            "dateout": dateout,
            "shifttype": shifttype,
            "aname": aname,
            "sid": sid,
            "deptid": deptid,
            "desgid": desgid,
            "areaid": areaid,
            "ts": ts,
            "ts1": ts1
        },

        success: function(result) {

            //alert(result);

            if (result == 1) {

                datestring = '&date=' + $('#reportrange').text();
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttsk').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
            } else if (result == 22) {
                doNotify('top', 'center', 4, 'Time in should be lesser than time out ');
                return false;
            } else if (result == 111) {
                doNotify('top', 'center', 4,
                    'Time out should be lesser than or equal to current time ');
                return false;
            } else if (result == 112) {
                doNotify('top', 'center', 4, 'Time in date should be equal to current date ');
                return false;
            } else if (result == 114) {
                doNotify('top', 'center', 4,
                    'Time in should be lesser than or equal to current time ');
                return false;
            } else if (result == 113) {
                doNotify('top', 'center', 4, 'Time out date should be equal to current date ');
                return false;
            } else {
                // alert('error shakir');
                doNotify('top', 'center', 4, 'Cannot be updated');
            }
        },

        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }


    });
});

$('#savec').click(function() {
    // alert("hiii");
    var id = $('#idc').val();
    var aname = $('#anamec').text();
    var ti = $('#timeInc1').val();
    var shifttype = $('#shifttypec').val();
    var dateIn = $('#attInDatec1').val();
    var dateOut = '0000-00-00';
    var to = '00:00:00';
    //alert(id);
    // alert(aname);

    if (ti == '12:00 AM') {


        ti = '12:01 AM';



        // return false;
    }



    $.ajax({
        url: "<?php echo URL; ?>attendance/editAtt",
        data: {
            "id": id,
            "ti": ti,
            "to": to,
            "dateIn": dateIn,
            "dateOut": dateOut,
            "shifttype": shifttype,
            "aname": aname,
            "ts": ts,
            "ts1": ts1
        },
        success: function(result) {
            if (result == 1) {
                datestring = '&date=' + $('#reportrange').text();
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttc').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload(null, false);
            } else if (result == 22) {
                doNotify('top', 'center', 4, 'Time in should be lesser than time out');
                return false;
            } else if (result == 110) {
                doNotify('top', 'center', 4,
                    'Time in should be lesser than or equal to current time ');
                return false;
            } else {
                doNotify('top', 'center', 4, 'Cannot be updated');
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }

    });
});

//      $('#addAttc').on('hidden.bs.modal', function () {
//     // $('#example').dataTable().reload();
//     location.reload();
</script>
<script>
//var counter;
$(document).ready(function() {
    $(document).on("click", "#disapproveid", function() {
        //alert("hello");
        counter = 0;
        document.getElementById("disapprovereason").innerHTML = " ";
        //counter=0;
    });

    $(document).on("click", "#disapproveid1", function() {
        //alert("hello");
        counter = 0;
        document.getElementById("disapprovereason").innerHTML = " ";
        //counter=0;
    });


    $(document).on("click", ".dropdown .dropdown-menu .delete", function() {
        $('#del_aid').val($(this).data('aid'));
        $('#del_aidnew').val($(this).data('aid'));
        $('#ananew').text($(this).data('aname').trim());
        $('#ana').text($(this).data('aname').trim());
        $('#del_attnew').val($(this).data('attdate'));
        $('#del_att').val($(this).data('attdate'));
        $('#outside_loca').val($(this).data('loca'));
        $('#fake_loca').val($(this).data('fake'));
        $('#sd').val($(this).data('sd'));
        $('#ss').val($(this).data('ss'));

        var reason = '';
        var counter = 0;
        //alert($(this).data('loca'));
        if ($(this).data('loca') == "") {

        } else {
            counter++;
            reason = counter + ". Outside Geofence</br>";
            document.getElementById("disapprovereason").innerHTML = reason;
        }

        //alert($(this).data('fake'));
        if ($(this).data('fake') == "") {

        } else {
            counter++;
            reason += counter + ". Fake Location</br>";
            document.getElementById("disapprovereason").innerHTML = reason;
        }

        //alert($(this).data('sd'));
        if ($(this).data('sd') == "") {

        } else {
            counter++;
            reason += counter + ". Suspicious Device</br>";
            document.getElementById("disapprovereason").innerHTML = reason;
        }

        //alert($(this).data('ss'));
        if ($(this).data('ss') == "") {

        } else {
            counter++;
            reason += counter + ". Suspicious Selfie</br>";
            document.getElementById("disapprovereason").innerHTML = reason;
        }
        counter = 0;
    });



    $(document).on("click", ".dropdown .dropdown-menu .edit", function() {

        //alert((this).data('id'));


        $('#id').val($(this).data('id'));
        $('#idnew').val($(this).data('id'));
        $('#aname').text($(this).data('aname'));
        $('#anamenew').text($(this).data('aname'));
        $('#timeInE1').val($(this).data('timein'));
        $('#timeInEnew').val($(this).data('timein'));
        $('#timeInE11').val($(this).data('timeInE1'));
        $('#timeInc1').val($(this).data('timein'));
        $('#timeOutE1').val($(this).data('timeout'));
        $('#timeOutEnew').val($(this).data('timeout'));
        $('#timeOutE11').val($(this).data('timeOutE1'));
        $('#attInDateE').val($(this).data('attendancedate'));
        $('#attInDateEnew').val($(this).data('attendancedate'));
        if ($(this).data('todate') == '0000-00-00') {
            $('#attOutDateE').val($(this).data('attendancedate'));
            $('#attOutDateEnew').val($(this).data('attendancedate'));
            // alert($(this).data('attendancedate'));
        } else {
            $('#attOutDateE').val($(this).data('todate'));
            $('#attOutDateEnew').val($(this).data('todate'));
            // alert($(this).data('todate'));
        }
        // $('#attOutDateE').val($(this).data('attendancedate'));
        $('#attInDateE1').val($(this).data('attendancedate'));
        $('#attOutDateE1').val($(this).data('attendancedate'));
        $('#shifttype').val($(this).data('shifttype'));
        $('#attInDatec1').val($(this).data('tidate'));
        $('#shifttypec').val($(this).data('shifttype'));
        $('#anamec').text($(this).data('aname'));
        $('#idc').val($(this).data('id'));
        $('#sid').val($(this).data('sid'));
        $('#sidnew').val($(this).data('sid'));
        $('#deptidnew').val($(this).data('deptid'));
        $('#deptid').val($(this).data('deptid'));
        $('#desgidnew').val($(this).data('desgid'));
        $('#desgid').val($(this).data('desgid'));
        $('#areaidnew').val($(this).data('areaid'));
        $('#areaid').val($(this).data('areaid'));

        if ($(this).data('shifttype') == 1) {
            $('#shifttypedate').hide();
        } else {
            $('#shifttypedate').show();
        }
        ts = $(this).data('timein');
        //alert(ts);
        ts1 = $(this).data('timeout');
        setTimeout(function() {
            $('.timepicker').timepicker({
                defaultTime: ts,
                //timeFormat: 'H:i',
            });
            $('.timepicker1').timepicker({
                //timeFormat: 'H:i',
                defaultTime: ts1,
            });
        }, 1);

        if ($(this).data('sid') == 1) {
            $('#shifttypedate123').hide();
        } else {
            $('#shifttypedate123').show();
        }
        ts = $(this).data('timein');
        //alert(ts);
        ts1 = $(this).data('timeout');
        setTimeout(function() {
            //$('.clockpicker').clockpicker();


            $('.clockpicker').clockpicker({
                defaultTime: ts,
                //timeFormat: 'H:i',
                /* autoclose: true,
                 twelvehour: true */
            });
            $('.clockpicker1').clockpicker({
                //timeFormat: 'H:i',
                defaultTime: ts1,
            });
        }, 1000);

        // var dateSelected=$(this).data('date');
        // $(".datepicker").datepicker
        //  ({
        //  "minDate": dateSelected ,
        //  "maxDate": "+0d",
        //  "dateFormat": 'yy-mm-dd'
        //  });
        var attdatein = $(this).data('tidate');




        // var dateSelected=$(this).data('date');
        // $(".datepicker").datepicker
        //  ({
        //  "minDate": dateSelected ,
        //  "maxDate": "+0d",
        //  "dateFormat": 'yy-mm-dd'
        //  });
        // var attdatein = $(this).data('tidate');

        // alert(dateSelected);
        $("#attInDateE1").datepicker({
            "minDate": 0,
            "maxDate": "+0d",
            "dateFormat": 'yy-mm-dd'
        });
        var attdateout = $(this).data('todate');
        var attdateint = $(this).data('tidate');
        // alert(attdateout);
        $("#attOutDateE1").datepicker({
            "minDate": 0,
            "maxDate": "+d",
            "dateFormat": 'yy-mm-dd'
        });


        $('.addAttskStatusUp').hide();
        $('.addAttENewUpsts').hide();

        $('.addAttskColHide ').show();
        $('.addAttENewcoHide ').show();


        document.getElementById("EditTimeIn").checked = true;
        document.getElementById("EditTimeInnew").checked = true;


    });
});
</script>
<script>
$("#attInDateE").datepicker({
    "minDate": 0,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
});
//var attdateout = $(this).data('todate');
//var attdateint = $(this).data('tidate');

$("#attOutDateE").datepicker({
    "minDate": "-1",
    "maxDate": "+1",
    "dateFormat": 'yy-mm-dd'
});

$("#attOutDateEnew").datepicker({
    "minDate": "-1",
    "maxDate": "+1",
    "dateFormat": 'yy-mm-dd'
});
</script>
<script>
$(document).ready(function() {
    $(document).on("click", ".editATT", function() {
        $('#id').val($(this).data('id'));
        $('#timeOutE').val($(this).data('timeout'));
        $('#attDateE').val($(this).data('date'));
        $('#shifttype').val($(this).data('shifttype'));

        if ($(this).data('shifttype') == 1) {
            $('#shifttypedate').hide();
        } else {
            $('#shifttypedate').show();
        }


        ts = $(this).data('ti');
        ss = $(this).data('timeout');
        setTimeout(function() {
            $('.timepicker2').timepicker({
                defaultTime: ss,
            });
            $('.timepicker').timepicker({
                defaultTime: ts,
            });

        }, 1000);


        var dateSelected = $(this).data('date');

        $(".datepicker").datepicker({
            "minDate": dateSelected,
            "maxDate": "+0d",
            "dateFormat": 'yy-mm-dd'
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('.toggle-sidebar').click(function() {
        $("#sidebar").toggleClass("collapsed t2");
        $("#content").toggleClass("col-md-9");
        $("#sidebar").load('<?= URL ?>attendance/helpNav', {
            'pageid': 'allattendance'
        });
    });

});
</script>
<script>
$(".pencil").click(function() {
    $("input[type='file']").trigger('click');
});
</script>
<script>
$("#TimeInDate").datepicker({
    "minDate": 0,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
});
var attdateout = $(this).data('todate');
var attdateint = $(this).data('tidate');
// alert(attdateout);
$("#TimeOutDate").datepicker({
    "minDate": 0,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
});
</script>
<script>
function unchk1() {

    //alert('shakir');
    document.getElementById("timein").checked = false;
    document.getElementById("timeout").checked = false;
}
</script>
<script>
$("#weekoff").click(function() {
    $('.addAttskColHide').hide();
    $('.addAttskStatusUp').show();
});
$("#holiday").click(function() {
    $('.addAttskColHide').hide();
    $('.addAttskStatusUp').show();
});
$("#EditTimeIn").click(function() {
    $('.addAttskColHide').show();
    $('.addAttskStatusUp').hide();
});

$("#weekoffnew").click(function() {
    $('.addAttENewcoHide').hide();
    $('.addAttENewUpsts').show();
});
$("#holidaynew").click(function() {
    $('.addAttENewcoHide').hide();
    $('.addAttENewUpsts').show();
});
$("#EditTimeInnew").click(function() {
    $('.addAttENewcoHide').show();
    $('.addAttENewUpsts').hide();
});
</script>
<script>
/* $(document).on('click','.close1',function(){
       //alert();
      
       document.getElementById("EditTimeIn").checked = true;
       document.getElementById("EditTimeIn").checked = true;
      
      
      
       }) */
</script>
<script>
$(document).on('click', "#saveskStatus", function() {

    var id = $('#id').val();
    var sid = $('#sid').val();
    var deptid = $('#deptid').val();
    var desgid = $('#desgid').val();
    var status = $('input[name=status]:checked').val();

    // alert(id);
    // alert(status);

    //$.ajax({url:"<?php echo URL; ?>admin/updatestatus",
    $.ajax({
        url: "<?php echo URL; ?>attendance/updatestatus",

        data: {
            "id": id,
            "status": status,
            "sid": sid,
            "deptid": deptid,
            "desgid": desgid,
        },
        success: function(result) {
            if (result == 1) {
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttsk').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload();
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }

    });
});


$(document).on('click', "#savests", function() {

    var id = $('#id').val();
    var sid = $('#sid').val();
    var deptid = $('#deptid').val();
    var desgid = $('#desgid').val();
    var status = $('input[name=weekstatus]:checked').val();

    // alert(id);
    //alert(status); 

    //$.ajax({url:"<?php echo URL; ?>admin/updatestatus",
    $.ajax({
        url: "<?php echo URL; ?>attendance/updatestatus",

        data: {
            "id": id,
            "status": status,
            "sid": sid,
            "deptid": deptid,
            "desgid": desgid,
        },
        success: function(result) {
            if (result == 1) {
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttsts').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload();
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }

    });
});


$(document).on('click', "#saveEStatus", function() {

    var id = $('#id').val();
    //alert(id);
    var status = $('input[name=statusnew]:checked').val();

 
    $.ajax({
        url: "<?php echo URL; ?>attendance/updatestatusnew",

        data: {
            "id": id,
            "status": status
        },
        success: function(result) {
            if (result == 1) {
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttENew').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload();
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }

    });
});


$(document).on('click', "#saveESts", function() {

    var id = $('#id').val();
    //alert(id);
    var status = $('input[name=holistatus]:checked').val();

    //alert(id);
    //alert(status); 

    //$.ajax({url:"<?php echo URL; ?>admin/updatestatus",
    $.ajax({
        url: "<?php echo URL; ?>attendance/updatestatusnew",

        data: {
            "id": id,
            "status": status
        },
        success: function(result) {
            if (result == 1) {
                doNotify('top', 'center', 2, 'Attendance updated successfully');
                $('#addAttEsts').modal('hide');
                var table = $('#example').DataTable();
                table.ajax.reload();
            }
        },
        error: function(result) {
            doNotify('top', 'center', 4, 'Unable to connect API');
        }

    });
});
</script>
<script>
/* $('.owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
}) */
</script>
<script>
var swiper = new Swiper('.swiper-container', {
    // autoHeight:true,
    // height:60,
    slidesPerView: 5,
    spaceBetween: 0,
    freeMode: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});
</script>
<script type="text/javascript">
$(function() {
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 10) {
            $('.sticky').addClass('active');
        } else {
            $('.sticky').removeClass('active');
        }
    });
});
</script>
<script>
$("#example").on('processing.dt', function(e, settings, processing) {
    $('#processingIndicator').css('display', 'none');
    if (processing) {
        //$(e.currentTarget).LoadingOverlay("show");
        //alert('hello');
        $.LoadingOverlay("show");
    } else {
        $(e.currentTarget).LoadingOverlay("hide", true);
        $.LoadingOverlay("hide", true);
    }
})
</script>
<script type="text/javascript" src="<?=URL?>../assets/js/loadingoverlay.min.js"></script>

<script type="text/javascript">
$(document).on('click', '.test', function() {
	
	
    var attid = $(this).data('attid');

    $.ajax({


        type: "post",
        datatype: "html",
        url: "<?php echo URL;?>Attendance/viewattendance",
        data: {
            "aid": attid
        },
        success: function(result)

        {

            $("#locationmodal .modal-body").empty();
            $("#locationmodal .modal-body").html(result);
            $("#locationmodal").modal('show');

        }

    });


});

$(document).on('click', '.test1', function() {
    
    
    var attid = $(this).data('attid');

    $.ajax({


        type: "post",
        datatype: "html",
        url: "<?php echo URL;?>Attendance/viewattendance1",
        data: {
            "aid": attid
        },
        success: function(result)

        {

            $("#locationmodal1 .modal-body").empty();
            $("#locationmodal1 .modal-body").html(result);
            $("#locationmodal1").modal('show');

        }

    });


});






</script>


</html>