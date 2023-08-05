<?php
  include_once 'connect.php';

  $sql = "SELECT lname,fname,codemeli,monCode, AVG(mark) as mark FROM `monmark` GROUP BY codemeli,monCode;";
  $resualt=$pdo->prepare($sql);
  $resualt->execute();
  $row=$resualt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($row as $value){
    $fname=$value['fname'];
    $lname=$value['lname'];
    $codemeli=$value['codemeli'];
    $mark=$value['mark'];

    echo "
    <span> $codemeli </span>
    <span> $fname </span>
    <span> $lname </span>
    <span> $mark </span>
    <br>
    
    ";

  }

?>