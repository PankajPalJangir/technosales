<?php
session_start();
require('connection.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $created_at = date('Y-m-d H:i:s');

    $query = "INSERT INTO adminuser (username, password, email, created_at) VALUES ('$username', '$password', '$email', '$created_at')";
    $result = mysqli_query($conn, $query);

    if($result){
            $message = "New user created successfully!";
            echo "<script>alert('$message');</script>";
        } else {
            $message = "Error: " . mysqli_error($conn);
            echo "<script>alert('$message');</script>";
        }
}

?>

<html lang="en">
<head>
    <link href="static/main.css" rel="stylesheet" type="text/css" media="all">
    <title>Add New Admin User</title>
    <link href="img/favicon.png" rel="icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom right, #5cbefb, #090d4d);
        }

        .form-box {
            width: 400px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #090d4d;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #090d4d;
        }

        input[type="text"], input[type="password"], input[type="email"] {
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

    <div class="form-wrapper">
        <div class="form-box">
            <h1>Add New Admin User</h1>
            <form action="" method="post">
                <label for="username">Name:</label>
                <input type="text" name="username" placeholder="Enter username" required>
              
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter password" required>


                <center><input type="submit" name="submit" value="Add User"></center>
            </form>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
