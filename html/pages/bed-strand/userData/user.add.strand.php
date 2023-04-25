<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $strand_name = mysqli_real_escape_string($conn, $_POST['strand_name']);
    $strand_def = mysqli_real_escape_string($conn, $_POST['strand_def']);

    $addStrand =  mysqli_query($conn, "INSERT INTO tbl_strands (strand_name, strand_def) values ('$strand_name' , '$strand_def')") or die(mysqli_error($conn));

    if ($addStrand == true) {
        $_SESSION['success'] = true;
        header("location: ../add.strand.php");
    } else {
        $_SESSION['fill'] = true;
        header("location: ../add.strand.php");
    }
}