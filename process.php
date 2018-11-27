<?php


// Here we can use paypal url or sandbox url.
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

// seller email id.
$merchant_email = ' put merchants email id here';



//  fetch data by database using id

if (isset($_POST['submit'])) {
if (base64_decode($_POST['id']) == 'Donate to charity ONE!') {
$product_name = 'Donate to charity ONE!';
$product_id = 1;
} else {
$product_name = 'Donate to charity TWO!';
$product_id = 2;
}

$product_currency = 'USD';
$product_price = $_POST['amount'];
}

// return to initial page when payment is not completed.
$cancel_return = "index.php";

// url when payment is Successful.
$success_return = "success.php";

?>
<div style="margin-left: 38%"><img src="images/ajax-loader.gif"/><img src="images/processing_animation.gif"/></div>
<form name = "myform" action = "<?php echo $paypal_url; ?>" method = "post" target = "_top">
<input type = "hidden" name = "cmd" value = "_donations">
<input type = "hidden" name = "cancel_return" value = "<?php echo $cancel_return ?>">
<input type = "hidden" name = "return" value = "<?php echo $success_return; ?>">
<input type = "hidden" name = "business" value = "<?php echo $merchant_email; ?>">
<input type = "hidden" name = "lc" value = "C2">
<input type = "hidden" name = "item_name" value = "<?php echo $product_name; ?>">
<input type = "hidden" name = "item_number" value = "<?php echo $product_id; ?>">
<input type = "hidden" name = "amount" value = "<?php echo $product_price; ?>">
<input type = "hidden" name = "currency_code" value = "<?php echo $product_currency; ?>">
<input type = "hidden" name = "button_subtype" value = "services">
<input type = "hidden" name = "no_note" value = "0">
</form>

<script type="text/javascript">
document.myform.submit();
</script>
<?php }
?>

