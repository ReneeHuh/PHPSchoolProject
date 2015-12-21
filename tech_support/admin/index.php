<?php
session_start();
require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');
require('../model/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['admin']))
        {
            //loged in
            $action = 'admin_menu';
        }else{
        $action = 'loginform';
        }
    }
}

//main action slection
if ($action == 'loginform') {
    $message = " ";
    include('admin_login.php');
}else if ($action == 'admin_menu') {
    include('admin_menu.php');
}else if ($action == 'login'){
        //loging in
        //get form data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if ($username == NULL || $username == FALSE ||
            $password == NULL || $password == FALSE) {
            $message = "Login Failed: missing username or passwrod.";
            include('admin_login.php');
    } else { 
        //check password
        
        if (is_valid_admin_login($username,$password)){
            //login successfull
            $_SESSION['admin'] = $username;
            header('Location: .' );
        }else{
            $message = "Login Failed: invalid username or passwrod.";
            include('admin_login.php');
        } 
    }
}else if ($action == 'logout'){
    unset($_SESSION['admin'] );
    include('admin_login.php');
}

        