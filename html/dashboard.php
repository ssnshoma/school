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
          <?php
            $conn = mysqli_connect("localhost", "root", "", "");
            mysqli_select_db($conn, '1402s1403');
            $sql = "SELECT mehr, AVG(mehr) as mehr, AVG(aban) as aban, AVG(azar) as azar, AVG(dey) as dey, AVG(bahman) as bahman, AVG(esfand) as esfand, AVG(farvardin) as farvardin, AVG(ordibehesht) as ordibehesht, AVG(khordad) as khordad FROM `month_mark`";
            $resualtInsert = mysqli_query($conn, $sql);
            $resualt = mysqli_fetch_assoc($resualtInsert);
            $mehr = $resualt['mehr'];
            $aban = $resualt['aban'];
            $azar = $resualt['azar'];
            $dey = $resualt['dey'];
            $bahman = $resualt['bahman'];
            $esfand = $resualt['esfand'];
            $farvardin = $resualt['farvardin'];
            $ordibehesht = $resualt['ordibehesht'];
            $khordad = $resualt['khordad'];
            $updateSql = "UPDATE `mark_avg` SET `mehr`='$mehr',`aban`='$aban',`azar`='$azar',`dey`='$dey',`bahman`='$bahman',`esfand`='$esfand',`farvardin`='$farvardin',`ordibehesht`='$ordibehesht',`khordad`='$khordad' WHERE `id`=1";
            $uptResualt = $pdo->prepare($updateSql);
            $uptResualt->execute();
          ?>
         <div class="graph w-100">

          <table class="table align-right w-100" style="height: fit-content">
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
            <td style="padding: 0.5rem 1.1rem"><?php echo $mehr; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $aban; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $azar; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $dey; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $bahman; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $esfand; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $farvardin; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $ordibehesht; ?></td>
            <td style="padding: 0.5rem 1.1rem"><?php echo $khordad; ?></td>
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
