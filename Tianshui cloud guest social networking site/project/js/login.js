//绑定一个点击事件
// 事件三要素：事件源、事件、干什么
//每次修改代码完成以后，再测试之前，必须CTRL+F5强制刷新
$(document).ready(function() {


    //管理员登录js代码
    //刷新验证码事件
    $('#coderimg').click(function(event) {
         //Act on the event 
        this.src = './coder.php?v=' + Math.random();
    });
    //实现登录事件
    $('#login_btn').click(function () {
        console.log(1); 
        /* body... */
        //账号必填
        var $admin_name = $("#admin_name").val();
        var $admin_passwd = $("#admin_passwd").val();
        var $coder= $("#coder").val();
         var $remember   = $('input[name="remember"]:checked').val();
         //console.log($admin_name);
       // var $admin   = $('input[name="admin"]:checked').val();
        //如果账号为空，提示他必填
        if(!$admin_name){
           $('#admin_name').next('span').html('账号必填！');
            return ;
        } 
        if(!$admin_passwd){
           $('#admin_passwd').next('span').html('密码必填！');
            return ;
        } 
       if(!$coder){
            alert('验证码必填');
            return;
        }

        //进入数据处理阶段：AJAX
        $.ajax({
            url: 'adminloginsubmit.php', //请求的地址，相当于是form表单里面的action
            type: 'POST',//数据提交方式，相当于是form表单里面的method
            dataType: 'json', //接收的数据类型，不能被其他任何类型的数据污染//remember:$remember,
            data: {admin_name:$admin_name,admin_passwd:$admin_passwd, remember:$remember, coder:$coder}, //提交的数据，相当于是表单里面的input,键名相当于是input标签的name属性里面的值
            success:function (data) {
                /* body... */
                console.log(data.res);
                //无效的账号
                if(data.res == 'invail_coder'){
                    alert('验证码不对，请重新输入');
                    $('#coder').focus();
                }else if(data.res == 'no_exit_admin_name'){
                    $('#admin_name').next('span').html('请输入正确账号！');
                }else if(data.res == 'invail_admin_passwd'){
                    $('#admin_passwd').next('span').html('请输入正确的密码！');
                }else if(data.res == 'ok'){
                    alert('登录成功');
                    window.location.href='userlist.php';
                }else{
                    alert('操作失败');
                
                }
            }
        });

    });

    //用户登录js代码
   //刷新验证码事件
    $('#coderimg').click(function(event) {
         //Act on the event 
        this.src = './coder.php?v=' + Math.random();
    });
    //实现登录事件
    $('#userlogin_btn').click(function () {
        console.log(1); 
        /* body... */
        //账号必填
        var $user_nick = $("#user_name").val();
        var $user_passwd = $("#user_passwd").val();
        var $coder= $("#coder").val();
          var $remember   = $('input[name="remember"]:checked').val();
         //console.log($admin_name);
       // var $admin   = $('input[name="admin"]:checked').val();
        //如果账号为空，提示他必填
        if(!$user_nick){
           $('#user_name').next('span').html('账号必填！');
            return ;
        } 
        if(!$user_passwd){
           $('#user_passwd').next('span').html('密码必填！');
            return ;
        } 
       if(!$coder){
            alert('验证码必填');
            return;
        }

        //进入数据处理阶段：AJAX
        $.ajax({
            url: 'userloginsubmit.php', //请求的地址，相当于是form表单里面的action
            type: 'POST',//数据提交方式，相当于是form表单里面的method
            dataType: 'json', //接收的数据类型，不能被其他任何类型的数据污染//remember:$remember,
            data: {user_nick:$user_nick,user_passwd:$user_passwd, remember:$remember, coder:$coder}, //提交的数据，相当于是表单里面的input,键名相当于是input标签的name属性里面的值
            success:function (data) {
                /* body... */
                console.log(data.res);
                //无效的账号
                if(data.res == 'invail_coder'){
                    alert('验证码不对，请重新输入');
                    $('#coder').focus();
                }else if(data.res == 'no_exit_user_nick'){
                    $('#user_name').next('span').html('请输入正确账号！');
                }else if(data.res == 'invail_user_passwd'){
                    $('#user_passwd').next('span').html('请输入正确的密码！');
                }else if(data.res == 'ok'){
                    alert('登录成功');
                    window.location.href = './index.php';
                
                }else{
                    alert('操作失败');
                
                }
            }
        });

    });
});