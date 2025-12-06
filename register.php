<?php
session_start();
//require('db.php');

?>

<html>
<head>
    <title>視障人士福音中心會員專區</title>
    <?php require('css_script_config.php'); ?>
</head>
  
<body>
<header>
    <?php require('menu_config.php'); ?> 
</header>  


<div class="container-fluid">

<main class="ms-sm-auto col-lg-12 px-md-4">

    <?php require('change_fonts_background_color_h.php'); ?> 

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">註冊成為會員</h1>
    </div>

    <button name="local_member" id="local_member" class="btn btn-dark" onclick="window.location='local_register.php'">香港會員</button>
    <button name="local_member" id="local_member" class="btn btn-dark">內地會員</button>
    <button name="local_member" id="local_member" class="btn btn-dark">海外會員</button>

</main>
</DIV>
</body>
</html>