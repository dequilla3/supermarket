<?php
include '..\includes\update-supplier.php    ';
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
        <h3 class="form-title">Update Supplier</h3>
        <form method="POST">
            <label>Supplier Code</label>
            <input type="text" id="scode" autocomplete="off" name="scode" placeholder="Code.."
                onkeydown="removeDiv('alert_div')" value=<?php echo "\" $update_scode \"" ?>>

            <label>Company Name</label>
            <input type="text" id="cname" name="cname" placeholder="Company Name.."
                value=<?php echo "\" $update_cname \"" ?>>

            <label>Contact #</label>
            <input type="number" maxlength="11" id="contactno" name="contactno" placeholder="Conact No.."
                value=<?php echo $update_contactno ?>>

            <label>Address</label>
            <input type="text" id="address" name="address" placeholder="Address.."
                value=<?php echo "\" $update_address \"" ?>>

            <input type="submit" value="Update" name="update-supplier">

            <button class="btn-cancel" name="cancel-supplier"> Cancel </button>
        </form>
    </div>
</body>

</html>