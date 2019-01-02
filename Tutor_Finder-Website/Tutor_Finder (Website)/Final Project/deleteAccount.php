

<?php
 //ob_start();
 //session_start();
 //if( isset($_SESSION['user'])!="" ){
  //header("Location: home.php");
 //}
 include_once 'dbconnect.php';

 //$error = false;

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

  $tutor_id = trim($_POST['tutorid']);
  $tutor_id = strip_tags($tutor_id);
  $tutor_id = htmlspecialchars($tutor_id);
  
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



  // basic tutor_id validation
  if (empty($tutor_id)) {
   $error = true;
   $idError = "Please enter your Tutor ID.";
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
   if($count==0){
    $error = true;
    $emailError = "Provided Email is not in the record.";
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
   
   $query = "DELETE FROM tutor
             WHERE Tutor_ID  = $tutor_id";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully Deleted Your Account";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($errMSG);
   } 
  }

}
?>




<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up form</title>
<link rel="stylesheet" href="style.css" type="text/css" />


<style>
body {

  background-image: url(tutorsregistration.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

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



<h3 style="background-color: hsla(9, 100%, 64%, 0.4)"><div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <center><h2 class="">Sign Up.</h2></center>
            </div>
        
         <center><div class="form-group">
             <hr />
            </div></center>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <center><div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div></center>
                <?php
   }
   ?>


            <center><div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="tutorid" class="form-control" placeholder="Enter Tutor ID" maxlength="50" value="<?php echo $tutor_id ?>" />
                </div>
                <span class="text-danger"><?php echo $idError; ?></span>
            </div></center>



            
            <center><div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div></center>
            
           <center> <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div></center>
            
            <center><div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div></center>
            
            <center><div class="form-group">
             <hr />
            </div></center>
            
            <center><div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Delete Account</button>
            </div></center>
            
            <center><div class="form-group">
             <hr />
            </div></center>
            
           <center> <div class="form-group">
             <a href="index.php">Sign in Here...</a>
            </div></center>
        
        </div>
   
    </form>
    </div> 

</div></h3>

</body>
</html>
<?php ob_end_flush(); ?>