<!doctype html>
<html lang="en">
    <head>
          <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/bootstrap-select/css/bootstrap-select.css" />
          <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/datepicker/datepicker3.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?= URL ?>../assets/css/jquery.multiselect.css" />
        <link href="<?= URL ?>../assets/css/jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>../assets/css/multi-select.css" rel="stylesheet" type="text/css" />
                
                          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

        
        <title>Add Employees</title>
        <style>
            a:hover {
                color: black;
                text-decoration: none;
            }
            .a{
                text-decoration: none;
                color: black;
                font-size: 1rem;
                font-family: 'Poppins',sans-serif;
                font-weight: 600;
            }
            .subhead
            {font-size: 1.1rem;
             color: #828282;
             display: flex;
             cursor: pointer;
             text-decoration: none;
             font-weight: 600!important;
             font-family: 'Poppins',sans-serif;
            }

            body
            {
                font-family: 'Poppins',sans-serif;
                font-size: 14px;
            }
            
            
            .head1{
                color: black;
    font-size: 20px;
    font-weight: bold;
            }
            @media screen and (max-width:420px){
            .head1{
                font-size: 14px;
            }
            }
            .card1{
                display:block;
                height: 3.3rem;
                border-radius: 4px;
                margin-top: 6px;
          
            }
        </style>
    </head>
    <body>
        <?php
         $data['pageid']=1.2;
        $this->load->view('menubar/sidebar',$data);
        $this->load->view('menubar/navbar',$data);
        ?>

        
        
        <div class="main">
            <!-- <div class="row">
                <div class="col-12 col-sm-6 col-md-9 col-lg-10"><a href="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/Userprofiles/employeelist" ><img src="http://ubiattendance.zentylpro.com/ubiattnew2/index.php/../assets/img/l-arrow.png" class="mb-1"><b class="head1 ml-3" style="">Employee Month Calendar</b></i></a></div>
    <div class="col-0 col-sm-6 col-md-3 col-lg-2"></div>
            </div><hr> -->
            
            
             <div class="card1 mt-4">
                                     
                                            <div class="container">

                                                        <!-- <span id="attsummary"><img src="<?php echo URL; ?>../assets/images/immigration.svg" alt="attendanceSummary image" height="35px" width="35px" />&nbsp;&nbsp;<b style="font-size:18px;">Attendance Summary</b></span> -->

                                                <div class="container" id="Attrecord" style="margin-left: 5rem;">
                                                    <div class="row">

                                                        <div class="col-md-2" style="">
                                                            <div class="card1" style="background-color: #008fb9;color: #ffffff;font-weight: 700;">
                                                                <p class="card-body1 text-center pt-3">Present : <span id="presentcount"></span></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" >
                                                            <div class="card1" style="background-color: #ed433e;color: #ffffff;font-weight: 700;">
                                                                <p class="card-body1 text-center  pt-3">Absent : <span id="absentcount"></span></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" >
                                                            <div class="card1" style="background-color: #00c2ec;color: #ffffff;font-weight: 700;">
                                                                <p class="card-body1 text-center pt-3">Leave : <span id="leavecount"></span></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" >
                                                            <div class="card1" style="background-color: #ff9930;color: #ffffff;font-weight: 700;">
                                                                <p class="card-body1 text-center  pt-3">Week Off : <span id="weekoffcount"></span></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" >
                                                            <div class="card1" style="background-color: #00a75f;color: #ffffff;font-weight: 700;">
                                                                <p class="card-body1 text-center  pt-3">Holiday : <span id="holidaycount"></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                   </div>
                      </div>
                                                <div class="container-fluid mt-5 mb-5">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="calendar" style="margin-top:20px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                       
                                     
                                   
        </div>
        
        
          <!-- Modal open Invite employee-->
            <div id="shiftdetails" class="modal fade" role="dialog">
                <div class="modal-dialog" style="width:35%;">
                    <!-- Modal content-->
                    <div class="modal-content-shift" style="background: white;">
                        <div class="modal-header" style="border-bottom: none;">
                            <button type="button" class="close" data-dismiss="modal"><i class="material-icons" style="color: black;">close</i></button>
                            <h4 class="modal-title" id="title" style="font-size: 24px;font-weight: 700;">Shift</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <img src="<?php echo URL; ?>../assets/images/shiftplanner.svg" alt="shiftplanner image" height="100%" width="100%" />
                                </div>
                                <div class="col-md-4" style="font-weight: 500;text-align: center;">
                                    <br><br>
                                    <p id="shiftname"></p>
                                    <p id="stype"></p>	
                                    <p id="timing"></p>		
                                </div>
                                <div class="col-md-2"></div>	
                            </div>
                            <div class="modal-footer" style="border-top:none;">
                                <!-- <button type="button" id="sendInvitation"  class="btn btn-success">Send Registration Link</button> -->

                                <button type="button" class="btn btn-success" data-dismiss="modal" style="text-align: center;box-shadow: none;">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"
        ></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/repeatheadeerprint.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
        <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
             <script type="text/javascript" src="<?= URL ?>../assets/bootstrap-select/js/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.lwMultiSelect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/js/jquery.multiselect.js"></script>
        <script type="text/javascript" src="<?= URL ?>../assets/datepicker/bootstrap-datepicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
                    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
             
              
          <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>

        
   <?php
