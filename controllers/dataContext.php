<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../config/conexao.php';
require_once 'statusApi.php';

$conexao = new conexao;

class dataContext
{
  
 function __construct()
 {
  // $data = $this->getData();
  
//  var_dump($this->statusApi->status400());
//   echo json_encode($data);
 }

 public function getData($listData = array())
 {
  try 
  {  
      if (!conexao::$conex==null) 
      {        
          $statusApi = new statusApi;      
          $data = array();
          $query = "";
          $list = array();
         foreach ($listData as $key => $value) 
         {
           $query = "select *from $value;";
           
           $cmd = conexao::$conex->prepare($query);

           if ($cmd->execute())
           {
             $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                          
             $data["$value"] = 
             [
               "data"=>$result,
               "totalData" => count($result),
               "status" => $statusApi->status200()
             ];
            //  $data["$value"] = [$cmd->fetchAll(PDO::FETCH_ASSOC),$statusApi->status200()];
           }
           else 
          //  $data["$value"] = $statusApi->status400();
          $data["$value"] = ["data"=>"[]", "status" => $statusApi->status400()];
         }
        $list = ["data" => $data];
         echo json_encode($list);
                             
      }
  
  } 
  catch (Exception $alerta) 
  { }  
 }



}

?>