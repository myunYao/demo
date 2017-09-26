
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录界面</title>
     <link rel="stylesheet" href="./css/userlogin.css">
     <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
    <!-- BEGIN SAMPLE FORMPORTLET-->
      <div style="width:650px;margin:0 auto ">
            <h3 style="color:white">用户注册^_^</h3>
            <div style="">
            <!-- <div style="width:100px;height:100px;border:1px solid #ccc;border-radius:50%;">
            <img src=""></div> -->
            <ul style="margin:0 auto" id="upload_img_wrap"></ul>
                <!-- BEGIN FORM-->
                <form action="#"  id="addcateform" >
                    <div>
                        <div>
                            <label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">账号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="user_nick" name="user_nick" class="span6 " />
                            <span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
                        </div>
                    </div>
                    <div>                        
                        <div class="controls">
                            <label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">密码：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="password" id="user_passwd" name="user_passwd" class="span6 " />
                            <span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
                        </div>
                    </div>
                    <div>                        
                        <div>
                            <label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">确认密码：</label>
                            <input type="password" id="resure" name="resure" class="span6 " />
                            <span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
                        </div>
                    </div>
                    <div>                        
                        <div class="controls">
                            <label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">手机：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="user_tel" name="user_tel" class="span6 " />
                            <span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
                        </div>
                    </div>
                    <div>                      
                        <div class="controls">
                            <label class="control-label" style="font-size:19px;padding-top:40px;color:white;margin-left:85px;">邮箱：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="user_email" name="user_email" class="span6 " />
                            <span class="help-inline" style="font-size:16px;padding-top:40px;color:white;margin-left:40px;">必填</span>
                        </div>
                    </div>
                    <div style="padding-top:40px;">
                        <button type="button" class="btn btn-success" id="addcate"  style="margin-left:180px;">注册</button>
                        <button type="reset" class="btn" style="margin-left:10px;">重置</button>
                         <button type="button" class="btn"  id="j_upload_img_btn">上传头像</button>
                    </div>
                    <!-- 这里是编辑内容的地方 -->

                              
                            <div class="control-group">
                            
                                <label class="control-label"></label>
                                 
                                    <div class="controls">
                                   <!--  <button type="button" id="j_upload_img_btn">上传头像</button> -->
                                    <!-- <ul id="upload_img_wrap"></ul> -->
                                        <!-- 传图片地址值用的 -->
                                    <input type="hidden" id="user_picture" name="user_picture" value="">

                                    <span class="help-inline"></span>

                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                    <textarea id="uploadEditor" style="display: none;"></textarea>

                                   </div>
                            </div>
                </form>
            </div>
        <!-- END SAMPLE FORM PORTLET-->
</div>

<script src="js/jquery.min.js"></script>
    <script src="js/amazeui.min.js"></script>
    <script src="js/admin.js"></script>


     <!-- 编辑器使用的==配置文件 start-->
    <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->



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
            var user_picture = '';
            for(var i in result){
               /* imageHtml = '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';*/
               imageHtml = '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" style="width:100px;height:100px;border:1px solid #ccc;border-radius:50%;"></li>';
                user_picture = result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('user_picture').value = user_picture;
        }
    </script>

</body>
</html>