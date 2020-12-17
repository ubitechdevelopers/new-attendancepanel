/*! 
 *  Payment.js
 *
 */

'use strict';

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") 
{
  throw new Error("UBICRM requires jQuery");
}







//'ui.bootstrap', 'xeditable', 'ngSanitize'
var orgIdForReferrals=0;
var app = angular.module('payapp', []);
/*angular.module('TestApp', ['TestApp.controllers','datatables', 'datatables.buttons']);*/

app.controller('payCtrl', function($scope, $http, $timeout,$filter) {
	 
	
$scope.referralDiscount=0;	 
$scope.referralDiscountFetched=0;

$scope.discountDollar=0;
$scope.discountRupee=0;
$scope.discountPercent=0;
$scope.calculatedAmt=0;
$scope.calculatedTax=0;
// $scope.useramountmonth=0;
// $scope.useramountyear=0;






 $scope.hastrue = false;
 $scope.month = 'Year';
 $scope.userlmt1 = 'duration'
// $scope.currency = $("#currency").val();
 $scope.flage = 1;
 $scope.statearr = [];
 $scope.nouser = 0;
 $scope.monthyear = 0;
 $scope.addition = "";
 $scope.addition2 = "";
 $scope.addition3 = "";
 $scope.amount = 0;
 $scope.amount1 = 0;
 $scope.dueamount = 0;
 $scope.additionaluser = 0;
 
 // Addons variable
 $scope.bulk_attprice = 0;
 $scope.geo_fenceprice = 0;
 $scope.location_traceprice = 0;
 $scope.payroll_price = 0;
 $scope.visit_punchprice = 0;
 $scope.timeoff_price = 0;
 $scope.face_price = 0;
 $scope.device_price = 0;
 
 
// apply Addons value
 $scope.bulk_attprice2 = 0;
 $scope.geo_fenceprice2 = 0;
 $scope.location_traceprice2 = 0;
 $scope.payroll_price2 = 0;
 $scope.visit_punchprice2 = 0;
 $scope.timeoff_price2 = 0;
  $scope.face_price2 = 0;
 $scope.device_price2 = 0;
 
 // Addons rate
 $scope.bulk_attprice1 = 0;
 $scope.geo_fenceprice1 = 0;
 $scope.location_traceprice1 = 0;
 $scope.payroll_price1 = 0;
 $scope.visit_punchprice1 = 0;
 $scope.timeoff_price1 = 0;
 $scope.face_price1 = 0;
 $scope.device_price1 = 0;
 
  $scope.price_withaddon = 0;
  $scope.subtotal = 0;
  $scope.bulk_attcheck = "";
  $scope.plandetailarr =[];
  
 $scope.tabledata = [];
 $scope.countryarr=[];
 $scope.tax = 0;
 $scope.country = "";

 $scope.gstno = "";
 $scope.zipcode = "";
 $scope.useramount = 0;
 $scope.amountper = 0;
 $scope.gst = 'm';
 $scope.discount = false;
 var today = new Date();

 var dd = today.getDate();
 var mm = today.getMonth()+1; //January is 0!
 var yyyy = today.getFullYear();
 // alert(dd);
 // alert(mm);
 // alert(yyyy);
 // var app = angular.module('payapp', []);
    
 //   app.controller('payCtrl', ['$scope', '$http', '$filter', function ($scope, $http, $filter) {
 //        $scope.today = $filter('date')('19-02-2012', "dd/MMM/yyyy");
 //   }]);
 //   alert($scope.today);

 if(dd<10) {
    dd = '0'+dd
 } 
 if(mm<10) 
 {
    mm = '0'+mm
 } 

 
var calculateReferralDiscount = function(){
 console.log(parseFloat($scope.discountDollar));
			 // $scope.referralDiscount=parseFloat($scope.discountDollar)+parseFloat($scope.discountRupee)+parseFloat($scope.amount)*0.01*parseFloat($scope.discountPercent);
			 // $scope.referralDiscount=$scope.referralDiscount;
			 console.log("referral"+$scope.referralDiscount);
 
 }
 
 
 
 var rangeSlider = function(){
	  var slider = $('.range-slider'),
		  range = $('.range-slider__range'),
		  value = $('.range-slider__value');
		
	  slider.each(function(){
		value.each(function(){
		  var value = $(this).prev().attr('value');
		  $(this).html(value);
		                     });

		range.on('input', function(){
		  $(this).next(value).html(this.value);
		});
	  });
	};
rangeSlider();
$scope.urange = 0;
$scope.reguser = "";
$scope.getamounts = function()
 {
	
	// alert($scope.nouser);
	 // alert($scope.reguser);
	 
	 // if($scope.monthyear==0)
	 // {
		 // alert('ok');
		// // return false;
	 // }

	 

	 // alert($scope.useramountmonth);
	if($scope.userlmt1 == 'bothud'){
		// alert("fgifdgh");
		$scope.addition2 = $scope.monthyear;

		$scope.addition3 =$scope.nouser;
		if($scope.addition2 == 0 || $scope.addition3==0 ){
			//alert("hahahaha");

		$scope.addition2 = '';
		$scope.addition3 = '';
		// alert($scope.addition2);
		// alert($scope.addition3);
	}

	}
	$scope.addition =  parseInt($scope.monthyear) + parseInt($scope.nouser);
  if($scope.addition == 0){

$scope.addition = '';
  
	 
	}
	// alert($scope.addition);
	// alert($scope.enddateupg);
	setTimeout(function(){ 
		// alert($scope.monthyear);
		// alert($scope.month);
		// alert($scope.currency);
		// alert($scope.monthyear >=0 && $scope.monthyear < 1);
		
// alert($scope.bulk111);
if($scope.bulk111=='1'){

	$('#bulk_attcheck').prop('checked', true);
}
if($scope.visit111=='1'){

	$('#visit_punchcheck').prop('checked', true);
}
if($scope.geo111=='1'){

	$('#geo_fencecheck').prop('checked', true);
}
if($scope.hourly111=='1'){

	$('#payroll_check').prop('checked', true);
}

if($scope.face111=='1'){

	$('#face_check').prop('checked', true);
}

if($scope.device111=='1'){

	$('#device_check').prop('checked', true);
}

if($scope.timeoffs111=='1'){

	$('#timeoff_check').prop('checked', true);

	

}
 // alert($('#timeoff_check').prop("checked"));
		// alert($scope.bulk111);
  //  		alert($scope.visit111);
  //  		alert($scope.geo111);
  //  		alert($scope.hourly111);
   		// alert($scope.timeoffs111); 
   		// alert($scope.face111); 
	 if($scope.nouser == 0)
	 {
			 // alert($scope.reguser);
			 // alert($scope.nouser);

		 if($scope.reguser > 0 && $scope.reguser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.reguser > 20 && $scope.reguser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.reguser > 40 && $scope.reguser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.reguser > 60 && $scope.reguser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.reguser > 80 && $scope.reguser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.reguser > 100 && $scope.reguser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.reguser > 120){
		$scope.urange = "120+";
	}

	 }

if($scope.geo111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}

	
}



if($scope.hourly111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}

	
}


if($scope.face111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}

	
}

if($scope.device111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}

	
}





if($scope.timeoffs111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}

	
}

if($scope.visit111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}

	
}
if($scope.bulk111==1 && $scope.monthyear == 0){

if($scope.nouser > 0 && $scope.nouser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.nouser > 20 && $scope.nouser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.nouser > 40 && $scope.nouser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.nouser > 60 && $scope.nouser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.nouser > 80 && $scope.nouser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.nouser > 100 && $scope.nouser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.nouser > 120){
		$scope.urange = "120+";
	}


}


if($scope.bulk111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}

if($scope.visit111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}

if($scope.geo111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}

if($scope.hourly111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}

if($scope.face111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}


if($scope.device111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}


if($scope.timeoffs111==0 && $scope.monthyear == 0){
// alert("checking hai");
$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}


}


	 }, 8000);

	if($scope.nouser != 0 && $scope.monthyear != 0){
		$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

		// alert($scope.totaluser);

		if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}



	}

	else if($scope.nouser == 0){
	 	// $scope.nouser = $scope.reguser;
	 	if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}
	 }

	 else if($scope.nouser != 0 && $scope.monthyear == 0){
	if($scope.totaluser > 0 && $scope.totaluser <= 20){
		$scope.urange = "1-20";
	}
	else if($scope.totaluser > 20 && $scope.totaluser <= 40){
		$scope.urange = "21-40";
	}
	else if($scope.totaluser > 40 && $scope.totaluser <= 60){
		$scope.urange = "41-60";
	}
	else if($scope.totaluser > 60 && $scope.totaluser <= 80){
		$scope.urange = "61-80";
	}
	else if($scope.totaluser > 80 && $scope.totaluser <= 100){
		$scope.urange = "81-100";
	}
	else if($scope.totaluser > 100 && $scope.totaluser <= 120){
		$scope.urange = "101-120";
	}
	else if($scope.totaluser > 120){
		$scope.urange = "120+";
	}
}


	//console.log($scope.tabledata.length);
