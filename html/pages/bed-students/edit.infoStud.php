<!doctype html>
<html lang="en" dir="ltr">
<title>Personal Information | SFAC Las Pinas</title>

<?php include '../../includes/bed-header.php';

if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {

    $stud_id = $_GET['stud_id'];
    $_SESSION['student_id'] = $stud_id;
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

                                <form action="userData/user.edit.infoStud.php" method="POST" enctype="multipart/form-data">

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
                                    } elseif (!empty($_SESSION['success'])) {
                                        echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Added.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                            </div> ';
                                        unset($_SESSION['success']);
                                    } elseif (!empty($_SESSION['success-edit'])) {
                                        echo ' <div class="alert alert-solid alert-info rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Edited.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>
                                                </div> ';
                                        unset($_SESSION['success-edit']);
                                    } elseif (!empty($_SESSION['lrn-studno'])) {
                                        echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Student ID and LRN are already exists.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>
                                                </div> ';
                                        unset($_SESSION['lrn-studno']);
                                    } elseif (!empty($_SESSION['double-lrn'])) {
                                        echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>LRN already exists.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>
                                                </div> ';
                                        unset($_SESSION['double-lrn']);
                                    } elseif (!empty($_SESSION['double-studno'])) {
                                        echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Student ID already exists.</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                    </div>
                                                </div> ';
                                        unset($_SESSION['double-studno']);
                                    }
                                    ?>

                                    <?php
                                    $get_userInfo = mysqli_query($conn, "SELECT * FROM tbl_students
                                             LEFT JOIN tbl_genders ON tbl_students.gender_id = tbl_genders.gender_id
                                              WHERE student_id = '$stud_id'");

                                    while ($row = mysqli_fetch_array($get_userInfo)) {
                                    ?>


                                        <div class="row">

                                            <hr style="border: 2px solid black;">
                                            <h4 class="text-lg-center mb-3">Personal Data</h4>
                                            <hr style="border: 2px solid black;">


                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="example-text-input">Student ID</label>
                                                <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {
                                                    echo '   
                                                            <input type="text" class="form-control"
                                                            value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                                       >
                                                    </div>';
                                                } elseif ($_SESSION['role'] == 'Student') {
                                                    echo '   
                                                            <input type="text" class="form-control"
                                                            value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no" readonly>
                                                    </div>';
                                                } ?>


                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="example-text-input">Learner Reference
                                                        Number (LRN)</label>
                                                    <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {
                                                        echo '   
                                                            <input type="text" class="form-control"
                                                            value="' . $row['lrn'] . '" placeholder="Learner Reference Number" name="lrn"
                                                       >
                                                    </div>';
                                                    } elseif ($_SESSION['role'] == 'Student') {
                                                        echo '   
                                                            <input type="text" class="form-control"
                                                            value="' . $row['lrn'] . '" placeholder="Learner Reference Number" name="lrn" readonly>
                                                    </div>';
                                                    } ?>



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
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Home
                                                            Address</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="address" placeholder="Unit number, house number, street name, barangay, city, province" value="<?php echo $row['address']; ?>">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Province
                                                            Address</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="prov" placeholder="Unit number, house number, street name, barangay, city, province" value="<?php echo $row['prov']; ?>">
                                                    </div>
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
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">ACR #</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="acr" placeholder="ACR Number" value="<?php echo $row['acr']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">Landline
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="landline" placeholder="Landline Number" value="<?php echo $row['landline']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">Cellphone
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="cellphone" placeholder="Cellphone Number" value="<?php echo $row['cellphone']; ?>">
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label class="form-label" for="example-text-input">Email</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Level Applied for</label>
                                                            <select class="form-select form-select-md" data-dropdown-css-class="select2-purple" data-placeholder="Select Grade Level" name="app_grade_level">
                                                                <?php if (empty($row['app_grade_level'])) {
                                                                    echo '<option value="None" disabled selected>Select Grade Level</option>';
                                                                    $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                                    while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                        echo '<option value="' . $row2['grade_level'] . '">'
                                                                            . $row2['grade_level'] . '</option>';
                                                                    }
                                                                } else {
                                                                    echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['app_grade_level'] . '" selected>'
                                                                        . $row['app_grade_level'] . '</option>';
                                                                    $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['app_grade_level'] . "') ");
                                                                    while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                        echo '<option value="' . $row3['grade_level'] . '">'
                                                                            . $row3['grade_level'] . '</option>';
                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <hr style="border: 2px solid black;">
                                                <h4 class="text-lg-center mb-3">Family Background</h4>
                                                <hr style="border: 2px solid black;">

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Name of
                                                            Father</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="fname" placeholder="Name of Father" value="<?php echo $row['fname']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Name of
                                                            Mother</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mname" placeholder="Name of Mother" value="<?php echo $row['mname']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Age</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="fage" placeholder="(Father) Age" value="<?php echo $row['fage']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Age</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mage" placeholder="(Mother) Age" value="<?php echo $row['mage']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Email
                                                            Address</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="femail" placeholder="(Father) Email Address" value="<?php echo $row['femail']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Email
                                                            Address</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="memail" placeholder="(Mother) Email Address" value="<?php echo $row['memail']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Landline
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="flandline" placeholder="(Father) Landline Number" value="<?php echo $row['flandline']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Landline
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mlandline" placeholder="(Mother) Landline Number" value="<?php echo $row['mlandline']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Contact
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="fcontact" placeholder="(Father) Contact Number" value="<?php echo $row['fcontact']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Contact
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mcontact" placeholder="(Mother) Contact Number" value="<?php echo $row['mcontact']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Education
                                                            Attainment</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="feduc_attain" placeholder="(Father) Education Attainment" value="<?php echo $row['feduc_attain']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Education
                                                            Attainment</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="meduc_attain" placeholder="(Mother) Education Attainment" value="<?php echo $row['meduc_attain']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Last School
                                                            Attended</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="flast_sch_att" placeholder="(Father) Last School Attended" value="<?php echo $row['flast_sch_att']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Last School
                                                            Attended</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mlast_sch_att" placeholder="(Mother) Last School Attended" value="<?php echo $row['mlast_sch_att']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Occupation</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="focc" placeholder="(Father) Occupation" value="<?php echo $row['focc']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Occupation</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mocc" placeholder="(Mother) Occupation" value="<?php echo $row['mocc']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Employer</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="femployer" placeholder="(Father) Employer (Name of the Company)" value="<?php echo $row['femployer']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Employer</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="memployer" placeholder="(Mother) Employer (Name of the Company)" value="<?php echo $row['memployer']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Business
                                                            Add.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="fbus_ad" placeholder="(Father) Business Address" value="<?php echo $row['fbus_ad']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Business
                                                            Add.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mbus_ad" placeholder="(Mother) Business Address" value="<?php echo $row['mbus_ad']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Office Phone
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="fof_ph_no" placeholder="(Father) Office Phone Number" value="<?php echo $row['fof_ph_no']; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="example-text-input">Office Phone
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="mof_ph_no" placeholder="(Mother) Office Phone Number" value="<?php echo $row['mof_ph_no']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label" for="example-text-input">Monthly
                                                            Income</label>
                                                        <input type="number" class="form-control" id="example-text-input" name="fmonth_inc" placeholder="(Father) Monthly Income" value="<?php echo $row['fmonth_inc']; ?>">
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label" for="example-text-input">Monthly
                                                            Income</label>
                                                        <input type="number" class="form-control" id="example-text-input" name="mmonth_inc" placeholder="(Mother) Monthly Income" value="<?php echo $row['mmonth_inc']; ?>">
                                                    </div>
                                                </div>

                                                <hr style="border: 2px solid black;">

                                                <div class="row">
                                                    <div class="col-md-8 mb-3">
                                                        <label class="form-label" for="example-text-input">Guardian
                                                            Name</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="guardname" placeholder="Guardian Name" value="<?php echo $row['guardname']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">Relationship</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="grelation" placeholder="Relationship" value="<?php echo $row['grelation']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Address</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="gaddress" placeholder="Unit number, house number, street name, barangay, city, province" value="<?php echo $row['gaddress']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">Tel No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="gtel_no" placeholder="Telephone Number" value="<?php echo $row['gtel_no']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">Cellphone
                                                            No.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="gcontact" placeholder="Cellphone Number" value="<?php echo $row['gcontact']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" for="example-text-input">Email
                                                            Address</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="gemail" placeholder="Email Address" value="<?php echo $row['gemail']; ?>">
                                                    </div>
                                                </div>

                                                <hr style="border: 2px solid black;">
                                                <h4 class="text-lg-center mb-3">Siblings (Eldest to Youngest)</h4>
                                                <hr style="border: 2px solid black;">

                                                <div class="form-group row mb-3">
                                                    <div class="col-md-3 mb-3">
                                                        <label for="example-text-input">Name:</label>
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib1_name']; ?>" name="sib1_name">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib2_name']; ?>" name="sib2_name">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib3_name']; ?>" name="sib3_name">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib4_name']; ?>" name="sib4_name">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib5_name']; ?>" name="sib5_name">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib6_name']; ?>" name="sib6_name">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Name" value="<?php echo $row['sib7_name']; ?>" name="sib7_name">
                                                    </div>

                                                    <div class="col-md-1 mb-3">
                                                        <label for="example-text-input">Age:</label>
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib1_age']; ?>" name="sib1_age">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib2_age']; ?>" name="sib2_age">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib3_age']; ?>" name="sib3_age">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib4_age']; ?>" name="sib4_age">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib5_age']; ?>" name="sib5_age">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib6_age']; ?>" name="sib6_age">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Age" value="<?php echo $row['sib7_age']; ?>" name="sib7_age">
                                                    </div>

                                                    <div class="col-md-2 mb-3">
                                                        <label for="example-text-input">Civil Status:</label>
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib1_civ']; ?>" name="sib1_civ">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib2_civ']; ?>" name="sib2_civ">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib3_civ']; ?>" name="sib3_civ">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib4_civ']; ?>" name="sib4_civ">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib5_civ']; ?>" name="sib5_civ">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib6_civ']; ?>" name="sib6_civ">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Civil Status" value="<?php echo $row['sib7_civ']; ?>" name="sib7_civ">
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <label for="example-text-input">School:</label>
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib1_sch']; ?>" name="sib1_sch">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib2_sch']; ?>" name="sib2_sch">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib3_sch']; ?>" name="sib3_sch">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib4_sch']; ?>" name="sib4_sch">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib5_sch']; ?>" name="sib5_sch">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib6_sch']; ?>" name="sib6_sch">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="School" value="<?php echo $row['sib7_sch']; ?>" name="sib7_sch">
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <label for="example-text-input">Educ. Background:</label>
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib1_educbg']; ?>" name="sib1_educbg">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib2_educbg']; ?>" name="sib2_educbg">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib3_educbg']; ?>" name="sib3_educbg">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib4_educbg']; ?>" name="sib4_educbg">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib5_educbg']; ?>" name="sib5_educbg">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib6_educbg']; ?>" name="sib6_educbg">
                                                        <input type="text" class="form-control mb-3" id="example-text-input" placeholder="Educational Background" value="<?php echo $row['sib7_civ']; ?>" name="sib7_civ">
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

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Honors &
                                                            Awards</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="honor" placeholder="School Last Attended" value="<?php echo $row['honor']; ?>">
                                                    </div>
                                                </div>

                                                <hr style="border: 2px solid black;">
                                                <h4 class="text-lg-center mb-3">Special Talents/Skills <small>(please
                                                        check)</small></h4>
                                                <hr style="border: 2px solid black;">

                                                <div class="form-group row mb-2 justify-content-center mr-auto ml-auto">

                                                    <?php
                                                    if (!empty($row['talent'])) {
                                                        $get_talent = $row['talent'];
                                                        $res_talent = explode(",", $get_talent);
                                                    }  ?>

                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox1" value="Dancing" name="talent[]" <?php if (!empty($res_talent)) {
                                                                                                                                                                                                    if (in_array("Dancing", $res_talent)) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    }
                                                                                                                                                                                                } ?>>
                                                        <label for="customCheckbox1" class="custom-control-label font-weight-bold">
                                                            Dancing</label>
                                                    </div>


                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox2" value="Singing" name="talent[]" <?php if (!empty($res_talent)) {
                                                                                                                                                                                                    if (in_array("Singing", $res_talent)) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    }
                                                                                                                                                                                                } ?>>
                                                        <label for="customCheckbox2" class="custom-control-label font-weight-bold">
                                                            Singing</label>
                                                    </div>


                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox3" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Basketball", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Basketball">
                                                        <label for="customCheckbox3" class="custom-control-label font-weight-bold">
                                                            Basketball</label>
                                                    </div>

                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox4" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Volleyball", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Volleyball">
                                                        <label for="customCheckbox4" class="custom-control-label font-weight-bold">
                                                            Volleyball</label>
                                                    </div>



                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox5" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Chess", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Chess">
                                                        <label for="customCheckbox5" class="custom-control-label font-weight-bold">
                                                            Chess</label>
                                                    </div>



                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox6" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Tennis", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Tennis">
                                                        <label for="customCheckbox6" class="custom-control-label font-weight-bold">
                                                            Table Tennis</label>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-1 justify-content-center mr-auto ml-auto">

                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox7" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Drawing", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Drawing">
                                                        <label for="customCheckbox7" class="custom-control-label font-weight-bold">
                                                            Drawing</label>
                                                    </div>



                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox8" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Painting", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Painting">
                                                        <label for="customCheckbox8" class="custom-control-label font-weight-bold">
                                                            Painting</label>
                                                    </div>


                                                    <div class="custom-control col-md-6 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox9" <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Music", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?> name="talent[]" value="Music">
                                                        <label for="customCheckbox9" class="custom-control-label font-weight-bold">
                                                            Playing Musical Instrument</label>
                                                        <label class="mb-0 font-weight-bold">,
                                                            Specify:</label>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="text" class="form-control form-control-border focs" value="<?php echo $row['spec']; ?>" name="spec">
                                                        </div>

                                                    </div>
                                                    <div class="custom-control col-md-2 custom-checkbox">
                                                    </div>


                                                </div>

                                                <div class="form-group justify-content-center row mb-1 mr-auto ml-auto">
                                                    <div class="custom-control col-md-5 custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-purple" type="checkbox" id="customCheckbox10" value="other" name="talent[]" <?php if (!empty($res_talent)) {
                                                                                                                                                                                                if (in_array("other", $res_talent)) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }
                                                                                                                                                                                            } ?>>
                                                        <label for="customCheckbox10" class=" custom-control-label font-weight-bold">
                                                            Other</label>

                                                        <label class="font-weight-bold mb-0">, Please
                                                            Specify:</label>

                                                        <input type="text" class="form-control form-control-border focs" value="<?php echo $row['other']; ?>" name="other">

                                                    </div>

                                                    <div class="custom-control col-md-7 custom-checkbox">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Academic</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="acad_c" placeholder="Academic Competitions Joined" value="<?php echo $row['acad_c']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Sports</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="sport_c" placeholder="Sports Competitions Joined" value="<?php echo $row['sport_c']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">School
                                                            Org.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="sch_m" placeholder="Membership in School Organization" value="<?php echo $row['sch_m']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label" for="example-text-input">Community/Religous Org.</label>
                                                        <input type="text" class="form-control" id="example-text-input" name="comrel_m" placeholder="Membership in Community / Religious Organization" value="<?php echo $row['comrel_m']; ?>">
                                                    </div>
                                                </div>

                                            <?php } ?>
                                            <div class="form-group float-end">
                                                <button class="btn btn-danger" type="submit" name="submit">Update
                                                    Personal Info.</button>
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