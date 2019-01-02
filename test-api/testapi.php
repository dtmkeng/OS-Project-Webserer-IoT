<?php
 header('Content-Type: application/json');
 $data = array(
     "test"=>"test-100",
     "status"=>true
 );
  echo json_encode($data)
?>
