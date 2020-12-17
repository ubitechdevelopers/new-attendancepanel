<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
  <link href="<?=URL?>../assets/css/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Offline - unsynced</title>
    <link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/jquery-ui.css" />
     <style>
      $query = $this->db->query("SELECT `Id`,  `Shift`  FROM ` EmployeeMaster`  WHERE OrganizationId=? AND `Id` Not IN(SELECT `EmployeeId` FROM `AttendanceMaster` ) ",array($orgid)); 
      .red{
      color:red;
      font-weight:'bold';
      font-size:16px;
      }
      .delete{
      cursor:pointer;
      }
    .bargraph{
         display:inline-block;
         margin-top:-8px;
         margin-left:-17px;
       }
      div.dt-buttons{
      position:relative;
      float:left;
      margin-left:15px;
      }
      .t2{display:none;}
     .modal-footer .btn+.btn 
    {
      margin-bottom: 10px!important;
    }
    a
    {
      cursor:pointer;
      
    }
    </style>
</head>
<body>
   <div class="wrapper">
     <div class="wrapper">
      <?php
        $data['pageid']=7.010;
        $this->load->view('department/sidebar',$data);
        ?>
      <div class="main-panel">
        <?php
          $this->load->view('department/navbar');
          ?>
        </br>
        <div class="content" id="content" style="" >
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="green" >
                  <!--  <h4 class="title">Attendance</h4> -->
                   <p class="category" style="color:#ffffff;font-size:17px;" >List of Offline - unsynced Attendance</p>
                    <!-- <p class="category" style="color:#ffffff;font-size:17px;" >Helppage </p> -->
                    <!--<a rel="tooltip" style="position:relative;margin-top:-30px;"  data-placement="bottom" title="Help" class="btn btn-success btn-sm pull-right toggle-sidebar ">
                   <i class="fa fa-question"></i></a>-->
                  </div>

                  <div class="card-content">
                    <div id="typography">
                      <div class="title">
                        <div class="row">
                          <div class="col-md-8" style="margin-top:-10px;"  >
                  <?php //$depart = getDepartment($id) ?>
                            <h3><?php $depart = getDepartment($id) ?> <?php if($depart != "") echo "in ".$depart.""; ?></h3>
              
              <?php //if($depart != "") 
                //echo "  <small><b>".$depart."</b></small>"; ?> 
                          </div>
          
             
              
                        <div class="col-md-4" >
               <!--   <a href="<?php echo URL; ?>admin/markattendance" class="btn btn-sm btn-success" type="button"><i class="fa fa-plus"> Add</i>
              <div class="ripple-container"></div>
              </a> --->
                            <!------------------------------->
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px;  border: 1px solid #ccc; position: relative;
    top: -8px;">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                              <span></span> 
                <b class="caret"></b>
                            </div>
                            <!--<button class="btn btn-success pull-right" id="getAtt">Submit</button>-->
                            <!------------------------------->
                        </div>
              
            
            
                        </div>
                        
                        <div class="row" style="overflow-x:scroll;">
                          <table id="example" class="display table"  width="100%">
                            <thead>
                              <tr style="background-color:#008067;color:#ffffff;">
                                <th>Name</th>

                                
                                <th>Date</th>
                                <th>Sync date</th>
                                 <th>Action</th>
                                <th>Time</th>
                                <th>Selfie</th>
                                <th>Location</th>
                               
                                <th>Failure Reason</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      
  </div>
</div>
   <div class="col-md-3 t2" id="sidebar" style=" margin-top:100px;"></div>
        <footer class="footer">
          <div class="container-fluid" style="" >
            <nav class="pull-left">
            </nav>
           <!-- <p class="copyright pull-right" style="padding-right:35px;" >
              &copy; <script>document.write(new Date().getFullYear())</script>. Developed by<a href="http://www.ubitechsolutions.com/" target="_blank" > Ubitech Solutions </a>
            </p>-->
      <a href="http://www.ubitechsolutions.com/" target="_blank" >
          <p class="copyright pull-right" style="padding-right:25px;padding-top:0px;" >
          Copyright &copy;<script>document.write(new Date().getFullYear())</script>
          Ubitech Solutions. All rights reserved.
          </p>
        </a>
          </div>


</div>
</div>



