<?php session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']){
	header('location: index.php');
}



require_once 'controller/stats.controller.php';
?>