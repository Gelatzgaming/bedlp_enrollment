<?php
include '../../includes/conn.php';
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SFAC BED - Las Piñas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/auth/logo.png" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="../../assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="../../assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="../../assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="../../assets/css/rtl.min.css" />


</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../../assets/images/auth/lp.jpg" class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                                <div class="card-body">
                                    <!--Logo start-->
                                    <!--logo End-->

                                    <!--Logo start-->
                                    <div class="logo-main mb-2" style="text-align: center;">
                                        <div class="logo-normal">
                                            <img src="../../assets/images/auth/logo.png" alt="SFAC-Logo" height="100px" width="100px">

                                        </div>

                                    </div>
                                    <!--logo End-->

                                    <h2 class="mb-2 text-center">Sign Up</h2>
                                    <p class="text-center">Create your Guest Account.</p>
                                    <form action="userData/user.add.guest.php" method="POST">
                                        <div class="row">
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
                                                    <strong>Successfully Registered.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>';
                                                unset($_SESSION['success']);
                                            }
                                            ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-label">First
                                                        Name</label>
                                                    <input type="text" class="form-control" id="example-text-input" placeholder="Firstname" name="firstname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="example-text-input" placeholder="Lastname" name="lastname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-label">Middle
                                                        Name</label>
                                                    <input type="text" class="form-control" id="example-text-input" placeholder="Middlename" name="midname">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="example-email-input" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="example-email-input" placeholder="example@gmail.com" name="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="example-text-input" placeholder="Username" name="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="example-text-input" placeholder="Enter Password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-label">Confirm
                                                        Password</label>
                                                    <input type="text" class="form-control" id="example-text-input" placeholder="Confirm Password" name="password2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="submit" name="submit" class="btn btn-danger">Sign Up</button>
                                        </div>

                                        <p class="mt-3 text-center">
                                            Already have an Account? <a href="login.php" class="text-underline">Sign
                                                In</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Library Bundle Script -->
    <script src="../../assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="../../assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="../../assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="../../assets/js/charts/vectore-chart.js"></script>
    <script src="../../assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="../../assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="../../assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="../../assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="../../assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="../../assets/js/hope-ui.js" defer></script>

</body>

</html>