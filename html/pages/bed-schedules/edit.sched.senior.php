<!doctype html>
<html lang="en" dir="ltr">
<title>Edit Schedules | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$sen_id = $_GET['subject_id'];
$sched_id = $_GET['schedule_id'];


$get_senID = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE subject_id = '$sen_id' AND schedule_id = '$sched_id'");
$result = mysqli_num_rows($get_senID);
if ($result > 0) {
    $_SESSION['subject_id'] = $sen_id;
    $_SESSION['schedule_id'] = $sched_id;
} else {
    header('location: ../bed-error/error404.php');
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
                } elseif (!empty($_SESSION['success-edit'])) {
                    echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Updated.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['success-edit']);
                } elseif (!empty($_SESSION['dbl-sched'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Double Schedule!.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['dbl-sched']);
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"> Edit Schedules for Senior High School Department
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <?php

                                $get_subject = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teacher_lname) AS fullname FROM tbl_schedules AS sched
                                LEFT JOIN tbl_subjects_senior AS subsen ON subsen.subject_id = sched.subject_id
                                LEFT JOIN tbl_strands AS strd ON strd.strand_id = subsen.strand_id
                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = subsen.grade_level_id
                                LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                WHERE sched.subject_id = '$sen_id' AND sched.semester = '$act_sem' AND sched.schedule_id = '$sched_id' AND acadyear = '$act_acad'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($get_subject)) {
                                    $strand_n = $row['strand_name'];
                                    $strand_id = $row['strand_id'];

                                ?>

                                <form action="userData/user.edit.sched.senior.php" method="POST"
                                    enctype="multipart/form-data">

                                    <input value="<?php echo $act_acad; ?>" hidden name="acadyear">
                                    <input value="<?php echo $act_sem; ?> " hidden name="sem">
                                    <input value="<?php echo $sen_id; ?> " hidden name="subject_id">
                                    <input value="<?php echo $sched_id; ?> " hidden name="schedule_id">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Code</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="subject_code" placeholder="Enter Subject Code" readonly
                                                value="<?php echo $row['subject_code']; ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Description</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="subject_description" placeholder="Enter Subject Description"
                                                readonly value="<?php echo $row['subject_description']; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Days</label>
                                            <input type="text" class="form-control" id="example-text-input" name="days"
                                                placeholder="M, T, W, TH, F" required
                                                value="<?php echo $row['day']; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Time</label>
                                            <input type="text" class="form-control" id="example-text-input" name="time"
                                                placeholder="hh:mm - hh:mm AM/PM" required
                                                value="<?php echo $row['time']; ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Room</label>
                                            <input type="text" class="form-control" id="example-text-input" name="room"
                                                placeholder="Enter Room Name" required
                                                value="<?php echo $row['room']; ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Instructor</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Instructor" name="instruct">
                                                <option selected value="<?php echo $row['teacher_id']; ?>">
                                                    <?php echo $row['fullname'];
                                                        ?></option>
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
                                        <?php if ($strand_n == "ABM") {
                                                echo '<a href=" ../bed-schedules/list.sched.senior.php?strand_id=' . $strand_id . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "STEM") {
                                                echo '<a href=" ../bed-schedules/list.sched.senior.php?strand_id=' . $strand_id . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "TVL - ICT") {
                                                echo '<a href=" ../bed-schedules/list.sched.senior.php?strand_id=' . $strand_id . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "HUMSS") {
                                                echo '<a href=" ../bed-schedules/list.sched.senior.php?strand_id=' . $strand_id . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "TVL - HE") {
                                                echo '<a href=" ../bed-schedules/list.sched.senior.php?strand_id=' . $strand_id . '" class="btn btn-secondary mb-3">';
                                            } ?>
                                        <i class="fa fa-arrow-circle-left "></i>
                                        Back </a>
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