<!doctype html>
<html lang="en" dir="ltr">
<title>Edit Subjects | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

$sub_id = $_GET['subject_id'];
$_SESSION['subject_id'] = $sub_id;

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
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"> Edit Subjects for Primary to Junior High School Department
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">
                                <?php $get_sub = mysqli_query($conn, "SELECT * FROM tbl_subjects LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id WHERE subject_id = '$sub_id'");
                                while ($row = mysqli_fetch_array($get_sub)) {
                                    $gl = $row['grade_level'];
                                ?>
                                    <form action="userData/user.edit.sub.k-10.php" method="POST" enctype="multipart/form-data">

                                        <?php
                                        if (!empty($_SESSION['errors'])) {
                                            echo ' <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert">
                                                 ';
                                            foreach ($_SESSION['errors'] as $error) {
                                                echo $error;
                                            }
                                            echo '
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" "></button>
                                                </div>
                                            </div>';
                                            unset($_SESSION['errors']);
                                        } elseif (!empty($_SESSION['success-edit'])) {
                                            echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Edited.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                            </div> ';
                                            unset($_SESSION['success-edit']);
                                        } elseif (!empty($_SESSION['subject_exists'])) {
                                            echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Subject Already Exists.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                            </div> ';
                                            unset($_SESSION['subject_exists']);
                                        }
                                        ?>


                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Code</label>
                                                <input type="text" class="form-control" id="example-text-input" name="subject_code" placeholder="Enter Subject Code" required value="<?php echo $row['subject_code']; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Description</label>
                                                <input type="text" class="form-control" id="example-text-input" name="subject_description" placeholder="Enter Subject Description" required value="<?php echo $row['subject_description']; ?>">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Select Grade
                                                    Level</label>
                                                <select class="form-select" data-dropdown-css-class="select2-info" data-placeholder="Select Grade Level" name="grade_level">
                                                    <option value="<?php echo $row['grade_level_id'] ?>" selected>
                                                        <?php echo $row['grade_level'] ?></option>
                                                    <?php $get_grdlvl = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ") LIMIT 12");
                                                    while ($row2 = mysqli_fetch_array($get_grdlvl)) {
                                                    ?>
                                                        <option value="<?php echo $row2['grade_level_id']; ?>">
                                                        <?php echo $row2['grade_level'];
                                                    } ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group float-end mt-3">
                                            <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                                        </div>
                                        <div class="justify-content-end mb-3 mt-3 p-0 float-right"> <?php if ($gl == "Grade 1") {
                                                                                                        echo '<a href="list.sub.k-10.php?g1=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 2") {
                                                                                                        echo '<a href="list.sub.k-10.php?g2=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 3") {
                                                                                                        echo '<a href="list.sub.k-10.php?g3=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 4") {
                                                                                                        echo '<a href="list.sub.k-10.php?g4=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 5") {
                                                                                                        echo '<a href="list.sub.k-10.php?g5=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 6") {
                                                                                                        echo '<a href="list.sub.k-10.php?g6=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 7") {
                                                                                                        echo '<a href="list.sub.k-10.php?g7=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 8") {
                                                                                                        echo '<a href="list.sub.k-10.php?g8=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 9") {
                                                                                                        echo '<a href="list.sub.k-10.php?g9=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Grade 10") {
                                                                                                        echo '<a href="list.sub.k-10.php?g10=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Nursery") {
                                                                                                        echo '<a href="list.sub.k-10.php?nurs=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Pre-Kinder") {
                                                                                                        echo '<a href="list.sub.k-10.php?pkdr=' . $gl . '"
                                            class="btn btn-secondary mb-3">';
                                                                                                    } elseif ($gl == "Kinder") {
                                                                                                        echo '<a href="list.sub.k-10.php?kdr=' . $gl . '"
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