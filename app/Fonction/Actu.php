<?php 

namespace App\Fonction;

class Actu{

	private $_bdd;
	private $_id;
	private $_name;
	private $_langage;
	private $_technique;
	private $_but;
	private $_fonction;
	private $_image;
	private $_registerDate;
	private $_registerBy;
	private $_key;

	/*connexion à la bdd*/
	public function __construct($bdd){

		$this->_bdd = $bdd;
	}

	/*insert utilisateur en bdd*/
	public function setActu($id,$name,$langage,$technique,$but,$fonction,$imgActu){

		if(!empty($name)&&!empty($langage)&&!empty($technique)&&!empty($but)&&!empty($fonction)&&!empty($imgActu)){
		$this->_name = htmlspecialchars(ucfirst($name));
		$this->_langage = htmlspecialchars(ucfirst($langage));
		$this->_technique = htmlspecialchars(ucfirst($technique));
		$this->_but = htmlspecialchars(ucfirst($but));
		$this->_fonction = htmlspecialchars(ucfirst($fonction));
		$this->_image = $imgActu;
		$this->_registerBy = $id;

		$insert = $this->_bdd->prepare('INSERT INTO actualite (name,langage,technique,but,fonction,image,registerBy,registerDate)
	 	VALUES (:name,:langage,:technique,:but,:fonction,:image,:registerBy,NOW())');
		$insert->execute(array('name'=>$this->_name,
							'langage'=>$this->_langage,
							'technique'=>$this->_technique,
							'but'=>$this->_but,
							'fonction'=>$this->_fonction,
							'image'=>$this->_image,
							'registerBy'=>$this->_registerBy));

			return 'Actualité enregistré avec succès <script type="text/javascript">window.location = "dashboard.php#section-2";</script>';
		}else{
			return ' 0 '.$id.' 1 '.$name.' 2 '.$langage.' 3 '.$technique.' 4 '.$but.' 5 '.$fonction.' 6 '.$imgActu;
		}
				
	}

	

	public function getLastActu($key){
		$this->_key = $key;

		$select = $this->_bdd -> prepare('SELECT * FROM actualite ORDER BY id DESC LIMIT 1');
		$select->execute(array());

		foreach ($select as  $value) {

					
				if(!empty($value[$key])){
					return $value[$this->_key];
				}else{
					return 'non-enregistré';
				}
			}
		}
	

	/*public function getDate($id){

		$this->_id = $id;

		$select=$this->_bdd->prepare('SELECT DATE_FORMAT(registerDate,"%d/%m/%Y") as registerDate FROM user WHERE id=:id');
		$select->execute(array('id'=>$this->_id));
		$result = $select->fetch();

		return $result['registerDate'];
	}

	public function getAge($id){

		$this->_id = $id;

		$select=$this->_bdd->prepare('SELECT age FROM user WHERE id=:id');
		$select->execute(array('id'=>$this->_id));
		$result = $select->fetch();

		return $result['age'];
	}*/
}


 ?>