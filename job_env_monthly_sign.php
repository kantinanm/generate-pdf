<?php

//require_once 'vendor/autoload.php';
//define('FPDF_FONTPATH','./myfont');

//use Fpdf\Fpdf;
//error_reporting(E_ALL); ini_set('display_errors', 1);

require('rotate.php');


class PDF extends PDF_Rotate
{
	function RotatedText($x,$y,$txt,$angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y, iconv( 'UTF-8','cp874' , $txt ));
		$this->Rotate(0);
	}

	function RotatedImage($file,$x,$y,$w,$h,$angle)
	{
		//Image rotated around its upper-left corner
		$this->Rotate($angle,$x,$y);
		$this->Image($file,$x,$y,$w,$h);
		$this->Rotate(0);
	}

	function Header()
	{
		//Put the watermark
		$this->SetFont('THSarabun','B',50);
		$this->SetTextColor(255,192,203);
		$this->RotatedText(45,190,'หลักฐานประกอบการเบิกจ่าย เท่านั้น',45);
	}

	function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('THSarabun','BI',8);
        // Print centered page number
        $this->Cell(0,10,'Page '.$this->PageNo()."/{nb}",0,0,'C');
    }


}

$pdf=new PDF('L','mm',array(210,297));

$pdf->AliasNbPages();


//$pdf = new Fpdf('L','mm',array(210,297));//A4
//$pdf->addPage('L');
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();




//$pdf=new FPDF();
//$pdf=new FPDF('P' , 'mm' , 'A4' );
$pdf->AddFont('THSarabun','','THSarabun.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น THSarabun
$pdf->AddFont('THSarabun','B','THSarabun Bold.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น THSarabun
$pdf->AddFont('THSarabun','I','THSarabun Italic.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น THSarabun
$pdf->AddFont('THSarabun','BI','THSarabun Bold Italic.php');

$pdf->AddPage();


$startBaseLineY=10;
$StartheaderBaseLineY =15;

$pdf->SetFont('THSarabun','',12);

//Head Column 1
//$pdf->SetXY(40,20);
$pdf->SetXY(20,$startBaseLineY);
$pdf->SetFillColor(206, 213, 222);

$hightRow=5;
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(60,$hightRow,iconv( 'UTF-8','cp874' , '1.1 ค่าตอบแทนหัวหน้าศูนย์ทดสอบ (10%)' ),1,1,'C',true);


$pdf->SetXY(20,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'ผู้เบิก' ),1,1,'C',true);

$pdf->SetXY(40,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'รับตามยอด' ),1,1,'C',true);

$pdf->SetXY(60,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เบิกจ่ายจริง' ),1,1,'C',true);


// END Head Column 1


$data[0]=array("name"=>"สุภาวรรณ","expect"=>13308.39,"actual"=>7000,"role"=>"หัวหน้าศูนย์ทดสอบ");


//Head Column 2
$pdf->SetXY(80,$startBaseLineY);
$pdf->SetFillColor(206, 213, 222);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(60,$hightRow,iconv( 'UTF-8','cp874' , '1.2 ค่าตอบแทนวิศวกรตรวจสอบ (20%)' ),1,1,'C',true);

$pdf->SetXY(80,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'ผู้เบิก' ),1,1,'C',true);

$pdf->SetXY(100,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'รับตามยอด' ),1,1,'C',true);

