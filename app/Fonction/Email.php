<?php 
namespace App\Fonction;

class Email{

	private $_bdd;
	private $_email;
	private $_sujet;
	private $_longname;
	private $_message;
	private $_ip;
	private $_nb;
	private $_time;

	public function __construct($bdd){

		$this->_bdd = $bdd;
	}

	public function countEmail(){

		$select=$this->_bdd->prepare('SELECT id FROM email');
		$select->execute(array());

		$result = $select->rowCount();
		return $result;
	}

	public function save($email,$sujet,$longname,$message){

		if(!empty($email)&&!empty($sujet)&&!empty($longname)&&!empty($message)){
			$this->_email = $email;
			$this->_longname = htmlspecialchars(ucfirst($longname));
			$this->_message = htmlspecialchars(ucfirst($message));
			$this->_sujet = htmlspecialchars(ucfirst($sujet));
			$this->_ip = $_SERVER['REMOTE_ADDR'];
			$this->_time = time();

			if(filter_var($this->_email, FILTER_VALIDATE_EMAIL)){

			$insert = $this->_bdd->prepare('INSERT INTO email (email,sujet,longname,message,time,ip,sendDate) VALUES (:email,:sujet,:longname,:message,:time,:ip,NOW())');
			$insert->execute(array('email'=>$this->_email,
									'sujet'=>$this->_sujet,
									'longname'=>$this->_longname,
									'message'=>$this->_message,
									'time'=>$this->_time,
									'ip'=>$this->_ip));

			return 'good';

			}else{
				return 'Votre email est invalide';
			}
		}else{
			return 'Veuillez compléter tous les champs';
		}
	}

	public function antiSpam(){

		$this->_ip = $_SERVER['REMOTE_ADDR'];
		$this->_time = time() - (5*60);
		$flood = 0;

		$select = $this->_bdd->prepare('SELECT time FROM email WHERE ip=:ip  ORDER BY id DESC');
		$select->execute(array('ip'=>$this->_ip));
		
		foreach ($select as $value) {
			if($value['time']> $this->_time){
				$flood++;

			}
		}

		if($flood>=2){
			return 'Vous devez attendre 5 minutes avant d\'envoyer un nouveau email';
			exit;
		}else{
			return true;
		}

	}

	public function send($email,$sujet,$longname,$message){

		$this->_email = $email;
		$this->_longname = htmlspecialchars(ucfirst($longname));
		$this->_message = htmlspecialchars(ucfirst($message));
		$this->_sujet = htmlspecialchars(ucfirst($sujet));
		$date = date('d-m-Y  H-m-i');
		
		$message_txt =$this->_message.' 

				envoyé par : '.$this->_longname.
				'via l\adresse :' .$this->_email.
				' le '.$date. 
				'Adresse ip de l\'utilisateur : '. $this->_ip;
				
			$message_html = "<!DOCTYPE html><head>
				<meta charset='utf-8' />
				<style>
				body
				{
				font-family:calibri;
				text-align:center;
				background-color:black;
				color:#428bca;
				}
				#message{
				background-color:#EEEEEE;
				width:70%;
				text-align:center;
				margin:auto;
				margin-top:2%;
			}
				h3
				{
				color: rgb(0,89,179);
				}
				strong
				{
				color: rgb(11,234,16);
				}
				</style>
				</head>
				<body><div id='message'>".$this->_message."<hr><br><br>envoyé par : ".$this->_longname
				."<br>via :" .$this->_email."<br>
				le ".date('d-m-Y')." 
				<br>Adresse ip de l'utilisateur : ". $this->_ip."
				</div></body>	</html>";

		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $this->_email)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}else{
				$passage_ligne = "\n";
			}

		
			 //========= ajout du fichier
		/*	$fichier   = fopen("../images_fond/logo_event.png", "r");
			$attachement = fread($fichier, filesize("../images_fond/logo_event.png"));
			$attachement = chunk_split(base64_encode($attachement));
			fclose($fichier);*/
			
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			$boundary_alt = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = $this->_sujet;
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"".$this->_longname."\"<".$this->_email.">".$passage_ligne;
			$header.= "Reply-to: \"".$this->_longname."\" <".$this->_email.">".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header .= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			 
			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
			 
			//=====Ajout du message au format HTML.
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			 
			//=====On ferme la boundary alternative.
			$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
			//==========
			 
			 
			 
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			
			//========== ajout de la pièce jointe
		/*	$message.= "Content-Type: image/png; name=\"logo_event.png\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
			$message.= "Content-Disposition: attachment; filename=\"logo_event.png\"".$passage_ligne;
			$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne; */

			mail('mathieu.paczesny@gmail.com', $sujet, $message,$header);
			
		}


}
 ?>