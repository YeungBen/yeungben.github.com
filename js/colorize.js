$(function(){
	
	
$("#color1").click(function(){
		
		$('body > div').removeClass();
		$('body > div').addClass('colorskin-1');
		$("#img-logo").attr('src', 'images/logo.png');
		
	});
	
	
	$("#color2").click(function(){
		
		$('body > div').removeClass();
		$('body > div').addClass('colorskin-2');
		$("#img-logo").attr('src', 'images/logo-color2.png');
		
	});
	
$("#color3").click(function(){
		
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-3');
	$("#img-logo").attr('src', 'images/logo-color3.png');
		
	});

$("#color4").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-4');
	$("#img-logo").attr('src', 'images/logo-color4.png');
	
});

$("#color5").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-5');
	$("#img-logo").attr('src', 'images/logo-color5.png');
	
});

$("#color6").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-6');
	$("#img-logo").attr('src', 'images/logo-color6.png');
	
});

$("#color7").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-7');
	$("#img-logo").attr('src', 'images/logo-color7.png');
	
});

$("#color8").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-8');
	$("#img-logo").attr('src', 'images/logo-color8.png');
	
});

$("#color9").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-9');
	$("#img-logo").attr('src', 'images/logo-color9.png');
	
});

$("#color10").click(function(){
	
	$('body > div').removeClass();
	$('body > div').addClass('colorskin-10');
	$("#img-logo").attr('src', 'images/logo-color10.png');
	
});
	


$('#layout-selector').change(function(){
	
	if($('#layout-selector').val()=='Boxed')
		{
		$('#wrap').attr('id', 'boxed-wrap');
		
		}
	else{
		$('#boxed-wrap').attr('id', 'wrap');
		
	}
		
	
});

$('.pattern-selector').click(function(){
	
	
	$('body').css('background', 'url('+$(this).attr('title') +') repeat');
	
});


$('#t-row-left-ss').click(function(){
	
	$('#style-selector').hide(200);
		
		$('#t-row-left-ss').hide();
		
		
});
$('#t-row-right-ss').click(function(){
	
	$('#style-selector').show(300,function(){
		
		$('#t-row-left-ss').show();
		
	});
	
	
});

});

