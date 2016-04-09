<?php $is_mark='contact';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact US</title>
    <?php include('../php/unify_header.php'); ?>
    <link rel="stylesheet" href="../css/contact.css" />
</head>
<body>
<div id="container" class="container">
    <header id="header" class="header">
        <h1>snow halation</h1>
        <p id="intro"><span>Message Board</span>, welcome to contact us</p>
    </header><!-- /header -->
    <?php
     include('../php/unify_navigation.php');
     include("../php/connection.php");
     include("../php/config.php");
     ?>
    <div class="msg" id="msg">
        <?php
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
         // 输出数据
         while ($get_array = mysql_fetch_array($selected_data)){             
             echo 'Dear  ', '<b>'.$get_array['nickname'].'</b>', ','; 
             echo " Post at ", date("y-m-d H:i", $get_array['posttime']), '<br><br>';
             echo "Message: ", nl2br($get_array['msg']), '<br><br>';
             if(!empty($get_array['reply'])){
                echo '--------------------------<br>';
                echo "Reply at ", date("y-m-d H:i", $get_array['replytime']), '<br><br>';
                echo "Reply: ", nl2br($get_array['reply']), '<br><br>';
             }
             echo "<hr>";
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
                    echo ' [<a href="contact.php?p='. $i. '">'. $i. '</a>]';
                }
             }
             echo '<br>Total '. $counted_msg['count']. ' pieces';
         }

         function _get($str){
            $val = !empty($_GET[$str])?$_GET[$str]:null;
            return $val;
         }
        ?>
        <!-- 留言表单 -->
        <fieldset>
            <legend>Post message</legend>
            <form action="../php/submit_msg.php" id="post_msg" method="post" name="post_msg" accept-charset="utf-8" onsubmit="return inputCheck(this)">
                <p>
                    <label for="nickname" class="label">Nickname</label>
                    <input id="nickname2" type="text" class="input" placeholder="Please Input Nickname" name="nickname" autofocus/>
                </p>
                <p>
                    <label for="email" class="label">E-Mail</label>
                    <input id="email2" type="email" name="email" class="input" placeholder="Please Input Email">
                </p>
                <p>
                    <label for="discuession" class="label">Message</label>
                    <textarea id="discuession2" name="discuession" class="input" rows="8" placeholder="Leave a Message"></textarea>
                </p>
                <p>
                    <input type="submit" name="submit" class="btn btn_success" value="Submit" />
                </p>
            </form>
        </fieldset>
    </div>
     
    <?php include('../php/unify_footer.php');?>    
</div>

</body>
</html>