<?php 
    session_start();
    ob_start();
    require("header.php");
    
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
    if (isset($_SESSION['userid'])) {
    header("Location: info.php");
} else { ?>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12" style="height: 400px;">
                    <form id="login-form" class="form" action="loginsys.php" method="post">
                        <h3 class="text-center text-info">Login to your account</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">ຊື່ຜູ້ໃຊ້:</label><br>
                            <input type="text" name="username" id="username" class="form-control" require>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">ລະຫັດ:</label><br>
                            <input type="password" name="password" id="password" class="form-control" require>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="login">
                        </div>
                        <div ><h4 style="padding-left: 60%"class="display-7">ຍັງບໍ່ມີບັນຊີ? <a href="register.php" class="text-info keychainify-checked">ລົງທະບຽນ</a></h4></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    require("footer.php");
    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }
}
?>

