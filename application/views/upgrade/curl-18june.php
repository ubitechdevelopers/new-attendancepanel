<?php
$user_amount=(int)$_REQUEST["Amount"];
// var_dump($user_amount);

$handle1 = curl_init();
 
$url1 = "https://api.razorpay.com/v1/plans";
 
// Set the url
//curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
//curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$postData = array(
    'period' => 'monthly',
    'interval'  => '2',
    'item[name]'    => 'Test plan',
    'item[amount]' => $user_amount*100,
    

  );

curl_setopt_array($handle1,
  array(
      CURLOPT_URL            => $url1,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPAUTH => CURLAUTH_ANY,
      CURLOPT_USERPWD  => "rzp_test_FOH5nygOsIpSM6:VPq1yAUB9jD50WniD0NFneRg",
      CURLOPT_POSTFIELDS => $postData,
  )
);

$output1 = curl_exec($handle1);
 
curl_close($handle1);
 
//$data = json_decode($output);
$obj1= json_decode($output1);

//echo $output1;
?>
<?php
$handle = curl_init();
 
$url = "https://api.razorpay.com/v1/subscriptions";
 
// Set the url
//curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
//curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$postData = array(
    'plan_id' => $obj1->id,
    'total_count'  => '6',
    'notes[name]'    => 'Subscription A'
  );


curl_setopt_array($handle,
  array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPAUTH => CURLAUTH_ANY,
      CURLOPT_USERPWD  => "rzp_test_FOH5nygOsIpSM6:VPq1yAUB9jD50WniD0NFneRg",
      CURLOPT_POSTFIELDS => $postData,
  )
);

$output = curl_exec($handle);
 
curl_close($handle);
 
//$data = json_decode($output);
$obj= json_decode($output);

//echo $obj->id;

?>
<html>
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
</html>