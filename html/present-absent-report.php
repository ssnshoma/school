<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "گزارش کلاسی";
  $category = "حضور غیاب";
  $classname=$_GET['class'];
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
                          <strong style="font-size: 20px;color: black;margin: 0 4px;padding: 4px 5px;"><?php echo $classname; ?></strong>
                         </h5>
                        <div  dir="rtl" id="avgmarkstable" class="text-nowrap">
                          <table class="table">
                            <thead>
                            <tr>
                              <td id="radif">ردیف</td>
                              <td id="codemeli">کد ملی</td>
                              <td>نام</td>
                              <td class="th-lg">نام خانوادگی</td>
                              <?php
                                $qry = "SELECT DISTINCT atendence.date,atendence.codemeli,studentlist.codemeli,studentlist.class FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli where studentlist.class='$classname' group by `date` ";
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
                              $qry = "SELECT studentlist.fname,atendence.id,studentlist.class,studentlist.lname,studentlist.codemeli,atendence.codemeli FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli WHERE studentlist.class='$classname' GROUP BY studentlist.codemeli ORDER BY date,lname";
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
                                  <td class="col-5"><?php echo $row['lname']; ?></td>
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
                                            ?><a href="../assets/pr-ab-edit.php?id=<?php print $row['id'];?>">
                                            <span class="btn-sm p-0 btn-success">
                                          <i class="bx bx-check"></i>
                                        </span></a>
                                            <?php
                                          } else {
                                            ?>
                                          <a href="../assets/pr-ab-edit.php?id=<?php print $row['id'];?>">
                                            <span class="btn-sm p-0 btn-warning">
                                          <i class="bx bx-x"></i>
                                        </span>
                                          </a>
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