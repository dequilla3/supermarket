<?php
include '../includes\customer-inc.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer</title>
    <link href="css\style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>

    <div class="container">
        <h3 class="form-title">Add Cutomer</h3>
        <form method="POST">
            <label>Cutomer Name</label>
            <input type="text" id="cname" autocomplete="off" name="cname" placeholder="Customer Name.."
                onkeydown="removeDiv('alert_div')">

            <label>Contact No</label>
            <input type="number" id="contactno" autocomplete="off" name="contactno" placeholder="Contact No..">

            <label>Address</label>
            <input type="text" id="address" autocomplete="off" name="address" placeholder="Address..">

            <input type="submit" value="Submit" name="submit-customer">

            <button class="btn-cancel" name="cancel-customer"> Cancel </button>

        </form>

    </div>
</body>

</html>