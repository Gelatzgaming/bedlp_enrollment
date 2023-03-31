<?php
require '../../../includes/conn.php';


if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {


    $studno = mysqli_real_escape_string($conn, $_POST['studno']);
    $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    $failed = 0;

    if (empty($_FILES['prof_img']['tmp_name'])) {
        $error_img = '<li> The <strong>upload profile</strong> is required.</li>';
        $failed = $failed + 1;
    }
    if (empty($username)) {
        $error_uname = '<li> The <strong>username field</strong> is required.</li>';
        $failed++;
    }
    if ($password != $password2) {
        $error_pass = '<li> The <strong>confirm password field</strong> does not match.</li>';
        $failed++;
    } elseif (empty($password)) {
        $error_empty_pass = '<li> The <strong>password field</strong> is required.</li>';
        $failed++;
    }

    if ($failed != 0) {
        $_SESSION['prev_data'] = array($studno, $lrn, $username);
        $_SESSION['errors'] = array($error_img, $error_uname, $error_pass, $error_empty_pass);
        header('location: ../add.student.php');
    } else {
        $image = (!empty($_FILES['prof_img']['tmp_name'])) ? addslashes(file_get_contents($_FILES['prof_img']['tmp_name'])) : null;
        $hashpwd = password_hash($password, PASSWORD_BCRYPT);
        $insertUser = mysqli_query($conn, "INSERT INTO tbl_students (img, stud_no, lrn, username, password) VALUES ('$image', '$studno', '$lrn', '$username', '$hashpwd')") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../add.student.php');
    }
}
