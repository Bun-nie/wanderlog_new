<?php
require_once 'includes/index_header.php';
include 'connect.php';
include 'api.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Styles-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel='stylesheet' href='css/login_signup.css'>
        <!--Styles-->
        <title>Register</title>
    </head>
    <body id="register_body">
<!--    <a href="index.php" class="back-button">Back</a>-->
    <form id="login_form" method = "POST">
        <label for = "registration">Register</label>
        <button type="button" name="btnBack" class="btn btn-outline-dark" style="margin-left: 253px; border-radius: 40px; padding: 8px; margin-bottom: 10px">x</button>
        <br>
        <input type = "text" name = "txtfirstname" placeholder="Enter first name" required></input>
        <br>
        <input type = "text" name = "txtlastname" placeholder="Enter last name" required></input>
        <br>
        <input type = "text" name = "txtuname" placeholder="Enter username" required></input>
        <br>
        <input type = "text" name = "txtemail" placeholder="Enter email" required></input>
        <br>
        <input type = "text" name = "txtgender" placeholder="Enter gender" required></input>
        <br>
        <label for="txtbdate">Birthdate: </label>
        <input type="date" name = "txtbdate" required>
        <br>
        <br>
        <input type="password" name = "txtpassword" placeholder = "Enter password" required></input>
        <br>
        <input type = "submit" name="btnRegister" value = "Register"></input>
        <?php
        if(isset($_POST["btnRegister"])){
            SignUp();
        }
        ?>
    </form>
    </body>
    </html>

<?php
require_once 'includes/footer_ejares.php';
?>