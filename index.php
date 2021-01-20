<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="sidebar">
  <input type="button" value="Add" onClick="showAddForm()">
  <input type="button" value="Remove">
  <input type="button" value="Edit">
  <input type="button" value="Update">
  </div>
  <div class="main-container">
    
    <div class="header"><p>Second Semester</p></div>
    <div class="main-course-container">
      <p id="day">Monday</p>
      <?php
      function createDiv($day, $connect){
        $query = "select day, subject, teacher, time_format(startTime, '%h:%i') as startTime, time_format(endTime, '%h:%i') as endTime from ScheduleData";
        $result = $connect->query($query);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            if($row["day"] == $day){
              echo "<div class=course-container>".
              "  <h4 id=subject>" . $row["subject"] ."</h4>".
              "  <p id=teacher>Teacher:" . $row["teacher"] ."</p>".
              "  <p id=schedule>" . $row["startTime"] ."-". $row["endTime"]."</p>".
              "  </div>";    
            }
          }
        }
      }
        //Connect database
        $connect = new mysqli('localhost', 'root', '', 'Schedule');
        if($connect->connect_error){
          die("Connection Failed: ".$connect_error);
        }
            createDiv("monday", $connect);           
      ?>
      <p id="day">Tuesday</p>
      <?php
        createDiv("tuesday", $connect);
      ?>
      <p id="day">Wednesday</p>
      <?php
        createDiv("wednesday", $connect);
      ?>
      <p id="day">Thursday</p>
      <?php
        createDiv("thursday", $connect);
      ?>
      <p id="day">Friday</p>
      <?php
        createDiv("friday", $connect);
      ?>
      <p id="day">Saturday</p>
      <?php
        createDiv("saturday", $connect);
      ?>
      <p id="day">Sunday</p>
      <?php
        createDiv("sunday", $connect);
        
      ?>
    </div>
    <div class="add form">
      <form action="add.php" method="post">
        <center>
          <select name="day" id="day">
            <optgroup>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>
            </optgroup>
          </select><br>
        </center>
          <label for="subject">Subject</label><br>
          <input type="text" name="subject"> <br>
          <label for="teacher">Teacher</label><br>
          <input type="text" name="teacher"> <br>
          <label for="start-time">Start Time</label><br>
          <input type="time" name="start-time"> <br>
          <label for="end-time">End Time</label><br>
          <input type="time" name="end-time"> <br>
          <center><input type="submit" value="Submit"></center>
        </form>
    </div>
    <div class="remove form">
      <form action="remove.php" method="post">
        <center>
          <select name="day" id="day">
            <optgroup>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
              <option value="sunday">Sunday</option>
            </optgroup>
          </select><br>
        </center>
          <label for="subject">Subject</label><br>
          <input type="text" name="subject"> <br>
          <label for="teacher">Teacher</label><br>
          <input type="text" name="teacher"> <br>
          <label for="start-time">Start Time</label><br>
          <input type="time" name="start-time"> <br>
          <label for="end-time">End Time</label><br>
          <input type="time" name="end-time"> <br>
          <center><input type="submit" value="Submit"></center>
        </form>
    </div>
  </div>
</body>
</html>