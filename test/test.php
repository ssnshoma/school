<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "کارها";
  $category = "فعالیت";
?>

<?php include_once '../assets/head.php'; ?>
<link rel="stylesheet" href="files/main.css">
<link rel="stylesheet" href="files/js-persian-cal.css">
<script type="text/javascript" src="files/js-persian-cal.min.js"></script>
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
            <div class="col-lg-10 m-auto mb-4 order-0">
              <div class="card">
                <div class="d-flex align-items-center row">
                  <div class="col-sm-12 m-auto">
                    <div class="card-body">
                      <?php if (isset($_GET['editID'])) {
                        $massage = "ویرایش";
                        $id = $_GET['editID'];
                        if (isset($_POST['submit-Btn'])) {
                          $activity = $_POST['activity'];
                          $level = $_POST['level'];
                          $date = $_POST['date'];
                          $deleteQry = "UPDATE `task` SET `activity`='$activity',`level`='$level',`date`='$date' WHERE `id`='$id'";
                          $runDel = $pdo->prepare($deleteQry);
                          $runDel->execute();
                          header("Location: ../html/dashboard.php");
                        }
                      } else {
                        $massage = "اضافه";
                        if (isset($_POST['submit-Btn'])) {
                          $activity = $_POST['activity'];
                          $level = $_POST['level'];
                          $date = $_POST['date'];
                          $deleteQry = "INSERT INTO `task` SET `activity`='$activity',`level`='$level',`date`='$date'";
                          $runDel = $pdo->prepare($deleteQry);
                          $runDel->execute();
                          header("Location: ../html/dashboard.php");
                        }
                      }

                      ?>
                      <h5 class="card-title text-primary mt-4"><?php echo $massage ?> کردن فعالیت</h5>
                      <p class="mt-4"> برای <?php echo $massage ?> کردن فعالیت موارد زیر را تکمیل کنید</p>
                      <div class="input-group">
                        <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
                          <div class="row">
                            <div class="row w-75 m-auto">
                              <input type="text" name="activity" tabindex="1" class="w-100 form"
                                     placeholder="فعالیت را وارد کنید">
                            </div>
                            <div class="row w-75 m-auto mt-4">
                              <div class="col-md-6" style="padding-right: 0">
                                <select type="text" name="level" class="w-100 form" tabindex="2">
                                  <option selected disabled>اهمیت</option>
                                  <option value="بسیار بالا">بسیار بالا</option>
                                  <option value="بالا">بالا</option>
                                  <option value="کم">کم</option>
                                  <option value="خیلی کم">خیلی کم</option>
                                </select>
                              </div>
                              <div class="col-md-6" style="padding-left: 0">
                                <input type="text" name="date" placeholder="تاریخ" class="w-100 pdate form"
                                       tabindex="3" id="pcal1">
                              </div>
                            </div>
                          </div>
                          <input type="submit" style="display: block; width: 100px;margin:auto;" name="submit-Btn"
                                 value="ثبت" class="btn btn-primary mt-4 mb-5" tabindex="9">
                        </form>
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
</div>
<!-- / Layout wrapper -->




<?php include_once '../assets/footer.php'; ?>
