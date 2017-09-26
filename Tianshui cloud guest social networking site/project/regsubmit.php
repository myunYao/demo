<?php
    require './common/admin.common.php';

    $data                   = $_POST;
    //var_dump($data);

   /* $_data['user_picture']='1.jpg';
    $_data['user_name']= 'jack';
    $_data['user_birthday']= '2011/06/15';
    $_data['user_sex']= '女';*/
    $data['user_logintime'] = date('Y-m-d H:i:s');
    $data['user_loginnum']  = 2;
    $data['user_ip']        = '192.168.1.1';
    $data['user_id']        = 0;
    unset($data['resure']);

    $r = $db->addData('user', $data);
    
    
    if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }

