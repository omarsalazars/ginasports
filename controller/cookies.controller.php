<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user = $_SESSION['user'];
	$type = $_POST['type'];
	setcookie($user.'view',$type,time() + 60 * 60 * 24 * 365 );

	header('Location: store.php');
}
require_once 'views/cookies.view.php';
?>