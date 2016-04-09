<?php

if(_get('act') == 'del_img'){

} else{
    // if(!$_POST['confirm']){
    //     echo "非法访问";
    // }

    if($_FILES['upload']['error'] != UPLOAD_ERR_OK){
    switch($_FILES['upload']['error']){
        case UPLOAD_ERR_INI_SIZE:
            die('超过php.ini允许的大小');
            break;

        case UPLOAD_ERR_FORM_SIZE:
            die('超过HTML表单中MAX_FILE_SIZE的大小');
            break;

        case UPLOAD_ERR_PARTIAL:
            die('只上传了部分');
            break;

        case UPLOAD_ERR_NO_FILE:
            die('未检测到上传文件');
            break;

        case UPLOAD_ERR_NO_TMP_DIR:
            die('临时文件夹不存在');
            break;

        case UPLOAD_ERR_CANT_WRITE:
            die('不能写入文件');
            break;

        case UPLOAD_ERR_EXTENSION:
            die('未知错误');
            break;
    }
}

    $img_name = $_FILES['upload']['name'];
    $img_size = $_FILES['upload']['size'];
    $img_tmp = $_FILES['upload']['tmp_name'];
    list($img_width, $img_height, $img_type, $img_attr) = getimagesize($img_tmp);
    $img_caption = $_POST['caption'];

    // $img_dir = '../img/';

    // switch($img_type){
    //     case IMAGETYPE_JPEG:
    //         $img = imagecreatefromjpeg($img_tmp) or die('image type is not supported');
    //         // imagejpeg($img, $img_dir. ''. $img_name);
    //         break;

    //     case IMAGETYPE_GIF:
    //         $img = imagecreatefromgif($img_tmp) or die('image type is not supported');
    //         // imagegif($img, $img_dir. ''. $img_name);
    //         break;

    //     case IMAGETYPE_PNG:
    //         $img = imagecreatefrompng($img_tmp) or die('image type is not supported');
    //         // imagepng($img, $img_dir. ''. $img_name);
    //         break;

    //     default:
    //         die('img type is not supported');

    // }

    $s2 = new SaeStorage();
    $s_img = new SaeImage();

    $img_data = file_get_contents($img_tmp);
    $s_img->setData($img_data); //装进容器
    $new_data = $s_img->exec(); //转为二进制数据

    $s2->write('storageimg', $img_name, $new_data);
    $img_path = $s2->getUrl('storageimg', $img_name);


    // $img_path = $img_dir. ''. $img_name;
    $img_size = round($img_size/1024, 2). 'KB';

    // imagedestroy($img);

    $result = array(
        'img_name'=>$img_name,
        'img_caption'=>$img_caption,
        'img_path'=>$img_path,
        'img_size'=>$img_size
        );


    echo json_encode($result);

}



function _get($str){
   $val = !empty($_GET[$str])? $_GET[$str]: NULL;
}
?>