$pdf->SetXY(120,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เบิกจ่ายจริง' ),1,1,'C',true);

// END Head Column 

$dataEngineer[0]=array("name"=>"อำพล","expect"=>2898.84,"actual"=>2898.84,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[1]=array("name"=>"ดลเดช","expect"=>4939.86,"actual"=>4939.86,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[2]=array("name"=>"จีรพงษ์","expect"=>62.64,"actual"=>62.64,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[3]=array("name"=>"ปาจรีย์","expect"=>1092.72,"actual"=>1092.72,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[4]=array("name"=>"พรนภา","expect"=>4844.16,"actual"=>4844.16,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[5]=array("name"=>"สสิกรณณ์","expect"=>156.60,"actual"=>156.60,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[6]=array("name"=>"ธนพล","expect"=>1792.20,"actual"=>1792.20,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[7]=array("name"=>"วิรินทร์ ","expect"=>1092.72,"actual"=>1092.72,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[8]=array("name"=>"วรางค์ลักษณ์","expect"=>993.54,"actual"=>993.54,"role"=>"วิศวกรตรวจสอบผล");
$dataEngineer[9]=array("name"=>"วิลาวัลย์","expect"=>8743.50,"actual"=>8743.50,"role"=>"วิศวกรตรวจสอบผล");



//Head Column 3
$pdf->SetXY(140,$startBaseLineY);
$pdf->SetFillColor(206, 213, 222);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(60,$hightRow,iconv( 'UTF-8','cp874' , '1.3 ค่าตอบแทนผู้ปฏิบัติการทดสอบ (15%)' ),1,1,'C',true);

$pdf->SetXY(140,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'ผู้เบิก' ),1,1,'C',true);

$pdf->SetXY(160,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'รับตามยอด' ),1,1,'C',true);

$pdf->SetXY(180,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เบิกจ่ายจริง' ),1,1,'C',true);

// END Head Column 

$dataTechnician[0]=array("name"=>"อภิชาติ","expect"=>46.98,"actual"=>46.98,"role"=>"ผู้ปฏิบัติการทดสอบ");
$dataTechnician[1]=array("name"=>"กาลไกล","expect"=>117.45,"actual"=>117.45,"role"=>"ผู้ปฏิบัติการทดสอบ");
$dataTechnician[2]=array("name"=>"นิภาวรรณ","expect"=>10426.99,"actual"=>10000,"role"=>"ผู้ปฏิบัติการทดสอบ");
$dataTechnician[3]=array("name"=>"วิชญา","expect"=>9371.21,"actual"=>9371.21,"role"=>"ผู้ปฏิบัติการทดสอบ");


//Head Column 4
$pdf->SetXY(200,$startBaseLineY);
$pdf->SetFillColor(206, 213, 222);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(60,$hightRow,iconv( 'UTF-8','cp874' , '1.4 ค่าตอบแทนเจ้าหน้าที่โครงการ (5%)' ),1,1,'C',true);

$pdf->SetXY(200,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'ผู้เบิก' ),1,1,'C',true);

$pdf->SetXY(220,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'รับตามยอด' ),1,1,'C',true);

$pdf->SetXY(240,$StartheaderBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เบิกจ่ายจริง' ),1,1,'C',true);


// END Head Column


$dataOfficer[0]=array("name"=>"อัมพรรัตน์","expect"=>6654.24,"actual"=>1500,"role"=>"เจ้าหน้าที่โครงการ");
$dataOfficer[1]=array("name"=>"พนารัตน์","expect"=>6654.24,"actual"=>1500,"role"=>"เจ้าหน้าที่โครงการ");
$dataOfficer[2]=array("name"=>"ศุภวรรณ","expect"=>6654.24,"actual"=>1500,"role"=>"เจ้าหน้าที่โครงการ");
$dataOfficer[3]=array("name"=>"มณีรัตน์","expect"=>6654.24,"actual"=>1500,"role"=>"เจ้าหน้าที่โครงการ");
$dataOfficer[4]=array("name"=>"นิชานาถ","expect"=>6654.24,"actual"=>1500,"role"=>"เจ้าหน้าที่โครงการ");



//////////////////////

$point_x_row=12;


// Data Col1 
$pdf->SetFont('THSarabun','',12);
$row=0;
$sum_director=0;
settype($sum_director,"float");

$pdf->SetFont('THSarabun','',12);
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
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , "อ.".$value["name"] ),1,1,'C',true);
	
	$pdf->SetXY(40,$point_x_row);
	$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["expect"],2 )),1,1,'R',true);
	
	
	$pdf->SetXY(60,$point_x_row);
	$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["actual"],2 ) ),1,1,'R',true);
	
	$currency=$value["actual"];
	settype($currency,"float");
	
	$sum_director +=$currency;
	//number_format($currency, 2, '.', ', ');
	
	$row++;
}

$point_x_row+=$hightRow;
// END Data Col1



$point_x_row_Col2=12;
$point_x_row_Col2 +=8;
// Data Col2 
$pdf->SetFont('THSarabun','',12);
$rowCol2=0;
$sum_engineer=0;
settype($sum_engineer,"float");

$pdf->SetFont('THSarabun','',12);
foreach($dataEngineer as $key=>$value){
	
	
	if($rowCol2%2==0){
		$r=255;
		$g=255;
		$b=255;
	}else{
		$r=255;
		$g=250;
		$b=250;
	}
	
	//$arrayData = $key;
	
	$pdf->SetXY(80,$point_x_row_Col2);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , "อ.".$value["name"] ),1,1,'L',true);
	
	$pdf->SetXY(100,$point_x_row_Col2);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["expect"],2 )),1,1,'R',true);
	
	
	$pdf->SetXY(120,$point_x_row_Col2);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["actual"],2 ) ),1,1,'R',true);
	
	$currency_En=$value["actual"];
	settype($currency_En,"float");
	
	$sum_engineer +=$currency_En;
	//number_format($currency, 2, '.', ', ');
	
	$rowCol2++;
	$point_x_row_Col2+=$hightRow;
}


// END Data Col2


//$dataTechnician
$point_x_row_Col3=12;
$point_x_row_Col3 +=8;
// Data Col3 
$pdf->SetFont('THSarabun','',12);
$rowCol3=0;
$sum_technician=0;
settype($sum_technician,"float");

$pdf->SetFont('THSarabun','',12);
foreach($dataTechnician as $key=>$value){
	
	
	if($rowCol3%2==0){
		$r=255;
		$g=255;
		$b=255;
	}else{
		$r=255;
		$g=250;
		$b=250;
	}
	
	//$arrayData = $key;
	
	$pdf->SetXY(140,$point_x_row_Col3);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , "".$value["name"] ),1,1,'C',true);
	
	$pdf->SetXY(160,$point_x_row_Col3);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["expect"],2 )),1,1,'R',true);
	
	
	$pdf->SetXY(180,$point_x_row_Col3);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["actual"],2 ) ),1,1,'R',true);
	
	$currency_Tech=$value["actual"];
	settype($currency_Tech,"float");
	
	$sum_technician +=$currency_Tech;
	//number_format($currency, 2, '.', ', ');
	
	$rowCol3++;
	$point_x_row_Col3+=$hightRow;
}

// END Data Col3 


//dataOfficer
$point_x_row_Col4=12;
$point_x_row_Col4 +=8;
// Data Col4 
$pdf->SetFont('THSarabun','',12);
$rowCol4=0;
$sum_officer=0;
settype($sum_officer,"float");

