<!doctype html>
<html lang="en" dir="ltr">
<title>Update Student Details | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$stud_id = $_GET['stud_id'];
$_SESSION['student_id'] = $stud_id;
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
                                                    <strong>Successfully Added.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['errors']);
                } elseif (!empty($_SESSION['success-edit'])) {
                    echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Updated.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['success-edit']);
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"> Update Student Details
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <?php $get_enrolled_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_lname, ', ', stud.student_fname,' ', stud.student_mname) AS fullname
                            FROM tbl_schoolyears AS sy
                            LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
                            LEFT JOIN tbl_strands AS stds ON stds.strand_id = sy.strand_id
                            LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                            LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id =sy.grade_level_id
                            LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id  
                            WHERE sy.student_id = '$stud_id' AND ay.academic_year = '$act_acad' AND (sem.semester = '$act_sem' OR sy.semester_id = '0')") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($get_enrolled_stud)) {
                                ?>

                                    <form action="userData/user.edit.enrolledStud.php" method="POST" enctype="multipart/form-data">

                                        <input type="text" name="stud_id" value="<?php echo $row['student_id']; ?>" hidden>

                                        <input type="text" name="acadyear" value="<?php echo $row['ay_id']; ?>" hidden>

                                        <?php $get_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
                                        while ($row2 = mysqli_fetch_array($get_sem)) { ?>
                                            <input type="text" name="sem" value="<?php echo $row2['semester_id']; ?>" hidden>
                                        <?php } ?>

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Student ID</label>
                                                <input type="text" class="form-control" id="example-text-input" name="studno" placeholder="Student ID" value="<?php echo $row['stud_no'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Name</label>
                                                <input type="text" class="form-control" id="example-text-input" name="name" placeholder="Name" value="<?php echo $row['fullname'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Grade
                                                    Level</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Grade Level" name="grade_level">
                                                    <option value="<?php echo $row['grade_level_id']; ?>">
                                                        <?php echo $row['grade_level']; ?></option>
                                                    <?php $get_grdlvl = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN ('$row[grade_level_id]')");
                                                    while ($row2 = mysqli_fetch_array($get_grdlvl)) {
                                                    ?>
                                                        <option value="<?php echo $row2['grade_level_id']; ?>">
                                                        <?php echo $row2['grade_level'];
                                                    } ?>
                                                        </option>
                                                </select>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Student Type</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Type" name="stud_type">
                                                    <?php if ($row['stud_type'] == 'Transferee') {
                                                        echo '<option value="' . $row['stud_type'] . '">'
                                                            . $row['stud_type'] . '</option>';
                                                    } else {
                                                        echo ' <option value="' . $row['stud_type'] . '">'
                                                            . $row['stud_type'] . ' Student</option>';
                                                    } ?>

                                                    <?php if ($row['stud_type'] == 'New') {
                                                        echo '<option value="Old">Old Student</option>
                                                        <option value="Transferee">Transferee</option>';
                                                    } else if ($row['stud_type'] == 'Old') {
                                                        echo ' <option value="New">New Student</option>
                                                        <option value="Transferee">Transferee</option>';
                                                    } else if ($row['stud_type'] == 'Transferee') {
                                                        echo ' <option value="New">New Student</option>
                                                        <option value="Old">Old Student</option>';
                                                    } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Strand</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Strand" name="strand">
                                                    <option value="<?php echo $row['strand_id']; ?>" selected disabled>
                                                        <?php echo $row['strand_def']; ?>Select Strand (for
                                                        Senior
                                                        High Student) </option>
                                                    <?php $get_strand = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id NOT IN ('$row[strand_id]')");
                                                    while ($row3 = mysqli_fetch_array($get_strand)) {
                                                    ?> <option value="<?php echo $row3['strand_id']; ?>">
                                                        <?php echo $row3['strand_def'];
                                                    } ?></option>
                                                </select>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Section</label>
                                                <input type="text" class="form-control" id="example-text-input" name="section" placeholder="Enter Section" value="<?php echo $row['section'] ?>">
                                            </div>
                                        </div>


                                        <div class="form-group float-end">
                                            <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                                        </div>
                                        <div class="justify-content-end mr-2">
                                            <?php if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") { ?>
                                                <a href="../bed-enrollment/list.pending.php?" class="btn btn-secondary mb-3">
                                                <?php  } else { ?>
                                                    <a href="../bed-enrollment/list.pending.php" class="btn btn-secondary mb-3">

                                                    <?php } ?>

                                                    <i class="fa fa-arrow-circle-left"></i>
                                                    Back</a>
                                        </div>
                                    </form>
                                <?php } ?>
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