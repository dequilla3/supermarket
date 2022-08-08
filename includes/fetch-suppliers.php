<?php
include 'config.php';
$result = mysqli_query($con, getAllSuppliers());

if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $supplier_id = $row['supplier_id'];
        $supplier_code = $row['supplier_code'];
        $company_name = $row['company_name'];
        $contact_no = $row['contact_no'];
        $address = $row['address'];
        echo setRowsToTable($supplier_id, $supplier_code, $company_name, $contact_no, $address);
    }
}

function getAllSuppliers()
{
    $sql = "SELECT sup.* FROM supplier sup";
    return $sql;
}

function setRowsToTable($supplier_id, $supplier_code, $company_name, $contact_no, $address)
{
    $path = isset($_GET['isSelect']) ? 'gr-transaction.php' : 'update-supplier-form.php';
    $value = isset($_GET['isSelect']) ? 'Select' : 'Update';
    return
        "<tr id=$supplier_id>
            <td>$supplier_code</td>
            <td>$company_name</td>
            <td>$contact_no</td>
            <td>$address</td>
            <td>
            <a href='$path?updateId=$supplier_id&cname=$company_name'>
                <button class='btn-op-update'>
                     $value
                </button>
            </a>
            </td>   
        </tr>";
}