<?php
$connect = new mysqli('localhost', 'root', '', 'Schedule');
if($connect->connect_error){
  die("Connection Failed: ".$connect_error);
}
?>