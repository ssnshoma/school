<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  include_once '../assets/files/jdf.php';
  $profileDetails = getProfilePicName();
  $title = "محاسبه نمرات";
  $category = "نمرات";
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
              <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                  <div class="card-header">
                    محاسبه نمرات
                  </div>
                  <div class="d-flex align-items-end row w-75 m-auto mb-5">
                    <div class="row flex-row-reverse justify-content-between">
                      <div class=" col-md-6">
                        <label for="number">نمره آزمون</label>
                        <input type="number" id="exam-mark" class="form-control" min="0" max="20">
                      </div>
                      <div class="col-md-6">
                        <label for="number"> تعداد دانش آموزان را وارد کنید</label>
                        <input type="number" onchange="showRows(this.value)" id="std-count" class="form-control"
                               min="0">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mt-2 pt-3 pb-5">
                  <table class="table w-50 m-auto" dir="rtl">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>نمره اولیه</th>
                      <th>نمره از 20</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    <tr>
                      <td>2</td>
                      <td>2</td>
                      <td>2</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <script>
    function showRows(count) {
      document.getElementById('tbody').innerHTML = "";
      tbody = document.getElementById('tbody');
      tr = "<td>1</td><td>2</td><td>3</td>";
      for (i = 1; i <= count; i++) {
        row = tbody.insertRow();
        cell1 = row.insertCell(0);
        celInput1 = cell1.innerHTML = i;
        cell2 = row.insertCell(1);
        celInput2 = cell2.innerHTML = '<input type="text" onkeyup="calculateMark(this.value,this.id)" id=' + i + '>';
        cell3 = row.insertCell(2);
        celInput3 = cell3.innerHTML = '<input type="text" id=' + 'mark-' + i + '>';
      }
    }

    function calculateMark(val, id) {
      mid='mark-' + i;
      console.log(mid);
      final = document.getElementById(mid);
      console.log(final)
      // mark = document.getElementById('exam-mark').value;
      // marks = Number(mark);
      // finalMark = ((val / marks) * 20);
      // value = final.value;
      // value=finalMark;
    }

  </script>
<?php include_once '../assets/footer.php'; ?>