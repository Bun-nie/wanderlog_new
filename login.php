<?php
require_once 'includes/index_header.php';
include 'connect.php';
include 'api.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - WanderLog</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='css/login_signup.css'>
</head>
<body id="login_body">
<form id="login_form" method="POST">
    <label for="username">Username</label>
    <button type="button" name="btnBack" class="btn btn-outline-dark" style="margin-left: 253px; border-radius: 40px; padding: 8px; margin-bottom: 10px">x</button>
    <br>
    <input type="text" id="txtusername" name="txtusername" placeholder="Enter your username" required>
    <br>
    <label for="password">Password</label>
    <br>
    <input type="password" id="txtpassword" name="txtpassword" placeholder="Enter your password" required>
    <br>
    <input type="submit" name="btnLogin" value="Log In">
    <p>Don't have an account? <a href="signup.php">Register</a></p>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['btnLogin'])) {
        $uname = $_POST['txtusername'];
        $pwd = $_POST['txtpassword'];

        // Use prepared statements for secure querying
        $sql = "SELECT * FROM tbluseraccount WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<script language='javascript'>
                    alert('Username not existing.');
                  </script>";
        } else {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password']; // Ensure this matches the actual column name for password in your database
            $usertype = $row['usertype']; // Ensure this matches the actual column name for usertype
            $isBanned = $row['isBanned'];

            if (!password_verify($pwd, $hashed_password)) {
                echo "<script language='javascript'>
                        alert('Incorrect password');
                      </script>";
            } else if($isBanned == 1){
                echo "<script language='javascript'>
                        alert('User is Banned. Contact Administrator.');
                      </script>";
            }else {
                $_SESSION['username'] = $row['username'];
                $_SESSION['acctid'] = $row['acctid']; // Adjust the column name if different
                
                if ($usertype == 1) {
                    echo '<script> location.replace("admin_homepage.php"); </script>';
                } else {
                    echo '<script> location.replace("homepage.php"); </script>';
                }
                exit();
            }
        }
    }
}
?>

<?php
require_once 'includes/footer_ejares.php';
?>