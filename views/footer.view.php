<div id="pie" class="jumbotron d-flex flex-row-reverse">
    <p class="p-2">Derechos reservados</p>
    <div class="p-2 cotainer">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
    <?php if($admin): ?>
    	<button type="button" class="btn btn-dark">
    		<a href="upload.php" class="text-light">Subir producto</a>
    	</button>
    	<button type="button" class="btn btn-dark float-right mr-5">
			<a href="stats.php" class="text-light">Visitas <h1><?php include 'count.php'?> </h1></a>
		</button>
	<?php endif; ?>
	<button type="button" class="btn btn-dark float-right mr-5">
		<a href="cookies.php" class="text-light">Configuración</h1></a>
	</button>
</div>