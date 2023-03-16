
<!doctype html>
<html lang="en" dir="ltr">
<title>Accounting Sign Up | SFAC Las Pinas</title>
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
      <div>
         <div class="row">
            <div class="col-sm-12 col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title"> Edit accounting</h4>
                        <p class="text-muted font-14 mb-4">Fill up the forms.
                     </div>
                  </div>
                  <div class="card-body" style="color:black;">
                     
                     <form action="userData/user.edit.accounting.php" method="POST" enctype="multipart/form-data">

                     <?php
                                            if (!empty($_SESSION['errors'])) {
                                                echo ' <div class="alert alert-solid alert-danger rounded-0 alert-dismissible fade show " role="alert">
                                                 ';
                                                foreach ($_SESSION['errors'] as $error) {
                                                    echo $error;
                                                }
                                                echo '
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" "></button>
                                                </div>
                                            </div>';
                                                unset($_SESSION['errors']);
                                            } elseif (!empty($_SESSION['success'])) {
                                                echo ' <div class="alert alert-solid alert-success rounded-0 alert-dismissible fade show " role="alert">
                                                    <strong>Successfully Edited.</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                                </div>
                                            </div> ';
                                                unset($_SESSION['success']);
                                            }
                                          
                                            $get_accounting = $conn->query("SELECT * FROM tbl_accountings WHERE acc_id = '$_GET[acc_id]'");
                                            $res_count = $get_accounting->num_rows;
                                            if ($res_count == 0) {
                                                // error code
                                            }
                                            $row = $get_accounting->fetch_array();

                                            ?>
                                            <input class="form-control" type="text" name="acc_id"
                                                value="<?php echo $row['acc_id']; ?>" hidden>

                        <div class="row">
                                    <div class="form-group mb-4">
                                        <div class="custom-file">
                                            <div class="text-center mb-3">
                                                <img class="img-fluid img-circle" src="../../assets/images/icons/user.png "
                                                    alt="User profile picture" style="width: 145px; height: 145px;">
                                            </div>
                                            <div class="row">
                                                <div class="form-group m-auto col-md-4">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control" name="prof_img" required>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           <div class="col-md-4 mb-3">
                              <label class="form-label" for="example-text-input">First name</label>
                              <input type="text" class="form-control" id="example-text-input" name="accounting_fname" placeholder="First name" value="<?php echo $row['accounting_fname']; ?>" required>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label class="form-label" for="example-text-input">Middle name</label>
                              <input type="text" class="form-control" id="example-text-input" name="accounting_mname" placeholder="Middle name" value="<?php echo $row['accounting_mname']; ?>" required>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label class="form-label" for="example-text-input">Last name</label>
                              <input type="text" class="form-control" id="example-text-input" name="accounting_lname" placeholder="Last name" value="<?php echo $row['accounting_lname']; ?>" required>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="example-email-input" class="form-label">Email</label>
                                 <input type="text" class="form-control" id="example-email-input" aria-label="Email" aria-describedby="basic-addon1" name="email" placeholder="example@gmail.com"  value="<?php echo $row['email']; ?>"required>                             
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="example-text-input" class="form-label">Username</label>
                                 <input type="text" class="form-control" id="example-text-input" aria-label="Username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" required>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label" for="example-text-input">Password</label>
                              <input type="password" class="form-control" id="example-text-input" name="password" placeholder="Password">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label" for="example-text-input">Confirm Password</label>
                              <input type="password" class="form-control" id="example-text-input" name="password2" placeholder="Confirm Password">
                            </div>
                           
                        </div>
                        <div class="form-group float-end">
                           <button class="btn btn-danger" type="submit" name="submit" >Edit accounting</button>
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

      <!-- Footer Section End -->    </main>
    
      <?php  include '../../includes/bed-script.php' ?>
    
  </body>
</html>