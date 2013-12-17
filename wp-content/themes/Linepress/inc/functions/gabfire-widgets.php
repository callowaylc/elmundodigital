<?php
class widget_flickr extends WP_Widget {

	function widget_flickr() {
		$widget_ops = array( 'classname' => 'flickr_widget', 'description' => 'Display flickr photos on your site' );
		$control_ops = array( 'width' => 330, 'height' => 350, 'id_base' => 'flickr-widget' );
		$this->WP_Widget( 'flickr-widget', 'Gabfire Widget : Flickr', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title 			= apply_filters('widget_title', $instance['title'] );
		$photo_source 	= $instance['photo_source'];
		$flickr_id 		= $instance['flickr_id'];
		$flickr_tag 	= $instance['flickr_tag'];
		$display 		= $instance['display'];
		$size 			= $instance['size'];
		$photo_number 	= $instance['photo_number'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			echo '
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='; 
				if ( $photo_number ) {
					printf( '%1$s', esc_attr( $photo_number ) ); echo '&amp;display=';
				}
				if ( $display )  {
					printf( '%1$s', esc_attr( $display ) ); echo '&amp;layout=x&amp;';
				}
				
				if ( $instance['photo_source'] == 'user' ) { 
					printf( 'source=user&amp;user=%1$s', esc_attr( $flickr_id ) );
				}
				elseif ( $instance['photo_source'] == 'group' ) {
					printf( 'source=group&amp;group=%1$s', esc_attr( $flickr_id ) );
				}
				if  ( $instance['photo_source'] == 'all_tag' ) {
					printf( 'source=all_tag&amp;tag=%1$s', esc_attr( $flickr_tag ) ); 
				}

				echo '&amp;size=';

				if ( $size )  {
					printf( '%1$s', esc_attr( $size ) ); echo '"></script>';
				}
				
			echo '<div class="clear"></div>';
			
		echo $after_widget; 
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags( $new_instance['title'] );
		$instance['photo_source'] 	= $new_instance['photo_source'];
		$instance['flickr_id'] 		= strip_tags( $new_instance['flickr_id'] );
		$instance['flickr_tag'] 	= strip_tags( $new_instance['flickr_tag'] );
		$instance['group_id'] 		= strip_tags( $new_instance['group_id'] );
		$instance['display'] 		= $new_instance['display'];
		$instance['size'] 			= $new_instance['size'];
		$instance['photo_number'] 	= (int)$new_instance['photo_number'];

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Flickr Photo Stream', 'flickr_id' => '', 'photo_source' => 'all_tag', 'display' => 'latest', 'photo_number' => '6', 'size' => 's', 'flickr_tag' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$items  = (int) $items;
		if ( $items < 1 || 10 < $items )
		$items  = 10;
		?>
		
		<div class="controlpanel">
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'photo_source' ); ?>">Image Source</label> 
				<select id="<?php echo $this->get_field_id( 'photo_source' ); ?>" name="<?php echo $this->get_field_name( 'photo_source' ); ?>">
					<option value="user" <?php if ( 'user' == $instance['photo_source'] ) echo 'selected="selected"'; ?>>User</option>
					<option value="group" <?php if ( 'group' == $instance['photo_source'] ) echo 'selected="selected"'; ?>>Group</option>
					<option value="all_tag" <?php  if ( 'all_tag' == $instance['photo_source'] ) echo 'selected="selected"'; ?>>All Users Photos (based on tags)</option>			
				</select>
			</p>
			
			<div rel="flickr_id">
				<p>
					<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>">User or Group ID <a href="http://idgettr.com/">Get your Flickr ID</a></label>
					<input id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" class="widefat" />
				</p>
			</div>
			
			<div rel="flickr_tag">
				<p>
					<label for="<?php echo $this->get_field_id( 'flickr_tag' ); ?>">Tags (separate with comma) (only if "All Users Photos" selected)</label>
					<input id="<?php echo $this->get_field_id( 'flickr_tag' ); ?>" name="<?php echo $this->get_field_name( 'flickr_tag' ); ?>" value="<?php echo esc_attr( $instance['flickr_tag'] ); ?>" class="widefat" />
				</p>
			</div>

			<p>
				<label for="<?php echo $this->get_field_id( 'display' ); ?>">Display Latest or Random Photos</label> 
				<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>">
					<option value="latest" <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>Latest</option>
					<option value="random" <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>Random</option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_name( 'photo_number' ); ?>">How many items would you like to display?</label>
				<select id="<?php echo $this->get_field_id( 'photo_number' ); ?>" name="<?php echo $this->get_field_name( 'photo_number' ); ?>">			
				<?php
					for ( $i = 1; $i <= 10; ++$i )
					echo "<option value='$i' " . ( $instance['photo_number'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
				?>
				</select>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'size' ); ?>">Photo Size</label> 
				<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>">
					<option value="s" <?php if ( 's' == $instance['size'] ) echo 'selected="selected"'; ?>>Small</option>
					<option value="t" <?php if ( 't' == $instance['size'] ) echo 'selected="selected"'; ?>>Thumbnail</option>
					<option value="m" <?php  if ( 'm' == $instance['size'] ) echo 'selected="selected"'; ?>>Medium</option>
				</select>
			</p>
		</div>
		
	<?php
	}
}
register_widget('widget_flickr');

/*
 * FEEDBURNER WIDGET
 */
class feedburner_widget extends WP_Widget {

	function feedburner_widget() {
		$widget_ops = array( 'classname' => 'feedburner_widget', 'description' => 'Feedburner Email Subscribe');
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'feedburner_widget' );
		$this->WP_Widget( 'feedburner_widget', 'Gabfire Widget : Subscribe', $widget_ops, $control_ops);
	}	
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$user	= $instance['user'];
		$text	= $instance['text'];
		$bgcol	= $instance['bgcol'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
			
			<form class="feedburner_widget" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_attr( $user ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<fieldset <?php if ( $bgcol ) { echo 'style="background:' . esc_attr( $bgcol ) .'";'; } ?>>
					<input type="text" style="width:80%;<?php if ( $bgcol ) { echo 'background:' . esc_attr( $bgcol ); } ?>" class="text" name="email" value="<?php echo esc_attr( $text ); ?>" onfocus="if (this.value == '<?php echo esc_attr( $text ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr( $text ); ?>';}" />
					<input type="hidden" value="<?php echo esc_attr( $user ); ?>" name="uri" />
					<input type="hidden" name="loc" value="<?php bloginfo('language'); ?>"/>
					<input type="image" class="feedburner_submit" src="<?php bloginfo('template_url'); ?>/images/framework/add.png" alt="Subscribe" />
				</fieldset>
			</form>
			<?php 
		echo $after_widget; 
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['user'] = strip_tags($new_instance['user']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['bgcol'] = strip_tags($new_instance['bgcol']);
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Subscribe by Email', 'user' => '', 'text' => 'Enter your email');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>">Feedburner ID</label>
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($instance['user']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bgcol'); ?>">Background Color for input field (eg #efefef) </label>
			<input class="widefat" id="<?php echo $this->get_field_id('bgcol'); ?>" name="<?php echo $this->get_field_name('bgcol'); ?>" type="text" value="<?php echo esc_attr($instance['bgcol']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Text</label>
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($instance['text']); ?>" />
		</p>
		
	<?php
	}
}
register_widget('feedburner_widget');

/*
 * TWITTER WIDGET
 */

class tweet_widget extends WP_Widget {
 
	function tweet_widget() {
		$widget_ops = array( 'classname' => 'tweet_widget', 'description' => 'Display Latest Tweets' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'tweet_widget' );
		$this->WP_Widget( 'tweet_widget', 'Gabfire Widget : Latest Tweets', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {	  
		extract( $args );
		$title	= $instance['title'];
		$user	= $instance['user'];
		$link	= $instance['t_link'] ? '1' : '0';
		$anchor	= $instance['t_anchor'];
		$number = $instance['t_nr'];

		echo $before_widget;
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
			
			<div id="twitter_div">
				<ul id="twitter_update_list" class="twitter-list"><li></li></ul>
			</div>
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo esc_attr( $user ); ?>.json?callback=twitterCallback2&amp;count=<?php echo esc_attr( $number ); ?>"></script>
					  
			<?php 
			if($link) {
				echo '<span class="twitter_link"><a href="http://twitter.com/'. esc_attr( $user ) . '">' . esc_attr( $anchor ) . '</a></span>';
			}
		echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['user'] 		= strip_tags($new_instance['user']);
		$instance['t_link'] 	= $new_instance['t_link'] ? '1' : '0';
		$instance['t_anchor']	= strip_tags($new_instance['t_anchor']);
		$instance['t_nr'] 		= (int) $new_instance['t_nr'];  
		return $new_instance;
	}
 
	function form($instance) {
		$defaults = array( 'title' => 'Latest Tweets', 'user' => '', 't_link' => '0', 't_anchor' => '', 't_nr' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>">User</label>
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($instance['user']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name( 't_nr' ); ?>">How many tweets you like to display?</label>
			<select id="<?php echo $this->get_field_id( 't_nr' ); ?>" name="<?php echo $this->get_field_name( 't_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['t_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>		
		
		<p>
			<label for="<?php echo $this->get_field_id( 't_link' ); ?>">Show link to Twitter</label> 
			<select id="<?php echo $this->get_field_id( 't_link' ); ?>" name="<?php echo $this->get_field_name( 't_link' ); ?>">
				<option value="1" <?php if ( '1' == $instance['t_link'] ) echo 'selected="selected"'; ?>>Enable</option>
				<option value="0" <?php if ( '0' == $instance['t_link'] ) echo 'selected="selected"'; ?>>Disable</option>	
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('t_anchor'); ?>">Link label:
			<input class="widefat" id="<?php echo $this->get_field_id('t_anchor'); ?>" name="<?php echo $this->get_field_name('t_anchor'); ?>" type="text" value="<?php echo esc_attr($instance['t_anchor']); ?>" />
			</label>
		</p>
		
<?php
	}
}
register_widget('tweet_widget');

/*
 * SEARCH WIDGET
 */

class search_widget extends WP_Widget {
 
	function search_widget() {
		$widget_ops = array( 'classname' => 'search_widget', 'description' => 'Display Search Form' );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'search_widget' );
		$this->WP_Widget( 'search_widget', 'Gabfire Widget : Search', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {	  
		extract( $args );
		$title	= $instance['title'];
		$label	= $instance['label'];
		$s_style	= $instance['s_style'] ? '1' : '0';
		$bgcol	= $instance['bgcol'];
		$bordercol	= $instance['bordercol'];

		echo $before_widget;
			
				if ( $title ) {
					echo $before_title . $title . $after_title;
				}
			
				if($s_style == 1) {
				
				?>
					<form class="gab_search_style1" action="<?php bloginfo('url'); ?>">
						<fieldset style="<?php if ( $bgcol ) { echo 'background:' . esc_html( $bgcol ); echo ';';} if ( $bordercol ) { echo 'border-color:1px solid ' . esc_html( $bordercol ); echo ';';} ?>">
							<input type="text" style="width:80%;<?php if ( $bgcol ) { echo 'background:' . esc_attr( $bgcol ); } ?>" class="text" name="s" value="<?php echo esc_attr( $label ); ?>" onfocus="if (this.value == '<?php echo esc_attr( $label ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr( $label ); ?>';}" />
							<input type="image" class="submit_style1" src="<?php bloginfo('template_url'); ?>/images/framework/search.png" alt="<?php echo esc_attr( $label ); ?>" value="" />
							<div class="clearfix"></div>
						</fieldset>
					</form>				
				<?php } else { ?>
					<form action="<?php bloginfo('url'); ?>" class="gab_search_style2" style="background:url(<?php bloginfo('template_url'); ?>/images/framework/bgr_search_box.png) no-repeat;">
						<fieldset>
							<p><input type="submit" value="" class="submit_style2" /></p>
							<p><input type="text" class="text" name="s" value="<?php echo esc_attr( $label ); ?>" onfocus="if (this.value == '<?php echo esc_attr( $label ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr( $label ); ?>';}" /></p>
						</fieldset>
					</form>
				<?php 
				}
		echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['label'] 		= strip_tags($new_instance['label']);
		$instance['s_style']	= $new_instance['s_style'] ? '1' : '0';
		$instance['bgcol'] = strip_tags($new_instance['bgcol']);
		$instance['bordercol'] = strip_tags($new_instance['bordercol']);
		return $new_instance;
	}
 
	function form($instance) {
		$defaults = array( 'title' => 'Search in Site', 'label' => 'Search...', 'bgcol' => '#efefef','bordercol' => '#eee' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('label'); ?>">Search Label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('label'); ?>" name="<?php echo $this->get_field_name('label'); ?>" type="text" value="<?php echo esc_attr($instance['label']); ?>" />
		</p>
		
		<p>
			<select id="<?php echo $this->get_field_id( 's_style' ); ?>" name="<?php echo $this->get_field_name( 's_style' ); ?>">
				<option value="1" <?php if ( '1' == $instance['s_style'] ) echo 'selected="selected"'; ?>>Search Style 1</option>
				<option value="0" <?php if ( '0' == $instance['s_style'] ) echo 'selected="selected"'; ?>>Search Style 2</option>	
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bgcol'); ?>">Background color for input field</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bgcol'); ?>" name="<?php echo $this->get_field_name('bgcol'); ?>" type="text" value="<?php echo esc_attr($instance['bgcol']); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('bordercol'); ?>">Border color for input field</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bordercol'); ?>" name="<?php echo $this->get_field_name('bordercol'); ?>" type="text" value="<?php echo esc_attr($instance['bordercol']); ?>" />
		</p>

<?php
	}
}
register_widget('search_widget');



/*
 * ABOUT WIDGET
 */
class about_widget extends WP_Widget {
	function about_widget() {
		$widget_ops = array( 'classname' => 'about_widget', 'description' => 'Display an "about" widget' );
		$control_ops = array( 'width' => 400, 'height' => 350, 'id_base' => 'about_widget' );
		$this->WP_Widget( 'about_widget', 'Gabfire Widget : About', $widget_ops, $control_ops);	
	}
	
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$avatar	= $instance['a_avatar'] ? '1' : '0';
		$text	= $instance['a_text'];
		$link 	= $instance['a_link'];
		$anchor	= $instance['a_anchor'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			
			if($avatar) {
				echo '<div class="widget_avatar">' . get_avatar(get_bloginfo('admin_email'),'50') . '</div>';
			}	
			
			echo '<p>' . nl2br($text) . '</p><div class="clear"></div>';
				
			if($link) {
				echo '<span class="about_more"><a href="' . get_permalink($link) . '">'. $anchor . '</a></span>';
			}
			
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) {  
		$instance['title']		= strip_tags($new_instance['title']);
		$instance['a_avatar']	= $new_instance['a_avatar'] ? '1' : '0';
		$instance['a_text'] 	= strip_tags($new_instance['a_text']);
		$instance['a_link'] 	= strip_tags($new_instance['a_link']);
		$instance['a_anchor'] 	= strip_tags($new_instance['a_anchor']); 
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'About', 'a_avatar' => '1', 'a_text' => '', 'a_link' => '', 'a_anchor' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'a_avatar' ); ?>">Site Admin's Avatar</label> 
		<select id="<?php echo $this->get_field_id( 'a_avatar' ); ?>" name="<?php echo $this->get_field_name( 'a_avatar' ); ?>">
			<option value="1" <?php if ( '1' == $instance['a_avatar'] ) echo 'selected="selected"'; ?>>Enable</option>
			<option value="0" <?php if ( '0' == $instance['a_avatar'] ) echo 'selected="selected"'; ?>>Disable</option>	
		</select>
	</p>	
		
	<p>
		<label for="<?php echo $this->get_field_id('a_text'); ?>">About Text</label>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('a_text'); ?>" name="<?php echo $this->get_field_name('a_text'); ?>"><?php echo esc_attr($instance['a_text']); ?></textarea>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('a_link'); ?>">Post or Page ID for link</label>
		<input id="<?php echo $this->get_field_id('a_link'); ?>" name="<?php echo $this->get_field_name('a_link'); ?>" type="text" value="<?php echo esc_attr( $instance['a_link'] ); ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('a_anchor'); ?>">Link label</label>
		<input class="widefat" id="<?php echo $this->get_field_id('a_anchor'); ?>" name="<?php echo $this->get_field_name('a_anchor'); ?>" type="text" value="<?php echo esc_attr($instance['a_anchor']); ?>" />
	</p>
<?php
	}
}
register_widget('about_widget');

/*
 * SOCIALIZE WIDGET
 */
class social_widget extends WP_Widget {
	function social_widget() {
		$widget_ops = array( 'classname' => 'social_widget', 'description' => 'Display social icons on your site' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'social_widget' );
		$this->WP_Widget( 'social_widget', 'Gabfire Widget : Social', $widget_ops, $control_ops);	
	}
	function widget($args, $instance) {
		extract( $args );
		$title	= $instance['title'];
		$fbook	= $instance['fbook'] ? '1' : '0';
		$tweet	= $instance['tweet'] ? '1' : '0';
		$feed	= $instance['feed'] ? '1' : '0';
		$mspace	= $instance['mspace'] ? '1' : '0';
		$picasa	= $instance['picasa'] ? '1' : '0';
		$flickr	= $instance['flickr'] ? '1' : '0';
		$lastfm	= $instance['lastfm'] ? '1' : '0';
		$linkin	= $instance['linkin'] ? '1' : '0';
		$fbook_l	= $instance['fbook_l'];
		$tweet_l	= $instance['tweet_l'];
		$feed_l 	= $instance['feed_l'];
		$mspace_l	= $instance['mspace_l'];
		$picasa_l	= $instance['picasa_l'];
		$flickr_l	= $instance['flickr_l'];
		$lastfm_l	= $instance['lastfm_l'];
		$linkin_l	= $instance['linkin_l'];
		$margin_r	= $instance['margin_r'];
		$margin_l	= $instance['margin_l'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;	
			}
			
			if($fbook) { 
				echo '<a href="' . $fbook_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/facebook.png"'; echo ' title="Facebook" alt="Facebook" /></a>';
			}
			if($tweet) {
				echo '<a href="' . $tweet_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/twitter.png"'; echo ' title="Twitter" alt="Twitter" /></a>';
			}
			if($feed) {
				echo '<a href="' . $feed_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/feed.png"'; echo ' title="RSS" alt="RSS" /></a>';
			}
			if($mspace) {
				echo '<a href="' . $mspace_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/myspace.png"'; echo ' title="MySpace" alt="MySpace" /></a>';
			}
			if($picasa) {
				echo '<a href="' . $picasa_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/picasa.png"'; echo ' title="Picasa" alt="Picasa" /></a>';
			}
			if($flickr) {
				echo '<a href="' . $flickr_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/flickr.png"'; echo ' title="Flickr" alt="Flickr" /></a>';
			}
			if($lastfm) {
				echo '<a href="' . $lastfm_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/lastfm.png"'; echo ' title="LastFM" alt="LastFM" /></a>';
			}
			if($linkin) {
				echo '<a href="' . $linkin_l . '" rel="nofollow"><img src="'; bloginfo('template_url'); echo '/images/framework/social/linkedin.png"'; echo ' title="LinkedIn" alt="LinkedIn" /></a>';
			}
			echo '<div class="clear"></div>';
			
		echo $after_widget; 
	}
	
	function update($new_instance, $old_instance) { 
		$instance['title']	= strip_tags($new_instance['title']);
		$instance['fbook']	= $new_instance['fbook'] ? '1' : '0';
		$instance['tweet']	= $new_instance['tweet'] ? '1' : '0';
		$instance['feed']	= $new_instance['feed'] ? '1' : '0';
		$instance['mspace']	= $new_instance['mspace'] ? '1' : '0';
		$instance['picasa']	= $new_instance['picasa'] ? '1' : '0';
		$instance['flickr']	= $new_instance['flickr'] ? '1' : '0';
		$instance['lastfm']	= $new_instance['lastfm'] ? '1' : '0';
		$instance['linkin']	= $new_instance['linkin'] ? '1' : '0';
		$instance['fbook_l'] = strip_tags($new_instance['fbook_l']);
		$instance['tweet_l'] = strip_tags($new_instance['tweet_l']);
		$instance['feed_l']  = strip_tags($new_instance['feed_l']);
		$instance['mspace_l'] = strip_tags($new_instance['mspace_l']);
		$instance['picasa_l'] = strip_tags($new_instance['picasa_l']);
		$instance['flickr_l'] = strip_tags($new_instance['flickr_l']);
		$instance['lastfm_l'] = strip_tags($new_instance['lastfm_l']);
		$instance['linkin_l'] = strip_tags($new_instance['linkin_l']);
		return $new_instance;
	}
 
	function form($instance) {
		$defaults	= array( 'title' => 'Socialize', 'fbook' => '0', 'tweet' => '0', 'feed' => '0', 'mspace' => '0', 'picasa' => '0', 'flickr' => '0', 'lastfm' => '0', 'linkin' => '0');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
		
	<p>
		<select id="<?php echo $this->get_field_id( 'fbook' ); ?>" name="<?php echo $this->get_field_name( 'fbook' ); ?>">
			<option value="1" <?php if ( '1' == $instance['fbook'] ) echo 'selected="selected"'; ?>>Enable Facebook</option>
			<option value="0" <?php if ( '0' == $instance['fbook'] ) echo 'selected="selected"'; ?>>Disable Facebook</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('fbook_l'); ?>">Link to Facebook account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('fbook_l'); ?>" name="<?php echo $this->get_field_name('fbook_l'); ?>" type="text" value="<?php echo esc_attr($instance['fbook_l']); ?>" />
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'tweet' ); ?>" name="<?php echo $this->get_field_name( 'tweet' ); ?>">
			<option value="1" <?php if ( '1' == $instance['tweet'] ) echo 'selected="selected"'; ?>>Enable Twitter</option>
			<option value="0" <?php if ( '0' == $instance['tweet'] ) echo 'selected="selected"'; ?>>Disable Twitter</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('tweet_l'); ?>">Link to Twitter account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('tweet_l'); ?>" name="<?php echo $this->get_field_name('tweet_l'); ?>" type="text" value="<?php echo esc_attr($instance['tweet_l']); ?>" />
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'feed' ); ?>" name="<?php echo $this->get_field_name( 'feed' ); ?>">
			<option value="1" <?php if ( '1' == $instance['feed'] ) echo 'selected="selected"'; ?>>Enable RSS</option>
			<option value="0" <?php if ( '0' == $instance['feed'] ) echo 'selected="selected"'; ?>>Disable RSS</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('feed_l'); ?>">RSS Feed Link</label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed_l'); ?>" name="<?php echo $this->get_field_name('feed_l'); ?>" type="text" value="<?php echo esc_attr($instance['feed_l']); ?>" />
	</p>
		
	<p>
		<select id="<?php echo $this->get_field_id( 'mspace' ); ?>" name="<?php echo $this->get_field_name( 'mspace' ); ?>">
			<option value="1" <?php if ( '1' == $instance['mspace'] ) echo 'selected="selected"'; ?>>Enable MySpace</option>
			<option value="0" <?php if ( '0' == $instance['mspace'] ) echo 'selected="selected"'; ?>>Disable MySpace</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('mspace_l'); ?>">Link to Myspace account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('mspace_l'); ?>" name="<?php echo $this->get_field_name('mspace_l'); ?>" type="text" value="<?php echo esc_attr($instance['mspace_l']); ?>" />
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'picasa' ); ?>" name="<?php echo $this->get_field_name( 'picasa' ); ?>">
			<option value="1" <?php if ( '1' == $instance['picasa'] ) echo 'selected="selected"'; ?>>Enable Picasa</option>
			<option value="0" <?php if ( '0' == $instance['picasa'] ) echo 'selected="selected"'; ?>>Disable Picasa</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('picasa_l'); ?>">Link to Picasa account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('picasa_l'); ?>" name="<?php echo $this->get_field_name('picasa_l'); ?>" type="text" value="<?php echo esc_attr($instance['picasa_l']); ?>" />
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>">
			<option value="1" <?php if ( '1' == $instance['flickr'] ) echo 'selected="selected"'; ?>>Enable Flickr</option>
			<option value="0" <?php if ( '0' == $instance['flickr'] ) echo 'selected="selected"'; ?>>Disable Flickr</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('flickr_l'); ?>">Link to Flickr account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr_l'); ?>" name="<?php echo $this->get_field_name('flickr_l'); ?>" type="text" value="<?php echo esc_attr($instance['flickr_l']); ?>" />
	</p>

	<p>
		<select id="<?php echo $this->get_field_id( 'lastfm' ); ?>" name="<?php echo $this->get_field_name( 'lastfm' ); ?>">
			<option value="1" <?php if ( '1' == $instance['lastfm'] ) echo 'selected="selected"'; ?>>Enable LastFM</option>
			<option value="0" <?php if ( '0' == $instance['lastfm'] ) echo 'selected="selected"'; ?>>Disable LastFM</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('lastfm_l'); ?>">Link to Last.Fm account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('lastfm_l'); ?>" name="<?php echo $this->get_field_name('lastfm_l'); ?>" type="text" value="<?php echo esc_attr($instance['lastfm_l']); ?>" />
	</p>	
	
	<p>
		<select id="<?php echo $this->get_field_id( 'linkin' ); ?>" name="<?php echo $this->get_field_name( 'linkin' ); ?>">
			<option value="1" <?php if ( '1' == $instance['linkin'] ) echo 'selected="selected"'; ?>>Enable LinkedIn</option>
			<option value="0" <?php if ( '0' == $instance['linkin'] ) echo 'selected="selected"'; ?>>Disable LinkedIn</option>	
		</select>
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id('linkin_l'); ?>">Link to LinkedIn account</label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkin_l'); ?>" name="<?php echo $this->get_field_name('linkin_l'); ?>" type="text" value="<?php echo esc_attr($instance['linkin_l']); ?>" />
	</p>
	
<?php
	}
}
register_widget('social_widget');

/*
 * ARCHIVE WIDGET
 */
class archive_widget extends WP_Widget {

	function archive_widget() {
		$widget_ops = array( 'classname' => 'archive_widget', 'description' => 'Search in Archive');
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'archive_widget' );
		$this->WP_Widget( 'archive_widget', 'Gabfire Widget : Archive', $widget_ops, $control_ops);
	}	
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$date	= $instance['date'];
		$cat	= $instance['cat'];
		$google	= $instance['google'];
		$google_df	= $instance['google_df'];
		$bgcol	= $instance['bgcol'];
		
		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
				<div id="gab_archive_wrapper" style="background:<?php echo esc_attr( $bgcol ); ?>">
					<span class="archive_span"><?php echo esc_attr( $date ); ?></span>
					<form class="arc-dropdown" action="<?php esc_url(bloginfo('url')); ?>"  method="get" > 		
						<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
						<option value="">Select Month</option> 
						<?php wp_get_archives('type=monthly&format=option&nwsp_post_count=1'); ?> </select>
					</form>
					
					<span class="archive_span"><?php echo esc_attr( $cat ); ?></span>
					<form class="arc-dropdown" action="<?php esc_url(bloginfo('url')); ?>"  method="get" > 
						<?php wp_dropdown_categories('orderby=Name&hierarchical=1&nwsp_count=1'); ?>
					</form>
					
					<script type="text/javascript"><!--
						var dropdown = document.getElementById("cat");
						function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
								location.href = "<?php echo esc_url(get_option('home')); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
						}
						dropdown.onchange = onCatChange;
					--></script>
							
					<span class="archive_span"><?php echo esc_attr( $google ); ?></span>
					<form method="get" action="http://www.google.com/search">
						<input name="q" class="google" value="<?php echo esc_attr( $google_df ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /> 
						<input type="hidden" name="sitesearch" value="<?php esc_url(bloginfo('url')); ?>" />
					</form>		
				</div>
			<?php 		
		echo $after_widget; 
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['date'] = strip_tags($new_instance['date']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['google'] = strip_tags($new_instance['google']);
		$instance['google_df'] = strip_tags($new_instance['google_df']);
		$instance['bgcol'] = strip_tags($new_instance['bgcol']);
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'Search in Archive', 'date' => 'Select a date','bgcol' => '#fff', 'cat' => 'Select a category', 'google_df' => 'Write keyword and hit return', 'google' => 'Search with Google');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('date'); ?>">Date search string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo esc_attr($instance['date']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Category search string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo esc_attr($instance['cat']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>">Google search string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($instance['google']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('google_df'); ?>">Google field input string</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_df'); ?>" name="<?php echo $this->get_field_name('google_df'); ?>" type="text" value="<?php echo esc_attr($instance['google_df']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bgcol'); ?>">Background color (eg #fff or white)</label>
			<input class="widefat" id="<?php echo $this->get_field_id('bgcol'); ?>" name="<?php echo $this->get_field_name('bgcol'); ?>" type="text" value="<?php echo esc_attr($instance['bgcol']); ?>" />
		</p>
		
	<?php
	}
}
register_widget('archive_widget');

/*
 * MOST RECENT WIDGET
 */

class most_recent extends WP_Widget {
 
	function most_recent() {
		$widget_ops = array( 'classname' => 'most_recent', 'description' => 'Display recent entries and comments (ajax tab supported)' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'most_recent' );
		$this->WP_Widget( 'most_recent', 'Gabfire Widget : Most Recent', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {	  
		extract( $args );
		$title	= $instance['title'];
		$post_label	= $instance['post_label'];
		$post_nr	= $instance['post_nr'];
		$comment_label	= $instance['comment_label'];
		$comment_nr	= $instance['comment_nr'];
		$margin_r	= $instance['margin_r'];
		$margin_l	= $instance['margin_l'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>
			
			 <script type="text/javascript">
				(function($) { $(document).ready(function(){
					var tabContainers = $('div.sidebarTabs > div');
						tabContainers.hide().filter(':first').show();

						$('div.sidebarTabs ul.sidebarTabs_title a').click(function () {
							tabContainers.hide();
							tabContainers.filter(this.hash).show();
							$('div.sidebarTabs ul.sidebarTabs_title a').removeClass('selected');
							$(this).addClass('selected');
						return false;
					}).filter(':first').click();
				})})(jQuery)
			</script>

			<div class="sidebarTabs">
				<ul class="sidebarTabs_title">
					<li><a href="#new_entries"  rel="nofollow"><?php echo esc_attr( $post_label ); ?></a></li>
					<li><a href="#new_comments"  rel="nofollow"><?php echo esc_attr( $comment_label ); ?></a></li>
				</ul>

				<div id="new_entries" class="sidebarTabs_body">
					<?php the_widget('WP_Widget_Recent_Posts','before_widget=&after_widget=&title=&number='.esc_attr( $post_nr )); ?> 
				</div>

				<div id="new_comments" class="sidebarTabs_body">
					<?php the_widget('WP_Widget_Recent_Comments','title=&number='.esc_attr( $comment_nr )); ?> 
				</div>
			</div>
	
			<?php 
			
		echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['post_label'] 		= strip_tags($new_instance['user']);
		$instance['post_nr'] = (int) $new_instance['comment_label'];  
		$instance['comment_label']	= strip_tags($new_instance['t_anchor']);
		$instance['comment_nr'] 		= (int) $new_instance['comment_nr'];  
		return $new_instance;
	}
 
	function form($instance) {
		$defaults = array( 'title' => 'Most Recent', 'post_label' => 'Posts', 'comment_label' => 'Comments', 'post_nr' => '5', 'comment_nr' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('post_label'); ?>">Posts tab label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('post_label'); ?>" name="<?php echo $this->get_field_name('post_label'); ?>" type="text" value="<?php echo esc_attr($instance['post_label']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('comment_label'); ?>">Comments tab label</label>
			<input class="widefat" id="<?php echo $this->get_field_id('comment_label'); ?>" name="<?php echo $this->get_field_name('comment_label'); ?>" type="text" value="<?php echo esc_attr($instance['comment_label']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name( 'post_nr' ); ?>">Number of posts</label>
			<select id="<?php echo $this->get_field_id( 'post_nr' ); ?>" name="<?php echo $this->get_field_name( 'post_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['post_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_name( 'comment_nr' ); ?>">Number of Comments</label>
			<select id="<?php echo $this->get_field_id( 'comment_nr' ); ?>" name="<?php echo $this->get_field_name( 'comment_nr' ); ?>">			
			<?php
				for ( $i = 1; $i <= 15; ++$i )
				echo "<option value='$i' " . ( $instance['comment_nr'] == $i ? "selected='selected'" : '' ) . ">$i</option>";
			?>
			</select>
		</p>
<?php
	}
}
register_widget('most_recent');


add_action( 'widgets_init', 'my_unregister_widgets' );

function my_unregister_widgets() {
	unregister_widget( 'WP_Widget_Search' );
}
