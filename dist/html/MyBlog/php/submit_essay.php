<?php
/*
 * @Author: darkless
 * @Date:   2015-12-30 14:29:08
 * @Last Modified by:   darkless
 * @Last Modified time: 2016-01-08 15:05:36
*/

if(!isset($_POST['submit'])){
    exit("Access violation");
}

if(!isset($_POST['classify'])){
    exit('Please select classify');
}
// echo $_POST['classify']; //jsbook
// exit();
if(get_magic_quotes_gpc()){
    $title = htmlspecialchars(trim($_POST['title']));
    $essay = htmlspecialchars(trim($_POST['essay']));    
} else{
    $title = addslashes(htmlspecialchars(trim($_POST['title'])));
    $essay = addslashes(htmlspecialchars(trim($_POST['essay'])));
}

if(strlen($title) > 128){
    exit("Title too long, please <a href='javascript:history.back(-1)>go back</a>.");
}

include('./connection.php');

$tbname = $_POST['classify'];
$dilivery_time = time();

$inst_essay = "INSERT INTO $tbname(title, essay, dilivery_time) VALUES('$title', '$essay', $dilivery_time);";

if(mysql_query($inst_essay)){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Post Success</title>
        <meta http-equiv=refresh content="3;url='./dilivery.php'">
    </head>
    <body>
        <p>
            提交&nbsp;<?=$tbname?>&nbsp;成功，正在跳转页面。。。
        </p>
    </body>
    </html>
<?php
exit;
} else{
    echo "dilivery failure, error code: ", mysql_errno(), "<a href='javascript:history.back(-1)>go back</a>";
}

?>
