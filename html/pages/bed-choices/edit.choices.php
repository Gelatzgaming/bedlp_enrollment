<!doctype html>
<html lang="en" dir="ltr">
<title>Edit Choices | SFAC Las Pinas</title>
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
                  <h4 class="card-title"> Edit Choices</h4>
                  <p class="text-muted font-14 mb-4">Fill up the forms.
                </div>
              </div>
              <div class="card-body" style="color:black;">

                <form action="userData/user.edit.choices.php?info_id=<?php echo $_GET['info_id'] ?>" method="POST" enctype="multipart/form-data">

                  <?php
                  $get_info = $conn->query("SELECT * FROM tbl_information WHERE info_id = '$_GET[info_id]'");
                  $res_count = $get_info->num_rows;
                  if ($res_count == 0) {
                    // error code
                  }
                  $row = $get_info->fetch_array();

                  ?>
                  <input class="form-control" type="text" name="info_id" value="<?php echo $row['info_id']; ?>" hidden>

                  <div class="row justify-content-center">

                    <div class="col-md-8 mb-3">
                      <label class="form-label" for="example-text-input">Edit Choices</label>
                      <input type="text" class="form-control" id="example-text-input" name="info_name" placeholder="Information Name" value="<?php echo $row['info_name']; ?>" required>
                    </div>

                  </div>
                  <div class="form-group float-end">
                    <button class="btn btn-danger" type="submit" name="submit">Edit Choices</button>
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