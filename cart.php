        <div class="carrito container shadow position-absolute">
            <h5>Productos en carrito</h5>
            <a href="#" id="close"><i class="fas fa-times"></i></a>


            <?php
            $total=0;
            if(isset($_SESSION['cart'])){
                $cart=$_SESSION['cart'];
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
                                <span id="precio0" class="col-3">$<?php echo ($productCart['price'] - ($productCart['price'] * $productCart['discount'])/100); ?></span>
                                <pre class="col-4"><h6>Cantidad: </h6></pre>
                                <span class="col-1" id="cant0"><?php echo $cart[$i+1]; ?></span>
                                <form method="GET" action="removeCart.php">
                                    <button class="col-1 btn btn-link" href="#" id="close" name="id" value="<?php echo $productCart['id']; ?>"><i class="fas fa-trash-alt" style="color:red;"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
            }
            else
            {
                echo "<h3>Carrito vacio</h3>";
            }

            ?>

            
            
            <div class="d-flex flex-row-reverse totalcompra">
                <span id="total">$<?php echo $total; ?></span><span>Total:<pre>      </pre></span>
            </div>
            <?php
            if(isset($_SESSION['cart']))
            if(count($_SESSION['cart'])!=0){
            ?>
            <a href="payment.php"><button class="btn btn-success">Proceder al pago</button></a>
            <?php } ?>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#car").click(function(){
                    $(".carrito").toggle();
                });
                $("#close").click(function(){
                    $(".carrito").toggle();
                });
            });
        </script>