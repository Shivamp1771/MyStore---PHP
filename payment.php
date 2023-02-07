<?php include 'inc/header.php'; ?>
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
<style type="text/css">
.payment{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding:50px;}	
.payment h2{border-bottom: 1px solid #ddd; margin-bottom: 40px; padding-bottom: 10px;}	
.payment a{background: hsl(28deg 100% 53%); border-radius: 3px; color:#fff; font-size:22px; padding:5px 30px;    padding: 15px 30px;border-radius: 5px;}
.back a{width:150px; margin: 5px auto 0; padding: 7px 0; text-align: center; display: block; background: hsl(0deg 95% 44%); border:1px solid #333; color: #fff; border-radius: 3px; font-size: 25px; }
h2{
	    color: darkorange !important;
    font-weight: bold;
    font-size: 30px;
    /* padding-bottom: 13px; */
    /* margin-bottom: 30px; */
    position: relative;
    bottom: 30px;
}
}	
</style>
 
<div class="main">
	<div class="content">
		<div class="section group">
		<div class="payment" style="background-image: url(images/cash.jpg);background-size: cover;">
			<h2>Choose Payment Ontion</h2>
			<a href="paymentoffiline.php">Cash On Delivery</a>
			<!-- <a href="paymentonline.php">Online Payment</a> -->
		</div>
		<div class="back">
			<a href="cart.php">Previous</a>
		</div>				
		</div>
	</div>
<?php include 'inc/footer.php'; ?>
