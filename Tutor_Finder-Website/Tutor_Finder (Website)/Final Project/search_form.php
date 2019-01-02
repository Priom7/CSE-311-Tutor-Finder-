<!DOCTYPE html>
<html>
<head>
<style>
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
</style>
</head>
<body>


<?php

error_reporting(E_ALL ^ E_NOTICE);


/* Attempt MySQL server connection. */
$link = mysqli_connect("localhost", "root", "123sap123", "project_experiment");

 
// Check connection.
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




// gender table
$gender =  mysqli_real_escape_string($link, $_REQUEST['gender']);


//location table
$location = mysqli_real_escape_string($link, $_REQUEST['location']);


// days table
$days = mysqli_real_escape_string($link, $_REQUEST['days']);


// time table
$time = mysqli_real_escape_string($link, $_REQUEST['time']);


// medium table
$medium = mysqli_real_escape_string($link, $_REQUEST['medium']);


// subjects table 
$subjects = mysqli_real_escape_string($link, $_REQUEST['subjects']);


// calsses table
$classes = mysqli_real_escape_string($link, $_REQUEST['classes']);





$id = 1; // for gender id 
$lid = 1; // for location id
$last_id = 1; // for person_id (last insertion)
$mdm = 1; // for medium
$dd = 1 ; // for day
$tt = 2 ; // for time
$cc = 1 ; // for class
$ss = 1 ; // for subject


// initializing Locations
if( $location == "Uttara")
{
    $lid = 1;
}
elseif ($location == "Bashundhara")
{
    $lid = 2;
}
elseif ($location=="Mirpur")
{
    $lid = 3;
}


// initializing gender
if($gender=="Male")
{
    $id = 1;

}
elseif ($gender=="Female") 
{
    $id = 2;
}


// initializing Medium
if( $medium == "English")
{
    $mdm = 1;
}
elseif ($medium == "Bangla")
{
    $mdm = 2;
}



//initializing Time
if ($time == "Morning")
{
    $tt = 1;
}
elseif ($time == "Afternoon")
{
    $tt = 2;
}
elseif ($time == "Evening")
{
    $tt = 3;
}



// initializing Day
if(($days == "Saturday") && ($tt ==1))
{
    $dd = 1;
}
elseif (($days == "Saturday") && ($tt ==2))
{
    $dd = 2;
}
elseif (($days == "Saturday") && ($tt==3))
{
    $dd = 3;
}
elseif (($days == "Sunday") && ($tt ==1))
{
    $dd = 4;
}
elseif (($days == "Sunday") && ($tt ==2))
{
    $dd = 5;
}
elseif (($days == "Sunday") && ($tt ==3))
{
    $dd = 6;
}
elseif (($days == "Monday") && ($tt ==1))
{
    $dd = 7;
}
elseif (($days == "Monday") && ($tt ==2))
{
    $dd = 8;
}
elseif (($days == "Monday") && ($tt ==3))
{
    $dd = 9;
}
elseif (($days == "Tuesday") && ($tt ==1))
{
    $dd = 10;
}
elseif (($days == "Tuesday") && ($tt ==2))
{
    $dd = 11;
}
elseif (($days == "Tuesday") && ($tt ==3))
{
    $dd = 12;
}
elseif (($days == "Wednesday") && ($tt ==1))
{
    $dd = 13;
}
elseif (($days == "Wednesday") && ($tt ==2))
{
    $dd = 14;
}
elseif (($days == "Wednesday") && ($tt ==3))
{
    $dd = 15;
}
elseif (($days == "Thursday") && ($tt ==1))
{
    $dd = 16;
}
elseif (($days == "Thursday") && ($tt ==2))
{
    $dd = 17;
}
elseif (($days == "Thursday") && ($tt ==3))
{
    $dd = 18;
}
elseif (($days == "Friday") && ($tt ==1))
{
    $dd = 19;
}
elseif (($days == "Friday") && ($tt ==2))
{
    $dd = 20;
}
elseif (($days == "Friday") && ($tt ==3))
{
    $dd = 21;
}



//initializing Class
if (($classes == "PSC" ) && ($mdm = 2 ))
{
    $cc = 1;
}
elseif (($classes == "6" ) && ($mdm = 2 ))
{
    $cc = 2;
}
elseif (($classes == "7" ) && ($mdm = 2 ))
{
    $cc = 3;
}
elseif (($classes == "JSC" ) && ($mdm = 2 ))
{
    $cc = 4;
}
elseif (($classes == "SSC" ) && ($mdm = 2 ))
{
    $cc = 5;
}
elseif (($classes == "HSC" ) && ($mdm = 2 ))
{
    $cc = 6;
}
elseif (($classes == "5" ) && ($mdm = 1 ))
{
    $cc = 7;
}
elseif (($classes == "6" ) && ($mdm = 1 ))
{
    $cc = 8;
}
elseif (($classes == "7" ) && ($mdm = 1 ))
{
    $cc = 9;
}
elseif (($classes == "8" ) && ($mdm = 1 ))
{
    $cc = 10;
}
elseif (($classes == "9" ) && ($mdm = 1 ))
{
    $cc = 11;
}
elseif (($classes == "O level" ) && ($mdm = 1 ))
{
    $cc = 12;
}
elseif (($classes == "A level" ) && ($mdm = 1 ))
{
    $cc = 13;
}



