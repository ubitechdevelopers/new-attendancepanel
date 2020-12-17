<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link href="<?= URL ?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?=URL?>../assets/css/datepicker.css" />

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
            {font-size: 18px;
             color: #828282;
             display: flex;
             cursor: pointer;
             text-decoration: none;
             font-weight: 500!important;
             font-family: 'Poppins',sans-serif;
            }
            .right{
                float: right;
               margin-bottom: 5px;
               margin-right: 5px;
            }
            .bttn
            {
                width: 9rem;
                font-weight: 500;
                font-size: 14px;
                height: 2.5rem;
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
                padding-top: 2.1rem!important;
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
            @media only screen and (max-width: 568px) 
            {

                #myModal{
                    /*padding-left: 76px!important;*/
                    width: 22.4rem!important;
                }
            }
            .buttons-collection{
                border: none;
                position: relative;
               /* top: -4.6rem;*/
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
            #undefinedchecked
            {
                display: none;
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
    <body ng-app = "adminapp"  ng-controller="attroasterCtrl" ng-init="fetchtabledata();" >
        <?php 
         $data['pageid']=4.1;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar',$data);
         
         ?>
        <main class="main">
           
                <p>
                <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
                    <div class="row">

                   
					
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
                         <select id="deprt1" class="form-control " onchange="myFunction()">
               <option value="0">-Select Report-</option>
               <option value="1">Today's Summary</option>
               <option value="2">Yesterday's Summary</option>
               <option value="3">Weekly Summary</option>
               <option value="4">Outside the Fence</option>
               
               </select>


                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        


                    </div>
                </div>
               
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row" style="margin-left: 0px;">
                                <span > <a href="<?= URL; ?>Report/" class="subhead">Employees Wise Summary</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                <span class="active5"><a href="<?= URL; ?>Report/" class="subhead">Monthly Register</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-left: 22.3rem;">
                            <div class="row" style="margin: 0px; padding: 0px; ">

                        <a class="tertiary-button" download="Monthlyreport.xls" href="#" onclick="return ExcellentExport.excel(this,'example','Monthly Report');" class="dt-button buttons-excel buttons-html5" ><div> <span class="side-item-icon" > <img src="<?= URL ?>../assets/icons/download.svg" alt=""> </span>Excel</div></a>

                    <button class="tertiary-button" data-toggle="modal"  data-target="#filtermodal">
                         <div> <span class="side-item-icon" ><img src="<?=URL?>../assets/icons/filter.svg" alt=""> </span> Filter </div>
                      </button>
                  </div>
                    </div>
                    </div>
                </div>
            </p>
                <!--  -->

            

            <br><br>
			
			
			<div class="row" style="width: 68.5rem">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="scrolling outer" style="overflow-x:scroll;height:450px;" >
        <div class="inner" ng-show="!hastrue">
          <table class="table table-striped table-hover  " id="example" >
            <tr>
              
              <th class="name" style="padding-top:40px;padding-left:20px;" >Code</th>
              <th class="name" style="padding-top:40px;padding-left:20px;" >Name</th>
              <th class="name" style="padding-top:40px;padding-left:20px;" >Designation</th>
              <th  ng-repeat="a in dates track by $index">{{a}}</th>
            </tr>
		    <tr ng-repeat = "a in records track by $index">
					
					<td class="name" >{{a.empcode}}</td>
					<td class="name" >{{a.name}}</td>
					<td class="name" >{{a.desg}}</td>
					<td ng-repeat = "x in a.sts track by $index" >{{x}}</td>
			</tr>
		 
          </table>
        </div>
		<div style="padding-top:10%;" ng-show="hastrue" >
		 <center> 
		 <img src = "<?=URL?>../assets/loaderimage.gif" alt="Loading....." style="width:100px;height:100px;" ></img>
		 </center>
	   </div>
      </div>
    </div>				  
  </div>
           
            <?php  $this->load->view('menubar/footer');?>
        </main>

       <!--------Attendance date range filter modal start----------->
      <div class="modal fade" id="filtermodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title"><a class="a" href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Filter</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form role="form1" >
                  <div class="modal-body">
               <form>
               <div class="form-group row">
               <label for="inputPassword" class="col-sm-4 col-form-label">Date</label>
               <div class="col-sm-8">
               <div class="input-group-prepend ">
                <input id="revenuedate" class="datepicker form-control" type="Text" value="<?php echo date('F-Y'); ?>" data-date-autoclose="true" style="border-radius:7px 0px 0px 7px" />
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
               <select id="empl"  class="form-control ">
               <option value="0">-Select Employee-</option>
               <?php
                  $data= json_decode(getAllemp($_SESSION['orgid']));
                  for($i=0;$i<count($data);$i++){
                    echo '<option  value='.$data[$i]->id.'>'.$data[$i]->FirstName.'  '.$data[$i]->LastName.'</option>';
                  }?>
               </select>
               </div>
               </div> 
               </form>
               <div class="row">
               <div class="col-lg-3">
               </div>
               <div class="col-lg-9"  style="text-align: end;">
               <div class="right">
               <button type="button" class="btn btn-light bttn fit " data-dismiss="modal">Cancel</button>
               <button type="button" id="getAtt" ng-click="filter()" class="btn btn-success bttn fit " data-dismiss="modal">Save</button>
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
	<script type="text/javascript" src="<?=URL?>../assets/js/angular.min.js"></script>
        <script type="text/javascript" src="<?=URL?>../assets/js/angular-datatables.min.js"></script>
		<script type="text/javascript" src="<?=URL?>../assets/js/attRoaster.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>
    <script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
        <script src="<?= URL ?>../assets/js/demo.js"></script>
        <!--my js-->
        <script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>
        
   <script data-require="angular-ui-bootstrap@0.3.0" data-semver="0.3.0" src="<?=URL?>../assets/js/ui-bootstrap-tpls-0.3.0.min.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
    <script type="text/javascript" src="<?=URL?>../assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?=URL?>../assets/js/bootstrap-datetimepicker.js"></script>
        <script src="<?=URL?>../assets/tabletoCSV/jquery.tabletoCSV.js"></script>
    <script src='<?php echo URL;?>../assets/js/excellentexport.js'></script>

   <script>
    $(function(){
        $("#export").click(function()
        {
            $("#example").tableToCSV();
        });   
        
         
   });
   
    
</script>
<script type="text/javascript">
        $(function() {
        $('#getAtt').click(function(){ 
            var range=$('#reportrange').text();

            var shift=$('#shift').val();
            var deprt=$('#deprt').val();
            //alert(deprt);
            var empl=$('#empl').val();
            var desg=$('#desg').val();
            var area=$('#area').val();
            // alert(deprt);
            // alert(desg);
            });
            
    function createpdf()
          {
            // console.log($val)
            var pdf = new jsPDF('p', 'pt', 'a3');
            var options = {
                     pagesplit: true,
                     background:'#fff'
                };
            
            pdf.addHTML($("#printsection")[0], options, function()
            {
                //console.log(pdf)  
                pdf.save("absent_report.pdf");
            });
          }
        
            $('#create_pdf').on('click',function(){
    $('body').scrollTop(0);
    createPDF();
  });
});
    
    
    </script>
    <script>
       $(".datepicker").datepicker( {
      
        startView: "months", 
        minViewMode: "months",
        format: "MM-yyyy",
        startDate: '-3m',
        endDate: '+0m',
        
        });
    </script>

 <script>

function myFunction() {
  var reportid=$('#deprt1').val();
  if(reportid==1){
      
      window.open('<?php '.URL.'?>getSummaryData/1', '_blank');
      
  }else if(reportid==2){
      window.open('<?php '.URL.'?>getSummaryData/2', '_blank');
      
      
  }else if(reportid==3){
      window.open('<?php '.URL.'?>getWeeklyAverageSummary/1', '_blank');
      
  }else if(reportid==4){
	  window.open('<?php '.URL.'?>attendanceOutsideThefencedArea/', '_blank');
      
  }
  
}

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

</html>