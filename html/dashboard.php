<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
$logifo = $_SESSION['log-info'];
$profileDetails = getProfilePicName();
$title="داشبورد";
$category="داشبورد";
?>

<?php include_once '../assets/head.php'; ?>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">


    <?php include_once '../assets/aside.php';?>
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
            <!-- Order Statistics -->

            <!-- Transactions -->
            <div class="col-md-3 col-lg-3 order-2 mb-4">
              <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                  <div class="clock">
                    <div class="wrap">
                      <span class="hour"></span>
                      <span class="minute"></span>
                      <span class="second"></span>
                      <span class="dot"></span>
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


      <!-- Footer -->
      <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
          <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="" target="_blank" class="footer-link fw-bolder">Hossein Mansoori</a>
          </div>
          <div>
            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
               target="_blank" class="footer-link me-4">Documentation</a>

            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
               class="footer-link me-4">Support</a>
          </div>
        </div>
      </footer>
      <!-- / Footer -->

      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
<!-- / Layout wrapper -->

<script>

    var inc = 1000;

    clock();

    function clock() {
        const date = new Date();

        const hours = ((date.getHours() + 11) % 12 + 1);
        const minutes = date.getMinutes();
        const seconds = date.getSeconds();

        const hour = hours * 30;
        const minute = minutes * 6;
        const second = seconds * 6;

        document.querySelector('.hour').style.transform = `rotate(${hour}deg)`
        document.querySelector('.minute').style.transform = `rotate(${minute}deg)`
        document.querySelector('.second').style.transform = `rotate(${second}deg)`
    }

    setInterval(clock, inc);

</script>

<?php include_once '../assets/footer.php'; ?>
