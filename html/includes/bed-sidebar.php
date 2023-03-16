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
            <!-- <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div> -->
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
                                    <a class="nav-link " href="../dashboard/index-horizontal.html">
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
                                    <a class="nav-link " href="../dashboard/index-horizontal.html">
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
                                    <a class="nav-link " href="../dashboard/index-horizontal.html">
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
                                    <a class="nav-link " href="../dashboard/index-horizontal.html">
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
                                    <a class="nav-link " href="../dashboard/index-horizontal.html">
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
                                    <a class="nav-link " href="../dashboard/index-horizontal.html">
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
                        } ?>
                    
                </ul>
                <!-- Sidebar Menu End -->        </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside> 