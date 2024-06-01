<?php
require_once 'includes/admin_header.php';
include('connect.php');
session_start();
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>WanderLOG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="bodyGen" style="background-image: url('images/bgLogIn.png');">
    <div style="justify-content: center;">
        <hr style="width: 75%; border-color: white; margin: auto;">
        <h4 style="color: #b67352; margin-top: 10px; text-align: center;"><b>REVIEWS</b></h4>
        <hr style="width: 75%; border-color: white; margin: auto;">
        <?php
        // $mysqli = new mysqli('localhost', 'root','','dbwanderlog');
        // $entries = $mysqli->query("SELECT * from tblreviewlocation entry INNER JOIN tbluseraccount as ua ON entry.acctid = ua.acctid") or die($mysqli->error);
        //     foreach($entries as $entry){
        //         if($entry['isDeleted'] == 0){
        //             echo '<div style="margin: 10px; text-align: center; display: inline-block; line-height: 10px; width: 400px; height: 300px; border: 1px solid black; margin-top: 1.5%; padding: 10px; border-radius: 10px; background-color: white">
        //                 <h1 style="color: #b67352"><b>'.$entry['username'].'</b></h1>
        //                 <h3 style="color: #b67352"><b>Country: '.$entry['country'].'</b></h3>
        //                 <p style="font-size: 15px">'.$entry['review_content'].'</p>
        //                 <hr style="width: 75%; border-color: black; margin: auto;">
        //                 <p style="margin-top: 10px;"><b>'.$entry['date_added']. '</b></p>
        //                 <hr style="width: 75%; border-color: black; margin: auto;">';
        //             echo '</div>';
        //         }
            
        //     }
        ?>
        <?php
                    $mysqli = new mysqli('localhost', 'root','','dbwanderlog');
                    $reviews = $mysqli->query("SELECT * from tblreviewlocation entry INNER JOIN tbluseraccount as ua ON entry.acctid = ua.acctid") or die($mysqli->error);
                    foreach($reviews as $review){
                        if($review['isDeleted'] == 0){
                           
                            echo '<div style="margin: 10px; text-align: center; display: inline-block; line-height: 10px; width: 400px; height: 300px; border: 1px solid black; margin-top: 1.5%; padding: 10px; border-radius: 10px; background-color: white">
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
                        echo '<script> location.replace("reviews.php"); </script>';
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
                        echo '<script> location.replace("reviews.php"); </script>';
                        exit();
                    }
                ?>
            </div>
        </div>
    </div>

    </body>
    </html>

<?php
require_once 'includes/footer_ejares.php';
?>