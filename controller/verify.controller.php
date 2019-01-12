<?php 
require_once("db/db.php");
require_once("model/user.model.php");

$userModel = new UserModel();

$selector = $_SERVER['QUERY_STRING'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errores = "";
	$login = filter_var(strtolower($_POST['login']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$remember = isset($_POST['remember']);
	$resultado = $userModel->userExists($login);
	if(!$resultado) $resultado = $userModel->emailExists($login);
	if($resultado && password_verify($password,  $resultado['passwd'])){
		try {
			$userModel->verifyUser($selector);
			$_SESSION['user'] = $resultado['username'];
			$_SESSION['admin'] = $resultado['admin'];
			if($remember){
				setcookie('user',$login,time() + 60 * 60 * 24 );
				setcookie('pass',$password,time() + 60 * 60 * 24);
			}
			header('Location: store.php');
		} catch (Exception $e) {
			echo $e;
		}
	}
	else{
		$errores .= "<li>login o contraseña incorrectos</li>";
	}
}

require_once 'views/login.view.php';
?>