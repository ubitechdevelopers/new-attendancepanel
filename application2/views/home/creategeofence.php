<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= URL; ?>../assets/scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="<?= URL ?>../assets/iCheck/square/green.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css"
        integrity="sha512-uCQmAoax6aJTxC03VlH0uCEtE0iLi83TW1Qh6VezEZ5Y17rTrIE+8irz4H4ehM7Fbfbm8rb30OkxVkuwhXxrRg=="
        crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>../assets/clockpicker/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?= URL; ?>../assets/maincss/swiper.min.css">
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
        font-weight: 500 !important;
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
        width: 72vw !important;
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
        position: relative;
        /*top: -11rem;*/
        /*left: 44rem;*/
        float: left;
        background-color: white !important;
        color: black !important;
        font-family: 'Poppins';
        font-weight: 600;
        color: #4B506D !important;
        font-size: 14px !important;
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
        top: 3.3rem !important;
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
           <div class="container-fluid" style="" >
                       <div class = "row container-fluid" >
                  <div class="col-md-7" >
                    <div class="row" id="mapdiv" style="margin-top:-30px;display:none" >
                    
                      <div id="map" style="height:400px;" ></div>
                      <br />
                     
                    </div>
                     
                    <div id="loderdiv" style="padding-top:30%" >
                          <center>
                         <img src="<?php echo URL; ?>../assets/img/loaderimg.gif" alt="loader image" id="imagelod" />
                        </center>
                    </div>
                </div>
                  <div class="col-md-5" style="padding-left:30px;" >
                        <form class="form-horizontal" action="#"  method="post" >
                     
                      <div class="row" >
                           <div class="col-sm-4" >
                           <label for="text" class="form-group"><strong>Geo Center Name *</strong></label>
                           </div>
                           <div class="col-sm-8" >
                          <input type="text" class="form-control" id="name" name="name" value="" required placeholder="Eg. Connaught Place"  >
                          <input type="hidden" class="form-control" id="id" name="id" value="" >
                          </div>
                      </div>
                   
                      <div class="row"  >
                           <div class="col-sm-4" >
                           <label for="text" class="form-group"><strong>Latitude , Longitude *</strong></label>
                           </div>
                           <div class="col-sm-8" >
                          <input type="text" class="form-control" id="latlong" name="latlong" value="<?php echo $latit.",".$longi; ?>" required   disabled   >
                          </div>
                      </div> 
                      
                      <div class="row" >
                           <div class="col-sm-4" >
                           <label for="text" class="form-group"><strong>Geo Center Address *</strong></label>
                           </div>
                        
                           <div class="col-sm-8" >
                          <textarea  rows="3" cols="50" class="form-control" id="location" name="location"  disabled ><?php echo decode5t($checkinloc);?></textarea>
                          
                          </div>
                          
                      </div>
                      <br />
                      <br />
                      <br />
                      <div class="row" >
                           <div class="col-sm-4" >
                           <label for="text" class="form-group" >
                           <strong>Fence Radius (Km) *</strong></label>
                           </div>
                           <div class="col-sm-8" > 
                            <input type="number" min="0" placeholder="" value="0.250"   class="form-control" id="radius" name="radius" required >
                          </div>
                      </div>
                     
                       <div class="row" >
                            <div class="col-sm-3">
                            </div>
                           <div class="col-sm-2" >
                           <?php echo isset($name); ?> 
                             <input type="button" name="save" class="btn btn-success pull-right" id="submit" value="<?= (isset($name)?'Update':'Add') ?>" />
                           </div>
                           <div class="col-sm-2">
                             <a href="<?= URL ?>Attendance/geoLocations" class="btn btn-default pull-left" >Cancel
                             </a>
                           </div>
                           <div class="col-sm-5">
                           </div>
                      </div>
                    </form>
                </div>
            </div>
                       <div>
                      </div>
                    </div>
</main>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.js"></script>-->
<script src="<?= URL ?>../assets/js/navbar.js"></script>
<!--<script src="<?= URL ?>../assets/js/tabbar.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="<?= URL ?>../assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?= URL ?>../assets/js/repeatheadeerprint.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script src="<?= URL ?>../assets/iCheck/icheck.min.js" type="text/javascript"></script>
<script src='<?= URL ?>../assets/plugins/table_pdf/excellentexport.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"
    integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous"></script>
