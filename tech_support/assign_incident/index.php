<?php
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
//require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'incident_select';
    }
}
//main action slection
if ($action == 'incident_select') {
    $incidents = get_incidents_unassigned();
    include('incident_select.php');
}else if ($action == 'technician_select'){
    $incidentID = filter_input(INPUT_POST, 'incidentID');
    
    if ($incidentID == NULL || $incidentID == FALSE ) {
        $error = "Missing or incorrect huh ID.";
        include('../errors/error.php');
    } else { 
        $technicians = get_technicians_with_count();
        include('technician_select.php');
    }
}else if ($action == 'incident_assign'){
    $incidentID = filter_input(INPUT_POST, 'incidentID');
    $techID = filter_input(INPUT_POST, 'techID');
    $techfullname = filter_input(INPUT_POST, 'techfullname');
    if ($incidentID == NULL || $incidentID == FALSE ||
        $techID == NULL || $techID == FALSE ||
        $techfullname == NULL || $techfullname == FALSE) {
        $error = "Missing or incorrect huh ID.";
        include('../errors/error.php');
    } else { 
        $incident = get_incident($incidentID);
        $custid = $incident['customerID'];
        $cust = get_customer($custid);
        $custfullname = $cust['firstName']. " " . $cust['lastName'];
        include('incident_assign.php');
    }
}else if ($action == 'assign'){
    $incidentID = filter_input(INPUT_POST, 'incidentID');
    $techID = filter_input(INPUT_POST, 'techID');
    if ($incidentID == NULL || $incidentID == FALSE ||
        $techID == NULL || $techID == FALSE) {
        $error = "Missing or incorrect huh ID.";
        include('../errors/error.php');
    } else { 
        //assign_incident($incidentID,$techID);
        $message = "This incident was assigned to a technician";
        include('incident_assign.php');
    }
}
?>

