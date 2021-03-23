<?php

$task = $_REQUEST['task'];
$controller = $_REQUEST['controller'];
$conName = ucfirst($controller)."Controller";
require_once "Controllers/".$conName.".php";
$con = new $conName();
$con->$task();
