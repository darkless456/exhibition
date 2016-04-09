<?php
 @session_start();
 if(!$_SESSION['username']){
    header('location: ../html/login.php');
    exit;
 }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dilivery</title>
    <script src="../js/jquery-1.11.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/public.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/ckeditor/ckeditor.js" type="text/javascript"></script>

    <style>
        fieldset{width: 80%; margin: 30px 0; padding: 30px;}
        label{float: left; width: 80px; font-size: 25px; font-weight: bold;}
        select{font-size: 14px; padding: 5px;}
        [type="submit"]{width: 120px;}
        #title{width: 85%; height: 18px; padding: 5px; border: 0; border-bottom: 2px solid #ccc; font-size: 16px;}
        #title:focus{border: 0; border-bottom: 2px solid #ccc;}
/*        #shadow, #essay{box-sizing: border-box; width: 80%; overflow: hidden; height: 325px; padding: 15px;}
        #shadow{ position: absolute; border-width: 0px; padding: 0px; visibility: hidden; }*/
    </style>
</head>
<body>

<div class="container" id="container">
<h1>文章管理</h1>
<p>
    <a href="./console.php" title="">进入留言管理</a>
    <br>
    <a href="../index.php" title="">返回首页</a>
</p>
<!-- 已发表文章展示，最近发表的在前 -->
<div class="show_title">
    <?php
    // session_start();

    include('./connection.php');
    include('./config.php');

    $p = _get('p')? _get('p'): 1; //当前页码
    $offset = ($p-1)*$show_title_size; //偏移量
    // echo $offset;

    $select_title = mysql_query("SELECT eid, title, dilivery_time FROM essaybook ORDER BY eid DESC LIMIT $offset, $show_title_size;");
    // LIMITED $offset, $show_title_size
    if(!$select_title){
        exit("查找文章失败，错误代码：". mysql_errno());
    }

    while($get_title = mysql_fetch_array($select_title)){
        echo 'No.<b>',$get_title['eid'], '</b> /  Title: <b>', $get_title['title'], '</b>';
        echo '<br>Post at: ', date('Y-m-d H:m', $get_title['dilivery_time']);
        ?>
        <form action="./handle_essay.php" method="post" accept-charset="utf-8">
        <a href="handle_essay.php?action=delete&eid=<?=$get_title['eid']?>" class='delete_essay'>Delete</a>
        </form>
        <?php
        echo "<hr>";
    }

    $count_title = mysql_fetch_array(mysql_query("SELECT count(title) AS count FROM essaybook;"));
    $count_page = ceil($count_title['count']/$show_title_size);

    if($count_page>1){
        for($i=1; $i<=$count_page; $i++){
            if($i == $p){
                echo '['. $i. ']';
            } else{
                echo "[<a href='dilivery.php?p=". $i. "'>". $i. "</a>]";
            }
        }
    }


    function _get($str){
        $val = !empty($_GET[$str])?$_GET[$str]:null;
        return $val;
    }
    ?>
</div>  
<!-- 发文框 -->
<fieldset>
    <legend>发表文章</legend>
    <form action="./submit_essay.php" method="post" accept-charset="utf-8" onsubmit="return inputCheck(this);">
    <p>
        <label for="classify">分类：</label>
        <select name="classify">
            <option value="" selected="selected">请选择分类</option>
            <option value="essaybook">主页文章</option>
            <option value="jsbook">JavaScript文章</option>
            <option value="pybook">Python文章</option>
        </select>
    </p>
    <p>
        <label for="title">标题：</label>
        <input id="title" type="text" name="title"  />        
    </p>
    <P>
        <textarea id="essay" name="essay" class="ckeditor"></textarea>
        <script type="text/javascript">CKEDITOR.replace('essay', {height: '550px', width: '100%'});</script>
        <!-- <textarea id="shadow" class="ckeditor"></textarea> -->
    </P>
    <p>
        <input type="submit" name="submit" value="发表">
    </p>
    </form>

    <div class="upload_frame">
        <p id='upload_form'>
            <input type="file" name="upload" value="" placeholder="浏览图片" id="upload">
            <input type="text" name="caption" value="" placeholder="图片描述" id="caption">
            <input type="button" name="confirm" value="添加图片" id="confirm">    
        </p>     
        <div id="img_info"></div>
        <div id="img_show"></div>
    </div>

</fieldset>
</div>
</body>
<script>
//autochange textarea
// var oTxt = document.getElementById( "essay" );
// var oTxt2 = document.getElementById( "shadow" );
// autoTextarea( oTxt, oTxt2 );
$(function(){
    // return false;

    $('a.delete_essay').click(function(){
        var yes_no = confirm('确认删除');
        if(yes_no == false){
            return false;
        }
    })

    var img_upload = {
        upload_form: $('#upload_form'),
        upload: $('#upload'),
        caption: $('#caption'),
        confirm: $('#confirm'),
        info1: $('#img_info'),
        show: $('#img_show')
    }
    // console.log(img_upload.upload_form);
    img_upload.upload_form.wrap('<form id="img_upload_form" action="./upload_pics.php" method="post" accept-charset="utf-8" enctype="multipart/form-data"></form>');
    img_upload.confirm.click(function(){
        if(img_upload.upload.val() == ''){
            alert('请选择图片');
            return false;
        }
        $('#img_upload_form').ajaxSubmit({
            dataType: 'json',
            beforeSend: function(){
                img_upload.info1.empty();
                img_upload.show.empty();
                img_upload.confirm.val('Uploading...');
            },
            success: function(data, status){
                // console.log('type:' + typeof(data));
                // return false;
                //data: file_name,file_caption,file_path,file_size(MB)
                img_upload.info1.html(status + '/ ' + data.img_name + '(' + data.img_size + ')' + '<br>' + '<span class="del_img" rel="' + data.img_path + '">删除</span>');
                img_upload.show.html('<img src="' + data.img_path + '" alt="' + data.img_caption + '" width="256">');
                img_upload.confirm.val('添加图片');
            },
            error: function(data, status){
                img_upload.info1.html(status);
                img_upload.show.html(data.responseText);
            }
        })
    })

    // $('.del_img').live('click', function(){
    //     var path = $(this).attr('rel');
    //     $.post('./upload_pics.php', {tmp_path:path}, function(){

    //     })
    // });

})

</script>
</html>