<script src="<?php echo URL; ?>../assets/clockpicker/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?= URL ?>../assets/js/bootstrap-notify.js"></script>
<script src="<?= URL ?>../assets/js/demo.js"></script>
<!--my js-->
<script src="<?= URL ?>../assets/js/custom.js" type="text/javascript"></script>

 <script>
           var data = <?php echo ($latit);  ?>;
              var data1 = <?php echo ($longi);  ?>;

       setTimeout(function(){   
           var x1 = document.getElementById("mapdiv");
           var x2 = document.getElementById("loderdiv");
           x1.style.display = "block";
           x2.style.display = "none";
           
       }, 3000);
        
  
      $(document).on("click", "#submit", function (){

          // alert("<?php echo  '{ lat: '. $latit .", lng: ".$longi." }" ; ?>");
        // return false;
                var name=$('#name').val().trim();
                var id=$('#id').val();
                var location=$('#location').val().trim();
                var latlong=$('#latlong').val();
                var radius=$('#radius').val();
                
                 if(name == "")
                  {
                    $('#name').val(name);
                    $('#name').focus();
                    doNotify('top','center',4,'Please enter the Geo Center Name .');
                    return false;
                  } 
             else if(latlong=="")
             {
                $('#latlong').focus();
                doNotify('top','center',4,'Latitude and Longitude can not be null.');
                return false;
             }
             else if(validatelatlong(latlong))
                    {
                    $('#latlong').focus();
                    doNotify('top','center',4,'There is some problem,Please try again.');
                    return false;
                    }
             else if(location == "")
             {
                        $('#location').focus();
                        $('#location').val(location);
                        doNotify('top','center',4,'Please enter the Geo Center Address .');
                        return false;
             }
             else if(radius=="")
             {
                        $('#radius').focus();
                        doNotify('top','center',4,'Please enter Fence Radius .');
                        return false;
             }
             else if(radius < 0.05)
             {
                        $('#radius').focus();
                        doNotify('top','center',4,'Radius should be greater than 0.05 (km) ');
                        return false;
             }
                $.ajax({url: "<?php echo URL;?>Attendance/saveGeolocation",
                        data: {"id":id,"name":name,"location":location,"latlong":latlong,"radius":radius},
                        success: function(result){
                            var result=JSON.parse(result);
                             
                            if(result.status)
                            {
                                doNotify('top','center',2,result.sms);
                                 setTimeout(function()
                                     {
                                     window.location.replace("<?=URL?>Attendance/geoLocations");
                                     }, 3000);
                            }
                                else
                                {
                                doNotify('top','center',4,'There is some error while insert location');
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
        alert("Geolocation is not supported by this browser.");
        }
    }
    function error(err) {
        // alert("Please Allow to share your location..");  
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

    alert (parseFloat(position.coords.latitude));
  }
  
   
   function getcurrentLocation()
   {
              if (navigator.geolocation)  {
             navigator.geolocation.getCurrentPosition(showPosition1,error1);
             } else  
             {
             alert("Geolocation is not supported by this browser.");
             } 
           function showPosition1(position)
               {
                 getcurrentLocation1();
               }
           function error1(err) {
              // console.log(err);
                //alert("Please Allow to share your location"); 
              }
             
   }
   getcurrentLocation();
   function getcurrentLocation1()
   {
      // getLocation(); 
          setTimeout(function()
          {
              lat_lang = $("#latlong").val();
              //alert(lat);
           getAddress(lat,lng);
          },2000);    
   }
//    function getAddress (latitude,longitude){
//     var geocoder = new google.maps.Geocoder();
//       var latlng = new google.maps.LatLng(latitude, longitude);
//     geocoder.geocode({'latLng': latlng}, function(results, status) {
//       if (status == google.maps.GeocoderStatus.OK) {
//       console.log(results)
//         if (results[1]) {
//          //formatted address
//          $("#location").val(results[0].formatted_address);
//           //alert(results[0].formatted_address)
//         } else {
//           alert("No address found");
//         }
//       } else 
//    {
//         alert("Geocoder failed due to: " + status);
//       }
//     });
// }

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
      // alert("<?php echo  '{ lat: '. $latit .", lng: ".$longi." }" ; ?>");
      // alert(lat11);
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