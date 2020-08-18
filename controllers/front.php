<?php

function clp_embed_panel() {
  executium_view_helper("panel", []);
}

add_shortcode('clp_panel', 'clp_embed_panel');
