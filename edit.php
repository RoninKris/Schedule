<?php
  include("connection.php");
  $id = $_GET['id'];
  $day = $_GET['day'];
  $subject = $_GET['subject'];
  $teacher = $_GET['teacher'];
  $startTime = $_GET['start-time'];
  $endTime = $_GET['end-time'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Scheduler</title>
</head>
<body onload="showEditForm()">
  <div class="main-container">
    <a onClick="showAddForm()" id="add-button">&plus;</a>
    <div class="header"><p>Second Semester</p></div>
    <?php include('display.php'); ?>
    <div class="main-course-container">
      <p id="day">Monday</p>
        <?php 
        createDiv("monday");
        ?>
      <p id="day">Tuesday</p>
      <?php
        createDiv("tuesday");
      ?>
      <p id="day">Wednesday</p>
      <?php
        createDiv("wednesday");
      ?>
      <p id="day">Thursday</p>
      <?php
        createDiv("thursday");
      ?>
      <p id="day">Friday</p>
      <?php
        createDiv("friday");
      ?>
      <p id="day">Saturday</p>
      <?php
        createDiv("saturday");
      ?>
      <p id="day">Sunday</p>
      <?php
        createDiv("sunday");
        
      ?>
    </div>
    <div class="add form">
      <div class="header"><input type="button" value="X" id="close-button" onClick="hideAddForm()"></div>
      
      <form name="add-form"action="add.php" method="post" onsubmit="return validateAddForm()">
        <center>
          <select name="day" id="day">
            <optgroup>
              <option value="" selected disabled>Select Day</option>
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
          <input type="text" name="subject" required> <br>
          <label for="teacher">Teacher</label><br>
          <input type="text" name="teacher"> <br>
          <label for="start-time" required>Start Time</label><br>
          <input type="time" name="start-time"> <br>
          <label for="end-time">End Time</label><br>
          <input type="time" name="end-time" required> <br>
          <center><input type="submit" value="Submit"></center>
        </form>
    </div>

    <div class="edit form">
      <div class="header"><input type="button" value="X" id="close-button" onClick="hideEditForm()"></div>
      <form name="edit-form" action="" method="get" onsubmit="return validateEditForm()">
        <center>
          <div class="hidden">
          <input type="text" name="id" value="<?php echo $id ?>">
          </div>
          <select name="day" id="day" value="<?php echo "$day" ?>">
            <optgroup>
              <option value="" disabled>Select Day</option>
              <option value="monday" name="monday">Monday</option>
              <option value="tuesday" name="tuesday">Tuesday</option>
              <option value="wednesday" name="wednesday">Wednesday</option>
              <option value="thursday" name="thursday">Thursday</option>
              <option value="friday" name="friday">Friday</option>
              <option value="saturday" name="saturday">Saturday</option>
              <option value="sunday" name="sunday">Sunday</option>
            </optgroup>
          </select><br>
        </center>
        <?php
         echo "<script>var temp = '$day';" .
         "var mySelect = document.forms['edit-form']['day'];" .
         "for(var i, j = 0; i = mySelect.options[j]; j++) {" .
           "if(i.value == temp) {" .
             "mySelect.selectedIndex = j;" .
             "break;" .
           "}" .
         "}</script>"; 
        ?>
          <label for="subject">Subject</label><br>
          <input type="text" name="subject" value="<?php echo "$subject" ?>" required> <br>
          <label for="teacher">Teacher</label><br>
          <input type="text" name="teacher" value="<?php echo "$teacher" ?>"> <br>
          <label for="start-time" required>Start Time</label><br>
          <input type="time" name="start-time" value="<?php echo "$startTime" ?>"> <br>
          <label for="end-time" >End Time</label><br>
          <input type="time" name="end-time" value="<?php echo "$endTime" ?>" required> <br>
          <center><input type="submit" name="submit" value="Update"></center>
        </form>
    </div>
  </div>
</body>
<?php
if(isset($_GET['submit'])){
  $id = $_GET['id'];
  $day = $_GET['day'];
  $subject = $_GET['subject'];
  $teacher = $_GET['teacher'];
  $startTime = $_GET['start-time'];
  $endTime = $_GET['end-time'];
  $query = "update scheduledata SET day = '$day', subject = '$subject', teacher = '$teacher', startTime = '$startTime', endTime = '$endTime' WHERE id= $id";
  $data = mysqli_query($connect, $query);
  if($data){
    echo "<script> window.location.href='./index.php' </script>";
    exit;
  }
  else{
    echo "<script> alert('Failed'); </script>";
  }
}
?>
<script src="script.js"></script>
</html>