<?php include '../view/header.php'; ?>
<main>
    
   
    <h1>Unassigned Incidents</h1>
    <h2><a href="index.php?action=incident_select_assigned">View Assigned Incidents</a></h2>
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
                <td>ID: <?php echo $incident['incidentID']; ?> <br>
                Opened: <?php $ts = strtotime($incident['dateOpened']);
                              $date_opened = date('n/j/Y',$ts);
                              echo $date_opened; ?><br>
                Title: <?php echo $incident['title']; ?> <br>
                Description: <?php echo $incident['description']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
             
    </section>
</main>
<?php include '../view/footer.php'; ?>

