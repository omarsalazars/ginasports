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
        <title>GinaSports - Producto</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/individualProduct.js"></script>
    </head>
    <body>
        <?php require_once('controller/banner.controller.php'); ?>

        <?php require_once('cart.php'); ?>

        <div class="container" id="numpag">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" id="verh" href="store.php">Volver al catálogo</a></li>
                
            </ul>
        </div>
        <?php
            if(isset($_SESSION['error']))
            {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
        <div class="jumbotron imagen-lupa d-flex">
            <div class="row">
                <div class="p-2 col-md-6 col-xs-12">
                    <img id="imgSeleccionada" src="images/products/<?php echo $product['id'];?>-0.jpg">
                </div>
                <div class="d-flex flex-column p-2 col-md-6 col-xs-12">
                    <div class="container info p-2">
                        <div class="card-body">
                            <?php if($product['stock'] == 0):?>
                                <h5 class="card-title" id="nostock">Agotado</h5>
                            <?php endif;?>
                            <div class="clearfix">
                                <h5 class="card-title float-sm-left" id="nombre1"><?php echo $product['productname'];?></h5>
                                <div class="float-sm-right">
                                <?php if($product['discount'] > 0):?>
                                    <strike>$<?php echo $product['price'];?></strike>
                                    <kbd>$<?php echo $product['price'] - ($product['price'] * $product['discount'])/100 ;?></kbd>
                                <?php else:?>
                                    <kbd>$<?php echo $product['price'];?></kbd>
                                <?php endif;?>
                                </div>
                            </div>
                            <p class="card-text"><?php echo $product['description'];?></p>
                            <?php if($product['stock'] != 0):?>
                                <div class="d-flex flex-row">
                                    <form method="GET" action="addCart.php">
                                        <select name="amount" id="amount">
                                            <?php
                                                for($i=1;$i<=$product['stock'];$i++){
                                                    echo "<option>".$i."</option>";
                                                }
                                            ?>
                                        </select>
                                        <button type="submit" class="btn btn-outline-dark" name="id" value="<?php echo $product['id']; ?>">Agregar al carrito <i class="fas fa-cart-plus"></i></button>
                                    </form>
                                </div>
                                <p class="card-text" id="stock">Quedan: <?php echo $product['stock'];?></p>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="d-flex flex-row ml-1" id="minivistas">
                        <?php for($i=1;$i<$product['image'];$i++): ?>
                            <div class="miniatura p-2">
                                <img id="mini<?php echo $i?>" src="images/products/<?php echo $product['id'].'-'.$i;?>.jpg" onclick="ver(this.id);">
                            </div>
                        <?php endfor;?>
                    </div>
                </div>
            </div>
        </div>
        <?php require('controller/footer.controller.php'); ?>
    </body>
</html>