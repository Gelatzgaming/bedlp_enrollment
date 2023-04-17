<?php
require '../../../includes/conn.php';


if (isset($_POST['submit'])) {

    $info_name = mysqli_real_escape_string($conn, $_POST['info_name']);

    $addinfo =  mysqli_query($conn, "INSERT INTO tbl_information (info_name) values ('$info_name')") or die(mysqli_error($conn));

    if ($addinfo== true) {
        $_SESSION['success'] = true;
        header("location: ../add.choices.php");
    } 
}