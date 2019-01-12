<?php

require_once('db/db.php');

class ProductModel
{
	
	private $db;

	public function __construct(){
		$this->db=Connection::createConnection();
	}

	public function getAllProducts(){
		$query = "SELECT * FROM product ORDER BY productname";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
	}

	//offset is the first row returned,limit is the number of rows
	public function getProductsWithLimit($limit,$offset){
		$query = "SELECT * FROM product ORDER BY productname LIMIT ".$limit." OFFSET ".$offset;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	public function getProductById($id){
        $stmt = $this->db->prepare('SELECT * FROM product WHERE id=:id');
        $stmt->execute(array(
			':id' => $id
		));
        return $stmt;
	}

	public function getProductByName($name){
		$query = "SELECT * FROM product ORDER BY productname WHERE productname=".$name;

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
	}

	public function addProduct($productname,$description,$price,$discount,$stock,$type,$gender,$files){
		try{
			//Obtener el último id en la tabla de productos
			$statement = $this->db->prepare('SELECT id FROM product ORDER BY id DESC LIMIT 1');
			$statement->execute();
			$id = $statement->fetch();
			$id = $id['id'] + 1;

			//Subir cada imagen a la ruta 'images/products'
			$dest = 'images/products/';
			foreach ($files['image']['name'] as $key => $value) {
				$ext = pathinfo($files['image']['name'][$key], PATHINFO_EXTENSION);
				$file = $dest.$id."-".$key.".".$ext;
				move_uploaded_file($files['image']['tmp_name'][$key], $file);
			}

			//Sube los datos a la bd
			$statement = $this->db->prepare('INSERT INTO product (productname,description,price,discount,stock,image,type,gender) VALUES (:productname,:description,:price,:discount,:stock,:image,:type,:gender)');
			$statement->execute(array(
				':productname'=>$productname,
				':description'=> $description,
				':price' => $price,
				':discount' => $discount,
				':stock' => $stock,
				':image'=> count($files['image']['name']),
				':type' => $type,
				':gender' => $gender
			));
		}catch(Exception $e){
			echo $e;
		}
	}


	public function removeProductsById($productId,$totalToRemove){
		//RECIBE id y el total a quitar
		try{
			$statement = $this->db->prepare('SELECT stock FROM product WHERE id=:id');
			$statement->execute(array(':id'=>$productId));
			$currentStock = $statement->fetch();
			$currentStock = $currentStock['stock'];
			$newStock = $currentStock - $totalToRemove;


			//Sube los datos a la bd
			$statement = $this->db->prepare('UPDATE product SET stock=:stock WHERE id=:id');
			$statement->execute(array(
				':id'=>$productId,
				':stock'=> $newStock
			));
		}catch(Exception $e){
			echo $e;
		}
	}
}

?>