<?php

//require_once 'vendor/autoload.php';
//use Fpdf\Fpdf;
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
$pdf->SetFont('THSarabun','B',20);
$pdf->SetXY(6,6);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(90,8,iconv( 'UTF-8','cp874' , 'รายงานสรุปการปฏิบัติงานวิศวกรตรวจสอบผล' ),0,1,'L',false);

$pdf->SetFont('THSarabun','B',14);
$pdf->SetXY(6,13);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(55,6,iconv( 'UTF-8','cp874' , 'และค่าตอบแทนหัวหน้าศูนย์ทดสอบ' ),0,1,'L',false);

/*
$pdf->SetXY(6,17);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(52,6,iconv( 'UTF-8','cp874' , 'ศูนย์ทดสอบวิศวกรรมโยธา' ),0,1,'R',false);*/


$startP2BaseLineY=17;
$StartP2headerBaseLineY =23;
$hightRow=5;


$sumEngineer[0]=0;
$sumEngineer[1]=0;
$sumEngineer[2]=0;
$sumEngineer[3]=0;
$sumEngineer[4]=0;
$sumEngineer[5]=0;
$sumEngineer[6]=0;
$sumEngineer[7]=0;
$sumEngineer[8]=0;
$sumEngineer[9]=0;
$sumEngineer[10]=0;
$sumEngineer[11]=0;


