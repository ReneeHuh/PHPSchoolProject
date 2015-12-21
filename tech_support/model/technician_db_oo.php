<?php
class Technician_DB{
    public static function getTechnicians()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM technicians';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $techs[] = [];
        foreach ($rows as $row)
        {
            $t = new Technician($row['firstName'],$row['lastName'],$row['email'],$row['phone'],$row['password']);
            $t->setID($row['techID']);
            $techs[] = $t;
        }
        return $techs;
    }
    public static function deleteTechnician($technician_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM technicians
                  WHERE techID = :techID';
        $statement = $db->prepare($query);
        $statement->bindValue(':techID', $technician_id);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function addTechnician($t)
    {
        $firstName = $t->getFirstName();
        $lastName = $t->getLastName();
        $email = $t->getEmail();
        $phone = $t->getPhone();
        $password = $t->getPassword();
        
        $db = Database::getDB();
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
    public static function update_technician($t)
    {
        $techID = $t->getID();
        $firstName = $t->getFirstName();
        $lastName = $t->getLastName();
        $email = $t->getEmail();
        $phone = $t->getPhone();
        $password = $t->getPassword();
        
        $db = Database::getDB();
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
}
?>
