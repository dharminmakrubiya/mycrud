<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `task` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

    if ($result == TRUE) 
    {
        header("location: task_view.php" );
        echo "Your Task Deleted Successfully.";
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

} 

?>