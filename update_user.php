<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
    exit;
}

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
</head>
<body class="bg-dark">
   <div class="my-3 mx-2">
      <div class="d-flex justify-content-between">
        <div></div>    
         <div>
            <button class="rounded-pill" style="height:50px; width:150px"><a href="users.php" class="text-decoration-none text-dark">Back To Users Page</a> </button>
            <button class="rounded-pill" style="height:50px; width:150px"><a href="admin_page.php" class="text-decoration-none text-dark">Back To Main Page</a> </button>
        </div>
      </div>
      <div class="text-white text-center my-2 fs-1 fw-bolder">
      <?php echo $message ?>    
      </div>
    </div>
    
</body>
</html>