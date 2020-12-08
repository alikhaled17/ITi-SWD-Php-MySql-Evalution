<?php
    include_once("config.php");
    if(isset($_POST['addtask'])) {
        $task = $_POST['newtask'];
        $u_id =  $_GET['id']; 

        if($task == "") {
            echo "No tasks to added!";
        } else {
            $sql = "INSERT INTO tasks (task, userid) VALUES ('$task','$u_id')";
            mysqli_query($conn, $sql);
            header("Location:home.php?id=$u_id");
        }
    }
?>


<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<h2>
            <?php
                $user_id = $_GET['id'];
                $user = mysqli_fetch_array(mysqli_query($conn, "SELECT username FROM users WHERE id = '$user_id'"));
                echo "Hello (" . $user['username'] . ")";
            ?>
        </h2>
		<h3>Add Item</h3>
		<p>
            <form method="post">
                <input type="newtask" name="newtask" id="newtask" >
                <input type="submit" name="addtask" id="add" value="Add" >
            </form>
		</p>
      
		<h3>Todo</h3>
		<ul id="incomplete-tasks">
            <?php
            
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM tasks where userid = '$user_id' and complet = '0'";
                $result = mysqli_query($conn, $sql) or die( mysqli_error($mysqli));
                while($task_info = mysqli_fetch_array($result)) {
                    echo "<li>";

                    echo "<a href='comp.php?c=0&task_id=". $task_info['id'] ."&uid=". $user_id ."'>
                        <span>x</span> </a>";

                    echo "<span id='span'>" . $task_info['task']."</span>";
                    echo "<button class='delete'>
                            <a href='delete.php?id=". $task_info['id'] ."&uid=". $user_id ."'>Delete</a>
                        </button>";
                    echo "</li>";
                }
                
            ?>
		</ul>

		<h3>Completed</h3>
		<ul id="completed-tasks">
            <?php
                
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM tasks where userid = '$user_id' and complet = '1'";
                $result = mysqli_query($conn, $sql) or die( mysqli_error($mysqli));
                while($task_info = mysqli_fetch_array($result)) {
                    echo "<li>";

                    echo "<a href='comp.php?c=1&task_id=". $task_info['id'] ."&uid=". $user_id ."'>
                        <span>x</span> </a>";

                    echo "<span id='span'>" . $task_info['task']."</span>";
                    echo "<button class='delete'>
                            <a href='delete.php?id=". $task_info['id'] ."&uid=". $user_id ."'>Delete</a>
                        </button>";
                    echo "</li>";
                }
                
            ?>
        </ul>
        
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>
