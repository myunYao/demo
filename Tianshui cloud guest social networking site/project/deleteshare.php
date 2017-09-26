<?php 
	require './common/admin.common.php';
	//删除当前分类:当前分类底部再无分类，直接删除当前分类即可
	$resultNc = $db->delData('news','news_id='.$_POST['news_id']);
	$resultYc = $db->delData('share','news_id='.$_POST['news_id']);

	if($resultNc && $resultYc){
		echo json_encode(array('result' => 'ok'));
	}else{
		echo json_encode(array('result' => 'fail'));
	}
