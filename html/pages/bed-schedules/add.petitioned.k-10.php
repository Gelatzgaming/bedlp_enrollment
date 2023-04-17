<!doctype html>
<html lang="en" dir="ltr">
<title>Set Schedules | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';


$grade_lvl = $_GET['g'];
$_SESSION['grade_lvl'] = $grade_lvl;

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
                                        <?php if ($grade_lvl == 'Grade 1') {
                                                echo 'Grade 1';
                                            } elseif ($grade_lvl == 'Grade 2') {
                                                echo 'Grade 2';
                                            } elseif ($grade_lvl == 'Grade 3') {
                                                echo 'Grade 3';
                                            } elseif ($grade_lvl == 'Grade 4') {
                                                echo 'Grade 4';
                                            } elseif ($grade_lvl == 'Grade 5') {
                                                echo 'Grade 5';
                                            } elseif ($grade_lvl == 'Grade 6') {
                                                echo 'Grade 6';
                                            } elseif ($grade_lvl == 'Grade 7') {
                                                echo 'Grade 7';
                                            } elseif ($grade_lvl == 'Grade 8') {
                                                echo 'Grade 8';
                                            } elseif ($grade_lvl == 'Grade 9') {
                                                echo 'Grade 9';
                                            } elseif ($grade_lvl == 'Grade 10') {
                                                echo 'Grade 10';
                                            } elseif ($grade_lvl == 'Nursery') {
                                                echo 'Nursery';
                                            } elseif ($grade_lvl == 'Pre-Kinder') {
                                                echo 'Pre-Kinder';
                                            } elseif ($grade_lvl == 'Kinder') {
                                                echo 'Kinder';
                                            } else {
                                                header('location: ../bed-404/page404.php');
                                            } ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">
                                <form action="userData/user.add.petitioned.k-10.php" method="POST"
                                    enctype="multipart/form-data">

                                    <input value="<?php echo $act_acad; ?>" hidden name="acadyear">
                                    <input value="<?php echo $act_sem; ?> " hidden name="sem">

                                    <div class="row justify-content-center">
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="example-text-input">Code & Subject &
                                                Level</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Subject" name="sen" required>
                                                <option value="" disabled selected>Select Subject
                                                </option>

                                                <?php
                                                $active_sem = $_SESSION['active_semester'];
                                                $get_offersub = mysqli_query($conn, "SELECT * FROM tbl_subjects AS sub
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                                                WHERE gl.grade_level NOT IN ('$grade_lvl')");
                                                while ($row = mysqli_fetch_array($get_offersub)) {

                                                ?>
                                                <option value="<?php echo $row['subject_id']; ?>">
                                                    <?php echo $row['subject_code'] . ' -- ' .  $row['subject_description'] . ' -- ' . $row['grade_level']; ?>
                                                </option>

                                                <?php } ?>
                                            </select>
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
                                                data-placeholder="Select Instructor" name="instruct">
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
                                        <?php if ($grade_lvl == "Grade 1") {
                                        } ?>

                                        <?php if ($grade_lvl == "Grade 1") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g1=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 2") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g2=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 3") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g3=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 4") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g4=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 5") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g5=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 6") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g6=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 7") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g7=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 8") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g8=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 9") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g9=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Grade 10") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?g10=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Nursery") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?nurs=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Pre-Kinder") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?pkdr=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                } elseif ($grade_lvl == "Kinder") {
                                                    echo '<a href="../bedlp-subjects/list.offerSub.k-10.php?kdr=' . $grade_lvl . '"
                                            class="btn btn-secondary mb-3">';
                                                }  ?>
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