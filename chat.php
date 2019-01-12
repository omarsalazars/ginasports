<?php session_start();
if(isset($_GET['user'])){
    $user = $_GET['user'];
}
else{
    $user = $_SESSION['user'];
}
require_once 'controller/chat.controller.php';
?>