<?php
session_start();
require('connection.php');

if(isset($_POST['submit'])){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $username = $_SESSION['username'];

    $query = "SELECT * FROM adminuser WHERE username='$username' AND password='$old_password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        if($new_password == $confirm_password){
            $update_query = "UPDATE adminuser SET password='$new_password' WHERE username='$username'";
            $update_result = mysqli_query($conn, $update_query);

            if($update_result){
                echo "<script>alert('Password updated successfully!');</script>";
                header("Location: logout.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('New password and confirm password do not match.');</script>";
        }
    } else {
        echo "<script>alert('Invalid old password.');</script>";
    }
}

mysqli_close($conn);
?>

<html lang="en">
<head>
    <link href="static/main.css" rel="stylesheet" type="text/css" media="all">

    <title>Admin Change Password</title>
    <link href="img/favicon.png" rel="icon">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #5cbefb, #090d4d);
        }

        .change-password-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            margin-top: 100px;
            
        }

        .change-password-box {
            width: 400px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }


        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #090d4d;
            padding: 10px;
            color: #fff;
        }

        .navbar h2 {
            margin: 0;
            font-size: 24px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #5cbefb;
        }



        h1 {
            text-align: center;
            color: #090d4d;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        input[type="submit"] {
            background-color: #090d4d;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #5cbefb;
        }

        .container {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <h2>Admin Dashboard</h2>
        <a href="dashboard.php">Home</a>
        <a href="bc_data.php">BC Data</a>
        <a href="utp_data.php">UTP Data</a>
        <a href="updateprofile.php">Update Profile</a>
        <a href="changepass.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="change-password-wrapper">
        <div class="change-password-box">
            <h1>Change Password</h1>
            <form action="" method="post">
                <input type="password" name="old_password" placeholder="Old Password" required>
                <input type="password" name="new_password" placeholder="New Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <center><input type="submit" name="submit" value="Change Password"></center>
            </form>
        </div>
    </div>


<footer>
   <div class="container">
      <p>&copy; 2023 UsetoPay. All Rights Reserved.</p>
   </div>
</footer>

</body>
</html>
