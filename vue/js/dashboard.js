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
	
	$.localScroll();		

	/*gestion couleur menu defilement*/
	
	$('#aboutMenu').addClass('activeMenu');
			$(window).scroll(function(e){
				var scrollTop = $(this).scrollTop() + ($(window).height()/3);
				var section1 = $('#section-1').offset().top;
				var section2 = $('#section-2').offset().top;
				var section3 = $('#section-3').offset().top;
				var section4 = $('#section-4').offset().top;

				if(section1<scrollTop){
					if(section2<scrollTop){
						if(section3<scrollTop){
							if(section4<scrollTop){
								$('.menuPrincipal').removeClass('activeMenu');
								$('#compMenu').addClass('activeMenu');
							}else{
								$('.menuPrincipal').removeClass('activeMenu');
								$('#projetsMenu').addClass('activeMenu');
							}
						}else{
							$('.menuPrincipal').removeClass('activeMenu');
							$('#actuMenu').addClass('activeMenu');
							}
					}else{
						$('.menuPrincipal').removeClass('activeMenu');
						$('#aboutMenu').addClass('activeMenu');
					}
				}

				
			});

	/*gestion des formulaires*/
	/*formulaire save user*/
	$('.annuler').click(function(){
		$('.form').fadeOut();
		$('.container').fadeIn(800);
		$('.container2').fadeIn(800);
	})

	//gestion compte user
	$('#validerUser').click(function(){
		if($('#modifierCompte').val()=='3'){
			$('.container').fadeOut();
		$('.container2').fadeOut();
		$('#addUser').fadeIn(800);
		}else if($('#modifierCompte').val() == '1'){
			$.ajax({
			url : '../../controler/appelFunction.php?function=setInfoUser',
			type :'post',
			cache: false,
			data : {
				},
				beforeSend: function(){
					$('#infoModifUser').html('Chargement en cours...');
				},
				success: function(data){
					$('#infoModifUser').fadeOut();
					$('#info').html(data);
					$('#info').css('text-align','left');
			}
		});
			//upload file avatar
		}else if($('#modifierCompte').val() == '2'){
			$('#uploadFile').click();
			$('#uploadFile').change(function() {
				var file = document.querySelector('#uploadFile');
				
				xhr = new XMLHttpRequest();
				xhr.open('POST','../../controler/appelFunction.php?function=setAvatar');
				xhr.onload = function(){
					if(xhr.responseText == 1)
						{
							
							alert('Seul les images peuvent être envoyées');
							
						}else if(xhr.responseText == 2){
							$('#infoModifUser').html("Vous n'avez pas les droits nécessaire pour gérer les utilisateurs");

						}else{
							
							
							$('#avatar').html(xhr.responseText);
							$('#infoModifUser').html('Modification réussie').fadeOut(3000);
						}
				}
				xhr.upload.onprogress = function(e){
					
					$('#infoModifUser').html('Chargement en cours ...');
				}
				var form = new FormData();
				form.append('uploadFile',file.files[0]);
				xhr.send(form);
				return false;
			});
		}
	})

	//modif html pour form modifiable user
	$('#saveUser').click(function(){
		$.ajax({
			url : '../../controler/appelFunction.php?function=setUser',
			type :'post',
			cache: false,
			data : {
				email : $('#email').val(),
				name : $('#name').val(),
				firstname : $('#firstname').val(),
				password : $('#password').val(),
				repass : $('#repass').val(),
				role : $('#role').val()
				},
				beforeSend: function(){
					$('#infoSaveUser').html('Chargement en cours...');
				},
				success: function(data){

					$('#infoSaveUser').html(data);
			}
		});
	});

	//valid modification info user
	$('.container2').on("click", '#saveModifUser',function(){
		$.ajax({
			url : '../../controler/appelFunction.php?function=modifInfoUser',
			type :'post',
			cache: false,
			data : {
				age : $('#age').val(),
				ville : $('#ville').val(),
				etude : $('#etude').val(),
				travail : $('#travail').val()
				},
				beforeSend: function(){
					$('#infoModifInfo').html('Chargement en cours...');
				},
				success: function(data){

					$('#infoModifInfo').html(data);
					window.location = 'dashboard.php';
			}
		});

	});


	//gestion des actualités 

	$('#validerActu').click(function(){

		if($('#modifierActu').val() == 1){

		}else if($('#modifierActu').val()==2){
			$('.container').fadeOut();
			$('.container2').fadeOut();
			$('#addActu').fadeIn(800);
		}else{

		}
	});

	$('#saveImageActu').click(function(){

		$('#imgActu').click();
		$('#imgActu').change(function(){
			var file = document.querySelector('#imgActu');
				
				xhr = new XMLHttpRequest();
				xhr.open('POST','../../controler/appelFunction.php?function=addImageActu');
				xhr.onload = function(){
					if(xhr.responseText == 1)
						{
							
							alert('Seul les images peuvent être envoyées');
							
						}else if(xhr.responseText == 2){
							$('#infoAddActu').html("Vous n'avez pas les droits nécessaire pour gérer les utilisateurs");

						}else{
							
							
							$('#saveImageActu').html(xhr.responseText);
							$('#infoAddActu').html(' ');
						}
				}
				xhr.upload.onprogress = function(e){
					
					$('#infoAddActu').html('Chargement en cours ...');
				}
				var form = new FormData();
				form.append('imgActu',file.files[0]);
				xhr.send(form);
				return false;

		});
	});

	//sava actu
	$('#addActu').on('click','#saveActu',function(e){
		$.ajax({
			url : '../../controler/appelFunction.php?function=setActu',
			type :'post',
			cache: false,
			data : {
				
				name : $('#nameActu').val(),
				langage : $('#langage').val(),
				technique : $('#technique').val(),
				but : $('#but').val(),
				fonction : $('#fonction').val(),
				imgActu : $('#saveImageActu').html()
				},
				beforeSend: function(){
					$('#infoAddActu').html('Chargement en cours...');
				},
				success: function(data){

					$('#infoAddActu').html(data);

			}
		});
	});
})