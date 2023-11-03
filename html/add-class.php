<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
$profileDetails = getProfilePicName();
$title = "ثبت کلاس";
$category = "مدرسه";
include_once '../assets/head.php';
if (isset($_POST['submit-btn'])) {
 $cName = $_POST['name'];
 $cGrade = $_POST['grade'];
 $cSchool = $_POST['school'];
 $cMajor = $_POST['major'];
 $sqli = "SELECT * FROM schools WHERE name=?";
 $ress = $pdo->prepare($sqli);
 $ress->bindValue(1, $cSchool);
 if ($rwo = $ress->execute()) {
  if ($ress->rowCount() >= 1) {
   $sql = "INSERT INTO classes SET name=?,grade=?,major=?,school=?";
   $resualt = $pdo->prepare($sql);
   $resualt->bindValue(1, $cName);
   $resualt->bindValue(2, $cGrade);
   $resualt->bindValue(3, $cMajor);
   $resualt->bindValue(4, $cSchool);
   if ($resualt->execute()) {
    echo '<script type="text/javascript">toastr.success("کلاس ثبت شد")</script>';
   } else {
    echo '<script type="text/javascript">toastr.error("متاسفانه کلاس ثبت نشد")</script>';
   }
  } else {
   echo '<script type="text/javascript">toastr.warning("مدرسه ای ب این نام وجود ندارد")</script>';
  }
 } else {
  echo '<script type="text/javascript">toastr.error("مدرسه ای ب این نام وجود ندارد")</script>';
 }
}
if (isset($_SESSION['class-deleted']) and $_SESSION['class-deleted'] != "") {
 echo '<script type="text/javascript">toastr.error("کلاس مورد نظر با موفقیت حذف شد")</script>';
 unset($_SESSION['class-deleted']);
}
if (isset($_SESSION['class-deleted-not']) and $_SESSION['class-deleted-not'] != "") {
 echo '<script type="text/javascript">toastr.success("شما از حذف کلاس منصرف شدید")</script>';
 unset($_SESSION['class-deleted-not']);
}

