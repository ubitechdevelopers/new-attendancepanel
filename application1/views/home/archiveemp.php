<!doctype html>
<html lang="en">
    <head>
    <?php 
         $this->load->view('menubar/allnewcss');
         ?>
        <title>UbiAttendance Panel</title>
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
            .dataTables_length{
                margin-top: 10px;

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
                width: 8rem;
            }
            .filtr
            {
                font-size: 0.8rem;
                font-weight: 500;
            }
            /*b{
            font-weight: 700!important;
            }*/
            body
            {
                font-family: 'Poppins',sans-serif;
                font-size: 14px;
            }
            #heading2 .active5 a{
                border-bottom: 3.5px solid green;
                /*border-radius: 3%;*/
                width: 100%;
                text-decoration: none;
                height: auto;
                font-weight: 700!important;
                color: #0F0F0F;
                font-family: 'Poppins';
                font-style: normal;
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
                text-align:center!important;
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
               /* top: -5.5rem;*/
                left: 31rem;
                background-color: white!important;
                color: black!important;
                font-family: 'Poppins';

                font-weight: 600;

                color: #4B506D!important;
                font-size: 14px!important;
            }
            @media screen and (min-width: 1300px) {
                .buttons-collection{  left:42.7rem!important;}
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
            .right{
                float: right;
                margin-bottom: 5px;
                margin-right: 5px;
            }
            div.sticky {
  position: -webkit-sticky!important;
  position: sticky!important;
  top: 1rem!important;
 
 z-index: 2000;
  
}

div.sticky.active {
         background: white;
        /* box-shadow: 0px 5px 10px -5px #acacac;*/


          transition: ease-in-out .5s;
          position: -webkit-sticky!important;
 position: sticky!important;
  top: 3.3rem!important;
  z-index: 2000;
  
  }

        </style>
    </head>
    <body>
        <?php
        $data['pageid']=2.2;
        $orgid = $_SESSION['orgid'];
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar');
        ?>
        
    <main class="main">
      

                  <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
                     
                     <nav class="main-nav">
                        <ul>
                           <li ><a href="<?= URL; ?>Userprofiles/employeelist" class="subhead">Active</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <li ><a href="<?= URL; ?>Userprofiles/inactiveemployee" class="subhead">InActive</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <li class="active5"><a href="<?= URL; ?>Userprofiles/archiveemployee" class="subhead">Archive</a></li>
                        </ul>
                        <i class="active-marker"></i>
                     </nav>
                  </div>
             
                
           
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" id="next-container" style="display:none;">
                    <button class="btn btn-secondary">Department</button>
                    <button class="btn btn-secondary">Shift</button>
                    <button class="btn btn-secondary">Designation</button>
                    <button class="btn btn-secondary">Qr Code</button>
                    <button class="btn btn-secondary">Track Location</button>
                    <button class="btn btn-secondary">Inactive</button>
                    <button class="btn btn-secondary">Geo Center</button>
                </div>
            </div>
        
      
        <!-- Coulmn Visibilty -->
        <!-- <div class="row">
            <div class="col-lg-7" >
               
            </div>
            <div class="col-lg-5" style="padding-left: 3rem;" >
                <a href="#" data-toggle="modal" role="button" data-target="#column_modal" class="btn btn-tertiary dropdown-toggle filtr"id="columnv"style="position: absolute;">
                    Column Visibility
                </a>
            </div>
        </div> -->

        <table id="example" class="table" style="width:100%;">
            <thead>
                <tr style="color: gray;font-size: 0.9375rem">
                 

                    <th >Name</th>
                    <th >Designation</th>
                    <th > Department</th>
                    <th width="10%;" style="text-align:center;">Action</th>
                </tr>
            </thead>
            <!--<tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                </tr>
          </tbody>-->

        </table>
    </main>
    <div class="modal fade" id="column_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="<?= URL; ?>Userprofiles/archiveemployee"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Columns Visibility</a></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form role="form1" >
                    <div class="modal-body">
                        <div class="form-group" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                           <!--  <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Checkbox</label></br> -->

                                            <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk0" disabled>&nbsp;Name</label></br>
                                        </div>
                                        
                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk1" disabled>&nbsp;Designation</label></br>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <label class="filtr"><input type="checkbox" class="modal_checkbox" id="chk2" disabled>&nbsp;Department</label></br>
                                        </div>


                                        </div>
                                       






                                    </div>
                                </div>
                            </div>
                        </div>
                      <!--   <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: end;"> -->
                                <div class="right">
                                    <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>

                                    <button type="button" id="button1" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
                                </div>
                           <!--  </div>
                        </div> -->
                    </div>
                    <!--  <div class="modal-footer">
                         <button type="button" id="button1" class="btn btn-primary bttn filtr" data-dismiss="modal">Save</button>
                         <button type="button" class="btn btn-danger bttn filtr" data-dismiss="modal">Close</button>         
                     </div> -->
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="unarchive" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/designation"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp; Unarchive Employee</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="arc_id" />
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Unarchive "<span id="nameE"></span>"?</h6>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" style="width:9rem;">Cancel</button>

                    <button type="button" id="unarchiveE" class="btn btn-success" style="width:9rem;">Save</button>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="delE" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Managesettings/designation"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp; Unarchive Employee</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="emp_id" />
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Delete "<span id="Ename"></span>"?</h6>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" style="width:9rem;">Cancel</button>

                    <button type="button" id="deleteE" class="btn btn-success" style="width:9rem;">Save</button>
                </div> 
            </div>
        </div>
    </div>
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
                        buttons: [{
                                 extend: 'csvHtml5',
                                 exportOptions: {
                                     columns: [0, 1, 2]
                                 }
                             },
         
                             {
                                 extend: 'excelHtml5',
                                 exportOptions: {
                                     columns: [0, 1, 2]
                                 }
                             },
							 {
                                 extend: 'pdf',
                                 exportOptions: {
                                     columns: [0, 1, 2]
                                 }
                             },{
                                 extend: 'print',
                                 // autoPrint: false,
                                 title: '',
                                 exportOptions: {
                                     // columns: ':visible',
                                     columns: [0, 1, 2],
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
                     searchPlaceholder: "  search",
                     sLengthMenu: "Row   _MENU_"
                 },
                "contentType": "application/json",
                "ajax": "<?php echo URL; ?>userprofiles/getArchiveEmp",
                "columns": [
                 /* {"data": "change"},*/
                    {"data": "FirstName"},
                    {"data": "desg"},
                    {"data": "deprt"},
                    {"data": "action"}

                ]
            });
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
                        if (i < 4) {
                            table.column(i).visible(true);
                            $("#chk" + i).iCheck("check");
                        } else {
                            table.column(i).visible(false);
                            $("#chk" + i).iCheck("uncheck");
                        }
                    }
                }
            }, 500);


            $('input[type="checkbox"]').on('ifChecked', function () {
                var checkbox = $("input[type='checkbox']:checked ").length;
                for (var i = 0; i < checkbox; i++) {
                    var ischecked = $("#chk" + i).is(":checked");
                    if (checkbox > 3) {

                        if (ischecked == true) {
                            $("#chk" + i).iCheck(":checked");
                        } else {
                            $("#chk" + i).iCheck(":unchecked");
                        }
                    }
                }
            });

            $("#button1").click(function () {
                var checkbox = $(".modal_checkbox");
                //alert(checkbox.length);
                for (var i = 0; i < checkbox.length; i++) {
                    var column = table.column(i);
                    var ischecked = $("#chk" + i).is(":checked");
                    // alert(ischecked);
                    if (ischecked == true)
                    {
                        column.visible(true);
                    } else {

                        column.visible(false);
                    }

                }
                //$('#column_modal').hide();
                //$('#example').DataTable().ajax.reload(null, false);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", ".checkbox", function ()
            {

                if ($('.checkbox:checked').length == $('.checkbox').length)
                {
                    $('#select_all').prop('checked', true);
                } else
                {
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
        $(document).ready(function ()
        {
            $('#select_all').click();
            $('#select_all').on('click', function ()
            {
                if (this.checked)
                {
                    $('.checkbox').each(function ()
                    {
                        this.checked = true;
                        $('#next-container').show();
                    });
                } else {
                    $('.checkbox').each(function ()
                    {
                        this.checked = false;
                        $('#next-container').hide();
                    });
                }


                $('input[name="select_all"]').attr('click', function () {

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
        window.onclick = function (event) {
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
        $(document).ready(function () {
            $(document).on("click", ".dropdown .dropdown-menu .unarchive", function () {
                var empid = $(this).data('id');
                var empname = $(this).data('name').trim();
                $("#arc_id").val(empid);
                $("#nameE").text(empname);
            });
            $(document).on("click", "#unarchiveE", function () {
                var empid = $("#arc_id").val();
                $.ajax({url: "<?php echo URL; ?>userprofiles/UnarchiveUser",
                    data: {"sid": empid},
                    success: function (result) {
                        //alert(result);
                        if (result == 1) {
                            $('#unarchive').modal('hide');
                            doNotify('top', 'center', 2, 'Employee unarchived successfully');
                            setTimeout("location.reload(true);",2000);
                            $('#example').DataTable().ajax.reload();
                        }
                        if (result == 2)
                        {
                            doNotify('top', 'center', 4, "Employee with admin permission can't be deleted");
                        }
                    },
                    error: function (result) {
                        doNotify('top', 'center', 4, 'Unable to connect API');
                    }
                });
            })

            $(document).on("click", ".dropdown .dropdown-menu .delete", function () {
                var empid = $(this).data('id');
                var empname = $(this).data('name').trim();
                $("#emp_id").val(empid);
                $("#Ename").text(empname);
            });
            $(document).on("click", "#deleteE", function () {
                var empid = $("#emp_id").val();
                //$("#loadmodel").modal('show');
                $.ajax({url: "<?php echo URL; ?>userprofiles/deleteUserpermanent__New",
                    data: {"sid": empid},
                    success: function (result) {
                        //$("#loadmodel").modal('hide');
                        if (result == 1) {
                            doNotify('top', 'center', 2, 'Employee deleted successfully');
                            setTimeout("location.reload(true);",2000);
                            table.ajax.reload();
                        } else
                        {
                            doNotify('top', 'center', 3, 'Error occured, try later');
                        }

                    },
                    error: function (result) {
                        $("#loadmodel").modal('hide');
                        doNotify('top', 'center', 4, 'Unable to connect API');
                    }
                });
            });
        });
    </script>
     <script type="text/javascript">
         $(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.sticky').addClass('active');
        } else {
            $('.sticky').removeClass('active');
        }
    });
});
      </script>
       <script>
$("#example").on('processing.dt', function (e, settings, processing) {
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
</body>
</html>