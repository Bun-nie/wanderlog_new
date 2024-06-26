
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - WanderLog</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" style="background-color: white">
    <div class="col-md-3 mb-2 mb-md-0" >
        <a href="../index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="images/icon.png" width="50" height="50" style="margin-left: 50px" alt="Wanderlog">
            <b style="font-family: 'Lucida Sans'; color: #B67352; font-size: 25px; margin-top: 5px">WanderLOG</b>
        </a>
    </div>
    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="margin-left: 150px">
        <li>
            <a class="nav-link px-2 link-body-emphasis" aria-current="page" href="index.php" style="color: #B67352">Home</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" aria-current="page" href="about.php" style="color: #B67352">About Us</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" aria-current="page" href="contact.php" style="color: #B67352">Contact Us</a>
        </li>
    </ul>

    <form method="POST" class="col-md-3 text-end" style="margin-right: 100px">
        <button type="submit" name="LogIn" class="btn btn-outline-primary me-2" style="border-color: #B67352; color: #B67352">Login</button>
        <button type="submit" name="Register" class="btn btn-primary" style="background-color: #B67352; border-color: #B67352">Sign-up</button>
    </form>
</header>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["LogIn"])){
        echo '<script> location.replace("login.php"); </script>';
    } else if (isset($_POST["Register"])){
        echo '<script> location.replace("signup.php"); </script>';
    }
}
?>
