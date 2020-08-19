<?php

function clp_embed_panel($name = '') {
  clp_view_helper("panel", ['origin' => $name]);
}

add_shortcode('clp_origin', 'clp_embed_panel');
