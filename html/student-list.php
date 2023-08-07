<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "لیست دانش آموزان";
  $category = "ثبت نام";
?>


<?php include_once '../assets/head.php'; ?>

<?php

?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
 <div class="layout-container">
  <!-- Menu -->

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
     <div class="row flex-row-reverse">
      <div>
       <div class="card">
        <div class="d-flex align-items-center row">
         <div class="col-sm-12 m-auto">
          <div class="card-body">
           <div class="row flex-row" style="direction: rtl">
            <div class="col-md-3">
             <h5 class="card-title text-primary">دریافت لیست دانش آموزان</h5>
            </div>
            <div class="col-md-4">
             <label for="selschool" class="pb-1">مدرسه</label>
             <select name="selschool" onchange="changeSelectOption(this.value)"
                     class="form-select mb-1"
                     id="selschool" tabindex="1" style="padding-right: 40px">
              <option selected disabled>مدرسه را انتخاب کنید</option>
               <?php
                 $sql = "SELECT * FROM schools";
                 $resualt = $pdo->prepare($sql);
                 $resualt->execute();
                 $roww = $resualt->fetchAll(PDO::FETCH_ASSOC);
                 foreach ($roww as $row) {
                   ?>
                  <option style="direction: rtl"
                          value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                 <?php } ?>

             </select>
            </div>
            <div class="col-md-4">
             <label for="sel-class" class="pb-1">کلاس</label>
             <select name="sel-class" class="form-select mb-1" onchange="cshowGrade(this.value)"
                     id="sel-class" tabindex="2" style="padding-right: 40px">
              <option selected class="pe-5" disabled> کلاس را انتخاب کنید</option>
             </select>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>

      <div class="mt-2">
       <div class="card">
        <div class="d-flex align-items-center row">
         <div class="col-sm-12 m-auto">
          <div class="card-body" style="height: 500px">

           <div class="row flex-row" style="direction: rtl;height: 440px;overflow-y: scroll">

            <table class="table align-right" style="height: fit-content">
             <thead>
             <tr>
              <th style="text-align: right;padding: 0.5rem 1.1rem">کد ملی</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">نام</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">نام خانوادگی</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">نام پدر</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">مدرسه</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">کلاس</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">رشته</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">پایه</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem">عملیات</th>

             </tr>
             </thead>
             <tbody id="tbody">

             <?php

               $sqll = "SELECT * FROM `studentlist` order by lname";
               $result3 = mysqli_query($conn, $sqll);
               if ($result3) {
                 while ($row1 = mysqli_fetch_assoc($result3)) {
                   $codmeli = $row1['codemeli'];
                   $fname = $row1['fname'];
                   $lname = $row1['lname'];
                   $fathername = $row1['fathername'];
                   $school = $row1['school'];
                   $class = $row1['class'];
                   $major = $row1['major'];
                   $grade = $row1['grade'];
                   ?>

                  <tr>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $codmeli; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $fname; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $lname; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $fathername; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $school; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $class; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $major; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $grade; ?></td>
                   <td>
                    <a href="../assets/opration.php?editid=<?php echo $codmeli; ?>" class="btn btn-sm btn-warning">
                     <i class="bx bx-edit-alt"></i>
                    </a>
                    <a href="../assets/opration.php?deleteid=<?php echo $codmeli; ?>" class="btn btn-sm btn-danger">
                     <i class="bx bx-trash me-1"></i>
                    </a>
                   </td>
                  </tr>
                 <?php }
               }
             ?>
             </tbody>
            </table>
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
 <!-- / Layout wrapper -->

 <script>

     function changeSelectOption(str) {

         if (str == "") {
             document.getElementById("tbody").innerHTML = " ";
             return;
         } else {
             var xmlHttp = new XMLHttpRequest();
             xmlHttp.onreadystatechange = function () {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("tbody").innerHTML = this.responseText;
                 }
             };
             xmlHttp.open("GET", "../assets/searchClass.php?tbody=" + str);
             xmlHttp.send();
         }


         if (str == "") {
             document.getElementById("selschool").innerHTML = "";
             return;
         } else {
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function () {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("sel-class").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET", "../assets/searchClass.php?school=" + str);
             xmlhttp.send();
         }
     }

     function cshowGrade(str) {

         document.getElementById("tbody").innerHTML = "";
         console.log('exit');
         var xmlHttP = new XMLHttpRequest();
         xmlHttP.onreadystatechange = function () {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("tbody").innerHTML = this.responseText;
             }
         };
         xmlHttP.open("GET", "../assets/searchClass.php?tbodyClass=" + str);
         xmlHttP.send();

     }

 </script>

  <?php include_once '../assets/footer.php'; ?>
