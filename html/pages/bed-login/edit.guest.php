<!doctype html>
<html lang="en" dir="ltr">
<title>Guest Sign Up | SFAC Las Pinas</title>
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
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
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
                } elseif (!empty($_SESSION['success-edit'])) {
                    echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Edited.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                    unset($_SESSION['success-edit']);
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title"> Edit Guests</h4>
                                    <p class="text-muted font-14 mb-4">Fill up the forms.
                                </div>
                            </div>
                            <div class="card-body" style="color:black;">

                                <form action="userData/user.edit.guest.php" method="POST" enctype="multipart/form-data">

                                    <?php
                                            $get_guest = $conn->query("SELECT * FROM tbl_guests WHERE guest_id = '$_GET[guest_id]'");
                                            $res_count = $get_guest->num_rows;
                                            if ($res_count == 0) {
                                                // error code
                                            }
                                            $row = $get_guest->fetch_array();

                                            ?>
                                    <input class="form-control" type="text" name="guest_id"
                                        value="<?php echo $row['guest_id']; ?>" hidden>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">First name</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="firstname" placeholder="First name"
                                                value="<?php echo $row['guest_fname']; ?>" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Middle name</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="midname" placeholder="Middle name"
                                                value="<?php echo $row['guest_mname']; ?>" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="example-text-input">Last name</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                name="lastname" placeholder="Last name"
                                                value="<?php echo $row['guest_lname']; ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="example-email-input" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="example-email-input"
                                                aria-label="Email" aria-describedby="basic-addon1" name="email"
                                                placeholder="example@gmail.com" value="<?php echo $row['email']; ?>"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="example-text-input" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="example-text-input"
                                                aria-label="Username" name="username" placeholder="Username"
                                                value="<?php echo $row['username']; ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Password</label>
                                            <input type="password" class="form-control" id="example-text-input"
                                                name="password" placeholder="Password" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="example-text-input">Confirm Password</label>
                                            <input type="password" class="form-control" id="example-text-input"
                                                name="password2" placeholder="Confirm Password" required>
                                        </div>

                                    </div>
                                    <div class="form-group float-end">
                                        <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section Start -->

        <?php include '../../includes/bed-footer.php' ?>

        <!-- Footer Section End -->
    </main>

    <?php include '../../includes/bed-script.php' ?>

</body>

</html>