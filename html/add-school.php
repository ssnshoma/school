<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
$profileDetails = getProfilePicName();
$title = "لیست مدارس";
$category = "مدرسه";
include_once '../assets/head.php';
if (isset($_POST['submit-btn'])) {
 $sName = $_POST['name'];
 $sManager = $_POST['manager-name'];
 $sPhone = $_POST['phone'];
 $sAddress = $_POST['address'];
 $sql = "INSERT INTO schools SET name=?,managername=?,phone=?,address=?";
 $resualt = $pdo->prepare($sql);
 $resualt->bindValue(1, $sName);
 $resualt->bindValue(2, $sManager);
 $resualt->bindValue(3, $sPhone);
 $resualt->bindValue(4, $sAddress);
 if ($resualt->execute()) {
  echo '<script type="text/javascript">toastr.success("مدرسه ثبت شد")</script>';
 }
}
if (isset($_SESSION['school-deleted']) and $_SESSION['school-deleted'] != "") {
 echo '<script type="text/javascript">toastr.error("مدرسه مورد نظر با موفقیت حذف شد")</script>';
 unset($_SESSION['school-deleted']);
}
if (isset($_SESSION['school-not-deleted']) and $_SESSION['school-not-deleted'] != "") {
 echo '<script type="text/javascript">toastr.success("شما از حذف مدرسه منصرف شدید")</script>';
 unset($_SESSION['school-not-deleted']);
}
if (isset($_GET['editId'])) {
 if (isset($_POST['submit-btn-e'])) {
  $editidd = $_GET['editId'];
  $editname = $_POST['name-e'];
  $editmanager = $_POST['manager-name-e'];
  $editphone = $_POST['phone-e'];
  $editadress = $_POST['address-e'];
  $mysqlq = "UPDATE schools SET name=?,managername=?,phone=?,address=? WHERE Id=$editidd";
  $resua = $pdo->prepare($mysqlq);
  $resua->bindValue(1, $editname);
  $resua->bindValue(2, $editmanager);
  $resua->bindValue(3, $editphone);
  $resua->bindValue(4, $editadress);
  if ($resua->execute()) {
   echo '<script type="text/javascript">toastr.success("کلاس با موفقیت ویرایش شد")</script>';
  }
 }
}
?>
 <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
   <?php include_once '../assets/aside.php'; ?>
   <div class="layout-page">
    <?php include_once '../assets/nav.php' ?>
    <div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
       <div class="col-lg-8 mb-4 order-0">
        <div class="card h-100">
         <div class="d-flex align-items-end row">
          <div class="">
           <div class="card-body">
            <h5 class="card-title text-primary">لیست مدارس</h5>
            <?php if (isset($_SESSION['school-deleted'])) {
             ?>
             <div id="aletrs" class="alert alert-warning d-inline-block"
                  style="margin-right: 15px;width: 300px">
              <?php echo $_SESSION['school-deleted'] ?>
             </div>
             <?php
             unset($_SESSION['school-deleted']);
            } ?>
            <p class="mb-4 d-inline-block"> لیست مدارس ثبت شده </p>
            <div id="avgmarkstable">
             <table class="table" dir="rtl">
              <thead>
              <tr>
               <th class="center pe-0">#</th>
               <th class="center pe-0">نام</th>
               <th class="center pe-0">مدیر</th>
               <th class="center pe-0">تلفن</th>
               <th class="center pe-0" id="schooladdress">آدرس</th>
               <th class="center pe-0">ویرایش</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $qry = "SELECT * FROM schools";
              $res = $pdo->prepare($qry);
              $res->execute();
              $roww = $res->fetchAll();
              $i = 1;
              foreach ($roww as $row) {
               $id = $row['Id'];
               ?>
               <tr>
                <td class="center pe-0"><?php print($i); ?></td>
                <td class="center pe-0"><?php print($row['name']); ?></td>
                <td class="center pe-0"><?php print ($row['managername']); ?></td>
                <td class="center pe-0"><?php print ($row['phone']); ?></td>
                <td class="center pe-0" id="schooladdress"><?php print ($row['address']); ?></td>
                <td class="center pe-0">
                 <?php echo '<a href="delete-school.php?deleteId=' . $id . '" class="btn p-1 text-decoration-none" id="edit-btn"><i class="bx bx-trash"></i></a>'
                 ?>

                 <?php echo '<a href="add-school.php?editId=' . $id . '" class="btn p-1 text-decoration-none" id="edit-btn"><i class="bx bx-edit-alt"></i></a>'
                 ?>
                </td>
               </tr>
               <?php
               $i++;
              } ?>
              </tbody>
             </table>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>

       <div class="col-lg-4 mb-4 order-0">
        <div class="card">
         <div class="d-flex align-items-end row">
          <div class="">
           <div class="card-body">
            <h5 class="card-title text-primary">ثبت مدرسه جدید</h5>
            <p class="mb-4"> برای ثبت مدرسه جدید از فرم زیر استفاده کنید </p>
            <?php if (isset($_GET['inserted'])) { ?>
             <div id="aletrs"
                  class="alert alert-success alert-dismissible"> <?php print ($_GET['inserted']); ?> </div>
            <?php } ?>

            <form method="post">
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label"
                     for="name">نام</label>
              <div class="col-sm-12">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="نام مدرسه را وارد کنید" name="name">
              </div>
             </div>
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label"
                     for="manager-name">مدیر</label>
              <div class="col-sm-12">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="نام و نام خانوادگی مدیر"
                      name="manager-name">
              </div>
             </div>
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label" for="phone">تلفن</label>
              <div class="col-sm-12">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="شماره مدرسه" name="phone">
              </div>
             </div>
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label"
                     for="basic-default-name">آدرس</label>
              <div class="col-sm-12">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="آدرس" name="address">
              </div>
             </div>

             <div class="row justify-content-center">
              <div class="col-sm-12 mt-3 mb-2">
               <button name="submit-btn" type="submit"
                       class="btn btn-primary d-block m-auto">ثبت
               </button>
              </div>
             </div>
            </form>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      <?php
      if (isset($_GET['editId'])) {
      $ID = $_GET['editId'];
      $qruy = "SELECT * FROM schools WHERE id=$ID";
      $resu = $pdo->prepare($qruy);
      $resu->execute();
      $rowss = $resu->fetchALL();
      foreach ($rowss

      as $row) {
      $nam = $row['name'];
      $mange = $row['managername'];
      $addr = $row['address'];
      $number = $row['phone'];
      ?>
      <div class="row">
       <div class="col-lg-12 mb-4 border-0 m-auto">
        <div class="card">
         <div class="d-flex align-items-end row">
          <div class="">
           <div class="card-body">
            <h5 class="card-title text-primary">ویرایش اطلاعات</h5>
            <p class="mb-4"> برای ویرایش اطلاعات از فرم زیر استفاده کنید </p>
            <?php if (isset($_GET['get-inserted'])) { ?>
             <div id="aletrs"
                  class="alert alert-success alert-dismissible"> <?php print ($_GET['get-inserted']); ?> </div>
            <?php } ?>

            <form method="post">
             <div class="row mb-4">
              <div class="col-sm-10">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="نام مدرسه را وارد کنید"
                      value="<?php echo $nam; ?>" name="name-e">
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="name">نام</label>
             </div>
             <div class="row mb-4">
              <div class="col-sm-10">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="نام و نام خانوادگی مدیر"
                      name="manager-name-e"
                      value="<?php echo $mange; ?>">
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="manager-name">مدیر</label>
             </div>
             <div class="row mb-4">
              <div class="col-sm-10">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="شماره مدرسه" name="phone-e"
                      value="<?php echo $number; ?>">
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="phone">تلفن</label>
             </div>
             <div class="row mb-4">
              <div class="col-sm-10">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="آدرس" name="address-e"
                      value="<?php echo $addr; ?>">
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="basic-default-name">آدرس</label>
             </div>

             <div class="row justify-content-center">
              <div class="col-sm-12 mt-3 mb-2">
               <button name="submit-btn-e" type="submit"
                       class="btn btn-primary d-block m-auto">ثبت
               </button>
              </div>
             </div>
            </form>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
     <?php }
     } ?>
    </div>
    <div class="content-backdrop fade"></div>
   </div>
  </div>
 </div>
 <div class="layout-overlay layout-menu-toggle"></div>
<?php include_once '../assets/footer.php'; ?>