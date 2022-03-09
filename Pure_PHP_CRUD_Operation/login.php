<?php 

include 'config.php';

error_reporting(0);

$email = $_POST['email'];
$password = $_POST['password'];



$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{
   session_start();   
   $_SESSION["email"] = $email;
   $_SESSION["password"] = $password;

   header("Location: view.php");
}
else
{

	// echo ("<script LANGUAGE='JavaScript'>
 //    window.alert('Email Or Password Not Correct...!');
 //    window.location.href='create.php';
 //    </script>");

}

 ?>

<!DOCTYPE html>

<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="registration-form">
<form action="" method="POST">
    <div class="form-icon">
       <span><i class="icon icon-user"></i></span>
    </div>

    <div class="form-group">
      <input type="email" name="email" class="form-control item" placeholder="Email"
      pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title="Enter Valid Email Address Please..!">
    </div>

   
    <div class="form-group">
      <input type="password" name="password" class="form-control item" placeholder="Password"
      data-type="password" required 
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
    </div>

     <div class="form-group">
      <input type="submit" name="submit" value="Log-In" class="btn btn-block create-account">
    </div>
</form>
<div class="social-media">
            <h5>Don't have an account?</h5>
            <div class="social-icons">
                <a href="create.php"><i class="icon icon-user"></i></a>
            </div>
</div>
</div>
</div>
</body>
</html>
