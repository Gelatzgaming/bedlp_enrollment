<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {

    $acadyear = $_POST['acadyear'];
    $sem = $_POST['sem'];
    $sen_id = $_POST['sen'];
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $teach = mysqli_real_escape_string($conn, $_POST['instruct']);

    $check = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE subject_id = '$sen_id' AND teacher_id = '$teach' AND day = '$days' AND time = '$time' AND room = '$room' AND semester = '$sem' AND acadyear = '$acadyear'") or die(mysqli_error($conn));
    $result = mysqli_num_rows($check);

    if ($result > 0) {
        $_SESSION['dbl-sched'] = true;
        header('location: ../add.petitioned.senior.php?strand=' . $_SESSION['strand_id'] . '&eay=' . $_SESSION['eay']);
    } else {
        $insert = mysqli_query($conn, "INSERT INTO tbl_schedules (subject_id, teacher_id, day, time, room, semester, acadyear) VALUES ('$sen_id', '$teach', '$days', '$time', '$room', '$sem', '$acadyear')") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../add.petitioned.senior.php?strand=' . $_SESSION['strand_id.'] . '&eay=' . $_SESSION['eay']);
    }
}
