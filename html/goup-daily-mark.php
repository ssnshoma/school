<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
include_once '../assets/files/jdf.php';
$profileDetails = getProfilePicName();
$title = "ثبت کلاسی";
$category = "نمره";
include_once '../assets/head.php';
?>
 <div class="layout-wrapper layout-content-navbar">
 <div class="layout-container">
  <?php include_once '../assets/aside.php'; ?>
  <div class="layout-page">
   <?php include_once '../assets/nav.php' ?>
   <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
     <div class="row">
      <div class="col-lg-12 mb-4 order-0 m-auto">
       <div class="card border-0">
        <div class="d-flex align-items-end row ">
         <div class="card-body p-5">
          <?php
          if (isset($_SESSION['pb-inserted-1']) and $_SESSION['pb-inserted-1'] != "") {
           echo '<script type="text/javascript">toastr.success("نمرات با موفقیت ثبت شد")</script>';
           unset($_SESSION['pb-inserted-1']);
          }
          if (isset($_SESSION['pb-not-inserted']) and $_SESSION['pb-not-inserted'] != "") {
           echo '<script type="text/javascript">toastr.success("متاسفانه نمرات ثبت نشدند")</script>';
           unset($_SESSION['pb-not-inserted']);
          }
          ?>
          <h3 class="card-title text-primary mb-4">ثبت کلاسی نمرات</h3>
          <h4 class="text-info mb-5"> برای ثبت نمرات لطفا موارد زیر را تکمیل کنید</h4>
          <form method="get" action="goup-daily-mark-1.php">
           <div class="m-auto" id="mark-input">
            <div class="col-md-12" style="padding-left: 0">
             <input type="text" name="data" placeholder="تاریخ" class="w-100 pdate form"
                    tabindex="3" id="pcal1" required>
            </div>
            <select name="school" id="school" style="text-align: right;"
                    class="form-control form-group mt-2"
                    onchange="changeSelectOption(this.value)" required>
             <option dir="rtl" selected disabled>مدرسه را انتخاب کنید</option>
             <?php
             $sqli = "SELECT * FROM schools";
             $resui = $pdo->prepare($sqli);
             $resui->execute();
             $rowi = $resui->fetchAll();
             foreach ($rowi as $row) {
              echo "ok";
              ?>
              <option dir="rtl" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
              <?php
             }
             ?>
            </select>
            <select name="class" style="text-align: right;" id="class" class="form-control form-group mt-4" required>
             <option dir="rtl">کلاس را انتخاب کنید</option>
            </select>
           </div>
           <input type="submit" name="send" value="ارسال"
                  class="mb-5 mt-4 btn btn-success m-auto d-block">
          </form>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- / Layout page -->
 </div>
 <script type="text/javascript">
     function changeSelectOption(str) {
         if (str == "") {
             document.getElementById("class").innerHTML = "";
             return;
         } else {
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function () {
                 if (this.readyState == 4 && this.status == 200) {
                     let datas = this.responseText;
                     console.log(datas);
                     document.getElementById("class").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET", "../assets/searchClass.php?school=" + str);
             xmlhttp.send();
         }
     }

     $('#input1').change(function () {
         var $this = $(this),
             value = $this.val();
     });
     $('#textbox1').change(function () {
         var $this = $(this),
             value = $this.val();
     });
 </script>
<?php include_once '../assets/footer.php'; ?>