<!doctype html>
<html lang="en" dir="ltr">
<title>Subject List | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

if (!empty($_GET['eay'])) {
    $efacadyear = $_GET['eay'];
}

if (isset($_GET['stem'])) {
    $str_name = $_GET['stem'];
} elseif (isset($_GET['abm'])) {
    $str_name = $_GET['abm'];
} elseif (isset($_GET['ict'])) {
    $str_name = $_GET['ict'];
} elseif (isset($_GET['humss'])) {
    $str_name = $_GET['humss'];
} elseif (isset($_GET['tvl'])) {
    $str_name = $_GET['tvl'];
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
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-3">Senior High Subjects List
                                <?php if (isset($_GET['stem'])) {
                                    echo ' (STEM)';
                                } elseif (isset($_GET['abm'])) {
                                    echo ' (ABM)';
                                } elseif (isset($_GET['ict'])) {
                                    echo ' (TVL-ICT)';
                                } elseif (isset($_GET['humss'])) {
                                    echo ' (HUMSS)';
                                } elseif (isset($_GET['tvl'])) {
                                    echo ' (TVL-HE)';
                                } else {
                                    echo ' (STEM)';
                                } ?>
                            </h4>

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
                            } elseif (!empty($_SESSION['success-del'])) {
                                echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Deleted.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                            </div> ';
                                unset($_SESSION['success-del']);
                            }
                            ?>

                            <form action="list.sub.senior.php" method="GET">
                                <div class="row ">
                                    <div class="d-grid gap-3 d-flex justify-content-center">
                                        <button class="btn btn-dark mb-6 ml-1" value="STEM" name="stem">
                                            <i class="fa fa-users"></i> STEM
                                        </button>

                                        <button class="btn btn-dark mb-6 ml-1" value="ABM" name="abm">
                                            <i class="fa fa-users"></i> ABM
                                        </button>

                                        <button class="btn btn-dark mb-6 ml-1" value="TVL - ICT" name="ict">
                                            <i class="fa fa-users"></i> TVL - ICT
                                        </button>

                                        <button class="btn btn-dark mb-6 ml-1" value="HUMSS" name="humss">
                                            <i class="fa fa-users"></i> HUMSS
                                        </button>

                                        <button class="btn btn-dark mb-6 ml-1" value="TVL - HE" name="tvl">
                                            <i class="fa fa-users"></i> TVL - HE
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4 mb-2 mt-2">

                                <select class="form-select" data-dropdown-css-class="select2-navy" data-bs-placeholder="Select Effective Academic Year" name="eay">
                                    <option value="" disabled>Select Effective Academic
                                        Year
                                    </option>
                                    <?php
                                    if (!empty($efacadyear)) {
                                        $get_eay = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear = '$efacadyear'");
                                        while ($row = mysqli_fetch_array($get_eay)) {
                                    ?>
                                            <option selected value="<?php echo $row['efacadyear'] ?>">
                                                Effective
                                                Academic Year <?php echo $row['efacadyear'];
                                                            } ?></option>
                                            <?php $get_eay2 = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear NOT IN ('$efacadyear')");
                                            while ($row2 = mysqli_fetch_array($get_eay2)) {
                                            ?>
                                                <option value="<?php echo $row2['efacadyear'] ?>">
                                                    Effective
                                                    Academic Year <?php echo $row2['efacadyear'];
                                                                } ?></option>
                                                <?php } else {
                                                $get_eay = mysqli_query($conn, "SELECT * FROM tbl_efacadyears ORDER BY efacadyear_id DESC");
                                                while ($row = mysqli_fetch_array($get_eay)) {
                                                ?>
                                                    <option value="<?php echo $row['efacadyear'] ?>">
                                                        Effective
                                                        Academic Year <?php echo $row['efacadyear'];
                                                                    } ?></option>
                                                <?php  } ?>

                                </select>

                            </div>
                        </div>
                        </form>
                        <hr class="bg-black mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid" data-toggle="data-table" style="width: 100%">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>Pre-Requisites</th>
                                            <th>Grade Level</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($efacadyear)) {

                                            $get_subjects = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior
                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                                    LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                                    LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                                    WHERE tbl_strands.strand_name IN ('$str_name') AND tbl_efacadyears.efacadyear IN ('$efacadyear') ORDER BY tbl_subjects_senior.semester_id ASC, subject_id") or die(mysqli_error($conn));

                                        ?>
                                            <tr>
                                                <?php while ($row = mysqli_fetch_array($get_subjects)) {
                                                    $id = $row['subject_id'];
                                                ?>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['total_units']; ?></td>
                                                    <td><?php echo $row['pre_requisites']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['semester']; ?></td>
                                                    <td><a href="edit.sub.senior.php<?php echo '?sen_id=' . $id; ?>" type="button" class="btn btn-info mx-1"><i class="fa fa-edit"></i>
                                                            Update
                                                        </a>
                                                        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['subject_id'] ?>"><i class="fa fa-trash"></i> Delete</button>
                                                    </td>
                                            </tr>
                                            <!-- Delete modal start -->
                                            <div class="modal fade" id="delete<?php echo $row['subject_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-center my-5">
                                                            <p>Are you sure you want to delete,
                                                                <br><strong><i class="font-weight-bold"><?php echo $row['subject_code'] ?>
                                                                        | </i>
                                                                    <i class="font-weight-bold"><?php echo $row['subject_description'] ?></i></strong>
                                                                ?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="userData/user.del.sub.senior.php?sen_id=<?php echo $row['subject_id'] ?>" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete modal end -->
                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
        </div>

        </div>

        <!-- Footer Section Start -->

        <?php include '../../includes/bed-footer.php' ?>

        <!-- Footer Section End -->
    </main>

    <?php include '../../includes/bed-script.php' ?>

</body>

</html>