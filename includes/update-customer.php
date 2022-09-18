<?php
session_start();
include 'config.php';

$id = $_GET['updateId'];
$result = mysqli_query($con, getCutomerById($id));
$row = mysqli_fetch_assoc($result);

#set fields
$update_cname = $row['customer_name'];
$update_address = $row['address'];
$update_contactno = $row['contact_no'];
$update_age = $row['age'];

if (isset($_POST['cancel-customer'])) {
    header("location:..\components\view-customer.php");
} else if (isset($_POST['update-customer'])) {
    #Do update here.
    $cname = $_POST['cname'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $age = $_POST['age'];

    if (hasEmptyFields($cname, $contactno, $address)) {
        echo '<div id="alert_div" class="p-signup-error">
                                <p>Please fill empty fields!</p>
                            </div>';
    } else {
        //update customer here
        $result = mysqli_query($con, updateCustomer($id, $cname, $contactno, $address, $age));
        if ($result) {
            header('location:..\components\view-customer.php');
        }
    }
}

//query to update customer where supid = $id
function updateCustomer($id, $cname, $contactno, $address, $age)
{
    $sql =
        "UPDATE
        customer cust
        SET  cust.customer_name = '$cname',
        cust.address ='$address',
        cust.contact_no ='$contactno',
        cust.age = '$age'
        WHERE cust.customer_id = '$id'";
    return $sql;
}

function hasEmptyFields($cname,  $contactno, $address)
{
    return empty($cname) or
        empty($contactno) or
        empty($address);
}

function getCutomerById($id)
{
    return  "SELECT cust.* FROM customer cust WHERE cust.customer_id = $id";
}

session_destroy();