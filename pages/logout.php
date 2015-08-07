<?php 
	$app::sessionDestroy();
	$app::redirect("index.php?page=welcome");
?>