//	console.log($scope.urange);
	for(var i=0; i<$scope.tabledata.length; i++)
	{
		if($scope.tabledata[i].currency == $scope.currency)
		{
			// alert($scope.urange);
			// alert($scope.tabledata[i].range);

		if($scope.tabledata[i].range==$scope.urange)
		{
			// alert($scope.monthyear>360);
			// alert($scope.urange);

			if($scope.month=='Month')
			{
				// if($scope.monthyear>360){

				// 	alert("hieieie");
				// 	break;
				// }

$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);

				// if($scope.monthyear==0)
				// {
				// 	alert('ok');
				// }
				$scope.useramount = $scope.tabledata[i].monthly;
				
				if($scope.monthyear != ""  && $scope.monthyear >=12)
				{
					// alert("d"+$scope.monthyear);

				  $scope.useramount = ($scope.tabledata[i].yearly/12).toFixed(2);
				  // alert($scope.useramount);
				  // alert($scope.tabledata[i].yearly);
				}
				

else if($scope.monthyear != "" && $scope.dayDifference > 364 && $scope.month=='Month' && $scope.nouser!= ""){

					$scope.useramount = ($scope.tabledata[i].yearly/12).toFixed(2);
					// console.log($scope.useramount);
					// alert($scope.useramount);
					// alert("ye hi hai");
				}
				//plan is monthly duration extended is 0 and user limit extended and currency is inr
else if($scope.month == 'Month'  && $scope.currency == "INR"  && ($scope.monthyear >= 0 && $scope.monthyear < 1 )){
						$scope.useramount = $scope.tabledata[i].monthly;

						// alert("pulkit ka user amount calculation");
					if($scope.bulk111=='1'){

						var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.bulk_attprice = (x*$scope.tabledata[7]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.bulk_attprice = (x*$scope.tabledata[8]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.bulk_attprice = (x*$scope.tabledata[9]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.bulk_attprice = (x*$scope.tabledata[10]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.bulk_attprice = (x*$scope.tabledata[11]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.bulk_attprice = (x*$scope.tabledata[12]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.bulk_attprice = (x*$scope.tabledata[13]['bulk_attendance']/30)*$scope.dayDifference;

			}
					
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						// alert("naye k liye");
					// $scope.amount1=parseFloat($scope.amount).toFixed(2);
					// $scope.amount = x*$scope.tabledata[7]['monthly']*$scope.dayDifference;
						}
						if($scope.bulk111=='0'){

							var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.bulk_attprice = (y*$scope.tabledata[7]['bulk_attendance']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.bulk_attprice = (y*$scope.tabledata[8]['bulk_attendance']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.bulk_attprice = (y*$scope.tabledata[9]['bulk_attendance']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.bulk_attprice = (y*$scope.tabledata[10]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.bulk_attprice = (y*$scope.tabledata[11]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.bulk_attprice = (y*$scope.tabledata[12]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				
				
				$scope.bulk_attprice = (y*$scope.tabledata[13]['bulk_attendance']/30)*$scope.dayDifference;
			

					}
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						

						}

					if($scope.visit111=='1'){

					var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.visit_punchprice = (x*$scope.tabledata[7]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.visit_punchprice = (x*$scope.tabledata[8]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.visit_punchprice = (x*$scope.tabledata[9]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.visit_punchprice = (x*$scope.tabledata[10]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.visit_punchprice = (x*$scope.tabledata[11]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.visit_punchprice = (x*$scope.tabledata[12]['visit_punch']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.visit_punchprice = (x*$scope.tabledata[13]['visit_punch']/30)*$scope.dayDifference;

			}	
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.visit111=='0'){

						var y = $scope.totaluser;

							switch(true)
			     {
			 	case (y >=1 && y <=20):
			 	$scope.visit_punchprice = (y*$scope.tabledata[7]['visit_punch']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.visit_punchprice = (y*$scope.tabledata[8]['visit_punch']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.visit_punchprice = (y*$scope.tabledata[9]['visit_punch']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.visit_punchprice = (y*$scope.tabledata[10]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.visit_punchprice = (y*$scope.tabledata[11]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.visit_punchprice = (y*$scope.tabledata[12]['visit_punch']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.visit_punchprice = (y*$scope.tabledata[13]['visit_punch']/30)*$scope.dayDifference;


					}
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.geo111=='1'){

				var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.geo_fenceprice = (x*$scope.tabledata[7]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.geo_fenceprice = (x*$scope.tabledata[8]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.geo_fenceprice = (x*$scope.tabledata[9]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.geo_fenceprice = (x*$scope.tabledata[10]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.geo_fenceprice = (x*$scope.tabledata[11]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.geo_fenceprice = (x*$scope.tabledata[12]['geo_fence']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.geo_fenceprice = (x*$scope.tabledata[13]['geo_fence']/30)*$scope.dayDifference;

			}	


						
		
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.geo111=='0'){
						
				var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.geo_fenceprice = (y*$scope.tabledata[7]['geo_fence']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.geo_fenceprice = (y*$scope.tabledata[8]['geo_fence']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.geo_fenceprice = (y*$scope.tabledata[9]['geo_fence']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.geo_fenceprice = (y*$scope.tabledata[10]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.geo_fenceprice = (y*$scope.tabledata[11]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.geo_fenceprice = (y*$scope.tabledata[12]['geo_fence']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.geo_fenceprice = (y*$scope.tabledata[13]['geo_fence']/30)*$scope.dayDifference;


					}
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.hourly111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.payroll_price = (x*$scope.tabledata[7]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.payroll_price = (x*$scope.tabledata[8]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.payroll_price = (x*$scope.tabledata[9]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.payroll_price = (x*$scope.tabledata[10]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.payroll_price = (x*$scope.tabledata[11]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.payroll_price = (x*$scope.tabledata[12]['payroll']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.payroll_price = (x*$scope.tabledata[13]['payroll']/30)*$scope.dayDifference;

			}	

						
				
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}

					if($scope.hourly111=='0'){

						var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.payroll_price = (y*$scope.tabledata[7]['payroll']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.payroll_price = (y*$scope.tabledata[8]['payroll']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.payroll_price = (y*$scope.tabledata[9]['payroll']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.payroll_price = (y*$scope.tabledata[10]['payroll']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.payroll_price = (y*$scope.tabledata[11]['payroll']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.payroll_price = (y*$scope.tabledata[12]['payroll']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.payroll_price = (y*$scope.tabledata[13]['payroll']/30)*$scope.dayDifference;


					}
				
				
		
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
		// alert($scope.totaluser);
		// 	alert($scope.payroll_price1);

		

					}


							if($scope.face111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.face_price = (x*$scope.tabledata[7]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.face_price = (x*$scope.tabledata[8]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.face_price = (x*$scope.tabledata[9]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.face_price = (x*$scope.tabledata[10]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.face_price = (x*$scope.tabledata[11]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.face_price = (x*$scope.tabledata[12]['face_recognization']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.face_price = (x*$scope.tabledata[13]['face_recognization']/30)*$scope.dayDifference;

			}	
						
				
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.face111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.face_price = (y*$scope.tabledata[7]['face_recognization']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.face_price = (y*$scope.tabledata[8]['face_recognization']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.face_price = (y*$scope.tabledata[9]['face_recognization']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.face_price = (y*$scope.tabledata[10]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.face_price = (y*$scope.tabledata[11]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.face_price = (y*$scope.tabledata[12]['face_recognization']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.face_price = (y*$scope.tabledata[13]['face_recognization']/30)*$scope.dayDifference;


					}
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}

					if($scope.device111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.device_price = (x*$scope.tabledata[7]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.device_price = (x*$scope.tabledata[8]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.device_price = (x*$scope.tabledata[9]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.device_price = (x*$scope.tabledata[10]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.device_price = (x*$scope.tabledata[11]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.device_price = (x*$scope.tabledata[12]['device_verification']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.device_price = (x*$scope.tabledata[13]['device_verification']/30)*$scope.dayDifference;

			}	
						
				
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.device111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.device_price = (y*$scope.tabledata[7]['device_verification']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.device_price = (y*$scope.tabledata[8]['device_verification']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.device_price = (y*$scope.tabledata[9]['device_verification']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.device_price = (y*$scope.tabledata[10]['device_verification']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.device_price = (y*$scope.tabledata[11]['device_verification']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.device_price = (y*$scope.tabledata[12]['device_verification']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.device_price = (y*$scope.tabledata[13]['device_verification']/30)*$scope.dayDifference;


					}
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}
					

					if($scope.timeoffs111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.timeoff_price = (x*$scope.tabledata[7]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.timeoff_price = (x*$scope.tabledata[8]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.timeoff_price = (x*$scope.tabledata[9]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.timeoff_price = (x*$scope.tabledata[10]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.timeoff_price = (x*$scope.tabledata[11]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.timeoff_price = (x*$scope.tabledata[12]['time_off']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.timeoff_price = (x*$scope.tabledata[13]['time_off']/30)*$scope.dayDifference;

			}	
						
				
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.timeoffs111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.timeoff_price = (y*$scope.tabledata[7]['time_off']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.timeoff_price = (y*$scope.tabledata[8]['time_off']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.timeoff_price = (y*$scope.tabledata[9]['time_off']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.timeoff_price = (y*$scope.tabledata[10]['time_off']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.timeoff_price = (y*$scope.tabledata[11]['time_off']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.timeoff_price = (y*$scope.tabledata[12]['time_off']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.timeoff_price = (y*$scope.tabledata[13]['time_off']/30)*$scope.dayDifference;


					}
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}

					var x = $scope.nouser;
						switch(true)
			 {
			 	case (x >=1 && x <=20):
			 	$scope.amount = (x*$scope.tabledata[7]['monthly']/30)*$scope.dayDifference;
					
					break;
				case (x >= 21 && x <= 40):
				$scope.amount = (x*$scope.tabledata[8]['monthly']/30)*$scope.dayDifference;
					break;
				case (x >= 41 && x <= 60):
					$scope.amount = (x*$scope.tabledata[9]['monthly']/30)*$scope.dayDifference;
					break;
				case (x >= 61 && x <= 80):
				$scope.amount = (x*$scope.tabledata[10]['monthly']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.amount = (x*$scope.tabledata[11]['monthly']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.amount = (x*$scope.tabledata[12]['monthly']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.amount = (x*$scope.tabledata[13]['monthly']/30)*$scope.dayDifference;


// alert($scope.amount);
}

			$scope.amount1=parseFloat($scope.amount).toFixed(2);

				}
				
				else if($scope.month == 'Month'  && $scope.currency == "USD"  && ($scope.monthyear >= 0 && $scope.monthyear < 1 )){
						$scope.useramount = $scope.tabledata[i].monthly;

						// alert("pulkit ka user amount calculation for usd");
					if($scope.bulk111=='1'){

						var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.bulk_attprice = (x*$scope.tabledata[0]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.bulk_attprice = (x*$scope.tabledata[1]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.bulk_attprice = (x*$scope.tabledata[2]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.bulk_attprice = (x*$scope.tabledata[3]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.bulk_attprice = (x*$scope.tabledata[4]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.bulk_attprice = (x*$scope.tabledata[5]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.bulk_attprice = (x*$scope.tabledata[6]['bulk_attendance']/30)*$scope.dayDifference;

			}
					
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						// alert("naye k liye");
					// $scope.amount1=parseFloat($scope.amount).toFixed(2);
					// $scope.amount = x*$scope.tabledata[0]['monthly']*$scope.dayDifference;
						}
						if($scope.bulk111=='0'){

							var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.bulk_attprice = (y*$scope.tabledata[0]['bulk_attendance']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.bulk_attprice = (y*$scope.tabledata[1]['bulk_attendance']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.bulk_attprice = (y*$scope.tabledata[2]['bulk_attendance']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.bulk_attprice = (y*$scope.tabledata[3]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.bulk_attprice = (y*$scope.tabledata[4]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.bulk_attprice = (y*$scope.tabledata[5]['bulk_attendance']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				
				
				$scope.bulk_attprice = (y*$scope.tabledata[6]['bulk_attendance']/30)*$scope.dayDifference;
			

					}
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						

						}

					if($scope.visit111=='1'){

					var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.visit_punchprice = (x*$scope.tabledata[0]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.visit_punchprice = (x*$scope.tabledata[1]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.visit_punchprice = (x*$scope.tabledata[2]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.visit_punchprice = (x*$scope.tabledata[3]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.visit_punchprice = (x*$scope.tabledata[4]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.visit_punchprice = (x*$scope.tabledata[5]['visit_punch']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.visit_punchprice = (x*$scope.tabledata[6]['visit_punch']/30)*$scope.dayDifference;

			}	
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.visit111=='0'){

						var y = $scope.totaluser;

							switch(true)
			     {
			 	case (y >=1 && y <=20):
			 	$scope.visit_punchprice = (y*$scope.tabledata[0]['visit_punch']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.visit_punchprice = (y*$scope.tabledata[1]['visit_punch']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.visit_punchprice = (y*$scope.tabledata[2]['visit_punch']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.visit_punchprice = (y*$scope.tabledata[3]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.visit_punchprice = (y*$scope.tabledata[4]['visit_punch']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.visit_punchprice = (y*$scope.tabledata[5]['visit_punch']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.visit_punchprice = (y*$scope.tabledata[6]['visit_punch']/30)*$scope.dayDifference;


					}
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.geo111=='1'){

				var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.geo_fenceprice = (x*$scope.tabledata[0]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.geo_fenceprice = (x*$scope.tabledata[1]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.geo_fenceprice = (x*$scope.tabledata[2]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.geo_fenceprice = (x*$scope.tabledata[3]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.geo_fenceprice = (x*$scope.tabledata[4]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.geo_fenceprice = (x*$scope.tabledata[5]['geo_fence']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.geo_fenceprice = (x*$scope.tabledata[6]['geo_fence']/30)*$scope.dayDifference;

			}	


						
		
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.geo111=='0'){
						
				var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.geo_fenceprice = (y*$scope.tabledata[0]['geo_fence']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.geo_fenceprice = (y*$scope.tabledata[1]['geo_fence']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.geo_fenceprice = (y*$scope.tabledata[2]['geo_fence']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.geo_fenceprice = (y*$scope.tabledata[3]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.geo_fenceprice = (y*$scope.tabledata[4]['geo_fence']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.geo_fenceprice = (y*$scope.tabledata[5]['geo_fence']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.geo_fenceprice = (y*$scope.tabledata[6]['geo_fence']/30)*$scope.dayDifference;


					}
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.hourly111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.payroll_price = (x*$scope.tabledata[0]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.payroll_price = (x*$scope.tabledata[1]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.payroll_price = (x*$scope.tabledata[2]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.payroll_price = (x*$scope.tabledata[3]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.payroll_price = (x*$scope.tabledata[4]['payroll']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.payroll_price = (x*$scope.tabledata[5]['payroll']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.payroll_price = (x*$scope.tabledata[6]['payroll']/30)*$scope.dayDifference;

			}	

						
				
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}

					if($scope.hourly111=='0'){

						var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.payroll_price = (y*$scope.tabledata[0]['payroll']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.payroll_price = (y*$scope.tabledata[1]['payroll']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.payroll_price = (y*$scope.tabledata[2]['payroll']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.payroll_price = (y*$scope.tabledata[3]['payroll']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.payroll_price = (y*$scope.tabledata[4]['payroll']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.payroll_price = (y*$scope.tabledata[5]['payroll']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.payroll_price = (y*$scope.tabledata[6]['payroll']/30)*$scope.dayDifference;


					}
				
				
		
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
		// alert($scope.totaluser);
		// 	alert($scope.payroll_price1);

		

					}


							if($scope.face111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.face_price = (x*$scope.tabledata[0]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.face_price = (x*$scope.tabledata[1]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.face_price = (x*$scope.tabledata[2]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.face_price = (x*$scope.tabledata[3]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.face_price = (x*$scope.tabledata[4]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.face_price = (x*$scope.tabledata[5]['face_recognization']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.face_price = (x*$scope.tabledata[6]['face_recognization']/30)*$scope.dayDifference;

			}	
						
				
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.face111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.face_price = (y*$scope.tabledata[0]['face_recognization']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.face_price = (y*$scope.tabledata[1]['face_recognization']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.face_price = (y*$scope.tabledata[2]['face_recognization']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.face_price = (y*$scope.tabledata[3]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.face_price = (y*$scope.tabledata[4]['face_recognization']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.face_price = (y*$scope.tabledata[5]['face_recognization']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.face_price = (y*$scope.tabledata[6]['face_recognization']/30)*$scope.dayDifference;


					}
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}

					if($scope.device111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.device_price = (x*$scope.tabledata[0]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.device_price = (x*$scope.tabledata[1]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.device_price = (x*$scope.tabledata[2]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.device_price = (x*$scope.tabledata[3]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.device_price = (x*$scope.tabledata[4]['device_verification']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.device_price = (x*$scope.tabledata[5]['device_verification']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.device_price = (x*$scope.tabledata[6]['device_verification']/30)*$scope.dayDifference;

			}	
						
				
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.device111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.device_price = (y*$scope.tabledata[0]['device_verification']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.device_price = (y*$scope.tabledata[1]['device_verification']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.device_price = (y*$scope.tabledata[2]['device_verification']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.device_price = (y*$scope.tabledata[3]['device_verification']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.device_price = (y*$scope.tabledata[4]['device_verification']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.device_price = (y*$scope.tabledata[5]['device_verification']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.device_price = (y*$scope.tabledata[6]['device_verification']/30)*$scope.dayDifference;


					}
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}
					

					if($scope.timeoffs111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.timeoff_price = (x*$scope.tabledata[0]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.timeoff_price = (x*$scope.tabledata[1]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.timeoff_price = (x*$scope.tabledata[2]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.timeoff_price = (x*$scope.tabledata[3]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.timeoff_price = (x*$scope.tabledata[4]['time_off']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.timeoff_price = (x*$scope.tabledata[5]['time_off']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.timeoff_price = (x*$scope.tabledata[6]['time_off']/30)*$scope.dayDifference;

			}	
						
				
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.timeoffs111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.timeoff_price = (y*$scope.tabledata[0]['time_off']/30)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.timeoff_price = (y*$scope.tabledata[1]['time_off']/30)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.timeoff_price = (y*$scope.tabledata[2]['time_off']/30)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.timeoff_price = (y*$scope.tabledata[3]['time_off']/30)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.timeoff_price = (y*$scope.tabledata[4]['time_off']/30)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.timeoff_price = (y*$scope.tabledata[5]['time_off']/30)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.timeoff_price = (y*$scope.tabledata[6]['time_off']/30)*$scope.dayDifference;


					}
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}

					var x = $scope.nouser;
						switch(true)
			 {
			 	case (x >=1 && x <=20):
			 	$scope.amount = (x*$scope.tabledata[0]['monthly']/30)*$scope.dayDifference;
					
					break;
				case (x >= 21 && x <= 40):
				$scope.amount = (x*$scope.tabledata[1]['monthly']/30)*$scope.dayDifference;
					break;
				case (x >= 41 && x <= 60):
					$scope.amount = (x*$scope.tabledata[2]['monthly']/30)*$scope.dayDifference;
					break;
				case (x >= 61 && x <= 80):
				$scope.amount = (x*$scope.tabledata[3]['monthly']/30)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.amount = (x*$scope.tabledata[4]['monthly']/30)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.amount = (x*$scope.tabledata[5]['monthly']/30)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.amount = (x*$scope.tabledata[6]['monthly']/30)*$scope.dayDifference;


// alert($scope.amount);
}
$scope.amount1=parseFloat($scope.amount).toFixed(2);
				}
				

			}
			else
			{
				//plan is yearly duration extended is 0 and user limit extended and currency is INR

				
				$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);
		if($scope.month == 'Year' && $scope.currency == "INR" && ($scope.monthyear >= 0 && $scope.monthyear < 1 )){

				$scope.useramount = $scope.tabledata[i].yearly;

				if($scope.bulk111=='1'){

						var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.bulk_attprice = (x*12*$scope.tabledata[7]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.bulk_attprice = (x*12*$scope.tabledata[8]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.bulk_attprice = (x*12*$scope.tabledata[9]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.bulk_attprice = (x*12*$scope.tabledata[10]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.bulk_attprice = (x*12*$scope.tabledata[11]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.bulk_attprice = (x*12*$scope.tabledata[12]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.bulk_attprice = (x*12*$scope.tabledata[13]['bulk_attendance']/365)*$scope.dayDifference;

			}
					
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						// alert("naye k liye");

						}
						if($scope.bulk111=='0'){

							var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.bulk_attprice = (y*12*$scope.tabledata[7]['bulk_attendance']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.bulk_attprice = (y*12*$scope.tabledata[8]['bulk_attendance']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.bulk_attprice = (y*12*$scope.tabledata[9]['bulk_attendance']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.bulk_attprice = (y*12*$scope.tabledata[10]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.bulk_attprice = (y*12*$scope.tabledata[11]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.bulk_attprice = (y*12*$scope.tabledata[12]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				
				
				$scope.bulk_attprice = (y*12*$scope.tabledata[13]['bulk_attendance']/365)*$scope.dayDifference;
			

					}
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						

						}
					if($scope.visit111=='1'){

					var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.visit_punchprice = (x*12*$scope.tabledata[7]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.visit_punchprice = (x*12*$scope.tabledata[8]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.visit_punchprice = (x*12*$scope.tabledata[9]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.visit_punchprice = (x*12*$scope.tabledata[10]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.visit_punchprice = (x*12*$scope.tabledata[11]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.visit_punchprice = (x*12*$scope.tabledata[12]['visit_punch']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.visit_punchprice = (x*12*$scope.tabledata[13]['visit_punch']/365)*$scope.dayDifference;

			}	
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.visit111=='0'){

						var y = $scope.totaluser;

							switch(true)
			     {
			 	case (y >=1 && y <=20):
			 	$scope.visit_punchprice = (y*12*$scope.tabledata[7]['visit_punch']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.visit_punchprice = (y*12*$scope.tabledata[8]['visit_punch']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.visit_punchprice = (y*12*$scope.tabledata[9]['visit_punch']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.visit_punchprice = (y*12*$scope.tabledata[10]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.visit_punchprice = (y*12*$scope.tabledata[11]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.visit_punchprice = (y*12*$scope.tabledata[12]['visit_punch']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.visit_punchprice = (y*12*$scope.tabledata[13]['visit_punch']/365)*$scope.dayDifference;


					}
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.geo111=='1'){

				var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[7]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[8]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[9]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[10]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[11]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[12]['geo_fence']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.geo_fenceprice = (x*12*$scope.tabledata[13]['geo_fence']/365)*$scope.dayDifference;

			}	


						
		
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.geo111=='0'){
						
				var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.geo_fenceprice = (y*12*$scope.tabledata[7]['geo_fence']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[8]['geo_fence']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.geo_fenceprice = (y*12*$scope.tabledata[9]['geo_fence']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[10]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[11]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[12]['geo_fence']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.geo_fenceprice = (y*12*$scope.tabledata[13]['geo_fence']/365)*$scope.dayDifference;


					}
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.hourly111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.payroll_price = (x*12*$scope.tabledata[7]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.payroll_price = (x*12*$scope.tabledata[8]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.payroll_price = (x*12*$scope.tabledata[9]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.payroll_price = (x*12*$scope.tabledata[10]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.payroll_price = (x*12*$scope.tabledata[11]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.payroll_price = (x*12*$scope.tabledata[12]['payroll']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.payroll_price = (x*12*$scope.tabledata[13]['payroll']/365)*$scope.dayDifference;

			}	

						
				
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.hourly111=='0'){

						var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.payroll_price = (y*12*$scope.tabledata[7]['payroll']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.payroll_price = (y*12*$scope.tabledata[8]['payroll']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.payroll_price = (y*12*$scope.tabledata[9]['payroll']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.payroll_price = (y*12*$scope.tabledata[10]['payroll']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.payroll_price = (y*12*$scope.tabledata[11]['payroll']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.payroll_price = (y*12*$scope.tabledata[12]['payroll']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.payroll_price = (y*12*$scope.tabledata[13]['payroll']/365)*$scope.dayDifference;


					}
				
				
		
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
		// alert($scope.totaluser);
		// 	alert($scope.payroll_price1);

		

					}


					if($scope.face111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.face_price = (x*12*$scope.tabledata[7]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.face_price = (x*12*$scope.tabledata[8]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.face_price = (x*12*$scope.tabledata[9]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.face_price = (x*12*$scope.tabledata[10]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.face_price = (x*12*$scope.tabledata[11]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.face_price = (x*12*$scope.tabledata[12]['face_recognization']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.face_price = (x*12*$scope.tabledata[13]['face_recognization']/365)*$scope.dayDifference;

			}	
						
				
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.face111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.face_price = (y*12*$scope.tabledata[7]['face_recognization']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.face_price = (y*12*$scope.tabledata[8]['face_recognization']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.face_price = (y*12*$scope.tabledata[9]['face_recognization']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.face_price = (y*12*$scope.tabledata[10]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.face_price = (y*12*$scope.tabledata[11]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.face_price = (y*12*$scope.tabledata[12]['face_recognization']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.face_price = (y*12*$scope.tabledata[13]['face_recognization']/365)*$scope.dayDifference;


					}
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}
					if($scope.device111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.device_price = (x*12*$scope.tabledata[7]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.device_price = (x*12*$scope.tabledata[8]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.device_price = (x*12*$scope.tabledata[9]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.device_price = (x*12*$scope.tabledata[10]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.device_price = (x*12*$scope.tabledata[11]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.device_price = (x*12*$scope.tabledata[12]['device_verification']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.device_price = (x*12*$scope.tabledata[13]['device_verification']/365)*$scope.dayDifference;

			}	
						
				
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.device111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.device_price = (y*12*$scope.tabledata[7]['device_verification']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.device_price = (y*12*$scope.tabledata[8]['device_verification']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.device_price = (y*12*$scope.tabledata[9]['device_verification']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.device_price = (y*12*$scope.tabledata[10]['device_verification']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.device_price = (y*12*$scope.tabledata[11]['device_verification']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.device_price = (y*12*$scope.tabledata[12]['device_verification']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.device_price = (y*12*$scope.tabledata[13]['device_verification']/365)*$scope.dayDifference;


					}
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}
					

					if($scope.timeoffs111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.timeoff_price = (x*12*$scope.tabledata[7]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.timeoff_price = (x*12*$scope.tabledata[8]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.timeoff_price = (x*12*$scope.tabledata[9]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.timeoff_price = (x*12*$scope.tabledata[10]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.timeoff_price = (x*12*$scope.tabledata[11]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.timeoff_price = (x*12*$scope.tabledata[12]['time_off']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.timeoff_price = (x*12*$scope.tabledata[13]['time_off']/365)*$scope.dayDifference;

			}	
						
				
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.timeoffs111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.timeoff_price = (y*12*$scope.tabledata[7]['time_off']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.timeoff_price = (y*12*$scope.tabledata[8]['time_off']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.timeoff_price = (y*12*$scope.tabledata[9]['time_off']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.timeoff_price = (y*12*$scope.tabledata[10]['time_off']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.timeoff_price = (y*12*$scope.tabledata[11]['time_off']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.timeoff_price = (y*12*$scope.tabledata[12]['time_off']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.timeoff_price = (y*12*$scope.tabledata[13]['time_off']/365)*$scope.dayDifference;


					}
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}

					var x = $scope.nouser;
						switch(true)
			 {
			 	case (x >=1 && x <=20):
			 	$scope.amount = (x*$scope.tabledata[7]['yearly']/365)*$scope.dayDifference;
					
					break;
				case (x >= 21 && x <= 40):
				$scope.amount = (x*$scope.tabledata[8]['yearly']/365)*$scope.dayDifference;
					break;
				case (x >= 41 && x <= 60):
					$scope.amount = (x*$scope.tabledata[9]['yearly']/365)*$scope.dayDifference;
					break;
				case (x >= 61 && x <= 80):
				$scope.amount = (x*$scope.tabledata[10]['yearly']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.amount = (x*$scope.tabledata[11]['yearly']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.amount = (x*$scope.tabledata[12]['yearly']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.amount = (x*$scope.tabledata[13]['yearly']/365)*$scope.dayDifference;


// alert($scope.amount);
}
			$scope.amount1=parseFloat($scope.amount).toFixed(2);


		}
		$scope.totaluser  = parseFloat($scope.reguser)+ parseFloat($scope.nouser);
		if($scope.month == 'Year' && $scope.currency == 'USD' && ($scope.monthyear >= 0 && $scope.monthyear < 1 )){

				$scope.useramount = $scope.tabledata[i].yearly;

				if($scope.bulk111=='1'){

						var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.bulk_attprice = (x*12*$scope.tabledata[0]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.bulk_attprice = (x*12*$scope.tabledata[1]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.bulk_attprice = (x*12*$scope.tabledata[2]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.bulk_attprice = (x*12*$scope.tabledata[3]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.bulk_attprice = (x*12*$scope.tabledata[4]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.bulk_attprice = (x*12*$scope.tabledata[5]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.bulk_attprice = (x*12*$scope.tabledata[6]['bulk_attendance']/365)*$scope.dayDifference;

			}
					
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						// alert("naye k liye");

						}
						if($scope.bulk111=='0'){

							var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.bulk_attprice = (y*12*$scope.tabledata[0]['bulk_attendance']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.bulk_attprice = (y*12*$scope.tabledata[1]['bulk_attendance']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.bulk_attprice = (y*12*$scope.tabledata[2]['bulk_attendance']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.bulk_attprice = (y*12*$scope.tabledata[3]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.bulk_attprice = (y*12*$scope.tabledata[4]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.bulk_attprice = (y*12*$scope.tabledata[5]['bulk_attendance']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				
				
				$scope.bulk_attprice = (y*12*$scope.tabledata[6]['bulk_attendance']/365)*$scope.dayDifference;
			

					}
					
					$scope.bulk_attprice1 = " @"+$scope.currency+". "+((($scope.bulk_attprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
						

						}
					if($scope.visit111=='1'){

					var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.visit_punchprice = (x*12*$scope.tabledata[0]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.visit_punchprice = (x*12*$scope.tabledata[1]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.visit_punchprice = (x*12*$scope.tabledata[2]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.visit_punchprice = (x*12*$scope.tabledata[3]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.visit_punchprice = (x*12*$scope.tabledata[4]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.visit_punchprice = (x*12*$scope.tabledata[5]['visit_punch']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.visit_punchprice = (x*12*$scope.tabledata[6]['visit_punch']/365)*$scope.dayDifference;

			}	
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.visit111=='0'){

						var y = $scope.totaluser;

							switch(true)
			     {
			 	case (y >=1 && y <=20):
			 	$scope.visit_punchprice = (y*12*$scope.tabledata[0]['visit_punch']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.visit_punchprice = (y*12*$scope.tabledata[1]['visit_punch']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.visit_punchprice = (y*12*$scope.tabledata[2]['visit_punch']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.visit_punchprice = (y*12*$scope.tabledata[3]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.visit_punchprice = (y*12*$scope.tabledata[4]['visit_punch']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.visit_punchprice = (y*12*$scope.tabledata[5]['visit_punch']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.visit_punchprice = (y*12*$scope.tabledata[6]['visit_punch']/365)*$scope.dayDifference;


					}
						
				
			$scope.visit_punchprice1 = " @"+$scope.currency+". "+((($scope.visit_punchprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.geo111=='1'){

				var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[0]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[1]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[2]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[3]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[4]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.geo_fenceprice = (x*12*$scope.tabledata[5]['geo_fence']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.geo_fenceprice = (x*12*$scope.tabledata[6]['geo_fence']/365)*$scope.dayDifference;

			}	


						
		
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.geo111=='0'){
						
				var y = $scope.totaluser;

							switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.geo_fenceprice = (y*12*$scope.tabledata[0]['geo_fence']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[1]['geo_fence']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.geo_fenceprice = (y*12*$scope.tabledata[2]['geo_fence']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[3]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[4]['geo_fence']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.geo_fenceprice = (y*12*$scope.tabledata[5]['geo_fence']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.geo_fenceprice = (y*12*$scope.tabledata[6]['geo_fence']/365)*$scope.dayDifference;


					}
			$scope.geo_fenceprice1 = " @"+$scope.currency+". "+((($scope.geo_fenceprice)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.hourly111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.payroll_price = (x*12*$scope.tabledata[0]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.payroll_price = (x*12*$scope.tabledata[1]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.payroll_price = (x*12*$scope.tabledata[2]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.payroll_price = (x*12*$scope.tabledata[3]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.payroll_price = (x*12*$scope.tabledata[4]['payroll']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.payroll_price = (x*12*$scope.tabledata[5]['payroll']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.payroll_price = (x*12*$scope.tabledata[6]['payroll']/365)*$scope.dayDifference;

			}	

						
				
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					if($scope.hourly111=='0'){

						var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.payroll_price = (y*12*$scope.tabledata[0]['payroll']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.payroll_price = (y*12*$scope.tabledata[1]['payroll']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.payroll_price = (y*12*$scope.tabledata[2]['payroll']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.payroll_price = (y*12*$scope.tabledata[3]['payroll']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.payroll_price = (y*12*$scope.tabledata[4]['payroll']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.payroll_price = (y*12*$scope.tabledata[5]['payroll']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.payroll_price = (y*12*$scope.tabledata[6]['payroll']/365)*$scope.dayDifference;


					}
				
				
		
			$scope.payroll_price1 = " @"+$scope.currency+". "+((($scope.payroll_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";
		// alert($scope.totaluser);
		// 	alert($scope.payroll_price1);

		

					}


					if($scope.face111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.face_price = (x*12*$scope.tabledata[0]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.face_price = (x*12*$scope.tabledata[1]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.face_price = (x*12*$scope.tabledata[2]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.face_price = (x*12*$scope.tabledata[3]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.face_price = (x*12*$scope.tabledata[4]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.face_price = (x*12*$scope.tabledata[5]['face_recognization']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.face_price = (x*12*$scope.tabledata[6]['face_recognization']/365)*$scope.dayDifference;

			}	
						
				
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.face111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.face_price = (y*12*$scope.tabledata[0]['face_recognization']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.face_price = (y*12*$scope.tabledata[1]['face_recognization']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.face_price = (y*12*$scope.tabledata[2]['face_recognization']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.face_price = (y*12*$scope.tabledata[3]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.face_price = (y*12*$scope.tabledata[4]['face_recognization']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.face_price = (y*12*$scope.tabledata[5]['face_recognization']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.face_price = (y*12*$scope.tabledata[6]['face_recognization']/365)*$scope.dayDifference;


					}
			$scope.face_price1 = " @"+$scope.currency+". "+((($scope.face_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}
					if($scope.device111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.device_price = (x*12*$scope.tabledata[0]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.device_price = (x*12*$scope.tabledata[1]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.device_price = (x*12*$scope.tabledata[2]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.device_price = (x*12*$scope.tabledata[3]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.device_price = (x*12*$scope.tabledata[4]['device_verification']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.device_price = (x*12*$scope.tabledata[5]['device_verification']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.device_price = (x*12*$scope.tabledata[6]['device_verification']/365)*$scope.dayDifference;

			}	
						
				
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.device111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.device_price = (y*12*$scope.tabledata[0]['device_verification']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.device_price = (y*12*$scope.tabledata[1]['device_verification']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.device_price = (y*12*$scope.tabledata[2]['device_verification']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.device_price = (y*12*$scope.tabledata[3]['device_verification']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.device_price = (y*12*$scope.tabledata[4]['device_verification']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.device_price = (y*12*$scope.tabledata[5]['device_verification']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.device_price = (y*12*$scope.tabledata[6]['device_verification']/365)*$scope.dayDifference;


					}
			$scope.device_price1 = " @"+$scope.currency+". "+((($scope.device_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}
					

					if($scope.timeoffs111=='1'){

							var x = $scope.nouser;
						switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				$scope.timeoff_price = (x*12*$scope.tabledata[0]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 21 && x <= 40):
				$scope.timeoff_price = (x*12*$scope.tabledata[1]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 41 && x <= 60):
				$scope.timeoff_price = (x*12*$scope.tabledata[2]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 61 && x <= 80):
				$scope.timeoff_price = (x*12*$scope.tabledata[3]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.timeoff_price = (x*12*$scope.tabledata[4]['time_off']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.timeoff_price = (x*12*$scope.tabledata[5]['time_off']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.timeoff_price = (x*12*$scope.tabledata[6]['time_off']/365)*$scope.dayDifference;

			}	
						
				
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.nouser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

					}
					
					if($scope.timeoffs111=='0'){
						
				var y = $scope.totaluser;
						switch(true)
			 {
			 	case (y >=1 && y <=20):
			 	$scope.timeoff_price = (y*12*$scope.tabledata[0]['time_off']/365)*$scope.dayDifference;
					
					break;
				case (y >= 21 && y <= 40):
				$scope.timeoff_price = (y*12*$scope.tabledata[1]['time_off']/365)*$scope.dayDifference;
					break;
				case (y >= 41 && y <= 60):
					$scope.timeoff_price = (y*12*$scope.tabledata[2]['time_off']/365)*$scope.dayDifference;
					break;
				case (y >= 61 && y <= 80):
				$scope.timeoff_price = (y*12*$scope.tabledata[3]['time_off']/365)*$scope.dayDifference;
				break;
				case (y >= 81 && y <= 100):
				$scope.timeoff_price = (y*12*$scope.tabledata[4]['time_off']/365)*$scope.dayDifference;
				break;
				case (y >= 101 && y <= 120):
				$scope.timeoff_price = (y*12*$scope.tabledata[5]['time_off']/365)*$scope.dayDifference;
				break;
				case y > 120 :
				$scope.timeoff_price = (y*12*$scope.tabledata[6]['time_off']/365)*$scope.dayDifference;


					}
			$scope.timeoff_price1 = " @"+$scope.currency+". "+((($scope.timeoff_price)/($scope.totaluser*$scope.dayDifference)).toFixed(4))+"/ User / Day";

								
					}

					var x = $scope.nouser;
						switch(true)
			 {
			 	case (x >=1 && x <=20):
			 	$scope.amount = (x*$scope.tabledata[0]['yearly']/365)*$scope.dayDifference;
					
					break;
				case (x >= 21 && x <= 40):
				$scope.amount = (x*$scope.tabledata[1]['yearly']/365)*$scope.dayDifference;
					break;
				case (x >= 41 && x <= 60):
					$scope.amount = (x*$scope.tabledata[2]['yearly']/365)*$scope.dayDifference;
					break;
				case (x >= 61 && x <= 80):
				$scope.amount = (x*$scope.tabledata[3]['yearly']/365)*$scope.dayDifference;
				break;
				case (x >= 81 && x <= 100):
				$scope.amount = (x*$scope.tabledata[4]['yearly']/365)*$scope.dayDifference;
				break;
				case (x >= 101 && x <= 120):
				$scope.amount = (x*$scope.tabledata[5]['yearly']/365)*$scope.dayDifference;
				break;
				case x > 120 :
				$scope.amount = (x*$scope.tabledata[6]['yearly']/365)*$scope.dayDifference;


// alert($scope.amount);
}
			$scope.amount1=parseFloat($scope.amount).toFixed(2);


		}
				if($scope.monthyear == "" && $scope.dayDifference < 364 && $scope.month=='Year' && $scope.nouser!= ""){
// alert("chfgfsddsf");
					$scope.useramount = ($scope.tabledata[i].monthly/30).toFixed(2);
					// alert($scope.useramount);
				}

				else{
				
				$scope.useramount = $scope.tabledata[i].yearly;

			}
			
				
			}
		}
		}
	}
	//console.log($scope.useramount);
// alert($scope.nouser);
// alert($scope.useramount);
	if($scope.nouser == 0){
		// alert("equal to zero");
	$scope.amountper = parseFloat($scope.useramount * $scope.reguser).toFixed(2);
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
	// alert($scope.useramount);
}
else if($scope.monthyear == 0){
// alert($scope.dayDifference);
	if($scope.dayDifference > 364){
	// alert("yearly");
	$scope.month = 'Year';
	// alert($scope.useramount);
	// alert($scope.useramount/365 * $scope.nouser * $scope.dayDifference);
	// alert("hello");
	$scope.amountper = parseFloat($scope.useramount/365 * $scope.nouser * $scope.dayDifference).toFixed(2);
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
	
	 $scope.useramountyear = parseFloat($scope.useramount/365).toFixed(2);
	 // alert($scope.amountper1);
	 // alert($scope.useramountyear);
}
else if($scope.dayDifference < 364 && $scope.month == 'Year'){
	// alert("hjdffdfd");
	// alert($scope.useramount);
	$scope.amountper = parseFloat($scope.useramount * $scope.nouser * $scope.dayDifference).toFixed(2);
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
	$scope.useramountmonth = parseFloat($scope.useramount).toFixed(2);
}
else{
	$scope.month = 'Month';
// alert("monthly");
// alert($scope.month);
	// alert($scope.useramount);
	// alert($scope.useramount/30);
	$scope.amountper = parseFloat($scope.useramount/30 * $scope.nouser * $scope.dayDifference).toFixed(2);
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
	$scope.useramountmonth = parseFloat($scope.useramount/30).toFixed(2);
	
	// alert($scope.amountper1);
	// alert($scope.useramountmonth);
}

}
	else{
		// alert("more than zero");
		// alert($scope.today111);
		// alert($scope.enddateupg1);

		if($scope.today111 > $scope.enddateupg1){
			$scope.dayDifference = 0;
			// alert("today bada hai");
		$scope.amountper = parseFloat($scope.useramount * $scope.totaluser).toFixed(2);
	
		$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
}

else{

	
 // alert("today chota hai");
 // alert($scope.dayDifference);
 // alert($scope.useramout);
 if($scope.dayDifference > 364 && $scope.month=='Year'){
 	// alert("hello1");
$scope.amountper = parseFloat(parseFloat(($scope.useramount * $scope.totaluser)) +  parseFloat(($scope.useramount/365 * $scope.nouser * $scope.dayDifference))).toFixed(2);
	
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
}
else if($scope.dayDifference > 364 && $scope.month=='Month'){

	 // $scope.month ='Year';
	 // $scope.useramount = 'yearly';
	// alert($scope.useramount);
// alert($scope.month);
// alert("hiiii123");
// alert($scope.month);
// alert($scope.useramount);
$scope.amountper = parseFloat(parseFloat(($scope.useramount * $scope.totaluser)) +  parseFloat(($scope.useramount/30 * $scope.nouser * $scope.dayDifference))).toFixed(2);
	
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
}

else if ($scope.dayDifference < 364 && $scope.month=='Year'){
// alert($scope.totaluser);
// alert("hiiii");
// alert($scope.useramount);
// alert($scope.dayDifference);
// alert($scope.month);
	$scope.amountper = parseFloat(parseFloat(($scope.useramount * $scope.totaluser )) + parseFloat(($scope.useramount/365 * $scope.nouser * $scope.dayDifference))).toFixed(2);
	
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
	// alert($scope.amountper);
	// alert($scope.amountper1);
}
else{
	// alert("hello2");
	$scope.amountper = parseFloat(parseFloat(($scope.useramount * $scope.totaluser )) + parseFloat(($scope.useramount/30 * $scope.nouser * $scope.dayDifference))).toFixed(2);
	
	$scope.amountper1 = parseFloat($scope.amountper).toFixed(2);
	// alert($scope.amountper);
}

}


}
	
 }
 $scope.today = dd + '-' + mm + '-' + yyyy;
 $scope.today = new Date();

 // alert(today);
 // app.controller('payCtrl', ['$scope', '$http', '$filter', function ($scope, $http, $filter) {
 //        $scope.today1 = $filter('today')('dd-mm-yyyy', "dd/MMM/yyyy");
 //   }]);
 //   alert($scope.today);
 //   alert($scope.today1);

 $scope.calculate = function()
 {
	 
	
	
	// if($scope.referralDiscountFetched==0&&$scope.amount>0)
	// {
	// 	//$scope.referralDiscountFetched++;
	// 	$http({
	// 	//	url: 'https://ubiattendance.ubihrm.com/index.php/Att_services/calculateReferralDiscount',
	// 	url: 'http://ubiattendance.zentylpro.com/index.php/Att_services/calculateReferralDiscount?orgId='+orgIdForReferrals,
	// 		method: "GET",
			
			
	// 	}).success(function (data, status, headers, config) {
			
	// 		if(data)
	// 		{	
	// 	console.log(data);
	// 		 $scope.discountDollar=parseFloat(data.referrenceDiscountDollar)+parseFloat(data.referrerDiscountDollar);
			 
	// 		 $scope.discountRupee=parseFloat(data.referrenceDiscountRupee)+parseFloat(data.referrerDiscountRupee);
			 
	// 		 $scope.discountPercent=parseFloat(data.referrenceDiscountPercent)+parseFloat(data.referrerDiscountPercent);
			 
	// 		 if($scope.currency=='USD'){
	// 			 $http({
	// 				url: 'https://api.exchangeratesapi.io/latest?symbols=USD&base=INR',
	// 				method: "GET",
	// 			}).success(function (data, status, headers, config) {
	// 				//alert();
	// 				console.log(data.rates.USD);
					
					
	// 				// $scope.discountRupee=$scope.discountRupee*data.rates.USD;
					
	// 				// calculateReferralDiscount();

					
	// 			}).error(function (data, status, headers, config) {
					
	// 				alert("There is some error while getting currency conversion rates.");
	// 			});
				
	// 		 }
	// 		 else
	// 		 if($scope.currency=='INR'){
	// 			 $http({
	// 				url: 'https://api.exchangeratesapi.io/latest?symbols=INR&base=USD',
	// 				method: "GET",
	// 			}).success(function (data, status, headers, config) {
	// 				//alert();
	// 				console.log(data.rates.INR);
					
					
	// 				// $scope.discountDollar=$scope.discountDollar*data.rates.INR;
	// 				// calculateReferralDiscount();
	// 				//console.log($scope.discountDollar);
	// 			}).error(function (data, status, headers, config) {
					
	// 				alert("There is some error while getting currency conversion rates.");
	// 			});
				
	// 		 }
			 
			 
			 
			 
	// 		} 
			
			
	// 	}).error(function (data, status, headers, config) {
			
	// 		// alert("There is some error while fetching referral discount.");
	// 	});
		
		
	// }
	
	
	
	
	  $scope.currency = $('#currency').val();
	  $scope.orgid = $("#OrganizationId").text();
// console.log($scope.currency);
 //console.log($scope.orgid);
	// console.log($scope.monthyear);
	
	 if($scope.monthyear==""||$scope.monthyear == 0)
	 {
			

	 	if($scope.dayDifference > 364){

	 		$scope.month = 'Year';
	 		$scope.monthyear = 0;
	 			 	}
	 	else{

	 		$scope.month = 'Month';
	 		$scope.monthyear = 0;
	 	}
		// alert('f');
		// return false;

		// alert("hello ubitech solutions");
		 
	 }
	 
	 else
	 {
		 //alert('okkkk');
		 if($scope.currency == "INR")
		 {
			$scope.tax = 18; 
		 }
		 else
		 {
			$scope.tax = 0; 
		 }
		 $scope.fetchdiscount();
		
		  //console.log($scope.monthyear);
		 // console.log($scope.month);
		 // console.log($scope.currency);
		 // if( $scope.monthyear < 1  && $scope.month == 'Year'  && $scope.currency == "INR"){


		 // 	alert('hiiii122');
		 // }
		 // alert($scope.monthyear);

		 	// alert($scope.monthyear);

		 	
		 if($scope.month == 'Month'  && $scope.currency == 'INR' && ($scope.monthyear >= 0 && $scope.monthyear < 1)){

		 	// alert("hrty");
		 	enddate($scope.enddateupg1);
			 
			 var x = $scope.nouser;
			 var y = $scope.totaluser;
			 

			 switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				// alert("hiiiii");


					 $scope.amount = x*$scope.tabledata[7]['monthly']*$scope.dayDifference;
					  if($scope.bulk111==1){
					 $scope.bulk_attprice = (x*$scope.tabledata[7]['bulk_attendance']/30)*$scope.dayDifference;
					}
					else{
						$scope.bulk_attprice = (y*$scope.tabledata[7]['bulk_attendance']/30)*$scope.dayDifference;
					}
					 $scope.geo_fenceprice = x*$scope.tabledata[7]['geo_fence']*$scope.dayDifference;
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price = x*$scope.tabledata[7]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[7]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =x*$scope.tabledata[7]['time_off']*$scope.dayDifference;
					 //console.log($scope.tabledata[7]['bulk_attendance']);
					// console.log($scope.tabledata[7]['monthly']);
					break;
				case (x >= 21 && x <= 40):
					$scope.amount = x*$scope.tabledata[8]['monthly']*$scope.dayDifference;
					 $scope.bulk_attprice = x*$scope.tabledata[8]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[8]['geo_fence']*$scope.dayDifference;
					//$scope.location_traceprice = x*$scope.tabledata[8]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[8]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[8]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[8]['time_off']*$scope.dayDifference;
					 break;
				case (x >= 41 && x <= 60):
					$scope.amount = x*$scope.tabledata[9]['monthly']*$scope.dayDifference;
					$scope.bulk_attprice = x*$scope.tabledata[9]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[9]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[9]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price = x*$scope.tabledata[9]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[9]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =x*$scope.tabledata[9]['time_off']*$scope.dayDifference;
					break;
				case (x >= 61 && x <= 80):
					$scope.amount = x*$scope.tabledata[10]['monthly']*$scope.dayDifference;
					 $scope.bulk_attprice = x*$scope.tabledata[10]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[10]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[10]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[10]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[10]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[10]['time_off']*$scope.dayDifference;
					break;
				case (x >= 81 && x <= 100):
					$scope.amount = x*$scope.tabledata[11]['monthly']*$scope.dayDifference;
					 $scope.bulk_attprice = x*$scope.tabledata[11]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[11]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[11]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[11]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[11]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[11]['time_off']*$scope.dayDifference;
					break;
				case (x >= 101 && x <= 120):
					
					$scope.amount = x*$scope.tabledata[12]['monthly']*$scope.dayDifference;
					 
					 if($scope.bulk111=='1'){
					 $scope.bulk_attprice = x*$scope.tabledata[12]['bulk_attendance']/30*$scope.dayDifference;
					}
					else{
					$scope.bulk_attprice = y*$scope.tabledata[12]['bulk_attendance']/30*$scope.dayDifference;
					}
					 $scope.geo_fenceprice = x*$scope.tabledata[12]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[12]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[12]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[12]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[12]['time_off']*$scope.dayDifference;
					break;
                case x > 120:
					$scope.amount = x*$scope.tabledata[13]['monthly']*$scope.dayDifference;
					$scope.bulk_attprice = x*$scope.tabledata[13]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[13]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[13]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[13]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[13]['visit_punch']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[13]['time_off']*$scope.dayDifference;
					break;					
			}
			
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(x*$scope.dayDifference)+"/ day"+ $scope.month;
			 
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.location_traceprice1 = "@"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(x*$scope.dayDifference)+"/ day"+$scope.month;


		 }


// this is for upgrade both currency inr and plan is yearly
else if(($scope.month == 'Year' || ($scope.monthyear >= 12 && $scope.month == 'Month' )) && $scope.currency == "INR" && $scope.nouser!='' )
		 {
		 	// alert("ye both wala case hai yearly ka");
			   if($scope.monthyear >= 12 &&$scope.month == 'Month')
			   {
				  enddate($scope.monthyear);
				  $scope.flage = 12;
				  $scope.monthyear1 = $scope.monthyear;
				  // alert($scope.monthyear1);
			   }
			   else
			   {
				  enddate($scope.monthyear*12);
				  $scope.monthyear1 = $scope.monthyear*12;
			   }
			  // alert($scope.monthyear);
			 var x = $scope.nouser;
			 var y = parseInt($scope.nouser) + parseInt($scope.reguser);
			 
			 // alert(y);
			 switch(true){
				case (y >=1 && y <=20):

					$scope.amount = y*$scope.tabledata[7]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	
					 	$scope.bulk_attprice = y*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[7]['bulk_attendance']/30*$scope.dayDifference);
					 	
					 }
					 if($scope.bulk111 == 0){

					 	$scope.bulk_attprice = (y*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[7]['bulk_attendance']/30*y*$scope.dayDifference);
					 // alert($scope.bulk_attprice);
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[7]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[7]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[7]['geo_fence']*$scope.monthyear1)+($scope.tabledata[7]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[7]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[7]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[7]['payroll']*$scope.monthyear1)+($scope.tabledata[7]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[7]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[7]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[7]['visit_punch']*$scope.monthyear1)+($scope.tabledata[7]['visit_punch']/30*y*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[7]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[7]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[7]['face_recognization']*$scope.monthyear1)+($scope.tabledata[7]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[7]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[7]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[7]['device_verification']*$scope.monthyear1)+($scope.tabledata[7]['device_verification']/30*y*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[7]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[7]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[7]['time_off']*$scope.monthyear1)+($scope.tabledata[7]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 21 && y <= 40):
					$scope.amount = y*$scope.tabledata[8]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[8]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[8]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[8]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[8]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[8]['geo_fence']*$scope.monthyear1)+($scope.tabledata[8]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[8]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[8]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[8]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[8]['payroll']*$scope.monthyear1)+($scope.tabledata[8]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[8]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[8]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[8]['visit_punch']*$scope.monthyear1)+($scope.tabledata[8]['visit_punch']/30*y*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[8]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[8]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[8]['face_recognization']*$scope.monthyear1)+($scope.tabledata[8]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[8]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[8]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[8]['device_verification']*$scope.monthyear1)+($scope.tabledata[8]['device_verification']/30*y*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[8]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[8]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[8]['time_off']*$scope.monthyear1)+($scope.tabledata[8]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 41 && y <= 60):
					$scope.amount = y*$scope.tabledata[9]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[9]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[9]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[9]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[9]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[9]['geo_fence']*$scope.monthyear1)+($scope.tabledata[9]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[9]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[9]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[9]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[9]['payroll']*$scope.monthyear1)+($scope.tabledata[9]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[9]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[9]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[9]['visit_punch']*$scope.monthyear1)+($scope.tabledata[9]['visit_punch']/30*y*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[9]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[9]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[9]['face_recognization']*$scope.monthyear1)+($scope.tabledata[9]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[9]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[9]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[9]['device_verification']*$scope.monthyear1)+($scope.tabledata[9]['device_verification']/30*y*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[9]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[9]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[9]['time_off']*$scope.monthyear1)+($scope.tabledata[9]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 61 && y <= 80):
					$scope.amount = y*$scope.tabledata[10]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[10]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[10]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[10]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[10]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[10]['geo_fence']*$scope.monthyear1)+($scope.tabledata[10]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[10]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[10]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[10]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[10]['payroll']*$scope.monthyear1)+($scope.tabledata[10]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[10]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[10]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[10]['visit_punch']*$scope.monthyear1)+($scope.tabledata[10]['visit_punch']/30*y*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[10]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[10]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[10]['face_recognization']*$scope.monthyear1)+($scope.tabledata[10]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[10]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[10]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[10]['device_verification']*$scope.monthyear1)+($scope.tabledata[10]['device_verification']/30*y*$scope.dayDifference);
					}


					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[10]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[10]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[10]['time_off']*$scope.monthyear1)+($scope.tabledata[10]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 81 && y <= 100):
					$scope.amount = y*$scope.tabledata[11]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[11]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[11]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[11]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[11]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[11]['geo_fence']*$scope.monthyear1)+($scope.tabledata[11]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[11]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[11]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[11]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[11]['payroll']*$scope.monthyear1)+($scope.tabledata[11]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[11]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[11]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[11]['visit_punch']*$scope.monthyear1)+($scope.tabledata[11]['visit_punch']/30*y*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[11]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[11]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[11]['face_recognization']*$scope.monthyear1)+($scope.tabledata[11]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[11]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[11]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[11]['device_verification']*$scope.monthyear1)+($scope.tabledata[11]['device_verification']/30*y*$scope.dayDifference);
					}

					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[11]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[11]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[11]['time_off']*$scope.monthyear1)+($scope.tabledata[11]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 101 && y <= 120):
					$scope.amount = y*$scope.tabledata[12]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[12]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[12]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[12]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[12]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[12]['geo_fence']*$scope.monthyear1)+($scope.tabledata[12]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[12]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[12]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[12]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[12]['payroll']*$scope.monthyear1)+($scope.tabledata[12]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[12]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[12]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[12]['visit_punch']*$scope.monthyear1)+($scope.tabledata[12]['visit_punch']/30*y*$scope.dayDifference);
					 }


					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[12]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[12]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[12]['face_recognization']*$scope.monthyear1)+($scope.tabledata[12]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[12]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[12]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[12]['device_verification']*$scope.monthyear1)+($scope.tabledata[12]['device_verification']/30*y*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[12]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[12]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[12]['time_off']*$scope.monthyear1)+($scope.tabledata[12]['time_off']/30*y*$scope.dayDifference);
					}
					break;
                case y > 120:
					$scope.amount = y*$scope.tabledata[13]['yearly']*$scope.monthyear/$scope.flage;
					alert($scope.amount);
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[13]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[13]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[13]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[13]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[13]['geo_fence']*$scope.monthyear1)+($scope.tabledata[13]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[13]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[13]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[13]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[13]['payroll']*$scope.monthyear1)+($scope.tabledata[13]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[13]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[13]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[13]['visit_punch']*$scope.monthyear1)+($scope.tabledata[13]['visit_punch']/30*y*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[13]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[13]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[13]['face_recognization']*$scope.monthyear1)+($scope.tabledata[13]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[13]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[13]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[13]['device_verification']*$scope.monthyear1)+($scope.tabledata[13]['device_verification']/30*y*$scope.dayDifference);
					}


					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[13]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[13]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[13]['time_off']*$scope.monthyear1)+($scope.tabledata[13]['time_off']/30*y*$scope.dayDifference);
					}
					break;					
			}
			
				if($scope.bulk111==0 ){

					// alert($scope.bulk_attprice);
					// alert($scope.flage);
					if($scope.flage==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			// alert("hiiii year");
			}
			if($scope.flage!=1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			// alert("hello month");
			}
			// $scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
			// alert($scope.bulk_attprice1);

		}
		if($scope.bulk111==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		}

			 if($scope.geo111==0){

			 	if($scope.flage==1){

			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			
			}
			if($scope.flage!=1){

			  $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			
			}
			} 
			 if($scope.geo111==1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
			} 
			 $scope.location_traceprice1 = " @"+$scope.currency+". "+($scope.location_traceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			  
			   if($scope.hourly111==0){

			   	if($scope.flage==1){

			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){

			 	$scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }


			 }

			  if($scope.hourly111==1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
			 }
			 if($scope.visit111 ==0){
			 	if($scope.flage==1){

			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){
			 	 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }

			 }
			 if($scope.visit111 ==1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(y*$scope.monthyear)+"/dayabcaad"+$scope.month ;
			 }

			 if($scope.face111 ==0){
			  	if($scope.flage == 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.face111 ==1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

		 	  if($scope.device111 ==0){
			  	if($scope.flage == 1){
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.device111 ==1){
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

			  if($scope.timeoffs111 ==0){
			  	if($scope.flage == 1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.timeoffs111 ==1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }


		 }
		
		 //this else if is for upgrading both and plan is monthly
		 else if($scope.month == 'Month' && $scope.currency == "INR" && $scope.nouser!='' && ($scope.monthyear >= 1 && $scope.monthyear < 12) ){


		 	// alert("ye both wala case hai monthly ka");

		 		enddate($scope.monthyear);
			 var x = $scope.nouser;
			 var y = parseInt($scope.nouser) + parseInt($scope.reguser) ;
			 // alert(x);
			 // alert(y);

			 switch(true)
			 {
				case (y >=1 && y <=20):
				
					 $scope.amount = y*$scope.tabledata[7]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[7]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[7]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[7]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[7]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[7]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[7]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[7]['payroll']*$scope.monthyear +(x*$scope.tabledata[7]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[7]['payroll']*$scope.monthyear +(y*$scope.tabledata[7]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[7]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[7]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[7]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[7]['visit_punch']/30*$scope.dayDifference);
					 }


						  if($scope.device111 == 1){

					 $scope.device_price =y*$scope.tabledata[7]['device_verification']*$scope.monthyear +(x*$scope.tabledata[7]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[7]['device_verification']*$scope.monthyear +(y*$scope.tabledata[7]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[7]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[7]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[7]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[7]['face_recognization']/30*$scope.dayDifference);
					}

					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[7]['time_off']*$scope.monthyear +(x*$scope.tabledata[7]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[7]['time_off']*$scope.monthyear +(y*$scope.tabledata[7]['time_off']/30*$scope.dayDifference);
					}
					 //console.log($scope.tabledata[7]['bulk_attendance']);
					// console.log($scope.tabledata[7]['monthly']);
					break;
					case (y >= 21 && y <= 40):
					$scope.amount = y*$scope.tabledata[8]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[8]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[8]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[8]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[8]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[8]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[8]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[8]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[8]['payroll']*$scope.monthyear +(x*$scope.tabledata[8]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[8]['payroll']*$scope.monthyear +(y*$scope.tabledata[8]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[8]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[8]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[8]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[8]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[8]['device_verification']*$scope.monthyear +(x*$scope.tabledata[8]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[8]['device_verification']*$scope.monthyear +(y*$scope.tabledata[8]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[8]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[8]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[8]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[8]['face_recognization']/30*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[8]['time_off']*$scope.monthyear +(x*$scope.tabledata[8]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[8]['time_off']*$scope.monthyear +(y*$scope.tabledata[8]['time_off']/30*$scope.dayDifference);
					}
					 break;
				case (y >= 41 && y <= 60):
					$scope.amount = y*$scope.tabledata[9]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){

					 $scope.bulk_attprice = y*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[9]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 	
					 $scope.bulk_attprice = (y*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear)+(y*$scope.tabledata[9]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[9]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[9]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[9]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[9]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[9]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[9]['payroll']*$scope.monthyear +(x*$scope.tabledata[9]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[9]['payroll']*$scope.monthyear +(y*$scope.tabledata[9]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[9]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[9]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[9]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[9]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[9]['device_verification']*$scope.monthyear +(x*$scope.tabledata[9]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[9]['device_verification']*$scope.monthyear +(y*$scope.tabledata[9]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[9]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[9]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[9]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[9]['face_recognization']/30*$scope.dayDifference);
					}




					 if($scope.timeoffs111 == 1){
					 	// alert("ghapla hai");
					 $scope.timeoff_price =y*$scope.tabledata[9]['time_off']*$scope.monthyear +(x*$scope.tabledata[9]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[9]['time_off']*$scope.monthyear +(y*$scope.tabledata[9]['time_off']/30*$scope.dayDifference);
					}
					break;
				case (y >= 61 && y <= 80):
					$scope.amount = y*$scope.tabledata[10]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[10]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[10]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[10]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[10]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[10]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[10]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[10]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[10]['payroll']*$scope.monthyear +(x*$scope.tabledata[10]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[10]['payroll']*$scope.monthyear +(y*$scope.tabledata[10]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[10]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[10]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[10]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[10]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[10]['device_verification']*$scope.monthyear +(x*$scope.tabledata[10]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[10]['device_verification']*$scope.monthyear +(y*$scope.tabledata[10]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[10]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[10]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[10]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[10]['face_recognization']/30*$scope.dayDifference);
					}


					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[10]['time_off']*$scope.monthyear +(x*$scope.tabledata[10]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[10]['time_off']*$scope.monthyear +(y*$scope.tabledata[10]['time_off']/30*$scope.dayDifference);
					}
					break;
				case (y >= 81 && y <= 100):
					$scope.amount = y*$scope.tabledata[11]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[11]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[11]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[11]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[11]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[11]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[11]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[11]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[11]['payroll']*$scope.monthyear +(x*$scope.tabledata[11]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[11]['payroll']*$scope.monthyear +(y*$scope.tabledata[11]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[11]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[11]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[11]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[11]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[11]['device_verification']*$scope.monthyear +(x*$scope.tabledata[11]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[11]['device_verification']*$scope.monthyear +(y*$scope.tabledata[11]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[11]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[11]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[11]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[11]['face_recognization']/30*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[11]['time_off']*$scope.monthyear +(x*$scope.tabledata[11]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[11]['time_off']*$scope.monthyear +(y*$scope.tabledata[11]['time_off']/30*$scope.dayDifference);
					}
					break;
				case (y >= 101 && y <= 120):
					$scope.amount = y*$scope.tabledata[12]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[12]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[12]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[12]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[12]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[12]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[12]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[12]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[12]['payroll']*$scope.monthyear +(x*$scope.tabledata[12]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[12]['payroll']*$scope.monthyear +(y*$scope.tabledata[12]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[12]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[12]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[12]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[12]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[12]['device_verification']*$scope.monthyear +(x*$scope.tabledata[12]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[12]['device_verification']*$scope.monthyear +(y*$scope.tabledata[12]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[12]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[12]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[12]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[12]['face_recognization']/30*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[12]['time_off']*$scope.monthyear +(x*$scope.tabledata[12]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[12]['time_off']*$scope.monthyear +(y*$scope.tabledata[12]['time_off']/30*$scope.dayDifference);
					}
					break;
                case y > 120:
					$scope.amount = y*$scope.tabledata[13]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[13]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[13]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[13]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[13]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[13]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[13]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[13]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[13]['payroll']*$scope.monthyear +(x*$scope.tabledata[13]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[13]['payroll']*$scope.monthyear +(y*$scope.tabledata[13]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[13]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[13]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[13]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[13]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[13]['device_verification']*$scope.monthyear +(x*$scope.tabledata[13]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[13]['device_verification']*$scope.monthyear +(y*$scope.tabledata[13]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[13]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[13]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[13]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[13]['face_recognization']/30*$scope.dayDifference);
					}

					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[13]['time_off']*$scope.monthyear +(x*$scope.tabledata[13]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[13]['time_off']*$scope.monthyear +(y*$scope.tabledata[13]['time_off']/30*$scope.dayDifference);
					}
					break;					
			}
			if($scope.bulk111 == 0){
				// alert($scope.dayDifference);
				// alert($scope.bulk_attprice);
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;

			// (($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
			 }

			 if($scope.bulk111 == 1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(y*$scope.monthyear)+"/"+$scope.month;
			 }
			 if($scope.geo111 == 0){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+(($scope.geo_fenceprice)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			} 
			if($scope.geo111 == 1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(y*$scope.monthyear)+"/"+$scope.month;
			} 
			 // $scope.location_traceprice1 = "@"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.monthyear)+"/"+$scope.month;
			 if($scope.hourly111 == 0){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+(($scope.payroll_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			  if($scope.hourly111 == 1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(y*$scope.monthyear)+"/"+$scope.month;
			 }
			 if($scope.visit111 == 0){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+(($scope.visit_punchprice)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			  if($scope.visit111 == 1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(y*$scope.monthyear)+"/"+$scope.month;
			 }

			  if($scope.face111 == 0){
			 $scope.face_price1 = " @"+$scope.currency+". "+(($scope.face_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
				}
				 if($scope.face111 == 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+$scope.face_price/(y*$scope.monthyear)+"/"+$scope.month;
				}


				if($scope.device111 == 0){
			 $scope.device_price1 = " @"+$scope.currency+". "+(($scope.device_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
				}
				 if($scope.device111 == 1){
			 $scope.device_price1 = " @"+$scope.currency+". "+$scope.device_price/(y*$scope.monthyear)+"/"+$scope.month;
				}



			 
			 if($scope.timeoffs111 == 0){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+(($scope.timeoff_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
				}
				 if($scope.timeoffs111 == 1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(y*$scope.monthyear)+"/"+$scope.month;
				}


		 }

		 // this is for upgrading the duration when currency is inr and plan is monthly and extended user is 0
		else if($scope.month == 'Month' && $scope.currency == "INR" && $scope.nouser=='' && ($scope.monthyear >= 1 && $scope.monthyear < 12) )
		 {
		 	// alert("hrty1");
			//  console.log($scope.monthyear);
			// alert("hello ubitech");
			enddate($scope.monthyear);
			 
			 var x = $scope.nouser;
			 if(x == 0){
			 	// alert('hiii');
			 	var x = $scope.reguser;

			 }
			 // alert(x);
		//	 alert(x);
		//console.log($scope.monthyear);
			 switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				// alert("hiiiii");
					 $scope.amount = x*$scope.tabledata[7]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[7]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[7]['geo_fence']*$scope.monthyear)+($scope.tabledata[7]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[7]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[7]['payroll']*$scope.monthyear)+($scope.tabledata[7]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[7]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[7]['visit_punch']*$scope.monthyear)+($scope.tabledata[7]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[7]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[7]['face_recognization']*$scope.monthyear)+($scope.tabledata[7]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[7]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[7]['device_verification']*$scope.monthyear)+($scope.tabledata[7]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[7]['device_verification']*$scope.monthyear;
					}


					
	

					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[7]['time_off']*$scope.monthyear)+($scope.tabledata[7]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[7]['time_off']*$scope.monthyear;
					}
					 //console.log($scope.tabledata[7]['bulk_attendance']);
					// console.log($scope.tabledata[7]['monthly']);
					break;
				case (x >= 21 && x <= 40):
					 $scope.amount = x*$scope.tabledata[8]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[8]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[8]['geo_fence']*$scope.monthyear)+($scope.tabledata[8]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[8]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[8]['payroll']*$scope.monthyear)+($scope.tabledata[8]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[8]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[8]['visit_punch']*$scope.monthyear)+($scope.tabledata[8]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[8]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[8]['face_recognization']*$scope.monthyear)+($scope.tabledata[8]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[8]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[8]['device_verification']*$scope.monthyear)+($scope.tabledata[8]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[8]['device_verification']*$scope.monthyear;
					}


					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[8]['time_off']*$scope.monthyear)+($scope.tabledata[8]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[8]['time_off']*$scope.monthyear;
					}
					 break;
				case (x >= 41 && x <= 60):
					 $scope.amount = x*$scope.tabledata[9]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[9]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[9]['geo_fence']*$scope.monthyear)+($scope.tabledata[9]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[9]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[9]['payroll']*$scope.monthyear)+($scope.tabledata[9]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[9]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[9]['visit_punch']*$scope.monthyear)+($scope.tabledata[9]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[9]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[9]['face_recognization']*$scope.monthyear)+($scope.tabledata[9]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[9]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[9]['device_verification']*$scope.monthyear)+($scope.tabledata[9]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[9]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[9]['time_off']*$scope.monthyear)+($scope.tabledata[9]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[9]['time_off']*$scope.monthyear;
					}
					break;
				case (x >= 61 && x <= 80):
					 $scope.amount = x*$scope.tabledata[10]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[10]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[10]['geo_fence']*$scope.monthyear)+($scope.tabledata[10]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[10]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[10]['payroll']*$scope.monthyear)+($scope.tabledata[10]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[10]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[10]['visit_punch']*$scope.monthyear)+($scope.tabledata[10]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[10]['visit_punch']*$scope.monthyear;
					}
					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[10]['face_recognization']*$scope.monthyear)+($scope.tabledata[10]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[10]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[10]['device_verification']*$scope.monthyear)+($scope.tabledata[10]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[10]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[10]['time_off']*$scope.monthyear)+($scope.tabledata[10]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[10]['time_off']*$scope.monthyear;
					}
					break;
				case (x >= 81 && x <= 100):
					 $scope.amount = x*$scope.tabledata[11]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[11]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[11]['geo_fence']*$scope.monthyear)+($scope.tabledata[11]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[11]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[11]['payroll']*$scope.monthyear)+($scope.tabledata[11]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[11]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[11]['visit_punch']*$scope.monthyear)+($scope.tabledata[11]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[11]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[11]['face_recognization']*$scope.monthyear)+($scope.tabledata[11]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[11]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[11]['device_verification']*$scope.monthyear)+($scope.tabledata[11]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[11]['device_verification']*$scope.monthyear;
					}	


					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[11]['time_off']*$scope.monthyear)+($scope.tabledata[11]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[11]['time_off']*$scope.monthyear;
					}
					break;
				case (x >= 101 && x <= 120):
					 $scope.amount = x*$scope.tabledata[12]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[12]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[12]['geo_fence']*$scope.monthyear)+($scope.tabledata[12]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[12]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[12]['payroll']*$scope.monthyear)+($scope.tabledata[12]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[12]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[12]['visit_punch']*$scope.monthyear)+($scope.tabledata[12]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[12]['visit_punch']*$scope.monthyear;
					}
					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[12]['face_recognization']*$scope.monthyear)+($scope.tabledata[12]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[12]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[12]['device_verification']*$scope.monthyear)+($scope.tabledata[12]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[12]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[12]['time_off']*$scope.monthyear)+($scope.tabledata[12]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[12]['time_off']*$scope.monthyear;
					}
					break;
                case x > 120:
					 $scope.amount = x*$scope.tabledata[13]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[13]['bulk_attendance']/30*x*$scope.dayDifference);
					// alert($scope.bulk_attprice);
					}
					if($scope.bulk111 == 1){

						$scope.bulk_attprice = x*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear;
						// alert($scope.bulk_attprice);

					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[13]['geo_fence']*$scope.monthyear)+($scope.tabledata[13]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[13]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[13]['payroll']*$scope.monthyear)+($scope.tabledata[13]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[13]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[13]['visit_punch']*$scope.monthyear)+($scope.tabledata[13]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[13]['visit_punch']*$scope.monthyear;
					}
					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[13]['face_recognization']*$scope.monthyear)+($scope.tabledata[13]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[13]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[13]['device_verification']*$scope.monthyear)+($scope.tabledata[13]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[13]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[13]['time_off']*$scope.monthyear)+($scope.tabledata[13]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[13]['time_off']*$scope.monthyear;
					}
					break;					
			}
			// alert(($scope.bulk_attprice)/(x*$scope.monthyear));
			// alert($scope.bulk_attprice);
			// alert(x*$scope.monthyear);
			// alert($scope.bulk_attprice1);
			if($scope.bulk111==0){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
		}
		if($scope.bulk111==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(x*$scope.monthyear)+"/"+$scope.month;
		}
			 // alert($scope.bulk_attprice1);
			 if($scope.geo111==0){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+(($scope.geo_fenceprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			}

			if($scope.geo111==1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(x*$scope.monthyear)+"/"+$scope.month;
			}
			//  if($scope.bulk111==1){
			//  $scope.location_traceprice1 = "@"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.monthyear)+"/daya"+$scope.month;
			// } 
			if($scope.hourly111==0){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+(($scope.payroll_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			if($scope.hourly111==1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(x*$scope.monthyear)+"/"+$scope.month;
			 }
			 if($scope.visit111==0){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+(($scope.visit_punchprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.visit111==1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(x*$scope.monthyear)+"/"+$scope.month;
			 }
			  if($scope.face111==0){
		$scope.face_price1 =	 " @"+$scope.currency+". "+(($scope.face_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.face111==1){
			 $scope.face_price1 = " @"+$scope.currency+". "+$scope.face_price/(x*$scope.monthyear)+"/"+$scope.month;
			}
			 if($scope.device111==0){
		$scope.device_price1 =	 " @"+$scope.currency+". "+(($scope.device_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.device111==1){
			 $scope.device_price1 = " @"+$scope.currency+". "+$scope.device_price/(x*$scope.monthyear)+"/"+$scope.month;
			}
			 if($scope.timeoffs111==0){
		$scope.timeoff_price1 =	 " @"+$scope.currency+". "+(($scope.timeoff_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.timeoffs111==1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(x*$scope.monthyear)+"/"+$scope.month;
			}
		 }

		 // usd code for upgrade start //




else if($scope.month == 'Month'  && $scope.currency == 'USD' && ($scope.monthyear >= 0 && $scope.monthyear < 1)){



		 	// alert("hrtyusdtest");
		 	enddate($scope.enddateupg1);
			 
			 var x = $scope.nouser;
			 var y = $scope.totaluser;
			 

			 switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				// alert("hiiiiiusd");


					 $scope.amount = x*$scope.tabledata[0]['monthly']*$scope.dayDifference;
					 // alert($scope.amount);
					 // alert("scope.amount");
					  if($scope.bulk111==1){
					 $scope.bulk_attprice = (x*$scope.tabledata[0]['bulk_attendance']/30)*$scope.dayDifference;
					}
					else{
						$scope.bulk_attprice = (y*$scope.tabledata[0]['bulk_attendance']/30)*$scope.dayDifference;
					}
					 $scope.geo_fenceprice = x*$scope.tabledata[0]['geo_fence']*$scope.dayDifference;
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price = x*$scope.tabledata[0]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[0]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[0]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[0]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price =x*$scope.tabledata[0]['time_off']*$scope.dayDifference;
					 //console.log($scope.tabledata[0]['bulk_attendance']);
					// console.log($scope.tabledata[0]['monthly']);
					break;
				case (x >= 21 && x <= 40):
					$scope.amount = x*$scope.tabledata[1]['monthly']*$scope.dayDifference;
					// alert("amount ka panga hai");
					// alert($scope.tabledata[1]['monthly']);
					

					 $scope.bulk_attprice = x*$scope.tabledata[1]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[1]['geo_fence']*$scope.dayDifference;
					//$scope.location_traceprice = x*$scope.tabledata[1]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[1]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[1]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[1]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[1]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[1]['time_off']*$scope.dayDifference;
					 break;
				case (x >= 41 && x <= 60):
					$scope.amount = x*$scope.tabledata[2]['monthly']*$scope.dayDifference;
					$scope.bulk_attprice = x*$scope.tabledata[2]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[2]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[2]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price = x*$scope.tabledata[2]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[2]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[2]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[2]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price =x*$scope.tabledata[2]['time_off']*$scope.dayDifference;
					break;
				case (x >= 61 && x <= 80):
					$scope.amount = x*$scope.tabledata[3]['monthly']*$scope.dayDifference;
					 $scope.bulk_attprice = x*$scope.tabledata[3]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[3]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[3]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[3]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[3]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[3]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[3]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[3]['time_off']*$scope.dayDifference;
					break;
				case (x >= 81 && x <= 100):
					$scope.amount = x*$scope.tabledata[4]['monthly']*$scope.dayDifference;
					 $scope.bulk_attprice = x*$scope.tabledata[4]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[4]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[4]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[4]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[4]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[4]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[4]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[4]['time_off']*$scope.dayDifference;
					break;
				case (x >= 101 && x <= 120):
					
					$scope.amount = x*$scope.tabledata[5]['monthly']*$scope.dayDifference;
					 
					 if($scope.bulk111=='1'){
					 $scope.bulk_attprice = x*$scope.tabledata[5]['bulk_attendance']/30*$scope.dayDifference;
					}
					else{
					$scope.bulk_attprice = y*$scope.tabledata[5]['bulk_attendance']/30*$scope.dayDifference;
					}
					 $scope.geo_fenceprice = x*$scope.tabledata[5]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[5]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[5]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[5]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[5]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[5]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price = x*$scope.tabledata[5]['time_off']*$scope.dayDifference;
					break;
                case x > 120:
					$scope.amount = x*$scope.tabledata[6]['monthly']*$scope.dayDifference;
					$scope.bulk_attprice = x*$scope.tabledata[6]['bulk_attendance']*$scope.dayDifference;
					 $scope.geo_fenceprice = x*$scope.tabledata[6]['geo_fence']*$scope.dayDifference;
					// $scope.location_traceprice = x*$scope.tabledata[6]['location_tracing']*$scope.monthyear;
					 $scope.payroll_price =    x*$scope.tabledata[6]['payroll']*$scope.dayDifference;
					 $scope.visit_punchprice = x*$scope.tabledata[6]['visit_punch']*$scope.dayDifference;
					 $scope.face_price = x*$scope.tabledata[6]['face_recognization']*$scope.dayDifference;
					 $scope.device_price = x*$scope.tabledata[6]['device_verification']*$scope.dayDifference;
					 $scope.timeoff_price =    x*$scope.tabledata[6]['time_off']*$scope.dayDifference;
					break;					
			}
			
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(x*$scope.dayDifference)+"/ day"+ $scope.month;
			 
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.location_traceprice1 = "@"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 $scope.face_price1 =  " @"+$scope.currency+". "+$scope.face_price/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 $scope.device_price1 =  " @"+$scope.currency+". "+$scope.device_price/(x*$scope.dayDifference)+"/ day"+$scope.month;
			 
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(x*$scope.dayDifference)+"/ day"+$scope.month;


		 }

		 else if(($scope.month == 'Year' || ($scope.monthyear >= 12 && $scope.month == 'Month' )) && $scope.currency == "USD" && $scope.nouser!='' )
		 {
		 	// alert("ye both wala case hai yearly ka usd");
			   if($scope.monthyear >= 12 &&$scope.month == 'Month')
			   {
				  enddate($scope.monthyear);
				  $scope.flage = 12;
				  $scope.monthyear1 = $scope.monthyear;
				  // alert($scope.monthyear1);
			   }
			   else
			   {
				  enddate($scope.monthyear*12);
				  $scope.monthyear1 = $scope.monthyear*12;
			   }
			  // alert($scope.monthyear);
			 var x = $scope.nouser;
			 // alert(x);
			 var y = parseInt($scope.nouser) + parseInt($scope.reguser);
			 // alert(y);
			 // alert($scope.dayDifference1);
			 // alert(y);
			 switch(true){
				case (y >=1 && y <=20):

					$scope.amount = y*$scope.tabledata[0]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	
					 	$scope.bulk_attprice = y*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[0]['bulk_attendance']/30*$scope.dayDifference);
					 	
					 }
					 if($scope.bulk111 == 0){

					 	$scope.bulk_attprice = (y*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[0]['bulk_attendance']/30*y*$scope.dayDifference);
					 // alert($scope.bulk_attprice);
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[0]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[0]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[0]['geo_fence']*$scope.monthyear1)+($scope.tabledata[0]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[0]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[0]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[0]['payroll']*$scope.monthyear1)+($scope.tabledata[0]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[0]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[0]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[0]['visit_punch']*$scope.monthyear1)+($scope.tabledata[0]['visit_punch']/30*y*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[0]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[0]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[0]['face_recognization']*$scope.monthyear1)+($scope.tabledata[0]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[0]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[0]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[0]['device_verification']*$scope.monthyear1)+($scope.tabledata[0]['device_verification']/30*y*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[0]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[0]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[0]['time_off']*$scope.monthyear1)+($scope.tabledata[0]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 21 && y <= 40):
					$scope.amount = y*$scope.tabledata[1]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[1]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[1]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[1]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[1]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[1]['geo_fence']*$scope.monthyear1)+($scope.tabledata[1]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[1]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[1]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[1]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[1]['payroll']*$scope.monthyear1)+($scope.tabledata[1]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[1]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[1]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[1]['visit_punch']*$scope.monthyear1)+($scope.tabledata[1]['visit_punch']/30*y*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[1]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[1]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[1]['face_recognization']*$scope.monthyear1)+($scope.tabledata[1]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[1]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[1]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[1]['device_verification']*$scope.monthyear1)+($scope.tabledata[1]['device_verification']/30*y*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[1]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[1]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[1]['time_off']*$scope.monthyear1)+($scope.tabledata[1]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 41 && y <= 60):
					$scope.amount = y*$scope.tabledata[2]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[2]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[2]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[2]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[2]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[2]['geo_fence']*$scope.monthyear1)+($scope.tabledata[2]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[2]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[2]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[2]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[2]['payroll']*$scope.monthyear1)+($scope.tabledata[2]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[2]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[2]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[2]['visit_punch']*$scope.monthyear1)+($scope.tabledata[2]['visit_punch']/30*y*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[2]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[2]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[2]['face_recognization']*$scope.monthyear1)+($scope.tabledata[2]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[2]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[2]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[2]['device_verification']*$scope.monthyear1)+($scope.tabledata[2]['device_verification']/30*y*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[2]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[2]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[2]['time_off']*$scope.monthyear1)+($scope.tabledata[2]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 61 && y <= 80):
					$scope.amount = y*$scope.tabledata[3]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[3]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[3]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[3]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[3]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[3]['geo_fence']*$scope.monthyear1)+($scope.tabledata[3]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[3]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[3]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[3]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[3]['payroll']*$scope.monthyear1)+($scope.tabledata[3]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[3]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[3]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[3]['visit_punch']*$scope.monthyear1)+($scope.tabledata[3]['visit_punch']/30*y*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[3]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[3]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[3]['face_recognization']*$scope.monthyear1)+($scope.tabledata[3]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[3]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[3]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[3]['device_verification']*$scope.monthyear1)+($scope.tabledata[3]['device_verification']/30*y*$scope.dayDifference);
					}


					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[3]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[3]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[3]['time_off']*$scope.monthyear1)+($scope.tabledata[3]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 81 && y <= 100):
					$scope.amount = y*$scope.tabledata[4]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[4]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[4]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[4]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[4]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[4]['geo_fence']*$scope.monthyear1)+($scope.tabledata[4]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[4]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[4]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[4]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[4]['payroll']*$scope.monthyear1)+($scope.tabledata[4]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[4]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[4]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[4]['visit_punch']*$scope.monthyear1)+($scope.tabledata[4]['visit_punch']/30*y*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[4]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[4]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[4]['face_recognization']*$scope.monthyear1)+($scope.tabledata[4]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[4]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[4]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[4]['device_verification']*$scope.monthyear1)+($scope.tabledata[4]['device_verification']/30*y*$scope.dayDifference);
					}

					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[4]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[4]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[4]['time_off']*$scope.monthyear1)+($scope.tabledata[4]['time_off']/30*y*$scope.dayDifference);
					}
					break;
				case (y >= 101 && y <= 120):
					$scope.amount = y*$scope.tabledata[5]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[5]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[5]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[5]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[5]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[5]['geo_fence']*$scope.monthyear1)+($scope.tabledata[5]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[5]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[5]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[5]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[5]['payroll']*$scope.monthyear1)+($scope.tabledata[5]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[5]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[5]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[5]['visit_punch']*$scope.monthyear1)+($scope.tabledata[5]['visit_punch']/30*y*$scope.dayDifference);
					 }


					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[5]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[5]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[5]['face_recognization']*$scope.monthyear1)+($scope.tabledata[5]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[5]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[5]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[5]['device_verification']*$scope.monthyear1)+($scope.tabledata[5]['device_verification']/30*y*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[5]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[5]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[5]['time_off']*$scope.monthyear1)+($scope.tabledata[5]['time_off']/30*y*$scope.dayDifference);
					}
					break;
                case y > 120:
					$scope.amount = y*$scope.tabledata[6]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = y*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear1+(x*$scope.tabledata[6]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (y*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[6]['bulk_attendance']/30*y*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = y*$scope.tabledata[6]['geo_fence']*$scope.monthyear1 + (x*$scope.tabledata[6]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (y*$scope.tabledata[6]['geo_fence']*$scope.monthyear1)+($scope.tabledata[6]['geo_fence']/30*y*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[6]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    y*$scope.tabledata[6]['payroll']*$scope.monthyear1 + (x*$scope.tabledata[6]['payroll']/30*$scope.dayDifference);
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (y*$scope.tabledata[6]['payroll']*$scope.monthyear1)+($scope.tabledata[6]['payroll']/30*y*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = y*$scope.tabledata[6]['visit_punch']*$scope.monthyear1 + (x*$scope.tabledata[6]['visit_punch']/30*$scope.dayDifference);
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (y*$scope.tabledata[6]['visit_punch']*$scope.monthyear1)+($scope.tabledata[6]['visit_punch']/30*y*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    y*$scope.tabledata[6]['face_recognization']*$scope.monthyear1 + (x*$scope.tabledata[6]['face_recognization']/30*$scope.dayDifference);
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (y*$scope.tabledata[6]['face_recognization']*$scope.monthyear1)+($scope.tabledata[6]['face_recognization']/30*y*$scope.dayDifference);
					}

					if($scope.device111 == 1){
					
					 $scope.device_price =    y*$scope.tabledata[6]['device_verification']*$scope.monthyear1 + (x*$scope.tabledata[6]['device_verification']/30*$scope.dayDifference);
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (y*$scope.tabledata[6]['device_verification']*$scope.monthyear1)+($scope.tabledata[6]['device_verification']/30*y*$scope.dayDifference);
					}


					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    y*$scope.tabledata[6]['time_off']*$scope.monthyear1 + (x*$scope.tabledata[6]['time_off']/30*$scope.dayDifference);
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (y*$scope.tabledata[6]['time_off']*$scope.monthyear1)+($scope.tabledata[6]['time_off']/30*y*$scope.dayDifference);
					}
					break;					
			}
			
				if($scope.bulk111==0 ){

					// alert($scope.bulk_attprice);
					// alert($scope.flage);
					if($scope.flage==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			// alert("hiiii year");
			}
			if($scope.flage!=1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			// alert("hello month");
			}
			// $scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
			// alert($scope.bulk_attprice1);

		}
		if($scope.bulk111==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		}

			 if($scope.geo111==0){

			 	if($scope.flage==1){

			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			
			}
			if($scope.flage!=1){

			  $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			
			}
			} 
			 if($scope.geo111==1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
			} 
			 $scope.location_traceprice1 = " @"+$scope.currency+". "+($scope.location_traceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			  
			   if($scope.hourly111==0){

			   	if($scope.flage==1){

			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){

			 	$scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }


			 }

			  if($scope.hourly111==1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
			 }
			 if($scope.visit111 ==0){
			 	if($scope.flage==1){

			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){
			 	 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }

			 }
			 if($scope.visit111 ==1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(y*$scope.monthyear)+"/dayabcaad"+$scope.month ;
			 }

			 if($scope.face111 ==0){
			  	if($scope.flage == 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.face111 ==1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

		 	  if($scope.device111 ==0){
			  	if($scope.flage == 1){
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.device111 ==1){
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

			  if($scope.timeoffs111 ==0){
			  	if($scope.flage == 1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(y*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.timeoffs111 ==1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(y*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }


		 }

		 //this else if is for upgrading both and plan is monthly
		 else if($scope.month == 'Month' && $scope.currency == "USD" && $scope.nouser!='' && ($scope.monthyear >= 1 && $scope.monthyear < 12) ){


		 	// alert("ye both wala case hai monthly ka usd");

		 		enddate($scope.monthyear);
			 var x = $scope.nouser;
			 var y = parseInt($scope.nouser) + parseInt($scope.reguser) ;
			 // alert(x);
			 // alert(y);

			 switch(true)
			 {
				case (y >=1 && y <=20):
				
					 $scope.amount = y*$scope.tabledata[0]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[0]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[0]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[0]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[0]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[0]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[0]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[0]['payroll']*$scope.monthyear +(x*$scope.tabledata[0]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[0]['payroll']*$scope.monthyear +(y*$scope.tabledata[0]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[0]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[0]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[0]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[0]['visit_punch']/30*$scope.dayDifference);
					 }


						  if($scope.device111 == 1){

					 $scope.device_price =y*$scope.tabledata[0]['device_verification']*$scope.monthyear +(x*$scope.tabledata[0]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[0]['device_verification']*$scope.monthyear +(y*$scope.tabledata[0]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[0]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[0]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[0]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[0]['face_recognization']/30*$scope.dayDifference);
					}

					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[0]['time_off']*$scope.monthyear +(x*$scope.tabledata[0]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[0]['time_off']*$scope.monthyear +(y*$scope.tabledata[0]['time_off']/30*$scope.dayDifference);
					}
					 //console.log($scope.tabledata[0]['bulk_attendance']);
					// console.log($scope.tabledata[0]['monthly']);
					break;
					case (y >= 21 && y <= 40):
					$scope.amount = y*$scope.tabledata[1]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[1]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[1]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[1]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[1]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[1]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[1]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[1]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[1]['payroll']*$scope.monthyear +(x*$scope.tabledata[1]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[1]['payroll']*$scope.monthyear +(y*$scope.tabledata[1]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[1]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[1]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[1]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[1]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[1]['device_verification']*$scope.monthyear +(x*$scope.tabledata[1]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[1]['device_verification']*$scope.monthyear +(y*$scope.tabledata[1]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[1]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[1]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[1]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[1]['face_recognization']/30*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[1]['time_off']*$scope.monthyear +(x*$scope.tabledata[1]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[1]['time_off']*$scope.monthyear +(y*$scope.tabledata[1]['time_off']/30*$scope.dayDifference);
					}
					 break;
				case (y >= 41 && y <= 60):
					$scope.amount = y*$scope.tabledata[2]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){

					 $scope.bulk_attprice = y*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[2]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 	
					 $scope.bulk_attprice = (y*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear)+(y*$scope.tabledata[2]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[2]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[2]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[2]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[2]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[2]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[2]['payroll']*$scope.monthyear +(x*$scope.tabledata[2]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[2]['payroll']*$scope.monthyear +(y*$scope.tabledata[2]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[2]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[2]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[2]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[2]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[2]['device_verification']*$scope.monthyear +(x*$scope.tabledata[2]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[2]['device_verification']*$scope.monthyear +(y*$scope.tabledata[2]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[2]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[2]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[2]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[2]['face_recognization']/30*$scope.dayDifference);
					}




					 if($scope.timeoffs111 == 1){
					 	// alert("ghapla hai usd");
					 $scope.timeoff_price =y*$scope.tabledata[2]['time_off']*$scope.monthyear +(x*$scope.tabledata[2]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[2]['time_off']*$scope.monthyear +(y*$scope.tabledata[2]['time_off']/30*$scope.dayDifference);
					}
					break;
				case (y >= 61 && y <= 80):
					$scope.amount = y*$scope.tabledata[3]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[3]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[3]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[3]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[3]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[3]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[3]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[3]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[3]['payroll']*$scope.monthyear +(x*$scope.tabledata[3]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[3]['payroll']*$scope.monthyear +(y*$scope.tabledata[3]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[3]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[3]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[3]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[3]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[3]['device_verification']*$scope.monthyear +(x*$scope.tabledata[3]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[3]['device_verification']*$scope.monthyear +(y*$scope.tabledata[3]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[3]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[3]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[3]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[3]['face_recognization']/30*$scope.dayDifference);
					}


					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[3]['time_off']*$scope.monthyear +(x*$scope.tabledata[3]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[3]['time_off']*$scope.monthyear +(y*$scope.tabledata[3]['time_off']/30*$scope.dayDifference);
					}
					break;
				case (y >= 81 && y <= 100):
					$scope.amount = y*$scope.tabledata[4]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[4]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[4]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[4]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[4]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[4]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[4]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[4]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[4]['payroll']*$scope.monthyear +(x*$scope.tabledata[4]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[4]['payroll']*$scope.monthyear +(y*$scope.tabledata[4]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[4]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[4]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[4]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[4]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[4]['device_verification']*$scope.monthyear +(x*$scope.tabledata[4]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[4]['device_verification']*$scope.monthyear +(y*$scope.tabledata[4]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[4]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[4]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[4]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[4]['face_recognization']/30*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[4]['time_off']*$scope.monthyear +(x*$scope.tabledata[4]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[4]['time_off']*$scope.monthyear +(y*$scope.tabledata[4]['time_off']/30*$scope.dayDifference);
					}
					break;
				case (y >= 101 && y <= 120):
					$scope.amount = y*$scope.tabledata[5]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[5]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[5]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[5]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[5]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[5]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[5]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[5]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[5]['payroll']*$scope.monthyear +(x*$scope.tabledata[5]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[5]['payroll']*$scope.monthyear +(y*$scope.tabledata[5]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[5]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[5]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[5]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[5]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[5]['device_verification']*$scope.monthyear +(x*$scope.tabledata[5]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[5]['device_verification']*$scope.monthyear +(y*$scope.tabledata[5]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[5]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[5]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[5]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[5]['face_recognization']/30*$scope.dayDifference);
					}



					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[5]['time_off']*$scope.monthyear +(x*$scope.tabledata[5]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[5]['time_off']*$scope.monthyear +(y*$scope.tabledata[5]['time_off']/30*$scope.dayDifference);
					}
					break;
                case y > 120:
					$scope.amount = y*$scope.tabledata[6]['monthly']*$scope.monthyear;
					 if($scope.bulk111 ==1){
					 $scope.bulk_attprice = y*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear+(x*$scope.tabledata[6]['bulk_attendance']/30*$scope.dayDifference);
					 }
					 if($scope.bulk111 ==0){
					 $scope.bulk_attprice = y*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear+(y*$scope.tabledata[6]['bulk_attendance']/30*$scope.dayDifference);
					 }
					  if($scope.geo111 ==1){
					 $scope.geo_fenceprice = y*$scope.tabledata[6]['geo_fence']*$scope.monthyear +(x*$scope.tabledata[6]['geo_fence']/30*$scope.dayDifference);
					
					}
					if($scope.geo111 ==0){
					 $scope.geo_fenceprice = y*$scope.tabledata[6]['geo_fence']*$scope.monthyear +(y*$scope.tabledata[6]['geo_fence']/30*$scope.dayDifference);
					
					}
					 //$scope.location_traceprice = x*$scope.tabledata[6]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111 == 1){
					 $scope.payroll_price = y*$scope.tabledata[6]['payroll']*$scope.monthyear +(x*$scope.tabledata[6]['payroll']/30*$scope.dayDifference);
				}
				 if($scope.hourly111 == 0){
					 $scope.payroll_price = y*$scope.tabledata[6]['payroll']*$scope.monthyear +(y*$scope.tabledata[6]['payroll']/30*$scope.dayDifference);
				 
				}
				if($scope.visit111 == 1 ){
					 $scope.visit_punchprice = y*$scope.tabledata[6]['visit_punch']*$scope.monthyear +(x*$scope.tabledata[6]['visit_punch']/30*$scope.dayDifference);
					 }

					 if($scope.visit111 == 0 ){
					 $scope.visit_punchprice = y*$scope.tabledata[6]['visit_punch']*$scope.monthyear +(y*$scope.tabledata[6]['visit_punch']/30*$scope.dayDifference);
					 }



						  if($scope.device11 == 1){

					 $scope.device_price =y*$scope.tabledata[6]['device_verification']*$scope.monthyear +(x*$scope.tabledata[6]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.device111 == 0){

					 $scope.device_price =y*$scope.tabledata[6]['device_verification']*$scope.monthyear +(y*$scope.tabledata[6]['device_verification']/30*$scope.dayDifference);
					}

					if($scope.face111 == 1){

					 $scope.face_price =y*$scope.tabledata[6]['face_recognization']*$scope.monthyear +(x*$scope.tabledata[6]['face_recognization']/30*$scope.dayDifference);
					}

					if($scope.face111 == 0){

					 $scope.face_price =y*$scope.tabledata[6]['face_recognization']*$scope.monthyear +(y*$scope.tabledata[6]['face_recognization']/30*$scope.dayDifference);
					}

					 if($scope.timeoffs111 == 1){

					 $scope.timeoff_price =y*$scope.tabledata[6]['time_off']*$scope.monthyear +(x*$scope.tabledata[6]['time_off']/30*$scope.dayDifference);
					}

					if($scope.timeoffs111 == 0){

					 $scope.timeoff_price =y*$scope.tabledata[6]['time_off']*$scope.monthyear +(y*$scope.tabledata[6]['time_off']/30*$scope.dayDifference);
					}
					break;					
			}
			if($scope.bulk111 == 0){
				// alert($scope.dayDifference);
				// alert($scope.bulk_attprice);
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;

			// (($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
			 }

			 if($scope.bulk111 == 1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(y*$scope.monthyear)+"/"+$scope.month;
			 }
			 if($scope.geo111 == 0){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+(($scope.geo_fenceprice)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			} 
			if($scope.geo111 == 1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(y*$scope.monthyear)+"/"+$scope.month;
			} 
			 // $scope.location_traceprice1 = "@"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.monthyear)+"/"+$scope.month;
			 if($scope.hourly111 == 0){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+(($scope.payroll_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			  if($scope.hourly111 == 1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(y*$scope.monthyear)+"/"+$scope.month;
			 }
			 if($scope.visit111 == 0){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+(($scope.visit_punchprice)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			  if($scope.visit111 == 1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(y*$scope.monthyear)+"/"+$scope.month;
			 }

			  if($scope.face111 == 0){
			 $scope.face_price1 = " @"+$scope.currency+". "+(($scope.face_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
				}
				 if($scope.face111 == 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+$scope.face_price/(y*$scope.monthyear)+"/"+$scope.month;
				}


				if($scope.device111 == 0){
			 $scope.device_price1 = " @"+$scope.currency+". "+(($scope.device_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
				}
				 if($scope.device111 == 1){
			 $scope.device_price1 = " @"+$scope.currency+". "+$scope.device_price/(y*$scope.monthyear)+"/"+$scope.month;
				}



			 
			 if($scope.timeoffs111 == 0){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+(($scope.timeoff_price)/y)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
				}
				 if($scope.timeoffs111 == 1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(y*$scope.monthyear)+"/"+$scope.month;
				}


		 }

// this is for upgrading the duration when currency is USD and plan is monthly and extended user is 0
		else if($scope.month == 'Month' && $scope.currency == "USD" && $scope.nouser=='' && ($scope.monthyear >= 1 && $scope.monthyear < 12) )
		 {
		 	// alert("hrty1usd");

			//  console.log($scope.monthyear);
			// alert("hello ubitech");
			enddate($scope.monthyear);
			 
			 var x = $scope.nouser;
			 if(x == 0){
			 	// alert('hiii');
			 	var x = $scope.reguser;

			 }
			 // alert(x);
		//	 alert(x);
		//console.log($scope.monthyear);
			 switch(true)
			 {
			 	



				case (x >=1 && x <=20):
				// alert("hiiiiiusd");
					 $scope.amount = x*$scope.tabledata[0]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[0]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[0]['geo_fence']*$scope.monthyear)+($scope.tabledata[0]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[0]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[0]['payroll']*$scope.monthyear)+($scope.tabledata[0]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[0]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[0]['visit_punch']*$scope.monthyear)+($scope.tabledata[0]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[0]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[0]['face_recognization']*$scope.monthyear)+($scope.tabledata[0]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[0]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[0]['device_verification']*$scope.monthyear)+($scope.tabledata[0]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[0]['device_verification']*$scope.monthyear;
					}


					
	

					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[0]['time_off']*$scope.monthyear)+($scope.tabledata[0]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[0]['time_off']*$scope.monthyear;
					}
					 //console.log($scope.tabledata[0]['bulk_attendance']);
					// console.log($scope.tabledata[0]['monthly']);
					break;
				case (x >= 21 && x <= 40):
					 $scope.amount = x*$scope.tabledata[1]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[1]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[1]['geo_fence']*$scope.monthyear)+($scope.tabledata[1]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[1]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[1]['payroll']*$scope.monthyear)+($scope.tabledata[1]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[1]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[1]['visit_punch']*$scope.monthyear)+($scope.tabledata[1]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[1]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[1]['face_recognization']*$scope.monthyear)+($scope.tabledata[1]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[1]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[1]['device_verification']*$scope.monthyear)+($scope.tabledata[1]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[1]['device_verification']*$scope.monthyear;
					}


					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[1]['time_off']*$scope.monthyear)+($scope.tabledata[1]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[1]['time_off']*$scope.monthyear;
					}
					 break;
				case (x >= 41 && x <= 60):
					 $scope.amount = x*$scope.tabledata[2]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[2]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[2]['geo_fence']*$scope.monthyear)+($scope.tabledata[2]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[2]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[2]['payroll']*$scope.monthyear)+($scope.tabledata[2]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[2]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[2]['visit_punch']*$scope.monthyear)+($scope.tabledata[2]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[2]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[2]['face_recognization']*$scope.monthyear)+($scope.tabledata[2]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[2]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[2]['device_verification']*$scope.monthyear)+($scope.tabledata[2]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[2]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[2]['time_off']*$scope.monthyear)+($scope.tabledata[2]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[2]['time_off']*$scope.monthyear;
					}
					break;
				case (x >= 61 && x <= 80):
					 $scope.amount = x*$scope.tabledata[3]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[3]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[3]['geo_fence']*$scope.monthyear)+($scope.tabledata[3]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[3]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[3]['payroll']*$scope.monthyear)+($scope.tabledata[3]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[3]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[3]['visit_punch']*$scope.monthyear)+($scope.tabledata[3]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[3]['visit_punch']*$scope.monthyear;
					}
					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[3]['face_recognization']*$scope.monthyear)+($scope.tabledata[3]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[3]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[3]['device_verification']*$scope.monthyear)+($scope.tabledata[3]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[3]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[3]['time_off']*$scope.monthyear)+($scope.tabledata[3]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[3]['time_off']*$scope.monthyear;
					}
					break;
				case (x >= 81 && x <= 100):
					 $scope.amount = x*$scope.tabledata[4]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[4]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[4]['geo_fence']*$scope.monthyear)+($scope.tabledata[4]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[4]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[4]['payroll']*$scope.monthyear)+($scope.tabledata[4]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[4]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[4]['visit_punch']*$scope.monthyear)+($scope.tabledata[4]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[4]['visit_punch']*$scope.monthyear;
					}

					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[4]['face_recognization']*$scope.monthyear)+($scope.tabledata[4]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[4]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[4]['device_verification']*$scope.monthyear)+($scope.tabledata[4]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[4]['device_verification']*$scope.monthyear;
					}	


					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[4]['time_off']*$scope.monthyear)+($scope.tabledata[4]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[4]['time_off']*$scope.monthyear;
					}
					break;
				case (x >= 101 && x <= 120):
					 $scope.amount = x*$scope.tabledata[5]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[5]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[5]['geo_fence']*$scope.monthyear)+($scope.tabledata[5]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[5]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[5]['payroll']*$scope.monthyear)+($scope.tabledata[5]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[5]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[5]['visit_punch']*$scope.monthyear)+($scope.tabledata[5]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[5]['visit_punch']*$scope.monthyear;
					}
					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[5]['face_recognization']*$scope.monthyear)+($scope.tabledata[5]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[5]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[5]['device_verification']*$scope.monthyear)+($scope.tabledata[5]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[5]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[5]['time_off']*$scope.monthyear)+($scope.tabledata[5]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[5]['time_off']*$scope.monthyear;
					}
					break;
                case x > 120:
					 $scope.amount = x*$scope.tabledata[6]['monthly']*$scope.monthyear;
					 if($scope.bulk111 == 0){
					 $scope.bulk_attprice =(x*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear)+($scope.tabledata[6]['bulk_attendance']/30*x*$scope.dayDifference);
					}
					if($scope.bulk111 == 1){
						$scope.bulk_attprice = x*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear;
					}
					if($scope.geo111==0){
					 ($scope.geo_fenceprice = x*$scope.tabledata[6]['geo_fence']*$scope.monthyear)+($scope.tabledata[6]['geo_fence']/30*x*$scope.dayDifference);
					}
					if($scope.geo111==1){
					 $scope.geo_fenceprice = x*$scope.tabledata[6]['geo_fence']*$scope.monthyear;
					}
					 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
					 if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[6]['payroll']*$scope.monthyear)+($scope.tabledata[6]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.hourly111==1){
					 $scope.payroll_price = x*$scope.tabledata[6]['payroll']*$scope.monthyear;
					}
					if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[6]['visit_punch']*$scope.monthyear)+($scope.tabledata[6]['visit_punch']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[6]['visit_punch']*$scope.monthyear;
					}
					if($scope.face111==0){
					 $scope.face_price =(x*$scope.tabledata[6]['face_recognization']*$scope.monthyear)+($scope.tabledata[6]['face_recognization']/30*x*$scope.dayDifference);
					}
					if($scope.face111==1){
					 $scope.face_price =x*$scope.tabledata[6]['face_recognization']*$scope.monthyear;
					}

					if($scope.device111==0){
					 $scope.device_price =(x*$scope.tabledata[6]['device_verification']*$scope.monthyear)+($scope.tabledata[6]['device_verification']/30*x*$scope.dayDifference);
					}
					if($scope.device111==1){
					 $scope.device_price =x*$scope.tabledata[6]['device_verification']*$scope.monthyear;
					}
					if($scope.timeoffs111==0){
					 $scope.timeoff_price =(x*$scope.tabledata[6]['time_off']*$scope.monthyear)+($scope.tabledata[6]['time_off']/30*x*$scope.dayDifference);
					}
					if($scope.timeoffs111==1){
					 $scope.timeoff_price =x*$scope.tabledata[6]['time_off']*$scope.monthyear;
					}
					break;					
			}
			// alert(($scope.bulk_attprice)/(x*$scope.monthyear));
			// alert($scope.bulk_attprice);
			// alert(x*$scope.monthyear);
			// alert($scope.bulk_attprice1);
			if($scope.bulk111==0){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
		}
		if($scope.bulk111==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(x*$scope.monthyear)+"/"+$scope.month;
		}
			 // alert($scope.bulk_attprice1);
			 if($scope.geo111==0){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+(($scope.geo_fenceprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			}

			if($scope.geo111==1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(x*$scope.monthyear)+"/"+$scope.month;
			}
			//  if($scope.bulk111==1){
			//  $scope.location_traceprice1 = "@"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.monthyear)+"/daya"+$scope.month;
			// } 
			if($scope.hourly111==0){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+(($scope.payroll_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			if($scope.hourly111==1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(x*$scope.monthyear)+"/"+$scope.month;
			 }
			 if($scope.visit111==0){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+(($scope.visit_punchprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.visit111==1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(x*$scope.monthyear)+"/"+$scope.month;
			 }
			  if($scope.face111==0){
		$scope.face_price1 =	 " @"+$scope.currency+". "+(($scope.face_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.face111==1){
			 $scope.face_price1 = " @"+$scope.currency+". "+$scope.face_price/(x*$scope.monthyear)+"/"+$scope.month;
			}
			 if($scope.device111==0){
		$scope.device_price1 =	 " @"+$scope.currency+". "+(($scope.device_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.device111==1){
			 $scope.device_price1 = " @"+$scope.currency+". "+$scope.device_price/(x*$scope.monthyear)+"/"+$scope.month;
			}
			 if($scope.timeoffs111==0){
		$scope.timeoff_price1 =	 " @"+$scope.currency+". "+(($scope.timeoff_price)/x)/($scope.dayDifference + ($scope.monthyear*30))*30+"/"+$scope.month;
			 }
			 if($scope.timeoffs111==1){
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(x*$scope.monthyear)+"/"+$scope.month;
			}
		 }


		 else if(($scope.month == 'Year' || ($scope.monthyear >= 12 && $scope.month == 'Month' )) && $scope.currency == "USD" && $scope.nouser=='' )
		 {
		 	// alert("hrty5usd");
			   if($scope.monthyear >= 12 &&$scope.month == 'Month')
			   {
				  enddate($scope.monthyear);
				  $scope.flage = 12;
				  $scope.monthyear1 = $scope.monthyear;
				  // alert($scope.monthyear1);
			   }
			   else
			   {
				  enddate($scope.monthyear*12);
				  $scope.monthyear1 = $scope.monthyear*12;
			   }
			  // alert($scope.monthyear);
			 var x = $scope.nouser;
			 if(x == 0){
			 	// alert('hiii');
			 	var x = $scope.reguser;
			 }
			 // alert(x);
			 switch(true){
				case (x >=1 && x <=20):
					$scope.amount = x*$scope.tabledata[0]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[0]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[0]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[0]['geo_fence']*$scope.monthyear1)+($scope.tabledata[0]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[0]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[0]['payroll']*$scope.monthyear1)+($scope.tabledata[0]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[0]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[0]['visit_punch']*$scope.monthyear1)+($scope.tabledata[0]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[0]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[0]['face_recognization']*$scope.monthyear1)+($scope.tabledata[0]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[0]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[0]['device_verification']*$scope.monthyear1)+($scope.tabledata[0]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[0]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[0]['time_off']*$scope.monthyear1)+($scope.tabledata[0]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 21 && x <= 40):
					$scope.amount = x*$scope.tabledata[1]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[1]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[1]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[1]['geo_fence']*$scope.monthyear1)+($scope.tabledata[1]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[1]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[1]['payroll']*$scope.monthyear1)+($scope.tabledata[1]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[1]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[1]['visit_punch']*$scope.monthyear1)+($scope.tabledata[1]['visit_punch']/30*x*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[1]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[1]['face_recognization']*$scope.monthyear1)+($scope.tabledata[1]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[1]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[1]['device_verification']*$scope.monthyear1)+($scope.tabledata[1]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[1]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =   (x*$scope.tabledata[1]['time_off']*$scope.monthyear1)+($scope.tabledata[1]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 41 && x <= 60):
					$scope.amount = x*$scope.tabledata[2]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[2]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[2]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[2]['geo_fence']*$scope.monthyear1)+($scope.tabledata[2]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[2]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[2]['payroll']*$scope.monthyear1)+($scope.tabledata[2]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[2]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[2]['visit_punch']*$scope.monthyear1)+($scope.tabledata[2]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[2]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[2]['face_recognization']*$scope.monthyear1)+($scope.tabledata[2]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[2]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[2]['device_verification']*$scope.monthyear1)+($scope.tabledata[2]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[2]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[2]['time_off']*$scope.monthyear1)+($scope.tabledata[2]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 61 && x <= 80):
					$scope.amount = x*$scope.tabledata[3]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[3]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[3]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[3]['geo_fence']*$scope.monthyear1)+($scope.tabledata[3]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[3]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[3]['payroll']*$scope.monthyear1)+($scope.tabledata[3]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[3]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[3]['visit_punch']*$scope.monthyear1)+($scope.tabledata[3]['visit_punch']/30*x*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[3]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[3]['face_recognization']*$scope.monthyear1)+($scope.tabledata[3]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[3]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[3]['device_verification']*$scope.monthyear1)+($scope.tabledata[3]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[3]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[3]['time_off']*$scope.monthyear1)+($scope.tabledata[3]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 81 && x <= 100):
					$scope.amount = x*$scope.tabledata[4]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[4]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[4]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[4]['geo_fence']*$scope.monthyear1)+($scope.tabledata[4]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[4]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[4]['payroll']*$scope.monthyear1)+($scope.tabledata[4]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[4]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[4]['visit_punch']*$scope.monthyear1)+($scope.tabledata[4]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[4]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[4]['face_recognization']*$scope.monthyear1)+($scope.tabledata[4]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[4]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[4]['device_verification']*$scope.monthyear1)+($scope.tabledata[4]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[4]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[4]['time_off']*$scope.monthyear1)+($scope.tabledata[4]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 101 && x <= 120):
					$scope.amount = x*$scope.tabledata[5]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[5]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[5]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[5]['geo_fence']*$scope.monthyear1)+($scope.tabledata[5]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[5]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =   (x*$scope.tabledata[5]['payroll']*$scope.monthyear1)+(x*$scope.tabledata[5]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[5]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[5]['visit_punch']*$scope.monthyear1)+(x*$scope.tabledata[5]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[5]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[5]['face_recognization']*$scope.monthyear1)+($scope.tabledata[5]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[5]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[5]['device_verification']*$scope.monthyear1)+($scope.tabledata[5]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[5]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[5]['time_off']*$scope.monthyear1)+($scope.tabledata[5]['time_off']/30*x*$scope.dayDifference);
					}
					break;
                case x > 120:
					$scope.amount = x*$scope.tabledata[6]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice =(x*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[6]['bulk_attendance']/30*x*$scope.dayDifference);
					 // alert($scope.bulk_attprice);
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[6]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice =(x*$scope.tabledata[6]['geo_fence']*$scope.monthyear1)+($scope.tabledata[6]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[6]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[6]['payroll']*$scope.monthyear1)+($scope.tabledata[6]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[6]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice =(x*$scope.tabledata[6]['visit_punch']*$scope.monthyear1)+($scope.tabledata[6]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[6]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[6]['face_recognization']*$scope.monthyear1)+($scope.tabledata[6]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[6]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[6]['device_verification']*$scope.monthyear1)+($scope.tabledata[6]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[6]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price = (x*$scope.tabledata[6]['time_off']*$scope.monthyear1)+($scope.tabledata[6]['time_off']/30*x*$scope.dayDifference);
					}
					break;					
			}
			
				if($scope.bulk111==0 ){

					// alert($scope.bulk_attprice);
					// alert($scope.flage);
					if($scope.flage==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			// alert("hiiii year");
			}
			if($scope.flage!=1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			// alert("hello month");
			}
			// $scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
			// alert($scope.bulk_attprice1);

		}
		if($scope.bulk111==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		}

			 if($scope.geo111==0){

			 	if($scope.flage==1){

			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			
			}
			if($scope.flage!=1){

			  $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			
			}
			} 
			 if($scope.geo111==1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			} 
			 $scope.location_traceprice1 = " @"+$scope.currency+". "+($scope.location_traceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			  
			   if($scope.hourly111==0){

			   	if($scope.flage==1){

			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){

			 	$scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }


			 }

			  if($scope.hourly111==1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			 }
			 if($scope.visit111 ==0){
			 	if($scope.flage==1){

			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){
			 	 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }

			 }
			 if($scope.visit111 ==1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month ;
			 }

			   if($scope.device111 ==0){
			   	// alert("device");
					// alert($scope.device_price);
			  	if($scope.flage == 1){
			  		// alert($scope.device_price);
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
		 	// alert("helodevice");
		 	// alert($scope.device_price);
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.device111 ==1){
			 	// alert("helodevice1");
		 	// alert($scope.device_price);
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

		   if($scope.face111 ==0){
			  	if($scope.flage == 1){

			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.face111 ==1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

			  if($scope.timeoffs111 ==0){
			  	if($scope.flage == 1){
			  		// alert("t");
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
		 	// alert("t1");
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.timeoffs111 ==1){
			 	// alert("t2");
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }


		 }

		
		



		 // usd code for upgrade end //





	// else if($scope.month == 'Month' && $scope.currency == "USD" &&   ($scope.monthyear >= 1 && $scope.monthyear < 12) )
	// 	 {
	// 	 	//alert("hrty2");
	// 		 //console.log($scope.monthyear);
	// 		 // alert("hello ubitech");
	// 		 var x = $scope.nouser;
	// 		 if(x == 0){
	// 		 	// alert('hiii');
	// 		 	var x = $scope.reguser;
	// 		 }
	// 		 // alert(x);
	// 		 enddate($scope.monthyear);
	// 		 switch(true) {
	// 			case x >= 1 && x <= 20:
	// 				$scope.amount = x*$scope.tabledata[0]['monthly']*$scope.monthyear;
	// 				 $scope.bulk_attprice = x*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear;
	// 				 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[0]['geo_fence']*$scope.monthyear;
	// 				 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
	// 				 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price =    x*$scope.tabledata[0]['payroll']*$scope.monthyear;
	// 				 $scope.payroll_price=($scope.payroll_price).toFixed(2);
	// 				 $scope.visit_punchprice = x*$scope.tabledata[0]['visit_punch']*$scope.monthyear;
	// 				 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
	// 				 $scope.timeoff_price =    x*$scope.tabledata[0]['time_off']*$scope.monthyear;
	// 				 $scope.timeoff_price=($scope.timeoff_price).toFixed(4);
	// 				break;
	// 			case x >= 21 && x <= 40:
	// 				$scope.amount = x*$scope.tabledata[1]['monthly']*$scope.monthyear;
	// 				$scope.bulk_attprice = x*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear;
	// 				$scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[1]['geo_fence']*$scope.monthyear;
	// 				 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
	// 				// $scope.location_traceprice = x*$scope.tabledata[1]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price =    x*$scope.tabledata[1]['payroll']*$scope.monthyear;
	// 				 $scope.payroll_price=($scope.payroll_price).toFixed(2);
	// 				 $scope.visit_punchprice = x*$scope.tabledata[1]['visit_punch']*$scope.monthyear;
	// 				 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
	// 				 $scope.timeoff_price =    x*$scope.tabledata[1]['time_off']*$scope.monthyear;
	// 				 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
	// 				break;
	// 			case x >= 41 && x <= 60:
	// 				 $scope.amount = x*$scope.tabledata[2]['monthly']*$scope.monthyear;
	// 				 $scope.bulk_attprice = x*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear;
	// 				 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
					 
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[2]['geo_fence']*$scope.monthyear;
	// 				 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
					 
	// 				// $scope.location_traceprice = x*$scope.tabledata[2]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price =    x*$scope.tabledata[2]['payroll']*$scope.monthyear;
	// 				 $scope.payroll_price=($scope.payroll_price).toFixed(2);
					 
	// 				 $scope.visit_punchprice = x*$scope.tabledata[2]['visit_punch']*$scope.monthyear;
	// 				 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					 
	// 				 $scope.timeoff_price = x*$scope.tabledata[2]['time_off']*$scope.monthyear;
	// 				 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
	// 				break;
	// 			case x >= 61 && x <= 80:
	// 				 $scope.amount = x*$scope.tabledata[3]['monthly']*$scope.monthyear;
	// 				 $scope.bulk_attprice = x*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear;
	// 				  $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[3]['geo_fence']*$scope.monthyear;
	// 				  $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
	// 				 //$scope.location_traceprice = x*$scope.tabledata[3]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price =    x*$scope.tabledata[3]['payroll']*$scope.monthyear;
	// 				  $scope.payroll_price=($scope.payroll_price).toFixed(2);
					  
	// 				 $scope.visit_punchprice =x*$scope.tabledata[3]['visit_punch']*$scope.monthyear;
	// 				  $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					  
	// 				 $scope.timeoff_price =    x*$scope.tabledata[3]['time_off']*$scope.monthyear;
	// 				  $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
	// 				break;
	// 			case x >= 81 && x <= 100:
	// 				 $scope.amount = x*$scope.tabledata[4]['monthly']*$scope.monthyear;
	// 				 $scope.bulk_attprice = x*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear;
	// 				 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
					 
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[4]['geo_fence']*$scope.monthyear;
	// 				   $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
					   
	// 				 //$scope.location_traceprice = x*$scope.tabledata[4]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price = x*$scope.tabledata[4]['payroll']*$scope.monthyear;
	// 				 $scope.payroll_price=($scope.payroll_price).toFixed(2);
					   
	// 				 $scope.visit_punchprice = x*$scope.tabledata[4]['visit_punch']*$scope.monthyear;
	// 				 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					   
	// 				 $scope.timeoff_price = x*$scope.tabledata[4]['time_off']*$scope.monthyear;
	// 				 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
	// 				break;
	// 			case x >= 101 && x <= 120:
	// 				$scope.amount = x*$scope.tabledata[5]['monthly']*$scope.monthyear;
	// 				 $scope.bulk_attprice = x*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear;
	// 				 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[5]['geo_fence']*$scope.monthyear;
	// 				 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
	// 				 //$scope.location_traceprice = x*$scope.tabledata[5]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price = x*$scope.tabledata[5]['payroll']*$scope.monthyear;
	// 				 $scope.payroll_price=($scope.payroll_price).toFixed(2);
	// 				 $scope.visit_punchprice = x*$scope.tabledata[5]['visit_punch']*$scope.monthyear;
	// 				 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
	// 				 $scope.timeoff_price =    x*$scope.tabledata[5]['time_off']*$scope.monthyear;
	// 				 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
	// 				break;
					
 //                case x > 120:
	// 				$scope.amount = x*$scope.tabledata[6]['monthly']*$scope.monthyear;
	// 				$scope.bulk_attprice = x*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear;
	// 				 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
	// 				 $scope.geo_fenceprice = x*$scope.tabledata[6]['geo_fence']*$scope.monthyear;
	// 				  $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
	// 				// $scope.location_traceprice = x*$scope.tabledata[6]['location_tracing']*$scope.monthyear;
	// 				 $scope.payroll_price =    x*$scope.tabledata[6]['payroll']*$scope.monthyear;
	// 				  $scope.payroll_price=($scope.payroll_price).toFixed(2);
	// 				 $scope.visit_punchprice = x*$scope.tabledata[6]['visit_punch']*$scope.monthyear;
	// 				  $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
	// 				 $scope.timeoff_price = x*$scope.tabledata[6]['time_off']*$scope.monthyear;
	// 				  $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
	// 				break;					
	// 		}
	// 		$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice)/(x*$scope.monthyear)+"/dayab"+$scope.month;
			 
	// 		 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+$scope.geo_fenceprice/(x*$scope.monthyear)+"/dayab"+$scope.month;
			 
	// 		 $scope.location_traceprice1 = " @"+$scope.currency+". "+$scope.location_traceprice/(x*$scope.monthyear)+"/dayab"+$scope.month;
			 
	// 		 $scope.payroll_price1 = " @"+$scope.currency+". "+$scope.payroll_price/(x*$scope.monthyear)+"/dayab"+$scope.month;
			 
	// 		 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+$scope.visit_punchprice/(x*$scope.monthyear)+"/dayab"+$scope.month ;
			 
	// 		 $scope.timeoff_price1 = " @"+$scope.currency+". "+$scope.timeoff_price/(x*$scope.monthyear)+"/dayab"+$scope.month;
		 // }
		 // else if(($scope.month == 'Year' || ($scope.monthyear >= 12 && $scope.month == 'Month' )) && $scope.currency == "USD" )
		 // {  
		 // 	//alert("hrty4");
			//  if($scope.monthyear >= 12 &&$scope.month == 'Month')
			//    {
			// 	   enddate($scope.monthyear);
			// 	   $scope.flage = 12;
			// 	   $scope.monthyear1 = $scope.monthyear;
			//    }
			//    else
			//    {
			// 	  enddate($scope.monthyear*12);
			// 	  $scope.monthyear1 = $scope.monthyear*12;
			//    }
			//   // alert($scope.monthyear);
			//  var x = $scope.nouser;
			//  if(x == 0){
			//  	// alert('hiii');
			//  	var x = $scope.reguser;
			//  }
			//  // alert(x);
			//  switch(true) {
			// 	case x >= 1 && x <= 20:
			// 		$scope.amount = x*$scope.tabledata[0]['yearly']*$scope.monthyear/$scope.flage;
			// 		 $scope.bulk_attprice = x*$scope.tabledata[0]['bulk_attendance']*$scope.monthyear1;
			// 		$scope.bulk_attprice =($scope.bulk_attprice).toFixed(2);
					
			// 		 $scope.geo_fenceprice = x*$scope.tabledata[0]['geo_fence']*$scope.monthyear1;
			// 		 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
			// 		 //$scope.location_traceprice = x*$scope.tabledata[0]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[0]['payroll']*$scope.monthyear1;
			// 		 $scope.payroll_price=($scope.payroll_price).toFixed(2);
					 
			// 		 $scope.visit_punchprice = x*$scope.tabledata[0]['visit_punch']*$scope.monthyear1;
			// 		 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					 
			// 		 $scope.timeoff_price =    x*$scope.tabledata[0]['time_off']*$scope.monthyear1;
			// 		  $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
			// 		break;
					
			// 	case x >= 21 && x <= 40:
			// 		$scope.amount = x*$scope.tabledata[1]['yearly']*$scope.monthyear/$scope.flage;
			// 		 $scope.bulk_attprice = x*$scope.tabledata[1]['bulk_attendance']*$scope.monthyear1;
			// 		 $scope.bulk_attprice =($scope.bulk_attprice).toFixed(2);
			// 		 $scope.geo_fenceprice = x*$scope.tabledata[1]['geo_fence']*$scope.monthyear1;
			// 		  $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
			// 		//$scope.location_traceprice = x*$scope.tabledata[1]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[1]['payroll']*$scope.monthyear1;
			// 		  $scope.payroll_price=($scope.payroll_price).toFixed(2);
					  
			// 		 $scope.visit_punchprice = x*$scope.tabledata[1]['visit_punch']*$scope.monthyear1;
			// 		  $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					  
			// 		 $scope.timeoff_price =    x*$scope.tabledata[1]['time_off']*$scope.monthyear1;
			// 		  $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
			// 		break;
			// 	case x >= 41 && x <= 60:
			// 		$scope.amount = x*$scope.tabledata[2]['yearly']*$scope.monthyear/$scope.flage;
			// 		$scope.bulk_attprice = x*$scope.tabledata[2]['bulk_attendance']*$scope.monthyear1;
			// 		$scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
			// 		 $scope.geo_fenceprice = x*$scope.tabledata[2]['geo_fence']*$scope.monthyear1;
			// 		 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
			// 		//$scope.location_traceprice = x*$scope.tabledata[2]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[2]['payroll']*$scope.monthyear1;
			// 		 $scope.payroll_price=($scope.payroll_price).toFixed(2);
			// 		 $scope.visit_punchprice = x*$scope.tabledata[2]['visit_punch']*$scope.monthyear1;
			// 		 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
			// 		 $scope.timeoff_price =    x*$scope.tabledata[2]['time_off']*$scope.monthyear1;
			// 		 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
			// 		 break;
			// 	case x >= 61 && x <= 80:
			// 		 $scope.amount = x*$scope.tabledata[3]['yearly']*$scope.monthyear/$scope.flage;
			// 		 $scope.bulk_attprice = x*$scope.tabledata[3]['bulk_attendance']*$scope.monthyear1;
			// 		 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
					 
			// 		 $scope.geo_fenceprice = x*$scope.tabledata[3]['geo_fence']*$scope.monthyear1;
			// 		 $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
					 
			// 		 //$scope.location_traceprice = x*$scope.tabledata[3]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[3]['payroll']*$scope.monthyear1;
			// 		 $scope.payroll_price=($scope.payroll_price).toFixed(2);
					 
			// 		 $scope.visit_punchprice = x*$scope.tabledata[3]['visit_punch']*$scope.monthyear1;
			// 		 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					 
			// 		 $scope.timeoff_price =    x*$scope.tabledata[3]['time_off']*$scope.monthyear1;
			// 		 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
					 
			// 		break;
			// 	case x >= 81 && x <= 100:
			// 		$scope.amount = x*$scope.tabledata[4]['yearly']*$scope.monthyear/$scope.flage;
			// 		$scope.bulk_attprice = x*$scope.tabledata[4]['bulk_attendance']*$scope.monthyear1;
			// 		$scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
					
			// 		$scope.geo_fenceprice = x*$scope.tabledata[4]['geo_fence']*$scope.monthyear1;
			// 		$scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
					 
			// 		 //$scope.location_traceprice = x*$scope.tabledata[4]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[4]['payroll']*$scope.monthyear1;
			// 		 $scope.payroll_price=($scope.payroll_price).toFixed(2);
					 
			// 		 $scope.visit_punchprice = x*$scope.tabledata[4]['visit_punch']*$scope.monthyear1;
			// 		 $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					 
			// 		 $scope.timeoff_price =    x*$scope.tabledata[4]['time_off']*$scope.monthyear1;
			// 		 $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
			// 		break;
			// 	case x >= 101 && x <= 120:
			// 		$scope.amount = x*$scope.tabledata[5]['yearly']*$scope.monthyear/$scope.flage;
					
			// 		$scope.bulk_attprice = x*$scope.tabledata[5]['bulk_attendance']*$scope.monthyear1;
			// 		 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
					 
			// 		 $scope.geo_fenceprice = x*$scope.tabledata[5]['geo_fence']*$scope.monthyear1;
			// 		  $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
			// 		// $scope.location_traceprice = x*$scope.tabledata[5]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[5]['payroll']*$scope.monthyear1;
			// 		  $scope.payroll_price=($scope.payroll_price).toFixed(2);
					  
			// 		 $scope.visit_punchprice = x*$scope.tabledata[5]['visit_punch']*$scope.monthyear1;
			// 		  $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
					  
			// 		 $scope.timeoff_price =    x*$scope.tabledata[5]['time_off']*$scope.monthyear1;
			// 		  $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
			// 		break;
   //              case x > 120:
			// 		$scope.amount = x*$scope.tabledata[6]['yearly']*$scope.monthyear/$scope.flage;
			// 		 $scope.bulk_attprice = x*$scope.tabledata[6]['bulk_attendance']*$scope.monthyear1;
			// 		 $scope.bulk_attprice=($scope.bulk_attprice).toFixed(2);
					 
			// 		 $scope.geo_fenceprice = x*$scope.tabledata[6]['geo_fence']*$scope.monthyear1;
			// 		  $scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(2);
					  
			// 		// $scope.location_traceprice = x*$scope.tabledata[6]['location_tracing']*$scope.monthyear1;
			// 		 $scope.payroll_price =    x*$scope.tabledata[6]['payroll']*$scope.monthyear1;
			// 		  $scope.payroll_price=($scope.payroll_price).toFixed(2);
			// 		 $scope.visit_punchprice = x*$scope.tabledata[6]['visit_punch']*$scope.monthyear1;
			// 		  $scope.visit_punchprice=($scope.visit_punchprice).toFixed(2);
			// 		 $scope.timeoff_price =    x*$scope.tabledata[6]['time_off']*$scope.monthyear1;
			// 		  $scope.timeoff_price=($scope.timeoff_price).toFixed(2);
			// 		break;					
			// }
			
			//  $scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*$scope.monthyear)+"/dayabc"+$scope.month;
			 
			 
			//  $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabc"+$scope.month;
			 
			//  $scope.location_traceprice1 = " @"+$scope.currency+". "+($scope.location_traceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabc"+$scope.month;
			 
			//  $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*$scope.monthyear)+"/"+$scope.month;
			 
			//  $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*$scope.monthyear)+"/dayabc"+$scope.month ;
			 
			//  $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*$scope.monthyear)+"/dayabc"+$scope.month;
		 // }

		 // this is for upgrading the duration when currency is inr and plan is yearly and extended user is 0
		else if(($scope.month == 'Year' || ($scope.monthyear >= 12 && $scope.month == 'Month' )) && $scope.currency == "INR" && $scope.nouser=='' )
		 {
		 	// alert("hrty5");
			   if($scope.monthyear >= 12 &&$scope.month == 'Month')
			   {
				  enddate($scope.monthyear);
				  $scope.flage = 12;
				  $scope.monthyear1 = $scope.monthyear;
				  // alert($scope.monthyear1);
			   }
			   else
			   {
				  enddate($scope.monthyear*12);
				  $scope.monthyear1 = $scope.monthyear*12;
			   }
			  // alert($scope.monthyear);
			 var x = $scope.nouser;
			 if(x == 0){
			 	// alert('hiii');
			 	var x = $scope.reguser;
			 }
			 // alert(x);
			 switch(true){
				case (x >=1 && x <=20):
					$scope.amount = x*$scope.tabledata[7]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[7]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[7]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[7]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[7]['geo_fence']*$scope.monthyear1)+($scope.tabledata[7]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[7]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[7]['payroll']*$scope.monthyear1)+($scope.tabledata[7]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[7]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[7]['visit_punch']*$scope.monthyear1)+($scope.tabledata[7]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[7]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[7]['face_recognization']*$scope.monthyear1)+($scope.tabledata[7]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[7]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[7]['device_verification']*$scope.monthyear1)+($scope.tabledata[7]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[7]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[7]['time_off']*$scope.monthyear1)+($scope.tabledata[7]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 21 && x <= 40):
					$scope.amount = x*$scope.tabledata[8]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[8]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[8]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[8]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[8]['geo_fence']*$scope.monthyear1)+($scope.tabledata[8]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[8]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[8]['payroll']*$scope.monthyear1)+($scope.tabledata[8]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[8]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[8]['visit_punch']*$scope.monthyear1)+($scope.tabledata[8]['visit_punch']/30*x*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[8]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[8]['face_recognization']*$scope.monthyear1)+($scope.tabledata[8]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[8]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[8]['device_verification']*$scope.monthyear1)+($scope.tabledata[8]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[8]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =   (x*$scope.tabledata[8]['time_off']*$scope.monthyear1)+($scope.tabledata[8]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 41 && x <= 60):
					$scope.amount = x*$scope.tabledata[9]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[9]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[9]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[9]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[9]['geo_fence']*$scope.monthyear1)+($scope.tabledata[9]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[9]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[9]['payroll']*$scope.monthyear1)+($scope.tabledata[9]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[9]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[9]['visit_punch']*$scope.monthyear1)+($scope.tabledata[9]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[9]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[9]['face_recognization']*$scope.monthyear1)+($scope.tabledata[9]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[9]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[9]['device_verification']*$scope.monthyear1)+($scope.tabledata[9]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[9]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[9]['time_off']*$scope.monthyear1)+($scope.tabledata[9]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 61 && x <= 80):
					$scope.amount = x*$scope.tabledata[10]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[10]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[10]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[10]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[10]['geo_fence']*$scope.monthyear1)+($scope.tabledata[10]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[10]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[10]['payroll']*$scope.monthyear1)+($scope.tabledata[10]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[10]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[10]['visit_punch']*$scope.monthyear1)+($scope.tabledata[10]['visit_punch']/30*x*$scope.dayDifference);
					 }

					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[10]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[10]['face_recognization']*$scope.monthyear1)+($scope.tabledata[10]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[10]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[10]['device_verification']*$scope.monthyear1)+($scope.tabledata[10]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[10]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[10]['time_off']*$scope.monthyear1)+($scope.tabledata[10]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 81 && x <= 100):
					$scope.amount = x*$scope.tabledata[11]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[11]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[11]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[11]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[11]['geo_fence']*$scope.monthyear1)+($scope.tabledata[11]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[11]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =    (x*$scope.tabledata[11]['payroll']*$scope.monthyear1)+($scope.tabledata[11]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[11]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[11]['visit_punch']*$scope.monthyear1)+($scope.tabledata[11]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[11]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[11]['face_recognization']*$scope.monthyear1)+($scope.tabledata[11]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[11]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[11]['device_verification']*$scope.monthyear1)+($scope.tabledata[11]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[11]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[11]['time_off']*$scope.monthyear1)+($scope.tabledata[11]['time_off']/30*x*$scope.dayDifference);
					}
					break;
				case (x >= 101 && x <= 120):
					$scope.amount = x*$scope.tabledata[12]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice = (x*$scope.tabledata[12]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[12]['bulk_attendance']/30*x*$scope.dayDifference);
					 
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[12]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice = (x*$scope.tabledata[12]['geo_fence']*$scope.monthyear1)+($scope.tabledata[12]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[12]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price =   (x*$scope.tabledata[12]['payroll']*$scope.monthyear1)+(x*$scope.tabledata[12]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[12]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice = (x*$scope.tabledata[12]['visit_punch']*$scope.monthyear1)+(x*$scope.tabledata[12]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[12]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[12]['face_recognization']*$scope.monthyear1)+($scope.tabledata[12]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[12]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[12]['device_verification']*$scope.monthyear1)+($scope.tabledata[12]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[12]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price =    (x*$scope.tabledata[12]['time_off']*$scope.monthyear1)+($scope.tabledata[12]['time_off']/30*x*$scope.dayDifference);
					}
					break;
                case x > 120:
					$scope.amount = x*$scope.tabledata[13]['yearly']*$scope.monthyear/$scope.flage;
					 if($scope.bulk111 == 1){
					 	$scope.bulk_attprice = x*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear1;
					 }
					 if($scope.bulk111 == 0){
					 	$scope.bulk_attprice =(x*$scope.tabledata[13]['bulk_attendance']*$scope.monthyear1)+($scope.tabledata[13]['bulk_attendance']/30*x*$scope.dayDifference);
					 // alert($scope.bulk_attprice);
					 }
					 if($scope.geo111 == 1){
					 $scope.geo_fenceprice = x*$scope.tabledata[13]['geo_fence']*$scope.monthyear1;
					
					}
					if($scope.geo111 == 0){
					 $scope.geo_fenceprice =(x*$scope.tabledata[13]['geo_fence']*$scope.monthyear1)+($scope.tabledata[13]['geo_fence']/30*x*$scope.dayDifference);
					
					}
					// $scope.location_traceprice = x*$scope.tabledata[7]['location_tracing']*$scope.monthyear1;
					if($scope.hourly111==1){
					 $scope.payroll_price =    x*$scope.tabledata[13]['payroll']*$scope.monthyear1;
					}
					if($scope.hourly111==0){
					 $scope.payroll_price = (x*$scope.tabledata[13]['payroll']*$scope.monthyear1)+($scope.tabledata[13]['payroll']/30*x*$scope.dayDifference);
					}
					if($scope.visit111==1){
					 $scope.visit_punchprice = x*$scope.tabledata[13]['visit_punch']*$scope.monthyear1;
					 }
					 if($scope.visit111==0){
					 $scope.visit_punchprice =(x*$scope.tabledata[13]['visit_punch']*$scope.monthyear1)+($scope.tabledata[13]['visit_punch']/30*x*$scope.dayDifference);
					 }
					  if($scope.face111 == 1){
					
					 $scope.face_price =    x*$scope.tabledata[13]['face_recognization']*$scope.monthyear1;
					}
					if($scope.face111 == 0){
					
					 $scope.face_price =    (x*$scope.tabledata[13]['face_recognization']*$scope.monthyear1)+($scope.tabledata[13]['face_recognization']/30*x*$scope.dayDifference);
					}

					 if($scope.device111 == 1){
					
					 $scope.device_price =    x*$scope.tabledata[13]['device_verification']*$scope.monthyear1;
					}
					if($scope.device111 == 0){
					
					 $scope.device_price =    (x*$scope.tabledata[13]['device_verification']*$scope.monthyear1)+($scope.tabledata[13]['device_verification']/30*x*$scope.dayDifference);
					}
					 if($scope.timeoffs111 == 1){
					
					 $scope.timeoff_price =    x*$scope.tabledata[13]['time_off']*$scope.monthyear1;
					}
					if($scope.timeoffs111 == 0){
					
					 $scope.timeoff_price = (x*$scope.tabledata[13]['time_off']*$scope.monthyear1)+($scope.tabledata[13]['time_off']/30*x*$scope.dayDifference);
					}
					break;					
			}
			
				if($scope.bulk111==0 ){

					// alert($scope.bulk_attprice);
					// alert($scope.flage);
					if($scope.flage==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			// alert("hiiii year");
			}
			if($scope.flage!=1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			// alert("hello month");
			}
			// $scope.bulk_attprice1 = " @"+$scope.currency+". "+(($scope.bulk_attprice)/x)/($scope.dayDifference + ($scope.monthyear*30))*30 +"/"+$scope.month;
			// alert($scope.bulk_attprice1);

		}
		if($scope.bulk111==1){
			$scope.bulk_attprice1 = " @"+$scope.currency+". "+($scope.bulk_attprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		}

			 if($scope.geo111==0){

			 	if($scope.flage==1){

			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			
			}
			if($scope.flage!=1){

			  $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
			
			}
			} 
			 if($scope.geo111==1){
			 $scope.geo_fenceprice1 = " @"+$scope.currency+". "+($scope.geo_fenceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			} 
			 $scope.location_traceprice1 = " @"+$scope.currency+". "+($scope.location_traceprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			  
			   if($scope.hourly111==0){

			   	if($scope.flage==1){

			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){

			 	$scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }


			 }

			  if($scope.hourly111==1){
			 $scope.payroll_price1 = " @"+$scope.currency+". "+($scope.payroll_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
			 }
			 if($scope.visit111 ==0){
			 	if($scope.flage==1){

			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
			 }
			 if($scope.flage!=1){
			 	 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;

			 }

			 }
			 if($scope.visit111 ==1){
			 $scope.visit_punchprice1 =  " @"+$scope.currency+". "+($scope.visit_punchprice*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month ;
			 }

			   if($scope.device111 ==0){
			   	// alert("device");
					// alert($scope.device_price);
			  	if($scope.flage == 1){
			  		// alert($scope.device_price);
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
		 	// alert("helodevice");
		 	// alert($scope.device_price);
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.device111 ==1){
			 	// alert("helodevice1");
		 	// alert($scope.device_price);
			 $scope.device_price1 = " @"+$scope.currency+". "+($scope.device_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

		   if($scope.face111 ==0){
			  	if($scope.flage == 1){

			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.face111 ==1){
			 $scope.face_price1 = " @"+$scope.currency+". "+($scope.face_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }

			  if($scope.timeoffs111 ==0){
			  	if($scope.flage == 1){
			  		// alert("t");
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30*12+"/dayabcd"+$scope.month;
		 }
		 if($scope.flage != 1){
		 	// alert("t1");
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*($scope.dayDifference + ($scope.monthyear1*30)))*30+"/dayabcd"+$scope.month;
		 }
		 }


			 if($scope.timeoffs111 ==1){
			 	// alert("t2");
			 $scope.timeoff_price1 = " @"+$scope.currency+". "+($scope.timeoff_price*$scope.flage)/(x*$scope.monthyear)+"/dayabcd"+$scope.month;
		 }


		 }

		
		//$scope.amount =$scope.amount.toFixed(2);
		//console.log($scope.amount);
		//$scope.amount1 = parseInt($scope.amount);
		$scope.amount1=parseFloat($scope.amount).toFixed(2);
		//console.log($scope.amount1);
		}
	
	 $scope.amount =parseFloat($scope.price_withaddon)+parseFloat($scope.amount1);
	//console.log($scope.amount);
	// $scope.amount=($scope.amount1).toFixed(2);
	 $scope.companyname = $('#orgname').text();
	 $scope.phoneno = parseInt($('#phoneno').text());
	 // alert($scope.phoneno);
	 $scope.add_addons();
	 
	 /// additional amount and user
	 var ragisteruser = parseInt($("#noemp").text());
	 var userlimit = parseInt($("#planuserlimit").text());

	 // alert(ragisteruser);
	 // alert(userlimit);
	 // alert(ragisteruser>userlimit);
	 // alert($scope.additionaluser);
	 // alert(x);
	 // alert(x);
	 // $due_amount =  ((int)$amount/(int)$ragisteruser)*($nofuser);
	 // if(ragisteruser>x)
	 if(ragisteruser>userlimit)
	 {
	 	// alert(x);
		 //alert($scope.amount);
		 //alert($scope.amount/x);
		  // $scope.additionaluser = ragisteruser-x;
		  $scope.additionaluser = ragisteruser-userlimit;
		  // alert($scope.additionaluser);
	    // $scope.dueamount = ($scope.amount/x)* $scope.additionaluser;
	    $scope.dueamount = ($scope.amount/userlimit)* $scope.additionaluser;
	    // alert($scope.dueamount);
	 }
	 else
	 {
		 $scope.dueamount = 0;
	     $scope.additionaluser = 0;
	     // alert($scope.dueamount);
	 }
 }
 
 $scope.fetchtabledata = function()
 {	
	  var xsrf = $.param({sts:2});
	    $scope.hastrue=true;
		$http({
			url: 'upgrade/orgdetails',
			method: "POST",
			data:xsrf,
			headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
		}).success(function (data, status, headers, config) {
			
			$scope.tabledata = data;
			//console.log(data);
			$scope.getamounts();
		}).error(function (data, status, headers, config) {
			$scope.hastrue=false;
		});
 }
 

    
  
 $scope.add_addons = function()
 {
	   $scope.price_withaddon = 0;
	  $scope.bulk_attprice2 = 0;
	  $scope.geo_fenceprice2 = 0;
	  $scope.location_traceprice2 = 0;
	  $scope.payroll_price2 = 0;
	  $scope.visit_punchprice2 = 0;
	  $scope.timeoff_price2 = 0;


	  
	   if($('#bulk_attcheck').prop("checked") == true || $scope.bulk111 == 1)
	    {
			// console.log($scope.bulk_attprice);
		   // $scope.bulk_attprice=($scope.bulk_attprice).toFixed(1);
		   // $scope.bulk_attcheck == 1;
           $scope.price_withaddon = parseFloat($scope.price_withaddon)+parseFloat($scope.bulk_attprice);
		   $scope.bulk_attprice2 = $scope.bulk_attprice;

		   // alert($scope.bulk_attprice2);
		  
        }

		if($('#timeoff_check').prop("checked") == true || $scope.timeoffs111 == 1)
	    {
	    	// alert("checked");
	    	// $scope.timeoff_check == 1;
			 //$scope.timeoff_price=($scope.timeoff_price).toFixed(1);
            $scope.price_withaddon = parseFloat($scope.price_withaddon)+ parseFloat($scope.timeoff_price);
			$scope.timeoff_price2 = $scope.timeoff_price;
        }
        if($('#face_check').prop("checked") == true || $scope.face111 == 1)
	    {
	    	// $scope.face_check == 1;
			 //$scope.face_price=($scope.face_price).toFixed(1);
            $scope.price_withaddon = parseFloat($scope.price_withaddon)+ parseFloat($scope.face_price);
			$scope.face_price2 = $scope.face_price;
        }

        if($('#device_check').prop("checked") == true || $scope.device111 == 1)
	    {
	    	// $scope.device_check == 1;
			 //$scope.device_price=($scope.device_price).toFixed(1);
            $scope.price_withaddon = parseFloat($scope.price_withaddon)+ parseFloat($scope.device_price);
			$scope.device_price2 = $scope.device_price;
        }
		if($('#payroll_check').prop("checked") == true || $scope.hourly111 == 1)
	    {
	    	// $scope.payroll_check == 1;
			//$scope.payroll_price=($scope.payroll_price).toFixed(1);
           $scope.price_withaddon = parseFloat($scope.price_withaddon) + parseFloat($scope.payroll_price);
		    $scope.payroll_price2 = $scope.payroll_price;
        }
		if($('#geo_fencecheck').prop("checked") == true || $scope.geo111 == 1)
	    {
	    	// $scope.geo_fencecheck == 1;
			//$scope.geo_fenceprice=($scope.geo_fenceprice).toFixed(1);
			
           $scope.price_withaddon  = parseFloat($scope.price_withaddon)+parseFloat($scope.geo_fenceprice);
		    $scope.geo_fenceprice2 = $scope.geo_fenceprice;
		}
		if($('#visit_punchcheck').prop("checked") == true || $scope.visit111 == 1)
	    {
	    	// $scope.visit_punchcheck == 1;
            $scope.price_withaddon =parseFloat($scope.price_withaddon)+ parseFloat($scope.visit_punchprice) ;
			$scope.visit_punchprice2 = $scope.visit_punchprice;

        }
		if($('#location_tracecheck').prop("checked") == true)
	    {
			//$scope.location_traceprice=($scope.location_traceprice).toFixed(1);
		
           $scope.price_withaddon = parseFloat($scope.price_withaddon)+ parseFloat($scope.location_traceprice);
		   $scope.location_traceprice2 =  $scope.location_traceprice;
        }
		$scope.amount =parseFloat($scope.price_withaddon)+parseFloat($scope.amount1);
		$scope.amount=($scope.amount).toFixed(2);
		
	 
 }
 
 $scope.fetchdiscount = function()
 {	
	  var xsrf = $.param({sts:3,plan:$scope.month,currency:$scope.currency});
	    $scope.hastrue=true;
		$http({
			url: 'upgrade/orgdetails',
			method: "GET",
			data:xsrf,
			headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
		}).success(function (data, status, headers, config) {
			//console.log(data)
			//alert(data.data);
			if(data!='false')
			{
			
			if(data[0]==''||data[0]==null)
			{
				$scope.discount=0;
			}else
			 $scope.discount=data[0];
			} 
			else
			{
				$scope.discount=false;
			}
			
			
		}).error(function (data, status, headers, config) {
			$scope.hastrue=false;
			alert("Discount could not be calculated.");
		});
		$scope.getamounts();
 }
  $scope.fetchcountry = function()
   {	
	  var xsrf = $.param({sts:4});
	    $scope.hastrue=true;
		$http({
			url: 'upgrade/orgdetails',
			method: "POST",
			data:xsrf,
			headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
		}).success(function (data, status, headers, config) {
			console.log(data);
			if(data)
			{	
			 $scope.countryarr=data.country;
			 // alert(data.country[0].name);
			 $scope.statearr=data.state;
			} 
			
			
		}).error(function (data, status, headers, config) {
			$scope.hastrue=false;
			alert("Country could not be fetched.");
		});
 }


  $scope.fetchplan = function()
   {	

   	setTimeout(function(){ 	


   		$scope.bulk111 = $("#bulk111").text();
   		$scope.visit111 = $("#visit111").text();
   		$scope.geo111 = $("#geo111").text();
   		$scope.hourly111 = $("#hourly111").text();
   		$scope.timeoffs111 = $("#timeoffs111").text();
   		$scope.face111 = $("#face111").val();
   		$scope.device111 = $("#device111").val();
   		
// alert($scope.timeoffs111);
   		// $scope.planstatus = $("#planname").text();

   		// alert($scope.planstatus );

   		


   		$scope.startdateupg = $("#startdate1").text();
   		// alert($scope.startdateupg);
   		$scope.enddateupg = $("#enddate1").text();
   		// alert($scope.enddateupg);
   		$scope.enddateupg1 = $("#enddate").text();
   		 
   		  var enddateupg1 = $scope.enddateupg1
   		$scope.reguser = $("#noemp1").text();
   		

   		var today = new Date();
  var formattedDate = $filter('date')(today, 'yyyy-MM-dd');
  $scope.today111 = formattedDate;
  var diff = ($scope.enddateupg1) - (formattedDate);


  var date2 = new Date(enddateupg1);
var date1 = new Date(formattedDate);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
$scope.dayDifference = Math.ceil(timeDiff / (1000 * 3600 * 24));

var date2 = new Date(enddateupg1);
var date1 = new Date(formattedDate);
var timeDiff = Math.abs(date1.getTime() - date2.getTime());
$scope.dayDifference1 = Math.ceil(timeDiff / (1000 * 3600 * 24));


// return $scope.dayDifference;

   		// alert(formattedDate);
   		// alert($scope.enddateupg1);
   		// alert($scope.dayDifference);
   		// alert(Difference_In_Time);

   		
  

  // alert(formattedDate);



   		// alert($scope.startdateupg);
   		// alert($scope.enddateupg);
   		// alert($scope.reguser);


   	}, 8000);
	 //  var xsrf = $.param({sts:1});
	 //    $scope.hastrue=true;
		// $http({
		// 	url: 'upgrade/orgdetails',
		// 	method: "POST",
		// 	data:xsrf,
		// 	headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
		// }).success(function (data, status, headers, config) {

		// 	alert(data);
		// 	console.log(data);
			
		// 	 $scope.plandetailarr=data.plandetail;
		// 	 // alert(data.country[0].name);
			 
			
			
			
		// }).error(function (data, status, headers, config) {
		// 	$scope.hastrue=false;
		// 	alert("Country could not be fetched.");
		// });
 }
 $scope.fetchcountry();
 

 // alert($scope.plandetailarr);
 $scope.fetchplan();
 
 // alert($scope.fetchcountry());
 $scope.fetchdiscount();
 $scope.fetchtabledata();
 
 $scope.refreshdata = function()
 {
	 $scope.state = "";
	 $scope.city = "";
	 $scope.zipcode = "";
 }
 function add_months(n) 
 {
   var dt = new Date($scope.enddateupg1);
   // alert(dt);
   return new Date(dt.setMonth(dt.getMonth() + n));      
 }

$scope.hide = function(){


	$scope.durationonly= $("#duration2").hide();
	$scope.durationonly1= $("#duration1").hide();
	$scope.useronly1= $("#slider1").show();
	$scope.monthyear = 0;
	$scope.nouser = 0;
}

$scope.show = function(){


	$scope.durationonly= $("#duration2").show();
	$scope.durationonly1= $("#duration1").show();
	$scope.useronly1= $("#slider1").hide();
	$scope.nouser = 0;
	$scope.monthyear = 0;
}

$scope.showhide = function(){

// alert("jai ho");
	$scope.durationonly= $("#duration2").show();
	$scope.durationonly1= $("#duration1").show();
	$scope.useronly1= $("#slider1").show();
	// $scope.rday = $("#rday").hide();
	// alert("jai ho");
	// $scope.nouser = 0;
}
// $scope.hide();
$scope.show();


 function enddate(n)
 {
	// alert(n);
 var today1 = add_months(n); 
 var dd1 = today1.getDate();
 var mm1 = today1.getMonth()+1; 
 var yyyy1 = today1.getFullYear();

 // alert(today1);
 // alert(dd1);
 // alert(mm1);
 // alert(yyyy1);
 if(dd1<10) {
    dd1 = '0'+dd1
 } 
 if(mm1<10) {
    mm1 = '0'+mm1
 } 

var monthString='';

switch(mm1){
	case '01':
	monthString='Jan';
	break;
	case '02':
	monthString='Feb';
	break;
	case '03':
	monthString='Mar';
	break;
	case '04':
	monthString='Apr';
	break;
	case '05':
	monthString='May';
	break;
	case '06':
	monthString='Jun';
	break;
	case '07':
	monthString='Jul';
	break;
	case '08':
	monthString='Aug';
	break;
	case '09':
	monthString='Sep';
	break;
	case '10':
	monthString='Oct';
	break;
	case '11':
	monthString='Nov';
	break;
	case '12':
	monthString='Dec';
	break;

}
$scope.enddate121 = dd1 + '-' + mm1 + '-' + yyyy1;
$scope.enddate = dd1 + '-' + monthString + '-' + yyyy1;

// alert($scope.enddate);

// alert($scope.enddate);
// $scope.enddate1 = Date.parseDate($scope.enddate, "dd-mm-yyyy");
// $scope.enddate1 = ($scope.enddate).Date.prototype.toDateString("MM/dd/yyyy");
// ($startDate.val(), "MM/dd/yyyy");
// $scope.formatedDate = moment($scope.enddate, "dd-MMM-yyyy");
// alert($scope.enddate1);
// alert($scope.enddate);
 // $scope.item = $filter("date")($scope.enddate, "dd/MMM/yyyy");
// alert($scope.enddate1);
// console.log($scope.enddate);

// alert($scope.formatedDate);
// console.log($scope.formatedDate);
// $scope.enddate = new Date();
 //alert($scope.enddate);
 }
 
 // payment functions

  var $validator1 = $('.wizard-card form')





 
      var $validator = $('.wizard-card form').validate({


		  rules: {
		      crn: {
		      required: true,
		      minlength: 3
		    },
		    // monthyear: {
		    //   required: true,
			  

			  
		     
		    // },
		    


			// gstno:
			// {
			// required: true,
			// maxlength:15,
			// minlength:15,
			// },
		    currency: {
		      required: true,
		      
		    },
			nouser: {
		      required: true,
		    },
			companyname: {
				required: true,
			},
			phoneno: {
				required: true,
				minlength: 8,
				
			},
			
			country: {
				required: true,
			},
			phoneno: {
				required: true,
			},
			addition:{

				required:true,
			},
			addition2:{
				required:true,
			},

			addition3:{
				required:true,
			},

        },

        errorPlacement: function(error,element) {
            $(element).parent('div').addClass('has-error');
         }
	});
		$scope.razorpay=function()
	{
		
		var $valid = $('.wizard-card form').valid();

		if(!$valid)
		{
			$validator.focusInvalid();
			return false;
		}
		// var scope = angular.element($("#razoramt")).scope();
		  
			// var newvalue = scope.calculatedAmt;
			
			// $.ajax
			// ({ 
				// url: 'buy/curl',
				// data: {"Amount": newvalue},
				// type: 'post',
				// success: function(result)
				// {
			
					// $("#nextbtn").html(result);
				// }
			// });
			else if($scope.gst=='m')
			{
				var validGst = $scope.gstno;
				//console.log($scope.gstno);
				if(validGst!=undefined)
				{	
			
					if(validGst.length==15)
					{
						$scope.savetemppayment();
						var today =new Date();
						// alert(today);
						var curyear = today.getFullYear();
						var curmonth = today.getMonth()+1;
						var curdate =today.getDate();
						var dateStr = curyear + "-" + curmonth + "-" + curdate;
						if($scope.calculatedAmt<=0)
						$scope.calculatedAmt=1;
						var total = $scope.calculatedAmt;	
						//alert(total);						
						var OrganizationId = $("#OrganizationId").text();
						var contact= $scope.phoneno;
						var ind_name= $scope.companyname;
						var country= $scope.country;
						var state= $scope.state;
						var city= $scope.city;
						var zip= $scope.zipcode;
						var street= $scope.street;
						var noofusers= $scope.nouser;
						var currency= $scope.currency;
						// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
						var taxforinr = 0;
						if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
						var discount = ($scope.amount*$scope.discount)/100;
						var gstin = $scope.gstno;
						var plan = $scope.month+"ly";
						var duration = $scope.monthyear;
						
						
						var bulk_attprice11 =  $scope.bulk_attprice2;
						var geo_fenceprice11 =   $scope.geo_fenceprice2;
						var location_traceprice11 =  $scope.location_traceprice;
						var payroll_price11 =   $scope.payroll_price2;
						var visit_punchprice11 =   $scope.visit_punchprice2;
						var timeoff_price11 =   $scope.timeoff_price2;
						var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
						if(OrganizationId==0 || OrganizationId=='')
						{
							alert("organization id not found");
							return false;
						}
							$('#razorpay').hide();
						$.ajax
						({ 
							url: 'Upgrade/curl',
							data: 
							{
								"Amount": total,
								"currency":currency,
								"plan":plan,										
								"ind_name":ind_name,					
								"contact":contact,					
								"street":btoa(street),					
								"country":btoa(country),					
								"state":state,					
								"noofusers":noofusers,					
								"taxforinr":btoa(taxforinr),					
								"discount":btoa(discount),					
								"OrganizationId":btoa(OrganizationId),					
								"duration":duration,					
								"zip":zip,	
								"city":city,	
								"gstin":gstin,	
								"bulk_attprice":bulk_attprice11,
								"geo_fenceprice":geo_fenceprice11,
								"location_traceprice":location_traceprice11,
								"payroll_price":payroll_price11,
								"visit_punchprice":visit_punchprice11,
								"timeoff_price":timeoff_price11,
								"face_price":face_price11,
								"device_price":device_price11
					
							},
							type: 'post',
							success: function(result)
							{
						
								$("#nextbtn").html(result);
							}
						});
					}
					else if(validGst.length=='')
					{
						$scope.savetemppayment();
						var today =new Date();
						var curyear = today.getFullYear();
						var curmonth = today.getMonth()+1;
						var curdate =today.getDate();
						var dateStr = curyear + "-" + curmonth + "-" + curdate;
						if($scope.calculatedAmt<=0)
						$scope.calculatedAmt=1;
						var total = $scope.calculatedAmt;
						var OrganizationId = $("#OrganizationId").text();
						
						var contact= $scope.phoneno;
						var ind_name= $scope.companyname;
						var country= $scope.country;
						var state= $scope.state;
						var city= $scope.city;
						var zip= $scope.zipcode;
						var street= $scope.street;
						var noofusers= $scope.nouser;
						var currency= $scope.currency;
						// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
						var taxforinr = 0;
						if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
						var discount = ($scope.amount*$scope.discount)/100;
						var gstin = $scope.gstno;
						var plan = $scope.month+"ly";
						var duration = $scope.monthyear;
						var paypal_email = 'namrata@ubitechsolutions.com'; // Live Email
						
						var bulk_attprice11 =  $scope.bulk_attprice2;
						var geo_fenceprice11 =   $scope.geo_fenceprice2;
						var location_traceprice11 =  $scope.location_traceprice;
						var payroll_price11 =   $scope.payroll_price2;
						var visit_punchprice11 =   $scope.visit_punchprice2;
						var timeoff_price11 =   $scope.timeoff_price2;
						var face_price11 =   $scope.face_price2;
						var device_price11 =   $scope.device_price2;
						$('#razorpay').hide();
						$.ajax
						({ 
							url: 'Upgrade/curl',
							data: 
							{
								"Amount": total,
								"currency":currency,
								"plan":plan,										
								"ind_name":ind_name,					
								"contact":contact,					
								"street":btoa(street),					
								"country":btoa(country),					
								"state":state,					
								"noofusers":noofusers,					
								"taxforinr":btoa(taxforinr),					
								"discount":btoa(discount),					
								"OrganizationId":btoa(OrganizationId),					
								"duration":duration,					
								"zip":zip,	
								"city":city,	
								"gstin":gstin,	
								"bulk_attprice":bulk_attprice11,
								"geo_fenceprice":geo_fenceprice11,
								"location_traceprice":location_traceprice11,
								"payroll_price":payroll_price11,
								"visit_punchprice":visit_punchprice11,
								"timeoff_price":timeoff_price11,
								"face_price":face_price11,
								"device_price":device_price11
					
							},
							type: 'post',
							success: function(result)
							{
						
								$("#nextbtn").html(result);
							}
						});
					}
					else
					{
						alert('GST should contain 15 digits');
						return false;
					}
				}
				else 
				{
					alert('GST should not be null');
					return false;
				}
			}
				else if($scope.gst=='y')
				{
					$scope.savetemppayment();
					var today =new Date();
					var curyear = today.getFullYear();
					var curmonth = today.getMonth()+1;
					var curdate =today.getDate();
					var dateStr = curyear + "-" + curmonth + "-" + curdate;
					if($scope.calculatedAmt<=0)
					$scope.calculatedAmt=1;
					var total = $scope.calculatedAmt;
					var OrganizationId = $("#OrganizationId").text();
					var contact= $scope.phoneno;
					var ind_name= $scope.companyname;
					var country= $scope.country;
					var state= $scope.state;
					var city= $scope.city;
					var zip= $scope.zipcode;
					var street= $scope.street;
					var noofusers= $scope.nouser;
					var currency= $scope.currency;
					// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					var taxforinr = 0;
					if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
					var discount = ($scope.amount*$scope.discount)/100;
					var gstin = $scope.gstno;
					var plan = $scope.month+"ly";
					var duration = $scope.monthyear;					
					var bulk_attprice11 =  $scope.bulk_attprice2;
					var geo_fenceprice11 =   $scope.geo_fenceprice2;
					var location_traceprice11 =  $scope.location_traceprice;
					var payroll_price11 =   $scope.payroll_price2;
					var visit_punchprice11 =   $scope.visit_punchprice2;
					var timeoff_price11 =   $scope.timeoff_price2;
					var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
					$('#razorpay').hide();
					$.ajax
						({ 
							url: 'Upgrade/curl',
							data: 
							{
								"Amount": total,
								"currency":currency,
								"plan":plan,										
								"ind_name":ind_name,					
								"contact":contact,					
								"street":btoa(street),					
								"country":btoa(country),					
								"state":state,					
								"noofusers":noofusers,					
								"taxforinr":btoa(taxforinr),					
								"discount":btoa(discount),					
								"OrganizationId":btoa(OrganizationId),					
								"duration":duration,					
								"zip":zip,	
								"city":city,	
								"gstin":gstin,	
								"bulk_attprice":bulk_attprice11,
								"geo_fenceprice":geo_fenceprice11,
								"location_traceprice":location_traceprice11,
								"payroll_price":payroll_price11,
								"visit_punchprice":visit_punchprice11,
								"timeoff_price":timeoff_price11,
								"face_price":face_price11,
								"device_price":device_price11
					
							},
							type: 'post',
							success: function(result)
							{
						
								$("#nextbtn").html(result);
							}
						});
				}
				else if($scope.referralDiscount>total)
				{
					alert('You still have '+$scope.currency+' '+($scope.calculatedAmt-$scope.referralDiscount)+' in your credit which will lapse after this payment. You can increase your Subscription period to utilize the amount.');
					return false;
				}
				else
				{
					$scope.savetemppayment();
					var today =new Date();
					var curyear = today.getFullYear();
					var curmonth = today.getMonth()+1;
					var curdate =today.getDate();
					var dateStr = curyear + "-" + curmonth + "-" + curdate;
					
					//console.log($scope.promocode);
					if($scope.calculatedAmt<=0)
						$scope.calculatedAmt=1;
					var total = $scope.calculatedAmt;
					var OrganizationId = $("#OrganizationId").text();
					var contact= $scope.phoneno;
					var ind_name= $scope.companyname;
					var country= $scope.country;
					var state= $scope.state;
					var city= $scope.city;
					var zip= $scope.zipcode;
					var street= $scope.street;
					var noofusers= $scope.nouser;
					var currency= $scope.currency;
					// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					var taxforinr = 0;
					if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
					var discount = ($scope.amount*$scope.discount)/100;
					var gstin = $scope.gstno;
					var plan = $scope.month+"ly";
					var duration = $scope.monthyear;
					var paypal_email = 'namrata@ubitechsolutions.com'; // Live Email
					
					var bulk_attprice11 =  $scope.bulk_attprice2;
					var geo_fenceprice11 =   $scope.geo_fenceprice2;
					var location_traceprice11 =  $scope.location_traceprice;
					var payroll_price11 =   $scope.payroll_price2;
					var visit_punchprice11 =   $scope.visit_punchprice2;
					var timeoff_price11 =   $scope.timeoff_price2;
					var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
					$('#razorpay').hide();
					$.ajax
						({ 
							url: 'Upgrade/curl',
							data: 
							{
								"Amount": total,
								"currency":currency,
								"plan":plan,										
								"ind_name":ind_name,					
								"contact":contact,					
								"street":btoa(street),					
								"country":btoa(country),					
								"state":state,					
								"noofusers":noofusers,					
								"taxforinr":btoa(taxforinr),					
								"discount":btoa(discount),					
								"OrganizationId":btoa(OrganizationId),					
								"duration":duration,					
								"zip":zip,	
								"city":city,	
								"gstin":gstin,	
								"bulk_attprice":bulk_attprice11,
								"geo_fenceprice":geo_fenceprice11,
								"location_traceprice":location_traceprice11,
								"payroll_price":payroll_price11,
								"visit_punchprice":visit_punchprice11,
								"timeoff_price":timeoff_price11,
								"face_price":face_price11,
								"device_price":device_price11
					
							},
							type: 'post',
							success: function(result)
							{
						
								$("#nextbtn").html(result);
							}
						});
				}
	}	
  $scope.payment = function()
		{
	
	var $valid = $('.wizard-card form').valid();

		if(!$valid)
			{
				$validator.focusInvalid();
				return false;
			}

			
	else if($scope.gst=='m')
	 {
		var validGst = $scope.gstno;
		//console.log($scope.gstno);
		if(validGst!=undefined)
		{	
			if(validGst.length==15)
			{
			$scope.savetemppayment();
				var today =new Date();
				// alert(today);
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				if($scope.calculatedAmt<=0)
					$scope.calculatedAmt=1;
			var total = $scope.calculatedAmt;
			//var promocode=$scope.promocode;
		 
		// if($scope.promocode!="DIWALI25" && $scope.promocode!="")
		// {
			// alert('Invalid PromoCode');
			// return false;
			
		// }
		// else
		// {
			// if(dateStr<='2019-10-27')
			// {
			// var promototal=(total)*25/100;
			// }
		//var total=total-promototal;
		
				console.log(total);
			
				var OrganizationId = $("#OrganizationId").text();
				var contact= $scope.phoneno;
				var ind_name= $scope.companyname;
				var country= $scope.country;
				var state= $scope.state;
				var city= $scope.city;
				var zip= $scope.zipcode;
				var street= $scope.street;
				var noofusers= $scope.nouser;
				var currency= $scope.currency;
				// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
				var taxforinr = 0;
				if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
				var discount = ($scope.amount*$scope.discount)/100;
				var gstin = $scope.gstno;
				var plan = $scope.month+"ly";
				var duration = $scope.monthyear;
				var paypal_email = 'namrata@ubitechsolutions.com'; // Live Email
				
				var bulk_attprice11 =  $scope.bulk_attprice2;
				var geo_fenceprice11 =   $scope.geo_fenceprice2;
				var location_traceprice11 =  $scope.location_traceprice;
				var payroll_price11 =   $scope.payroll_price2;
				var visit_punchprice11 =   $scope.visit_punchprice2;
				var timeoff_price11 =   $scope.timeoff_price2;
				var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
				if(OrganizationId==0 || OrganizationId==''){


					alert("organization id not found");
					return false;
				}
				
			
				var querystring1 = "";	
				querystring1 += "?total="+btoa(total)+"%26";	
				querystring1 += "currency="+currency+"%26";										
				querystring1 += "plan="+plan+"%26";										
				querystring1 += "ind_name="+ind_name+"%26"					
				querystring1 += "contact="+contact+"%26";					
				querystring1 += "street="+btoa(street)+"%26";					
				querystring1 += "country="+btoa(country)+"%26";					
				querystring1 += "state="+state+"%26";					
				querystring1 += "noofusers="+noofusers+"%26";					
				querystring1 += "taxforinr="+btoa(taxforinr)+"%26";					
				querystring1 += "discount="+btoa(discount)+"%26";					
				querystring1 += "OrganizationId="+btoa(OrganizationId)+"%26";					
				querystring1 += "duration="+btoa(duration)+"%26";					
				querystring1 += "zip="+zip+"%26";	
				querystring1 += "city="+city+"%26";	
				querystring1 += "gstin="+gstin+"%26";	
				querystring1 += "bulk_attprice="+bulk_attprice11+"%26";
			    querystring1 += "geo_fenceprice="+geo_fenceprice11+"%26";
			    querystring1 += "location_traceprice="+location_traceprice11+"%26";
			    querystring1 += "payroll_price="+payroll_price11+"%26";
			    querystring1 += "visit_punchprice="+visit_punchprice11+"%26";
			    querystring1 += "timeoff_price="+timeoff_price11; 
			    querystring1 += "face_price="+face_price11; 
			    querystring1 += "device_price="+device_price11; 
				
				var return_url = 'https://buy.ubiattendance.com/success.php'+querystring1;
				
				var cancel_url ='https://buy.ubiattendance.com/failed.php'+querystring1;	
				
				//var return_url = 'http://192.168.0.200/vijay/pay/success.php'+querystring1;
				
				//var cancel_url ='http://192.168.0.200/vijay/pay/failed.php'+querystring1;
				
				//var notify_url = 'http://www.ubijournal.com/payment/renewal-process.php?cp_rs=2';
			//	var notify_url = 'http://ubitechsolutions.com/ijrap/notify.php';
			
				var querystring = "?business="+(paypal_email)+"&";	
				
				querystring += "hosted_button_id=C5567TZ5WM9H4&";
				querystring += "amount="+total+"&";
				querystring += "item_name=ubiAttendanceSubscription&";						
				querystring += "no_note=1&";					
				querystring += "lc=US&";							
				querystring += "currency="+currency+"&";													
				querystring += "contact="+contact+"&";										
				querystring += "cmd=_xclick&";
				querystring += "return="+return_url+"&";
				querystring += "cancel_return="+cancel_url+"&";
				//	querystring += "notify_url="+notify_url;
				querystring += "&custom=" + contact;
				window.open('https://www.sandbox.paypal.com/cgi-bin/webscr'+querystring,"_blank");
				 // window.open('https://www.paypal.com/cgi-bin/webscr'+querystring,"_self");
			}
			//}
			else if(validGst.length=='')
			{
			$scope.savetemppayment();
			    var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				if($scope.calculatedAmt<=0)
					$scope.calculatedAmt=1;
			var total = $scope.calculatedAmt;
			
			
			
			// var promocode=$scope.promocode;
		 
		// if($scope.promocode!="DIWALI25" && $scope.promocode!="")
		// {
			// alert('Invalid PromoCode');
			// return false;
			
		// }
		// else
		// {
			// if(dateStr<='2019-10-27')
			// {
			// var promototal=(total)*25/100;
			// }
		// var total=total-promototal;
		
				console.log(total);
				
				var OrganizationId = $("#OrganizationId").text();
				var contact= $scope.phoneno;
				var ind_name= $scope.companyname;
				var country= $scope.country;
				var state= $scope.state;
				var city= $scope.city;
				var zip= $scope.zipcode;
				var street= $scope.street;
				var noofusers= $scope.nouser;
				var currency= $scope.currency;
				// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
				var taxforinr = 0;
				if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
				var discount = ($scope.amount*$scope.discount)/100;
				var gstin = $scope.gstno;
				var plan = $scope.month+"ly";
				var duration = $scope.monthyear;
				var paypal_email = 'namrata@ubitechsolutions.com'; // Live Email
				
				var bulk_attprice11 =  $scope.bulk_attprice2;
				var geo_fenceprice11 =   $scope.geo_fenceprice2;
				var location_traceprice11 =  $scope.location_traceprice;
				var payroll_price11 =   $scope.payroll_price2;
				var visit_punchprice11 =   $scope.visit_punchprice2;
				var timeoff_price11 =   $scope.timeoff_price2;
				var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
				
				
				var querystring1 = "";	
				querystring1 += "?total="+btoa(total)+"%26";	
				querystring1 += "currency="+currency+"%26";										
				querystring1 += "plan="+plan+"%26";										
				querystring1 += "ind_name="+ind_name+"%26"					
				querystring1 += "contact="+contact+"%26";					
				querystring1 += "street="+btoa(street)+"%26";					
				querystring1 += "country="+btoa(country)+"%26";					
				querystring1 += "state="+state+"%26";					
				querystring1 += "noofusers="+noofusers+"%26";					
				querystring1 += "taxforinr="+btoa(taxforinr)+"%26";					
				querystring1 += "discount="+btoa(discount)+"%26";					
				querystring1 += "OrganizationId="+btoa(OrganizationId)+"%26";					
				querystring1 += "duration="+btoa(duration)+"%26";					
				querystring1 += "zip="+zip+"%26";	
				querystring1 += "city="+city+"%26";	
				querystring1 += "gstin="+gstin+"%26";	
				querystring1 += "bulk_attprice="+bulk_attprice11+"%26";
			    querystring1 += "geo_fenceprice="+geo_fenceprice11+"%26";
			    querystring1 += "location_traceprice="+location_traceprice11+"%26";
			    querystring1 += "payroll_price="+payroll_price11+"%26";
			    querystring1 += "visit_punchprice="+visit_punchprice11+"%26";
			    querystring1 += "timeoff_price="+timeoff_price11; 
			    querystring1 += "face_price="+face_price11; 
			    querystring1 += "device_price="+device_price11; 
				
				var return_url = 'https://buy.ubiattendance.com/success.php'+querystring1;
				
				var cancel_url ='https://buy.ubiattendance.com/failed.php'+querystring1;	
				
				//var return_url = 'http://192.168.0.200/vijay/pay/success.php'+querystring1;
				
				//var cancel_url ='http://192.168.0.200/vijay/pay/failed.php'+querystring1;
				
				//var notify_url = 'http://www.ubijournal.com/payment/renewal-process.php?cp_rs=2';
			//	var notify_url = 'http://ubitechsolutions.com/ijrap/notify.php';
			
				var querystring = "?business="+(paypal_email)+"&";	
				
				querystring += "hosted_button_id=C5567TZ5WM9H4&";
				querystring += "amount="+total+"&";
				querystring += "item_name=ubiAttendanceSubscription&";						
				querystring += "no_note=1&";					
				querystring += "lc=US&";							
				querystring += "currency="+currency+"&";													
				querystring += "contact="+contact+"&";										
				querystring += "cmd=_xclick&";
				querystring += "return="+return_url+"&";
				querystring += "cancel_return="+cancel_url+"&";
				//	querystring += "notify_url="+notify_url;
				querystring += "&custom=" + contact;
				window.open('https://www.sandbox.paypal.com/cgi-bin/webscr'+querystring,"_blank");
				 // window.open('https://www.paypal.com/cgi-bin/webscr'+querystring,"_self");
			//}
			}
			
			else
			{
			alert('GST should contain 15 digits');
			return false;
			}
		}
		
		 else 
		 {
			 alert('GST should not be null');
					return false;
		 }
	 }
	 else if($scope.gst=='y')
	 {
		$scope.savetemppayment();
				var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
			if($scope.calculatedAmt<=0)
					$scope.calculatedAmt=1;
		var total = $scope.calculatedAmt;
		
		//var total1=$scope.amount-($scope.amount*$scope.discount)/100+($scope.amount-($scope.amount*$scope.discount)/100);
		
		 // var promocode=$scope.promocode;
		 
		// if($scope.promocode!="DIWALI25" && $scope.promocode!="")
		// {
			// alert('Invalid PromoCode');
			// return false;
			
		// }
		// else
		// {
			// if(dateStr<='2019-10-27')
			// {
			// var promototal=(total)*25/100;
			// }
		// var total=total-promototal;
		
				console.log(total);
				var OrganizationId = $("#OrganizationId").text();
				var contact= $scope.phoneno;
				var ind_name= $scope.companyname;
				var country= $scope.country;
				var state= $scope.state;
				var city= $scope.city;
				var zip= $scope.zipcode;
				var street= $scope.street;
				var noofusers= $scope.nouser;
				var currency= $scope.currency;
				// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
				var taxforinr = 0;
				if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
				var discount = ($scope.amount*$scope.discount)/100;
				var gstin = $scope.gstno;
				var plan = $scope.month+"ly";
				var duration = $scope.monthyear;
				var paypal_email = 'namrata@ubitechsolutions.com'; // Live Email
				
				var bulk_attprice11 =  $scope.bulk_attprice2;
				var geo_fenceprice11 =   $scope.geo_fenceprice2;
				var location_traceprice11 =  $scope.location_traceprice;
				var payroll_price11 =   $scope.payroll_price2;
				var visit_punchprice11 =   $scope.visit_punchprice2;
				var timeoff_price11 =   $scope.timeoff_price2;
				var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
				
				
				var querystring1 = "";	
				querystring1 += "?total="+btoa(total)+"%26";	
				querystring1 += "currency="+currency+"%26";										
				querystring1 += "plan="+plan+"%26";										
				querystring1 += "ind_name="+ind_name+"%26"					
				querystring1 += "contact="+contact+"%26";					
				querystring1 += "street="+btoa(street)+"%26";					
				querystring1 += "country="+btoa(country)+"%26";					
				querystring1 += "state="+state+"%26";					
				querystring1 += "noofusers="+noofusers+"%26";					
				querystring1 += "taxforinr="+btoa(taxforinr)+"%26";					
				querystring1 += "discount="+btoa(discount)+"%26";					
				querystring1 += "OrganizationId="+btoa(OrganizationId)+"%26";					
				querystring1 += "duration="+btoa(duration)+"%26";					
				querystring1 += "zip="+zip+"%26";	
				querystring1 += "city="+city+"%26";	
				querystring1 += "gstin="+gstin+"%26";	
				//querystring1 += "promototal="+promototal+"%26";	
				//querystring1 += "promocode="+promocode+"%26";	
				
				querystring1 += "bulk_attprice="+bulk_attprice11+"%26";
			    querystring1 += "geo_fenceprice="+geo_fenceprice11+"%26";
			    querystring1 += "location_traceprice="+location_traceprice11+"%26";
			    querystring1 += "payroll_price="+payroll_price11+"%26";
			    querystring1 += "visit_punchprice="+visit_punchprice11+"%26";
			    querystring1 += "timeoff_price="+timeoff_price11; 
			    querystring1 += "face_price="+face_price11; 
			    querystring1 += "device_price="+device_price11; 
				
				var return_url = 'https://buy.ubiattendance.com/success.php'+querystring1;
				
			var cancel_url ='https://buy.ubiattendance.com/failed.php'+querystring1;	
				
				//var return_url = 'http://192.168.0.200/vijay/pay/success.php'+querystring1;
				
				//var cancel_url ='http://192.168.0.200/vijay/pay/failed.php'+querystring1;
				
				//var notify_url = 'http://www.ubijournal.com/payment/renewal-process.php?cp_rs=2';
			//	var notify_url = 'http://ubitechsolutions.com/ijrap/notify.php';
			
				var querystring = "?business="+(paypal_email)+"&";	
				
				querystring += "hosted_button_id=C5567TZ5WM9H4&";
				querystring += "amount="+total+"&";
				querystring += "item_name=ubiAttendanceSubscription&";						
				querystring += "no_note=1&";					
				querystring += "lc=US&";							
				querystring += "currency="+currency+"&";													
				querystring += "contact="+contact+"&";										
				querystring += "cmd=_xclick&";
				querystring += "return="+return_url+"&";
				querystring += "cancel_return="+cancel_url+"&";
				//	querystring += "notify_url="+notify_url;
				querystring += "&custom=" + contact;
				window.open('https://www.sandbox.paypal.com/cgi-bin/webscr'+querystring,"_blank");
				 // window.open('https://www.paypal.com/cgi-bin/webscr'+querystring,"_self");
		//}
	 }	
	 else if($scope.referralDiscount>total)
			{
			alert('You still have '+$scope.currency+' '+($scope.calculatedAmt-$scope.referralDiscount)+' in your credit which will lapse after this payment. You can increase your Subscription period to utilize the amount.');
			return false;
			}
	 
			else
			{
				
				$scope.savetemppayment();
				var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				
				//console.log($scope.promocode);
				if($scope.calculatedAmt<=0)
					$scope.calculatedAmt=1;
				var total = $scope.calculatedAmt;
				
				
				// var promocode=$scope.promocode;
		 
		// if($scope.promocode!="DIWALI25" && $scope.promocode!="")
		// {
			// alert('Invalid PromoCode');
			// return false;
			
		// }
		// else
		// {
			// if(dateStr<='2019-10-27')
			// {
			// var promototal=(total1)*25/100;
			// }
		// var total=total-promototal;
		
		
				var OrganizationId = $("#OrganizationId").text();
				var contact= $scope.phoneno;
				var ind_name= $scope.companyname;
				var country= $scope.country;
				var state= $scope.state;
				var city= $scope.city;
				var zip= $scope.zipcode;
				var street= $scope.street;
				var noofusers= $scope.nouser;
				var currency= $scope.currency;
				// var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
				var taxforinr = 0;
				if($scope.currency == 'USD'){

							taxforinr = 0.00;
						}
						else{
						taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
					}
				var discount = ($scope.amount*$scope.discount)/100;
				var gstin = $scope.gstno;
				var plan = $scope.month+"ly";
				var duration = $scope.monthyear;
				var paypal_email = 'namrata@ubitechsolutions.com'; // Live Email
				
				var bulk_attprice11 =  $scope.bulk_attprice2;
				var geo_fenceprice11 =   $scope.geo_fenceprice2;
				var location_traceprice11 =  $scope.location_traceprice;
				var payroll_price11 =   $scope.payroll_price2;
				var visit_punchprice11 =   $scope.visit_punchprice2;
				var timeoff_price11 =   $scope.timeoff_price2;
				var face_price11 =   $scope.face_price2;
					var device_price11 =   $scope.device_price2;
				
				
				var querystring1 = "";	
				querystring1 += "?total="+btoa(total)+"%26";	
				querystring1 += "currency="+currency+"%26";										
				querystring1 += "plan="+plan+"%26";										
				querystring1 += "ind_name="+ind_name+"%26"					
				querystring1 += "contact="+contact+"%26";					
				querystring1 += "street="+btoa(street)+"%26";					
				querystring1 += "country="+btoa(country)+"%26";					
				querystring1 += "state="+state+"%26";					
				querystring1 += "noofusers="+noofusers+"%26";					
				querystring1 += "taxforinr="+btoa(taxforinr)+"%26";					
				querystring1 += "discount="+btoa(discount)+"%26";					
				querystring1 += "OrganizationId="+btoa(OrganizationId)+"%26";					
				querystring1 += "duration="+btoa(duration)+"%26";					
				querystring1 += "zip="+zip+"%26";	
				querystring1 += "city="+city+"%26";	
				querystring1 += "gstin="+gstin+"%26";	
				querystring1 += "bulk_attprice="+bulk_attprice11+"%26";
			    querystring1 += "geo_fenceprice="+geo_fenceprice11+"%26";
			    querystring1 += "location_traceprice="+location_traceprice11+"%26";
			    querystring1 += "payroll_price="+payroll_price11+"%26";
			    querystring1 += "visit_punchprice="+visit_punchprice11+"%26";
			    querystring1 += "timeoff_price="+timeoff_price11; 
			    querystring1 += "face_price="+face_price11; 
			    querystring1 += "device_price="+device_price11; 
				
				var return_url = 'https://buy.ubiattendance.com/success.php'+querystring1;
				
				var cancel_url ='https://buy.ubiattendance.com/failed.php'+querystring1;	
				
				//var return_url = 'http://192.168.0.200/vijay/pay/success.php'+querystring1;
				
				//var cancel_url ='http://192.168.0.200/vijay/pay/failed.php'+querystring1;
				
				//var notify_url = 'http://www.ubijournal.com/payment/renewal-process.php?cp_rs=2';
			//	var notify_url = 'http://ubitechsolutions.com/ijrap/notify.php';
			
				var querystring = "?business="+(paypal_email)+"&";	
				
				querystring += "hosted_button_id=C5567TZ5WM9H4&";
				querystring += "amount="+total+"&";
				querystring += "item_name=ubiAttendanceSubscription&";						
				querystring += "no_note=1&";					
				querystring += "lc=US&";							
				querystring += "currency="+currency+"&";													
				querystring += "contact="+contact+"&";										
				querystring += "cmd=_xclick&";
				querystring += "return="+return_url+"&";
				querystring += "cancel_return="+cancel_url+"&";
				//	querystring += "notify_url="+notify_url;
				querystring += "&custom=" + contact;
				window.open('https://www.sandbox.paypal.com/cgi-bin/webscr'+querystring,"_blank");
				
				 // window.open('https://www.paypal.com/cgi-bin/webscr'+querystring,"_self");
			//}
			}
 }
 
 
$scope.payumoneypay = function()
 {	 
	//console.log($scope.amount);
	//console.log($scope.promocode);
	//return false;
	 if($scope.gst=='m')
	 {
		var validGst = $scope.gstno;
		//console.log($scope.gstno);
		if(validGst!=undefined)
		{	
			if(validGst.length==15)
			{
				$scope.savetemppayment();
				var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				
				// var promocode=$scope.promocode;
				// var total=$scope.amount;
				// console.log(total);
				// if(promocode!="DIWALI25" && promocode!="")
				// {
					// alert('Invalid PromoCode');
					// return false;
				// }
				// else
				// {
					// if(dateStr<='2019-10-27')
					// {
					// var promototal=(total)*25/100;
					// }
				// var total=total-promototal;
				
				// }	
				// $scope.amount=total;
				
				//alert($scope.amount);
				$timeout(function(){$('#inrpay').attr('action',"upgrade/payumoney").submit();}, 1000);
			//$timeout($('#inrpay').attr('action',"payumoney.php").submit(),3000);
			}
			
			else if(validGst.length=='')
			{
			$scope.savetemppayment();
				var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				
				// var promocode=$scope.promocode;
				// var total=$scope.amount;
				// console.log(total);
				// if(promocode!="DIWALI25" && promocode!="")
				// {
					// alert('Invalid PromoCode');
					// return false;
				// }
				// else
				// {
					// if(dateStr<='2019-10-27')
					// {
					// var promototal=(total)*25/100;
					// }
				// var total=total-promototal;
				
				// }	
				// $scope.amount=total;
				
				//alert($scope.amount);
				$timeout(function(){$('#inrpay').attr('action',"upgrade/payumoney").submit();}, 1000);
			}
			else
			{
			alert('GST should contain 15 digits');
			return false;
			}
		}
		
		 else 
		 {
			 alert('GST should not be null');
					return false;
		 }
	 }
	 else if($scope.gst=='y')
	 {
		$scope.savetemppayment();
				var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				
				// var promocode=$scope.promocode;
				// var total=$scope.amount;
				// console.log(total);
				// if(promocode!="DIWALI25" && promocode!="")
				// {
					// alert('Invalid PromoCode');
					// return false;
				// }
				// else
				// {
					// if(dateStr<='2019-10-27')
					// {
					// var promototal=(total)*25/100;
					// }
				// var total=total-promototal;
				
				// }	
				// $scope.amount=total;
				
				//alert($scope.amount);
				$timeout(function(){$('#inrpay').attr('action',"upgrade/payumoney").submit();}, 1000);
	 }
	  else if($scope.referralDiscount>total)
			{
			alert('You still have '+$scope.currency+' '+($scope.calculatedAmt-$scope.referralDiscount)+' in your credit which will lapse after this payment. You can increase your Subscription period to utilize the amount.');
			return false;
			}
	
	else
	{
		$scope.savetemppayment();
				var today =new Date();
				var curyear = today.getFullYear();
				var curmonth = today.getMonth()+1;
				var curdate =today.getDate();
				var dateStr = curyear + "-" + curmonth + "-" + curdate;
				
				// var promocode=$scope.promocode;
				// var total=$scope.amount;
				// console.log(total);
				// if(promocode!="DIWALI25" && promocode!="")
				// {
					// alert('Invalid PromoCode');
					// return false;
				// }
				// else
				// {
					// if(dateStr<='2019-10-27')
					// {
					// var promototal=(total)*25/100;
					// }
				// var total=total-promototal;
				
				// }	
				// $scope.amount=total;
				
				//alert($scope.amount);
				$timeout(function(){$('#inrpay').attr('action',"upgrade/payumoney").submit();}, 1000);
	}
	
 }
 
$scope.savetemppayment = function()
 {	if($scope.calculatedAmt<=0)
					$scope.calculatedAmt=1;
	var total = $scope.calculatedAmt;
	var OrganizationId = $("#OrganizationId").text();
	var taxforinr = parseFloat($scope.calculatedTax).toFixed(2);
	// alert(taxforinr);
	// alert($scope.calculatedAmt);
	
	var discount = ($scope.amount*$scope.discount)/100;
	var plan = $scope.month+"ly";


	// alert(taxforinr);
	// alert(total);
	// alert(plan);
	
	var xsrf = $.param({sts:5,OrganizationId:OrganizationId,total:total,tax:taxforinr,discount:discount,currency:$scope.currency,country:$scope.country,state:$scope.state,city:$scope.city,street:$scope.street,contact:$scope.phoneno,zip:$scope.zipcode,ind_name:$scope.companyname,gstin:$scope.gstno,plan:plan,duration:$scope.monthyear,noofusers:$scope.nouser});
	
	$scope.hastrue=true;
	$http({
		url: 'upgrade/orgdetails',
		method: "POST",
		data:xsrf,
		headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
	}).success(function (data, status, headers, config) {
		$scope.hastrue=false;
	}).error(function (data, status, headers, config) {
		$scope.hastrue=false;
		//alert("There is some error while calculate discount.");
	});
 }

 
});
