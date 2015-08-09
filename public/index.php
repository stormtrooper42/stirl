<?php 
	require_once("../config/params.php");
	
	session_start();

	require '../app/Autoloader.php';
	App\Autoloader::register();

	if(isset($_COOKIE['lang'])){
		
		$lang = htmlspecialchars($_COOKIE['lang']);

		if($lang == "fr"){
			require_once("lang/fr.php");
		}else if($lang == "en"){
			require_once("lang/en.php");
		}

	}else{
		require_once("lang/fr.php");
	}

	// Instanciation des classes utiles en singleton
	
	$app = App\App::getInstance($translator);
	$config = App\Config::getInstance();
	$debug = App\Debug::getInstance();
	$form = App\Components\Form::getInstance();
	$user = App\Table\User::getInstance($translator);
	
	//

	$db = new App\Database('blog');

	// On inclut la page
	if(isset($_GET['page'])){

		$page = $app::DestroyHTML($_GET['page']);

		if(file_exists("../pages/".$page.".php")){
			require_once("../pages/".$page.".php");
		}else
		{
			require_once("../pages/404.php");
		}

	}else
	{
		if(file_exists("../pages/welcome.php")){
			require_once("../pages/welcome.php");
		}else
		{
			require_once("../pages/404.php");
		}
	}

?>