<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "وارد کردن اکسل";
  $category = "ثبت نام";
?>
<?php include_once '../assets/head.php'; ?>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->

    <?php include_once '../assets/aside.php'; ?>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <!-- Navbar -->

      <?php include_once '../assets/nav.php' ?>

      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 col-12 mb-md-0 mb-4">
                  <div class="card">
                    <div class="w-75 m-auto pb-5">
                      <h3 class="card-header mt-5">ثبت نام</h3>
                      <div class="card-body">
                        <p style="font-size: 20px">وارد کردن لیست دانش آموزن از فایل اکسل</p>
                        <p class="text-danger">توجه: دقت کنید که ترتیب ستون ها به صورت " کد ملی / نام / نام خانوادگی /
                          نام پدر "
                          باشد</p>

                        <?php if (isset($_GET['ext-not-defined'])) { ?>
                          <div class="alert alert-warning"> <?php print ($_GET['ext-not-defined']); ?>  </div>
                        <?php } ?>

                        <form class="form pb-5 mt-5" method="POST" dir="rtl" enctype="multipart/form-data">

                          <div class="row">
                            <div class="col-md-3">
                              <label for="sel-school" class="pb-2">مدرسه</label>
                              <select name="sel-school" onchange="changeSelectOption(this.value)"
                                      class="form-select mb-4"
                                      id="sel-school" tabindex="1" style="padding-right: 40px">
                                <option selected disabled>مدرسه را انتخاب کنید</option>
                                <?php
                                  $sql = "SELECT * FROM schools";
                                  $resualt = $pdo->prepare($sql);
                                  $resualt->execute();
                                  $roww = $resualt->fetchAll(PDO::FETCH_ASSOC);
                                  foreach ($roww as $row) {
                                    ?>
                                    <option style="direction: rtl"
                                            value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                  <?php } ?>

                              </select>
                            </div>
                            <div class="col-md-3">
                              <label for="sel-class" class="pb-2">کلاس</label>
                              <select name="sel-class" class="form-select mb-4" onchange="cshowGrade(this.value)"
                                      id="sel-class" tabindex="2" style="padding-right: 40px">
                                <option selected class="pe-5" disabled> کلاس را انتخاب کنید</option>
                              </select>
                            </div>

                            <div class="col-md-3">
                              <label for="grade" class="pb-2">پایه</label>
                              <input name="grade" class="input mb-4" id="grade">
                            </div>
                            <div class="col-md-3">
                              <label for="grade" class="pb-2">رشته</label>
                              <input name="major" class="input mb-4" id="major">
                            </div>
                          </div>


                          <label style="font-size: 15px" for="formFile" class="form-label mt-3">فایل اکسل مورد نظر را
                            انتخاب
                            کنید</label>

                          <input type="file" style="border: 2px solid #cacaca !important;" class="form-control mt-2"
                                 name="import_file" id="import_file">

                          <input type="submit" name="save_multiple_data" class="btn btn-primary d-block m-auto mt-4"
                                 value="بارگذاری">

                        </form>

                      </div>

                      <?php
                        $conn = mysqli_connect("localhost", "vswtsdio_hossein", "8v6lZR0S@d3x*Z", "");
                        mysqli_select_db($conn, 'vswtsdio_1402s1403');
                        require '../vendor/autoload.php';
                        if (isset($_POST['save_multiple_data'])) {
                          $major = $_POST['major'];
                          $school = $_POST['sel-school'];
                          $grade = $_POST['grade'];
                          $class = $_POST['sel-class'];
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
                            $s_major = $major;
                            $s_school = $school;
                            $s_grade = $grade;
                            $s_class = $class;
                            $sql = "SELECT * FROM studentlist WHERE codemeli=$s_codemeli";
                            $query_run = mysqli_query($conn, $sql);
                            $rowcount = mysqli_num_rows($query_run);
                          if ($rowcount <= 0) {
                            $queryy = "INSERT INTO `studentlist`(codemeli,fname, lname, fathername , major, school, grade, class) VALUES ('$s_codemeli','$s_fname','$s_lname','$s_fathername','$s_major','$s_school','$s_grade','$s_class')";
                            $queryy_run = mysqli_query($conn, $queryy);
                          if ($queryy_run) { ?>
                            <div id="alertss" class="float-start alert alert-success w-50 block p-1 mb-1">
                              دانش آموز
                              <?php echo $s_fname . " " . $s_lname . " با کد ملی " . $s_codemeli ?>
                               ثبت نام شد
                            </div>
                            <?php
                          } ?>
                          <?php } else { ?>
                            <div id="alertss" class="float-start alert alert-primary w-50 block p-1 mb-1">
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


                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->


          <!-- Footer -->
          <?php include_once '../assets/page-footer.php'; ?>
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


  <script>

    function changeSelectOption(str) {

      if (str == "") {
        document.getElementById("sel-school").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sel-class").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "../assets/searchClass.php?school=" + str);
        xmlhttp.send();
      }
    }

    function cshowGrade(str) {
      if (str == "") {
        document.getElementById("grade").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var grade = data[0][2];
            var major = data[0][3];
            console.log(grade, major)
            document.getElementById("grade").value = grade;
            document.getElementById("major").value = major;
          }
        };
        xmlhttp.open("GET", "../assets/searchClass.php?grade=" + str);
        xmlhttp.send();
      }
    }

  </script>


<?php include_once '../assets/footer.php'; ?>