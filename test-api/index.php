<?php
      
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once './dbconnect.php';
    include_once './data.php';

    $dbclass = new DBConnect();
    $connection = $dbclass->getConnection();
    
  
    // $dss  = $data->create();
    $dataDHT = array();
    date_default_timezone_set("Asia/Bangkok");
    $datas = array();
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $data = new Data($connection);
        $stmt  = $data->read();
        if($stmt ->num_rows > 0){


        
            $datas["body"] = array();
            
            while ($row = $stmt->fetch_assoc()){
        
                // extract($row);
                // echo "test". $row["id"];
                $p  = array(
                    "id" => $row["id"],
                    "temp" => $row["temp"],
                    "humi" => $row["humi"],
                    "location" => $row["location"],
                    "timeupdate" => $row["timeupdate"]
                );
        
                array_push($datas["body"], $p);
            }
        
        
        }
        else{
            $dataDHT = array(
            "status"=>"no data"
            ); 
            //echo "emtry value";
        }
        echo json_encode($datas);
    } else if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data_insert = new Data($connection);
        
        $data_insert->temp = $_REQUEST["temp"];
        $data_insert->humi = $_REQUEST["humi"];
        $data_insert->location = $_REQUEST["location"];
        
        // echo $query['temp'];
        $data_insert->create();
    }
    // echo json_encode($dataDHT);
?>