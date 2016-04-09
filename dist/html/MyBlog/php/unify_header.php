
<?php
/*
 * @Author: darkless
 * @Date:   2015-12-24 15:54:36
 * @Last Modified by:   darkless
 * @Last Modified time: 2016-01-19 23:02:54
*/
if($is_mark == 'index'){
    echo '
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./font-awesome-4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/onMouseStyle.css" />
    <script src="./js/jquery-1.11.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/public.js" type="text/javascript" charset="utf-8"></script>';     
}

if($is_mark == 'js' or $is_mark == 'py' or $is_mark == 'contact'){
    echo '
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../font-awesome-4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/onMouseStyle.css" />
    <link rel="stylesheet" href="../css/childStyle.css" />
    <script src="../js/jquery-1.11.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/public.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/child-page.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/base-move-frames.js" type="text/javascript" charset="utf-8"></script>';    
}

if($is_mark == 'show'){
    echo '
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../font-awesome-4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/onMouseStyle.css" />
    <link rel="stylesheet" href="../css/childStyle.css" />
    <script src="../js/jquery-1.11.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/public.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/child-page.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/base-move-frames.js" type="text/javascript" charset="utf-8"></script>';    
}

?>
