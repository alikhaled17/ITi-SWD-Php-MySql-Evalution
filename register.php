<?php
    include_once("config.php");

    if(isset($_POST['create'])) {
        $name = $_POST['username'];
        $pass = $_POST['password']; 
        $r_pass = $_POST['r_password']; 

        $sql = "SELECT * FROM users WHERE username = '$name'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);

        if ($rows == 0) {
            if($pass == $r_pass){
                $sql = "INSERT INTO users (username, password) VALUES ('$name','$pass')";
                mysqli_query($conn, $sql);
                echo $right;
            } else {
                echo $wrong;  
            }
        } else {
            echo $wrong; 
        }

    }


    // mysqli_close($conn);
?>


<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <div class="login-page">
            <div class="form">
                <form method="post" class="register-form">
                <input type="text" name="username" placeholder="name"/>
                <input type="password" name="password" placeholder="password"/>
                <input type="password" name="r_password" placeholder="repeat password"/>
                <input type="submit" id="button" name="create" value="create">
                <p class="message">Already registered? <a href="index.php">Sign In</a></p>
                </form>
            </div>
        </div>
        <script src="js/script.js"></script>
</body>
</html>
