<?php

function clp_embed_available_symbols() {
  $platform = json_decode(file_get_contents('https://marketdata.executium.com/api/v2/system/symbols'), true);
  clp_view_helper("symbols_enabled", ['data' => $platform]);
}

add_shortcode('clp_symbols', 'clp_embed_available_symbols');
