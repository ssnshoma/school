<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت امتحان";
  $category = "آزمون ها"
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
              <!-- Order Sta tistics -->
              <div class="col-md-10 col-lg-10 col-xl-10 order-0 mb-4 m-auto">
                <div class="card h-100" style="direction: rtl;">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h3 style="direction: rtl" class="m-0 me-2"> ثبت امتحان </h3>
                      <h6 class="my-4">لطفا برای ثبت امتحان اطلاعات لازم را تکمیل کرده و سپس فایل  PDF را وارد
                        کنید.</h6>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="d-flex flex-column align-items-center w-75 m-auto">
                        <form class="w-100">
                          <div class="row flex-row">
                            <div class="form-group col-md-6 mb-2">
                              <label for="grade">پایه (عدد)</label>
                              <input type="text" name="grade" class="form-control" id="grade"
                                     placeholder="پایه را وارد کنید">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                              <label for="major">رشته</label>
                              <input type="text" name="major" class="form-control" id="major"
                                     placeholder="رشته را وارد کنید">
                            </div>
                          </div>
                          <div class="row flex-row">
                            <div class="form-group col-md-4 mb-2">
                              <label for="grade">نام کتاب</label>
                              <input type="text" name="book" class="form-control" id="book"
                                     placeholder="نام کتاب">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                              <label for="fasl">فصل</label>
                              <input type="text" name="fasl" class="form-control" id="fasl"
                                     placeholder="نام فصل مربوطه را وارد کنید">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                              <label for="dars">درس</label>
                              <input type="text" name="dars" class="form-control" id="dars"
                                     placeholder="نام درس را وارد کنید">
                            </div>
                          </div>
                          <div>
                            <div class="form-group mb-2 col-md-12">
                              <label for="dars">توضیحات</label>
                              <textarea name="tozihat" class="form-control" id="dars"
                                        placeholder="توضیحات ...."></textarea>
                            </div>
                            <div class="form-group mb-2 col-md-12">
                              <label for="file">فایل</label>
                              <input type="file" class="form-control">
                            </div>
                          </div>
                          <div class="form-group w-25 m-auto mb-2 mt-4">
                            <input type="submit" name="submit-btn"
                                   class="form-control btn btn-primary" value="ثبت">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Order Statistics -->

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