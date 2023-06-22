<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

$employees = "SELECT * FROM employees";

$result = mysqli_query($conn, $employees);
while ($row = mysqli_fetch_assoc($result)) {
  /*  echo "First Name: " . $row["firstName"] . "<br>";
   echo "Last Name: " . $row["lastName"] . "<br>";
   echo "Email: " . $row["email"] . "<br>"; */
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body class="bg-dark">
   
<div class="container my-5">
   <div class="content flex-row text-white">
      <h1 class="text-white">Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <br>
      <p class=" align-items-center ps-1"> this is an Super Admin page</p>
      <a href="users.php" class="btn">update users</a>
   </div>
   <div class="content flex-row my-3">
   <a href="employees.php" class="btn">update employees</a>
   </div>
   <div class="content flex-row my-3">
   <a href="logout.php" class="btn">logout</a>
   </div>
</div>

</body>
</html>