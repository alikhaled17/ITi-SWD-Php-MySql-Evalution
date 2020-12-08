<?php

$conn = new mysqli("localhost", "root", "", "TODOLIST_DB");

if (! $conn) {
  echo $conn->connect_error;
  exit;
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT(6)  AUTO_INCREMENT PRIMARY KEY,
    task text(30) NOT NULL,
    complet ENUM('0','1') default '0',
    userid int not null,
    FOREIGN KEY (userid) REFERENCES users(id)
)";
mysqli_query($conn, $sql);

// $sql = "INSERT INTO users (username, password) VALUES ('ali', '123')";
// mysqli_query($conn, $sql);

// $sql = "INSERT INTO tasks (task, userid) VALUES ('sonthing good!', 1)";
// mysqli_query($conn, $sql);

$wrong = "
    <style>
        .form {
            border: 2px solid red;
        }
    </style>
";

$right = "
    <style>
        .form {
            border: 2px solid green;
        }
    </style>
";

?>