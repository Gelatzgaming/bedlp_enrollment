<!doctype html>
<html lang="en" dir="ltr">
<title>Dashboard | SFAC Las Pinas</title>
<?php
$links = array('<link rel="stylesheet" href="../../assets/css/responsive.dataTables.min.css">');
include '../../includes/bed-header.php';

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
                        <div class="card-body">
                            <h4 class="header-title">List of Enrolled ABM12 Students</h4>
                            <div class="row justify-content-center">
                                <div class="col-md-3 mt-3">
                                    <div class="card">
                                        <div class="small-box bg-dark" style="border-radius: 20px;">
                                            <div class="p-3 d-flex justify-content-center">

                                                <div class="info-box-content">
                                                    <center><b><span class="info-box-text" style="color: white;"><i class="fa fa-users" style="font-size: 30px;"></i><br> New
                                                                Students</span></b>
                                                        <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears AS sy
                                                            LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                                                            LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
                                                            WHERE ay.academic_year = '$act_acad' AND sem.semester = '$act_sem' AND remark = 'Approved' AND strand_id = '1' AND grade_level_id = '14' AND stud_type = 'New'") or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($stud_count)) { ?>
                                                            <span class="info-box-number" style="color: white;">:
                                                                <?php echo $row['total_stud']; ?></span>
                                                    </center>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3 mt-3">
                                    <div class="card">
                                        <div class="small-box bg-dark" style="border-radius: 20px;">
                                            <div class="p-3 d-flex justify-content-center">

                                                <div class="info-box-content">
                                                    <center><b><span class="info-box-text" style="color: white;"><i class="fa fa-users" style="font-size: 30px;"></i><br> Old
                                                                Students</span></b>
                                                        <?php $stud_count = mysqli_query($conn, "SELECT count(student_id) AS total_stud FROM tbl_schoolyears AS sy
                                                            LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                                                            LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
                                                            WHERE ay.academic_year = '$act_acad' AND sem.semester = '$act_sem' AND remark = 'Approved' AND strand_id = '1' AND grade_level_id = '14' AND stud_type = 'Old'") or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($stud_count)) { ?>
                                                            <span class="info-box-number" style="color: white;">:
                                                                <?php echo $row['total_stud']; ?></span>
                                                    </center>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-5 mb-3 mt-4">
                                    <form method="GET">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search for (Student no. or Name)" name="search">
                                            <div class="input-group-append">
                                                <button type="submit" name="look" class="btn bg-navy" data-toggle="tooltip" data-placement="bottom" title="Search">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="bg-black pb-1">

                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid" data-toggle="data-table" style="width: 100%">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Image</th>
                                            <th>Student ID</th>
                                            <th>Fullname</th>
                                            <th>Strand</th>
                                            <th>Grade Level</th>
                                            <th>Student Type</th>
                                            <th>Date Applied</th>
                                            <th>Remark</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        if (isset($_GET['look'])) {

                                            $_GET['search'] = addslashes($_GET['search']);
                                            $_SESSION['search'] = $_GET['search'];




                                            $get_enrolled_stud = mysqli_query($conn, "SELECT *, CONCAT(stud.student_lname, ', ', stud.student_fname, ' ', stud.student_mname) AS fullname 
                                                FROM tbl_schoolyears AS sy
                                                LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
                                                LEFT JOIN tbl_strands AS stds ON stds.strand_id = sy.strand_id
                                                LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id =sy.grade_level_id
                                                LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id
                                                WHERE remark = 'Approved' AND ay.academic_year = '$act_acad' AND sem.semester = '$act_sem' AND sy.strand_id = '1' 
                                                AND sy.grade_level_id = '15' -- initially 14 = ABM-11, changed to 15 = ABM-12.
                                                
                                                
                                                
                                                
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                
                                                
                                                
                                                ORDER BY sy.student_id DESC
                                                ") or die(mysqli_error($conn));

                                            while ($row = mysqli_fetch_array($get_enrolled_stud)) {
                                                $id = $row['student_id'];
                                                $sy_id = $row['sy_id'];
                                                $_SESSION['stud_no'] = $row['stud_no'];
                                                $_SESSION['orig_id'] = $row['student_id'];
                                                $glvl_id = $row['grade_level_id'];

                                        ?>
                                                <tr>
                                                    <td><?php
                                                        $_SESSION['orig_id'] = $row['student_id'];
                                                        if (!empty(base64_encode($row['img']))) {
                                                            echo '
                                                        <img src="data:image/jpeg;base64,'  . base64_encode($row['img']) . '"
                                                        class="img zoom " alt="User image"
                                                        style="height: 80px; width: 100px">';
                                                        } else {
                                                            echo ' <img src="../../assets/images/icons/user.png"  class="img zoom"
                                                            alt="User image" style="height: 80px; width: 100px">';
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $row['stud_no']; ?></td>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <?php if (empty($row['strand_def'])) {
                                                        echo '<td>Grade School</td>';
                                                    } else {
                                                        echo '<td>' . $row['strand_def'] . '</td>';
                                                    } ?>
                                                    <td><?php echo $row['grade_level']; ?></td>
                                                    <td><?php echo $row['stud_type']; ?></td>
                                                    <td><?php echo $row['date_enrolled']; ?></td>
                                                    <td>
                                                        <span class="badge bg-<?php if ($row['remark'] == "Checked" || $row['remark'] == "Approved") {
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

                                                        <br>
                                                        <a href="../bed-forms/pre-en-data.php?<?php echo 'stud_id=' . $id; ?>" type="button" class=" btn btn-success text-sm p-2 mb-2"><i class="fa fa-eye"></i>
                                                            Pre-Enroll
                                                        </a>
                                                        <br> <?php if (!empty($glvl_id)) { ?>
                                                            <a href="../bed-forms/all_formsSH.php?<?php echo 'stud_id=' . $id . '&glvl_id=' . $glvl_id; ?>" type="button" class=" btn btn-secondary text-sm p-2 mb-2"><i class="fa fa-eye"></i>
                                                                Reg Form
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="../bed-forms/all_formsSH.php?<?php echo 'stud_id=' . $id; ?>" type="button" class=" btn btn-secondary text-sm p-2 mb-2"><i class="fa fa-eye"></i>
                                                                Reg Form
                                                            </a>
                                                        <?php } ?>
                                                        <br>
                                                        <!-- Delete modal button -->
                                                        <!-- Copied the same button source code in bed_enrollment in path bed/pages/bed-dashboard in line 183-188 -->
                                                        <!-- changed class "bg-red" to "btn-danger" -->
                                                        <a type="button" class="btn btn-danger text-sm p-2 mb-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id ?>"><i class="fa fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Delete modal start -->
                                                <!-- Copied the same delete modal source code in bed enrollment in path bed/pages/bed-dashboard/list.enrolledABM12.php in line 70-97 -->
                                                <div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-red">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <i class="fa fa-exclamation-triangle"></i>
                                                                    Confirm Delete
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                Are you sure you want to delete
                                                                <?php echo $row['fullname']; ?>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="../bed-students/userData/user.del.studABM.php?<?php echo 'sy_id=' . $sy_id; ?>" type="button" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete modal end -->
                                        <?php
                                            }
                                        }
                                        ?>
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

    <script src="../../assets/js/plugins/dataTables.responsive.min.js"></script>

</body>

</html>