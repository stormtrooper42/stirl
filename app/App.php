<?php 
	namespace App;

	class App{
		
		public $title = "Jasonvnm";
		public $caption = "Développeur PHP";

		private static $_instance;

		public static function getInstance()
		{
			if(is_null(self::$_instance)){
				self::$_instance = new App();
			}

			return self::$_instance;
		}

		public static function sessionCreate($sessionName,$value)
		{
			$_SESSION[$sessionName] = $value;
			return true;
		}

		public static function sessionDestroy($sessionName = null){
			if(isset($sessionName)){
				unset($sessionName);
			}
			session_destroy();
			session_commit();
		}

		public static function redirect($url)
		{
		    if (!headers_sent())
		    {    
		        header('Location: '.$url);
		        exit;
		        }
		    else
		        {  
		        echo '<script type="text/javascript">';
		        echo 'window.location.href="'.$url.'";';
		        echo '</script>';
		        echo '<noscript>';
		        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		        echo '</noscript>'; exit;
		    }
		}

		public static function DestroyHTML($str)
		{
			$str = htmlspecialchars(stripslashes(nl2br(trim($str))));
			return $str;
		}

		public static function SHA256($str, $salt, $iterations)
		{	
			$key = hash_pbkdf2("sha256", $str, $salt, $iterations, 34);
			return $key;
		}

		public static function salt(){
			$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			return $salt;
		}
		
		public static function getIP()
		{
			$ip_client = getenv('HTTP_CLIENT_IP');
			$ip_forw = getenv('HTTP_X_FORWARDED_FOR');
			$ip_remote = getenv('REMOTE_ADDR');
			if(filter_var($ip_client, FILTER_VALIDATE_IP)) {
				$ip = $ip_client;
			} elseif (filter_var($ip_forw, FILTER_VALIDATE_IP)) {
				$ip = $ip_forw;
			} else {
				$ip = $ip_remote;
			}
			
			return $ip;
		}

		public static function removingSuccess(){
			return '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon glyphicon-check" aria-hidden="true"></span> L\'élément a bien été effacé.</div>';
		}

	}
?>