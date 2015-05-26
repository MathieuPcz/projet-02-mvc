$(document).ready(function(){

	$('#comp').click(function(){
	var largeurbarre = $(window).width()*0.8;
	$('#imgIntegration img').removeClass('activeSkill');
	$('#imgDev img').removeClass('activeSkill');
	$('#imgInfographie img').removeClass('activeSkill');
	$('#html').addClass('activeSkill');
	$('#php').addClass('activeSkill');
	$('#photoshop').addClass('activeSkill');
	$('#barreInt').css('width',largeurbarre*0.8).html('80%');
	$('#barreDev').css('width',largeurbarre*0.75).html('75%');
	$('#barreInfo').css('width',largeurbarre*0.3).html('30%');

	});

	
	/*compétence barre load #integration*/

	$('#html').click(function(){
	$('#imgIntegration img').removeClass('activeSkill');
	$('#html').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 80){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInt').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});
$('#css').click(function(){
	$('#imgIntegration img').removeClass('activeSkill');
	$('#css').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 80){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInt').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});

$('#jquery').click(function(){
	$('#imgIntegration img').removeClass('activeSkill');
	$('#jquery').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 50){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInt').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});
$('#bootstrap').click(function(){
	$('#imgIntegration img').removeClass('activeSkill');
	$('#bootstrap').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 20){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInt').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});

	/*Barre load pour #dev*/

		$('#php').click(function(){
	$('#imgDev img').removeClass('activeSkill');
	$('#php').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 75){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreDev').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});
$('#symfony').click(function(){
	$('#imgDev img').removeClass('activeSkill');
	$('#symfony').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 55){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreDev').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});

$('#wordpress').click(function(){
	$('#imgDev img').removeClass('activeSkill');
	$('#wordpress').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 50){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreDev').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});
$('#git').click(function(){
	$('#imgDev img').removeClass('activeSkill');
	$('#git').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 65){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreDev').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});

	/*load barre compétence #infographie*/

$('#photoshop').click(function(){
	$('#imgInfographie img').removeClass('activeSkill');
	$('#photoshop').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 30){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInfo').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});

$('#ai').click(function(){
	$('#imgInfographie img').removeClass('activeSkill');
	$('#ai').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 20){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInfo').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});
$('#ae').click(function(){
	$('#imgInfographie img').removeClass('activeSkill');
	$('#ae').addClass('activeSkill');
	var pourcent = 0;
	var largeurbarre = $(window).width()*0.8;
	function rafraichir(){
	    if(pourcent < 20){
	    	pourcent=pourcent+0.5;
	    	var largeurbarreHtml = largeurbarre*(pourcent/100);
	        $('#barreInfo').css('width',largeurbarreHtml).html(pourcent+'%'); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
		setTimeout(rafraichir, 0.5);
		
	    }
	}
		rafraichir();
});

});
