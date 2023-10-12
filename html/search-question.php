<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "لیست سوالات";
  $category = "آزمون";
?>


<?php include_once '../assets/head.php'; ?>

<?php

?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->

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
          <div class="row flex-row-reverse">
            <div class="mt-1">
              <div class="card">
                <div class="d-flex align-items-center row">
                  <div class="col-sm-12 m-auto">
                    <div class="card-body" style="height: 80vh">
                      <div class="row flex-row" style="direction: rtl;height: 100%;overflow-y: scroll">
                        <table class="table align-right" style="height: fit-content">
                          <thead>
                          <tr>
                            <th class="center" style="padding: 0.5rem 1.1rem">#</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">رشته</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">کتاب</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">فصل</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">درس</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">توضیحات</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">فایل</th>
                            <th class="center" style="padding: 0.5rem 1.1rem">عملیات</th>
                          </tr>
                          </thead>
                          <tbody id="tbody">

                          <?php
                            $sqll = "SELECT * FROM `questions` order by book,chapter,section";
                            $result3 = mysqli_query($conn, $sqll);
                            if ($result3) {
                              $i = 1;
                              while ($row1 = mysqli_fetch_assoc($result3)) {
                                $book = $row1['book'];
                                $chapter = $row1['chapter'];
                                $section = $row1['section'];
                                $grade = $row1['grade'];
                                $major = $row1['major'];
                                $details = $row1['details'];
                                $file = $row1['file'];
                                $id = $row1['id'];

                                ?>
                                <tr>
                                  <td class="center" style="padding: 0.5rem 1.1rem"><?php echo $i; ?></td>
                                  <td class="center" style="padding: 0.5rem 1.1rem"><?php echo $major; ?></td>
                                  <td class="center" style="padding: 0.5rem 1.1rem"><?php echo $book; ?></td>
                                  <td class="center" style="padding: 0.5rem 1.1rem"><?php echo $chapter; ?></td>
                                  <td class="center" style="padding: 0.5rem 1.1rem"><?php echo $section; ?></td>
                                  <td class="center" style="padding: 0.5rem 1.1rem"><?php echo $details; ?></td>
                                  <td class="center" style="padding: 0.5rem 1.1rem">
                                    <a href="../uploaded-files/questions/<?php echo $file; ?>" class="btn btn-sm btn-primary p-1">
                                      <i class="bx-download bx"></i>
                                    </a>
                                  </td>
                                  <td class="center">
                                    <a href="../assets/questions-editor.php?editid=<?php echo $id; ?>"
                                       class="btn btn-sm p-0">
                                      <i class="bx bx-edit-alt"></i>
                                    </a>
                                    <a href="../assets/questions-editor.php?deleteid=<?php echo $id; ?>"
                                       class="btn btn-sm p-0">
                                      <i class="bx bx-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <?php $i++;
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
        </div>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
  <?php include_once '../assets/footer.php'; ?>
