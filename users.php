<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

$users = "SELECT * FROM user_form";

$result = mysqli_query($conn, $users);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
</head>
<body class="bg-dark mx-2">
   <div>
      <div class="d-flex justify-content-between my-2">
         <h1 class="text-white">User Table</h1>
         <button class="rounded-pill"><a href="admin_page.php" class="text-decoration-none text-dark">Back To Main Page</a> </button>
      </div>
   
   <?php
      echo '<table class="table table-dark">';
      echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>Name</th>';
      echo '<th>Email</th>';
      echo '<th>Password</th>';
      echo '<th>User Type</th>';
      echo '<th>Action</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row["id"] . '</td>';
      echo '<td>' . $row["name"] . '</td>';
      echo '<td>' . $row["email"] . '</td>';
      echo '<td>' . $row["password"] . '</td>';
      echo '<td>' . $row["user_type"] . '</td>';
      echo '<td><button class="rounded-pill text-bg-danger"><a href="edit_user.php?id=' . $row["id"] . '" class="text-dark text-decoration-none">Edit</a></button></td>';
      echo '</tr>';
      }
      echo '</table>';
   ?>
   
   </div>
  
</body>
</html>