<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "صفحه اصلی";
  $category = "داشبورد";


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
            <div class="col-md-5 order-2 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div id="startend" class="border-bottom text-primary">
                    <div>یادداشت ها</div>
                    <div>
                      <a href="../assets/task_note.php" class="btn btn-sm btn-primary">+</a>
                    </div>
                  </div>
                  <div id="avgmarkstable">
                    <table class="table" dir="rtl">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>یادداشت</th>
                        <th>عملیات</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>سلام و درود خدا بر تو</td>
                        <td>-+</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 mb-4">
              <div class="card">
                <div class="card-body">
                  <div id="startend" class="border-bottom text-primary">
                    <div>میانگین نمرات</div>
                  </div>
                  <div id="avgmarkstable">
                    <table class="table align-right" dir="rtl">
                      <thead>
                      <tr>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">مهر</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">آبان</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">آذر</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">دی</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">بهمن</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">اسفند</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">فروردین</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">اردیبهشت</th>
                        <th style="padding-left: 4px;padding-right: 4px;width: 90px;text-align: center">خرداد</th>
                      </tr>
                      </thead>
                      <tbody id="tbody">
                      <tr>
                        <?php
                          $monthes = array("mehr", "aban", "azar", "dey", "bahman", "esfand");
                          for ($i = 7; $i <= 12; $i++) {
                            $mon = $monthes[($i - 7)];
                            $sql = "SELECT AVG(mark) as $mon from `monmark` WHERE monCode=$i";
                            $run = $pdo->prepare($sql);
                            $run->execute();
                            $row = $run->fetchAll();
                            $mark = $row[0]["$mon"];
                            ?>
                            <td style="text-align: center;"> <?php print substr($mark, 0, 5); ?> </td>
                          <?php }
                        ?>
                        <?php
                          $monthes = array("farvardin", "ordibehesht", "khordad");
                          for ($i = 1; $i <= 3; $i++) {
                            $monn = $monthes[($i - 1)];
                            $sql = "SELECT AVG(mark) as $monn from `monmark` WHERE monCode=$i";
                            $run = $pdo->prepare($sql);
                            $run->execute();
                            $row = $run->fetchAll();
                            $mark = $row[0]["$monn"];
                            ?>
                            <td style="text-align: center;"> <?php print substr($mark, 0, 5); ?> </td>
                          <?php }
                        ?>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="tsakscontainer">
            <div class="col-lg-4 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div id="avgmarkstable">
                    <table class="table" dir="rtl">
                      <tbody>
                      <tr>
                        <td style="padding-right: 0">تعداد کل دانش آموزان</td>
                        <td class="center"><?php RowCount('studentlist', '1=1'); ?></td>
                      </tr>
                      <tr>
                        <td style="padding-right: 0">تعداد کل مدارس</td>
                        <td class="center"><?php RowCount('schools', '1=1'); ?></td>
                      </tr>
                      <tr>
                        <td style="padding-right: 0">تعداد کل کلاس ها</td>
                        <td class="center"><?php RowCount('classes', '1=1'); ?></td>
                      </tr>
                      <?php
                        $classes = getClassName();
                        $count = count($classes);
                        for ($i = 0; $i < $count; $i++) {
                          $class = $classes[$i];
                          ?>
                          <tr>
                            <td><i class="bx bx-left-arrow small"></i> کلاس <?php print $class; ?></td>
                            <td class="center">
                              <?php
                                RowCount('studentlist', "`class`='$class'");
                              ?>
                            </td>
                          </tr>

                          <?php
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div id="startend" class="border-bottom text-primary">
                    <div>لیست فعالیت ها</div>
                    <div>
                      <a href="../assets/task_add.php" class="btn btn-sm btn-primary">+</a>
                    </div>
                  </div>
                  <div class="todo-list" id="todolisttable">
                    <table class="table" dir="rtl">
                      <thead>
                      <tr>
                        <td style="padding-left: 0;padding-right: 0;width: 90px;text-align: center">تاریخ</td>
                        <td id="content" style="text-align: center">فعالیت</td>
                        <td style="padding-left: 0;padding-right: 0;width: 90px;text-align: center">اهمیت</td>
                        <td style="padding-left: 0;padding-right: 0;width: 90px;text-align: center">وضعیت</td>
                        <td style="padding-left: 0;padding-right: 0;width: 110px;text-align: center">عملیات</td>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        $beforeyesterday = date('Y-m-d', strtotime('-2 days'));
                        $taskQry = "SELECT * FROM task WHERE `date`>='$beforeyesterday' order by date";
                        $taskRun = $pdo->prepare($taskQry);
                        $taskRun->execute();
                        $row = $taskRun->fetchAll();
                        foreach ($row as $task) {
                          ?>
                          <tr>
                            <td
                              style="text-align: center;padding-left: 0;padding-right: 0;"><?php print findDay($task['date']); ?></td>
                            <td id="content" style="text-align: center;"><?php print $task['activity']; ?></td>
                            <td style="text-align: center;padding-left: 0;padding-right: 0;">
                              <?php
                                if ($task['level'] == "بسیار بالا") {
                                  echo '
              <span class="badge bg-success" style="font-size: 10px">بسیار بالا</span> 
                   ';
                                } elseif ($task['level'] == "بالا") {
                                  echo '
              <span class="badge bg-info">بالا</span> 
                   ';
                                } elseif ($task['level'] == "کم") {
                                  echo '
              <span class="badge bg-primary">کم</span> 
                   ';
                                } elseif ($task['level'] == "خیلی کم") {
                                  echo '
              <span class="badge bg-secondary">خیلی کم</span> 
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
                              <a href="../assets/task_add.php?editID=<?php print $task['id']; ?>"><i
                                  class="bx bx-edit text-dark"></i></a>
                              <a href="../assets/task_options.php?deleteID=<?php print $task['id']; ?>"><i
                                  class="bx bx-trash text-dark"></i></a>
                              <a href="../assets/task_options.php?doneID=<?php print $task['id']; ?>"><i
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
    </div>
    <!--/ Transactions -->
  </div>
</div>
<!-- / Content -->

<div class="content-backdrop fade"></div>


<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
<!-- / Layout wrapper -->


<?php include_once '../assets/footer.php'; ?>
