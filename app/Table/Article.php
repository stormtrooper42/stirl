<?php 

	namespace App\Table;
	
	use App\Database;

	class Article{

		public $id;
		public $title;
		public $content;
		public $dateOfWriting;
		public $category;

		public function __construct($id =null){
			if($id != null){
				$db = new Database('blog');
				$article = $db->prepare("SELECT * FROM articles WHERE id = ?",[$id],"App\Table\Article", true);
				$this->id = $article->id;
				$this->title = $article->title;
				$this->content = $article->content;
				$this->category = $article->category;
				$this->dateOfWriting = $article->dateOfWriting;
			}
		}

		public function getURL(){
			return 'index.php?page=post&id='. $this->id;
		}

		public function getExtrait(){

			$lg_max = 200;
			
			if($this->content != null){
				$this->content = str_replace("&lt;br /&gt;", "", $this->content);
            	$this->content = nl2br($this->content);
			}

			if (strlen($this->content) > $lg_max) 
			{
			    $this->content = substr($this->content, 0, $lg_max);
			    $last_space = strrpos($this->content, " "); 
			    $this->content = substr($this->content, 0, $last_space)."...";
			}

			return $this->content;
		}

		public function getDate(){
			$originalDate = $this->dateOfWriting;
			$newDate = date("d/m/Y", strtotime($originalDate));
			return $newDate;
		}

		public function getContent(){
			if($this->content != null){
				$this->content = str_replace("&lt;br /&gt;", "", $this->content);
            	$this->content = nl2br($this->content);
            	return $this->content;
			}else{
				return "null var";
			}
		}

		public static function postingSuccess(){
			return '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon glyphicon-check" aria-hidden="true"></span> Votre article a bien été envoyé.</div>';
		}

		public static function removingSuccess(){
			return '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon glyphicon-check" aria-hidden="true"></span> L\'élément a bien été effacé.</div>';
		}


	}

?>