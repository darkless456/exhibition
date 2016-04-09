/* 
 * @Author: darkless
 * @Date:   2015-07-14 15:20:33
 * @Last Modified by:   darkless
 * @Last Modified time: 2016-01-13 16:53:03
 */
'use strict';
$(document).ready(function() {
    //navigation bar effects
    var oUl_Nav = $("ul.nav_ul")[0];
    var aLi_Nav = $("li.nav_li");
    var aA_Nav = oUl_Nav.getElementsByTagName("a");
    for (var i = 0; i < aLi_Nav.length; i++) {
        aLi_Nav[i].index = i;
        aLi_Nav[i].onmouseover = function() {
            aLi_Nav[this.index].id = "mouse";
        }
        aLi_Nav[i].onmouseout = function() {
            aLi_Nav[this.index].id = '';
        }
    }

    //-----------------------------JS------------------------------------------//
    var pics_onoff = document.getElementById("img_scroll");
    if (pics_onoff != null) {
        //content part
        $(".pics_roll .content_txt:first").load("../txt/txt_js/how_to_make_pictures_rolling.txt");
        $(".pics_roll .dis_btn:first").click(function() {
            $(".pics_roll .content_code:first").load("../txt/txt_js/how_to_make_pictures_rolling_code.txt");
            $(".pics_roll .content_code:first").slideToggle("slow");
        });

        $(".this_usage .content_txt:first").load("../txt/txt_js/this_of_usage.txt");

        //insert pictures
        var oImg1 = "<li><img src='../pics/l01.png'></img></li>";
        var oImg2 = "<li><img src='../pics/l02.jpg'></img></li>";
        var oImg3 = "<li><img src='../pics/l03.jpg'></img></li>";
        $(".img_scroll_ul").append(oImg1, oImg2, oImg3);

        //scroll pictures
        var oUl_Img_Scroll = $(".img_scroll_ul:first");
        var aLi_Img_Scroll = $(".img_scroll_ul:first li");
        //clone elements and add to picture list
        aLi_Img_Scroll.clone(true).appendTo(oUl_Img_Scroll);
        oUl_Img_Scroll.css({
            width: "3414px"
        })
        var JS = window.NameSpace || {};
        JS.oUl_Img_Scroll = document.getElementsByClassName("img_scroll_ul").item(0);
        JS.timer = setInterval(function() {
            if (JS.oUl_Img_Scroll.offsetLeft < -JS.oUl_Img_Scroll.offsetWidth / 2) {
                JS.oUl_Img_Scroll.style.left = 0 + "px";
            } else {
                JS.oUl_Img_Scroll.style.left = JS.oUl_Img_Scroll.offsetLeft - 3 + "px";
            }
        }, 30)
    }

    //apply the style of picture list
    myLoadCss("childStyle");
});
