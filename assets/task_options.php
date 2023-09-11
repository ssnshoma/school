<?php
  include_once 'connect.php';
  if (isset($_GET['doneID'])) {
    $id = $_GET['doneID'];
    $updateQry = "UPDATE `task` SET `ststus`='done' WHERE id=$id";
    $run = $pdo->prepare($updateQry);
    $run->execute();
    header("Location: ../html/dashboard.php");
  }

  if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];
    $deleteQry = "DELETE FROM `task` WHERE id=$id";
    $runDel = $pdo->prepare($deleteQry);
    $runDel->execute();
    header("Location: ../html/dashboard.php");
  }

  if (isset($_GET['doneIDD'])) {
    $id = $_GET['doneIDD'];
    $updateQry = "UPDATE `task` SET `ststus`='done' WHERE id=$id";
    $run = $pdo->prepare($updateQry);
    $run->execute();
    header("Location: task_list.php");
  }

  if (isset($_GET['deleteIDD'])) {
    $id = $_GET['deleteIDD'];
    $deleteQry = "DELETE FROM `task` WHERE id=$id";
    $runDel = $pdo->prepare($deleteQry);
    $runDel->execute();
    header("Location: task_list.php");
  }


  if (isset($_GET['doneIDDD'])) {
    $id = $_GET['doneIDDD'];
    $updateQry = "UPDATE `task` SET `ststus`='done' WHERE id=$id";
    $run = $pdo->prepare($updateQry);
    $run->execute();
    header("Location: task_list.php");
  }

  if (isset($_GET['deleteIDDD'])) {
    $id = $_GET['deleteIDDD'];
    $deleteQry = "DELETE FROM `task` WHERE id=$id";
    $runDel = $pdo->prepare($deleteQry);
    $runDel->execute();
    header("Location: task_list.php");
  }
