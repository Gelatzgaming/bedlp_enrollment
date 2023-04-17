<?php
include '../../includes/conn.php';

?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Inquiry - Las Piñas</title>

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

    <style>
        .background {
            background-repeat: no-repeat;
            background-size: auto;

        }

        body {
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
        }

        .toast-top-right {
            right: unset;
            margin-top: 1%;
        }
    </style>

</head>

<body class="hold-transition login-page background" style="background-image: url('../../assets/images/pages/bg-2.jpg');" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="content-wrapper pt-4">
        <section class="content">
            <div class="container-fluid pl-4 pr-4 pb-3">
                <div class="card-body justify-content-center">
                    <div class="row justify-content-center">
                        <!-- Textual inputs start -->
                        <div class="col-8 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header text-center">
                                        <a href="../bed-login/login.php" class="h1 justify-content-center"><img height="90" width="90" src="../../assets/images/auth/logo.png" alt="logo-signin"></a>
                                        <h5 class="login-box-msg mt-3 mb-3">Saint Francis of Assisi College Las Piñas
                                            Campus
                                        </h5>
                                    </div>
                                    <section class="content">
                                        <div class="container-fluid pl-5 pr-5 pb-3">
                                            <div class="card card-success">

                                                <div class="card-header text-center pb-4" style="background-color: #c03221;">
                                                    <h3 class="text-lg" style="margin-bottom: unset; color: white;">
                                                        FORM SUCCESSFULLY SUBMITTED
                                                    </h3>
                                                </div>
                                                <form action="../bed-login/login.php" enctype="multipart/form-data" method="POST">
                                                    <div class="card-body">
                                                        <div class="row mb-4 mt-4 justify-content-center" style="color:black;">
                                                            <p>Your form has been successfully submitted and is now
                                                                being processed. Please wait for further instruction
                                                                regarding to your registration. Thank you!</p>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-danger float-end"><i class="fa fa-home" aria-hidden="true"></i>
                                                            Home</button>
                                                    </div>
                                                </form>

                                                <!-- /.card -->

                                            </div><!-- /.container-fluid -->
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
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