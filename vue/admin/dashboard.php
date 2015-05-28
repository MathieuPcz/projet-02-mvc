<?php 
session_start();
require '../../vendor/autoload.php';
include_once '../../controler/bdd.php';
use App\User\User;
use App\Fonction\Actu;
use App\Fonction\Stat;
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$user = new User($bdd);
	$actu = new Actu($bdd);
	$stat = new Stat($bdd);
}else{
header('location:../admin');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Mathieu Paczesny</title>
	<link rel="stylesheet" href="../css/style-admin.css">
	<link rel="stylesheet" href="../css/dashboard-admin.css">
</head>
<body>
<div class="load">
	
</div>
	<div class="fadein">
		<div id="menu">
		<a href="../../"><img src="../images/bureau.jpg" id="vignette" alt="vignette"></a>
		<nav>
			<ul class="nav-bar">
				<li id="profilMenu"><a class="menuPrincipal" href="#section-1" id="aboutMenu"><div id="imgProfil"><img src="../images/user/<?php echo $user->getUser($id,'avatar'); ?>" alt="avatar"></div> <span><?php echo $user->getUser($id,'longname'); ?></span></a></li>
				<li><a class="menuPrincipal" href="#section-2" id="actuMenu">Actualités</a></li>
				<li><a class="menuPrincipal" href="#section-3" id="projetsMenu">Projets Personnels</a></li>
				<li><a class="menuPrincipal" href="#section-4" id="compMenu">Compétences</a></li>
				<li><a class="menuPrincipal" href="../../controler/appelFunction.php?function=disconnect">Déconnexion</a></li>
			</ul>
		</nav>
	</div>
	<div class="content">
		<div class="container">
		<div id="presentation">
			<h2>Bienvenue sur le tableau de bord du site Mathieupaczesny.com.</h2>
			<p><span> Chacune des actions que vous effecturez n'aura aucune incidence sur ce site, afin de vous permettre d'évaluer les diverses fonctionnalitées.</span></p>
		</div>
		<div id="statistique">
			<div id="visite">
				<h2>Nombre de visites</h2>
				<p><span>Visite journalière du <?php echo date('d-m-Y'); ?> :</span>  <?php echo $stat->visiteDay(); ?></p>
				<p><span>Visite moyenne par jours : </span><?php echo $stat->moyenneDayVisite(); ?></p>
				<p><span>Visite mensuel : </span> <?php echo $stat->visiteMonth(); ?></p>
				<p><span>Visite annuelle : </span> <?php echo $stat->visiteMax(); ?></p>
				<p><span>Visiteur max journalière : </span><?php echo $stat->visiteMaxDay(); ?></p>
			</div>
			<div id="autre">
				<h2>Autres statistiques</h2>
				<p><span>E-mail reçus</span> : <?php echo $stat->countEmail(); ?></p>
				<p><span>Page la plus visité : </span> <?php echo $stat->bestPage(); ?></p>
			</div>
			
		</div>
	</div>
	<div class="container2" id="section-1">
		<div class="header">
			<h2>Mon compte : <?php echo $user->getUser($id,'longname'); ?></h2>
			<div class="modifGestion">
				
				<select id="modifierCompte">
					<option value="1">Modifier informations</option>
					<option value="2">Modifier Avatar</option>
					<option value="3">Ajouter un utilisateur</option>
				</select>
			<button id="validerUser">Valider</button>
			
			</div><br><div id="infoModifUser"></div>
		</div>
		<div id="infoAdmin">
			<div id="avatar">
				<img src="../images/user/<?php echo $user->getUser($id,'avatar'); ?>" alt="avatar" id="avatarImg">
			</div>
			<p><span>Droit : </span> <?php echo $user->getUser($id,'role'); ?></p>
			<p><span>Compte créé le : </span><?php echo $user->getDate($id).' par '.$user->getUser($user->getUser($id,'registerBy'),'longname'); ?> </p>
		</div>
		<div id="info"><h3>Informations complémentaires : </h3>
			<p><span>Age : </span>  <?php echo $user->getUser($id,'age'); ?></p>
			<p><span>Habite à : </span> <?php echo $user->getUser($id,'location'); ?></p>
			<p><span>Etude :</span>  <?php echo $user->getUser($id,'etude'); ?></p>
			<p><span>Travail :</span>  <?php echo $user->getUser($id,'travail'); ?></p>
		</div>



	</div>
	<div class="container2" id="section-2">
		<h2>Gérer les actualités</h2>
		<div class="modifGestion">
			<select id="modifierActu">
				<option value="1">Modifier</option>
				<option value="2">Ajouter</option>
				<option value="3">Supprimer</option>
			</select>
			<button id="validerActu">Valider</button>
		</div>
	<div id="actualite">
      <h3>Dernière actualité :</h3>
      <div class="actu"><div class="actuRubrique">
         <img src="../images/actu/<?php echo $actu->getLastActu('image'); ?>" alt="before-after">
       <strong> <?php echo $actu->getLastActu('name'); ?></strong>
       </div>
       <div class="actuInfo">
         <p><span class="info">Site :</span>  <?php echo $actu->getLastActu('name'); ?></p>
         <p><span class="info">Langages utilisés :</span>  <?php echo $actu->getLastActu('langage'); ?></p>
         <p><span class="info">Techniques utilisées :</span>  <?php echo $actu->getLastActu('technique'); ?> </p>
         <p><span class="info">But :</span>  <?php echo $actu->getLastActu('but'); ?></p>
         <p><span class="info">Fonction :</span>  <?php echo $actu->getLastActu('fonction'); ?></p>
       </div>
       </div> 

         
    </div>
	</div>
	<div class="container2" id="section-3">
		<h2>Gérer les projets</h2>
		<div class="modifGestion">
			<select id="modifierProjet">
				<option value="1">Modifier</option>
				<option value="2">Ajouter</option>
				<option value="3">Supprimer</option>
			</select>
			<button id="valider">Valider</button><br>

		</div>
		<div id="projets">
			<h3>dernier projet : <span>Site before-after</span></h3>
			
          <iframe src="http://mathieupaczesny.com/before-after/" frameborder="0"></iframe>
		</div>
	</div>
	<div class="container2" id="section-4">
		<h2>Gérer les compétences</h2>
		<div class="modifGestion">
			<select id="modifierComp">
				<option value="1">Modifier</option>
				<option value="2">Ajouter</option>
				<option value="3">Supprimer</option>
			</select>
			<button id="valider">Valider</button>
		</div>
	</div>
	</div>
	<div id="addUser" class="form">
		<h2>Ajouter un utilisateur</h2>
		<input type="text" placeholder="Nom ..." selected id="name">
		<input type="text" placeholder="Prénom ..." selected id="firstname"><br>
		<input type="email" placeholder="Email ..." selected id="email"> 
		<select  id="role">
			<option value="anonymus">Anonyme</option>
			<option value="admin">Administrateur</option>
		</select><br>
		<input type="password" placeholder="Mot de passe ..." selected id="password">
		<input type="password" placeholder="Retaper mot de passe ..." selected id="repass"><br>
		
		<div id="infoSaveUser"></div>
		<button class="annuler">Annuler</button>
		<button id="saveUser">Enregister</button><br>
	</div>
	<div id="addActu" class="form">
		<h2>Ajouter une actualité</h2>
		<input type="text" id="nameActu" placeholder="Nom du projet ..." selected>
		<input type="text" id="langage" placeholder="Langages utilisés ..." selected>
		<input type="text" id="technique" placeholder="Techniques utilisées ..." selected>
		<input type="text" id="but" placeholder="But ..." selected>
		<input type="text" id="fonction" placeholder="Fonctions ..." selected>
		<br><button id="saveImageActu">Joindre une image</button><br>
		<button class="annuler">Annuler</button>
		<button id="saveActu">Enregistrer</button>
		<div id="infoAddActu"></div>
	</div>

	<div id="modifActu" class="form">
		<h2>Modifier une actualité</h2>
		<select  id="choixActu">
			
		</select>
	</div>
	<input type="file" id="uploadFile">
	<input type="file" id="imgActu"selected>
	</div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="../js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script type="text/javascript" src="../js/dashboard.js"></script>
</html>