<?php
include '../../includes/conn.php';

?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Inquiry - Las Piñas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/auth/logo.png" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="../../assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="../../assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="../../assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="../../assets/css/rtl.min.css" />

    <style>
    .background {
        background-repeat: no-repeat;
        background-size: cover;
        background-position-x: right;
        background-position: bottom;

    }

    body {
        font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    }

    .toast-top-right {
        right: unset;
        margin-top: 1%;
    }
    </style>

</head>

<body class="hold-transition login-page background" style="background-image: url('../../assets/images/pages/bg-2.jpg');"
    data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="content-wrapper pt-4">
        <section class="content">
            <div class="container-fluid pl-4 pr-4 pb-3">
                <div class="card-body justify-content-center">
                    <div class="row justify-content-center">
                        <!-- Textual inputs start -->
                        <div class="col-8 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header text-center">
                                        <a href="../bed-login/login.php" class="h1 justify-content-center"><img
                                                height="90" width="90" src="../../assets/images/auth/logo.png"
                                                alt="logo-signin"></a>
                                        <h5 class="login-box-msg mt-3">Saint Francis of Assisi College Bacoor Campus
                                        </h5>
                                    </div>
                                    <form action="./userData/user.addonline.php" method="POST"
                                        enctype="multipart/form-data">

                                        <hr style="border: 1px solid black;">
                                        <h4 class="text-lg-center mb-3">Registration Form</h4>
                                        <hr style="border: 1px solid black;">

                                        <div class="card-body ml-2 mr-2">


                                            <div class="row justify-content-center">

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Grade</label>
                                                        <select class="form-select form-select-md"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Grade" name="grade">
                                                            <option selected disabled>Select Grade</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row['grade_level_id'] . '">' . $row['grade_level'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label" for="example-text-input">LRN</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter 11-digit LRN" name="lrn"
                                                        id="example-url-input">
                                                </div>

                                            </div>
                                            <div class="row justify-content-center">

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Strand</label>
                                                        <select class="form-select form-select-md"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Strand" name="strand">
                                                            <option selected disabled>Select Strand</option>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * FROM tbl_strands");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                echo '<option value="' . $row['strand_id'] . '">' . $row['strand_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <hr style="border: 1px solid black;">
                                            <h4 class="text-lg-center mb-3">Personal Data</h4>
                                            <hr style="border: 1px solid black;">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Last
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="Last Name"
                                                            name="lastname" id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">First
                                                            Name</label>
                                                        <input class="form-control" type="text" placeholder="First Name"
                                                            name="firstname" id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Middle
                                                            Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Middle name" name="midname"
                                                            id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Home
                                                            Address</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Unit number, house number, street name, barangay, city, province"
                                                            name="address" id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Date
                                                            of
                                                            Birth</label>
                                                        <input type="text" class="form-control focss"
                                                            data-inputmask-alias="datetime"
                                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                            name="date_birth" placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Place
                                                            of
                                                            Birth</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="city, province" name="place_birth"
                                                            id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Age</label>
                                                        <input class="form-control" type="text" placeholder="Age"
                                                            name="age" id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Gender</label>
                                                        <select class="form-select form-select-md"
                                                            data-dropdown-css-class="select2-purple"
                                                            data-placeholder="Select Gender" name="gender" required>
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-url-input"
                                                            class="col-form-label">Nationality</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Nationality" name="nationality"
                                                            id="example-url-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                            class="col-form-label">Religion</label>
                                                        <input class="form-control" type="text" placeholder="Religion"
                                                            name="religion" id="example-search-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Landline
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Landline Number" name="landline">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Cellphone
                                                            No.</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Cellphone Number" name="cellphone">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-url-input" class="col-form-label">Email
                                                            Address</label>
                                                        <input type="email" class="form-control focss"
                                                            placeholder="example@gmail.com" name="email">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <hr style="border: 1px solid black;">
                                        <h4 class="text-lg-center mb-3">Educational Background</h4>
                                        <hr style="border: 1px solid black;">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">School Last
                                                        Attended</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="School Last Attended" name="last_attend"
                                                        id="example-url-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Grade
                                                        Level</label>
                                                    <select class="form-select form-select-md"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Grade Level" name="prev_grade_level">
                                                        <?php
                                                        $get = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                        while ($row2 = mysqli_fetch_array($get)) {
                                                            echo '<option value="' . $row2['grade_level'] . '">'
                                                                . $row2['grade_level'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">School
                                                        Year</label>
                                                    <input class="form-control" type="text" placeholder="0000-0000"
                                                        name="sch_year" id="example-url-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">School
                                                        Address</label>
                                                    <input class="form-control" type="text" placeholder="School Address"
                                                        name="sch_address" id="example-url-input">
                                                </div>
                                            </div>
                                        </div>

                                        <hr style="border: 1px solid black;">
                                        <h4 class="text-lg-center mb-3">Other Information</h4>
                                        <hr style="border: 1px solid black;">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Where did you
                                                        find us?</label>
                                                    <select class="form-select form-select-md"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Your Answer" name="infos">
                                                        <option selected disabled>Select Your Answer</option>
                                                        <?php
                                                        $get = mysqli_query($conn, "SELECT * FROM tbl_information");
                                                        while ($row2 = mysqli_fetch_array($get)) {
                                                            echo '<option value="' . $row2['info_name'] . '">'
                                                                . $row2['info_name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-0">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="terms" class="custom-control-input"
                                                        id="exampleCheck1" required>
                                                    <label class="custom-control-label" for="exampleCheck1">I agree that
                                                        the data collected from this online registration shall be
                                                        subject to the school's <a
                                                            href="terms/SFAC-Data-Privacy.pdf">Data Privacy
                                                            Policy</a>.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-md-2">
                                                <button type="submit" name="submit"
                                                    class="btn btn-danger mb-3 mt-3">Register</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>

    <!-- Library Bundle Script -->
    <script src="../../assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="../../assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="../../assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="../../assets/js/charts/vectore-chart.js"></script>
    <script src="../../assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="../../assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="../../assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="../../assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="../../assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="../../assets/js/hope-ui.js" defer></script>

</body>

</html>