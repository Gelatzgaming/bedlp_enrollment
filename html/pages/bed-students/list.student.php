<!doctype html>
<html lang="en" dir="ltr">
<title>Student List | SFAC Las Pinas</title>
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
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="header-title pb-3">Student List</h4>
                            </div>
                        </div>
                        <div class="card-body">
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
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid" data-toggle="data-table">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Image</th>
                                            <th>Student ID</th>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                            <th style="min-width: 100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_GET['look'])) {

                                            $_GET['search'] = addslashes($_GET['search']);
                                            $_SESSION['search'] = $_GET['search'];

                                            $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname) AS fullname 
                                                FROM tbl_students
                                                LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                                WHERE (student_fname LIKE '%$_GET[search]%' 
                                                OR student_mname LIKE '%$_GET[search]%'
                                                OR student_lname  LIKE '%$_GET[search]%' 
                                                OR stud_no LIKE '%$_GET[search]%')                         
                                                ORDER BY student_id DESC
                                                ") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($get_user)) {
                                                $id = $row['student_id'];
                                                $_SESSION['stud_no'] = $row['stud_no'];

                                        ?>

                                                <tr>
                                                    <td><?php

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
                                                    <td><?php echo $row['stud_no'] ?></td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><a href="edit.student.php<?php echo '?student_id=' . $id; ?>" type="button" class="btn btn-info mx-1"><i class="fa fa-edit"></i>
                                                            Update
                                                        </a>

                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['student_id'] ?>"><i class="fa fa-trash"></i> Delete </button>

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
                                        <?php }
                                        }
                                        ?>
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