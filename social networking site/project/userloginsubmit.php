
    <?php
    require './common/common.php';
    //验证验证码是否有效
    if($_POST['coder']!=$_SESSION['code']){
        $sql['res'] = 'invail_coder';
        echo json_encode($sql);
        exit;
    }
    /*
    $sql    = 'SELECT * FROM admin WHERE realname = "'.$_POST['realname'].'"';
    $result = $dblink->query($sql);
    $row    = $result->fetch_array(MYSQLI_ASSOC);
    */
    //
    $sql = $db->getOneData('user', '*', 'user_nick = "'.$_POST['user_nick'].'"');
    //检查账号是否存在
    if(!$sql){
        // echo '账号不存在'; 
        //PHP里面如何输出JSON格式的数据：json_encode(数组);
        $sql['res'] = 'no_exit_user_nick';
      echo json_encode($sql);
        exit;
    }

    //检查密码是否正确
    if(md5($_POST['user_passwd']) != $sql['user_passwd']){
        //PHP里面如何输出JSON格式的数据：json_encode(数组);
        $sql['res'] = 'invail_user_passwd';
        echo json_encode($sql);
        exit;
    }



    //开始存储COOKIE信息:选中的时候存储，没有选中就要销毁
    if($_POST['user'] == '1'){
        //把用户的账号及密码存储到COOKIE里面
        setcookie('user_nick',   $row['user_name'],       time() + 720*3600);
        setcookie('user_passwd',     $_POST['user_passwd'],    time() + 720*3600);
        // setcookie('user_id',     $_POST['user_id'],    time() + 720*3600);
    }else{
        //销毁COOKIE信息user
        setcookie('user_nick',   '',    time() - 720*3600);
        setcookie('user_passwd',     '',    time() - 720*3600);
        // setcookie('user_id',     '',    time() - 720*3600);
    }

    //存储登录用户的信息到SESSION
    $_SESSION['user_nick']   = $sql['user_nick'];
    $_SESSION['user_passwd']   = $sql['user_passwd'];
    $_SESSION['user_id']   = $sql['user_id'];

    $sql['res'] = 'ok';
    echo json_encode($sql);

    
    