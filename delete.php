<?php
    include_once("config.php");
    $id = $_GET['id']; //1
    $result = mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
    header("Location:home.php?id=$_GET[uid]");
?>