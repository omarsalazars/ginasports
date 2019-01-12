<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis:200,300|Open+Sans|Raleway" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="formPayStyle.css">
		<title>Recuperar contraseña</title>
</head>
<body class="row">
	<div class="container shadow col-lg-4 col-center mt-5 p-5" id="container">

		<?php
		require_once("db/db.php");
		require_once("model/user.model.php");

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		use ParagonIE\ConstantTime\Encoding;
		use ParagonIE\ConstantTime\Base64UrlSafe;

		require 'vendor/autoload.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST'):
		
			$userModel = new UserModel();
			
			if($userModel->emailExists($_POST['login'])){
				$selector = $userModel->getSelectorByEmail($_POST['login']);
				$selector = $selector['selector'];
			
					$email = $_POST['login'];
					$url = $_SERVER['SERVER_NAME']."/ginasports/cambio.php?selector=$selector";

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
						$mail->Subject = 'Cambia tu contraseña';
						$mail->Body    = "Entra al siguiente enlace para cambiar tu contraseña <br><a href='$url'>$url</a>";
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();
					} catch (Exception $e) {
						echo $e;
					}
					header('Location: index.php');
			
			}
			else{
				echo "No hay ninguna cuenta con ese correo";
			}
		else:

		?>
		<h1 class="mb-5">Confirma tu correo</h1>
		<p class="h5 m-0">Recibirás un correo para confirmar que eres tú y poder recuperar tu cuenta</p>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline row p-2" name="recover">
			<input type="text" name="login"  class="form-control mb-2 col-12 mt-2" placeholder="usuario o correo">
			<div class="col-12 clearfix p-0">
				<input type="submit" name="enviar" value="Enviar" id="enviar" class="btn btn-outline-dark col-4 float-right">
			</div>
		</form>
		<p class="texto-registrate m-0">
			<a href="signup.php">Regístrate</a>
		</p>
		<?php
		endif;
			
		?>
	</div>
</body>
</html>