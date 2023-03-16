<?php
require '../../../includes/conn.php';

// separate img --> Gerald
// if (isset($_POST['upload'])) {

//     if (empty($_FILES['prof_img']['tmp_name'])) {
//         $_SESSION['no-img'] = true;
//         header('location: ../edit.student.php?student_id=' . $student_id);
//     } else {
//         $image = addslashes(file_get_contents($_FILES['prof_img']['tmp_name']));
//         $set_userInfo = mysqli_query($conn, "UPDATE tbl_students SET img = '$image' WHERE student_id = '$student_id'") or die(mysqli_error($conn));
//         $_SESSION['success-studentEdit'] = true;
//         header('location: ../edit.student.php?student_id=' . $student_id);
//     }
// } else

// OLD -->Gerald
// if (isset($_POST['submit'])) {

//     $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
//     $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);
//     $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

//     if (empty($password) && empty($password2)) {
//         $_SESSION['no-pwd'] = true;
//         header('location: ../edit.student.php?student_id=' . $student_id);
//     } else {
//         if ($password != $password2) {
//             $_SESSION['error-pass'] = true;
//             header('location: ../edit.student.php?student_id=' . $student_id);
//         } else {
//             $image = addslashes(file_get_contents($_FILES['prof_img']['tmp_name']));
//             $hashpwd = password_hash($password, PASSWORD_BCRYPT);
//             $insertUser = mysqli_query($conn, "UPDATE tbl_students SET student_id = '$studentid', lrn = '$lrn', username = '$username', password = '$hashpwd' WHERE student_id = '$student_id'") or die(mysqli_error($conn));
//             $_SESSION['success'] = true;
//             header('location: ../edit.student.php?student_id=' . $student_id);
//         }
//     }
// }


if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
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
        $_SESSION['prev_data'] = array($studentid, $lrn, $username);
        $_SESSION['errors'] = array($error_img, $error_uname, $error_pass, $error_empty_pass);
        header('location: ../edit.student.php?student_id=' . $student_id);
    } else {
        $image = (!empty($_FILES['prof_img']['tmp_name'])) ? addslashes(file_get_contents($_FILES['prof_img']['tmp_name'])) : null;
        $hashpwd = password_hash($password, PASSWORD_BCRYPT);
        $insertUser = mysqli_query($conn, "UPDATE tbl_students SET img = '$image', student_id = '$studentid', lrn = '$lrn', username = '$username', password = '$hashpwd' WHERE student_id = '$student_id'") or die(mysqli_error($conn));
        $_SESSION['success-edit'] = true;
        header('location: ../edit.student.php?student_id=' . $student_id);
    }
}