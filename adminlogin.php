<?php
session_start();
require('connection.php');
?>

<html lang="en">
<head>
    <link href="static/main.css" rel="stylesheet" type="text/css" media="all">

<title>Admin Login</title>
<link href="img/favicon.png" rel="icon">
  <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #5cbefb, #090d4d);
        }

        .container {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            margin-top: 100px;
            
        }

        .login-box {
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

        input[type="text"], input[type="password"] {
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
    <div class="login-wrapper">
	    <div class="login-box">
        <center><img src="img/UTP_logo.png"></center>    
	    <!--<center><img src="img/Tech_logo.png" style="width: 400px; height: 100px;"></center>-->
	      <h1>Admin Login</h1>
	      <form action="" method="post">
	        <input type="text" name="username" placeholder="Username">
	        <input type="password" name="password" placeholder="Password">
	        <center><input type="submit" name="submit" value="Login"></center>
	      </form>
	    </div>
	</div>


    <?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM adminuser WHERE email='$username' AND password='$password'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) == 1){
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			header("Location: dashboard.php");
		} else {
			echo "<script>alert('Invalid username or password.');</script>";
		}
	}
	?>

<footer>
   <div class="container"> 
      <a href="adduser.php" style="color: #FFFFFF;"><p>&copy; 2023 UsetoPay. All Rights Reserved.</p></a>
   </div>
</footer>

</body>
</html>

<?php
mysqli_close($conn);
?>
