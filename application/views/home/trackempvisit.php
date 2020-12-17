<!doctype html>
<html lang="en">
   <head>
       <?php 
         $this->load->view('menubar/allnewcss');
         ?>
      <style>
         .red{
         color:red;
         font-weight:'bold';
         font-size:16px;
         }
         .delete{
         cursor:pointer;
         }
         td{
         // width: 7%!important;
         ///text-align: center!important;
         max-width:250px;
         word-wrap:break-word;
         }
         #content {
         -webkit-transition: width 0.3s ease;
         -moz-transition: width 0.3s ease;
         -o-transition: width 0.3s ease;
         transition: width 0.3s ease;
         }
         #content .btn-group {
         margin-bottom: 10px;
         }
         .col-md-9 .width-12,
         .col-md-12 .width-9 {
         display: none; /* just hiding labels for demo purposes */
         }
         #sidebar {
         -webkit-transition: margin 0.3s ease;
         -moz-transition: margin 0.3s ease;
         -o-transition: margin 0.3s ease;
         transition: margin 0.3s ease;
         }
         .collapsed {
         display: none; /* hide it for small displays */
         }
         @media (min-width: 992px) {
         .collapsed {
         display: block;
         margin-right: -25%; /* same width as sidebar */
         }
         }
         .t2{display:none;}
         .card .table tfoot tr:first-child td {
         border-top: 1px solid black !important;
         }
      </style>
      <style>
         html,
         body {
         height: 100%;
         margin: 0;
         padding: 0;
         line-height: 1.5;
         }
         #map {
         height: 500px;
         width:600px;
         }
         a {
         text-decoration: none;
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
         body
         {
         font-family: 'Poppins',sans-serif;
         font-size: 14px;
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
         .secondary-text{
            font-size: 18px;
    font-weight: 600;
    font-style: normal;
    font-family: 'Poppins';
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
          <?php 
		  $data['pageid']=5.5;
   $this->load->view('menubar/sidebar',$data);
   $this->load->view('menubar/navbar');
   ?>
            <div class="main"  style="width: 83.5%;">

               <div class="container-fluid" style="padding: 0px;">
            <div class="row">
               
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  
                 <div class="primary-text"> <a href="<?php echo URL; ?>Clientsettings/clientlist" >
			   <img src="<?= URL ?>../assets/img/l-arrow.png" class="mb-1"></a>&nbsp Visits of the Day for</div>
                  <div class="secondary-text"><?php echo $name?></div>
               
                  
               </div>
            </div>
           
         </div>
         <br><br>
              
            <div class="content" id="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                          <!--  <div class="card-header" data-background-color="green">
                              <h4 class="title">Visits of the Day for <?php echo $name?></h4>
                             
                           </div> -->
                           <div class="card-content">
                              <div id="typography">
                                 <div class="title">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <!--<p><?php echo ' Visits by: <b>'.$name.'&nbsp; ('.$desg.')</b>'?></p>
										  <p><?php echo 'Department: <b>'.$dept.'</b>'?></p>
                                          <p><?php echo 'Visited Date: <b>' .date("d-m-Y", strtotime($date)).'</b> &nbsp; MB: <b>VC'.$rowId.'</b>'; ?></p>-->
										  
										  
                                       </div>
                                       <div class="col-md-6">
                                          <!--<div class="row">
                                             <div class="col-md-4">
                                                <p> Time In:  <?php echo $timein; ?></p>
                                             </div>
                                             <div class="col-md-4">
                                                <p> Time Out:  <?php echo $timeout; ?> </p>
                                             </div>
                                             <div class="col-md-4">
                                                <p> Total Hours:  <?php echo $workhours; ?> </p>
                                             </div>
                                             <div class="col-md-4">
                                                <p> ODO Start:  <?php
												echo $odostart; ?> </p>
                                             </div>
											 
                                             <div class="col-md-4">
                                                <p> ODO End:  <?php echo $odoend; ?> </p>
                                             </div>
											 <div class="col-md-4">
                                                <p> Total Miles:  <?php if($odoend==0){
													echo $mil=0;
												} else{
													echo $mil=($odoend-$odostart);
												} ?> </p>
                                             </div>
                                             <div class="col-md-4">
                                                <p> Tractor No:  <?php echo $tracno; ?> </p>
                                             </div>
                                          </div>-->
                                       </div>
                                       <!--
                                          <a rel="tooltip"  data-placement="bottom" title="Help" class="btn btn-success btn-sm pull-right toggle-sidebar">
                                         
                                          <i class="fa fa-question"></i></a> -->
                                    </div>
                                    <?php //print_r($detail);?>
                                    <div class="row" >
                                       
                                       
                                       <div id="map"  class="col-sm-12" style="height:500px; margin-top:0px;"  >
									   
									   
                                       </div>
                                    </div>
                                 </div>
                                 
								
								
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
       
             <table id="example" class="display table mt-5"  style="width:100%; height:50%" >
                                          <thead>
                                             <tr>
                                                <th width='10%'><b>Client</b></th>
                                                
												
                                                <th><b>Visit In</b></th>
                                                
                                                <th><b>Visit In Location</b></th>
                                                <th><b>Visit Out</b></th>
                                                
                                                <th><b>Visit Out Location</b></th>
                                                <th><b>Visit Hours</b></th>
                                               
                                                
                                                <th><b>Remarks Out</b></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                             
                                                ?>
                                             <?php
                                                
                                               
                                                $i=1;
                                               
                                               
                                              
                                               
                                               
                                                 for($i = 0;$i<count($detail);$i++){
                                               
                                               
                                               
                                                
                                               
                                              
												
												 
												
                                               
                                               
                                               
                                                 echo '<tr>
                                               
                                                <td>'.$detail[$i]['client_name'].'</td>
                                               
                                                
												
                                               
                                                <td>'.substr($detail[$i]['time'],0,5).'</td>
                                               
                                               
                                               
                                                
                                               
                                               
                                              
                                                <td><a href="http://maps.google.com/?q='.$detail[$i]['latit'].','.$detail[$i]['longi'].'" target="_blank" title="Click here to point location on google map" >'.$detail[$i]['location'].'</a></td>
                                               
                                                <td>'.substr($detail[$i]['time_out'],0,5).'</td>
												
												
												
                                               
                                               
                                               
                                                
                                               
                                               
                                               
                                                <td><a href="http://maps.google.com/?q='.$detail[$i]['latit_out'].','.$detail[$i]['longi_out'].'" target="_blank" title="Click here to point location on google map" >'.$detail[$i]['location_out'].'</a></td>
                                               
                                                
                                               
                                               
                                               
                                                
                                               
                                                
                                                
												
                                               
                                               <td>'.$detail[$i]['total'].'</td>
                                               
                                                <td>'.$detail[$i]['description'].'</td>
                                               
                                               
                                               
                                                </tr>'; 
                                               
                                                }
                                               
                                                ?>
                                          </tbody>
                                       
                                       </table>
            
         </div>

      </div>
   </div>
      <!------Edit attendance modal start------------>
      <div id="addAttE" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
                  <h4 class="modal-title" id="title">Update Attendance</h4>
               </div>
               <div class="modal-body">
                  <form id="AttFrom">
                     <input type="hidden" id="id" />
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label>Name</label>
                              <input type="text" readonly='true' placeholder="Employee Name"  id="attNameE" class="form-control" >
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label>Date</label>
                              <input placeholder="Attendance Date" readonly='true' type="text" id="attDateE"  class="form-control" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label class="control-label">Shift</label>
                              <select class="form-control" id="shiftE" >
                              <?php
                                 $data= json_decode(getAllShift($_SESSION['orgid']));
                                 
                                 for($i=0;$i<count($data);$i++)
                                 
                                  echo '<option value='.$data[$i]->id.'>'.$data[$i]->name.'</option>';
                                 
                                 ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label class="control-label">Status</label>
                              <select class="form-control" id="statusE" >
                                 <option value='1'>Present</option>
                                 <option value='0'>Absent</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label>Time In</label>
                              <input type="text" placeholder="Time In" id="timeInE"  class="form-control timepicker">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label>Time Out</label>
                              <input type="text" placeholder="Time Out" id="timeOutE"   class="form-control timepicker" >
                           </div>
                        </div>
                     </div>
                     <div class="row">
                     </div>
                     <div class="clearfix"></div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" id="saveE"  class="btn btn-success">Update</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!------image modal----->
      <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
         <div class="modal-dialog">
            <div class="modal-content" style="height: 50%;width: 55%;margin-left: 140px;">
               <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" style="color:black"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <img src="" class="imagepreview"  style="width:100%!important;" >
               </div>
            </div>
         </div>
      </div>
      <!----------->
      <!------Edit attendance modal close------------>
      <!-----delete attendance start--->
      <div id="delAtt" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                  <h4 class="modal-title" id="title">Delete Attendance</h4>
               </div>
               <div class="modal-body">
                  <form>
                     <input type="hidden" id="del_aid" />
                     <div class="row">
                        <div class="col-md-12">
                           <h4>Are you sure want to delete <span id="ana"></span>'s Attendance  ?</h4>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" id="delete"  class="btn btn-danger">Delete</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
 
 <?php echo $orgid;
  echo $eid;
 ?>
   </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
      <script src="<?= URL ?>../assets/js/navbar.js"></script>
      <!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
      <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
      <script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
      <script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
       <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   <script>
      $(document).ready(function(){
		  
		  var name = '<?php echo $name;?>';
		 
		  var time = '<?php echo $timein;?>';
     
     
     
     
      $('.toggle-sidebar').click(function(){
     
      $("#sidebar").toggleClass("collapsed t2");
     
      $("#content").toggleClass("col-md-9");
     
      $("#sidebar").load('<?=URL?>admin/helpNav',{'pageid': 'attendanceH'});
     
      });
     
      $(document).on("click", ".pop", function ()
     
      {
     
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
     
      $('#imagemodal').modal('show');  
     
      });



      var dataVisits = <?php echo json_encode($detail);  ?>;
     
     
      console.log(dataVisits);
      var config = {
        apiKey: "AIzaSyDX9yqBBNRYnYQmyPydBTxpoJeij2p7jDk",
        authDomain: "ubisales.firebaseapp.com",
        databaseURL: "https://ubisales.firebaseio.com/",
        projectId: "ubisales",    
     
       
      };
     
      console.log(config);
     
     
     
     
     
     
      var flightPlanCoordinates = [];
     
      firebase.initializeApp(config);
      var database = firebase.database();
       
      var keys,data;
     
      console.log(database);
      
	  firebase.database().ref('/Locations/<?php echo $orgid ?>/<?php echo $eid ?>/<?php echo $date ?>').once('value').then(function(snapshot) {
		 
      data = (snapshot.val()) ;
      console.log(data);
 if(data!=undefined || data!=null){
      keys=Object.keys(data);
      for(var i=0;i<keys.length;i++){
      flightPlanCoordinates.push({lat: parseFloat(data[keys[i]].latitude), lng: parseFloat(data[keys[i]].longitude)});
      }
        flightPath = new google.maps.Polyline({
              path: flightPlanCoordinates,
              geodesic: true,
              strokeColor: '#FF0000',
              strokeOpacity: 1.0,
              strokeWeight: 2
            });
     
      flightPath.setMap(map);
     
      const center = new google.maps.LatLng(parseFloat(data[keys[keys.length-1]].latitude), parseFloat(data[keys[keys.length-1]].longitude));
      
	  
	  const centerhome = new google.maps.LatLng(parseFloat(data[keys[0]].latitude), parseFloat(data[keys[0]].longitude));
        // using global variable:
		
		
		 var endMarker = new google.maps.Marker({
            position: center,
            map: map,
            icon: 'http://ubiattendance.zentylpro.com/assets/images/icons8-user-location-40.png'
			//zoom:.8
        });
		
		var startMarker = new google.maps.Marker({
            position: centerhome,
            map: map,
            //icon: 'http://www.robotwoods.com/dev/misc/bluecircle.png'
            icon: 'http://ubiattendance.zentylpro.com/assets/images/icons8-home-address-48.png',
			
            
        });

 
        window.map.panTo(center);
		
		endMarker.setMap(map);
		startMarker.setMap(map);

 }
for(var k=0; k<dataVisits.length; k++){
	
	
	
	
	
var center1=new google.maps.LatLng(parseFloat(dataVisits[k].latit),parseFloat(dataVisits[k].longi) );
 
       
        /* var marker = new google.maps.Marker({
			position: center1,
			icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+(k+1)+'|FE6256|000000'
		}); */
		
		
		var marker = new google.maps.Marker({
			position: center1,
			//icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/parking_lot_maps.png'
			
			label: {
			text: ""+(k+1),
			//text: "10000",
			color: "white",
			fontWeight: "bold"
		
		},
			icon: {
				path: google.maps.SymbolPath.CIRCLE,
				scale: 25,
				fillColor: "#3349FF",
				fillOpacity: 1,
				strokeWeight: 7,
				strokeColor:"white",
				strokeOpacity:.8
				
			}
		});
//console.log(marker);
//console.log(center1);

 window.map.panTo(center1);

 
      var contentString =
                    '<div style="padding:2px;width:240px;background-color:white;box-shadow(0px 0px 5px rgba(129,129,129,0.2)) ">' +
                    '<b>Name:</b> ' +dataVisits[k].client_name +'<br/>'+
'<b>Location:</b> ' +dataVisits[k].location +'<br/>'+
'<b>Time:</b> ' +dataVisits[k].time +'-'+ dataVisits[k].time_out+'<br/>'+
'<b>Description:</b> '+dataVisits[k].description +'<br/>'+
                    '</div>';
     


	console.log(contentString.length)
	var infowindow = new google.maps.InfoWindow({
		  content:contentString
		  });  
	 marker.infowindow = infowindow;
		  marker.addListener('click', function() {
	return this.infowindow.open(map, this);
	})
 
 /*
      google.maps.event.addListener(marker, 'click', function() {
      this.infowindow.open(map,this);
      });
*/
marker.setMap(map);
     

}


//for(var j=0; j<contentString.length; j++){



     
      });
 
 
 
     
     
     
     
     
     
     
     
      });
      console.log('shhh');
     var generateIconCache = {};

function generateIcon(number, callback) {
  if (generateIconCache[number] !== undefined) {
    callback(generateIconCache[number]);
  }

  var fontSize = 16,
    imageWidth = imageHeight = 35;

  if (number >= 1000) {
    fontSize = 10;
    imageWidth = imageHeight = 55;
  } else if (number < 1000 && number > 100) {
    fontSize = 14;
    imageWidth = imageHeight = 45;
  }

  var svg = d3.select(document.createElement('div')).append('svg')
    .attr('viewBox', '0 0 54.4 54.4')
    .append('g')

  var circles = svg.append('circle')
    .attr('cx', '27.2')
    .attr('cy', '27.2')
    .attr('r', '21.2')
    .style('fill', '#2063C6');

  var path = svg.append('path')
    .attr('d', 'M27.2,0C12.2,0,0,12.2,0,27.2s12.2,27.2,27.2,27.2s27.2-12.2,27.2-27.2S42.2,0,27.2,0z M6,27.2 C6,15.5,15.5,6,27.2,6s21.2,9.5,21.2,21.2c0,11.7-9.5,21.2-21.2,21.2S6,38.9,6,27.2z')
    .attr('fill', '#FFFFFF');

  var text = svg.append('text')
    .attr('dx', 27)
    .attr('dy', 32)
    .attr('text-anchor', 'middle')
    .attr('style', 'font-size:' + fontSize + 'px; fill: #FFFFFF; font-family: Arial, Verdana; font-weight: bold')
    .text(number);

  var svgNode = svg.node().parentNode.cloneNode(true),
    image = new Image();

  d3.select(svgNode).select('clippath').remove();

  var xmlSource = (new XMLSerializer()).serializeToString(svgNode);

  image.onload = (function(imageWidth, imageHeight) {
    var canvas = document.createElement('canvas'),
      context = canvas.getContext('2d'),
      dataURL;

    d3.select(canvas)
      .attr('width', imageWidth)
      .attr('height', imageHeight);

    context.drawImage(image, 0, 0, imageWidth, imageHeight);

    dataURL = canvas.toDataURL();
    generateIconCache[number] = dataURL;

    callback(dataURL);
  }).bind(this, imageWidth, imageHeight);

  image.src = 'data:image/svg+xml;base64,' + btoa(encodeURIComponent(xmlSource).replace(/%([0-9A-F]{2})/g, function(match, p1) {
    return String.fromCharCode('0x' + p1);
  }));
}
     
     
   </script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-database.js"></script>
  
   <script type="text/javascript">
      var map,flightPath;
        function initMap() {
         
         
              map = new google.maps.Map(document.getElementById('map'), {
               zoom: 15,
               center: {lat: 27.4543333, lng: 78.7272722},
       
               mapTypeId: 'terrain'
       
       
             });
     
     
     
     
        }
		
		

     
     
     
   </script>
   <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&callback=initMap"></script>
	  
	  
</html>