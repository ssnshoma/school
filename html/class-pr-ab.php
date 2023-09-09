<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت کلاسی";
  $category = "حضور و غیاب";

  function convertPersianToEnglish($string)
  {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $output = str_replace($persian, $english, $string);
    return $output;
  }

?>
<?php include_once '../assets/head.php'; ?>
<?php
  $conn = mysqli_connect("localhost", "vswtsdio_hossein", "8v6lZR0S@d3x*Z", "");
  $s = mysqli_select_db($conn, 'vswtsdio_1402s1403');
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
    foreach ($codemeli as $index => $codemeli) {
      $s_codemeli = $codemeli;
      $s_fname = $fname[$index];
      $s_date = $converted;
      $query = "INSERT INTO `atendence` ( codemeli , atendence , date) VALUES ('$s_codemeli','$s_fname','$s_date')";
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
       <div class="col-lg-12 mb-4 order-0">
        <div class="card">
         <div class="d-flex align-items-end row">
          <div class="col-sm-12">
           <div class="card-body">
            <p class="text-info d-inline-block">
             <strong
              style="font-size: 20px;color: black;margin: 0px 4px;padding: 0px 5px;border-bottom: 1px solid #d3d3d3"> <?php print($date); ?></strong>
            </p>
            <h5 class="card-title text-primary d-inline-block">ثبت حضور غیاب کلاس
             <strong
              style="font-size: 20px;color: black;margin: 0px 4px;padding: 0px 5px;border-bottom: 1px solid #d3d3d3"><?php print($_GET['class']); ?></strong>
             برای تاریخ
            </h5>
            <form method="POST">
             <table class="table table-responsive-md w-50 m-auto">
              <thead class="table-responsive-md">
              <th class="col">حضور/غیاب</th>
              <th class="col">نام و نام خانوادگی</th>
              <th class="col">شماره دانش آموزی</th>
              <th class="col">ردیف</th>
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

                  ?>
                 <tr>

                  <td class="form-group mb-2">
                   <label for="fname[]" class="lable">غایب</label>
                   <input type="checkbox" name="fname[]" value="not" tabindex="1">
                   <label for="fname[]" class="lable">حاضر</label>
                   <input type="checkbox" name="fname[]" value="ok" checked tabindex="1">
                  </td>

                  <td class="form-group mb-2">
                    <?php echo $fam . " " . $lam; ?>
                  </td>


                  <td class="form-group mb-2">
                    <?php echo $cod; ?>
                   <input type="text"
                          style="display:none;background: transparent; border: none;text-align: right;"
                          name="code[]" class="form-control"
                          autocomplete="off" value="<?php echo $cod; ?>">
                  </td>
                  <td class="form-group mb-2">
                    <?php echo $i;
                      $i += 1; ?>
                  </td>
                 </tr>
                  <?php
                }
              ?>
              </tbody>
             </table>
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

    <!-- Footer -->
     <?php include_once '../assets/page-footer.php'; ?>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
   </div>
   <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
 </div>

 <!-- Overlay -->
 <div class="layout-overlay layout-menu-toggle"></div>
 <!-- / Layout wrapper -->

<?php include_once '../assets/footer.php'; ?>