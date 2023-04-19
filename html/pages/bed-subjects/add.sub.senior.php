<!doctype html>
<html lang="en" dir="ltr">
<title>Add Subjects | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php'; ?>

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
                                    <h4 class="card-title"> Add Subjects for Senior High School Department
                                    </h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <form action="userData/user.add.sub.senior.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Code</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="subject_code" placeholder="Enter Subject Code" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Description</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="subject_description" placeholder="Enter Subject Description"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Lecture Unit(s)</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="lec_units" placeholder="Enter No. of Unit(s)" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Laboratory
                                                Unit(s)</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="lab_units" placeholder="Enter No. of Unit(s)" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Total Unit(s)</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="total_units" placeholder="Enter Total Unit(s)" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="example-text-input">Pre-Requisites</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="prerequisites" placeholder="Enter Pre-Requisites">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">E.A.Y</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Effective Academic Year" name="eay" required>
                                                <option value="" disabled selected>Select Effective Academic
                                                    Year</option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM tbl_efacadyears ");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['efacadyear_id'] . '">' . $row2['efacadyear'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Semester</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Semester" name="semester">
                                                <option value="" disabled selected>Select Semester</option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_semesters");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['semester_id'] . '">' . $row2['semester'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Grade
                                                Level</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Grade Level" name="grade_level" required>
                                                <option value="" disabled selected>Select Grade Level
                                                </option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_grade_levels LIMIT 13, 2");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['grade_level_id'] . '">' . $row2['grade_level'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Strand</label>
                                            <select class="form-select" data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Strand" name="strand_name" required>
                                                <option value="" disabled selected>Select Strand</option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_strands");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['strand_id'] . '">' . $row2['strand_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

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