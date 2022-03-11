<?php 

include "config.php";

$sql = "SELECT * FROM task";

$result = $conn->query($sql);

?>


<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <h2 align="center">User Tasks </h2>
        <h3 align="right"><a href="logout.php">Log-out</a></h3>
    </div>


    <table class="table">


    <thead>

        <tr>
            <th>ID</th>
            <th>Tasks</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['task']; ?></td>

                    <td><a class="btn btn-info" href="update_task.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                



    </tbody>

</table>




</body>
</html>