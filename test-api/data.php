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
    public $timeupdate;

    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){
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