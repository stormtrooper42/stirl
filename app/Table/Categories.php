<?php 

	namespace App\Table;
	
	use App\Database;

	class Categories{

		public $id;
		public $name;

		public function __construct($name = null){
			if($name != null){
				$this->name = ucfirst($name);
			}
		}

		public function getName(){
			return $this->name;
		}

		public function getURL(){
			return "index.php?page=welcome&category=".$this->name;
		}

		public function registerCategoryIfDoesntExist(){
			$db = new Database('blog');
			$category = $db->prepare("SELECT * FROM categories WHERE name = ?",[$this->name],"App\Table\Categories", true);
			if($category == null){
				$category = ucfirst($category);
				$db->insert("
					INSERT INTO categories(name)
					VALUES(:name)
				",array(
					"name"=>$this->name
				));
			}
		}
	}

?>