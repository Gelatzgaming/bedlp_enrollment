<!doctype html>
<html lang="en" dir="ltr">
<title>Online Inquiries List | SFAC Las Pinas</title>
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
                            <h4 class="header-title pb-3">Online Inquiries</h4>
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
                                <table id="datatable" class="table table-responsive nowrap table-striped"
                                    data-toggle="data-table" style="width: 100%;">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Fullname</th>
                                            <th>Grade</th>
                                            <th>Email</th>
                                            <th>Student Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE remark = 'Pending'
                                                    ") or die(mysqli_error($conn)) ?>
                                        <tr>
                                            <?php while ($row = mysqli_fetch_array($get_user)) {
                                                $id = $row['or_id'];
                                            ?>
                                            <td><?php echo $row['fullname']; ?></td>

                                            <?php if (empty($row['strand_id'])) {
                                                    echo '<td>' . $row['grade_level'] . '</td>';
                                                } else {
                                                    echo '<td>' . $row['grade_level'] . ' - ' . $row['strand_name'] . '</td>';
                                                }
                                                ?>

                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['stud_type']; ?></td>
                                            <td><?php echo $row['remark']; ?></td>
                                            <td>


                                                <form action="userData/user.list.pending.php" method="POST">

                                                    <?php if (empty($row['strand_id'])) { ?>
                                                    <a href="online.edit.php<?php echo '?or_id=' . $id; ?>"
                                                        type="button" class="btn btn-success mb-2 mt-2"><i
                                                            class="fa fa-edit"></i>
                                                        Approve
                                                    </a>
                                                    <?php } else { ?>
                                                    <a href="online.edit.senior.php<?php echo '?or_id=' . $id; ?>"
                                                        type="button" class="btn btn-success mb-2 mt-2"
                                                        style="text-align: center;"><i class="fa fa-edit"></i>
                                                        Approve
                                                    </a>
                                                    <?php } ?>
                                                    <br>

                                                    <?php if (empty($row['strand_id'])) { ?>
                                                    <a href="../bed-forms/pre_en_online.php<?php echo '?or_id=' . $id; ?>"
                                                        type="button" class="btn btn-info mb-2 mt-2"><i
                                                            class="fa fa-edit"></i>
                                                        Pre-enrollment Form
                                                    </a>
                                                    <?php } else { ?>
                                                    <a href="../bed-forms/pre_en_online_senior.php<?php echo '?or_id=' . $id; ?>"
                                                        type="button" class="btn btn-info mb-2 mt-2"><i
                                                            class="fa fa-edit"></i>
                                                        Pre-enrollment Form
                                                    </a>
                                                    <?php } ?>

                                                    <!-- Button trigger modal -->
                                                    <hr class="dropdown-divider">
                                                    <a type="button" class="btn btn-danger mb-2 mt-2"
                                                        data-bs-toggle="modal" href="#delete<?php echo $id ?>"><i
                                                            class="fa fa-trash"></i>
                                                        Delete
                                                    </a>
                                            </td>
                                        </tr>
                                        <!-- Delete modal start -->
                                        <div class="modal fade" id="delete<?php echo $id ?>" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
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
                                                        <a href="userData/user.del.online.php<?php echo '?or_id=' . $id; ?>"
                                                            class="btn btn-danger">Delete</a>
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