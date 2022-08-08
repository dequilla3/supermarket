<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Customers</title>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- CSS -->
    <link href="css\style.css" rel="stylesheet">
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container">
        <h3 class="form-title">Select Customer</h3>
        <!-- Table -->
        <table>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Operations</th>
                <?php
                include '..\includes\fetch-customers.php';
                ?>
            </tr>
        </table>
        <!-- End of table -->

        <a href="purch-transaction.php">
            <div class="btn-div">
                <button class="btn-cancel" id="">
                    Cancel
                </button>
            </div>
        </a>
    </div>
</body>

</html>