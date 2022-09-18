<?php
include 'config.php';

if (
    !isset($_GET['updateId'])
    or !isset($_GET['qty'])
    or !isset($_GET['product_id'])
) {
    header("location:..\components\gr-transaction.php");
} else {
    $supId = $_GET['updateId'];
    $qty = $_GET['qty'];
    $product_id = $_GET['product_id'];

    //insert goods_received here
    $resultGr = mysqli_query($con, insertGr($supId, $qty, $product_id));
    //insert stockard here
    $resultStockard = mysqli_query($con, insertStockard($qty, $product_id));

    if ($resultGr && $resultStockard) {
        header("location:..\components\gr-transaction.php");
    } else {
        die(mysqli_error($con));
    }
}



//query to insert gr
function insertGr($supId, $qty, $product_id)
{
    $sql =
        "INSERT INTO goods_received (
        supplier_id,
        product_id,
        qty_received,
        date_received
        )
        VALUES
        (
        '$supId',
        '$product_id',
        '$qty',
        NOW()
        )";
    return $sql;
}

//quert to insert stckard
function insertStockard($qty, $product_id)
{
    $sql =
        "INSERT INTO stockard (
        product_id,
        qty,
        cumulative_qty,
        transaction,
        goods_received_id
        )
        
        VALUES
        (
        '$product_id',
        
        '$qty',

        -- qty_received + current qty stock or / qty balance
        '$qty' + 
        IFNULL((
            SELECT
            IFNULL(st.cumulative_qty, 0.00)
            FROM
            stockard st
            WHERE st.stockard_id = 
            (SELECT MAX(mstck.stockard_id) #select latest stockard per product to get previous qty
            FROM stockard mstck WHERE mstck.product_id = '$product_id' ))
        , 0.00), #as cumulative qty

        -- additional stock
        'GAIN',

        -- select latest gr id to get current transaction
        (SELECT
        MAX(goods_received_id)
        FROM
        goods_received)
        )";
    return $sql;
}