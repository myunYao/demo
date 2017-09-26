
 <?php
    require './common/admin.common.php';
    $catelist = $db->getDatas('news', '*','recom=1');
    $picture  =$db->getOneData('user','*','user_id="'.$_SESSION['user_id'].'"'); 
 ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
    <!-- 上述3个meta标签必须放在最前面-->
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="css/amazeui.min.css">
    <link rel="stylesheet" href="css/wap.css?2">
    <title>首页</title>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h3>天水云客社交平台</h3>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav" style="margin-left:1000px">
            <li><a href="./reg.php"><span class="glyphicon glyphicon-user"></span>注册</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-log-in"></span>登录 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="./userlogin.php">用户登录</a></li>
                    <li><a href="./adminlogin.php">管理员登录</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
</nav>

<div class="pet_mian" id="top" style="margin-top:5px">
  <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{"directionNav":false}' >
  <ul class="am-slides">
      <li>
            <img style="width:800px;height:385px;" src="img/1.jpg">
            <div class="pet_slider_font">
                <span class="pet_slider_emoji"> ^_^ </span>
                <span>“魅力天水玉泉观” 欢迎您！</span>
            </div>
            <div class="pet_slider_shadow"></div>
      </li>
      <li>
            <img style="width:800px;height:385px;" src="img/3.jpg">
            <div class="pet_slider_font">
                <span class="pet_slider_emoji"> []~(￣▽￣)~*　</span>
                <span>天水师范学院，一个圣洁而美丽的地方！</span>
            </div>
            <div class="pet_slider_shadow"></div>
      </li>
      <li>
            <img style="width:800px;height:385px;" src="img/6.jpg">
            <div class="pet_slider_font">
                <span class="pet_slider_emoji"> (｡・`ω´･)　</span>
                <span>我怀念的......</span>
            </div>
            <div class="pet_slider_shadow"></div>
      </li>
  </ul>
</div>
<div class="pet_circle_nav">
    <ul class="pet_circle_nav_list">
        <li><a style="text-decoration: none"  href="./personal_center.php?user_id=<?=$_SESSION['user_id'];?>" class="iconfont pet_nav_xinxianshi ">
        <img style="width:55px;height:55px;border:1px solid #ccc;border-radius:50%;"src="<?=$picture['user_picture'];?>">
        </a><span>个人中心</span></li>
        <li><a style="text-decoration: none" href="" class="iconfont pet_nav_zhangzhishi ">&#xe607;</a><span>趣闻</span></li>
        <li><a style="text-decoration: none" href="" class="iconfont pet_nav_kantuya ">&#xe62c;</a><span>阅读</span></li>
        <li><a style="text-decoration: none" href="" class="iconfont pet_nav_mengzhuanti ">&#xe622;</a><span>专题</span></li>
        <li><a href="" class="iconfont pet_nav_meirong ">&#xe629;</a><span>订阅</span></li>
        <li><a href="" class="iconfont pet_nav_yiyuan ">&#xe602;</a><span>专栏</span></li>
        <li><a href="" class="iconfont pet_nav_dianpu ">&#xe604;</a><span>讨论</span></li>
        <li><a href="javascript:;" class="iconfont pet_nav_gengduo ">&#xe600;</a><span>更多</span></li>
    </ul>
    <div class="pet_more_list"><div class="pet_more_list_block">
    <div class="iconfont pet_more_close">×</div>
    <div class="pet_more_list_block">
        <div class="pet_more_list_block_name">
            <div class="pet_more_list_block_name_title">阅读 Read</div>
            <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_xinxianshi pet_more_list_block_line_ico">&#xe61e;</i>
                <div class="pet_more_list_block_line_font">个人中心</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_zhangzhishi pet_more_list_block_line_ico">&#xe607;</i>
                <div class="pet_more_list_block_line_font">趣闻</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_kantuya pet_more_list_block_line_ico">&#xe62c;</i>
                <div class="pet_more_list_block_line_font">阅读</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_mengzhuanti pet_more_list_block_line_ico">&#xe622;</i>
                <div class="pet_more_list_block_line_font">专题</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_bk pet_more_list_block_line_ico">&#xe629;</i>
                <div class="pet_more_list_block_line_font">订阅</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_wd pet_more_list_block_line_ico">&#xe602;</i>
                <div class="pet_more_list_block_line_font">专栏</div>
            </a>
 <div class="pet_more_list_block_name_title pet_more_list_block_line_height">服务 Service</div>
              <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_xinxianshi pet_more_list_block_line_ico">&#xe61e;</i>
                <div class="pet_more_list_block_line_font">新鲜事</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_zhangzhishi pet_more_list_block_line_ico">&#xe607;</i>
                <div class="pet_more_list_block_line_font">趣闻</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_kantuya pet_more_list_block_line_ico">&#xe62c;</i>
                <div class="pet_more_list_block_line_font">阅读</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_mengzhuanti pet_more_list_block_line_ico">&#xe622;</i>
                <div class="pet_more_list_block_line_font">专题</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_bk pet_more_list_block_line_ico">&#xe629;</i>
                <div class="pet_more_list_block_line_font">订阅</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_wd pet_more_list_block_line_ico">&#xe602;</i>
                <div class="pet_more_list_block_line_font">专栏</div>
            </a>
        </div>
    </div>

    </div></div>
</div>
<div class="pet_content_main">
  <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
  <div class="am-list-news-bd">
  <ul class="am-list">
     <!--缩略图在标题右边-->
      <?php 
         foreach ($catelist as $key=>$value){
                   // var_dump($value);
                  $newslist = $db->getOneData('news', '*','news_id ='.$value['news_id']);
                  $sql = 'SELECT n.*, u.user_nick, u.user_picture
                            FROM news AS n
                            LEFT JOIN user AS u ON n.user_id = u.user_id 
                            WHERE n.news_id= '. $newslist['news_id'];
                            // echo $sql;
                  $result = $db->dblink->query($sql);
                  $list = $result->fetch_all(MYSQLI_ASSOC);       
       ?>
    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_list_one_block lis">
      <input type="hidden" name="news_id" value="<?=$catelist['news_id']?>">
        <div class="pet_list_one_info">
                        <div class="pet_list_one_info_l">
                            <a style="text-decoration:none" href="./personal_center.php?user_id=<?=$value['user_id'];?>">
                                <div class="pet_list_one_info_ico"><img src="<?=$list[0]['user_picture'] ? $list[0]['user_picture']:'img/a1.png';?>" alt="" ></div>
                                <div class="pet_list_one_info_name"><?=$list[0]['user_nick'];?></div>
                            </a>
                        </div>
                        <div class="pet_list_one_info_r">
                            <div class="pet_list_tag pet_list_tag_xxs">新鲜事</div>
                        </div>
                    </div>

                    <div>
                      <span><?=$value['news_create_date'];?></span>
                        <h3><a style="color:black" href="content.php?news_id=<?=$value['news_id']?>" class=""><?=$value['news_title'];?></a></h3>
                        
                        <div style="margin: 0 auto"><?=$value['news_content_text'];?></div>

                    </div>
                    <div class="am-u-sm-4 am-list-thumb">
                     <?php 
                        echo $value['news_picture'] ? 
                         '<a href="###" class="">
                        <img src="'.$value['news_picture'].'">
                        </a>' : '';
                      ?>
                </div>
      </li>
<?php
  }
?>
    </ul>
  </div>

    </div>

</div>
<div class="pet_article_dowload pet_dowload_more_top_off">
      <div class="pet_article_dowload_title">关于Amaze UI</div>
      <div class="pet_article_dowload_content pet_dowload_more_top_bg"><div class="pet_article_dowload_triangle pet_dowload_more_top_san"></div>
      <div class="pet_article_dowload_ico"><img src="img/footdon.png" alt=""></div>
      <div class="pet_article_dowload_content_font">
Amaze UI 以移动优先（Mobile first）为理念，从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。 </div>
      <div class="pet_article_dowload_all">
        <a href="###" class="pet_article_dowload_Az am-icon-apple"> App store</a>
        <a href="###" class="pet_article_dowload_Pg am-icon-android"> Android</a>
      </div>
      </div>
      <div class="pet_article_footer_info">Copyright(c)2015 Amaze UI All Rights Reserved.模板收集自 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> -  More Templates  <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/amazeui.min.js"></script>
<script src="js/index.js"></script>
<script>
$(function(){

    // 动态计算新闻列表文字样式
    auto_resize();
    $(window).resize(function() {
        auto_resize();
    });
    $('.am-list-thumb img').load(function(){
        auto_resize();
    });

    $('.am-list > li:last-child').css('border','none');
    function auto_resize(){
        $('.pet_list_one_nr').height($('.pet_list_one_img').height());

    }
        $('.pet_nav_gengduo').on('click',function(){
            $('.pet_more_list').addClass('pet_more_list_show');
       });
        $('.pet_more_close').on('click',function(){
            $('.pet_more_list').removeClass('pet_more_list_show');
        });
});

</script>
</body>
</html>