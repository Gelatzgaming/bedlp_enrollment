<?php
require '../../../includes/conn.php';

$get_id = $_GET['efacadyear_id'];

mysqli_query($conn, "DELETE FROM tbl_efacadyears WHERE efacadyear_id = '$get_id' ") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header("location: ../add.eay.php");
