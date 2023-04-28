<?php require '../../../includes/session.php';


$get_user = $_GET['student_id'];

mysqli_query($conn, "DELETE FROM tbl_schoolyears WHERE student_id = '$get_user' AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0')") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.pending.php');