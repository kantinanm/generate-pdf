<?php

/*
require_once 'vendor/autoload.php';
use Fpdf\Fpdf;*/


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

$pdf=new PDF('P','mm',array(210,297));

$pdf->AliasNbPages();

//$pdf = new Fpdf('P','mm',array(210,297));//A4
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

//$pdf->AddPage();


$startBaseLineY=10;
$StartheaderBaseLineY =15;



$pdf->AddPage("P",'A4');

$pdf->SetFont('THSarabun','B',20);
$pdf->SetXY(6,8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(130,8,iconv( 'UTF-8','cp874' , 'รายงานสรุปผู้มารับบริการ สาขาวิศวกรรมโยธา' ),0,1,'C',false); //


$startP2BaseLineY=17;
$StartP2headerBaseLineY =23;

$pdf->SetFont('THSarabun','',12);

//Head Column 1
//$pdf->SetXY(40,20);

$hightRow=5;

$pdf->SetXY(136,$startP2BaseLineY-6);
$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน

$pdf->SetXY(176,$startP2BaseLineY-6);
$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน

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

/*
$pdf->SetXY(136,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'เหล็ก' ),1,1,'C',true);*/

$engPos1=136;
$pdf->SetXY($engPos1,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);

/*
$pdf->SetXY(148,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'คอนกรีต' ),1,1,'C',true);*/

$engPos2=146;
$pdf->SetXY($engPos2,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);

/*
$pdf->SetFont('THSarabun','',7);
$pdf->SetXY(164,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , 'ดิน/หิน/ทราย' ),1,1,'C',true);*/

$engPos3=156;
$pdf->SetXY($engPos3,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
$pdf->SetFont('THSarabun','B',9);
$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);

$engPos4=166;
$pdf->SetXY($engPos4,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);


$pdf->SetFont('THSarabun','',12);
$pdf->SetXY(176,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);

$pdf->SetXY(191,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);

// END Head Column 1

$month_th="กรกฏาคม";
$customer_env=9;


$url2 = 'http://localhost:8000/api/joblists-monthly';

// request data that is going to be sent as POST to API
$data2 = array(
    "year" => 2566,
    "month_en" => "July",
	"branch" => "civil"
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
$jobListsENV[2]=array("work_code"=>"CE 100/2566","ref_date_th"=>"24/07/2566","ref_doc"=>"307/0615","department"=>"บริษัท ปูนซิเมนต์ไทย (ลำปาง) จำกัด สาขา สำนักงานใหญ่","sub_category"=>"rock_soil_sand","total"=>2600.00,"income_cecentre"=>2262.00);
$jobListsENV[1]=array("work_code"=>"CE93/2566","ref_date_th"=>"14/07/2566","ref_doc"=>"307/0583","department"=>"บริษัท จัดการทรัพย์สินและชุมชน จำกัด (เลขทะเบียน)","sub_category"=>"concrete","total"=>900.00,"income_cecentre"=>783.00);
$jobListsENV[0]=array("work_code"=>"CE 92/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0532","department"=>"บริษัท เก้าทัพวิศวกรรม จำกัด","sub_category"=>"concrete","total"=>360.00,"income_cecentre"=>313.20,"boss_dispense"=>31.32,"technician_nu_net"=>"apicharts","technician_dispense"=>46.98,"office_dispense"=>15.66);


for ($i=3; $i<18; $i++) {
	$jobListsENV[$i]=$jobListsENV[2];
}*/


$posXRow_list=28; // fix start datarow

$sum_water =0;
$sum_soil_fertilizer_gabage =0;
$sum_other_env =0;
$sum_total = 0;
$sum_income_cecentre= 0;

$sum_steel =0;
$sum_concrete =0;
$sum_rock_soil_sand =0;
$sum_other_cil =0;



settype($sum_water,"float");
settype($sum_soil_fertilizer_gabage,"float");
settype($sum_other_env,"float");
settype($sum_total,"float");
settype($sum_income_cecentre,"float");


settype($sum_steel,"float");
settype($sum_concrete,"float");
settype($sum_rock_soil_sand,"float");
settype($sum_other_cil,"float");


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

	$pdf->SetFont('THSarabun','',8);
	$pdf->SetXY(136,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="steel")?number_format($value["total"],2):"" ),1,1,'R',false);


	$pdf->SetXY(146,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="concrete")?number_format($value["total"],2):"" ),1,1,'R',false);


	$pdf->SetXY(156,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="rock_soil_sand")?number_format($value["total"],2):"" ),1,1,'R',false);


	$pdf->SetXY(166,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="other_cil")?number_format($value["total"],2):"" ),1,1,'R',false);



	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(176,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["total"],2) ),1,1,'R',false);


	$pdf->SetXY(191,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["income_cecentre"],2) ),1,1,'R',false);




	$currency_steel=$value["sub_category"]=="steel"?$value["total"]:0;
	settype($currency_steel,"float");
	$sum_steel +=$currency_steel;


	$currency_concrete=$value["sub_category"]=="concrete"?$value["total"]:0;
	settype($currency_concrete,"float");
	$sum_concrete +=$currency_concrete;


	$currency_rock_soil_sand=$value["sub_category"]=="rock_soil_sand"?$value["total"]:0;
	settype($currency_rock_soil_sand,"float");
	$sum_rock_soil_sand +=$currency_rock_soil_sand;


	$currency_other_cil=$value["sub_category"]=="other_cil"?$value["total"]:0;
	settype($currency_other_cil,"float");
	$sum_other_cil +=$currency_other_cil;


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



	//sum หมวดเหล็ก
	$pdf->SetFont('THSarabun','B',8);
	$pdf->SetXY(136,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel,2)  ),1,1,'C',false);

	//sum หมวดคอนกรีต
	$pdf->SetXY(146,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_concrete,2) ),1,1,'C',false);

	//sum หมวดดิน/หิน/ทราย
	$pdf->SetXY(156,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_rock_soil_sand,2) ),1,1,'C',false);

	//sum หมวดอื่นๆ
	$pdf->SetXY(166,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_cil,2) ),1,1,'C',false);


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
	$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2) ),1,1,'C',false);



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
	$pdf->Text( 6 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมโยธา '.count($jobListsENV)." ใบงาน "));
	$pdf->Text( 80 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมโยธา '.number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2)." บาท" ));

	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;

	$pdf->Text( 6 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมโยธา '.$customer_env." หน่วยงาน "));

}else if(count($jobListsENV)>=47 & count($jobListsENV)<= 49){

	$pdf->AddPage("P",'A4');
	//แสดงข้อมูลสรุป
	// เพิ่มหัวตาราง
			
	$posXRowP2_list=28; // fix start datarow //แสดงข้อมูลต่อ

	$pdf->SetXY(136,$startP2BaseLineY-6);
	$pdf->SetFillColor(255, 255, 255);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน
	
	$pdf->SetXY(176,$startP2BaseLineY-6);
	$pdf->SetFillColor(255, 255, 255);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
	

	$engPos1=136;
	$pdf->SetXY($engPos1,$startP2BaseLineY-1);
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
	$pdf->SetFont('THSarabun','B',11);
	$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);
	
	
	$engPos2=146;
	$pdf->SetXY($engPos2,$startP2BaseLineY-1);
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
	$pdf->SetFont('THSarabun','B',11);
	$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);
	
	
	$engPos3=156;
	$pdf->SetXY($engPos3,$startP2BaseLineY-1);
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
	$pdf->SetFont('THSarabun','B',9);
	$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);
	
	$engPos4=166;
	$pdf->SetXY($engPos4,$startP2BaseLineY-1);
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
	$pdf->SetFont('THSarabun','B',11);
	$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);



	
	$pdf->SetXY(176,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
	
	$pdf->SetXY(191,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);


	// ส่วนสรุปผล
	//รวม

	
	//sum หมวดเหล็ก
	$pdf->SetFont('THSarabun','B',8);
	$pdf->SetXY(136,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel,2)  ),1,1,'C',false);

	//sum หมวดคอนกรีต
	$pdf->SetXY(146,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_concrete,2) ),1,1,'C',false);

	//sum หมวดดิน/หิน/ทราย
	$pdf->SetXY(156,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_rock_soil_sand,2) ),1,1,'C',false);

	//sum หมวดอื่นๆ
	$pdf->SetXY(166,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_cil,2) ),1,1,'C',false);


	//sum 100
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(176,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',true);

	//sum 87
	$pdf->SetXY(191,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'R',true);



	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	//sum ทุกหมวด
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(136,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2) ),1,1,'C',false);



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
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมโยธา '.count($jobListsENV)." ใบงาน "));
	$pdf->Text( 80 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมโยธา '.number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2)." บาท" ));

	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมโยธา '.$customer_env." หน่วยงาน "));


	// สรุป

}else if(count($jobListsENV)>=50 & count($jobListsENV)<= 170){
	//แสดงตารางถึงรายการที่ 49 หลังจากนั้นขึ้นหน้าใหม่


	if(($posXRow_list>268) &($numberEnv>49)){

		$pdf->AddPage("P",'A4');
		
		// เพิ่มหัวตาราง
		$pdf->SetXY(136,$startP2BaseLineY-6);
		$pdf->SetFillColor(255, 255, 255);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน
		
		$pdf->SetXY(176,$startP2BaseLineY-6);
		$pdf->SetFillColor(255, 255, 255);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
		
	

		
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
		
		
		$engPos1=136;
		$pdf->SetXY($engPos1,$startP2BaseLineY-1);
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
		$pdf->SetFont('THSarabun','B',11);
		$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);
		
		
		$engPos2=146;
		$pdf->SetXY($engPos2,$startP2BaseLineY-1);
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
		$pdf->SetFont('THSarabun','B',11);
		$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);
		
		
		$engPos3=156;
		$pdf->SetXY($engPos3,$startP2BaseLineY-1);
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
		$pdf->SetFont('THSarabun','B',9);
		$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);
		
		$engPos4=166;
		$pdf->SetXY($engPos4,$startP2BaseLineY-1);
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
		$pdf->SetFont('THSarabun','B',11);
		$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);

		
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
		



			$pdf->SetFont('THSarabun','',8);
			$pdf->SetXY(136,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="steel")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
		
		
			$pdf->SetXY(146,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="concrete")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
		
		
			$pdf->SetXY(156,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="rock_soil_sand")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
		
		
			$pdf->SetXY(166,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="other_cil")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);



		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(176,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',true);
		
		
			$pdf->SetXY(191,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',true);
		
		
		
		
			$currency_steel=$value["sub_category"]=="steel"?$value["total"]:0;
			settype($currency_steel,"float");
			$sum_steel +=$currency_steel;
		
		
			$currency_concrete=$value["sub_category"]=="concrete"?$value["total"]:0;
			settype($currency_concrete,"float");
			$sum_concrete +=$currency_concrete;
		
		
			$currency_rock_soil_sand=$value["sub_category"]=="rock_soil_sand"?$value["total"]:0;
			settype($currency_rock_soil_sand,"float");
			$sum_rock_soil_sand +=$currency_rock_soil_sand;
		
		
			$currency_other_cil=$value["sub_category"]=="other_cil"?$value["total"]:0;
			settype($currency_other_cil,"float");
			$sum_other_cil +=$currency_other_cil;


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



			//sum หมวดเหล็ก
			$pdf->SetFont('THSarabun','B',8);
			$pdf->SetXY(136,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel,2)  ),1,1,'C',false);

			//sum หมวดคอนกรีต
			$pdf->SetXY(146,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_concrete,2) ),1,1,'C',false);

			//sum หมวดดิน/หิน/ทราย
			$pdf->SetXY(156,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_rock_soil_sand,2) ),1,1,'C',false);

			//sum หมวดอื่นๆ
			$pdf->SetXY(166,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_cil,2) ),1,1,'C',false);

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
			$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2) ),1,1,'C',false);



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

			$pdf->SetFont('THSarabun','B',12);
			$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมโยธา '.count($jobListsENV)." ใบงาน "));
			$pdf->Text( 80 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมโยธา '.number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2)." บาท" ));
		
			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;
		
			$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมโยธา '.$customer_env." หน่วยงาน "));

		}

		if(($numberEnv>97)&(count($jobListsENV)<=160)){
			// ขึ้นหน้าไปเพื่อไป แสดงผล หรือสรุปผลให้จบอย่างเดียว
			$pdf->AddPage("P",'A4');
			//summary only
			$posXRowP4_list=28; // fix start datarow //แสดงข้อมูลต่อ

			if(count($jobListsENV)>97){
				// เพิ่มหัวตาราง
				$pdf->SetXY(136,$startP2BaseLineY-6);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(176,$startP2BaseLineY-6);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
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

			
				$engPos1=136;
				$pdf->SetXY($engPos1,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);
				
				
				$engPos2=146;
				$pdf->SetXY($engPos2,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);
				
				
				$engPos3=156;
				$pdf->SetXY($engPos3,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
				$pdf->SetFont('THSarabun','B',9);
				$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);
				
				$engPos4=166;
				$pdf->SetXY($engPos4,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);
			
			
			
				
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
			
				$pdf->SetFont('THSarabun','',8);
				$pdf->SetXY(136,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="steel")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(146,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="concrete")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(156,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="rock_soil_sand")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(166,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="other_cil")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
	
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(176,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
			
			
				$pdf->SetXY(191,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
			
			
				$currency_steel=$value["sub_category"]=="steel"?$value["total"]:0;
				settype($currency_steel,"float");
				$sum_steel +=$currency_steel;


				$currency_concrete=$value["sub_category"]=="concrete"?$value["total"]:0;
				settype($currency_concrete,"float");
				$sum_concrete +=$currency_concrete;


				$currency_rock_soil_sand=$value["sub_category"]=="rock_soil_sand"?$value["total"]:0;
				settype($currency_rock_soil_sand,"float");
				$sum_rock_soil_sand +=$currency_rock_soil_sand;


				$currency_other_cil=$value["sub_category"]=="other_cil"?$value["total"]:0;
				settype($currency_other_cil,"float");
				$sum_other_cil +=$currency_other_cil;

	
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
				$pdf->SetXY(136,$startP2BaseLineY-6);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(176,$startP2BaseLineY-6);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
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
				



				$engPos1=136;
				$pdf->SetXY($engPos1,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);
				
				
				$engPos2=146;
				$pdf->SetXY($engPos2,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);
				
				
				$engPos3=156;
				$pdf->SetXY($engPos3,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
				$pdf->SetFont('THSarabun','B',9);
				$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);
				
				$engPos4=166;
				$pdf->SetXY($engPos4,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);
			
			
			
				
				$pdf->SetXY(176,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
				
				$pdf->SetXY(191,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);
			
				// ส่วนสรุปผล
				//รวม
				
				//$pdf->SetXY(6,$posXRowP4_list);
				//$pdf->SetFillColor(206, 213, 222);
				//$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);

				if(count($jobListsENV)>=97 & count($jobListsENV)<=98){
					//สรุปผลอย่างเดียว
					//summary only
					//sum หมวดเหล็ก
					$pdf->SetFont('THSarabun','B',8);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel,2)  ),1,1,'C',false);

					//sum หมวดคอนกรีต
					$pdf->SetXY(146,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_concrete,2) ),1,1,'C',false);

					//sum หมวดดิน/หิน/ทราย
					$pdf->SetXY(156,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_rock_soil_sand,2) ),1,1,'C',false);

					//sum หมวดอื่นๆ
					$pdf->SetXY(166,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_cil,2) ),1,1,'C',false);

					//sum 100
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(176,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',true);

					//sum 87
					$pdf->SetXY(191,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);


					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					//sum ทุกหมวด
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2) ),1,1,'C',false);
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
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมโยธา '.count($jobListsENV)." ใบงาน "));
					$pdf->Text( 80 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมโยธา '.number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2)." บาท" ));
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมโยธา '.$customer_env." หน่วยงาน "));
					// สรุปผล


				}

				if(count($jobListsENV)>=99 & count($jobListsENV)!=145){
					
					$pdf->SetXY(6,$posXRowP4_list);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);

					$pdf->SetXY(136,$startP2BaseLineY-6);
					$pdf->SetFillColor(255, 255, 255);
					
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน
					
					$pdf->SetXY(176,$startP2BaseLineY-6);
					$pdf->SetFillColor(255, 255, 255);
					
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
					
				
					$engPos1=136;
					$pdf->SetXY($engPos1,$startP2BaseLineY-1);
					$pdf->SetFont('THSarabun','B',12);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
					$pdf->SetFont('THSarabun','B',11);
					$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);
					
					
					$engPos2=146;
					$pdf->SetXY($engPos2,$startP2BaseLineY-1);
					$pdf->SetFont('THSarabun','B',12);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
					$pdf->SetFont('THSarabun','B',11);
					$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);
					
					
					$engPos3=156;
					$pdf->SetXY($engPos3,$startP2BaseLineY-1);
					$pdf->SetFont('THSarabun','B',12);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
					$pdf->SetFont('THSarabun','B',9);
					$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);
					
					$engPos4=166;
					$pdf->SetXY($engPos4,$startP2BaseLineY-1);
					$pdf->SetFont('THSarabun','B',12);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
					$pdf->SetFont('THSarabun','B',11);
					$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);
					
					$pdf->SetXY(176,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);
					
					$pdf->SetXY(191,$StartP2headerBaseLineY);
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);


					//summary only
					//sum หมวดเหล็ก
					$pdf->SetFont('THSarabun','B',8);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel,2)  ),1,1,'C',false);

					//sum หมวดคอนกรีต
					$pdf->SetXY(146,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_concrete,2) ),1,1,'C',false);

					//sum หมวดดิน/หิน/ทราย
					$pdf->SetXY(156,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_rock_soil_sand,2) ),1,1,'C',false);

					//sum หมวดอื่นๆ
					$pdf->SetXY(166,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_cil,2) ),1,1,'C',false);

					//sum 100
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(176,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',true);

					//sum 87
					$pdf->SetXY(191,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);


					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					//sum ทุกหมวด
					$pdf->SetFont('THSarabun','B',10);
					$pdf->SetXY(136,$posXRowP4_list);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2) ),1,1,'C',false);
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
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมโยธา '.count($jobListsENV)." ใบงาน "));
					$pdf->Text( 80 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมโยธา '.number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2)." บาท" ));
				
					//ขึ้นบรรทัดใหม่
					$posXRowP4_list +=$hightRow;
				
					$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมโยธา '.$customer_env." หน่วยงาน "));
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
				$pdf->SetXY(136,$startP2BaseLineY-6);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน
				
				$pdf->SetXY(176,$startP2BaseLineY-6);
				$pdf->SetFillColor(255, 255, 255);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
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
				
				
				$engPos1=136;
				$pdf->SetXY($engPos1,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);
				
				
				$engPos2=146;
				$pdf->SetXY($engPos2,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);
				
				
				$engPos3=156;
				$pdf->SetXY($engPos3,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
				$pdf->SetFont('THSarabun','B',9);
				$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);
				
				$engPos4=166;
				$pdf->SetXY($engPos4,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
				$pdf->SetFont('THSarabun','B',11);
				$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);

				
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
			
				$pdf->SetFont('THSarabun','',8);
				$pdf->SetXY(136,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="steel")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(146,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="concrete")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(156,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="rock_soil_sand")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
			
				$pdf->SetXY(166,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , ($jobListsENV[$i]["sub_category"]=="other_cil")?number_format($jobListsENV[$i]["total"],2):"" ),1,1,'R',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(176,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
			
			
				$pdf->SetXY(191,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
			
			
				$currency_steel=$value["sub_category"]=="steel"?$value["total"]:0;
				settype($currency_steel,"float");
				$sum_steel +=$currency_steel;


				$currency_concrete=$value["sub_category"]=="concrete"?$value["total"]:0;
				settype($currency_concrete,"float");
				$sum_concrete +=$currency_concrete;


				$currency_rock_soil_sand=$value["sub_category"]=="rock_soil_sand"?$value["total"]:0;
				settype($currency_rock_soil_sand,"float");
				$sum_rock_soil_sand +=$currency_rock_soil_sand;


				$currency_other_cil=$value["sub_category"]=="other_cil"?$value["total"]:0;
				settype($currency_other_cil,"float");
				$sum_other_cil +=$currency_other_cil;
	
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
			$pdf->SetXY(136,$startP2BaseLineY-6);
			$pdf->SetFillColor(255, 255, 255);

			$pdf->SetFont('THSarabun','B',12);
			$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมโยธา' ),"LTR",1,'C',true); //จำนวนเงิน

			$pdf->SetXY(176,$startP2BaseLineY-6);
			$pdf->SetFillColor(255, 255, 255);

			$pdf->SetFont('THSarabun','B',12);
			$pdf->Cell(28,$hightRow+8,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน


			$engPos1=136;
			$pdf->SetXY($engPos1,$startP2BaseLineY-1);
			$pdf->SetFont('THSarabun','B',12);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //เหล็ก 
			$pdf->SetFont('THSarabun','B',11);
			$pdf->RotatedText($engPos1+4,$startP2BaseLineY+8,'เหล็ก' ,50);


			$engPos2=146;
			$pdf->SetXY($engPos2,$startP2BaseLineY-1);
			$pdf->SetFont('THSarabun','B',12);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //คอนกรีต 
			$pdf->SetFont('THSarabun','B',11);
			$pdf->RotatedText($engPos2+3,$startP2BaseLineY+9,'คอนกรีต' ,50);


			$engPos3=156;
			$pdf->SetXY($engPos3,$startP2BaseLineY-1);
			$pdf->SetFont('THSarabun','B',12);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //ดิน/หิน/ทราย 
			$pdf->SetFont('THSarabun','B',9);
			$pdf->RotatedText($engPos3+2,$startP2BaseLineY+10,'ดิน/หิน/ทราย' ,50);

			$engPos4=166;
			$pdf->SetXY($engPos4,$startP2BaseLineY-1);
			$pdf->SetFont('THSarabun','B',12);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',false); //อื่นๆ 
			$pdf->SetFont('THSarabun','B',11);
			$pdf->RotatedText($engPos4+4,$startP2BaseLineY+8,'อื่นๆ' ,50);

			$pdf->SetXY(176,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , ' 100 %' ),1,1,'C',true);

			$pdf->SetXY(191,$StartP2headerBaseLineY);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);

			// ส่วนสรุปผล
			//รวม

			if(count($jobListsENV)>147){
				$pdf->SetXY(6,$posXRowP5_list);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(130,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);
			}



			//sum หมวดเหล็ก
			$pdf->SetFont('THSarabun','B',8);
			$pdf->SetXY(136,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel,2)  ),1,1,'C',false);

			//sum หมวดคอนกรีต
			$pdf->SetXY(146,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_concrete,2) ),1,1,'C',false);

			//sum หมวดดิน/หิน/ทราย
			$pdf->SetXY(156,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_rock_soil_sand,2) ),1,1,'C',false);

			//sum หมวดอื่นๆ
			$pdf->SetXY(166,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10,$hightRow,iconv( 'UTF-8','cp874' ,number_format($sum_other_cil,2) ),1,1,'C',false);

			//sum 100
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(176,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'R',true);

			//sum 87
			$pdf->SetXY(191,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);



			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;

			//sum ทุกหมวด
			//sum ทุกหมวด
			$pdf->SetFont('THSarabun','B',10);
			$pdf->SetXY(136,$posXRowP5_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2) ),1,1,'C',false);









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

			$pdf->SetFont('THSarabun','B',12);
			$pdf->Text( 6 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมโยธา '.count($jobListsENV)." ใบงาน "));
			$pdf->Text( 80 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมโยธา '.number_format($sum_steel+$sum_concrete+$sum_rock_soil_sand+$sum_other_cil,2)." บาท" ));

			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;

			$pdf->Text( 6 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมโยธา '.$customer_env." หน่วยงาน "));


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