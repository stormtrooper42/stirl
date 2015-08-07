<?php 
	if(isset($_SESSION['admin'])){
		if($user::isAdmin($_SESSION['admin'],$_SESSION['uniqId'])){
			$id = $app::destroyHTML($_GET['id']);
			$db->delete("DELETE FROM categories WHERE id = ?",[$id]);
			$app->redirect("index.php?page=admincategories&message=success");
		}else{
			$app::redirect("index.php");
		}
	}else{
		$app::redirect("index.php");
	}
?>