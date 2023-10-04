<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "گزارش";
  $category = "حضور غیاب";
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
                        <h5 class="card-title text-primary">گزارش حضور و غیاب</h5>
                        <div id="avgmarkstable">
                          <table class="table" dir="rtl">
                            <thead>
                            <tr>
                              <td id="radif">ردیف</td>
                              <td id="codemeli">کد ملی</td>
                              <td>نام</td>
                              <td>نام خانوادگی</td>
                              <?php
                                $qry = "SELECT DISTINCT atendence.date FROM `atendence` order by date";
                                $run = $pdo->prepare($qry);
                                $run->execute();
                                $row = $run->fetchAll();
                                foreach ($row as $row) { ?>
                                  <td class="center plr-0" ><?php
                                      $date = $row['date'];
                                      echo miladiToShamsi($date);
                                      ?>
                                  </td>
                                  <?php
                                }
                              ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                              $qry = "SELECT distinct studentlist.fname,studentlist.lname,studentlist.codemeli,atendence.codemeli FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli ORDER BY date,lname";
                              $run = $pdo->prepare($qry);
                              $run->execute();
                              $row = $run->fetchAll();
                              $i = 1;
                              foreach ($row as $row) {
                                $code = $row['codemeli'];
                                ?>
                                <tr>
                                  <td id="radif"><?php echo $i; ?></td>
                                  <td id="codemeli"><?php echo $row['codemeli']; ?></td>
                                  <td><?php echo $row['fname']; ?></td>
                                  <td><?php echo $row['lname']; ?></td>
                                  <?php
                                    $FindQry = "SELECT atendence FROM `atendence` where codemeli='$code' order by date";
                                    $resualt = $pdo->prepare($FindQry);
                                    $resualt->execute();
                                    $roww = $resualt->fetchAll();
                                    foreach ($roww as $roww) {
                                      ?>
                                      <td class="center">
                                        <?php
                                          $ststus = $roww['atendence'];
                                          if ($ststus == "ok") {
                                            ?>
                                            <span class="btn-sm p-0 btn-success">
                                          <i class="bx bx-check"></i>
                                        </span>
                                            <?php
                                          } else {
                                            ?>
                                            <span class="btn-sm p-0 btn-warning">
                                          <i class="bx bx-x"></i>
                                        </span>
                                            <?php
                                          }
                                        ?></td>
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
          <!-- / Content -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->


<?php include_once '../assets/footer.php'; ?>