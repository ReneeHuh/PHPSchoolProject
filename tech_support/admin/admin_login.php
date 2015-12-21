<?php require_once '../util/secure_conn.php'?>
<?php //require_once '../util/valid_admin.php'?>

<?php include '../view/header.php'; ?>
<main>
    <h1>Admin Login</h1>

    <?php echo $message;?><br>

 <form action="index.php" method="post" id="loginform">
        <input type="hidden" name="action" value="login">

        <label>Username:</label>
        <input type="text" name="username" value=""/><br>
        <label>Password:</label>
        <input type="password" name="password" value=""/>
        <label>&nbsp;</label>
        <input type="submit" value="login" />
</section>
<?php include '../view/footer.php'; ?>