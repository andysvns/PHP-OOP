<?php 

    session_start();
    if ($_SESSION["userlevel"]== 'a') {
        header("location: adminpage.php");
    } else {
        header("location: userpage.php");
    }
?>