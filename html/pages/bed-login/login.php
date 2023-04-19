<?php
include '../../includes/conn.php';
if (!empty($_SESSION['role'])) {
    header("location: ../bed-dashboard/index.php");
} ?>

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
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">

                                    <!--Logo start-->
                                    <!--logo End-->

                                    <!--Logo start-->
                                    <div class="logo-main mb-2" style="text-align: center;">
                                        <div class="logo-normal">
                                            <img src="../../assets/images/auth/logo.png" alt="SFAC-Logo" height="100px"
                                                width="100px">

                                        </div>

                                    </div>
                                    <!--logo End-->


                                    <h3 class="mb-2 text-center">Sign In</h3>
                                    <p class="text-center">Login to stay connected.</p>



                                    <form action="userData/user.login.php" method="POST">
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
                                            } elseif (!empty($_SESSION['pwd-error'])) {
                                                echo ' <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert"><i class="fa fa-exclamation-triangle"></i>
                                                    <strong> Password is incorrect.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div> ';
                                                unset($_SESSION['pwd-error']);
                                            } ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="username" class="form-control" id="username"
                                                        name="username" aria-describedby="username"
                                                        placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" aria-describedby="password"
                                                        placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-between">
                                                <div class="mb-3">
                                                    <a href="../bed-login/sign-up.guest.php"
                                                        class="text-underline">Sign-up as Guest</a>
                                                </div>
                                                <a href="recoverpw.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-danger" name="submit">Sign In</button>
                                        </div>

                                        <p class="mt-3 text-center">
                                            <a href="../bed-online-enrollment/online.enrollment.php"
                                                class="text-underline">Inquire Here!</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../../assets/images/auth/lp.jpg" class="img-fluid gradient-main animated-scaleX"
                        alt="images">
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