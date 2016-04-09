<?php
/*
 * @Author: darkless
 * @Date:   2016-01-06 14:12:51
 * @Last Modified by:   darkless
 * @Last Modified time: 2016-01-19 23:09:39
*/
include('./connection.php');
$is_mark = 'show';
if($_GET['action'] == 'delete'){
    $delete = mysql_query('DELETE FROM essaybook WHERE eid=$_GET["eid"];');
    if($delete){
        echo '<script language="javascript">alert("删除成功！");self.location="./dilivery.php"</script>';
        exit;
    } else{
        exit('删除失败'.mysql_errno().'[ <a href="javascript:history.back(-1)">返回</a> ]');
    }
} elseif($_GET['action'] == 'show'){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <?php include('./unify_header.php');?>
    </head>
    <body>
        <div id="container" class="container">
            <header id="header" class="header">
                <h1>snow halation</h1>
                <p id="intro">the blog of designer, it isn't so hard, but so interesting</p>
            </header>
            <!-- /header -->
            <?php include('./unify_navigation.php');?>
            <div id="content" class="box_border">
            <?php include('./connection.php');
            function _get($str){
                $val = !empty($_GET[$str])?$_GET[$str]:false;
                return $val;
            }
            if(_get('eid')){
                $table_show = 'essaybook';
                $id_type = 'eid';
                $id = _get('eid');
            } elseif(_get('jid')){
                $table_show = 'jsbook';
                $id_type = 'jid';
                $id = _get('jid');
            } else{
                $table_show = 'pybook';
                $id_type = 'pid';
                $id = _get('pid');
            }
            // echo $id;
            $show_all = mysql_query("SELECT * FROM $table_show WHERE $id_type=$id LIMIT 1;");
            $show = mysql_fetch_array($show_all);
            echo "<section class='content_li'><header><h2>", $show['title'], "</h2></header>";
            echo "<article class='content'>", html_entity_decode($show['essay']), "</article></section>";   
            ?>
            </div>
        </div>
    </body>
    </html>
    <?php
}

// if($_GET['action'] == 'showAll'){
//     $show_query = 'SELECT * FROM essaybook WHERE eid=4 LIMIT 1;';
//     $show_all = mysql_query($show_query);
//     if($show_all){
//         $essay_all = mysql_fetch_array($show_all);
//         $content_all = html_entity_decode($essay_all['essay']);
//         $content_array = array('content'=>$content_all);
//         // var_dump($content_array);
//         echo json_encode($content_array);

//     } else{
//         echo json_encode(array('error'=>'Display error, please refresh'));
//     }
// }
// $img_name = 'pic.jpg';
// $img_caption = '';
// $img_path = '../pph/';
// $img_size = 30;
//     $result = array(
//         'img_name'=>$img_name,
//         'img_caption'=>$img_caption,
//         'img_path'=>$img_path,
//         'img_size'=>$img_size
//         );
// $tmp = json_encode($result);
// var_dump($tmp);

?>
