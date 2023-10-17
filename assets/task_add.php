<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/files/jdf.php';
  include '../assets/first-login.php';
  
  $profileDetails = getProfilePicName();
  $title = "کارها";
  $category = "فعالیت";
  if (isset($_POST['edit-Btn'])) {
    $id = $_GET['editID'];
    $activity = $_POST['activity'];
    $level = $_POST['level'];
    $date = $_POST['date'];
    $converted = shamsiToMiladi($date);
    $editQry = "UPDATE `task` SET `activity`='$activity',`level`='$level',`date`='$converted' WHERE `id`='$id'";
    $runDel = $pdo->prepare($editQry);
    $runDel->execute();
    header("Location: ../html/dashboard.php");
  }
  if (isset($_POST['edit-BtnD'])) {
    $id = $_GET['editIDD'];
    $activity = $_POST['activity'];
    $level = $_POST['level'];
    $date = $_POST['date'];
    $converted = shamsiToMiladi($date);
    $editQry = "UPDATE `task` SET `activity`='$activity',`level`='$level',`date`='$converted' WHERE `id`='$id'";
    $runDel = $pdo->prepare($editQry);
    $runDel->execute();
    header("Location: task_list.php");
  }

  if (isset($_POST['submit-Btn'])) {
    $activity = $_POST['activity'];
    $level = $_POST['level'];
    $date = $_POST['date'];
    $converted = shamsiToMiladi($date);
    $deleteQry = "INSERT INTO `task` SET `activity`='$activity',`level`='$level',`date`='$converted'";
    $runDel = $pdo->prepare($deleteQry);
    $runDel->execute();
    $_GET['inserted'] = "ثبت شد";
  }
 include_once '../assets/head.php'; ?>
<style>
  .form {
    width: 100%;
    height: 40px;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    padding-right: 10px;
  }
</style>
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
                      <?php if (isset($_GET['editID'])) {
                        $id = $_GET['editID'];
                        $sql = "SELECT * FROM `task` where id=$id";
                        $prepare = $pdo->prepare($sql);
                        $prepare->execute();
                        $recived = $prepare->fetch();
                        $activity = $recived['activity'];
                        $level = $recived['level'];
                        $date = $recived['date'];
                      ?>
                      <h5 class="card-title text-primary mt-4"> ویرایش کردن فعالیت</h5>
                      <p class="mt-4">برای ویرایش کردن فعالیت موارد زیر را تکمیل کنید</p>
                      <div class="input-group">
                        <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
                          <div class="row">
                            <div class="row w-75 m-auto">
                              <input type="text" name="activity" tabindex="1" class="w-100 form"
                                     value="<?php print $activity; ?>">
                            </div>
                            <div class="row w-75 m-auto mt-4">
                              <div class="col-md-6" style="padding-right: 0">
                                <select type="text" name="level" class="w-100 form" tabindex="2">
                                  <option selected value="<?php print $level; ?>"><?php print $level; ?></option>
                                  <option value="بسیار بالا">بسیار بالا</option>
                                  <option value="بالا">بالا</option>
                                  <option value="کم">کم</option>
                                  <option value="خیلی کم">خیلی کم</option>
                                </select>
                              </div>
                              <div class="col-md-6" style="padding-left: 0">
                                <input type="text" name="date" placeholder="تاریخ" class="w-100 pdate form"
                                       tabindex="3" id="pcal1" value="<?php print miladiToShamsi($date); ?>">
                              </div>
                            </div>
                          </div>
                          <input type="submit" style="display: block; width: 100px;margin:auto;" name="edit-Btn"
                                 value="ویرایش" class="btn btn-warning mt-4 mb-5" tabindex="9">
                        </form>
                        <?php
                          } else if (isset($_GET['editIDD'])) {
                          $id = $_GET['editIDD'];
                          $sql = "SELECT * FROM `task` where id=$id";
                          $prepare = $pdo->prepare($sql);
                          $prepare->execute();
                          $recived = $prepare->fetch();
                          $activity = $recived['activity'];
                          $level = $recived['level'];
                          $date = $recived['date'];
                        ?>
                        <h5 class="card-title text-primary mt-4"> ویرایش کردن فعالیت</h5>
                        <p class="mt-4">برای ویرایش کردن فعالیت موارد زیر را تکمیل کنید</p>
                        <div class="input-group">
                          <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
                            <div class="row">
                              <div class="row w-75 m-auto">
                                <input type="text" name="activity" tabindex="1" class="w-100 form"
                                       value="<?php print $activity; ?>">
                              </div>
                              <div class="row w-75 m-auto mt-4">
                                <div class="col-md-6" style="padding-right: 0">
                                  <select type="text" name="level" class="w-100 form" tabindex="2">
                                    <option selected value="<?php print $level; ?>"><?php print $level; ?></option>
                                    <option value="بسیار بالا">بسیار بالا</option>
                                    <option value="بالا">بالا</option>
                                    <option value="کم">کم</option>
                                    <option value="خیلی کم">خیلی کم</option>
                                  </select>
                                </div>
                                <div class="col-md-6" style="padding-left: 0">
                                  <input type="text" name="date" placeholder="تاریخ" class="w-100 pdate form"
                                         tabindex="3" id="pcal1" value="<?php print miladiToShamsi($date); ?>">
                                </div>
                              </div>
                            </div>
                            <input type="submit" style="display: block; width: 100px;margin:auto;" name="edit-BtnD"
                                   value="ویرایش" class="btn btn-warning mt-4 mb-5" tabindex="9">
                          </form>
                          <?php
                            }
                            else {
                          ?>
                          <h5 class="card-title text-primary mt-4"> اضافه کردن فعالیت</h5>
                          <p class="mt-4">برای اضافه کردن فعالیت موارد زیر را تکمیل کنید</p>
                          <?php
                            if (isset($_GET['inserted'])) {
                              echo '<div class="alert alert-success">' . $_GET['inserted'] . '</div>';
                            }
                          ?>
                          <div class="input-group">
                            <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
                              <div class="row">
                                <div class="row w-75 m-auto">
                                  <div class="col-md-12">
                                    <input type="text" name="activity" tabindex="1" class="form"
                                           placeholder="فعالیت را وارد کنید">
                                  </div>
                                </div>
                                <div class="row w-75 m-auto mt-4">
                                  <div class="col-md-6">
                                    <select type="text" name="level" class="w-100 form" tabindex="2">
                                      <option selected disabled>اهمیت</option>
                                      <option value="بسیار بالا">بسیار بالا</option>
                                      <option value="بالا">بالا</option>
                                      <option value="کم">کم</option>
                                      <option value="خیلی کم">خیلی کم</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="date" placeholder="تاریخ" class="pdate taskdate form"
                                           tabindex="3" id="pcal1">
                                  </div>
                                </div>
                              </div>
                              <input type="submit" style="display: block; width: 100px;margin:auto;" name="submit-Btn"
                                     value="ثبت" class="btn btn-primary mt-4 mb-5" tabindex="9">
                            </form>
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
    <?php include_once '../assets/footer.php'; ?>
