<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
      <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Live Tracking</title>
      <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet"/>-->
      <link rel="stylesheet" href="<?=URL?>../assets/css/buttons.dataTables.min.css" />
      <link rel="stylesheet" type="text/css" media="all" href="<?=URL?>../assets/css/daterangepicker.css" />
	   <link href="<?=URL?>../assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> 
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
      </style>
	  
	  <style>

.searchicon input { 
  font-family:  FontAwesome, sans-serif;
}

	  
	  </style>
   </head>
   <body >
      <div class="wrapper">
         <?php
		 
		 $query=$this->db->query("SELECT latit_in,longi_in FROM
		 AttendanceMaster WHERE OrganizationId=".$_SESSION['orgid']." AND latit_in!=(''||'0.0') AND longi_in!=(''||'0.0') LIMIT 1");
		 //$lat="";
		 //$long="";
		 foreach($query->result() as $row1 ){
			 $long=$row1->longi_in;
			 $lat=$row1->latit_in;
			
			}
            $data['pageid']=9.0010;
           
            $this->load->view('menubar/sidebar',$data);
           
            ?>
         <div class="main-panel">
            <?php
               $this->load->view('menubar/navbar');
               
               ?>
            </br>
            <div class="content" id="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header" data-background-color="green">
                              <h4 class="title">Live Location Tracking <?php echo $empname ?></h4>
                              <!-- <p class="category"> Visits List</p>-->
                           </div>
                           <div class="card-content">
                              <div id="typography">
                                 <div class="title">
                                   
						<div class="row">
						   <div class="col-md-8">
						   <div id="map" style="height:500px; margin-top:0px;"  >
						   <hr/>
						   
						   </div>
						   </div>
                    <div class="col-md-4">
					
					<div class="row">
					<div class="col-sm-12">
					<div class="col-sm-6" style="position: relative;right: 28px;">
					
					<!--<label for="search">Search: </label>-->
					<div class="searchicon">
  
                    <input type="text"  class="search innershadow" placeholder="&#xf002; Search..." style="border: 1px solid #acadaf; height: 35px" ></input>
					</div>
					</div>
					
					<div class="col-sm-6">				    				
				    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 6px; 10px; border: 1px solid #acadaf; width: 100%">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
					<span></span> <b class="caret"></b>
					</div>
					</div>

					</div>
					</div>
               <br>
               <div class='row'>
               <div class='col-md-12'>
               
               <select id='accuracy' onchange="myFunction()" style="width: 30rem;height: 36px;position: relative;right: 11px;">
               <option value='0'>----------Select Accuracy----------</option>
               <?php $data = array("30.0"=>"30","60.0"=>"60","80.0"=>"80","100.0"=>"100","200.0"=>"200","2000.0"=>"2000"); 
               
                  foreach($data as $key=>$value){
							if($key==$acc){
								echo '<option selected="selected" value='.$key.'>'.$value.'</option>';
							}else{
							echo '<option value='.$key.'>'.$value.'</option>';
                     }
                  }
                     
                     ?>
               </select>
               </div>
               </div>
				
									   <div class="row" style="overflow-y: auto;height: 50rem;">
									   
									   
										
										
									   
									   <table id="example" class="display table table-border table-striped"  width="100%"  >
										
                                          <thead>
										  
                                             <tr >
                                                <th width='10%'><b>Photo</b></th>
												<th width='100%'><b>Employee</b></th>
                                                
                                                
                                             </tr>
                                          </thead>
                                          <tbody>
                                             
                                             <?php
											 
											 if(count($livetrackemp)==0){
										echo '<tr><td></td><td style="     background-color: white;"><b>No Data Found<b></td></tr>';
										}
                                               
                                                $i=1;
                                               
                                               //var_dump($livetrackemp);
                                               
                                                 for($i = 0;$i<count($livetrackemp);$i++){
                                               
                                               
                                                 echo '<tr >
                                               
                                                <td>'.$livetrackemp[$i]['photo'].'</td>
												<td ><span style="font-weight:bold;">'.$livetrackemp[$i]['name'].'</span><br> <span style="font-size:11px;" id="emp'.$livetrackemp[$i]['empid'].'"></span></td>
                                               
                                                </tr>'; 
                                               
                                                }
                                               
                                                ?>
                                          </tbody>
                                        
                                       </table>
									   
									   
									   </div>
									   </div>
                                    </div>
                                 </div>
								 <hr/>
								 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 t2" id="sidebar" style=" margin-top:100px;">
            </div>
            <footer class="footer">
               <div class="container-fluid">
                  <nav class="pull-left">
                  </nav>
                  <p class="copyright pull-right">
                     &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Designed by</a> Ubitech Solutions Pvt. Ltd.
                  </p>
               </div>
            </footer>
         </div>
      </div>
    
      
 
 <?php  
  echo $eid; 
  echo $orgid;
  echo $date;
  echo 'shakir';
  echo $lat;
  echo $long;
  
 ?>
 
   </body>
   <!--<script type="text/javascript" src="<?=URL?>../assets/js/inspect.js"></script>-->
   
   <script src="<?=URL?>../assets/js/buttons.colVis.min.js"></script>
   <script src="<?=URL?>../assets/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/moment.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/daterangepicker.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/buttons.flash.min.js"></script>
   <script src="<?=URL?>../assets/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/jszip.min.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/buttons.html5.min.js"></script>
   <script type="text/javascript" src="<?=URL?>../assets/js/buttons.print.min.js"></script>
    
   <script type="text/javascript" src="<?=URL?>../assets/js/repeatheadeerprint.js"></script>
   
   

   <script>
    


   
   var alldata,allkeys;
   var currEmpId;
   var currentdate

  
    
   
      $(document).ready(function(){
		  
		  var dataVisits = <?php echo json_encode($detail);  ?>;
		  currentdate = '<?php echo $date; ?>';
		  var eids='<?php echo $eid?>';

        
		  
		  //alert(currentdate);
		  
		  //console.log(currentdate);
     //alert($('#content #typography #example #emp<?php echo $eid?>').attr("id"));
     $('#content #typography #example #emp<?php echo $eid?>').parent('td').parent("tr").css({
		 "background-color":"#499157",
		 
	 })
     
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



     
     
     
      //console.log(dataVisits);
      // var config = {
      //   apiKey: "AIzaSyDX9yqBBNRYnYQmyPydBTxpoJeij2p7jDk",
      //   authDomain: "ubisales.firebaseapp.com",
      //   databaseURL: "https://ubisales.firebaseio.com/",
      //   projectId: "ubisales",    
     
       
      // };


     var OrganizationId = '<?php echo $orgid?>'; 

     if(OrganizationId == 10932)
     {
      console.log("Welspun");
      //console.log(dataVisits);
      var config = {
        apiKey: "AIzaSyCmbtPK7uMT2rTytQFGOlmKo_yS3iuFkjs",
        authDomain: "welspun-app.firebaseapp.com",
        databaseURL: "https://welspun-app.firebaseio.com/",
        projectId: "welspun-app",    
       };
     }
     else
     {
      console.log("Organization");
      //console.log(dataVisits);
      var config = {
        apiKey: "AIzaSyDX9yqBBNRYnYQmyPydBTxpoJeij2p7jDk",
        authDomain: "ubisales.firebaseapp.com",
        databaseURL: "https://ubisales.firebaseio.com/",
        projectId: "ubisales",    
      };
     }  

      var accu = '<?php echo $acc; ?>';
      if(accu=='' || accu=='0'){
         accu='20.0';
      }else{

         accu = '<?php echo $acc; ?>';
      }
        console.log(accu);
     
      console.log(config);
     
     
     
     
     
     
      var flightPlanCoordinates = [];
     
      firebase.initializeApp(config);
      var database = firebase.database();
       
      var keys,data;
     
      //console.log(database);
	  
	  if('<?php echo $eid ?>'!='' && '<?php echo $eid ?>'!=0){
      
	  firebase.database().ref('/Locations/<?php echo $orgid ?>/<?php echo $eid ?>/<?php echo $date ?>').once('value').then(function(snapshot) {
		 
      data = (snapshot.val()) ;
      if(data==null){
		 doNotify('top','center',4,'No locations tracked');
		 return false;
	 } 
 if(data!=undefined || data!=null){
      keys=Object.keys(data);
	  
	  var start=0,end=0;
	  
      for(var i=0;i<keys.length;i++){
      //
	  if(parseFloat(data[keys[i]]['accuracy'])< accu){	
	  flightPlanCoordinates.push({lat: parseFloat(data[keys[i]].latitude), lng: parseFloat(data[keys[i]].longitude)});
      }
	  
	  
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
		
		
		var limit = 200;
		var counter11 = 1;
		console.log(limit);

     
		
		
		
		
		for(var s=0;s<keys.length;s++){
			
			var kilostart=parseFloat(data[keys[s]].odometer);
			var kiloend=parseFloat(data[keys[keys.length-1]].odometer);
			
			var kilomitters=kiloend-kilostart;
			console.log(kilomitters);
			console.log(keys[keys.length-1]+'helloshakir');
			
			//document.getElementById("kilom").innerHTML = kilomitters;
			
			
			
if(parseFloat(data[keys[s]]['accuracy'])< accu ){		 
//console.log(parseFloat(data[keys[s]]['accuracy'])<10.0);
		 end = data[keys[s]].odometer;
		  var center11 = new google.maps.LatLng(parseFloat(data[keys[s]].latitude), parseFloat(data[keys[s]].longitude));
		  //console.log(end);
		  //console.log(end-start > limit);
		  
		  if(end-start > limit){
			  //console.log(end-start);
			  var randomColor = Math.floor(Math.random()*16777215).toString(16);
  
  var randomColorBg = "#" + randomColor;
			  
			var pinter = new google.maps.Marker({
			position: center11,
			//icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/parking_lot_maps.png'
			
			label: {
			text: ""+(counter11),
			//text: "10000",
			color: "white",
			fontWeight: "bold",
			fontSize:"12"
		
		},
			icon: {
				path: google.maps.SymbolPath.CIRCLE,
				scale: 16,
				fillColor: randomColorBg,
				fillOpacity: 1,
				strokeWeight: 7,
				strokeColor:"white",
				strokeOpacity:.8
				
			}
		});
		
		start=end; 
		counter11++;
		pinter.setMap(map);
		
		
		var cont =''+keys[s];


	//console.log(cont.length)
	var infowindow = new google.maps.InfoWindow({
		  content:cont
		  });  
	 pinter.infowindow = infowindow;
		  pinter.addListener('click', function() {
	return this.infowindow.open(map, this);
	})



   
			  
		}
		
		}



      
      }

      
		
		
		
		
		 var endMarker = new google.maps.Marker({
            position: center,
            map: map,
            //icon: 'http://ubiattendance.zentylpro.com/assets/images/icons8-user-location-40.png'
            icon: '<?php echo URL1?>assets/images/location_pin_svg.svg'
			//zoom:.8
        });
		
		var startMarker = new google.maps.Marker({
            position: centerhome,
            map: map,
            //icon: 'http://www.robotwoods.com/dev/misc/bluecircle.png'
            icon: '<?php echo URL1?>assets/images/location_pin_svg2.svg',
			
            
        });

        var cont1 =''+keys[keys.length-1];


        var infowindow = new google.maps.InfoWindow({
		  content:cont1
		  });  
        endMarker.infowindow = infowindow;
		  endMarker.addListener('click', function(){
	return this.infowindow.open(map, this);
	})



   var cont11 =''+keys[0];


        var infowindow = new google.maps.InfoWindow({
		  content:cont11
		  });  
        startMarker.infowindow = infowindow;
		  startMarker.addListener('click', function() {
	return this.infowindow.open(map, this);
	})

 
       window.map.panTo(center);
		
		endMarker.setMap(map);
		startMarker.setMap(map);
		

 }
 for(var k=0; k<dataVisits.length; k++){
	
	
	
	
	
var center1=new google.maps.LatLng(parseFloat(dataVisits[k].latit),parseFloat(dataVisits[k].longi) );
 
       
       
		
		var marker = new google.maps.Marker({
			position: center1,
			
			
			label: {
			text: "V"+(k+1),
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


 window.map.panTo(center1);

 
      var contentString =
                    '<div style="padding:2px;width:240px;background-color:white;box-shadow(0px 0px 5px rgba(129,129,129,0.2)) ">' +
                    '<b>Client:</b> ' +dataVisits[k].client_name +'<br/>'+
'<b>Location:</b> ' +dataVisits[k].location +'<br/>'+
'<b>Time:</b> ' +dataVisits[k].time +'-'+ dataVisits[k].time_out+'<br/>'+
'<b>Description:</b> '+dataVisits[k].description +'<br/>'+
                    '</div>';
     


	//console.log(contentString.length)
	var infowindow = new google.maps.InfoWindow({
		  content:contentString
		  });  
	 marker.infowindow = infowindow;
		  marker.addListener('click', function() {
	return this.infowindow.open(map, this);
	})
 
 
marker.setMap(map);
     

}


//for(var j=0; j<contentString.length; j++){



     
      });
	  
	  }
	  
	  
	  
	  
	  var flightPlanCoordinates1 = [];
	  
	  firebase.database().ref('/Locations/<?php echo $orgid ?>').once('value').then(function(snapshot1) {
		 
      alldata = (snapshot1.val()) ;
      console.log(alldata);
      console.log('hello');
	  
      allkeys=Object.keys(alldata);
	  
	  
	
	if(alldata!=undefined || alldata!=null){
      
	 var createGeocodeCallback = function(n,eids){
    return function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
		  //alert(results[0].formatted_address);
        spanContent='<b style="font-size:11px;">Last known location:</b>'+results[0].formatted_address;
		//$('#content #typography #example #emp'+n).prepend(spanContent);
		$('#content #typography #example #emp'+eids).prepend(spanContent);
		//alert($('#content #typography #example tbody tr #emp'+currentEmployeeId).attr('id'));
		//alert(n);
		//alert('#content #typography #example tbody tr #emp'+currEmpId);
	 // alert(document.getElementById('#emp'+currentEmployeeId));
	   console.log('hi '+n+" "+abvde);
	   
	  }
        } 
    };
}
	  
	  
      //for(var m=0;m<allkeys.length;m++){
     // for(var m=0;m<eids.length;m++){
		 //alert(data);
		 if(eids!=0  && data!=null){
		  
		  //alert(eids);
		  //alert(m);
		  //var abcd=alldata[allkeys['4253']['2020-07-15'][0]]-alldata[allkeys['4253']['2020-07-15'][alldata[allkeys['4253']['2020-07-15'].length-1]]];
		  
		  
		  
      
	  //var currentEmployeeId=allkeys[m]+"";
	  var currentEmployeeId=eids;
	  //currEmpId=allkeys[m]+"";
	  if(alldata[currentEmployeeId][currentdate]!=undefined||alldata[currentEmployeeId][currentdate]!=null){
		  
	 var abvde =alldata[currentEmployeeId][currentdate][Object.keys(alldata[currentEmployeeId][currentdate])[Object.keys(alldata[currentEmployeeId][currentdate]).length-1]].odometer-alldata[currentEmployeeId][currentdate][Object.keys(alldata[currentEmployeeId][currentdate])[0]].odometer;
	 var lati=alldata[currentEmployeeId][currentdate][Object.keys(alldata[currentEmployeeId][currentdate])[Object.keys(alldata[currentEmployeeId][currentdate]).length-1]].latitude;
	 var longi=alldata[currentEmployeeId][currentdate][Object.keys(alldata[currentEmployeeId][currentdate])[Object.keys(alldata[currentEmployeeId][currentdate]).length-1]].longitude;
	 const latlng = {
		lat: parseFloat(lati),
		lng: parseFloat(longi)
	  };
	   
	  
	 var spanContent="";
	 
	 
	 
	 geocoder.geocode({ location: latlng }, createGeocodeCallback(currentEmployeeId,eids)); 
	 
	
	
	 
	 
	 if(abvde<0){
		abvde=0;
	 }
	 
	 spanContent+=  spanContent+" ("+(abvde/1000).toFixed(2)+" Kms"+")";
	 
	$('#emp'+currentEmployeeId).html(spanContent);
	  
	   console.log('hi '+currentEmployeeId+" "+abvde);
	   
	  }
	  
	  
	  
	  }
	  
       
		
 }
 






     
      });
 
 
 
     
     
     
     
     
     
     
     
      });
      console.log('shhh');
     
     
   </script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-database.js"></script>
   
  
   <script type="text/javascript">
     
      var map,flightPath,geocoder;
	  
	  var latti=<?php echo $lat ?>;
	  var longi=<?php echo $long ?>;
	 
	  
        function initMap() {
         
         
              map = new google.maps.Map(document.getElementById('map'), {
               zoom: 15,
               center: {lat: latti, lng: longi},
       
               mapTypeId: 'terrain'
       
       
             });
    geocoder = new google.maps.Geocoder();
     
     
     
        }
		
		

     
     
     
   </script>
   <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&callback=initMap"></script>
	  
	  <script>
     var dater;
	  
	  var minDate = moment();
			var start = moment();
			var dateSelected='<?php echo $date?>';
			
			
			
			var i=0;
			var start1;
			if(dateSelected!=''&&i==0){
					start1= new Date(dateSelected);
					
					
			}
			else {
				start1=new Date(start.format('YYYY-MM-DD'));
				
				
			}
		console.log(dateSelected+" shkhskhsk");
			function cb(start, start) {
				
				
				
				if(dateSelected!=''&&i==0){
					start= dateSelected;
					$('#reportrange span').html(start);
					
				}
				else {
					$('#reportrange span').html(start.format('YYYY-MM-DD'));
					
					
				}
				
				var dater=$('#reportrange').text().trim();
				
				//alert(start);
				
				if(i!=0){
					
				//window.location="http://ubiattendance.zentylpro.com/index.php/admin/livetrack/<?php echo $eid?>/"+dater;
				window.location='<?=URL?>location/livetrack/<?php if($eid=='') echo "0"; else echo $eid;?>/'+dater;
				
				}
				i++;
				
			}
			$('#reportrange').daterangepicker({
				singleDatePicker: true,
				startDate: start1,
				
			}, cb);
			cb(start, start);
	  
	  </script>

     <script>
      function myFunction() {
         var dateSelected='<?php echo $date?>';
				
				
				
				var acc = $('#accuracy').val();
				
			
				
					
				//window.location="http://ubiattendance.zentylpro.com/index.php/admin/livetrack/<?php echo $eid?>/"+dater;
				window.location='<?=URL?>location/livetrack/<?php if($eid=='') echo "0"; else echo $eid;?>/'+dateSelected+'/'+acc;
				
				
				
			}

     </script>
	  
	  <script>
  
  $(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#example tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }  
        });
    });
});
  </script>
	  
	  
	  
	  
</html>