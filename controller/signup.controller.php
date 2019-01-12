<?php  
require_once("db/db.php");
require_once("model/user.model.php");

if(isset($_SESSION['user'])){
	header('location: store.php');
}

$userModel = new UserModel();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ParagonIE\ConstantTime\Encoding;
use ParagonIE\ConstantTime\Base64UrlSafe;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errores = "";
	$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
	$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
	$username = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING );
	$password = $_POST['password'];
	$password2 = $_POST['password2']; 
	$email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING );
	$selector = Base64UrlSafe::encode(random_bytes(9));
	$response = '';


	if(empty($username) or empty($password) or empty($password2) or empty($firstName) or empty($lastName)){
		$errores .= '<li>Rellena todos los datos</li>';
	}
	if($password != $password2){
		$errores .= '<li>Las contraseñas no coinciden</li>';
	}

	if($userModel->userExists($username)){
		$errores .= '<li>Usuario no disponible</li>';
	}
	if($userModel->emailExists($email)){
		$errores .= '<li>Correo no disponible</li>';
	}

	if($errores==''){
		try {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$userModel->addUser($username,$password,$email,$firstName,$lastName,$selector);
		} catch (Exception $e) {
			echo $e;
		}
		
		$url = $_SERVER['SERVER_NAME']."/ginasports/verify.php?$selector";

		$mail = new PHPMailer(true);
		try {
			//Server settings
			$mail->SMTPDebug = 0;                              
			$mail->isSMTP();                              
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;                           
			$mail->Username = 'ginasportsoficial@gmail.com';
			$mail->Password = 'Gsports98';          
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			//Recipients
			$mail->setFrom('ginasportsoficial@gmail.com', 'Gina Sports');
			$mail->addAddress($email, $firstName);
			$mail->isHTML(true);
			$mail->Subject = 'Verifica tu correo';
			$mail->Body    = "Entra al siguiente enlace para verificar <br><a href='$url'>$url</a>";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
		} catch (Exception $e) {
			echo $e;
		}

		header('Location: login.php');
	}
}

require 'views/signup.view.php';