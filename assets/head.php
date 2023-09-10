<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="../assets/"
      data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
  <title> <?php print ($title); ?> </title>
  <meta name="description" content=""/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css"/>
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css"/>
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
  <link rel="stylesheet" href="../assets/css/demo.css"/>
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css"/>
  <link rel="stylesheet" href="../assets/calender/min.css">
  <script src="../assets/calender/js-persian-cal.min.js"></script>
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>

  <style>

    .dot {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 12px;
      height: 12px;
      background: white;
      border: 2px solid #1b1b1b;
      border-radius: 100px;
      margin: auto;
      z-index: 1;
    }

    .input {
      display: block;
      width: 100%;
      padding: 0.35rem 1rem 0.35rem 0.2rem;
      font-size: 0.9375rem;
      font-weight: 400;
      line-height: 1.53;
      color: #697a8d;
      border: 1px solid #d9dee3;
      border-radius: 0.375rem;
    }

    @media (max-width: 1199.98px) {
      body aside nav {
        background-color: chocolate;
      }
    }

    select {
      background: none;
    }

    #date2, #date3, #date4, #date1, #clock {
      padding-right: 10px;
    }

    @media (max-width: 700px) {
      #clock, #address, #date1, #search {
        display: none;
      }

      #mark-input {
        width: 100%;
      }

      #date2, #date3, #date4 {
        padding-right: 10px;
      }

      #pcal1 {
        background-color: crimson;
      }

      #edit-btn {
        width: 18px;
      }
    }

    @media (max-width: 500px) {
      #schooladdress {
        display: none;
      }

      #codemeli {
        display: none;
      }
    }

    @media (max-width: 560px) {
      #codemeli {
        display: none;
      }
    }

    @media (max-width: 600px) {
      #radif {
        display: none;
      }
    }

    @media (min-width: 700.1px) {
      #edit-btn {
        width: 25px !important;
      }

      #mark-input {
        width: 60%;
      }
    }

    @media (max-width: 540px) {
      .w-75{
        width: 100% !important;
      }
      #avgmarkstable, #todolisttable {
        width: 100%;
        overflow-x: scroll;
        direction: rtl;
      }
      #alerts{
        display: block;
        position: static !important;
      }
      #alertss{
        display: block;
        position: static !important;
        width: 100% !important;
      }
      #colse {
        display: none;
      }

      #content {
        width: 100%;
      }
      #avgmarkstable td {
        padding: 5px 6px;
      }

      #avgmarkstable tr {
        padding: 5px 6px;
      }

      #todolisttable td {
        padding: 5px 8px;
      }

      #todolisttable tr {
        padding: 5px 8px;
      }
    }

    #pcal1 {
      display: block;
      width: 100%;
      padding: 0.4375rem 0.875rem;
      font-size: 0.9375rem;
      font-weight: 400;
      line-height: 1.53;
      color: #697a8d;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #d9dee3;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 0.375rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    a.pcalBtn {
      position: relative;
      top: -33px;
    }

  </style>

</head>
<body>
