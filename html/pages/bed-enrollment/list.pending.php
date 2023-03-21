<!doctype html>
<html lang="en" dir="ltr">
<title>Pending Student List | SFAC Las Pinas</title>
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
            <!-- Nav Header Component End f-->
            <!--Nav End-->

        </div>
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title pb-3">Pending Student List</h4>
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
                            } elseif (!empty($_SESSION['success-update'])) {
                                echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Remark Successfully Updated.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                            </div> ';
                                unset($_SESSION['success-update']);
                            } ?>
                            <div>
                                <table id="datatable" class="table table-responsive nowrap table-striped" data-toggle="data-table" style="width: 100%;">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Image</th>
                                            <th>Student ID</th>
                                            <th>Fullname</th>
                                            <th>Grade level</th>
                                            <th>Type</th>
                                            <th>Date enrolled</th>
                                            <th>Remark</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_SESSION['role'] == "Admission" || $_SESSION['role'] == "Adviser") {
                                            $in = "('Checked', 'Pending', 'Canceled', 'Disapproved')";
                                        } else if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Registrar") {
                                            $in = "('Checked', 'Approved', 'Disapproved')";
                                        }

                                        $get_stud = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_schoolyears LEFT JOIN tbl_students USING(student_id) LEFT JOIN tbl_grade_levels USING(grade_level_id) WHERE remark IN $in AND ay_id = '$acadyear_id' AND semester_id IN ('$semester_id', '0') ORDER BY remark DESC, sy_id DESC");


                                        while ($row = mysqli_fetch_array($get_stud)) {
                                            $id = $row['sy_id'];
                                            $stud_id = $row['student_id'];
                                            $glvl_id = $row['grade_level_id'];
                                        ?>
                                            <tr>
                                                <td><img class="img-fluid mr-4" src="data:image/jpeg;base64, <?php echo base64_encode($row['img']); ?>" alt="image" style="height: 80px; width: 100px"></td>
                                                <td><?php echo $row['stud_no'] ?></td>
                                                <td><?php echo $row['fullname'] ?></td>
                                                <td><?php echo $row['grade_level'] ?></td>
                                                <td><?php echo $row['stud_type'] ?></td>
                                                <td><?php echo $row['date_enrolled'] ?></td>
                                                <td>
                                                    <?php echo $row['remark'] ?>
                                                </td>
                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                        </button>
                                                        <ul class="dropdown-menu aria-labelledby=" dropdownMenuClickable>
                                                            <form action="userData/user.list.pending.php" method="POST">

                                                                <a href="userData/user.list.pending.php?id=<?php echo $id; ?>&remark=<?php echo $row['remark']; ?>" class="dropdown-item" name="btnRemark"><i class="fa fa-exchange"></i>
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
                                                            <a href="../bed-students/edit.enrolledStud.php?<?php echo 'stud_id=' . $stud_id; ?>" type="button" class="dropdown-item "><i class="fa fa-edit"></i>
                                                                Update
                                                            </a>

                                                            <a href="../bedlp-subjects/list.enrolledSub.senior.php?<?php echo 'stud_id=' . $stud_id; ?>" type="button" class="dropdown-item "><i class="fa fa-book"></i>
                                                                Subjects
                                                            </a>

                                                            <a href="../bed-forms/pre-en-data.php?<?php echo 'stud_id=' . $stud_id; ?>" type="button" class="dropdown-item "><i class="fa fa-eye"></i>
                                                                Pre-Enroll
                                                            </a>
                                                            <a href="../bed-forms/accounting-laspi-shs.php?<?php echo 'stud_id=' . $stud_id; ?>" type="button" class="dropdown-item "><i class="fa fa-eye"></i>
                                                                Main Reg Form
                                                            </a>
                                                            <?php if (!empty($glvl_id)) { ?>
                                                                <a href="../bed-forms/accounting.php?<?php echo 'stud_id=' . $stud_id . '&glvl_id=' . $glvl_id; ?>" type="button" class="dropdown-item "><i class="fa fa-eye"></i>
                                                                    Accounting Form
                                                                </a>
                                                            <?php } else { ?>
                                                                <a href="../bed-forms/accounting.php?<?php echo 'stud_id=' . $stud_id; ?>" type="button" class="dropdown-item "><i class="fa fa-eye"></i>
                                                                    Accounting Form
                                                                </a>
                                                            <?php } ?>

                                                            <?php if (!empty($glvl_id)) { ?>
                                                                <a href="../bed-forms/all_formsSH.php?<?php echo 'stud_id=' . $stud_id . '&glvl_id=' . $glvl_id; ?>" type="button" class="dropdown-item "><i class="fa fa-eye"></i>
                                                                    Reg Form
                                                                </a>

                                                            <?php } else { ?>
                                                                <a href="../bed-forms/all_formsSH.php?<?php echo 'stud_id=' . $stud_id; ?>" type="button" class="dropdown-item "><i class="fa fa-eye"></i>
                                                                    Reg Form
                                                                </a>
                                                            <?php } ?>

                                                            <!-- Button trigger modal -->
                                                            <hr class="dropdown-divider">
                                                            <a type="button" class="dropdown-item" data-bs-toggle="modal" href="#delete<?php echo $row['student_id'] ?>"><i class="fa fa-trash"></i>
                                                                Delete
                                                            </a>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Delete modal start -->
                                            <div class="modal fade" id="delete<?php echo $row['student_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-center my-5">
                                                            <p>Are you sure you want to delete,
                                                                <br><strong><i class="font-weight-bold"><?php echo $row['fullname'] ?></i></strong>
                                                                ?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="userData/user.del.student.php?student_id=<?php echo $row['student_id'] ?>" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete modal end -->
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

    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
    <script src="">
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
</body>

</html>