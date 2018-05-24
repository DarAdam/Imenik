<?php 

	/**
	* Model
	*/
	class DB {

		private $conn;
		private $instance;

		private function getInstaces() {
			if(!isset($this->conn)){
				$this->instance = new DB();
			}
			return $this->conn;
		}

		public function __construct() {
		
			$this->conn = mysqli_connect('localhost', 'root', '', 'imenik');
		}

		protected function executeSql($sql) {
			$db = $this->getInstaces();
			$req = $db->query($sql);
			return $req;
		}
	}

	class imenik extends DB {

		public $data = [];

		public function insertData($insertData) {
			$sql = "INSERT INTO imenik  
					VALUES (null, " . $insertData . ")";	
			$this->executeSql($sql);							
		}

		public function readData() {
			$sql = "select * from imenik order by Naziv";
			$req=($this->executeSql($sql));
			while ($row = $req->fetch_object()) {
				array_push($this->data, $row);			
			}
			return $this->data;
		}

		public function editData($editData, $naziv) {
			var_dump($editData);
			var_dump($naziv);
			var_dump($editData[1]);
			$sql = "UPDATE imenik
					SET Naziv = '" . $editData[0] . "',
						Napomena = '" . $editData[1] . "',
						Telefon = '" . $editData[2] . "',
						Adresa = '" . $editData[3] . "',
						mail = '" . $editData[4] . "',
						Kontakt_osoba = '" . $editData[5] . "'
					WHERE Naziv = '" . $naziv . "'";
			var_dump($sql);		
			$this->executeSql($sql);
		}

	}
 ?>