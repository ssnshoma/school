<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
$logifo = $_SESSION['log-info'];
$profileDetails = getProfilePicName();
$title = "وارد کردن اکسل";
$category="ثبت نام";
?>
<?php include_once '../assets/head.php'; ?>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->

    <?php include_once '../assets/aside.php';?>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <!-- Navbar -->

      <?php include_once '../assets/nav.php' ?>

      <!-- / Navbar -->

      <?php
      $connection = mysqli_connect("localhost", "root", "", "");
      mysqli_select_db($connection, '1402s1403');
      require '../vendor/autoload.php';
      if (isset($_POST['save_multiple_data'])) {
        $fileName = $_FILES['import_file']['name'];
        $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowed_ext = ['xls', 'csv', 'xlsx'];
        if (in_array($file_ext, $allowed_ext)) {
          $inputFileName = $_FILES['import_file']['tmp_name'];
          $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
          $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $row) {
          $s_codemeli = $row['0'];
          $s_fname = $row['1'];
          $s_lname = $row['2'];
          $s_fathername = $row['3'];
          $s_major = $row['4'];
          $s_school = $row['5'];
          $s_grade = $row['6'];
          $s_class = $row['7'];
          $sql = "SELECT * FROM studentlist WHERE codemeli=$s_codemeli";
          $query_run = mysqli_query($connection, $sql);
          $rowcount = mysqli_num_rows($query_run);
        if ($rowcount <= 0) {
          $queryy = "INSERT INTO `studentlist`(codemeli,fname, lname, fathername , major, school, grade, class) VALUES ('$s_codemeli','$s_fname','$s_lname','$s_fathername','$s_major','$s_school','$s_grade','$s_class')";
//          $queryy = "INSERT INTO `studentlist`(codemeli,fname, lname, fathername , major, school, grade, class) VALUES ('$s_codemeli','$s_fname','$s_lname','$s_fathername','$s_major','$s_school','$s_grade','$s_class')";
          $queryy_run = mysqli_query($connection, $queryy);
          if ($queryy_run) {
          } ?>
          <?php } else { ?>
          <div class="float-start alert alert-primary w-50 block p-1 mb-1">
            دانش آموز
            <?php echo $s_fname . " " . $s_lname . " با کد ملی " . $s_codemeli ?>
            قبلا ثبت نام شده است
          </div>
        <?php }
        }
        } else {
        ?>
          <script> console.log("فرمت غلطه خب") </script>
          <?php
          $_GET['ext-not-defined'] = "فرمت فایل انتخاب شده نادرست می باشد";
        }
      }
      ?>

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 col-12 mb-md-0 mb-4">
                  <div class="card">
                    <div class="w-75 m-auto">
                      <h3 class="card-header mt-5">ثبت نام</h3>
                      <div class="card-body">
                        <p style="font-size: 20px">وارد کردن لیست دانش آموزن از فایل اکسل</p>
                        <p class="text-danger">توجه: دقت کنید که ردیف اول فایل نیز وارد می شود</p>

                        <?php if (isset($_GET['ext-not-defined'])) { ?>
                          <div class="alert alert-warning"> <?php print ($_GET['ext-not-defined']); ?>  </div>
                        <?php } ?>

                        <form class="form pb-5" method="POST" enctype="multipart/form-data">

                          <label style="font-size: 15px" for="formFile" class="form-label mt-3">فایل اکسل مورد نظر را
                            انتخاب
                            کنید</label>

                          <input type="file" style="border: 2px solid #cacaca !important;" class="form-control mt-2"
                                 name="import_file" id="import_file">

                          <input type="submit" name="save_multiple_data" class="btn btn-primary d-block m-auto mt-4"
                                 value="بارگذاری">

                        </form>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php include_once '../assets/page-footer.php';?>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->


<?php include_once '../assets/footer.php'; ?>