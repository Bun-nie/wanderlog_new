<?php

include 'connect.php';

function logIn()
{
    $uname=$_POST['txtusername'];
    $pwd=$_POST['txtpassword'];
    //check tbluseraccount if username is existing
    $sql ="Select * from tbluseraccount where username='".$uname."'";

    $result = mysqli_query($connection,$sql);

    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if($count== 0){
        echo "<script language='javascript'>
						alert('username not existing.');
				  </script>";
    }else if(password_verify($pwd, $row[3])) {
        $_SESSION['username']=$row[2];
        $_SESSION['acctid']=$row[0];
        header("location: landingpage.php");
    }else{
        echo "<script language='javascript'>
						alert('Incorrect password');
				  </script>";
    }
}

function SignUp()
{
    //retrieve data from form and save the value to a variable
    //for tbluserprofile
    global $connection;
    $fname=$_POST['txtfirstname'];
    $lname=$_POST['txtlastname'];
    $gender=$_POST['txtgender'];
    $bdate=$_POST['txtbdate'];


    //for tbluseraccount
    $email=$_POST['txtemail'];
    $uname=$_POST['txtuname'];
    $pword=password_hash($_POST['txtpassword'],PASSWORD_DEFAULT);



    //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
    $sql2 ="Select * from tbluseraccount where username='".$uname."'";
    $result = mysqli_query($connection,$sql2);
    $row = mysqli_num_rows($result);
    if($row == 0){
        $sql1 ="Insert into tbluserprofile(firstname,lastname,gender,birthdate) values('".$fname."','".$lname."','".$gender."','".$bdate."')";
        mysqli_query($connection,$sql1);
        $sql ="Insert into tbluseraccount(emailadd,username,password) values('".$email."','".$uname."','".$pword."')";
        mysqli_query($connection,$sql);
        echo "<script language='javascript'>
						alert('New record saved.');
				  </script>";
        $sql22 ="SELECT * FROM tbluseraccount WHERE username='$uname'";
        $result2 = mysqli_query($connection,$sql22);
        if ($row2 = mysqli_fetch_assoc($result2)) {
            // Set session variables
            $_SESSION['username'] = $row2['username'];
            $_SESSION['acctid'] = $row2['acctid'];
            echo '<script> location.replace("homepage.php"); </script>';
        }
    }else{
        echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
    }
}

function createTable()
{

}

?>