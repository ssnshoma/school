<?php
  include_once 'connect.php';
  if (isset($_GET['school'])) {
    $school = $_GET['school'];
    $findClassQry = "SELECT * FROM `classes` WHERE `school`='$school'";
    $findClassRun = $pdo->prepare($findClassQry);
    $findClassRun->execute();
    $findClass = $findClassRun->fetchAll();
    ?>
    <option value="" disabled selected>کلاس را انتخاب کنید</option>
    <?php
    foreach ($findClass as $class) {
      ?>
      <option value="<?php echo $class['name'] ?>"><?php echo $class['name'] ?></option>
      <?php
    }
  }
  if (isset($_GET['class'])) {
    $class = $_GET['class'];
    $findClassQry = "SELECT * FROM `studentlist` WHERE class='$class' order by lname";
    $findClassRun = $pdo->prepare($findClassQry);
    $findClassRun->execute();
    $findClass = $findClassRun->fetchAll();
    echo $findClassQry
    ?>
    <option value="" disabled selected>دانش آموز را انتخاب کنید</option>
    <?php
    foreach ($findClass as $row) {
      ?>
      <option
        value="<?php echo $row['codemeli'] ?>"><?php echo $row['fname'] . " " . $row['lname'] . " (" . $row['fathername'] . ")" ?></option>
      <?php
    }
  }
