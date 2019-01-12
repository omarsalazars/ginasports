<?php

require_once 'model/product.model.php';
require_once 'db/db.php';

$productModel=new ProductModel();
if(isset($_GET['id'])){
   $stmt = $productModel->getProductById($_GET['id']);
}
else if(!isset($_GET['limit'])){
    $stmt = $productModel->getAllProducts();
}
else{
    $stmt=$productModel->getProductsWithLimit($_GET['limit'],$_GET['offset']);
}
$num = $stmt->rowCount();

if($num>0){
	// products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "id" => $id,
            "productname" => $productname,
            "description" => html_entity_decode($description),
            "price" => $price,
            "discount" => $discount,
            "stock" => $stock,
            "image" => $image,
            "type" => $type,
            "gender" =>$gender
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    if(!isset($_GET['count']))
        echo json_encode($products_arr);
    else
        echo count($products_arr["records"]);
}
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}

?>