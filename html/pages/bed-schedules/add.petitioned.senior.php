<!doctype html>
<html lang="en" dir="ltr">
<title>Set Schedules | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$eay = $_GET['eay'];
$_SESSION['eay'] = $eay;
if (isset($_GET['strand'])) {
    $strandInfo = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id = '$_GET[strand]'");
    $row = mysqli_fetch_array($strandInfo);
    $strand_name = $row['strand_name'];
    $strand_id = $_GET['strand'];
}
$_SESSION['strand_n'] = $strand_name;
$_SESSION['strand_id'] = $strand_id;

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
                    unset($_SESSION['success']);
                } elseif (!empty($_SESSION['subject_exists'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Subject Already Exists.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['subject_exists']);
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"> Add Petitioned Subjects for
                                        <?php if ($strand_name == 'STEM') {
                                            echo '(STEM)';
                                        } elseif ($strand_name == 'ABM') {
                                            echo ' (ABM)';
                                        } elseif ($strand_name == 'TVL - ICT') {
                                            echo ' (TVL-ICT)';
                                        } elseif ($strand_name == 'HUMSS') {
                                            echo ' (HUMSS)';
                                        } elseif ($strand_name == 'TVL - HE') {
                                            echo ' (TVL-HE)';
                                        } else {
                                            header('location: ../bed-error/error404.php');
                                        } ?>
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">
                                <form action="userData/user.add.petitioned.senior.php" method="POST" enctype="multipart/form-data">



                                    <input value="<?php echo $act_acad; ?>" hidden name="acadyear">
                                    <input value="<?php echo $act_sem; ?> " hidden name="sem">

                                    <div class="row justify-content-center">
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="example-text-input">Code & Subject &
                                                Level</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Subject" name="sen" required>
                                                <option value="" disabled selected>Select Subject
                                                </option>
                                                <?php
                                                $active_sem = $act_sem;
                                                $get_offersub = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior AS subsen LEFT JOIN tbl_strands AS strd ON strd.strand_id = subsen.strand_id 
                                                LEFT JOIN tbl_semesters AS sem ON sem.semester_id = subsen.semester_id 
                                                LEFT JOIN tbl_efacadyears AS eay ON eay.efacadyear_id = subsen.efacadyear_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = subsen.grade_level_id
                                                WHERE sem.semester NOT IN ('$active_sem') AND strd.strand_name = '$strand_name' AND eay.efacadyear = '$eay'");
                                                while ($row = mysqli_fetch_array($get_offersub)) {

                                                ?>
                                                    <option value="<?php echo $row['subject_id']; ?>">
                                                        <?php echo $row['subject_code'] . ' - ', ' ' . $row['subject_description'] . ' - (' . $row['semester'] . ') - (' . $row['grade_level'] . ')'; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Days</label>
                                            <input type="text" class="form-control" id="example-text-input" name="days" placeholder="M, T, W, TH, F" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Time</label>
                                            <input type="text" class="form-control" id="example-text-input" name="time" placeholder="hh:mm - hh:mm AM/PM" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Room</label>
                                            <input type="text" class="form-control" id="example-text-input" name="room" placeholder="Enter Room Name" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Instructor</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Instructor" name="instruct">
                                                <option disabled selected>Select Instructor
                                                </option>
                                                <?php $get_teachers = mysqli_query($conn, "SELECT *, CONCAT(tbl_teachers.teacher_fname, ' ', LEFT(tbl_teachers.teacher_mname,1), '. ', tbl_teachers.teacher_lname) AS fullname FROM tbl_teachers") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($get_teachers)) {
                                                ?>
                                                    <option value="<?php echo $row['teacher_id']; ?>">
                                                    <?php echo $row['fullname'];
                                                } ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group float-end">
                                        <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                                    </div>
                                    <div class="justify-content-end mb-3 mt-3 p-0 float-right">
                                        <?php
                                        echo '<a href=" ../bed-subjects/list.offerSub.senior.php?strand=' . $strand_id . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                        ?>
                                        <i class="fa fa-arrow-circle-left "></i>
                                        Back </a>
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