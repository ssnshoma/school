<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once './files/jdf.php';
  $profileDetails = getProfilePicName();
  $title = "ویرایش";
  $category = "ثبت نمره";
  $id = $_GET['editid'];
  if (isset($_POST['edit-btn'])) {
    $details = $_POST['details'];
    $mark = $_POST['mark'];
    $qry = "UPDATE `monmark` SET `mark`='$mark',`details`='$details' WHERE id=$id";
    $run = $pdo->prepare($qry);
    $run->execute();
    echo '<script>window.history.go(-2)</script>';
  }
  if (isset($_POST['delete-yes'])) {
    $deleteSql = "DELETE FROM `monmark` WHERE `id`='$id'";
    $res = $pdo->prepare($deleteSql);
    $res->execute();
    echo '<script>window.history.go(-2)</script>';
  } else if (isset($_POST['delete-no'])) {
    echo '<script>window.history.go(-2)</script>';
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
              <div class="col-lg-8 mb-4 order-0">
              </div>
              <div class="col-lg-4 col-md-4 order-1">
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 col-lg-10 col-xl-10 order-0 mb-4 m-auto">
                <div class="card h-100" style="direction: rtl;">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h4 style="direction: rtl" class="m-0 me-2">
                        ویرایش نمره
                      </h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="d-flex flex-column align-items-center w-75 m-auto my-3">
                        <form action="" class="w-100" method="post">
                          <div class="row flex-row justify-content-center">
                            <?php
                              if (isset($_GET['editid'])) {
                                $id = $_GET['editid'];
                                $selQuery = "SELECT monmark.mark,monmark.details,monmark.id,monmark.tarikh,studentlist.codemeli,studentlist.fname,studentlist.lname FROM `monmark` join `studentlist` on studentlist.codemeli=monmark.codemeli WHERE monmark.id=$id";
                                $queryRun = $pdo->prepare($selQuery);
                                $queryRun->execute();
                                $row = $queryRun->fetch();
                                ?>
                                <div class="mb-4">
                                  نام و نام خانوادگی دانش آموز:
                                  <strong>
                                    <?php echo @$row['fname']?>
                                    <?php echo " "?>
                                    <?php echo @$row['lname']?>
                                  </strong>
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    تاریخ
                                  </label>
                                  <input type="text" dir="ltr" disabled style="text-align: center;background: none"
                                         class="form-control" value="<?php
                                    $date = $row['tarikh'];
                                    $arr_parts = explode('-', $date);
                                    $gYear = $arr_parts[0];
                                    $gMonth = $arr_parts[1];
                                    $gDay = $arr_parts[2];
                                    $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, ' / ');
                                    echo $converted;
                                  ?>">
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    نمره
                                  </label>
                                  <input type="text" name="mark" class="form-control"
                                         style="text-align: center;background: none"
                                         value="<?php print $row['mark']; ?>">
                                </div>
                                <div class="col-md-4">
                                  <label>
                                    توضیحات
                                  </label>
                                  <input type="text" name="details" class="form-control"
                                         style="text-align: center;background: none"
                                         value="<?php print $row['details']; ?>">
                                </div>
                              <?php } ?>
                          </div>
                          <div class="form-group w-25 m-auto mb-3 mt-5 ">
                            <input type="submit" name="edit-btn" value="ویرایش"
                                   class="form-control btn btn-primary">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 mb-4 order-0 m-auto">
                <div class="card border-0">
                  <div class="d-flex align-items-end row ">
                    <div class="card-body p-5" dir="rtl">
                      <form method="post">
                        <h6 class="text-secondary mb-2">
                          آیا مایل به حذف این نمره هستید؟
                        </h6>
                        <div class="col-md-4 m-auto d-flex justify-content-around">
                          <input type="submit" name="delete-no" value="خیر" class="btn btn-primary center d-block w-25">
                          <input type="submit" name="delete-yes" value="بله" class="btn btn-danger center d-block w-25">
                        </div>
                      </form>
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