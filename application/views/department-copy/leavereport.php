<!doctype html>
<html lang="en">
  <head>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="<?=URL?>../assets/img/favicon.png" />
  <link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.css" />
  <link rel="stylesheet" href="<?=URL?>../assets/css/dataTables.tableTools.css" />
   <link href="<?=URL?>../assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Leave Balance</title>
  
    
     <!--  $query = $this->db->query("SELECT `Id`,  `Shift`  FROM ` EmployeeMaster`  WHERE OrganizationId=? AND `Id` Not IN(SELECT `EmployeeId` FROM `AttendanceMaster` ) ",array($orgid));  -->
     <style>
     div.wrapper
     {
      height:100%;
      overflow: hidden;
     }
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
	
	.uniqueClassName {
    text-align: center;
}
    </style>
  </head>
  <body >
    <div class="wrapper">
      <?php
        $data['pageid']=45.1;
        $this->load->view('department/sidebar',$data);
        ?>
      <div class="main-panel">
        <?php
          $this->load->view('department/navbar');
          ?>

            

        <div class="content" id="content" style="" >
          <br>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="green" >
                  <!--  <h4 class="title">Attendance</h4> -->
                    <p class="category" style="color:#ffffff;font-size:17px;" >Leave Balance</p>
                    <!--<a rel="tooltip" style="position:relative;margin-top:-30px;"  data-placement="bottom" title="Help" class="btn btn-success btn-sm pull-right toggle-sidebar ">
                    <i class="fa fa-question"></i></a>-->
                  </div>
              <div class="card-content">
                 <!--<div class="row container-fluid" style="margin-top:0px;" >
                      
              <div class="col-sm-3 bargraph" style="margin-top:0px;" >
                      <div id="reportrange" class="pull-left" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 104%;">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                              <span></span> <b class="caret"></b>
                      </div>
              </div>
          
              <div class="col-sm-1">
                 <button class="btn btn-success pull-left" style="position:relative;margin-top:-3px;margin-left:5px;" id="getAtt" ><i class="fa fa-search"></i></button>
              </div>

                

              
              </div>-->
                    
            <br>


                        <div class="row" style="">
                          <table id="example" class="display table"  width="100%">
                            <thead>
                              <tr style="background-color:#008067;color:#ffffff;">
                                <th>Employees</th>
                                <th>DOJ</th>
                                <!-- <th>Entitled</th> -->
                                <th>Entitled</th>
                                <th>Utilized</th>
                                <th>Balance</th>
                                
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
       
        <footer class="footer">
          <div class="container-fluid" style="" >
            <nav class="pull-left">
            </nav>
           
      <a href="http://www.ubitechsolutions.com/" target="_blank" >
          <p class="copyright pull-right" style="padding-right:25px;padding-top:0px" >
          Copyright &copy;<script>document.write(new Date().getFullYear())</script>
          Ubitech Solutions. All rights reserved.
          </p>
        </a>
          </div>
        </footer>
      </div>
    </div>
  
   
  </body>
  <!--<script type="text/javascript" src="<?=URL?>../assets/js/inspect.js"></script>-->
  <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
  <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
  
  <script type="text/javascript">
  
  var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
  var datestring="&date=";
  var date = new Date();
  date.setMinutes(0);
  date.setSeconds(0);
  date.setMilliseconds(0);
  var isoDateString = date.toISOString().substring(0,10);
   $(document).ready(function() {
    
    var table= $('#example').DataTable( {


    
  order: [[0, "asc"],[2, "desc"]],
  //aaSorting: [],
    //"scrollX": true,
    dom: 'Bfrtip',
  
    //"bDestroy": true, // destroy data table before reinitializing
    buttons: [
    'pageLength',{
          extend: 'csv',
          exportOptions: {
          columns: [0,1,2,3,4]}
      },
          {
            extend: 'excel',
            //title : 'hourly pay',
            exportOptions: {
            columns: [0,1,2,3,4 ]}
          },'copy',
      {
            extend: 'print',
            // autoPrint: false,
            title: '',
            exportOptions: {
                columns: ':visible',
                columns: [ 0, 1, 2, 3,4],
                stripHtml: false,
            },
            repeatingHead:{
               logo: '<?=URL?>../assets/img/newlogo.png',
               logoPosition: 'center',
                logoStyle: 'height:100px;width:130px;',
                title: 'Leave report of '+org+' Dated '+isoDateString+'',
                
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
      //"columns":':not(:last-child)',
    }
    ],

  columnDefs: [
    {
        //targets: -1,
        className: 'dt-body-right'
    }
  ],
    "columnDefs": [
    { "visible": false, "targets": [] }
    
    ],
   
  
    //columnDefs: [ { orderable: false, targets: [5]}],
    "contentType": "application/json",
    "ajax": "<?php echo URL;?>departmenthead/getleavereport",
    

    "columns": [
    { "data": "name" },
    { "data": "doj" },
    // { "data": "entitledleave",className: "uniqueClassName" }, 
    { "data": "allocated",className: "uniqueClassName" }, 
    { "data": "utilized",className: "uniqueClassName" },
    { "data": "balanceleave",className: "uniqueClassName" },
    
   
    ],
   /*  "drawCallback": function ( settings ) {
    var api = this.api();
    var rows = api.rows( {page:'current'} ).nodes();
    var last=null;
    
    api.column(2, {page:'current'} ).data().each( function ( group, i ) {
      if ( last !== group ) {
        $(rows).eq( i ).before(
          '<tr class="group"><td bgcolor="#d59ff2" colspan=16><b>'+group+'</b><b> &nbsp; &nbsp;  </b></td></tr>'
        );
        last = group;
      }
    });
    } */
    });
   

         
   
    
    
    
    
    });
  </script>
  


  


  <script>
    $(document).ready(function(){
    $('.toggle-sidebar').click(function(){
    $("#sidebar").toggleClass("collapsed t2");
    $("#content").toggleClass("col-md-9");
    $("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'hourlypay'});  
    });
    
    });
  </script>
</html>