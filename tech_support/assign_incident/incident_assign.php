<?php include '../view/header.php'; ?>
<main>
    <?php if ($message == TRUE) : ?>
    <h1>Assign Incident</h1>
    <?php echo $message;?>
    <p><a href="">Select Another Incident</a></p> 
    <?php else: ?>
    <h1>Assign Incident</h1>
   
    
    <form action="index.php" method="post" id="regform">
        <input type="hidden" name="action" value="assign">
        
        <label>Customer:</label><label><?php echo $custfullname; ?></label> <br>
        <label>Product:</label><label><?php echo $incident['productCode']; ?></label><br>
        <label>Technician:</label><label><?php echo $techfullname; ?></label><br>
        
        <input type="hidden" name="incidentID" value="<?php echo $incidentID; ?>">
        <input type="hidden" name="techID" value="<?php echo $techID; ?>">
        
        <input type="submit" value="Assign Incident" />
        <br>
    </form>
    <?php endif; ?>
    

</main>
<?php include '../view/footer.php'; ?>


