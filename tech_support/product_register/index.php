<?php
session_start();
require('../model/database.php');
require('../model/customer_db.php');
require('../model/products_db.php');
require('../model/registration_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['customer']))
        {
            //loged in
            $action = 'display_register';
        }else{
        $action = 'display_login';
        }
    }
}
//main action slection
if ($action == 'display_login') {
    include('customer_login.php');
}else if ($action == 'display_register'){
    if (isset($_SESSION['customer'])){
        //already loged in
        $email = $_SESSION['customer'];
    }
    if ($email == NULL || $email == FALSE ) {
        $error = "Loging Failed";
        include('../errors/error.php');
    } else { 
        $customer = get_customer_by_email($email);
        if ($customer == null || $customer == false ){
            //failed login & logout
            unset($_SESSION['customer'] );
            $error = "Failed to find User";
        include('../errors/error.php');
        } else {
            //successfull login
            $products = get_products();
            include('product_register.php');
        }
    }
}else if ($action == 'register_product'){
    $customerID = $_SESSION['customer'];
    //$customerID = filter_input(INPUT_POST, 'customerID');
    $productCode = filter_input(INPUT_POST, 'productCode');
    
    if ($customerID == NULL || $customerID == FALSE ||
        $productCode == NULL || $productCode == FALSE) {
        $error = "Missing or incorrect product or user failed.";
        include('../errors/error.php');
    } else { 
        $products = get_products();
        $productName ="cows";
        foreach ($products as $product)
        {
            if ($productCode == $product['productCode'] )
            {
                $productName = $product['name'];
                break;
            }
        }
        add_registration($customerID,$productCode);
        $message = "Product {$productName} was successfull registered ";
        include('product_register_success.php');
    }
    
}else if ($action == 'login'){
         //loging in
        //get form data
        $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if ($username == NULL || $username == FALSE ||
            $password == NULL || $password == FALSE) {
            $message = "Login Failed: missing username or passwrod.";
            include('customer_login.php');
    } else { 
        //check password
        
        if (is_valid_customer_login($username,$password)){
            //login successfull
            $_SESSION['customer'] = $username;
            header('Location: .' );
        }else{
            $message = "Login Failed: invalid username or passwrod.";
            include('customer_login.php');
        } 
    }
}else if ($action == 'logout')
{
    $message = " ";
    unset($_SESSION['customer'] );
    include('customer_login.php');
}
    
?>

