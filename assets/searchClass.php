<?php
  include_once "connect.php";
  include_once './files/jdf.php';

  if (isset($_GET['school'])) {
    $school = $_GET['school'];
    $sql = "SELECT * FROM `classes` WHERE school=?";
    $resualt = $pdo->prepare($sql);
    $resualt->bindValue(1, $school);
    $resualt->execute();
    $row = $resualt->fetchAll();
    echo '<option dir="rtl" value="" selected disabled>کلاس را انتخاب کنید</option>';
    foreach ($row as $row) {
      ?>
      <option dir="rtl" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
      <?php
    }
  }

  if (isset($_GET['grade'])) {
    $grade = $_GET['grade'];
    $sql = "SELECT * FROM `classes` WHERE name=?";
    $resualt = $pdo->prepare($sql);
    $resualt->bindValue(1, $grade);
    $resualt->execute();
    $row = $resualt->fetchAll();
    echo json_encode($row);
  }


  if (isset($_GET['tbody'])) {
    $school = $_GET['tbody'];
    $sql = "SELECT * FROM `studentlist` WHERE school='$school' order by lname";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $row = $resualt->fetchAll();
    $i = 1;
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="center pe-0"><?php echo $i; ?></td>
        <td class="center pe-0"><?php echo $row['codemeli']; ?></td>
        <td class="center pe-0"><?php echo $row['fname']; ?></td>
        <td class="center pe-0"><?php echo $row['lname']; ?></td>
        <td class="center pe-0"><?php echo $row['fathername']; ?></td>
        <td class="center pe-0"><?php echo $row['school']; ?></td>
        <td class="center pe-0"><?php echo $row['class']; ?></td>
        <td class="center pe-0"><?php echo $row['major']; ?></td>
        <td class="center pe-0"><?php echo $row['grade']; ?></td>
        <td class="center pe-0">
          <a href="../assets/opration.php?editid=<?php echo $row['codemeli']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a href="../assets/opration.php?deleteid=<?php echo $row['codemeli']; ?>" class="btn btn-sm btn-danger">
            <i class="bx bx-trash me-1"></i>
          </a>
        </td>
      </tr>
      <?php
      $i++;
    }
  }


  if (isset($_GET['tbodyClass'])) {
    $class = $_GET['tbodyClass'];
    $sql = "SELECT * FROM `studentlist` WHERE class='$class' order by lname";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $row = $resualt->fetchAll();
    $i = 1;
    foreach ($row as $row) {
      ?>
      <tr>
        <td class="center pe-0" ><?php echo $i; ?></td>
        <td class="center pe-0"><?php echo $row['codemeli']; ?></td>
        <td class="center pe-0"><?php echo $row['fname']; ?></td>
        <td class="center pe-0"><?php echo $row['lname']; ?></td>
        <td class="center pe-0"><?php echo $row['fathername']; ?></td>
        <td class="center pe-0"><?php echo $row['school']; ?></td>
        <td class="center pe-0"><?php echo $row['class']; ?></td>
        <td class="center pe-0"><?php echo $row['major']; ?></td>
        <td class="center pe-0"><?php echo $row['grade']; ?></td>
        <td class="center pe-0">
          <a href="../assets/opration.php?editid=<?php echo $row['codemeli']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a href="../assets/opration.php?deleteid=<?php echo $row['codemeli']; ?>" class="btn btn-sm btn-danger">
            <i class="bx bx-trash me-1"></i>
          </a>
        </td>
      </tr>
      <?php
      $i++;
    }
  }
  if (isset($_GET['MarkSchool'])) {
    $school = $_GET['MarkSchool'];
    $sql = "SELECT * FROM `month_mark` WHERE school='$school' order by lname";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $row = $resualt->fetchAll();
    foreach ($row as $row) {
      ?>
      <tr>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['codemeli']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['fname']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['lname']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['class']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['school']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['class']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['mehr']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['aban']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['azar']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['dey']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['bahman']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['esfand']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['farvardin']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['ordibehesht']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['khordad']; ?></td>
      </tr>
      <?php
    }
  }

  if (isset($_GET['MarkClass'])) {
    $class = $_GET['MarkClass'];
    $sql = "SELECT * FROM `month_mark` WHERE class='$class' order by lname";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $row = $resualt->fetchAll();
    foreach ($row as $row) {
      ?>
      <tr>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['codemeli']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['fname']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['lname']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['class']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['school']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['class']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['mehr']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['aban']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['azar']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['dey']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['bahman']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['esfand']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['farvardin']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['ordibehesht']; ?></td>
        <td style="text-align: right;padding: 0.5rem 1.1rem"><?php echo $row['khordad']; ?></td>
      </tr>
      <?php
    }
  }

  if (isset($_GET['className'])) {
    $class = $_GET['className'];
    $sql = "SELECT * FROM `studentlist` WHERE class=? order by lname";
    $resualt = $pdo->prepare($sql);
    $resualt->bindValue(1, $class);
    $resualt->execute();
    $row = $resualt->fetchAll();
    echo '<option selected value="" disabled>دانش آموز را انتخاب کنید</option>';
    foreach ($row as $row) {
      ?>
      <option value="<?php echo $row['codemeli'] ?>"><?php echo $row['fname'] . " " . $row['lname'] ?></option>
      <?php
    }
  }

  if (isset($_GET['montCode']) && isset($_GET['codemeli'])) {
    $monthCode = $_GET['montCode'];
    $codemeli = $_GET['codemeli'];
    $sql = "SELECT * FROM `monmark` WHERE codemeli='$codemeli' AND monCode='$monthCode' order by tarikh";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $row = $resualt->fetchAll();
    foreach ($row as $row) {
      ?>
      <tr>
        <td style="text-align: right;padding: 0.5rem 1.1rem">
          <a href="../assets/mark-opration.php?editid=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">
            <i class="bx bx-edit-alt"></i>
          </a>
          <a href="check-marks.php?deleteid=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </a>
        </td>
        <td class="text-dark"
            style="text-align: right;padding: 0.5rem 1.1rem;font-weight: bold;font-size: 16px"><?php echo $row['mark']; ?></td>
        <td class="text-dark" style="text-align: right;padding: 0.5rem 1.1rem;font-weight: bold;font-size: 16px"><?php
            $date = $row['tarikh'];
            $arr_parts = explode('-', $date);
            $gYear = $arr_parts[0];
            $gMonth = $arr_parts[1];
            $gDay = $arr_parts[2];
            $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, ' / ');
            print $converted;
          ?></td>
        <td class="text-dark"
            style="text-align: right;padding: 0.5rem 1.1rem;font-weight: bold;font-size: 16px"><?php echo $row['lname']; ?></td>
        <td class="text-dark"
            style="text-align: right;padding: 0.5rem 1.1rem;font-weight: bold;font-size: 16px"><?php echo $row['fname']; ?></td>
      </tr>
      <?php
    }
  }

?>

