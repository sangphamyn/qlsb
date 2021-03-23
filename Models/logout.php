<?php session_start(); 
 
if (isset($_SESSION['fullname'])){
    unset($_SESSION['fullname'],$_SESSION['user_id']); // xóa session login
    header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=index');
}
?>