<?php
  include('connection.php');
  $id = $_GET['id'];
  $data=mysqli_query($connect,"delete from scheduledata where id=$id");
  header('Location: index.php');
?>