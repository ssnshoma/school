<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
$profileDetails = getProfilePicName();
$title = "محاسبه نمره";
$category = "نمره";
include_once '../assets/head.php'; ?>
 <div class="layout-wrapper layout-content-navbar">
 <div class="layout-container">
  <?php include_once '../assets/aside.php'; ?>
  <div class="layout-page">
   <?php include_once '../assets/nav.php' ?>
   <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
     <div class="row">
      <div class="col-md-12 mb-4 order-0 m-auto">
       <div class="card border-0">
        <div class="d-flex align-items-end row ">
         <div class="card-body p-5">
          <h3 class="card-title text-primary mb-4">ماشین حساب نمرات</h3>
          <form dir="rtl">
           <div class="row justify-content-around">
            <div class="col-md-5">
             <div class="row">
              <label for="">نمره کل آزمون</label>
              <input type="text" id="max-mark" class="input">
             </div>
             <div class="row">
              <label for="">نمره کسب شده دانش آموز</label>
              <input type="text" id="std-mark" class="input" onkeyup="showMark(this.value)">
             </div>

            </div>
            <div class="col-md-5">
             <div class="row">
              <label for="">نمره نهایی (پیشنهادی)</label>
              <input type="text" id="mark-out1" class="input" readonly disabled tabindex="-1">
             </div>
             <div class="row">
              <label for="">نمره نهایی (بالا)</label>
              <input type="text" id="mark-out" class="input" readonly disabled tabindex="-1">
             </div>
             <div class="row">
              <label for="">نمره رند نشده</label>
              <input type="text" id="mark-out2" class="input" readonly disabled tabindex="-1">
             </div>
            </div>
          </form>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <script>
     function showMark(mark) {
         maxMark = document.getElementById('max-mark').value;
         mark = Number(mark);
         finalMark = (mark / maxMark) * 20;
         finalMarkRoundNearest = (Math.round(finalMark * 4) / 4).toFixed(2);
         funalMarkStr = String(finalMark);
         document.getElementById('mark-out1').value = finalMarkRoundNearest;
         document.getElementById('mark-out2').value = funalMarkStr.substr(0, 5);
         finalMarkSplited = funalMarkStr.split('.');
         x = finalMarkSplited.length;
         decimal = finalMarkSplited[1];
         intger = finalMarkSplited[0];
         if (!decimal) {
             document.getElementById('mark-out').value = Number(intger);
         } else {
             decimal = finalMarkSplited[1];
             len = String(decimal).length;
             if (len == 1) {
                 newStr = String(decimal) + "0";
                 roundMark(intger, newStr);
             } else if (len > 1) {
                 y = String(decimal).substr(0, 2);
                 roundMark(intger, y);
             }
         }
     }
     function roundMark(integerr, decimmal) {
         intger = integerr;
         dec = Number(decimmal);
         console.log(dec);
         if (dec <= 25) {
             document.getElementById('mark-out').value = Number(intger + "." + "25");

         } else if (dec > 25 && dec <= 50) {
             document.getElementById('mark-out').value = Number(intger + "." + "5");

         } else if (dec > 50 && dec <= 75) {
             document.getElementById('mark-out').value = Number(intger + "." + "75");

         } else if (dec > 75 && dec <= 99) {
             document.getElementById('mark-out').value = Number(intger) + (1);
         }
     }
 </script>
<?php include_once '../assets/footer.php'; ?>