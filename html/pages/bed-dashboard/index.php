<!doctype html>
<html lang="en" dir="ltr">

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
        <div class="container-fluid content-inner mt-n5 py-0">
            <!-- <?php if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Admission" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Principal") {
                        include 'db.general.php';
                    } else if ($_SESSION['role'] == "Student") {

                        $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                    WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or die(mysqli_error($conn));
                        $result = mysqli_num_rows($get_level_id);

                        if ($result > 0) {
                            while ($row = mysqli_fetch_array($get_level_id)) {
                                $grade_level = $row['grade_level_id'];
                            }
                        } else {

                            $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                    WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
                            $result2 = mysqli_num_rows($get_level_id);

                            if ($result2 > 0) {
                                while ($row = mysqli_fetch_array($get_level_id)) {
                                    $grade_level = $row['grade_level_id'];
                                }
                            }
                        }

                        if (!empty($grade_level)) {
                            if ($grade_level > 13) {
                                include 'dblp.student.senior.php';
                            } else if ($grade_level < 14) {
                                include 'dblp.student.php';
                            }
                        } else {
                            include 'dblp.student.senior.php';
                        }
                    } else {
                        header('location: ../bed-500/page500.php');
                    }
                    ?> -->
        </div>

        <!-- Footer Section Start -->

        <?php include '../../includes/bed-footer.php' ?>

        <!-- Footer Section End -->
    </main>

    <?php include '../../includes/bed-script.php' ?>

</body>

</html>