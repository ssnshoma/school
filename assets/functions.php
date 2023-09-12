<?php
  include_once 'files/jdf.php';
  include_once 'connect.php';

  function shamsiToMiladi($date)
  {
    $arr_parts = explode('/', $date);
    $jYear = $arr_parts[0];
    $jMonth = $arr_parts[1];
    $jDay = $arr_parts[2];
    $converted = jalali_to_gregorian($jYear, $jMonth, $jDay, '-');
    return $converted;
  }

  function miladiToShamsi($date)
  {
    $gdate = explode('-', $date);
    $gYear = $gdate[0];
    $gMonth = $gdate[1];
    $gDay = $gdate[2];
    $converted = gregorian_to_jalali($gYear, $gMonth, $gDay, '-');
    return $converted;
  }

  function RowCount($tablename, $condition)
  {
    global $pdo;
    $sql = "SELECT * FROM `$tablename` WHERE $condition";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $count = $resualt->rowCount();
    print $count;
  }

  function RowCountd($tablename, $condition)
  {
    global $pdo;
    $sql = "SELECT * FROM `$tablename` WHERE $condition";
    print $sql;
  }

  function getClassName()
  {
    global $pdo;
    $classes=array();
    $sql = "SELECT * FROM `classes`";
    $resualt = $pdo->prepare($sql);
    $resualt->execute();
    $rows = $resualt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
      $name=$row['name'];
      array_push($classes,$name);
    }
    return $classes;
  }