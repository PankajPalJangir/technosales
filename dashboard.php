<?php
session_start();
require('connection.php');

if(!isset($_SESSION['id'])){
    header("Location: adminlogin.php");
    exit();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="img/favicon.png" rel="icon">
    <link href="static/main.css" rel="stylesheet" type="text/css" media="all">
<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #5cbefb, #090d4d);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            gap: 2px;
            align-items: center;
            background-color: #090d4d;
            padding: 10px;
            color: #fff;
        }

        .navbar h2 {
            margin: 0;
            font-size: 24px;
            text-align: left;
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

        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
            
        }

        .dashboard-box {
            width: ;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }



        h1 {
            text-align: center;
            color: #090d4d;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0 0 0;
            align-items: center;
            display: flex;
            gap: 5px;
            }


        li {
            padding: 10px;
            background-color: #5cbefb;
            color: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
            flex-direction: column;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }

        .logout a {
            color: #fff;
            text-decoration: none;
            background-color: #090d4d;
            padding: 10px;
            border-radius: 5px;
        }

        .logout a:hover {
            background-color: #5cbefb;
        }

        .container {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }

        table {
          border-collapse: collapse;
          width: 100%;
          margin: 0 auto;
          font-size: 1rem;
        }

        th,
        td {
          padding: 0.75rem;
          text-align: left;
          vertical-align: middle;
          border: 1px solid #090d4d;
        }

        th {
          font-weight: bold;
          color: #090d4d;
          background-color: #f5f5f5;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2;
          color: #090d4d;
        }

        tr:hover {
          background-color: #ddd;
        }

        p {
            font-weight: bold;
            color: #090d4d;
        }
        
</style>
</head>
<body>
    <nav class="navbar">
        <h2>Admin Dashboard</h2>
        <a href="dashboard.php">Home</a>
        <a href="bc_data.php">BC Data</a>
        <a href="utp_data_view.php">UTP Data View</a>
        <a href="utp_data_update.php">UTP Data Update</a>    
        <a href="updateprofile.php">Update Profile</a>
        <a href="changepass.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="dashboard">
    <div class="dashboard-box" style="width: 1200px; height: 450px;">
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <div class="dashboard-flex-container">
            <div class="dashboard-box" style="width: 550px; height: 320px;">
                <?php
                    require('connection.php');

                    // Select tables and get row counts
                    $table_data = array(
                        "adminuser" => "adminuser",
                        "bc_data" => "bc_data",
                        "d_data" => "d_data",
                        "emitra_lsp_list" => "emitra_lsp_list",
                        "utp_data" => "utp_data"
                    );


                    foreach ($table_data as $table_name => $table_display_name) {
                        $sql = "SELECT COUNT(*) as count FROM $table_name";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $count = $row['count'];
                        $table_data[$table_name] = $count;
                    }

                    // Close database connection
                    $conn->close();
                ?>

                <!-- Display row counts in a table -->
                <center><h2 style="color: #090d4d;">Database Statistics</h2></center>
                <table>
                    <thead>
                        <tr>
                            <th>Database Name</th>
                            <th>Total Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($table_data as $table_name => $count) { ?>
                            <tr>
                                <td><?php echo $table_name; ?></td>
                                <td><?php echo $count; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="dashboard-box" style="width: 550px; height: 320px;">
                <center><h2 style="color: #090d4d;">Profile</h2></center>
                <?php
                    require('connection.php');

                    // retrieve current user's profile
                    $username = $_SESSION['username'];
                    $sql = "SELECT * FROM adminuser WHERE username='$username'";
                    $result = $conn->query($sql);

                    // display current user's profile
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Name: " . $row["username"] . "</p>";
                        echo "<p>Employee Code: " . $row["empcode"] . "</p>";
                        echo "<p>Email: " . $row["email"] . "</p>";
                        echo "<p>Phone: " . $row["phone"] . "</p>";
                        echo "<p>Address: " . $row["address"] . "</p>";
                        echo "<p>Gender: " . $row["gender"] . "</p>";
                        echo "<p>Date of Birth: " . $row["dob"] . "</p>";
                    } else {
                        echo "No profile found for current user";
                    }

                    // close database connection
                    $conn->close();
                ?>

                    

            </div>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</div>

<style>
.dashboard-flex-container {
  display: flex;
  flex-direction: row;
  gap: 5px;
}
</style>

<footer>
   <div class="container">
      <p style="font-weight: bold; color: #FFFFFF;";> &copy; 2023 UsetoPay. All Rights Reserved.</p>
   </div>
</footer>


</body>
</html>
