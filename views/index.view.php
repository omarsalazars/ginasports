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
        <link rel="stylesheet" href="css/individualStyle.css">
        <link rel="stylesheet" href="css/carStyle.css">

    </head>

    
    <body>
        <?php require_once('controller/banner.controller.php'); ?>
        <?php require_once('cart.php'); ?>
        <!--navbar-->
        <nav class="navbar navbar-expand-lg bg-white sticky-top justify-content-center navbar-light">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="navbar-brand text-dark" href="#arriba"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#acede">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#cont">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#nos">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#ayu">Ayuda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="store.php">Tienda</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--navbar-->

<?php
    if(isset($_SESSION['finished'])){
        echo $_SESSION['finished'];
        unset($_SESSION['finished']);
    }
    ?>

        <div id="pv">
        <div id="video">
            <video autoplay muted loop id="vid">
               <source src="Videos/inicio.mp4" type="video/mp4">
            </video>
        </div>
        </div>
        <div class="jumbotron" id="us">
            <a name="acede"><h5>Acerca de</h5></a>
            <p>Somos un grupo de alumnos que cursa el 5° semestre de la carrera de Ingeniería en Sistemas Computacionales en la Universidad Autónoma de Aguascalientes. Esta tienda es proyecto final de la materia Programación de Sistemas
            Web impartida por la maestra Georgina Salazar Partida. <abbr class="initialism">NO ES UNA TIENDA VIRTUAL REAL</abbr>.</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card usper">
                            <img class="rounded-circle card-img noimg4" src="images/carlos.jpeg" alt="5C">
                            <div class="card-body datos">
                                <h5>Carlos Aranda</h5>
                                <p>Carlos Emmanuel Aranda Ochoa 221560<br>5° C</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card usper">
                           <img class="rounded-circle card-img noimg4" src="images/moni.jpg" alt="5C">
                            <div class="card-body datos">
                                <h5>Mónica Barrios</h5>
                                <p>Mónica Adriana Barrios Zavala 219242 <br>5° C</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card usper">
                            <img class="rounded-circle card-img noimg4" src="images/edgar.jpg" alt="5C">
                            <div class="card-body datos">
                                <h5>Edgar Beristain</h5>
                                <p>Edgar Eduardo Beristain Urrea 219563 <br>5° C</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card usper">
                            <img class="rounded-circle card-img" src="images/omar.jpeg" alt="5A">
                            <div class="card-body datos">
                                <h5>Omar Salazar</h5>
                                <p>Omar Salazar Salazar <br>174758<br>5° A</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron" id="contacto" style="background: url('images/contacto.jpg'); background-attachment: fixed; background-size: cover;">
            <div class="container">
                <a name="cont"><h5>Contáctanos</h5></a>
                <div class="card cardcont">
                    <div class="card-body datoscont">
                        <i class="fas fa-phone"></i>9-99-99-99
                        <br><i class="fab fa-whatsapp"></i>449-999-99-99
                        <br><i class="fas fa-map-marked-alt"></i>Universidad Autónoma de Aguascalientes
                    </div>
                </div>
                <h5>Envíanos un mensaje</h5>
                <form>
                    <div class="form-group" style="width: 50%">
                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <label for="correo">E-mail:</label>
                        </div>
                        <input type="email" class="form-control" id="correo">
                        <label style="margin-top: 2%;" for="mensaje">Mensaje:</label>
                        <br><textarea rows="5" id="mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Enviar correo</button>
                </form>
            </div>
        </div>
        <div class="jumbotron" id="vmo">
            <a name="nos"></a>
            <div class="container nosotros" id="mis">
                <h5>Misión</h5>
                <p>Ser una empresa de gran renombre y conocida principalmente por brindar comodidad y darle gusto a nuestros clientes.<br>Ofrecer siempre productos de la mejor calidad y con la mejor disponibilidad para todo nuestro público.</p>
            </div>
            <div class="container nosotros" id="vis">
               <h5>Visión</h5>
                <p>Ser una empresa responsable con el medio ambiente e inclusiva, siempre estar sumados a proyectos que beneficien a la sociedad y que apoyen el sano desarrollo de las personas, animar a las buenas causas y ser un ejemplo de que haciendo las cosas bien se puede llegar muy lejos.</p>
            </div>
            <div class="container nosotros" id="obj">
                <h5>Objetivo</h5>
                <p>Que los clientes y nuestra competencia nos reconozcan como una empresa fuerte y capaz. Ser una empresa que brinde el mejor servicio cubriendo siempre los estándares de claidad de los clientes.</p>
            </div>
        </div>
        <div class="jumbotron" id="prefre" style="background: url('images/faqs2.jpg'); background-attachment: fixed; background-size: cover;">
            <a name="ayu"><h5>Preguntas frecuentes</h5></a>
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">¿Solo tienen sucursal en Aguascalientes?</a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <p>Así es, pero nuestra tienda virtual reparte a todo el país.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">¿Se pueden hacer devoluciones de mercancia?</a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>Mándanos un correo para conocer tus razones.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">¿Venden calzado para niños?</a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>No, solo manejamos para dama y caballero.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">¿Pueden hacer pedidos?</a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>Mándanos un correo para darte una mejor respuesta.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">¿Ustedes son fabricantes?</a>
                    </div>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>No, solo somos distribuidores, los productos que manejamos llegan a todo el país.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <?php require('controller/footer.controller.php'); ?>
    </body>
</html>