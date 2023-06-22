<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
    exit;
}

// Check if the user ID is provided in the URL
if (!isset($_GET['id'])) {
    echo "Invalid request";
    exit;
}

// Retrieve the user ID from the URL parameter
$userID = $_GET['id'];

// Fetch the user information from the database based on the provided ID
$query = "SELECT * FROM user_form WHERE id = $userID";
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
      <div class="d-flex justify-content-between">
        <h1>Edit User</h1>
        <div>
            <button class="rounded-pill" style="height:50px; width:150px"><a href="users.php" class="text-decoration-none text-dark">Back To Users Page</a> </button>
            <button class="rounded-pill" style="height:50px; width:150px"><a href="admin_page.php" class="text-decoration-none text-dark">Back To Main Page</a> </button>
        </div>
        </div>
    </div>
    

    <form action="update_user.php" method="POST">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>">

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $row['password']; ?>">

        <label for="user_type">User Type:</label>
        <input type="text" name="user_type" value="<?php echo $row['user_type']; ?>">

        <button type="submit">Update</button>
    </form>
</body>
</html>
