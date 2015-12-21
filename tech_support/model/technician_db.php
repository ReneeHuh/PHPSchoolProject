<?php
function get_technicians_with_count() {
    global $db;
    $query = 'SELECT *, (SELECT COUNT(*) 
                FROM incidents WHERE incidents.techID = technicians.techID) AS openIncidentCount 
                FROM technicians ORDER BY openIncidentCount';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

function get_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians';
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

function delete_technician($techID) {
    global $db;
    $query = 'DELETE FROM technicians
              WHERE techID = :techID';
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    $statement->execute();
    $statement->closeCursor();
}

function add_technician($firstName, $lastName, $email, $phone, $password) {
    global $db;
    $query = 'INSERT INTO technicians
                 (firstName, lastName, email, phone,password)
              VALUES
                 (:firstName, :lastName, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
function update_technician($techID, $firstName, $lastName, $email, $phone, $password) {
    global $db;
    $query = 'UPDATE technicians
                 firstName = :firstName, lastName = :lastName, email = :email, phone = :phone , password = :password)
              WHERE techID = :techID';
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
?>