<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mathieu Paczesny</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/index-admin.css">
</head>
<body>
<div class="load"></div>
 <div class="fadein">
   <div id="formConnect">
  <div class="img-rond">
    <img src="../images/profil.jpg" alt="profil">
  </div>
  <div id="textConnectPresent">
    <span>Bienvenue sur l'interface administrateur. Vous souhaitez voir comment celle-ci fonctionne ? N'hésitez pas à vous connecter avec les identifiants ci-dessous.</span> 
  </div>
  <p><span>E-mail : </span> user@mathieupaczesny.com</p>
  <p><span>Mot de passe : </span> user</p>
  <input type="email" placeholder="Votre e-mail ..." id="email" required>
  <input type="password" placeholder="Votre mot de passe ..." id="password" required>
  <button id="connexion">Connexion</button>
  <a href="#">Mot de passe oublié ?</a>
  <div id="infoConnect"></div>
</div>
 </div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    progressBar = {
    countElement : 0,
    loadElement : 0,


    init : function(){


    this.countElement =  $('div').length;

    $('div').each(function(){
      progressBar.loadElement ++;
      progressBar.updateProgressBar();
    });
    
    },

    
    
    updateProgressBar : function() {

    
      
      $('.load').stop().animate({
        'width' : (progressBar.loadElement/progressBar.countElement)*100 + '%'
      },1000, 'linear' ,function(){


        if(progressBar.loadElement == progressBar.countElement){
          $('.load').css('display','none');
          $('.imgLoad').css('display','none');
          $('.fadein').fadeIn(800);

        }
      });

    }
  }

  progressBar.init();

    $.ajax({
      url : '../../controler/appelFunction.php?function=statistique',
      type :'post',
      cache: false,
      data : {
        url : 'mathieupaczesny.com/vue/admin'
        },
        success: function(data){
      }
    });

    $('#connexion').click(function(){
      $.ajax({
        url : '../../controler/appelFunction.php?function=connectUser',
        type :'post',
        cache: false,
        data : {
          email : $('#email').val(),
          password : $('#password').val()
          },
          beforeSend: function(){
            $('#infoConnect').html('Chargement en cours...');
          },
          success: function(data){
            $('#infoConnect').html(data);
        }
      });
    });
  })
</script>
</html>