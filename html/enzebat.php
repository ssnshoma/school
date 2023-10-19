<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $profileDetails = getProfilePicName();
  $title = "نمرات ماهانه";
  $category = "نمره";
  if (isset($_POST['save'])) {
    $codemeli = $_POST['codemeli'];
    $details = $_POST['details'];
    $type = $_POST['type'];
    $date=date('Y-m-d');
    $deleteQry = "INSERT INTO `enzebat`(`codemeli`, `type`, `date`, `details`) VALUES ('$codemeli','$type','$date','$details')";
    $RunDelete = $pdo->prepare($deleteQry);
    $RunDelete->execute();
  }
  include_once '../assets/head.php';
?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include_once '../assets/aside.php'; ?>
      <div class="layout-page">
        <?php include_once '../assets/nav.php' ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row flex-row-reverse">
              <div>
                <div class="card">
                  <div class="d-flex align-items-center row">
                    <div class="col-sm-12 m-auto">
                      <div class="card-body">
                        <form method="post">
                          <div class="row flex-row" style="direction: rtl">
                            <div>
                              <h4 class="card-title text-primary pb-3">ثبت موارد تشویقی / انظباتی</h4>
                            </div>
                            <div class="col-md-4">
                              <label for="school" class="pb-1">مدرسه</label>
                              <select name="school" required onchange="showClasses(this.value)"
                                      class="form-select mb-1"
                                      id="school" tabindex="1" style="padding-right: 40px">
                                <option selected value="" disabled>مدرسه را انتخاب کنید</option>
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
                            <div class="col-md-4">
                              <label for="sel-class" class="pb-1">کلاس</label>
                              <select required name="sel-class" class="form-select mb-1" onchange="showStudents(this.value)"
                                      id="class" tabindex="2" style="padding-right: 40px">
                                <option selected class="pe-5" value="" disabled> کلاس را انتخاب کنید</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="sel-class" class="pb-1">دانش آموز</label>
                              <select required name="codemeli" class="form-select mb-1" onchange="showmarks(this.value)"
                                      id="students" tabindex="3" style="padding-right: 40px">
                                <option selected class="pe-5" value="" disabled> دانش آموز را انتخاب کنید</option>
                              </select>
                            </div>
                          </div>
                          <div class="row flex-row justify-content-between mt-4" dir="rtl">
                            <div class="col-md-7">
                              <label for="">شرح</label>
                              <input type="text" class="input m-auto" name="details" required>
                            </div>
                            <div class="col-md-5">
                              <label for="">نوع</label>
                              <select name="type" class="input" required>
                                <option value="" selected disabled>تشویقی یا انظباتی را انتخاب کنید</option>
                                <option value="مثبت">مثبت</option>
                                <option value="منفی">منفی</option>
                              </select>
                            </div>
                          </div>
                          <div class="row d-flex flex-row justify-content-around mt-5 mb-5 w-50 m-auto">
                            <input type="submit" class="btn btn-success w-25" value="ثبت" name="save">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <script>
      function showClasses(str) {
        if (str == "") {
          document.getElementById("class").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("class").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/find-student.php?school=" + str);
          xmlhttp.send();
        }
      }

      function showStudents(str) {
        if (str == "") {
          document.getElementById("students").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("students").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/find-student.php?class=" + str);
          xmlhttp.send();
        }
      }
    </script>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
<?php include_once '../assets/footer.php'; ?>