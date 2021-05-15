<?php

// Disable Gutemberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Disable scripts emoji
require_once(dirname(__FILE__).'/functions/disable_scripts_emoji.php');

// Style - Scripts 
require_once(dirname(__FILE__).'/functions/wp_enqueue_scripts.php');

// Custom widgets elementor
require_once(dirname(__FILE__).'/custom_widgets/init_widgets.php');
