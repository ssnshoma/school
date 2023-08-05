<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "گزارش نمرات";
  $category = "نمره";
?>
<?php include_once '../assets/head-1.php';

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
          <h3 class="card-title text-primary mb-4">گزارش کلاسی نمرات</h3>
          <h4 class="text-info mb-5"> برای بررسی نمرات لطفا موارد زیر را تکمیل کنید</h4>
          <div class="m-auto">
           <div class="form-group row" dir="rtl">
            <div class="col-md-4">
             <select name="class" id="month" style="text-align: right;" class="form-control form-group mt-4">
              <option disabled selected>ماه انتخاب شود</option>
              <option dir="rtl" value="7">مهر</option>
              <option dir="rtl" value="8">آبان</option>
              <option dir="rtl" value="9">آذر</option>
              <option dir="rtl" value="10">دی</option>
              <option dir="rtl" value="11">بهمن</option>
              <option dir="rtl" value="12">اسفند</option>
              <option dir="rtl" value="1">فروردین</option>
              <option dir="rtl" value="2">اردیبهشت</option>
              <option dir="rtl" value="3">خرداد</option>
             </select>
            </div>


            <div class="col-md-4">
             <select name="class" id="class" style="text-align: right;" class="form-control form-group mt-4">
              <option disabled selected>کلاس انتخاب شود</option>
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
            <div class="col-md-2">
             <input type="submit" name="send" value="ارسال" onclick="searchfunc()"
                    class="mb-5 mt-4 btn btn-success center-block">
            </div>

           </div>
          </div>

          <div class="row" dir="rtl">
           <table class="table align-right">
            <thead>
            <tr>
             <th scope="col" style="text-align: right">کد ملی</th>
             <th scope="col" style="text-align: right">نام</th>
             <th scope="col" style="text-align: right">نام خانوادگی</th>
             <th scope="col" style="text-align: right">مهر</th>
             <th scope="col" style="text-align: right">آبان</th>
             <th scope="col" style="text-align: right">آذر</th>
             <th scope="col" style="text-align: right">دی</th>
             <th scope="col" style="text-align: right">بهمن</th>
             <th scope="col" style="text-align: right">اسفند</th>
             <th scope="col" style="text-align: right">فروردین</th>
             <th scope="col" style="text-align: right">اردیبهشت</th>
             <th scope="col" style="text-align: right">خرداد</th>

            </tr>
            </thead>
            <tbody>

            <?php

              $sqll = "SELECT * FROM `month_mark` order by lname";
              $result3 = mysqli_query($conn, $sqll);
              if ($result3) {
                while ($row1 = mysqli_fetch_assoc($result3)) {
                  $codmeli = $row1['codemeli'];
                  $fname = $row1['fname'];
                  $lname = $row1['lname'];
                  $mehr = substr($row1['mehr'], 0, 5);
                  $aban = substr($row1['aban'], 0, 5);
                  $azar = substr($row1['azar'], 0, 5);
                  $dey = substr($row1['dey'], 0, 5);
                  $bahman = substr($row1['bahman'], 0, 5);
                  $esfand = substr($row1['esfand'], 0, 5);
                  $farvardin = substr($row1['farvardin'], 0, 5);
                  $ordibehesht = substr($row1['ordibehesht'], 0, 5);
                  $khordad = substr($row1['khordad'], 0, 5);

                  echo ' <tr><td scope="row">' . $codmeli . '</th>
                            <td>' . $fname . '</td>
                            <td>' . $lname . '</td>
                            <td>' . $mehr . '</td>
                            <td>' . $aban . '</td>
                            <td>' . $azar . '</td>
                            <td>' . $dey . '</td>
                            <td>' . $bahman . '</td>
                            <td>' . $esfand . '</td>
                            <td>' . $farvardin . '</td>
                            <td>' . $ordibehesht . '</td>
                            <td>' . $khordad . '</td>
                            </tr>';
                }
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
     <?php include_once '../assets/page-footer.php'; ?>
   </div>
  </div>
  <!-- / Layout page -->
 </div>

 <!-- Overlay -->
 <!-- / Layout wrapper -->
 <script>
     function searchfunc() {
         let month = document.getElementById('month').value;
         let className = document.getElementById('class').value;
         let xmlHttp;
         if (window.XMLHttpRequest) {
             xmlHttp = new XMLHttpRequest();
         } else {
             xmlHttp = new ActiveXObject();
         }
         xmlHttp.onreadystatechange = function () {
             if (xmlHttp.states == 200 && xmlHttp.readyState == 4) {
                 document.getElementById('').innerHTML = xmlHttp.responseText;
             }
         }
         xmlHttp.open("POST", "")
     }

 </script>


  <?php include_once '../assets/footer.php'; ?>
