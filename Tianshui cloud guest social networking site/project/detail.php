<?php 
	require './common/common.php';
	$data=$_POST;

	$row = $db->getOneData('news','praise_num','news_id=' . $_POST['news_id']);
	$praise_num = $row['praise_num'];

	//点赞之前检查是否有点赞记录
	
	$pr = $db->getOneData('praise','praise_id','praise_person_id='.$_SESSION['user_id'].' AND news_id=' . $_POST['news_id']);
	if($pr){
		echo json_encode(array('result'=>'haved'));
		exit;
	}

	//添加点赞记录
	$data['praise_person_id'] 	= $_SESSION['user_id'];
	$data['praise_time'] 		= date('Y-m-d H:i:s');
	$r = $db->addData('praise', $data);
	if($r){
		//如果成功更新信息的点赞次数
		$newsdata['praise_num'] = ++$praise_num;
	    $db->updateData('news', $newsdata, 'news_id = ' . $_POST['news_id']);
        echo json_encode(array('result'=>'success', 'praise_num'=>$praise_num));
    }else{
        echo json_encode(array('result'=>'fail'));
    }
 ?>