<?php 

namespace App\User;

class User{

	private $_bdd;
	private $_id;
	private $_email;
	private $_name;
	private $_firstname;
	private $_longname;
	private $_lastAction;
	private $_password;
	private $_repass;
	private $_role;
	private $_ip;
	private $_registerBy;
	private $_registerDate;
	private $_age;
	private $_location;
	private $_etude;
	private $_travail;
	private $_key;

	/*connexion à la bdd*/
	public function __construct($bdd){

		$this->_bdd = $bdd;
	}

	/*insert utilisateur en bdd*/
	public function setUser($email,$name,$firstname,$password,$repass,$role){

		$this->_email = htmlspecialchars($email);
		$this->_name = htmlspecialchars(ucfirst($name));
		$this->_firstname = htmlspecialchars(ucfirst($firstname));
		$this->_longname = $this->_firstname.' '.$this->_name;
		$this->_lastAction = time();
		$this->_password = htmlspecialchars(sha1($password));
		$this->_repass = htmlspecialchars(sha1($repass));
		$this->_role = $role;
		$this->_ip = $_SERVER['REMOTE_ADDR'];
		$this->_identifiant = sha1($this->_ip);
		$this->_registerBy = $_SESSION['id'];


		if(filter_var($this->_email, FILTER_VALIDATE_EMAIL)){
			$select=$this->_bdd->prepare('SELECT email FROM user WHERE email=:email');
			$select->execute(array('email'=>$this->_email));
			$result=$select->fetch();
			$emailBdd = $result['email'];

			if($this->_email == $emailBdd){
				return 'Cet email est déjà utilisé.';
				}else{
					if($this->_password == $this->_repass){
					$insert = $this->_bdd->prepare('INSERT INTO user (email,name,firstname,longname,lastAction,role,ip,identifiant,password,registerBy,registerDate)
				 	VALUES (:email,:name,:firstname,:longname,:lastAction,:role,:ip,:identifiant,:password,:registerBy,NOW())');
					$insert->execute(array('email'=>$this->_email,
										'name'=>$this->_name,
										'firstname'=>$this->_firstname,
										'longname'=>$this->_longname,
										'lastAction'=>$this->_lastAction,
										'role'=>$this->_role,
										'ip'=>$this->_ip,
										'identifiant'=>$this->_identifiant,
										'password'=>$this->_password,
										'registerBy'=>$this->_registerBy));

						return 'Utilisateur enregistré avec succès';
					}else{
						return 'Les mots de passe ne sont pas identiques';
					}
				}
			
			
			
		}else{
			return "Ceci n'est pas une adresse email valide<br />";	
		}
	}

	public function setInfoUser($id,$age,$ville,$etude,$travail){

		if(!empty($id)&&!empty($age)&&!empty($ville)&&!empty($etude)&&!empty($travail)){

			$this->_id = $id;
			$this->_age = htmlspecialchars(strtr($age,'/','-'));
			$this->_location = htmlspecialchars(ucfirst($ville));
			$this->_etude = htmlspecialchars(ucfirst($etude));
			$this->_travail = htmlspecialchars(ucfirst($travail));
			
			if(preg_match('#^([0-9]{2})([/-])([0-9]{2})\2([0-9]{4})$#', $_POST['age'], $m) == 1 && checkdate($m[3], $m[1], $m[4])){
			
				$update = $this->_bdd->prepare('UPDATE user SET age=:age,location=:location,etude=:etude,travail=:travail WHERE id=:id');
				$update->execute(array('age'=>$this->_age,
										'location'=>$this->_location,
										'etude'=>$this->_etude,
										'travail'=>$this->_travail,
										'id'=>$this->_id));
				return 'Modification effectuer avec succès';
			}else{
				echo  'Vous devez entrer une date valide de type jj/mm/aaaa';
			}
			
		}else{
			return 'Veuillez remplir tous les champs';
		}
		

	}

	public function setAvatar($id,$avatar){

		$this->_id = $id;
		$this->_avatar = $avatar;

		$update = $this->_bdd->prepare('UPDATE user SET avatar=:avatar WHERE id=:id');
		$update->execute(array('avatar'=>$this->_avatar,
								'id'=>$this->_id));


		return '<img src="../images/user/'.$avatar.'" id="avatarImg" "/>';
	}

	public function connectUser($email,$password){

		$this->_email = $email;
		$this->_password = sha1($password);

		$select=$this->_bdd->prepare('SELECT id FROM user WHERE email=:email AND password=:password');
		$select->execute(array('email'=>$this->_email,
								'password'=>$this->_password));
		$result = $select->fetch();

		$this->_id =  $result['id'];

		if(!empty($this->_id)){
			$_SESSION['id'] = $this->_id;
			return '<script type="text/javascript">window.location = "dashboard.php"</script>';

		}else{
			return 'Vos identifiants de connexion sont incorrects';
		}
	}

	public function disconnectUser(){

		header('Location: ../vue/admin');
		session_unset();
		session_destroy();
	}

	public function getUser($id,$key){

		$this->_id = $id;
		$this->_key = $key;

		$select = $this->_bdd -> prepare('SELECT * FROM user WHERE id=:id');
		$select->execute(array('id'=>$this->_id));

		foreach ($select as  $value) {

			if($key=='avatar'){
				if(!empty($value[$key])){
					return $value[$this->_key];
				}else{
					return 'avatar-anonyme.jpg';
				}
			}elseif ($key =='age') {
				$date = strtr($value[$this->_key],'/','-');
				$now   = time();
				$age = strtotime($date);
				$diff  = abs($now - $age);
				$annee =  (date('Y',$diff)-1970);
				$this->_age = $annee.' ans';
				return $this->_age;
			}elseif(!empty($value[$key])){
				return $value[$this->_key];
			}else{
				return 'non-enregistré';
			}
		}
	}

	public function getDate($id){

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
	}
}


 ?>