<?php
    include_once("config.php");
    
    if(isset($_POST['login'])) {
        $name = $_POST['username'];
        $pass = $_POST['userpassword']; 

        $sql = "SELECT * FROM users WHERE username = '$name' and password = '$pass'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $user_data = mysqli_fetch_array($result);
            header("Location: home.php?id=$user_data[id]");
        } else {
            echo $wrong;
        }
    }
    mysqli_close($conn);
?>

<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <div class="login-page">
        <div class="form">
            <form method="post" class="login-form">
            <input type="text" name="username" placeholder="username"/>
            <input type="password" name="userpassword" placeholder="password"/>
            <input type="submit" id="button" name="login" value="login">
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
            </form>
        </div>
        </div>

        <script src="js/script.js"></script>
</body>
</html>
