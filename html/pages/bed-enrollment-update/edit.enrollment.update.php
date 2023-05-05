<!doctype html>
<html lang="en" dir="ltr">
<title>Edit Enrollment Update | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php'; 

$date = $_GET['date'];
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
                                    <h4 class="card-title"> Edit Enrollment Update
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <form action="userData/ctrl.edit.enrollment.update.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Date</label>
                                            <input type="date" class="form-control" id="example-text-input" value="<?php echo $date?>" disabled>
                                            <input type="date" class="form-control" id="example-text-input" name="date" value="<?php echo $date?>" hidden>
                                        </div>
                                    </div>
                                    <?php
                                     $grade_level = mysqli_query($conn, "SELECT * FROM tbl_breakdown LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_breakdown.grade_level WHERE date = '$date' GROUP BY grade_level_id");
                                     while ($row = mysqli_fetch_array($grade_level)) {
                                        if ($row['grade_level_id'] <> 14 && $row['grade_level_id'] <> 15) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" id="example-text-input" value="<?php echo $row['grade_level']?>" disabled>
                                            <input type="text" class="form-control" id="example-text-input" value="<?php echo $row['grade_level_id']?>" name="grade_level[]" hidden>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Enrollees (New)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="daily_new[]" value="<?php echo $row['daily_new']?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Enrollees (Old)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="daily_old[]" value="<?php echo $row['daily_old']?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Reservation (New)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="reservations_new[]" value="<?php echo $row['reservations_new']?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Reservation (Old)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="reservations_old[]" value="<?php echo $row['reservations_old']?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                        } else {
                                            $strand_info =  mysqli_query($conn, "SELECT * FROM tbl_strands LEFT JOIN tbl_breakdown ON tbl_breakdown.strand_id = tbl_strands.strand_id WHERE date = '$date' AND grade_level = '$row[grade_level_id]'");
                                            ?>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" id="example-text-input" value="<?php echo $row['grade_level']?>" disabled>
                                        </div>
                                    </div>       
                                    <?php 
                                     while ($row2 = mysqli_fetch_array($strand_info)) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Strand Name</label>
                                                <input type="text" class="form-control" id="example-text-input" value="<?php echo $row2['strand_name']?>" disabled>
                                                <input type="text" class="form-control" id="example-text-input" value="<?php echo $row2['strand_id']?>" name="strand[]" hidden>
                                                <input type="text" class="form-control" id="example-text-input" value="<?php echo $row['grade_level_id']?>" name="grade_level[]" hidden>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Enrollees (New)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="daily_new[]" value="<?php echo $row2['daily_new']?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Enrollees (Old)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="daily_old[]" value="<?php echo $row2['daily_old']?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Reservation (New)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="reservations_new[]" value="<?php echo $row2['reservations_new']?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Daily Reservation (Old)</label>
                                            <input type="text" class="form-control" id="example-text-input" name="reservations_old[]" value="<?php echo $row2['reservations_old']?>">
                                        </div>
                                    </div>
                                    <?php
                                    }} } 
                                    ?>
                                    <div class="form-group float-end">
                                        <button class="btn btn-danger" type="submit" name="submit">Submit</button>
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