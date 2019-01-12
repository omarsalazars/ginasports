<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i" rel="stylesheet">
	<title>Contenido</title>

</head>
<body>

	<header>
		<div class="contenedor">
			<h1 class="titulo">Subir</h1>
		</div>
	</header>
	<a href="cerrar.php">Cerrar sesion</a>
	
	<div class="contenedor">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="POST" enctype="multipart/form-data">

			<label for="titulo">Titulo del producto</label>
			<input type="text" id="titulo" name="productname" value="<?php if(isset($productname)){echo $productname;}?>">

			<label for="texto">Descripción:</label>
			<textarea name="description" id="texto" placeholder="Coloca descripción para el producto"><?php if(isset($description)){ echo $description;}?></textarea>
			
			<label for="titulo">Precio $</label>
			<input type="text" id="titulo" name="price" value="<?php if(isset($price)){ echo $price;}?>">
			<label for="titulo">Descuento %</label>
			<input type="text" id="titulo" name="discount" value="<?php if(isset($discount)){ echo $discount;}?>">
			<label for="titulo">Cantidad en stock</label>
			<input type="text" id="titulo" name="stock" value="<?php if(isset($stock)){ echo $stock;}?>">
			
			<label for="image">Selecciona imagen del producto</label>
			<input type="file" id="foto" name="image">

			<?php  if(!empty($errores)):?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php  endif;?>

			<input type="submit" class="submit" name="submit" value="Subir">
		</form>
	</div>

	<a href="index.php" class="regresar">Regresar</a>

</body>
</html>