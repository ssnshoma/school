<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';

  $profileDetails = getProfilePicName();
  $title = "نمرات پایانی";
  $category = "نمره";
  if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $deleteQry = "DELETE FROM `monmark` WHERE id=$deleteid";
    $RunDelete = $pdo->prepare($deleteQry);
    $RunDelete->execute();
    unset($_GET['deleteid']);
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
                        <div class="row flex-row" style="direction: rtl">
                          <div>
                            <h4 class="card-title text-primary">دریافت نمرات پایانی دانش آموز</h4>
                          </div>
                          <div class="col-md-4">
                            <label for="school" class="pb-1">مدرسه</label>
                            <select name="school" onchange="showClasses(this.value)"
                                    class="form-select mb-1"
                                    id="school" tabindex="1" style="padding-right: 40px" required>
                              <option selected disabled value="">مدرسه را انتخاب کنید</option>
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
                            <label for="class" class="pb-1">کلاس</label>
                            <select name="class" class="form-select mb-1" onchange="showStudents(this.value)"
                                    id="class" tabindex="2" style="padding-right: 40px" required>
                              <option selected class="pe-5" value="" disabled> کلاس را انتخاب کنید</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label for="codemeli" class="pb-1">دانش آموز</label>
                            <select name="codemeli" class="form-select mb-1" onchange="showmarks(this.value)"
                                    id="students" tabindex="3" style="padding-right: 40px" required>
                              <option selected class="pe-5" value="" disabled> دانش آموز را انتخاب کنید</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <div class="card">
                  <div class="d-flex align-items-center row">
                    <div class="col-sm-12 m-auto">
                      <div class="card-body">
                        <div class="row">
                          <div class="m-auto text-nowrap" id="avgmarkstable">
                            <table class="table text-nowrap" dir="rtl">
                              <thead>
                              <tr>
                                <td class="center">ردیف</td>
                                <td class="center">نام و نام خانوادگی</td>
                                <td class="center">مدرسه(کلاس)</td>
                                <td class="center">نوع</td>
                                <td class="center">شرح</td>
                                <td class="center">عملیات</td>
                              </tr>
                              </thead>
                              <tbody id="markslist">
                              <?php
                                $schoolMonthQuery = "SELECT studentlist.fname,studentlist.lname,studentlist.class,studentlist.school,studentlist.fathername,studentlist.codemeli,studentlist.fname,enzebat.codemeli,enzebat.date,enzebat.details,enzebat.type,enzebat.id FROM `studentlist` join `enzebat` on studentlist.codemeli=enzebat.codemeli ORDER BY lname,class";
                                $schoolMonth = $pdo->prepare($schoolMonthQuery);
                                $schoolMonth->execute();
                                $row = $schoolMonth->fetchAll();
                                $i = 1;
                                foreach ($row as $row) {
                                  ?>
                                  <tr>
                                    <td class="text-dark center"><?php echo $i; ?></td>
                                    <td class="text-dark center"><?php echo $row['fname'] . " " . $row['lname']; ?>
                                      <span> <?php echo " (" . $row['fathername'] . ")" ?></span>
                                    </td>
                                    <td
                                      class="text-dark center"><?php echo $row['school'] . " (" . $row['class'] . ")"; ?></td>
                                    <td class="text-dark center">
                                      <?php if ($row['type'] == "مثبت") {
                                        ?>
                                        <span class="text-success"><i class="bx bx-check-square"></i></span>
                                        <?php
                                      } else {
                                        ?>
                                        <span class="text-danger"><i class="bx bx-check-square"></i></span>
                                        <?php
                                      } ?>
                                    </td>
                                    <td class="text-dark center"><?php echo $row['details']; ?></td>
                                    <td class="center">
                                      <a href="../assets/mark-opration.php?editidD=<?php echo $row['id']; ?>"
                                         class="btn btn-sm btn-warning m-0 p-1">
                                        <i class="bx bx-edit-alt"></i>
                                      </a>
                                      <a href="check-final-marks.php?deleteid=<?php echo $row['id']; ?>"
                                         class="btn btn-sm btn-danger m-0 p-1">
                                        <i class="bx bx-trash"></i>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php
                                  $i++;
                                } ?>
                              </tbody>
                            </table>
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
    <script>
      function selectedSchool(str) {
        document.getElementById("markslist").innerHTML = "";
        if (str != "") {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("class").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/find-student.php?ShowSchoolData=" + str);
          xmlhttp.send();
        }
      }

      function showClasses(str) {
        selectedSchool(str)
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