<!DOCTYPE html>
<html>

<head>
    <title></title>
	 <?php 
         $this->load->view('menubar/allnewcss');
         ?>
    
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
        border: none;
        border-radius: 4px;
        font-size: 16px;
        background-image: url('<?= URL ?>../assets/icons/u_search.svg');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        padding: 21px 20px 23px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    div.dataTables_wrapper div.dataTables_filter input:focus {
        width: 20rem;
        background-color: #e9f1e8;
    }

    div.dataTables_wrapper div.dataTables_filter
    /* text-align: right; */
    margin-left: -104% !important;
    }

    input[class="checkbox"] {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    #select_all {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    table.dataTable>thead .sorting:after {
        display: none;
    }

    table.dataTable>thead .sorting:before {
        display: none;
    }

    table.dataTable>thead .sorting:before,
    table.dataTable>thead .sorting:after,
    table.dataTable>thead .sorting_asc:before,
    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:before,
    table.dataTable>thead .sorting_desc:after,
    table.dataTable>thead .sorting_asc_disabled:before,
    table.dataTable>thead .sorting_asc_disabled:after,
    table.dataTable>thead .sorting_desc_disabled:before,
    table.dataTable>thead .sorting_desc_disabled:after {
        display: none;
    }

    element.style {}

    .page-item.active .page-link {
        z-index: 3;
        color: #000;
        background-color: #e1ffe0;
        border-color: #e1ffe0;
    }

    table.dataTable thead th {
        border-top: none;
        color: #9FA2B4;
        font-size: 15px;
        font-style: 'Poppins';
		font-weight:500;
    }

    table.dataTable tbody {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #3f424c;
    }

    .dat {
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #000000;
    }

    .dot-button {
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

    .a {
        text-decoration: none;
        color: black;
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .subhead {
        font-size: 18px;
        color: #828282;
        display: flex;
        cursor: pointer;
        /* text-decoration: none;*/
        
        font-family: 'Poppins', sans-serif;
    }

    .bttn {
        width: 8rem;
    }

    .filtr {
        font-size: 0.8rem;
        font-weight: 500;
    }

    /*b{
         font-weight: 700!important;
         }*/
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    #heading2 .active5 a {
        border-bottom: 3.5px solid green;
        /*border-radius: 3%;*/
        width: 100%;
        /* text-decoration: none;*/
        height: auto;
        font-weight: bold;
        color: black;
    }

    .checkbox {
        width: 1.2rem !important;
        height: 1.2rem !important;
    }

    .mobview {
        display: none;
    }

    @media only screen and (max-width: 600px) {

        /*.uu1{
         display: none;
         }*/
        .mobview {
            display: unset !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            /*display: none;*/
            width: 13.5rem;
        }

        #columnv {
            display: none;
        }
    }

    table.dataTable tbody td:nth-child(1) {
        /*padding-top: 1.8rem!important;*/
        width: 12rem !important;
    }

    table.dataTable tbody td:nth-child(2) {
        padding-top: 1.2rem !important;
        text-align: center !important;
        /*width: 18rem!important;*/
    }

    table.dataTable tbody td:nth-child(3) {
        padding-top: 1.2rem !important;
        text-align: center !important;
        /*width: 10rem!important;*/
    }

    table.dataTable tbody td:nth-child(4) {
        padding-top: 1.2rem !important;
        text-align: center !important;

    }

    table.dataTable tbody td:nth-child(5) {
        padding-top: 1.2rem !important;
        text-align: center !important;
    }

    table.dataTable tbody td:nth-child(6) {
        padding-top: 1.2rem !important;
        text-align: center !important;
    }

    table.dataTable tbody td:nth-child(7) {
        padding-top: 1.2rem !important;
        text-align: center !important;
        width: 8.32rem !important;
    }

    table.dataTable tbody td:nth-child(8) {
        padding-top: 1.2rem !important;
        /*width: 8rem!important;*/
    }

    table.dataTable tbody td:nth-child(9) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(10) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(11) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(12) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(13) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(14) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(15) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(16) {
        padding-top: 1.2rem !important;
    }

    table.dataTable tbody td:nth-child(17) {
        padding-top: 1.2rem !important;
    }

    @media only screen and (max-width: 568px) {
        #myModal {
            /*padding-left: 76px!important;*/
            width: 22.4rem !important;
        }
    }

    /* */
    .owl-nav {
        position: absolute;
        top: -6rem;
        right: 0;
    }

    .owl-theme .owl-nav {
        /*margin-top: 2rem;*/
        /*width: 68.6rem;*/
    }

    button.owl-prev {
        width: 2rem;
        /* margin-right: 32.9rem!important;*/
    }

    button.owl-next {
        width: 2rem;
        /*margin-left: 31rem!important;*/
    }

    button.owl-next span {
        font-size: 2rem;
    }

    button.owl-prev span {
        font-size: 2rem;
    }

    /*.owl-carousel.owl-drag .owl-item {
         margin-right:1!important;
         }*/
    /*swiper*/
    /* html,
         body {
         position: relative;
         height: 100%;
         }
         */
    /* body {
         background: #eee;
         font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
         font-size: 14px;
         color: #000;
         margin: 0;
         padding: 0;
         }*/
    .swiper-container {
        /* width: 60vw !important; */
        height: 100%;
        
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        width: auto !important;
        /*margin-right: 0px!important;*/
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-button-next,
    .swiper-button-prev {
        background-color: white;
        background-color: rgba(255, 255, 255, 0.5);
        color: #000 !important;
        fill: black !important;
        stroke: black !important;
    }

    .buttons-collection {
        border: none;
        position: fixed;
        /*top: -11rem;*/
        /*left: 44rem;*/
       
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';
        font-weight: 600;
        color: #4B506D !important;
        font-size: 14px !important;
    }
	.dt-buttons{
	  float:right;
  }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dt-button-collection div.dropdown-menu {
        margin-left: 1.5rem;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin-top: -2rem !important;
    }

    div.sticky {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 1rem !important;
        z-index: 2000;
    }

    div.sticky.active {
        background: white;
        /* box-shadow: 0px 5px 10px -5px #acacac;*/
        transition: ease-in-out .5s;
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 2.9rem !important;
        z-index: 2000;
    }

    .right {
        float: right;
        margin-bottom: 5px;
    }

    .flex-wrap {
        margin-left: 37rem !important;
    }

    .nohover:hover {
        background: white !important;
        border-color: white !important;
    }

    .nohover {
        background: white !important;
        border-color: white !important;
    }
  
   .modal-xl {
      width: 67%; 
   }
   .modal-content {
  -webkit-border-radius: 10px !important;
  -moz-border-radius: 10px !important;
  border-radius: 10px !important;
  -webkit-border: 10px !important;
  -moz-border: 10px !important;
  border: 10px !important;
}
.hover:hover {
        background-color:#ECECEC;"
        text-decoration: none;
    }

    </style>
</head>

<body>
    <?php 
     
         $data['pageid']=3.1;
         $this->load->view('menubar/sidebar',$data);
         $this->load->view('menubar/navbar');
         $data=isset($data)?$data:'';
         
         ?>
    <main class="main" style="width: 83.3%;">
        <!-- add geo fence -->

        
                    <div class="row">
                      <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    
                                                          
                                       <div class="row" id="mapdiv" style="margin-top:-11px;margin-left:-8px;display:none" >
                                          <input id="pac-input" class="controls" type="text" placeholder="Enter Your Location....." style="z-index: 0;position: absolute;margin-top: 0.6rem!important;left: 12rem;font-size: 1rem;width: 13.5rem;height: 2.5rem;">
                                          <div id="map" style="height: 23rem;width: 39rem;" ></div>
                                          <br />
                                          <P> <b>Note* </b>
                                             &nbsp;&nbsp;&nbsp;
                                              <span style="color:green" > Enter your location in the search bar and click on the location marker </span>
                                              <i class="fa fa-map-marker" style="color:#ff6666;font-size:20px; " aria-hidden="true"></i>
                                           </P>
                                      
                                       <!-- <div id="loderdiv" style="padding-top:30%" >
                                          <center>
                                             <img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" id="imagelod" />
                                          </center>
                                       </div> -->
                                    </div>
                                  </div>
                                  <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                 
                                    
                                    
                                       <form  action="#"  method="post" >
                                         

                                                <!-- <div class="form-group row">
                                              <label for="colFormLabel" class="col-sm-4 col-form-label">Geo Center Name</label>
                                              <div class="col-sm-8">
                                                <input type="email" class="form-control" id="colFormLabel name" name="name"value="" required placeholder="Eg. Connaught Place">
                                              </div>
                                            </div> -->
                                            <div class="form-group">
                                              <label for="formGroupExampleInput">Geo Center Name</label>
                                              <input type="text" class="form-control" id="name" name="name"value="" required placeholder="Eg. Connaught Place">
                                               <input type="hidden" class="form-control" id="id" name="id" value="" >
                                            </div>

                                            <div class="form-group">
                                              <label for="formGroupExampleInput">Latitude , Longitude</label>
                                              <input type="text" class="form-control" id="latlong" name="latlong"value="<?php echo $latit.",".$longi; ?>" required  placeholder="Eg. 26.1967067, 78.1969453 " disabled>
                                            </div>


                                            <!-- <div class="row">
                                             <div class="col-sm-4" style="margin-top: 10px;">
                                                <label for="text" class="form-group" style="margin-top:30px;"><strong style="margin-left: -20px;">Latitude , Longitude<span class="red">*</span></strong></label>
                                             </div>
                                             <div class="col-sm-8" >
                                                <input type="text" class="form-control" id="latlong" name="latlong" value="" required  placeholder="Eg. 26.196706799999998 , 78.1969453 " disabled   >
                                             </div>
                                          </div>
 -->


                                          <div class="form-group">
                                              <label for="formGroupExampleInput">Geo Center Address</label>
                                              
                                              <textarea  rows="2" cols="50" class="form-control" id="location" name="location" placeholder="Eg. Rajiv Chowk, Rajeev Chowk, Connaught Place, New Delhi, Delhi 110001, India" disabled > <?php echo decode5t($checkinloc);?></textarea>
                                            </div>

                                          
                                          <!-- <div class="row" >
                                             <div class="col-sm-4" style="margin-top: 10px;">
                                                <label for="text" class="form-group"style="margin-top:30px;"><strong style="margin-left: -20px;">Geo Center Address<span class="red">*</span></strong></label>
                                             </div>
                                             <div class="col-sm-8" >
                                                <textarea  rows="2" cols="50" class="form-control" id="location" name="location" placeholder="Eg. Rajiv Chowk, Rajeev Chowk, Connaught Place, New Delhi, Delhi 110001, India" disabled > </textarea>
                                             </div>
                                          </div> -->
                                          <div class="form-group">
                                              <label for="formGroupExampleInput">Fence Radius (Km)</label>
                                              <input type="number" min="0" placeholder="" value="0.250" class="form-control" id="radius" name="radius" required >
                                            </div>

                                          <!-- <div class="row" >
                                             <div class="col-sm-4" style="margin-top: 10px;">
                                                <label for="text" class="form-group" style="margin-top:30px;">
                                                <strong style="margin-left: -15px;">Fence Radius (Km)<span class="red">*</span></strong></label>
                                             </div>
                                             <div class="col-sm-8" > 
                                                <input type="number" min="0" placeholder="" value="0.250" class="form-control" id="radius" name="radius" required >
                                             </div>
                                          </div> -->
                                          
                                       </form>

                                        <div class="row" style="padding-top: 1rem;">
                                  
                                    <div class="col-lg-12" style="text-align: center;">
                                   
                                <!--  <button type="button"  class="btn btn-light bttn fit" data-dismiss="modal" >Cancel</button>
                                 &nbsp;&nbsp; -->
                                             <?php echo isset($name); ?> 
                                 <button type="button" name="save" id="submit" value="<?= (isset($name)?'Update':'Add') ?>" class="btn btn-success"style="width: 12rem;" >Save</button>
                              
                                  </div>
                                </div>
                                   </div>
                                 </div>
                                 
                           
                   
                    
                 


         <!-- add geo fence -->



            
        <?php  $this->load->view('menubar/footer');?>
    </main>



</body>
 <?php 
         $this->load->view('menubar/allnewjs');
         ?>

 <script>
      setTimeout(function(){   
          var x1 = document.getElementById("mapdiv");
          var x2 = document.getElementById("loderdiv");
       x1.style.display = "block";
       //x2.style.display = "none";
       
      }, 3000);
          
      
        $(document).on("click", "#submit", function (){
      var name=$('#name').val().trim();

      var id=$('#id').val();
      var location=$('#location').val().trim();
      var latlong=$('#latlong').val();
      var radius=$('#radius').val();
      
          if(name == "")
        {
        $('#name').val(name);
        $('#name').focus();
        doNotify('top','center',4,'Please enter the geo center name');
        return false;
                    } 
      else if(latlong=="")
      {
      $('#latlong').focus();
      doNotify('top','center',4,'Latitude and longitude can not be null');
      return false;
               }
      else if(validatelatlong(latlong))
        {
        $('#latlong').focus();
        doNotify('top','center',4,'There is some problem,Please try again');
        return false;
        }
      else if(location == "")
      {
                          $('#location').focus();
                          $('#location').val(location);
          doNotify('top','center',4,'Please enter the geo center address ');
          return false;
               }
      else if(radius=="")
      {
                          $('#radius').focus();
          doNotify('top','center',4,'Please enter fence radius');
          return false;
               }
      else if(radius < 0.05)
      {
                          $('#radius').focus();
          doNotify('top','center',4,'Radius should be greater than 0.05 (km) ');
          return false;
               }
      $.ajax({url: "<?php echo URL;?>Managesettings/saveGeolocation",
          data: {"id":id,"name":name,"location":location,"latlong":latlong,"radius":radius},
          success: function(result){
            var result=JSON.parse(result);
             
            if(result.status)
            {
              doNotify('top','center',2,result.sms);
               setTimeout(function()
                 {
                 window.location.replace("<?=URL?>Managesettings/geofence");
                 }, 2000);
            }
              else
              {
              doNotify('top','center',4,'There is some error while creating geofence');
              }
           },
          error: function(result)
            {
            doNotify('top','center',4,'Unable to connect API');
            }
         });
      });
      
      
       var lat ;
       var lng ; 
      var lat_lang = "";
      
        function validatelatlong(latlong) 
      {
      var re = /[a-z]/;
      return re.test(String(latlong).toLowerCase());
      }
      
      
       
      function getLocation() { 
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition,error,options); 
      
      } else { 
          alert("Geolocation is not supported by this browser");
      }
      }
      function error(err) {
      //alert("Please allow to share your location"); 
           //lat = 26.196706799999998;  
      //lng = 78.1969453;
      // alert(lat);
      }
      function options(err) {
      alert("Other options");   
      }
      function showPosition(position) { 
      
      lat = parseFloat(position.coords.latitude); 
      lng = parseFloat(position.coords.longitude);
      }
      
      
      function getcurrentLocation()
      {
       if (navigator.geolocation)  {
               navigator.geolocation.getCurrentPosition(showPosition1,error1);
               } else  
      {
               alert("Geolocation is not supported by this browser");
               } 
       function showPosition1(position)
             {
                   getcurrentLocation1();
                 }
       function error1(err) {
       // console.log(err);
         // alert("Please allow to share your location");  
       }
         
      }
      getcurrentLocation();
      function getcurrentLocation1()
      {
      getLocation(); 
      setTimeout(function()
      {
       lat_lang = lat+", "+lng;
       //alert(lat);
       $("#latlong").val(lat_lang);
       getAddress(lat,lng);
      },2000);    
      }
      function getAddress (latitude,longitude){
      var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(latitude, longitude);
      geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
        console.log(results)
          if (results[1]) {
           //formatted address
           $("#location").val(results[0].formatted_address);
            //alert(results[0].formatted_address)
          } else {
            alert("No address found");
          }
        } else 
      {
          alert("Geocoder failed due to: " + status);
        }
      });
      }
      
      /* function showmap()
      {
      $("html body #topdiv").animate({ scrollTop: $(document).height() }, 1000);
      var x = document.getElementById("mapdiv");
        if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
      }*/
      
       
        function initAutocomplete(){
         var lat11 = "<?php echo  $latit; ?>";  
         var lng11 = "<?php echo  $longi; ?>";
     
         setTimeout(function(){ 
        var map = new google.maps.Map(document.getElementById('map'),
        {      
          center: {lat:   parseFloat(lat11), lng: parseFloat(lng11)},
          //center: {lat: lat, lng: lng},
          zoom: 18,
          mapTypeId: 'roadmap'
        });
       
         

         var marker = new google.maps.Marker({
    position:   {lat:   parseFloat(lat11), lng: parseFloat(lng11)},
    map: map,
    
  });
       
        
       
  },2000);
      }
      
      
   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYh77SKpI6kAD1jiILwbiISZEwEOyJLtM&libraries=places&callback=initAutocomplete"
      async defer></script> 
</html>