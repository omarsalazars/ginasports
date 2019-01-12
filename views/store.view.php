<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis:200,300|Open+Sans|Raleway" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <?php require_once 'style.php' ?>
        <link rel="stylesheet" href="css/otroStyle.css">
        <link rel="stylesheet" href="css/individualStyle.css">
        <link rel="stylesheet" href="css/carStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Tienda</title>
    </head>
    <body onload="pagination(0);">
        <?php require_once('controller/banner.controller.php'); ?>
        <?php require_once('cart.php'); ?>
        <div class="container" id="numpag">
            <h5 class="red-text text-center">Artículos</h5>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" id="Todo" onclick="changeType(this.id);">Todos</a></li>
                <li class="page-item"><a class="page-link" id="Lentes" onclick="changeType(this.id);">Lentes</a></li>
                <li class="page-item"><a class="page-link" id="Ropa" onclick="changeType(this.id);">Ropa</a></li>
                <li class="page-item"><a class="page-link" id="Calzado" onclick="changeType(this.id);">Calzado</a></li>
            </ul>
        </div>
        <div class="container" id="numpag">
            <h5 class="red-text text-center">Género</h5>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" id="Todo" onclick="changeGender(this.id);">Todos</a></li>
                <li class="page-item"><a class="page-link" id="Masculino" onclick="changeGender(this.id);">Masculino</a></li>
                <li class="page-item"><a class="page-link" id="Femenino" onclick="changeGender(this.id);">Femenino</a></li>
                <li class="page-item"><a class="page-link" id="Unisex" onclick="changeGender(this.id);">Unisex</a></li>
            </ul>
        </div>
        <div class="jumbotron" id="muestra">
            <div class="container" id="productsDiv">
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="listPag">
                
            </ul>
        </nav>
        <?php require('controller/footer.controller.php'); ?>
        <script type="text/javascript" src="js/products.js"></script>
    </body>
</html>