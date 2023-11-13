<?php
include 'db_connect.php';
 $q=mysqli_query($conn,"select * from users");
 $json = array();
 while($data =mysqli_fetch_assoc($q)){
    $json[]=$data;

 }
 $record["userdata"]=$json;
 echo json_encode($record);
?>