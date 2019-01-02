<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(Tutor_ID, userName,userEmail,userPass) VALUES('$last_id', '$name','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $last_id = mysqli_insert_id($link); // keeping track with last_person_id.
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="">Sign Up.</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <a href="index.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>





<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="loginPageDesign.css">
<body>


  <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>



<h3>Tutors Registration Form</h3>

<div id ="id01" class="modal">

  <form class="modal-content animate" action="Registration_form.php" method="post">

<div class="container">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="first_name" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="last_name" placeholder="Your last name.." required>

    <label for="genderr">Gender</label>
    <input type="text" id="genderr" name="gender" placeholder="ex : Male/Female" required>

  

    <label for="location">Location :</label>
    <input type="text" id="location" name="location" placeholder="ex : Uttara/Mirpur" required>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email address.." required>

    <label for="phone_number">Phone Number</label>
    <input type="text" id="phonenumber" name="phone_number" placeholder="Your Phone number.." required>

    <hr>

    <label for="universityname">University</label>
    <input type="text" id="universityname" name="university_name" placeholder="Your University name.." required>

    <label for="departmentname">Department</label>
    <input type="text" id="departmentname" name="department_name" placeholder="Your Department name.." required>

    <label for="uvcgpa">Current CGPA</label>
    <input type="text" id="uvcgpa" name="uvcgpa" placeholder="Your Current CGPA.." required>

     <label for="uv_from_to">From - To </label>
    <input type="text" id="uv_from_to" name="uv_from_to" placeholder="ex: 2000-2004.." required>
    <hr>

     <hr>

    <label for="college_name">College</label>
    <input type="text" id="college_name" name="college_name" placeholder="Your College name.." required>



    <label for="clg_dept">College Department</label>
    <input type="text" id="clg_dept" name="clg_dept" placeholder="ex : Science/Arts/Commerce" required>

    
    <label for="clg_gpa">HSC/A level Result</label>
    <input type="text" id="clg_gpa" name="clg_gpa" placeholder="Your GPA.." required>

     <label for="clg_from_to">From - to </label>
    <input type="text" id="clg_from_to" name="clg_from_to" placeholder="ex: 2000-2004.." required>
    <hr>

     <hr>

    <label for="scl_name">School</label>
    <input type="text" id="scl_name" name="scl_name" placeholder="Your School name.." required>


  <label for="scl_dept">School Department</label>
  <input type="text" id="scl_dept" name="scl_dept" placeholder="ex : Science/Arts/Commerce" required>


    <label for="scl_gpa">SSC/O level ResultGPA</label>
    <input type="text" id="scl_gpa" name="scl_gpa" placeholder="Your GPA.." required>

    <label for="scl_form_to">From - to </label>
    <input type="text" id="scl_form_to" name="scl_form_to" placeholder="ex: 2000-2004.." required>
    <hr>


     <hr>

    <label for="days">Available Days </label>
    <input type="text" id="days" name="days" placeholder="Saturday, Sunday.." required>


    <label for="time">Available Time</label>
    <input type="text" id="time" name="time" placeholder="ex: 9.00am - 11.00am, 3.00pm - 5.00pm" required>


    <label for="medium">Medium </label>
    <input type="text" id="medium" name="medium" placeholder="English/ Bangla.." required>

    <label for="classes">Available Classes</label>
    <input type="text" id="classes" name="classes" placeholder="ex: 5, 6, 7, JSC, SSC/A level, HSC/O level..." required>


    <label for="subjects">Available Subjects</label>
    <input type="text" id="lname" name="subjects" placeholder="ex: English, Math, Physics, Chemistry, Biology..." required>
    <br>



    <hr>
    <a href="tutors_Login_form.html" ><input   type="submit" value="Submit"></a> 

  </div>
  </form>
  </div>

  <a href="register.php" ><center> Open Account </center></a> 

</body>
</html>
