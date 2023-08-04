<?php

$url = 'http://localhost:8000/api/benefit-monthly';

// request data that is going to be sent as POST to API
$dataPost = array(
    "year" => 2566,
    "month_en" => "July",
);

$curl = curl_init();

// encoding the request data as JSON which will be sent in POST
$encodedData = json_encode($dataPost);

// Set query data here with the URL
curl_setopt($curl, CURLOPT_URL, $url); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type:application/json'
));

curl_setopt($curl, CURLOPT_POST, true);

// Curl POST the JSON data to send the request
curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);


$content = curl_exec($curl);
//curl_close($ch);
//print $content;
curl_close($curl);
//echo $content;
$obj = json_decode($content, false);

//var_dump(json_decode($content));

$max_credit_engineer=15000;
$max_credit_technician=10000;
$max_credit_director=7000;
$max_credit_officer=1500;

//print_r($obj);
$indexDirector=0;
$indexOfficer=0;
$indexEngineer=0;
$indexTechnician=0;
$indexW=0;//PersonalLists
foreach ($obj[0] as $key => $row) {
 
    //echo $row->username." ".$row->firstname."<br>";
    //echo $key;

    //$PersonalLists[0]=array("fullname"=>"ดร.สุภาวรรณ ศรีรัตนา","expect"=>13308.39,"actual"=>7000,"price_th"=>"เจ็ดพันบาทถ้วน","with_draw"=>1);

    if($row->staff_type=="administrator"){
        $data[$indexDirector]=array("name"=>$row->firstname,"expect"=>$row->estimate,"actual"=>$row->money,"role"=>"หัวหน้าศูนย์ทดสอบ");
        if($row->estimate>=$max_credit_director){
            $PersonalLists[$indexW]=array("fullname"=>$row->fullname_thai,"expect"=>$row->estimate,"actual"=>$row->money,"price_th"=>"เจ็ดพันบาทถ้วน","with_draw"=>1);
            $indexW++;
        }
    }else if($row->staff_type=="financial_officers"){
        $dataOfficer[$indexOfficer]=array("name"=>$row->firstname,"expect"=>$row->estimate,"actual"=>$row->money,"role"=>"เจ้าหน้าที่โครงการ");
        $indexOfficer++;
        if($row->estimate>=$max_credit_officer){
            $PersonalLists[$indexW]=array("fullname"=>$row->fullname_thai,"expect"=>$row->estimate,"actual"=>$row->money,"price_th"=>"หนึ่งพันห้าร้อยบาทถ้วน","with_draw"=>1);
            $indexW++;
        }
    }else if($row->staff_type=="user"){
        $dataEngineer[$indexEngineer]=array("name"=>$row->firstname,"expect"=>$row->estimate,"actual"=>$row->money,"role"=>"วิศวกรตรวจสอบผล");
        $indexEngineer++;
        if($row->estimate>=$max_credit_engineer){
            $PersonalLists[$indexW]=array("fullname"=>$row->fullname_thai,"expect"=>$row->estimate,"actual"=>$row->money,"price_th"=>"หนึ่งหมื่นห้าพันบาทถ้วน","with_draw"=>1);
            $indexW++;
        }
    }else if($row->staff_type=="worker"){
        $dataTechnician[$indexTechnician]=array("name"=>$row->firstname,"expect"=>$row->estimate,"actual"=>$row->money,"role"=>"ผู้ปฏิบัติการทดสอบ");
        $indexTechnician++;
        if($row->estimate>=$max_credit_technician){
            $PersonalLists[$indexW]=array("fullname"=>$row->fullname_thai,"expect"=>$row->estimate,"actual"=>$row->money,"price_th"=>"หนึ่งหมื่นบาทถ้วน","with_draw"=>1);
            $indexW++;
        }
    }
}
$PersonalLists[$indexW]=array("fullname"=>"นางสาวลูกน้ำ มากลิ่น","expect"=>0,"actual"=>0,"price_th"=>"","with_draw"=>0);
$indexW++;
$PersonalLists[$indexW]=array("fullname"=>"นางสาวทัศพร กนกพารา","expect"=>0,"actual"=>0,"price_th"=>"","with_draw"=>0);


//print_r($dataEngineer);
//print_r($dataTechnician);
//print_r($PersonalLists);

print_r($data);

//echo $obj[0][0]->staff_nu_net."<br>";
//echo $obj[0][1]->staff_nu_net."<br>";

?>