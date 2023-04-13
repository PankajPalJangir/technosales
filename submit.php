<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize the form data
    $name = htmlspecialchars($_POST['name']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $state = htmlspecialchars($_POST['state']);
    $district = htmlspecialchars($_POST['district']);
    $tehsil = htmlspecialchars($_POST['tehsil']);
    $call_status = htmlspecialchars($_POST['call-status']);
    $remark = htmlspecialchars($_POST['remark']);

    // Validate the form data
    if (empty($name) || empty($mobile) || empty($state) || empty($district) || empty($tehsil) || empty($call_status) || empty($remark)) {
        die("Error: All fields are required");
    }

    // Connect to the database
    require('connection.php');

    // Insert the data into the database
    $sql = "INSERT INTO utp_data (name, mobile_number, state, district, tehsil, call_status, remark) VALUES ('$name', '$mobile', '$state', '$district', '$tehsil', '$call_status', '$remark')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Record saved successfully');</script>";
        header("Location: UTP_data_update.php");
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>
