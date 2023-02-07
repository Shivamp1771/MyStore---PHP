<?php include 'inc/header.php'; ?>
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
 <?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $cmrId = Session::get("cmrId");
    $insertOrder = $ct->orderProduct($cmrId);
    
    $delData = $ct->delCustomerCart();
    header("Location:success.php");
}
  ?>
<style type="text/css">
.division{width:50%; float:left;}
.tblone{width: 95%; margin-right:15px; border:2px solid #ddd;}
.tblone tr td{text-align: justify;}
.tbltwo{float:right; text-align:left; width:40%; border:2px solid #ddd; margin-right:14px; margin-top: -4px; margin-right: 38px;}
.tbltwo tr td{text-align:justify; padding: 5px 10px;}
.ordernow{}
.ordernow a{width:200px; margin:20px auto 0; text-align: center; padding:10px; font-size:30px; display: block; background: hsl(108deg 65% 40% / 91%); color: white; border-radius: 3px;}

.tblone2{
	width: 95%; margin-right:15px;
}
.tblone2 td {
	font-weight: bold;
  border: 0px solid black;
  height: 20px;
  width: 50px;
  text-align: center;
  font-size: 14px;
  white-space: nowrap;
  font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
  padding: 15px 20px;
}
.tblone2 th {
  color: white;
  padding: 20px 20px 20px 20px;
}
.tblone2 th:nth-child(1) {
  background-color: #7887ab;
  align-content: center;
}
.tblone2 th:nth-child(2) {
  background-color: #4f628e;
  align-content: center;
}
.tblone2 th:nth-child(3) {
  background-color: #2e4172;
  align-content: center;
}
.tblone2 th:nth-child(4) {
  background-color: #162955;
  align-content: center;
}
.tblone2 th:nth-child(5) {
  background-color: #061539;
  align-content: center;
}
.tblone2 tr:nth-child(2n) {
  background: #ececec;
}
.tblone2 tr:nth-child(2n-1) {
  background: #dbdbdb;
}
.tblone2 td:nth-child(2n) {
  background: lightgray;
}
.tblone2 tr:nth-child(odd) td:nth-child(even) {
  background: #e7e7e7;
}
.tblone2 tr:nth-child(even) td:nth-child(even) {
  background: #f3f3f3;
}

.tblone3 td {

	font-weight: bold;
  border: 0px solid black;
  height: 20px;
  width: 50px;
  text-align: center;
  font-size: 14px;
  white-space: nowrap;
  font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
  padding: 15px 20px;
}
.tblone3 th {
  color: white;
  padding: 20px 20px 20px 20px;
}
.tblone3 th:nth-child(1) {
  background-color: #7887ab;
  align-content: center;
}
.tblone3 th:nth-child(2) {
  background-color: #4f628e;
  align-content: center;
}
.tblone3 th:nth-child(3) {
  background-color: #2e4172;
  align-content: center;
}
.tblone3 th:nth-child(4) {
  background-color: #162955;
  align-content: center;
}
.tblone3 th:nth-child(5) {
  background-color: #061539;
  align-content: center;
}
.tblone3 tr:nth-child(2n) {
  background:hsl(341deg 53% 93%);
}
.tblone3 tr:nth-child(2n-1) {
  background: hsl(343deg 13% 84%);
}
.tblone3 td:nth-child(2n) {
  background: lightgray;
}
.tblone3 tr:nth-child(odd) td:nth-child(even) {
  background: #e7e7e7;
}
.tblone3 tr:nth-child(even) td:nth-child(even) {
  background: #f3f3f3;
}
</style>
 
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="division">
				<table class="tblone">
							<tr>
								<th>No</th>
								<th>Product</th>								
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>								
							</tr>
							<?php 
                            $getPro = $ct->getCartProduct();
                            if ($getPro) {
                                $i=0;
                                $sum = 0;
                                $qty = 0;
                                while ($result = $getPro->fetch_assoc()) {
                                    $i++; ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>								
								<td>$<?php echo $result['price'].".00"; ?></td>
								<td><?php echo $result['quantity'].".00"; ?></td>								
								<td>$<?php
                                $total =  $result['price'] * $result['quantity'];
                                    echo number_format($total).".00"; ?></td>								
							</tr>
							<?php
                            $qty = $qty + $result['quantity'];
                                    $sum = $sum + $total; ?>
							<?php
                                }
                            } ?>
						</table>
						
						<table class="tblone3" style="float: right;margin-right: 40px;">
							<tr>								
								<td>Sub Total</td>
								<td>:</td>
								<td>$<?php echo number_format($sum).".00"; ?></td>								
							</tr>
							<tr>
								<td>VAT 10%</td>
								<td>:</td>
								<td><?php 
                                $vat = $sum * 0.1;
                            echo "$".number_format($vat).".00"; ?></td>
							</tr>
							<tr>
								<td>Grand Total</td>
								<td>:</td>
								<td>$<?php 
                                $gTotal = $sum+$vat;
                            Session::set("gTotal", $gTotal);
                            echo number_format($gTotal).".00"; ?></td>
							</tr>
							<tr>								
								<td>Quantity</td>
								<td>:</td>
								<td><?php echo $qty; ?></td>								
							</tr>
					   </table>
			</div>			
			<div class="division">
				<?php 
            $id = Session::get("cmrId");
            $getData = $cmr->getCustomerData($id);
            if ($getData) {
                while ($result = $getData->fetch_assoc()) {
                    ?>
			<table class="tblone2">
				<tr>
					<td colspan="3" style="text-align: center;"><h2>Your Profile Details</h2></td>					
				</tr>
				<tr>
					<td width="20%">Name</td>
					<td width="5%">:</td>
					<td><?php echo $result['name']; ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><?php echo $result['phone']; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email']; ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><?php echo $result['address']; ?></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td><?php echo $result['city']; ?></td>
				</tr>
				<tr>
					<td>Zip Code</td>
					<td>:</td>
					<td><?php echo $result['zip']; ?></td>
				</tr>
				<tr>
					<td>Country</td>
					<td>:</td>
					<td><?php echo $result['country']; ?></td>
				</tr>
				<tr>
					
					<td colspan="3" style="text-align: center; font-size: 22px;background: hsl(195deg 53% 79%)!important;"><a style="color: hsl(241deg 76% 36%);" href="editprofile.php">Update Details</a></td>
					
				</tr>				
			</table>
			<?php
                }
            } ?>	
			</div>			
		</div>
		<div class="ordernow">
			<a href="?orderid=order">Order</a>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>
