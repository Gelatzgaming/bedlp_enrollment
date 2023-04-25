<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {


    $strand_name = mysqli_real_escape_string($conn, $_POST['strand_name']);
    $strand_def = mysqli_real_escape_string($conn, $_POST['strand_def']);
    $strand_id = $_GET['strand_id'];
    $checkStrand = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_name = '$strand_name' AND strand_def = '$strand_def'") or die(mysqli_error($conn));

    $resultCheck = mysqli_num_rows($checkStrand);

    if (0 == $resultCheck) {
        $addStrand =  mysqli_query($conn, "UPDATE tbl_strands SET strand_name = '$strand_name' , strand_def = '$strand_def' WHERE strand_id = '$strand_id'") or die(mysqli_error($conn));

        $_SESSION['success-edit'] = true;
        header('location: ../add.strand.php?strand_id=' . $strand_id);
    } else {
        $_SESSION['strandExist'] = true;
        header('location: ../add.strand.php?strand_id=' . $strand_id);
    }
}
