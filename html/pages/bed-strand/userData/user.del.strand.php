<?php
require '../../../includes/conn.php';

$get_id = $_GET['strand_id'];

mysqli_query($conn, "DELETE FROM tbl_strands WHERE strand_id = '$get_id' ") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header("location: ../add.strand.php");
