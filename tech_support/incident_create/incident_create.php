<?php include '../view/header.php'; ?>
<main>
    <?php if ($message == TRUE) : ?>
    <h1>Incident Created Successful</h1>
    <?php echo $message;?>
    
    <?php else: ?>
    <h1>Create Incident</h1>
   
    <form action="index.php" method="post" id="regform">
        <input type="hidden" name="action" value="create_incident">
        
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
        
        <label>Title:</label>
        <input type='text' name='title'>
        <br>
        
        <label>Description:</label>
        <textarea rows="4" cols="50" name='description'></textarea>
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Create Incident" />
        <br>
    </form>
    <?php endif; ?>
    

</main>
<?php include '../view/footer.php'; ?>
