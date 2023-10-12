<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  $logifo = $_SESSION['log-info'];
  $profileDetails = getProfilePicName();
  $title = "ثبت امتحان";
  $category = "آزمون ها"
?>

<?php include_once '../assets/head.php'; ?>

  <script>
    var subjectObject = {
      "ادبیات": {
        "10": ["ریاضی و آمار 1"],
        "11": ["ریاضی و آمار 2"],
        "12": ["ریاضی و آمار 3"]
      },
      "تجربی": {
        "10": ["ریاضی 1"],
        "11": ["ریاضی 2"],
        "12": ["ریاضی 3"]
      },
      "ریاضی": {
        "10": ["ریاضی 1", "هندسه 1"],
        "11": ["حسابان 1", "هندسه 2", "آمار احتمال"],
        "12": ["حسابان 2", "هندسه 3", "گسسته"]
      }
    }
    window.onload = function () {
      var subjectSel = document.getElementById("subject");
      var topicSel = document.getElementById("topic");
      var chapterSel = document.getElementById("chapter");
      for (var x in subjectObject) {
        subjectSel.options[subjectSel.options.length] = new Option(x, x);
      }
      subjectSel.onchange = function () {
        chapterSel.length = 1;
        topicSel.length = 1;
        for (var y in subjectObject[this.value]) {
          topicSel.options[topicSel.options.length] = new Option(y, y);
        }
      }
      topicSel.onchange = function () {
        chapterSel.length = 1;
        var z = subjectObject[subjectSel.value][this.value];
        for (var i = 0; i < z.length; i++) {
          chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
        }
      }
    }
  </script>
  <div class="layout-wrapper layout-content-navbar" xmlns="">
    <div class="layout-container">
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
                      <h3 style="direction: rtl" class="m-0 me-2"> ثبت امتحان </h3>
                      <h6 class="my-4">لطفا برای ثبت سوال اطلاعات لازم را تکمیل کرده و سپس فایل Word
                        یا PDF و یا Jpg را وارد کنید.</h6>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="d-flex flex-column align-items-center w-75 m-auto">
                        <form class="w-100" method="post" enctype="multipart/form-data"
                              action="../assets/questions-oprator.php">
                          <div class="row flex-row">
                            <div class="form-group col-md-6 mb-2">
                              <label for="major">رشته</label>
                              <select name="major" class="form-control" id="subject">
                                <option value="" selected="selected" disabled>رشته را انتخاب کنید</option>
                              </select>
                            </div>
                            <div class="form-group col-md-6 mb-2">
                              <label for="grade">پایه</label>
                              <select name="grade" class="form-control" id="topic">
                                <option value="" selected="selected" disabled>پایه</option>
                              </select>
                            </div>
                          </div>
                          <div class="row flex-row">
                            <div class="form-group col-md-4 mb-2">
                              <label for="grade">نام کتاب</label>
                              <select name="book" class="form-control" id="chapter"
                                      onchange="SelectChapter(this.value)">
                                <option value="" selected="selected">کتاب را انتخاب کنید</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                              <label for="fasl">فصل</label>
                              <select type="text" name="chapter" class="form-control" id="fasl">
                                <option value="" selected="selected">فصل را انتخاب کنید</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                              <label for="dars">درس</label>
                              <select type="text" name="section" class="form-control" id="dars"
                                      placeholder="نام درس را وارد کنید">
                                <option selected disabled>درس را انتخاب کنید</option>
                                <option value="درس 1">درس 1</option>
                                <option value="درس 2">درس 2</option>
                                <option value="درس 3">درس 3</option>
                                <option value="درس 4">درس 4</option>
                                <option value="درس 5">درس 5</option>
                              </select>
                            </div>
                          </div>
                          <div>
                            <div class="form-group mb-2 col-md-12">
                              <label for="dars">توضیحات</label>
                              <textarea name="details" class="form-control" id="dars"
                                        placeholder="توضیحات ...."></textarea>
                            </div>
                            <div class="form-group mb-2 col-md-12">
                              <label for="file">فایل</label>
                              <input type="file" name="file" class="form-control">
                            </div>
                          </div>
                          <div class="form-group w-25 m-auto mb-2 mt-4">
                            <input type="submit" name="submit-btn-question"
                                   class="form-control btn btn-primary" value="ثبت">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
    function SelectChapter(str) {
      if (str == "ریاضی و آمار 1") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>';
      } else if (str == "ریاضی و آمار 2") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>';
      } else if (str == "ریاضی و آمار 3") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>';
      } else if (str == "ریاضی 1") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>' +
          '<option value="فصل 5">' +
          'فصل 5' +
          '</option>' +
          '<option value="فصل 6">' +
          'فصل 6' +
          '</option>' +
          '<option value="فصل 7">' +
          'فصل 7' +
          '</option>';
      } else if (str == "ریاضی 2") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>' +
          '<option value="فصل 5">' +
          'فصل 5' +
          '</option>' +
          '<option value="فصل 6">' +
          'فصل 6' +
          '</option>' +
          '<option value="فصل 7">' +
          'فصل 7' +
          '</option>';
      } else if (str == "ریاضی 3") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>' +
          '<option value="فصل 5">' +
          'فصل 5' +
          '</option>' +
          '<option value="فصل 6">' +
          'فصل 6' +
          '</option>' +
          '<option value="فصل 7">' +
          'فصل 7' +
          '</option>';
      } else if (str == "هندسه 1") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>';
      } else if (str == "آمار احتمال") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>';
      } else if (str == "هندسه 2") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>';
      } else if (str == "حسابان 1") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>' +
          '<option value="فصل 5">' +
          'فصل 5' +
          '</option>';
      } else if (str == "حسابان 2") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>' +
          '<option value="فصل 5">' +
          'فصل 5' +
          '</option>';
      } else if (str == "گسسته") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>';
      } else if (str == "هندسه 3") {
        document.getElementById('fasl').innerHTML = '' +
          '<option value="فصل 1">' +
          'فصل 1' +
          '</option>' +
          '<option value="فصل 2">' +
          'فصل 2' +
          '</option>' +
          '<option value="فصل 3">' +
          'فصل 3' +
          '</option>' +
          '<option value="فصل 4">' +
          'فصل 4' +
          '</option>';
      }
    }
  </script>
<?php include_once '../assets/footer.php'; ?>