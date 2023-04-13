<?php
session_start();
require('connection.php');

if(!isset($_SESSION['id'])){
    header("Location: adminlogin.php");
    exit();
}
?>

<html lang="en">
<head>
    <link href="static/main.css" rel="stylesheet" type="text/css" media="all">

    <title>UTP Data</title>
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

        /* Style for the chat button */
        .chat-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Style for the popup chat window */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 1px solid #555;
            background-color: white;
            width: 300px;
            max-height: 400px;
            overflow-y: scroll;
            border-radius: 5px;
        }

        /* Style for the chat messages */
        .chat-message {
            padding: 10px;
            font-size: 14px;
            word-break: break-all;
            border-bottom: 1px solid #ddd;
        }

        /* Style for the chat input field */
        .chat-input {
            border: none;
            padding: 10px;
            width: 100%;
            resize: none;
            font-size: 14px;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Style for the chat submit button */
        .chat-submit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
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
            <h1 style="margin-top: 0px; margin-bottom: 6px;">UTP Contact Record</h1>
            <!-- Form for the required fields -->
            <form action="submit.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">

                <label for="mobile">Mobile Number:</label>
                <input type="text" id="mobile" name="mobile"><br>

                <label for="state">State:</label>
                <input type="text" id="state" name="state">

                <label for="district">District:</label>
                <input type="text" id="district" name="district"><br>

                <label for="tehsil">Tehsil:</label>
                <input type="text" id="tehsil" name="tehsil">

                <label for="call-status">Call Status:</label>
                <select id="call-status" name="call-status">
                    <option value="called">Called</option>
                    <option value="not-called">Not Called</option>
                </select><br>

                <label for="remark">Remark:</label>
                <textarea id="remark" name="remark"></textarea>

                <center><input type="submit" value="Submit"></center>
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