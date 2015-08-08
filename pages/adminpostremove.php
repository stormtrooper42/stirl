<?php 
	if($user::adminDetectedControl()){
		if($user::isAdmin($_SESSION['admin'],$_SESSION['uniqId'])){
			$id = $app::destroyHTML($_GET['id']);
			$db->delete("DELETE FROM articles WHERE id = ?",[$id]);
			$app->redirect("index.php?page=adminpost&message=success");
		}else{
			$app::redirect("index.php");
		}
	}
?>