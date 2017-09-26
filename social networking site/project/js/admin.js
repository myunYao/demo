$(document).ready(function(){
	//添加栏目信息
    $('#addcate').click(function() {
            alert(1);
            if(!$('#user_nick').val()){
                $('#user_nick').next('span').html('昵称必填！');
                return;
            }else{
                 $('#user_nick').next('span').html('');
            }
            if(!$("#user_passwd").val()){
                $('#user_passwd').next('span').html('密码必填！');
                return;
            }else{
                 $('#user_passwd').next('span').html('');
            }

            if(!$("#resure").val()){
                $('#resure').next('span').html('确认密码必填！');
                return;

            }else if($("#resure").val() != $("#user_passwd").val()){
                $('#resure').next('span').html('两次输入的不是同一个密码！');
                return;
            }else{
                 $('#resure').next('span').html('');
            }

             var tel = $('#user_tel').val();
                    var telp = /^1[35678]\d{9}$/;
                    var mr = telp.test(tel);
                   if(!$("#user_tel").val()){
                    $('#user_tel').next('span').html('电话号码必填！');
                    }else if (mr) {
                        $('#user_tel').next('span').html('格式正确');
                    } else if(!mr) {
                        $('#user_tel').next('span').html('格式错误');
                        return;
                    }else{
                        $('#user_tel').next('span').html('');
                    }     

             var email = $('#user_email').val();
                var emailp = /^[a-zA-Z0-9]{1}[a-zA-Z0-9_\-]{2,31}@[a-z0-9]{1,}\.(com|com\.cn|gov|org|net|edu)$/;
                var emr = emailp.test(email);
                if(!$("#user_email").val()){
                    $('#user_email').next('span').html('邮箱必填!');
                }else if (emr) {
                    $('#user_email').next('span').html('格式正确');
                } else if(!emr) {
                    $('#user_email').next('span').html('格式错误');
                    return;
                }else{
                    $('#user_email').next('span').html('');
                }       

        console.log($('#addcateform').serialize());
        //提交数据
        $.ajax({
            url: './regsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: $('#addcateform').serialize(), //对整个表单的数据进行序列化
            success:function (data) {
                /* body... */
                if(data.result == 'success'){
                    alert('注册成功！');
                    window.location.href = './index.php';
                }else{
                    alert('注册失败！');
                }
            }
        });
    });

     //刪除用户
    //只刪除一级分类:不能用id选择器，因为id选择器只能有一个，不能多个节点对象同时使用
    $(".delcateuser").click(function(){
        //当点击删除按钮时，删除当前按钮所对应的分类
        //获取到数据
        if(!confirm("点击确定按钮将删除这条信息！")){
            return;
        }

        //获取到当前分类的id
        var $user_id = $(this).attr('user_id');
        //发送ajax请求
        $.ajax({
            url:'./deleteuser.php',
            type:'POST',
            dataType:'json',
            data:{user_id:$user_id},
            success:function(data){
                console.log(data);
                if(data.result == 'ok'){
                    alert('删除成功！');
                    //删除成功后重新加载整个页面
                    window.location.reload();
                }else{
                    alert('删除失败！');
                }
            }
        });
    });
    //删除日志
    $(".delcatenews").click(function(){
        //当点击删除按钮时，删除当前按钮所对应的分类
        //获取到数据
        if(!confirm("点击确定按钮将删除这条信息！")){
            return;
        }

        //获取到当前分类的id
        var $news_id = $(this).attr('news_id');
        //发送ajax请求
        $.ajax({
            url:'./deletenews.php',
            type:'POST',
            dataType:'json',
            data:{news_id:$news_id},
            success:function(data){
                console.log(data);
                if(data.result == 'ok'){
                    alert('删除成功！');
                    //删除成功后重新加载整个页面
                    window.location.reload();
                }else{
                    alert('删除失败！');
                }
            }
        });
    });
    //删除评论
    $(".delcatecomment").click(function(){
        //当点击删除按钮时，删除当前按钮所对应的分类
        //获取到数据
        if(!confirm("点击确定按钮将删除这条信息！")){
            return;
        }

        //获取到当前分类的id
        var $comment_id = $(this).attr('comment_id');
        //发送ajax请求
        $.ajax({
            url:'./deletecomment.php',
            type:'POST',
            dataType:'json',
            data:{comment_id:$comment_id},
            success:function(data){
                console.log(data);
                if(data.result == 'ok'){
                    alert('删除成功！');
                    //删除成功后重新加载整个页面
                    window.location.reload();
                }else{
                    alert('删除失败！');
                }
            }
        });
    });   
});