<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
include_once '../assets/files/jdf.php';
$logifo = $_SESSION['log-info'];
$profileDetails = getProfilePicName();
$title = "گزارش حضور غیاب";
$category = "حضور غیاب";
?>
<?php include_once '../assets/head.php';
if (isset($_POST['Edit-send']) && !empty($_POST['Edit-send'])) {
 if (isset($_POST['fname'])) {
  $id = $_GET['editid'];
  $status = $_POST['fname'];
  $finalStatus = end($status);
  $update = "UPDATE `atendence` SET `atendence`='$finalStatus' WHERE `id`='$id'";
  $runUpdate = $pdo->prepare($update);
  $runUpdate->execute();
  header('Location: ../html/present-absent-report.php');
 } else {
  $_GET['status'] = '
  <div class="alert alert-danger">
  حضور و غیاب نمی توانند هر دو هزمان خالی باشند
  </div>
  ';
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
          <div class="col-sm-8 m-auto mt-5 mb-5">
           <div class="card-body">
            <h5 class="card-title text-primary">ویرایش وضعیت حضور غیاب</h5>
            <div class="row">
             <?php
             if (isset($_GET['status'])) {
              echo $_GET['status'];
             }
             ?>
             <form method="post">
              <table class="table w-100" dir="rtl">
               <thead>
               <tr>
                <td class="text-center">کد ملی</td>
                <td class="text-center">نام</td>
                <td class="text-center">نام خانوادگی</td>
                <td class="text-center">تاریخ</td>
                <td class="text-center">وضعیت کنونی</td>
                <td class="text-center">تغییر</td>
               </tr>
               </thead>
               <tbody>
               <?php
               if (isset($_GET['editid'])) {
                $id = $_GET['editid'];
                $qry = "SELECT atendence.codemeli,atendence.atendence,atendence.date,studentlist.codemeli,studentlist.fname,studentlist.lname FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli WHERE atendence.id=$id";
                $run = $pdo->prepare($qry);
                $run->execute();
                $row = $run->fetchAll();
                foreach ($row as $row) {
                 ?>
                 <tr class="text-center" style="font-weight: 700;color: black">
                 <td class="text-center"><?php echo $row['codemeli']; ?></td>
                 <td class="text-center"><?php echo $row['fname']; ?></td>
                 <td class="text-center"><?php echo $row['lname']; ?></td>
                 <td dir="ltr" class="text-center"><?php
                  $date = $row['date'];
                  $gdate = explode('-', $date);
                  $gYear = $gdate[0];
                  $gMonth = $gdate[1];
                  $gDay = $gdate[2];
                  $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, ' / ');
                  echo $converted;
                  ?></td>
                 <td class="text-center">
                 <?php
                 $ststus = $row['atendence'];
                 if ($ststus == "ok") {
                  ?>
                  <span class="btn btn-sm btn-info bx-tada-hover">حاضر</span>
                  <?php
                 } else {
                  ?>
                  <span class="btn btn-sm btn-secondary bx-tada-hover">غایب</span>
                  <?php
                 }
                }
                ?></td>
                <td dir="ltr">
                 <?php
                 $ststus = $row['atendence'];
                 if ($ststus == "ok") {
                  ?>
                  <label for="fname[]" class="lable">غایب</label>
                  <input type="checkbox" class="checkbox" name="fname[]" value="not">
                  <label for="fname[]" class="lable">حاضر</label>
                  <input type="checkbox" class="checkbox" name="fname[]" value="ok" checked>
                  <?php
                 } else {
                  ?>
                  <label for="fname[]" class="lable">غایب</label>
                  <input type="checkbox" class="checkbox" name="fname[]" value="not" checked>
                  <label for="fname[]" class="lable">حاضر</label>
                  <input type="checkbox" class="checkbox" name="fname[]" value="ok">
                  <?php
                 }
                 ?>
                </td>
                </tr>
                <?php
               } ?>
               </tbody>
              </table>
              <input type="submit" name="Edit-send" class="btn d-block btn-warning m-auto mt-5" value="ویرایش">
             </form>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
     <!-- / Content -->
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
 </div>
 <!-- / Layout wrapper -->

<?php include_once '../assets/footer.php'; ?>