<?php 
	
	namespace App\Components;

	class Form{
		
		private static $_instance;
		private $data;
		public $surround = 'p';


		public function __construct($data = array()){
			$this->data = $data;
		}

		public static function getInstance()
		{
			if(is_null(self::$_instance)){
				self::$_instance = new Form();
			}

			return self::$_instance;
		}

		private function surround($html){
			return "<{$this->surround}>{$html}</{$this->surround}>";
		}

		private function getValue($index){
			return isset($this->data[$index]) ? $this->data[$index] : null;
		}

		public function input($name,$showedName,$type){
			return '<div class="row control-group"><div class="form-group col-xs-12 floating-label-form-group controls"><label>'.ucfirst($showedName).'</label><input type="'.$type.'" class="form-control" placeholder="'.ucfirst($showedName).'" id="'.$name.'" name="'.$name.'"  data-validation--message="Entrez votre '.$showedName.'"><p class="help-block text-danger"></p></div></div>';
		}

		public function textarea($name,$showedName,$rows,$cols){
			return '<div class="row control-group"><div class="form-group col-xs-12 floating-label-form-group controls"><label>'.ucfirst($showedName).'</label><textarea rows="'.$rows.'" cols="'.$cols.'" class="form-control" placeholder="'.ucfirst($showedName).'" id="'.$name.'" name="'.$name.'"  data-validation--message="Entrez votre '.$showedName.'"></textarea><p class="help-block text-danger"></p></div></div>';
		}

		public function submit($name,$text){
			return $this->surround('<input name="'.$name.'" onclick="submitform()" class="btn btn-default btn-lg btn-block" value="'.$text.'" type="submit" />');
		}

	}

?>
