<?php
  include_once "connect.php";
  include_once './files/jdf.php';
  if (isset($_GET['monthcode'])) {
    $monthCode = $_GET['monthcode'];
    $sql = "SELECT * FROM `monmark` WHERE monCode='$monthCode' order by tarikh";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $row = $resualt->fetchAll();
    $i = 1;
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="text-dark center"><?php echo $i; ?></td>
        <td class="text-dark center"><?php echo $row['fname']; ?></td>
        <td class="text-dark center"><?php echo $row['lname']; ?></td>
        <td class="text-dark center"><?php echo $row['class']; ?></td>
        <td class="text-dark center"
            style="padding: 0.5rem 1.1rem;"><?php echo $row['mark']; ?></td>
        <td class="text-dark center"><?php
            $date = $row['tarikh'];
            $arr_parts = explode('-', $date);
            $gYear = $arr_parts[0];
            $gMonth = $arr_parts[1];
            $gDay = $arr_parts[2];
            $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, '-');
            print $converted;
          ?></td>
        <td style="padding: 0.5rem 1.1rem" class="center">
          <a href="../assets/mark-opration.php?editid=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a onclick="deleteRecord(<?php echo $row['id']; ?>)" class="text-white btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </a>
        </td>
      </tr>
      <?php
      $i++;
    }
  }
  if (isset($_GET['selectedschool']) and isset($_GET['schoolCode'])) {
    $selectedschool = $_GET['selectedschool'];
    $classQry = "SELECT * FROM `classes` WHERE school='$selectedschool'";
    $findClass = $pdo->prepare($classQry);
    $findClass->execute();
    $row = $findClass->fetchAll();
    ?>
    <option selected disabled>کلاس را انتخاب کنید</option>
    <?php
    foreach ($row as $row) {
      ?>
      <option dir="rtl" value="<?php print $row['name']; ?>"><?php print $row['name']; ?></option>
      <?php
    }
  }

  if (isset($_GET['selectedschool']) and isset($_GET['month']) and isset($_GET['code'])) {
    $selectedschool = $_GET['selectedschool'];
    $selectedmonth = $_GET['month'];
    $classQry = "SELECT * FROM `monmark` WHERE `school`='$selectedschool' and `monCode`='$selectedmonth'";
    $findClass = $pdo->prepare($classQry);
    $findClass->execute();
    $row = $findClass->fetchAll();
    $i = 1;
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="text-dark center"><?php echo $i; ?></td>
        <td class="text-dark center"><?php echo $row['fname']; ?></td>
        <td class="text-dark center"><?php echo $row['lname']; ?></td>
        <td class="text-dark center"><?php echo $row['class']; ?></td>
        <td class="text-dark center"
            style="padding: 0.5rem 1.1rem;"><?php echo $row['mark']; ?></td>
        <td class="text-dark center"><?php
            $date = $row['tarikh'];
            $arr_parts = explode('-', $date);
            $gYear = $arr_parts[0];
            $gMonth = $arr_parts[1];
            $gDay = $arr_parts[2];
            $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, '-');
            print $converted;
          ?></td>
        <td style="padding: 0.5rem 1.1rem" class="center">
          <a href="../assets/mark-opration.php?editid=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a onclick="deleteRecord(<?php echo $row['id']; ?>)" class="text-white btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </a>
        </td>
      </tr>
      <?php
      $i++;
    }
  }

  if (isset($_GET['selectedclass']) and isset($_GET['month'])) {
    $selectedschool = $_GET['selectedclass'];
    $selectedmonth = $_GET['month'];
    $classQry = "SELECT * FROM `monmark` WHERE `class`='$selectedschool' and `monCode`='$selectedmonth'";
    $findClass = $pdo->prepare($classQry);
    $findClass->execute();
    $row = $findClass->fetchAll();
    $i = 1;
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="text-dark center"><?php echo $i; ?></td>
        <td class="text-dark center"><?php echo $row['fname']; ?></td>
        <td class="text-dark center"><?php echo $row['lname']; ?></td>
        <td class="text-dark center"><?php echo $row['class']; ?></td>
        <td class="text-dark center"
            style="padding: 0.5rem 1.1rem;"><?php echo $row['mark']; ?></td>
        <td class="text-dark center"><?php
            $date = $row['tarikh'];
            $arr_parts = explode('-', $date);
            $gYear = $arr_parts[0];
            $gMonth = $arr_parts[1];
            $gDay = $arr_parts[2];
            $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, '-');
            print $converted;
          ?></td>
        <td style="padding: 0.5rem 1.1rem" class="center">
          <a href="../assets/mark-opration.php?editid=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a onclick="deleteRecord(<?php echo $row['id']; ?>)" class="text-white btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </a>
        </td>
      </tr>
      <?php
      $i++;
    }
  }
  if (isset($_GET['montCode']) and isset($_GET['codemeli'])) {
    $codemeli = $_GET['codemeli'];
    $selectedmonth = $_GET['montCode'];
    $classQry = "SELECT * FROM `monmark` WHERE `codemeli`='$codemeli' and `monCode`='$selectedmonth'";
    $findClass = $pdo->prepare($classQry);
    $findClass->execute();
    $row = $findClass->fetchAll();
    $i = 1;
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="text-dark center"><?php echo $i; ?></td>
        <td class="text-dark center"><?php echo $row['fname']; ?></td>
        <td class="text-dark center"><?php echo $row['lname']; ?></td>
        <td class="text-dark center"><?php echo $row['class']; ?></td>
        <td class="text-dark center"
            style="padding: 0.5rem 1.1rem;"><?php echo $row['mark']; ?></td>
        <td class="text-dark center"><?php
            $date = $row['tarikh'];
            $arr_parts = explode('-', $date);
            $gYear = $arr_parts[0];
            $gMonth = $arr_parts[1];
            $gDay = $arr_parts[2];
            $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, '-');
            print $converted;
          ?></td>
        <td style="padding: 0.5rem 1.1rem" class="center">
          <a href="../assets/mark-opration.php?editid=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a onclick="deleteRecord(<?php echo $row['id']; ?>)" class="text-white btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </a>
        </td>
      </tr>
      <?php
      $i++;
    }
  }


  if (isset($_GET['schoolq']) && isset($_GET['month'])) {
    $school = $_GET['schoolq'];
    $month = $_GET['month'];
    $schoolMonthQuery = "SELECT * FROM `monmark` WHERE `school`='$school' AND `monCode`='$month'";
    $schoolMonth = $pdo->prepare($schoolMonthQuery);
    $schoolMonth->execute();
    $row = $schoolMonth->fetchAll();
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="text-dark"
            style="text-align: right;"><?php echo $row['fname']; ?></td>
        <td class="text-dark"
            style="text-align: right;width: 100%;"><?php echo $row['lname']; ?></td>
        <td class="text-dark"
            style="text-align: right;"><?php echo $row['class']; ?></td>
        <td class="text-dark"
            style="text-align: right;"><?php echo $row['mark']; ?></td>
        <td class="text-dark" style="text-align: right;"><?php
            $date = $row['tarikh'];
            $arr_parts = explode('-', $date);
            $gYear = $arr_parts[0];
            $gMonth = $arr_parts[1];
            $gDay = $arr_parts[2];
            $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, '-');
            print $converted;
          ?></td>
        <td style="text-align: right;">
          <a href="../assets/mark-opration.php?editid=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a href="check-marks.php?deleteid=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </a>
        </td>
      </tr>
      <?php
    }
  }

  if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    $deleteQury = "DELETE FROM `monmark` WHERE id=$id";
    $deleteQuryRun = mysqli_query($conn, $deleteQury);

  }
  if (isset($_GET['className'])) {
    $className = $_GET['className'];
    $schoolMonthQuery = "SELECT * FROM `monmark` WHERE `class`='$className'";
    $schoolMonth = $pdo->prepare($schoolMonthQuery);
    $schoolMonth->execute();
    $row = $schoolMonth->fetchAll();
    foreach ($row as $row) {
      ?>
      <option
        value="<?php print $row['codemeli'] ?>"><?php print " " . $row['fname'] . " " . $row['lname']; ?></option>
      <?php
    }
  }
?>
