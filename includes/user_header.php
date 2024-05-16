<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - WanderLog</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0" >
        <a href="../index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="../images/icon.png" alt="Bootstrap" width="50" height="50" style="margin-left: 50px">
            <b style="font-family: 'Lucida Sans'; color: #B67352; font-size: 25px; margin-top: 5px">WanderLOG</b>
        </a>
    </div>
    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="margin-left: 50px">
        <li>
            <a class="nav-link px-2 link-body-emphasis" href="../homepage.php">Home</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" href="../about.php">About Us</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" href="../contact.php">Contact Us</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" href="../dashboard.php">Dashboard</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" href="../review.php">Reviews</a>
        </li>
        <li>
            <a class="nav-link px-2 link-body-emphasis" href="../index.php">Sign Out</a>
        </li>
    </ul>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>

    <div class="dropdown text-end" style="margin-right: 25px">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small" style="">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</header>
</body>
</html>
