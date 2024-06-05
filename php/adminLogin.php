<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
<?php
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$database = 'bookart';

		// Create a database connection
		$connection = mysqli_connect($host, $username, $password, $database);

		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Check if the login form is submitted
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$upassword = $_POST['password'];
            echo $email;
			// Query the database to retrieve the user's hashed password based on the provided email
			$query = "SELECT * FROM admin WHERE adminEmailId = '$email'";
			$result = mysqli_query($connection, $query);
			// echo "Php works";
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				$username = $row['adminEmailId'];
				$storedPassword = $row['password'];
				// Verify the password
				if ($upassword == $storedPassword) {
					session_start();
					$_SESSION['loggedin'] = 1;
					echo $_SESSION['loggedin'];
					$_SESSION['username'] = $username;
					$_SESSION['loggedin'] = 1;
					header("location: admin.php");
				} else {
					echo "Incorrect email or password. Please try again.";
				}
			} else {
				echo "User not found. Please register or check your email.";
			}
		}

		// Close the database connection
		mysqli_close($connection);
	?>
	<div class="wrapper">
		<h1> Login </h1>
		<form action="adminLogin.php" method="post">
			<div class="form input">
				<label for="email">Enter email-Id</label>
				<input type="email" name="email" id="emailId" autocomplete="off" required><br>
			</div>
			<div class="form input">
				<label for="password">Enter password</label>
				<input type="password" name="password" id="password" autocomplete="off" required><br>
			</div>
			<!-- <button>Submit</button> -->
			<input type="submit" name="login" class="button" value="SubmitBtn">
			<!-- <div class="recover">
				<a href="#">Forgot Password?</a>
			</div> -->
		</form>
	</div>
</body>
</html>