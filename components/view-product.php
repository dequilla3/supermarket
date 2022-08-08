<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- CSS -->
    <link href="css\style.css" rel="stylesheet">
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container">
        <h3 class="form-title">View Product</h3>
        <a href="product-form.php">
            <div class="btn-div">
                <button class="btn-success" id="add_product">
                    Add Product
                </button>
            </div>
        </a>

        <!-- Table -->
        <table>
            <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Cost.</th>
                <th>Qty Stock</th>
                <th>Operation</th>
                <?php
                include '..\includes\fetch-product.php';
                ?>
            </tr>
        </table>
        <!-- End of table -->
    </div>
</body>

</html>