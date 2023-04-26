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
            } elseif (!empty($_SESSION['successYear'])) {
                echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                <strong>Successfully Added.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                </div> ';
                unset($_SESSION['successYear']);
            } elseif (!empty($_SESSION['success-edit'])) {
                echo ' <div class="alert alert-solid alert-info rounded-0 alert-dismissible fade show " role="alert">
                                        <strong>Successfully Edited.</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                        </div>';
                unset($_SESSION['success-edit']);
            } elseif (!empty($_SESSION['yearExist'])) {
                echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                                                <strong>Year Already Exist.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                unset($_SESSION['yearExist']);
            } elseif (!empty($_SESSION['success-del'])) {
                echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                        <strong>Successfully Deleted.</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                        </div>';
                unset($_SESSION['success-del']);
            } elseif (!empty($_SESSION['success-update'])) {
                echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                                <strong>Academic Year Updated!</strong>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                                </div>';
                unset($_SESSION['success-update']);
            }
            ?>
        </div>
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <h4 class="header-title">Academic Year List</h4>
                                    </div>
                                    <?php 
                                    if ($_SESSION['role'] == "Guest") {
                                        ?>
                                    <div class="col">
                                        <button type="button" class="btn btn-rounded btn-danger float-end"
                                            data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" disabled>Add
                                            Academic
                                            Year</button>
                                    </div>
                                    <?php
                                    } else {
                                        ?>
                                    <div class="col">
                                        <button type="button" class="btn btn-rounded btn-danger float-end"
                                            data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Academic
                                            Year</button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="table-responsive">
                                    <table id="user-list-table" class="table table-hover responsive nowrap" role="grid"
                                        data-toggle="data-table">
                                        <thead class="text-capitalize">
                                            <tr class="light">
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
                                                <?php 
                                                if ($_SESSION['role'] == "Guest") {
                                                    ?>
                                                <td>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Edit Academic Year">
                                                        <button type="button" class="btn btn-info mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit<?php echo $row['ay_id'] ?>"
                                                            disabled><i class="fa fa-edit"></i></button>
                                                    </span>
                                                    </a>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Delete Academic Year">
                                                        <button type="button" class="btn btn-danger mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete<?php echo $row['ay_id'] ?>"
                                                            disabled><i class="fa fa-trash"></i></button>
                                                    </span>
                                                </td>
                                                <?php
                                                } else {
                                                    ?>
                                                <td>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Edit Academic Year">
                                                        <button type="button" class="btn btn-info mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit<?php echo $row['ay_id'] ?>"><i
                                                                class="fa fa-edit"></i></button>
                                                    </span>

                                                    </a>
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Delete Academic Year">
                                                        <button type="button" class="btn btn-danger mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete<?php echo $row['ay_id'] ?>"><i
                                                                class="fa fa-trash"></i></button>
                                                    </span>
                                                </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <!-- Edit (acad year) -->
                                            <div class="modal fade" id="edit<?php echo $row['ay_id'] ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Edit
                                                                Academic Year</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="userData/user.edit.date.php?ay_id=<?php echo $row['ay_id'] ?>"
                                                            method="POST">
                                                            <div class="modal-body">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon3">Academic
                                                                            Year</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        id="basic-url" name="acad_year"
                                                                        aria-describedby="basic-addon3"
                                                                        placeholder="yyyy-yyyy"
                                                                        value="<?php echo $row['fullname'] ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"
                                                                    name="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete modal start -->
                                            <div class="modal fade" id="delete<?php echo $row['ay_id'] ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form
                                                            action="userData/user.del.date.php?ay_id=<?php echo $row['ay_id'] ?>"
                                                            method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Delete
                                                                </h5>
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
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete modal end -->
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal (add acad year) -->
                            <div class="modal fade bd-example-modal-lg" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Academic Year</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="userData/user.add.date.php" method="POST">
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">Academic
                                                            Year</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="basic-url"
                                                        name="acad_year" aria-describedby="basic-addon3"
                                                        placeholder="yyyy-yyyy" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger"
                                                    name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Set Active Academic Year</h4>
                            </div>
                            <form action="userData/user.set.date.php" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-select form-select-md" name="act_acadyear"
                                            data-placeholder="Select Active Academic Year"
                                            data-dropdown-css-class="select2-purple" name="act_acadyear">
                                            <?php $get_actacad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_active_acadyears.ay_id") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($get_actacad)) {
                                            ?>
                                            <option value="<?php echo $row['ay_id']; ?>">A.Y
                                                <?php echo $row['academic_year']; ?></option>
                                            <?php $get_acad = mysqli_query($conn, "SELECT * FROM tbl_acadyears WHERE  ay_id NOT IN (" . $row['ay_id'] . ")") or die(mysqli_error($conn));
                                                while ($row2 = mysqli_fetch_array($get_acad)) {
                                                ?>
                                            <option value="<?php echo $row2['ay_id']; ?>">A.Y
                                                <?php echo $row2['academic_year'];
                                                }
                                            } ?></option>

                                        </select>
                                    </div>
                                    <?php 
                                    if ($_SESSION['role'] == "Guest") {
                                        ?>
                                    <button class="btn btn-danger mt-2" name="submit" type="submit" disabled><i
                                            class="fa fa-calendar-check-o"></i> Set Academic Year</button>
                                    <?php 
                                    } else {
                                        ?>
                                    <button class="btn btn-danger mt-2" name="submit" type="submit"><i
                                            class="fa fa-calendar-check-o"></i> Set Academic Year</button>
                                    <?php 
                                    }
                                    ?>

                                </div>
                            </form>

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