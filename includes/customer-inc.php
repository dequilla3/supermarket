<?php
include 'config.php';

if (isset($_POST['cancel-customer'])) {
    header('location:..\components\view-customer.php');
} else if (isset($_POST['submit-customer'])) {
    $cname = $_POST['cname'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];

    //if empty fields
    if (hasEmptyFields($cname, $contactno, $address)) {
        echo '<div id="alert_div" class="p-signup-error">
								<p>Please fill empty fields!</p>
							</div>';
    } else {
        //insert supplier here
        $result = mysqli_query($con, insertCustomer($cname, $contactno, $address));
        if ($result) {
            header('location:..\components\view-customer.php');
        }
    }
}

//query to insert supplier
function insertCustomer($cname, $contactno, $address)
{
    $sql =
        "INSERT INTO customer (
        customer_name,
        address,
        contact_no,
        date_created
      )
      VALUES
        (
          '$cname',
          '$address',
          '$contactno',
          NOW()
        )";
    return $sql;
}

function hasEmptyFields($cname,  $contactno, $address)
{
    return  empty($cname) or
        empty($contactno) or
        empty($address);
}