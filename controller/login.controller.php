<?php
require_once("db/db.php");
require_once("model/user.model.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ParagonIE\ConstantTime\Encoding;
use ParagonIE\ConstantTime\Base64UrlSafe;

require 'vendor/autoload.php';

if(isset($_SESSION['user'])){
	header('location: store.php');
}

$userModel = new UserModel();
$rUser = "";
$rPass = "";

if(isset($_COOKIE['user'])){
	$rUser = $_COOKIE['user'];
	$rPass = $_COOKIE['pass'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errores = "";
	$login = filter_var(strtolower($_POST['login']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$remember = isset($_POST['remember']);
	try {
		$resultado = $userModel->userExists($login);
		if(!$resultado){
			$resultado = $userModel->emailExists($login);
		}
		if($resultado){
			if(password_verify($password,  $resultado['passwd'])){
				if($remember){
					setcookie('user',$login,time() + 60 * 60 * 24 );
					setcookie('pass',$password,time() + 60 * 60 * 24);
				}
				if($resultado['active']){
					$_SESSION['user'] = $resultado['username'];
					$_SESSION['admin'] = $resultado['admin'];
					header('Location: store.php');
				} else{
					$errores .= "Por favor confirme su cuenta de correo";
				}
			}
			else{
				$errores .= "Login o contraseña incorrectos";
				$id = $userModel->getIdByLogin($login);
				$id = $id['id'];
				//$userModel->blockUserById($id);
				if(isset($_SESSION["tries".$id])){
					$_SESSION["tries".$id]++;
				}
				else{
					$_SESSION["tries".$id] = 1;
				}
				if($_SESSION["tries".$id]>=3){
					///EMPIEZA BLOQUEO CORREO Y ENVIO DE EMAIL
					$userModel->blockUserById($id);
					unset($_SESSION["tries".$id]);
					$email = $userModel->getEmailById($id);
					$selector = $userModel->getSelectorbyId($id);
					$selector = $selector['selector'];
					$email = $email['email'];
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
						$mail->addAddress($email);
						$mail->isHTML(true);
						$mail->Subject = 'Desbloquea tu cuenta';
						$mail->Body    = "Entra al siguiente enlace para desbloquear tu cuenta <br><a href='$url'>$url</a>";
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();
					} catch (Exception $e) {
						echo $e;
					}
				}
			}
			
			
		}
		
		
	} catch (Exception $e) {
		$x = $e->getMessage();
		header("Location: error.php?error=$x");
	}
}

require_once 'views/login.view.php';