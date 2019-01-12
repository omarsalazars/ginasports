<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GinaSports</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis:200,300|Open+Sans|Raleway" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <?php require_once 'style.php' ?>
        <link rel="stylesheet" href="css/otroStyle.css">
		<link rel="stylesheet" type="text/css" href="css/formStyle.css">
    </head>
    <body>
        <?php require_once('controller/banner.controller.php'); ?>
      	<div class="container shadow">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="productName" class="form-control" placeholder="Nombre del producto" autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<textarea name="description" class="form-control" placeholder="Descripción"></textarea>
				</div>
				<div class="form-group">
					<input type="number" name="price" class="form-control" placeholder="Precio" min="0">
				</div>
				<div class="form-group">
					<input type="number" name="discount" class="form-control" placeholder="Descuento %" min="0">
				</div>
				<div class="form-group">
					<input type="number" name="stock" class="form-control" placeholder="Cantidad Stock" min="0">
				</div>
				<div class="form-group">
					<input type="file" name="image[]" class="form-control" multiple>
				</div>
				<div class="form-group">
					<select class="form-control" name="type">
						<option>Lentes</option>
						<option>Calzado</option>
						<option>Ropa</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="gender">
						<option>Masculino</option>
						<option>Femenino</option>
						<option>Unisex</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="enviar" value="Subir" class="btn btn-outline-dark float-sm-right">
				</div>
				<?php  if(!empty($errores)):?>
					<div class="error">
						<ul>
							<?php echo $errores; ?>	
						</ul>
					</div>
				<?php  endif;?>
			</form>
		</div>
    </body>
</html>