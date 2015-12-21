<?php include '../view/header.php'; ?>
<main>
    <h1>Update/View Customer</h1>
    <form action="index.php" method="post" id="customer_update_form">
        <input type="hidden" name="action" value="customer_set_update">
        <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
        <label>firstName:</label>
        <input type="text" name="firstName" value="<?php echo $customer['firstName']; ?>"/>
        <br>
        <label>lastName:</label>
        <input type="text" name="lastName" value="<?php echo $customer['lastName']; ?>"/>
        <br>
        <label>address:</label>
        <input type="text" name="address" value="<?php echo $customer['address']; ?>"/>
        <br>
        <label>city:</label>
        <input type="text" name="city" value="<?php echo $customer['city']; ?>"/>
        <br>
        <label>state:</label>
        <input type="text" name="state" value="<?php echo $customer['state']; ?>"/>
        <br>
        <label>postalCode:</label>
        <input type="text" name="postalCode" value="<?php echo $customer['postalCode']; ?>"/>
        <br>
        <label>countryCode:</label>
        <select name="countryCode" value="<?php echo $customer['countryCode']; ?>">
            <?php foreach ($countrys as $country) : ?>
            <option value="<?php echo $country['countryCode']; ?>"<?php if ($customer['countryCode'] == $country['countryCode'])echo 'selected="selected"'?>><?php echo $country['countryName']; ?></option>
            <?php endforeach; ?>
</select>
        <br>
        <label>phone:</label>
        <input type="text" name="phone" value="<?php echo $customer['phone']; ?>"/>
        <br>
    <label>email:</label>
        <input type="text" name="email" value="<?php echo $customer['email']; ?>"/>
        <br>
        <label>password:</label>
        <input type="text" name="password" value="<?php echo $customer['password']; ?>"/>
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="Update customer" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_customer">View customer List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>