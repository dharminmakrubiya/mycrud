<?php 


include "config.php";

if (isset($_POST['update'])) 
{

    $task = $_POST['task'];

    $user_id = $_POST['user_id'];


    $sql = "UPDATE task SET task = '$task'  WHERE id = '$user_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) 
    {

        echo "Your Task Updated Successfully.";

    }
    else
    {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

if (isset($_GET['id'])) 
{

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `task` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    {        

        while ($row = $result->fetch_assoc()) 
        {

            $task = $row['task'];

            $id = $row['id'];

        } 


    ?>


    <!DOCTYPE html>

    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>MY Task</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>

            <div class="registration-form">

                <form action="" method="POST">

                    <div class="form-icon">
                        <span><i class="icon icon-notebook"></i></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="task" class="form-control item" placeholder="Update Your Task" value="<?php echo $task; ?>">
                    </div>

                    <input type ="hidden" name="user_id" value="<?php echo $id; ?>">


                    <div class="form-group">
                        <input type="submit" name="update" value="Update Your Task" class="btn btn-block create-account">
                    </div>

                </form>

                <div class="social-media">

                </div>
            </div>

        </body>
    </html>
<?php

} else{ 

    header('Location: view.php');

} 

}

?> 