$pdf->SetFont('THSarabun','',12);
foreach($dataOfficer as $key=>$value){
	
	
	if($rowCol4%2==0){
		$r=255;
		$g=255;
		$b=255;
	}else{
		$r=255;
		$g=250;
		$b=250;
	}
	
	//$arrayData = $key;
	
	$pdf->SetXY(200,$point_x_row_Col4);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , "".$value["name"] ),1,1,'C',true);
	
	$pdf->SetXY(220,$point_x_row_Col4);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["expect"],2 )),1,1,'R',true);
	
	
	$pdf->SetXY(240,$point_x_row_Col4);
	//$pdf->SetFillColor($r,$g,$b);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["actual"],2 ) ),1,1,'R',true);
	
	$currency_Of=$value["actual"];
	settype($currency_Of,"float");
	
	$sum_officer +=$currency_Of;
	//number_format($currency, 2, '.', ', ');
	
	$rowCol4++;
	$point_x_row_Col4+=$hightRow;
}










//ขอบเขตตารางส่วนท้าย
$hightFooter= 80;
//col 1
$pdf->SetXY(20,$point_x_row);
$pdf->Cell(60,$hightFooter,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);

// รวม
$posXSumCol1=$point_x_row+$hightFooter;
$pdf->SetXY(60,$posXSumCol1);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_director,2) ),1,1,'R',false);

//col 2
$pdf->SetXY(80,$point_x_row);
$pdf->Cell(60,$hightFooter,iconv( 'UTF-8','cp874' , '' ),1,0,'R',false);

// รวม
$posXSumCol1=$point_x_row+$hightFooter;
$pdf->SetXY(120,$posXSumCol1);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_engineer,2) ),1,1,'R',false);

//col 3
$pdf->SetXY(140,$point_x_row);
$pdf->Cell(60,$hightFooter,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);
//sum_technician

// รวม
$posXSumCol1=$point_x_row+$hightFooter;
$pdf->SetXY(180,$posXSumCol1);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_technician,2) ),1,1,'R',false);


//col 4
$pdf->SetXY(200,$point_x_row);
$pdf->Cell(60,$hightFooter,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);

//$sum_officer
// รวม
$posXSumCol1=$point_x_row+$hightFooter;
$pdf->SetXY(240,$posXSumCol1);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_officer,2) ),1,1,'R',false);

$pdf->SetXY(260,$posXSumCol1);
$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_director+$sum_engineer+$sum_technician+$sum_officer,2) ),1,1,'R',false);


//รายชื่อที่ขอเบิกสูงสุดตามอัตราในประกาศ
$PersonalLists[0]=array("fullname"=>"ดร.สุภาวรรณ ศรีรัตนา","expect"=>13308.39,"actual"=>7000,"price_th"=>"เจ็ดพันบาทถ้วน","with_draw"=>1);
$PersonalLists[1]=array("fullname"=>"นางสาวศุภวรรณ วรนุช","expect"=>13308.39,"actual"=>1500,"price_th"=>"หนึ่งพันห้าร้อยบาทถ้วน","with_draw"=>1);
$PersonalLists[2]=array("fullname"=>"นางสาวมณีรัตน์ สีเขียว","expect"=>13308.39,"actual"=>1500,"price_th"=>"หนึ่งพันห้าร้อยบาทถ้วน","with_draw"=>1);
$PersonalLists[3]=array("fullname"=>"นางสาวอัมพรรัตน์  เหม็นแดง","expect"=>13308.39,"actual"=>1500,"price_th"=>"หนึ่งพันห้าร้อยบาทถ้วน","with_draw"=>1);
$PersonalLists[4]=array("fullname"=>"นางสาวพนารัตน์ กิตติจารุขจร","expect"=>13308.39,"actual"=>1500,"price_th"=>"หนึ่งพันห้าร้อยบาทถ้วน","with_draw"=>1);
$PersonalLists[5]=array("fullname"=>"นางสาวนิชานาถ พรหมประเสริฐ","expect"=>13308.39,"actual"=>1500,"price_th"=>"หนึ่งพันห้าร้อยบาทถ้วน","with_draw"=>1);
$PersonalLists[6]=array("fullname"=>"นางสาวนิภาวรรณ   จันทะคุณ","expect"=>13308.39,"actual"=>10000,"price_th"=>"หนึ่งหมื่นบาทถ้วน","with_draw"=>1);
$PersonalLists[7]=array("fullname"=>"นางวิชญา  อิ่มกระจ่าง","expect"=>13308.39,"actual"=>10000,"price_th"=>"หนึ่งหมื่นบาทถ้วน","with_draw"=>1);
$PersonalLists[8]=array("fullname"=>"ผู้ช่วยศาสตราจารย์ ดร.วิลาวัลย์ คณิตชัยเดชา","expect"=>13308.39,"actual"=>15000,"price_th"=>"หนึ่งหมื่นห้าพันบาทถ้วน","with_draw"=>1);
$PersonalLists[9]=array("fullname"=>"นางสาวลูกน้ำ มากลิ่น","expect"=>0,"actual"=>0,"price_th"=>"","with_draw"=>0);
$PersonalLists[10]=array("fullname"=>"นางสาวทัศพร กนกพารา","expect"=>0,"actual"=>0,"price_th"=>"","with_draw"=>0);

//$point_x_row +=48;
$point_x_row=120; //fix




