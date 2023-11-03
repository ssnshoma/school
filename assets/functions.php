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
 $classes = array();
 $sql = "SELECT * FROM `classes`";
 $resualt = $pdo->prepare($sql);
 $resualt->execute();
 $rows = $resualt->fetchAll(PDO::FETCH_ASSOC);
 foreach ($rows as $row) {
  $name = $row['name'];
  array_push($classes, $name);
 }
 return $classes;
}

function findDay($date)
{
 $today = date("Y-m-d");
 $nextday = date('Y-m-d', strtotime('+1 days'));
 $yesterday = date('Y-m-d', strtotime('-1 days'));
 $beforeyesterday = date('Y-m-d', strtotime('-2 days'));
 $nexttommorow = date('Y-m-d', strtotime('+2 days'));
 if ($date == $yesterday) {
  return "دیروز";
 } else if ($date == $nextday) {
  return "فردا";
 } else if ($date == $today) {
  return "امروز";
 } else if ($date == $beforeyesterday) {
  return "پریروز";
 } else if ($date == $nexttommorow) {
  return "پس فردا";
 } else {
  return miladiToShamsi($date);
 }
}

function markSubstr($mark)
{
 $markRounded = substr($mark, "0", "5");
 return $markRounded;
}

function convertPersianToEnglish($string)
{
 $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
 $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
 $output = str_replace($persian, $english, $string);
 return $output;
}

