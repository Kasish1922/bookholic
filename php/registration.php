<!DOCTYPE html>
<!DOCTYPE html >
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> registration </title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="wrapper">
        <h1> Create an Account </h1>
        <form action="registration.php" method="post">
            <div class="field input">
                <label for="uname"> Enter your name </label>
                <input type="text" name="uname" id="name" autocomplete="off " required> <br>
            </div>
            <div class="field input">
                <label for="emailId"> Enter your mail id </label>
                <input type="email" name="emailId" id="emailId" autocomplete="off" required> <br>
            </div>
            <div class="field input">
                <label for="password"> Enter your password </label>
                <input type="password" name="password" id="password" autocomplete="off" required> <br>
            </div>
            <div class="field input">
                <label for="cnfPassword"> Confirm your password </label>
                <input type="password" name="cnfPassword" id="cnfpassword" autocomplete="off" required> <br>
            </div>
            <button> Submit </button>
            <div class="account">
                <label> Already have an account ? </label><span><a href="login.php">Login</a > </span>
            </div>
            <!-- </span> Go to Home Page <a href="art.php">Home</a> -->
        </form>
    </div>
    </div>
</body>

</html>
    <?php
        $uname = $_POST["uname"];
        $email = $_POST["emailId"];
        $upassword = $_POST["password"];
        $cnfPassword = $_POST["cnfPassword"];


        if(!empty($uname) && !empty($email) && !empty($upassword) && !empty($cnfPassword)){
            if($upassword === $cnfPassword){

                    $host = 'localhost';
                    $username = 'root';
                    $password = '';
                    $database = 'bookart';

                    // Create a database connection
                    $connection = mysqli_connect($host, $username, $password, $database);

                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    //INSERT 
                    // $sql = "INSERT INTO `registrationn`(`uname`, `emailid`, `pasword`, `cnfPassword`) VALUES ('$uname', '$email', '$password', '$cnfPassword')";
                    // $result = $connection->query($sql);
                    // // "INSERT INTO registrationn (uname, emailid, pasword, cnfPassword) VALUES ('$uname', '$email', '$password', '$cnfPassword')";
                    // Fetch the highest existing user ID
                    $query = "SELECT MAX(uid) AS max_id FROM registration";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);

                    // Calculate the next user ID
                    $nextUserID = $row['max_id'] + 1;

                    // // Format the user ID to be 3 digits long
                    $formattedUserID = sprintf("%03d", $nextUserID);

                    // // Assuming you have received user registration data from a form
                    // // Replace the placeholders below with actual user data
            
                    // // Insert the new user into the database with the generated user ID
                    $insertQuery = "INSERT INTO registration (uid, uname, password, email ) VALUES ('$formattedUserID', '$uname', '$upassword','$email')";
                    if (mysqli_query($connection, $insertQuery)) {
                        echo "User registered successfully with UID: $formattedUserID";
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }

                    // // Close the database connection
                    mysqli_close($connection);

            }
        }
        else{
            echo "Invalid data!!";
        }

    ?>
</body>
</html>