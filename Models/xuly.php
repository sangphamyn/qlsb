
<?php 
session_start();
    require_once("ketnoi.php");
    if (isset($_POST["btnSignup"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $fullname = $_POST["fullName"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($fullname == "" || $phone == "" || $password == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        }else{
            $sql = "INSERT INTO users(fullname, phone, password) VALUES ('$fullname','$phone','$password')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql);
            header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=login');
        }
    }

    if (isset($_POST["btnSignin"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($phone == "" || $password == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        }else{
            //Kiểm tra tên đăng nhập có tồn tại không
            $sql = ("SELECT * FROM users WHERE phone='$phone'");
            $rs = mysqli_query($conn,$sql);
            if (mysqli_num_rows($rs) == 0) {
                echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
            //Lấy mật khẩu trong database ra
            $row = $rs->fetch_assoc();
             
            //So sánh 2 mật khẩu có trùng khớp hay không
            if ($password != $row['password']) {
                echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
            $name = $row['fullname'];
            $user_id = $row['user_id'];
            $isAdmin = $row['isAdmin'];
            //Lưu tên đăng nhập
            $_SESSION['fullname'] = $name;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['isAdmin'] = $isAdmin;
            header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=index');
        }
    }

    if (isset($_POST["btn-create"])) {
        $clubName = $_POST["club_name"];
        $timeId = $_POST["time"];
        $user_id = $_SESSION['user_id'];
        $fullname = $_SESSION['fullname'];
        $sql1 = "SELECT phone FROM users WHERE user_id = $user_id";
        $rs = mysqli_query($conn,$sql1)->fetch_assoc();
        $phone = $rs['phone'];
        $sql = "INSERT INTO matchs(club_id_1, time_id, fullname, phone) VALUES ($clubName,$timeId,'$fullname','$phone')";
        mysqli_query($conn,$sql);
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=choghep');
    }

    if (isset($_POST["btn-createClub"])) {
        $clubName = $_POST["clubName"];
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO clubs(club_name) VALUES ('$clubName')";
        mysqli_query($conn,$sql);
        $sql1 = "SELECT club_id FROM clubs WHERE club_name = '$clubName'";
        $rs = mysqli_query($conn,$sql1)->fetch_assoc();
        $club_id = $rs['club_id'];
        $sql2 = "INSERT INTO quanly_club(user_id, club_id) VALUES ('$user_id', $club_id)";
        mysqli_query($conn,$sql2);
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=allClub');
    }
?>