<?php
session_start();
ob_start();
require("header.php");
require_once("connection.php");
include_once 'user_class.php';
?>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="success">
        <?php
        echo $_SESSION['success'];
        ?>
    </div>
<?php endif; ?>


<?php if (isset($_SESSION['error'])) : ?>
    <div class="error">
        <?php
        echo $_SESSION['error'];
        ?>
    </div>
<?php endif; ?>
<?php

if ($_SESSION["userlevel"] == 'm') {
    header("location: userpage.php");
} elseif ((!isset($_SESSION['userid']))) {
    header("location: index.php");
} elseif ($_SESSION["userlevel"] == 'a') {

?>
    <h1 class="display-2" style="text-align:center;">ຂໍ້ມູນບັນຊີທັງໝົດ</h1>
    <div class="userbox">
        <div class="userinfocon">
            <table class="table-info display-7">
                <thead>

                    <th class="th-info">ID</th>
                    <th class="th-info">ຊື່ຜູ້ໃຊ້</th>
                    <th class="th-info">ລະຫັດ</th>
                    <th class="th-info">ຊື່</th>
                    <th class="th-info">ນາມສະກຸນ</th>
                    <th class="th-info">ເພດ</th>
                    <th class="th-info">Email</th>
                    <th class="th-info">ເບີໂທລະສັບ</th>
                    <th class="th-info">ຫຼັກສູດ</th>
                    <th class="th-info">ວັນ ແລະ ເວລາຮຽນ</th>
                    <th class="th-info"></th>
                    <th class="th-info"></th>

                </thead>
                <?php

                $database = new Database();
                $db = $database->getConnection();

                $product = new Product($db);
                $result = $product->readAll();
                $num = $result->num_rows;

                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $product->id = $row['user_id'];
                        $UserName = $row['username'];
                        $Password = $row['password'];
                        $UserFName = $row['userfname'];
                        $UserLName = $row['userlname'];
                        $UserGender = $row['gender'];
                        $UserEmail = $row['email'];
                        $UserPNumber = $row['number'];
                        $UserCourse = $row['course'];
                        $UserDTime = $row['daytime'];
                ?>
                        <tr>
                            <td class="th-info"><?php echo $product->id ?></td>
                            <td class="th-info"><?php echo $UserName ?></td>
                            <td class="th-info"><?php echo $Password ?></td>
                            <td class="th-info"><?php echo $UserFName ?></td>
                            <td class="th-info"><?php echo $UserLName ?></td>
                            <td class="th-info"><?php echo $UserGender ?></td>
                            <td class="th-info"><?php echo $UserEmail ?></td>
                            <td class="th-info"><?php echo $UserPNumber ?></td>
                            <td class="th-info"><?php echo $UserCourse ?></td>
                            <td class="th-info"><?php echo $UserDTime ?></td>
                            <td class="th-info"><a class="text-info keychainify-checked" href="edit.php?GetID=<?php echo $product->id ?>">Edit</a></td>
                            <td class="th-info"><a href="delete.php?Del=<?php echo $product->id ?>" onclick="return confirmation()" class="text-info keychainify-checked">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
<?php
                }
            } else {
                header("Location: index.phh");
            }
            require("footer.php");

?>

<script>
    function confirmation() {
        return confirm("ຕ້ອງການລົບນີ້ແທ້ບໍ?");
    }
</script>