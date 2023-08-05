<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ویرایش";
  $category = "ثبت نام";
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
      <div class="col-lg-10 m-auto mb-4 order-0">
       <div class="card">
        <div class="d-flex align-items-center row">
         <div class="col-sm-12 m-auto">
          <div class="card-body">
           <h5 class="card-title text-primary mt-4">ویرایش مشخصات دانش آموز</h5>
           <p class="mt-4">برای ثبت نام دانش آموز بر اساس مدرسه و کلاس انتخاب کنید</p>
           <div class="input-group">
            <form method="post" class="w-75 m-auto mt-2" style="direction: rtl">
             <div class="row">
              <div class="col-md-6">
               <label for="sel-school" class="pb-2">مدرسه</label>
               <select name="sel-school" onchange="changeSelectOption(this.value)"
                       class="form-select mb-4"
                       id="sel-school" tabindex="1" style="padding-right: 40px">
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
              <div class="col-md-6">
               <label for="sel-class" class="pb-2">کلاس</label>
               <select name="sel-class" class="form-select mb-4" onchange="cshowGrade(this.value)"
                       id="sel-class" tabindex="2" style="padding-right: 40px">
                <option selected class="pe-5" disabled> کلاس را انتخاب کنید</option>
               </select>
              </div>
             </div>
             <div class="row">
              <div class="col-md-6">
               <label for="grade" class="pb-2">پایه</label>
               <input name="grade" class="input mb-4" id="grade" tabindex="8">
              </div>
              <div class="col-md-6">
               <label for="grade" class="pb-2">رشته</label>
               <input name="major" class="input mb-4" id="major"
                      tabindex="4">
              </div>
             </div>
             <div class="row">
              <div class="col-md-6">
               <label for="codemeli" class="pb-2">کد ملی</label>
               <input type="text" class="mb-4 input" name="codemeli" tabindex="5">
              </div>
              <div class="col-md-6">
               <label for="fname" class="pb-2">نام</label>
               <input type="text" class="mb-4 input" name="fname" tabindex="6">
              </div>
             </div>
             <div class="row">
              <div class="col-md-6">
               <label for="lname" class="pb-2">نام خانوادگی</label>
               <input type="text" class="mb-4 input" name="lname" tabindex="7">
              </div>
              <div class="col-md-6">
               <label for="fathername" class="pb-2">نام پدر</label>
               <input type="text" class="mb-4 input" name="fathername" tabindex="8">
              </div>
             </div>
             <input type="submit" style="display: block; width: 100px;margin:auto;" name="reg-btn"
                    value="ثبت" class="btn btn-primary" tabindex="9">
            </form>
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

<script>

    function changeSelectOption(str) {

        if (str == "") {
            document.getElementById("sel-school").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sel-class").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "../assets/searchClass.php?school=" + str);
            xmlhttp.send();
        }
    }

    function cshowGrade(str) {
        if (str == "") {
            document.getElementById("grade").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var grade = data[0][2];
                    var major = data[0][3];
                    console.log(grade, major)
                    document.getElementById("grade").value = grade;
                    document.getElementById("major").value = major;
                }
            };
            xmlhttp.open("GET", "../assets/searchClass.php?grade=" + str);
            xmlhttp.send();
        }
    }
</script>

<?php include_once '../assets/footer.php'; ?>
