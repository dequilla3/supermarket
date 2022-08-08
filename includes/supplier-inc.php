<?php
include 'config.php';

if (isset($_POST['cancel-supplier'])) {
    header('location:..\components\view-supplier.php');
} else if (isset($_POST['submit-supplier'])) {
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
        //insert supplier here
        $result = mysqli_query($con, insertSupplier($scode, $cname, $contactno, $address));
        if ($result) {
            header('location:..\components\view-supplier.php');
        }
    }
}

//query to insert supplier
function insertSupplier($scode, $cname, $contactno, $address)
{
    $sql =
        "INSERT INTO supplier (
        supplier_code,
        company_name,
        contact_no,
        address,
        date_created
      )
      VALUES
        (
          '$scode',
          '$cname',
          '$contactno',
          '$address',
          NOW()
        )";
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