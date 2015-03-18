/*********************/
/*
/*		LayerSlider Initialize
/*
/*********************/

jQuery(document).ready(function(e) {
    $('#layerslider').layerSlider({
		skinsPath : 'layerslider/skins/',
		skin : 'fullwidth',
		thumbnailNavigation : 'hover',
		hoverPrevNext : true,
		responsive : true,
		responsiveUnder : 940,
		thumbnailNavigation : false,
		sublayerContainer : 1160
	});
});

