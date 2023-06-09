<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {


    if (empty($_POST['checked'])) {
        $_SESSION['empty-check'] = true;
        if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
            header('location: ../list.offeredSub.senior.php?stud_id=' . $_SESSION['studtID']);
        } else if ($_SESSION['role'] == "Student") {
            header('location: ../list.offeredSub.senior.php');
        }
    } else {
        foreach ($_POST['checked'] as $index) {
            $sched_id = $_POST['sched_id'];
            $studID = $_POST['studID'];
            $insert = mysqli_query($conn, "INSERT INTO tbl_enrolled_subjects (schedule_id, student_id) VALUES ('$sched_id[$index]', '$studID[$index]')") or die(mysqli_error($conn));
            $_SESSION['success'] = true;
            if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
                $_SESSION['success-add'] = true;
                header('location: ../list.enrolledSub.senior.php?stud_id=' . $_SESSION['studtID']);
            } else if ($_SESSION['role'] == "Student") {
                $_SESSION['success-add'] = true;
                header('location: ../list.enrolledSub.senior.php');
            }
        }
    }
}