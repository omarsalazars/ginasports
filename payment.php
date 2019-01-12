<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location: store.php');
	exit();
}

require('controller/payment.controller.php');

?>