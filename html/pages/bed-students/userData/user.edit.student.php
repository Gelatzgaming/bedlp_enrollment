<?php
require '../../../includes/conn.php';

$stud_id = $_SESSION['stud_id'];

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $midname = mysqli_real_escape_string($conn, $_POST['midname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
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
        $_SESSION['prev_data'] = array($firstname, $lastname, $midname, $email, $username);
        $_SESSION['errors'] = array($error_img, $error_uname, $error_pass, $error_empty_pass);
        header('location: ../edit.student.php?student_id=' . $stud_id);
    } else {
        $image = (!empty($_FILES['prof_img']['tmp_name'])) ? addslashes(file_get_contents($_FILES['prof_img']['tmp_name'])) : null;
        $hashpwd = password_hash($password, PASSWORD_BCRYPT);

        $insertUser = mysqli_query($conn, "UPDATE tbl_students SET img = '$image', student_fname = '$firstname', student_lname = '$lastname', student_mname = '$midname', email = '$email', username = '$username', password = '$hashpwd' WHERE student_id = '$stud_id'") or die(mysqli_error($conn));
        $_SESSION['success-edit'] = true;
        header('location: ../edit.student.php?student_id=' . $stud_id);
    }
}
