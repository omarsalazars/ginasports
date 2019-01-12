<?php
session_start();

if(!isset($_SESSION['user']))
{
	header('Location: login.php');
	exit();
}

if(!isset($_GET['id']))
{
	header('Location: store.php');
	exit();
}

if( isset($_SERVER['HTTPS'] ) ) {
    $product = file_get_contents("https://".$_SERVER['SERVER_NAME']."/ginasports/products.php?id=".$_GET['id']);
}
else{
$product = file_get_contents("http://".$_SERVER['SERVER_NAME']."/ginasports/products.php?id=".$_GET['id']);
}
$product = json_decode($product, true);
$product = $product['records'][0];



if(!isset($_SESSION['cart']))
{
	$cart=array();
}
else
{
	$cart=$_SESSION['cart'];
}
$yes=true;
for($i=0;$i<count($cart);$i+=2)
{
	if($cart[$i]==$_GET['id'])
	{
		if($cart[$i+1]+$_GET['amount']>$product['stock'])
		{
			$_SESSION['error']="No hay tantos productos en existencia.";
			$yes=false;
		}
		else
		{
			$_SESSION['error']="Productos añadidos con éxito.";
			$cart[$i+1]+=$_GET['amount'];
			$_SESSION['cart']=$cart;
			$yes=false;
		}
	}
}
if($yes){
	array_push($cart, $_GET['id']);
	array_push($cart, $_GET['amount']);
	$_SESSION['cart']=$cart;
	echo $_GET['id']." ". $_GET['amount'];
	$_SESSION['error']="Productos añadidos con éxito.";
}
header('Location: product.php?id='.$_GET['id']);
?>