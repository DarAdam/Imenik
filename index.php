<?php 

	/**
	* Controller
	*/
	class Controller {

		public $insertData = [];
		
		public function __construct() {
		
			include 'model.php';
			$imenik = new imenik;
			$imenik->readData();
			if (!empty($_POST['naziv']) && !isset($_POST['hidden'])) {
				$imenik->insertData($this->collectFormData('input'));
				header('Location: index.php');
			}
			if (!empty($_POST['naziv']) && isset($_POST['hidden'])) {
				$imenik->editData($this->collectFormData('edit'), $_POST['hidden']);
				header('Location: index.php');
			}
			include 'homepage.phtml';
		}

		public function collectFormData($action) {
			isset($_POST['naziv']) ? $this->insertData[0] =$_POST['naziv'] : "";
			isset($_POST['napomena']) ? $this->insertData[1] =$_POST['napomena'] : "";
			isset($_POST['telefon']) ? $this->insertData[2] =$_POST['telefon'] : "";
			isset($_POST['adresa']) ? $this->insertData[3] =$_POST['adresa'] : "";
			isset($_POST['email']) ? $this->insertData[4] =$_POST['email'] : "";
			isset($_POST['kontakt']) ? $this->insertData[5] =$_POST['kontakt']: "";
			if ($action == 'input') {
				$this->insertData[0] = "'" . $this->insertData[0] . "'";
				$this->insertData[1] = "'" . $this->insertData[1] . "'";
				$this->insertData[2] = "'" . $this->insertData[2] . "'";
				$this->insertData[3] = "'" . $this->insertData[3] . "'";
				$this->insertData[4] = "'" . $this->insertData[4] . "'";
				$this->insertData[5] = "'" . $this->insertData[5] . "'";
				return (implode(", ", $this->insertData));
			}
			return $this->insertData;
		}

	}


	$view = new Controller;




// ------- kreiranje tabele u bazi------------
/*CREATE TABLE `imenik`.`imenik` ( 
`RB` INT(4) NOT NULL AUTO_INCREMENT ,
 `Naziv` VARCHAR(50) NOT NULL ,
  `Napomena` VARCHAR(50) NOT NULL ,
   `Telefon` VARCHAR(15) NOT NULL ,
    `Adresa` VARCHAR(30) NOT NULL ,
     `mail` VARCHAR(30) NOT NULL ,
      `Kontakt osoba` VARCHAR(30) NOT NULL ,
       PRIMARY KEY (`RB`)) ENGINE = MyISAM;*/

       /*INSERT INTO `imenik` (`RB`, `Naziv`, `Napomena`, `Telefon`, `Adresa`, `mail`, `Kontakt osoba`) 
       VALUES (NULL, 'Albo', 'uniforme', '062/800-9856', 'Batajnički drum 249', 'dejan.sredojevic@albo.biz', 'Dejan Sredojević');*/

 ?>