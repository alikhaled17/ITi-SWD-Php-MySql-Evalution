<?php
    include_once("config.php");
    $c = ($_GET['c'] == '1')? '0' : '1';
    $task_id = $_GET['task_id']; 


    $result = mysqli_query($conn, "UPDATE tasks SET complet='$c' WHERE id=$task_id");

    header("Location:home.php?id=$_GET[uid]");
    
?>