$pdf->SetFont('THSarabun','B',14);
$pdf->Text( 30 , $point_x_row ,  iconv( 'UTF-8','cp874' , 'หมายเหตุ ' ));
$pdf->SetFont('THSarabun','',12);
$pdf->Text( 45 , $point_x_row ,  iconv( 'UTF-8','cp874' , 'ตามเอกสารใบประกาศมหาวิทยาลัยนเรศวร เรื่อง การจัดสรรเงินรายได้และกำหนดอัตราค่าตอบแทนการให้บริการวิชาการงานทดสอบของศูนย์ทดสอบวิศวกรรมโยธา คณะวิศวกรรมศาสตร์ ' ));


$posXListWithDraw= 128;
$pdf->SetFont('THSarabun','',12);
$number=1;
foreach($PersonalLists as $key=>$value){
	$pdf->Text( 20 , $posXListWithDraw ,  iconv( 'UTF-8','cp874' , $number.'. '.$value["fullname"] ));
	$pdf->Text( 100 , $posXListWithDraw ,  iconv( 'UTF-8','cp874' , ($value["with_draw"]==1)?"ขอเบิกเพียง":"ไม่ขอเบิก" ));

	if($value["with_draw"]==1){
		$pdf->Text( 120 , $posXListWithDraw ,  iconv( 'UTF-8','cp874' , number_format($value["actual"],2)." (".$value["price_th"].")" ));
	}

	$posXListWithDraw +=5;
	$number++;
}

//ลายเซนต์ ดร.สุภาวรรณ ศรีรัตนา
$posLineSign=$point_x_row+40;
//$pdf->Line(195,$posLineSign,240,$posLineSign); //line
$pdf->Text( 195 , $posLineSign ,  iconv( 'UTF-8','cp874' , '.....................................................................' ));

$posLineSign +=6;
$pdf->Text( 205 , $posLineSign ,  iconv( 'UTF-8','cp874' , '(ดร.สุภาวรรณ ศรีรัตนา)' ));

$posLineSign +=6;
$pdf->Text( 200 , $posLineSign ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์ทดสอบวิศวกรรมโยธา' ));




$pdf->AddPage("P",'A4');

$pdf->SetFont('THSarabun','B',20);
$pdf->SetXY(6,8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(130,8,iconv( 'UTF-8','cp874' , 'รายงานสรุปผู้มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม' ),0,1,'C',false);
//$pdf->Cell(130,8,iconv( 'UTF-8','cp874' , 'รายงานสรุปผู้มารับบริการ สาขาวิศวกรรมโยธา' ),0,1,'C',false); //

$startP2BaseLineY=17;
$StartP2headerBaseLineY =23;

$pdf->SetFont('THSarabun','',12);

//Head Column 1
//$pdf->SetXY(40,20);

$hightRow=5;

$pdf->SetXY(136,$startP2BaseLineY+1);
$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน

$pdf->SetXY(176,$startP2BaseLineY+1);
$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน

$pdf->SetXY(6,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);

$pdf->SetXY(14,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);

$pdf->SetXY(31,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);

$pdf->SetXY(56,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , 'หน่วยงาน' ),1,1,'C',true);


$pdf->SetXY(118,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , 'เลขที่ใบงาน' ),1,1,'C',true);


$pdf->SetXY(136,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);

$pdf->SetXY(148,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);

$pdf->SetXY(164,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);

$pdf->SetXY(176,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);

$pdf->SetXY(191,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);

// END Head Column 1

$month_th="กรกฏาคม";
$customer_env=52; // อาจจะต้องรอ คณะสหเวชด้วย +1



$url2 = 'http://localhost:8000/api/joblists-monthly';

// request data that is going to be sent as POST to API
$data2 = array(
    "year" => 2566,
    "month_en" => "July",
	"branch" => "environment"
);

$curl2 = curl_init();

// encoding the request data as JSON which will be sent in POST
$encodedData = json_encode($data2);

// Set query data here with the URL
curl_setopt($curl2, CURLOPT_URL, $url2); 
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl2, CURLOPT_HTTPHEADER, array(
    'Content-Type:application/json'
));

curl_setopt($curl2, CURLOPT_POST, true);
// Curl POST the JSON data to send the request
curl_setopt($curl2, CURLOPT_POSTFIELDS, $encodedData);

$content2 = curl_exec($curl2);
curl_close($curl2);
$obj2 = json_decode($content2, false);


$index_st2=0;
foreach ($obj2[0] as $key => $row2) {
 
    //echo $row->ref_doc." ".$row->department."<br>";
    //echo $key;
	$jobListsENV[$index_st2]= array(
		"job_id"=>$row2->job_id,
		"data_id"=>$row2->data_id,
		"work_code"=>$row2->work_code,
		"work_date_th"=>$row2->work_date_th,
		"ref_date_th"=>$row2->ref_date_th,
		"ref_doc"=>$row2->ref_doc,
		"department"=>$row2->department,
		"branch"=>$row2->branch,
		"sub_category"=>$row2->sub_category,
		"total"=>$row2->total,
		"income_cecentre"=>$row2->income_cecentre,
		"income_eng"=>$row2->income_eng,
		"income_civil"=>$row2->income_civil,
		"boss_dispense"=>$row2->boss_dispense,
		"technician_nu_net"=>$row2->technician_nu_net,
		"technician_dispense"=>$row2->technician_dispense,
		"office_dispense"=>$row2->office_dispense,
		"engineer_nu_net"=>$row2->engineer_nu_net,
		"engineer_dispense"=>$row2->engineer_dispense,
	);

	$index_st2++;

}


