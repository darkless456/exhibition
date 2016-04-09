<?php 
@session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title> 
    <style>
    * {margin: 0; padding: 0;}
    body{font-size: 14px;}
    form{width: 225px; margin: 15px; border: 1px solid #ccc; padding: 15px;}
    p{margin-bottom: 10px;}
    label{float: left; width: 70px;}
    .password{width: 150px;}
    .submit{padding: 5px;}
    </style>
    <script src="../js/public.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php
require("../php/connection.php");

if($_POST){
    $password = md5(trim($_POST['password']));
    $username = trim($_POST['username']);

    $check_query = mysql_query("SELECT uid FROM user WHERE username='$username' AND password='$password';");
    if($check_array = mysql_fetch_array($check_query)){
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $check_array['uid'];
        // 重定向至留言管理界面
        // header("Location: ../php/console.php");
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Post Success</title>
        <meta http-equiv=refresh content="1;url='../php/console.php'">
    </head>
    <body>
        <p>
            Login successed!<br/>
            Now going to console.
        </p>
    </body>
    </html>
    <?php
        exit();
    } else{
        exit('Error!');
    }
}


?>
<body>
    <form name="login" action="#" method="post" accept-charset="utf-8" onsubmit="return inputCheck(this);">
        <p>
            <input type="hidden" name="username" class="username" value="admin"></input>
        </p>
        <p>
            <label for="">Password: </label>
            <input type="password" name="password" class="password" placeholder="admin password" autofocus />
        </p>
        <p>
            <input type="submit" name="submit" class="submit" value="Login" />
        </p>
    </form>
    <a href="../index.php" title="Go to index">Go to index</a>
</body>

</html>
