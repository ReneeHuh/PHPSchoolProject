<?php
require('../model/technician_oo.php');
require('../model/database_oo.php');
require('../model/technician_db_oo.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_technician';
    }
}
//main action slection
if ($action == 'list_technician') {

    $technicians = Technician_DB::getTechnicians();
    include('technician_list.php');
}else if ($action == 'delete_technician') {

    $techID = filter_input(INPUT_POST, 'techID', 
            FILTER_VALIDATE_INT);
    if ($techID == NULL || $techID == FALSE ) {
        $error = "Missing or incorrect technician ID.";
        include('../errors/error.php');
    } else { 
        Technician_DB::deleteTechnician($techID);
        header("Location: .?action=list_technician");
    }
}else if ($action == 'show_add_form'){
	include('technician_add.php');
}else if ($action == 'add_technician') {

    $firstName = filter_input(INPUT_POST, 'firstName');
	$lastName = filter_input(INPUT_POST, 'lastName');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$password = filter_input(INPUT_POST, 'password');

    if ($firstName == NULL || $firstName == FALSE ||
    	$lastName == NULL || $lastName == FALSE ||
    	$email == NULL || $email == FALSE ||
    	$phone == NULL || $phone == FALSE ||
    	$password == NULL || $password == FALSE ) {
        $error = "Missing or incorrect technician informatino.";
        include('../errors/error.php');
    } else { 
        $t = new Technician($firstName, $lastName , $email, $phone, $password );
        Technician_DB::addTechnician($t);
        header("Location: .?action=list_technician");
    }
}

?>