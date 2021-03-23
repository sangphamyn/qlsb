<?php
session_start();
?>
<?php
require_once "Models/Model.php";

class MatchModel extends Model{
	public function __construct()
    {
        parent::__construct();
    }
    public function cacDoiDaDat(){
    	$rs = $this->con->query("SELECT * FROM matchs WHERE club_id_2 IS NOT NULL AND pitch_id IS NULL");
        $arr = [];
        while($row = $rs->fetch_assoc()){
            $arr[] = $row;
        }
        $i = 0;
        while($i < count($arr)){
        	$name1 = $arr[$i]['club_id_1'];
        	$rs1 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $name1");
        	$a1 = $rs1->fetch_assoc();
        	$arr[$i]['club_id_1'] = $a1['club_name'];
        	$name2 = $arr[$i]['club_id_2'];
        	$rs2 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $name2");
        	$a2 = $rs2->fetch_assoc();
        	$arr[$i]['club_id_2'] = $a2['club_name'];

        	$time_id = $arr[$i]['time_id'];
        	$rs3 = $this->con->query("SELECT time FROM times WHERE time_id = $time_id");
        	$a3 = $rs3->fetch_assoc();
            $time_name = $a3['time'];
        	$arr[$i]['time_id'] = $time_name;

            $rs4 = $this->con->query("SELECT * FROM time_manager_1 WHERE time_id = $time_id");
            $row1 = $rs4->fetch_assoc();
            $j = 1;
            while($j < 5){
                $arr[$i]['pitch'][$j]["pitch_status"] = $row1["pitch_".$j.""];
                $arr[$i]['pitch'][$j]["pitch_name"] = $j;
                $j = $j + 1;
            }
        	$i=$i+1;
        }
        return $arr;
    }
    public function cacDoiDaDatXacNhan(){
        $rs = $this->con->query("SELECT * FROM matchs WHERE club_id_2 IS NOT NULL AND pitch_id IS NOT NULL");
        $arr = [];
        while($row = $rs->fetch_assoc()){
            $arr[] = $row;
        }
        $i = 0;
        while($i < count($arr)){
            $name1 = $arr[$i]['club_id_1'];
            $rs1 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $name1");
            $a1 = $rs1->fetch_assoc();
            $arr[$i]['club_id_1'] = $a1['club_name'];
            $name2 = $arr[$i]['club_id_2'];
            $rs2 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $name2");
            $a2 = $rs2->fetch_assoc();
            $arr[$i]['club_id_2'] = $a2['club_name'];

            $time = $arr[$i]['time_id'];
            $rs3 = $this->con->query("SELECT time FROM times WHERE time_id = $time");
            $a3 = $rs3->fetch_assoc();
            $arr[$i]['time_id'] = $a3['time'];

            $i=$i+1;
        }
        return $arr;
    }

