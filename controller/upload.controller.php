<?php 

include_once 'model/product.model.php';
include_once 'db/db.php';

$productModel=new ProductModel();



if(!$_SESSION['admin']) header('Location: store.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errores = '';
	$check = '';
	print_r($_FILES);
	if(empty($_FILES)) $errores .= 'Sube una imagen';
	else {
		foreach ($_FILES['image']['tmp_name'] as $image) {
			$check = @getimagesize($image);
			if(!$check) break;
		}
	}
	
	$productName = filter_var($_POST['productName'], FILTER_SANITIZE_STRING);
	$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
	$discount = filter_var($_POST['discount'], FILTER_SANITIZE_STRING);
	$stock = filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
	$type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
	$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);

	if(empty($productName) or empty($description)){
		$errores .= '<li>Llena correctamente todos los campos</li>';
	}

	if(!$check){
		$errores .= "<li>Archivo no válido</li>";
	}

		echo "<pre>";
		print_r($_FILES["image"]);
		echo "</pre>";


	if(!$errores){
		$productModel->addProduct($productName,$description,$price,$discount,$stock,$type,$gender,$_FILES);
		header('Location: store.php');
	}
}


require_once 'views/upload.view.php';
 ?>