<?php 

session_start();
 if(array_key_exists('usermail',$_SESSION) && !empty($_SESSION['usermail']))
 {
  header("Location: index.php");
 }


include "config.php";

  if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $gender = $_POST['gender'];

    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "Congratulations , Your Account Has Been Successfully Created...Please Login Your Account";

    }else {
      echo "Error:". $sql . "<br>". $conn->error;
    } 

    $conn->close();
  }

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY CRUD</title>
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
      <input type="text" name="firstname" class="form-control item" placeholder="First Name">
    </div>

   
    <div class="form-group">
      <input type="text" name="lastname" class="form-control item" placeholder="Last Name">
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
        Gender:
        <input type="radio" class="gender" name="gender"  value="Male">Male
        <input type="radio" class="gender" name="gender"  value="Female">Female

    </div>

    <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-block create-account">
    </div>

    <div class="login">
      Have an account?<a href="login.php">Log-in</a>
    </div>
</form>

<div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
</div>

</body>

</html>