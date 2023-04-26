<!doctype html>
<html lang="en" dir="ltr">
<title>Set Schedules | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$sen_id = $_GET['sen_id'];


$get_senID = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior WHERE subject_id = '$sen_id'");
$result = mysqli_num_rows($get_senID);
if ($result > 0) {
    $_SESSION['sen_id'] = $sen_id;
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
                                    <h4 class="card-title"> Set Schedules for Senior High School Department
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <?php $get_subject = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior AS sub
                            LEFT JOIN tbl_strands AS strd ON strd.strand_id = sub.strand_id 
                            LEFT JOIN tbl_efacadyears AS eay on eay.efacadyear_id = sub.efacadyear_id
                            WHERE sub.subject_id = '$sen_id'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($get_subject)) {
                                    $strand_n = $row['strand_name'];
                                    $eay = $row['efacadyear'];
                                ?>

                                    <form action="userData/user.add.sched.senior.php" method="POST" enctype="multipart/form-data">


                                        <input value="<?php echo $act_acad; ?>" hidden name="acadyear">
                                        <input value="<?php echo $act_sem; ?> " hidden name="sem">
                                        <input value="<?php echo $sen_id; ?> " hidden name="sen_id">

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Code</label>
                                                <input type="text" class="form-control" id="example-text-input" name="code" placeholder="Enter Subject Code" readonly value="<?php echo $row['subject_code']; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Description</label>
                                                <input type="text" class="form-control" id="example-text-input" name="subject" placeholder="Enter Subject Description" readonly value="<?php echo $row['subject_description']; ?>">
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
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Instructor" name="instruc">
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
                                            <?php if ($strand_n == "ABM") {
                                            } ?>

                                            <?php if ($strand_n == "ABM") {
                                                echo '<a href=" ../bed-subjects/list.offerSub.senior.php?abm=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "STEM") {
                                                echo '<a href=" ../bed-subjects/list.offerSub.senior.php?stem=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "TVL - ICT") {
                                                echo '<a href=" ../bed-subjects/list.offerSub.senior.php?ict=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "HUMSS") {
                                                echo '<a href=" ../bed-subjects/list.offerSub.senior.php?humss=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "TVL - HE") {
                                                echo '<a href=" ../bed-subjects/list.offerSub.senior.php?tvl=' . $strand_n . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
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