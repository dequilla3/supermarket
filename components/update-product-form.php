<?php
include '..\includes\update-product.php    ';
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
        <h3 class="form-title">Update Product</h3>
        <form method="POST">
            <label>Code</label>
            <input type="text" id="code" autocomplete="off" name="code" placeholder="Code.."
                onkeydown="removeDiv('alert_div')" value=<?php echo "\" $update_barcode \"" ?>>

            <label>Description</label>
            <input type="text" id="desc" name="desc" placeholder="Description.."
                value=<?php echo "\" $update_description \"" ?>>

            <label>Cost</label>
            <input type="number" maxlength="11" id="cost" name="cost" placeholder="Cost.."
                value=<?php echo $update_cost ?>>

            <input type="submit" value="Update" name="update-product">

            <button class="btn-cancel" name="cancel-product"> Cancel </button>
        </form>
    </div>
</body>

</html>