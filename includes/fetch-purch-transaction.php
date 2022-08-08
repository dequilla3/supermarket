<?php
include 'config.php';
$result = mysqli_query($con, getAllProduct());


if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $barcode = $row['barcode'];
        $description = $row['description'];
        $cost = $row['cost'];
        $cumulative_qty = $row['cumulative_qty'];
        echo setRowsToTable($product_id, $barcode, $description, $cost, $cumulative_qty);
    }
}

function getAllProduct()
{
    $sql =
        "SELECT
        prod.product_id,
        prod.barcode,
        prod.description,
        prod.cost,
        IFNULL(latest_stock.cumulative_qty, 0.00)cumulative_qty
        FROM
        product prod
        LEFT JOIN stockard latest_stock ON latest_stock.stockard_id =
        (
        SELECT
        MAX(stock.stockard_id)
        FROM
        stockard stock
        WHERE stock.product_id = prod.product_id
        )";
    return $sql;
}

function setRowsToTable($product_id, $barcode, $description, $cost, $cumulative_qty)
{
    return
        "<tr id=$product_id>
            <td>$barcode</td>
            <td>$description</td>
            <td>$cost</td>
            <td>$cumulative_qty</td>
            <td >
            <a onclick='replaceUrlStatePurch($product_id)' >
                <button class='btn-op-update', name='add'>
                Buy
                </button>
            </a>
            </td>
        </tr>";
}