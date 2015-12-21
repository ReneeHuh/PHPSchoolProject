<?php include '../view/header.php'; ?>
<main>
    <h1>Technician List</h1>

    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($technicians as $technician) : ?>
            <?php if (is_object($technician)) : ?>
            <tr>
                <td><?php echo $technician->getFirstName(); ?></td>
                <td><?php echo $technician->getLastName(); ?></td>
                <td><?php echo $technician->getEmail(); ?></td>
                <td><?php echo $technician->getPhone(); ?></td>
                <td><?php echo $technician->getPassword(); ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_technician">
                    <input type="hidden" name="techID"
                           value="<?php echo $technician->getID(); ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Technician</a></p>
        <p class="last_paragraph"><a href="?action=list_technician">List Technician</a></p>        
    </section>
</main>
<?php include '../view/footer.php'; ?>