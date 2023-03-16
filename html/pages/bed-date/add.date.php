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
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Academic Year List</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="datatable" class="table table-striped" data-toggle="data-table"
                                        style="width: 100%;">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Academic Year</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $get_ay = mysqli_query($conn, "SELECT *, CONCAT(tbl_acadyears.academic_year) AS fullname 
                                                FROM tbl_acadyears");
                                                while ($row = mysqli_fetch_array($get_ay)) {
                                                    $id = $row['ay_id'];
                                                ?>
                                            <tr>
                                                <td class="px-5"><?php echo $row['fullname'] ?></td>
                                                <td>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Edit Academic Year">
                                                        <button type="button" class="btn btn-rounded btn-info mb-3"
                                                            data-toggle="modal"
                                                            data-target="#edit<?php echo $row['ay_id'] ?>"><i
                                                                class="fa fa-edit"></i></button>
                                                    </span>

                                                    </a>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Delete Academic Year">
                                                        <button type="button" class="btn btn-rounded btn-danger mb-3"
                                                            data-toggle="modal"
                                                            data-target="#delete<?php echo $row['ay_id'] ?>"><i
                                                                class="fa fa-trash"></i></button>
                                                    </span>
                                                </td>
                                            </tr>
                                            <!-- Delete modal start -->
                                            <div class="modal fade" id="delete<?php echo $row['reg_id'] ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                            <a href="userData/user.del.registrar.php?reg_id=<?php echo $row['reg_id'] ?>"
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Set Active Academic Year</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
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

    <?php  include '../../includes/bed-script.php' ?>

</body>

</html>