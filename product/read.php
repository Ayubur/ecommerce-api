<?php

//required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//database connection will be here

include_once '../config/database.php';
include_once '../objects/product.php';

//instantiate database and product

$database= new Database();
$db = $database->getConnection();

$product = new Product($db);

//read products will be here

//query products

$stmt = $product->read();
$num =mysqli_num_rows($stmt);

if($num>0){

	//Products array
	$products_arr = array();
	$products_arr["records"]= array();

	while($row = mysqli_fetch_array($stmt)){

	    extract($row);
 
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
 
        array_push($products_arr["records"], $product_item);

        // set response code - 200 Ok

        http_response_code(200);

        echo json_encode($products_arr);
	}

}else{

	http_response_code(404);

	echo json_encode(
		array("message" => "No products found")
	);

}

// no product found will be here


