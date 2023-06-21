<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

$users = "SELECT * FROM user_form";

$result = mysqli_query($conn, $users);
while ($row = mysqli_fetch_assoc($result)) {
   echo "ID: " . $row["id"] . "<br>";
   echo "Name: " . $row["name"] . "<br>";
   echo "Email: " . $row["email"] . "<br>";
   echo "Password: " . $row["password"] . "<br>";
   echo "User: " . $row["user_type"] . "<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        



</body>
</html>