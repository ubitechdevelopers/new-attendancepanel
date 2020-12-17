<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/b-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.css"/>
   
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
            font-size: 14px;

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
            font-size: 0.85rem;
            font-style: 'Poppins';
			 font-weight:500;
        }

        table.dataTable tbody {
            font-size: 0.85rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #3f424c;
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
            text-decoration: none;
            font-weight: 500 !important;
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
            text-decoration: none;
            height: auto;
            font-weight: 700 !important;
            color: #0F0F0F;
            font-family: 'Poppins';
            font-style: normal;
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
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(2) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(3) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(4) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(5) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(6) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(7) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(8) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(9) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(10) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(11) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(12) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(13) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(14) {
            padding-top: 1.4rem !important;
        }

        table.dataTable tbody td:nth-child(15) {
            padding-top: 1.4rem !important;
        }

        @media only screen and (max-width: 568px) {

            #myModal {
                /*padding-left: 76px!important;*/
                width: 22.4rem !important;
            }
        }

        .buttons-collection {
            border: none;
            position: fixed;
            /*top: -3.6rem;*/
            /* left: 44rem; */
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

        .tertiary-button {
            padding: 5px 10px 5px 20px !important;
        }


        td.details-control {
            background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
            width: 0.5rem !important;
        }

        tr.shown td.details-control {
            background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
        }


        td.details-control2 {
            background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
            width: 0.5rem !important;
        }

        tr.shown td.details-control2 {
            background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-top: -1rem !important;
        }

        .form-control {
            font-size: 0.9rem !important;
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
            top: 3.3rem !important;
            z-index: 2000;

        }

        .flex-wrap {
            margin-left: 25rem !important;
        }

        .nohover:hover {
            background: white !important;
            border-color: white !important;
        }

        .nohover {
            background: white !important;
            border-color: white !important;
        }
        .hover:hover {
        background: #ECECEC;
     }
	  
	  .dt-buttons a:nth-child(n):hover{
     background: #ECECEC;
} 

.dropdown-menu{
	padding:0;
}
    </style>
</head>

<body>
    <?php
    $data['pageid'] = 6;
    $this->load->view('menubar/sidebar', $data);
    $this->load->view('menubar/navbar');
    ?>
    <main class="main" style="width: 83.5%;">
        <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">


            <table id="example" class="table" style="width:100%;">
                <thead>

                    <tr data-toggle="collapse">
                        <!--  <th  width="10%">Employee Code</th>  -->
                        <th></th>

                        <th>Name</th>

                        <th >Applied on</th>
                        <th>Leave From </th>
                        <th>Leave To </th>
                        <th>Leave Days</th>

                        <th>Status</th>
                        <th>Reason</th>
                        <th>Remarks</th>
                        <th>Approved/Rejected By</th>
                        <th>Action</th>


                    </tr>
                </thead>

            </table>
            <?php  $this->load->view('menubar/footer');?>
    </main>
    <!--column Visibility-->

    <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns
                            Visibility</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form1">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Name </label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;Applied on </label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp; Leave From</label><br>




                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" disabled>&nbsp; Leave To</label><br>

                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" disabled>&nbsp; Leave Days</label><br>

                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" disabled>&nbsp; Status</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk7" disabled>&nbsp;Reason </label><br>







                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk8">&nbsp;
                                        Remarks</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk9">&nbsp;Approved/Rejected by</label><br>
                                    <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk9" >&nbsp;Action  </label><br>
                                        -->





                                </div>
                                <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                         
                                            <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk18" >&nbsp; Logged Hours</label>
                                          <br>
                                            <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk19" >&nbsp;Device</label>
                                            <br>
                                             <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk20" >&nbsp;Status</label><br>
                                             <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk21" >&nbsp;Action</label>
                                          <br>
                                      </div>-->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-9" style="text-align: end;">
                                <div class="right">
                                    <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                    <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
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
    <!-- Modal -->

    <div class="modal fade" id="ApproveLeave" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Leave
                            Status</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id=remref>
                        <input type="hidden" id="lid" />
                        <input type="hidden" id="leave_name" />
                        <input type="hidden" id="leave_date" />

                        <div class="row">
                            <div class="col-md-12">


                                <textarea placeholder="Remarks" id="remark" style="border-radius: 5px; width: 29rem; height: 5rem;"></textarea>


                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">

                            <button type="button" id="rejectL" class="btn btn-light bttn fit " data-dismiss="modal">Reject</button>
                            &nbsp;&nbsp;
                            <button type="button" id="approveL" class="btn btn-success bttn">Approve</button>
                        </div>
                    </div>
                </div>

            </div>
            <div id="response"></div>
        </div>
    </div>



    

    <!--------Attendance date range filter modal start----------->
    <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns
                            Visibility</a></h5>
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
                                        <div id="reportrange" class="pull-left  form-control" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 104%; border-radius:7px 0px 0px 7px">
                                            &nbsp;
                                            <span></span> <b class="caret"></b>
                                        </div>
                                        <div class="input-group-text" style="border-radius:0px 7px 7px 0px"> <i class="fa fa-calendar"></i></div>
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
                        </form>
                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-8" style="text-align: end;">
                                <div class="right">
                                    <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
                                    <button type="button" id="getAtt" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
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

</body>
 <?php 
         $this->load->view('menubar/allnewjs');
         ?>


<script>
    function format(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr  data-toggle="collapse">' +
            '<th width="100%"class="text-left">DOJ</th>' +
            '<th width="100%"class="text-left">Entitled</th>' +
            '<th width="15rem"class="text-left">Utilized</th>' +
            '<th width="100%"class="text-left">Balance</th>' +
            '</tr>' +
            '<tr  data-toggle="collapse">' +
            '<td>' + d.doj + '</td>' +
            '<td>' + d.entitledleave + '</td>' +
            '<td>' + d.utilized + '</td>' +
            '<td>' + d.balanceleave + '</td>' +
            '</tr>' +
            '</table>';
    }


    function formating(data) {

        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr  data-toggle="collapse">' +
            '<th width="100%"class="text-left">DOJ</th>' +
            '<th width="100%"class="text-left">Entitled</th>' +
            '<th width="15rem"class="text-left">Utilized</th>' +
            '<th width="100%"class="text-left">Balance</th>' +
            '</tr>' +
            '<tr  data-toggle="collapse">' +
            '<td>' + data.doj + '</td>' +
            '<td>' + data.entitledleave + '</td>' +
            '<td>' + data.utilized + '</td>' +
            '<td>' + data.balanceleave + '</td>' +
            '</tr>' +
            '</table>';
    }



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
   


            'paging': true,
            'serverSide': true,
            'serverMethod': 'post',
            'bDestroy': true,
            'responsive': true,

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
                   

                    buttons: [
                //         {
                //     extend: "excel",
                //     className: "btn-sm",
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                // },
                        ,{                        
                            extend: 'csv',
                           // text: 'csv',
                            extension: '.csv',
                            exportOptions:

                            {
                                modifier: {
                                    page: 'current'
                                },
                                columns: [1, 2, 3, 4, 5, 6, 7,8,9]
                            },
                            title: 'leave'
                        },

                        
                        {
                            extend: 'pdf',
                            //text: 'pdf',
                            /*  orientation: 'landscape',
                            pageSize: 'tabloid', */
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7,8,9]
                            }
                        }, {
                            extend: 'print',
                            /*  orientation: 'landscape',
                            pageSize: 'tabloid', */
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [1, 2, 3, 4, 5, 6, 7,8,9],
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
            "ajax": "<?= URL; ?>Leave/leavereport",
            "columns": [{
                    'className': 'details-control',
                    'orderable': false,
                    'data1': null,
                    'defaultContent': '',
                    'toggle': false
                },
                /*{ "data": "btn" },*/
                {
                    "data": "Name"
                },
                {
                    "data": "date"
                },
                {
                    "data": "from"
                },
                {
                    "data": "ToDate"
                },
                {
                    "data": "leaveday"
                },

                {
                    "data": "status"
                },
                {
                    "data": "reason"
                },
                {
                    "data": "remarks"
                },
                {
                    "data": "ApproverId"
                },
                {
                    "data": "action"
                }



            ]
        });

        $('#example tbody').on('click', 'td.details-control', function() {


            var tr = $(this).closest('tr');
            var row = table.row(tr);
            //console.log(tr);



            if (row.child.isShown()) {
                // This row is already open - close it

                row.child.hide();
                tr.removeClass('shown');

            } else {
                // Open this row
                //                    alert('hi');
                //                    alert(row.data());
                row.child(format(row.data())).show();
                tr.addClass('shown');

            }
        });



        var total = table.columns().visible().length - 1;
        //alert(total);
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

                for (var i = 0; i < total; i++) {
                    if (i < 8) {
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
                if (checkbox > 10) {

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
                // alert(ischecked);
                if (ischecked == true) {
                    column.visible(true);
                } else {

                    column.visible(false);
                }

            }
            //$('#column_modal').hide();
            //$('#example').DataTable().ajax.reload(null, false);
        });

        var minDate = moment();
        var start = moment().subtract(0, 'days');
        var end = moment().subtract(0, 'days');

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            //  maxDate:minDate,
            //minDate:'-4M',
            //   minDate : moment().subtract(3 , 'month').startOf('month'),
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


        function destroyChild(row) {
            var table = $("Table2", row.child());
            table.detach();
            table.DataTable().destroy();

            // And then hide the row
            row.child.hide();
        }

        $('#getAtt').click(function() {
            var range = $('#reportrange').text();
            var shift = $('#shift').val();
            //alert(shift);
            var dept = $('#deprt').val();
            var empl = $('#empl').val();
            var desg = $('#desg').val();
            var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
            var datestring = "&date=";
            var date = new Date();
            date.setMinutes(0);
            date.setSeconds(0);
            date.setMilliseconds(0);
            var isoDateString = date.toISOString().substring(0, 10);


            var table = $('#example').DataTable({
                //"dom": '<"pull-left"f><"pull-right"l>tip',

                'paging': true,
                'serverSide': true,
                'serverMethod': 'post',
                'bDestroy': true,
                'responsive': true,
                "scrollX": true,

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
                                    /*  modifier: 
                                     { 
                                        page: 'current'
                                     }, */
                                    columns: [1, 2, 3, 4, 5, 6, 7]
                                },
                                title: 'leave'
                            },

                            // {
                            //     extend: 'excelHtml5',
                            //     exportOptions: {
                            //         columns: [1, 2, 3, 4, 5, 6, 7]
                            //     }
                            // },
                            {
                                extend: 'pdf',
                                //pageSize: 'TABLOID',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6, 7]
                                }
                            }, {
                                extend: 'print',
                                // autoPrint: false,
                                pageSize: 'TABLOID',
                                title: '',
                                exportOptions: {
                                    // columns: ':visible',
                                    columns: [1, 2, 3, 4, 5, 6, 7],
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


                "dom": '<"pull-left"l>B<"pull-left"f>rtip',

                language: {
                    search: "",
                    searchPlaceholder: "search leaves",
                    sLengthMenu: "Row   _MENU_"
                },

                "contentType": "application/json",
                "ajax": "<?= URL; ?>Leave/leavereport?date=" + range + "&shift=" + shift +
                    "&deprt=" + deprt + "&empl=" + empl + "&status=" + status,
                "columns": [{

                        'className': 'details-control2',
                        'orderable': false,
                        'data': null,
                        'defaultContent': '',
                        'toggle': false
                    },
                    {
                        "data": "Name"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "from"
                    },
                    {
                        "data": "ToDate"
                    },
                    {
                        "data": "leaveday"
                    },

                    {
                        "data": "status"
                    },
                    {
                        "data": "reason"
                    },
                    {
                        "data": "remarks"
                    },
                    {
                        "data": "ApproverId"
                    },
                    {
                        "data": "action"
                    }
                ]
            });

            $('#example tbody').on('click', 'td.details-control2', function() {


                var tr = $(this).closest('tr');
                var row = table.row(tr);



                if (row.child.isShown()) {
                    // This row is already open - close it

                    row.child.hide();
                    tr.removeClass('shown');

                    $(this).closest("table")
                        .find(".collapse.in")
                        .not(this)
                        .collapse('toggle')
                } else {
                    // Open this row
                    console.log(row.data());


                    row.child(formating(row.data())).show();
                    tr.addClass('shown');

                }


            });







            var total = table.columns().visible().length - 1;
            //alert(total);
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
                    if (checkbox > 10) {

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
                    // alert(ischecked);
                    if (ischecked == true) {
                        column.visible(true);
                    } else {

                        column.visible(false);
                    }

                }
                //$('#column_modal').hide();
                //$('#example').DataTable().ajax.reload(null, false);
            });
            //$('#example').DataTable().ajax.reload();


        });




    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click", ".checkbox", function() {

            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
            //var flag = boxes.filter(':checked').length > 0;
            if ($('.checkbox:checked').length > 0) {
                $('#next-container').show();
            } else {
                $('#next-container').hide();
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#select_all').click();
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                    $('#next-container').show();
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                    $('#next-container').hide();
                });
            }


            $('input[name="select_all"]').attr('click', function() {

                if (this.checked) {

                    $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');



                } else {
                    $('#example tbody input[type="checkbox"]:checked').trigger('click');
                }


                //   e.stopPropagation();
            });
        });

        $('#select_all').click();


    });
