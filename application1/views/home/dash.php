
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 
<link rel="stylesheet" href="<?=URL;?>../assets/scss/style.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300%7CMaterial+Icons' rel='stylesheet' type='text/css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
	<title>Dashboard</title>
	<style type="text/css">
		
		 .thick{	 	
 
  margin-top: 5%;


		 }
     #data{
      padding-left: 1%;
    color:#9FA2B4;
    font-size: 15px;
line-height: 16px;
letter-spacing: 0.1px 


     }
     #button{




/* identical to box height */

text-align: center;
color: #000000;
   
     }
		  b.thicker {
  font-weight: 900;
  font-size: 85%;
 
 
}

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
#early{
 
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
.btn:hover{
 
}


.rect {
  height: 27px;
  width: 123px;

   border-radius: 5px;
  border: 1px solid #D3D3D3;
  float: right;
  margin-top: 2px;

}

  @media screen and (max-width: 480px) {
    b.thicker{
        margin-left:3%;
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

       
        body
        {
        font-family: 'Poppins',sans-serif;
        font-size: 14px;
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
	<div class="data">
  <div class="row">
      <div class="col-8 col-md-8">
         <h3><b class="thicker"> Dashboard</b></h3>

      </div>
  </div>
  <div id="myDIV">
  <div class="row">
  	
  	<div class="col-xs-3"> 
   <div class="btn active" id="present"  style="margin-left: 8%;">
 <a href="#" style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight: 600;">Present</h5><h4 style="font-weight: 600;"><?php if(isset($presentE)){echo$presentE;}else{echo 0;}?></h4></a> 
   </div>
</div>

    <div class="col-xs-3" >
   
     
   <div class="btn " id="absent" style="margin-left: 29%;">
 <a href="#"  style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight: 600;">Absent</h5><h4 style="font-weight: 600;"><?php if(isset($absent)){echo  $absent;}else{echo 0;} ?></h4></a>
   </div>
 
   </div>
   
  	<div class="col-xs-3">
   <div class="btn" id="late" style="margin-left:50%;">
  <a href="#" style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight:600;">Late Commer</h5><h4 style="font-weight: 600;"><?php if(isset($LateEmployee)){echo ($LateEmployee); }else{echo 0;} ?></h4></a>
   </div>
</div>
 
  	<div class="col-xs-3">
   <div class="btn"  id="early" style="margin-left:71%;">
<a href="#" style="color: black; text-decoration: none;"><h5 style="margin-top: 19%; font-weight: 600;">Early Leaver</h5><h4 style="font-weight: 600;"><?php if(isset($earlyEmployee)){echo ($earlyEmployee); }else{echo 0;} ?></h4></a>
   </div>
</div>
</div>
</div>

 	<div class="thick">
      
         <h5 style="padding-left: 1%;"><b > Attendence Overview</b></h5>
         <p id="data">as of Last & Days, 09:41 PM</p>

      </div>
     
	 
   <!--<p style="font-size: 13px;"><b> &nbsp&nbspMarch 2020&nbsp&nbsp<i class="fa fa-calendar-o " aria-hidden="true" ></i></b></p>-->
   
   <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 16rem; position:relative;z-index: 9999;  bottom: 3.3rem;      right: 10px;">
   <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
   <span></span> <b class="caret"></b>
   </div>
  
   
				
 
<div id="curve_chart" style="width: 900px; height: 400px"  class=""></div>
   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
 <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
</div></main>



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

</body>
</html>