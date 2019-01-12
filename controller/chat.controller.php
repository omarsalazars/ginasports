<?php

require_once 'db/db.php';
require_once 'model/chat.model.php';

$chatModel = new ChatModel();

if(!isset($_SESSION['user'])) header('Location: login.php');
$receiver = "";
$sender = "";
if($_SESSION['admin']){
	$receiver = $user;
	$sender = "admin";
}
else{
	$receiver = "admin";
	$sender = $user;
}

require_once 'views/chat.view.php';