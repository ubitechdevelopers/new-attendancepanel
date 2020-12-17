<!DOCTYPE html>
<html>

    <head>
        <title></title>
        <?php
        $this->load->view('menubar/allnewcss');
        ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet"/>
        <style type="text/css">
               div.dataTables_wrapper div.dataTables_filter input {
        /* margin-left: 0.5em; */
        /* display: inline-block; */
        /* width: auto; 
         width: 130px;
         border: 2px solid #ccc;*/
        position: absolute;
        box-sizing: border-box;
        width: 3rem;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        background-image: url('<?=URL?>../assets/icons/u_search.svg');
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

    .right {
        float: right;
        margin-top: 10px;
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

    @media (min-width:1900px) and (max-width:1550px) {
        table.dataTable tbody td:nth-child(8){
        text-align:center!important;
		
        }
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

    .dataTables_length {
        margin-top: 10px;
    }

    .buttons-collection {
        border: none;
        position: relative;
        /* top: -4.6rem;*/
        /* top: 20px; */
        /* left: 44rem; */
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';
        font-weight: 600;
        color: #4B506D !important;
        font-size: 14px !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {
        margin-left: 1.5rem;
        margin-top: -2rem !important;
    }

    .tertiary-button {
        padding: 5px 10px 5px 20px !important;
    }

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
        top: 2rem;
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

    #row2{
        padding-left:15.5rem;
        float:right;		 
        position:absolute;
        right:0;
      
    }

    
 

   
 .hover:hover {
        background-color:#ECECEC;"
        text-decoration: none;
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
        $data['pageid'] = '102';
        $this->load->view('menubar/sidebar', $data);
        $this->load->view('menubar/navbar');
        $data = isset($data) ? $data : '';
        $id = isset($id) ? $id : 0;
        $startdate = isset($this->startdate) ? $this->startdate : "Start";
        $enddate = isset($this->enddate) ? $this->enddate : "End";
        ?>
        <main class="main" style="width: 83.7%;">
            <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">


                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-7">
                        <div class="row" style="margin-left: 0px;">
                            <span class=" mr-4"> <a href="<?= URL; ?>Face_controller/faceid"
                                                    class="subhead">FaceId</a></span>
                            <span class="active5"><a href="<?= URL; ?>Face_controller/suspicious_selfie" class="subhead">Suspicious Selfie</a></span>

                        </div>
                    </div>
					<div class="col-lg-7 col-md-7 col-sm-5">
					</div>
                </div>
                
                 
            </div>
            <table id="example" class="table mt-4" style="width:100%;">
                <thead>
                    <tr>
                        <!--  <th style="background-image:none"!important><input type="checkbox" id="select_all" name="select_all" value=""/></th>-->
                        <th >Name</th>
                        <th >Face IDs</th>
                        <th >Suspicious Selfies</th>
                        <th >Match(%)</th>
                        <th >Event</th>
                        <th style="background-image:none!important; text-align:end !important">Action</th>
                    </tr>
                </thead>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <?php $this->load->view('menubar/footer'); ?>
        </main>

        <!--column Visibility-->
        <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="<?= URL; ?>Clientsettings"><i class="fa fa-chevron-left"
                                                                                                 style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form1">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0"
                                                                    disabled>&nbsp;Name</label><br>
                                                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1"
                                                                    disabled>&nbsp;Face Ids</label><br>


                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2"
                                                                    disabled>&nbsp;Suspicious selfies</label><br>
                                                                    <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3"
                                                                    disabled>&nbsp;Match(%)</label><br>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4"
                                                                    disabled>&nbsp;Event</label><br>

                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-9" style="text-align: end;">
                                    <div class="right">
                                        <button type="button" class="btn btn-light bttn fit "
                                                data-dismiss="modal">Cancel</button>
                                        <button type="button" id="button1" class="btn btn-success bttn fit "
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
            <!-- end -->
        </div>	
      <div class="modal fade" id="disapprove" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
				<h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal"
                            aria-label="Close"><i class="fa fa-chevron-left"
                                style="font-size: 1rem;"></i>Disapprove</a></h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
        
      </div>
      <div class="modal-body">    
    <form id= disap>
      <input type="hidden" id="absent" />
      <input type="hidden" id="sts" />
      <input type="hidden" id="attdate" />
      <div class="row">
        <div class="col-md-12">
          <h6>Mark Absent due to Suspicious Selfie?</h6>
        </div>
      </div>
      <div class="clearfix"></div>
    </form>
          <div class="row mt-5">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9" style="text-align: end;">
                            <button type="button" class="btn btn-light bttn fit" data-dismiss="modal">No</button>
                            <button type="button" data-dismiss="modal" id="disa" class="btn btn-success bttn fit"
                                style="">Yes</button>
                        </div>
                    </div>
      </div>

    </div>
    
  </div>
</div>
<!-- disapprove -->

<!-- hgigbilugbliu -->
<div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style="height: 50%;width: 55%;margin-left: 150px;"> 
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <form id="imgE1" method="POST" enctype="multipart/form-data" name="myformE1">
    <input type="hidden" id="imgid1">
      <img src="" class="imagepreview1" style="width:100%!important;" id="profileimg1" >
     </div>
    <!-- <div class="modal-footer">
            <button type="button" id="setprofile"  class="btn btn-success" style="margin-right: 15px;">Set as Profile</button>
    </div> --> 
     </form>
    </div>
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
    </body>
    <?php
    $this->load->view('menubar/allnewjs');
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
//       function openNav() {
//              document.getElementById("mySidenav").style.width = "360PX";
//              $('#sidenavData').load('<?=URL?>admin/helpNav',{'pageid': 'approvetime'});  
//            }
//            function closeNav(){
//              document.getElementById("mySidenav").style.width = "0";
//            }
//
//         $(document).ready(function(){
//    $(".toggle-sidebar").click(function(){
//    $("#sidebar").toggleClass("collpsed t2");
//    $("#content").toggleClass("col-md-9");
//    $("#sidebar").load("<?=URL?>admin/helpnav",{'pageid':'approvetime'});
//    })
//    });
    </script>
  
    <script>
       var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
        var datestring = "&date=";
        var date = new Date();
        date.setMinutes(0);
        date.setSeconds(0);
        date.setMilliseconds(0);

        var isoDateString = date.toISOString().substring(0, 10);
        var ts;
        var ts1;
        var ss;

        var table = $('#example').DataTable({
            "bDestroy": true,
            /* "serverSide": true,
             "serverMethod": "post", */


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

                                        columns: [0, 1,2,3,4]
                                    },
                            title: 'face'
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
                                columns: [0, 1,2,3,4],
                            }

                        }, {
                            extend: 'print',
                            // autoPrint: false,
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0, 1,2,3,4],
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?= URL ?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'FaceId of ' + org + ' Dated ' + isoDateString + '',

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
            scrollX: true,

            //"dom": 'Bfrtip',                      
            "dom": '<"pull-left"l>B<"pull-left"f>rtip',

            language: {
                search: "",
                searchPlaceholder: " Search",
                sLengthMenu: "Row   _MENU_"
            },
            "contentType": "application/json",
            "ajax": "<?php echo URL; ?>Face_controller/getSuspiciousSelfie",
              "columns": [
              { "data": "name" },
              { "data": "faceid" },
              { "data": "suspicious" },
              { "data": "match" },
              { "data": "event" },
              { "data": "action" }
            ],
        });

 table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

        var total = table.columns().visible().length - 1;
        //alert(total);
        setTimeout(function () {

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
                    if (i < 5) {
                        table.column(i).visible(true);
                        $("#chk" + i).iCheck("check");
                    } else {
                        table.column(i).visible(false);
                        $("#chk" + i).iCheck("uncheck");
                    }
                }
            }
        }, 500);
        
        
          $('#getAtt').click(function(){
      
      var range=$('#reportrange').text();
     // alert(range);
      var shift=$('#shift').val();
      var deprt=$('#deprt').val();
      var empl=$('#empl').val();
      var desg=$('#desg').val();
      //var sts=$('#select1').val();
      //alert(status);

var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
var datestring="&date=";
var date = new Date();
date.setMinutes(0);
date.setSeconds(0);
date.setMilliseconds(0);

var isoDateString = date.toISOString().substring(0,10);

   
    var ts;
    var ts1;
    var ss;

      table  = $('#example').DataTable({
          
       "bDestroy": true,
            /* "serverSide": true,
             "serverMethod": "post", */


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

                                        columns: [0, 1,2,3,4]
                                    },
                            title: 'face'
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
                                columns: [0, 1,2,3,4],
                            }

                        }, {
                            extend: 'print',
                            // autoPrint: false,
                            title: '',
                            exportOptions: {
                                // columns: ':visible',
                                columns: [0, 1,2,3,4],
                                stripHtml: false,
                            },
                            repeatingHead: {

                                logo: '<?= URL ?>../assets/image/logo.png',
                                logoPosition: 'center',
                                logoStyle: 'height:100px;width:130px;',
                                title: 'FaceId of ' + org + ' Dated ' + isoDateString + '',

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
            scrollX: true,

            //"dom": 'Bfrtip',                      
            "dom": '<"pull-left"l>B<"pull-left"f>rtip',

            language: {
                search: "",
                searchPlaceholder: " Search",
                sLengthMenu: "Row   _MENU_"
            },
            "contentType": "application/json",
            "ajax": "<?php echo URL; ?>Face_controller/getSuspiciousSelfie?date="+range+"&shift="+shift+"&deprt="+deprt+"&empl="+empl+"&desg="+desg/*+"&sts="+sts*/,
              "columns": [
              { "data": "name" },
              { "data": "faceid" },
              { "data": "suspicious" },
              { "data": "match" },
              { "data": "event" },
              { "data": "action" }
            ],
        });
});
 table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');


        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

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
                    if (i < 5) {
                        table.column(i).visible(true);
                        $("#chk" + i).iCheck("check");
                    } else {
                        table.column(i).visible(false);
                        $("#chk" + i).iCheck("uncheck");
                    }
                }
            }
        }, 500);

  var minDate = moment();
      //var start = moment().subtract(29, 'days');
      var start = moment().subtract(6,'days');
      var end = moment().subtract(0,'days');
      
      //var start = moment("<?=$startdate?>");
               //var end = moment("<?=$enddate?>");
      function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      }
      $('#reportrange').daterangepicker({
        
        maxDate:/*moment().add(2 , 'month')*/minDate,
        //minDate:'-4M',
        minDate : moment().subtract(4, 'month').startOf('month'),
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
           'Last 30 Days': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      
      
      /////////////////////////////////////
$(document).on("click", ".sts123", function () {
    $('#absent').val($(this).data('absent'));
    $('#empname').text($(this).data('empname'));

    //alert($(this).data('name'));
    $('#sts').val($(this).data('sts'));
    $('#attdate').val($(this).data('attdate'));
  
    });

      $('#disa').click(function(){
             //var comment=$('#commentE').val();
           var absent=$('#absent').val();
           var sts=$('#sts').val();
           var date=$('#attdate').val();
           //alert(date);
           //var sts=$('#timoffstatusE').val();
           var name=$('#empname').text();
             // alert(name);
             // return false;
           $.ajax({url: "<?php echo URL;?>Face_controller/disapprove",
            data: {"absent":absent,"name":name,"sts":sts,"date":date},
            success: function(result){

              //alert(result);
              if(result==1){
                doNotify('top','center',2,'Selfie has been disapproved successfully');
                $('#disapprove').modal('hide');
                document.getElementById('disap').reset();
                 table.ajax.reload();
               }
              
              else{
              doNotify('top','center',4,'No Changes Found');
              document.getElementById('disap').reset();
                $('#disapprove').modal('hide');
                table.ajax.reload();
              }
             },
            error: function(result){
              doNotify('top','center',4,'Unable to connect API');
             }
           });
      });
	  
	  
	  $(document).on("click", ".pop1",function ()
      {
        
        $('#imgid1').val($(this).data('id'));
      //  $('#profileimg').val($(this).data('enimage'));
      //  alert($(this).data('enimage'));
      $('.imagepreview1').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal1').modal('show');   
      });
            </script>
  <script type="text/javascript">
       $('.timepicker').timepicker();
        //$('input.timepicker').timepicker();
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
</html>