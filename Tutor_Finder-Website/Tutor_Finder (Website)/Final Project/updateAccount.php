<?php


/* Attempt MySQL server connection. */
error_reporting(E_ALL ^ E_NOTICE);
$link = mysqli_connect("localhost", "root", "123sap123", "project_experiment");

 
// Check connection.
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security


// days table
$tutor_id = mysqli_real_escape_string($link, $_REQUEST['tutorid']);
$days = mysqli_real_escape_string($link, $_REQUEST['days']);
$days2 = mysqli_real_escape_string($link, $_REQUEST['days2']);
$days3 = mysqli_real_escape_string($link, $_REQUEST['days3']);


// time table
$time = mysqli_real_escape_string($link, $_REQUEST['time']);
$time2 = mysqli_real_escape_string($link, $_REQUEST['time2']);
$time3 = mysqli_real_escape_string($link, $_REQUEST['time3']);


// medium table
$medium = mysqli_real_escape_string($link, $_REQUEST['medium']);
$medium2 = mysqli_real_escape_string($link, $_REQUEST['medium2']);
$medium3 = mysqli_real_escape_string($link, $_REQUEST['medium3']);

// subjects table 
$subjects = mysqli_real_escape_string($link, $_REQUEST['subjects']);
$subjects2 = mysqli_real_escape_string($link, $_REQUEST['subjects2']);
$subjects3 = mysqli_real_escape_string($link, $_REQUEST['subjects3']);

// calsses table
$classes = mysqli_real_escape_string($link, $_REQUEST['classes']);
$classes2 = mysqli_real_escape_string($link, $_REQUEST['classes2']);
$classes3 = mysqli_real_escape_string($link, $_REQUEST['classes3']);





 
$id = 1; // for gender id 
$lid = 1; // for location id
$last_id = 1; // for person_id (last insertion)


$mdm = 0; // for medium
$mdm2 = 0;
$mdm3 = 0;

$dd = 0 ; // for day
$dd2 = 0;
$dd3 = 0;
$tt = 0 ;  // for time
$tt2 =0;
$tt3 = 0; 


$cc = 0; // for class
$cc2 = 0;
$cc3 = 0;  
$ss = 0;  // for subject
$ss2 = 0;
$ss3 = 0; 

// initializing Medium
if( $medium == "English")
{
    $mdm = 1;
}
elseif ($medium == "Bangla")
{
    $mdm = 2;
}


// initializing Medium2
if( $medium2 == "English")
{
    $mdm2 = 1;
}
elseif ($medium2 == "Bangla")
{
    $mdm2 = 2;
}

