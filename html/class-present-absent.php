<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت کلاسی";
  $category = "حضور و غیاب";
?>
<?php include_once '../assets/head.php'; ?>

<?php
  if (isset($_POST['send'])) {
    $task_group = $_POST['taskgroup'];
    $task = $_POST['task'];
    $task_priority = $_POST['priority'];
    $date = $_POST['data'];
    function convertPersianToEnglish($string)
    {
      $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
      $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
      $output = str_replace($persian, $english, $string);
      return $output;
    }
  }
?>

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
              <div class="col-lg-10 mb-4 order-0 m-auto">
                <div class="card border-0">
                  <div class="d-flex align-items-end row ">
                    <div class="card-body p-5">
                      <h3 class="card-title text-primary mb-4">ثبت کلاسی حضور و غیاب</h3>
                      <h4 class="text-info mb-5"> برای ثبت حضور و غیاب لطفا موارد زیر را تکمیل کنید</h4>
                      <form method="get" action="class-pr-ab.php">
                        <div class="w-25 m-auto">
                          <div class="input-group form-group" dir="rtl">
                            <div class="col-md-12" style="padding-left: 0">
                              <input type="text" name="data" placeholder="تاریخ" class="w-100 pdate form"
                                     tabindex="3" id="pcal1">
                              <style>
                                #pcal1 {
                                  display: block;
                                  width: 100%;
                                  padding: 0.4375rem 0.875rem;
                                  font-size: 0.9375rem;
                                  font-weight: 400;
                                  line-height: 1.53;
                                  color: #697a8d;
                                  background-color: #fff;
                                  background-clip: padding-box;
                                  border: 1px solid #d9dee3;
                                  -webkit-appearance: none;
                                  -moz-appearance: none;
                                  appearance: none;
                                  border-radius: 0.375rem;
                                  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                }

                                a.pcalBtn {
                                  position: relative;
                                  top: -33px;
                                }
                              </style>
                            </div>
                          </div>

                          <select name="class" style="text-align: right;" class="form-control form-group mt-2">
                            <?php
                              $sqli = "SELECT * FROM classes";
                              $resui = $pdo->prepare($sqli);
                              $resui->execute();
                              $rowi = $resui->fetchAll();
                              foreach ($rowi as $row) {
                                echo "ok";
                                ?>
                                <option dir="rtl" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>

                        <input type="submit" name="send" value="ارسال"
                               class="mb-4 mt-4 m-auto d-block btn btn-primary center-block">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->

      <!-- / Fo oter -->

      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
  </div>

<?php include_once '../assets/page-footer.php'; ?>
  <!-- Overlay -->
  <!-- / Layout wrapper -->

<?php include_once '../assets/footer.php'; ?>