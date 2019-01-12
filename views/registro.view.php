<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/formPayStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i" rel="stylesheet">
	<title>Registro</title>
</head>
<body class="row">
	<div class="container shadow col-lg-6 col-center mt-5 p-5" id="container">
		<h1 class="mb-5">Regístrate</h1>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario form-inline row p-2" name="login">
			<div class="col-8 col-center row">
				<input type="text" name="firstName" class="usuario form-control mb-2 col-12" placeholder="Nombre" autocomplete="off" autofocus>
				<input type="text" name="lastName" class="usuario form-control mb-2 col-12" placeholder="Apellido" autocomplete="off">
				<input type="text" name="username" class="usuario form-control mb-2 col-12" placeholder="Usuario" autocomplete="off">
				<input type="email" name="email" class="usuario form-control mb-2 col-12" placeholder="correo">
				<input type="password" name="password" class="password form-control mb-2 col-12" placeholder="contraseña">
				<input type="password" name="password2" class="password form-control mb-2 col-12" placeholder="repetir contraseña"> <br>
				<input type="submit" name="enviar" value="->" class="enviar btn btn-outline-dark col-6" style="padding: 1em 2em 1em 2em; margin: 2em 0; background-color: #B8711B; border: none; border-radius: 8px; color: white;">
			</div>
			<?php  if(!empty($errores)):?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php  endif;?>
		</form>
		<p class="texto-registrate">
			<a href="login.php">Inicia sesión</a>
		</p>
	</div>
</body>
</html>