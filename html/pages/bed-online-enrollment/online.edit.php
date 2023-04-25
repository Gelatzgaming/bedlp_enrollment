<!doctype html>
<html lang="en" dir="ltr">
<title>Approve Student | SFAC Las Pinas</title>

<?php include '../../includes/bed-header.php';



$or_id = $_GET['or_id'];
$_SESSION['or_id'] = $or_id;

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
                                                </div>
                                                ';
                    unset($_SESSION['errors']);
                } elseif (!empty($_SESSION['success'])) {
                    echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Added.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                                ';
                    unset($_SESSION['success']);
                } elseif (!empty($_SESSION['success-edit'])) {
                    echo ' <div class="alert alert-solid alert-info rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Edited.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>';
                    unset($_SESSION['success-edit']);
                } elseif (!empty($_SESSION['lrn-studno'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Student ID and LRN are already exists.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>';
                    unset($_SESSION['lrn-studno']);
                } elseif (!empty($_SESSION['double-lrn'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>LRN already exists.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>';
                    unset($_SESSION['double-lrn']);
                } elseif (!empty($_SESSION['double-studno'])) {
                    echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Student ID already exists.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>';
                    unset($_SESSION['double-studno']);
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <form action="userData/user.admitonline.php" method="POST" enctype="multipart/form-data">

                                    <?php
                                    $display_info = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                    LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_online_reg.gender_id
                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                    WHERE or_id = '" . $_GET['or_id'] . "'") or die(mysqli_error($conn));

                                    while ($row = mysqli_fetch_array($display_info)) {
                                    ?>


                                        <div class="row justify-content-center">

                                            <hr style="border: 2px solid black;">
                                            <h4 class="text-lg-center mb-3">Personal Data</h4>
                                            <hr style="border: 2px solid black;">


                                            <div class="col-md-3 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Student Type</label>
                                                    <select class="form-select form-select-md" data-dropdown-css-class="select2-purple" data-placeholder="Select Student Type" name="studtype">
                                                        <option value="<?php echo $row['stud_type']; ?>">
                                                            <?php echo $row['stud_type']; ?></option>
                                                        <option value="New">New</option>
                                                        <option value="Old">Old</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Balik Franciscano</label>
                                                    <select class="form-select form-select-md" data-dropdown-css-class="select2-purple" data-placeholder="Select Student Type" name="bf">
                                                        <option value="<?php echo $row['bf']; ?>">
                                                            <?php echo $row['bf']; ?></option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Grade</label>
                                                    <select class="form-select form-select-md" data-dropdown-css-class="select2-purple" data-placeholder="Select Grade" name="grade">
                                                        <?php if (empty($row['grade_level_id'])) {
                                                            echo '<option value="" disabled selected>Select Gender</option>';
                                                            $get_level = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                            while ($row2 = mysqli_fetch_array($get_level)) {
                                                                echo '
                                                <option value="' . $row2['grade_level_id'] .
                                                                    '">' . $row2['grade_level'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option disabled>Select Gender</option>
                                                        <option value="' . $row['grade_level_id'] .
                                                                '" selected >' . $row['grade_level'] . '</option>';
                                                            $get_level = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level_id NOT IN (" . $row['grade_level_id'] . ")");
                                                            while ($row3 = mysqli_fetch_array($get_level)) {
                                                                echo '<option value="' . $row3['grade_level_id'] . '">'
                                                                    . $row3['grade_level'] . '</option>';
                                                            }
                                                        } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label" for="example-text-input">LRN</label>
                                                <input type="text" class="form-control" id="example-text-input" name="lrn" placeholder="Enter 11-digit lrn" value="<?php echo $row['lrn']; ?>">
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label" for="example-text-input">Student No.</label>
                                                <input type="text" class="form-control" id="example-text-input" name="stud_no" placeholder="Enter Student Number" required>
                                            </div>
                                        </div>

                                        <hr style="border: 2px solid black;">
                                        <h4 class="text-lg-center mb-3">Account Details</h4>
                                        <hr style="border: 2px solid black;">

                                        <div class="row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label" for="example-text-input">Username</label>
                                                <input type="text" class="form-control" id="example-text-input" name="username" placeholder="Enter Username" required>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label" for="example-text-input">Password</label>
                                                <input type="text" class="form-control" id="example-text-input" name="password" placeholder="Enter Password" required>
                                            </div>
                                        </div>

                                        <hr style="border: 2px solid black;">
                                        <h4 class="text-lg-center mb-3">Personal Data</h4>
                                        <hr style="border: 2px solid black;">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Last Name</label>
                                                <input type="text" class="form-control" id="example-text-input" name="lastname" placeholder="Last name" value="<?php echo $row['student_lname']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">First
                                                    name</label>
                                                <input type="text" class="form-control" id="example-text-input" name="firstname" placeholder="First name" value="<?php echo $row['student_fname']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Middle
                                                    Name</label>
                                                <input type="text" class="form-control" id="example-text-input" name="midname" placeholder="Middle name" value="<?php echo $row['student_mname']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="example-text-input">Home
                                                    Address</label>
                                                <input type="text" class="form-control" id="example-text-input" name="address" placeholder="Unit number, house number, street name, barangay, city, province" value="<?php echo $row['address']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Date of
                                                    Birth</label>
                                                <input type="text" class="form-control" id="example-text-input" name="date_birth" placeholder="Date of Birth" value="<?php echo $row['date_birth']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Place of
                                                    Birth</label>
                                                <input type="text" class="form-control" id="example-text-input" name="place_birth" placeholder="First name" value="<?php echo $row['place_birth']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Age</label>
                                                <input type="text" class="form-control" id="example-text-input" name="age" placeholder="Middle name" value="<?php echo $row['age']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <select class="form-select form-select-md" data-dropdown-css-class="select2-purple" data-placeholder="Select Gender" name="gender" required>
                                                        <?php if (empty($row['gender_id'])) {
                                                            echo '<option value="" disabled selected>Select Gender</option>';
                                                            $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders");
                                                            while ($row2 = mysqli_fetch_array($get_gender)) {
                                                                echo '
                                                    <option value="' . $row2['gender_id'] .
                                                                    '">' . $row2['gender_name'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option disabled>Select Gender</option>
                                                        <option value="' . $row['gender_id'] .
                                                                '" selected >' . $row['gender_name'] . '</option>';
                                                            $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders WHERE gender_id NOT IN (" . $row['gender_id'] . ")");
                                                            while ($row3 = mysqli_fetch_array($get_gender)) {
                                                                echo '<option value="' . $row3['gender_id'] . '">'
                                                                    . $row3['gender_name'] . '</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Nationality</label>
                                                <input type="text" class="form-control" id="example-text-input" name="nationality" placeholder="Nationality" value="<?php echo $row['nationality']; ?>">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="example-text-input">Religion</label>
                                                <input type="text" class="form-control" id="example-text-input" name="religion" placeholder="Religion" value="<?php echo $row['religion']; ?>">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label" for="example-text-input">Landline
                                                    No.</label>
                                                <input type="text" class="form-control" id="example-text-input" name="landline" placeholder="Landline Number" value="<?php echo $row['landline']; ?>">
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label class="form-label" for="example-text-input">Cellphone
                                                    No.</label>
                                                <input type="text" class="form-control" id="example-text-input" name="cellphone" placeholder="Cellphone Number" value="<?php echo $row['cellphone']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="example-text-input">Email</label>
                                                <input type="text" class="form-control" id="example-text-input" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>


                                        <hr style="border: 2px solid black;">
                                        <h4 class="text-lg-center mb-3">Educational Attainment</h4>
                                        <hr style="border: 2px solid black;">

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="example-text-input">School Last
                                                    Attended</label>
                                                <input type="text" class="form-control" id="example-text-input" name="last_attend" placeholder="School Last Attended" value="<?php echo $row['last_sch']; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Previous Grade Level</label>
                                                    <select class="form-select form-select-md" data-dropdown-css-class="select2-purple" data-placeholder="Select Grade Level" name="prev_grade_level">
                                                        <?php if (empty($row['prev_grade_level'])) {
                                                            echo '<option value="None" disabled selected>Select Grade Level</option>';
                                                            $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                            while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                echo '<option value="' . $row2['grade_level'] . '">'
                                                                    . $row2['grade_level'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['prev_grade_level'] . '" selected>'
                                                                . $row['prev_grade_level'] . '</option>';
                                                            $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['prev_grade_level'] . "') ");
                                                            while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                echo '<option value="' . $row3['grade_level'] . '">'
                                                                    . $row3['grade_level'] . '</option>';
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">School
                                                    Year</label>
                                                <input type="text" class="form-control" id="example-text-input" name="sch_year" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-yyyy" placeholder="School Year" value="<?php echo $row['sch_year']; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="example-text-input">School
                                                    Address</label>
                                                <input type="text" class="form-control" id="example-text-input" name="sch_address" placeholder="School Last Attended" value="<?php echo $row['sch_address']; ?>">
                                            </div>
                                        </div>

                                    <?php } ?>
                                    <div class="form-group float-end">
                                        <button class="btn btn-danger" type="submit" name="submit"><i class="fa fa-check"></i> Register</button>
                                    </div>
                                </form>
                            </div>
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