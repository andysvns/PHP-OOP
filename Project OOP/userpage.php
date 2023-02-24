<?php
    session_start();
    ob_start();
    require("header.php"); 
    require_once("connection.php");
    include_once 'user_class.php';
    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);
?>
<?php 

if ($_SESSION["userlevel"]== 'a') {
    header("location: adminpage.php");
} elseif ((!isset($_SESSION['userid']))) {
    header("location: index.php");
} elseif ($_SESSION["userlevel"]== 'm'){

?>


        <?php
            $product->readOne();
            


        ?>
<div class="mycontainer">
    <form action="" method="post">
        <table style="height: 400px;">
            <h1 class="display-2" style="text-align:center;">ຂໍ້ມູນບັນຊີຂອງທ່ານ</h1>
            <tbody class="tb-1">
            <tr class="tr-1">
                <td class=""><label class="display-7" for="username" >ຊື່ຜູ້ໃຊ້</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->username ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class=""><label class="display-7" for="password"  >ລະຫັດ</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->password ?></label></td>
                
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="password"  >ຊື່</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->userfname ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="userlname"  >ນາມສະກຸນ</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->userlname ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="gender"  >ເພດ</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->gender ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="email"  >Email</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->email ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="number"  >ເບີໂທລະສັບ</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->number ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="course"  >ຫຼັກສູດ</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->course ?></label></td>
            </tr>
            <tr class="tr-1">
                <td class="tdla"><label class="display-7" for="daytime"  >ວັນ ແລະ ເວລາ</label></td>
                <td class="tdla-2"><label class="display-7" for="username" ><?php echo $product->daytime ?></label></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<?php 
} else {
    header("Location: index.php");
}
    require("footer.php");
?>


