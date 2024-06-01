<?php
    $title = 'Dashboard';
    require_once 'includes/admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
<div>
    <h5>List of User Accounts Registered</h5>
    <div>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'dbwanderlog') or die(mysqli_error($mysqli));
        $resultset = $mysqli->query("SELECT * from tbluserprofile profile INNER JOIN tbluseraccount account ON account.acctid = profile.userid where isBanned = 0") or die($mysqli->error);
        ?>
        <table id="tblUserProfiles" class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $resultset->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['userid'] ?></td>
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['birthdate'] ?></td>
                    <td>
                        <?php
                        echo '<form method="post" id="'.$row["userid"].'">
                                <input type="hidden" name="userid" value="'.$row["userid"].'"/>
                                <input type="submit" name="btnDelete" class="button" value="BAN"/>
                                </form>';
                        ?>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnDelete'])){
                    if(isset($_POST['btnDelete'])){
                        $id = $_POST["userid"];
                        $query = "UPDATE tbluseraccount SET isBanned = 1 WHERE acctid = $id";
                        $mysqli->query($query);
                    }
                }
                ?>
            </tbody>
        </table>

        <h5>List of User Accounts Banned</h5>
        <div>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'dbwanderlog') or die(mysqli_error($mysqli));
            $resultset = $mysqli->query("SELECT * from tbluserprofile profile INNER JOIN tbluseraccount account ON account.acctid = profile.userid where isBanned = 1") or die($mysqli->error);
            ?>
            <table id="tblUserProfiles" class="table table-striped table-bordered table-sm">
                <thead>
                <tr>
                    <th>Account ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $resultset->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['userid'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['birthdate'] ?></td>
                        <td>
                            <?php
                            echo '<form method="post" id="'.$row["userid"].'">
                                <input type="hidden" name="userid" value="'.$row["userid"].'"/>
                                <input type="submit" name="btnDelete" class="button" value="BAN"/>
                                </form>';
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnDelete'])){
                    if(isset($_POST['btnDelete'])){
                        $id = $_POST["userid"];
                        $query = "UPDATE tbluseraccount SET isBanned = 1 WHERE acctid = $id";
                        $mysqli->query($query);
                    }
                }
                ?>
                </tbody>
            </table>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.btnDeleteUser').click(function(){
            var userId = $(this).data('userid');
            $.ajax({
                url: 'delete_user.php',
                type: 'POST',
                data: { userid: userId },
                success: function(response) {
                    alert('User banned successfully.');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>
</body>
</html>
<?php
    require_once 'includes/footer_ejares.php';
?>