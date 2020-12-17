 <style type="text/css">
     .fnt
     {
        font-family: Poppins;
font-style: normal;
font-weight: normal;
font-size: 13px;
line-height: 20px;
/* or 154% */

letter-spacing: 0.2px;

color: #565252;
     }
     .bld
     {
        font-family: Poppins;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 29px;
/* or 161% */

letter-spacing: 0.2px;

color: #202020;
     }
     .hed
     {
        font-family: Poppins;
font-style: normal;
font-weight: bold;
font-size: 15px;
line-height: 22px;
/* identical to box height */


color: #000000;

     }
     #map.fullscreen {
  position: fixed;
  width:100%;
  height: 100%;
} 
 </style>
 
        <?php  
        foreach($latitin as $row1 ){
          $longin=$row1->longi;
          $latin=$row1->latit;
		  $locationin=$row1->location;
		  $time=$row1->time;
		  $ename=ucwords(getEmpName($row1->EmployeeId));
		  $latout=$row1->latit_out;
		  
		  $longout=$row1->longi_out;
		  $locationout=$row1->location_out;
		  $timeout=$row1->time_out;
		}
		?>
	<div class="row">
            <div class="col-lg-10" style="padding: 0.8rem;">
            <h5 class="hed"><i class="fa fa-chevron-left" data-dismiss="modal" style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $ename;?>'s</span>&nbsp;Visit Out Location</h5>
            </div>
            <div class="col-lg-2"style="padding: 0.8rem;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
    </div>	

    <div class="row" style="border-top: 1px solid #EDEDED;">
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	<div id="map23" style="height: 23rem; width: 32rem;"></div>
	</div>
	<div class="col-lg-6">
	<span class="bld"><?php echo $latout?>,<?php echo $longout?></span>
	<br><br>
	<div class="row">
	<div class="col-lg-1">
	<i class="fa fa-map-marker" aria-hidden="true" style="font-size: 1.6rem;color: #0085e8; "></i>
	</div>
	<div class="col-lg-11">
	<span class="fnt"><?php echo $locationout;?></span>
	</div>
	</div>
	<br><br>
	<div class="row">
	<div class="col-lg-1">
	<i class="fa fa-clock-o" aria-hidden="true" style="font-size: 1.6rem;color: #0085e8;"></i>
	</div>
	<div class="col-lg-11">
	<span class="fnt" style="color: #1F1F1F!important; font-weight: 600;"><?php echo substr($timeout,0,5);?></span>
	</div>
	</div>
	</div>
	</div>
                        
                        
                        
    <script>
var map;




        
function initMap() {
  
  //console.log('shakir');
    const myLatLng = {
        lat: <?php echo $latout?>,
        lng: <?php echo $longout?>,
    };
    const map = new google.maps.Map(document.getElementById("map23"), {
        zoom: 16,
        center: myLatLng,
    });
    new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello World!",
    });
}
</script>


  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&callback=initMap"></script>   