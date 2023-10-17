<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  
  $profileDetails = getProfilePicName();
  $title = "ثبت نام گروهی";
  $category = "ثبت نام";
  include_once '../assets/head.php'; ?>
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include_once '../assets/aside.php'; ?>
    <div class="layout-page">
      <?php include_once '../assets/nav.php' ?>
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="d-flex align-items-center row">
                  <div class="col-sm-12 m-auto">
                    <div class="card-body">
                      <?php if (isset($_GET['data-inserted'])) { ?>
                        <div id="alerts" class="position-absolute alert alert-success text-danger"
                             style="top: 30px;left: 45%">
                          <?php print ($_GET['data-inserted']) ?>
                        </div>
                        <?php unset($_GET['data-inserted']);
                      } ?>
                      <?php if (isset($_GET['data-not-inserted'])) { ?>
                        <div id="alerts" class="position-absolute alert alert-danger text-danger"
                             style="top: 30px;left: 45%">
                          <?php print ($_GET['data-not-inserted']) ?>
                        </div>
                        <?php unset($_GET['data-not-inserted']);
                      } ?>
                      <h5 class="card-title text-primary mt-4">مدرسه را انتخاب کنید</h5>
                      <p class="mt-4">برای ثبت نام دانش آموز به صورت گروهی ابتدا مدرسه و کلاس انتخاب کنید سپس موارد را
                        تکمیل
                        کنید</p>

                      <div class="input-group">
                        <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
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
                              <input name="grade" class="input mb-4" id="grade" tabindex="-1">
                            </div>
                            <div class="col-md-3">
                              <label for="grade" class="pb-2">رشته</label>
                              <input name="major" class="input mb-4" id="major" tabindex="-1">
                            </div>
                          </div>

                          <div class="row border-bottom mb-4">
                            <div class="col-md-3">
                              <label for="codemeli" class="pb-2">کد ملی</label>
                              <input type="text" class="mb-4 input" name="codemeli[]" tabindex="3">
                            </div>
                            <div class="col-md-3">
                              <label for="fname" class="pb-2">نام</label>
                              <input type="text" class="mb-4 input" name="fname[]" tabindex="4">
                            </div>
                            <div class="col-md-3">
                              <label for="lname" class="pb-2">نام خانوادگی</label>
                              <input type="text" class="mb-4 input" name="lname[]" tabindex="5">
                            </div>
                            <div class="col-md-3">
                              <label for="fathername" class="pb-2">نام پدر</label>
                              <input type="text" class="mb-4 input" name="fathername[]" tabindex="6">
                            </div>
                          </div>

                          <div class="paste-new-forms"></div>

                          <div class="row w-75 m-auto" style="justify-content: space-evenly">
                            <div class="col-md-4"><input type="submit" name="save_multiple_data" value="ثبت"
                                                         class="btn btn-primary w-100"
                                                         tabindex="39"></div>
                            <div class="col-md-4">
                              <a class="add-more-form text-white btn btn-info w-100" tabindex="40">افزودن</a>
                            </div>
                          </div>
                        </form>
                        <?php
                          if (isset($_POST['save_multiple_data'])) {
                          $codemeli = $_POST['codemeli'];
                          $fname = $_POST['fname'];
                          $lname = $_POST['lname'];
                          $fathername = $_POST['fathername'];
                          $major = $_POST['major'];
                          $school = $_POST['sel-school'];
                          $grade = $_POST['grade'];
                          $class = $_POST['sel-class'];
                          foreach ($codemeli

                          as $index => $codemeli) {
                          $s_codemeli = $codemeli;
                          $s_fname = $fname[$index];
                          $s_lname = $lname[$index];
                          $s_fathername = $fathername[$index];
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
                          if ($queryy_run) {
                        ?>
                        <div id="alertss" class="alert alert-success w-50 block p-1 mb-1 mt-3"
                             style="direction: rtl;margin-left: auto">
                          دانش آموز
                          <?php echo $s_fname . " " . $s_lname . " با کد ملی " . $s_codemeli ?>
                          ثبت نام شد
                          <?php
                            } ?>
                          <?php } else { ?>
                            <div id="alertss" class="alert alert-primary w-50 block p-1 mb-1 mt-3"
                                 style="direction: rtl;margin-left: auto">
                              دانش آموز
                              <?php echo $s_fname . " " . $s_lname . " با کد ملی " . $s_codemeli ?>
                              قبلا ثبت نام شده است
                            </div>
                          <?php }
                            }
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
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
  <script>    $(document).ready(function () {
      $(document).on('click', '.remove-btn', function () {
        $(this).closest('.main-form').remove();
      });
      $(document).on('click', '.add-more-form', function () {
        console.log("ok");
        $('.paste-new-forms').append('<div class="main-form mt-3 mb-4 border-bottom float-left">' +
          '<div class="row mt-3">' +
          '<div class="col-md-3">' +
          '<label for="codemeli" class="pb-2">کد ملی</label>' +
          '<input type="text" class="mb-4 input" name="codemeli[]">' +
          '</div>' +
          '<div class="col-md-3">' +
          '<label for="fname" class="pb-2">نام</label>' +
          '<input type="text" class="mb-4 input" name="fname[]">' +
          '</div>' +
          '<div class="col-md-3">' +
          '<label for="lname" class="pb-2">نام خانوادگی</label>' +
          '<input type="text" class="mb-4 input" name="lname[]">' +
          '</div>' +
          '<div class="col-md-3">' +
          '<label for="fathername" class="pb-2">نام پدر</label>' +
          '<input type="text" class="mb-4 input" name="fathername[]">' +
          '</div>' +
          '<button type="button" class="remove-btn btn btn-danger w-px-100 m-auto mb-4">حذف</button>' +
          '</div>' +
          '</div>');
      });

    });
  </script>






