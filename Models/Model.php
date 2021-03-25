<?php

class Model{
	var $con;
	public function __construct(){
		$this->con = mysqli_connect("localhost", "root", "", "qlsb");
		mysqli_set_charset($this->con, 'UTF8');
	}
}
?>