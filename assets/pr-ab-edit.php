<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ویرایش";
  $category = "حضور غیاب";
  @$id = $_GET['id'];
  if (isset($_POST['edit'])) {
    $atendence = $_POST['fname'][0];
    $UpdateSql = "UPDATE `atendence` SET `atendence`='$atendence' WHERE `id`='$id'";
    $res = $pdo->prepare($UpdateSql);
    $res->execute();
    echo '<script>window.history.go(-2)</script>';
  }
  if (isset($_POST['Date-edit']) and $_POST['data'] != "") {
    $Date = $_POST['data'];
    $class = $_GET['class'];
    $newDate = shamsiToMiladi($Date);
    $lastDate = $_GET['DateId'];
    $findClass = "SELECT `codemeli` FROM `studentlist` WHERE `class`='$class'";
    $resualt = $pdo->prepare($findClass);
    $resualt->execute();
    $row = $resualt->fetchAll();
    foreach ($row as $row) {
      $codemeli = $row['codemeli'];
      $UpdateSql = "UPDATE `atendence` SET `date`='$newDate' WHERE `date`='$lastDate' and `codemeli`='$codemeli'";
      $res = $pdo->prepare($UpdateSql);
      $res->execute();
    }
    echo '<script>window.history.go(-2)</script>';
  } else if (isset($_POST['Date-edit']) and $_POST['data'] == "") {
    echo '<script>window.history.go(-2)</script>';
  }

if (isset($_POST['details-edit']) and $_POST['details'] != "") {
 $class = $_GET['class'];
 $details=$_POST['details'];
 $lastDate = $_GET['DateId'];
 $findClass = "SELECT `codemeli` FROM `studentlist` WHERE `class`='$class'";
 $resualt = $pdo->prepare($findClass);
 $resualt->execute();
 $row = $resualt->fetchAll();
 foreach ($row as $row) {
  $codemeli = $row['codemeli'];
  $UpdateSql = "UPDATE `atendence` SET `details`='$details' WHERE `date`='$lastDate' and `codemeli`='$codemeli'";
  $res = $pdo->prepare($UpdateSql);
  $res->execute();
 }
 echo '<script>window.history.go(-2)</script>';
} else if (isset($_POST['details-edit']) and $_POST['details'] == "") {
 echo '<script>window.history.go(-2)</script>';
}

  if (isset($_POST['delete-yes'])) {
    $class = $_GET['class'];
    $lastDate = $_GET['DateId'];
    $findClass = "SELECT `codemeli` FROM `studentlist` WHERE `class`='$class'";
    $resualt = $pdo->prepare($findClass);
    $resualt->execute();
    $row = $resualt->fetchAll();
    foreach ($row as $row) {
      $codemeli = $row['codemeli'];
      $deleteSql = "DELETE FROM `atendence` WHERE `date`='$lastDate' and `codemeli`='$codemeli'";
      $res = $pdo->prepare($deleteSql);
      $res->execute();
    }
    echo '<script>window.history.go(-2)</script>';
  } else if (isset($_POST['delete-no'])) {
    echo '<script>window.history.go(-2)</script>';
  }
  include_once '../assets/head.php';
?>
  <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include_once '../assets/aside.php'; ?>
    <div class="layout-page">
      <?php include_once '../assets/nav.php' ?>
      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-10 mb-4 order-0 m-auto">
              <div class="card border-0">
                <div class="d-flex align-items-end row ">
                  <div class="card-body p-5" dir="rtl">
                    <h4 class="card-title text-primary mb-4">ویرایش</h4>
                    <?php if (isset($_GET['id'])) { ?>
                      <form method="post">
                        <h5 class="text-info mb-5">جهت ویرایش یکی را انتخاب کنید</h5>
                        <?php
                          $sql = "SELECT * FROM `atendence` where id='$id'";
                          $resualt = $pdo->prepare($sql);
                          $resualt->execute();
                          $row = $resualt->fetchAll();
                          foreach ($row as $item) {
                            $code = $item['codemeli'];
                            if ($item['atendence'] == "ok") {
                              $sqli = "SELECT fname,lname FROM `studentlist` where codemeli=$code";
                              $res = mysqli_query($conn, $sqli);
                              foreach ($res as $roww) {
                                ?>
                                ویرایش حضور/غیاب دانش آموز
                                <strong><?php echo $roww['fname'] . " " . $roww['lname'] ?> </strong>
                                برای تاریخ
                                <strong dir="rtl"><?php print miladiToShamsi($item['date']); ?></strong>
                                <div><label for="fname[]" class="lable">حاضر</label>
                                  <input type="checkbox" name="fname[]" value="ok" checked tabindex="1">
                                  <br>
                                  <label for="fname[]" class="lable">غایب</label>
                                  <input type="checkbox" name="fname[]" value="not" tabindex="1">
                                </div>
                                <?php
                              }
                            } else {
                              $sqli = "SELECT fname,lname FROM `studentlist` where codemeli=$code";
                              $res = mysqli_query($conn, $sqli);
                              foreach ($res as $roww) {
                                ?>
                                ویرایش حضور/غیاب دانش آموز
                                <strong><?php echo $roww['fname'] . " " . $roww['lname'] ?> </strong>
                                برای تاریخ
                                <strong dir="rtl"><?php print miladiToShamsi($item['date']); ?></strong>
                                <div><label for="fname[]" class="lable">حاضر</label>
                                  <input type="checkbox" id="ok" name="fname[]" value="ok" tabindex="1">
                                  <br>
                                  <label for="fname[]" class="lable">غایب</label>
                                  <input type="checkbox" id="not" name="fname[]" value="not" checked tabindex="1">
                                </div>
                                <?php
                              }
                            }
                            ?>
                            <?php
                          }
                        ?>
                        <input type="submit" name="edit" value="ویرایش"
                               class="mb-5 mt-4 btn btn-warning m-auto d-block">
                      </form>
                    <?php } ?>
                    <?php if (isset($_GET['DateId'])) { ?>
                      <form method="post">
                        <h5 class="text-secondary mb-5">
                          جهت ویرایش تاریخ
                          <strong dir="rtl"><?php print miladiToShamsi($_GET['DateId']); ?></strong>
                          تاریخ جدید را انتخاب کنید
                        </h5>
                        <div class="col-md-6 m-auto" style="padding-left: 0">
                          <input type="text" name="data" placeholder="تاریخ" class="w-100 pdate form"
                                 tabindex="3" id="pcal1">
                        </div>
                        <input type="submit" name="Date-edit" value="ویرایش"
                               class="mb-5 mt-4 btn btn-warning m-auto d-block">
                      </form>
                    <?php }
                    ?>
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
                    <?php if (isset($_GET['DateId'])) { ?>
                      <form method="post">
                        <h6 class="text-secondary mb-2">
                          آیا مایل به حذف کلی این حضور/غیاب هستید؟
                        </h6>
                        <div class="col-md-4 m-auto d-flex justify-content-around">
                          <input type="submit" name="delete-no" value="خیر" class="btn btn-primary center d-block w-25">
                          <input type="submit" name="delete-yes" value="بله" class="btn btn-danger center d-block w-25">
                        </div>
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
  </div>
<?php include_once '../assets/footer.php'; ?>