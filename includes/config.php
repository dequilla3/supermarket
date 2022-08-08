<?php
$con = new mysqli('localhost', 'root', '', 'bfi_assessment');

if (!$con) {
    die(mysqli_error($con));
}