<?php
include '..\includes\update-customer.php    ';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cutomer</title>
    <link href="css\style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script type="text/javascript" src="..\javascript\app.js"></script>
</head>

<body>
    <?php require "header.php" ?>
    <div class="container">
        <h3 class="form-title">Update Supplier</h3>
        <form method="POST">
            <label>Cutomer Name</label>
            <input type="text" id="cname" name="cname" placeholder="Company Name.." onkeydown="removeDiv('alert_div')"
                value=<?php echo "\" $update_cname \"" ?>>

            <label>Address</label>
            <input type="text" id="address" name="address" placeholder="Address.."
                value=<?php echo "\" $update_address \"" ?>>

            <label>Contact #</label>
            <input type="number" maxlength="11" id="contactno" name="contactno" placeholder="Conact No.."
                value=<?php echo $update_contactno ?>>

            <input type="submit" value="Update" name="update-customer">

            <button class="btn-cancel" name="cancel-customer"> Cancel </button>
        </form>
    </div>
</body>

</html>