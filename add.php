<?php
$day = $_POST['day'];
$subject = $_POST['subject'];
$teacher = $_POST['teacher'];
$startTime = $_POST['start-time'];
$endTime = $_POST['end-time'];

//Connect database
$connect = new mysqli('localhost', 'root', '', 'Schedule');
if($connect->connect_error){
  die("Connection Failed: ".$connect_error);
}
else{
  $statement = $connect->prepare("insert into ScheduleData(day, subject, teacher, startTime, endTime) values(?, ?, ?, ?, ?)");
  $statement->bind_param("sssss", $day, $subject, $teacher, $startTime, $endTime);
  $statement->execute();
  $statement->close();
  $connect->close();
  header('Location: index.php');
}
?>