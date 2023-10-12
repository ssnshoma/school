<?php
  include_once '../assets/connect.php';
  include_once '../assets/get-profile-pic.php';
  include '../assets/first-login.php';

  function FileDir($file)
  {
    $temppname = $file["name"];
    $temp = $file["tmp_name"];
    $tmpName = explode('.', $temppname);
    $ext = end($tmpName);
    $uploads_dir = "../uploaded-files/questions";
    $newname = "question_" . rand(100, 50000) . "_." . $ext;
    $path = $uploads_dir . '/' . $newname;
    move_uploaded_file($temp, $path);
    return $newname;
  }

  function insertFile($grade, $major, $book, $chapter, $section, $details, $name)
  {
    global $conn;
    $sql = "INSERT INTO `questions` (`book`, `chapter`, `section`, `grade`, `major`, `details`, `file`) VALUES ('$book','$chapter','$section','$grade','$major','$details','$name')";
    mysqli_query($conn, $sql);
  }

  if (isset($_POST['submit-btn-question'])) {
    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $section = $_POST['section'];
    $details = $_POST['details'];
    $grade = $_POST['grade'];
    $major = $_POST['major'];
    $file = $_FILES['file'];
    $name = FileDir($file);
    insertFile($grade, $major, $book, $chapter, $section, $details, $name);
    $_SESSION["inserted"]="ثبت شد";
    header('Location: ../html/add-question.php');
  }
