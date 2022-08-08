<?php
include '../includes\product-inc.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link href="css\style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>

    <div class="container">
        <h3 class="form-title">Add Product</h3>
        <form method="POST">
            <label>Code</label>
            <input type="text" id="code" autocomplete="off" name="code" placeholder="Code.."
                onkeydown="removeDiv('alert_div')">

            <label>Description</label>
            <input type="text" id="desc" autocomplete="off" name="desc" placeholder="Decription..">

            <label>Cost</label>
            <input type="number" id="cost" autocomplete="off" name="cost" placeholder="Cost..">

            <input type="submit" value="Submit" name="submit-product">

            <button class="btn-cancel" name="cancel-product"> Cancel </button>
        </form>
    </div>
</body>

</html>