<?php 
    
    session_start();
    ob_start();
    require("header.php");
    require_once "connection.php";

    $database = new Database();
    $db = $database->getConnection();

    if (isset($_POST['submit'])) {


        include_once 'user_class.php';
        $product = new Product($db);

        $product->username = $_POST['username'];
        $product->password = $_POST['password'];
        $product->userfname = $_POST['userfname'];
        $product->userlname = $_POST['userlname'];
        $product->gender = $_POST['gender'];
        $product->email = $_POST['email'];
        $product->number = $_POST['number'];
        $product->course = $_POST['course'];
        $product->daytime = $_POST['daytime'];
        
        $user_check = "SELECT * FROM tb_user WHERE username = '$product->username' LIMIT 1";
        $result = mysqli_query($database->conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($product->create()){
            
            if ($result) {
                $_SESSION['success'] = "<h3>ລົງທະບຽນສຳເລັດ</h3>";
                header("Location: login.php");
            } else {
                $_SESSION['error'] = "ເກີດຂໍ້ຜິດພາດ";
                header("Location: register.php");
            }
        }
    }
?>
    <div class="mycontainer" >
        <form action="" method="post" autocomplete="off">
            <table class="mytable">
                <tbody>
                    <h1 class="display-2"style="text-align:center;">ລົງທະບຽນ</h1>
                    <tr>
                        <td class="tdla"><label class="display-7" for="username" >ຊື່ຜູ້ໃຊ້</label></td>
                        <td class="tdinput"><input type="text" name="username" placeholder="Enter your username" required></td>
                    </tr>
                    <tr>
                        <td class="tdla"><label class="display-7" for="password"  >ລະຫັດ</label></td>
                        <td class="tdinput"><input type="password" name="password" placeholder="Enter your password" required></td>
                    </tr>
                    <tr>
                        <td class="tdla"><label class="display-7" for="userfname" >ຊື່</label></td>
                        <td class="tdinput"><input type="text" name="userfname" placeholder="Enter your First name" required></td>
                    </tr>
                    <tr>                
                        <td class="tdla"><label class="display-7" for="userlname"  >ນາມສະກຸນ</label></td>
                        <td class="tdinput"><input type="text" name="userlname" placeholder="Enter your Last name" required></td>
                    </tr>
                    <tr>
                        <td class="tdla"><label class="display-7" for="gender"  >ເພດ</label></td>
                        <td class="tdinput"><label class="display-7"><input type="radio" name="gender" value="Male"required> ຊາຍ</label>
                        <label class="display-7"><input type="radio" name="gender" value="Female"required> ຍິງ</label></td>
                    </tr>
                    <tr>
                    <td class="tdla"><label class="display-7" for="email"  >Email</label></td>
                    <td class="tdinput"><input type="email" name="email" placeholder="Enter your Email" ></td>
                    </tr>              
                    <tr>
                        <td class="tdla"><label class="display-7" for="number"  >ເບີໂທລະສັບ</label></td>
                        <td class="tdinput"><input type="text" name="number" placeholder="Enter your Phone number" required></td>
                    </tr>
                    <tr>
                        <td class="tdla"><label class="display-7" for="course"  >ຫຼັກສູດ</label></td>
                        <td class="tdinput">
                        <label style="min-width: 35%;" class="display-7"><input type="radio" name="course" value="IT Support"required>IT Support</label>
                        <label style="min-width: 50%;" class="display-7"><input type="radio" name="course" value="Microsoft office"required >Microsoft office</label></td>
                    </tr>
                    <tr>
                        <td class="tdla"><label class="display-7" for="daytime"  >ວັນ ແລະ ເວລາ</label></td>
                        <td class="tdinput">
                            <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 09:30 - 11:30"required>ຈັນ-ພະຫັດ 09:30 - 11:30</label>
                            <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 17:30 - 20:00"required>ຈັນ-ພະຫັດ 17:30 - 20:00</label>
                            <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ເສົາ-ອາທິດ 09:00 - 12:00"required>ເສົາ-ອາທິດ 09:00 - 12:00</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <input style="margin-left: auto; min-width: 20%;" class="btn btn-info display-7"  type="submit" name="submit" value="ລົງທະບຽນ" >
            <br>
            <div ><h4 class="display-7">ມີບັນຊີແລ້ວ? <a href="login.php" class="text-info keychainify-checked">ໄປໜັາ Login</a></h4></div>
        </form>
    </div>
        </html>
<?php
    require("footer.php");
?>