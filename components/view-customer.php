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
        <h3 class="form-title">Cutomer</h3>
        <a href="customer-form.php">
            <div class="btn-div">
                <button class="btn-op-delete" id="add_customer">
                    Add Customer
                </button>
            </div>
        </a>

        <!-- Table -->
        <table>
            <tr>
                <th>Cutomer Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Age</th>
                <th>Operation</th>
                <?php
                include '..\includes\fetch-customers.php';
                ?>
            </tr>
        </table>
        <!-- End of table -->
    </div>
</body>

</html>