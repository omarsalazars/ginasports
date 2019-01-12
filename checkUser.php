<?php
require_once("db/db.php");
require_once("model/user.model.php");
$userModel = new UserModel();

if(isset($_REQUEST['username'])){
	$user = $_REQUEST["username"];
	if ($user !== "") {
	    $user = strtolower($user);
	    $resultado = $userModel->userExists($user);
	    if($resultado){
	    	echo "Usuario no disponible";
	    }
	    else{
	    	echo "";
	    }
	}
	else{
		echo "Ingrese un nombre de usuario";
	}
}

if(isset($_REQUEST['email'])){
	$email = $_REQUEST["email"];
	if ($email !== "") {
		$email = strtolower($email);
	    $resultado = $userModel->emailExists($email);
	    if($resultado){
	    	echo "Email no disponible";
		}
	}
	else{
		echo "Ingrese un correo electrónico";
	}
}

if(isset($_REQUEST['password']) && !isset($_REQUEST['password2'])){
	$password = $_REQUEST["password"];
	if ($password == "") {
	    echo "Ingrese una contraseña";
	}
}

if(isset($_REQUEST['password2'])){
	$password2 = $_REQUEST["password2"];
	$password = $_REQUEST["password"];
	if($password != $password2){
		echo "Las contraseñas no coinciden";
	}
}

if(isset($_REQUEST['firstName']) && $_REQUEST['firstName'] == ''){
	echo "Ingrese su nombre";
}

if(isset($_REQUEST['lastName']) && $_REQUEST['lastName'] == ''){
	echo "Ingrese su apellido";
}


?>