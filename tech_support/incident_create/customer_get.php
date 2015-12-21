<?php include '../view/header.php'; ?>
<main>
    <h1>Get Customers</h1>
    <p>
        You must enter the customer's email address to select the customer.
    </p>
    <form action="index.php" method="post" id="getcustomer">
        <input type="hidden" name="action" value="get_customer">

        <label>Email:</label>
        <input type="text" name="email" />
        <br>
     
        <label>&nbsp;</label>
        <input type="submit" value="Get Customer" />
        <br>
    </form>


</main>
<?php include '../view/footer.php'; ?>
