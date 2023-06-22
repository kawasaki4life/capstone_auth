<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

$employees = "SELECT * FROM employees";

$result = mysqli_query($conn, $employees);

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
         <h1 class="text-white">Employee Table</h1>
         <button class="rounded-pill"><a href="admin_page.php" class="text-decoration-none text-dark">Back To Main Page</a> </button>
      </div>
   
   <?php
      echo '<table class="table table-dark">';
      echo '<tr>';
      echo '<th>Employee Number</th>';
      echo '<th>Last Name</th>';
      echo '<th>First Name</th>';
      echo '<th>Email</th>';
      echo '<th>Reports To</th>';
      echo '<th>Job Title</th>';
      echo '<th>Department</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row["employeeNumber"] . '</td>';
      echo '<td>' . $row["lastName"] . '</td>';
      echo '<td>' . $row["firstName"] . '</td>';
      echo '<td>' . $row["email"] . '</td>';
      echo '<td>' . $row["reportsTo"] . '</td>';
      echo '<td>' . $row["jobTitle"] . '</td>';
      echo '<td>' . $row["department"] . '</td>';
      echo '<td><button class="rounded-pill text-bg-danger"><a href="edit_employees.php?employeeNumber=' . $row["employeeNumber"] . '" class="text-dark text-decoration-none">Edit</a></button></td>';
      echo '</tr>';
      }
      echo '</table>';
   ?>
   
   </div>
  
</body>
</html>