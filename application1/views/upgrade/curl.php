
<style>
#rzp-button1{
    background-color: #ff9800;
    border: none;
    color: white;
    padding: 10px 27px;
    text-align: center;
    text-decoration: none;
   
    margin-top: 19%;
  
    font-size: 16px;
   
border-radius: 5px;}
</style>
<?php

//$user_amount=$_REQUEST["Amount"];
$orderid='';
$user_amount=$_REQUEST["Amount"];
$currency=$_REQUEST["currency"];
$plan=$_REQUEST["plan"];
$ind_name=$_REQUEST["ind_name"];
$contact=$_REQUEST["contact"];
//echo $contact;
$duration=$_REQUEST["duration"];
//echo "hh".$duration;
$discount=$_REQUEST["discount"];
$country=$_REQUEST["country"];
//echo $country;
$city=$_REQUEST["city"];
$state=$_REQUEST["state"];
$street=$_REQUEST["street"];
$zip=$_REQUEST["zip"];
$taxforinr=$_REQUEST["taxforinr"];
$OrganizationId=$_REQUEST["OrganizationId"];
$gstin=$_REQUEST["gstin"];
$bulk_attprice=$_REQUEST["bulk_attprice"];
$geo_fenceprice=$_REQUEST["geo_fenceprice"];
$location_traceprice=$_REQUEST["location_traceprice"];
$payroll_price=$_REQUEST["payroll_price"];
$visit_punchprice=$_REQUEST["visit_punchprice"];
$timeoff_price=$_REQUEST["timeoff_price"];
$face_price=$_REQUEST["face_price"];
$device_price=$_REQUEST["device_price"];
$noofusers=$_REQUEST["noofusers"];
$handle = curl_init();
 
$url = "https://api.razorpay.com/v1/orders";
 
// Set the url
//curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
//curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
//$header = array(
  //'content-type':'application/json',
//);
$postData = array(
    'amount' => $user_amount*100,
    'currency'  => 'USD',
    'receipt'    => 'rcptid_11',
    'payment_capture' => '1'
  );


curl_setopt_array($handle,
  array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPAUTH => CURLAUTH_ANY,
      // CURLOPT_USERPWD  => "rzp_test_BgImr1BHLjaJet:5Va6po0QhSaZ3r8SxKPWx18I", // test key
      CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",  // live key
      CURLOPT_POSTFIELDS => $postData,
     // CURLOPT_HTTPHEADER => $header,
  )
);

$output = curl_exec($handle);
 
curl_close($handle);
 
//$data = json_decode($output);
$obj= json_decode($output);
//echo $output;
$orderid=$obj->id;

?>
<html>
<body>
  <form action="" method="post" name="myFormrazor" id="myFormrazor">
  <button id="rzp-button1" class="">Pay</button>
  
</form>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    // "key": "rzp_test_BgImr1BHLjaJet", // Enter the Key ID generated from the Dashboard test key
    "key": "rzp_live_at46vH1VVfyw6u",  // Enter the Key ID generated from the Dashboard live key
    "amount": "<?php echo $obj->amount?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    "currency": "USD",
    "name": "<?php echo $ind_name?>",
    "description": "Razorpay",
    "order_id": "<?php echo $obj->id?>",//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
       // alert(response.razorpay_order_id);
       // alert(response.razorpay_signature);
        //alert(paymentid);
		//alert('<?php echo $orderid?>');
		if (paymentid!='')
		{
			redirect_url = 'upgrade/success/<?php echo $orderid?>';
		} else {
			redirect_url = 'failed.php';
		}
		location.href = redirect_url;
        
    },
    "prefill": {
        "name": "<?php echo $ind_name?>",
        "email": "gaurav.kumar@example.com",
        "contact": "<?php echo $contact?>"
    },
    "notes": {
       "multiple":"array(<?php echo $geo_fenceprice?>,<?php echo $duration;?>,<?php echo $location_traceprice?>,<?php echo $payroll_price?>,<?php echo $visit_punchprice?>,<?php echo $timeoff_price?>,<?php echo $noofusers?>,<?php echo  $device_price?>,<?php echo  $face_price?>, )",
       "currency": "<?php echo $currency?>",
	   "plan": "<?php echo $plan;?>",
       "discount": "<?php echo $discount?>",
        "country": "<?php echo $country?>",
        "city": "<?php echo $city?>",
        "state": "<?php echo $state?>",
        "street": "<?php echo $street?>",
        "contact": "<?php echo $contact?>",
        "zip": "<?php echo $zip?>",
        "taxforinr": "<?php echo $taxforinr?>",
        "OrganizationId": "<?php echo $OrganizationId?>",
        "ind_name": "<?php echo $ind_name?>",
        "gstin": "<?php echo $gstin?>",
        "bulk_attprice": "<?php echo $bulk_attprice?>",
        
        

    },
    "theme": {
        "color": "#7062b5"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

</body>
</html>
<!--<html>
  <body>
    <button id="rzp-button">Authenticate</button>
    
    <script>
      var options = {
        "key": "rzp_test_FOH5nygOsIpSM6",
        "subscription_id": "<?php echo $obj->id;?>",
        "name": "My Billing Label",
        "description": "Auth txn for <?php echo $obj->id;?>",
        "handler": function (response){
          alert("response");
        }
      };
      var rzp1 = new Razorpay(options);
      //alert(JSON.stringify(rzp1));
      document.getElementById('rzp-button').onclick = function(e){
        rzp1.open();
      }
    </script>
  </body>
</html>-->