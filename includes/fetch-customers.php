<?php
include 'config.php';
$result = mysqli_query($con, getAllCutomers());

if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $customer_id = $row['customer_id'];
        $customer_name = $row['customer_name'];
        $address = $row['address'];
        $contact_no = $row['contact_no'];
        echo setRowsToTable($customer_id, $customer_name, $address, $contact_no);
    }
}

function getAllCutomers()
{
    $sql = "SELECT cust.* FROM customer cust";
    return $sql;
}

function setRowsToTable($customer_id, $customer_name, $address, $contact_no)
{
    $path = isset($_GET['isSelect']) ? 'purch-transaction.php' : 'update-customer-form.php';
    $value = isset($_GET['isSelect']) ? 'Select' : 'Update';
    return
        "<tr id=$customer_id>
            <td>$customer_name</td>
            <td>$address</td>
            <td>$contact_no</td>
            <td>
            <a href='$path?updateId=$customer_id&cname=$customer_name''>
                <button class='btn-op-update'>
                    $value
                </button>
            </a>
            </td>
        </tr>";
}