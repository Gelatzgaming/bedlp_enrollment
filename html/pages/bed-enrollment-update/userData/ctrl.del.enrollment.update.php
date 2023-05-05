<?php require '../../../includes/conn.php';


$date = $_GET['date'];

mysqli_query($conn, "DELETE FROM tbl_breakdown WHERE date = '$date'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.enrollment.update.php');