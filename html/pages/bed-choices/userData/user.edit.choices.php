<?php
require '../../../includes/conn.php';



if (isset($_POST['submit'])) {

    $info_name = mysqli_real_escape_string($conn, $_POST['info_name']);
    $info_id = $_GET ['info_id'];

    $checkinfo_name = mysqli_query($conn, "SELECT * FROM tbl_information WHERE info_name = '$info_name'") or die(mysqli_error($conn));
    
    if (0 == $resultCheck) {
        $addinfo =  mysqli_query($conn, "UPDATE tbl_information SET info_name = '$info_name' WHERE info_id = '$info_id'") or die(mysqli_error($conn));

        $_SESSION['success-edit'] = true;
        header('location: ../edit.choices.php?info_id=' . $info_id);
    } 
}