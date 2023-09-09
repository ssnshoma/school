<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "بررسی نمرات";
  $category = "نمره";
?>
<?php include_once '../assets/head.php'; ?>
<?php
  if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $deleteQry = "DELETE FROM `monmark` WHERE id=$deleteid";
    $RunDelete = $pdo->prepare($deleteQry);
    $RunDelete->execute();
    unset($_GET['deleteid']);
  }
?>

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

      <div class="row flex-row-reverse">
       <div>
        <div class="card">
         <div class="d-flex align-items-center row">
          <div class="col-sm-12 m-auto">
           <div class="card-body">
            <div class="row flex-row" style="direction: rtl">
             <div>
              <h4 class="card-title text-primary">دریافت نمرات ماهانه دانش آموز</h4>
             </div>
             <div class="col-md-3">
              <label for="sel-class" class="pb-1">ماه</label>
              <select name="sel-class" class="form-select mb-1" onchange="monthSelected(this.value)"
                      id="monthCode" tabindex="4" style="padding-right: 40px">
               <option selected class="pe-5" disabled> ماه را انتخاب کنید</option>
               <option class="pe-5" value="7">مهر</option>
               <option class="pe-5" value="8">آبان</option>
               <option class="pe-5" value="9">آذر</option>
               <option class="pe-5" value="10">دی</option>
               <option class="pe-5" value="11">بهمن</option>
               <option class="pe-5" value="12">اسفند</option>
               <option class="pe-5" value="1">فروردین</option>
               <option class="pe-5" value="2">اردیبهشت</option>
               <option class="pe-5" value="3">خرداد</option>
              </select>
             </div>
             <div class="col-md-3">
              <label for="selschool" class="pb-1">مدرسه</label>
              <select name="selschool" onchange="changeSelectOption(this.value)"
                      class="form-select mb-1"
                      id="selschool" tabindex="1" style="padding-right: 40px">
               <option selected disabled>مدرسه را انتخاب کنید</option>
                <?php
                  $sql = "SELECT * FROM schools";
                  $resualt = $pdo->prepare($sql);
                  $resualt->execute();
                  $roww = $resualt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($roww as $row) {
                    ?>
                   <option style="direction: rtl"
                           value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                  <?php } ?>

              </select>
             </div>
             <div class="col-md-3">
              <label for="sel-class" class="pb-1">کلاس</label>
              <select name="sel-class" class="form-select mb-1" onchange="cshowStudent(this.value)"
                      id="sel-class" tabindex="2" style="padding-right: 40px">
               <option selected class="pe-5" disabled> کلاس را انتخاب کنید</option>
              </select>
             </div>
             <div class="col-md-3">
              <label for="sel-class" class="pb-1">دانش آموز</label>
              <select name="sel-class" class="form-select mb-1" onchange="cshowGrade(this.value)"
                      id="students" tabindex="3" style="padding-right: 40px">
               <option selected class="pe-5" disabled> دانش آموز را انتخاب کنید</option>
              </select>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>

       <div class="mt-2">
        <div class="card">
         <div class="d-flex align-items-center row">
          <div class="col-sm-12 m-auto">
           <div class="card-body">

            <div class="row">
             <div class="col-lg-6 m-auto">
              <table class="table">
               <thead>
               <tr>
                <td>عملیات</td>
                <td>نمره</td>
                <td>تاریخ</td>
                <td>نام خانوادگی</td>
                <td>نام</td>
               </tr>
               </thead>
               <tbody id="markslist">
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


  <script>

      function monthSelected(str) {

          if (str == "") {
          } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("markslist").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET", "../assets/mark-search.php?monthcode=" + str);
              xmlhttp.send();
          }
      }

      function changeSelectOption(str) {
          if (str == "") {
              document.getElementById("sel-class").innerHTML = "";

          } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("sel-class").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET", "../assets/mark-search.php?selectedschool=" + str);
              xmlhttp.send();
          }
      }

      function cshowStudent(str) {
          if (str == "") {
              document.getElementById("students").innerHTML = "";

          } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("students").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET", "../assets/mark-search.php?className=" + str);
              xmlhttp.send();
          }
      }

      function showmarks(str) {
          var codemeli = document.getElementById('students').value;
          if (str == "") {
              document.getElementById("markslist").innerHTML = "";
              return;
          } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("markslist").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET", "../assets/mark-search.php?montCode=" + str + "&codemeli=" + codemeli);
              xmlhttp.send();
          }
      }

      function deleteRecord(str) {
          if (str == "") {
              return;
          } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange=function (){
                  if (this.readyState==4 && this.status==200){
                      console.log("deleted");
                  }
              };
              xmlhttp.open("GET","../assets/mark-search.php?deleteId=" + str);
              xmlhttp.send();
          }

      }

  </script>


  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
 </div>
 <!-- / Layout wrapper -->

<?php include_once '../assets/footer.php'; ?>