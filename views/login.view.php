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
</head>
<body class="row">
	<div class="container shadow col-lg-4 col-center mt-5 p-5" id="container">
		<h1 class="mb-5">Inicia sesión</h1>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario form-inline row p-2" name="login">
			<input type="text" name="login"  class="form-control mb-2 col-12 mt-2" placeholder="usuario o correo" value="<?php if(isset($rUser)){ echo $rUser;}?>">
			<input type="password" name="password"  class="form-control mb-2 col-12 mt-2" placeholder="contraseña"  value="<?php if(isset($rPass)){ echo $rPass;}?>">
			<div class="checkbox mt-3">
				<label for="remember" class="form-check-label mr-5"><input type="checkbox" name="remember" id="remember" value="true">   Recuérdame por un día</label>
			</div>
			<div class="col-12 clearfix p-0">
				<input type="submit" name="enviar" value="Entrar" id="entrar" class="btn btn-outline-dark col-4 float-right">
			</div>
		</form>
		<?php  if(!empty($errores)):?>
			<div class="error">
				<?php echo $errores; ?>
			</div>
		<?php  endif;?>
		<p class="texto-registrate m-0">
			<a href="signup.php">Regístrate</a>
		</p>
		<p class="texto-olvido m-0">
			<a href="recover.php">¿Olvidaste tu contraseña?</a>
		</p>
	</div>
</body>
</html>