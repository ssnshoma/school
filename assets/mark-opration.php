<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once './files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ویرایش";
  $category = "ثبت نمره"
?>

<?php
  if (isset($_POST['edit-btn'])) {
    $id = $_GET['editid'];
    $mark = $_POST['mark'];
    $qry = "UPDATE `monmark` SET `mark`='$mark' WHERE id=$id";
    $run = $pdo->prepare($qry);
    $run->execute();
    header("Location: ../html/check-marks.php");
  }
?>
<?php include_once '../assets/head.php'; ?>
 <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
   <!-- / Menu -->
    <?php include_once '../assets/aside.php'; ?>
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
       <div class="col-lg-8 mb-4 order-0">
       </div>
       <div class="col-lg-4 col-md-4 order-1">
       </div>
      </div>
      <div class="row">
       <!-- Order Statistics -->
       <div class="col-md-10 col-lg-10 col-xl-10 order-0 mb-4 m-auto">
        <div class="card h-100" style="direction: rtl;">
         <div class="card-header d-flex align-items-center justify-content-between pb-0">
          <div class="card-title mb-0">
           <h3 style="direction: rtl" class="m-0 me-2">
            ویرایش نمره
           </h3>
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
                   $selQuery = "SELECT * FROM `monmark` WHERE id=$id";
                   $queryRun = $pdo->prepare($selQuery);
                   $queryRun->execute();
                   $row = $queryRun->fetch();
                   ?>
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
                   <input type="text" name="mark" class="form-control" style="text-align: center;background: none"
                          value="<?php print $row['mark']; ?>">
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
       <!--/ Order S tatistics -->
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