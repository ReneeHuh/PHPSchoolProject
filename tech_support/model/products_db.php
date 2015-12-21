<?php
function get_products() {
    global $db;
    $query = 'SELECT `productCode`, `name`, `version`, `releaseDate` FROM `products`';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}
function get_products_by_customer($email){
    global $db;
    $query = 'SELECT
            products.productCode, products.name FROM products 
            INNER JOIN registrations ON products.productCode = registrations.productCode
            INNER JOIN customers ON registrations.customerID = customers.customerID W
            HERE customers.email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

function delete_product($productCode) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productCode = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($productCode,$name,$version,$releaseDate) {
    global $db;
    $query = 'INSERT INTO products
                 (productCode, `name`, `version`, `releaseDate`)
              VALUES
                 (:productCode, :name, :version, :releaseDate)';
    $statement = $db->prepare($query);
     $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $statement->execute();
    $statement->closeCursor();
}
function update_product($productCode,$name,$version,$releaseDate) {
    global $db;
    $query = 'UPDATE products
              `name` =:name, `version` = :version, `releaseDate` =:releaseDate
              WHERE productCode = :productCode ';
    $statement = $db->prepare($query);
     $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $statement->execute();
    $statement->closeCursor();
}
?>