<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "گزارش حضور غیاب";
  $category = "حضور غیاب";
?>
<?php include_once '../assets/head.php'; ?>


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
              <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                      <div class="card-body">
                        <h5 class="card-title text-primary">گزارش حضور و غیاب</h5>
                        <div class="row">
                          <table class="table" dir="rtl">
                            <thead>
                            <tr>
                              <td>ردیف</td>
                              <td>کد ملی</td>
                              <td>نام</td>
                              <td>نام خانوادگی</td>
                              <td>تاریخ</td>
                              <td>وضعیت</td>
                              <td>عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                              $qry = "SELECT studentlist.fname,studentlist.lname,studentlist.codemeli,atendence.codemeli,atendence.atendence,atendence.date,atendence.id FROM `studentlist` join `atendence` on atendence.codemeli=studentlist.codemeli ORDER BY date,lname";
                              $run = $pdo->prepare($qry);
                              $run->execute();
                              $row = $run->fetchAll();
                              $i = 1;
                              foreach ($row as $row) {
                                ?>
                                <tr style="font-weight: 700;color: black">
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $row['codemeli']; ?></td>
                                  <td><?php echo $row['fname']; ?></td>
                                  <td><?php echo $row['lname']; ?></td>
                                  <td dir="ltr"><?php
                                      $date = $row['date'];
                                      echo miladiToShamsi($date);
                                    ?></td>
                                  <td>
                                    <?php
                                      $ststus = $row['atendence'];
                                      if ($ststus == "ok") {
                                        ?>
                                        <span class="btn btn-sm btn-info bx-tada-hover">حاضر</span>
                                        <?php
                                      } else {
                                        ?>
                                        <span class="btn btn-sm btn-secondary bx-tada-hover">غایب</span>
                                        <?php
                                      }
                                    ?></td>
                                  <td>

                                    <a href="../assets/edit-atendence.php?editid=<?php echo $row['id']; ?>"
                                       class="btn btn-sm btn-warning">
                                      <i class="bx bx-edit-alt"></i>
                                    </a>
                                    <a class="text-white btn btn-sm btn-danger">
                                      <i class="bx bx-trash"></i>
                                    </a>

                                  </td>
                                </tr>
                                <?php $i++;
                              } ?>
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
  </div>
  <!-- / Layout wrapper -->


<?php include_once '../assets/footer.php'; ?>