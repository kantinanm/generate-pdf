<?php

require_once 'vendor/autoload.php';
use Fpdf\Fpdf;


$pdf = new Fpdf('P', 'mm', 'A5');
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();

// Create dot
class PDF_Dash extends FPDF
{
    function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
}

$fullname="คุณอชิสา  เขียวเซน";
$role="หัวหน้า";
$Affiliation="สังกัดบลาๆๆๆ";
$service_date="18 เม.ย. 2556";
$recieve_date=explode(" ", "18 เม.ย. 2556");
$where="สักที่หนึ่ง";
$forWhat="เพื่อะไรสักอย่างหนึ่ง";
$peopleHow="10";
$startDate="18 เม.ย. 2556";
$timeStartDate="18:00";
$endDate="19 เม.ย. 2556";
$timeEndDate="19:00";
$vehicleRegistrationNumber="กข1234";
$licensee="คุณอชิสา  เขียวเซน";
$dateLicensee="20 เม.ย. 2556";

$pdf=new PDF_Dash();

//$pdf=new FPDF();
// $pdf=new FPDF('P' , 'mm' , 'A3' );
$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$pdf->AddPage('L', array(148,210));

// $pdf->SetFont('angsana','B',20);
// $pdf->SetXY(20,0);
// $pdf->SetFillColor(238,213,210);
// $pdf->Cell(170,10,iconv( 'UTF-8','cp874' , 'ใบเสร็จรับเงิน' ),1,1,'C',true);


// รูป
// $pdf-> Image('images/logo_recieve.jpg',19,12,96,26,'jpg');

//เลขประจำตัวผู้เสียภาษี
$pdf->SetFont('angsana','',16);
$pdf->Text( 55 , 20 ,  iconv( 'UTF-8','cp874' , 'ใบขออนุญาตใช้รถส่วนกลาง คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร' ));

//วันเดือนปี
$pdf->SetDash(0.5,0.5);
$pdf->SetFont('angsana', '',16);
$pdf->Text( 100, 30 , iconv( 'UTF-8','cp874', 'วันที่') );
$pdf->Text( 108, 30, iconv( 'UTF-8', 'cp874', $recieve_date[0]));
$pdf->Line(108,31,116,31);
$pdf->SetFont('angsana', '', 16);
$pdf->Text( 117, 30, iconv( 'UTF-8','cp874', 'เดือน'));
$pdf->Text( 135, 30, iconv( 'UTF-8', 'cp874', $recieve_date[1]));
$pdf->Line(126,31,149,31);
$pdf->SetFont('angsana', '', 16);
$pdf->Text( 150, 30, iconv( 'UTF-8','cp874','พ.ศ.'));
$pdf->Text( 158, 30, iconv( 'UTF-8', 'cp874', $recieve_date[2]));
$pdf->Line(158,31,170,31);
$pdf->SetDash();

//topic
$pdf->SetFont('angsana', '',16);
$pdf->Text( 20, 42, iconv( 'UTF-8','cp874', 'เรียน (ผู้มีอำนาจสั่งใช้รถ) หัวหน้าสำนักงานเลขานุการคณะวิศวกรรมศาสตร์'));

// detail
$pdf->SetDash(0.5,0.5);
// ชื่อ
$pdf->SetFont('angsana', '', 16);
$pdf->Text( 36, 53, iconv( 'UTF-8', 'cp874', 'ข้าพเจ้า'));
$pdf->Text( 49, 53, iconv( 'UTF-8', 'cp874', $fullname));
$pdf->Line(48,54,100,54);

//ตำแหน่ง
$pdf->SetFont('angsana', '', 16);
$pdf->Text(102, 53, iconv( 'UTF-8', 'cp874', 'ตำแหน่ง'));
$pdf->Text(120, 53, iconv( 'UTF-8', 'cp874', $role));
$pdf->Line(115,54,170,54);

//สังกัด
$pdf->SetFont('angsana', '', 16);
$pdf->Text(20, 62, iconv('UTF-8', 'cp874', 'สังกัด'));
$pdf->Text(31, 62, iconv( 'UTF-8', 'cp874', $Affiliation));
$pdf->Line(30,63,75,63);

//ขออนุญาต
$pdf->SetFont('angsana', '', 16);
$pdf->Text(76, 62, iconv('UTF-8', 'cp874', 'ขออนุญาตใช้รถ(สถานที่ไป)'));
$pdf->Text(121, 62, iconv( 'UTF-8', 'cp874', $where));
$pdf->Line(120,63,170,63);

//เพื่อ
$pdf->SetFont('angsana', '', 16);
$pdf->Text(20, 70, iconv('UTF-8', 'cp874', 'เพื่อ'));
$pdf->Text(28,70, iconv('UTF-8', 'cp874', $forWhat));
$pdf->Line(27,71,125,71);

//คนนั่ง
$pdf->SetFont('angsana', '', 16);
$pdf->Text(128, 70, iconv('UTF-8', 'cp874', 'มีคนนั่ง'));
$pdf->Text(145,70, iconv('UTF-8', 'cp874', $peopleHow));
$pdf->Line(141,71,164,71);
$pdf->SetFont('angsana', '', 16);
$pdf->Text(165, 70, iconv('UTF-8', 'cp874', 'คน'));

//วันที่
$pdf->SetFont('angsana', '', 16);
$pdf->Text(20, 78, iconv('UTF-8', 'cp874', 'ในวันที่'));
$pdf->Text(34,78, iconv('UTF-8', 'cp874', $startDate));
$pdf->Line(33,79,60,79);

$pdf->SetFont('angsana', '', 16);
$pdf->Text(62, 78, iconv('UTF-8', 'cp874', 'เวลา'));
$pdf->Text(71, 78, iconv('UTF-8', 'cp874', $timeStartDate));
$pdf->Line(70,79,92,79);

$pdf->SetFont('angsana', '', 16);
$pdf->Text(93, 78, iconv('UTF-8', 'cp874', 'ถึงวันที่'));
$pdf->Text(107, 78, iconv('UTF-8', 'cp874', $endDate));
$pdf->Line(106,79,133,79);

$pdf->SetFont('angsana', '', 16);
$pdf->Text(134, 78, iconv('UTF-8', 'cp874', 'เวลา'));
$pdf->Text(143, 78, iconv('UTF-8', 'cp874', $timeEndDate));
$pdf->Line(142,79,170,79);

//หมายเลขทะเบียน
$pdf->SetFont('angsana', '', 16);
$pdf->Text(20, 87, iconv('UTF-8', 'cp874', 'หมายเลขทะเบียนรถ'));
$pdf->Text(53, 87, iconv('UTF-8', 'cp874', $vehicleRegistrationNumber));
$pdf->Line(52,88,170,88);

//ผู้ขออนุญาต
$pdf->SetFont('angsana', '', 16);
$pdf->Text(131, 105, iconv('UTF-8', 'cp874', 'ผู้ขออนุญาต'));
$pdf->Text(81, 105, iconv('UTF-8', 'cp874', $licensee));
$pdf->Line(80,106,129,106);

$pdf->SetFont('angsana', '', 16);
$pdf->Text(131, 115, iconv('UTF-8', 'cp874', '(วัน เดือน ปี)'));
$pdf->Text(81, 115, iconv('UTF-8', 'cp874', $dateLicensee));
$pdf->Line(80,116,129,116);


$pdf->SetDash();



$pdf->Output();
//$pdf->Output('Receive.pdf','F');

?>