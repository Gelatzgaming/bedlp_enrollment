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
                            <h4 class="header-title">List of Balik Franciscano Students</h4>

                            <div class="row justify-content-center">
                                <div class="col-md-5 mb-3 mt-4">
                                    <form method="GET">
                                        <div class="input-group">
                                            <input type="search" class="form-control"
                                                placeholder="Search for (Student no. or Name)" name="search">
                                            <div class="input-group-append">
                                                <button type="submit" name="look" class="btn bg-navy"
                                                    data-toggle="tooltip" data-placement="bottom" title="Search">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="bg-black pb-1">

                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid"
                                    data-toggle="data-table" style="width: 100%">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Image</th>
                                            <th>Student ID</th>
                                            <th>Fullname</th>
                                            <th>Strand</th>
                                            <th>Grade Level</th>
                                            <th>Student Type</th>
                                            <th>Balik Franciscano</th>
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




                                            $get_new_stud = mysqli_query($conn, "SELECT * , sy.bf, CONCAT(stud.student_lname, ', ', stud.student_fname, ' ', stud.student_mname) AS fullname 
                                                FROM tbl_schoolyears AS sy
                                                LEFT JOIN tbl_students AS stud ON stud.student_id = sy.student_id
                                                LEFT JOIN tbl_strands AS stds ON stds.strand_id = sy.strand_id
                                                LEFT JOIN tbl_semesters AS sem ON sem.semester_id = sy.semester_id
                                                LEFT JOIN tbl_grade_levels AS gl ON gl.grade_level_id =sy.grade_level_id
                                                LEFT JOIN tbl_acadyears AS ay ON ay.ay_id = sy.ay_id  
                                                WHERE remark = 'Approved' AND ay.academic_year = '$act_acad' 
                                                AND (sem.semester = '$act_sem' OR sy.semester_id = '0')
                                                AND sy.bf = 'Yes'
                                                
                                                
                                                AND (student_fname LIKE '%$_GET[search]%'
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%'
                                                OR grade_level  LIKE '%$_GET[search]%'
                                                OR stud_no LIKE '%$_GET[search]%')
                                                
                                                
                                                
                                                ORDER BY sy.student_id DESC
                                                ") or die(mysqli_error($conn));

                                            while ($row = mysqli_fetch_array($get_new_stud)) {
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
                                                            echo ' <img src="../../assets/images/icons/user.png" class="img zoom"
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
                                            <td><?php echo $row['bf']; ?></td>
                                            <td><?php echo $row['date_enrolled']; ?></td>
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

                                                <br>
                                                <a href="../bed-forms/pre-en-data.php?<?php echo 'stud_id=' . $id; ?>"
                                                    type="button" class=" btn btn-success text-sm p-2 mb-2"><i
                                                        class="fa fa-eye"></i>
                                                    Pre-Enroll
                                                </a>
                                                <br>

                                                <?php if (!empty($glvl_id)) { ?>
                                                <a href="../bed-forms/accounting-laspi-shs.php?<?php echo 'stud_id=' . $id . '&glvl_id=' . $glvl_id; ?>"
                                                    type="button" class=" btn btn-warning text-sm p-2 mb-2"><i
                                                        class="fa fa-eye"></i>
                                                    Reg Form Main
                                                </a>
                                                <?php } else { ?>
                                                <a href="../bed-forms/accounting-laspi-shs.php?<?php echo 'stud_id=' . $id; ?>"
                                                    type="button" class=" btn btn-warning text-sm p-2 mb-2"><i
                                                        class="fa fa-eye"></i>
                                                    Reg Form Main
                                                </a>
                                                <?php } ?>
                                                <br>
                                                <?php if (!empty($glvl_id)) { ?>
                                                <a href="../bed-forms/accounting.php?<?php echo 'stud_id=' . $id . '&glvl_id=' . $glvl_id; ?>"
                                                    type="button" class=" btn btn-danger text-sm p-2 mb-2"><i
                                                        class="fa fa-eye"></i>
                                                    Reg/Accounting Form
                                                </a>
                                                <?php } else { ?>
                                                <a href="../bed-forms/accounting.php?<?php echo 'stud_id=' . $id; ?>"
                                                    type="button" class=" btn btn-danger text-sm p-2 mb-2"><i
                                                        class="fa fa-eye"></i>
                                                    Reg/Accounting Form
                                                </a>
                                                <?php } ?>


                                            </td>
                                        </tr>
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