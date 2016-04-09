<?php 
 @session_start();
 if(!$_SESSION['username']){
    header('location: ../html/login.php');
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Console</title>
        <script src="../js/jquery-1.11.2.js" type="text/javascript" charset="utf-8"></script>
        <script src="../js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
    </head>

 <body>
 <h1>留言管理</h1>
 <p>
    <a href="./dilivery.php" title="">进入文章管理</a>
    <br>
    <a href="../index.php" title="">返回首页</a>
 </p>
 <?php
 require("./connection.php");
 require("./config.php");

 // 确定当前页数
 $p = _get('p')?_get('p'):1;
 // $p = 1;
 // 数据指针
 $offset = ($p-1)*$pagesize;
 
 // 查询记录
 $selected_data = mysql_query("SELECT * FROM msgbook ORDER BY id DESC LIMIT $offset, $pagesize;");
 if(!$selected_data){
    exit("查询数据失败".mysql_errno());
 }

 // var_dump($selected_data);
 // 输出数据
 while ($get_array = mysql_fetch_array($selected_data)){
     echo "<hr>";
     echo '<b>'.$get_array['nickname'].'</b>', " 用户"; 
     echo "发表于：", date("y-m-d H:i", $get_array['posttime']), '<br><br>';
     echo "内容：", nl2br($get_array['msg']), '<br><br>';
     if(!empty($get_array['reply'])){
        echo '--------------------------<br>';
        echo "回复于：", date("y-m-d H:i", $get_array['replytime']), '<br><br>';
        echo "内容：", nl2br($get_array['reply']), '<br><br>';
     }
 ?>
 <fieldset style="width: 200px; padding: 20px;">
     <legend>回复本条留言</legend>
     <form action="./handle_msg.php" method="post" accept-charset="utf-8" name="replyForm" id="reply">
        <textarea class="replay" name="reply" rows="5" cols="40" style="resize: none;"><?=$get_array['reply']?></textarea>
        <p>
            <input type="hidden" name="id" value="<?=$get_array['id']?>" />
            <input type="submit" name="submit" value="回复">
            <a href="handle_msg.php?action=delete&id=<?=$get_array['id']?>" class="delete_msg">删除</a>
        </p>
     </form>
 </fieldset>
 <?php
 }
 // 分页显示
 // 留言总数
 $counted_msg = mysql_fetch_array(mysql_query("SELECT count(*) AS count FROM msgbook"));
 $count_page = ceil($counted_msg['0']/$pagesize); //计算留言页数

 if($count_page>1){
     for($i=1; $i<=$count_page; $i++){
        if($i==$p){
            echo "[", $i, "]";
        } else{
            echo '[<a href="console.php?p='. $i. '">'. $i. '</a>]';
           
        }
     }
     echo '<br>总共有'. $counted_msg['count']. '条留言';
 }

 function _get($str){
    $val = !empty($_GET[$str])?$_GET[$str]:null;
    return $val;
 }
 ?>
 </body>
 <script>
 $(function(){
    $('a.delete_msg').click(function(){
        var yes_no = confirm('是否删除');
        if(yes_no == false){
            return false;
        }
    })
 })
 </script>
 </html>