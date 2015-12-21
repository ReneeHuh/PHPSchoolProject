<?php //require_once '../util/secure_conn.php'?>
<?php require_once '../util/valid_admin.php'?>

<?php include '../view/header.php'; ?>
<main>
    <nav>
        <h1>Admin Menu</h1>
        <ul>
            <li><a href="../product_manager">Manage Products</a></li>
            <li><a href="../technician_manager">Manage Technicians</a></li>
            <li><a href="../customer_manager">Manage Customers</a></li>
            <li><a href="../incident_create">Create Incident</a></li>
            <li><a href="../assign_incident">Assign Incident</a></li>
            <li><a href="../incident_display">Display Incidents</a></li>
        </ul>

    <h2>Login Status</h2>    
    <form action="index.php" method="post" id="regform">
        <input type="hidden" name="action" value="logout">
        <p>You are logged in as <?php echo $_SESSION['admin'] ?> </p>
        <input type="submit" value="Logout" />
    </form>
    
    </nav>
</section>
<?php include '../view/footer.php'; ?>