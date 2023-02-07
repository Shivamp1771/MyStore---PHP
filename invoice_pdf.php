<?php 
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';
spl_autoload_register(function ($class) {
    include_once "classes/".$class.".php";
});
$db = new Database();
$fm = new Format();
$pd = new Product();
$ct = new Cart();
$cat = new Category();
$cmr = new Customer();

  require ("fpdf/fpdf.php");

  //customer and invoice details
  $id = Session::get("cmrId");


  $getPro = $cmr->getCustomerOrder($id);
  // $products_info[]='';
    if ($getPro) {
        $i=0;
        $sum = 0;
        $qty = 0;
        while ($result = $getPro->fetch_assoc()) {

        $sum= $result['price']*$result['quantity']; 
           $products_info[] = $result;
 } }




            $getData = $cmr->getCustomerData($id);
            if ($getData) {
           $result = $getData->fetch_assoc();   
            }
// echo $id;exit;
  $info=[
    "customer"=>$result['name'],
    "address"=>$result['address'],
    "city"=>$result['city'],
    "invoice_no"=>"1000001",
    "invoice_date"=>date('Y-m-d'),
    "total_amt"=>$sum
  ];
  
ob_clean();

  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"OUR ECOMMERCE WEBSITE",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"Street NO,",0,1);
      $this->Cell(50,7,"Name 636002.",0,1);
      $this->Cell(50,7,"PH : 12348443933",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"INVOICE",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Bill To: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["customer"],0,1);
      $this->Cell(50,7,$info["address"],0,1);
      $this->Cell(50,7,$info["city"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice No : ".$info["invoice_no"]);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice Date : ".$info["invoice_date"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PRICE",1,0,"C");
      $this->Cell(30,9,"QTY",1,0,"C");
      $this->Cell(40,9,"TOTAL",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      // $data=json_decode($products_info);
      foreach($products_info as $row){
        $total=$row['price']*$row['quantity'];
        $this->Cell(80,9,$row["productName"],"LR",0);
        $this->Cell(40,9,$row["price"],"R",0,"R");
        $this->Cell(30,9,$row["quantity"],"R",0,"C");
        $this->Cell(40,9,$total,"R",1,"R");
      }
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(150,9,"TOTAL",1,0,"R");
      $this->Cell(40,9,$info["total_amt"],1,1,"R");
      
    
      
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"BY OUR ECOMMERCE WEBSITE",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"THIS IS OUR ECOMMERCE WEBSITE INVOICE",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $newfilename = 'Invoice-'.round(microtime(true)).'.pdf';
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  // ob_clean(); 
  $pdf->Output();
?>