<?php
  $utf = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ERRMODE_WARNING
  );
  $pdo = new PDO('mysql:host=localhost;dbname=1402s1403', 'hossein', '1234', $utf);
  $conn = mysqli_connect("localhost", "hossein", "1234", "");
  mysqli_select_db($conn, '1402s1403');

  session_start();

  date_default_timezone_set("Asia/Tehran");
  $sqlii = "SELECT mehr, AVG(mehr) as mehr, AVG(aban) as aban, AVG(azar) as azar, AVG(dey) as dey, AVG(bahman) as bahman, AVG(esfand) as esfand, AVG(farvardin) as farvardin, AVG(ordibehesht) as ordibehesht, AVG(khordad) as khordad FROM `month_mark`";
  $resualtInsert = mysqli_query($conn, $sqlii);
  $resualt = mysqli_fetch_assoc($resualtInsert);
  $mehr = $resualt['mehr'];
  $aban = $resualt['aban'];
  $azar = $resualt['azar'];
  $dey = $resualt['dey'];
  $bahman = $resualt['bahman'];
  $esfand = $resualt['esfand'];
  $farvardin = $resualt['farvardin'];
  $ordibehesht = $resualt['ordibehesht'];
  $khordad = $resualt['khordad'];
  $updateSql = "UPDATE `mark_avg` SET mehr=? ,aban=?,azar=?,dey=?,bahman=?,esfand=?,farvardin=?,ordibehesht=?,khordad=? WHERE `id`=1";
  $updateSqlRun = $pdo->prepare($updateSql);
  $updateSqlRun->bindValue(1, $mehr);
  $updateSqlRun->bindValue(2, $aban);
  $updateSqlRun->bindValue(3, $azar);
  $updateSqlRun->bindValue(4, $dey);
  $updateSqlRun->bindValue(5, $bahman);
  $updateSqlRun->bindValue(6, $esfand);
  $updateSqlRun->bindValue(7, $farvardin);
  $updateSqlRun->bindValue(8, $ordibehesht);
  $updateSqlRun->bindValue(9, $khordad);
  $updateSqlRun->execute();



  $sql = "SELECT fname,lname,class,school,codemeli,monCode, AVG(mark) as mark FROM `monmark` GROUP BY codemeli,monCode;";
  $resualtInsert = mysqli_query($conn, $sql);
  while ($resualt = mysqli_fetch_assoc($resualtInsert)) {
    $codemeli = $resualt['codemeli'];
    $fname = $resualt['fname'];
    $lname = $resualt['lname'];
    $class = $resualt['class'];
    $school = $resualt['school'];
    $mark = $resualt['mark'];
    $monthcode = $resualt['monCode'];
    $qry = "SELECT * From `month_mark` WHERE codemeli=$codemeli";
    $query_run = mysqli_query($conn, $qry);
    $rowcount = mysqli_num_rows($query_run);
    if ($rowcount <= 0) {
      if ($monthcode == "7") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `mehr`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "8") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `aban`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "9") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `azar`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "10") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `dey`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "11") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `bahman`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "12") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `esfand`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "1") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `farvardin`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "2") {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `ordibehesht`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      } else {
        $sql1 = "INSERT INTO `month_mark` (`codemeli`, `fname`, `lname`, `class`, `school`, `khordad`) values ('$codemeli','$fname','$lname','$class','$school','$mark')";
        $result1 = mysqli_query($conn, $sql1);
      }
    } else {
      if ($monthcode == "7") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `mehr`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "8") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `aban`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "9") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `azar`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "10") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `dey`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "11") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `bahman`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "12") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `esfand`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "1") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `farvardin`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else if ($monthcode == "2") {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `ordibehesht`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      } else {
        $codemeli = $resualt['codemeli'];
        $sql1 = "UPDATE `month_mark` SET `khordad`='$mark' WHERE `codemeli`='$codemeli'";
        $result1 = mysqli_query($conn, $sql1);
      }
    }
  }


?>


