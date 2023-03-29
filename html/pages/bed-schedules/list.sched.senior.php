<!doctype html>
<html lang="en" dir="ltr">
<title>Schedule List | SFAC Las Pinas</title>
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
                            <h4 class="header-title mb-3">Class Schedule for Senior High School
                                <?php if (isset($_GET['stem'])) {
                                    echo '(STEM)';
                                } elseif (isset($_GET['abm'])) {
                                    echo ' (ABM)';
                                } elseif (isset($_GET['ict'])) {
                                    echo ' (TVL-ICT)';
                                } elseif (isset($_GET['humss'])) {
                                    echo ' (HUMSS)';
                                } elseif (isset($_GET['tvl'])) {
                                    echo ' (TVL-HE)';
                                } else {
                                    echo '';
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

                            <form method="GET">
                                <div class="row ">
                                    <div class="d-grid gap-3 d-flex justify-content-center">
                                        <button class="btn btn-outline-dark mb-3" value="STEM" name="stem">
                                            <i class="fa fa-users"></i> STEM
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="ABM" name="abm">
                                            <i class="fa fa-users"></i> ABM
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="TVL - ICT" name="ict">
                                            <i class="fa fa-users"></i> TVL - ICT
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="HUMSS" name="humss">
                                            <i class="fa fa-users"></i> HUMSS
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="TVL - HE" name="tvl">
                                            <i class="fa fa-users"></i> TVL- HE
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <hr class="bg-black mb-2">
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid" data-toggle="data-table" style="width: 100%">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Room</th>
                                            <th>Professor</th>
                                            <th>Pre-Requisites</th>
                                            <th>Grade Level</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($str_name)) {

                                            $get_sched = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teacher_lname) AS fullname FROM tbl_schedules AS sched
                                                    LEFT JOIN tbl_subjects_senior AS subsen ON subsen.subject_id = sched.subject_id
                                                    LEFT JOIN tbl_strands AS strd ON strd.strand_id = subsen.strand_id
                                                    LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = subsen.grade_level_id
                                                    LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                WHERE strd.strand_name IN ('$str_name') AND sched.semester IN ('$act_sem') AND sched.acadyear = '$act_acad' ORDER BY gl.grade_level ASC, sched.subject_id") or die(mysqli_error($conn));

                                        ?>

                                            <tr>
                                                <?php while ($row = mysqli_fetch_array($get_sched)) {
                                                    $sen_id = $row['subject_id'];
                                                    $sched_id = $row['schedule_id'];

                                                ?>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_description']; ?></td>
                                                    <td><?php echo $row['total_units']; ?></td>
                                                    <td><?php echo $row['day']; ?></td>
                                                    <td><?php echo $row['time']; ?></td>
                                                    <td><?php echo $row['room']; ?></td>
                                                    <td><?php if (!empty($row['fullname'])) {
                                                            echo $row['fullname'];
                                                        } else {
                                                            echo 'TBA';
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $row['pre_requisites']; ?></td>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['semester']; ?></td>
                                                    <td><a href="edit.sched.senior.php<?php echo '?subject_id=' . $sen_id . '&schedule_id=' . $sched_id; ?>" type="button" class="btn btn-info mx-1"><i class="fa fa-edit"></i>
                                                            Update
                                                        </a>
                                                        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['schedule_id'] ?>"><i class="fa fa-trash"></i> Delete</button>
                                                    </td>
                                            </tr>
                                            <!-- Delete modal start -->
                                            <div class="modal fade" id="delete<?php echo $row['schedule_id'] ?>">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete</h5>
                                                        </div>
                                                        <div class="modal-body text-center my-5">
                                                            <p>Are you sure you want to delete,
                                                                <i class="font-weight-bold"><?php echo $row['subject_code'] ?>
                                                                    | </i>
                                                                <i class="font-weight-bold"><?php echo $row['subject_description'] ?></i>
                                                                ?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="userData/user.del.sched.senior.php<?php echo '?schedule_id=' . $sched_id . '&str_n=' . $str_name; ?>" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
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