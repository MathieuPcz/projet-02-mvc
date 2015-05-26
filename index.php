<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mathieu Paczesny</title>
  <link rel="stylesheet" href="vue/css/style.css">
  <link rel="stylesheet" href="vue/css/index.css">
</head>
<body>
     <div id="menu">
     <img src="vue/images/bureau.jpg" id="vignette" alt="vignette">
      <nav>
        <ul class="nav-bar">
          <li id="profilMenu"><a class="menuPrincipal" href="#about" id="aboutMenu"><div id="imgProfil"><img src="vue/images/profil.jpg" alt="profil"></div> <span>Mathieu</span></a></li>
                <li><a class="menuPrincipal" href="#actualite" id="actuMenu">Actualités</a></li>
                <li><a class="menuPrincipal" href="#mesSites" id="projetsMenu">Projets Personnels</a></li>
          <li><a class="menuPrincipal" href="#competences" id="compMenu">Compétences</a></li>
                <li><a class="menuPrincipal" href="#message" id="messageMenu">Messagerie</a></li>
        </ul>
      </nav>
    </div>
   <div id="home">
    <div class="contenu">
      <h2>Mathieu <div class="colorTitle">P</div>a<div class="colorTitle">cZ</div>esny</h2>
      <div class="defilText">
        <ul>
          <li>Vous avez des projets ? des idées ?</li>
          <li>Je vous offre ma créativité et mes compétences</li>
          <li>Pour un site web à votre image</li>
        </ul>
      </div>
      <p>Web Designer | Web Developpeur</p>
      <div id="downScrow"><img src="vue/images/flechebas.png" alt="Clic ici"></div>
    </div>
  </div>
   <div class="container">
     <div id="about">
      <div class="imgProfil">
        <img src="vue/images/profil.jpg" alt="image de profil">
      </div>
      <div class="text">
        <h2>Vous cherchez un développeur web ?</h2>
        <p>Ça tombe bien ! Je suis passionné par le web, autodidacte depuis plus d’un an je réalise divers projets personnels. Si mon profil vous intéresse n’hésitez pas à me contacter ou  à regarder <a href="#mesSites">mes réalisations.</a></p>
        <h2>Mon parcours</h2>
        <p>Ma passion pour le web ne m'est pas apparue au début de mes études. J'ai commencé par un baccalauréat technologique dans le domaine de l'électrotechnique. J'ai ensuite continué dans cette voie par un BTS puis une licence professionnelle dans les énergies. C'est seulement pendant cette licence que cette passion est arrivée. J'ai commencé par apprendre les rouages d'un site web et ses secrets via le site d'<a href="http://openclassrooms.com/" target="_blank">OpenClassRooms</a>. Après un an d'apprentissage en autonomie, je décide de reprendre mes études dans les métiers du multimédia et de l'internet.</p>
        <h2>Services</h2>
        <p>Mes compétences en Web Design et développement me permettront de vous offrir un site web fonctionnel, responsive et à votre image. Créatif et en recherche de savoir, je mettrais tout en œuvre pour vous garantir un résultat plus que satisfaisant. </p>
        <br><hr>
      </div>
    </div>
    <div id="actualite">
      <h2>Dernières actualités</h2>
      <div class="actu">
        <a href="http://mathieupaczesny.com/before-after" target="_blank"><div class="actuRubrique">
          <img src="vue/images/fond.jpg" alt="before-after">
        <strong>Before-After | site de rencontre</strong>
        </div></a>
        <div class="actuInfo">
          <p><span class="info">Site :</span> Before-After</p>
          <p><span class="info">Langages utilisés :</span> HTML5 | CSS 3 | PHP | SQL | JAVASCRIPT</p>
          <p><span class="info">Techniques utilisées :</span> Modèle MVC | Orienté Objet | Ajax | Composer | Git </p>
          <p><span class="info">But :</span> améliorer la visiualisation d'informations sur les soirées de votre ville et faciliter les rencontres avec d'autres utilisateurs inconnus.</p>
          <p><span class="info">Fonction :</span> Connexion avec facebook | système de création et de gestion d'événement | système de mise en file d'attente | système d'amis | barres de recherches | discussion instantannée type Facebook | profil utilisateur </p>
        </div>
      </div>
    </div>
      <br><br><br><hr>
      <div id="mesSites">
        <h2>Projets personnels</h2><br>
        <p>Vous trouverez ci-dessous mes divers projets. Ces sites sont intégrés sur mon site personnel et vous pouvez donc naviguez directement dessus. N'hésitez pas a utiliser les informations de connection qui vont suivre pour vous connectez si besoin.</p><br>
        <div id="log">
          <p><span>Email : </span>user@mathieupaczesny.com</p>
          <p><span>Mot de passe : </span> user</p><br><br>
        </div>

        <div id="menuProjet">
          <nav>
            <ul>
              <li><a href="#" id="first-menu">Interface Admin</a></li>
              <li><a href="#" id="second-menu">Before-After</a></li>
              <li><a href="#" id="troisieme-menu">We Are Legends</a></li>
              <li><a href="#" id="quatrieme-menu">Christana Rlk</a></li>
            </ul>
          </nav>
        </div>

        <div id="first-projet" class="projets">
          <h2>Interface administrateur pour le site mathieupaczesny.com</h2>
          <iframe src="http://localhost/projet-02-web/web/app_dev.php/admin" frameborder="0"></iframe>
        </div>
        <div id="second-projet" class="projets">
          <h2>Site before-after</h2>
          <iframe src="http://mathieupaczesny.com/before-after/" frameborder="0"></iframe>
        </div>
        <div id="troisieme-projet" class="projets">
          <h2>Site We Are Legends</h2>
        </div>
        <div id="quatrieme-projet"class="projets">
          <h2>Site Christana Rlk | designeuse</h2>
          <iframe src="http://christanarlk.com" frameborder="0"></iframe>
        </div>
      </div> 
      <br><hr>
      <div id="competences">
        <h2>Mes compétences</h2>
        <h3>Intégration Web</h3>
      <div id="imgIntegration">
        <img src="vue/images/html.png" alt="html" id="html">
        <img src="vue/images/css.png" alt="css" id="css">
        <img src="vue/images/jquery.png" alt="jquery" id="jquery">
        <img src="vue/images/bootstrap.png" alt="bootstrap" id="bootstrap">
        <div class="progress"><div class="barreProgress" id="barreInt"></div></div>
      </div>
      <h3>Developpement Web</h3>
      <div id="imgDev">
        <img src="vue/images/php.png" alt="php" id="php">
        <img src="vue/images/symfony.png" alt="symfony" id="symfony">
        <img src="vue/images/wordpress.png" alt="wordpress" id="wordpress">
        <img src="vue/images/git.png" alt="git" id="git">
        <div class="progress"><div class="barreProgress" id="barreDev"></div></div>
      </div>
      <h3>Infographie | communication</h3>
      <div id="imgInfographie">
        <img src="vue/images/photoshop.png" alt="photoshop" id="photoshop">
        <img src="vue/images/illustrator.png" alt="illustrator" id="ai">
        <img src="vue/images/aftereffect.png" alt="afterEffect" id="ae">
        <div class="progress"><div class="barreProgress" id="barreInfo"></div></div>  
      </div>
        
      </div>
  <div id="messagerie">
  <?php if(!empty($_COOKIE['user'])){ ?>
      <div id="headerMess"><div id="connect"></div><span>À Mathieu Paczesny</span><div id="closeMess"><img src="vue/images/croix.png" alt="close"></div></div>
      <input type="text" id="message" placeholder="Votre message ...">
  <?php }else{ ?>
      <div id="imgContact"><img src="vue/images/profil.jpg" alt="profil"></div>
      <div id="textPresentationContact">
        <span>Vous désirez me contacter ? Rien de plus simple, complétez le formulaire ci-dessous et vous accèderez à une messagerie instantannée.</span>
      </div>
      <div id="infoRegister"></div>
      <input type="email" id="email" placeholder="Votre E-mail ...">
      <input type="text" id="name" placeholder="Votre nom ...">
      <input type="text" id="firstname" placeholder="Votre prénom ...">
      <button id="enregistrer">S'enregistrer</button>      
  <?php } ?>
  </div>
    <footer>
        <br><hr>
       <div id="infoFooter">
         <span>Ce projet sera bientot propulsé par symfony 2</span> <a href="admin">Interface Administrateur</a> © <?php echo date('Y'); ?>
       </div>
    </footer>
      </div>

</body>
<script type="text/javascript" src="vue/js/jquery.js"></script>
<script type="text/javascript" src="vue/js/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="vue/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script type="text/javascript" src="vue/js/main.js"></script>
<script type="text/javascript" src="vue/js/barreLoad.js"></script>
</html>