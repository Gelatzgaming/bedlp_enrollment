<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $efacad_year = mysqli_real_escape_string($conn, $_POST['efacad_year']);

    $addEfAcad =  mysqli_query($conn, "INSERT INTO tbl_efacadyears (efacadyear) values ('$efacad_year')") or die(mysqli_error($conn));

    if ($addEfAcad == true) {
        $_SESSION['successYear'] = true;
        header("location: ../add.eay.php");
    } else {
        $_SESSION['fill'] = true;
        header("location: ../add.eay.php");
    }
}