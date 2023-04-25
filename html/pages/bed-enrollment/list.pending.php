<!doctype html>
<html lang="en" dir="ltr">
<title>Pending Student List | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php';

if ($_SESSION['role'] == 'Adviser') {
    $ad_info = mysqli_query($conn, "SELECT * FROM tbl_adviser WHERE ad_id = '$ad_id'");
    $row5 = mysqli_fetch_array($ad_info);
    $dept = $row5['ad_dept'];
} else {
    $dept = "all";
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
            <!-- Nav Header Component End f-->
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
        } elseif (!empty($_SESSION['success-update'])) {
            echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Remark Successfully Updated.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div> ';
            unset($_SESSION['success-update']);
        } ?>
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="header-title pb-3">Pending Student List</h4>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-5 mb-3 mt-4">
                                <form method="GET">
                                    <div class="input-group">
                                        <input type="search" class="form-control"
                                            placeholder="Search for (Student no. or Name)" name="search">
                                        <div class="input-group-append">
                                            <button type="submit" name="look" class="btn bg-navy" data-toggle="tooltip"
                                                data-placement="bottom" title="Search">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="bg-black pb-1">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid"
                                    data-toggle="data-table" style="width: 100%">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Image</th>
                                            <th>Student ID:</th>
                                            <th>Fullname:</th>
                                            <th>Grade level:</th>
                                            <th>Type:</th>
                                            <th>Balik Franciscano:</th>
                                            <th>Date enrolled:</th>
                                            <th>Remark:</th>
                                            <th style="min-width: 100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (isset($_GET['look'])) {

                                            $_GET['search'] = addslashes($_GET['search']);
                                            $_SESSION['search'] = $_GET['search'];
                                            if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Adviser") {
                                                $in = "('Checked', 'Pending', 'Canceled', 'Disapproved')";
                                            } else if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") {
                                                $in = "('Checked', 'Approved', 'Disapproved')";
                                            }
                                            if ($dept == "Pre-Kinder to Grade 6") {
                                                $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) 
                                                LEFT JOIN tbl_grade_levels USING(grade_level_id) 
                                                WHERE grade_level_id IN ('1', '2', '3', '4', '5', '6', '7', '8', '9') AND remark IN $in AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0')
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                ORDER BY remark DESC, sy_id DESC");
                                            } elseif ($dept == "Grade 7 to Grade 10") {
                                                $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) 
                                                LEFT JOIN tbl_grade_levels USING(grade_level_id) 
                                                WHERE grade_level_id IN ('10', '11', '12', '13') AND remark IN $in AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0') 
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                ORDER BY remark DESC, sy_id DESC");
                                            } elseif ($dept == "Grade 11") {
                                                $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) 
                                                LEFT JOIN tbl_grade_levels USING(grade_level_id) 
                                                WHERE grade_level_id IN ('14') AND remark IN $in AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0') 
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                ORDER BY remark DESC, sy_id DESC");
                                            } elseif ($dept == "Grade 12") {
                                                $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) 
                                                LEFT JOIN tbl_grade_levels USING(grade_level_id) 
                                                WHERE grade_level_id IN ('15') AND remark IN $in AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0') 
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                ORDER BY remark DESC, sy_id DESC");
                                            } elseif ($dept == "all") {
                                                $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) 
                                                LEFT JOIN tbl_grade_levels USING(grade_level_id) 
                                                WHERE remark IN $in AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0') 
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                ORDER BY remark DESC, sy_id DESC");
                                            }



                                            while ($row = mysqli_fetch_array($get_stud)) {
                                                $id = $row['sy_id'];
                                                $stud_id = $row['student_id'];
                                                $glvl_id = $row['grade_level_id'];
                                        ?>
                                        <tr>
                                            <td><?php if (!empty(base64_encode($row['img']))) {
                                                            echo '
                                                <img src="data:image/jpeg;base64,'  . base64_encode($row['img']) . '"
                                                class="img zoom " alt="User image"
                                                style="height: 80px; width: 100px">';
                                                        } else {
                                                            echo ' <img src="../../assets/images/icons/user.png" class="img zoom"
                                                    alt="User image" style="height: 80px; width: 100px">';
                                                        } ?>

                                            </td>
                                            <td><?php echo $row['stud_no'] ?></td>
                                            <td><?php echo $row['fullname'] ?></td>
                                            <td><?php echo $row['grade_level'] ?></td>
                                            <td><?php echo $row['stud_type'] ?></td>
                                            <td><?php echo $row['bf'] ?></td>
                                            <td><?php echo $row['date_enrolled'] ?></td>
                                            <td>
                                                <span
                                                    class="badge bg-<?php if ($row['remark'] == "Checked" || $row['remark'] == "Approved") {
                                                                                    echo 'success';
                                                                                } elseif ($row['remark'] == "Pending") {
                                                                                    echo 'warning';
                                                                                } elseif ($row['remark'] == "Disapproved" || $row['remark'] == "Canceled") {
                                                                                    echo 'danger';
                                                                                } else {
                                                                                    echo 'danger';
                                                                                } ?>"><?php echo $row['remark'] ?></span>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary mb-2" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseExample<?php echo $row['student_id'] ?>"
                                                    aria-expanded="false"
                                                    aria-controls="collapseExample<?php echo $row['student_id'] ?>"
                                                    type="button">
                                                    Actions
                                                </button>
                                                <div class="collapse"
                                                    id="collapseExample<?php echo $row['student_id'] ?>">

                                                    <div class="row">

                                                        <div class="col-sm mt-2 mb-2">
                                                            <form action="userData/user.list.pending.php" method="POST">
                                                                <a class="btn btn-icon btn-3 btn-warning"
                                                                    href="userData/user.list.pending.php?id=<?php echo $id; ?>&remark=<?php echo $row['remark']; ?>"
                                                                    name="btnRemark"><i class="fa fa-exchange"></i>
                                                                    <?php
                                                                            if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Adviser") {
                                                                                if ($row['remark'] == 'Pending' || $row['remark'] == 'Canceled') {
                                                                                    echo 'Check';
                                                                                } elseif ($row['remark'] == 'Checked' || $row['remark'] == 'Disapproved') {
                                                                                    echo 'Cancel';
                                                                                }
                                                                            } else if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") {
                                                                                if ($row['remark'] == 'Checked' || $row['remark'] == 'Disapproved') {
                                                                                    echo 'Approve';
                                                                                } elseif ($row['remark'] == 'Approved') {
                                                                                    echo 'Disapprove';
                                                                                }
                                                                            }
                                                                            ?>
                                                                </a>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm mt-2 mb-2">
                                                            <a href="../bed-students/edit.enrolledStud.php?<?php echo 'stud_id=' . $stud_id; ?>"
                                                                type="button" class="btn btn-icon btn-3 btn-primary"><i
                                                                    class="fa fa-edit"></i>
                                                                Update
                                                            </a>
                                                        </div>
                                                        <div class="col-sm mt-2 mb-2">
                                                            <?php if (!empty($glvl_id)) { ?>
                                                            <a href="../bed-subjects/list.enrolledSub.senior.php?<?php echo 'stud_id=' . $stud_id . '&glvl_id=' . $glvl_id; ?>"
                                                                type="button" class="btn btn-icon btn-3 btn-primary"><i
                                                                    class="fa fa-book"></i>
                                                                Subjects
                                                            </a>
                                                            <?php } else { ?>
                                                            <a href="../bed-subjects/list.enrolledSub.senior.php?<?php echo 'stud_id=' . $stud_id; ?>"
                                                                type="button" class="btn btn-icon btn-3 btn-primary"><i
                                                                    class="fa fa-book"></i>
                                                                Subjects
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-sm mt-2 mb-2">
                                                            <a href="../bed-forms/pre-en-data.php?<?php echo 'stud_id=' . $stud_id; ?>"
                                                                type="button"
                                                                class="btn btn-icon btn-3 btn-secondary"><i
                                                                    class="fa fa-eye"></i>
                                                                Pre-Enroll
                                                            </a>
                                                        </div>
                                                        <div class="col-sm mt-2 mb-2">
                                                            <a href="../bed-forms/accounting-laspi-shs.php?<?php echo 'stud_id=' . $stud_id; ?>"
                                                                type="button"
                                                                class="btn btn-icon btn-3 btn-secondary"><i
                                                                    class="fa fa-eye"></i>
                                                                Main Reg Form
                                                            </a>
                                                        </div>
                                                        <div class="col-sm mt-2 mb-2">
                                                            <?php if (!empty($glvl_id)) { ?>
                                                            <a href="../bed-forms/accounting.php?<?php echo 'stud_id=' . $stud_id . '&glvl_id=' . $glvl_id; ?>"
                                                                type="button"
                                                                class="btn btn-icon btn-3 btn-secondary"><i
                                                                    class="fa fa-eye"></i>
                                                                Accounting/Reg Form
                                                            </a>
                                                            <?php } else { ?>
                                                            <a href="../bed-forms/accounting.php?<?php echo 'stud_id=' . $stud_id; ?>"
                                                                type="button"
                                                                class="btn btn-icon btn-3 btn-secondary"><i
                                                                    class="fa fa-eye"></i>
                                                                Accounting/Reg Form
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                        <!-- <div class="col-sm mt-2 mb-2">
                                                            <?php if (!empty($glvl_id)) { ?>
                                                            <a href="../bed-forms/all_formsSH.php?<?php echo 'stud_id=' . $stud_id . '&glvl_id=' . $glvl_id; ?>"
                                                                type="button" class="btn btn-icon btn-3 btn-info"><i
                                                                    class="fa fa-eye"></i>
                                                                Reg Form
                                                            </a>

                                                            <?php } else { ?>
                                                            <a href="../bed-forms/all_formsSH.php?<?php echo 'stud_id=' . $stud_id; ?>"
                                                                type="button" class="btn btn-icon btn-3 btn-info"><i
                                                                    class="fa fa-eye"></i>
                                                                Reg Form
                                                            </a>
                                                            <?php } ?>
                                                        </div> -->
                                                        <div class="col-sm mt-2 mb-2">
                                                            <!-- Button trigger modal -->
                                                            <hr class="dropdown-divider">
                                                            <a type="button" class="btn btn-icon btn-3 btn-danger"
                                                                data-bs-toggle="modal"
                                                                href="#delete<?php echo $row['student_id'] ?>"><i
                                                                    class="fa fa-trash"></i>
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                            </div>
                            </td>
                            </tr>
                            <!-- Delete modal start -->
                            <div class="modal fade" id="delete<?php echo $row['student_id'] ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center my-5">
                                            <p>Are you sure you want to delete,
                                                <br><strong><i
                                                        class="font-weight-bold"><?php echo $row['fullname'] ?></i></strong>
                                                ?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="userData/user.del.student.php?student_id=<?php echo $row['student_id'] ?>"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete modal end -->
                            <?php }
                                        } ?>
                            </tbody>
                            </table>

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