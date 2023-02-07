<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['proId'])) {
    $proId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $proId);
}
?>
<?php 
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
    $productId = $_POST['productId'];
    $insertCom = $pd->insertCompareDara($productId, $cmrId);
}
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
    $saveWlist = $pd->saveWishListData($proId, $cmrId);
}
?>
<style type="text/css">
	.mybutton{widows: 100px; float:left; margin-right: 30px;}
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2" style="margin-left: 240px !important">
				<?php 
                $getPd = $pd->getSingleProduct($proId);
                if ($getPd) {
                    while ($result = $getPd->fetch_assoc()) {
                        ?>
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $result['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2 style="border-bottom: 1px solid gray"><?php echo $result['productName']; ?></h2>
					
					<div class="price">
						<table border="1" cellspacing="1" >
							<thead>
								<tr>
								<th>Price</th>
								<td>RS <?php echo $result['price']; ?></td>
								
								</tr>
								<tr>
								<th>Category</th>
								<td><?php echo $result['catName']; ?></td>	
								
								</tr>
								<tr>
								<th>Brand</th>
								<td><?php echo $result['brandName']; ?></td>
								
								</tr>
							</thead>
							
						</table>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>
					</div>
					<?php if (isset($minProAlert)) {
                            echo $minProAlert;
                        } ?>
					<span style="color:red; font-size:18px;">
						<?php if (isset($addCart)) {
                            echo $addCart;
                        } ?>
					</span>
					<?php if (isset($insertCom)) {
                            echo $insertCom;
                        }
                        if (isset($saveWlist)) {
                            echo $saveWlist;
                        } ?>
                        <?php 
                        $login = Session::get("cuslogin");
                        if ($login == true) {
                            ?>
                    <div class="add-cart">
                    	<div class="mybutton">
						<form action="" method="post">
							<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>							
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						</form>
						</div>
						<div class="mybutton">
						<form action="" method="post">							
							<input type="submit" class="buysubmit" name="wlist" value="Add to List"/>
						</form>
						</div>
					</div>
					<?php
                        } ?>					
				</div>
				<div class="product-desc">
					<h2>Product Desscription</h2>
					<p><?php echo $result['body']; ?></p>
				</div>
				<?php
                    }
                } ?>
			</div>
			
		</div>
	</div>
<?php include 'inc/footer.php'; ?>
