<?php
function theme_init(){
	load_theme_textdomain('newspro', GABFIRE_INC_PATH . '/lang');
}
add_action ('init', 'theme_init');