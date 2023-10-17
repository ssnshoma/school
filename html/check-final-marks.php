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
                            <label for="selschool" class="pb-1">مدرسه</label>
                            <select name="selschool" onchange="changeSelectOption(this.value)"
                                    class="form-select mb-1"
                                    id="selschool" tabindex="1" style="padding-right: 40px">
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
                          <div class="col-md-4">
                            <label for="sel-class" class="pb-1">کلاس</label>
                            <select name="sel-class" class="form-select mb-1" onchange="cshowStudent(this.value)"
                                    id="sel-class" tabindex="2" style="padding-right: 40px">
                              <option selected class="pe-5" disabled> کلاس را انتخاب کنید</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label for="sel-class" class="pb-1">دانش آموز</label>
                            <select name="sel-class" class="form-select mb-1" onchange="showmarks(this.value)"
                                    id="students" tabindex="3" style="padding-right: 40px">
                              <option selected class="pe-5" disabled> دانش آموز را انتخاب کنید</option>
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
                                <td class="center">نام</td>
                                <td class="center">نام خانوادگی</td>
                                <td class="center">کلاس</td>
                                <td class="center">نمره</td>
                                <td class="center">نوبت</td>
                                <td class="center">عملیات</td>
                              </tr>
                              </thead>
                              <tbody id="markslist">
                              <?php
                                $schoolMonthQuery = "SELECT * FROM `monmark` WHERE monCode>=15 ORDER BY lname,class,codemeli,monCode";
                                $schoolMonth = $pdo->prepare($schoolMonthQuery);
                                $schoolMonth->execute();
                                $row = $schoolMonth->fetchAll();
                                $i = 1;
                                foreach ($row as $row) {
                                  ?>
                                  <tr>
                                    <td class="text-dark center"><?php echo $i; ?></td>
                                    <td class="text-dark center"><?php echo $row['fname']; ?></td>
                                    <td class="text-dark center"><?php echo $row['lname']; ?></td>
                                    <td class="text-dark center"><?php echo $row['class']; ?></td>
                                    <td class="text-dark center"><?php echo $row['mark']; ?></td>
                                    <td class="text-dark center"><?php
                                        $nobat = $row['monCode'];
                                        if ($nobat == 20) {
                                          print("آغازین");
                                        }
                                        if ($nobat == 21) {
                                          print("دی");
                                        }
                                        if ($nobat == 22) {
                                          print("خرداد");
                                        }
                                        if ($nobat == 23) {
                                          print("شهریور");
                                        }
                                      ?></td>
                                    <td class="center">
                                      <a href="../assets/mark-opration.php?editidD=<?php echo $row['id']; ?>"
                                         class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit-alt"></i>
                                      </a>
                                      <a href="check-final-marks.php?deleteid=<?php echo $row['id']; ?>"
                                         class="btn btn-sm btn-danger">
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

      function showSchoolMarks(str) {
        if (str == "") {
          document.getElementById("markslist").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("markslist").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/mark-search-all.php?selectedschool=" + str);
          xmlhttp.send();
        }
      }

      function changeSelectOption(str) {
        showSchoolMarks(str);
        if (str == "") {
          document.getElementById("sel-class").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("sel-class").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/mark-search-all.php?selectedschool=" + str + "&schoolCode=10");
          xmlhttp.send();
        }
      }


      function showClassMarks(str) {
        if (str == "") {
          document.getElementById("markslist").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("markslist").innerHTML = this.responseText;
              console.log(this.responseText);

            }
          };
          xmlhttp.open("GET", "../assets/mark-search-all.php?selectedclass=" + str);
          xmlhttp.send();
        }
      }

      function cshowStudent(str) {
        showClassMarks(str)
        if (str == "") {
          document.getElementById("students").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("students").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/mark-search-all.php?className=" + str);
          xmlhttp.send();
        }
      }

      function showmarks(str) {
        if (str == "") {
          document.getElementById("markslist").innerHTML = "";
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              document.getElementById("markslist").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET", "../assets/mark-search-all.php?codemeli=" + str);
          xmlhttp.send();
        }
      }

      function deleteRecord(str) {
        if (str == "") {
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            }
          };
          xmlhttp.open("GET", "../assets/mark-search-all.php?deleteId=" + str);
          xmlhttp.send();
        }
      }
    </script>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
<?php include_once '../assets/footer.php'; ?>