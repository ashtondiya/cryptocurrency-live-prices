<?php

function clp_embed_panel($name = 'bitfinex', $nav = true) {
  clp_view_helper("panel", ['origin' => $name, 'nav' => $nav]);
}

add_shortcode('clp_panel', 'clp_embed_panel');

function clp_embed_symbol($atts = []) {
	echo "<div id='{$atts['origin']}-{$atts['symbol']}' class='symbol {$atts['origin']}-{$atts['symbol']}' data-origin='{$atts['origin']}' data-symbol='{$atts['symbol']}'></div>";
}

add_shortcode('clp_symbol', 'clp_embed_symbol');


