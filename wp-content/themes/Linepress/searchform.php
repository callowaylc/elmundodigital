<form id="searchform" action="<?php bloginfo('url'); ?>">
	<fieldset>
		<input type="text" id="s" name="s" value="<?php esc_attr_e('Search in site...','linepress'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
		<input type="image" id="searchsubmit" src="<?php bloginfo('template_url'); ?>/images/button_go.gif" alt="<?php esc_attr_e('Search in site...','linepress'); ?>" /> 
	</fieldset>
</form>
