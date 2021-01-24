<?php
      function createDiv($day){
        include('connection.php');
        $query = "select id, day, subject, teacher, time_format(startTime, '%H:%i') as startTime, time_format(endTime, '%H:%i') as endTime from ScheduleData order by startTime asc";
        $result = $connect->query($query);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            if($row["day"] == $day){
              echo "<div class=course-container>".
              "  <a href='edit.php?id=$row[id]&day=$row[day]&subject=$row[subject]&teacher=$row[teacher]&start-time=$row[startTime]&end-time=$row[endTime]' id='edit-button'>edit</a>".
              "  <a href='remove.php?id=$row[id]' id='remove-button'>&minus;</a>".
              "  <h4 id=subject>" . $row["subject"] ."</h4>".
              "  <p id=teacher>Teacher:" . $row["teacher"] ."</p>".
              "  <p id=schedule>" . $row["startTime"] ."-". $row["endTime"]."</p>".
              "  </div>";    
            }
          }
        }
      }