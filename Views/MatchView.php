<?php

class MatchView{
	public function index(){
		include "Templates/match/index.php";
	}
	public function login(){
		include "Templates/match/login.php";
	}
	public function create(array $lichsan, array $club, array $data){
		include "Templates/match/create.php";
	}public function createClub(){
		include "Templates/match/createClub.php";
	}
	public function dadat(array $data, array $xacnhan){
		include "Templates/match/dadat.php";
	}
	public function choghep(array $data){
		include "Templates/match/choghep.php";
	}
	public function allClub(array $data){
		include "Templates/match/allClub.php";
	}
	public function lichsan(array $data){
		include "Templates/match/lichsan.php";
	}
	public function yourClub(array $data){
		include "Templates/match/yourClub.php";
	}
}