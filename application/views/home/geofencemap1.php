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
          $longin=$row1->longi_in;
          $latin=$row1->latit_in;
          $longout=$row1->longi_out;
          $latout=$row1->latit_out;
          $checkin=$row1->checkInLoc;
          $checkout=$row1->checkOutLoc;
          $timein=$row1->TimeIn;
          $timeout=$row1->TimeOut;
          $timeingeo=$row1->TimeInGeoFence;
          $timeoutgeo=$row1->TimeOutGeoFence;
          $ename=ucwords(getEmpName($row1->EmployeeId));
          $area=$row1->areaId;
          $facklocin=$row1->FakeLocationStatusTimeIn;
          $facklocout=$row1->FakeLocationStatusTimeOut;
          $devicee=$row1->device; 



              
         }

         
         ?>

         <div class="row">
            <div class="col-lg-10" style="padding: 0.8rem;">
            <h5 class="hed"><i
                                class="fa fa-chevron-left" data-dismiss="modal" style="font-size: 1rem;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $ename;?>'s</span>&nbsp;Time Out Location</h5>
                            </div>
                            <div class="col-lg-2"style="padding: 0.8rem;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
         </div>
 
            <div class="row" style="border-top: 1px solid #EDEDED;">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">

                            <div id="map23" style="height: 23rem;width: 30rem;"></div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12" style="padding-top: 15px;">
                            <div class="row" style="padding: 0px; margin: 0px;padding-left: 1rem;">
                                <span class="bld"><?php echo $latout?>,<?php echo $longout?></span>
                            </div>
                            <br>
                            <br>
                            <div class="row" style="padding: 0px; margin: 0px;">
                                <div class="col-lg-2">
                                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 1.6rem;color: #0085e8;">
                                    </i>

                                </div>
                                <div class="col-lg-10">
                                    <span class="fnt"><?php echo $checkout;?></span>
                                </div>

                            </div>
                            <br>

                            <div class="row" style="padding: 0px; margin: 0px;">
                                <div class="col-lg-2">
                                    <i class="fa fa-clock-o" aria-hidden="true" style="font-size: 1.6rem;color: #0085e8;">
                                    </i>

                                </div>
                                <div class="col-lg-10">
                                    <span class="fnt" style="color: #1F1F1F!important; font-weight: 600;"><?php echo substr($timeout,0,5);?></span>
                                </div>

                            </div>
                            <br>

                             <div class="row" style="padding: 0px; margin: 0px;">
                                <div class="col-lg-2">
                                    
                                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 1.6rem;color:#0085e8;">
                                    </i>

                                </div>
                                <div class="col-lg-10">
                                    <span class="fnt" style="color: #1F1F1F!important; font-weight: 600;"><?php echo $timeoutgeo;?></span>
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