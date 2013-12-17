<?php
function theme_init(){
	load_theme_textdomain('linepress', GABFIRE_INC_PATH . '/lang');
	load_theme_textdomain('float', GABFIRE_INC_PATH . '/lang'); /* Framework's common strings for all themes */
}
add_action ('init', 'theme_init');