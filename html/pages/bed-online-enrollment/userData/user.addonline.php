<?php

require '../../../includes/conn.php';

// include '../../../includes/session.php';



if (isset($_POST['submit'])) {

    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    if ($grade == '14' || $grade == '15') {
        $strand = mysqli_real_escape_string($conn, $_POST['strand']);
    } else {
        $strand = '0';
    }
    $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);


    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $midname = mysqli_real_escape_string($conn, $_POST['midname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $date_birth = mysqli_real_escape_string($conn, $_POST['date_birth']);
    $place_birth = mysqli_real_escape_string($conn, $_POST['place_birth']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $landline = mysqli_real_escape_string($conn, $_POST['landline']);
    $cellphone = mysqli_real_escape_string($conn, $_POST['cellphone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $last_attend = mysqli_real_escape_string($conn, $_POST['last_attend']);
    $prev_grade_level = mysqli_real_escape_string($conn, $_POST['prev_grade_level']);
    $sch_year = mysqli_real_escape_string($conn, $_POST['sch_year']);
    $sch_address = mysqli_real_escape_string($conn, $_POST['sch_address']);
    $sch_type = mysqli_real_escape_string($conn, $_POST['sch_type']);
    $infos = mysqli_real_escape_string($conn, $_POST['info_name']);


    $get_acadYear = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears LEFT JOIN tbl_acadyears USING(ay_id)");
    $get_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters LEFT JOIN tbl_semesters USING (semester_id)");
    $row_acadyear = mysqli_fetch_array($get_acadYear);
    $row_semester = mysqli_fetch_array($get_sem);
    $acadyear_id = $row_acadyear['ay_id'];
    $act_acad = $row_acadyear['academic_year'];
    $semester_id = $row_semester['semester_id'];
    $act_sem = $row_semester['semester'];


    $year = $act_acad;
    $semester = $act_sem;

    $check_double = mysqli_query($conn, "SELECT * FROM tbl_online_reg WHERE grade_level_id ='$grade' AND student_fname = '$firstname' AND student_lname = '$lastname' AND student_mname = '$midname' AND email = '$email'") or die(mysqli_error($conn));

    $resultCheck = mysqli_num_rows($check_double);

    if (0 == $resultCheck) {

        $insertUser = mysqli_query($conn, "INSERT INTO tbl_online_reg (stud_type, grade_level_id, strand_id, lrn, student_lname, student_fname, student_mname, address, date_birth, place_birth, age, gender_id, nationality, religion, landline, cellphone, email, last_sch, prev_grade_level, sch_year, sch_address, sch_type, info_name, academic_year, semester, remark ) VALUES ('New', '$grade', '$strand', '$lrn', '$firstname', '$lastname', '$midname', '$address', '$date_birth', '$place_birth', '$age', '$gender', '$nationality', '$religion', '$landline', '$cellphone', '$email', '$last_attend', '$prev_grade_level', '$sch_year' , '$sch_address', '$sch_type', '$infos', '$year', '$semester', 'Pending')");

        $_SESSION['success'] = true;
        header('location: ../online.success.php');
    } else {
        $_SESSION['dbl-input'] = true;
        header('location: ../online.enrollment.php');
    }
}
