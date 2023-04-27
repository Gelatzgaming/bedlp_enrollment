<?php
require '../../../includes/conn.php';

$sched_id = $_GET['schedule_id'];
$strand_id = $_GET['strand_id'];

mysqli_query($conn, "DELETE FROM tbl_schedules WHERE schedule_id = '$sched_id'") or die(mysqli_error($conn));
$_SESSION['success-del'] = true;
header('location: ../list.sched.senior.php?strand=' . $strand_id);
