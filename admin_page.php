<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

$employees = "SELECT * FROM employees";

$result = mysqli_query($conn, $employees);
while ($row = mysqli_fetch_assoc($result)) {
   echo "First Name: " . $row["firstName"] . "<br>";
   echo "Last Name: " . $row["lastName"] . "<br>";
   echo "Email: " . $row["email"] . "<br>";
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
<body>
   
<div class="container">
   <div class="content flex-row">
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <br>
      <p class=" align-items-center ps-1"> this is an admin page</p>
      <a href="logout.php" class="btn">logout</a>
   </div>
</div>

</body>
</html>