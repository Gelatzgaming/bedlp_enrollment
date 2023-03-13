
<!doctype html>
<html lang="en" dir="ltr">
  
    <?php include '../../includes/bed-header.php'; ?>

  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
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
<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Total Sales</p>
                           <h4 class="counter">$560K</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Total Profit</p>
                           <h4 class="counter">$185K</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Total Cost</p>
                           <h4 class="counter">$375K</h4>
                        </div>
                     </div>
                  </div>
               </li>  
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
</div>
<!-- <?php if ($_SESSION['role'] == "Accounting" || $_SESSION['role'] == "Admission" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Adviser" || $_SESSION['role'] == "Principal") {
                    include 'dblp.general.php';
                } else if ($_SESSION['role'] == "Student") {

                    $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                    WHERE student_id = '$stud_id' AND semester_id = '0' AND ay_id = '$acad'") or die(mysqli_error($conn));
                    $result = mysqli_num_rows($get_level_id);

                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($get_level_id)) {
                            $grade_level = $row['grade_level_id'];
                        }
                    } else {

                        $get_level_id = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                    WHERE student_id = '$stud_id' AND semester_id = '$sem' AND ay_id = '$acad'") or die(mysqli_error($conn));
                        $result2 = mysqli_num_rows($get_level_id);

                        if ($result2 > 0) {
                            while ($row = mysqli_fetch_array($get_level_id)) {
                                $grade_level = $row['grade_level_id'];
                            }
                        }
                    }

                    if (!empty($grade_level)) {
                        if ($grade_level > 13) {
                            include 'dblp.student.senior.php';
                        } else if ($grade_level < 14) {
                            include 'dblp.student.php';
                        }
                    } else {
                        include 'dblp.student.senior.php';
                    }
                } else {
                    header('location: ../bed-500/page500.php');
                }
                ?> -->
    </div>

      <!-- Footer Section Start -->

      <?php include '../../includes/bed-footer.php' ?>

      <!-- Footer Section End -->    </main>
    
      <?php  include '../../includes/bed-script.php' ?>
    
  </body>
</html>