</body>
  <div id="mySidenav" class="pull-right sidenav" style="background-image:url(<?=URL?>../assets/img/bg7.jpg);background-repeat:no-repeat;">
            <div class="helpHeader"><span >Help</span><a style="color:black;" href="javascript:void(0)" class="closebtn text-right" onclick="closeNav()">x </a></div>
            <div id="sidenavData" class="sidenavData">
            </div>
          </div>

            <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
   <script src="<?=URL?>../assets/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
  

  <script>
            function openNav() 
            {
              document.getElementById("mySidenav").style.width = "360PX";
              $('#sidenavData').load('<?=URL?>help/helpNav',{'pageid' :'notsynced'});  
            }
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
  
  </script>
  <script type="text/javascript">
    var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
  var datestring="&date=";
  var date = new Date();
  date.setMinutes(0);
  date.setSeconds(0);
  date.setMilliseconds(0);
  var isoDateString = date.toISOString().substring(0,10);
   //$(document).ready(function() {
    //var range=$('#reportrange').text();
    // var datestring="&date=";
    var ts;
    var ts1;
    var ss;
    var table= $('#example').DataTable({
    
        order:[[1,'DESC'],[0, "asc"]],
        //"scrollX": true,
        dom: 'Bfrtip',
        //"bDestroy": true, // destroy data table before reinitializing
        buttons: 
        [
        'pageLength',
        {
              extend: 'csv',
              exportOptions: {
              columns: [0,1,2,3,4,6]}
            },
          {
              extend: 'excel',
              exportOptions: {
              columns: [0,1,2,3,4,6 ]}
            },'copy',
        {
            extend: 'print',
            // autoPrint: false,
            title: '',
            exportOptions: {
                columns: ':visible',
                columns: [ 0, 1, 2, 3,4,5,6],
                stripHtml: false,
            },
            repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
                logoStyle: 'height:100px;width:130px;',
                title: 'Not Synced attendance report of '+org+' Dated '+isoDateString+'',
                
            },
            text: '<i class="fa fa-print"></i> Print',
             
            customize: function (win) {
                $(win.document.body)
                    .css('font-size', '10px')
                    
                    // .prepend(
                    //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                    // );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        },
        {
          "extend":'colvis',
          "columns":':not(:last-child)',
        }
        ],
        //"columnDefs": [ { "orderable": false, "targets": [15,16]}],
        "contentType": "application/json",
        "ajax": "<?php echo URL;?>departmenthead/getnotsyncdata?datestatus="+1+"&dept=<?php echo $id; ?>"+datestring,
         
         "columnDefs": [
          { "visible": false, "targets": [2] }
                               ],
        
        "columns": 
        [
        { "data": "name" },
          
        { "data": "Attendancedate" },
        { "data": "syncdate" },
        { "data": "action" },
        { "data": "time" },
        { "data": "image" },
      
        
        
        { "data": "chiloc" },
        
        
        { "data": "failure_reason" },
        
        ],
        "drawCallback": function ( settings ) {
        var api = this.api();
        var rows = api.rows( {page:'current'} ).nodes();
        var last=null;
        
        api.column(1, {page:'current'} ).data().each( function ( group, i ) {
          if ( last !== group ) {
            $(rows).eq( i ).before(
              '<tr class="group"><td bgcolor="#d59ff2" colspan=16><b>'+group+'</b><b> &nbsp; &nbsp;  </b></td></tr>'
            );
            last = group;
          }
        });
        }
    });
  
  
  
    
    ////---------date picker
    //  var start = moment().subtract(29, 'days');
    var minDate = moment();
    var start = moment();
    var end = moment();
    function cb(start, end) 
  {
    $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
   
    maxDate:minDate,
   //minDate:'-4M',
   minDate : moment().subtract(4 , 'month').startOf('month'),
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
    ////---------/date picker
    $('#reportrange').on('DOMNodeInserted',function(){ 
    var range=$('#reportrange').text();
// alert(range);
   // $('#example').empty();
    $('#example').DataTable({
    order:[[1,'DESC'],[0, "asc"]],
    //aaSorting: [[0, "asc"]],
    //"scrollX": true,
     dom: 'Bfrtip',
     "bDestroy": true,// destroy data table before reinitializing
    buttons: 
  [
      'pageLength',
      {
              extend: 'csv',
              exportOptions: {
              columns: [0,1,2,3,4,6]}
            },
          {
              extend: 'excel',
              exportOptions: {
              columns: [0,1,2,3,4,6 ]}
            },'copy',
      {
            extend: 'print',
            // autoPrint: false,
            title: '',
            exportOptions: {
                columns: ':visible',
               columns: [ 0, 1, 2, 3,4,5,6],
                stripHtml: false,
            },
            repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
                logoStyle: 'height:100px;width:130px;',
                title: 'Not Synced report of '+org+' Dated '+isoDateString+'',
                
            },
            text: '<i class="fa fa-print"></i> Print',
             
            customize: function (win) {
                $(win.document.body)
                    .css('font-size', '10px')
                    
                    // .prepend(
                    //     '<img src="<?=URL?>../assets/img/newlogo.png" height="100px" width="130px" style="position:absolute; top:-20px; left:450px;" />'
                    // );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        },
      {
        "extend":'colvis',
        "columns":':not(:last-child)',
      }
    ],
  columnDefs: [ { orderable: false,}],
    "contentType": "application/json",
    "ajax": "<?php echo URL;?>departmenthead/getnotsyncdata?date="+range,
     
  "columnDefs": [
          { "visible": false, "targets": [2] }
                               ],
    "columns":
  [
    { "data": "name" },
          
        { "data": "Attendancedate" },
        { "data": "syncdate" },
        { "data": "action" },
        { "data": "time" },
        { "data": "image" },
      
        
        
        { "data": "chiloc" },
        
        
        { "data": "failure_reason" },
    ],
      "drawCallback": function ( settings ) {
    var api = this.api();
    var rows = api.rows( {page:'current'} ).nodes();
    var last=null;
    
    api.column(1, {page:'current'} ).data().each( function ( group, i ) {
      if ( last !== group ) {
        $(rows).eq( i ).before(
          '<tr class="group"><td bgcolor="#d59ff2" colspan=16><b>'+group+'</b><b> &nbsp; &nbsp;  </b></td></tr>'
        );
        last = group;
      }
              });
     }
    } );
    });
  
   
  
  
 $(document).on("click", ".pop",function ()
      {
        $('#imgid').val($(this).data('id'));
      //  $('#profileimg').val($(this).data('enimage'));
      //  alert($(this).data('enimage'));
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
      });
      
$('#setprofile').click(function(){
      var id=$('#imgid').val();
   // alert($('#profileimg').prop("files")[0]);
   var imgg=$('#profileimg').attr('src');
  
    var  formdata = new FormData();
      formdata.append('profimg',imgg);
      formdata.append('id',id);
    
      $.ajax({
    processData: false,
    contentType: false,
    url: "<?php echo URL;?>admin/editimg",
      data: formdata,
    datatype:"json",
    type:"post",
      success: function(result){
        if(result==1)
      {
      datestring='&date='+$('#reportrange').text();
        doNotify('top','center',2,'Set as profile picture');
      $('#imagemodal').modal('hide');  
        $('#example').DataTable().ajax.reload();
        }
      else
      {
          doNotify('top','center',4,'cannot be updated');
        }
        
       },
      error: function(result)
      {
        doNotify('top','center',4,'Unable to connect API');
      }
      });
    }); 
  
    $(document).on("click", ".delete", function () {
    $('#del_aid').val($(this).data('aid'));
    $('#ana').text($(this).data('aname'));
    $('#del_att').val($(this).data('attdate'));
  
    });
  
  
  
    $(document).on("click", "#delete", function() 
  {
    var id=$('#del_aid').val();
    var ana=$('#ana').text();
    var del_att=$('#del_att').val();
    $.ajax({url: "<?php echo URL;?>admin/deleteAtt",
      data: {"aid":id,"ana":ana,"del_att":del_att},
      success: function(result)
    {
        if(result==1){
        datestring='&date='+$('#reportrange').text();
          $('#delAtt').modal('hide');
          doNotify('top','center',2,'Attendance deleted successfully');
           $('#example').DataTable().ajax.reload();
        }else{
          $('#delAtt').modal('hide');
          doNotify('top','center',4,'There may problem(s) in deleting attendance , try later');
        }
      
       },
      error: function(result){
        doNotify('top','center',4,'Unable to connect API');
       }
      });
    });
  
  
  
 $('#saveEE').click(function(){
      var id=$('#id').val();
      var ti=$('#timeInE').val();
      var to=$('#timeOutE').val();
      var date=$('#attDateE').val();
      var shifttype=$('#shifttype').val();
    
      if(shifttype==1)
      {
        if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal than time out'); 
        return false;  
        }
       if(ti>to)
       {
        doNotify('top','center',4,'Time in cannot be greater than time out'); 
        return false;
       }         
      }
       if(shifttype==2)
      {
        if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal than time out'); 
        return false;  
        }
       // if(ti<to)
       // {
        // doNotify('top','center',4,'Time Out can not be greater than Time In'); 
        // return false;
       // }        
      }
     
      $.ajax({url: "<?php echo URL;?>admin/editAttUBI",
      data: {"id":id,"ti":ti,"to":to,"date":date,"shifttype":shifttype},
      success: function(result){
        //alert(result);
        if(result==1)
        {
          datestring='&date='+$('#reportrange').text();
          // alert(datestring);
          doNotify('top','center',2,'Time out updated successfully');
          $('#addAttATO').modal('hide');
          //table.ajax.reload();
          $('#example').DataTable().ajax.reload();
          
        }
        else
        {
          doNotify('top','center',4,'Cannot be updated');
        }
        
       },
      error: function(result)
        {
          doNotify('top','center',4,'Unable to connect API');
        }
      });
    }); 
    
      
      
      
   
    
   $('#saveE').click(function(){
      var id=$('#id').val();
      var aname=$('#aname').text();
      var ti=$('#timeInE1').val();
      var to=$('#timeOutE1').val();
      var dateIn=$('#attInDateE1').val();
      var dateOut=$('#attOutDateE1').val();
      var shifttype=$('#shifttype').val();
     
      if(shifttype==1)
      {
        if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal than time out'); 
        return false;  
        }
       if(ti>to)
       {
        doNotify('top','center',4,'Time in cannot be greater than time out'); 
        return false;
       }         
      }
       if(shifttype==2)
      {
        if(ti==to)
        {
        doNotify('top','center',4,'Time in cannot be equal than time out'); 
        return false;  
        }  
      }
    
      $.ajax({url: "<?php echo URL;?>admin/editAtt",
      data: {"id":id,"ti":ti,"to":to,"dateIn":dateIn,"dateOut":dateOut,"shifttype":shifttype,"aname":aname,"ts":ts,"ts1":ts1},
      success: function(result){
        if(result==1)
        {
          datestring='&date='+$('#reportrange').text();
          doNotify('top','center',2,'Attendance updated successfully');
          $('#addAttE').modal('hide');
          $('#example').DataTable().ajax.reload();
        }
        else
        {
          doNotify('top','center',4,'Cannot be updated');
        }
       },
      error: function(result)
        {
          doNotify('top','center',4,'Unable to connect API');
        }
      });
    }); 
    
    
  </script>
  <script>
