<?php
$error = $_SERVER['REDIRECT_STATUS'];
$error_title = " ";
$error_message = " ";
if ($error == 404) {
    $error_title = "صفحه مورد نظر یافت نشد";
    $error_message = "صفحه ای که دنبال آن هستید نیست";
    ?>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>هعی نتونستم پیدا کنم</title>

    <meta name="description" content="" />
</head>

<body>

    page not found

</body>

</html>
<?php
} ?>