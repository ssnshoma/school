<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';

$profileDetails = getProfilePicName();
$title = "ویرایش پروفایل";
$category="پروفایل";
?>

<?php if (isset($_POST['send-pic'])) {
  if (isset($_FILES['img-file']) && !empty($_FILES['img-file'])) {
    $file = $_FILES['img-file'];
    $filename = $file['name'];
    $tmpname = $file['tmp_name'];
    $seprated = explode('.', $filename);
    $ext = end($seprated);
    if ($ext != "") {
      $uploads_dir = "../uploaded-files";
      $newname = "profile_pic" . rand(100, 30000) . "_." . $ext;
      move_uploaded_file($tmpname, $uploads_dir . '/' . $newname);
      $sql = "UPDATE users SET profilePicture=? WHERE username=? OR email=?";
      $resualt = $pdo->prepare($sql);
      $resualt->bindValue(1, $newname);
      $resualt->bindValue(2, $logifo);
      $resualt->bindValue(3, $logifo);
      if ($resualt->execute()) {
        $_GET['inserted-file'] = "با موفقیت بارگذاری شد";
      } else {
        $_GET['select-file'] = "متاسفانه بارگذاری نشد";
      }
    } else {
      $_GET['select-file'] = "فایل انتخاب نشده است";
    }
  } else {
    $_GET['select-file'] = "فایل انتخاب نشده است";
  }
}
?>
<?php
if (isset($_POST['sub-form'])) {
  $ffname = $_POST['firstName'];
  $flname = $_POST['lastName'];
  $femail = $_POST['email'];
  $fphone = $_POST['phoneNumber'];
  $sqll = "SELECT * FROM users WHERE email=?";
  $resualt = $pdo->prepare($sqll);
  $resualt->bindValue(1, $logifo);
  $resualt->execute();
  $count = $resualt->rowCount();
  if ($count <= 1) {
    $sql = "UPDATE users SET fname=?,lname=?,email=?,phoneNumber=? WHERE username=? OR email=?";
    $res = $pdo->prepare($sql);
    $res->bindValue(1, $ffname);
    $res->bindValue(2, $flname);
    $res->bindValue(3, $femail);
    $res->bindValue(4, $fphone);
    $res->bindValue(5, $logifo);
    $res->bindValue(6, $logifo);
    if ($res->execute()) {
      $_GET['profile-updated'] = "مشخصات شما ویرایش شد";
    } else {
      $_GET['profile-not-updated'] = "مشخصات شما ویرایش نشد";
    }
  } else {
    $_GET['profile-not-updated'] = "ایمیل تکراری است";
  }
}


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

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4">حساب کاربری / <span class="text-muted fw-light">تنظیمات حساب کاربری </span></h4>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <h5 class="card-header">جزئیات حساب کاربری</h5>
                <!-- Account -->

                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" action="pages-account-settings-account.php">
                    <div style="flex-direction: row-reverse"
                         class="d-flex align-items-start align-items-sm-center gap-4">
                      <img
                        src="<?php echo '../uploaded-files/' . $profileDetails['profilePicture'] ?>"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                      />

                      <div class="button-wrapper w-50">
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                          <i class="bx bx-reset d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">حذف تصویر</span>
                        </button>
                        <button name="send-pic" type="submit" class="btn btn-success account-image-reset mb-4">
                          <i class="bx bx-reset d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">بارگذاری</span>
                        </button>
                        <label name="choose-pic" for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                          <span class="d-none d-sm-block">انتخاب تصویر</span>
                          <i class="bx bx-upload d-block d-sm-none"></i>
                          <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"
                            name="img-file"
                          />
                        </label>
                        <p class="text-muted mb-0">
                          .می باشند png ، jpg ، jepeg فرمت های مجاز
                        </p>
                      </div>
                    </div>
                    <?php if (isset($_GET['select-file'])) { ?>
                      <div
                        class="alert alert-warning alert-dismissible w-50 d-inline-block mt-3"> <?php print ($_GET['select-file']); ?> </div>
                    <?php } ?>
                    <?php if (isset($_GET['profile-not-updated'])) { ?>
                      <div
                        class="alert alert-warning alert-dismissible w-50 d-inline-block mt-3"> <?php print ($_GET['profile-not-updated']); ?> </div>
                    <?php } ?>
                    <?php if (isset($_GET['inserted-file'])) { ?>
                      <div
                        class="alert alert-success alert-dismissible w-50 d-inline-block mt-3"> <?php print ($_GET['inserted-file']); ?> </div>
                    <?php } ?>
                    <?php if (isset($_GET['profile-updated'])) { ?>
                      <div
                        class="alert alert-success alert-dismissible w-50 d-inline-block mt-3"> <?php print ($_GET['profile-updated']); ?> </div>
                    <?php } ?>

                    <?php
                    $qurey = "SELECT * FROM users WHERE username=? OR email=?";
                    $resu = $pdo->prepare($qurey);
                    $resu->bindValue(1, $logifo);
                    $resu->bindValue(2, $logifo);
                    $resu->execute();
                    $row = $resu->fetchAll();
                    foreach ($row as $value) {
                    }
                    ?>

                  </form>
                  <hr class="mt-2"/>
                  <div class="card-body">
                    <form id="formAccountSettings" method="POST">
                      <div class="row" style="flex-direction: row-reverse">
                        <div class="mb-3 col-md-6">
                          <label for="firstName" class="form-label">نام</label>
                          <input
                            style="text-align: right"
                            class="form-control"
                            type="text"
                            id="firstName"
                            name="firstName"
                            placeholder="نام خود را وارد کنید"
                            value="<?php echo $value["fname"] ?>"
                            autofocus
                            tabindex="1"
                          />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="lastName" class="form-label">نام خانوادگی</label>
                          <input
                            class="form-control"
                            type="text"
                            name="lastName"
                            id="lastName"
                            style="text-align: right"
                            placeholder="نام خانوادگی خود را وارد کنید"
                            value="<?php print $value["lname"] ?>"
                            tabindex="2"
                          />


                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="email" class="form-label">ایمیل</label>
                          <input
                            class="form-control"
                            type="text"
                            id="email"
                            name="email"
                            style="text-align: right"
                            placeholder="ایمیل را وارد کنید"
                            value="<?php print $value["email"] ?>"
                            tabindex="3"
                          />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="phoneNumber">شماره تماس</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="phoneNumber"
                              name="phoneNumber"
                              class="form-control"
                              style="text-align: right"
                              placeholder="شماره تماس خود را وارد کنید"
                              value="<?php print $value["phoneNumber"] ?>"
                              tabindex="4"
                            />
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="sub-form" class="btn btn-primary me-2">ذخیره تغییرات</button>
                          <button type="reset" class="btn btn-outline-secondary">انصراف</button>
                        </div>
                    </form>
                  </div>

                  <!-- /Account -->

                  <div class="row mt-5">
                    <div class="col-12 mt-5">
                      <div class="card mb-4">
                        <div class="card-body">
                          <p class="card-text">
                            برای حذف حساب کاربری خود دکمه زیر را فشار دهید
                          </p>
                          <p class="demo-inline-spacing">
                            <button
                              class="btn btn-warning me-1"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseExample"
                              aria-expanded="false"
                              aria-controls="collapseExample"
                            >
                              حذف حساب کاربری
                            </button>
                          </p>
                          <div class="collapse w-50 border-0" id="collapseExample" style="margin-left: auto;">
                            <div class="d-grid d-sm-flex p-3 border" style="direction: rtl">
                              <div class="card w-100">
                                <h5 class="card-header">حذف حساب کاربری</h5>
                                <div class="card-body">
                                  <div class="mb-3 col-12 mb-0">
                                    <div class="alert alert-danger">
                                      <h6 class="alert-heading fw-bold mb-1">آیا از حذف حساب کاربری خود اطمینان
                                        دارید؟</h6>
                                    </div>
                                  </div>
                                  <form id="formAccountDeactivation" onsubmit="return false">
                                    <div class="form-check">
                                      <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="accountActivation"
                                        id="accountActivation"
                                      />
                                      <label class="form-check-label" for="accountActivation"
                                      >حذف حساب کاربری خود را تایید می نمایم</label
                                      >
                                    </div>
                                    <button type="submit" class="btn btn-danger deactivate-account">حساب کاربری من را
                                      حذف
                                      کن
                                    </button>
                                  </form>

                                  <?php //} ?>

                                </div>
                              </div>
                            </div>
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
  </div>
  <!-- / Layout wrapper -->


<?php include_once '../assets/footer.php'; ?>