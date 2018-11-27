<?php
//  fetch data by database using id
if (isset($_POST['submit'])) {

if ($_POST['submit'] == "Donate to charity ONE!") {
$product_name = 'Charity ONE!';
$product_id = 1;
} else {
$product_name = 'Charity TWO!';
$product_id = 2;
}

$product_currency = 'USD';
$product_price = $_POST['amount'];

// Here we can use paypal url or sandbox url.
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

// seller email id.
$merchant_email = 'doyousketch2@yahoo.com';

// return to initial page when payment is not completed.
$cancel_return = "index.php";

// url when payment is Successful.
$success_return = "success.php";

?>

<div style="margin-left: 32%"><img src="ajax-loader.gif"/></div>

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
