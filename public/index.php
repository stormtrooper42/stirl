<?php 
	require_once("../config/params.php");
	
	session_start();
	require '../app/Autoloader.php';
	App\Autoloader::register();

	// Instanciation des classes utiles en singleton
	$app = App\App::getInstance();
	$config = App\Config::getInstance();
	$debug = App\Debug::getInstance();
	$form = App\Components\Form::getInstance();
	$user = App\Table\User::getInstance();
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