</script>
<script>
    function changeLanguage(language) {
        var element = document.getElementById("url");
        element.value = language;
        element.innerHTML = language;
    }

    function showDropdown() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        //  alert();
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<script>
    $("#save12").click(function() {
        var deptnm = $('#deptName').val();
        // alert(deptnm);
        if ($.trim($('#deptName').val()).length == 0) {
            $("#deptName_error").html("Please enter Department");
            $("#deptName_error").css("color", "#F90A0A");
            $("#deptName_error").show();
            $("#deptName").css("border", "2px solid #F90A0A");
            return false;
        } else {
            $("#deptName_error").hide();
            $("#deptName").css("border", "2px solid #34F458");
            $("#deptName_error").hide();
        }

        $.ajax({
            url: "<?php echo URL; ?>managesettings/add_department",
            data: {
                "deptnm": deptnm
            },
            type: "post",
            success: function(response) {

                $('#myModal').modal('hide');
                $('#add_dept')[0].reset();
                $("#deptName").css("border", "1px solid #E5E5E5 ");

                // alert('Successfully inserted');
            },
            error: function() {
                alert("error");
            }
        });

    });
</script>
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
<script>
    $(document).on("click", "#approveL", function()

        {
            var id = $('#lid').val();
            //alert(id);
            var leavename = $('#leave_name').val();
            var leavedate = $('#leave_date').val();
            var leaveremark = $('#remark').val();
            // alert(leaveremark);
            // die();
            if (leaveremark.length > 50) {
                $('#remark').focus();
                doNotify('top', 'center', 4, 'Characters length should be lesser then 50');
                return false;
            }


            var formdata = new FormData();
            formdata.append('id', id);
            formdata.append('leavename', leavename);
            formdata.append('leavedate', leavedate);
            formdata.append('leaveremark', leaveremark);
            $.ajax({
                processData: false,
                contentType: false,
                url: "<?php echo URL; ?>leave/approveleave",
                data: formdata,
                datatype: "json",
                type: "post",
                success: function(result) {
                    if (result == 1) {
                        doNotify('top', 'center', 2, 'Leave is approved');
                        setTimeout("location.reload(true);", 2000);
                        $('#ApproveLeave').modal('hide');
                        document.getElementById("remref").reset();
                        $('#example').DataTable().ajax.reload();

                    } else if (result == 2) {
                        doNotify('top', 'center', 4, 'Cannot be approved');
                        setTimeout("location.reload(true);", 2000);
                        $('#ApproveLeave').modal('hide');
                        document.getElementById("remref").reset();
                        $('#example').DataTable().ajax.reload();
                    }
                },
                error: function(result) {
                    doNotify('top', 'center', 4, 'Unable to connect to API');
                }
            });
        });

    $(document).on("click", "#rejectL", function()

        {
            var id = $('#lid').val();
            // alert(id);
            var leavename = $('#leave_name').val();
            var leavedate = $('#leave_date').val();
            var leaveremark = $('#remark').val();
            if (leaveremark.length > 50) {
                $('#remark').focus();
                doNotify('top', 'center', 4, 'Characters length should be lesser then 50');
                return false;
            }

            //alert(id);
            //alert(disapp_date);

            var formdata = new FormData();
            formdata.append('id', id);
            formdata.append('leavename', leavename);
            formdata.append('leavedate', leavedate);
            formdata.append('leaveremark', leaveremark);
            $.ajax({
                processData: false,
                contentType: false,
                url: "<?php echo URL; ?>leave/rejectleave",
                data: formdata,
                datatype: "json",
                type: "post",
                success: function(result) {
                    if (result == 1) {
                        doNotify('top', 'center', 2, 'Leave is rejected');
                        setTimeout("location.reload(true);", 2000);
                        $('#ApproveLeave').modal('hide');
                        document.getElementById("remref").reset();
                        $('#example').DataTable().ajax.reload();

                    } else if (result == 2) {
                        doNotify('top', 'center', 4, 'Cannot be reject');
                        setTimeout("location.reload(true);", 2000);
                        $('#ApproveLeave').modal('hide');
                        document.getElementById("remref").reset();
                        $('#example').DataTable().ajax.reload();
                    }

                },
                error: function(result) {
                    doNotify('top', 'center', 4, 'Unable to connect to API');
                }
            });
        });

    $(document).on("click", ".leaveapprove", function() {
        $('#lid').val($(this).data('id'));
        $('#leave_name').val($(this).data('leavename'));
        // alert($(this).data('leavename'));
        $('#leave_date').val($(this).data('leavedate'));

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

<script>
    // $('.details-control sorting_1').click({


    // toggle: true
    // })
    $(document).on("click", ".sorting_1", function() {
        // toggle:true

        // alert("The paragraph was clicked.");
    });
</script>
<script type="text/javascript" src="<?= URL ?>../assets/js/loadingoverlay.min.js"></script>

</html>