// initializing Medium3
if( $medium3 == "English")
{
    $mdm3 = 1;
}
elseif ($medium3 == "Bangla")
{
    $mdm3 = 2;
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

//initializing Time2
if ($time2 == "Morning")
{
    $tt2 = 1;
}
elseif ($time2 == "Afternoon")
{
    $tt2 = 2;
}
elseif ($time2 == "Evening")
{
    $tt2 = 3;
}

//initializing Time3
if ($time3 == "Morning")
{
    $tt3 = 1;
}
elseif ($time3 == "Afternoon")
{
    $tt3 = 2;
}
elseif ($time3 == "Evening")
{
    $tt3 = 3;
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
elseif (($days == "Saturday") && ($tt ==3))
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
elseif (($days == "Tuesday") && ($tt==2))
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

if(($days2 == "Saturday") && ($tt2 ==1))
{
    $dd2 = 1;
}
elseif (($days2 == "Saturday") && ($tt2 ==2))
{
    $dd2 = 2;
}
elseif (($days2 == "Saturday") && ($tt2 ==3))
{
    $dd2 = 3;
}
elseif (($days2 == "Sunday") && ($tt2 ==1))
{
    $dd2 = 4;
    
}
elseif (($days2 == "Sunday") && ($tt2 ==2))
{
    $dd2 = 5;
    

}
elseif (($days2 == "Sunday") && ($tt2 ==3))
{
    $dd2 = 6;
     
}
elseif (($days2 == "Monday") && ($tt2 ==1))
{
    $dd2 = 7;
    
}
elseif (($days2 == "Monday") && ($tt2 ==2))
{
    $dd2 = 8;
    
}
elseif (($days2 == "Monday") && ($tt2 ==3))
{
    $dd2 = 9;
     
}
elseif (($days2 == "Tuesday") && ($tt2 ==1))
{
    $dd2 = 10;
     
}
elseif (($days2 == "Tuesday") && ($tt2==2))
{
    $dd2 = 11;
    
}
elseif (($days2 == "Tuesday") && ($tt2 ==3))
{
    $dd2 = 12;
    
}
elseif (($days2 == "Wednesday") && ($tt2 ==1))
{
    $dd2 = 13;
     
}
elseif (($days2 == "Wednesday") && ($tt2 ==2))
{
    $dd2 = 14;
    
}
elseif (($days2 == "Wednesday") && ($tt2 ==3))
{
    $dd2 = 15;
     
}
elseif (($days2 == "Thursday") && ($tt2 ==1))
{
    $dd2 = 16;
    
}
elseif (($days2 == "Thursday") && ($tt2 ==2))
{
    $dd2 = 17;
     
}
elseif (($days2 == "Thursday") && ($tt2 ==3))
{
    $dd2 = 18;
     
}
elseif (($days2 == "Friday") && ($tt2 ==1))
{
    $dd2 = 19;
    
}
elseif (($days2== "Friday") && ($tt2 ==2))
{
    $dd2 = 20;
    
}
elseif (($days2 == "Friday") && ($tt2 ==3))
{
    $dd = 21;
    
}


if(($days3 == "Saturday") && ($tt3 ==1))
{
    $dd3 = 1;
}
elseif (($days3 == "Saturday") && ($tt3 ==2))
{
    $dd3 = 2;
}
elseif (($days3 == "Saturday") && ($tt3 ==3))
{
    $dd3 = 3;
}
elseif (($days3 == "Sunday") && ($tt3 ==1))
{
    $dd3 = 4;
    
}
elseif (($days3 == "Sunday") && ($tt3 ==2))
{
    $dd3 = 5;
    

}
elseif (($days3 == "Sunday") && ($tt3 ==3))
{
    $dd3 = 6;
     
}
elseif (($days3 == "Monday") && ($tt3 ==1))
{
    $dd3 = 7;
    
}
elseif (($days3 == "Monday") && ($tt3 ==2))
{
    $dd3 = 8;
    
}
elseif (($days3 == "Monday") && ($tt3 ==3))
{
    $dd3 = 9;
     
}
elseif (($days3 == "Tuesday") && ($tt3 ==1))
{
    $dd3 = 10;
     
}
elseif (($days3 == "Tuesday") && ($tt3==2))
{
    $dd3 = 11;
    
}
elseif (($days3 == "Tuesday") && ($tt3 ==3))
{
    $dd3 = 12;
    
}
elseif (($days3 == "Wednesday") && ($tt3 ==1))
{
    $dd3 = 13;
     
}
elseif (($days3 == "Wednesday") && ($tt3 ==2))
{
    $dd3 = 14;
    
}
elseif (($days3 == "Wednesday") && ($tt3 ==3))
{
    $dd3 = 15;
     
}
elseif (($days3 == "Thursday") && ($tt3 ==1))
{
    $dd3 = 16;
    
}
elseif (($days3 == "Thursday") && ($tt3 ==2))
{
    $dd3 = 17;
     
}
elseif (($days3 == "Thursday") && ($tt3 ==3))
{
    $dd3 = 18;
     
}
elseif (($days3 == "Friday") && ($tt3 ==1))
{
    $dd3 = 19;
    
}
elseif (($days3 == "Friday") && ($tt3 ==2))
{
    $dd3 = 20;
    
}
elseif (($days3 == "Friday") && ($tt3 ==3))
{
    $dd3 = 21;
    
}





//initializing Class
if (($classes=="PSC")&&($mdm==2))
{
    $cc = 1;
   
}
elseif (($classes=="6" )&&($mdm==2))
{
    $cc = 2;
    
}
elseif (($classes == "7" ) && ($mdm == 2 ))
{
    $cc = 3;
   
}
elseif (($classes == "JSC" ) && ($mdm == 2 ))
{
    $cc = 4;
  
}
elseif (($classes == "SSC" ) && ($mdm == 2 ))
{
    $cc = 5;
   
}
elseif (($classes == "HSC" ) && ($mdm = 2 ))
{
    $cc = 6;
    
}
elseif (($classes == "5" ) && ($mdm == 1 ))
{
    $cc = 7;
   
}
elseif (($classes == "6" ) && ($mdm == 1 ))
{
    $cc = 8;
   
}
elseif (($classes == "7" ) && ($mdm == 1 ))
{
    $cc = 9;
}
elseif (($classes == "8" ) && ($mdm == 1 ))
{
    $cc = 10;
}
elseif (($classes == "9" ) && ($mdm == 1 ))
{
    $cc = 11;
}
elseif (($classes == "O level" ) && ($mdm == 1 ))
{
    $cc = 12;
}
elseif (($classes == "A level" ) && ($mdm == 1 ))
{
    $cc = 13;
}




//initializing Class2
if (($classes2=="PSC")&&($mdm2==2))
{
    $cc2 = 1;
   
}
elseif (($classes2=="6" )&&($mdm2==2))
{
    $cc2 = 2;
    
}
elseif (($classes2 == "7" ) && ($mdm2 == 2 ))
{
    $cc2 = 3;
   
}
elseif (($classes2 == "JSC" ) && ($mdm2 == 2 ))
{
    $cc2 = 4;
  
}
elseif (($classes2 == "SSC" ) && ($mdm2 == 2 ))
{
    $cc2 = 5;
   
}
elseif (($classes2 == "HSC" ) && ($mdm2 = 2 ))
{
    $cc2 = 6;
    
}
elseif (($classes2 == "5" ) && ($mdm2 == 1 ))
{
    $cc2 = 7;
   
}
elseif (($classes2 == "6" ) && ($mdm2 == 1 ))
{
    $cc2 = 8;
   
}
elseif (($classes2 == "7" ) && ($mdm2 == 1 ))
{
    $cc2 = 9;
}
elseif (($classes2 == "8" ) && ($mdm2 == 1 ))
{
    $cc2 = 10;
}
elseif (($classes2 == "9" ) && ($mdm2 == 1 ))
{
    $cc2 = 11;
}
elseif (($classes2 == "O level" ) && ($mdm2 == 1 ))
{
    $cc2 = 12;
}
elseif (($classes2 == "A level" ) && ($mdm2 == 1 ))
{
    $cc2 = 13;
}





//initializing Class3
if (($classes3=="PSC")&&($mdm3==2))
{
    $cc3 = 1;
   
}
elseif (($classes3=="6" )&&($mdm3==2))
{
    $cc3 = 2;
    
}
elseif (($classes3 == "7" ) && ($mdm3 == 2 ))
{
    $cc3 = 3;
   
}
elseif (($classes3 == "JSC" ) && ($mdm3 == 2 ))
{
    $cc3 = 4;
  
}
elseif (($classes3 == "SSC" ) && ($mdm3 == 2 ))
{
    $cc3 = 5;
   
}
elseif (($classes3 == "HSC" ) && ($mdm3 = 2 ))
{
    $cc3 = 6;
    
}
elseif (($classes3 == "5" ) && ($mdm3 == 1 ))
{
    $cc3 = 7;
   
}
elseif (($classes3 == "6" ) && ($mdm3 == 1 ))
{
    $cc3 = 8;
   
}
elseif (($classes3 == "7" ) && ($mdm3 == 1 ))
{
    $cc3 = 9;
}
elseif (($classes3 == "8" ) && ($mdm3 == 1 ))
{
    $cc3 = 10;
}
elseif (($classes3 == "9" ) && ($mdm3 == 1 ))
{
    $cc3 = 11;
}
elseif (($classes3 == "O level" ) && ($mdm3 == 1 ))
{
    $cc3 = 12;
}
elseif (($classes3 == "A level" ) && ($mdm3 == 1 ))
{
    $cc3 = 13;
}



//initializing Subject
if (($subjects == "English" ) && ($cc == 1 ))
{
    $ss = 1;
}
elseif (($subjects == "Math" ) && ($cc == 1 )){
    $ss = 2;
}
elseif (($subjects == "Science" ) && ($cc == 1 ))
{
    $ss = 3;
}
elseif (($subjects == "All" ) && ($cc == 1 ))
{
    $ss = 4;
}
elseif (($subjects == "English" ) && ($cc == 2 ))
{
    $ss = 5;
}
elseif (($subjects == "Math" ) && ($cc == 2 ))
{
    $ss = 6;
}
elseif (($subjects == "Science" ) && ($cc == 2 ))
{
    $ss = 7;
}
elseif (($subjects == "All" ) && ($cc == 2))
{
    $ss = 8;
}
elseif (($subjects == "English" ) && ($cc == 3 ))
{
    $ss = 9;
}
elseif (($subjects == "Math" ) && ($cc == 3 ))
{
    $ss = 10;
}
elseif (($subjects == "Science" ) && ($cc == 3 ))
{
    $ss = 11;
}
elseif (($subjects == "All" ) && ($cc == 3))
{
    $ss = 12;
}
elseif (($subjects == "English" ) && ($cc == 4 ))
{
    $ss = 13;
}
elseif (($subjects == "Math" ) && ($cc == 4 ))
{
    $ss = 14;
}
elseif (($subjects == "Science" ) && ($cc == 4 ))
{
    $ss = 15;
}
elseif (($subjects == "All" ) && ($cc == 4))
{
    $ss = 16;
}
elseif (($subjects == "English" ) && ($cc == 5 ))
{
    $ss = 17;
}
elseif (($subjects == "Math" ) && ($cc == 5 ))
{
    $ss = 18;
}
elseif (($subjects == "Physics" ) && ($cc == 5 ))
{
    $ss = 19;
}
elseif (($subjects == "Chemistry" ) && ($cc == 5))
{
    $ss = 20;
}
elseif (($subjects == "Biology" ) && ($cc == 5))
{
    $ss = 21;
}
elseif (($subjects == "All" ) && ($cc == 5))
{
    $ss = 22;
}
elseif (($subjects == "Accounting" ) && ($cc == 5))
{
    $ss = 23;
}
elseif (($subjects == "English" ) && ($cc == 6 ))
{
    $ss = 24;
}
elseif (($subjects == "Math" ) && ($cc == 6 ))
{
    $ss = 25;
}
elseif (($subjects == "Physics" ) && ($cc == 6 ))
{
    $ss = 26;
}
elseif (($subjects == "Chemistry" ) && ($cc == 6))
{
    $ss = 27;
}
elseif (($subjects == "Biology" ) && ($cc == 6))
{
    $ss = 28;
}
elseif (($subjects == "All" ) && ($cc == 6))
{
    $ss = 29;
}
elseif (($subjects == "Accounting" ) && ($cc == 6))
{
    $ss = 30;
}






//initializing Subject2
if (($subjects2 == "English" ) && ($cc2 == 1 ))
{
    $ss2 = 1;
}
elseif (($subjects2 == "Math" ) && ($cc2 == 1 )){
    $ss2 = 2;
}
elseif (($subjects2 == "Science" ) && ($cc2 == 1 ))
{
    $ss2 = 3;
}
elseif (($subjects == "All" ) && ($cc == 1 ))
{
    $ss = 4;
}
elseif (($subjects2 == "English" ) && ($cc2 == 2 ))
{
    $ss2 = 5;
}
elseif (($subjects2 == "Math" ) && ($cc2 == 2 ))
{
    $ss2 = 6;
}
elseif (($subjects2 == "Science" ) && ($cc2 == 2 ))
{
    $ss2 = 7;
}
elseif (($subjects2 == "All" ) && ($cc2 == 2))
{
    $ss2 = 8;
}
elseif (($subjects2 == "English" ) && ($cc2 == 3 ))
{
    $ss2 = 9;
}
elseif (($subjects2 == "Math" ) && ($cc2 == 3 ))
{
    $ss2 = 10;
}
elseif (($subjects2 == "Science" ) && ($cc2 == 3 ))
{
    $ss2 = 11;
}
elseif (($subjects2 == "All" ) && ($cc2 == 3))
{
    $ss2 = 12;
}
elseif (($subjects2 == "English" ) && ($cc2 == 4 ))
{
    $ss2 = 13;
}
elseif (($subjects2 == "Math" ) && ($cc2 == 4 ))
{
    $ss2 = 14;
}
elseif (($subjects2 == "Science" ) && ($cc2 == 4 ))
{
    $ss2 = 15;
}
elseif (($subjects2 == "All" ) && ($cc2 == 4))
{
    $ss2 = 16;
}
elseif (($subjects2 == "English" ) && ($cc2 == 5 ))
{
    $ss2 = 17;
}
elseif (($subjects2 == "Math" ) && ($cc2 == 5 ))
{
    $ss2 = 18;
}
elseif (($subjects2 == "Physics" ) && ($cc2 == 5 ))
{
    $ss2 = 19;
}
elseif (($subjects2 == "Chemistry" ) && ($cc2 == 5))
{
    $ss2 = 20;
}
elseif (($subjects2 == "Biology" ) && ($cc2 == 5))
{
    $ss2 = 21;
}
elseif (($subjects2 == "All" ) && ($cc2 == 5))
{
    $ss2 = 22;
}
elseif (($subjects2 == "Accounting" ) && ($cc2 == 5))
{
    $ss2 = 23;
}
elseif (($subjects2 == "English" ) && ($cc2 == 6 ))
{
    $ss2 = 24;
}
elseif (($subjects2 == "Math" ) && ($cc2 == 6 ))
{
    $ss2 = 25;
}
elseif (($subjects2 == "Physics" ) && ($cc2 == 6 ))
{
    $ss2 = 26;
}
elseif (($subjects2 == "Chemistry" ) && ($cc2 == 6))
{
    $ss2 = 27;
}
elseif (($subjects2 == "Biology" ) && ($cc2 == 6))
{
    $ss2 = 28;
}
elseif (($subjects2 == "All" ) && ($cc2 == 6))
{
    $ss2 = 29;
}
elseif (($subjects2 == "Accounting" ) && ($cc2 == 6))
{
    $ss2 = 30;
}




//initializing Subject3
if (($subjects3 == "English" ) && ($cc3 == 1 ))
{
    $ss3 = 1;
}
elseif (($subjects3 == "Math" ) && ($cc3 == 1 )){
    $ss3 = 2;
}
elseif (($subjects3 == "Science" ) && ($cc3 == 1 ))
{
    $ss3 = 3;
}
elseif (($subjects3 == "All" ) && ($cc3 == 1 ))
{
    $ss3 = 4;
}
elseif (($subjects3 == "English" ) && ($cc3 == 2 ))
{
    $ss = 5;
}
elseif (($subjects3 == "Math" ) && ($cc3 == 2 ))
{
    $ss3 = 6;
}
elseif (($subjects3 == "Science" ) && ($cc3 == 2 ))
{
    $ss3 = 7;
}
elseif (($subjects3 == "All" ) && ($cc3 == 2))
{
    $ss3 = 8;
}
elseif (($subjects3 == "English" ) && ($cc3 == 3 ))
{
    $ss3 = 9;
}
elseif (($subjects3 == "Math" ) && ($cc3 == 3 ))
{
    $ss3 = 10;
}
elseif (($subjects3 == "Science" ) && ($cc3 == 3 ))
{
    $ss3 = 11;
}
elseif (($subjects3 == "All" ) && ($cc3 == 3))
{
    $ss3 = 12;
}
elseif (($subjects3 == "English" ) && ($cc3 == 4 ))
{
    $ss3 = 13;
}
elseif (($subjects3 == "Math" ) && ($cc3 == 4 ))
{
    $ss3 = 14;
}
elseif (($subjects3 == "Science" ) && ($cc3 == 4 ))
{
    $ss3 = 15;
}
elseif (($subjects3 == "All" ) && ($cc3 == 4))
{
    $ss3 = 16;
}
elseif (($subjects3 == "English" ) && ($cc3 == 5 ))
{
    $ss3 = 17;
}
elseif (($subjects3 == "Math" ) && ($cc3 == 5 ))
{
    $ss3 = 18;
}
elseif (($subjects3 == "Physics" ) && ($cc3 == 5 ))
{
    $ss3 = 19;
}
elseif (($subjects3 == "Chemistry" ) && ($cc3 == 5))
{
    $ss3 = 20;
}
elseif (($subjects3 == "Biology" ) && ($cc3 == 5))
{
    $ss3 = 21;
}
elseif (($subjects3 == "All" ) && ($cc3 == 5))
{
    $ss3 = 22;
}
elseif (($subjects3 == "Accounting" ) && ($cc3 == 5))
{
    $ss3 = 23;
}
elseif (($subjects3 == "English" ) && ($cc3 == 6 ))
{
    $ss3 = 24;
}
elseif (($subjects3 == "Math" ) && ($cc3 == 6 ))
{
    $ss3 = 25;
}
elseif (($subjects3 == "Physics" ) && ($cc3 == 6 ))
{
    $ss3 = 26;
}
elseif (($subjects3 == "Chemistry" ) && ($cc3 == 6))
{
    $ss3 = 27;
}
elseif (($subjects3 == "Biology" ) && ($cc3 == 6))
{
    $ss3 = 28;
}
elseif (($subjects3 == "All" ) && ($cc3 == 6))
{
    $ss3 = 29;
}
elseif (($subjects3 == "Accounting" ) && ($cc3 == 6))
{
    $ss3 = 30;
}


// attempt insert query into tutor_schedule (location) table 
$sql = "UPDATE tutor_schedule SET day_id= $dd WHERE Tutor_ID= $tutor_id AND day_id = $dd2";

// executing insertion in lives_in (location) table
if(mysqli_query($link, $sql))
{
    echo "Records Updated successfully.";
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
/*
$sql = "UPDATE tutor_schedule SET day_id= $dd2 WHERE Tutor_ID= $tutor_id AND day_id <> $dd AND day_id <> $dd3 AND day_id <> $dd3";


// executing insertion in lives_in (location) table
if(mysqli_query($link, $sql))
{
    echo "Records Updated successfully.";
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "UPDATE tutor_schedule SET day_id= $dd3 WHERE Tutor_ID= $tutor_id AND day_id <> $dd AND day_id <> $dd3 AND day_id <> $dd3";


// executing insertion in lives_in (location) table
if(mysqli_query($link, $sql))
{
    echo "Records added successfully.";
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/

// attempt insert query into tutor_teaches (location) table 
$sql = "UPDATE tutor_teaches SET subject_id = $ss WHERE Tutor_ID= $tutor_id AND subject_id = $ss2";


// executing insertion in lives_in (location) table
if(mysqli_query($link, $sql))
{
    echo "Records Updated successfully.";

} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
/*

// attempt insert query into tutor_teaches (location) table 
$sql = "UPDATE tutor_teaches SET subject_id = $ss2 WHERE Tutor_ID= $tutor_id AND subject_id <> $ss AND subject_id <> $ss2 AND subject_id <> $ss3";


// executing insertion in lives_in (location) table
if(mysqli_query($link, $sql))
{
    echo "Records added successfully.";

} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// attempt insert query into tutor_teaches (location) table 
$sql = "UPDATE tutor_teaches SET subject_id = $ss3 WHERE Tutor_ID= $tutor_id AND subject_id <> $ss AND subject_id <> $ss2 AND subject_id <> $ss3";


// executing insertion in lives_in (location) table
if(mysqli_query($link, $sql))
{
    echo "Records added successfully.";

} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}*/

//close connection
mysqli_close($link);

?>




