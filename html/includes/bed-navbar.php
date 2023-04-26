<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
    <div class="container-fluid navbar-inner">

        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                </svg>
            </i>
        </div>
        <div class="input-group search-input">
            <span class="input-group-text" id="search-input">
                <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                    <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <input type="search" class="form-control" placeholder="Search...">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <span class="mt-2 navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">



                <li class="nav-item dropdown">
                    <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        if (!empty($user_img)) {
                        ?>
                            <img src="data:image/jpeg;base64, <?php echo base64_encode($user_img); ?>" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                        <?php
                        } else {
                        ?>
                            <img src="../../assets/images/icons/user.png" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                        <?php
                        }
                        ?>


                        <div class="caption ms-3 d-none d-md-block ">
                            <h6 class="mb-0 caption-title"><?php echo $user_fullname; ?></h6>
                            <p class="mb-0 caption-sub-title text-center"><?php echo $_SESSION['role'] ?></p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php if ($_SESSION['role'] == 'Registrar') {
                            echo '<li><a class="dropdown-item" href="../bed-super-admin/edit.registrar.php?reg_id=' . $reg_id . '">Edit Profile</a></li>';
                        } elseif ($_SESSION['role'] == 'Admission') {
                            echo '<li><a class="dropdown-item" href="../bed-super-admin/edit.admission.php?admission_id=' . $admission_id . '">Edit Profile</a></li>';
                        } elseif ($_SESSION['role'] == 'Adviser') {
                            echo '<li><a class="dropdown-item" href="../bed-super-admin/edit.adviser.php?ad_id=' . $ad_id . '">Edit Profile</a></li>';
                        } elseif ($_SESSION['role'] == 'Principal') {
                            echo '<li><a class="dropdown-item" href="../bed-super-admin/edit.principal.php?prin_id=' . $prin_id . '">Edit Profile</a></li>';
                        } elseif ($_SESSION['role'] == 'Teacher') {
                            echo '<li><a class="dropdown-item" href="../bed-super-admin/edit.teacher.php?teacher_id=' . $teacher_id . '">Edit Profile</a></li>';
                        } elseif ($_SESSION['role'] == 'Accounting') {
                            echo '<li><a class="dropdown-item" href="../bed-super-admin/edit.accounting.php?acc_id=' . $acc_id . '">Edit Profile</a></li>';
                        } elseif ($_SESSION['role'] == 'Student') {
                            echo '<li><a class="dropdown-item" href="../bed-students/edit.student.php?student_id=' . $stud_id . '">Edit Profile</a></li>';
                        }
                        ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../bed-login/userData/user.logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> <!-- Nav Header Component Start -->
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Welcome Franciscans!</h1>
                        <p>Be one of US!</p>
                    </div>
                    <div>
                        <a href="https://www.facebook.com/SFACCollegeLasPinas/" class="btn btn-link btn-soft-light">
                            <i class="fa fa-facebook-square mr-2" style="font-size: 25px; margin-right: 5px; position:relative; top: 3px;"> </i>
                            Home page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="../../assets/images/dashboard/sfac.jpg" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">

    </div>
</div>