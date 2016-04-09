<?php
/*
 * @Author: darkless
 * @Date:   2015-12-24 15:30:26
 * @Last Modified by:   darkless
 * @Last Modified time: 2016-01-19 23:03:30
*/
if($is_mark == 'index'){
    echo '<nav id="main_nav">
            <ul class="nav_ul">
                <li class="nav_li"><a href="./index.php"><i class="fa fa-home fa-fw"></i>&nbsp;home</a></li>
                <li class="nav_li"><a href="./html/py.php"><i class="fa fa-pinterest-square fa-fw"></i>&nbsp;python</a></li>
                <li class="nav_li"><a href="./html/js.php"><i class="fa fa-book fa-fw"></i>&nbsp;javascript</a></li>
                <li class="nav_li"><a href="./html/contact.php"><i class="fa fa-pencil fa-fw"></i>&nbsp;contact</a></li>
            </ul>
        </nav>';
}

if($is_mark == 'js'||$is_mark == 'py'||$is_mark == 'contact'){
    echo '<nav id="main_nav">
            <ul class="nav_ul">
                <li class="nav_li"><a href="../index.php"><i class="fa fa-home fa-fw"></i>&nbsp;home</a></li>
                <li class="nav_li"><a href="./py.php"><i class="fa fa-pinterest-square fa-fw"></i>&nbsp;python</a></li>
                <li class="nav_li"><a href="./js.php"><i class="fa fa-book fa-fw"></i>&nbsp;javascript</a></li>
                <li class="nav_li"><a href="./contact.php"><i class="fa fa-pencil fa-fw"></i>&nbsp;contact</a></li>
            </ul>
         </nav>';  
}

if($is_mark == 'show'){
    echo '<nav id="main_nav">
            <ul class="nav_ul">
                <li class="nav_li"><a href="../index.php"><i class="fa fa-home fa-fw"></i>&nbsp;home</a></li>
                <li class="nav_li"><a href="../html/py.php"><i class="fa fa-pinterest-square fa-fw"></i>&nbsp;python</a></li>
                <li class="nav_li"><a href="../html/js.php"><i class="fa fa-book fa-fw"></i>&nbsp;javascript</a></li>
                <li class="nav_li"><a href="../html/contact.php"><i class="fa fa-pencil fa-fw"></i>&nbsp;contact</a></li>
            </ul>
         </nav>';  
}



?>
