<?php 

require_once "connection.php";
    session_start();

    $database = new Database();
    $db = $database->getConnection();
    include_once 'user_class.php';
    if (isset($_POST['username'])) {



        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($database->conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['user'] = $row['userfname'] . " " . $row['userlname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            if ($_SESSION['userlevel'] == 'a') {
                header("Location: adminpage.php");
            }

            if ($_SESSION['userlevel'] == 'm') {
                header("Location: userpage.php");
            }
        } else {
                echo "<script type='text/javascript'>alert('User ຫຼື Password ບໍ່ຖືກຕ້ອງ');
                window.location='login.php';
                </script>";
        }
    }

?>