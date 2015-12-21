<?php include '../view/header.php'; ?>
<main>
    <h1>Add Technician</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <label>productCode:</label>
        <input type="text" name="productCode" />
        <br>
        
        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Version:</label>
        <input type="text" name="version" />
        <br>

        <label>releaseDate:</label>
        <input type="datetime" name="releaseDate" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_product">View Products List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>