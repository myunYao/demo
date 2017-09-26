
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
    $sql = $db->getOneData('admin', '*', 'admin_name = "'.$_POST['admin_name'].'"');
    //检查账号是否存在
    if(!$sql){
        // echo '账号不存在'; 
        //PHP里面如何输出JSON格式的数据：json_encode(数组);
        $sql['res'] = 'no_exit_admin_name';
      echo json_encode($sql);
        exit;
    }

    //检查密码是否正确
    if(md5($_POST['admin_passwd'] )!= $sql['admin_passwd']){
        //PHP里面如何输出JSON格式的数据：json_encode(数组);
        $sql['res'] = 'invail_admin_passwd';
        echo json_encode($sql);
        exit;
    }



    //开始存储COOKIE信息:选中的时候存储，没有选中就要销毁
    if($_POST['admin'] == '1'){
        //把用户的账号及密码存储到COOKIE里面
        setcookie('admin_name',   $row['admin_name'],       time() + 720*3600);
        setcookie('admin_passwd',     $_POST['admin_passwd'],    time() + 720*3600);
    }else{
        //销毁COOKIE信息
        setcookie('admin_name',   '',    time() - 720*3600);
        setcookie('admin_passwd',     '',    time() - 720*3600);
    }

    //存储登录用户的信息到SESSION
    $_SESSION['admin_name']   = $sql['admin_name'];
    $_SESSION['admin_passwd']   = $sql['admin_passwd'];
    $_SESSION['admin_id']   = $sql['admin_id'];

    $sql['res'] = 'ok';
    echo json_encode($sql);

    
    