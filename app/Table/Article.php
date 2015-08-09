<?php 

	namespace App\Table;
	
	use App\Database;

	class Article{

		public $id;
		public $title;
		public $content;
		public $dateOfWriting;
		public $category;

		public function __construct($id = null){
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

			if(isset($_COOKIE['lang'])){
				if($_COOKIE['lang'] == "fr"){
					$newDate = date("d/m/Y", strtotime($originalDate));
				}else if($_COOKIE['lang'] == "en"){
					$newDate = date("Y/m/d", strtotime($originalDate));
				}
			}

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

		public static function getAll($category = null){
			$db = new Database('blog');
			if($category){
				$query = $db->prepare("SELECT * FROM articles WHERE category = :category ORDER BY dateOfWriting DESC, id DESC",array("category"=>$category), "App\Table\Article");
			}else{
				$query = $db->query("SELECT * FROM articles ORDER BY dateOfWriting DESC, id DESC", "App\Table\Article");
			}
			return $query;
		}

		public static function getArticlesWritedIn($year){
			$db = new Database('blog');
			$query = $db->prepare("SELECT * FROM articles WHERE Year(dateOfWriting) = :year ORDER BY id ASC",array("year"=>$year), "App\Table\Article");
			return $query;
		}

		public static function getArticlesYears(){
			$db = new Database('blog');
			$query = $db->query("SELECT DISTINCT YEAR(dateOfWriting) AS date_year FROM articles ","App\Table\Article");
			return $query;
		}

		public static function postingSuccess($translator){
			return '<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon glyphicon-check" aria-hidden="true"></span> '.$translator["POSTING_SUCCESS"].'.</div>';
		}
	}
?>