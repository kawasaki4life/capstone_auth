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
$message="";
function updateUsers(){
    
    // Check if the necessary form data is provided
    if (
        !isset($_POST['userID']) ||
        !isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['password']) ||
        !isset($_POST['user_type'])
    ) {
        // echo "Invalid request";
        $message="Invalid request";
        exit;
    }
    
    // Retrieve the form data
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];
    
    // Hash the password using MD5
    $hashedPassword = md5($password);
    
    // Update the user information in the database
    $query = "UPDATE user_form SET name='$name', email='$email', password='$hashedPassword', user_type='$userType' WHERE id=$userID";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // echo "User updated successfully";
        $message = "User updated successfully";
    } else {
        // echo "Error updating user: " . mysqli_error($conn);
        $message = "Error updating user: " . mysqli_error($conn);
    }
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
    
    <div><?php echo $message ?> </div>
    <form action="" method="POST">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>">

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $row['password']; ?>">

        <label for="user_type">User Type:</label>
        <input type="text" name="user_type" value="<?php echo $row['user_type']; ?>">

        <button type="submit" onclick="usersUpdate()">Update</button>
    </form>
</body>
</html>
