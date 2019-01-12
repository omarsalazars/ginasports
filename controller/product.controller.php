<?php 
$product = '';
if (isset($_GET['id'])) {
	if( isset($_SERVER['HTTPS'] ) ) {
		$product = file_get_contents("https://".$_SERVER['SERVER_NAME']."/ginasports/products.php?id=".$_GET['id']);
	}
	else{
		$product = file_get_contents("http://".$_SERVER['SERVER_NAME']."/ginasports/products.php?id=".$_GET['id']);
	}
	
	
	$product = json_decode($product, true);
	$product = $product['records'][0];
}
require_once 'views/product.view.php';
?>