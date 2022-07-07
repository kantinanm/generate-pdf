<?php

require_once 'vendor/autoload.php';
use Fpdf\Fpdf;


$pdf = new Fpdf();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();


$book_number="R0236";
$receive_number="0236001";
$fullname="คุณอชิสา  เขียวเซน";
$service_date="18 เม.ย. 2556";
$employee_name=" xxxxx  yyyyyy";
$recieve_date="18 เม.ย. 2556";

//$pdf=new FPDF();
//$pdf=new FPDF('P' , 'mm' , 'A4' );
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$pdf->AddPage();

$pdf->SetFont('angsana','B',20);
$pdf->SetXY(20,0);
$pdf->SetFillColor(238,213,210);
$pdf->Cell(170,10,iconv( 'UTF-8','cp874' , 'ใบเสร็จรับเงิน' ),1,1,'C',true);


// รูป
$pdf-> Image('images/logo_recieve.jpg',19,12,96,26,'jpg');

//เลขประจำตัวผู้เสียภาษี
$pdf->SetFont('angsana','',16);
$pdf->Text( 125 , 20 ,  iconv( 'UTF-8','cp874' , 'เลขประจำตัวผู้เสียภาษี : 1120300751319' ));


$pdf->SetFont('angsana','',16);
$pdf->Text( 125 , 32 ,  iconv( 'UTF-8','cp874' , 'เล่มที่ '.$book_number." เลขที่ใบเสร็จ ".$receive_number ));


// customer
$pdf->SetFont('angsana','',16);
$pdf->Text( 20 , 50 ,  iconv( 'UTF-8','cp874' , 'ชื่อลูกค้า '.$fullname ));
$pdf->Line(34,52,80,52);

// service_date
$pdf->SetFont('angsana','',16);
$pdf->Text( 135 , 50 ,  iconv( 'UTF-8','cp874' , 'วันที่ '.$service_date ));
$pdf->Line(144,52,170,52);



//header
$pdf->SetXY(20,60);
$pdf->SetFillColor(205,200,177);
$pdf->Cell(20,8,iconv( 'UTF-8','cp874' , 'ลำดับที่' ),1,1,'C',true);

$pdf->SetXY(40,60);
$pdf->SetFillColor(205,200,177);
$pdf->Cell(100,8,iconv( 'UTF-8','cp874' , 'รายการ' ),1,1,'C',true);

$pdf->SetXY(140,60);
$pdf->SetFillColor(205,200,177);
$pdf->Cell(20,8,iconv( 'UTF-8','cp874' , 'จำนวน' ),1,1,'C',true);


$pdf->SetXY(160,60);
$pdf->SetFillColor(205,200,177);
$pdf->Cell(30,8,iconv( 'UTF-8','cp874' , 'ราคา (บาท)' ),1,1,'C',true);

$data[0]=array("no"=>"1","item"=>"Aromatherapy","qty"=>1,"price"=>"600");
$data[1]=array("no"=>"2","item"=>"Hom Mearn Lee Massage","qty"=>1,"price"=>"1500");
$data[2]=array("no"=>"3","item"=>"ค่าบริการการใช้ Package","qty"=>1,"price"=>"2000");


$point_x_row=60;

/*	$pdf->SetXY(20,68);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(20,8,iconv( 'UTF-8','cp874' , 'ลำดับที่' ),1,1,'C',true);*/
	

$row=0;
$sum_qty=0;
$sum_currency=0;
settype($sum_currency,"float");

foreach($data as $key=>$value){
	
	$point_x_row +=8;
	if($row%2==0){
		$r=255;
		$g=255;
		$b=255;
	}else{
		$r=255;
		$g=250;
		$b=250;
	}
	
	//$arrayData = $key;
	
	$pdf->SetXY(20,$point_x_row);
	$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,8,iconv( 'UTF-8','cp874' , $value["no"] ),1,1,'C',true);
	
	$pdf->SetXY(40,$point_x_row);
	$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(100,8,iconv( 'UTF-8','cp874' , $value["item"] ),1,1,'L',true);
	
	$sum_qty +=$value["qty"]; //จำนวนรวม
	
	$pdf->SetXY(140,$point_x_row);
	$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,8,iconv( 'UTF-8','cp874' , $value["qty"] ),1,1,'C',true);
	
	$currency=$value["price"];
	settype($currency,"float");
	
	$sum_currency +=$currency;
	//number_format($currency, 2, '.', ', ');
	
	
	$pdf->SetXY(160,$point_x_row);
	$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(30,8,iconv( 'UTF-8','cp874' , number_format($currency, 2, '.', ', ') ),1,1,'R',true);
	
	$row++;
}

$point_x_row+=8;
// รวม
$pdf->SetXY(20,$point_x_row);
$pdf->SetFillColor(191,191,191);
$pdf->Cell(120,8,iconv( 'UTF-8','cp874' , 'รวมทั้งสิ้น' ),1,1,'C',true);


// รวมจำนวน
$pdf->SetXY(140,$point_x_row);
$pdf->SetFillColor(242,242,242);
$pdf->Cell(20,8,iconv( 'UTF-8','cp874' , $sum_qty ),1,1,'C',true);

// ราคารวม
$pdf->SetXY(160,$point_x_row);
$pdf->SetFillColor(242,242,242);
$pdf->Cell(30,8,iconv( 'UTF-8','cp874' ,  number_format($sum_currency, 2, '.', ', ') ),1,1,'R',true);



//$point_x_row +=48;
$point_x_row=116; //fix

//ลายเซนต์ผู้รับเงิน
$pdf->SetFont('angsana','',16);
$pdf->Text( 20 , $point_x_row ,  iconv( 'UTF-8','cp874' , 'ผู้รับเงิน ' ));
$pdf->Line(34,$point_x_row+2,80,$point_x_row+2);

$point_x_row +=8;
//ผู้รับเงิน
$pdf->SetFont('angsana','',16);
$pdf->Text( 34 , $point_x_row ,  iconv( 'UTF-8','cp874' , $employee_name ));
//$pdf->Line(34,$point_x_row+2,80,$point_x_row+2);


// recieve_date
$pdf->SetFont('angsana','',16);
$pdf->Text( 135 , $point_x_row ,  iconv( 'UTF-8','cp874' , 'วันที่ออกใบเสร็จ '.$recieve_date ));
//$pdf->Line(155,$point_x_row+2,160,$point_x_row+2);




$pdf->Output();
//$pdf->Output('Receive.pdf','F');

?>