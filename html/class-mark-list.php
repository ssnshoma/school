<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
include_once '../assets/files/jdf.php';
$profileDetails = getProfilePicName();
$title = "گزارش کلاسی";
$category = "نمرات";
$classname = $_GET['class'];
$schoolName = $_GET['school'];
$marks = array();
include_once '../assets/head.php'; ?>
 <style>
     @media print {
         * {
             padding: 0 !important;
             margin: 0 !important;
             box-sizing: border-box;
         }

         #print {
             display: none;
         }

         nav {
             display: none !important;
         }

         body, div, nav, aside, section, table {
             box-shadow: none !important;
             font-size: 10px;
         }

         tbody td:nth-child(n+2) {
             border-right: 1px solid rgba(0, 0, 0, 0.12) !important;
         }

         thead td:nth-child(n+2) {
             border-right: 1px solid rgba(0, 0, 0, 0.12) !important;
         }

         tfoot td:nth-child(n+5) {
             border-right: 1px solid rgba(0, 0, 0, 0.12) !important;
             border-bottom: 1px solid rgba(0, 0, 0, 0.12) !important;
         }

         tfoot td:nth-child(n) {
             border-bottom: none;
         }

     }

     tbody td:nth-child(n+2) {
         border-right: 1px solid rgba(0, 0, 0, 0.12);
     }

     thead td:nth-child(n+2) {
         border-right: 1px solid rgba(0, 0, 0, 0.12);
     }

     tfoot td:nth-child(n+5) {
         border-right: 1px solid rgba(0, 0, 0, 0.12) !important;
         border-bottom: 1px solid rgba(0, 0, 0, 0.12) !important;
     }

     tfoot td:nth-child(n) {
         border-bottom: none;
     }

 </style>
 <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
   <?php include_once '../assets/aside.php'; ?>
   <div class="layout-page">
    <?php include_once '../assets/nav.php' ?>
    <div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
       <div class="col-lg-12 mb-4 order-0">
        <div class="card">
         <div class="d-flex align-items-end row">
          <div class="col-sm-12">
           <div class="card-body">
            <div class="row justify-content-between flex-row-reverse mb-2" style="align-items: baseline">
             <h5 class="text-info card-title col-md-10 text-primary">لیست نمرات کلاس
              <strong
               style="font-size: 20px;color: black;margin: 0 4px;padding: 4px 5px;"><?php echo $classname; ?></strong>
              مدرسه
              <strong
               style="font-size: 20px;color: black;margin: 0 4px;padding: 4px 5px;"><?php echo $schoolName; ?></strong>
             </h5>
             <div class="col-md-1">
              <a href="" class="btn btn-sm btn-secondary btn-block" id="print" onClick="window.print()">چاپ</a>
             </div>
            </div>
            <div dir="rtl" id="avgmarkstable" class="text-nowrap">
             <table class="table">
              <thead>
              <tr>
               <td class="pe-0 center" id="radif">ردیف</td>
               <td class="pe-0 center" id="codemeli">کد ملی</td>
               <td class="pe-0 center">نام</td>
               <td class="pe-0 center th-lg">نام خانوادگی</td>
               <td class="pe-0 center th-lg">نام پدر</td>
               <?php
               $qry = "SELECT DISTINCT monmark.tarikh,monmark.details,monmark.codemeli,studentlist.codemeli,studentlist.class,studentlist.fathername FROM `studentlist` join `monmark` on monmark.codemeli=studentlist.codemeli where studentlist.class='$classname' and `monCode`<=16 group by `tarikh` ";
               $run = $pdo->prepare($qry);
               $run->execute();
               $row = $run->fetchAll();
               $Date = array();
               $i = 1;
               foreach ($row as $row) { ?>
                <td class="center plr-0" id="tarikh"
                    style="width: 20px !important;text-align: center"><?php
                 $date = $row['tarikh'];
                 $details = $row['details'];
                 array_push($Date, $date);
                 echo $i;
                 $i++;
                 ?>
                 <!--                 <a class="text-secondary" title="--><?php //echo $details ?><!--"-->
                 <!--                    href="../assets/mark-day-edit.php?DateId=--><?php //echo $date ?><!--&class=-->
                 <?php //echo $classname ?><!--">--><?php //echo miladiToShamsi($date) ?><!--</a>-->
                </td>
                <?php
               }
               foreach ($Date as $day) {
                array_push($marks, "-");
               }
               ?>
              </tr>
              </thead>
              <tbody>
              <?php
              $qry = "SELECT studentlist.fname,monmark.id,monmark.tarikh,studentlist.class,studentlist.lname,studentlist.codemeli,studentlist.fathername FROM `studentlist` join `monmark` on monmark.codemeli=studentlist.codemeli WHERE studentlist.class='$classname' GROUP BY studentlist.codemeli ORDER BY lname,tarikh";
              $run = $pdo->prepare($qry);
              $run->execute();
              $row = $run->fetchAll();
              $radif = 1;
              foreach ($row as $row) {
               $code = $row['codemeli'];
               ?>
               <tr>
                <td class="pe-0 center" id="radif"><?php echo $radif; ?></td>
                <td class="pe-0 center" id="codemeli"><?php echo $row['codemeli']; ?></td>
                <td class="pe-0 center"><?php echo $row['fname']; ?></td>
                <td class="pe-0 center"><?php echo $row['lname']; ?></td>
                <td class="pe-0 center"><?php echo $row['fathername']; ?></td>
                <?php
                foreach ($Date as $day) {
                 $FindQry = "SELECT mark,id,tarikh,monCode FROM `monmark` where `codemeli`='$code' and `tarikh`='$day' and `monCode`<=16 order by tarikh";
                 $resualt = $pdo->prepare($FindQry);
                 $resualt->execute();
                 $roww = $resualt->fetchAll();
                 $rowCount = $resualt->rowCount();
                 if ($rowCount == 0) {
                  echo '<td class="center" id="marke">-</td>';
                 } else {
                  foreach ($roww as $roww) {
                   ?>
                   <td class="center" id="marke">
                    <a class="text-secondary"
                       href="../assets/mark-opration.php?editid=<?php echo $roww['id']; ?>"><?php echo $roww['mark'] ?></a>
                   </td>
                   <?php
                  }
                 }
                }
                ?>
               </tr>
               <?php
               $radif++;
              }
              ?>
              </tbody>
              <tfoot>
              <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td class="pe-0 center">توضیحات</td>
               <?php
               $qry = "SELECT DISTINCT monmark.tarikh,monmark.details,monmark.codemeli,studentlist.codemeli,studentlist.class,studentlist.fathername FROM `studentlist` join `monmark` on monmark.codemeli=studentlist.codemeli where studentlist.class='$classname' and `monCode`<=16 group by `tarikh` ";
               $run = $pdo->prepare($qry);
               $run->execute();
               $row = $run->fetchAll();
               $Date = array();
               $i = 1;
               foreach ($row as $row) { ?>
                <td class="center plr-0" id="tarikh"
                    style="writing-mode:vertical-rl;line-height: 45px;width: 20px !important;text-align: center"><?php
                 $date = $row['tarikh'];
                 $details = $row['details'];
                 array_push($Date, $date);
                 ?>
                 <a class="text-secondary" title="<?php echo $details ?>"
                    href="../assets/mark-day-edit.php?DateId=<?php echo $date ?>&class=<?php echo $classname ?>"><?php echo $details ?></a>
                </td>
                <?php
               }
               foreach ($Date as $day) {
                array_push($marks, "-");
               }
               ?>
              </tr>
              <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td class="pe-0 center">تاریخ</td>
               <?php
               $qry = "SELECT DISTINCT monmark.tarikh,monmark.details,monmark.codemeli,studentlist.codemeli,studentlist.class,studentlist.fathername FROM `studentlist` join `monmark` on monmark.codemeli=studentlist.codemeli where studentlist.class='$classname' and `monCode`<=16 group by `tarikh` ";
               $run = $pdo->prepare($qry);
               $run->execute();
               $row = $run->fetchAll();
               $Date = array();
               $i = 1;
               foreach ($row as $row) { ?>
                <td class="center plr-0" id="tarikh"
                    style="writing-mode:vertical-rl;line-height: 45px;width: 20px !important;text-align: center"><?php
                 $date = $row['tarikh'];
                 $details = $row['details'];
                 array_push($Date, $date);
                 ?>
                 <a class="text-secondary" title="<?php echo $details ?>"
                    href="../assets/mark-day-edit.php?DateId=<?php echo $date ?>&class=<?php echo $classname ?>"><?php echo miladiToShamsi($date) ?></a>
                </td>
                <?php
               }
               foreach ($Date as $day) {
                array_push($marks, "-");
               }
               ?>
              </tr>
              </tfoot>
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
 </div>
<?php include_once '../assets/footer.php'; ?>