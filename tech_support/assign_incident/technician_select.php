<?php include '../view/header.php'; ?>
<main>
    <h1>Select Technician</h1>

    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Name</th>
                <th>Open Incidents</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <?php $fullname =  $technician['firstName'] . " " . $technician['lastName'] ?>
                <td><?php echo $fullname; ?></td>
                <td><?php echo $technician['openIncidentCount']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="incident_assign">
                    <input type="hidden" name="incidentID"
                           value="<?php echo $incidentID; ?>">
                    <input type="hidden" name="techID"
                           value="<?php echo $technician["techID"]; ?>">
                    <input type="hidden" name="techfullname"
                           value="<?php echo $fullname; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>       
    </section>
</main>
<?php include '../view/footer.php'; ?>

