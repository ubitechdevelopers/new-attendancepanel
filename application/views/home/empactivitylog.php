<!doctype html>
<html lang="en">

<head>
  <?php 
         $this->load->view('menubar/allnewcss');
         ?>
    <title>Activity Log</title><style>
	.tertiary-button {

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
	
	table.dataTable tbody td:nth-child(3) {
        padding-top: 1.8rem !important;
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.8rem !important;
    }

   

    .dataTables_length {
        margin-top: 10px;
    }

    .buttons-collection {
        border: none;
        position: fixed;
        /* top: -4rem;*/
        /* left: 44rem !important; */
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

    /* .table th,
    .table td {
        padding: 1.75rem;
    } */
	
	.btn {
        margin-top: -1.9rem;
    }

    .btn1 {
        border: 1px solid;
        background-color: #D3D3D3;
        ;
    }

    .form-control {
        font-size: 0.9rem !important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin-top: -1rem !important;
    }

    div.sticky {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 1rem !important;
        z-index: 2000;
    }
.dt-buttons {
	float:right;
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
	
	.flex-wrap {
        /* top: 2rem; */
        /* margin-left: 38rem !important; */
		float:right;
    }
    

    
    .nohover:hover {
        background: white !important;
        border-color: white !important;
    }

    .nohover {
        background: white !important;
        border-color: white !important;
    }
  
     .dt-buttons a:nth-child(n):hover{
     background: #ECECEC;
	 
} 

.dt-button-collection .dropdown-menu{
	padding:0;
}
    </style>
</head>

<body>
    <?php
    $data['pageid']=1.3;
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar',$data);
        ?>
    <div class="main" style="width: 83.7%;">
	 <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-9 col-lg-10">
                <p style="margin-bottom: -10px; font-size:17px; font-family: poppins;" class="category"  ><a href="<?php echo URL; ?>Userprofiles/employeelist" ><img src="<?= URL ?>../assets/img/l-arrow.png" class="mb-1"></a>&nbsp<b>Activity Log
                        of</b> <?= getEmpName($id) ?><?php ?></p>
            </div>
            <div class="col-0 col-sm-6 col-md-3 col-lg-2"></div>
        </div>
		</div>
     <br>


      


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


 <?php $this->load->view('menubar/footer'); ?>

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
	
	
	
	     <!--------Attendance date range filter modal start----------->
    <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--   <form role="form1" > -->
                <div class="modal-body">
                    <form>
                       <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label ">Date</label>
                                <div class="col-sm-9">
                                    <div class="input-group-prepend ">
                                        <div id="reportrange" class="pull-left  form-control"
                                            style="background: #fff; cursor: pointer; padding: 6px, 10px; border: 1px solid #acadaf; width: 100%; border-radius:7px 0px 0px 7px;">
                                            &nbsp;
                                            <span></span> <b class="caret"></b>
                                        </div>
                                        <div class="input-group-text" style="border-radius:0px 7px 7px 0px;"> <i
                                                class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">Cancel</button>
                            <button type="button" data-dismiss="modal" id="getAtt" class="btn btn-success bttn fit"
                                style="">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
	
  <?php 
         $this->load->view('menubar/allnewjs');
         ?>

    <script type="text/javascript">
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
        var datestring = "&date=";
        var date = new Date();
        date.setMinutes(0);
        date.setSeconds(0);
        date.setMilliseconds(0);

        var isoDateString = date.toISOString().substring(0, 10);
		
		 //$(document).ready(function() {
		
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

                            text: 'CSV',
                            extension: '.csv',
                            exportOptions:
                                    {

                                        columns: [0, 1,2,3]
                                    },
                            title: 'empactivitylog'
                        },

                        /*  {
                         extend: 'excelHtml5',
                         exportOptions: {
                         columns: [0,1]
                         }
                         }, */
                        {
                            extend: 'pdf',
                            /* 						 customize: function(doc) {
                             doc.content[1].margin = [ 10, 0, 10, 0 ] //left, top, right, bottom
                             }, */
                            exportOptions: {
                                columns: [0, 1,2,3],
                            }

                        }, {
                            extend: 'print',
                            // autoPrint: false,
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0, 1,2,3],
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?= URL ?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'Employee Activitylog of ' + org + ' Dated ' + isoDateString + '',

                            },

                            text: 'Print',

                            customize: function (win) {
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

        //table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


        //table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

        var total = table.columns().visible().length;
        // alert(total);
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
        
   
       
	
	
	    $('#getAtt').click(function(){
		
		var range = $('#reportrange').text();
		
		
		var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
        var datestring="&date=";
        var date = new Date();
        date.setMinutes(0);
        date.setSeconds(0);
        date.setMilliseconds(0);

        var isoDateString = date.toISOString().substring(0,10);
		
		 var table = $('#example').DataTable({
            //"dom": '<"pull-left"f><"pull-right"l>tip', 
       			
            
            //"autoWidth": false,          
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

                            text: 'CSV',
                            extension: '.csv',
                            exportOptions:
                                    {

                                        columns: [0, 1,2,3]
                                    },
                            title: 'empactivitylog'
                        },

                        /*  {
                         extend: 'excelHtml5',
                         exportOptions: {
                         columns: [0,1]
                         }
                         }, */
                        {
                            extend: 'pdf',
                            /* 						 customize: function(doc) {
                             doc.content[1].margin = [ 10, 0, 10, 0 ] //left, top, right, bottom
                             }, */
                            exportOptions: {
                                columns: [0, 1,2,3],
                            }

                        }, {
                            extend: 'print',
                            // autoPrint: false,
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0, 1,2,3],
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?= URL ?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'Employee Activitylog of ' + org + ' Dated ' + isoDateString + '',

                            },

                            text: 'Print',

                            customize: function (win) {
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
                searchPlaceholder: "Search ",
                sLengthMenu: "Row   _MENU_"
            },
            "contentType": "application/json",
             "ajax": "<?php echo URL; ?>userprofiles/empactivitylog1/<?php echo($id) ?>?dates=" +
                    range,

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
                    "data": "LastModifiedById"
                },
            ]
        });

		
		
		//table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


        //table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

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
            if(checkbox == total) {

                for (var i = 0; i < total; i++) {
                    if (i < 3) {
                        table.column(i).visible(true);
                        $("#chk" + i).iCheck("check");
                    } else {
                        // alert("djfgi");
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
		 });
	
 
	

        
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

                    // column.visible(false);
                     column.visible(true);
                }

            }
            //$('#column_modal').hide();
            //$('#example').DataTable().ajax.reload(null, false);
        });

		  
		

	  
	  
		
  
    </script>
  
  
    
</body>

</html>