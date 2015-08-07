<?php 

	namespace App;

	class Autoloader{

		static function register(){
			spl_autoload_register(array(__CLASS__,'autoload'));
		}

		static function autoload($class_name){
			if(strpos($class_name, __NAMESPACE__ . '\\') === 0){
				$class = str_replace(__NAMESPACE__ . '\\', '',$class_name);
				$class = str_replace('\\', '/', $class);
				if(file_exists(__DIR__ . '/' . $class . '.php')){
					require __DIR__ . '/' . $class . '.php';
				}else if(file_exists(__DIR__ . '/Table/' . $class . '.php')){
					require __DIR__ . '/Table/' . $class . '.php';
				}else if(file_exists(__DIR__ . '/Components/' . $class . '.php')){
					require __DIR__ . '/Components/' . $class . '.php';
				}
				
				
			}
		}

	}

?>