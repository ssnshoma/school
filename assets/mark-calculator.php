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
    <div class="content-wrapper" dir="rtl">
     <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
       <div class="col-md-6 order-2 mb-4">
        <div class="card h-100">
         <div class="card-body">
          <div class="card-title">مستمر</div>
          <div class="row">
           <div class="col-md-6">
            <style>
                input[disabled="true"] {
                    background: rgba(234, 234, 234, 0.3);
                }
                .t-right {
                    text-align: left;
                }
                .check-lock-div{
                    display: inline-block;
                    position: absolute;
                    right: 35px;
                    top: 98px;
                }
                .check-lock-div label{
                    font-size: 12px;
                }
            </style>
            <div>
             <label for="">نمره کل آزمون</label>
             <div class="check-lock-div">
              <input type="checkbox" id="check-lock" onclick="lockInput()">
              <label for="check-lock" id="lock-lable">باز</label>
             </div>
             <input type="text" id="max-mark" class="input t-right">
            </div>
            <div>
             <label for="">نمره کسب شده دانش آموز</label>
             <input type="text" id="std-mark" class="input" onkeyup="showMark(this.value)">
            </div>
           </div>
           <div class="col-md-6">
            <div>
             <label for="">نمره نهایی (پیشنهادی)</label>
             <input type="text" id="mark-out1" class="input" readonly disabled="true" tabindex="-1">
            </div>
            <div>
             <label for="">نمره نهایی(بالا)</label>
             <input type="text" id="mark-out" class="input" readonly disabled="true" tabindex="-1">
            </div>
            <div>
             <label for="">نمره رند نشده</label>
             <input type="text" id="mark-out2" class="input" readonly disabled="true" tabindex="-1">
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="col-md-6 order-2 mb-4">
        <div class="card h-100">
         <div class="card-body">
          <div class="row">
           <div class="card-title">نوبت اول</div>
           <div class="col-md-6">
            <div>
             <label for="">مستمر</label>
             <input type="text" id="mostamar1" onkeyup="nobatAval()" class="input">
            </div>
            <div>
             <label for="">نوبت اول</label>
             <input type="text" id="nobat1" class="input" onkeyup="nobatAval()">
            </div>
           </div>
           <div class="col-md-6">
            <div>
             <label for="">پایانی</label>
             <input type="text" id="payani1" class="input" readonly disabled="true" tabindex="-1">
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="row">
       <div class="col-md-6 order-2 mb-4">
        <div class="card h-100">
         <div class="card-body">
          <div class="card-title">نوبت دوم</div>
          <div class="row">
           <div class="col-md-6">
            <div>
             <label for="">مستمر دی</label>
             <input type="text" id="mostamarDey" onkeyup="nobatDovom()" class="input">
            </div>
            <div>
             <label for="">دی</label>
             <input type="text" id="dey" onkeyup="nobatDovom()" class="input">
            </div>
           </div>
           <div class="col-md-6">
            <div>
             <label for="">مستمر خرداد</label>
             <input type="text" id="mostamarKhordad" onkeyup="nobatDovom()" class="input">
            </div>
            <div>
             <label for="">خرداد</label>
             <input type="text" id="khordad" onkeyup="nobatDovom()" class="input">
            </div>
            <div>
             <label for="">سالانه</label>
             <input type="text" id="salane" class="input" readonly disabled="true" tabindex="-1">
            </div>
           </div>
          </div>
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

     function lockInput() {
         status = document.getElementById('check-lock').checked;
         if (status == "true") {
             document.getElementById('max-mark').setAttribute("readonly", "true");
             document.getElementById('max-mark').setAttribute("disabled", "true");
             document.getElementById('lock-lable').innerHTML="قفل"
         } else if (status == "false") {
             document.getElementById('max-mark').removeAttribute("readonly");
             document.getElementById('max-mark').removeAttribute("disabled");
             document.getElementById('lock-lable').innerHTML="باز"
         }
     }

     function nobatAval() {
         mostamar1 = document.getElementById('mostamar1').value;
         mostamar1 = Number(mostamar1);
         nobat1 = document.getElementById('nobat1').value;
         nobat1 = Number(nobat1);
         payani1 = document.getElementById('payani1');
         markNobat = nobat1 * 2;
         sunNobat = markNobat + mostamar1;
         payani1.value = sunNobat / 3;
     }

     function nobatDovom() {
         mostamarDey = document.getElementById('mostamarDey').value;
         mostamarDey = Number(mostamarDey);
         dey = document.getElementById('dey').value;
         dey = Number(dey);
         mostamarKhordad = document.getElementById('mostamarKhordad').value;
         mostamarKhordad = Number(mostamarKhordad);
         khordad = document.getElementById('khordad').value;
         khordad = Number(khordad);
         salane = document.getElementById('salane');
         sunNobat = ((mostamarKhordad + mostamarDey) + (dey * 2) + (khordad * 4)) / 8;
         finalMarkRoundNearest = (Math.round(sunNobat * 4) / 4).toFixed(2);
         salane.value = finalMarkRoundNearest;
     }

 </script>
<?php include_once '../assets/footer.php'; ?>