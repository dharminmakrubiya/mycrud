<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $user_id = $_POST['user_id'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $gender = $_POST['gender']; 

        $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['firstname'];

            $lastname = $row['lastname'];

            $email = $row['email'];

            $password  = $row['password'];

            $gender = $row['gender'];

            $id = $row['id'];

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
            <input type="text" class="form-control item" name="firstname" value="<?php echo $first_name; ?>">
        </div>

            <input type ="hidden" name="user_id" value="<?php echo $id; ?>">

        <div class="form-group">
            <input type="text" class="form-control item" name="lastname" value="<?php echo $lastname; ?>">
        </div>

        <div class="form-group">
            <input type="email" class="form-control item" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="form-group">
            <input type="password" class="form-control item" name="password" value="<?php echo $password; ?>">
        </div>

            Gender:<br>

            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male

            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female

            <br><br>

            <div class="form-group">
            <input type="submit" class="btn btn-block create-account" value="Update" name="update">
            </div>

          </fieldset>

        </form> 
        <div class="social-media">
        </div>
        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 