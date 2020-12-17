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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css" integrity="sha512-uCQmAoax6aJTxC03VlH0uCEtE0iLi83TW1Qh6VezEZ5Y17rTrIE+8irz4H4ehM7Fbfbm8rb30OkxVkuwhXxrRg==" crossorigin="anonymous" />
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="<?= URL; ?>../assets/maincss/swiper.min.css">

      <style type="text/css">
          div.dataTables_wrapper div.dataTables_filter input {
         margin-top: -1rem;
         position: absolute;
         box-sizing: border-box;
         width: 3rem;
         border:none;
         border-radius: 4px;
         font-size: 16px;
         
         background-image: url('<?=URL?>../assets/icons/u_search.svg');
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
        /* text-decoration: none;*/
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
        /* text-decoration: none;*/
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
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(2) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(3) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(4) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(5) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(6) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(7) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(8) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(9) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(10) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(11) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(12) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(13) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(14) {
 padding-top: 1.4rem!important;
} 
table.dataTable tbody td:nth-child(15) {
 padding-top: 1.4rem!important;
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
         /*top: -11rem;*/
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
  top: 3.4rem!important;
  z-index: 2000;
  
  }
      </style>


   </head>
   <body>
       <?php 
         $data['pageid']=3.9;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         
         ?>
      <main class="main" style="width: 83.7%;">
       <div id="heading2" class="sticky" style="z-index: 500; padding-bottom: 30px;">
                                     <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="primary-text">Location</div>


                    </div>
                    
                </div>
                                   

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row" style="margin-left: 0px;">
                                <span class="active5"> <a href="<?= URL; ?>Addon/livelocationtrack" class="subhead">Live Location</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                <span ><a href="<?= URL; ?>Addon/currentlocation" class="subhead">Current Location</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
                                <span><a href="<?= URL; ?>Addon/distancetravel"  class="subhead">Distance Travelled</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span><a href="<?= URL; ?>Addon/cumulativelocation" class="subhead">Cumulative Location</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!--  -->
				                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           
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


            
           
           
      </main>
     
   </body>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   
   <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>
   <script src="<?= URL ?>../assets/js/navbar.js"></script>
   <!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
   
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

     
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
      var config = {
        apiKey: "AIzaSyDX9yqBBNRYnYQmyPydBTxpoJeij2p7jDk",
        authDomain: "ubisales.firebaseapp.com",
        databaseURL: "https://ubisales.firebaseio.com/",
        projectId: "ubisales",    
     
       
      };

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
            icon: '<?php echo URL?>assets/image/location_pin_svg.svg'
			//zoom:.8
        });
		
		var startMarker = new google.maps.Marker({
            position: centerhome,
            map: map,
            //icon: 'http://www.robotwoods.com/dev/misc/bluecircle.png'
            icon: '<?php echo URL?>assets/image/location_pin_svg2.svg',
			
            
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
	  
	  //[Object.keys(alldata['4253']['2020-07-08'])[0]]
	  
	  //]-alldata[allkeys['4253']['2020-07-15'][alldata[allkeys['4253']['2020-07-15'].length-1]]];
	 
	  
	  /* var abcd=alldata[allkeys[m]];
	  
	  var alldates=Object.keys(abcd);
     var totaldate=(alldates[0]); 
	 console.log(alldates); */
	 
	 
	  //}
	  
	  }
	  
        // using global variable:
		
        //window.map.panTo(center);
		
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