<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="<?= URL ?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style type="text/css">
    <title>Activity Log</title><style>.tertiary-button {

        padding: 5px 10px 5px 20px !important;
    }

    input[type=radio] {
        width: 1.2em;
        height: 1.2em;
    }

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
        font-size: 0.85rem;
        font-style: 'Poppins';
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
        color: black !important;
        text-decoration: none !important;
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
        width: 9rem;
        font-weight: 500;
        font-size: 14px;
        height: 2.5rem;
    }

    .fit {
        width: 9rem;
        font-weight: 500;
        font-size: 14px;
        height: 2.5rem;
        margin-bottom: 5px;

    }

    .filtr {
        font-size: 0.8rem;
        font-weight: 500;
    }

    .btn1 {
        background-color: #D3D3D3;
        border: 1px solid;
    }

    /*b{
            font-weight: 700!important;
            }*/
    .right {
        float: right;
    }

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
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(2) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(5) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(6) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(7) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(8) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(9) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(10) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(11) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(12) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(13) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(14) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(15) {
        padding-top: 1.8rem !important;
    }

    .buttons-collection {
        border: none;
        position: fixed;
        /* top: -4rem;*/
        left: 44rem !important;
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';

        font-weight: 600;

        color: #4B506D !important;
        font-size: 14px !important;
    }

    /*@media screen and (max-width: 1350px) {
               .buttons-collection{  left:31rem!important;}
            }*/
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {

        margin-left: 1.5rem;
    }

    .tertiary-button {

        padding: 5px 10px 5px 20px !important;
    }

    .adbtn {
        color: black !important;
    }

    .table th,
    .table td {
        padding: 1.75rem;
    }
    </style>
</head>

