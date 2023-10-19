<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $profileDetails = getProfilePicName();
  $title = "گزارش کلاسی";
  $category = "حضور غیاب";
  $classname = $_GET['class'];
  $marks = array();
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
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                      <div class="card-body">
                        <h5 class="text-info card-title text-primary">لیست حضور غیاب کلاس
                          <strong
                            style="font-size: 20px;color: black;margin: 0 4px;padding: 4px 5px;"><?php echo $classname; ?></strong>
                        </h5>
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
                                foreach ($row as $row) { ?>
                                  <td class="center plr-0"><?php
                                      $date = $row['tarikh'];
                                      $details = $row['details'];
                                      array_push($Date, $date);
                                    ?>
                                    <a class="text-secondary" title="<?php echo $details ?>"
                                       href="../assets/pr-ab-edit.php?DateId=<?php echo $date ?>&class=<?php echo $classname ?>"><?php echo miladiToShamsi($date) ?></a>
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
                              $qry = "SELECT studentlist.fname,atendence.id,studentlist.class,studentlist.lname,studentlist.codemeli,studentlist.fathername FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli WHERE studentlist.class='$classname' GROUP BY studentlist.codemeli ORDER BY lname,date";
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
                                        echo '<td class="center">-</td>';
                                      } else {
                                        foreach ($roww as $roww) {
                                          ?>
                                          <td class="center">
                                            <a class="text-secondary" href="../assets/mark-opration.php?editid=<?php echo $roww['id'];?>"><?php echo $roww['mark']?></a>
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