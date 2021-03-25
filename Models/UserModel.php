<?php 
session_start();

    $conn = mysqli_connect("localhost","root","","qlsb") or die("Không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");

    if (isset($_POST["btnSignup"])) {
        $fullname = $_POST["fullName"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $sql = "INSERT INTO users(fullname, phone, password) VALUES ('$fullname','$phone','$password')";
        mysqli_query($conn,$sql);
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=login');
    }

    if (isset($_POST["btnSignin"])) {
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $sql = ("SELECT * FROM users WHERE phone='$phone'");
        $rs = mysqli_query($conn,$sql);
        if (mysqli_num_rows($rs) == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        $row = $rs->fetch_assoc();
        if ($password != $row['password']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }

        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['isAdmin'] = $row['isAdmin'];
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=index');
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