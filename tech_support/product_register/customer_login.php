<?php //require_once '../util/valid_customer.php'?>


<?php include '../view/header.php'; ?>
<main>
    <h1>Customer Login</h1>
    <form action="index.php" method="post" id="loginform">
        <input type="hidden" name="action" value="login">

        <label>Email:</label>
        <input type="text" name="email" />
        <br>
        <label>Password:</label>
        <input type="password" name="password" value=""/> 
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="login" />
        <br>
    </form>


</main>
<?php include '../view/footer.php'; ?>
