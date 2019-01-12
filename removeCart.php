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

$cart=$_SESSION['cart'];
for($i=0;$i<count($cart);$i+=2)
{
	if($cart[$i]==$_GET['id'])
	{
		unset($cart[$i]);
		unset($cart[$i+1]);
		$_SESSION['cart']=$cart;
		if(count($cart)==0)
			unset($_SESSION['cart']);
	}
}

header('Location: product.php?id='.$_GET['id']);

?>