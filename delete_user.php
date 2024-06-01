<?php
    $mysqli = new mysqli('localhost', 'root', '', 'dbwanderlog');

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['userid'];
            error_log("Received user ID: " . $userId);  // Add this line to log the received user ID
        
            if (empty($userId)) {
                die("User ID is missing.");
            }

            $stmt = $mysqli->prepare("UPDATE tbluseraccount SET isBanned = 1 WHERE userid = ?");
            $stmt->bind_param("i", $userId);

            if ($stmt->execute()) {
                echo "User banned successfully.";
            } else {
                    echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }

        $mysqli->close();
?>