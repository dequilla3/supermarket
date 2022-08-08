<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Good Receive</title>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- CSS -->
    <link href="css\style.css" rel="stylesheet">
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container">
        <h3 class="form-title">Goods Receive</h3>
        <a href="select-supplier.php?&isSelect=true">
            <div class="btn-div">
                <button class="btn-success" id="add_supplier">
                    Select Supplier
                </button>
            </div>
        </a>
        <h2 class="form-title"><?php echo isset($_GET['cname']) ? $_GET['cname'] : "" ?></h2>

        <input type='number' id='qty' class='qty-receive-inp' autocomplete='off' name='qty' placeholder='Qty Receive..'>

        <!-- Table -->
        <table id="product_tb">
            <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Cost.</th>
                <th>Qty Stock.</th>
                <th>Operation.</th>
                <?php
                include '..\includes\fetch-product-transaction.php';
                ?>
            </tr>
        </table>

    </div>
</body>

</html>