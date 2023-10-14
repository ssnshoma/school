<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ویرایش";
  $category = "ثبت نام";
  if (isset($_POST['edit-btn'])) {
    $id = $_GET['editid'];
    $codemeli = $_POST['codemeli'];
    $fathername = $_POST['fathername'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $major = $_POST['major'];
    $grade = $_POST['grade'];
    $selclass = $_POST['sel-class'];
    $selschool = $_POST['sel-school'];
    if ($id == $codemeli) {
      $UpdateQry = "UPDATE `studentlist` SET `fname`='$fname',`lname`='$lname',`fathername`='$fathername',`major`='$major',`school`='$selschool',`grade`='$grade',`class`='$selclass' WHERE codemeli='$codemeli'";
      $update = $pdo->prepare($UpdateQry);
      $update->execute();
      $_GET['editid-success'] = "با موفقیت ویرایش شد";
      header("Refresh:2; url=../html/student-list.php");
    } else {
      $searchQry = "SELECT * FROM `studentlist` WHERE codemeli='$codemeli'";
      $searchResualt = $pdo->prepare($searchQry);
      $searchResualt->execute();
      $searchResualt->fetchAll(PDO::FETCH_ASSOC);
      $RowCount = $searchResualt->rowCount();
      if ($RowCount <= 0) {
        $UpdateQry = "UPDATE `studentlist` SET `codemeli`='$codemeli',`fname`='$fname',`lname`='$lname',`fathername`='$fathername',`major`='$major',`school`='$selschool',`grade`='$grade',`class`='$selclass' WHERE codemeli='$codemeli'";
        $update = $pdo->prepare($UpdateQry);
        $update->execute();
        $_GET['editid-success'] = "با موفقیت ویرایش شد";
        header("Refresh:2; url=../html/student-list.php");
      } else {
        $_GET['repeted'] = $codemeli;
      }
    }
  }
  if (isset($_POST['btn-yes'])) {
    $id = $_GET['deleteid'];
    $deleteQry = "DELETE FROM `studentlist` WHERE codemeli='$id'";
    $deleteRun = $pdo->prepare($deleteQry);
    $deleteRun->execute();
    $_GET['editid-success'] = "با موفقیت حذف شد";
    header("Refresh:1; url=../html/student-list.php");

  } elseif (isset($_POST['btn-no'])) {
    $_GET['editid-success'] = "عملیات حذف دانش آموز توسط شما لغو شد";
    header("Refresh:1; url=../html/student-list.php");
  }
  include_once '../assets/head.php'; ?>
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include_once '../assets/aside.php'; ?>
    <div class="layout-page">
      <?php include_once '../assets/nav.php' ?>
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-10 m-auto mb-4 order-0">
              <div class="card">
                <div class="d-flex align-items-center row">
                  <div class="col-sm-12 m-auto">
                    <div class="card-body">
                      <?php if (isset($_GET['editid-success'])) { ?>
                        <div class="position-absolute alert alert-success text-danger" style="top: 30px;left: 45%">
                          <?php print ($_GET['editid-success']) ?>
                        </div>
                        <?php unset($_GET['editid-success']);
                      } ?>
                      <?php if (isset($_GET['repeted'])) { ?>
                        <div class="position-absolute alert alert-danger text-danger" style="top: 30px;left: 40%">
                          کد ملی
                          <?php print ($_GET['repeted']) ?>
                          تکراری می باشد لطفا بررسی کنید
                        </div>
                        <?php unset($_GET['repeted']);
                      }
                        if (isset($_GET['editid'])) {
                        $id = $_GET['editid'];
                        $searchQry = "SELECT * FROM `studentlist` WHERE codemeli='$id'";
                        $searchResualt = $pdo->prepare($searchQry);
                        $searchResualt->execute();
                        $SearchRow = $searchResualt->fetch(PDO::FETCH_ASSOC);
                      ?>
                      <h5 class="card-title text-primary mt-4">ویرایش مشخصات دانش آموز</h5>
                      <p class="mt-4">برای ویرایش مشخصات دانش آموز موارد لازم را تغییر دهید</p>
                      <div class="input-group">
                        <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="sel-school" class="pb-2">مدرسه</label>
                              <select name="sel-school" onchange="changeSelectOption(this.value)"
                                      class="form-select mb-4"
                                      id="sel-school" tabindex="1" style="padding-right: 40px">
                                <option selected> <?php print $SearchRow['school'] ?> </option>
                                <?php
                                  $sql = "SELECT * FROM schools";
                                  $resualt = $pdo->prepare($sql);
                                  $resualt->execute();
                                  $roww = $resualt->fetchAll(PDO::FETCH_ASSOC);
                                  foreach ($roww as $row) {
                                    ?>
                                    <option style="direction: rtl"
                                            value="<?php print $row['name'] ?>"><?php print $row['name'] ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="sel-class" class="pb-2">کلاس</label>
                              <select name="sel-class" class="form-select mb-4" onchange="cshowGrade(this.value)"
                                      id="sel-class" tabindex="2" style="padding-right: 40px">
                                <option selected class="pe-5"><?php print $SearchRow['class'] ?></option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label for="grade" class="pb-2">پایه</label>
                              <input name="grade" class="input mb-4" id="grade"
                                     value="<?php print $SearchRow['grade'] ?>"
                                     tabindex="8">
                            </div>
                            <div class="col-md-6">
                              <label for="grade" class="pb-2">رشته</label>
                              <input name="major" class="input mb-4" id="major"
                                     value="<?php print $SearchRow['major'] ?>"
                                     tabindex="4">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label for="codemeli" class="pb-2">کد ملی</label>
                              <input type="text" class="mb-4 input" name="codemeli"
                                     value="<?php print $SearchRow['codemeli'] ?>"
                                     tabindex="5">
                            </div>
                            <div class="col-md-6">
                              <label for="fname" class="pb-2">نام</label>
                              <input type="text" class="mb-4 input" name="fname"
                                     value="<?php print $SearchRow['fname'] ?>"
                                     tabindex="6">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label for="lname" class="pb-2">نام خانوادگی</label>
                              <input type="text" class="mb-4 input" name="lname"
                                     value="<?php print $SearchRow['lname'] ?>"
                                     tabindex="7">
                            </div>
                            <div class="col-md-6">
                              <label for="fathername" class="pb-2">نام پدر</label>
                              <input type="text" class="mb-4 input" name="fathername"
                                     value="<?php print $SearchRow['fathername'] ?>" tabindex="8">
                            </div>
                          </div>
                          <input type="submit" style="display: block; width: 100px;margin:auto;" name="edit-btn"
                                 value="ویرایش" class="btn btn-warning" tabindex="9">
                        </form>
                        <?php
                          } elseif (isset($_GET['deleteid'])) {
                          $codemeli = $_GET['deleteid'];
                          $searchQry = "SELECT * FROM `studentlist` WHERE codemeli='$codemeli'";
                          $searchResualt = $pdo->prepare($searchQry);
                          $searchResualt->execute();
                          $SearchRow = $searchResualt->fetch(PDO::FETCH_ASSOC);
                          ?>
                          <h5 class="card-title text-primary mt-4">حذف دانش آموز</h5>
                          <p class="text-danger">آیا از حذف این دانش آموز اطمینان دارید؟</p>
                          <p class="text-warning">توجه!! با حذف این دانش آموز تمامی رکورد های مروبوطه حذف خواهند شد</p>
                          <p class="mt-4">:مشخصات</p>
                          <div class="container" dir="rtl">

                            <div>
                              <span class="p-1" id="deleted">دانش آموز</span>
                              <strong class="border-bottom" id="deleted"><?php print @$SearchRow['fname'] ?></strong>
                              <strong class="border-bottom" id="deleted"><?php print @$SearchRow['lname'] ?></strong>
                              <span class="p-1" id="deleted">فرزند</span>
                              <strong class="border-bottom"
                                      id="deleted"><?php print @$SearchRow['fathername'] ?></strong>
                              <span class="p-1" id="deleted">از مدرسه</span>
                              <strong class="border-bottom" id="deleted"><?php print @$SearchRow['school'] ?></strong>
                              <span class="p-1" id="deleted">کلاس</span>
                              <strong class="border-bottom" id="deleted"><?php print @$SearchRow['class'] ?></strong>

                            </div>

                            <div class="row alert alert-danger mt-4">
                              <div class="col-md-8 mt-2">آیا از حذف این دانش آموز اطمینان دارید؟</div>
                              <div class="col-md-4">
                                <form method="post">
                                  <input type="submit" class="btn btn-warning" value="بله" name="btn-yes">
                                  <input type="submit" class="btn btn-primary" value="خیر" name="btn-no">
                                </form>
                              </div>

                            </div>

                          </div>

                          <?php
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
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
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

