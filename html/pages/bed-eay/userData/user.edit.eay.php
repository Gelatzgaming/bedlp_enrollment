<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {


    $efacad_year = mysqli_real_escape_string($conn, $_POST['efacad_year']);
    $efacadyear_id = $_GET['efacadyear_id'];
    $checkEfAcadYear = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear = '$efacadyear'") or die(mysqli_error($conn));

    $resultCheck = mysqli_num_rows($checkEfAcadYear);

    if (0 == $resultCheck) {
        $addEfAcad =  mysqli_query($conn, "UPDATE tbl_efacadyears SET efacadyear = '$efacad_year' WHERE efacadyear_id = '$efacadyear_id'") or die(mysqli_error($conn));

        $_SESSION['success-edit'] = true;
        header('location: ../add.eay.php?efacadyear_id=' . $efacadyear_id);
    } else {
        $_SESSION['yearExist'] = true;
        header('location: ../add.eay.php?efacadyear_id=' . $efacadyear_id);
    }
}