/*
$jobListsENV[0]=array("work_code"=>"ENV368/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0533","department"=>"บริษัท การบินกรุงเทพ จำกัด (มหาชน)","sub_category"=>"water","total"=>10110.00,"income_cecentre"=>8795.70);
$jobListsENV[1]=array("work_code"=>"ENV363/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0534","department"=>"บริษัท เซ็นทรัลเวิลด์ จำกัด","sub_category"=>"water","total"=>6220.00,"income_cecentre"=>5411.40);



for ($i=2; $i<68; $i++) {
	$jobListsENV[$i]=$jobListsENV[1];
}*/


$posXRow_list=28; // fix start datarow

$sum_water =0;
$sum_soil_fertilizer_gabage =0;
$sum_other_env =0;
$sum_total = 0;
$sum_income_cecentre= 0;

settype($sum_water,"float");
settype($sum_soil_fertilizer_gabage,"float");
settype($sum_other_env,"float");
settype($sum_total,"float");
settype($sum_income_cecentre,"float");


$pdf->SetFont('THSarabun','',12);
$numberEnv=1;
foreach($jobListsENV as $key=>$value){


	//เงื่อนไข แสดงตารางถึงรายการที่ 49 หลังจากนั้นขึ้นหน้าใหม่

	$pdf->SetFont('THSarabun','',12);
	$pdf->SetXY(6,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , $numberEnv ),1,1,'C',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(14,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' , $value["ref_date_th"] ),1,1,'C',false);


	$pdf->SetXY(31,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , $value["ref_doc"]  ),1,1,'C',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(56,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , $value["department"] ),1,1,'L',false);

	$pdf->SetFont('THSarabun','',12);
	$pdf->SetXY(118,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , $value["work_code"] ),1,1,'C',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(136,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="water")?number_format($value["total"],2):"" ),1,1,'R',false);


	$pdf->SetXY(148,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="soil_fertilizer_gabage")?number_format($value["total"],2):"" ),1,1,'R',false);


	$pdf->SetXY(164,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="other_env")?number_format($value["total"],2):"" ),1,1,'R',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(176,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["total"],2) ),1,1,'R',false);


	$pdf->SetXY(191,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["income_cecentre"],2) ),1,1,'R',false);




	$currency_water=$value["sub_category"]=="water"?$value["total"]:0;
	settype($currency_water,"float");
	$sum_water +=$currency_water;


	$currency_soil_fertilizer_gabage=$value["sub_category"]=="soil_fertilizer_gabage"?$value["total"]:0;
	settype($currency_soil_fertilizer_gabage,"float");
	$sum_soil_fertilizer_gabage +=$currency_soil_fertilizer_gabage;


	$currency_other_env=$value["sub_category"]=="other_env"?$value["total"]:0;
	settype($currency_other_env,"float");
	$sum_other_env +=$currency_other_env;

	$currency_total=$value["total"];
	settype($currency_total,"float");
	$sum_total +=$currency_total;

	$currency_income_cecentre=$value["income_cecentre"];
	settype($currency_income_cecentre,"float");
	$sum_income_cecentre +=$currency_income_cecentre;


	$posXRow_list +=$hightRow;
	$numberEnv++;

	if($numberEnv>49){
		break;
	}
}





