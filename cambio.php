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
	<?php
	require_once("db/db.php");
	require_once("model/user.model.php");
	if ($_SERVER['REQUEST_METHOD'] == 'POST'):
		$userModel = new UserModel();
		$selector = $_GET['selector'];
		$userModel->setNewPassword($selector, $_POST['password']);
		header('Location:login.php');
	else:
	?>
	<div class="container shadow col-lg-4 col-center mt-5 p-5" id="container">
		<h1 class="mb-5">Recuperación de contraseña</h1>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline row p-2" name="recover">
			<input type="text" name="password"  class="form-control mb-2 col-12 mt-2" placeholder="contraseña nueva">
			<!--<input type="text" name="password2"  class="form-control mb-2 col-12 mt-2" placeholder="repite tu contraseña">-->
			<div class="col-12 clearfix p-0">
				<input type="submit" name="enviar" value="Enviar" id="enviar" class="btn btn-outline-dark col-4 float-right">
			</div>
		</form>
		<p class="texto-registrate m-0">
			<a href="signup.php">Regístrate</a>
		</p>
	</div>
	<?php
	endif;
	?>
</body>
</html>