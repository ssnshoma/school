<?php
include_once '../assets/connect.php';
include_once '../assets/get-profile-pic.php';
include_once '../assets/first-login.php';
$logifo = $_SESSION['log-info'];
$profileDetails = getProfilePicName();
?>
<?php include_once '../assets/head.php'; ?>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                   xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <path
                    d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                    id="path-1"></path>
                  <path
                    d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                    id="path-3"></path>
                  <path
                    d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                    id="path-4"></path>
                  <path
                    d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                    id="path-5"></path>
                </defs>
                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                    <g id="Icon" transform="translate(27.000000, 15.000000)">
                      <g id="Mask" transform="translate(0.000000, 8.000000)">
                        <mask id="mask-2" fill="white">
                          <use xlink:href="#path-1"></use>
                        </mask>
                        <use fill="#696cff" xlink:href="#path-1"></use>
                        <g id="Path-3" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-3"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                        </g>
                        <g id="Path-4" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-4"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                        </g>
                      </g>
                      <g id="Triangle"
                         transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                        <use fill="#696cff" xlink:href="#path-5"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">مدرسه من</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->

          <li class="menu-item">
            <a href="dashboard.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">داشبورد</div>
            </a>
          </li>


          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">ثبت نام ها </span>
          </li>

          <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">ثبت نام دانش آموز</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="single-reg.php" class="menu-link">
                  <div data-i18n="Account">ثبت نام تکی</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="group-reg.php" class="menu-link">
                  <div data-i18n="Notifications">ثبت نام گروهی</div>
                </a>
              </li>
              <li class="menu-item active">
                <a href="import-from-excell.php" class="menu-link">
                  <div data-i18n="Connections">وارد کردن فایل اکسل</div>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">مدرسه</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add-class.php" class="menu-link">
                  <div data-i18n="Account">ثبت کلاس</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="add-school.php" class="menu-link">
                  <div data-i18n="Notifications">ثبت مدرسه</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              <div data-i18n="Authentications">هویت</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-login-basic.php" class="menu-link" target="_blank">
                  <div data-i18n="Basic">ورود</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-register-basic.php" class="menu-link" target="_blank">
                  <div data-i18n="Basic">ثبت نام</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-forgot-password-basic.php" class="menu-link" target="_blank">
                  <div data-i18n="Basic">فراموشی پسورد</div>
                </a>
              </li>
            </ul>
          </li>


          <!-- Components -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">ارزشیابی</span></li>
          <!-- Cards -->

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Misc">ثبت نمره</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="single-daily-mark.php" class="menu-link">
                  <div data-i18n="Error">نمرات روزانه تکی</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="goup-daily-mark.php" class="menu-link">
                  <div data-i18n="Under Maintenance">نمرات روزانه گروهی</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="single-monthly-mark.php" class="menu-link">
                  <div data-i18n="Under Maintenance">نمرات ماهانه تکی</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="group-monthly-mark.php" class="menu-link">
                  <div data-i18n="Under Maintenance">نمرات ماهانه گروهی</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="final-mark.php" class="menu-link">
                  <div data-i18n="Under Maintenance">نمرات پایانی</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Misc">حضور غیاب</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="class-present-absent.php" class="menu-link">
                  <div data-i18n="Error">ثبت کلاسی</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="school-present-absent.php" class="menu-link">
                  <div data-i18n="Under Maintenance">ثبت مدرسه ای</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- User interface -->
          <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="User interface">آزمون ها</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="add-question.php" class="menu-link">
                  <div data-i18n="Accordion">ثبت سوال</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="add-exam.php" class="menu-link">
                  <div data-i18n="Alerts">ثبت امتحان</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="search-question.php" class="menu-link">
                  <div data-i18n="Badges">جستجو سوالات</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="import-pdf.php" class="menu-link">
                  <div data-i18n="Buttons">PDF ثبت سوال با</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="import-pdf.php" class="menu-link">
                  <div data-i18n="Buttons">WORD ثبت سوال با</div>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </aside>
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
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Account Settings / </span> Connections
            </h4>

            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                  <li class="nav-item">
                    <a class="nav-link" href="pages-account-settings-account.php"
                    ><i class="bx bx-user me-1"></i> Account</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="group-reg.php"
                    ><i class="bx bx-bell me-1"></i> Notifications</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"
                    ><i class="bx bx-link-alt me-1"></i> Connections</a
                    >
                  </li>
                </ul>
                <div class="row">
                  <div class="col-md-6 col-12 mb-md-0 mb-4">
                    <div class="card">
                      <h5 class="card-header">Connected Accounts</h5>
                      <div class="card-body">
                        <p>Display content from your connected accounts on your site</p>
                        <!-- Connections -->
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/google.png" alt="google" class="me-3" height="30"/>
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                              <h6 class="mb-0">Google</h6>
                              <small class="text-muted">Calendar and contacts</small>
                            </div>
                            <div class="col-3 text-end">
                              <div class="form-check form-switch">
                                <input class="form-check-input float-end" type="checkbox" role="switch"/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/slack.png" alt="slack" class="me-3" height="30"/>
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                              <h6 class="mb-0">Slack</h6>
                              <small class="text-muted">Communication</small>
                            </div>
                            <div class="col-3 text-end">
                              <div class="form-check form-switch">
                                <input class="form-check-input float-end" type="checkbox" role="switch" checked/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/github.png" alt="github" class="me-3" height="30"/>
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                              <h6 class="mb-0">Github</h6>
                              <small class="text-muted">Manage your Git repositories</small>
                            </div>
                            <div class="col-3 text-end">
                              <div class="form-check form-switch">
                                <input class="form-check-input float-end" type="checkbox" role="switch"/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img
                              src="../assets/img/icons/brands/mailchimp.png"
                              alt="mailchimp"
                              class="me-3"
                              height="30"
                            />
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                              <h6 class="mb-0">Mailchimp</h6>
                              <small class="text-muted">Email marketing service</small>
                            </div>
                            <div class="col-3 text-end">
                              <div class="form-check form-switch">
                                <input class="form-check-input float-end" type="checkbox" role="switch" checked/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img src="../assets/img/icons/brands/asana.png" alt="asana" class="me-3" height="30"/>
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-9 mb-sm-0 mb-2">
                              <h6 class="mb-0">Asana</h6>
                              <small class="text-muted">Communication</small>
                            </div>
                            <div class="col-3 text-end">
                              <div class="form-check form-switch">
                                <input class="form-check-input float-end" type="checkbox" role="switch" checked/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /Connections -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="card">
                      <h5 class="card-header">Social Accounts</h5>
                      <div class="card-body">
                        <p>Display content from social accounts on your site</p>
                        <!-- Social Accounts -->
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img
                              src="../assets/img/icons/brands/facebook.png"
                              alt="facebook"
                              class="me-3"
                              height="30"
                            />
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                              <h6 class="mb-0">Facebook</h6>
                              <small class="text-muted">Not Connected</small>
                            </div>
                            <div class="col-4 col-sm-5 text-end">
                              <button type="button" class="btn btn-icon btn-outline-secondary">
                                <i class="bx bx-link-alt"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img
                              src="../assets/img/icons/brands/twitter.png"
                              alt="twitter"
                              class="me-3"
                              height="30"
                            />
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                              <h6 class="mb-0">Twitter</h6>
                              <a href="https://twitter.com/Theme_Selection" target="_blank">@ThemeSelection</a>
                            </div>
                            <div class="col-4 col-sm-5 text-end">
                              <button type="button" class="btn btn-icon btn-outline-danger">
                                <i class="bx bx-trash-alt"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img
                              src="../assets/img/icons/brands/instagram.png"
                              alt="instagram"
                              class="me-3"
                              height="30"
                            />
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                              <h6 class="mb-0">instagram</h6>
                              <a href="https://www.instagram.com/themeselection/" target="_blank">@ThemeSelection</a>
                            </div>
                            <div class="col-4 col-sm-5 text-end">
                              <button type="button" class="btn btn-icon btn-outline-danger">
                                <i class="bx bx-trash-alt"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <img
                              src="../assets/img/icons/brands/dribbble.png"
                              alt="dribbble"
                              class="me-3"
                              height="30"
                            />
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                              <h6 class="mb-0">Dribbble</h6>
                              <small class="text-muted">Not Connected</small>
                            </div>
                            <div class="col-4 col-sm-5 text-end">
                              <button type="button" class="btn btn-icon btn-outline-secondary">
                                <i class="bx bx-link-alt"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img
                              src="../assets/img/icons/brands/behance.png"
                              alt="behance"
                              class="me-3"
                              height="30"
                            />
                          </div>
                          <div class="flex-grow-1 row">
                            <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                              <h6 class="mb-0">Behance</h6>
                              <small class="text-muted">Not Connected</small>
                            </div>
                            <div class="col-4 col-sm-5 text-end">
                              <button type="button" class="btn btn-icon btn-outline-secondary">
                                <i class="bx bx-link-alt"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- /Social Accounts -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
              </div>
              <div>
                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                <a
                  href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                  target="_blank"
                  class="footer-link me-4"
                >Documentation</a
                >

                <a
                  href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                  target="_blank"
                  class="footer-link me-4"
                >Support</a
                >
              </div>
            </div>
          </footer>
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


<?php include_once '../assets/footer.php'; ?>