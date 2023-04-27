<!doctype html>
<html lang="en" dir="ltr">
<title>Subject List | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

if (!empty($_GET['eay'])) {
    $efacadyear = $_GET['eay'];
}


if (isset($_GET['strand'])) {
    $strandInfo = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id = '$_GET[strand]'");
    $row = mysqli_fetch_array($strandInfo);
    $strand = $row['strand_name'];
    $strand_id = $_GET['strand'];
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
        } elseif (!empty($_SESSION['success-del'])) {
            echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Deleted.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
            unset($_SESSION['success-del']);
        }
        ?>
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-3">Offer/Open Subjects | SFAC Las Piñas
                                <?php if (isset($_GET['strand'])) {
                                    echo $row['strand_name'];
                                } ?>
                            </h4>

                            <form action="list.offerSub.senior.php" method="GET">
                                <div class="row">
                                    <div class="d-grid gap-3 d-flex justify-content-center">
                                        <?php
                                        $totalStrand = mysqli_query($conn, "SELECT * FROM tbl_strands");
                                        while ($rowInfo = mysqli_fetch_array($totalStrand)) {

                                            echo '
                                            <button class="btn btn-dark mb-6 ml-1" value="' . $rowInfo['strand_id'] . '" name="strand">
                                            <i class="fa fa-users"></i> ' . $rowInfo['strand_name'] . '
                                        </button>
                                            ';
                                        }


                                        ?>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-4 mb-2 mt-2">

                                        <select class="form-select" data-dropdown-css-class="select2-navy"
                                            data-bs-placeholder="Select Effective Academic Year" name="eay">
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
                        </div>
                        <hr class="bg-black mb-2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid"
                                    data-toggle="data-table" style="width: 100%">
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
                                        WHERE tbl_strands.strand_id IN ('$strand_id') AND tbl_efacadyears.efacadyear IN ('$efacadyear') AND tbl_semesters.semester IN ('$act_sem') ORDER BY grade_level ASC, subject_id") or die(mysqli_error($conn));

                                        ?>

                                        <tr>
                                            <?php while ($row = mysqli_fetch_array($get_subjects)) {
                                                    $id = $row['subject_id']; ?>
                                            <td><?php echo $row['subject_code']; ?></td>
                                            <td><?php echo $row['subject_description']; ?></td>
                                            <td><?php echo $row['total_units']; ?></td>
                                            <td><?php echo $row['pre_requisites']; ?></td>
                                            <td><?php echo $row['grade_level']; ?></td>
                                            <td><?php echo $row['semester']; ?></td>
                                            <td><a href="../bed-schedules/add.sched.senior.php<?php echo '?sen_id=' . $id; ?>"
                                                    type="button" class="btn btn-success mx-1"><i
                                                        class="fa fa-plus-square"></i>
                                                    Set Schedule
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="row" style="margin-left: 3px;">
                                    <?php if (!empty($efacadyear)) {
                                        if (isset($_GET['strand'])) {
                                            echo '
                                        <hr class="bg-navy">
                                        <div class="col-md-3
                                        ">
                                            <a href="../bed-schedules/add.petitioned.senior.php?strand=' . $strand_id . '&eay=' . $efacadyear . '" type="button"
                                                class="btn btn-dark mb-3"><i
                                                    class="fa fa-pencil mr-1"> </i>
                                                Open Petitioned</a>
                                        </div>';
                                        }
                                    } ?>
                                </div>
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