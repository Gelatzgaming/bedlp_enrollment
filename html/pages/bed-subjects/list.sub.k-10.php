<!doctype html>
<html lang="en" dir="ltr">
<title>Subject List | SFAC Las Pinas</title>
<?php include '../../includes/bed-header.php'; 

if (isset($_GET['g1'])) {
    $grd_lvl = $_GET['g1'];
} elseif (isset($_GET['g2'])) {
    $grd_lvl = $_GET['g2'];
} elseif (isset($_GET['g3'])) {
    $grd_lvl = $_GET['g3'];
} elseif (isset($_GET['g4'])) {
    $grd_lvl = $_GET['g4'];
} elseif (isset($_GET['g5'])) {
    $grd_lvl = $_GET['g5'];
} elseif (isset($_GET['g6'])) {
    $grd_lvl = $_GET['g6'];
} elseif (isset($_GET['g7'])) {
    $grd_lvl = $_GET['g7'];
} elseif (isset($_GET['g8'])) {
    $grd_lvl = $_GET['g8'];
} elseif (isset($_GET['g9'])) {
    $grd_lvl = $_GET['g9'];
} elseif (isset($_GET['g10'])) {
    $grd_lvl = $_GET['g10'];
} elseif (isset($_GET['nurs'])) {
    $grd_lvl = $_GET['nurs'];
} elseif (isset($_GET['pkdr'])) {
    $grd_lvl = $_GET['pkdr'];
} elseif (isset($_GET['kdr'])) {
    $grd_lvl = $_GET['kdr'];
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
                            <h4 class="header-title mb-3">Primary & Junior High Subjects List</h4>
                            <form action="list.sub.k-10.php" method="GET">
                                <div class="row ">
                                    <div class="d-grid gap-3 d-flex justify-content-center">
                                        <button class="btn btn-outline-dark mb-3" value="Grade 1" name="g1">
                                            <i class="fa fa-users"></i> Grade 1
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 2" name="g2">
                                            <i class="fa fa-users"></i> Grade 2
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 3" name="g3">
                                            <i class="fa fa-users"></i> Grade 3
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 4" name="g4">
                                            <i class="fa fa-users"></i> Grade 4
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 5" name="g5">
                                            <i class="fa fa-users"></i> Grade 5
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 6" name="g6">
                                            <i class="fa fa-users"></i> Grade 6
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 7" name="g7">
                                            <i class="fa fa-users"></i> Grade 7
                                        </button>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-grid gap-3 d-flex justify-content-center">
                                        <button class="btn btn-outline-dark mb-3" value="Grade 8" name="g8">
                                            <i class="fa fa-users"></i> Grade 8
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 9" name="g9">
                                            <i class="fa fa-users"></i> Grade 9
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Grade 10" name="g10">
                                            <i class="fa fa-users"></i> Grade 10
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Nursery" name="nurs">
                                            <i class="fa fa-users"></i> Nursery
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Pre-Kinder" name="pkdr">
                                            <i class="fa fa-users"></i> Pre-Kinder
                                        </button>

                                        <button class="btn btn-outline-dark mb-3" value="Kinder" name="kdr">
                                            <i class="fa fa-users"></i> Kinder
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                        <div class="data-tables datatable-dark">
                            <table id="datatable" class="table table-striped" data-toggle="data-table"
                                style="width: 100%;">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Grade Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($grd_lvl)) {

                                        $get_sub = mysqli_query($conn, "SELECT * FROM tbl_subjects 
                                        LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id =
                                        tbl_subjects.grade_level_id 
                                        WHERE grade_level IN ('$grd_lvl') ORDER BY tbl_grade_levels.grade_level ASC, subject_id") or die(mysqli_error($conn));
                                            ?>
                                    <tr>
                                        <?php while ($row = mysqli_fetch_array($get_sub)) {
                                                            $id = $row['subject_id'];
                                                        ?>
                                        <td><?php echo $row['subject_code']; ?></td>
                                        <td><?php echo $row['subject_description']; ?></td>
                                        <td><?php echo $row['grade_level']; ?></td>
                                        <td><a href="edit.sub.k-10.php<?php echo '?subject_id=' . $id; ?>" type="button"
                                                class="btn btn-info mx-1"><i class="fa fa-edit"></i>
                                                Update
                                            </a>
                                            <button type="button" class="btn btn-danger mx-1" data-toggle="modal"
                                                data-target="#delete<?php echo $row['subject_id'] ?>"><i
                                                    class="fa fa-trash"></i> Delete</button>
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
                                    <?php }?>
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

    <?php  include '../../includes/bed-script.php' ?>

</body>

</html>