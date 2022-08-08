<?php
session_start();
include 'config.php';

$id = $_GET['updateId'];
$result = mysqli_query($con, getSupplierById($id));
$row = mysqli_fetch_assoc($result);

#set fields to update from selected supplier
$update_scode = $row['supplier_code'];
$update_cname = $row['company_name'];
$update_contactno = $row['contact_no'];
$update_address = $row['address'];

if (isset($_POST['cancel-supplier'])) {
    header('location:..\components\view-supplier.php');
} else if (isset($_POST['update-supplier'])) {
    #Do update here.
    $scode = strtoupper($_POST['scode']);
    $cname = $_POST['cname'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];

    //if suppliers code already exist cannot insert encoded supplier
    if (hasEmptyFields($scode, $cname, $contactno, $address)) {
        echo '<div id="alert_div" class="p-signup-error">
                                <p>Please fill empty fields!</p>
                            </div>';
    } else if (isSuppliersCodeExist($con, $scode)) {
        echo '<div id="alert_div" class="p-signup-error">
                                <p>Supplier code already exist!</p>
                            </div>';
    } else {
        //update supplier here
        $result = mysqli_query($con, updateSupplier($id, $scode, $cname, $contactno, $address));
        if ($result) {
            header('location:..\components\view-supplier.php');
        }
    }
}

//query to update supplier where supid = $id
function updateSupplier($id, $scode, $cname, $contactno, $address)
{
    $sql =
        "UPDATE
        supplier sup
            SET sup.supplier_code = '$scode',
            sup.company_name = '$cname',
            sup.contact_no ='$contactno',
            sup.address ='$address'
        WHERE sup.supplier_id = '$id'";
    return $sql;
}

function isSuppliersCodeExist($con, $scode)
{
    $result = $con->query(
        "SELECT
        sup.supplier_code
        FROM
        supplier sup
        WHERE sup.supplier_code = '$scode'"
    );
    $row_cnt = mysqli_num_rows($result);

    return ($row_cnt > 0);
}

function hasEmptyFields($scode, $cname,  $contactno, $address)
{
    return empty($scode) or
        empty($cname) or
        empty($contactno) or
        empty($address);
}

function getSupplierById($id)
{
    return  "SELECT sup.* FROM supplier sup WHERE sup.supplier_id = $id";
}

session_destroy();