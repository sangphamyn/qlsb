<?php

class MatchView{
	public function index($home){
		include "Templates/match/index.php";
	}
	public function login(){
		include "Templates/match/login.php";
	}
	public function create(array $lichsan, array $club, array $data, $taotran){
		include "Templates/match/create.php";
	}public function createClub($taodoi){
		include "Templates/match/createClub.php";
	}
	public function dadat(array $data, array $xacnhan, $dadat){
		include "Templates/match/dadat.php";
	}
	public function choghep(array $data, $choghep){
		include "Templates/match/choghep.php";
	}
	public function allClub(array $data, $allClub){
		include "Templates/match/allClub.php";
	}
	public function yourClub(array $data){
		include "Templates/match/yourClub.php";
	}
	public function clubMember(array $data){
		include "Templates/match/clubMember.php";
	}
}