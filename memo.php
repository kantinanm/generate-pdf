<?php

require_once 'vendor/autoload.php';
use Fpdf\Fpdf;

$pdf = new FPDF();

$phone = thainumDigit("4315"); //Convert Arabic to thai
$number = thainumDigit("0603.09.04");
$create_date = thainumDigit("18 กรกฎาคม 2565");
$type = "รถตู้";
$detail = "เนื่องด้วย ภาควิชาวิศวกรรมโยธา จะดำเนินการจัดโครงการศึกษาดูงาน สำหรับนิสิตที่ลงทะเบียนรายวิชา";
$detail .= " 304493 Selected Topic in Civil Engineering วันที่ 20 กรกฎาคม 2565 ณ โรงงาน CPL";
$detail .= "แยกต้นหว้า เพื่อให้การเรียนการสอนรายวิชาดังกล่าว บรรลุวัตถุประสงค์ในการสร้างบัณฑิตให้มีความรู้";
$detail .= " ทั้งทางด้านวิชาการสามารถประยุกต์ความรู้กับการทำงาน";
thainumDigit($detail);

$booking_number = thainumDigit("ENGV0012565");
$location = "โรงงาน CPL แยกต้นหว้า จังหวัด พิษณุโลก";
$start_date = thainumDigit("20 กรกฎาคม 2565");
$start_time = thainumDigit("12:30");
$end_date = thainumDigit("20 กรกฎาคม 2565");
$end_time = thainumDigit("16:30");
$name = "นางสาวลูกน้ำ มากลิ่น";

$pdf->AddFont('THSarabun','','THSarabun.php');
$pdf->AddFont('THSarabun','B','THSarabun Bold.php');
$pdf->AddFont('THSarabun','I','THSarabun Italic.php');
$pdf->AddFont('THSarabun','BI','THSarabun Bold Italic.php');

$pdf->AddPage('P','A4');

$pdf->Image('https://matzeeya.github.io/engnucarbooking/public/images/logo.jpg',24,12,15,15,'jpg');
$pdf->SetFont('THSarabun','B',26);
$pdf->SetXY(20,8);
$pdf->Cell(170,24,iconv( 'UTF-8','cp874' , 'บันทึกข้อความ' ),0,1,'C',false);

$pdf->SetFont('THSarabun','B',16);
$pdf->Text( 26 , 40 ,  iconv( 'UTF-8','cp874' , 'ส่วนราชการ ' ));
$pdf->Text( 142 , 40 ,  iconv( 'UTF-8','cp874' , 'โทร. ' ));
$pdf->Text( 26 , 48 ,  iconv( 'UTF-8','cp874' , 'ที่ ' ));
$pdf->Text( 100 , 48 ,  iconv( 'UTF-8','cp874' , 'วันที่ ' ));
$pdf->Text( 26 , 56 ,  iconv( 'UTF-8','cp874' , 'เรื่อง ' ));
$pdf->Text( 26 , 68 ,  iconv( 'UTF-8','cp874' , 'เรียน ' ));

$pdf->SetFont('THSarabun','',16);
$pdf->Text( 46 , 40 ,  iconv( 'UTF-8','cp874' , 'คณะวิศวกรรมศาสตร์ ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ ' ));
$pdf->Text( 150 , 40 ,  iconv( 'UTF-8','cp874' , $phone ));
$pdf->Text( 30 , 48 ,  iconv( 'UTF-8','cp874' , 'อว  '.$number ));
$pdf->Text( 110 , 48 ,  iconv( 'UTF-8','cp874' , $create_date ));
$pdf->Text( 36 , 56 ,  iconv( 'UTF-8','cp874' , 'ขออนุมัติใช้'.$type.' พร้อมพนักงานขับรถ' ));

$pdf->Text( 36 , 68 ,  iconv( 'UTF-8','cp874' , 'คณบดีคณะวิศวกรรมศาสตร์' ));
$pdf->SetXY(25,70);
$pdf->MultiCell( 158 , 7 ,  iconv( 'UTF-8','cp874' , '                    '. $detail ),0,'L');
$pdf->Text( 50 , 103 ,  iconv( 'UTF-8','cp874' , 'ในการนี้ ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์ คณะวิศวกรรมศาสตร์ ได้ขออนุมัติใช้รถ' ));
$pdf->Text( 26 , 110 ,  iconv( 'UTF-8','cp874' , 'พร้อมพนักงานขับรถ จำนวน 1 คัน รหัสการจอง '.$booking_number.' ในวันที่ 20 กรกฏาคม 2565' ));
$pdf->Text( 26 , 117 ,  iconv( 'UTF-8','cp874' , 'โดยมีรายละเอียดดังนี้' ));

$pdf->SetXY(26,125);
$pdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'สถานที่ไป: ' ),1,1,'L',false);
$pdf->SetXY(62,125);
$pdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$location ),1,1,'L',false);
$pdf->SetXY(26,133);
$pdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'เวลาที่เดินทาง: ' ),1,1,'L',false);
$pdf->SetXY(62,133);
$pdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$start_date.' เวลา '.$start_time.' น.' ),1,1,'L',false);
$pdf->SetXY(26,141);
$pdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'เวลาเดินทางกลับ: ' ),1,1,'L',false);
$pdf->SetXY(62,141);
$pdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$end_date.' เวลา '.$end_time.' น.' ),1,1,'L',false);
$pdf->SetXY(26,149);
$pdf->Cell(36,8,iconv( 'UTF-8','cp874' , 'รถที่ขอใช้: ' ),1,1,'L',false);
$pdf->SetXY(62,149);
$pdf->Cell(120,8,iconv( 'UTF-8','cp874' , ' '.$type ),1,1,'L',false);

$pdf->Text( 50 , 166 ,  iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ' ));
$pdf->Text( 100 , 203 ,  iconv( 'UTF-8','cp874' , 'ลงชื่อ.....................................ผู้ขอใช้รถ' ));
$pdf->Text( 109 , 212 ,  iconv( 'UTF-8','cp874' , '( '.$name.' )' ));
$pdf->Text( 102 , 236 ,  iconv( 'UTF-8','cp874' , 'ลงชื่อ.....................................ผู้อนุมัติ' ));

$pdf->Output();

 //function convert Arabic to thai
function thainumDigit($num){
  return str_replace(
    array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
    array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),$num);
}
?>