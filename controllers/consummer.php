<?php
 $url = "http://localhost/Api/controllers/dataContext";
 $curl = curl_init($url);
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

// $jsonData = json_decode(file_get_contents($url), true);
$jsonData = json_decode(curl_exec($curl));
$data = array();
foreach ($jsonData as $key => $value) 
{
 $data [] = $value;
}
echo json_encode($jsonData);
// $teste;
// foreach ($jsonData as $key => $value) {
//  $test []= "$key";
 
// }

// var_dump($test);
?>