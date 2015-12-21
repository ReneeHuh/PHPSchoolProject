<?php include '../view/header.php'; ?>
<main>
    <h1>Technician List</h1>

    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>productCode</th>
                <th>name</th>
                <th>version</th>
                <th>releaseDate</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['version']; ?></td>
                <td><?php echo $product['releaseDate']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="productCode"
                           value="<?php echo $product['productCode']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Product</a></p>
        <p class="last_paragraph"><a href="?action=list_technician">List Product</a></p>        
    </section>
</main>
<?php include '../view/footer.php'; ?>