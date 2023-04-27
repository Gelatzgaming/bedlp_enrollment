<!doctype html>
<html lang="en" dir="ltr">
<title>Edit Subjects | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$sen_id = $_GET['sen_id'];
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
                                    <h4 class="card-title"> Update Subjects for Senior High School Department
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">
                                <?php
                                $get_subInfo = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior 
                            LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                            LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                            LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                            LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                            WHERE subject_id = '$sen_id'");

                                while ($row = mysqli_fetch_array($get_subInfo)) {
                                    $strand_n = $row['strand_name'];
                                    $strand_id = $row['strand_id'];
                                    $eay = $row['efacadyear']; ?>

                                    <form action="userData/user.edit.sub.senior.php" method="POST" enctype="multipart/form-data">

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Code</label>
                                                <input value="<?php echo $_GET['sen_id']; ?>" type="text" name="sen_id" hidden>
                                                <input type="text" class="form-control" id="example-text-input" name="subject_code" placeholder="Enter Subject Code" required value="<?php echo $row['subject_code']; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Description</label>
                                                <input type="text" class="form-control" id="example-text-input" name="subject_description" placeholder="Enter Subject Description" required value="<?php echo $row['subject_description']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Lecture Unit(s)</label>
                                                <input type="text" class="form-control" id="example-text-input" name="lec_units" placeholder="Enter No. of Unit(s)" required value="<?php echo $row['lec_units']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Laboratory
                                                    Unit(s)</label>
                                                <input type="text" class="form-control" id="example-text-input" name="lab_units" placeholder="Enter No. of Unit(s)" required value="<?php echo $row['lab_units']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Total Unit(s)</label>
                                                <input type="text" class="form-control" id="example-text-input" name="total_units" placeholder="Enter Total Unit(s)" required value="<?php echo $row['total_units']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-8 mb-3">
                                                <label class="form-label" for="example-text-input">Pre-Requisites</label>
                                                <input type="text" class="form-control" id="example-text-input" name="prerequisites" placeholder="Enter Pre-Requisites" value="<?php echo $row['pre_requisites']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">E.A.Y</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Effective Academic Year" name="eay" required value="<?php echo $row['eay']; ?>">
                                                    <option value="<?php echo $row['efacadyear_id']; ?>">
                                                        <?php echo $row['efacadyear']; ?></option>
                                                    <?php $result = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear_id NOT IN (" . $row['efacadyear_id'] . ") ");
                                                    while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['efacadyear_id']; ?>">
                                                        <?php echo $row2['efacadyear'];
                                                    } ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Semester</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Semester" name="semester">
                                                    <option value="" disabled>Select Semester</option>
                                                    <option value="<?php echo $row['semester_id']; ?>">
                                                        <?php echo $row['semester']; ?></option>
                                                    <?php $result = mysqli_query($conn, "SELECT * FROM tbl_semesters WHERE semester_id NOT IN (" . $row['semester_id'] . ") ");
                                                    while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['semester_id']; ?>">
                                                        <?php echo $row2['semester'];
                                                    } ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Grade
                                                    Level</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Grade Level" name="grade_level" required>
                                                    <option value="" disabled>Select Grade Level</option>
                                                    <option value="<?php echo $row['grade_level_id']; ?>">
                                                        <?php echo $row['grade_level']; ?></option>
                                                    <?php $result = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ") LIMIT 13, 2");
                                                    while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['grade_level_id'] ?>">
                                                        <?php echo $row2['grade_level'];
                                                    } ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Strand</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Strand" name="strand_name" required>
                                                    <option value="" disabled>Select Strand</option>
                                                    <option value="<?php echo $row['strand_id'] ?>">
                                                        <?php echo $row['strand_name'] ?></option>
                                                    <?php $result = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id NOT IN (" . $row['strand_id'] . ")");
                                                    while ($row2 = mysqli_fetch_array($result)) { ?>
                                                        <option value="<?php echo $row2['strand_id']; ?>">
                                                        <?php echo $row2['strand_name'];
                                                    } ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group float-end mt-3">
                                            <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                                        </div>
                                        <div class="justify-content-end mb-3 mt-3 p-0 float-right">
                                            <?php
                                            if ($strand_n == "ABM") {
                                                echo '<a href=" list.sub.senior.php?strand=' . $strand_id . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "STEM") {
                                                echo '<a href=" list.sub.senior.php?strand=' . $strand_id . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "TVl - ICT") {
                                                echo '<a href=" list.sub.senior.php?strand=' . $strand_id . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "HUMSS") {
                                                echo '<a href=" list.sub.senior.php?strand=' . $strand_id . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
                                            } elseif ($strand_n == "TVL - HE") {
                                                echo '<a href=" list.sub.senior.php?strand=' . $strand_id . '&eay=' . $eay . '" class="btn btn-secondary mb-3">';
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