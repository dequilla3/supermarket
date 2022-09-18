<?php
include '..\includes\supplier-inc.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suppliers</title>
    <link href="css\style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>

    <div class="container">
        <h3 class="form-title">Add Supplier</h3>
        <form method="POST">
            <label>Supplier Code</label>
            <input type="text" id="scode" autocomplete="off" name="scode" placeholder="Code.."
                onkeydown="removeDiv('alert_div')">

            <label>Company Name</label>
            <input type="text" id="cname" autocomplete="off" name="cname" placeholder="Company Name..">

            <label>Contact #</label>
            <input type="number" maxlength="11" id="contactno" autocomplete="off" name="contactno"
                placeholder="Conact No..">

            <label>Address</label>
            <input type="text" id="address" autocomplete="off" name="address" placeholder="Address..">

            <input type="submit" value="Submit" name="submit-supplier">

            <button class="btn-cancel" name="cancel-supplier"> Cancel </button>

        </form>

    </div>
</body>

</html>