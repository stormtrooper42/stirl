<?php 
	if(isset($_SESSION['admin'])){
		if($user::isAdmin($_SESSION['admin'],$_SESSION['uniqId'])){
			$id = $app::destroyHTML($_GET['id']);
			$db->update("UPDATE users SET ban = 1 WHERE id = ?",[$id]);
			$app->redirect("index.php?page=adminmembers&message=bansuccess");
		}else{
			$app::redirect("index.php");
		}
	}else{
		$app::redirect("index.php");
	}
?>