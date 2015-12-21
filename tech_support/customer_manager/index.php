<?php
require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_customer';
    }
}
//main action slection
if ($action == 'list_customer') {
    $customers = get_customers();
    include('customer_list.php');
}else if ($action == 'customer_search'){
    $lastName = filter_input(INPUT_POST, 'lastName');
    if ($lastName == NULL || $lastName == FALSE ) {
        $error = "Missing or incorrect customer ID.";
        include('../errors/error.php');
    } else { 
        $customers = get_searchedcustomers($lastName);
        include('customer_list.php');
    }
}
else if ($action == 'customer_update'){
    $customerID = filter_input(INPUT_POST, 'customerID', 
            FILTER_VALIDATE_INT);
    if ($customerID == NULL || $customerID == FALSE ) {
        $error = "Missing or incorrect customer ID.";
        include('../errors/error.php');
    } else { 
        $countrys = get_countrys();
        $customer = get_customer($customerID);
        include('customer_update.php');
    }
    
}else if ($action == 'delete_customer') {

    $techID = filter_input(INPUT_POST, 'techID', 
            FILTER_VALIDATE_INT);
    if ($techID == NULL || $techID == FALSE ) {
        $error = "Missing or incorrect customer ID.";
        include('../errors/error.php');
    } else { 
        delete_technician($techID);
        header("Location: .?action=list_customer");
    }
}else if ($action == 'show_add_form'){
	include('customer_add.php');
}else if ($action == 'customer_set_update') {
    $customerID = filter_input(INPUT_POST, 'customerID');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postalCode = filter_input(INPUT_POST, 'postalCode');
    $countryCode = filter_input(INPUT_POST, 'countryCode');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if ($customerID == NULL || $customerID == FALSE ||
    	$firstName == NULL || $firstName == FALSE ||
    	$address == NULL || $address == FALSE ||
    	$city == NULL || $city == FALSE ||
        $state == NULL || $state == FALSE ||
        $state == NULL || $state == FALSE ||
        $postalCode == NULL || $postalCode == FALSE ||
        $countryCode == NULL || $countryCode == FALSE ||
        $phone == NULL || $phone == FALSE ||
    	$email == NULL || $email == FALSE ||
        $password == NULL || $password == FALSE    ) {
        $error = "Missing or incorrect technician informatino.";
        include('../errors/error.php');
    } else { 
        update_customer($customerID,$firstName,$lastName,$address,$city,$state,$postalCode,$countryCode,$phone,$email,$password);
        header("Location: .?action=list_customer");
        
        }
}

?>