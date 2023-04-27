<?php require '../../../includes/conn.php';


$get_user = $_GET['guest_id'];

mysqli_query($conn, "DELETE FROM tbl_guests WHERE guest_id = '$get_user'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.guest.php');
