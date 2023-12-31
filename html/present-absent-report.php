<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';

  $profileDetails = getProfilePicName();
  $title = "گزارش کلاسی";
  $category = "حضور غیاب";
  $classname = $_GET['class'];
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
                                $qry = "SELECT DISTINCT atendence.date,atendence.details,atendence.codemeli,studentlist.codemeli,studentlist.class,studentlist.fathername FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli where studentlist.class='$classname' group by `date` ";
                                $run = $pdo->prepare($qry);
                                $run->execute();
                                $row = $run->fetchAll();
                                $Date = array();
                                foreach ($row as $row) { ?>
                                  <td class="center plr-0"><?php
                                      $date = $row['date'];
                                      $details = $row['details'];
                                      array_push($Date, $date);
                                    ?>
                                    <a class="text-secondary" title="<?php echo $details ?>"
                                       href="../assets/pr-ab-edit.php?DateId=<?php echo $date ?>&class=<?php echo $classname ?>"><?php echo miladiToShamsi($date) ?></a>
                                  </td>
                                  <?php
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
                              $i = 1;
                              foreach ($row as $row) {
                                $code = $row['codemeli'];
                                ?>
                                <tr>
                                  <td class="pe-0 center" id="radif"><?php echo $i; ?></td>
                                  <td class="pe-0 center" id="codemeli"><?php echo $row['codemeli']; ?></td>
                                  <td class="pe-0 center"><?php echo $row['fname']; ?></td>
                                  <td class="pe-0 center"><?php echo $row['lname']; ?></td>
                                  <td class="pe-0 center"><?php echo $row['fathername']; ?></td>
                                  <?php
                                    $FindQry = "SELECT atendence,id,date FROM `atendence` where codemeli='$code' order by date";
                                    $resualt = $pdo->prepare($FindQry);
                                    $resualt->execute();
                                    $roww = $resualt->fetchAll();
                                    $rowCount = $resualt->rowCount();
                                    foreach ($roww as $roww) {
                                      if ($rowCount < sizeof($Date)) {
                                        for ($i = 0; $i < (sizeof($Date) - $rowCount); $i++) {
                                          ?>
                                          <td class="center">
                                            <a>
                                            <span class="btn-sm p-0 btn-secondary">
                                          <i class="bx bx-x"></i>
                                        </span></a>
                                          </td>
                                          <?php
                                        }
                                      }
                                      if ($rowCount = sizeof($Date)) {
                                        $ststus = $roww['atendence'];
                                        if ($ststus == "ok") {
                                          ?>
                                          <td class="center">
                                            <a title="<?php print miladiToShamsi($roww['date']); ?>" href="../assets/pr-ab-edit.php?id=<?php print $roww['id']; ?>">
                                            <span class="btn-sm p-0 btn-success">
                                          <i class="bx bx-check"></i>
                                        </span></a>
                                          </td>
                                          <?php
                                        } else {
                                          ?>
                                          <td class="center">
                                            <a title="<?php print miladiToShamsi($roww['date']); ?>" href="../assets/pr-ab-edit.php?id=<?php print $roww['id']; ?>">
                                            <span class="btn-sm p-0 btn-warning">
                                          <i class="bx bx-x"></i>
                                        </span>
                                            </a>
                                          </td>
                                          <?php
                                        }
                                      }
                                      ?>

                                      <?php
                                    }
                                  ?>
                                </tr>
                                <?php $i++;
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