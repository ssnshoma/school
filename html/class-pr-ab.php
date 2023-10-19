<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $profileDetails = getProfilePicName();
  $title = "ثبت کلاسی";
  $category = "حضور/غیاب";
  $date = $_GET['data'];
  $gdate = convertPersianToEnglish($date);
  $arr_parts = explode('/', $gdate);
  $jYear = $arr_parts[0];
  $jMonth = $arr_parts[1];
  $jDay = $arr_parts[2];
  $converted = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
  if (isset($_POST['save_multiple_data'])) {
    $codemeli = $_POST['code'];
    $fname = $_POST['fname'];
    $details = $_POST['details'];
    foreach ($codemeli as $index => $codemeli) {
      $s_codemeli = $codemeli;
      $s_fname = $fname[$index];
      $s_date = $converted;
      $s_details = $details;
      $query = "INSERT INTO `atendence` ( codemeli , atendence , date, details) VALUES ('$s_codemeli','$s_fname','$s_date','$s_details')";
      $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
      $_SESSION['pb-inserted'] = "لیست وارد شد";
      header("location:class-present-absent.php");
    } else {
      $_SESSION['pb-inserted'] = "لیست وارد نشد";
      header("location:class-present-absent.php");
    }
  }
  function convertPersianToEnglish($string)
  {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $output = str_replace($persian, $english, $string);
    return $output;
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
            <div class="row">
              <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                      <div class="card-body" dir="rtl">
                        <h5 class="card-title text-primary d-inline-block">ثبت حضور غیاب کلاس
                          <strong
                            style="font-size: 20px;color: black;margin: 0px 4px;padding: 0px 5px;border-bottom: 1px solid #d3d3d3"><?php print($_GET['class']); ?></strong>
                          برای تاریخ
                        </h5>
                        <p class="text-info d-inline-block">
                          <strong
                            style="font-size: 20px;color: black;margin: 0px 4px;padding: 0px 5px;border-bottom: 1px solid #d3d3d3"> <?php print($date); ?></strong>
                        </p>
                        <form method="POST">
                          <table class="table table-responsive-md m-auto">
                            <thead class="table-responsive-md">
                            <th id="radif">ردیف</th>
                            <th id="codemeli">شماره دانش آموزی</th>
                            <th>نام</th>
                            <th>نام و نام خانوادگی</th>
                            <th>وضعیت حضور</th>
                            </thead>
                            <tbody>

                            <?php
                              $classs = $_GET['class'];
                              $sql = "SELECT * FROM studentlist WHERE class='$classs' order by lname";
                              $res = $pdo->prepare($sql);
                              $res->execute();
                              $row = $res->fetchAll();
                              $i = 1;
                              foreach ($row
                                       as $value) {
                                $cod = $value["codemeli"];
                                $fam = $value['fname'];
                                $lam = $value['lname'];
                                $father = $value['fathername']
                                ?>
                                <tr>
                                  <td class="form-group mb-2" id="radif">
                                    <?php echo $i;
                                      $i += 1; ?>
                                  </td>
                                  <td class="form-group mb-2" id="codemeli">
                                    <?php echo $cod; ?>
                                    <input type="text"
                                           style="display:none;background: transparent; border: none;text-align: right;"
                                           name="code[]" class="form-control"
                                           autocomplete="off" value="<?php echo $cod; ?>">
                                  </td>
                                  <td class="form-group mb-2">
                                    <?php echo $fam . " " . $lam; ?>
                                  </td>
                                  <td class="form-group mb-2">
                                    <?php echo $father; ?>
                                  </td>
                                  <td class="form-group mb-2">
                                    <input type="checkbox" value="ok" checked name="fname[]">
                                    <label id="lable">حاضر</label>
                                    <input type="checkbox" value="not" name="fname[]">
                                    <label id="lable">غایب</label>
                                  </td>
                                </tr>
                                <?php
                              }
                            ?>
                            </tbody>
                          </table>
                          <div class="w-75 mt-3 m-auto">
                            <label>توضیحات</label>
                            <input type="text" class="form-control" name="details"
                                   placeholder="لطفا فعالیت های خود را وارد کنید">
                          </div>
                          <button type="submit" name="save_multiple_data"
                                  class="btn btn-primary mt-4 mb-5 d-block m-auto"
                                  tabindex="9">ثبت
                          </button>
                        </form>
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
<?php include_once '../assets/footer.php'; ?>