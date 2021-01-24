<?php
  include("connection.php");
  $id = $_POST['id'];
  $day = $_POST['day'];
  $subject = $_POST['subject'];
  $teacher = $_POST['teacher'];
  $startTime = $_POST['start-time'];
  $endTime = $_POST['end-time'];

  $query = "update scheduledata SET day = '$day', subject = '$subject', teacher = '$teacher', startTime = '$startTime', endTime = '$endTime' WHERE id= $id";
  $data = mysqli_query($connect, $query);
  if($data){
    header("Location: index.php");
  }
  else{
    echo "<script> alert('Failed')</script>";
  }

?>