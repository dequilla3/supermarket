<?php
include 'config.php';



if (
    !isset($_GET['updateId'])
    or !isset($_GET['product_id'])
    or !isset($_GET['qty'])
) {
    header("location:..\components\purch-transaction.php");
} else {
    $custId = $_GET['updateId'];
    $qty = $_GET['qty'];
    $product_id = $_GET['product_id'];

    //insert purchase here
    $resultPurch = mysqli_query($con, insertPurch($custId, $qty, $product_id));
    //insert stockard here
    $resultStockard = mysqli_query($con, insertStockard($qty, $product_id));

    if ($resultPurch && $resultStockard) {
        header("location:..\components\purch-transaction.php");
    } else {
        die(mysqli_error($con));
    }
}


//query to insert purch
function insertPurch($custId, $qty, $product_id)
{
    $sql =
        "INSERT INTO purchase (
        product_id,
        cost,
        qty_purch,
        total_amt,
        customer_id,
        date_purch
        )
        VALUES
        (
        '$product_id',

        -- cost
        (SELECT
        prod.cost
        FROM
        product prod
        WHERE prod.product_id = '$product_id'),

        '$qty',

        -- qty_purchase + product_cost
        ('$qty'*(SELECT
        prod.cost
        FROM
        product prod
        WHERE prod.product_id = '$product_id')),

        $custId,

        NOW()
        )";
    return $sql;
}

function insertStockard($qty, $product_id)
{
    $sql =
        "INSERT INTO stockard (
        product_id,
        qty,
        cumulative_qty,
        transaction,
        purchase_id
        )
        
        VALUES
        (
        '$product_id',

        -- qty_purch+-1 multiply to negative 1 to negate the qty
        '$qty'*-1,

        -- qty.negate() + current stockard qty
        ('$qty'*-1) + 
        IFNULL(( #ifnull select query then 0.00
            SELECT
            IFNULL(st.cumulative_qty, 0.00)
            FROM
            stockard st
            WHERE st.stockard_id = 
            (SELECT MAX(mstck.stockard_id) 
            FROM stockard mstck WHERE mstck.product_id = '$product_id' ))
        , 0.00),

        -- Cost of Goods Sold
        'COGS',

        -- select latest purchase_id to select current purchase transaction
        (SELECT
        MAX(purchase_id)
        FROM
        purchase))";
    return $sql;
}