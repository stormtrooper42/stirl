<?php
// hi
	namespace App;
	use \PDO;

	class Database{

		private $db_name;
		private $db_user;
		private $db_pass;
		private $db_host;
		private $pdo;

		public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost'){

			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			$this->db_host = $db_host;

		}

		private function getPDO(){
			
			if($this->pdo === null){
				$pdo = new PDO ('mysql:dbname='.$this->db_name.';host='.$this->db_host, $this->db_user, $this->db_pass);
				$pdo->exec("SET CHARACTER SET utf8");
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->pdo = $pdo;
			}

			return $this->pdo;

		}

		public function query($statement, $class_name){

			$req = $this->getPDO()->query($statement);
			$datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
			return $datas;

		}

		public function prepare($statement, $attributes, $class_name, $one = false){

			$req = $this->getPDO()->prepare($statement);
			$req->execute($attributes);
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);

			if($one){

				$datas = $req->fetch();

			}else
			{
				$datas = $req->fetchAll();
			}

			return $datas;

		}

		public function update($statement, $attributes){

			$req = $this->getPDO()->prepare($statement);
			$req->execute($attributes);

		}

		public function delete($statement, $attributes){

			$req = $this->getPDO()->prepare($statement);
			$req->execute($attributes);
			
		}

		public function insert($statement, $attributes){

			$req = $this->getPDO()->prepare($statement);
			$req->execute($attributes);
			
		}

	}

?>
