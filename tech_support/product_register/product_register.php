<?php require_once '../util/valid_customer.php'?>
<?php require_once '../util/secure_conn.php'?>

<?php include '../view/header.php'; ?>
<main>
    <h1>Product Register</h1>
   
    <form action="index.php" method="post" id="regform">
        <input type="hidden" name="action" value="register_product">
        
        <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
        
        <label>Customer:</label>
        <label><?php echo "{$customer['firstName']} {$customer['lastName']} "; ?></label>
        <br>
        
        <label>Product:</label>
        <select name="productCode" value="">
            <?php foreach ($products as $product) : ?>
            <option value="<?php echo $product['productCode']; ?>"><?php echo $product['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
     
        <label>&nbsp;</label>
        <input type="submit" value="Register Product" />
        <br>
    </form>
    <form action="index.php" method="post" id="regform">
        <input type="hidden" name="action" value="logout">
        <p>You are logged in as <?php echo $customer['email'] ?> ></p>
        <input type="submit" value="Logout" />
    </form>

</main>
<?php include '../view/footer.php'; ?>
