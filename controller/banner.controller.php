<?php 

$session = isset($_SESSION['user']);

if($session){
	$session = $_SESSION['user'];
}

require_once 'views/banner.view.php';
?>