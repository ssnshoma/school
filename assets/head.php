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
 <script src="../assets/vendor/js/helpers.js"></script>
 <script src="../assets/js/config.js"></script>

 <style>
     .clock {
         border-radius: 100%;
         /*background: #efefef;*/
         background-image: url("../uploaded-files/best-photos-of-analog-clock-template-11549790411qdlzkcpjwm.png");
         background-size: 200px;
         background-position-y: -2.3px;
         font-family: "Montserrat";
         border: 5px solid #898989;
         /*box-shadow: inset 0px 0px 8px 0 rgba(0, 0, 0, 0.64);*/
     }

     .wrap {
         overflow: hidden;
         position: relative;
         width: 200px;
         height: 200px;
         border-radius: 100%;
     }

     .minute,
     .hour {
         position: absolute;
         height: 50px;
         width: 4px;
         margin: auto;
         top: -25%;
         left: 0;
         bottom: 0;
         right: 0;
         background: black;
         transform-origin: bottom center;
         transform: rotate(0deg);
         box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.4);
         z-index: 1;
     }

     .minute {
         position: absolute;
         height: 74.28px;
         width: 3px;
         top: -38%;
         left: 0;
         box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.4);
         transform: rotate(90deg);
     }

     .second {
         position: absolute;
         height: 80px;
         width: 2px;
         margin: auto;
         top: -40%;
         left: 0;
         bottom: 0;
         right: 0;
         border-radius: 4px;
         background: #FF4B3E;
         transform-origin: bottom center;
         transform: rotate(180deg);
         z-index: 1;
     }

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

 </style>

</head>
<body>
