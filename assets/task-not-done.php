<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "انجام نشده";
  $category = "فعالیت";
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
            <div class="col-lg-12 m-auto mb-4 order-0">
              <div class="card">
                <div class="d-flex align-items-center row">
                  <div class="col-sm-12 m-auto">
                    <div class="card-body" dir="rtl" id="avgmarkstable">
                      <div class="card-header p-0" id="taskcontainer">
                        <h5 id="addtasktitle" class="card-title text-primary mt-4">لیست فعالیت های انجام نشده</h5>
                        <a href="task_add.php" id="addtaskbtn" class="btn btn-primary btn-sm"></a>
                      </div>
                      <table class="table mt-2" dir="rtl">
                        <thead>
                        <tr class="border-bottom">
                          <td class="border-bottom-0">تاریخ</td>
                          <td style="width: 140px;display: inline-block" class="border-bottom-0">فعالیت</td>
                          <td class="border-bottom-0">اهمیت</td>
                          <td class="border-bottom-0">وضعیت</td>
                          <td class="border-bottom-0">عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                          $taskQry = "SELECT * FROM task WHERE `ststus`='not-done' order by date";
                          $taskRun = $pdo->prepare($taskQry);
                          $taskRun->execute();
                          $row = $taskRun->fetchAll();
                          foreach ($row as $task) {
                            $date=$task['date'];
                            ?>
                            <tr>
                              <td
                                style="text-align: center;padding-left: 0;padding-right: 0;"><?php print miladiToShamsi($date); ?></td>
                              <td style="text-align: center"><?php print $task['activity']; ?></td>
                              <td style="text-align: center;padding-left: 0;padding-right: 0;">
                                <?php
                                  if ($task['level'] == "بسیار بالا") {
                                    echo '
                                    <span class="badge bg-success">!!!!</span> 
                                         ';
                                  } elseif ($task['level'] == "بالا") {
                                    echo '
                                    <span class="badge bg-info">!!!</span> 
                                         ';
                                  } elseif ($task['level'] == "کم") {
                                    echo '
                                    <span class="badge bg-primary">!!</span> 
                                         ';
                                  } elseif ($task['level'] == "خیلی کم") {
                                    echo '
                                    <span class="badge bg-secondary">!</span> 
                                         ';
                                  }
                                ?>
                              </td>
                              <td style="text-align: center;padding-left: 0;padding-right: 0;">
                                <?php
                                  if ($task['ststus'] == "done") {
                                    echo '
                                    <i class="bx bx-check-double text-success" style="font-size: 25px"></i> 
                                         ';
                                  } else {
                                    echo '
                                    <i class="bx bx-check text-danger" style="font-size: 25px"></i>
                                         ';
                                  }
                                ?>
                              </td>
                              <td style="text-align: center">
                                <a href="../assets/task_add.php?editIDD=<?php print $task['id']; ?>"><i
                                    class="bx bx-edit text-dark"></i></a>
                                <a href="../assets/task_options.php?deleteIDD=<?php print $task['id']; ?>"><i
                                    class="bx bx-trash text-dark"></i></a>
                                <a href="../assets/task_options.php?doneIDD=<?php print $task['id']; ?>"><i
                                    class='bx bx-check-square text-dark'></i></a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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


<script>

</script>

<?php include_once '../assets/footer.php'; ?>
