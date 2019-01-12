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
		<link rel="stylesheet" type="text/css" href="css/formPayStyle.css">
		<title>Pagos</title>
		<script type="text/javascript">
			$(document).ready(function(){
                $("#card").click(function(){
                    $("#cardForm").toggle("slow");
                    $("#payForm").hide("slow");
                    $("#shipmentForm").hide("slow");
                });

                $("#paypal").click(function(){
                    $("#payForm").toggle("slow");
                    $("#cardForm").hide("slow");
                    $("#shipmentForm").hide("slow");
                });

                $(".pay").click(function(){
                	$("#shipmentForm").toggle("slow");
                	$("#cardForm").hide("slow");
                	$("#payForm").hide("slow");
                });
            });
		</script>
	</head>
	<body class="row">

<div class="container shadow col-lg-4 col-center mt-5 p-5" id="container">
		<h1 class="mb-5">Confirmar compra</h1>
		<p class="h5 m-0 mb-2">Confirma tu compra y recibirás un correo con los detalles de esta.</p>
        <?php
        if(isset($_SESSION['cart'])){
            $cart=$_SESSION['cart'];
            $total=0;
            for($i=0;$i<count($cart);$i+=2)
            {

                if( isset($_SERVER['HTTPS'] ) ) {
                    $productCart = file_get_contents("https://".$_SERVER['SERVER_NAME']."/ginasports/products.php?id=".$cart[$i]);
                }
                else{
                $productCart = file_get_contents("http://".$_SERVER['SERVER_NAME']."/ginasports/products.php?id=".$cart[$i]);
                }
                $productCart = json_decode($productCart, true);
                $productCart = $productCart['records'][0];
                $total+=($productCart['price']-($productCart['price'] * $productCart['discount'])/100);
        ?>
		<div class="container comprado">
            <div class="card cardcar">
                <img id="imagen0" class="card-img-top" src="images/products/<?php echo $productCart['id'];?>-0.jpg"></a>
                <div class="card-body">
                    <h5 class="card-title" id="nombre0"><?php echo $productCart['productname']; ?></h5>
                    <div class="row">
           	            <span id="precio0" class="col-3">$<?php echo $productCart['price']; ?></span>
                        <pre class="col-4"><h6>Cantidad: </h6></pre>
                        <span class="col-1" id="cant0"><?php echo $cart[$i+1]; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }

        ?>
        <h3>Total: $<?php echo $total; ?> </h3>
    </div>

		<div class="container shadow col-lg-6 col-center mt-5 p-5" id="container">
			<h1 class="mb-5">Elige tu forma de pago</h1>
			<div class="jumbotron p-1 m-2" id="card">
				<p class="h3">Tarjeta de crédito</p>
			</div>
			<div class="jumbotron p-1 m-2" id="cardForm">
				<form class="form-inline row p-2" action="">
					<div class="col-8 col-center row">
						<input type="text" name="numCard" class="form-control mb-2 col-12" id="numCard" placeholder="Número de tarjeta: xxxx xxxxxx xxxxx">
						<input type="text" name="expiration" class="form-control mb-2 col-12" id="expiration" placeholder="Caducidad: mm/aa">
						<input type="number" name="secCode" class="form-control mb-2 col-12" id="secCode" placeholder="Código: xxxx">
						<button type="button" class="btn btn-outline-dark col-6 pl-xs-0 pr-xs-0">Cancelar</button>
						<button type="button" class="pay btn btn-outline-dark col-6">Pagar</button>
					</div>
				</form>
			</div>
			<div class="jumbotron p-1 m-2" id="paypal">
				<p class="h3">PayPal</p>
			</div>
			<div class="jumbotron p-1 m-2" id="payForm">
				<form class="form-inline row p-2" action="">
					<div class="col-8 col-center row">
						<input type="email" name="email" class="form-control col-12 mb-2" id="email" placeholder="Correo">
						<input type="text" name="password" class="form-control col-12 mb-2" id="password" placeholder="Contraseña">
						<button type="button" class="btn btn-outline-dark col-6 pl-xs-0 pr-xs-0">Cancelar</button>
						<button type="button" class="pay btn btn-outline-dark col-6">Pagar</button>
					</div>
				</form>
			</div>
			<div class="jumbotron p-1 m-2" id="shipment">
				<p class="h3">Envío</p>
			</div>
			<div class="jumbotron p-1 m-2" id="shipmentForm">
				<form class="form-inline row p-2" method="POST" action="finish.php">
					<div class="col-8 col-center row">
						<input type="text" name="street" class="form-control col-12 mb-2" id="addres1" placeholder="Calle" required>
						<input type="text" name="hood" class="form-control col-9 mb-2" id="addres2" placeholder="Colonia o Fraccionamiento" required>
						<input type="number" name="number" class="form-control col-3 mb-2" id="addres3" placeholder="Número" required>
						<input type="number" name="cp" class="form-control col-5 mb-2" id="cp" placeholder="Código postal" required>
						<input type="text" name="phone" class="form-control col-7 mb-2" id="phone" placeholder="Teléfono" required>
						<input type="text" name="special" class="form-control col-12 mb-2" id="special" placeholder="Indicaciones especiales" required>
						<button type="submit" class="btn btn-outline-dark col-6 pl-xs-0 pr-xs-0">Cancelar</button>
						<button type="submit" class="btn btn-outline-dark col-6">Confirmar compra</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>