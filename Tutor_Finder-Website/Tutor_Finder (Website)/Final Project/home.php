<!DOCTYPE html>
<html>
<head>
<style>

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 15px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}



#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}


body {
  background-image: url(background.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center ;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    height: 100%;
    background-size: cover; ;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

</style>
</head>
<body>

	 <script>


  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

    <div class="topnav" id="myTopnav">
  <a href="welcome_page.html" class="active">Home</a>
  <a href="Registration_form.html">Register As Tutor</a>
  <a href="index.php">Login As Tutor</a>
  <a href="search_form.html">Search Tutor</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>





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






$result = mysql_query("SELECT t.firstname, t.lastname , g.gender, t.email, t.phonenumber, l.location, e.University_name, e.University_dept, e.University_result, e.University_from_to, e.College_name, e.College_dept, e.College_result, e.College_from_to, e.School_name, e.School_dept, e.School_result, e.School_from_to
FROM tutor t, education e,tutor_livesin tl, location l, tutors_gender tg, gender g
WHERE t.Tutor_ID = tl.Tutor_ID AND tl.location_id = l.location_id AND t.Tutor_ID = tg.Tutor_ID 
AND tg.Gender_id = g.Gender_id AND t.Tutor_ID = e.Tutor_ID
     AND t.Tutor_ID =".$_SESSION['user']);



echo "<th><h3 style=background-color: rgba(255, 99, 71, 0.6)><center> Your Profile </center></h3></th>";

echo "<div class=row>
  <div class=column>";
echo "<center>"; echo "<table id=customers>
<tr>

</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<th>Firstname</th>";
echo "<td>" . $row['firstname'] . "</td>";
echo "</tr>";


echo "<tr>";
echo "<th>Lastname</th>";
echo "<td>" . $row['lastname'] . "</td>";
echo "</tr>";


echo "<tr>";
echo "<th>Gender</th>";
echo "<td>" . $row['gender'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>Email</th>";
echo "<td>" . $row['email'] . "</td>";
echo "</tr>";


echo "<tr>";
echo "<th>Phone Number</th>";
echo "<td>" . $row['phonenumber'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>Location</th>";
echo "<td>" . $row['location'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>University Name </th>";
echo "<td>" . $row['University_name'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>University Department </th>";
echo "<td>" . $row['University_dept'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>Current CGPA </th>";
echo "<td>" . $row['University_result'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>From - To  </th>";
echo "<td>" . $row['University_from_to'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>College Name </th>";
echo "<td>" . $row['College_name'] . "</td>";
echo "</tr>";


echo "<tr>";
echo "<th>College dept  </th>";
echo "<td>" . $row['College_dept'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>HSC </th>";
echo "<td>" . $row['College_result'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>From - To  </th>";
echo "<td>" . $row['College_from_to'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>School Name :</th>";
echo "<td>" . $row['School_name'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>School dept :</th>";
echo "<td>" . $row['School_dept'] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>SSC :</th>";
echo "<td>" . $row['School_result'] . "</td>";
echo "</tr>"; 

echo "<tr>";
echo "<th> From - To :</th>";
echo "<td>" . $row['School_from_to'] . "</td>";
echo "</tr>";  

echo "</tr>";
}
echo "</table>";
echo "</center>";
echo "</div>";


$result = mysql_query("SELECT d.day, avt.avaiable_time
FROM tutor t , tutor_schedule ts, day d, avaiable_time avt
WHERE t.Tutor_ID = ts.Tutor_ID AND ts.day_id = d.day_id AND d.avaiable_time_id = avt.avaiable_time_id
     AND t.Tutor_ID =".$_SESSION['user']);

echo "<div class=column>";
echo "<th><h3 style=background-color: rgba(255, 99, 71, 0.6)><center> Available Days and Times </center></h3></th>";
echo "<table id=customers>
<tr>
</tr>
<tr>
<th><center>Day</center></th>
<th><center>Time</center></th>
</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['day'] . "</td>";
echo "<td>" . $row['avaiable_time'] . "</td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";



$result = mysql_query("SELECT s.subject , c.Class,  m.medium
FROM tutor t , tutor_teaches ts, subject s, class c , medium m
WHERE t.Tutor_ID = ts.Tutor_ID AND ts.subject_id = s.subject_id AND s.class_id = c.Class_ID AND c.medium_id = m.medium_id
     AND t.Tutor_ID =".$_SESSION['user']);

echo "<div class=column>";
echo "<th><h3 style=background-color: rgba(255, 99, 71, 0.6)><center> Available Subjects and Classes </center></h3></th>";
echo "<table id=customers>
<tr>
</tr>
<tr>
<th><center>Subject</center></th>
<th><center>Classe</center></th>
<th><center>Medium</center></th>
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
echo "</style2>";
echo "</div>";












?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
</head>
<body>
  <div class="column">

  <h2 style="background-color: MediumSeaGreen"><center><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></center></h2>

  <h2 style="background-color: LightGray"><center><a href="updateAccount.html"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Update Account</a></center></h2>
  <h2 style="background-color: Tomato"><center><a href="deleteAccount.php?delete_account">Delete Account</a></center></h2>
  <br>
  <hr>
     <h4 style=" background-color: Gray"><br>
       <span class="glyphicon glyphicon-user"></span><center>&nbsp;Hi'  <?php echo $userRow['userName']; ?>&nbsp;</center><span class="caret"></span></a>
       <span class="glyphicon glyphicon-user"></span><center>&nbsp;Your Email is : <?php echo $userRow['userEmail']; ?>&nbsp;</center><span class="caret"></span></a>
	   <span class="glyphicon glyphicon-user"></span><center>&nbsp;Your Tutor ID Is :  <?php echo $userRow['Tutor_ID']; ?>&nbsp;</center><span class="caret"></span></a></h4>



  </div>                       
     
</body>
</html>
<?php ob_end_flush(); ?>