$currentURL = current_url();
//echo $currentURL;
$str = substr(strrchr($currentURL, '/'), 1);
//echo $str;
?>

                <script>
                                                        //   $(document).ready(function(){

                                                        // $("#Attrecord").hide();

                                                        //   $("#attsummary").click(function(){
                                                        //           $('#calendar').css('margin-top', '=-10px');
                                                        //     $("#Attrecord").toggle('slow');

                                                        //   });

                                                        // });

                </script>

                <script>
                    $(document).ready(function () {
                        var empid = '<?php echo $str ?>';
                       // alert(empid);
                        var startDate = '';
                        var endDate = '';
                        var calendar = $('#calendar').fullCalendar({
                            editable: false,
                            eventColor: 'green',
                            textColor: 'black',
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay'
                            },
                            //events:"<?php echo URL; ?>userprofiles/empleaveandtimeoff?empid="+empid,

                            eventSources: [

                                {
                                    url: '<?php echo URL; ?>userprofiles/emplpresentcal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#008fb9', // a non-ajax option
                                    textColor: 'white', // a non-ajax option
                                },

                                {
                                    url: '<?php echo URL; ?>userprofiles/emplabsentcal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#ed433e', // a non-ajax option
                                    textColor: 'white', // a non-ajax option
                                },

                                {
                                    url: '<?php echo URL; ?>userprofiles/emplweekoffcal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#ff9930', // a non-ajax option
                                    textColor: 'white', // a non-ajax option
                                },

                                {
                                    url: '<?php echo URL; ?>userprofiles/empholidaycal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#00a75f', // a non-ajax option
                                    textColor: 'white', // a non-ajax option
                                },

                                {
                                    url: '<?php echo URL; ?>userprofiles/empleavecal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#00c2ec', // a non-ajax option
                                    textColor: 'white', // a non-ajax option
                                },

                                {
                                    url: '<?php echo URL; ?>userprofiles/empshiftplannercal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#5a3b3c', // a non-ajax option
                                    textColor: 'white' // a non-ajax option
                                },

                                {
                                    url: '<?php echo URL; ?>userprofiles/emptimeoffcal',
                                    type: 'POST',
                                    data: {
                                        empid: empid,
                                    },
                                    error: function () {
                                        //alert('there was an error while fetching events!');
                                    },
                                    color: '#e853f1', // a non-ajax option
                                    textColor: 'white' // a non-ajax option
                                },
                            ],

                            selectable: true,
                            selectHelper: true,

                            // select:function(start, end, allDay)
                            // {
                            //     var title = prompt("Enter Event Title");

                            //     if(title)
                            //     {
                            //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            //         $.ajax({
                            //             url:"<?php echo URL; ?>test/insert",
                            //             type:"POST",
                            //             data:{title:title, start:start, end:end},
                            //             success:function()
                            //             {
                            //                 calendar.fullCalendar('refetchEvents');
                            //                 alert("Added Successfully");
                            //             }
                            //         })
                            //     }
                            // },

                            editable: true,

                            // eventResize:function(event)
                            // {
                            //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                            //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                            //     var title = event.title;

                            //     var id = event.id;

                            //     $.ajax({
                            //         url:"<?php echo URL; ?>test/update",
                            //         type:"POST",
                            //         data:{title:title, start:start, end:end, id:id},
                            //         success:function()
                            //         {
                            //             calendar.fullCalendar('refetchEvents');
                            //             alert("Event Update");
                            //         }
                            //     })
                            // },

                            // eventDrop:function(event)
                            // {
                            //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                            //     //alert(start);
                            //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                            //     //alert(end);
                            //     var title = event.title;
                            //     var id = event.id;
                            //     $.ajax({
                            //         url:"<?php echo URL; ?>test/update",
                            //         type:"POST",
                            //         data:{title:title, start:start, end:end, id:id},
                            //         success:function()
                            //         {
                            //             calendar.fullCalendar('refetchEvents');
                            //             alert("Event Updated");
                            //         }
                            //     })
                            // },

                            eventClick: function (event)
                            {
                                //$('#shiftdetails').modal("show");
                                var title = event.title.trim();
                                // alert(title);
                                if (title == 'Present' || title == 'TimeOff' || title == 'Week Off' || title == 'Absent' || title == 'Leave')
                                {
                                    return false;
                                } else
                                {
                                    var eventdate = moment(event.start).format('Y-MM-DD');
                                    //var date = event.start;
                                    var eventtitle = event.title;
                                    var empid = event.id;
                                    //alert(empid);
                                    $.ajax({
                                        url: "<?php echo URL; ?>userprofiles/geteventdetails",
                                        type: "POST",
                                        data: {empid: empid, eventtitle: eventtitle, eventdate: eventdate},
                                        success: function (result)
                                        {
                                            //calendar.fullCalendar('refetchEvents');
                                            //alert('Event Removed');
                                            result = JSON.parse(result);
                                            var i = 0;
                                            for (i = 0; i < result.data.length; i++) {
                                                var Name = result.data[i].Name;
                                                var stype = result.data[i].stype;
                                                var timing = result.data[i].timing;
                                            }
                                            //alert(Name);

                                            $('#shiftdetails').modal("show");
                                            $("#shiftname").html(Name);
                                            $("#stype").html(stype);
                                            $("#timing").html(timing);


                                        },
                                        error: function (result) {
                                            doNotify('top', 'center', 4, 'Unable to connect API');
                                        }
                                    });
                                }
                            },

                        });

                        var startDate = $('#calendar').fullCalendar('getView').intervalStart.format('YYYY-MM-DD');
                        var endDate = $('#calendar').fullCalendar('getView').intervalEnd.format('YYYY-MM-DD');

                        $.ajax({url: "<?php echo URL; ?>userprofiles/emplcountcal",
                            type: "POST",
                            data: {
                                empid: empid, startDate: startDate, endDate: endDate,
                            },
                            success: function (result) {
                                result = JSON.parse(result);
                                $("#presentcount").html(result.data[0].presentcount);
                                $("#absentcount").html(result.data[0].absentcount);
                                $("#leavecount").html(result.data[0].leavecount);
                                $("#weekoffcount").html(result.data[0].weekoffcount);
                                $("#holidaycount").html(result.data[0].holidaycount);
                            },
                            error: function (result) {
                                doNotify('top', 'center', 4, 'Unable to connect API');
                            }
                        });

                        $('.fc-next-button').click(function () {

                            var startDate = $('#calendar').fullCalendar('getView').intervalStart.format('YYYY-MM-DD');
                            var endDate = $('#calendar').fullCalendar('getView').intervalEnd.format('YYYY-MM-DD');

                            // alert(startDate);
                            // alert(endDate);

                            $.ajax({url: "<?php echo URL; ?>userprofiles/emplcountcal",
                                type: "POST",
                                data: {
                                    empid: empid, startDate: startDate, endDate: endDate,
                                },
                                success: function (result) {
                                    result = JSON.parse(result);
                                    $("#presentcount").html(result.data[0].presentcount);
                                    $("#absentcount").html(result.data[0].absentcount);
                                    $("#leavecount").html(result.data[0].leavecount);
                                    $("#weekoffcount").html(result.data[0].weekoffcount);
                                    $("#holidaycount").html(result.data[0].holidaycount);
                                },
                                error: function (result) {
                                    doNotify('top', 'center', 4, 'Unable to connect API');
                                }
                            });

                        });

                        $('.fc-prev-button').click(function () {

                            var startDate = $('#calendar').fullCalendar('getView').intervalStart.format('YYYY-MM-DD');
                            var endDate = $('#calendar').fullCalendar('getView').intervalEnd.format('YYYY-MM-DD');

                            // alert(startDate);
                            // alert(endDate);

                            $.ajax({url: "<?php echo URL; ?>userprofiles/emplcountcal",
                                type: "POST",
                                data: {
                                    empid: empid, startDate: startDate, endDate: endDate,
                                },
                                success: function (result) {
                                    result = JSON.parse(result);
                                    $("#presentcount").html(result.data[0].presentcount);
                                    $("#absentcount").html(result.data[0].absentcount);
                                    $("#leavecount").html(result.data[0].leavecount);
                                    $("#weekoffcount").html(result.data[0].weekoffcount);
                                    $("#holidaycount").html(result.data[0].holidaycount);
                                },
                                error: function (result) {
                                    doNotify('top', 'center', 4, 'Unable to connect API');
                                }
                            });

                        });

                    });




                </script>          
    </body>
</html>