$(document).ready(
	function(){
		$('.sponsors').owlCarousel(
			{
				items:5,
				mouseDrag:false,
				autoPlay:true
			}
			);


		if($(window).width()>=1024 ) 
		{
			if($.cookie('off_smo')!="yes") {$("#smo_modal").show();}
		}
		


		$( "#js-fixed-like-box-hide" ).click(function() {		
			$.cookie('off_smo', 'yes', { expires: 30 });  
		  	$("#smo_modal").hide();
		});

		$( "#js-fixed-like-box-close" ).click(function() {		  
			$.cookie('off_smo', 'yes', { expires: 30 });
		  	$("#smo_modal").hide();
		});







	})