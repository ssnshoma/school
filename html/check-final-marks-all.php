<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include_once '../assets/first-login.php';
  
  $profileDetails = getProfilePicName();
  $title = "نمرات پایانی";
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
            <div class="row flex-row-reverse">
              <div class="mt-2">
                <div class="card">
                  <div class="d-flex align-items-center row">
                    <div class="col-sm-12 m-auto" style="height: 80vh;overflow-y: scroll">
                      <div class="card-body">
                        <div class="row">
                          <div class="m-auto text-nowrap" id="avgmarkstable" style="height: 73.4vh">
                            <table class="table text-nowrap" dir="rtl">
                              <thead>
                              <tr>
                                <td class="border-left center">کد ملی</td>
                                <td class="border-left center">نام</td>
                                <td class="border-left center">نام خانوادگی</td>
                                <td class="border-left center">کلاس</td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="border-left center">آغازین
                                </td>
                                <td class="border-left center">مستمر</td>
                                <td class="border-left center">دی</td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="border-left center">پایانی
                                </td>
                                <td class="border-left center">مستمر</td>
                                <td class="border-left center">خرداد</td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="border-left center">پایانی
                                </td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="border-left center">سالانه
                                </td>
                                <td class="center">شهریور</td>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                $sql = "SELECT DISTINCT codemeli,fname,lname,class FROM `monmark` ORDER BY school,class,lname";
                                $codeFind = $pdo->prepare($sql);
                                $codeFind->execute();
                                $codes = $codeFind->fetchAll();
                                foreach ($codes

                                as $row) {
                                $codemeli = $row['codemeli'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $class = $row['class'];
                                $aghazinSql = "SELECT AVG(mark) as aghazin FROM `monmark` WHERE monCode=20 AND codemeli=$codemeli";
                                $runaghazin = $pdo->prepare($aghazinSql);
                                $runaghazin->execute();
                                $aghazinMark = $runaghazin->fetchAll();
                                $aghazin = $aghazinMark[0]['aghazin'];
                                $deySql = "SELECT AVG(mark) as dey FROM `monmark` WHERE monCode=21 AND codemeli=$codemeli";
                                $rundey = $pdo->prepare($deySql);
                                $rundey->execute();
                                $deyMark = $rundey->fetchAll();
                                $dey = $deyMark[0]['dey'];
                                $khordadSql = "SELECT AVG(mark) as khordad FROM `monmark` WHERE monCode=22 AND codemeli=$codemeli";
                                $runkhordad = $pdo->prepare($khordadSql);
                                $runkhordad->execute();
                                $khordadMark = $runkhordad->fetchAll();
                                $khordad = $khordadMark[0]['khordad'];
                                $shahrivarSql = "SELECT AVG(mark) as shahrivar FROM `monmark` WHERE monCode=23 AND codemeli=$codemeli";
                                $runshahrivar = $pdo->prepare($shahrivarSql);
                                $runshahrivar->execute();
                                $shahrivarMark = $runshahrivar->fetchAll();
                                $shahrivar = $shahrivarMark[0]['shahrivar'];
                                $mostamaDeySql = "SELECT AVG(mark) as mostamaDey FROM `monmark` WHERE monCode<=10 AND monCode>=7 AND codemeli=$codemeli";
                                $runmostamaDey = $pdo->prepare($mostamaDeySql);
                                $runmostamaDey->execute();
                                $mostamaDeyMark = $runmostamaDey->fetchAll();
                                $mostamaDey = $mostamaDeyMark[0]['mostamaDey'];
                                $mostamarKhordadSql = "SELECT AVG(mark) as mostamarKhordad FROM `monmark` WHERE monCode>=10 AND monCode<=15 AND codemeli=$codemeli";
                                $runmostamarKhordad = $pdo->prepare($mostamarKhordadSql);
                                $runmostamarKhordad->execute();
                                $mostamarKhordadMark = $runmostamarKhordad->fetchAll();
                                $mostamarKhordad = $mostamarKhordadMark[0]['mostamarKhordad'];
                                $payaniNobat1 = ($mostamaDey + ($dey * 2)) / 3;
                                $payaniNobat2 = ($mostamarKhordad + ($khordad * 2)) / 3;
                                $payaniSal = ($mostamarKhordad + ($khordad * 4) + $mostamaDey + ($dey * 2)) / 8;
                              ?>
                              <tr>
                                <td class="center"><?php echo $codemeli; ?></td>
                                <td class="center"><?php echo $fname; ?></td>
                                <td class="center"><?php echo $lname; ?></td>
                                <td class="center"><?php echo $class; ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo $aghazin; ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo markSubstr($mostamaDey); ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo $dey; ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo markSubstr($payaniNobat1); ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo markSubstr($mostamarKhordad); ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo $khordad; ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo markSubstr($payaniNobat2); ?></td>
                                <td style="border-left: 1px solid rgba(0,0,0,0.22)"
                                    class="center"><?php echo markSubstr($payaniSal); ?></td>
                                <td class="center"><?php echo $shahrivar; ?></td>
                                <?php } ?>
                              </tr>
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
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
<?php include_once '../assets/footer.php'; ?>