<!DOCTYPE html>
<html
 lang="en"
 class="light-style customizer-hide"
 dir="rtl"
 data-theme="theme-default"
 data-assets-path="../assets/"
 data-template="vertical-menu-template-free"
>
<head>
 <meta charset="utf-8"/>
 <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
 />
 <title> ورود </title>
 <meta name="description" content=""/>
 <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico"/>
 <link rel="preconnect" href="https://fonts.googleapis.com"/>
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
 <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
 />
 <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css"/>
 <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css"/>
 <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
 <link rel="stylesheet" href="../assets/css/demo.css"/>
 <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>
 <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css"/>
 <script src="../assets/vendor/js/helpers.js"></script>
 <script src="../assets/js/config.js"></script>
 <style>
     #toastBox {
         position: absolute;
         top: 30px;
         right: 45.8%;
         display: flex;
         align-items: flex-end;
         flex-direction: column;
         overflow: hidden;
         padding: 20px;
         z-index: 3000;
     }

     .toast {
         width: 400px;
         height: 80px;
         background: #fff;
         margin: 15px 0;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
         display: flex;
         align-items: center;
         position: relative;
         transform: translateY(-100%);
         opacity: 0.5;
         animation: movetop 0.2s linear forwards;
     }

     @keyframes movetop {
         100% {
             transform: translateY(0);
             opacity: 100%;
         }
     }

     .toast i {
         margin: 0 20px;
         font-size: 35px;
         color: green;
     }

     .toast.error i {
         color: red;
     }

     .toast.invalid i {
         color: orange;
     }

     .toast::after {
         content: '';
         position: absolute;
         left: 0;
         bottom: 0;
         width: 100%;
         height: 5px;
         background: green;
         animation: anim 3s linear forwards;
     }

     .toast.error::after {
         background: red;
     }

     .toast.invalid::after {
         background: orange;
     }

     @keyframes anim {
         100% {
             width: 0;
         }
     }
 </style>
</head>
