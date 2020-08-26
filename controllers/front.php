<?php

function clp_embed_panel($name = 'bitfinex', $nav = true) {
  clp_view_helper("panel", ['origin' => $name, 'nav' => $nav]);
}

add_shortcode('clp_panel', 'clp_embed_panel');


function clp_embed_symbol($origin = '', $symbol = '') {
	if(empty($origin)) {
		echo "need to be selected one origin";
	}

	clp_view_helper("symbol", ['origin' => $origin, 'symbol' => $symbol]);

	//add_shortcode( $tag, 'wptuts_columns_sc' );
}



add_shortcode('clp_symbol', 'clp_embed_symbol');