<body>
    <?php
    $data['pageid']=1.3;
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar',$data);
        ?>
    <div class="main">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 col-lg-10">
                <p style="margin-bottom: -10px; font-size:17px; font-family: poppins;" class="category"><b>Activity Log
                        of</b> <?= getEmpName($id) ?><?php ?></p>
            </div>
            <div class="col-0 col-sm-6 col-md-3 col-lg-2"></div>
        </div>
        <hr>


        <div class="row mb-4">

            <div class="col-lg-7 col-md-7 col-sm-0 col-xs-0">

                <div id="reportrange" class="pull-left"
                    style=" cursor: pointer; padding: 5px;  border: 1px solid #ccc;">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span></span>
                    <b class="caret"></b>
                </div>

            </div>
            <div id="button-container" class="col-lg-5 col-md-5 col-sm-12 col-xs-12"
                style="    padding: 5px 0px 5px 0px;">

                <!--<button class="tertiary-button dropdown-toggle" data-toggle="modal" data-target="#column_modal"id="columnv">
                            Column Visibility  
                        </button>-->
            </div>
        </div>


        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr>

                    <th style="width:60%;">Activities</th>
                    <th>Module</th>
                    <th>Admin</th>
                    <th>Date & Time</th>

                </tr>
            </thead>
        </table>

    </div>


    <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?= URL; ?>Userprofiles/employeelist"><i
                                class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form role="form1">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">


                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0"
                                            disabled>&nbsp;Activities</label><br>
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1"
                                            disabled>&nbsp;Module</label><br>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2"
                                            disabled>&nbsp;Admin</label><br>

                                    <label class="filtr"><input type="checkbox" class="modal_checkbox"
                                            id="chk3">&nbsp;Date & Time</label><br>
                                </div>

                            </div>
                        </div>

                        <div class="right">
                            <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                            <button type="button" id="button1" class="btn btn-success bttn fit "
                                data-dismiss="modal">Save</button>
                        </div>
                        <!--  </div>
                            </div> -->
                    </div>


                </form>
                <!--  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="save12" class="btn btn-success">Save</button>
                     </div> -->
            </div>
            <div id="response"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
    <script src="<?= URL ?>../assets/js/navbar.js"></script>
    <!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="<?= URL ?>../assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?= URL ?>../assets/js/repeatheadeerprint.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
    <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
    <script src="<?= URL ?>../assets/js/demo.js"></script>
    <!--my js-->
    <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>

    <script type="text/javascript">
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
    var name = '<?php echo getEmpName($id) ?>';
    //alert(name);
    var datestring = "&date=";
    var date = new Date();
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);
    var isoDateString = date.toISOString().substring(0, 10);
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
            'bDestroy': true,


            buttons: [{
                    extend: 'colvis',
                    action: function myexcel() {
                        //alert('shakir');


                        $('#column_modal').modal('show');



                    }
                },

                {
                    extend: 'collection',
                    text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                    buttons: ['csv', 'excel', 'pdf', {
                        extend: 'print',
                        // autoPrint: false,
                        title: '',
                        exportOptions: {
                            // columns: ':visible',
                            columns: [1, 2, 3],
                            stripHtml: false,
                        },
                        repeatingHead: {

                            logo: '<?= URL ?>../assets/image/logo.png',
                            logoPosition: 'center',
                            logoStyle: 'height:100px;width:130px;',
                            title: 'Department List of ' + org + ' Dated ' + isoDateString +
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
                    }]
                }
            ],
            //"dom": 'Bfrtip',    
            // "scrollX": true,                  
            "dom": '<"pull-left"l>B<"pull-left"f>rtip',



            language: {
                search: "",
                searchPlaceholder: "Search ",
                sLengthMenu: "Row   _MENU_"
            },
            "contentType": "application/json",
            "ajax": "<?php echo URL; ?>userprofiles/empactivitylog1/<?php echo($id) ?>",

            "columns": [{
                    "data": "ActionPerformed"
                },
                {
                    "data": "Module"
                },
                {
                    "data": "LastModifiedById"
                },
                {
                    "data": "LastModifiedDate"
                },
            ]
        });

        table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

        var total = table.columns().visible().length;
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
                    if (i < 3) {
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
                if (checkbox > 4) {

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
                console.log(ischecked);
                //alert(ischecked);
                if (ischecked == true) {
                    column.visible(true);
                } else {

                    column.visible(false);
                }

            }
            //$('#column_modal').hide();
            //$('#example').DataTable().ajax.reload(null, false);
        });
        $('#reportrange').on('DOMNodeInserted', function() { //alert();
            var range = $('#reportrange').text();
            // alert(range);

            var table = $('#example').DataTable({
                //"dom": '<"pull-left"f><"pull-right"l>tip',   
                'bDestroy': true,

                buttons: [{
                        extend: 'colvis',
                        action: function myexcel() {
                            //alert('shakir');


                            $('#column_modal').modal('show');



                        }
                    },

                    {
                        extend: 'collection',
                        text: '<span class="side-item-icon"> <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Download',
                        buttons: ['csv', 'excel', 'pdf', {
                            extend: 'print',
                            // autoPrint: false,
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [1, 2, 3],
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?= URL ?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'Department List of ' + org + ' Dated ' +
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
                        }]
                    }
                ],
                //"dom": 'Bfrtip',    
                // "scrollX": true,                  
                "dom": '<"pull-left"l>B<"pull-left"f>rtip',



                language: {
                    search: "",
                    searchPlaceholder: "",
                    sLengthMenu: "Row   _MENU_"
                },
                "contentType": "application/json",
                "ajax": "<?php echo URL; ?>userprofiles/empactivitylog1/<?php echo($id) ?>?date=" +
                    range,
                //"ajax": "<?php echo URL; ?>admin/getAllHolidays",
                "columns": [{
                        "data": "ActionPerformed"
                    },
                    {
                        "data": "Module"
                    },
                    {
                        "data": "LastModifiedById"
                    },
                    {
                        "data": "LastModifiedDate"
                    },
                ]
            });
        });
    });
    table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


    table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

    var total = table.columns().visible().length;
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
                if (i < 3) {
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
            if (checkbox > 4) {

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
            console.log(ischecked);
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
    ////---------date picker
    //	var start = moment().subtract(29, 'days');
    var minDate = moment();
    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({

        maxDate: minDate,
        // minDate:'-4M',
        minDate: moment().subtract(4, 'month').startOf('month'),
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
            'Last 30 Days': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        }
    }, cb);
    cb(start, end);
    ////---------/date picker
    </script>
</body>

</html>