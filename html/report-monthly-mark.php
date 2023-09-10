<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "نمرات دانش آموزان";
  $category = "ثبت نام";
?>

<?php include_once '../assets/head.php';?>


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
             <h5 class="card-title text-primary">دریافت نمرات دانش آموزان</h5>
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
                     id="sel-class" tabindex="4" style="padding-right: 40px">
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
          <div class="card-body" id="marks-table" style="height: 500px">
           <div class="row flex-row" style="direction: rtl;overflow-x: scroll;">
            <table dir="rtl" class="table">
             <thead>
             <tr>
              <td>کد ملی</td>
              <td>نام</td>
              <td style="display: inline-block;width: 150px;border:none">نام خانوادگی</td>
              <td>مهر</td>
              <td>آبان</td>
              <td>آذر</td>
              <td>دی</td>
              <td>بهمن</td>
              <td>اسفند</td>
              <td>فروردین</td>
              <td>اردیبهشت</td>
              <td>خرداد</td>
             </tr>
             </thead>
             <tbody>
             <?php

               $sql = "SELECT DISTINCT codemeli,fname,lname FROM `monmark` ORDER BY lname";
               $codeFind = $pdo->prepare($sql);
               $codeFind->execute();
               $codes = $codeFind->fetchAll();
               foreach ($codes

               as $row) {
               $codemeli = $row['codemeli'];
               $fname = $row['fname'];
               $lname = $row['lname'];

               $mehrSql = "SELECT AVG(mark) as mehr FROM `monmark` WHERE monCode=7 AND codemeli=$codemeli";
               $runMehr = $pdo->prepare($mehrSql);
               $runMehr->execute();
               $mehrMark = $runMehr->fetchAll();
               $mehr = $mehrMark[0]['mehr'];

               $abanSql = "SELECT AVG(mark) as aban FROM `monmark` WHERE monCode=8 AND codemeli=$codemeli";
               $runaban = $pdo->prepare($abanSql);
               $runaban->execute();
               $abanMark = $runaban->fetchAll();
               $aban = $abanMark[0]['aban'];


               $azarSql = "SELECT AVG(mark) as azar FROM `monmark` WHERE monCode=9 AND codemeli=$codemeli";
               $runazar = $pdo->prepare($azarSql);
               $runazar->execute();
               $azarMark = $runazar->fetchAll();
               $azar = $azarMark[0]['azar'];

               $deySql = "SELECT AVG(mark) as dey FROM `monmark` WHERE monCode=10 AND codemeli=$codemeli";
               $rundey = $pdo->prepare($deySql);
               $rundey->execute();
               $deyMark = $rundey->fetchAll();
               $dey = $deyMark[0]['dey'];

               $bahmanSql = "SELECT AVG(mark) as bahman FROM `monmark` WHERE monCode=11 AND codemeli=$codemeli";
               $runbahman = $pdo->prepare($bahmanSql);
               $runbahman->execute();
               $bahmanMark = $runbahman->fetchAll();
               $bahman = $bahmanMark[0]['bahman'];

               $esfandSql = "SELECT AVG(mark) as esfand FROM `monmark` WHERE monCode=12 AND codemeli=$codemeli";
               $runesfand = $pdo->prepare($esfandSql);
               $runesfand->execute();
               $esfandMark = $runesfand->fetchAll();
               $esfand = $esfandMark[0]['esfand'];

               $farvardinSql = "SELECT AVG(mark) as farvardin FROM `monmark` WHERE monCode=1 AND codemeli=$codemeli";
               $runfarvardin = $pdo->prepare($farvardinSql);
               $runfarvardin->execute();
               $farvardinMark = $runfarvardin->fetchAll();
               $farvardin = $farvardinMark[0]['farvardin'];

               $ordibeheshtSql = "SELECT AVG(mark) as ordibehesht FROM `monmark` WHERE monCode=2 AND codemeli=$codemeli";
               $runordibehesht = $pdo->prepare($ordibeheshtSql);
               $runordibehesht->execute();
               $ordibeheshtMark = $runordibehesht->fetchAll();
               $ordibehesht = $ordibeheshtMark[0]['ordibehesht'];

               $khordadSql = "SELECT AVG(mark) as khordad FROM `monmark` WHERE monCode=3 AND codemeli=$codemeli";
               $runkhordad = $pdo->prepare($khordadSql);
               $runkhordad->execute();
               $khordadMark = $runkhordad->fetchAll();
               $khordad = $khordadMark[0]["khordad"];

             ?>

             <tr>
              <td><?php echo $codemeli; ?></td>
              <td><?php echo $fname; ?></td>
              <td><?php echo $lname; ?></td>
              <td><?php echo $mehr; ?></td>
              <td><?php echo $aban; ?></td>
              <td><?php echo $azar; ?></td>
              <td><?php echo $dey; ?></td>
              <td><?php echo $bahman; ?></td>
              <td><?php echo $esfand; ?></td>
              <td><?php echo $farvardin; ?></td>
              <td><?php echo $ordibehesht; ?></td>
              <td><?php echo $khordad; ?></td>
               <?php } ?>
             </tr>
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
             xmlHttp.open("GET", "../assets/searchClass.php?MarkSchool=" + str);
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
         var xmlHttP = new XMLHttpRequest();
         xmlHttP.onreadystatechange = function () {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("tbody").innerHTML = this.responseText;
             }
         };
         xmlHttP.open("GET", "../assets/searchClass.php?MarkClass=" + str);
         xmlHttP.send();

     }

 </script>

  <?php include_once '../assets/footer.php'; ?>