//initializing Subject
if (($subjects == "English" ) && ($cc = 1 ))
{
    $ss = 1;
}
elseif (($subjects == "Math" ) && ($cc = 1 )){
    $ss = 2;
}
elseif (($subjects == "Science" ) && ($cc = 1 ))
{
    $ss = 3;
}
elseif (($subjects == "All" ) && ($cc = 1 ))
{
    $ss = 4;
}
elseif (($subjects == "English" ) && ($cc = 2 ))
{
    $ss = 5;
}
elseif (($subjects == "Math" ) && ($cc = 2 ))
{
    $ss = 6;
}
elseif (($subjects == "Science" ) && ($cc = 2 ))
{
    $ss = 7;
}
elseif (($subjects == "All" ) && ($cc = 2))
{
    $ss = 8;
}
elseif (($subjects == "English" ) && ($cc = 3 ))
{
    $ss = 9;
}
elseif (($subjects == "Math" ) && ($cc = 3 ))
{
    $ss = 10;
}
elseif (($subjects == "Science" ) && ($cc = 3 ))
{
    $ss = 11;
}
elseif (($subjects == "All" ) && ($cc = 3))
{
    $ss = 12;
}
elseif (($subjects == "English" ) && ($cc = 4 ))
{
    $ss = 13;
}
elseif (($subjects == "Math" ) && ($cc = 4 ))
{
    $ss = 14;
}
elseif (($subjects == "Science" ) && ($cc = 4 ))
{
    $ss = 15;
}
elseif (($subjects == "All" ) && ($cc = 4))
{
    $ss = 16;
}
elseif (($subjects == "English" ) && ($cc = 5 ))
{
    $ss = 17;
}
elseif (($subjects == "Math" ) && ($cc = 5 ))
{
    $ss = 18;
}
elseif (($subjects == "Physics" ) && ($cc = 5 ))
{
    $ss = 19;
}
elseif (($subjects == "Chemistry" ) && ($cc = 5))
{
    $ss = 20;
}
elseif (($subjects == "Biology" ) && ($cc = 5))
{
    $ss = 21;
}
elseif (($subjects == "All" ) && ($cc = 5))
{
    $ss = 22;
}
elseif (($subjects == "Accounting" ) && ($cc = 5))
{
    $ss = 23;
}
elseif (($subjects == "English" ) && ($cc = 6 ))
{
    $ss = 24;
}
elseif (($subjects == "Math" ) && ($cc = 6 ))
{
    $ss = 25;
}
elseif (($subjects == "Physics" ) && ($cc = 6 ))
{
    $ss = 26;
}
elseif (($subjects == "Chemistry" ) && ($cc = 6))
{
    $ss = 27;
}
elseif (($subjects == "Biology" ) && ($cc = 6))
{
    $ss = 28;
}
elseif (($subjects == "All" ) && ($cc = 6))
{
    $ss = 29;
}
elseif (($subjects == "Accounting" ) && ($cc == 6))
{
    $ss = 30;
}




$result = mysqli_query($link,"SELECT t.firstname, t.lastname , g.gender, t.email, t.phonenumber, l.location, e.University_name, e.University_dept, e.University_result, e.University_from_to, e.College_name, e.College_dept, e.College_result, e.College_from_to, e.School_name, e.School_dept, e.School_result, d.day, av.avaiable_time, e.School_from_to,  m.medium, c.Class, s.subject
FROM tutor t, tutor_teaches tt, subject s, class c, tutor_schedule ts, day d, avaiable_time av, education e, medium m ,tutor_livesin tl, location l, tutors_gender tg, gender g
WHERE t.Tutor_ID = tt.Tutor_ID AND tt.subject_id = s.subject_id AND s.class_id = c.Class_ID AND c.medium_id = m.medium_id 
AND t.Tutor_ID = ts.Tutor_ID AND ts.day_id = d.day_id AND d.avaiable_time_id = av.avaiable_time_id 
AND t.Tutor_ID = tl.Tutor_ID AND tl.location_id = l.location_id AND t.Tutor_ID = tg.Tutor_ID 
AND tg.Gender_id = g.Gender_id AND t.Tutor_ID = e.Tutor_ID
     AND s.subject_id = '$ss'
     AND d.day_id= '$dd'
     AND l.location_id = '$lid'
     AND g.Gender_id = '$id'  ");

echo "<table id=customers>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Gender</th>
<th>Email</th>
<th>Phone Number</th>
<th>Location</th>
<th>University</th>
<th>Department</th>
<th>Current CGPA</th>
<th>Year</th>
<th>College</th>
<th>College dept</th>
<th>HSC</th>
<th>Year</th>
<th>School</th>
<th>School dept</th>
<th>SSC</th>
<th>Year</th>
<th>Available Day</th>
<th>Available Time</th>
<th>Available Medium</th>
<th>Available Class</th>
<th>Available Subject</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['phonenumber'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['University_name'] . "</td>";
echo "<td>" . $row['University_dept'] . "</td>";
echo "<td>" . $row['University_result'] . "</td>";
echo "<td>" . $row['University_from_to'] . "</td>";
echo "<td>" . $row['College_name'] . "</td>";
echo "<td>" . $row['College_dept'] . "</td>";
echo "<td>" . $row['College_result'] . "</td>";
echo "<td>" . $row['College_from_to'] . "</td>";
echo "<td>" . $row['School_name'] . "</td>";
echo "<td>" . $row['School_dept'] . "</td>";
echo "<td>" . $row['School_result'] . "</td>";
echo "<td>" . $row['School_from_to'] . "</td>";
echo "<td>" . $row['day'] . "</td>";
echo "<td>" . $row['avaiable_time'] . "</td>";
echo "<td>" . $row['medium'] . "</td>";
echo "<td>" . $row['Class'] . "</td>";
echo "<td>" . $row['subject'] . "</td>";



echo "</tr>";
}
echo "</table>";


//close connection
mysqli_close($link);

?>

</body>
</html>


