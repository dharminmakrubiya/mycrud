<?php 
    $errors = "";

    $db = mysqli_connect("localhost", "root", "", "mydb");

    if (isset($_POST['submit']))
    {
        if (empty($_POST['task'])) 
        {
            $errors = "You must fill in the task";
        }
        else
        {
            $task = $_POST['task'];
            $sql = "INSERT INTO task (task) VALUES ('$task')";
            mysqli_query($db, $sql);
            header('location: task_view.php');
            echo "Your Task Added Successfully...";
        }
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
            <input type="text" name="task" class="form-control item" placeholder="Enter Task">
        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Add Task" class="btn btn-block create-account">
        </div>

    </form>
    <div class="social-media">
    </div>
</div>

</body>
</html>