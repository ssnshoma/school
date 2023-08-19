<?php
  include_once 'files/jdf.php';

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