<?php
class DBConnect {
    public $connection;

    // get the database connection
    public function getConnection(){
 

       // Create connection
       $servername = "localhost";
       $username = "testuser";
       $password = "password";
       $dbname = "testdb";
   
   // Create connection
       $connection = new mysqli($servername, $username, $password, $dbname);
   
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } 


        return $connection;
    }
}
?>