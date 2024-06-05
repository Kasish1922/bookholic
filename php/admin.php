<?php
    session_start();
    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin'] != 1){
            header('login.php');
            exit;
        }
        else{
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'bookart';
            
            // Create a database connection
            $connection = mysqli_connect($host, $username, $password, $database);
            
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $username1 = $_SESSION['username'];
            $query = "Select * from admin where adminEmailId = '$username1' ";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result);
    
            $email = $row['adminEmailId'];
            $password = $row['password'];
        }
    }
    else{
        header("location: art.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Box-icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
    <style>
        .list-group-item a{
            color: black;
        }
    </style>
</head>
<body>
    <div>
        <header style="background-color:gray;z-index:0;">
            <div class="nav container">
                <a href="#" class="logo">Book <span>Art</span></a>
                <div class="nav2">
                    <p>Welcome <?php echo $username1?></p>
                    <form action="#" method="post">
                        <input type="submit" name="submit" value="logout">
                    </form>
                </div>
            </div>
        </header>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $_SESSION['loggedin'] = 0;
            header("location: login.php");
            session_destroy();
            exit;
        }
    ?>
    <div class="card" style="width: 18rem; background-color:gray;position: absolute;top: 50%;left:40%">
    <div class="card-header">
        Tables
    </div>
    <ul class="list-group list-group-flush ">
        <li class="list-group-item"><a href="userTable.php">Users</a></li>
        <li class="list-group-item"><a href="#">books</a></li>
        <li class="list-group-item"><a href="#">Comments</a></li>
    </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>