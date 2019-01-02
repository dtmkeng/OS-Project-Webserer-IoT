<?php
class Data{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "DHTData";

    // table columns
    public $id;
    public $temp;
    public $humi;
    public $location;

    public function __construct($connection){
        $this->connection = $connection;
    }

    //C

    public function create(){
       $status = array();
       date_default_timezone_set("Asia/Bangkok");
       $data_insert_sql =  "INSERT  INTO  DHTData(temp,humi,location,timeupdate) VALUES  ('$this->temp','$this->humi','$this->location',now())";
       $stmt = $this->connection->query($data_insert_sql);
       if ($stmt === TRUE) {
            $status = array(
                "status"=>"New record created successfully",
                "temp"=>$this->temp,
                "humi"=>$this->humi,
                "location"=>$this->location
            );
            echo json_encode($status);
        } else {
            $status = array(
                "status"=> "Error: " . $data_insert_sql . " " . $this->connection->error
            );
            echo json_encode($status);
        }
    }
    //R
    public function read(){
        $sql = "SELECT id,temp,humi,location,timeupdate FROM " . $this->table_name;

        $stmt = $this->connection->query($sql);


        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}
?>