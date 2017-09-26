<?php 
require './common/admin.common.php';
$catelist = $db->getDatas('news', '*','user_id='.$_GET['user_id']);
//var_dump($catelist);
 $share = $db->getDatas('share', '*','share_person_id='.$_GET['user_id']);
/* $catelist = $db->getDatas('news', '*');
//var_dump($catelist);
 $share = $db->getDatas('share', '*');*/
 $picture  =$db->getOneData('user','*','user_id='.$_GET['user_id']); 
 ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" href="css/amazeui.min.css">
  <link rel="stylesheet" href="css/wap.css">
  <title>个人中心</title>
</head>
<body style="background:#ececec">
  <div class="pet_mian" >
    <div class="pet_head">
      <header data-am-widget="header"
          class="am-header am-header-default pet_head_block">
        <div class="am-header-left am-header-nav ">
          <a href="./index.php" class="iconfont pet_head_jt_ico">&#xe601;</a>
        </div>
<div class="pet_news_list_tag_name"><?=$picture['user_nick'];?></div>
        <div class="am-header-right am-header-nav">
          <a href="javascript:;" class="iconfont pet_head_gd_ico">&#xe600;</a>
        </div>
      </header>
    </div>

    <div class="pet_more_list">
      <div class="pet_more_list_block">
        <div class="iconfont pet_more_close">×</div>
        <div class="pet_more_list_block">
          <div class="pet_more_list_block_name">
            <div class="pet_more_list_block_name_title">阅读 Read</div>
            <a class="pet_more_list_block_line"> <i class="iconfont pet_nav_xinxianshi pet_more_list_block_line_ico">&#xe61e;</i>
              <div class="pet_more_list_block_line_font">新鲜事</div>
            </a>
            <a class="pet_more_list_block_line"> <i class="iconfont pet_nav_zhangzhishi pet_more_list_block_line_ico">&#xe607;</i>
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

      </div>
    </div>

    <div class="pet_content pet_content_list">
      <div class="pet_grzx">

          <div class="pet_grzx_nr">
              <div class="pet_grzx_ico">
                  <img style="height:200px" src="<?=$picture['user_picture'];?>" alt="">
              </div>
              <div class="pet_grzx_name"><?=$picture['user_nick'];?></div>              
              <div class="pet_grzx_num_font">
                我坐在水屋下边的平台看着大海，吹着海风，真的是太喜欢了。夜晚有好多小白鲨鱼，好多种鱼。
              </div>
              <div class="pet_grzx_num">
                <span>653<i>喜欢</i></span>
                <span>234<i>关注</i></span>
                <span>34<i>文章</i></span>
                <!-- <span><i>发布</i></span> -->
                
              </div>
              <span style="display: block;margin: 0 auto"><a href="./publish.php?user_id=<?=$picture['user_id'];?>">发布</a></span>

          </div>

          <div class="pet_grzx_list">              
             <div class="pet_content_main pet_article_like_delete">
          <div data-am-widget="list_news" class="am-list-news am-list-news-default am-no-layout">
            <div class="am-list-news-bd">
              <ul class="am-list">

              <!--分享-->
               <?php 

                  foreach ($share as $key=>$value){
                   // var_dump($value);
                  $newslist = $db->getOneData('news', '*','news_id ='.$value['news_id']);
                  // $picture = $db->getOneData('user','*','user_id='.$newslist['user_id']);
                  // var_dump($picture);
                  // $sharelist = $db->getOneData('share', '*','share_person_id ='. $newslist['user_id']);            
                 ?>
                 <span>分享</span>

                  <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_list_one_block" style="background:#ccc;">
                    <div><?=$value['share_content'];?></div>
                    <div class="pet_list_one_info">
                        <div class="pet_list_one_info_l">
                            <input type="hidden" id="news_id" name="news_id" value="<?=$value['news_id'];?>">
                            <div class="pet_list_one_info_ico"><img src="<?=$picture['user_picture'] ? $picture['user_picture']:'img/a1.png';?>" alt="" ></div>
                            <div class="pet_list_one_info_name"><?=$picture['user_nick'];?></div>
                        </div>
                       <div class="pet_list_one_info_r">
                           <div style="cursor: pointer;" class="pet_list_tag pet_list_tag_xxs delete_share" >删除</div>
                       </div>
                    </div>

                    <div>
                      <span><?=$share['news_create_date'];?></span>
                        <h3><a style="color:black" href="###" class=""><?=$newslist['news_title'];?></a></h3>
                      
                        
                        <div style="margin: 0 auto;"><?=$newslist['news_content_text'];?></div>

                    </div>
                    <div class="am-u-sm-4 am-list-thumb">
                      <a href="###" class="">
                        <img src="<?=$newslist['news_picture'];?>">
                      </a>
                    </div>
                  </li>
                <?php 
                  }
                 ?>
                <!--点赞-->
                <?php 

                  foreach ($catelist as $key =>$value){
                 ?>
                 
                  <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_list_one_block">
                  <input type="hidden" id="news_id" name="news_id" value="<?=$value['news_id'];?>">
                    <div class="pet_list_one_info">
                        <div class="pet_list_one_info_l">
                             <div class="pet_list_one_info_ico"><img src="<?=$picture['user_picture'] ? $picture['user_picture']:'img/a1.png';?>" alt="" ></div>
                            <div class="pet_list_one_info_name"><?=$picture['user_nick'];?></div>
                        </div>
                        <div class="pet_list_one_info_r">
                            <div style="cursor: pointer;" class="pet_list_tag pet_list_tag_xxs delete_share">删除</div>
                        </div>
                    </div>

                    <div>
                      <span><?=$value['news_create_date'];?></span>
                        <h3><a style="color:black" href="###" class=""><?=$value['news_title'];?></a></h3>
                        <div class="myc"><?=$value['news_content_text'];?></div>

                    </div>
                    <div class="am-u-sm-4 am-list-thumb">
                      <a href="###" class="">
                        <img src="<?=$value['news_picture'];?>">
                      </a>
                    </div>
                  </li>
                <?php 
                  }
                 ?>

                
                </ul>
              </div>

            </div>

          </div>

          </div>
