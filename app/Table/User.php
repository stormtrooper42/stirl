<?php 

	namespace App\Table;
	use App\Database;
	use App\App;

	class User{

		private static $_instance;
		private $id;
		private $username;
		private $db;
		private $app;

		public static function getInstance()
		{
			if(is_null(self::$_instance)){
				self::$_instance = new User();
			}

			return self::$_instance;
		}

		public function __construct($id = null,$username = null){
			$this->id = $id;
			$this->username = $username;
		}

		public static function adminlogin($username,$password){
			$db = new Database('blog');
			$app = new App();
			$username = $app::destroyHTML($_POST['username']);
        	$password = $app::destroyHTML($_POST['password']);

			$loginAttemp = $db->prepare("SELECT * FROM users WHERE username = ?",[$username],"App\Table\User", true);
			if($loginAttemp){
				if (password_verify($password, $loginAttemp->password)) {
					if($loginAttemp->admin == 1){
						$app::sessionCreate("admin",$username);
					
						$uniqId = uniqid();
						$app::sessionCreate("uniqId",$uniqId);
						$db->update("UPDATE users SET uniqID = :uniqId WHERE username = :username",array(
							"uniqId"=>$uniqId,
							"username"=>$username
						));

						$app::redirect("index.php?page=admin");
					}else{
						$app::redirect("index.php?page=adminlogin&err=notallowed");
					}
				    
				} else {
					echo self::errorPw();
				}		
			}else{
				echo self::errorPw();
			}
		}

		public static function register($username,$email,$password){
			$db = new Database('blog');
			$app = new App();
			$username = $app::destroyHTML($_POST['username']);
			$email = $app::destroyHTML($_POST['email']);
        	$password = password_hash($app::destroyHTML($_POST['password']), PASSWORD_DEFAULT);

        	$db->insert("INSERT INTO users(username,password,email) VALUES(:username,:password,:email)",array(
        		"username"=>$username,
        		"password"=>$password,
        		"email"=>$email
        	));

        	$app::redirect("index.php?page=welcome&register=success");
		}

		public static function IfHeIsAdminLogHim($username,$uniqId){
			$db = new Database('blog');
			$app = new App();
			$username = $app::destroyHTML($username);
        	$uniqId = $app::destroyHTML($uniqId);

			$isAdmin = $db->prepare("SELECT * FROM users WHERE username = :username AND uniqid = :uniqid",array("username"=>$username,"uniqid"=>$uniqId),"App\Table\User", true);
			if($isAdmin){
				$app::redirect("index.php?page=admin");
			}
		}

		public static function IsAdmin($username,$uniqId){
			$db = new Database('blog');
			$app = new App();
			$username = $app::destroyHTML($username);
        	$uniqId = $app::destroyHTML($uniqId);

			$isAdmin = $db->prepare("SELECT * FROM users WHERE username = :username AND uniqid = :uniqid",array("username"=>$username,"uniqid"=>$uniqId),"App\Table\User", true);
			if($isAdmin){
				return true;
			}
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

		public static function errorInfos(){
			return '<div style="margin-top:-50px" class="alert alert-danger">Veuillez entrer des identifiants corrects ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

		public static function errorPw(){
			return '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Vos identifiants sont incorrects</div>';
		}

		public static function errorNotAllowed(){
			return '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Vous n\'avez pas le droit d\'accéder à cette page.</div>';
		}

		public static function successRegister(){
			return '<div style="margin-top:-50px" class="alert alert-success">Vous êtes désormais inscrit ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}


	}

?>