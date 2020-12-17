<?php

$orderid='';
$tamt=$_REQUEST["tamt"];

$addonprice=$_REQUEST["addonprice"];
$months=$_REQUEST["months"];
$today1=$_REQUEST["today"];
$old_date = substr($today1,0,24);

$old_date1 = strtotime($old_date); //GMT 0530 (India Standard Time) not needed

$today = date('Y-m-d', $old_date1);
//echo $today;

$end_date1=$_REQUEST["end_date"];


$old_date_timestamp = substr($end_date1,0,24);

$old_date_timestamp1 = strtotime($old_date_timestamp); //GMT 0530 (India Standard Time) not needed

$end_date = date('Y-m-d', $old_date_timestamp1);
//echo $end_date;

$curyear=$_REQUEST["curyear"];
$curmonth=$_REQUEST["curmonth"];
$curdate=$_REQUEST["curdate"];
$addonprice=$_REQUEST["addonprice"];
$oid=$_REQUEST["oid"];

$oname=$_REQUEST["oname"];
$ono=$_REQUEST["ono"];

$addonname=$_REQUEST["addonname"];
$currency=$_REQUEST["currency"];
 // var_dump($currency);
 // die();

$handle = curl_init();
 
$url = "https://api.razorpay.com/v1/orders";


$postData = array(
    'amount' => $tamt*100,
    'currency'  => $currency,
    'receipt'    => 'rcptid_11',
    'payment_capture' => '1'
  );
//var_dump($postData);
//die();



curl_setopt_array($handle,
  array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPAUTH => CURLAUTH_ANY,
       CURLOPT_USERPWD  => "rzp_test_BgImr1BHLjaJet:5Va6po0QhSaZ3r8SxKPWx18I", // test key
      //CURLOPT_USERPWD  => "rzp_live_at46vH1VVfyw6u:HgjOabYjcY2VGfyUAmPillrE",  // live key
      CURLOPT_POSTFIELDS => $postData,
     // CURLOPT_HTTPHEADER => $header,
  )
);

$output = curl_exec($handle);
// var_dump($output);
// die();
 
curl_close($handle);
 
//$data = json_decode($output);
$obj= json_decode($output);
//echo $output;
$orderid=$obj->id;
// var_dump($orderid);
// die();

?>
<html>
<body>
  <form action="" method="post" name="myFormrazor" id="myFormrazor">
  <button id="rzp-button1" class="btn btn-primary bttn fit">Pay</button>
  
</form>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_BgImr1BHLjaJet", // Enter the Key ID generated from the Dashboard test key
    //"key": "rzp_live_at46vH1VVfyw6u",  // Enter the Key ID generated from the Dashboard live key
    "amount": "<?php echo $tamt?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    "currency": "<?php echo $currency?>",
    "name": "<?php echo $oname?>",
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
      redirect_url = '../../Addon/success/<?php echo $orderid?>';
    } else {
      redirect_url = 'failed.php';
    }
    location.href = redirect_url;
        
    },
    "prefill": {
        "name": "<?php echo $oname?>",
        "email": "gaurav.kumar@example.com",
        "contact": "<?php echo $ono?>"
    },
    "notes": {
       
       "addonname": "<?php echo $addonname?>",
     "orgid": "<?php echo $oid;?>",
       "createddate": "<?php echo $today?>",
        "AddonEnddate": "<?php echo $end_date?>",
        "Orderid": "<?php echo $obj->id?>",
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