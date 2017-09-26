<?php
    require './common/common.php';
    // $user_id = $db->getOneData('user','user_id','user_id='.$_SESSION['user_id']);
    //查找所有在user表中的字段
    //$userData = $db->getDatas('user','*');

    $data                   = $_POST;
    // var_dump($data);
    // exit;
    // $data['admin_id']       = $_SESSION['admin_id'];
    
    // $data['admin_name']       = $_SESSION['admin_name'];
    //$data['user_id']              = $userData['user_id'];
    // $data['user_picture']         = $_GET['user_picture'];
    // $data['user_nick']            = $_GET['user_nick'];
    //在修改信息的时候，会收到$_POST['cate_id']
    //推荐
    $data['recom']          = (int)$data['recommend'];
    unset($data['recommend']);

    $data['user_id']=$_SESSION['user_id'];
    $data['cate_id']=1;
    $data['news_video']="1";
    $data['news_create_date']      = date('Y-m-d H:i:s');
 
    $r = $db->addData('news',$data);
    
    
    if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }