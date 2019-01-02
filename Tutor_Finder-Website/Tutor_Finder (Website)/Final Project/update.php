<?php
error_reporting(E_ALL ^ E_NOTICE);
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res = mysql_query("SELECT * FROM users WHERE Tutor_ID=".$_SESSION['user']);
 $userRow = mysql_fetch_array($res);


$result = mysql_query("SELECT d.day, avt.avaiable_time
FROM tutor t , tutor_schedule ts, day d, avaiable_time avt
WHERE t.Tutor_ID = ts.Tutor_ID AND ts.day_id = d.day_id AND d.avaiable_time_id = avt.avaiable_time_id
     AND t.Tutor_ID =".$_SESSION['user']);

echo "<table id=customers>
<tr>
<th><h3 style=background-color: rgba(255, 99, 71, 0.6)><center> Available Days and Times </center></h3></th>
</tr>
<tr>
<th>Available Day</th>
<th>Available Time</th>
</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['day'] . "</td>";
echo "<td>" . $row['avaiable_time'] . "</td>";
echo "</tr>";
}
echo "</table>";


$result = mysql_query("SELECT s.subject , c.Class,  m.medium
FROM tutor t , tutor_teaches ts, subject s, class c , medium m
WHERE t.Tutor_ID = ts.Tutor_ID AND ts.subject_id = s.subject_id AND s.class_id = c.Class_ID AND c.medium_id = m.medium_id
     AND t.Tutor_ID =".$_SESSION['user']);

$resRow = mysql_fetch_array($result);


echo "<table id=customers>
<tr>
<th><h3 style=background-color: rgba(255, 99, 71, 0.6)><center> Available Subjects and Classes </center></h3></th>
</tr>
<tr>
<th>Available Subjects</th>
<th>Available Class</th>
<th>Available Medium</th>
</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['subject'] . "</td>";
echo "<td>" . $row['Class'] . "</td>";
echo "<td>" . $row['medium'] . "</td>";
echo "</tr>";
}
echo "</table>";



?>



<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
</head>
<body>

  <hr>
     <h4 style=" background-color: Gray"><br>
       <span class="glyphicon glyphicon-user"></span><center>&nbsp;Hi'  <?php echo $userRow['userName']; ?>&nbsp;</center><span class="caret"></span></a>
       <span class="glyphicon glyphicon-user"></span><center>&nbsp;Your Email is : <?php echo $userRow['userEmail']; ?>&nbsp;</center><span class="caret"></span></a>
	   <span class="glyphicon glyphicon-user"></span><center>&nbsp;Your Tutor ID Is :  <?php echo $userRow['Tutor_ID']; ?>&nbsp;</center><span class="caret"></span></a></h4>


<h2 style="background-color: SlateBlue" ><center>Available Days and Times</center></h2>


     <hr>

     <hr>

     <h2 style="border:2px solid DodgerBlue;"><center>Day 1</center></h2>

     <hr>

    <label for="days">Available Day </label>
    <input type="text" id="days" name="days" placeholder="&nbsp;<?php echo $resRow['day']; ?>&nbsp;" required>


    <label for="time">Available Time</label>
    <input type="text" id="time" name="time" placeholder="&nbsp;<?php echo $row['avaiable_time']; ?>&nbsp;" required>

    <hr>

    <hr>

     <h2 style="border:2px solid DodgerBlue;"><center>Day 2</center></h2>

     <hr>


    <label for="days">Available Day </label>
    <input type="text" id="days" name="days2" placeholder="Saturday, Sunday.." >


    <label for="time">Available Time</label>
    <input type="text" id="time" name="time2" placeholder="ex: 9.00am - 11.00am, 3.00pm - 5.00pm" >
    <hr>

    <hr>

     <h2 style="border:2px solid DodgerBlue;"><center>Day 3</center></h2>

     <hr>


    <label for="days">Available Day </label>
    <input type="text" id="days" name="days3" placeholder="Saturday, Sunday.." >


    <label for="time">Available Time</label>
    <input type="text" id="time" name="time3" placeholder="ex: 9.00am - 11.00am, 3.00pm - 5.00pm" >


    <hr>

    <h2 style="background-color: SlateBlue"  ><center>Available Classes And Subjects </center></h2>

    <hr>

    <hr>

     <h2 style="border:2px solid DodgerBlue;"><center>Subject & Class 1</center></h2>

     <hr>



    <label for="medium">Medium</label>
    <input type="text" id="medium" name="medium" placeholder="English/ Bangla.." required>

    <label for="classes">Available Classes </label>
    <input type="text" id="classes" name="classes" placeholder="ex: 5, 6, 7, JSC, SSC/A level, HSC/O level..." required>


    <label for="subjects">Available Subjects</label>
    <input type="text" id="lname" name="subjects" placeholder="ex: English, Math, Physics, Chemistry, Biology..." required>
    <br>

    <hr>


    <hr>

     <h2 style="border:2px solid DodgerBlue;"><center>Subject & Class 2</center></h2>

     <hr>


     <label for="medium">Medium </label>
    <input type="text" id="medium" name="medium2" placeholder="English/ Bangla.." >

    <label for="classes">Available Classes </label>
    <input type="text" id="classes" name="classes2" placeholder="ex: 5, 6, 7, JSC, SSC/A level, HSC/O level..." >


    <label for="subjects">Available Subjects </label>
    <input type="text" id="lname" name="subjects2" placeholder="ex: English, Math, Physics, Chemistry, Biology..." >
    <br>

    <hr>


    <hr>

     <h2 style="border:2px solid DodgerBlue;" ><center>Subject & Class 3</center></h2>

     <hr>


     <label for="medium">Medium </label>
    <input type="text" id="medium" name="medium3" placeholder="English/ Bangla.." >

    <label for="classes">Available Classes </label>
    <input type="text" id="classes" name="classes3" placeholder="ex: 5, 6, 7, JSC, SSC/A level, HSC/O level..." >


    <label for="subjects">Available Subjects</label>
    <input type="text" id="lname" name="subjects3" placeholder="ex: English, Math, Physics, Chemistry, Biology..." >
    <br>


                           
     
</body>
</html>
<?php ob_end_flush(); ?>