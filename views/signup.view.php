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
		<link rel="stylesheet" type="text/css" href="css/formPayStyle.css">
		<title>Log in</title>
		<script type="text/javascript" src="js/validateSingup.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body class="row">
	<div class="container shadow col-lg-4 col-center mt-5 p-5" id="container">
		<h1>Regístrate</h1>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario form-inline row p-2" name="login" onsubmit="return validate();">
			<span id='firstTxt'></span>
			<input type="text" name="firstName" class="form-control mb-2 col-12" placeholder="Nombre" autocomplete="off" id="firstName" autofocus>
			<span id='lastTxt'></span>
			<input type="text" name="lastName" class="form-control mb-2 col-12" placeholder="Apellido" id="lastName" autocomplete="off">
			<span id='userTxt'></span>
			<input type="text" name="username" class="form-control mb-2 col-12" placeholder="Usuario" autocomplete="off" id="username">
			<span id='emailTxt'></span>
			<input type="email" name="email" class="form-control mb-2 col-12" placeholder="correo" id="email">
			<span id='passTxt'></span>
			<input type="password" name="password" class="form-control mb-2 col-12" placeholder="contraseña" id="password">
			<span id='pass2Txt'></span>
			<input type="password" name="password2" class="form-control mb-2 col-12" placeholder="repetir contraseña" id="password2">
			<div class="g-recaptcha" data-sitekey="6LdFrYIUAAAAAF2wY4Egun1DpSzcKwQDgygZ-nB3"></div>
			<div class="col-12 clearfix p-0">
				<input type="submit" name="enviar" value="Registrar" class="enviar btn btn-outline-dark col-4 float-right" id="submit" onclick="validate();">
			</div>
			<?php  if(!empty($errores)):?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>	
					</ul>
				</div>
			<?php  endif;?>
		</form>
		<p class="texto-registrate m-0">
			<a href="login.php">Inicia sesión</a>
		</p>
		<span id="txtHint"></span>
	</div>
</body>
</html>