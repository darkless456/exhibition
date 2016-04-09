<?php $is_mark='index';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SNOW HALATION -- the blog that belong to everyone</title>
<?php include('./php/unify_header.php');?>
</head>

<body>
    <div id="container" class="container">
        <header id="header" class="header">
            <h1>snow halation</h1>
            <p id="intro">the blog of designer, it isn't so hard, but so interesting</p>
        </header>
        <!-- /header -->
        <?php include('./php/unify_navigation.php');?>
        <div id="left_part" class="content_div cont_left">
            <section class="left_side aboutCreater">
                <header>
                    <img src="./img/head_img.jpg" alt="Kevin">
                    <p class="name">Kevin</p>
                    <p class="addr">ShangHai, China</p>
                </header>
                <!-- /header -->
                <p>Be a producter, no only a customer.</p>
            </section>
            <section class="left_side img_scroll">
                <div class="imgs_div">
                    <ul class="imgs_ul">
                        <li class="imgs_li"><img src="./pics/01.jpg" alt="" /></li>
                        <li class="imgs_li"><img src="./pics/02.jpg" alt="" /></li>
                        <li class="imgs_li"><img src="./pics/03.jpg" alt="" /></li>
                        <li class="imgs_li"><img src="./pics/04.jpg" alt="" /></li>
                        <li class="imgs_li"><img src="./pics/05.jpg" alt="" /></li>
                    </ul>
                </div>
            </section>
            <section class="left_side aboutDiscuession">
                <form action="./php/submit_msg.php" method="post" accept-charset="utf-8" name="message" onsubmit="return inputCheck(this);">
                    <label for="discuession">Leave a Message</label>
                    <textarea id="discuession" name="discuession" type="text" placeholder="Leave a Message"></textarea>
                    <textarea id="shadow"></textarea>
                    <label>Nickname
                        <input id="nickname" type="text" name="nickname" placeholder="Please Input Nickname">
                    </label>
                    <label>E-Mail
                        <input id="email" type="email" name="email" placeholder="Please Input Email">
                    </label>
                    <button type="submit" name="submit" class="btn btn_success">submit</button>
                </form>
            </section>
        </div>
        <div id="right_part" class="content_div cont_right">
        <?php
        include('./php/connection.php');
        include('./php/essay_display.php');?>
        </div>
        <?php include('./php/unify_footer.php');?>
    </div>
</body>
</html>
