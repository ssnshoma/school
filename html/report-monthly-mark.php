<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "نمرات دانش آموزان";
  $category = "ثبت نام";
?>

<?php
  $conn = mysqli_connect("localhost", "root", "", "");
  mysqli_select_db($conn, '1402s1403');
  $sql = "SELECT fname,lname,class,school,codemeli,monCode, AVG(mark) as mark FROM `monmark` GROUP BY codemeli,monCode;";
  $resualtInsert = mysqli_query($conn, $sql);
  while ($resualt = mysqli_fetch_assoc($resualtInsert)) {
    $codemeli = $resualt['codemeli'];
    $fname = $resualt['fname'];
    $lname = $resualt['lname'];
    $class = $resualt['class'];
    $school = $resualt['school'];
    $mark = $resualt['mark'];
    $monthcode = $resualt['monCode'];
    $qry = "SELECT * From `month_mark` WHERE codemeli=$codemeli";
    $query_run = mysqli_query($conn, $qry);
    $rowcount = mysqli_num_rows($query_run);
    if ($rowcount <= 0) {
      if ($monthcode == "7") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `mehr`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "8") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `aban`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "9") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `azar`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "10") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `dey`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "11") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `bahman`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "12") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `esfand`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "1") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `farvardin`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "2") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `ordibehesht`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `khordad`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      }
    } else {
      if ($monthcode == "7") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `mehr`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "8") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `aban`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "9") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `azar`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "10") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `dey`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "11") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `bahman`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "12") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `esfand`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "1") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `farvardin`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "2") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `ordibehesht`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `khordad`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      }
    }
  }


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

           <div class="row flex-row" style="direction: rtl;height: 440px;overflow-y: scroll;">

            <table class="table align-right" style="height: fit-content;padding: 0.5rem 1.1rem;">
             <thead style="padding: 0.5rem 1.1rem;">
             <tr>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">کد ملی</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">نام</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">نام خانوادگی</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">کلاس</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">مدرسه</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">مهر</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">آبان</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">آذز</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">دی</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">بهمن</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">اسفند</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">فروردین</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">اردیبهشت</th>
              <th style="text-align: right;padding: 0.5rem 1.1rem;">خرداد</th>

             </tr>
             </thead>
             <tbody id="tbody">

             <?php

               $sqll = "SELECT * FROM `month_mark` order by lname";
               $result3 = mysqli_query($conn, $sqll);
               if ($result3) {
                 while ($row1 = mysqli_fetch_assoc($result3)) {
                   ?>
                  <tr>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['codemeli']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['fname']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['lname']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['class']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['school']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['mehr']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['aban']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['azar']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['dey']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['bahman']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['esfand']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['farvardin']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['ordibehesht']; ?></td>
                   <td style="padding: 0.5rem 1.1rem"><?php echo $row1['khordad']; ?></td>
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
