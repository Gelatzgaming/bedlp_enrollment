<?php
require '../../../includes/conn.php';

$get_info = $_GET['info_id'];

mysqli_query($conn, "DELETE FROM tbl_information WHERE info_id = '$get_info' ") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header("location: ../list.choices.php");