<?php
function get_countrys() {
    global $db;
    $query = 'SELECT `countryCode`, `countryName` '
            . 'FROM `countries`  '
            . 'ORDER By countryName asc';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;  
}
function get_customers() {
    global $db;
    $query = 'SELECT `customerID`, `firstName`, `lastName`, `address`, '
            . '`city`, `state`, `postalCode`, `countryCode`, `phone`, '
            . '`email`, `password` FROM `customers`';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}
function get_customer($customerID) {
    global $db;
    $query = 'SELECT `customerID`, `firstName`, `lastName`, `address`, '
            . '`city`, `state`, `postalCode`, `countryCode`, `phone`, '
            . '`email`, `password` FROM `customers` '
            . 'WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $rows = $statement->fetch();
    $statement->closeCursor();
    return $rows;
}
function get_searchedcustomers($lastName) {
    global $db;
    $query = "SELECT `customerID`, `firstName`, `lastName`, `address`, `city`, `state`, "
            . "`postalCode`, `countryCode`, `phone`, `email`, `password` FROM `customers` "
            . "WHERE `lastName` LIKE '%{$lastName}%' ";
    $statement = $db->prepare($query);
    //$statement->bindValue(':lastNames', $lastName);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

/*function get_products_by_customer($customerID)
{
    global $db;
    $query = 'SELECT *  FROM customers
              WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
    
}*/
function get_customer_by_email($email)
{
    global $db;
    $query = 'SELECT *  FROM customers
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $rows = $statement->fetch();
    $statement->closeCursor();
    return $rows;
}
function delete_customer($customerID) {
    global $db;
    $query = 'DELETE FROM customers
              WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $statement->closeCursor();
}
function update_customer($customerID ,$firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password) {
    global $db;
    $query = "UPDATE customers
                 SET 
                 firstName='{$firstName}', 
                 lastName='{$lastName}', 
                 address='{$address}', 
                 city='{$city}', 
                 state='{$state}', 
                 postalCode='{$postalCode}', 
                 countryCode='{$countryCode}', 
                 phone='{$phone}', 
                 email='{$email}', 
                 password='{$password}' 
              WHERE customerID = '{$customerID}'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

function add_customer($firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password) {
    global $db;
    $query = 'INSERT INTO customers
                 (`firstName`, `lastName`, `address`, `city`, `state`, `postalCode`, `countryCode`, `phone`, `email`, `password` )
              VALUES
                 (:firstName, :lastName, :address, :city, :state, :postalCode, :countryCode, :phone, :email, :password )';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':address', address);
    $statement->bindValue(':city', city);
    $statement->bindValue(':state', state);
    $statement->bindValue(':postalCode', postalCode);
    $statement->bindValue(':countryCode', countryCode);
    $statement->bindValue(':phone', phone);
    $statement->bindValue(':email', email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function is_valid_customer_login($username,$password){
    $token = get_customer_by_email($username);
    if ($token['password'] == $password){
        return TRUE;
    }
    else {
        return FALSE;
    }
}
?>