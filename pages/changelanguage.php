<?php
	if(isset($_GET['lang'])){

		$lang = $app::destroyHTML($_GET['lang']);

		if($lang == "fr"){
			$app::cookieDestroy("lang");
			$app::cookieCreate("lang","fr","+30 days");
			$app::redirect($_SERVER["HTTP_REFERER"] );
		}else if($lang == "en"){
			$app::cookieDestroy("lang");
			$app::cookieCreate("lang","en","+30 days");
			$app::redirect($_SERVER["HTTP_REFERER"] );
		}

	}else{
		$app::redirect("index.php");
	}
?>