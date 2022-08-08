<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Suppliers</title>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- CSS -->
    <link href="css\style.css" rel="stylesheet">
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container">
        <h3 class="form-title">View Supplier</h3>
        <a href="supplier-form.php">
            <div class="btn-div">
                <button class="btn-success" id="add_supplier">
                    Add Supplier
                </button>
            </div>
        </a>

        <!-- Table -->
        <table>
            <tr>
                <th>Supplier Code</th>
                <th>Company Name</th>
                <th>Contact No.</th>
                <th>Address</th>
                <th>Operations</th>
                <?php
                include '..\includes\fetch-suppliers.php';
                ?>
            </tr>
        </table>
        <!-- End of table -->
    </div>
</body>

</html>