$dataEngineer[0]=array("name"=>"อำพล","nu_net"=>"ampolt","rotage"=>60,"preset_x"=>3,"preset_y"=>8,"blank"=>"no","font_size"=>11);
$dataEngineer[1]=array("name"=>"ดลเดช","nu_net"=>"dondejt","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[2]=array("name"=>"จีรพงษ์","nu_net"=>"jeerapongl","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[3]=array("name"=>"ปาจรีย์","nu_net"=>"pajareet","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[4]=array("name"=>"พรนภา","nu_net"=>"pornnapas","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[5]=array("name"=>"สสิกรณณ์","nu_net"=>"sasikorn","rotage"=>60,"preset_x"=>3,"preset_y"=>10,"blank"=>"no","font_size"=>11);
$dataEngineer[6]=array("name"=>"ธนพล","nu_net"=>"tanaponph","rotage"=>60,"preset_x"=>3,"preset_y"=>8,"blank"=>"no","font_size"=>11);
$dataEngineer[7]=array("name"=>"วิรินทร์","nu_net"=>"virink","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[8]=array("name"=>"วรางค์ลักษณ์","nu_net"=>"waranglucks","rotage"=>60,"preset_x"=>2,"preset_y"=>11,"blank"=>"no","font_size"=>9);
$dataEngineer[9]=array("name"=>"วิลาวัลย์","nu_net"=>"wilawank","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[10]=array("name"=>"ภัคพงศ์","nu_net"=>"phakphongh","rotage"=>60,"preset_x"=>3,"preset_y"=>9,"blank"=>"no","font_size"=>11);
$dataEngineer[11]=array("name"=>"","nu_net"=>"","rotage"=>90,"preset_x"=>4,"preset_y"=>9,"blank"=>"yes","font_size"=>11);
//$dataEngineer[11]=array("name"=>"กรกฎ","nu_net"=>"korakodn","rotage"=>90,"preset_x"=>4,"preset_y"=>9,"blank"=>"no","font_size"=>11);

//$posXColHeader=[];
$posXColHeader[0]=99;
$posXColHeader[1]=108;
$posXColHeader[2]=117;
$posXColHeader[3]=126;
$posXColHeader[4]=135;
$posXColHeader[5]=144;
$posXColHeader[6]=153;
$posXColHeader[7]=162;
$posXColHeader[8]=171;
$posXColHeader[9]=180;
$posXColHeader[10]=189;
$posXColHeader[11]=198;

$pdf->SetXY(60,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(25,$hightRow+3,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน

$pdf->SetFont('THSarabun','B',12);
$pdf->SetXY(99,10);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(106.5,6,iconv( 'UTF-8','cp874' , 'ค่าตอบแทนวิศวกรตรวจสอบผล (20%)' ),1,1,'C',false);






foreach($dataEngineer as $key=>$value){
	//echo "The index is = " . $key . ", and value is = " . $value;
	$engPos=$posXColHeader[$key];
	$pdf->SetXY($engPos,$startP2BaseLineY-1);
	
	if($value['blank']=="yes"){
		$pdf->SetFillColor(206, 213, 222);
	}else{
		$pdf->SetFillColor(255, 255, 255);
	}

	$pdf->SetFont('THSarabun','B',12);
	$pdf->Cell(($key==count($dataEngineer)-1)?7.5:9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ $key
	
	if($value['blank']=="no"){
		$pdf->SetFont('THSarabun','B',$value['font_size']);
		$pdf->RotatedText($engPos+$value['preset_x'],$startP2BaseLineY+$value['preset_y'],$value['name'] ,($key==count($dataEngineer)-1)?90:$value['rotage']);
	}

}

/*
$engPos1=99;
$pdf->SetXY($engPos1,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 1
$pdf->SetFont('THSarabun','B',9);
$pdf->RotatedText($engPos1+2,$startP2BaseLineY+11,'วรางค์ลักษณ์' ,60);

$engPos2=108;
$pdf->SetXY($engPos2,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 2
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos2+3,$startP2BaseLineY+8,'อำพล' ,60);

$engPos3=117;
$pdf->SetXY($engPos3,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 3
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos3+3,$startP2BaseLineY+9,'ดลเดช' ,60);

$engPos4=126;
$pdf->SetXY($engPos4,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 4
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos4+3,$startP2BaseLineY+9,'จีรพงษ์' ,60);

$engPos5=135;
$pdf->SetXY($engPos5,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 5
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos5+3,$startP2BaseLineY+9,'ปาจรีย์' ,60);

$engPos6=144;
$pdf->SetXY($engPos6,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 6
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos6+3,$startP2BaseLineY+9,'ภัคพงศ์' ,60);

$engPos7=153;
$pdf->SetXY($engPos7,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 7
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos7+3,$startP2BaseLineY+9,'พรนภา' ,60);

$engPos8=162;
$pdf->SetXY($engPos8,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 8
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos8+3,$startP2BaseLineY+10,'สสิกรณณ์' ,60);

$engPos9=171;
$pdf->SetXY($engPos9,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 9
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos9+3,$startP2BaseLineY+8,'ธนพล' ,60);

$engPos10=180;
$pdf->SetXY($engPos10,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 10
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos10+3,$startP2BaseLineY+9,'วิรินทร์' ,60);

$engPos11=189;
$pdf->SetXY($engPos11,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 11
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos11+3,$startP2BaseLineY+9,'วิลาวัลย์' ,60);

$engPos12=198;
$pdf->SetXY($engPos12,$startP2BaseLineY-1);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(7.5,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ 12
$pdf->SetFont('THSarabun','B',11);
$pdf->RotatedText($engPos12+4,$startP2BaseLineY+9,'วิลาวัลย์' ,90);*/

/*
$pdf->SetXY(136,$startP2BaseLineY+1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(40,$hightRow,iconv( 'UTF-8','cp874' , 'สาขาวิศวกรรมสิ่งแวดล้อม' ),1,1,'C',true); //จำนวนเงิน

$pdf->SetXY(176,$startP2BaseLineY+1);
$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('THSarabun','B',12);
$pdf->Cell(28,$hightRow,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
*/

$pdf->SetFont('THSarabun','B',10);
$pdf->SetXY(6,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);

$pdf->SetFont('THSarabun','B',10);
$pdf->SetXY(14,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);

$pdf->SetXY(29,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);

$pdf->SetFont('THSarabun','B',12);
$pdf->SetXY(44,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ใบงาน' ),1,1,'C',true);

$pdf->SetFont('THSarabun','B',12);
$pdf->SetXY(60,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , '100%' ),1,1,'C',true);

$pdf->SetFont('THSarabun','B',12);
$pdf->SetXY(72,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , '87%' ),1,1,'C',true);

$pdf->SetFont('THSarabun','B',10);
$pdf->SetXY(85,$StartP2headerBaseLineY-7);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(14,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //ค่าตอบแทน หน.ฯ(10%)
$pdf->Text( 86 , $StartP2headerBaseLineY-2 ,  iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' ));
$pdf->Text( 86 , $StartP2headerBaseLineY+1 ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์' ));
$pdf->Text( 88 , $StartP2headerBaseLineY+4 ,  iconv( 'UTF-8','cp874' , '(10%)' ));





/*$pdf->SetFont('THSarabun','B',9);
$pdf->SetXY(99,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'อ.วรางค์ลักษณ์' ),1,1,'C',true);

$pdf->SetFont('THSarabun','B',9);
$pdf->SetXY(114,$StartP2headerBaseLineY);
$pdf->SetFillColor(206, 213, 222);
$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'อ.วรางค์ลักษณ์' ),1,1,'C',true);*/





/*
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
$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , ' 87 %' ),1,1,'C',true);*/


$pdf->SetFont('THSarabun','',12);







$month_th="กรกฏาคม";
$customer_env=38;

$jobListsENV[0]=array("work_code"=>"ENV368/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0533","department"=>"บริษัท การบินกรุงเทพ จำกัด (มหาชน)","sub_category"=>"water","total"=>10110.00,"income_cecentre"=>8795.70,"boss_dispense"=>879.57,"engineer_nu_net"=>"wilawank","engineer_dispense"=>1759.14);
$jobListsENV[1]=array("work_code"=>"ENV363/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0534","department"=>"บริษัท เซ็นทรัลเวิลด์ จำกัด","sub_category"=>"water","total"=>6220.00,"income_cecentre"=>5411.40,"boss_dispense"=>541.14,"engineer_nu_net"=>"ampolt","engineer_dispense"=>1082.28);
$jobListsENV[2]=array("work_code"=>"CE 92/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0532","department"=>"บริษัท เก้าทัพวิศวกรรม จำกัด","sub_category"=>"concrete","total"=>360.00,"income_cecentre"=>313.20,"boss_dispense"=>31.32,"engineer_nu_net"=>"jeerapongl","engineer_dispense"=>62.64,"technician_nu_net"=>"apicharts","technician_dispense"=>46.98,"office_dispense"=>15.66);
//$jobListsENV[99]=array("work_code"=>"CE 100/2566","ref_date_th"=>"04/07/2566","ref_doc"=>"307/0532","department"=>"บริษัท เก้าทัพวิศวกรรม จำกัด","sub_category"=>"concrete","total"=>360.00,"income_cecentre"=>313.20,"boss_dispense"=>31.32,"engineer_nu_net"=>"jeerapongl","engineer_dispense"=>62.64,"technician_nu_net"=>"apicharts","technician_dispense"=>46.98,"office_dispense"=>15.66);




for ($i=3; $i<154; $i++) {
	$jobListsENV[$i]=$jobListsENV[1];
}


$posXRow_list=28; // fix start datarow

$sum_water =0;
$sum_soil_fertilizer_gabage =0;
$sum_other_env =0;
$sum_total = 0;
$sum_income_cecentre= 0;
$sum_boss_dispense=0;

settype($sum_water,"float");
settype($sum_soil_fertilizer_gabage,"float");
settype($sum_other_env,"float");
settype($sum_total,"float");
settype($sum_income_cecentre,"float");
settype($sum_boss_dispense,"float");


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
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $value["ref_date_th"] ),1,1,'C',false);


	$pdf->SetXY(29,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $value["ref_doc"]  ),1,1,'C',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(44,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , $value["work_code"] ),1,1,'L',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(60,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["total"],2) ),1,1,'R',false);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(72,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($value["income_cecentre"],2) ),1,1,'R',false);


	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(85,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($value["boss_dispense"],2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)

	foreach($dataEngineer as $keySq=>$item){
		//echo "The index is = " . $key . ", and value is = " . $value;
		$engPos=$posXColHeader[$keySq];
		$pdf->SetXY($engPos,$posXRow_list);
		//$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , $value["engineer_nu_net"] ),1,1,'R',true);

		if($item['blank']=="yes"){
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
		}else{
			$pdf->SetFillColor(255, 255, 255);

			if($value["engineer_nu_net"]==$item["nu_net"]){
				$pdf->SetFont('THSarabun','',9);
				$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["engineer_dispense"],2) ),1,1,'C',false); //วิศวกรคนที่ตรวจสอบผล
				
				$currency_eng=$value["engineer_dispense"];
				settype($currency_eng,"float");
				$oldSum =$sumEngineer[$keySq];

				$sumEngineer[$keySq] =$oldSum+$currency_eng;

			}else{
				$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);
			}
		}

	}


	/*
	$pdf->SetFont('THSarabun','',12);
	$pdf->SetXY(118,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(18,$hightRow,iconv( 'UTF-8','cp874' , $value["work_code"] ),1,1,'C',true);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(136,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="water")?number_format($value["total"],2):"" ),1,1,'R',true);


	$pdf->SetXY(148,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="soil_fertilizer_gabage")?number_format($value["total"],2):"" ),1,1,'R',true);


	$pdf->SetXY(164,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , ($value["sub_category"]=="other_env")?number_format($value["total"],2):"" ),1,1,'R',true);

	$pdf->SetFont('THSarabun','',10);
	$pdf->SetXY(176,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["total"],2) ),1,1,'R',true);

	$pdf->SetFont('THSarabun','B',7);
	$pdf->SetXY(198,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(7.5,$hightRow,iconv( 'UTF-8','cp874' , number_format($value["income_cecentre"],2) ),1,1,'C',true);*/





	$currency_total=$value["total"];
	settype($currency_total,"float");
	$sum_total +=$currency_total;

	$currency_income_cecentre=$value["income_cecentre"];
	settype($currency_income_cecentre,"float");
	$sum_income_cecentre +=$currency_income_cecentre;

	$currency_boss_dispense=$value["boss_dispense"];
	settype($currency_boss_dispense,"float");
	$sum_boss_dispense +=$currency_boss_dispense;



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
	$pdf->Cell(54,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);

	//sum (100%)
	$pdf->SetFont('THSarabun','B',9);
	$pdf->SetXY(60,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'C',true);

	//sum (87%)
	$pdf->SetFont('THSarabun','B',9);
	$pdf->SetXY(72,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);

	//sum ค่าตอบแทน หน.ฯ(10%)
	$pdf->SetFont('THSarabun','B',9);
	$pdf->SetXY(85,$posXRow_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_boss_dispense,2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)


	foreach($dataEngineer as $keySq=>$item){
		//echo "The index is = " . $key . ", and value is = " . $value;
		$engPos=$posXColHeader[$keySq];
		$pdf->SetXY($engPos,$posXRow_list);

		if($item['blank']=="yes"){
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
		}else{
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetFont('THSarabun','B',8);
			$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($sumEngineer[$keySq],2) ),1,1,'C',false); //ยอดรวมของ วิศวกรคนที่ตรวจสอบผล
		}

	}



	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;

	//sum ทุกหมวด




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
	/*
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Text( 6 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
	$pdf->Text( 80 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));

	//ขึ้นบรรทัดใหม่
	$posXRow_list +=$hightRow;

	$pdf->Text( 6 , $posXRow_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));*/

}else if(count($jobListsENV)>=47 & count($jobListsENV)<= 49){

	$pdf->AddPage("P",'A4');
	//แสดงข้อมูลสรุป
	// เพิ่มหัวตาราง
			
	$posXRowP2_list=28; // fix start datarow //แสดงข้อมูลต่อ

	$pdf->SetXY(60,$startP2BaseLineY-1);
	$pdf->SetFont('THSarabun','B',12);
	$pdf->Cell(25,$hightRow+3,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',false); //จำนวนเงิน
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetXY(99,10);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(106.5,6,iconv( 'UTF-8','cp874' , 'ค่าตอบแทนวิศวกรตรวจสอบผล (20%)' ),1,1,'C',false);


	foreach($dataEngineer as $key=>$value){
		//echo "The index is = " . $key . ", and value is = " . $value;
		$engPos=$posXColHeader[$key];
		$pdf->SetXY($engPos,$startP2BaseLineY-1);
		
		if($value['blank']=="yes"){
			$pdf->SetFillColor(206, 213, 222);
		}else{
			$pdf->SetFillColor(255, 255, 255);
		}
	
		$pdf->SetFont('THSarabun','B',12);
		$pdf->Cell(($key==count($dataEngineer)-1)?7.5:9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ $key
		
		if($value['blank']=="no"){
			$pdf->SetFont('THSarabun','B',$value['font_size']);
			$pdf->RotatedText($engPos+$value['preset_x'],$startP2BaseLineY+$value['preset_y'],$value['name'] ,($key==count($dataEngineer)-1)?90:$value['rotage']);
		}
	
	}
	
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(6,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);
	
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(14,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);
	
	$pdf->SetXY(29,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetXY(44,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ใบงาน' ),1,1,'C',true);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetXY(60,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , '100%' ),1,1,'C',true);
	
	$pdf->SetFont('THSarabun','B',12);
	$pdf->SetXY(72,$StartP2headerBaseLineY);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , '87%' ),1,1,'C',true);
	
	$pdf->SetFont('THSarabun','B',10);
	$pdf->SetXY(85,$StartP2headerBaseLineY-7);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(14,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //ค่าตอบแทน หน.ฯ(10%)
	$pdf->Text( 86 , $StartP2headerBaseLineY-2 ,  iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' ));
	$pdf->Text( 86 , $StartP2headerBaseLineY+1 ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์' ));
	$pdf->Text( 88 , $StartP2headerBaseLineY+4 ,  iconv( 'UTF-8','cp874' , '(10%)' ));


	// ส่วนสรุปผล
	//รวม
	/*$pdf->SetXY(6,$posXRowP2_list);
	$pdf->SetFillColor(206, 213, 222);
	$pdf->Cell(54,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);*/

	//sum (100%)
	$pdf->SetFont('THSarabun','B',9);
	$pdf->SetXY(60,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'C',true);

	//sum (87%)
	$pdf->SetFont('THSarabun','B',9);
	$pdf->SetXY(72,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);

	//sum ค่าตอบแทน หน.ฯ(10%)
	$pdf->SetFont('THSarabun','B',9);
	$pdf->SetXY(85,$posXRowP2_list);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_boss_dispense,2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)


	foreach($dataEngineer as $keySq=>$item){
		//echo "The index is = " . $key . ", and value is = " . $value;
		$engPos=$posXColHeader[$keySq];
		$pdf->SetXY($engPos,$posXRowP2_list);

		if($item['blank']=="yes"){
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
		}else{
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetFont('THSarabun','B',8);
			$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($sumEngineer[$keySq],2) ),1,1,'C',false); //ยอดรวมของ วิศวกรคนที่ตรวจสอบผล
		}

	}



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

	/*
	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;


	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน " ));
	$pdf->Text( 80 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));

	//ขึ้นบรรทัดใหม่
	$posXRowP2_list +=$hightRow;

	$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน " ));
	*/


	// สรุป

}else if(count($jobListsENV)>=50 & count($jobListsENV)<= 170){
	//แสดงตารางถึงรายการที่ 49 หลังจากนั้นขึ้นหน้าใหม่


	if(($posXRow_list>268) &($numberEnv>49)){

		$pdf->AddPage("P",'A4');
		
		$pdf->SetXY(60,$startP2BaseLineY-1);
		$pdf->SetFont('THSarabun','B',12);
		$pdf->Cell(25,$hightRow+3,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',false); //จำนวนเงิน
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetXY(99,10);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell(106.5,6,iconv( 'UTF-8','cp874' , 'ค่าตอบแทนวิศวกรตรวจสอบผล (20%)' ),1,1,'C',false);
	
	
		foreach($dataEngineer as $key=>$value){
			//echo "The index is = " . $key . ", and value is = " . $value;
			$engPos=$posXColHeader[$key];
			$pdf->SetXY($engPos,$startP2BaseLineY-1);
			
			if($value['blank']=="yes"){
				$pdf->SetFillColor(206, 213, 222);
			}else{
				$pdf->SetFillColor(255, 255, 255);
			}
		
			$pdf->SetFont('THSarabun','B',12);
			$pdf->Cell(($key==count($dataEngineer)-1)?7.5:9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ $key
			
			if($value['blank']=="no"){
				$pdf->SetFont('THSarabun','B',$value['font_size']);
				$pdf->RotatedText($engPos+$value['preset_x'],$startP2BaseLineY+$value['preset_y'],$value['name'] ,($key==count($dataEngineer)-1)?90:$value['rotage']);
			}
		
		}
		
		$pdf->SetFont('THSarabun','B',10);
		$pdf->SetXY(6,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);
		
		$pdf->SetFont('THSarabun','B',10);
		$pdf->SetXY(14,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);
		
		$pdf->SetXY(29,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetXY(44,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ใบงาน' ),1,1,'C',true);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetXY(60,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , '100%' ),1,1,'C',true);
		
		$pdf->SetFont('THSarabun','B',12);
		$pdf->SetXY(72,$StartP2headerBaseLineY);
		$pdf->SetFillColor(206, 213, 222);
		$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , '87%' ),1,1,'C',true);
		
		$pdf->SetFont('THSarabun','B',10);
		$pdf->SetXY(85,$StartP2headerBaseLineY-7);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->Cell(14,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //ค่าตอบแทน หน.ฯ(10%)
		$pdf->Text( 86 , $StartP2headerBaseLineY-2 ,  iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' ));
		$pdf->Text( 86 , $StartP2headerBaseLineY+1 ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์' ));
		$pdf->Text( 88 , $StartP2headerBaseLineY+4 ,  iconv( 'UTF-8','cp874' , '(10%)' ));


		//แสดงข้อมูลต่อ
		$posXRowP2_list=28; // fix start datarow






		//วน loop เริ่มจาก index ที่ 49
		for ($i=49; $i<count($jobListsENV); $i++) {
			

			$pdf->SetFont('THSarabun','',12);
			$pdf->SetXY(6,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , $numberEnv ),1,1,'C',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(14,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_date_th"] ),1,1,'C',false);
		
		
			$pdf->SetXY(29,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_doc"]  ),1,1,'C',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(44,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["work_code"] ),1,1,'L',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(60,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(72,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
		
		
			$pdf->SetFont('THSarabun','',10);
			$pdf->SetXY(85,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["boss_dispense"],2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)
		
			foreach($dataEngineer as $keySq=>$item){
				//echo "The index is = " . $key . ", and value is = " . $value;
				$engPos=$posXColHeader[$keySq];
				$pdf->SetXY($engPos,$posXRowP2_list);
				//$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , $value["engineer_nu_net"] ),1,1,'R',true);
		
				if($item['blank']=="yes"){
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
				}else{
					$pdf->SetFillColor(255, 255, 255);
		
					if($jobListsENV[$i]["engineer_nu_net"]==$item["nu_net"]){
						$pdf->SetFont('THSarabun','',9);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["engineer_dispense"],2) ),1,1,'C',false); //วิศวกรคนที่ตรวจสอบผล
						
						$currency_eng=$jobListsENV[$i]["engineer_dispense"];
						settype($currency_eng,"float");
						$oldSum =$sumEngineer[$keySq];
		
						$sumEngineer[$keySq] =$oldSum+$currency_eng;
		
					}else{
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);
					}
				}
		
			}
		
		
			$currency_total=$jobListsENV[$i]["total"];
			settype($currency_total,"float");
			$sum_total +=$currency_total;
		
			$currency_income_cecentre=$jobListsENV[$i]["income_cecentre"];
			settype($currency_income_cecentre,"float");
			$sum_income_cecentre +=$currency_income_cecentre;
		
			$currency_boss_dispense=$jobListsENV[$i]["boss_dispense"];
			settype($currency_boss_dispense,"float");
			$sum_boss_dispense +=$currency_boss_dispense;
		
		
			$posXRowP2_list +=$hightRow;
			$numberEnv++;
		
			if($numberEnv>98){
				break;
			}

		}//end for

		
		if(count($jobListsENV)<=96  ){ //

			//summary
			// ส่วนสรุปผล ในหน้านั้นเลย

			$pdf->SetXY(6,$posXRowP2_list);
			$pdf->SetFillColor(206, 213, 222);
			$pdf->Cell(54,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);
		
			//sum (100%)
			$pdf->SetFont('THSarabun','B',9);
			$pdf->SetXY(60,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'C',true);
		
			//sum (87%)
			$pdf->SetFont('THSarabun','B',9);
			$pdf->SetXY(72,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);
		
			//sum ค่าตอบแทน หน.ฯ(10%)
			$pdf->SetFont('THSarabun','B',9);
			$pdf->SetXY(85,$posXRowP2_list);
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_boss_dispense,2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)
		
		
			foreach($dataEngineer as $keySq=>$item){
				//echo "The index is = " . $key . ", and value is = " . $value;
				$engPos=$posXColHeader[$keySq];
				$pdf->SetXY($engPos,$posXRowP2_list);
		
				if($item['blank']=="yes"){
					$pdf->SetFillColor(206, 213, 222);
					$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
				}else{
					$pdf->SetFillColor(255, 255, 255);
					$pdf->SetFont('THSarabun','B',8);
					$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($sumEngineer[$keySq],2) ),1,1,'C',false); //ยอดรวมของ วิศวกรคนที่ตรวจสอบผล
				}
		
			}


			//ขึ้นบรรทัดใหม่
			//$posXRowP2_list +=$hightRow;
			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=7.5;
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
			/*$posXRowP2_list +=$hightRow;


			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;

			$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน " ));
			$pdf->Text( 80 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));

			//ขึ้นบรรทัดใหม่
			$posXRowP2_list +=$hightRow;

			$pdf->Text( 6 , $posXRowP2_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน " )); */

		}

		if(($numberEnv>97)&(count($jobListsENV)<=160)){
			// ขึ้นหน้าไปเพื่อไป แสดงผล หรือสรุปผลให้จบอย่างเดียว
			$pdf->AddPage("P",'A4');
			//summary only
			$posXRowP4_list=28; // fix start datarow //แสดงข้อมูลต่อ

			if(count($jobListsENV)>97){
				// เพิ่มหัวตาราง
				$pdf->SetXY(60,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(25,$hightRow+3,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(99,10);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(106.5,6,iconv( 'UTF-8','cp874' , 'ค่าตอบแทนวิศวกรตรวจสอบผล (20%)' ),1,1,'C',false);

				foreach($dataEngineer as $key=>$value){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$key];
					$pdf->SetXY($engPos,$startP2BaseLineY-1);
					
					if($value['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
					}else{
						$pdf->SetFillColor(255, 255, 255);
					}
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Cell(($key==count($dataEngineer)-1)?7.5:9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ $key
					
					if($value['blank']=="no"){
						$pdf->SetFont('THSarabun','B',$value['font_size']);
						$pdf->RotatedText($engPos+$value['preset_x'],$startP2BaseLineY+$value['preset_y'],$value['name'] ,($key==count($dataEngineer)-1)?90:$value['rotage']);
					}
				
				}

				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(6,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(14,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);

				$pdf->SetXY(29,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(44,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ใบงาน' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(60,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , '100%' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(72,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , '87%' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(85,$StartP2headerBaseLineY-7);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //ค่าตอบแทน หน.ฯ(10%)
				$pdf->Text( 86 , $StartP2headerBaseLineY-2 ,  iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' ));
				$pdf->Text( 86 , $StartP2headerBaseLineY+1 ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์' ));
				$pdf->Text( 88 , $StartP2headerBaseLineY+4 ,  iconv( 'UTF-8','cp874' , '(10%)' ));


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
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_date_th"] ),1,1,'C',false);
			
			
				$pdf->SetXY(29,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_doc"]  ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(44,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["work_code"] ),1,1,'L',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(60,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(72,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
			
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(85,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["boss_dispense"],2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)
			
				foreach($dataEngineer as $keySq=>$item){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$keySq];
					$pdf->SetXY($engPos,$posXRowP4_list);
					//$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , $value["engineer_nu_net"] ),1,1,'R',true);
			
					if($item['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
					}else{
						$pdf->SetFillColor(255, 255, 255);
			
						if($jobListsENV[$i]["engineer_nu_net"]==$item["nu_net"]){
							$pdf->SetFont('THSarabun','',9);
							$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["engineer_dispense"],2) ),1,1,'C',false); //วิศวกรคนที่ตรวจสอบผล
							
							$currency_eng=$jobListsENV[$i]["engineer_dispense"];
							settype($currency_eng,"float");
							$oldSum =$sumEngineer[$keySq];
			
							$sumEngineer[$keySq] =$oldSum+$currency_eng;
			
						}else{
							$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);
						}
					}
			
				}
			
			
				$currency_total=$jobListsENV[$i]["total"];
				settype($currency_total,"float");
				$sum_total +=$currency_total;
			
				$currency_income_cecentre=$jobListsENV[$i]["income_cecentre"];
				settype($currency_income_cecentre,"float");
				$sum_income_cecentre +=$currency_income_cecentre;
			
				$currency_boss_dispense=$jobListsENV[$i]["boss_dispense"];
				settype($currency_boss_dispense,"float");
				$sum_boss_dispense +=$currency_boss_dispense;
		
			
				$posXRowP4_list +=$hightRow;
				$numberEnv++;
			
				if($numberEnv>147){
					break;
				}
				
			}


			if(count($jobListsENV)<=145){
				//สรุปผลในหน้านั้น
				// สรุปผล
				$pdf->SetXY(60,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(25,$hightRow+3,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',false); //จำนวนเงิน
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(99,10);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(106.5,6,iconv( 'UTF-8','cp874' , 'ค่าตอบแทนวิศวกรตรวจสอบผล (20%)' ),1,1,'C',false);
			
			
				foreach($dataEngineer as $key=>$value){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$key];
					$pdf->SetXY($engPos,$startP2BaseLineY-1);
					
					if($value['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
					}else{
						$pdf->SetFillColor(255, 255, 255);
					}
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Cell(($key==count($dataEngineer)-1)?7.5:9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ $key
					
					if($value['blank']=="no"){
						$pdf->SetFont('THSarabun','B',$value['font_size']);
						$pdf->RotatedText($engPos+$value['preset_x'],$startP2BaseLineY+$value['preset_y'],$value['name'] ,($key==count($dataEngineer)-1)?90:$value['rotage']);
					}
				
				}
				
				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(6,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);
				
				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(14,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);
				
				$pdf->SetXY(29,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(44,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ใบงาน' ),1,1,'C',true);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(60,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , '100%' ),1,1,'C',true);
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(72,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , '87%' ),1,1,'C',true);
				
				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(85,$StartP2headerBaseLineY-7);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //ค่าตอบแทน หน.ฯ(10%)
				$pdf->Text( 86 , $StartP2headerBaseLineY-2 ,  iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' ));
				$pdf->Text( 86 , $StartP2headerBaseLineY+1 ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์' ));
				$pdf->Text( 88 , $StartP2headerBaseLineY+4 ,  iconv( 'UTF-8','cp874' , '(10%)' ));
			
					
							
				// ส่วนสรุปผล
				//รวม
				$pdf->SetXY(6,$posXRowP4_list);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(54,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);
			
				//sum (100%)
				$pdf->SetFont('THSarabun','B',9);
				$pdf->SetXY(60,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'C',true);
			
				//sum (87%)
				$pdf->SetFont('THSarabun','B',9);
				$pdf->SetXY(72,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);
			
				//sum ค่าตอบแทน หน.ฯ(10%)
				$pdf->SetFont('THSarabun','B',9);
				$pdf->SetXY(85,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_boss_dispense,2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)
			
			
				foreach($dataEngineer as $keySq=>$item){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$keySq];
					$pdf->SetXY($engPos,$posXRowP4_list);
			
					if($item['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
					}else{
						$pdf->SetFillColor(255, 255, 255);
						$pdf->SetFont('THSarabun','B',8);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($sumEngineer[$keySq],2) ),1,1,'C',false); //ยอดรวมของ วิศวกรคนที่ตรวจสอบผล
					}
			
				}
			
				//ขึ้นบรรทัดใหม่
				$posXRowP4_list +=$hightRow+2;

				$pdf->SetFont('THSarabun','',12);
				$pdf->SetXY(6,$posXRowP4_list);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);
			
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(26,$posXRowP4_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);
			
			
				//ขึ้นบรรทัดใหม่
				/*$posXRowP4_list +=$hightRow;
			
			
				//ขึ้นบรรทัดใหม่
				$posXRowP4_list +=$hightRow;
			
				$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
				$pdf->Text( 80 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));
			
				//ขึ้นบรรทัดใหม่
				$posXRowP4_list +=$hightRow;
			
				$pdf->Text( 6 , $posXRowP4_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));*/
				// สรุปผล
			}

		}

		if(($numberEnv>146)&(count($jobListsENV)<=160)){
			$pdf->AddPage("P",'A4');
			//summary only
			$posXRowP5_list=28; // fix start datarow //แสดงข้อมูลต่อ

			if(count($jobListsENV)>145){
				// เพิ่มหัวตาราง
				$pdf->SetXY(60,$startP2BaseLineY-1);
				$pdf->SetFont('THSarabun','B',12);
				$pdf->Cell(25,$hightRow+3,iconv( 'UTF-8','cp874' , 'จำนวนเงิน' ),1,1,'C',true); //จำนวนเงิน
				
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(99,10);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(106.5,6,iconv( 'UTF-8','cp874' , 'ค่าตอบแทนวิศวกรตรวจสอบผล (20%)' ),1,1,'C',false);

				foreach($dataEngineer as $key=>$value){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$key];
					$pdf->SetXY($engPos,$startP2BaseLineY-1);
					
					if($value['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
					}else{
						$pdf->SetFillColor(255, 255, 255);
					}
				
					$pdf->SetFont('THSarabun','B',12);
					$pdf->Cell(($key==count($dataEngineer)-1)?7.5:9,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //วิศวกรคนที่ $key
					
					if($value['blank']=="no"){
						$pdf->SetFont('THSarabun','B',$value['font_size']);
						$pdf->RotatedText($engPos+$value['preset_x'],$startP2BaseLineY+$value['preset_y'],$value['name'] ,($key==count($dataEngineer)-1)?90:$value['rotage']);
					}
				
				}

				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(6,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(8,$hightRow,iconv( 'UTF-8','cp874' , 'ลำดับ' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(14,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'วัน/เดือน/ปี' ),1,1,'C',true);

				$pdf->SetXY(29,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , 'เอกสารอ้างอิง' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(44,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , 'ใบงาน' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(60,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , '100%' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(72,$StartP2headerBaseLineY);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , '87%' ),1,1,'C',true);

				$pdf->SetFont('THSarabun','B',10);
				$pdf->SetXY(85,$StartP2headerBaseLineY-7);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,12,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true); //ค่าตอบแทน หน.ฯ(10%)
				$pdf->Text( 86 , $StartP2headerBaseLineY-2 ,  iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' ));
				$pdf->Text( 86 , $StartP2headerBaseLineY+1 ,  iconv( 'UTF-8','cp874' , 'หัวหน้าศูนย์' ));
				$pdf->Text( 88 , $StartP2headerBaseLineY+4 ,  iconv( 'UTF-8','cp874' , '(10%)' ));
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
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_date_th"] ),1,1,'C',false);
			
			
				$pdf->SetXY(29,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(15,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["ref_doc"]  ),1,1,'C',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(44,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(16,$hightRow,iconv( 'UTF-8','cp874' , $jobListsENV[$i]["work_code"] ),1,1,'L',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(60,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($jobListsENV[$i]["total"],2) ),1,1,'R',false);
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(72,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["income_cecentre"],2) ),1,1,'R',false);
			
			
				$pdf->SetFont('THSarabun','',10);
				$pdf->SetXY(85,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["boss_dispense"],2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)
			
				foreach($dataEngineer as $keySq=>$item){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$keySq];
					$pdf->SetXY($engPos,$posXRowP5_list);
					//$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , $value["engineer_nu_net"] ),1,1,'R',true);
			
					if($item['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
					}else{
						$pdf->SetFillColor(255, 255, 255);
			
						if($jobListsENV[$i]["engineer_nu_net"]==$item["nu_net"]){
							$pdf->SetFont('THSarabun','',9);
							$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($jobListsENV[$i]["engineer_dispense"],2) ),1,1,'C',false); //วิศวกรคนที่ตรวจสอบผล
							
							$currency_eng=$jobListsENV[$i]["engineer_dispense"];
							settype($currency_eng,"float");
							$oldSum =$sumEngineer[$keySq];
			
							$sumEngineer[$keySq] =$oldSum+$currency_eng;
			
						}else{
							$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',false);
						}
					}
			
				}
			
			
				$currency_total=$jobListsENV[$i]["total"];
				settype($currency_total,"float");
				$sum_total +=$currency_total;
			
				$currency_income_cecentre=$jobListsENV[$i]["income_cecentre"];
				settype($currency_income_cecentre,"float");
				$sum_income_cecentre +=$currency_income_cecentre;
			
				$currency_boss_dispense=$jobListsENV[$i]["boss_dispense"];
				settype($currency_boss_dispense,"float");
				$sum_boss_dispense +=$currency_boss_dispense;

			
			
				$posXRowP5_list +=$hightRow;
				$numberEnv++;
			
				if($numberEnv>160){
					break;
				}


				
			}

			
			if(count($jobListsENV)>145){
				// สรุปผล

				$pdf->SetXY(6,$posXRowP5_list);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(54,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'C',true);
			
				//sum (100%)
				$pdf->SetFont('THSarabun','B',9);
				$pdf->SetXY(60,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(12,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_total,2) ),1,1,'C',true);
			
				//sum (87%)
				$pdf->SetFont('THSarabun','B',9);
				$pdf->SetXY(72,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(13,$hightRow,iconv( 'UTF-8','cp874' , number_format($sum_income_cecentre,2) ),1,1,'C',true);
			
				//sum ค่าตอบแทน หน.ฯ(10%)
				$pdf->SetFont('THSarabun','B',9);
				$pdf->SetXY(85,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(14,$hightRow,iconv( 'UTF-8','cp874' ,  number_format($sum_boss_dispense,2) ),1,1,'R',false); //ค่าตอบแทน หน.ฯ(10%)
			
			
				foreach($dataEngineer as $keySq=>$item){
					//echo "The index is = " . $key . ", and value is = " . $value;
					$engPos=$posXColHeader[$keySq];
					$pdf->SetXY($engPos,$posXRowP5_list);
			
					if($item['blank']=="yes"){
						$pdf->SetFillColor(206, 213, 222);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , '' ),1,1,'R',true);
					}else{
						$pdf->SetFillColor(255, 255, 255);
						$pdf->SetFont('THSarabun','B',8);
						$pdf->Cell(($keySq==count($dataEngineer)-1)?7.5:9,$hightRow,iconv( 'UTF-8','cp874' , number_format($sumEngineer[$keySq],2) ),1,1,'C',false); //ยอดรวมของ วิศวกรคนที่ตรวจสอบผล
					}
			
				}
			
				//ขึ้นบรรทัดใหม่
				$posXRowP5_list +=$hightRow+2;
				//แถวสุดท้ายที่สามารถแสดงได้ คือตำแหน่งที่ 268 // เต็มที่คือแสดงได้แค่ ไม่เกิน 46 รายการ (กรณีที่มี summary text ท้ายกระดาษ) หากมากกว่านั้น ต้องตัดไปหน้าใหม่ในรายการที่ 50 (หน้าแรกไม่เกิน 49)
			
				$pdf->SetFont('THSarabun','',12);
				$pdf->SetXY(6,$posXRowP5_list);
				$pdf->SetFillColor(206, 213, 222);
				$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , 'เดือน' ),1,1,'C',true);
			
				$pdf->SetFont('THSarabun','B',12);
				$pdf->SetXY(26,$posXRowP5_list);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->Cell(20,$hightRow,iconv( 'UTF-8','cp874' , $month_th ),1,1,'C',true);
			}

		
		
			//ขึ้นบรรทัดใหม่
			/*$posXRowP5_list +=$hightRow;
		
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
		
			$pdf->Text( 6 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'จำนวนใบงานสาขาวิศวกรรมสิ่งแวดล้อม '.count($jobListsENV)." ใบงาน "));
			$pdf->Text( 80 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'รายรับสาขาวิศวกรรมสิ่งแวดล้อม '.number_format($sum_water+$sum_soil_fertilizer_gabage+$sum_other_env,2)." บาท" ));
		
			//ขึ้นบรรทัดใหม่
			$posXRowP5_list +=$hightRow;
		
			$pdf->Text( 6 , $posXRowP5_list ,  iconv( 'UTF-8','cp874' , 'จำนวนลูกค้าที่มารับบริการ สาขาวิศวกรรมสิ่งแวดล้อม '.$customer_env." หน่วยงาน "));*/
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