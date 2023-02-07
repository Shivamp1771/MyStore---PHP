<?php include 'inc/header.php'; ?>
<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
 <link rel="stylesheet" href="css/success.css">
<style type="text/css">
.psuccess{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding:50px;}   
.psuccess h2{border-bottom: 1px solid #ddd; margin-bottom: 20px; padding-bottom: 10px;} 
.psuccess p{line-height:25px; font-size:18px; text-align: left; }
 </style>
<div class="main">
    <div class="content">
        <div class="section group">
    
        <div class="wrapperAlert">

  <div class="contentAlert">

    <div class="topHalf">

      <p><svg viewBox="0 0 512 512" width="100" title="check-circle">
        <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
        </svg></p>
      <h1>Congratulations</h1>
            <?php 
            $cmrId = Session::get("cmrId");
            // echo $cmrId;exit;
            $amount = $ct->payableAmount($cmrId);
            if ($amount) {
                $sum = 0;
                while ($result = $amount->fetch_assoc()) {
                    $price = $result['price'];
                    $sum = $sum + $price;
                }
            }
             ?>
            <p>Total Payable Amount (Including VAT) : $
            <?php 
            $vat = $sum * 0.1;
            $total = $sum + $vat;
            echo $total;
            ?>
            </p>

     <ul class="bg-bubbles">
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
     </ul>
    </div>

    <div class="bottomHalf">

       <p>Thanks for Purchage. Receive Your Order Successfully. We will contact you ASAP with delivery details. Here is your order details....</p>

      <button id="alertMO"><a style="color: white;" href="orderdetails.php">Visit Here....</a></button>
      <button id="alertMO"><a style="color: white;" target="_blank" href="invoice_pdf.php">Download Invoice PDF....</a></button>

    </div>

  </div>        

</div>
                    
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
