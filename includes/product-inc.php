<?php
include 'config.php';

if (isset($_POST['cancel-customer'])) {
    header('location:..\components\view-product.php');
} else if (isset($_POST['submit-product'])) {
    $code = strtoupper($_POST['code']);
    $desc = $_POST['desc'];
    $cost = $_POST['cost'];

    //if empty fields
    if (hasEmptyFields($code, $desc, $cost)) {
        echo '<div id="alert_div" class="p-signup-error">
								<p>Please fill empty fields!</p>
							</div>';
    } else if (isProductCodeExist($con, $code)) {
        echo '<div id="alert_div" class="p-signup-error">
                                <p>Product code already exist!</p>
                            </div>';
    } else {
        //insert supplier here
        $result = mysqli_query($con, insertProduct($code, $desc, $cost));
        if ($result) {
            header('location:..\components\view-product.php');
        }
    }
}

//query to insert supplier
function insertProduct($code, $desc, $cost)
{
    $sql =
        "INSERT INTO product (
        barcode,
        description,
        cost,
        date_created
      )
      VALUES
        (
          '$code',
          '$desc',
          '$cost',
          NOW()
        )";
    return $sql;
}

function hasEmptyFields($code,  $desc, $cost)
{
    return  empty($code) or
        empty($desc) or
        empty($cost);
}

function isProductCodeExist($con, $code)
{
    $result = $con->query(
        "SELECT
        prod.*
        FROM
        product prod
        WHERE prod.barcode = '$code'"
    );
    $row_cnt = mysqli_num_rows($result);

    return ($row_cnt > 0);
}