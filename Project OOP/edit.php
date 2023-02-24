<?php 
    session_start();
    
    require_once("connection.php");
    include_once 'user_class.php';
    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);
    $UserID = $_GET['GetID'];
    $query = " select * from tb_user where User_ID='".$UserID."'";
    $result = mysqli_query($database->conn,$query);
    require("header.php"); 
    while($row=mysqli_fetch_assoc($result))
    {
        $UserID = $row['user_id'];
        $UserName = $row['username'];
        $Password = $row['password'];
        $UserFName = $row['userfname'];
        $UserLName = $row['userlname'];
        $UserGender = $row['gender'];
        $UserEmail = $row['email'];
        $UserPNumber = $row['number'];
        $UserCourse = $row['course'];
        $UserDTime = $row['daytime'];
    }

?>

<div class="mycontainer" >
    <form action="update.php?ID=<?php echo $UserID ?>" method="post">
        <table class="mytable">
            <h1 class="display-2"style="text-align:center;">ແກ້ໄຂຂໍ້ມູນ</h1>
            <tbody>
            <tr>
                <td class="tdla"><label class="display-7" for="username" >ຊື່ຜູ້ໃຊ້</label></td>
                <td class="tdla-1"><label class="display-7" for="username" ><?php echo $UserName ?></label></td>
            </tr>
            <tr>
                <td class="tdla"><label class="display-7" for="password"  >ລະຫັດ</label></td>
                <td class="tdinput"><input type="text" placeholder=" User Password " name="password" value="<?php echo $Password ?>"></td>
            </tr>
            <tr>
                <td class="tdla"><label class="display-7" for="password"  >ຊື່</label></td>
                <td class="tdinput"><input type="text" placeholder=" User Firset Name " name="userfname" value="<?php echo $UserFName ?>"></td>
            </tr>
            <tr>
                <td class="tdla"><label class="display-7" for="userlname"  >ນາມສະກຸນ</label></td>
                <td class="tdinput"><input type="text" placeholder=" User Last Name " name="userlname" value="<?php echo $UserLName ?>"></td>
            </tr>

            <tr>
                <td class="tdla"><label class="display-7" for="gender"  >ເພດ</label></td>
                    <?php
                        if ($UserGender == 'Male') {
                            echo '<td class="tdinput"><label class="display-7"><input type="radio" name="gender" value="Male"required checked> ຊາຍ</label>
                                <label class="display-7"><input type="radio" name="gender" value="Female"required> ຍິງ</label></td>';
                        } elseif ($UserGender == 'Female') {
                            echo '<td class="tdinput"><label class="display-7"><input type="radio" name="gender" value="Male"required > ຊາຍ</label>
                                <label class="display-7"><input type="radio" name="gender" value="Female"required checked> ຍິງ</label></td>';
                        } else {
                            echo '<td class="tdinput"><label class="display-7"><input type="radio" name="gender" value="Male"required > ຊາຍ</label>
                                <label class="display-7"><input type="radio" name="gender" value="Female"required > ຍິງ</label></td>';
                        }
                    ?>
                
            </tr>
            <tr>
                <td class="tdla"><label class="display-7" for="email"  >Email</label></td>
                <td class="tdinput"><input type="email" placeholder=" User Email " name="email" value="<?php echo $UserEmail ?>"></td>
            <tr>
            </tr>
                <td class="tdla"><label class="display-7" for="number"  >ເບີໂທລະສັບ</label></td>
                <td class="tdinput"><input type="text" placeholder=" User Phone Number " name="number" value="<?php echo $UserPNumber ?>"></td>
            <tr>
            </tr>
                <td class="tdla"><label class="display-7" for="course"  >ຫຼັກສູດ</label></td>
                <?php
                    if ($UserCourse == 'IT Support') {
                        echo '<td class="tdinput">
                        <label style="min-width: 35%;" class="display-7"><input type="radio" name="course" value="IT Support"required checked>IT Support</label>
                        <label style="min-width: 50%;" class="display-7"><input type="radio" name="course" value="Microsoft office"required >Microsoft office</label></td>';
                    } elseif ($UserCourse == 'Microsoft office') {
                        echo '<td class="tdinput">
                        <label style="min-width: 35%;" class="display-7"><input type="radio" name="course" value="IT Support"required >IT Support</label>
                        <label style="min-width: 50%;" class="display-7"><input type="radio" name="course" value="Microsoft office"required checked>Microsoft office</label></td>';
                    } else {
                        echo '<td class="tdinput">
                        <label style="min-width: 35%;" class="display-7"><input type="radio" name="course" value="IT Support"required >IT Support</label>
                        <label style="min-width: 50%;" class="display-7"><input type="radio" name="course" value="Microsoft office"required >Microsoft office</label></td>';
                    }
                ?>
            <tr>
            </tr>
                <td class="tdla"><label class="display-7" for="daytime"  >ວັນ ແລະ ເວລາ</label></td>
                <?php
                    if ($UserDTime == 'ຈັນ-ພະຫັດ 09:30 - 11:30') {
                        echo '<td class="tdinput">
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 09:30 - 11:30"required checked>ຈັນ-ພະຫັດ 09:30 - 11:30</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 17:30 - 20:00"required>ຈັນ-ພະຫັດ 17:30 - 20:00</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ເສົາ-ອາທິດ 09:00 - 12:00"required>ເສົາ-ອາທິດ 09:00 - 12:00</label>
                    </td>';
                    } elseif ($UserDTime == 'ຈັນ-ພະຫັດ 17:30 - 20:00') {
                        echo '<td class="tdinput">
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 09:30 - 11:30"required >ຈັນ-ພະຫັດ 09:30 - 11:30</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 17:30 - 20:00"required checked>ຈັນ-ພະຫັດ 17:30 - 20:00</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ເສົາ-ອາທິດ 09:00 - 12:00"required>ເສົາ-ອາທິດ 09:00 - 12:00</label>
                    </td>';
                    } elseif ($UserDTime == 'ເສົາ-ອາທິດ 09:00 - 12:00') {
                        echo '<td class="tdinput">
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 09:30 - 11:30"required >ຈັນ-ພະຫັດ 09:30 - 11:30</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 17:30 - 20:00"required >ຈັນ-ພະຫັດ 17:30 - 20:00</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ເສົາ-ອາທິດ 09:00 - 12:00"required checked>ເສົາ-ອາທິດ 09:00 - 12:00</label>
                    </td>';
                    } else {
                        echo '<td class="tdinput">
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 09:30 - 11:30"required >ຈັນ-ພະຫັດ 09:30 - 11:30</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ຈັນ-ພະຫັດ 17:30 - 20:00"required >ຈັນ-ພະຫັດ 17:30 - 20:00</label>
                        <label style="min-width: 40%;" class="display-7"><input type="radio" name="daytime" value="ເສົາ-ອາທິດ 09:00 - 12:00"required >ເສົາ-ອາທິດ 09:00 - 12:00</label>
                    </td>';
                    }
                ?>
                
            </tr>

            </tbody>
        </table>
        <button style="margin-left: auto; min-width: 20%;" class="btn btn-info display-7" name="update">ແກ້ໄຂ</button>
    </form>
</div>
<?php
    require("footer.php")
?>