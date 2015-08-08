<?php 
	if($user::adminDetectedControl()){
		if($user::isAdmin($_SESSION['admin'],$_SESSION['uniqId'])){
			$id = $app::destroyHTML($_GET['id']);
			$db->update("UPDATE users SET ban = 0 WHERE id = ?",[$id]);
			$app->redirect("index.php?page=adminmembers&message=unbansuccess");
		}else{
			$app::redirect("index.php");
		}
	}
?>