<?php session_start(); 
 
	$conn = mysqli_connect("localhost","root","","qlsb") or die("Không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");

if (isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin'] == 1 ){
    	$sql = "DELETE FROM matchs";
        mysqli_query($conn,$sql);

        $sql1 = "UPDATE time_manager SET time_1 = 0, time_2 = 0, time_3 = 0, time_4 = 0 WHERE pitch_id IS NOT NULL";
        mysqli_query($conn,$sql1);

        $sql2 = "UPDATE time_manager_1 SET pitch_1 = 0, pitch_2 = 0, pitch_3 = 0, pitch_4 = 0 WHERE time_id IS NOT NULL";
        mysqli_query($conn,$sql2);
    }
    header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=index');
}
?>