<?php
    include_once './dbconnect.php';
    include_once './data.php';

    $dbclass = new DBConnect();
    $connection = $dbclass->getConnection();
    
    $data = new Data($connection);
    $stmt  = $data->read();
  

    
    $temps = $_GET["temp"];
    $humis = $_GET["humi"];
    $locations = $_GET["location"];
    $dataDHT = array();
    date_default_timezone_set("Asia/Bangkok");
    $datas = array();
    if($stmt ->num_rows > 0){


       
        $datas["body"] = array();
          
        while ($row = $stmt->fetch_assoc()){
    
            // extract($row);
            // echo "test". $row["id"];
            $p  = array(
                  "id" => $row["id"],
                  "temp" => $row["temp"],
                  "humi" => $row["humi"],
                  "location" => $row["locations"],
                  "timeupdate" => $row["timeupdate"]
            );
    
            array_push($datas["body"], $p);
        }
    
      
    }
    
    // if($temps && $humis){
    //     //echo "My name is ".$temp." ".$humi;
    //     $dataDHT = array(
    //         "temp"=>$temps,
    //         "humi"=>$humis,
    //         "timeupdate"=>date('Y-m-d H:i:s'),
    //         "location"=>$locations
    //     ); 
    //  }
     else{
        $dataDHT = array(
           "status"=>"no data"
        ); 
        //echo "emtry value";
    }
    echo json_encode($datas);
    // echo json_encode($dataDHT);
?>