    public function choGhep(){
        $arr = [];
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $rs = $this->con->query("SELECT * FROM matchs WHERE club_id_2 IS NULL");
            
            while($row = $rs->fetch_assoc()){
                $arr[] = $row;
            }
            //var_dump($arr[1]['club_id_2']);
            //var_dump(count($arr));
            $i = 0;
            while($i < count($arr)){
                $name = $arr[$i]['club_id_1'];
                $time = $arr[$i]['time_id'];
                $rs1 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $name");
                $rs2 = $this->con->query("SELECT time FROM times WHERE time_id = $time");
                $a1 = $rs1->fetch_assoc();
                $a2 = $rs2->fetch_assoc();
                $arr[$i]['club_id_1'] = $a1['club_name'];
                $arr[$i]['time_name'] = $a2['time'];

                $rs3 = $this->con->query("SELECT * FROM quanly_club WHERE user_id = $user_id");
                $arr1 = [];
                while($row1 = $rs3->fetch_assoc()){
                    $arr1[] = $row1;
                }
                $j = 0;
                while ($j < count($arr1)) {
                    $club_id_ghep = $arr1[$j]['club_id'];
                    $rs4 = $this->con->query("SELECT * FROM clubs WHERE club_id = $club_id_ghep");
                    $row2 = $rs4->fetch_assoc();
                    //$arr[$i]['club_id_ghep'][$j] = $club_id_ghep;
                    //$arr[$i]['club_name_ghep'][$j] = $row2['club_name'];
                    $arr[$i]['club_ghep'][$j]['id'] = $club_id_ghep;
                    $arr[$i]['club_ghep'][$j]['name'] = $row2['club_name'];

                    $j = $j + 1;
                }

                $i=$i+1;
            }
            return $arr;
        }
        else{
            $rs = $this->con->query("SELECT * FROM matchs WHERE club_id_2 IS NULL");
            
            while($row = $rs->fetch_assoc()){
                $arr[] = $row;
            }
            $i = 0;
            while($i < count($arr)){
                $name = $arr[$i]['club_id_1'];
                $time = $arr[$i]['time_id'];
                $rs1 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $name");
                $rs2 = $this->con->query("SELECT time FROM times WHERE time_id = $time");
                $a1 = $rs1->fetch_assoc();
                $a2 = $rs2->fetch_assoc();
                $arr[$i]['club_id_1'] = $a1['club_name'];
                $arr[$i]['time_name'] = $a2['time'];

                $i=$i+1;
            }
            return $arr;
        }
        
    }
    public function allClub(){
        $rs = $this->con->query("SELECT * FROM clubs");

        $arr = [];
        while($row = $rs->fetch_assoc()){
            $numOfMember = $row['club_id'];
            $sothanhvien = $this->con->query("SELECT COUNT(club_id) FROM quanly_club WHERE club_id = $numOfMember");
            $a = $sothanhvien->fetch_assoc();
            $row['numOfMember'] = $a['COUNT(club_id)'];
            $arr[] = $row;
        }
        return $arr;
    }
    public function lichsan(){
        $rs = $this->con->query("SELECT * FROM time_manager");

        $arr = [];
        while($row = $rs->fetch_assoc()){
            $arr[] = $row;
        }
        return $arr;
    }
    public function create(){
        $rs = $this->con->query("SELECT * FROM time_manager_1");

        $arr = [];
        while($row = $rs->fetch_assoc()){
            $arr[] = $row;
        }
        $i = 0;
        while($i < count($arr)){
            $timeId = $arr[$i]['time_id'];
            $rs1 = $this->con->query("SELECT time FROM times WHERE time_id = $timeId");
            $a1 = $rs1->fetch_assoc();
            $arr[$i]['time_name'] = $a1['time'];
            $i=$i+1;
        }
        return $arr;
    }
    public function yourClub(){
        $user_id = $_SESSION['user_id'];
        $rs = $this->con->query("SELECT * FROM quanly_club WHERE user_id = $user_id");

        $arr = [];
        while($row = $rs->fetch_assoc()){
            $numOfMember = $row['club_id'];
            $sothanhvien = $this->con->query("SELECT COUNT(club_id) FROM quanly_club WHERE club_id = $numOfMember");
            $a = $sothanhvien->fetch_assoc();
            $row['numOfMember'] = $a['COUNT(club_id)'];
            $arr[] = $row;
        }
        $i = 0;
        while($i < count($arr)){
            $nameClub = $arr[$i]['club_id'];
            $rs1 = $this->con->query("SELECT club_name FROM clubs WHERE club_id = $nameClub");
            $a1 = $rs1->fetch_assoc();
            $arr[$i]['club_name'] = $a1['club_name'];
            $i=$i+1;
        }
        return $arr;
    }
    public function joinClub(){
        $user_id = $_SESSION['user_id'];
        $club_id = $_REQUEST['id'];
        $result = $this->con->query("SELECT * FROM quanly_club WHERE user_id = $user_id AND club_id = $club_id");
        if(mysqli_num_rows($result) == 0){
            $sql2 = "INSERT INTO quanly_club(user_id, club_id) VALUES ('$user_id', $club_id)";
            $rs = $this->con->query($sql2);
        }
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=yourClub');
    }
    public function exitClub(){
        $user_id = $_SESSION['user_id'];
        $club_id = $_REQUEST['id'];
        $sql2 = "DELETE FROM quanly_club WHERE user_id = $user_id AND club_id = $club_id";
        $rs = $this->con->query($sql2);
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=yourClub');
    }
    public function ghep(){
        $match_id = $_REQUEST['match_id'];
        $club_ghep_id = $_REQUEST['club_ghep_id'];
        $result = $this->con->query("UPDATE matchs SET club_id_2 = $club_ghep_id WHERE match_id = $match_id");
        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=dadat');
    }

    public function chonSan(){
        $match_id = $_REQUEST['match_id'];
        $pitch_id = $_REQUEST['pitch_id'];
        $result = $this->con->query("UPDATE matchs SET pitch_id = $pitch_id WHERE match_id = $match_id");

        $rs3 = $this->con->query("SELECT time_id FROM matchs WHERE match_id = $match_id");
        $a3 = $rs3->fetch_assoc();
        $time_id = $a3['time_id'];
        $this->con->query("UPDATE time_manager_1 SET pitch_".$pitch_id." = 1 WHERE time_id = $time_id");
        $this->con->query("UPDATE time_manager SET time_".$time_id." = 1 WHERE pitch_id = $pitch_id");

        header('Location: http://127.0.0.1/qlsb/index.php?controller=match&task=dadat');
    }
}