<?php
  include_once "connect.php";
  if (isset($_GET['school'])) {
    $school = $_GET['school'];
    $sql = "SELECT * FROM `classes` WHERE school=?";
    $resualt = $pdo->prepare($sql);
    $resualt->bindValue(1, $school);
    $resualt->execute();
    $row = $resualt->fetchAll();
    echo '<option selected disabled>کلاس را انتخاب کنید</option>';
    foreach ($row as $row) {
      ?>
     <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
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
?>

