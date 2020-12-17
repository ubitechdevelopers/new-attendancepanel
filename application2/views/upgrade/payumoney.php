<?php
// $MERCHANT_KEY = "hDkYGPQe";			//TEST KEY
$MERCHANT_KEY = "dv1tL3LP";		//LIVE KEY

// Merchant Salt as provided by Payu
// $SALT = "yIEkykqEH3";				//TEST KEY
$SALT = "AlGt0f59fS";				//LIVE KEY

// End point - change to https://secure.payu.in for LIVE mode
// $PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";				//LIVE URL

$action = '';
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key =>$value) {    
    $posted[$key] = $value; 
    
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) 
{
  if(empty($posted['key'])
		|| empty($posted['txnid'])
		|| empty($posted['amount'])
		|| empty($posted['firstname'])
		|| empty($posted['phone'])
		|| empty($posted['productinfo'])
		|| empty($posted['surl'])
		|| empty($posted['furl'])
		|| empty($posted['service_provider'])
  ) {

    $formError = 1;
  } else {
    $posted['productinfo'] = json_encode(json_decode('[{"companyname":"'.$posted['firstname'].'","orgid":"'.$posted['OrganizationId'].'","bulk_attprice":"'.$posted['bulk_attprice2'].'","geo_fenceprice":"'.$posted['geo_fenceprice2'].'","location_traceprice":"'.$posted['location_traceprice2'].'","payroll_price":"'.$posted['payroll_price2'].'","visit_punchprice":"'.$posted['visit_punchprice2'].'","face_price":"'.$posted['face_price2'].'","device_price":"'.$posted['device_price2'].'","timeoff_price":"'.$posted['timeoff_price2'].'","currency":"'.$posted['currency'].'","plan":"'.$posted['plan'].'","action":"'.$posted['action'].'","noofusers":"'.$posted['noofusers'].'","bulk_attsts":"'.$posted['bulk_attsts'].'",
"visit_punchsts":"'.$posted['visit_punchsts'].'",
"geo_fencests":"'.$posted['geo_fencests'].'",
"timeoffsts":"'.$posted['timeoffsts'].'","devicests":"'.$posted['devicests'].'","facests":"'.$posted['facests'].'",
"payrollsts":"'.$posted['payrollsts'].'","taxforinr":"'.$posted['taxforinr'].'","discount":"'.$posted['discount'].'","duration":"'.$posted['duration'].'","gstin":"'.$posted['gstin'].'","state":"'.$posted['state'].'"}]'));

    // print_r($posted['devicests']);
    // die;
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) 
	{
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} 
?>


<form action="<?php echo $action; ?>" method="post" name="inrmain" id="infoFrom1" style="display: none">
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
	<input type="text" name="firstname" id="name1" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" >
	<input type="email" name="email" id="email1" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>"  >
	<input  type="number" name="amount" id="amt1" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" >
	<input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>">  
	<input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>"> 
	<input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>">
	<input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>">
			<input type="text" name="OrganizationId" id="OrganizationId" value="<?php echo (empty($posted['OrganizationId'])) ? '' : $posted['OrganizationId']; ?>" >
			<input type="hidden" name="currency" value="<?php echo (empty($posted['currency'])) ? '' : $posted['currency']; ?>">
			<input type="hidden" name="plan" value="<?php echo (empty($posted['plan'])) ? '' : $posted['plan']; ?>">
			<input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>">
			
			<input type="hidden" name="noofusers" value="<?php echo (empty($posted['noofusers'])) ? '' : $posted['noofusers']; ?>">
			<input type="hidden" name="taxforinr" value="<?php echo (empty($posted['taxforinr'])) ? '' : $posted['taxforinr']; ?>">
      
        

			<input type="hidden" name="discount" value="<?php echo (empty($posted['discount'])) ? '' : $posted['discount']; ?>"> 
      <input type="hidden" name="action" value="<?php echo (empty($posted['action'])) ? '' : $posted['action']; ?>"> 
      <input type="hidden" name="bulk_attsts" value="<?php echo (empty($posted['bulk_attsts'])) ? '' : $posted['bulk_attsts']; ?>"> 
      <input type="hidden" name="visit_punchsts" value="<?php echo (empty($posted['visit_punchsts'])) ? '' : $posted['visit_punchsts']; ?>"> 
      <input type="hidden" name="geo_fencests" value="<?php echo (empty($posted['geo_fencests'])) ? '' : $posted['geo_fencests']; ?>"> 
      <input type="hidden" name="timeoffsts" value="<?php echo (empty($posted['timeoffsts'])) ? '' : $posted['timeoffsts']; ?>"> 

      <input type="hidden" name="payrollsts" value="<?php echo (empty($posted['payrollsts'])) ? '' : $posted['payrollsts']; ?>"> 
      <input type="hidden" name="facests" value="<?php echo (empty($posted['facests'])) ? '' : $posted['facests']; ?>">
      <input type="hidden" name="devicests" value="<?php echo (empty($posted['devicests'])) ? '' : $posted['devicests']; ?>">
			<input type="hidden" name="duration" value="<?php echo (empty($posted['duration'])) ? '' : $posted['duration']; ?>"> 
			<input type="hidden" name="gstin" value="<?php echo (empty($posted['gstin'])) ? '' : $posted['gstin']; ?>">  
    <textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo']; ?></textarea>
    <input type="text" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl']; ?>" />
    <input type="text" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl']; ?>"/>
    <input type="text" name="service_provider" value="payu_paisa"/>
</form>
<script type="text/javascript">
    var payuForm = document.forms.inrmain;
    payuForm.submit();
</script>