$(document).ready(function(){
$(document).on("click", ".edit", function () 
  {
    $('#id').val($(this).data('id'));
    $('#aname').text($(this).data('aname'));
    $('#timeInE1').val($(this).data('timein'));
    $('#timeOutE1').val($(this).data('timeout'));
    $('#attInDateE1').val($(this).data('tidate'));
    $('#attOutDateE1').val($(this).data('todate'));
    $('#shifttype').val($(this).data('shifttype'));
  
  if($(this).data('shifttype')==1)
  {
    $('#shifttypedate').hide();
  }
  else
  {
  $('#shifttypedate').show(); 
  }
   ts=$(this).data('timein');
  ts1=$(this).data('timeout');
      setTimeout(function(){  
        $('.timepicker').timepicker({
        defaultTime: ts,
        //timeFormat: 'H:i',
                          });
   $('.timepicker1').timepicker({
        //timeFormat: 'H:i',
        defaultTime: ts1,
      });
      }, 1000);
      
  var dateSelected=$(this).data('date');  
  $(".datepicker").datepicker
    ({
    "minDate": dateSelected ,
    "maxDate": "+0d",
    "dateFormat": 'yy-mm-dd'
    });
    });
});
</script>
  <script>
  $(document).ready(function(){
   $(document).on("click", ".editATT", function () 
  {
    $('#id').val($(this).data('id'));
    $('#timeOutE').val($(this).data('timeout'));
    $('#attDateE').val($(this).data('date'));
    $('#shifttype').val($(this).data('shifttype'));
  
  if($(this).data('shifttype')==1)
  {
    $('#shifttypedate').hide();
  }
  else
  {
  $('#shifttypedate').show(); 
  }
   
  
     
  ss=$(this).data('timeout');
      setTimeout(function(){ 
   $('.timepicker2').timepicker({
        defaultTime: ss,
      });
      },1000);  
      
      
  var dateSelected=$(this).data('date');  
  
  $(".datepicker").datepicker
    ({
    "minDate": dateSelected ,
    "maxDate": "+0d",
     "dateFormat": 'yy-mm-dd'
    });
    });
  });
  </script> 
  <script>
    $(document).ready(function(){
    $('.toggle-sidebar').click(function(){
    $("#sidebar").toggleClass("collapsed t2");
    $("#content").toggleClass("col-md-9");
    $("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'notsynced'}); 
    });
    
    });
  </script>

</html>