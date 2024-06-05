<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="wrapper">
        <h1> Login </h1>
        <form action="login.php" method="post">
            <div class="form input">
                <label for="email">Enter email-Id</label>
                <input type="email" name="email" id="emailId" autocomplete="off" required><br>
            </div>
            <div class="form input">
                <label for="password">Enter password</label>
                <input type="password" name="password" id="password" autocomplete="off" required><br>
            </div>
            <button>Submit</button>
            <!-- <div class="recover">
                <a href="#">Forgot Password?</a>
            </div> -->
            <div class="account">
                Don't have an account? <a href="registration.html">Sign Up Now</a><br> Go to Home Page <a href="art.php">Home</a>
            </div>
    </div>
    </form>
    </div>
    </div>
    <!-- Go to Register <a href="registration.php">Registration</a> Go to Home Page <a href="art.php">Home</a> -->
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>
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
        
            // Query the database to retrieve the user's hashed password based on the provided email
            $query = "SELECT * FROM registration WHERE email = '$email'";
            $result = mysqli_query($connection, $query);
        
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $username = $row['uname'];
                $storedPassword = $row['password'];
                $SESSION['loggedin'] = 0;
                echo $username;
                echo $SESSION['loggedin'];
                // Verify the password
                if ($upassword == $storedPassword) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = 1;
                    header("location: welcome.php");
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
    
    