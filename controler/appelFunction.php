<?php 
session_start();
require '../vendor/autoload.php';
include_once 'bdd.php';
use App\User\User;
use App\Fonction\Actu;
use App\Fonction\Email;
use App\Fonction\Stat;
$user = new User($bdd);
$actu = new Actu($bdd);
$sendEmail = new Email($bdd);
$stat = new Stat($bdd);

// fichier de gestion des modeles en fonctions des appelles.


//gestion statistique

if($_GET['function'] == 'statistique'){

	$nbmail = $sendEmail->countEmail();
	if(!empty($nbmail)){
		$url = $_POST['url'];
		echo '11   '.$stat->setStat($nbmail,$url);	
	}else{
		$nbmail = 0;
		$url = $_POST['url'];
		$stat->setStat($nbmail,$url);
	}
	
}

//créer un new user
if($_GET['function'] == 'setUser'){
		
		$role = $user->getUser($_SESSION['id'],'role');

		if($role == 'admin'){
			echo $user->setUser($_POST['email'],$_POST['name'],$_POST['firstname'],$_POST['password'],$_POST['repass'],$_POST['role']);
		}else{
			echo "Vous n'avez pas les droits nécessaire pour gérer les utilisateurs";
		}
}

//modif compte user "info"
if($_GET['function'] == 'setInfoUser'){

	include_once '../vue/include/modifInfoUser.php';
}

if($_GET['function'] == 'modifInfoUser'){
		 
		echo $user->setInfoUser($_SESSION['id'],$_POST['age'],$_POST['ville'],$_POST['etude'],$_POST['travail']);
	
}
//modif compte user avatar

if($_GET['function'] == 'setAvatar'){

	$role = $user->getUser($_SESSION['id'],'role');

		if($role == 'admin'){

		$dossier= '../vue/images/user/';
		$fichier=$_SESSION['id'].$_FILES['uploadFile']['name'];
		$verif_image=$_FILES['uploadFile']['tmp_name'];
		
		if(getimagesize($verif_image))
			{
			
			if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $dossier . $fichier))
				{		

				echo $user->setAvatar($_SESSION['id'],$_SESSION['id'].$_FILES['uploadFile']['name']);
					
					
				}

			}else{
			echo 1;
			}
	}else{
		echo 2;
	}
	
}
//connect user
if($_GET['function'] == 'connectUser'){

	echo $user->connectUser($_POST['email'],$_POST['password']);
}

//disconnect user
if($_GET['function'] == 'disconnect'){

	echo $user->disconnectUser();
}





//GESTION ACTUALITE

//add actualite

if($_GET['function'] == 'addImageActu'){

	$role = $user->getUser($_SESSION['id'],'role');

		if($role == 'admin'){

		$dossier= '../vue/images/actu/';
		$fichier=$_SESSION['id'].$_FILES['imgActu']['name'];
		$verif_image=$_FILES['imgActu']['tmp_name'];
		
		if(getimagesize($verif_image))
			{
			
			if(move_uploaded_file($_FILES['imgActu']['tmp_name'], $dossier . $fichier)){
				echo $_SESSION['id'].$_FILES['imgActu']['name'];	
			}
		
				
			}else{
			echo 1;
			}
		
	}else{
		echo 2;
	}
}


if($_GET['function'] == 'setActu'){

	echo $actu->setActu($_SESSION['id'],$_POST['name'],$_POST['langage'],$_POST['technique'],$_POST['but'],$_POST['fonction'],$_POST['imgActu']);
}

//send email

if($_GET['function'] == 'sendEmail'){

	$email = $_POST['email'];
	$longname = $_POST['longname'];
	$message = $_POST['message'];
	$sujet = $_POST['sujet'];
	

		if($sendEmail->antiSpam() === true){

			$requete = $sendEmail->save($email,$sujet,$longname,$message);

			if($requete == 'good'){
			$sendEmail->send($email,$sujet,$longname,$message);
			echo 'Email envoyé avec succès, je vous répondrais dès que possible';
		}else{
			echo $requete;
		}
		
	}else{
		
		echo $sendEmail->antiSpam();
	}
}

 ?>
