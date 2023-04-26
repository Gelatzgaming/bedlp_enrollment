<!doctype html>
<html lang="en" dir="ltr">
<title>Edit Schedules | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$sub_id = $_GET['subject_id'];
$sched_id = $_GET['schedule_id'];


$get_subID = mysqli_query($conn, "SELECT * FROM tbl_schedules WHERE subject_id = '$sub_id' AND schedule_id = '$sched_id'");
$result = mysqli_num_rows($get_subID);
if ($result > 0) {
    $_SESSION['subject_id'] = $sub_id;
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
                    echo '<div class="row">
                 <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert">
                                                 ';
                    foreach ($_SESSION['errors'] as $error) {
                        echo $error;
                    }
                    echo '
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" "></button>
                                                </div>';
                    unset($_SESSION['errors']);
                } elseif (!empty($_SESSION['success-edit'])) {
                    echo '<div class="row">
                 <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Updated.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['success-edit']);
                } elseif (!empty($_SESSION['dbl-sched'])) {
                    echo '<div class="row">
                 <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
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
                                    <h4 class="card-title"> Edit Schedules for Primary - Junior
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <?php
                                $act_acad = $_SESSION['active_acadyears'];
                                $get_subject = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teacher_lname) AS fullname FROM tbl_schedules AS sched
                             LEFT JOIN tbl_subjects AS sub ON sub.subject_id = sched.subject_id
                             LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                             LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                            WHERE sched.subject_id = '$sub_id' AND sched.semester = 0 AND sched.schedule_id = '$_SESSION[schedule_id]' AND acadyear = '$act_acad'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($get_subject)) {
                                    $grd_lvl = $row['grade_level'];

                                ?>

                                    <form action="userData/user.edit.sched.k-10.php" enctype="multipart/form-data" method="POST">

                                        <?php $acadyear = $_SESSION['active_acadyears'];
                                        $sem = 0
                                        ?>

                                        <input value="<?php echo $acadyear; ?>" hidden name="acadyear">
                                        <input value="<?php echo $sem; ?> " hidden name="sem">
                                        <input value="<?php echo $sub_id; ?> " hidden name="sub_id">

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Code</label>
                                                <input type="text" class="form-control" id="example-text-input" name="subject_code" placeholder="Enter Subject Code" readonly value="<?php echo $row['subject_code']; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Description</label>
                                                <input type="text" class="form-control" id="example-text-input" name="subject_description" placeholder="Enter Subject Description" readonly value="<?php echo $row['subject_description']; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Days</label>
                                                <input type="text" class="form-control" id="example-text-input" name="days" placeholder="M, T, W, TH, F" required value="<?php echo $row['day']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Time</label>
                                                <input type="text" class="form-control" id="example-text-input" name="time" placeholder="hh:mm - hh:mm AM/PM" required value="<?php echo $row['time']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Room</label>
                                                <input type="text" class="form-control" id="example-text-input" name="room" placeholder="Enter Room Name" required value="<?php echo $row['room']; ?>">
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Instructor</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Instructor" name="instruct">
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
                                            <?php if ($grd_lvl == "Grade 1") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g1=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 2") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g2=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 3") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g3=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 4") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g4=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 5") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g5=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 6") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g6=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 7") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g7=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 8") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g8=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 9") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g9=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Grade 10") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?g10=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Nursery") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?nurs=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Pre-Kinder") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?pkdr=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
                                            } elseif ($grd_lvl == "Kinder") {
                                                echo '<a href=" ../bed-schedules/list.sched.k-10.php?kdr=' . $grd_lvl . '" class="btn btn-secondary mb-3">';
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