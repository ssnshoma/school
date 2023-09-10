<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت کلاس";
  $category = "مدرسه"
?>
<?php include_once '../assets/head.php'; ?>

<?php
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
          $_GET['c-inserted'] = "ثبت شد";
        } else {
          $_GET['cn-inserted'] = "مدرسه ای ب این نام وجود ندارد";
        }
      } else {
        $_GET['cn-inserted'] = "مدرسه ای ب این نام وجود ندارد";
      }
    } else {
      $_GET['cn-inserted'] = "مدرسه ای ب این نام وجود ندارد";
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

     <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
       <div class="col-lg-8 mb-4 order-0">
        <div class="card h-100">
         <div class="d-flex align-items-end row">
          <div class="">
           <div class="card-body">
            <h5 class="card-title text-primary">لیست کلاس ها</h5>
             <?php if (isset($_GET['remove'])) {
               ?>
              <div id="alerts" class="alert alert-warning d-inline-block"
                   style="margin-right: 15px;width: 300px">
               کلاس مورد نظر حذف شد
              </div>
             <?php } ?>

             <?php if (isset($_SESSION['class-deleted'])) {
               ?>
              <div id="alerts" class="alert alert-warning d-inline-block"
                   style="margin-right: 15px;width: 300px">
                <?php echo $_SESSION['class-deleted'] ?>
              </div>
               <?php
               unset($_SESSION['class-deleted']);
             } ?>
            <p class="mb-4 d-inline-block"> لیست کلاس های ثبت شده </p>
            <div id="avgmarkstable">
             <table class="table" dir="rtl">
              <thead>
              <tr>
               <th scope="col">نام</th>
               <th scope="col">پایه</th>
               <th scope="col">رشته</th>
               <th scope="col">مدرسه</th>
               <th scope="col">عملیات</th>
              </tr>
              </thead>
              <tbody>

              <?php
                $qry = "SELECT * FROM classes order by school";
                $res = $pdo->prepare($qry);
                $res->execute();
                $roww = $res->fetchAll();
                foreach ($roww as $row) {
                  $id = $row['id'];
                  ?>
                 <tr>
                  <td><?php print ($row['name']); ?></td>
                  <td><?php print ($row['grade']); ?></td>
                  <td><?php print ($row['major']); ?></td>
                  <td><?php print($row['school']); ?></td>
                  <td>
                    <?php echo '<a href="delete-class.php?DeleteId=' . $id . '" class="btn p-1 text-decoration-none"><i class="bx bx-trash"></i></a>'
                    ?>
                    <?php echo '<a href="add-class.php?editId=' . $id . '" class="btn p-1 text-decoration-none"><i class="bx bx-edit-alt"></i></a>'
                    ?>
                  </td>
                 </tr>
                <?php } ?>
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

             <?php if (isset($_GET['c-inserted'])) { ?>
              <div
               class="alert alert-success alert-dismissible"> <?php print ($_GET['c-inserted']); ?> </div>
             <?php } ?>

             <?php if (isset($_GET['cn-inserted'])) { ?>
              <div
               class="alert alert-danger alert-dismissible"> <?php print ($_GET['cn-inserted']); ?> </div>
             <?php } ?>

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
         if (isset($_GET['DeleteId'])) {
           $ID = $_GET['DeleteId'];
           $qruy = "DELETE FROM classes WHERE id=$ID";
           $resu = $pdo->prepare($qruy);
           if ($resu->execute()) {
             $_SESSION['dleted'] = "کلاس مورد نظر حذف شد"
             ?>
            <script>
                window.location.href = "add-class.php?remove=true";
            </script>
             <?php
           }
         }
       ?>

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
                <option class="salam" style="font-size: 20px" value="<?php echo $schoo; ?>"><?php echo $schoo; ?></option>
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

 <!-- / Layout wrapper -->

<?php
  if (isset($_GET['editId'])) { ?>
   <script>
       window.scrollTo({left: 0, top: 10000, behavior: "smooth"});
   </script>
    <?php
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
      if ($resua->execute()) { ?>
       <script>
           window.location.href = "add-class.php";
           window.scrollTo({left: 0, top: 0, behavior: "smooth"});
       </script>
        <?php
      }
    }
  }
?>


<?php include_once '../assets/footer.php'; ?>