<?php
session_start();
include 'config.php';

$id = $_GET['updateId'];
$result = mysqli_query($con, getProductById($id));
$row = mysqli_fetch_assoc($result);

#set fields to update from selected supplier
$update_barcode = $row['barcode'];
$update_description = $row['description'];
$update_cost = $row['cost'];

if (isset($_POST['cancel-product'])) {
    header('location:..\components\view-product.php');
} else if (isset($_POST['update-product'])) {
    #Do update here.
    $code = strtoupper($_POST['code']);
    $desc = $_POST['desc'];
    $cost = $_POST['cost'];

    //if suppliers code already exist cannot insert encoded supplier
    if (hasEmptyFields($code, $desc, $cost)) {
        echo '<div id="alert_div" class="p-signup-error">
                                <p>Please fill empty fields!</p>
                            </div>';
    } else if (isProductCodeExist($con, $code)) {
        echo '<div id="alert_div" class="p-signup-error">
                                <p>Product code already exist!</p>
                            </div>';
    } else {
        //update supplier here
        $result = mysqli_query($con, updateSupplier($id, $code, $desc, $cost));
        if ($result) {
            header('location:..\components\view-product.php');
        }
    }
}

//query to update supplier where supid = $id
function updateSupplier($id, $code, $desc, $cost)
{
    // $id, $barcode, $desc, $cost
    $sql =
        "UPDATE
        product prod
        SET prod.barcode = '$code',
        prod.description = '$desc',
        prod.cost ='$cost'
        WHERE prod.product_id = '$id' ";
    return $sql;
}

function isProductCodeExist($con, $code)
{
    $result = $con->query(
        "SELECT
        prod.*
        FROM
        product prod
        WHERE prod.barcode = '$code' "
    );
    $row_cnt = mysqli_num_rows($result);

    return ($row_cnt > 0);
}

function hasEmptyFields($code, $desc,  $cost)
{
    // $code, $desc, $cost
    return  empty($code) or
        empty($desc) or
        empty($cost);
}

function getProductById($id)
{
    return  "SELECT prod.* FROM product prod WHERE prod.product_id = $id";
}

session_destroy();