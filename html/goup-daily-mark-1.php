<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $profileDetails = getProfilePicName();
  $title = "ثبت کلاسی";
  $category = "حضور و غیاب";
  $date = $_GET['data'];
  $gdate = convertPersianToEnglish($date);
  $arr_parts = explode('/', $gdate);
  $jYear = $arr_parts[0];
  $jMonth = $arr_parts[1];
  $jDay = $arr_parts[2];
  $converted = jalali_to_gregorian($jYear, $jMonth, $jDay, '/');
  if (isset($_POST['save_multiple_data'])) {
    $codemeli = $_POST['code'];
    $mark = $_POST['mark'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $classs = $_GET['class'];
    $school = $_GET['school'];
    $details = $_POST['details'];
    foreach ($codemeli as $index => $codemeli) {
      $s_codemeli = $codemeli;
      $s_mark = $mark[$index];
      $s_fname = $fname[$index];
      $s_lname = $lname[$index];
      $s_details = $details;
      $s_classs = $classs;
      $s_school = $school;
      $monCode = $jMonth;
      if ($s_mark == "") {
      } else {
       $query = "INSERT INTO `monmark` (`codemeli`, `mark`, `fname`, `lname`, `class`, `school`, `monCode`,`tarikh`,`details`) VALUES ('$s_codemeli','$s_mark','$s_fname','$s_lname','$s_classs','$s_school','$monCode', '$converted','$s_details')";
        $query_run = mysqli_query($conn, $query);
      }
    }
    if ($query_run) {
      $_SESSION['pb-inserted-1'] = "نمرات با موفقیت ثبت شدند";
      header("location:goup-daily-mark.php");
    } else {
      $_SESSION['pb-not-inserted'] = "متاسفانه نمرات ثبت نشدند";
      header("location:goup-daily-mark.php");
    }
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
                      <div class="card-body">
                        <h5 class="text-info card-title text-primary">ثبت نمرات کلاس
                          <strong
                            style="font-size: 20px;color: black;margin: 0px 4px;padding: 4px 5px;"><?php print($_GET['class']); ?></strong>
                          برای تاریخ
                          <strong
                            style="font-size: 20px;color: black;margin: 0px 4px;padding: 4px 5px;"> <?php print($date); ?></strong>
                        </h5>
                        <form method="POST">
                          <div id="avgmarkstable" class="mt-3" dir="rtl">
                            <table class="table table-responsive-md m-auto">
                              <thead class="table-responsive">
                              <th id="radif">ردیف</th>
                              <th id="codemeli">شماره دانش آموزی</th>
                              <th class="pe-0" style="width: 90px;">نام</th>
                              <th class="pe-0" dir="rtl">نام خانوادگی</th>
                              <th class="pe-0" dir="rtl">نام پدر</th>
                              <th>نمره</th>
                              </thead>
                              <tbody>

                              <?php
                                $classs = $_GET['class'];
                                $sql = "SELECT * FROM `studentlist` WHERE class='$classs' order by lname,CHAR_LENGTH(lname) DESC , fname";
                                $res = $pdo->prepare($sql);
                                $res->execute();
                                $row = $res->fetchAll();
                                $i = 1;
                                foreach ($row

                                         as $value) {
                                  $cod = $value["codemeli"];
                                  $fam = $value['fname'];
                                  $lam = $value['lname'];
                                  $fathername = $value['fathername'];

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
                                    <td class="form-group mb-2 pe-0 py-0">
                                      <input class="p-0" type="text" readonly
                                             style="outline: none;border: none;"
                                             name="fname[]" dir="rtl" value="<?php echo $fam; ?>">
                                    </td>

                                    <td class="form-group mb-2 pe-0 py-0">
                                      <input class="p-0" type="text" dir="rtl" readonly
                                             style="outline: none;border: none"
                                             name="lname[]" value="<?php echo $lam; ?>">
                                    </td>
                                    <td class="form-group mb-2 pe-0 py-0">
                                      <input class="p-0" type="text" dir="rtl" readonly
                                             style="outline: none;border: none" value="<?php echo $fathername; ?>">
                                    </td>

                                    <td class="form-group mb-2">
                                      <input type="text"
                                             style="width: 40px;font-size: 12px;font-weight:bold;border-color: #c2c2c2"
                                             name="mark[]" tabindex="1">
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
                          </div>
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