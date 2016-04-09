<?php $is_mark='js';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SNOW HALATION -- Javascript</title>
    <?php include('../php/unify_header.php'); ?>
</head>
<body>
    <div id="container" class="container">
        <header id="header" class="header">
            <h1>snow halation</h1>
            <p id="intro"><span>javascript</span>, create amazing and artistic web effects</p>
        </header><!-- /header -->
        <?php include('../php/unify_navigation.php');?>
        <div id="img_scroll" class="img_scroll_div">
            <ul class="img_scroll_ul"></ul>
        </div>
        <div id="content" class="box_border">
        <?php
        include('../php/connection.php');
        include('../php/essay_display.php');?>
        </div>
        <?php include('../php/unify_footer.php');?>
    </div>
    </body>
</html>