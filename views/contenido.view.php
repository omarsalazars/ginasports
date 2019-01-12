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
			<h1 class="titulo">Catálogo</h1>
		</div>
	</header>
	<p><?php echo "$name"; ?></p>
	<a href="cerrar.php">Cerrar sesion</a>
	<section class="fotos">
		<div class="contenedor">
			<?php foreach($imagenes as $imagen): ?>
				<div class="thumb">
					<a href="producto.php?id=<?php  echo $imagen['id'];?>">
						<img src="images/<?php echo $imagen['image']; ?>">
						<p style="text-align: center;"> $<?php echo $imagen['price']-($imagen['price']*$imagen['discount']/100); ?> </p>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if($admin): ?>
			<a href="subir.php" class="regresar">SUBIR</a>
		<?php endif; ?>
		<a href="cookies.php" class="regresar">Configurar cuenta</a>
	</section>

</body>
</html>