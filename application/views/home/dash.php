
<!DOCTYPE html>
<html>
<head>
	 <?php 
         $this->load->view('menubar/allnewcss');
         ?>
	<title>Dashboard</title>
	<style type="text/css">
	
h5.btn {

     
font-size: 20px;
font-weight:900;
color: #000000;
}
 

.btn {
  height: 150px;
  width: 230px;
display: inline-block;
   border-radius: 15px;
  border: 1px solid #FFFFFF;
  margin-top: 20%;
   transition: .5s ease;
  cursor: pointer;

}
#present{
 
  border-color:  #afff96;
  background-color:  #f2fff2;
   
}
#absent{
  border-color:  #ff9090;
  background-color:#fff3f3;
}
#late{
 
 border-color:   #7ad9ff;
  background-color: #f1fbff;
}
#leaves{
 
  border-color:  #ff93ff;
  background-color:#fff0ff;
}




.active, hover.btn {
   border: 3px solid ;
}

@media screen and (max-width: 1024px) and(min-width: ){
  .btn{
    height:120px;
    width:190px;
    display: inline-block;
   border-radius: 10px;
  }
}
@media screen and (max-width: 420px){
  .btn{
    height:90px;
    width:160px;
    display: inline-block;
   border-radius: 6px;
  }
}
a:hover {
  text-decoration: none;
}
		
        .a{
        text-decoration: none;
        color: black;
        font-size: 1rem;
        font-weight: 700;
        
        }

       
        body
        {
        font-family: 'Poppins', sans-serif;
        font-size: 14px!important;
        }


        .attat {
          margin: 0;
          background: linear-gradient(45deg, #49a09d, #5f2c82);
          font-weight: 100;
          }

     

      table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        margin-left:80%;
        margin-top:50%;
      }

      th,
      td {
        padding: 15px;
        background-color: white;
        color: Black;
      }

      

    

      table.dataTable {
    
    margin-left: 0rem !important;
   

      
}
		
	</style>
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
</head>
<body>
	 <?php 
         $data['pageid']=1;
		 
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
    <main class="main">
	<hr>
 
	
 
  
  <div id="myDIV">
  <div class="row">
  	
  	<div class="col-xs-3"> 
   <div class="btn active" id="present"  style="margin-left: 8%;">
 <a href="#" style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight: 500;">Present</h5><h4 style="font-weight: 500;"><?php if(isset($presentE)){echo$presentE;}else{echo 0;}?></h4></a> 
   </div>
</div>

    <div class="col-xs-3" >
   
     
   <div class="btn " id="absent" style="margin-left: 29%;">
 <a href="#"  style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight: 500;">Absent</h5><h4 style="font-weight: 500;"><?php if(isset($absent)){echo  $absent;}else{echo 0;} ?></h4></a>
   </div>
 
   </div>

   

   <div class="col-xs-3">
   <div class="btn"  id="leaves" style="margin-left:50%;">
<a href="#" style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight: 500;">Leave</h5><h4 style="font-weight: 500;"><?php if(isset($leaves)){echo ($leaves); }else{echo 0;} ?></h4></a>
   </div>
</div>


   
  	<div class="col-xs-3">
   <div class="btn" id="late" style="margin-left:71%;">
  <a href="#" style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight:500;">Late Commer</h5><h4 style="font-weight: 500;"><?php if(isset($LateEmployee)){echo ($LateEmployee); }else{echo 0;} ?></h4></a>
   </div>
</div>
 
  
</div>
</div>
<div>
<h3 style="margin-top:11%; color:grey; font-weight:500; font-size:180%;">Activities</h3>
<div class="contar1">
<table id="example" class="table" style="width:100%;">
            <thead>
               <tr>
                  <th style="width:50%;">Activities</th>
                  <th style="width:20%;" >Module</th>
                  <th style="width:20%;">Date & Time</th>
               </tr>
            </thead>
         </table> 
</div>
<h3 style="color:grey; text-align:center; font-weight:500; font-size:100%;"><a style="color:black" href="<?php echo URL;?>settings/activity">More.....</a></h3>
</div>

</main>
   
   
<?php 
         $this->load->view('menubar/allnewjs');
         ?>



 <script type="text/javascript">
 
	
 
	 var thirtydays  = '<?=$thirtydays ?>';
	 
	 var dataPoints = [];
    var dailyAttendance = '<?=$DailyabsentAttendance?>';
    var dailyAttendance = JSON.parse(dailyAttendance);
    for(var i=0; i<dailyAttendance.length; i++){
	 dataPoints.push({label: dailyAttendance[i].label, y: parseInt(dailyAttendance[i].y)});
}

console.log(dataPoints);
console.log(dailyAttendance);

	 var thirtydays  = JSON.parse(thirtydays);
	 console.log(thirtydays);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		 
		  
        var data = google.visualization.arrayToDataTable([
         ['Year', 'Sales'],
		 [dataPoints[i].label,  dataPoints[i].y],
		 
		 
          
          
        ]);

        var options = {
         
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

       
	  
	   chart.draw(data, options);
      }
    </script>

<script>

var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

</script>
<script>
var minDate = moment();
      var start = moment().subtract(0, 'days');
      var end = moment().subtract(0, 'days');
      function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      }
      $('#reportrange').daterangepicker({
        maxDate:minDate,
		//singleDatePicker: true,
        //minDate:'-4M',
         minDate : moment().subtract(4 , 'month').startOf('month'),
        startDate: start,
        endDate: end,
        ranges:{
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
           'Last 30 Days': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
</script>



<script>
         $(document).ready(function() {
              var org = '<?php echo getOrgName($_SESSION['orgid']) ?>';
           var datestring="&date=";
           var date = new Date();
           date.setMinutes(0);
           date.setSeconds(0);
           date.setMilliseconds(0);
           
           var isoDateString = date.toISOString().substring(0,10);
               var table = $('#example').DataTable({
                "paging": false,
                "bInfo" : false,
                "scrollX": false,
                "ordering": false,
                "searching": false,
          
                  "contentType": "application/json",
                  "ajax": "<?php echo URL; ?>Dashboard/getallactivity",
         
                              "columns": [
                                  {"data": "ActionPerformed"},
                                  {"data": "Module"},
                                  // {"data": "LastModifiedById"},
                                  {"data": "LastModifiedDate"},
                              ]
                          });
       
                        });
                      
         
      </script>
</body>

</html>