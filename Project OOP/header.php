<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.6.8, mobirise.com">
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:image:src" content="">
  <meta property="og:image" content="">
  <meta name="twitter:title" content="Home">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-removebg-preview.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Home</title>

  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link href="assets/fonts/style.css" rel="stylesheet">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="mycss/userinfo.css" />
  <link rel="stylesheet" href="mycss/mystyles.css" />
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu3 cid-sFAA5oUu2Y" once="menu" id="menu3-1">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    
                        <a href="https://www.facebook.com/MIT5999"><img src="assets/images/logo-removebg-preview.png" alt="Mobirise Website Builder" style="height: 4.8rem;"></a>
                    
                </span>
                <span class="navbar-caption-wrap"><a href="index.php"class="navbar-caption text-black text-primary display-5" >ມາສເຕີ ໄອທີ Master it</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-7" href="index.php">ໜ້າຫຼັກ&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-7" href="course.php">ຫຼັກສູດ&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-7" href="about.php">ກ່ຽວກັບ</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-7" href="contact.php">ຕິດຕໍ່</a></li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://www.facebook.com/MIT5999" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                </div>
                <div class="navbar-buttons mbr-section-btn">               
                    <?php
                        if ($_SESSION['userlevel'] == 'a') {
                            echo '<a class="btn btn-primary display-4" href="info.php">view database</a>
                            <a class="btn btn-primary display-4" href="logout.php">Logout</a>';
                        } elseif  ($_SESSION['userlevel'] == 'm') { 
                            echo '<a class="btn btn-primary display-4" href="info.php">User info</a>
                            <a class="btn btn-primary display-4" href="logout.php">Logout</a>';
                        } else {
                        echo '<a class="btn btn-primary display-4" href="login.php">Login</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</section>
