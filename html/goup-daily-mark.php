<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت کلاسی";
  $category = "نمره";
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
                    <?php if (isset($_SESSION['pb-inserted'])) { ?>
                      <div class="alert alert-success" style="width: 320px;position:absolute;left: 35%;top: 15px">
                        <?php echo $_SESSION['pb-inserted']; ?>
                      </div>
                      <?php
                      unset($_SESSION['pb-inserted']);
                    }
                    ?>
                    <?php if (isset($_SESSION['pb-not-inserted'])) { ?>
                      <div class="alert alert-danger" style="width: 320px;position:absolute;left: 35%;top: 15px">
                        <?php echo $_SESSION['pb-not-inserted']; ?>
                      </div>
                      <?php
                      unset($_SESSION['pb-not-inserted']);
                    }
                    ?>
                    <h3 class="card-title text-primary mb-4">ثبت کلاسی نمرات</h3>
                    <h4 class="text-info mb-5"> برای ثبت نمرات لطفا موارد زیر را تکمیل کنید</h4>
                    <form method="get" action="goup-daily-mark-1.php">
                      <div class="m-auto" id="mark-input">
                        <div class="col-md-12" style="padding-left: 0">
                          <input type="text" name="data" placeholder="تاریخ" class="w-100 pdate form"
                                 tabindex="3" id="pcal1">
                        </div>

                        <select name="school" id="school" style="text-align: right;" class="form-control form-group mt-2"
                                onchange="changeSelectOption(this.value)">
                          <option dir="rtl" selected disabled>مدرسه را انتخاب کنید</option>
                          <?php
                            $sqli = "SELECT * FROM schools";
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


                        <select name="class" style="text-align: right;" id="class" class="form-control form-group mt-4">
                          <option dir="rtl">کلاس را انتخاب کنید</option>
                        </select>

                      </div>
                      <input type="submit" name="send" value="ارسال"
                             class="mb-5 mt-4 btn btn-success m-auto d-block">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <!-- / Layout wrapper -->

  <script type="text/javascript">

    function changeSelectOption(str) {

      if (str == "") {
        document.getElementById("class").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            let datas = this.responseText;
            console.log(datas);
            document.getElementById("class").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "../assets/searchClass.php?school=" + str);
        xmlhttp.send();
      }
    }


    $('#input1').change(function () {
      var $this = $(this),
        value = $this.val();
    });
    $('#textbox1').change(function () {
      var $this = $(this),
        value = $this.val();
    });
  </script>
<?php include_once '../assets/footer.php'; ?>