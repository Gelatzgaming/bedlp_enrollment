<!doctype html>
<html lang="en" dir="ltr">
<title>Online Inquiries List | SFAC Las Pinas</title>
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
        } elseif (!empty($_SESSION['success'])) {
            echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Remark Successfully Added.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
            unset($_SESSION['success']);
        } elseif (!empty($_SESSION['lrn-studno'])) {
            echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                        <strong>Student ID and LRN are already exists.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                        </div>';
            unset($_SESSION['lrn-studno']);
        } elseif (!empty($_SESSION['double-lrn'])) {
            echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                        <strong>LRN already exists.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                        </div>';
            unset($_SESSION['double-lrn']);
        } elseif (!empty($_SESSION['double-studno'])) {
            echo ' <div class="alert alert-solid alert-warning rounded-0 alert-dismissible fade show " role="alert">
                        <strong>Student ID already exists.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                        </div>';
            unset($_SESSION['double-studno']);
        }
        ?>
        <div class="content">
            <div class="container-fluid pl-5 pr-5 pb-3">
                <!-- main content pt.2 -->
                <!-- Dark table start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="header-title pb-3">Online Inquiries</h4>
                            </div>
                            <button class="btn btn-danger float-end" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                                type="button">
                                Channel Inquiries
                            </button>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="col p-4">
                                <form action="online.list" method="GET">
                                    <div class="row justify-content-center">
                                        <?php
                                        $totalChannel = mysqli_query($conn, "SELECT * FROM tbl_information");
                                        while ($rowInfo = mysqli_fetch_array($totalChannel)) {

                                            $countChannel = mysqli_query($conn, "SELECT COUNT(info_name) FROM tbl_online_reg WHERE info_name = '$rowInfo[info_name]'") or die($conn->error);
                                            $actualCountTotal = mysqli_fetch_array($countChannel);

                                            echo '
                                            <div class="col-sm-auto mt-2 mb-2">
                                                <button class="btn btn-icon btn-3 btn-danger" style="width: 200px;" value="' . $rowInfo['info_name'] . '" name="info_name">
                                                    <span class="btn-inner--icon"><i class="fa fa-users"></i></span>
                                                    <span class="btn-inner--text">' . $rowInfo['info_name'] . '</span>
                                                    <p class="text-sm text-nowrap mb-0">
                                                        <b>Total:</b> ' . $actualCountTotal[0] . '
                                                    </p>
                                                </button>
                                                
                                            </div>
                                            ';
                                        }


                                        ?>
                                    </div>
                                </form>

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
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="user-list-table" class="table table-hover responsive nowrap" role="grid"
                                    data-toggle="data-table">
                                    <thead class="text-capitalize">
                                        <tr class="light">
                                            <th>Fullname:</th>
                                            <th>Grade:</th>
                                            <th>Email:</th>
                                            <th>Student Type:</th>
                                            <th>School:</th>
                                            <th>School Type:</th>
                                            <th>Channel Info.:</th>
                                            <th>Balik Franciscano:</th>
                                            <th>Status:</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        if (isset($_GET['look'])) {

                                            $_GET['search'] = addslashes($_GET['search']);
                                            $_SESSION['search'] = $_GET['search'];

                                            if ($dept == "Pre-Kinder to Grade 6") {
                                                $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE tbl_online_reg.grade_level_id IN ('1', '2', '3', '4', '5', '6', '7', '8', '9') AND (student_fname LIKE '%$_GET[search]%' 
                                                    OR student_mname LIKE '%$_GET[search]%'
                                                    OR student_lname  LIKE '%$_GET[search]%')                         
                                                    ORDER BY or_id DESC
                                                    ");
                                            } elseif ($dept == "Grade 7 to Grade 10") {
                                                $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE tbl_online_reg.grade_level_id IN ('10', '11', '12', '13') 
                                                    AND (student_fname LIKE '%$_GET[search]%' 
                                                    OR student_mname LIKE '%$_GET[search]%'
                                                    OR student_lname  LIKE '%$_GET[search]%')                         
                                                    ORDER BY or_id DESC
                                                    ");
                                            } elseif ($dept == "Grade 11") {
                                                $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE tbl_online_reg.grade_level_id IN ('14') 
                                                    AND (student_fname LIKE '%$_GET[search]%' 
                                                    OR student_mname LIKE '%$_GET[search]%'
                                                    OR student_lname  LIKE '%$_GET[search]%')                         
                                                    ORDER BY or_id DESC
                                                    ");
                                            } elseif ($dept == "Grade 12") {
                                                $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE tbl_online_reg.grade_level_id IN ('15') 
                                                    AND (student_fname LIKE '%$_GET[search]%' 
                                                    OR student_mname LIKE '%$_GET[search]%'
                                                    OR student_lname  LIKE '%$_GET[search]%')                         
                                                    ORDER BY or_id DESC
                                                    ");
                                            } elseif ($dept == "all") {
                                                $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_online_reg.student_lname, ', ', tbl_online_reg.student_fname, ' ', tbl_online_reg.student_mname) AS fullname FROM tbl_online_reg
                                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_online_reg.grade_level_id
                                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_online_reg.strand_id
                                                    WHERE (student_fname LIKE '%$_GET[search]%' 
                                                    OR student_mname LIKE '%$_GET[search]%'
                                                    OR student_lname  LIKE '%$_GET[search]%')                         
                                                    ORDER BY or_id DESC
                                                    ");
                                            }

                                            while ($row = mysqli_fetch_array($get_user)) {
                                                $id = $row['or_id'];

                                        ?>
                                        <tr>

                                            <td><?php echo $row['fullname']; ?></td>

                                            <?php if (empty($row['strand_id'])) {
                                                        echo '<td>' . $row['grade_level'] . '</td>';
                                                    } else {
                                                        echo '<td>' . $row['grade_level'] . ' - ' . $row['strand_name'] . '</td>';
                                                    }
                                                    ?>

                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['stud_type']; ?></td>
                                            <td><?php echo $row['last_sch']; ?></td>
                                            <td><?php echo $row['sch_type']; ?></td>
                                            <td><?php echo $row['info_name'] ?></td>
                                            <td><?php echo $row['bf']; ?></td>
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
                                                    <a href="online.edit.php<?php echo '?or_id=' . $id; ?>"
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
                                                </form>
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
                                        <?php }
                                        } ?>

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