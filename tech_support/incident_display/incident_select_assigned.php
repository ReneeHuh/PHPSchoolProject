<?php include '../view/header.php'; ?>
<main>
    <h1>Assigned Incidents</h1>
    <h2><a href="index.php?action=incident_select_unassigned">View Unassigned Incidents</a></h2>

    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Incident</th>
            </tr>

            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['firstName'] ?> <?php echo $incident['lastName']; ?></td>
                <td><?php echo $incident['productName']; ?></td>
                <td><b>ID:</b> <?php echo $incident['incidentID']; ?> <br>
                    <b>Opened:</b> <?php $ts = strtotime($incident['dateOpened']);
                              $date_opened = date('n/j/Y',$ts);
                              echo $date_opened; ?><br>
                <b>Closed:</b> <?php echo ( is_null ($incident['dateClosed']) ? "Open" : date('n/j/Y',strtotime($incident['dateClosed']))); ?><br>
                <b>Title:</b> <?php echo $incident['title']; ?> <br>
                <b>Description:</b> <?php echo $incident['description']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
             
    </section>
</main>
<?php include '../view/footer.php'; ?>

