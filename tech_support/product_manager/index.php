<?php
require('../model/database.php');
require('../model/products_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_product';
    }
}
//main action slection
if ($action == 'list_product') {

	$products = get_products();
    include('product_list.php');
}else if ($action == 'delete_product') {

    $productCode = filter_input(INPUT_POST, 'productCode');
    if ($productCode == NULL || $productCode == FALSE ) {
        $error = "Missing or incorrect technician ID.";
        include('../errors/error.php');
    } else { 
        delete_products($productCode);
        header("Location: .?action=list_product");
    }
}else if ($action == 'show_add_form'){
	include('product_add.php');
}else if ($action == 'add_product') {
$productCode = filter_input(INPUT_POST, 'productCode');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version');
    $releaseDate = filter_input(INPUT_POST, 'releaseDate');

    if ($productCode == null || $productCode == FALSE ||
        $name == NULL || $name == FALSE ||
    	$version == NULL || $version == FALSE ||
    	$releaseDate == NULL || $releaseDate == FALSE  ) {
        $error = "Missing or incorrect technician informatino.";
        include('../errors/error.php');
    } else { 
        add_product($productCode, $name, $version , $releaseDate);
        header("Location: .?action=list_product");
    }
}

?>