<div class="pet_article_dowload">
      <div class="pet_article_dowload_title">关于Amaze UI</div>
      <div class="pet_article_dowload_content"><div class="pet_article_dowload_triangle"></div>
      <div class="pet_article_dowload_ico"><img src="img/footdon.png" alt=""></div>
      <div class="pet_article_dowload_content_font">
Amaze UI 以移动优先（Mobile first）为理念，从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。
      </div>
      <div class="pet_article_dowload_all">
        <a href="###" class="pet_article_dowload_Az am-icon-apple"> App store</a>
        <a href="###" class="pet_article_dowload_Pg am-icon-android"> Android</a>
      </div>
      </div>
  </div>
        </div>

        <div class="pet_article_footer_info">Copyright(c)2015 PetShow All Rights Reserved</div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/amazeui.min.js"></script>
    <script src="js/content.js"></script>
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
    $('.pet_article_like li:last-child').css('border','none');
        function auto_resize(){
        $('.pet_list_one_nr').height($('.pet_list_one_img').height());
                // alert($('.pet_list_one_nr').height());
    }
        $('.pet_article_user').on('click',function(){
            if($('.pet_article_user_info_tab').hasClass('pet_article_user_info_tab_show')){
                $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_show').addClass('pet_article_user_info_tab_cloes');
            }else{
                $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_cloes').addClass('pet_article_user_info_tab_show');
            }
        });

        $('.pet_head_gd_ico').on('click',function(){
            $('.pet_more_list').addClass('pet_more_list_show');
       });
        $('.pet_more_close').on('click',function(){
            $('.pet_more_list').removeClass('pet_more_list_show');
        });
});

</script>
</body>
  </html>