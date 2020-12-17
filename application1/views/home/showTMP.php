<!doctype html>
<html lang="en">
    <head>
    <?php 
         $this->load->view('menubar/allnewcss');
         ?>
        <title>UbiAttendance Panel</title>
        <style type="text/css">
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
                border:none;
                border-radius: 4px;
                font-size: 16px;
               
                background-image: url('<?= URL ?>../assets/icons/u_search.svg');
                background-position: 10px 12px;
                background-repeat: no-repeat;
                padding: 21px 20px 23px 40px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }
            
             div.dataTables_wrapper div.dataTables_filter input:focus{
            width: 20rem;
              background-color: #e9f1e8;

         }
            div.dataTables_wrapper div.dataTables_filter
            /* text-align: right; */
            margin-left: -104%!important;
            }
            input[class="checkbox"]{
                width: 1.2rem!important;
                height: 1.2rem!important;
            }
            #select_all{
                width: 1.2rem!important;
                height: 1.2rem!important;
            }
            table.dataTable>thead .sorting:after{
                display: none;
            }
            table.dataTable>thead .sorting:before{
                display: none;
            }
            table.dataTable>thead .sorting:before, table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:before, table.dataTable>thead .sorting_desc_disabled:after {
                display: none;
            }
            element.style {
            }
            .page-item.active .page-link {
                z-index: 3;
                color: #000;
                background-color: #e1ffe0;
                border-color: #e1ffe0;}
            table.dataTable thead th {
                border-top: none;
                color: #9FA2B4;
                font-size: 0.85rem;
                font-style: 'Poppins';
            }
            table.dataTable tbody {
                font-size: 0.85rem;
                font-family: 'Poppins',sans-serif;
                font-weight: 600;
                color: #3f424c;
            }
            .dot-button{
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: black;
                box-shadow: 0px 40px 0px black, 0px 80px 0px black;
            }
            a:hover {
                color: black!important;
                text-decoration: none!important;
            }
            .a{
                text-decoration: none;
                color: black;
                font-size: 1rem;
                font-family: 'Poppins',sans-serif;
                font-weight: 600;
            }
            .subhead{
                font-size: 18px;
                color: #828282;
                display: flex;
                cursor: pointer;
                text-decoration: none;
                font-weight: 500!important;
                font-family: 'Poppins',sans-serif;
            }
            .bttn
            {
                width: 9rem;
                font-weight: 500;
                font-size: 14px;
                height: 2.5rem;
            }
            .fit{width: 9rem;
                 font-weight: 500;
                 font-size: 14px;
                 height: 2.5rem;
                 margin-bottom: 5px;

            }
            .filtr
            {
                font-size: 0.8rem;
                font-weight: 500;
            }
            .btn1{
                background-color: #D3D3D3;
                border: 1px solid;
            }
            /*b{
            font-weight: 700!important;
            }*/
            .right{
                float: right;
            }
            body
            {
                font-family: 'Poppins',sans-serif;
                font-size: 14px;
                overflow-x: hidden;
                /* overflow:hidden; */
            }
            #heading2 .active5 a{
                border-bottom: 3.5px solid green;
                /*border-radius: 3%;*/
                width: 100%;
                text-decoration: none;
                height: auto;
                font-weight: bold;
                color: black;
            }

            .checkbox
            {
                width: 1.2rem!important;
                height: 1.2rem!important;
            }
            .mobview{
                display: none;
            }
            @media only screen and (max-width: 600px) 
            {
                /*.uu1{
                    display: none;
                }*/
                .mobview{
                    display:unset!important;
                } 
                div.dataTables_wrapper div.dataTables_filter input{
                    /*display: none;*/
                    width: 13.5rem;
                }
                #columnv
                {
                    display: none;}
            }
            table.dataTable tbody td:nth-child(1) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(2) {
                padding-top: 1.8rem!important;
            } 
			table.dataTable tbody td:nth-child(3) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(4) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(5) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(6) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(7) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(8) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(9) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(10) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(11) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(12) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(13) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(14) {
                padding-top: 1.8rem!important;
            } 
            table.dataTable tbody td:nth-child(15) {
                padding-top: 1.8rem!important;
            }
            .buttons-collection{
                border: none;
                position: relative;
               /* top: -3.5rem;*/
                left: 44rem;
                background-color: white!important;
                color: black!important;
                font-family: 'Poppins';

                font-weight: 600;

                color: #4B506D!important;
                font-size: 14px!important;
            }
            div.dataTables_wrapper div.dataTables_filter {
                text-align: left!important;
            }
            div.dt-button-collection div.dropdown-menu {

                margin-left: 1.5rem;
            }
            .tertiary-button {

                padding: 5px 10px 5px 20px!important;
            }
            .adbtn{
                color: black!important;
            }


            /* input, select {
     box-sizing: border-box;
     display: block;
     width: 100%;
     border: 2px solid #D8D8D8;
     border-radius: 5px;
     -moz-border-radius: 5px;
     -webkit-border-radius: 5px;
     -o-border-radius: 5px;
     -ms-border-radius: 5px;
     
     font-size: 13px;
     padding: 8px 20px; }
 @media screen and (max-width: 430px) {
     input, select{
         padding: 7px 12px;
     }
 }*/
        </style>


    </head>
    <body>
        <?php
          $data['pageid']=2.4;
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar');
        ?>
        <main class="main">
            <div class="container-fluid">
              



            <table id="example" class="table" style="width:100%;">
                <thead>
                    <tr style="">
                        <th width="10%">Full Name</th>
								<!-- <th width="10%">Last Name</th> -->
								<th width="10%">Email Id</th>
								<th width="10%">Contact No.</th>
								<th width="10%">Department</th>
								<th width="10%">Designation</th>
								<th width="10%">Shift</th>
								<th width="10%">Employee Code</th>
								<th width="10%">Date</th>
								<th width="10%">Remark</th>
                    </tr>
                </thead>
               
            </table>
        </main>

        <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><a class="a" href="<?= URL; ?>Userprofiles/employeelist"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--   <div class="modal-body">
                         Department<br>
                         <input type="text" class="form-control" id="deptName" value="" name="Name" placeholder="Enter Department Name">
                         <span id="deptName_error" class="error_form"></span>
                         <br>
                         <div class="row">
                                      <div class="col-lg-4">
                                      </div>
                                        <div class="col-lg-8">
                                       
                                     <button type="button"  class="btn btn-secondary bttn" data-dismiss="modal">Cancel</button>
                                     &nbsp;&nbsp;
                         <button type="button" id="save12" class="btn btn-success bttn">Save</button>
                          </div>
                        </div> 
                      </div> -->
                    <form role="form1" >
                        <div class="modal-body">
                            <div class="form-group" >
                                <div class="row">


                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Name</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled >&nbsp;Email</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;Contact</label><br>
                                       

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                         <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk3" disabled>&nbsp;Department</label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk4" disabled>&nbsp;Designation</label><br>

                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk5" disabled>&nbsp;Shifts </label><br>
                                        
                                       



                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                      
                                      <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk6" disabled>&nbsp;Employee code </label><br>
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk7" disabled>&nbsp; Date</label><br> 
                                        <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk8" disabled >&nbsp;Remarks</label><br>


                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="row">
                                          <div class="col-lg-7">
                                          </div>
                                            <div class="col-lg-5"  style="text-align: end;">-->
                            <div class="right">
                                <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
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


        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <?php 
         $this->load->view('menubar/allnewjs');
         ?>
        <script>
            $(document).ready(function () {
                var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
                var datestring = "&date=";
                var date = new Date();
                date.setMinutes(0);
                date.setSeconds(0);
                date.setMilliseconds(0);

                var isoDateString = date.toISOString().substring(0, 10);
                var table = $('#example').DataTable({
                    //"dom": '<"pull-left"f><"pull-right"l>tip',   


                    buttons: [
                    {
      extend:'colvis',
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
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        stripHtml: false,
                                    },
                                    repeatingHead: {

                                        logo: '<?= URL ?>../assets/image/logo.png',
                                        logoPosition: 'center',
                                        logoStyle: 'height:100px;width:130px;',
                                        title: 'Active employees of ' + org + ' Dated ' + isoDateString + '',

                                    },
                                    // text: '<i class="fa fa-print"></i> Print',
                                    text: 'Print',

                                    customize: function (win) {
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
                        }],
                    //"dom": 'Bfrtip',             
                     "dom": '<"pull-left"l>B<"pull-left"f>rtip',   

         
         
                 language: {
                     search: "",
                     searchPlaceholder: " Search",
                     sLengthMenu: "Row   _MENU_"
                 },

                    "contentType": "application/json",
                    "ajax": "<?php echo URL;?>Userprofiles/getEmpotTmp",
                 "columns": [
				     { "data": "fname" },
				    /* { "data": "lname" },*/
				     { "data": "email" },
				     { "data": "cont" },
				     { "data": "deprt" },
					  { "data": "desg" },
					  { "data": "shift" },
					   { "data": "ecode" },
					   {"data":"Date"},
					    {"data":"remark"}
						
				   ]
                });
                 table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
       
       
        table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

          var total=table.columns().visible().length;
                 //alert(total);
                 setTimeout(function() {
                 
                 var checkbox = 0;
                 //var total=9;
                 for(var i=0; i< total; i++) {
                 
                 if( table.column(i).visible()) {
                 checkbox++;
                 $("#chk"+i).iCheck("check");
                 }           
                 }
                 if(checkbox ==total ){
                 
                 for(var i=0; i< total; i++) {        
                 if(i<9){       
                 table.column(i).visible(true);
                 $("#chk"+i).iCheck("check");
                 }else{
                 table.column(i).visible(false);
                 $("#chk"+i).iCheck("uncheck");
                 }        
                 }        
                 }           
                 },500); 
                 
                 
                 $('input[type="checkbox"]').on('ifChecked', function(){
                 var checkbox = $("input[type='checkbox']:checked ").length;
                 for(var i=0; i< checkbox; i++) {
                 var ischecked = $("#chk"+i).is(":checked");
                 if(checkbox >10){
                 
                 if(ischecked == true) { 
                 $("#chk"+i).iCheck(":checked");
                 } else{ 
                 $("#chk"+i).iCheck(":unchecked");
                 }     
                 }
                 }   
                 });     
                 
                 $("#button1").click(function(){
                 var checkbox = $(".modal_checkbox");
                 //alert(checkbox.length);
                 for(var i=0; i< checkbox.length; i++) {
                 var column = table.column(i);
                 var ischecked = $("#chk"+i).is(":checked");
                 console.log(ischecked);
          // alert(ischecked);
                 if(ischecked == true)
                 { 
                 column.visible(true);}
                 else{
                 
                 column.visible(false);}
                 
                 }
                 //$('#column_modal').hide();
                 //$('#example').DataTable().ajax.reload(null, false);
                 }); 

            });
        </script>

    </body>
</html>