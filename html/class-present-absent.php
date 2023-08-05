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
<?php include_once '../assets/head-1.php'; ?>

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
              <div class="input-group-addon form-group" style="cursor: pointer;
                                  border: 1px solid rgba(255,255,255,0) !important;
                                  color: #fff;
                                  background-color: #5cb85c;
                                  border-color: #4cae4c;
                                  border-radius: 0px 10px 10px 0px;
                                  width: 160px;" data-mddatetimepicker="true"
                   data-trigger="click" data-targetselector="#exampleInput3">
               <span>تاریخ</span>
              </div>
              <input type="text" name="data" class="form-control form-group text-center"
                     id="exampleInput3" data-placement="right"
                     data-englishnumber="true" style="cursor: pointer;
                                  border: 2px solid #5cb85c !important;
                                  border-color: #5cb85c;
                                  border-radius: 10px 0px 0px 10px;
                                  width: 160px;">
             </div>

             <select name="class" style="border: 2px solid #5cb85c !important;
                              text-align: right;" class="form-control form-group mt-4">
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
                   class="mb-5 mt-4 btn btn-success center-block">
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
 <script type="text/javascript">
     $('#input1').change(function () {
         var $this = $(this),
             value = $this.val();
     });
     $('#textbox1').change(function () {
         var $this = $(this),
             value = $this.val();
     });
 </script>
 <script src="../assets/files/js/jalaali.js" type="text/javascript"></script>
 <script src="../assets/files/js/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>
<?php include_once '../assets/footer.php'; ?>