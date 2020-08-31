<?php

function clp_embed_panel($atts = []) {
	$name = isset($atts['origin']) ? $atts['origin'] : 'bitfinex';
	$nav = isset($atts['nav']) ? (bool) $atts['nav'] : false;

	clp_view_helper("panel", ['origin' => $name, 'nav' => $nav]);
	return ob_get_clean();
}

add_shortcode('clp_panel', 'clp_embed_panel');

function clp_embed_symbol($atts = []) {
	return "<div id='{$atts['origin']}-{$atts['symbol']}' class='symbol {$atts['origin']}-{$atts['symbol']}' data-origin='{$atts['origin']}' data-symbol='{$atts['symbol']}'></div>";
	//return ob_get_clean();
}

add_shortcode('clp_symbol', 'clp_embed_symbol');


