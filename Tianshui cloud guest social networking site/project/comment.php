<?php 
	require './common/admin.common.php';

//评论
	$data=$_POST;
	$data['comment_id']=0;
	//$data['praise_num']=$_POST['praise_num'];
	$data['comment_time']=date('Y-m-d H:i:s');

	$data['comment_person_id']=$_SESSION['user_id'];

	 $r = $db->addData('comment', $data);

	  if($r){
        echo json_encode(array('result'=>'success'));
    }else{
        echo json_encode(array('result'=>'fail'));
    }

    
 ?>