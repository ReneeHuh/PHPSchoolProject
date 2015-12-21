<?php
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

function get_incidents(){
    global $db;
    $query = 'SELECT c.firstName, c.lastName, p.name AS productName, i.* 
                FROM incidents i INNER JOIN customers c ON c.customerID = i.customerID 
                INNER JOIN products p ON p.productCode = i.productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}
function get_incidents_unassigned(){
    global $db;
    $query = 'SELECT c.firstName, c.lastName, p.name AS productName, i.* 
                FROM incidents i INNER JOIN customers c ON c.customerID = i.customerID 
                INNER JOIN products p ON p.productCode = i.productCode 
                WHERE techID IS NULL';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}
function get_incidents_assigned(){
    global $db;
    $query = 'SELECT c.firstName, c.lastName, p.name AS productName, i.* 
                FROM incidents i INNER JOIN customers c ON c.customerID = i.customerID 
                INNER JOIN products p ON p.productCode = i.productCode 
                WHERE techID IS NOT NULL';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}
function get_incidents_by_technician($techid){
    global $db;
    $query = 'SELECT * FROM `incidents` WHERE `techID` = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $techid);
    $statement->execute();
    $statement->closeCursor();
}
function get_incident($incidentID){
    global $db;
    $query = 'SELECT * FROM `incidents` WHERE incidentID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $incidentID);
    $statement->execute();
    $rows = $statement->fetch();
    $statement->closeCursor();
    return $rows;
}
function assign_incident($incident_id, $technician_id){
    global $db;
    $query = 'UPDATE `incidents` SET `techID`= :techid WHERE  incidentID = :incidentid';
    $statement = $db->prepare($query);
    $statement->bindValue(':incidentid', $incident_id);
    $statement->bindValue(':techid', $technician_id);
    $row_count = $statement->execute();
    $statement->closeCursor();
    return $row_count;
    
}
function add_incident($customer_id, $product_code, $title, $description){
    global $db;
    $query = 'INSERT INTO incidents
                 (customerID, dateOpened, `productCode`, `title`, `description`)
              VALUES
                 (:customerID, NOW(), :productCode, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customer_id);
    $statement->bindValue(':productCode', $product_code);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}
function get_customer_by_email($email){
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
?>

