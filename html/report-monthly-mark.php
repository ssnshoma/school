<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  
  $profileDetails = getProfilePicName();
  $title = "نمرات دانش آموزان";
  $category = "ثبت نام";
 include_once '../assets/head.php';?>
<div class="layout-wrapper layout-content-navbar">
 <div class="layout-container">
   <?php include_once '../assets/aside.php'; ?>
  <div class="layout-page">
     <?php include_once '../assets/nav.php' ?>
   <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
     <div class="row flex-row-reverse">
       <div>
       <div class="card">
        <div class="d-flex align-items-center row">
         <div class="col-sm-12 m-auto pt-2 pb-2">
          <div class="card-body" id="marks-table" style="height: 80vh;overflow-y: scroll">
             <h5 class="card-title text-primary">دریافت نمرات دانش آموزان</h5>
           <div class="row flex-row" style="direction: rtl;overflow-x: scroll;">
            <table dir="rtl" class="table text-nowrap">
             <thead>
             <style>
               .pr-0{
                 padding-right: 0;
                 padding-left: 0;
               }
             </style>
             <tr>
              <td class="center pe-0">کد ملی</td>
              <td class="center pe-0">نام</td>
              <td class="center pe-0">نام خانوادگی</td>
              <td class="center pe-0">کلاس</td>
              <td class="center">مهر</td>
              <td class="center">آبان</td>
              <td class="center">آذر</td>
              <td class="center">دی</td>
              <td class="center">بهمن</td>
              <td class="center">اسفند</td>
              <td class="center">فروردین</td>
              <td class="center">اردیبهشت</td>
              <td class="center">خرداد</td>
             </tr>
             </thead>
             <tbody>
             <?php
               $sql = "SELECT DISTINCT codemeli,fname,lname,class FROM `monmark` ORDER BY lname";
               $codeFind = $pdo->prepare($sql);
               $codeFind->execute();
               $codes = $codeFind->fetchAll();
               foreach ($codes as $row) {
               $codemeli = $row['codemeli'];
               $fname = $row['fname'];
               $lname = $row['lname'];
               $class = $row['class'];
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
               $farvardinSql = "SELECT AVG(mark) as farvardin FROM `monmark` WHERE monCode=13 AND codemeli=$codemeli";
               $runfarvardin = $pdo->prepare($farvardinSql);
               $runfarvardin->execute();
               $farvardinMark = $runfarvardin->fetchAll();
               $farvardin = $farvardinMark[0]['farvardin'];
               $ordibeheshtSql = "SELECT AVG(mark) as ordibehesht FROM `monmark` WHERE monCode=14 AND codemeli=$codemeli";
               $runordibehesht = $pdo->prepare($ordibeheshtSql);
               $runordibehesht->execute();
               $ordibeheshtMark = $runordibehesht->fetchAll();
               $ordibehesht = $ordibeheshtMark[0]['ordibehesht'];
               $khordadSql = "SELECT AVG(mark) as khordad FROM `monmark` WHERE monCode=15 AND codemeli=$codemeli";
               $runkhordad = $pdo->prepare($khordadSql);
               $runkhordad->execute();
               $khordadMark = $runkhordad->fetchAll();
               $khordad = $khordadMark[0]["khordad"];
             ?>
             <tr>
              <td class="center pe-0"><?php echo $codemeli; ?></td>
              <td class="center pe-0"><?php echo $fname; ?></td>
              <td class="center pe-0"><?php echo $lname; ?></td>
              <td class="center pe-0"><?php echo $class; ?></td>
              <td class="center"><?php echo $mehr; ?></td>
              <td class="center"><?php echo $aban; ?></td>
              <td class="center"><?php echo $azar; ?></td>
              <td class="center"><?php echo $dey; ?></td>
              <td class="center"><?php echo $bahman; ?></td>
              <td class="center"><?php echo $esfand; ?></td>
              <td class="center"><?php echo $farvardin; ?></td>
              <td class="center"><?php echo $ordibehesht; ?></td>
              <td class="center"><?php echo $khordad; ?></td>
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
    <div class="content-backdrop fade"></div>
   </div>
  </div>
 </div>
 <div class="layout-overlay layout-menu-toggle"></div>
  <?php include_once '../assets/footer.php'; ?>
