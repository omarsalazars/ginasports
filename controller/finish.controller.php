<?php

session_start();

if(!isset($_SESSION['user']) || !isset($_POST['street']))
{
	header('Location: store.php');
	exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ParagonIE\ConstantTime\Encoding;
use ParagonIE\ConstantTime\Base64UrlSafe;

require_once('model/user.model.php');
require_once('model/product.model.php');



$userModel=new UserModel();
$userInfo=$userModel->getFullNameByUserName($_SESSION['user']);

$email=$userModel->getEmailByUserName($_SESSION['user']);

$name=$userInfo['firstName'];
$lastname=$userInfo['lastName'];
$street=$_POST['street'];
$hood=$_POST['hood'];
$cp=$_POST['cp'];
$phone=$_POST['phone'];
$special=$_POST['special'];

$productModel=new ProductModel();

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
			$mail->addAddress($email['email'], $name);
			$mail->isHTML(true);
			$mail->Subject = 'Compra realizada';
			$mail->Body    = "Realizaste la compra de los siguientes productos:<br>";

			$total=0;
			$cart=$_SESSION['cart'];
			for($i=0;$i<count($_SESSION['cart']);$i+=2)
			{
				$result=$productModel->getProductById($cart[$i]);
				$p=$result->fetch();
				$mail->Body.='<p> '.$p['productname'].'    Cantidad: '.$cart[$i+1].'  importe: '.$cart[$i+1]*($p['price'] - ($p['price'] * $p['discount'])/100).'</p>';
				$total+=$cart[$i+1]*($p['price'] - ($p['price'] * $p['discount'])/100);
				$productModel->removeProductsById($cart[$i],$cart[$i+1]);
				echo "ELIMINADO";
			}

			$mail->Body.='<h3>Total: '. $total .'</h3>';
			$mail->Body.='<p>Fecha estimada para dentro de 3 dias.</p>';


			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
		} catch (Exception $e) {
			echo $e;
		}
	}
	unset($_SESSION['cart']);
$_SESSION['finished']="Compra realizada con éxito, revisa tu correo electrónico para más información.";
header('Location: index.php');

?>