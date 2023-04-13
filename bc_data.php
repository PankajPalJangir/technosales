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
    <title>BC Data</title>
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

        input[type="text"] {
            width: 200px;
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
        
    <div class="dashboard">
        <div class="dashboard-box" style="width: 1200px; height: 450px;">
            <h1>All India BC DATA</h1>


            <!-- HTML form to input mobile number for search -->
            <center>
            <form method="post" action="">
                <label for="mobile_number" style="color: #090d4d; font-weight: bold;">Enter Mobile Number:</label>
                <input type="text" name="mobile_number" required>
                <input type="submit" name="search" value="Search">
            </form></center>  <br><br>



            <?php
                
                //Check if mobile number is submitted
                if (isset($_POST['search'])) {
                    $mobile_number = $_POST['mobile_number'];
                    
                    //Fetch data from database for the provided mobile number
                    $sql = "SELECT * FROM bc_data WHERE Mobile_No = '$mobile_number'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        //Show the data in a table and allow to update remark
                        echo '<table border 2>
                              <tr>
                                <th>Sr No.</th>
                                <th>State</th>
                                <th>District</th>
                                <th>BCs Name</th>
                                <th>Mobile No.</th>
                                <th>Pincode</th>
                                <th>Bank Name</th>
                                <th>Remark</th>
                              </tr>';
                              
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                  <td>' . $row['Sr_No'] . '</td>
                                  <td>' . $row['State'] . '</td>
                                  <td>' . $row['District'] . '</td>
                                  <td>' . $row['BCs_Name'] . '</td>
                                  <td>' . $row['Mobile_No'] . '</td>
                                  <td>' . $row['Pincode'] . '</td>
                                  <td>' . $row['Bank_Name'] . '</td>
                                  <td>
                                    <form method="post" action="">
                                    <textarea rows="5" cols="50" type="text" name="remark" value="' . $row['Remark'] . '"></textarea>
                                    <input type="hidden" name="id" value="' . $row['Sr_No'] . '">
                                    <input type="submit" name="update" value="Update">
                                    </form>
                                  </td>
                                </tr>';
                        }
                        
                        echo '</table>';
                    } else {
                        echo '<p>No data found for the provided mobile number.</p>';
                    }
                }

                //Check if remark is updated
                if (isset($_POST['update'])) {
                    $remark = $_POST['remark'];
                    $id = $_POST['id'];
                    
                    //Update the remark for the provided id
                    $sql = "UPDATE bc_data SET Remark = '$remark' WHERE Sr_No = '$id'";
                    
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Remark updated successfully!');</script>";
                    } else {
                        echo "<script>alert('Error updating remark: ' . mysqli_error($conn) . );</script>";
                    }
                }

                //Close database connection
                mysqli_close($conn);
                ?>

        </div>
    </div>

<footer>
   <div class="container">
      <p>&copy; 2023 UsetoPay. All Rights Reserved.</p>
   </div>
</footer>


</body>
</html>
