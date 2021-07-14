<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once 'dataContext.php';
require_once 'statusApi.php';

$dataContext = new dataContext;
$statusApi = new statusApi;
// $value = $_REQUEST['data'];

// $jsonData = json_decode(file_get_contents("php://input"), true);

// return;
$methodServer = strtolower($_SERVER["REQUEST_METHOD"]);

if(!empty($methodServer) && $methodServer == "get")
{

  $jsonData = json_decode(file_get_contents("php://input"), true);
  
  if (!empty($jsonData))
  {
    $method = "";
    $parameter  = "";
    $list = array();
    $table = array();
    $values = "";

    foreach ($jsonData as $key => $value) 
    {
     if($key == "query")
     {
      $parameter = addslashes(trim($key));
      $list = $value;
     }

    }
    
    if($parameter == "query")
    {
      if(!empty($list))
      {     
       foreach ($list as $key => $value)  array_push($table, $key);  
       if(!empty($table)) $dataContext->getData($table);     
      }else echo json_encode($statusApi->status400());
    }
    
  }else echo json_encode($statusApi->status400());  

// } else echo json_encode(array("mesagem" => "Para as consultas o método é get"));
} else echo json_encode(array("resp" => "Para as consultas o método requisitado é get", "status" => $statusApi->status200() ));








// $jsonData = json_decode(file_get_contents("php://input"), true);
// $table = "";
// $method = "";
// $data;
// $teste = ["1"=>"sss", "2"=>"ssasdadads"];
// if (!empty($jsonData)) {
//  foreach ($jsonData as $item => $value) {
//   if ($item != "method") {
//    $table = $item;
//    $data[] = $value;
//   }
//  }
//  echo json_encode($data);
// }
// else
// echo json_encode("Data error");


// var_dump($jsonData);

$data = array
(
 "pessoa" => 
 [
  "nome" => "wilson",
  "senha" => "1234"
 ],
 "Filiacao" => 
 [
  "pai" => "Teste",
  "Mae" => "FFFF"
 ]


);


