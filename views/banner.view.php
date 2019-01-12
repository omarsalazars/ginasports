<div id="encabezado" class="jumbotron d-flex flex-row-reverse">
    <div id="links" class="text-right">
        <a id="car" href="#"><i class="fas fa-shopping-cart"></i></a>
        <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
        <a href="chat.php"><i class="fas fa-comments mr-2"></i>Chat</a>
        <button type="button" class="btn btn-link" style="text-decoration: none; color: white">
            <?php if($session): ?>
                <p><?php echo $session; ?></p>
                <p><a href="logout.php">Cerrar sesión</a><p>
            <?php endif; ?>
            <?php if(!$session): ?>
                <a href="login.php">Iniciar sesión</a>
            <?php endif; ?>
        </button>
    </div>
    <div id="titulo" class="container">
        <img class="img-responsive" src="images/logo.png">
        <h5>Si es Gina, es calidad</h5>
    </div> 
</div>