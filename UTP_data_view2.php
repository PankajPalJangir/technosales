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
    <title>Search UTP Data</title>
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
            height: auto;
            overflow-y: auto;
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
            <h1>UTP DATA For Calling</h1>
<?php

// Set the number of records to display per page
$records_per_page = 10;

// Get the total number of records in the table
$sql = "SELECT COUNT(*) FROM utp_data";
$result = mysqli_query($conn, $sql);
$total_records = mysqli_fetch_array($result)[0];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Get the current page number
if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// Calculate the offset of the first record to display on the current page
$offset = ($current_page - 1) * $records_per_page;

// Fetch data from the database for the current page
$sql = "SELECT * FROM utp_data LIMIT $offset, $records_per_page";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Show the data in a table and allow to update remark
    echo '<table border 2>
          <tr>
            <th>Sr No.</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>State</th>
            <th>District</th>
            <th>Tehsil</th>
            <th>Call Status</th>
            <th>Remark</th>
            <th>Action</th>
          </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
              <td>' . $row['id'] . '</td>
              <td>' . $row['name'] . '</td>
              <td>' . $row['mobile_number'] . '</td>
              <td>' . $row['state'] . '</td>
              <td>' . $row['district'] . '</td>
              <td>' . $row['tehsil'] . '</td>
              <td>
                
    <form method="post" action="">
        <select name="call_status">
            <option value="Interested" ' . ($row['call_status'] == 'Interested' ? 'selected' : '') . '>Interested</option>
            <option value="Not Interested" ' . ($row['call_status'] == 'Not Interested' ? 'selected' : '') . '>Not Interested</option>
            <option value="Not Answering"' . ($row['call_status'] == 'Not Answering' ? 'selected' : '') . '>Not Answering</option>
            <option value="Information Shared" ' . ($row['call_status'] == 'Information Shared' ? 'selected' : '') . '>Information Shared</option>
            <option value="Out of Network" ' . ($row['call_status'] == 'Out of Network' ? 'selected' : '') . '>Out of Network</option>
            <option value="Under Process" ' . ($row['call_status'] == 'Under Process' ? 'selected' : '') . '>Under Process</option>
            <option value="Switched Off" ' . ($row['call_status'] == 'Switched Off' ? 'selected' : '') . '>Switched Off</option>
            <option value="Busy" ' . ($row['call_status'] == 'Busy' ? 'selected' : '') . '>Busy</option>
            <option value="DND" ' . ($row['call_status'] == 'DND' ? 'selected' : '') . '>DND</option>
            <option value="Invalid Mobile Number" ' . ($row['call_status'] == 'Invalid Mobile Number' ? 'selected' : '') . '>Invalid Mobile Number</option>
            <!-- Add more options as needed -->
            </select>
            <input type="hidden" name="id" value="' . $row['id'] . '">
            </td>
            <td>
            <textarea rows="5" cols="50" type="text" name="remark">' . $row['remark'] . '</textarea>
            <input type="hidden" name="id" value="' . $row['id'] . '">
            </td>
            <td>
            <input type="submit" name="update" value="Update">
            </td>
            </tr>';
            }
                echo '</table>';
            } else {
                echo '<p>No data found for the provided mobile number.</p>';
            }


        // Check if call status or remark is updated
        if (isset($_POST['update'])) {
        $call_status = $_POST['call_status'];
        $remark = $_POST['remark'];
        $id = $_POST['id'];

        // Update the call status and remark for the provided id
        $sql = "UPDATE utp_data SET call_status = '$call_status', remark = '$remark' WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Call status and remark updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating call status and remark: ' . mysqli_error($conn));</script>";
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
