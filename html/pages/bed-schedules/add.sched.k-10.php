<!doctype html>
<html lang="en" dir="ltr">
<title>Set Schedules | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$sub_id = $_GET['sub_id'];
$get_subID = mysqli_query($conn, "SELECT * FROM tbl_subjects WHERE subject_id = '$sub_id'");
$result = mysqli_num_rows($get_subID);
if ($result > 0) {
    $_SESSION['sub_id'] = $sub_id;
} else {
    header('location: ../bed-404/page404.php');
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
                                    <h4 class="card-title"> Set Schedules for Primary to Junior High School Department
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <?php $get_subject = mysqli_query($conn, "SELECT * FROM tbl_subjects AS sub
                            LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id 
                            WHERE sub.subject_id = '$sub_id'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($get_subject)) {
                                    $gl = $row['grade_level'];
                                ?>

                                <form action="userData/user.add.sched.k-10.php" method="POST"
                                    enctype="multipart/form-data">




                                    <div class="row">

                                        <input value="<?php echo $act_acad; ?> " hidden name="acad">
                                        <input value="<?php echo $sub_id; ?> " hidden name="sub_id">
                                        <input value="<?php echo $row['grade_level_id']; ?>" hidden name="glvl">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Code</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="subj_code" placeholder="Enter Subject Code" readonly
                                                value="<?php echo $row['subject_code']; ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Description</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="subj_description" placeholder="Enter Subject Description" readonly
                                                value="<?php echo $row['subject_description']; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Days</label>
                                            <input type="text" class="form-control" id="example-text-input" name="days"
                                                placeholder="M, T, W, TH, F" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Time</label>
                                            <input type="text" class="form-control" id="example-text-input" name="time"
                                                placeholder="hh:mm - hh:mm AM/PM" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Room</label>
                                            <input type="text" class="form-control" id="example-text-input" name="room"
                                                placeholder="Enter Room Name" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Instructor</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Instructor" name="instruc">
                                                <option value="" disabled selected>Select Instructor
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
                                        <?php if ($gl == "Grade 1") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g1=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 2") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g2=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 3") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g3=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 4") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g4=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 5") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g5=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 6") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g6=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 7") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g7=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 8") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g8=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 9") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g9=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Grade 10") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?g10=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Nursery") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?nurs=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Pre-Kinder") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?pkdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            } elseif ($gl == "Kinder") {
                                                echo '<a href="../bed-subjects/list.offerSub.k-10.php?kdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                            }  ?>
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