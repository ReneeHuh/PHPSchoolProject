<?php include '../view/header.php'; ?>
<main>
    
   
    <h1>View Incidents</h1>
    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['firstName'] ?> <?php echo $incident['lastName']; ?></td>
                <td><?php echo $incident['productName']; ?></td>
                <td><?php echo $incident['dateOpened']; ?></td>
                <td><?php echo $incident['title']; ?></td>
                <td><?php echo $incident['description']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="technician_select">
                    <input type="hidden" name="incidentID"
                           value="<?php echo $incident['incidentID']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
             
    </section>
</main>
<?php include '../view/footer.php'; ?>

