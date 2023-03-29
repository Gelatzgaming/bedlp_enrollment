<!doctype html>
<html lang="en" dir="ltr">
<title>Accounting List | SFAC Las Pinas</title>
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
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="header-title">Accounting List</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid" data-toggle="data-table">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Image</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_accountings.accounting_lname, ', ', tbl_accountings.accounting_fname, ' ', tbl_accountings.accounting_mname) AS fullname 
                                                FROM tbl_accountings");
                                        while ($row = mysqli_fetch_array($get_user)) {
                                            $id = $row['acc_id'];
                                        ?>
                                            <tr>
                                                <td><img class="img-fluid mr-4" src="data:image/jpeg;base64, <?php echo base64_encode($row['img']); ?>" alt="image" style="height: 80px; width: 100px"></td>
                                                <td><?php echo $row['fullname'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><a href="edit.accounting.php<?php echo '?acc_id=' . $id; ?>" type="button" class="btn btn-info mx-1"><i class="fa fa-edit"></i>
                                                        Update
                                                    </a>

                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['acc_id'] ?>"><i class="fa fa-trash"></i> Delete </button>

                                                </td>
                                            </tr>
                                            <!-- Delete modal start -->
                                            <div class="modal fade" id="delete<?php echo $row['acc_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                            <a href="userData/user.del.accounting.php?acc_id=<?php echo $row['acc_id'] ?>" class="btn btn-danger">Delete</a>
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

</body>

</html>