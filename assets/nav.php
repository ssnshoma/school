<nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar"
>
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)" tabindex="-1">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center" id="search">
      <div style="margin-left: 50px" class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input
          type="text"
          class="form-control border-0 shadow-none"
          placeholder="Search..."
          aria-label="Search..." tabindex="-1"
        />
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto" id="dateitems">
      <li id="clock">14:20:54</li>
      <li id="date1"></li>
      <li id="date2"></li>
      <li id="date3"></li>
      <li id="date4"></li>
    </ul>

    <ul class="navbar-nav flex-row align-items-center ms-auto">

      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
           tabindex="-1">
          <div class="avatar avatar-online">
            <img src=" <?php echo '../uploaded-files/' . $profileDetails['profilePicture'] ?> " alt
                 class="w-px-40 h-auto rounded-circle"/>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" style="text-align: right;">
          <li>
            <a class="dropdown-item" href="#" tabindex="-1">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online" style="margin-left: 71px; margin-bottom: 10px; ">
                    <img class="w-px-40 h-auto rounded-circle"
                         src="<?php echo '../uploaded-files/' . $profileDetails['profilePicture'] ?>"
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span
                    class="fw-semibold d-block"><?php echo $profileDetails['fname'] . ' ' . $profileDetails['lname'] ?></span>
                  <small class="text-muted"><?php echo $profileDetails['email'] ?></small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="pages-account-settings-account.php" tabindex="-1">
              <span class="align-middle">پروفایل من</span>
              <i class="bx bx-user me-2"></i>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="pages-account-settings-account.php" tabindex="-1">
              <span class="align-middle">تنظیمات حساب کاربری</span>
              <i class="bx bx-cog me-2"></i>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="../assets/exit.php" tabindex="-1">
              <span class="align-middle">خروج</span>
              <i class="bx bx-power-off me-2"></i>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
      <li class="nav-item lh-1 me-3" id="address" style="width: 200px;">
        <span class="text-muted fw-light"><?php echo $category; ?> / </span>
        <span style="color: black; font-weight: bold"><?php echo $title; ?></span>
      </li>
    </ul>
  </div>
</nav>