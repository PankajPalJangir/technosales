<?php
    // Start session and connect to database
    session_start();
    require('connection.php');

    // Check if username is set in session
    if (!isset($_SESSION['username'])) {
        echo "Username not set in session.";
        exit();
    }

    // Retrieve current user's profile
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM adminuser WHERE username='$username'";
    $result = $conn->query($sql);

    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_SESSION['username'];
        $empcode = $_POST['empcode'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        // Update user's profile
        $updateSql = "UPDATE adminuser SET username='$username', empcode='$empcode', email='$email', phone='$phone', address='$address', gender='$gender', dob='$dob' WHERE username='$username'";
        if ($conn->query($updateSql) === TRUE) {
            echo "<script>alert('Profile updated successfully!');</script>";

           
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    }

    // Display current user's profile information in a form
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<html lang="en">
<head>
    <link href="static/main.css" rel="stylesheet" type="text/css" media="all">

    <title>Admin Update Profile</title>
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

        

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        select {
            width: 30%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        label {
            font-weight: bold;
            color: #090d4d;
        }

        input {
            width: 35%;
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
        <div class="change-password-box" style="width: 700px; height: 390px;">
            <h1 style="margin-top: 0px; margin-bottom: 6px;">Update Profile</h1>
            <form method="post">
                <label for="name">Name: </label> 
                <input type="text" name="username" value="<?php echo $row['username']; ?>" readonly>
                
                <label for="empcode">Employee Code:</label>
                <input type="text" name="empcode" value="<?php echo $row['empcode']; ?>"><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" readonly>

                <label for="phone">Phone:</label>
                <input type="tel" name="phone" value="<?php echo $row['phone']; ?>"><br>

                <label for="address">Address:</label>
                <textarea name="address"><?php echo $row['address']; ?></textarea>

                <label for="gender">Gender:</label>
                <select name="gender">
                    <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if ($row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                </select>

                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" value="<?php echo $row['dob']; ?>"><br>

                <center><input type="submit" value="Update"></center>
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


<?php
    } else {
        echo "No profile found for current user";
    }

    // Close database connection
    $conn->close();
?>
