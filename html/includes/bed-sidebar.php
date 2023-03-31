<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="../bed-dashboard/index.php" class="navbar-brand">
            <!--Logo start-->
            <!--logo End-->

            <img src="../../assets/images/auth/logo.png" alt="SFAC-Logo" height="25%" width="25%">
            <h4 class="logo-title"><?php echo $school_name; ?> <br> <small
                    class="text-sm"><?php echo $school_address; ?>
                </small></h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">

                <!-- MASTER KEY -->
                <?php if ($_SESSION['role'] == "Master Key") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="fa fa-plus"></i>
                            <span class="item-name">Add Users</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                            </a>
                            <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/add.registrar.php">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Add Registrar </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/add.principal.php">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Add Principal </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/add.adviser.php">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Add Adviser </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/add.teacher.php">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Add Teacher </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/add.admission.php">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Add Admission </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/add.accounting.php">
                                    <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name"> Add Accounting </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                            
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special" role="button" aria-expanded="false" aria-controls="sidebar-special">
                            <i class="fa fa-plus"></i>
                            <span class="item-name">User Lists</span>
                            <i class="right-icon">
                             <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-special" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/list.registrar.php">
                                        <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                        <span class="item-name"> Registrar List</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/list.principal.php">
                                        <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                        <span class="item-name"> Principal List</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/list.adviser.php">
                                        <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                        <span class="item-name"> Adviser List </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/list.teacher.php">
                                        <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                        <span class="item-name"> Teacher List </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/list.admission.php">
                                        <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                        <span class="item-name"> Admission List </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="../bed-super-admin/list.accounting.php">
                                        <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                        <span class="item-name"> Accounting List </span>
                                    </a>
                                </li>
                        </ul>
                    </li>';
                    //   END OF MASTER KEY

                    // REGISTRAR SIDE
                } elseif ($_SESSION['role'] == "Registrar") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu">
                        <i class="fa fa-list"></i>
                        <span class="item-name">Enrollment</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-enrollment/list.pending.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Confirmed Students </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#maintenance" role="button"
                        aria-expanded="false" aria-controls="maintenance">
                        <i class="fa fa-cogs"></i>
                        <span class="item-name">Maintenance</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="maintenance" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-students/list.student.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Student List </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/list.adviser.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Adviser List </span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#subj-list" role="button"
                        aria-expanded="false" aria-controls="subj-list">
                        <i class="fa fa-book"></i>
                        <span class="item-name">Subject List</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="subj-list" data-bs-parent="#subj-list">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/list.sub.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Senior </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/list.sub.k-10.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Primary - Junior </span>
                            </a>
                        </li>
                    </ul>
                    </li> 
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#data-ent" role="button"
                        aria-expanded="false" aria-controls="data-ent">
                        <i class="fa fa-user-plus"></i>
                        <span class="item-name">Data Entry</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="data-ent" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-students/add.student.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Student </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/add.adviser.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Adviser </span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#subj-add" role="button"
                        aria-expanded="false" aria-controls="subj-add">
                        <i class="fa fa-plus-square"></i>
                        <span class="item-name">Add Subjects</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="subj-add" data-bs-parent="#subj-add">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/add.sub.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Senior </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/add.sub.k-10.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Primary - Junior </span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#class-sched" role="button"
                        aria-expanded="false" aria-controls="class-sched">
                        <i class="fa fa-file-code-o"></i>
                        <span class="item-name">Forms</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="class-sched" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-forms/pre-en-plain.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Pre-Enrollment </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-forms/allformsnodata.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Reg Form </span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#viewsub" role="button"
                        aria-expanded="false" aria-controls="viewsub">
                        <i class="fa fa-binoculars"></i>
                        <span class="item-name">View Subjects</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="viewsub" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/abm.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> ABM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/stem.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> STEM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/humms.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> HUMMS </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-he.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-HE </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-ict.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-ICT </span>
                            </a>
                        </li>
                    </ul>
                    </li> 
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sch_set" role="button"
                    aria-expanded="false" aria-controls="sch_set">
                    <i class="fa fa-cogs"></i>
                    <span class="item-name">School Settings</span>
                    <i class="right-icon">
                        <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </i>
                </a>
                <ul class="sub-nav collapse" id="sch_set" data-bs-parent="#sidebar-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="../bed-semester/add.sem.php">
                            <i class="icon">
                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                            <i class="sidenav-mini-icon"> H </i>
                            <span class="item-name"> Semester </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../bed-date/add.date.php">
                            <i class="icon">
                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                            <i class="sidenav-mini-icon"> H </i>
                            <span class="item-name"> Academic Year </span>
                        </a>
                    </li>
                </ul>
                </li>';
                } elseif ($_SESSION['role'] == "Teacher") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>';
                } elseif ($_SESSION['role'] == "Principal") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#maintenance" role="button"
                        aria-expanded="false" aria-controls="maintenance">
                        <i class="fa fa-cogs"></i>
                        <span class="item-name">Maintenance</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="maintenance" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/list.adviser.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Adviser List </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/list.teacher.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Teacher List </span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#data-ent" role="button"
                        aria-expanded="false" aria-controls="data-ent">
                        <i class="fa fa-user-plus"></i>
                        <span class="item-name">Data Entry</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="data-ent" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/add.adviser.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Adviser </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/add.teacher.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Teacher </span>
                            </a>
                        </li>
                    </ul>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#viewsub" role="button"
                        aria-expanded="false" aria-controls="viewsub">
                        <i class="fa fa-binoculars"></i>
                        <span class="item-name">View Subjects</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="viewsub" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/abm.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> ABM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/stem.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> STEM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/humms.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> HUMSS </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-he.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-HE </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-ict.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-ICT </span>
                            </a>
                        </li>
                    </ul>
                    </li> ';
                } elseif ($_SESSION['role'] == "Admission") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu">
                        <i class="fa fa-list"></i>
                        <span class="item-name">Enrollment</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-enrollment/list.pending.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Pending Students </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-online-enrollment/online.list.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Online Inquiries </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#maintenance" role="button"
                        aria-expanded="false" aria-controls="maintenance">
                        <i class="fa fa-cogs"></i>
                        <span class="item-name">Maintenance</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="maintenance" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-students/list.student.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Student List </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#data-ent" role="button"
                        aria-expanded="false" aria-controls="data-ent">
                        <i class="fa fa-user-plus"></i>
                        <span class="item-name">Data Entry</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="data-ent" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-students/add.student.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Students </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#class-sched" role="button"
                        aria-expanded="false" aria-controls="class-sched">
                        <i class="fa fa-clock-o"></i>
                        <span class="item-name">Class Schedule</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="class-sched" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-schedules/list.sched.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Senior </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-schedules/list.sched.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Primary - Junior </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#offersub" role="button"
                        aria-expanded="false" aria-controls="offersub">
                        <i class="fa fa-calendar"></i>
                        <span class="item-name"><small>Offer/Open Subjects</small></span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="offersub" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/list.offerSub.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Senior </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/list.offerSub.k-10.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Primary - Junior </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#viewsub" role="button"
                        aria-expanded="false" aria-controls="viewsub">
                        <i class="fa fa-binoculars"></i>
                        <span class="item-name">View Subjects</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="viewsub" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/abm.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> ABM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/stem.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> STEM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/humms.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> HUMSS </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-he.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-HE </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-ict.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-ICT </span>
                            </a>
                        </li>
                    </ul>
                    </li> 
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sch_set" role="button"
                    aria-expanded="false" aria-controls="sch_set">
                    <i class="fa fa-cogs"></i>
                    <span class="item-name">School Settings</span>
                    <i class="right-icon">
                        <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </i>
                </a>
                <ul class="sub-nav collapse" id="sch_set" data-bs-parent="#sidebar-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="../bed-semester/add.sem.php">
                            <i class="icon">
                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                            <i class="sidenav-mini-icon"> H </i>
                            <span class="item-name"> Semester </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../bed-date/add.date.php">
                            <i class="icon">
                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                    </g>
                                </svg>
                            </i>
                            <i class="sidenav-mini-icon"> H </i>
                            <span class="item-name"> Academic Year </span>
                        </a>
                    </li>
                </ul>
                </li>';
                } elseif ($_SESSION['role'] == "Adviser") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                        aria-expanded="false" aria-controls="horizontal-menu">
                        <i class="fa fa-list"></i>
                        <span class="item-name">Enrollment</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-enrollment/list.pending.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Pending Students </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-online-enrollment/online.list.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Online Inquiries </span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#maintenance" role="button"
                        aria-expanded="false" aria-controls="maintenance">
                        <i class="fa fa-cogs"></i>
                        <span class="item-name">Maintenance</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="maintenance" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-students/list.student.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Student List </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/list.adviser.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Adviser List </span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#subj-list" role="button"
                        aria-expanded="false" aria-controls="subj-list">
                        <i class="fa fa-book"></i>
                        <span class="item-name">Subject List</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="subj-list" data-bs-parent="#subj-list">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/list.sub.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Senior </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/list.sub.k-10.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Primary - Junior </span>
                            </a>
                        </li>
                    </ul>
                    </li> 
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#data-ent" role="button"
                        aria-expanded="false" aria-controls="data-ent">
                        <i class="fa fa-user-plus"></i>
                        <span class="item-name">Data Entry</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="data-ent" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-students/add.student.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Student </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-super-admin/add.adviser.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Add Adviser </span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#subj-add" role="button"
                        aria-expanded="false" aria-controls="subj-add">
                        <i class="fa fa-plus-square"></i>
                        <span class="item-name">Add Subjects</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="subj-add" data-bs-parent="#subj-add">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/add.sub.senior.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Senior </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-subjects/add.sub.k-10.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Primary - Junior </span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#class-sched" role="button"
                        aria-expanded="false" aria-controls="class-sched">
                        <i class="fa fa-file-code-o"></i>
                        <span class="item-name"> Forms</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="class-sched" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-forms/pre-en-plain.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Pre-Enrollment </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-forms/allformsnodata.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Reg Form </span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#viewsub" role="button"
                        aria-expanded="false" aria-controls="viewsub">
                        <i class="fa fa-binoculars"></i>
                        <span class="item-name">View Subjects</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="viewsub" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/abm.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> ABM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/stem.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> STEM </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/humms.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> HUMSS </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-he.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-HE </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../bed-hedCurr/tvl-ict.php">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> TVL-ICT </span>
                            </a>
                        </li>
                    </ul>
                    </li>';
                } elseif ($_SESSION['role'] == "Accounting") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#subj-add" role="button"
                        aria-expanded="false" aria-controls="subj-add">
                        <i class="fa fa-list"></i>
                        <span class="item-name">Enrollment</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="subj-add" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="../dashboard/index-horizontal.html">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> H </i>
                                <span class="item-name"> Confirm Students </span>
                            </a>
                        </li>
                    </ul>
                    </li>';
                } elseif ($_SESSION['role'] == "Student") {
                    echo '<li class="nav-item">
                            <a href="../bed-dashboard/index.php" class="nav-link active" aria-current="true">
                            <i class="fa fa-tachometer"></i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="../bed-students/edit.infoStud.php" class="nav-link" aria-current="true">
                            <i class="fa fa-id-card-o"></i>
                                <span class="item-name">Personal Info.</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../bed-students/add.enroll.php" class="nav-link" aria-current="true">
                            <i class="fa fa-globe" style="font-size:20px;"></i>
                            <span class="item-name">';
                    $get_active_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters");
                    while ($row = mysqli_fetch_array($get_active_sem)) {
                        $sem = $row['semester_id'];
                    }
                    $get_active_acad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears");
                    while ($row = mysqli_fetch_array($get_active_acad)) {
                        $acad = $row['ay_id'];
                    }
                    $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                                WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or
                        die(mysqli_error($conn));
                    $result = mysqli_num_rows($get_level_id);
                    if ($result > 0) {
                        echo 'Enrollment Info.</span>
                </a>
            </li>';
        } else {

            $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or
                die(mysqli_error($conn));
            $result2 = mysqli_num_rows($get_level_id);

            if ($result2 > 0) {
                echo 'Enrollment Info.</span>
            </a>
            </li>';
                        } else {
                            echo 'Enroll Now</span>
            </a>
            </li>';
                        }
                    }
                }  ?>

            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>