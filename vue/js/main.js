$(document).ready(function(){

	//load bar chargement
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

	//gestion statistique 

	$.ajax({
			url : 'controler/appelFunction.php?function=statistique',
			type :'post',
			cache: false,
			data : {
				url : 'mathieupaczesny.com'
				},
				success: function(data){
			}
		});

	/*gestion couleur menu defilement*/
	
	$('#aboutMenu').addClass('activeMenu');
			$(window).scroll(function(e){
				var scrollTop = $(this).scrollTop() + ($(window).height()/3);
				var section1 = $('#about').offset().top;
				var section2 = $('#actualite').offset().top;
				var section3 = $('#mesSites').offset().top;
				var section4 = $('#competences').offset().top;

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




	/*mise en place des dimenssions du body*/

	var heightWindow = $(window).height();
	var widthWindow = $(window).width();
	$('#home').css('width',widthWindow);
	$('#home').css('height',heightWindow);

	/*defilement text*/
		$('#defilText').fadeOut(0).fadeIn(2000);
		$(function(){
	      setInterval(function(){
	         $(".defilText ul").animate({marginTop:-50},1500,function(){
	            $(this).css({marginTop:0}).find("li:last").after($(this).find("li:first"));
	         })
	      }, 4000);
	   });

	/*effet monter descente flesh*/
	function bis(){
		 $("#downScrow").animate({marginTop:10},'slow')
		 				.animate({marginTop:50},'slow', bis);
			};
	bis();

	/*apparition du content */

	$('#downScrow').click(function(){
		$('#home').fadeOut();
		$('.container').fadeIn(800);
		$('#menu').fadeIn(800);
		$('.menuPrincipal').removeClass('activeMenu');
		$('#aboutMenu').addClass('activeMenu');	
	});

	$('#vignette').click(function(){
		$('.container').fadeOut();
		$('#menu').fadeOut();
		$('#home').fadeIn(800);
	});

	/*gestion menu projet*/
	$('#first-menu').addClass('selectMenu');

	$("#menuProjet a").click(function(e) {
		    e.preventDefault();
		    $("#menuProjet a").removeClass("selectMenu");
		    $(this).addClass("selectMenu");
		});

	$('#first-menu').click(function(){
		$('.projets').fadeOut();
		$('#first-projet').fadeIn(800);
	});
	$('#second-menu').click(function(){
		$('.projets').fadeOut();
		$('#second-projet').fadeIn(800);
	});
	$('#troisieme-menu').click(function(){
		$('.projets').fadeOut();
		$('#troisieme-projet').fadeIn(800);
	});
	$('#quatrieme-menu').click(function(){
		$('.projets').fadeOut();
		$('#quatrieme-projet').fadeIn(800);
	});

	/*gestion messagerie*/

	$('#messageMenu').click(function(){
		$('#messagerie').fadeIn(800);
	});

	$('#closeMess').click(function(){
		$('#messagerie').fadeOut();
	});

	$('#imgContact').click(function(){
		$('#messagerie').fadeOut();
	});

	/*save user ajax method */

	$('#envoyer').click(function(){

		$.ajax({
			url : 'controler/appelFunction.php?function=sendEmail',
			type :'post',
			cache: false,
			data : {
				email : $('#email').val(),
				sujet : $('#objet').val(),
				longname : $('#name').val(),
				message : $('#message').val()
				},
				beforeSend: function(){
					$('#infoRegister').html('Envoie en cours...');
				},
				success: function(data){
					$('#infoRegister').html(data);
			}
		});
	});

})