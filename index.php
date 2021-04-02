<?php

$task = $_REQUEST['task'];
$conName = "MatchController";
require_once "Controllers/MatchController.php";
$con = new $conName();
$con->$task();
