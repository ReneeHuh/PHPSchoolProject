<?php include '../view/header.php'; ?>
<main>
    <h1>Customers List</h1>

    <h2>Customer Search</h2>
    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="customer_search">
                    Last Name:
                    <input type="text" name="lastName"
                           value="">
                    <input type="submit" value="Search"></form>     
    <form action="." method="post"> 
        <input type="hidden" name="action" value="list_customer">
        <input type="submit" value="Clear Search">
    </form>
    <h2>Results </h2> 
        
    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr> 
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName']; ?> <?php echo $customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="customer_update">
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="View/Update">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Customer</a></p>
        <p class="last_paragraph"><a href="?action=list_customer">List Customers</a></p>        
    </section>
</main>
<?php include '../view/footer.php'; ?>