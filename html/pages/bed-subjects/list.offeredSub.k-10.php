<!doctype html>
<html lang="en" dir="ltr">
<title>Enrollment Information | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
    $stud_id = $_GET['stud_id'];
    $_SESSION['studtID'] = $stud_id;

    $get_active_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
    while ($row = mysqli_fetch_array($get_active_sem)) {
        $sem = $row['semester_id'];
    }

    $get_active_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
    while ($row = mysqli_fetch_array($get_active_acad)) {
        $acad = $row['ay_id'];
    }

    $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
        WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or die(mysqli_error($conn));
    $result = mysqli_num_rows($get_level_id);

    if ($result > 0) {
    } else {

        $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
        WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
        $result2 = mysqli_num_rows($get_level_id);

        if ($result2 > 0) {
            header('location: ../bed-404/page404.php');
        } else {
            header('location: ../bed-404/page404.php');
        }
    }
}



$get_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_fname, ' ', LEFT(stud.student_mname,1), '. ', stud.student_lname) AS fullname 
FROM tbl_schoolyears AS sy
LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
LEFT JOIN tbl_genders AS gen ON gen.gender_id = stud.gender_id
LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sy.grade_level_id
LEFT JOIN tbl_strands AS std ON std.strand_id = sy.strand_id 
LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
WHERE sy.student_id = '$stud_id' AND ay.academic_year = '$act_acad' AND sy.semester_id = '0'") or die(mysqli_error($conn));
if ($_SESSION['role'] == "Student") {
    $result = mysqli_num_rows($get_stud);
    if ($result == 0) {
        header('location: ../bed-students/add.enroll.php');
    }
}
while ($row = mysqli_fetch_array($get_stud)) {
    $rem = $row['remark'];
}
if ($_SESSION['role'] == "Student") {
    if ($rem == "Canceled" || $rem == "Pending") {
    } else {
        header('location: list.enrolledSub.k-10.php');
    }
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
                        <div class="card-body">
                            <h4 class="header-title mb-3">Select Your Subjects</h4>
                            <?php if ($_SESSION['role'] == "Student") { ?>
                                <form action="userData/user.add.offeredSub.k-10.php" method="POST">
                                <?php } elseif ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") { ?>

                                    <form action="userData/user.add.offeredSub.k-10.php?stud_id=<?php echo $stud_id; ?>" method="POST">
                                    <?php } ?>

                                    <hr class="bg-black mb-2">

                                    <div class="table-responsive">
                                        <table id="user-list-table" class="table table-hover responsive nowrap" role="grid" data-toggle="data-table" style="width: 100%">
                                            <thead class="text-capitalize">
                                                <tr class="light">
                                                    <th><input type="checkbox" name="" id="select-all-cb"></th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Grade Level</th>
                                                    <th>Days</th>
                                                    <th>Time</th>
                                                    <th>Room</th>
                                                    <th>Professor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $get_grade_lvl = mysqli_query($conn, "SELECT * FROM tbl_schoolyears AS sy
                                                    LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
                                                    WHERE student_id = '$stud_id' AND semester_id = '0' AND ay.academic_year = '$act_acad'") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($get_grade_lvl)) {
                                                    $glvlID = $row['grade_level_id'];
                                                }


                                                $get_offerSub = mysqli_query($conn, "SELECT *, CONCAT(teach.teacher_fname, ' ', LEFT(teach.teacher_mname,1), '. ', teach.teacher_lname) AS fullname FROM tbl_schedules AS sched
                                                LEFT JOIN tbl_subjects AS sub ON sub.subject_id = sched.subject_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id = sub.grade_level_id
                                                LEFT JOIN tbl_teachers AS teach ON teach.teacher_id = sched.teacher_id
                                                WHERE sched.schedule_id NOT IN (SELECT sched.schedule_id FROM tbl_enrolled_subjects AS ensub
                                                    INNER JOIN tbl_schedules AS sched ON sched.schedule_id = ensub.schedule_id
                                                    WHERE student_id = '$stud_id') AND (semester = '0' AND sched.grade_level_id = '$glvlID' AND acadyear = '$act_acad') ORDER BY sub.grade_level_id ASC, schedule_id DESC") or die(mysqli_error($conn));


                                                $index = 0;
                                                while ($row = mysqli_fetch_array($get_offerSub)) {

                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="studID[]" value="<?php echo $stud_id ?>" hidden>
                                                            <input type="text" name="sched_id[]" value="<?php echo $row['schedule_id']; ?>" hidden>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input custom-control-input-navy select-cb" type="checkbox" id="option-a<?php echo $row['schedule_id'] ?>" name="checked[]" value="<?php echo $index++; ?>">
                                                                <label for="option-a<?php echo $row['schedule_id'] ?>" class="custom-control-label"></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row['subject_code']; ?></td>
                                                        <td><?php echo $row['subject_description']; ?></td>
                                                        <td><?php echo $row['grade_level']; ?></td>
                                                        <td><?php echo $row['day']; ?></td>
                                                        <td><?php echo $row['time']; ?></td>
                                                        <td><?php echo $row['room']; ?></td>
                                                        <?php if (empty($row['fullname'])) { ?>
                                                            <td>TBA</td>
                                                        <?php } else { ?>
                                                            <td><?php echo $row['fullname']; ?></td>
                                                        <?php } ?>

                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="justify-content-end m-2">
                                        <button name="submit" type="submit" class="btn btn-danger p-2 m-1 float-end"><i class="fa fa-plus">
                                            </i>
                                            Add Subjects</a>
                                        </button>

                                        <?php if ($_SESSION['role'] == "Student") { ?>
                                            <div class="ml-2">
                                                <a href="list.enrolledSub.k-10.php" class="btn btn-secondary p-2"><i class="fa fa-arrow-circle-left">
                                                    </i>
                                                    Back</a>
                                            </div>
                                        <?php } elseif ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser") {
                                        ?>
                                            <div class="ml-2">
                                                <a href="list.enrolledSub.k-10.php?stud_id=<?php echo $stud_id; ?>" class="btn btn-secondary p-2"><i class="fa fa-arrow-circle-left">
                                                    </i>
                                                    Back</a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    </form>
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
    <script>
        $("#alertDel").delay(2000).fadeOut();
    </script>

</body>

</html>