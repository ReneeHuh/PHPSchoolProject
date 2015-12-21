<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/products_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'display_customer_get';
    }
}
//main action slection
if ($action == 'display_customer_get') 
{
    include('customer_get.php');
}
else if ($action == 'get_customer')
{
    $email = filter_input(INPUT_POST, 'email');
    
    if ($email == NULL || $email == FALSE) {
        $error = "Missing or incorrect product or user failed.";
        include('../errors/error.php');
    } else { 
    $customer = get_customer_by_email($email);
    $products = get_products();
    include('incident_create.php');
    }
}
else if ($action == 'create_incident')
{
    $customerID = filter_input(INPUT_POST, 'customerID');
    $productCode = filter_input(INPUT_POST, 'productCode');
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    
    if ($customerID == NULL || $customerID == FALSE ||
        $productCode == NULL || $productCode == FALSE ||
        $title == NULL || $title == FALSE ||
        $description == NULL || $description == FALSE ) {
        $error = "Missing or incorrect product or user failed.";
        include('../errors/error.php');
    } else { 
    add_incident($customerID, $productCode, $title, $description);
    $message = "This incident was added to our database.";
    include('incident_create.php');
    }
}   

?>


