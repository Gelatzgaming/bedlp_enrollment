<!doctype html>
<html lang="en" dir="ltr">
<title>Enroll Now | SFAC Las Pinas</title>

<?php include '../../includes/bed-header.php';

$get_active_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
while ($row = mysqli_fetch_array($get_active_sem)) {
    $sem = $row['semester_id'];
}

$get_active_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
while ($row = mysqli_fetch_array($get_active_acad)) {
    $acad = $row['ay_id'];
}

$get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or die(mysqli_error($conn));
$result = mysqli_num_rows($get_level_id);

if ($result > 0) {
    header('location: ../bed-subjects/list.enrolledSub.k-10.php');
} else {

    $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
    $result2 = mysqli_num_rows($get_level_id);

    if ($result2 > 0) {
        header('location: ../bed-subjects/list.enrolledSub.senior.php');
    }
}
?>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <?php include '../../includes/bed-sidebar.php'; ?>

    <main class="main-content">
        <div class="position-relative iq-banner">

            <!--Nav Start-->
            <?php include '../../includes/bed-navbar.php' ?>
            <!-- Nav Header Component End -->
            <!--Nav End-->

        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <?php
                if (!empty($_SESSION['errors'])) {
                    echo ' <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert">
                                                 ';
                    foreach ($_SESSION['errors'] as $error) {
                        echo $error;
                    }
                    echo '
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" "></button>
                                                </div>';
                    unset($_SESSION['errors']);
                } elseif (!empty($_SESSION['success'])) {
                    echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Enrolled.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['success']);
                } elseif (!empty($_SESSION['dbl-stud'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>This Student has already submitted.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['dbl-stud']);
                } elseif (!empty($_SESSION['field_required'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>All fields are required.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['field_required']);
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Enrollment Form
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <?php $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname,' ', tbl_students.student_mname) AS fullname FROM tbl_students WHERE student_id = '$stud_id'");
                                while ($row = mysqli_fetch_array($get_stud)) {
                                ?>
                                <form action="userData/user.add.enroll.php" method="POST" enctype="multipart/form-data">


                                    <input type="text" name="stud_id" value="<?php echo $row['student_id']; ?>" hidden>

                                    <?php $get_act_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
                                        while ($row2 = mysqli_fetch_array($get_act_acad)) {
                                            echo '<input type="text" name="acadyear" value="' . $row2['ay_id'] . '" hidden>';
                                        }
                                        ?>

                                    <?php $get_act_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
                                        while ($row2 = mysqli_fetch_array($get_act_sem)) {
                                            echo '<input type="text" name="sem" value="' . $row2['semester_id'] . '" hidden>';
                                        }
                                        ?>

                                    <input type="text" name="remark" value="Pending" hidden>

                                    <input class="form-control" type="text" name="student_id"
                                        value="<?php echo $row['student_id']; ?>" hidden>

                                    <div class="row justify-content-center">
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label" for="example-text-input">Student ID</label>
                                            <input type="text" class="form-control" name="studno"
                                                placeholder="Student ID" value="<?php echo $row['stud_no'] ?>" readonly>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label" for="example-text-input">Name</label>
                                            <input type="text" class="form-control" id="example-text-input" name="name"
                                                placeholder="Name" value="<?php echo $row['fullname'] ?>" readonly>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Grade
                                                Level</label>
                                            <select class="form-select form-select-md"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Grade Level" name="grade_level">
                                                <option value="" disabled selected>Select Grade Level
                                                </option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_grade_levels");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['grade_level_id'] . '">' . $row2['grade_level'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="example-text-input">Student Type</label>
                                            <select class="form-select form-select-md"
                                                data-dropdown-css-class="select2-info" data-placeholder="Select Type"
                                                name="stud_type">
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="New">New Student</option>
                                                <option value="Old">Old Student</option>
                                                <option value="Balik Franciscano">Balik Franciscano</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Strand</label>
                                            <select class="form-select form-select-md"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Strand (for Senior High School)" name="strand">
                                                <option value="" disabled selected>Select Strand
                                                </option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_strands");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['strand_id'] . '">' . $row2['strand_def'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group float-end">
                                        <button class="btn btn-danger" type="submit" name="submit"> <i
                                                class="fa fa-check"> </i> Enroll Now!</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section Start -->

        <?php include '../../includes/bed-footer.php' ?>

        <!-- Footer Section End -->
    </main>

    <?php include '../../includes/bed-script.php' ?>

</body>

</html>