<?php

$url = 'http://localhost:8000/api/staffs-monthly';

// request data that is going to be sent as POST to API
$data = array(
    "year" => 2566,
    "month_en" => "July",
);

$curl = curl_init();

// encoding the request data as JSON which will be sent in POST
$encodedData = json_encode($data);

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

//print_r($obj);

foreach ($obj[0] as $key => $row) {
 
    echo $row->staff_nu_net." ".$row->firstname."<br>";
    //echo $key;
}

//echo $obj[0][0]->staff_nu_net."<br>";
//echo $obj[0][1]->staff_nu_net."<br>";

?>