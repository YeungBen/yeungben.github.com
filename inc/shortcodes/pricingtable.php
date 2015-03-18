<?php



add_shortcode("pricing_table", "pricing_table");

function pricing_table($attributes, $content){

	extract(shortcode_atts(array(
	"title" => 'Plan',
	"price" => '$10',
    "period"=>'Month',
	"link" => "#",
	"link_title" => "Order Now",
	"featured" =>null
			), $attributes));

        if($featured==='true') $featured = 'featured'; else $featured='';
	$out = '<div class="pricing-table2 ' . $featured .'"><div class="price-header"><h5 class="plan-title">' . $title .'</h5>
		<h6 class="plan-price"><span>' . $price .'</span><small>'.$period.'</small>
			</h6>
			</div><ul class="features">';

	$out .= do_shortcode($content);
	$out .= '</ul> <div class="price-footer">
			<a href="'. $link .'" class="'. (!empty($featured)?' button ':' magicmore ') . (!empty($featured)?' red ':'') .'">' . $link_title . '</a>
													</div>
													</div>';

	return $out;

}

add_shortcode('price_item', 'price_item');

function price_item($attributes, $content){

	return "<li>$content</li>";

}





 // Pricing Table
 function pricing_table1( $atts, $content = null ) {
 	return '<div class="pricing-table">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('pricing-table', 'pricing_table1');

 function pricing_features( $atts, $content = null ) {
 	return '<ul class="plans-f-list" ><li class="plan-header"></li>' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('pricing-features', 'pricing_features');

 function pricing_features_respo( $atts, $content = null ) {
 	return '<ul class="plans-f-list respo" ><li class="plan-header"></li>' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('pricing-features-respo', 'pricing_features_respo');

 function price_row( $atts, $content = null ) {
 	return '<li>' . do_shortcode($content) . '</li>';
 }
 add_shortcode('price-row', 'price_row');

 function pricing_plan( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'plan_type'      => 'normal-plan',
 	'plan_price'     => '00$',
 	'plan_title'     => 'Title',
 	'plan_period'    => 'per month',
 	'plan_btn_show'  => 'yes',
 	'plan_btn_text'  => 'sign up',
 	'plan_btn_link'  => '#'
			), $atts));

 	if($plan_type == 'featured-plan') {
 		$out = '<ul class="featured-plan"><li class="plan-header '. $plan_type . '"><span class="plan-title">'. $plan_title . '</span><br /><span class="price">'. $plan_price . '</span><h4>'. $plan_period . '</h4></li>';
 	}
 	else {
 		$out = '<ul><li class="plan-header '. $plan_type . '"><span class="plan-title">'. $plan_title . '</span><br /><span class="price">'. $plan_price . '</span><h4>'. $plan_period . '</h4></li>';
 	}
 	$out .= do_shortcode($content);
 	if($plan_btn_show == 'yes') {
 		$out .= '<li class="plan-footer"><br /><a class="price-send" href="'. $plan_btn_link. '" >'. $plan_btn_text . '</a></li>';
 	}
 	$out .= '</ul>';
 
 	return $out;
 }
 
 add_shortcode('pricing-plan', 'pricing_plan');

?>