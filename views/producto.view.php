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
			<h1 class="titulo"><?php echo $imagen['productname']; ?></h1>
		</div>
	</header>
	<a href="cerrar.php">Cerrar sesion</a>
	
	<div class="contenedor">
		<?php if($_SESSION['admin']): ?>
			<a href="modificarProducto.php?image=<?php echo $imagen['id'];?>" class="regresar">Modificar</a>
		<?php endif; ?>
		
		<div class="foto">
			<img src="images/<?php echo $imagen['image'] ?>">
			<p class="texto">
				<?php echo $imagen['description']; ?>
			</p>
			<p class="texto">
				Costo: $<?php echo $imagen['price']-($imagen['price']*$imagen['discount']/100); ?>
			</p>
			<p class="texto">
				Quedan: <?php echo $imagen['stock']; ?>
			</p>
			<a href="index.php" class="regresar">Regresar</a>
		</div>
	</div>

</body>
</html>