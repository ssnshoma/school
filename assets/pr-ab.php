<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "لیست کلاسی";
  $category = "حضور غیاب";
?>
<?php include_once '../assets/head.php'; ?>
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
                    <h3 class="card-title text-primary mb-4">گزارش کلاسی حضور غیاب</h3>
                    <h4 class="text-info mb-5"> برای دریافت گزارش لطفا موارد زیر را تکمیل کنید</h4>
                    <form method="get" action="../html/present-absent-report.php">
                      <div class="m-auto" id="mark-input">
                        <select name="school" id="school" style="text-align: right;"
                                class="form-control form-group mt-2"
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
  </script>
<?php include_once '../assets/footer.php'; ?>