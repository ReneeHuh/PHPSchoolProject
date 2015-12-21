<?php
function get_admin($username) {
    global $db;
    $query = 'SELECT username, password FROM administrators WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $rows = $statement->fetch();
    $statement->closeCursor();
    return $rows;
}
function is_valid_admin_login($username,$password){
    $token = get_admin($username);
    if ($token['password'] == $password){
        return TRUE;
    }
    else {
        return FALSE;
    }
}
?>