if (isset($_GET['editId'])) {
 if (isset($_POST['submit-btn-c'])) {
  $editidd = $_GET['editId'];
  $editname = $_POST['cname-e'];
  $cmajor = $_POST['cmajor'];
  $editgrade = $_POST['cgrade-e'];
  $editschool = $_POST['cschool-e'];
  $mysqlq = "UPDATE classes SET name=?,grade=?,major=?,school=? WHERE Id=$editidd";
  $resua = $pdo->prepare($mysqlq);
  $resua->bindValue(1, $editname);
  $resua->bindValue(2, $editgrade);
  $resua->bindValue(3, $cmajor);
  $resua->bindValue(4, $editschool);
  if ($resua->execute()) {
   echo '<script type="text/javascript">toastr.warning("کلاس مورد نظر با موفقیت ویرایش شد")</script>';
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
            <h5 class="card-title text-primary">لیست کلاس ها</h5>
            <p class="d-inline-block"> لیست کلاس های ثبت شده </p>
            <div id="avgmarkstable">
             <table class="table" dir="rtl">
              <thead>
              <tr>
               <th class="center pe-0">#</th>
               <th class="center pe-0">نام</th>
               <th class="center pe-0">پایه</th>
               <th class="center pe-0">رشته</th>
               <th class="center pe-0">مدرسه</th>
               <th class="center pe-0">عملیات</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $qry = "SELECT * FROM classes order by school";
              $res = $pdo->prepare($qry);
              $res->execute();
              $roww = $res->fetchAll();
              $i = 1;
              foreach ($roww as $row) {
               $id = $row['id'];
               ?>
               <tr>
                <td class="center pe-0"><?php print ($i); ?></td>
                <td class="center pe-0"><?php print ($row['name']); ?></td>
                <td class="center pe-0"><?php print ($row['grade']); ?></td>
                <td class="center pe-0"><?php print ($row['major']); ?></td>
                <td class="center pe-0"><?php print($row['school']); ?></td>
                <td class="center pe-0">
                 <?php echo '<a href="delete-class.php?DeleteId=' . $id . '" class="btn p-1 text-decoration-none"><i class="bx bx-trash"></i></a>'
                 ?>
                 <?php echo '<a href="add-class.php?editId=' . $id . '" class="btn p-1 text-decoration-none"><i class="bx bx-edit-alt"></i></a>'
                 ?>
                </td>
               </tr>
               <?php $i++;
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
            <h5 class="card-title text-primary">ثبت کلاس</h5>
            <p class="mb-4"> برای ثبت کلاس جدید از فرم زیر استفاده کنید </p>
            <form method="post">
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label" for="name">نام
               کلاس</label>
              <div class="col-sm-12">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="نام کلاس را وارد کنید" name="name">
              </div>
             </div>
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label"
                     for="manager-name">رشته</label>
              <div class="col-sm-12">
               <select style="text-align: right" type="text"
                       class="form-control"
                       name="major">
                <option value="ادبیات">ادبیات</option>
                <option value="تجربی">تجربی</option>
                <option value="ریاضی">ریاضی</option>
                <option value="کامپیوتر">کامپیوتر</option>
               </select>
              </div>
             </div>
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label"
                     for="manager-name">پایه</label>
              <div class="col-sm-12">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="پایه را وارد کنید(به صورت عددی)"
                      name="grade">
              </div>
             </div>
             <div class="row mb-2">
              <label style="font-size: 17px" class="form-label" for="phone">مدرسه</label>
              <div class="col-sm-12">

               <select name="school" id="" class="form-control"
                       style="direction: rtl">
                <option class="salam" style="font-size: 20px" selected
                        disabled value="">مدرسه را انتخاب کنید
                </option>
                <?php
                $sqlq = "SELECT * FROM schools";
                $sqlresualt = $pdo->prepare($sqlq);
                $sqlresualt->execute();
                $sqlrow = $sqlresualt->fetchAll();
                foreach ($sqlrow as $row) {
                 ?>
                 <option class="salam" style="font-size: 20px"
                         value="<?php print ($row['name']); ?>"><?php print ($row['name']); ?></option>
                <?php } ?>
               </select>
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
      $qruy = "SELECT * FROM classes WHERE id=$ID";
      $resu = $pdo->prepare($qruy);
      $resu->execute();
      $rowss = $resu->fetchALL();
      foreach ($rowss

      as $row) {
      $nam = $row['name'];
      $grad = $row['grade'];
      $major = $row['major'];
      $schoo = $row['school'];
      ?>
      <div class="row">
       <div class="col-lg-12 mb-4 border-0 m-auto">
        <div class="card">
         <div class="d-flex align-items-end row">
          <div class="">
           <div class="card-body">
            <h5 class="card-title text-primary">ویرایش اطلاعات</h5>
            <p class="mb-4"> برای ویرایش اطلاعات از فرم زیر استفاده کنید </p>
            <form method="post">
             <div class="row mb-4">
              <div class="col-sm-10">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="نام کلاس را وارد کنید"
                      value="<?php echo $nam; ?>" name="cname-e">
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="name">نام</label>
             </div>

             <div class="row mb-4">
              <div class="col-sm-10">
               <input style="text-align: right" type="text"
                      class="form-control"
                      id="basic-default-name"
                      placeholder="پایه را وارد کنید(به صورت عددی)"
                      name="cgrade-e"
                      value="<?php echo $grad; ?>">
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="manager-name">پایه</label>
             </div>
             <div class="row mb-4">
              <div class="col-sm-10">
               <select style="text-align: right" type="text"
                       class="form-control"
                       id="basic-default-name"
                       name="cmajor">
                <option value="<?php echo $major; ?>" selected><?php echo $major; ?></option>
                <option value="ادبیات">ادبیات</option>
                <option value="تجربی">تجربی</option>
                <option value="ریاضی">ریاضی</option>
                <option value="کامپیوتر">کامپیوتر</option>
               </select>
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="manager-name">پایه</label>
             </div>
             <div class="row mb-4">
              <div class="col-sm-10">
               <select name="cschool-e" id="" class="form-control"
                       style="direction: rtl">
                <option class="salam" style="font-size: 20px"
                        value="<?php echo $schoo; ?>"><?php echo $schoo; ?></option>
                <?php
                $sqlq = "SELECT * FROM schools";
                $sqlresualt = $pdo->prepare($sqlq);
                $sqlresualt->execute();
                $sqlrow = $sqlresualt->fetchAll();
                foreach ($sqlrow as $row) {
                 ?>
                 <option class="salam" style="font-size: 20px"
                         value="<?php print ($row['name']); ?>"><?php print ($row['name']); ?></option>
                <?php } ?>
               </select>
              </div>
              <label style="font-size: 17px" class="col-sm-2 col-form-label"
                     for="phone">مدرسه</label>
             </div>

             <div class="row justify-content-center">
              <div class="col-sm-12 mt-3 mb-2">
               <button name="submit-btn-c" type="submit"
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