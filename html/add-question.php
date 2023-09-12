<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت سوال";
  $category = "آزمون ها"
?>

<?php include_once '../assets/head.php'; ?>
 <div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
   <!-- / Menu -->

    <?php include_once '../assets/aside.php'; ?>
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
       <div class="col-lg-8 mb-4 order-0">
       </div>
       <div class="col-lg-4 col-md-4 order-1">
       </div>
      </div>
      <div class="row">
       <!-- Order Statistics -->
       <div class="col-md-10 col-lg-10 col-xl-10 order-0 mb-4 m-auto">
        <div class="card h-100" style="direction: rtl;">
         <div class="card-header d-flex align-items-center justify-content-between pb-0">
          <div class="card-title mb-0">
           <h3 style="direction: rtl" class="m-0 me-2"> ثبت سوال </h3>
           <h6 class="my-4">لطفا برای ثبت سوال اطلاعات لازم را تکمیل کرده و سپس فایل Word
            یا PDF و یا Jpg را وارد کنید.</h6>
          </div>
         </div>
         <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
           <div class="d-flex flex-column align-items-center w-75 m-auto my-3">
            <form action="" class="w-100">
             <div class="row flex-row">
              <div class="form-group col-md-6 mb-3 mt-2">
               <label for="grade">پایه (عدد)</label>
               <input type="text" name="grade" class="form-control" id="grade"
                      placeholder="پایه را وارد کنید">
              </div>
              <div class="form-group col-md-6 mb-3 mt-2">
               <label for="major">رشته</label>
               <input type="text" name="major" class="form-control" id="major"
                      placeholder="رشته را وارد کنید">
              </div>
             </div>
             <div class="row flex-row">
              <div class="form-group col-md-4 mb-3 mt-2">
               <label for="grade">نام کتاب</label>
               <input type="text" name="book" class="form-control" id="book"
                      placeholder="نام کتاب">
              </div>
              <div class="form-group col-md-4 mb-3 mt-2">
               <label for="fasl">فصل</label>
               <input type="text" name="fasl" class="form-control" id="fasl"
                      placeholder="نام فصل مربوطه را وارد کنید">
              </div>
              <div class="form-group col-md-4 mb-3 mt-2">
               <label for="dars">درس</label>
               <input type="text" name="dars" class="form-control" id="dars"
                      placeholder="نام درس را وارد کنید">
              </div>
             </div>
             <div class="row flex-row">
              <div class="form-group mb-3 col-md-7 mt-2">
               <label for="dars">توضیحات</label>
               <textarea name="tozihat" class="form-control" id="dars"
                         placeholder="توضیحات ...."></textarea>
              </div>
              <div class="form-group mb-3 col-md-5" style="margin-top: 30px;">
               <div class="input-group">
                <input type="file" class="form-control"
                       style="padding-top: 19px;height: 60px">
               </div>
              </div>
             </div>
             <div class="form-group w-25 m-auto mb-3 mt-5 ">
              <input type="submit" name="submit-btn"
                     class="form-control btn btn-primary">
             </div>
            </form>
           </div>
          </div>
         </div>
        </div>
       </div>
       <!--/ Order S tatistics -->
      </div>
     </div>
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