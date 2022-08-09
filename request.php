<?php

require_once 'vendor/autoload.php';
use Fpdf\Fpdf;

$pdf = new FPDF();

$create_date = "18 เม.ย. 2556";
$recieve_date=explode(" ", $create_date);
$name = "นางสาวมัทรียา ราชบัวศรี";
$position = "นักวิชาการคอมพิวเตอร์";
$department = "ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์";
$location = "ศูนยฺ์ประชุมนานาชาติ อุทยานสมเด็จพระนเรศวรมหาราช มหาวิทยาลัยนเรศวร";
$title = "รับส่งเจ้าหน้าที่งานพิธีรับพระราชทานปริญญาบัตร";
$travelers = "10";
$start_date = "20 เม.ย. 2556";
$start_time = "05:30";
$end_date = "20 เม.ย. 2556";
$end_time = "09:30";
$type = "รถตู้";

$pdf->AddFont('THSarabun','','THSarabun.php');
$pdf->AddFont('THSarabun','B','THSarabun Bold.php');
$pdf->AddFont('THSarabun','I','THSarabun Italic.php');
$pdf->AddFont('THSarabun','BI','THSarabun Bold Italic.php');

$pdf->AddPage('L','A5');

$pdf->SetFont('THSarabun','B',16);
$pdf->Text( 55 , 20 ,  iconv( 'UTF-8','cp874' , 'ใบขออนุญาตใช้รถส่วนกลาง คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร' ));

//วันเดือนปี
$pdf->SetFont('THSarabun', '',16);
$pdf->Text( 100, 30 , iconv( 'UTF-8','cp874', 'วันที่') );
$pdf->Text( 108, 30, iconv( 'UTF-8', 'cp874', $recieve_date[0]));
$pdf->Line(108,31,116,31);
$pdf->Text( 117, 30, iconv( 'UTF-8','cp874', 'เดือน'));
$pdf->Text( 135, 30, iconv( 'UTF-8', 'cp874', $recieve_date[1]));
$pdf->Line(126,31,149,31);
$pdf->Text( 150, 30, iconv( 'UTF-8','cp874','พ.ศ.'));
$pdf->Text( 158, 30, iconv( 'UTF-8', 'cp874', $recieve_date[2]));
$pdf->Line(158,31,170,31);

//topic
$pdf->Text( 30, 42, iconv( 'UTF-8','cp874', 'เรียน (ผู้มีอำนาจสั่งใช้รถ) หัวหน้าสำนักงานเลขานุการคณะวิศวกรรมศาสตร์'));

// detail
// ชื่อ
$pdf->Text( 46, 53, iconv( 'UTF-8', 'cp874', 'ข้าพเจ้า'));
$pdf->Text( 59, 53, iconv( 'UTF-8', 'cp874', $name));
$pdf->Line(58,54,110,54);

//ตำแหน่ง
$pdf->Text(112, 53, iconv( 'UTF-8', 'cp874', 'ตำแหน่ง'));
$pdf->Text(130, 53, iconv( 'UTF-8', 'cp874', $position));
$pdf->Line(125,54,180,54);

//สังกัด
$pdf->Text(30, 62, iconv('UTF-8', 'cp874', 'สังกัด'));
$pdf->Text(41, 62, iconv( 'UTF-8', 'cp874', $department));
$pdf->Line(40,63,85,63);

//ขออนุญาต
$pdf->Text(86, 62, iconv('UTF-8', 'cp874', 'ขออนุญาตใช้รถ(สถานที่ไป)'));
$pdf->Text(131, 62, iconv( 'UTF-8', 'cp874', $location));
$pdf->Line(130,63,180,63);

//เพื่อ
$pdf->Text(30, 70, iconv('UTF-8', 'cp874', 'เพื่อ'));
$pdf->Text(38,70, iconv('UTF-8', 'cp874', $title));
$pdf->Line(37,71,135,71);

//คนนั่ง
$pdf->Text(138, 70, iconv('UTF-8', 'cp874', 'มีคนนั่ง'));
$pdf->Text(155,70, iconv('UTF-8', 'cp874', $travelers));
$pdf->Line(151,71,164,71);
$pdf->Text(175, 70, iconv('UTF-8', 'cp874', 'คน'));

//วันที่
$pdf->Text(30, 78, iconv('UTF-8', 'cp874', 'ในวันที่'));
$pdf->Text(44,78, iconv('UTF-8', 'cp874', $start_date));
$pdf->Line(43,79,70,79);

$pdf->Text(72, 78, iconv('UTF-8', 'cp874', 'เวลา'));
$pdf->Text(81, 78, iconv('UTF-8', 'cp874', $start_time.' น.'));
$pdf->Line(80,79,102,79);

$pdf->Text(103, 78, iconv('UTF-8', 'cp874', 'ถึงวันที่'));
$pdf->Text(117, 78, iconv('UTF-8', 'cp874', $end_date));
$pdf->Line(116,79,143,79);

$pdf->Text(144, 78, iconv('UTF-8', 'cp874', 'เวลา'));
$pdf->Text(153, 78, iconv('UTF-8', 'cp874', $end_time.' น.'));
$pdf->Line(152,79,180,79);

//หมายเลขทะเบียน
$pdf->Text(30, 87, iconv('UTF-8', 'cp874', 'ประเภทรถที่ต้องการจอง'));
$pdf->Text(70, 87, iconv('UTF-8', 'cp874', $type));
$pdf->Line(69,88,180,88);

//ผู้ขออนุญาต
$pdf->Text(141, 105, iconv('UTF-8', 'cp874', 'ผู้ขออนุญาต'));
$pdf->Text(91, 105, iconv('UTF-8', 'cp874', $name));
$pdf->Line(90,106,139,106);

$pdf->Text(141, 115, iconv('UTF-8', 'cp874', '(วัน เดือน ปี)'));
$pdf->Text(91, 115, iconv('UTF-8', 'cp874', $create_date));
$pdf->Line(90,116,139,116);

$pdf->Output();

?>