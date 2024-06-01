<?php
global $connection;
require_once 'includes/user_header.php';
    include 'connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='css/style.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Review</title>
    <style>
    .flex-container {
        display: flex;
        flex-direction: column;
    }
 
    .flex-container > div {
        background-color: whitesmoke;
        width: 1500px;
        margin: 10px;
        text-align: center;
        line-height: 30px;
        border-radius: 30px;
    }
 
    .flex-container-row {
        display: flex;
        flex-direction: row;
    }
 
    .flex-container-row > div {
        background-color: whitesmoke;
        width: 1500px;
        margin: 10px;
        padding: 20px;
        text-align: center;
        line-height: 30px;
        border-radius: 30px;
    }
    #register_body {
        background-image:url("images/bgLogIn.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body id="register_body">
<div class="flex-container" style="align-items: center">
        <div style="font-family: 'Century Gothic'">
            <img src="images/Heading.png" alt="Bootstrap" width="200" height="200">
            <hr style="width: 50%; margin: auto; border-color: black">
            <?php
                echo '<h1 style="font-weight: bold; color: #b67352;">Hello, '.$_SESSION['username'].'</h1>';
            ?>
            <hr style="width: 50%; margin: auto; padding:10px; border-color: black">
        </div>
        <div class="flex-container-row">
            <div style="background-color: #b67352; border-radius: 30px">
                <hr style="width: 75%; border-color: white; margin: auto;">
                <h4 style="color: white; margin-top: 10px;"><b>LEAVE A REVIEW</b></h4>
                <hr style="width: 75%; border-color: white; margin: auto;">
                <form method="post" style="text-align: justify" id="review_form">
                    <label for="entryContent" style="color: #b67352">What is your thoughts?</label>
                    <select name="country" id="country" required>
                        <option value="">[Select Country]</option>
                        <?php
                            // Fetch countries from tblcountry
                            $query = "SELECT countryname FROM tblcountry";
                            $result = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . htmlspecialchars($row['countryname']) . '">' . htmlspecialchars($row['countryname']) . '</option>';
                            }
                        ?>
                    </select>
                    <textarea name="entryContent" id=entryContent rows="4" cols="40" style="line-height: 20px; border-radius: 30px; padding: 10px"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary" name="btnPost" value="Post" style="margin: auto; width: 360px; border-color: #b67352; background-color: white; color: #b67352; border-radius: 30px"><b>Submit Review</b></button>
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entryContent'])){
                        if(isset($_POST['btnPost'])){      
                            //retrieve data from form and save the value to a variable
                            $entryContent = $_POST['entryContent'];
                            $currAcc = $_SESSION['acctid'];
                            $country = $_POST['country'];
 
                            $sql4 ="Insert into tblreviewlocation(review_content,acctid,country) values('".$entryContent."','".$currAcc."','".$country."')";
                                mysqli_query($connection,$sql4);
 
                        }
                    }
                ?>
            </div>
            <div style="background-color: #b67352; border-radius: 30px">
                <hr style="width: 75%; border-color: white; margin: auto;">
                <h4 style="color: white; margin-top: 10px;"><b>REVIEWS</b></h4>
                <hr style="width: 75%; border-color: white; margin: auto;">
                <?php
                    $mysqli = new mysqli('localhost', 'root','','dbwanderlog');
                    $reviews = $mysqli->query("SELECT * from tblreviewlocation entry INNER JOIN tbluseraccount as ua ON entry.acctid = ua.acctid") or die($mysqli->error);
                    foreach($reviews as $review){
                        if($review['username'] === $_SESSION['username'] && $review['isDeleted'] == 0){
                           
                            echo '<div style="display: inline-block; line-height: 10px; width: 300px; height: 300px; border: 1px solid black; margin-top: 1.5%; padding: 10px; border-radius: 10px; background-color: white">
                                <h2 style="color: #b67352"><b>'.$review['username'].'</b></h2>
                                <h5 style="color: #b67352"><b>Country: '.$review['country'].'</b></h5>
                                  <p style="font-size: 15px">'.$review['review_content'].'</p>
                                <hr style="width: 75%; border-color: black; margin: auto;">
                                <p style="margin-top: 10px;"><b>'.$review['date_added']. '</b></p>
                                <hr style="width: 75%; border-color: black; margin: auto;">

                                <form method="post" id="delete-'.$review["reviewid"].'">
                                <input type="hidden" name="id" value="'.$review["reviewid"].'"/>
                                <input style="margin-bottom: 10px" type="submit" name="btnDelete" class="button" value="Delete"/>

                                <form method="post" action="edit_review.php" id="edit-'.$review["reviewid"].'">
                                <input type="hidden" name="id" value="'.$review["reviewid"].'"/>
                                <input type="submit" name="btnEdit" class="button" value="Edit"/>
                                </form>';  
                            echo '</div>';
                        }
                    }
                   
                ?>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnDelete'])){
                        if(isset($_POST['btnDelete'])){
                            $id = $_POST["id"];
                            $query = "UPDATE tblreviewlocation set isDeleted = 1 where reviewid=$id";
                            $mysqli->query($query);
                        }
                        echo '<script> location.replace("dashboard.php"); </script>';
                    }
                ?>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnEdit'])) {
                        $id = $_POST["id"];
                        // Retrieve the review content from the database based on $id
                        $result = $mysqli->query("SELECT * FROM tblreviewlocation WHERE reviewid = $id");
                        $review = $result->fetch_assoc();
                        echo '<form method="post">
                        <input type="hidden" name="id" value="'.$review['reviewid'].'"/>
                        <textarea name="editedContent" rows="4" cols="40">'.$review['review_content'].'</textarea>
                        <button type="submit" class="btn btn-primary" name="btnUpdate" value="Update">Update Review</button>
                        </form>';
                    }
                ?>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnUpdate'])) {
                        $id = $_POST["id"];
                        $editedContent = $_POST['editedContent'];
                        if($editedContent === ""){
                            echo "<script language='javascript'>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing to display. Please leave a valid review!'
                                });
                            </script>";
                            return;
                        }
                       
                        // Update the review content in the database
                        $query = "UPDATE tblreviewlocation SET review_content = '$editedContent' WHERE reviewid = $id";
                        $mysqli->query($query);
                       
                        // Redirect back to the page where reviews are displayed
                        echo '<script> location.replace("dashboard.php"); </script>';
                        exit();
                    }
                ?>
            </div>
        </div>


        <div class="flex-container-row">
            <div style="background-color: #b67352; border-radius: 30px">
                <hr style="width: 75%; border-color: white; margin: auto;">
                <h4 style="color: white; margin-top: 10px;"><b>CREATE POST</b></h4>
                <hr style="width: 75%; border-color: white; margin: auto;">
                <form method="post" style="text-align: justify" id="entry_form">
                    <label for="entryContent" style="color: #b67352">What is your thoughts?</label>
                    <textarea name="entryContent" id=entryContent rows="4" cols="40" style="line-height: 20px; border-radius: 30px; padding: 10px"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary" name="btnPostEntry" value="Post" style="margin: auto; width: 360px; border-color: #b67352; background-color: white; color: #b67352; border-radius: 30px"><b>POST ENTRY</b></button>
                </form>
                <?php
                    if (isset($_POST['entryContent'])){
                        if(isset($_POST['btnPostEntry'])){
                            //retrieve data from form and save the value to a variable
                            $entryContent = $_POST['entryContent'];
                            $currAcc = $_SESSION['acctid'];

                            $sql4 ="Insert into tblentry(entrycontent,acctid,heartcount) values('".$entryContent."','".$currAcc."','0')";
                                mysqli_query($connection,$sql4);

                        }
                    }
                ?>
            </div>
            <div style="background-color: #b67352; border-radius: 30px">
                <hr style="width: 75%; border-color: white; margin: auto;">
                <h4 style="color: white; margin-top: 10px;"><b>ENTRIES</b></h4>
                <hr style="width: 75%; border-color: white; margin: auto;">
                <?php
                    $mysqli = new mysqli('localhost', 'root','','dbwanderlog');
                    $entries = $mysqli->query("SELECT * from tblentry entry INNER JOIN tbluseraccount as ua ON entry.acctid = ua.acctid") or die($mysqli->error);
                    foreach($entries as $entry){
                        if($entry['username'] === $_SESSION['username'] && $entry['isDeleted'] == 0){
                            
                            echo '<div style="display: inline-block; line-height: 10px; width: 300px; height: 300px; border: 1px solid black; margin-top: 1.5%; padding: 10px; border-radius: 10px; background-color: white">
                                <h3 style="color: #b67352"><b>'.$entry['username'].'</b></h3>
                                  <p style="font-size: 15px">'.$entry['entrycontent'].'</p>
                                <hr style="width: 75%; border-color: black; margin: auto;">
                                <p style="margin-top: 10px;"><b>'.$entry['dateadded']. '</b></p>
                                <hr style="width: 75%; border-color: black; margin: auto;"> 
                                <form method="post" id="delete-'.$entry["entryid"].'">
                                <input type="hidden" name="id" value="'.$entry["entryid"].'"/>
                                <input type="submit" name="btnUpdateEntry" class="button" value="Update"/>
                                <br>
                                <br>
                                <input type="submit" name="btnDeleteEntry" class="button" value="Delete"/>
                                </form>';  
                            echo '</div>';
                        }
                    }

                    if (isset($_POST['btnDeleteEntry'])){
                        $id = $_POST["id"];
                        $query = "UPDATE tblentry set isDeleted = 1 where entryid=$id";
                        $mysqli->query($query);
                        echo '<script> location.replace("dashboard.php"); </script>';
                    }
                    if (isset($_POST['btnUpdateEntry'])){
                        $id = $_POST["id"];
                        $result = $mysqli->query("SELECT * FROM tblentry WHERE entryid = $id");
                        $entry = $result->fetch_assoc();
                            echo '<form method="post" style="text-align: justify">
                                <input type="hidden" name="id" value="'.$entry['entryid'].'"/>
                                <textarea name="updateContent" id=updateContent rows="4" cols="40" style="line-height: 20px; border-radius: 30px; padding: 10px">'.$entry['entrycontent'].'</textarea>
                                <br>
                                <button type="submit" class="btn btn-primary" name="btnOKEntry" style="margin: auto; width: 360px; border-color: #b67352; background-color: white; color: #b67352; border-radius: 30px"><b>UPDATE ENTRY</b></button>
                                </form>';
                        
                        
                    }
                    if(isset($_POST['btnOKEntry'])){
                        $id = $_POST["id"];
                        $updatedContent = $_POST['updateContent'];
                        $stmt = $mysqli->prepare("UPDATE tblentry SET entrycontent = ? WHERE entryid = ?");
                        if ($stmt === false) {
                            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
                        }
                        $stmt->bind_param('si', $updatedContent, $id);
                        $stmt->execute();
                        echo '<script> location.replace("dashboard.php"); </script>';
                        exit();
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
