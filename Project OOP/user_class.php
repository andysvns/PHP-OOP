<?php
class product
{
    private $conn;

    // object properties
    public $user_id;
    public $username;
    public $password;
    public $userfname;
    public $userlname;
    public $gender;
    public $email;
    public $number;
    public $course;
    public $daytime;
    public $userlevel;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    function readAll()
    {
        $query = "SELECT user_id, username, password, userfname, userlname, gender, email, number, course, daytime
                FROM tb_user WHERE userlevel = 'm'";

        $result = $this->conn->query($query);
        return $result;
    }

    function readOne()
    {
        $query = "SELECT * FROM tb_user WHERE user_id = '$_SESSION[userid]';";
        $result = mysqli_query($this->conn,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $this->user_id = $row['user_id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->userfname = $row['userfname'];
            $this->userlname = $row['userlname'];
            $this->gender = $row['gender'];
            $this->email = $row['email'];
            $this->number = $row['number'];
            $this->course = $row['course'];
            $this->daytime = $row['daytime'];
        }
    }

    // create products
    function create()
    {

        //write query
        $query = "INSERT INTO tb_user(username, password, userfname, userlname, gender, email, number, course, daytime, userlevel) 
        VALUES ('" . $this->username . "', '" . $this->password . "', '" . $this->userfname . "', '" . $this->userlname . "', '" . $this->gender . "', '" . $this->email . "', '" . $this->number . "',
        '" . $this->course . "', '" . $this->daytime . "', '" . "m" . "' )";

        $user_check = "SELECT * FROM tb_user WHERE username = '$this->username' LIMIT 1";
        $result = mysqli_query($this->conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $this->username) {
            echo "<script>alert('ຊື່ຜູ້ໃຊ້ນີ້ມີແລ້ວ');</script>";
        } else if ($this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    function update()
    {

        $UserID = $_GET['ID'];
        $UserName = $_POST['username'];
        $Password = $_POST['password'];
        $UserFName = $_POST['userfname'];
        $UserLName = $_POST['userlname'];
        $UserGender = $_POST['gender'];
        $UserEmail = $_POST['email'];
        $UserPNumber = $_POST['number'];
        $UserCourse = $_POST['course'];
        $UserDTime = $_POST['daytime'];

        $query = " update tb_user set 
        
        password ='".$Password."',
        userfname ='".$UserFName."',
        userlname ='".$UserLName."',
        gender ='".$UserGender."',
        email ='".$UserEmail."',
        number ='".$UserPNumber."',
        course ='".$UserCourse."',
        daytime ='".$UserDTime."' 
        where User_ID ='".$UserID."'";

        $result = mysqli_query($this->conn,$query);

        if($result)
        {
            header("location:adminpage.php");
        }
        else
        {
            echo ' ເກີດຂໍ້ຜິດພາດ ';
        }
    }

    // delete the products
    function delete()
    {
        $query = "DELETE FROM tb_user WHERE user_id = '" . $this->id . "'";
        if ($this->conn->query($query)) {
            return true;
        }
    }
}
