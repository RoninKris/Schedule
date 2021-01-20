<?php
//Connect database
$connect = new mysqli('localhost', 'root', '', 'Schedule');
if($connect->connect_error){
  die("Connection Failed: ".$connect_error);
}
else{
  $query = "select * from ScheduleData";
  $result = $connect->query($query);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo  "<script>function createDiv(subject, teacher, startTime, endTime){ " +
        "  document.querySelector(\".main-course-container\").innerHTML+= \"<div class=course-container>\"" +
         <h4 id=subject>\" + subject + \"</h4>\"" +
         <p id=teacher>Teacher: \" + teacher + \"</p>\"" +
         <p id=schedule>\" + time + \"</p>\"" +
         </div>\" " +
        "} " +
        "function displayDiv(){ " +
        "  var container = document.querySelector(\".main-course-container\"); " +
        "  //Monday " +
        "  container.innerHTML+=\"<p id=day> Monday </p>\"; " +
        "  if(" . $row[$day] . "== \"Monday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "  //Tuesday " +
        "  container.innerHTML+=\"<p id=day> Monday </p>\"; " +
        "  if(" . $row[$day] . "== \"Tuesday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "  //Wednesday " +
        "  container.innerHTML+=\"<p id=day> Monday </p>\"; " +
        "  if(" . $row[$day] . "== \"Wednesday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "  //Thursday " +
        "  container.innerHTML+=\"<p id=day> Monday </p>\"; " +
        "  if(" . $row[$day] . "== \"Thursday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "  //Friday " +
        "  container.innerHTML+=\"<p id=day> Monday </p>\"; " +
        "  if(" . $row[$day] . "== \"Friday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "  //Saturday " +
        "  container.innerHTML+=\"<p id=day> Monday </p>\"; " +
        "  if(" . $row[$day] . "== \"Saturday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "} " +"  
        //Sunday " +
        "  container.innerHTML+=\"<p id=day> Sunday </p>\"; " +
        "  if(" . $row[$day] . "== \"Sunday\") createDiv(". $row[$subject]. ",". $row[$teacher] ."," .  $row[$startTime] . "," . $row[$endTime] . "); " +
        "  } " +
        "displayDiv(); </script>";
    }
  }
  $connect->close();
}
?>