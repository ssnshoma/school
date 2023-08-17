<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "داشبورد";
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
      <div class="col-md-9 col-lg-9 order-2 mb-4">
       <div class="card h-100">
        <div class="card-body d-flex">
         <div class="graph w-100">
          <table class="table align-right w-100" dir="rtl" style="height: fit-content">
           <thead>
           <tr>
            <th style="text-align: right;padding: 0.5rem 1.1rem">مهر</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">آبان</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">آذر</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">دی</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">بهمن</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">اسفند</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">فروردین</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">اردیبهشت</th>
            <th style="text-align: right;padding: 0.5rem 1.1rem">خرداد</th>
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
                <td> <?php echo $mark ?> </td>
               <?php }
             ?>
             <?php
               $monthes = array("farvardin", "ordibehesht", "khordad");
               for ($i = 1; $i <= 3; $i++) {
                 $monn = $monthes[($i-1)];
                 $sql = "SELECT AVG(mark) as $monn from `monmark` WHERE monCode=$i";
                 $run = $pdo->prepare($sql);
                 $run->execute();
                 $row = $run->fetchAll();
                 $mark = $row[0]["$monn"];
                 ?>
                <td> <?php echo $mark ?> </td>
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
    </div>
   </div>
  </div>
  <!--/ Transactions -->
 </div>
</div>
<!-- / Content -->


<!-- Footer -->
<?php include_once '../assets/page-footer.php'; ?>
<!-- / Footer -->

<div class="content-backdrop fade"></div>


<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
<!-- / Layout wrapper -->

<script>

    var inc = 1000;

    clock();

    function clock() {
        const date = new Date();
        // console.log(date);
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
