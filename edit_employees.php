<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
    exit;
}

// Check if the user ID is provided in the URL
if (!isset($_GET['employeeNumber'])) {
    echo "Invalid request";
    exit;
}

// Retrieve the user ID from the URL parameter
$employeeNumber = $_GET['employeeNumber'];

// Fetch the user information from the database based on the provided ID
$query = "SELECT * FROM employees WHERE employeeNumber = $employeeNumber";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Check if the user exists
if (!$row) {
    echo "User not found";
    exit;
}

// Display a form to edit the user information
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body class="bg-dark text-white mx-5 my-2">
    <div class="">
      <div class="d-flex justify-content-between ">
        <h1>Edit User</h1>
        <div class="align-items-center">
            <button class="rounded-pill" style="height:50px; width:200px"><a href="employees.php" class="text-decoration-none text-dark">Back To Employees Page</a> </button>
            <button class="rounded-pill" style="height:50px; width:150px"><a href="admin_page.php" class="text-decoration-none text-dark">Back To Main Page</a> </button>
        </div>
        </div>
    </div>
    
    <div class="my-2">
        <form action="update_user.php" method="POST">
            <input type="hidden" name="employeeNumber" value="<?php echo $employeeNumber; ?>">

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>">

            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>">

            <label for="reportsTo">Reports To:</label>
            <input type="text" name="reportsTo" value="<?php echo $row['reportsTo']; ?>">

            <label for="department">Department:</label>
            <input type="text" name="department" value="<?php echo $row['department']; ?>">

            <button type="submit">Update</button>
        </form>
    </div>
   
</body>
</html>
