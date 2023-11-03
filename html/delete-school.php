<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';

$profileDetails = getProfilePicName();
$title = "حذف مدرسه";
$category = "مدرسه";
include_once '../assets/head.php'; ?>
 <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
   <?php include_once '../assets/aside.php'; ?>
   <div class="layout-page">
    <?php include_once '../assets/nav.php' ?>
    <div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
       <div class="col-lg-12 mb-4 order-0">
        <div class="card h-100">
         <div class="d-flex align-items-end row">
          <div class="">
           <div class="card-body">
            <h5 class="card-title text-primary">مشخصات مدرسه</h5>
            <div class="col-12">
             <table class="table">
              <thead>
              <tr>
               <th scope="col">آدرس</th>
               <th scope="col">تلفن</th>
               <th scope="col">مدیر</th>
               <th scope="col">نام</th>
              </tr>
              </thead>
              <tbody>

              <?php
              if (isset($_GET['deleteId'])) {
               $idd = $_GET['deleteId'];
               $qry = "SELECT * FROM schools WHERE Id=$idd";
               $res = $pdo->prepare($qry);
               $res->execute();
               $roww = $res->fetchAll();
               foreach ($roww as $row) {
                $id = $row['Id'];
                ?>
                <tr>
                 <td><?php print ($row['address']); ?></td>
                 <td><?php print ($row['phone']); ?></td>
                 <td><?php print ($row['managername']); ?></td>
                 <td><?php print($row['name']); ?></td>
                </tr>
               <?php }
              } ?>
              </tbody>
             </table>

            </div>
            <div class="alert alert-danger mb-4 mt-5">
             <form method="post">
              <input style="width: 80px" type="submit" class="btn btn-danger" name="yes"
                     value="بله">
              <input style="width: 80px" type="submit" class="btn btn-success"
                     name="no"
                     value="خیر">
              <p class="pt-3 d-inline-block w-50" style="margin-right: 230px">
               آیا از حذف این مدرسه اطمینان
               دارید؟
              </p>
             </form>
             <?php if (isset($_POST['yes'])) {
              $idd = $_GET['deleteId'];
              $qry = "DELETE FROM schools WHERE Id=$idd";
              $res = $pdo->prepare($qry);
              $res->execute();
              $_SESSION['school-deleted'] = "مدرسه مورد نظر حذف شد";
              ?>
              <script>
                  window.location.href = "add-school.php";
              </script>
              <?php
             }
             ?>
             <?php if (isset($_POST['no'])) {
              $_SESSION['school-not-deleted'] = "مدرسه حذف نشد";
              ?>
              <script>
                  window.location.href = "add-school.php";
              </script>
              <?php
             }
             ?>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>

      </div>
     </div>
    </div>
    <div class="content-backdrop fade"></div>
   </div>
  </div>
 </div>
 <div class="layout-overlay layout-menu-toggle"></div>
<?php include_once '../assets/footer.php'; ?>