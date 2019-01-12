<?php 
require_once("db/db.php");
require_once("model/user.model.php");
$userModel = new UserModel();
$user = '';

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}

$admin = $userModel->isAdmin($user);

require_once 'views/footer.view.php';
?>