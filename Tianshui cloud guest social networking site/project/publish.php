<?php 
    require './common/admin.common.php';
   // $new = $db->getOneData('news', '*', 'news_id=' . $_GET['user_id']);
    $picture  =$db->getOneData('user','*','user_id="'.$_GET['user_id'].'"'); 
    // $picture  =$db->getOneData('user','*','user_id="'.$_SESSION['user_id'].'"');
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
  <title>个人发布页面</title>

    <!-- 编辑器使用的==配置文件 start-->
    <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->
</head>
<body style="background:#ececec">
  <div class="pet_mian" >
    <div class="pet_head">
    <header data-am-widget="header" class="am-header am-header-default pet_head_block">
        <div class="am-header-left am-header-nav ">
          <a href="./personal_center.php?user_id=<?=$picture['user_id'];?>" class="iconfont pet_head_jt_ico">&#xe601;</a>
        </div>
		<div class="pet_news_list_tag_name">有点无聊不妨发布一条动态吧</div>
        <div class="am-header-right am-header-nav">
          <a href="javascript:;" class="iconfont pet_head_gd_ico">&#xe600;</a>
        </div>
	</header>
	</div>
    <div class="pet_content pet_content_list">
      <div class="pet_grzx">

          <div class="pet_grzx_nr">
              <div class="pet_grzx_ico">
                  <img style="height:200px;" src="<?=$picture['user_picture'];?>" alt="">
              </div>
              <div class="pet_grzx_name"><?=$picture['user_nick'];?></div>              
              <div class="pet_grzx_num_font">
				我坐在水屋下边的平台看着大海，吹着海风，真的是太喜欢了。夜晚有好多小白鲨鱼，好多种鱼。
              </div>
              <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addcontentform">
                            <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user_id'];?>">
								<!-- 发布内容的标题 -->
                                <div class="control-group">
                                    <label class="control-label">标题</label>
                                    <div class="controls">
                                        <input placeholder="请在这里输入标题" style="width: 100%;height: 30px" type="text" id="news_title" name="news_title"/>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>

                                <!-- 这里是编辑内容的地方 -->

                                <div class="control-group">
                                    <label class="control-label">详情</label>
                                    <div class="controls">
                                        <textarea id="news_content_text" name="news_content_text" class="span10 " />这里是默认信息</textarea>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                    <button type="button" id="j_upload_img_btn">上传图片</button>
                                    <ul id="upload_img_wrap"></ul>
                                        <!-- 传图片地址值用的 -->
                                    <input type="hidden" id="news_picture" name="news_picture" value="">

                                    <span class="help-inline"></span>

                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                    <textarea id="uploadEditor" style="display: none;"></textarea>

                                    </div>
                                </div>
                                <!-- 推荐到首页 -->
                                <div class="control-group">
                                    <label class="control-label">推荐</label>
                                    <div class="controls">
                                        <input type="checkbox" id="recommend" name="recommend" value="1" />
                                        推荐到首页
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addcontent">发布</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
          </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/amazeui.min.js"></script>
    <script src="js/publish.js"></script>


    <script type="text/javascript">
        var ue = UE.getEditor('news_content_text'); //news_content_text是需要加载编辑器的id
        var uploadEditor = UE.getEditor("uploadEditor", {
            isShow: false,
            focus: false,
            enableAutoSave: false,
            autoSyncData: false,
            autoFloatEnabled:false,
            wordCount: false,
            sourceEditor: null,
            scaleEnabled:true,
            toolbars: [["insertimage", "attachment"]]
        });
        uploadEditor.ready(function () {
            uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
        });

        // 自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
            var dialog = uploadEditor.getDialog("insertimage");
            dialog.title = '多图上传';
            dialog.render();
            dialog.open();
        };

        // 多图上传动作
        function _beforeInsertImage(t, result) {
            var imageHtml = '';
            var news_picture = '';
            for(var i in result){
                imageHtml = '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                news_picture = result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('news_picture').value = news_picture;
        }
    </script>

</script>
</body>
  </html>