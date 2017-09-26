<?php 
	require './common/admin.common.php';

//评论
	$data=$_POST;
	$data['share_id']=0;
	//$data['praise_num']=$_POST['praise_num'];
	$data['share_time']=date('Y-m-d H:i:s');
	$data['share_person_id']=$_SESSION['user_id'];
	 $r = $db->addData('share', $data);

	  if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }

    
 ?>