if(count($jobListsENV)<=46){
	//จบได้ในหน้าเดียว

	// ส่วนสรุปผล
	//รวม
	$pdf->SetXY(6,$posXRow_list);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);


	//sum หมวดน้ำ
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(136,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water,2) ),1,1,'C',true);

	//sum หมวดดินปุ๋ยขยะ
	$pdf->SetXY(148,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_soil_fertilizer_gabage,2) ),1,1,'C',true);

	//sum หมวดอื่นๆ
	$pdf->SetXY(164,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_env,2) ),1,1,'C',true);

	//sum 100
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(176,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',true);

	//sum 87
	$pdf->SetXY(191,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);



	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;

	//sum ทุกหมวด
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(136,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2) ),1,1,'C',true);



	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;
	//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)

	$pdf->SetFont('THSarabun','',12);
	$pdf->SetXY(6,$posXRow_list);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);

	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetXY(26,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);


	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;


	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Text( 6 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
	$pdf->Text( 80 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));

	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;

	$pdf->Text( 6 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));

}else if(count($jobListsENV)>=47 & count($jobListsENV)<= 49){

	$pdf->AddPage("P",'A4');
	//แสดงข้อมูลสรุป
	// เพิ่มหัวตาราง
			
	$posXRowP2_list=28; // fix start datarow //แสดงข้อมูลต่อ

	$pdf->SetXY(136,$startP2BaseLineY+1);
	$pdf->SetFillColor(255, 255, 255);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
	
	$pdf->SetXY(176,$startP2BaseLineY+1);
	$pdf->SetFillColor(255, 255, 255);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
	

	$pdf->SetXY(136,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
	
	$pdf->SetXY(148,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
	
	$pdf->SetXY(164,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
	
	$pdf->SetXY(176,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
	
	$pdf->SetXY(191,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);


	// ส่วนสรุปผล
	//รวม
	//sum หมวดน้ำ
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(136,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water,2) ),1,1,'C',true);

	//sum หมวดดินปุ๋ยขยะ
	$pdf->SetXY(148,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_soil_fertilizer_gabage,2) ),1,1,'C',true);

	//sum หมวดอื่นๆ
	$pdf->SetXY(164,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_env,2)  ),1,1,'C',true);

	//sum 100
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(176,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2)  ),1,1,'R',true);

	//sum 87
	$pdf->SetXY(191,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_income_cecentre,2) ),1,1,'C',true);



	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	//sum ทุกหมวด
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(136,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2) ),1,1,'C',true);


	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;
	//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)

	$pdf->SetFont('THSarabun','',12);
	$pdf->SetXY(6,$posXRowP2_list);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);

	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetXY(26,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);


	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;


	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน " ));
	$pdf->Text( 80 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));

	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน " ));



	// สรุป

}else if(count($jobListsENV)>=50 & count($jobListsENV)<= 170){
	//แสดงตารางถึงรายการที่ 49 หลังจากนั้นขึ้นหน้าใหม่


	if(($posXRow_list>268) &($numberEnv>49)){

		$pdf->AddPage("P",'A4');
		
		// เพิ่มหัวตาราง
		$pdf->SetXY(136,$startP2BaseLineY+1);
		$pdf->SetFillColor(255, 255, 255);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
		
		$pdf->SetXY(176,$startP2BaseLineY+1);
		$pdf->SetFillColor(255, 255, 255);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
		
		$pdf->SetXY(6,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);
		
		$pdf->SetXY(14,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);
		
		$pdf->SetXY(31,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);
		
		$pdf->SetXY(56,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , 'หน่วยงาน' ),1,1,'C',true);
		
		
		$pdf->SetXY(118,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , 'เลขที่ใบงาน' ),1,1,'C',true);
		
		
		$pdf->SetXY(136,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
		
		$pdf->SetXY(148,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
		
		$pdf->SetXY(164,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
		
		$pdf->SetXY(176,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
		
		$pdf->SetXY(191,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);


		//แสดงข้อมูลต่อ
		$posXRowP2_list=28; // fix start datarow

		//วน loop เริ่มจาก index ที่ 49
		for ($i=49; $i<count($jobListsENV); $i++) {
			//echo "Thing ".$i." is ".$jobListsENV[$i];

			$pdf->SetFont('THSarabun','',12);
			$pdf->SetXY(6,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , $numberEnv ),1,1,'C',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(14,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' ,$jobListsENV[$i]["ref_date_th"] ),1,1,'C',false);
		
		
			$pdf->SetXY(31,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_doc"]  ),1,1,'C',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(56,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["department"] ),1,1,'L',false);
		
			$pdf->SetFont('THSarabun','',12);
			$pdf->SetXY(118,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["work_code"] ),1,1,'C',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(136,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="water")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
		
		
			$pdf->SetXY(148,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="soil_fertilizer_gabage")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
		
		
			$pdf->SetXY(164,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="other_env")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(176,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
		
		
			$pdf->SetXY(191,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
		
		
		
		
			$currency_water=$jobListsENV[$i]["sub_category"]=="water"?$jobListsENV[$i]["total"]:0;
			settype($currency_water,"float");
			$sum_water +=$currency_water;
		
		
			$currency_soil_fertilizer_gabage=$jobListsENV[$i]["sub_category"]=="soil_fertilizer_gabage"?$jobListsENV[$i]["total"]:0;
			settype($currency_soil_fertilizer_gabage,"float");
			$sum_soil_fertilizer_gabage +=$currency_soil_fertilizer_gabage;
		
		
			$currency_other_env=$jobListsENV[$i]["sub_category"]=="other_env"?$jobListsENV[$i]["total"]:0;
			settype($currency_other_env,"float");
			$sum_other_env +=$currency_other_env;

			$currency_total=$value["total"];
			settype($currency_total,"float");
			$sum_total +=$currency_total;
		
			$currency_income_cecentre=$value["income_cecentre"];
			settype($currency_income_cecentre,"float");
			$sum_income_cecentre +=$currency_income_cecentre;
		
		
			$posXRowP2_list +=$hightRow;
			$numberEnv++;
		
			if($numberEnv>98){
				break;
			}

		}//end for

		
		if(count($jobListsENV)<=96  ){ //

			//summary
			// ส่วนสรุปผล ในหน้านั้นเลย
			//รวม
			$pdf->SetXY(6,$posXRowP2_list);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);


			//sum หมวดน้ำ
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(136,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water,2) ),1,1,'C',true);

			//sum หมวดดินปุ๋ยขยะ
			$pdf->SetXY(148,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_soil_fertilizer_gabage,2) ),1,1,'C',true);

			//sum หมวดอื่นๆ
			$pdf->SetXY(164,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_env,2) ),1,1,'C',true);

			//sum 100
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(176,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',true);

			//sum 87
			$pdf->SetXY(191,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);



			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;

			//sum ทุกหมวด
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(136,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2) ),1,1,'C',true);



			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=3;
			//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)

			$pdf->SetFont('THSarabun','',12);
			$pdf->SetXY(6,$posXRowP2_list);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);

			$pdf->SetFont('THSarabun','B',12);
			$pdf->SetXY(26,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);


			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;


			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;

			$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน " ));
			$pdf->Text( 80 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));

			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;

			$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน " )); 

		}

		if(($numberEnv>97)&(count($jobListsENV)<=160)){
			// ขึ้นหน้าไปเพื่อไป แสดงผล หรือสรุปผลให้จบอย่างเดียว
			$pdf->AddPage("P",'A4');
			//summary only
			$posXRowP4_list=28; // fix start datarow //แสดงข้อมูลต่อ

			if(count($jobListsENV)>97){
				// เพิ่มหัวตาราง
				$pdf->SetXY(136,$startP2BaseLineY+1);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(176,$startP2BaseLineY+1);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				

				if(count($jobListsENV)>=99){
					$pdf->SetXY(6,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);
					
					$pdf->SetXY(14,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);
					
					$pdf->SetXY(31,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);
					
					$pdf->SetXY(56,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , 'หน่วยงาน' ),1,1,'C',true);
					
					
					$pdf->SetXY(118,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , 'เลขที่ใบงาน' ),1,1,'C',true);
				}

				
				$pdf->SetXY(136,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
				
				$pdf->SetXY(148,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
				
				$pdf->SetXY(164,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
				
				$pdf->SetXY(176,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
				
				$pdf->SetXY(191,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);
			}

			//วน loop เริ่มจาก index ที่ 98
			for ($i=98; $i<count($jobListsENV); $i++) {
				$pdf->SetFont('THSarabun','',12);
				$pdf->SetXY(6,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , $numberEnv ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(14,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' ,$jobListsENV[$i]["ref_date_th"] ),1,1,'C',false);
			
			
				$pdf->SetXY(31,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_doc"]  ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(56,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["department"] ),1,1,'L',false);
			
				$pdf->SetFont('THSarabun','',12);
				$pdf->SetXY(118,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["work_code"] ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(136,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="water")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(148,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="soil_fertilizer_gabage")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(164,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="other_env")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(176,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
			
			
				$pdf->SetXY(191,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
			
			
				$currency_water=$jobListsENV[$i]["sub_category"]=="water"?$jobListsENV[$i]["total"]:0;
				settype($currency_water,"float");
				$sum_water +=$currency_water;
			
			
				$currency_soil_fertilizer_gabage=$jobListsENV[$i]["sub_category"]=="soil_fertilizer_gabage"?$jobListsENV[$i]["total"]:0;
				settype($currency_soil_fertilizer_gabage,"float");
				$sum_soil_fertilizer_gabage +=$currency_soil_fertilizer_gabage;
			
			
				$currency_other_env=$jobListsENV[$i]["sub_category"]=="other_env"?$jobListsENV[$i]["total"]:0;
				settype($currency_other_env,"float");
				$sum_other_env +=$currency_other_env;
	
				$currency_total=$value["total"];
				settype($currency_total,"float");
				$sum_total +=$currency_total;
			
				$currency_income_cecentre=$value["income_cecentre"];
				settype($currency_income_cecentre,"float");
				$sum_income_cecentre +=$currency_income_cecentre;
			
			
				$posXRowP4_list +=$hightRow;
				$numberEnv++;
			
				if($numberEnv>147){
					break;
				}


				
			}


			if(count($jobListsENV)<=145){
				//สรุปผลในหน้านั้น
				// สรุปผล
				$pdf->SetXY(136,$startP2BaseLineY+1);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(176,$startP2BaseLineY+1);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(136,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
				
				$pdf->SetXY(148,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
				
				$pdf->SetXY(164,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
				
				$pdf->SetXY(176,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
				
				$pdf->SetXY(191,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);
			
				if(count($jobListsENV)>=99){
					$pdf->SetXY(136,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
					
					$pdf->SetXY(148,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
					
					$pdf->SetXY(164,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
					
					$pdf->SetXY(176,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
					
					$pdf->SetXY(191,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);
				}

				/****
				 * 
				 * 
				 *  if else
				 * 
				 * 
				 */
				if(count($jobListsENV)>=97 & count($jobListsENV)<=98){
					//สรุปผลอย่างเดียว
					//summary only
					//รวม
			
					//sum หมวดน้ำ
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water,2) ),1,1,'C',false);
				
					//sum หมวดดินปุ๋ยขยะ
					$pdf->SetXY(148,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_soil_fertilizer_gabage,2) ),1,1,'C',false);
				
					//sum หมวดอื่นๆ
					$pdf->SetXY(164,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_other_env,2) ),1,1,'C',false);
				
					//sum 100
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(176,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',false);
				
					//sum 87
					$pdf->SetXY(191,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',false);
					
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				

					//sum ทุกหมวด
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2) ),1,1,'C',false);
				
				
				
					//ขึ้นบรรทัดใหม่
					//$posXRowP4_list +=$hightRow;
					//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)
				
					$pdf->SetFont('THSarabun','',12);
					$pdf->SetXY(6,$posXRowP4_list);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->SetXY(26,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);
				
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
					$pdf->Text( 80 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));
					// สรุปผล
				}

				if(count($jobListsENV)>=99 & count($jobListsENV)!=145){
					
					$pdf->SetXY(6,$posXRowP4_list);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);


					//$pdf->SetFont('THSarabun','B',12);
					//$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
					
					$pdf->SetXY(176,$startP2BaseLineY+1);
					$pdf->SetFillColor(255, 255, 255);
					
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน

					$pdf->SetXY(136,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
					
					$pdf->SetXY(148,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
					
					$pdf->SetXY(164,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
					
					$pdf->SetXY(176,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
					
					$pdf->SetXY(191,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);

					//sum หมวดน้ำ
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water,2) ),1,1,'C',false);
				
					//sum หมวดดินปุ๋ยขยะ
					$pdf->SetXY(148,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_soil_fertilizer_gabage,2) ),1,1,'C',false);
				
					//sum หมวดอื่นๆ
					$pdf->SetXY(164,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_other_env,2) ),1,1,'C',false);
				
					//sum 100
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(176,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',false);
				
					//sum 87
					$pdf->SetXY(191,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',false);
					
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				

					//sum ทุกหมวด
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2) ),1,1,'C',false);
				
				
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
					//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)
				
					$pdf->SetFont('THSarabun','',12);
					$pdf->SetXY(6,$posXRowP4_list);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->SetXY(26,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);
				
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
					$pdf->Text( 80 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));
					// สรุปผล

				}

			}

		}

		if(($numberEnv>145)&(count($jobListsENV)<=160)){
			$pdf->AddPage("P",'A4');
			//summary only
			$posXRowP5_list=28; // fix start datarow //แสดงข้อมูลต่อ

			if(count($jobListsENV)>=148){
				// เพิ่มหัวตาราง
				$pdf->SetXY(136,$startP2BaseLineY+1);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(176,$startP2BaseLineY+1);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(6,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);
				
				$pdf->SetXY(14,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);
				
				$pdf->SetXY(31,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);
				
				$pdf->SetXY(56,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , 'หน่วยงาน' ),1,1,'C',true);
				
				
				$pdf->SetXY(118,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , 'เลขที่ใบงาน' ),1,1,'C',true);
				
				
				$pdf->SetXY(136,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
				
				$pdf->SetXY(148,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
				
				$pdf->SetXY(164,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
				
				$pdf->SetXY(176,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
				
				$pdf->SetXY(191,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);
			}

		
			//วน loop เริ่มจาก index ที่ 147
			for ($i=147; $i<count($jobListsENV); $i++) {
				$pdf->SetFont('THSarabun','',12);
				$pdf->SetXY(6,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , $numberEnv ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(14,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(17,$hightRow,iconv( 'UTF-8','cp874' ,$jobListsENV[$i]["ref_date_th"] ),1,1,'C',false);
			
			
				$pdf->SetXY(31,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(25,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_doc"]  ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(56,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(62,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["department"] ),1,1,'L',false);
			
				$pdf->SetFont('THSarabun','',12);
				$pdf->SetXY(118,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["work_code"] ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(136,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="water")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(148,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="soil_fertilizer_gabage")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(164,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="other_env")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(176,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
			
			
				$pdf->SetXY(191,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
			
			
				$currency_water=$jobListsENV[$i]["sub_category"]=="water"?$jobListsENV[$i]["total"]:0;
				settype($currency_water,"float");
				$sum_water +=$currency_water;
			
			
				$currency_soil_fertilizer_gabage=$jobListsENV[$i]["sub_category"]=="soil_fertilizer_gabage"?$jobListsENV[$i]["total"]:0;
				settype($currency_soil_fertilizer_gabage,"float");
				$sum_soil_fertilizer_gabage +=$currency_soil_fertilizer_gabage;
			
			
				$currency_other_env=$jobListsENV[$i]["sub_category"]=="other_env"?$jobListsENV[$i]["total"]:0;
				settype($currency_other_env,"float");
				$sum_other_env +=$currency_other_env;
	
				$currency_total=$value["total"];
				settype($currency_total,"float");
				$sum_total +=$currency_total;
			
				$currency_income_cecentre=$value["income_cecentre"];
				settype($currency_income_cecentre,"float");
				$sum_income_cecentre +=$currency_income_cecentre;
			
			
				$posXRowP5_list +=$hightRow;
				$numberEnv++;
			
				if($numberEnv>160){
					break;
				}


				
			}

			// สรุปผล
			$pdf->SetXY(136,$startP2BaseLineY+1);
			$pdf->SetFillColor(255, 255, 255);
			
			$pdf->SetFont('THSarabun','B',12);
			$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน
			
			$pdf->SetXY(176,$startP2BaseLineY+1);
			$pdf->SetFillColor(255, 255, 255);
			
			$pdf->SetFont('THSarabun','B',12);
			$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
			
			if(count($jobListsENV)>147){
				$pdf->SetXY(6,$posXRowP5_list);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);
			}


			$pdf->SetXY(136,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'น้ำ' ),1,1,'C',true);
			
			$pdf->SetXY(148,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/ปุ๋ย/ขยะ' ),1,1,'C',true);
			
			$pdf->SetXY(164,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'อื่นๆ' ),1,1,'C',true);
			
			$pdf->SetXY(176,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
			
			$pdf->SetXY(191,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);
		
			// ส่วนสรุปผล
			//รวม
		
			//sum หมวดน้ำ
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(136,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water,2) ),1,1,'C',false);
		
			//sum หมวดดินปุ๋ยขยะ
			$pdf->SetXY(148,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_soil_fertilizer_gabage,2) ),1,1,'C',false);
		
			//sum หมวดอื่นๆ
			$pdf->SetXY(164,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_other_env,2) ),1,1,'C',false);
		
			//sum 100
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(176,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',false);
		
			//sum 87
			$pdf->SetXY(191,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',false);
		
		
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
		
			//sum ทุกหมวด
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(136,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2) ),1,1,'C',false);
		
		
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
			//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)
		
			$pdf->SetFont('THSarabun','',12);
			$pdf->SetXY(6,$posXRowP5_list);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);
		
			$pdf->SetFont('THSarabun','B',12);
			$pdf->SetXY(26,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);
		
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
		
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
		
			$pdf->Text( 6 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
			$pdf->Text( 80 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
		
			$pdf->Text( 6 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));
			// สรุปผล

		}

	}

	//$pdf->AddPage("P",'A4');

}else{
	
	// กรณีอื่นๆ

}

// ขึ้นหน้าไปเพื่อไปแสดงข้อมูล และรอการสรุปผล
//$pdf->AddPage("P",'A4');


$pdf->Output();
//$pdf->Output('Receive.pdf','F');

?>