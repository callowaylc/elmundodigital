<?php
	function call_flv_with_add ($parameters){
		global $post, $gab_flv, $ad_flv;
		
			$video_id = $parameters['name'].'_'.$parameters['video_id'].'_'.$post->ID;
			
			echo '
				<span class="'.$parameters['thumb_align'].'">
					<a href="'.esc_url($gab_flv).'" style="display:block;width:'.$parameters['media_width'].'px;height:'.$parameters['media_height'].'px" id="'.$video_id.'"></a> 
					<script type="text/javascript">
						$f("'.$video_id.'", "http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf", {

							// controlbar is initially hidden
							plugins: {
								controls:  {display: "none" }
							},
							
							// properties that are common to both clips in the playlist
							clip: {
								baseUrl: "http://blip.tv/file/get",
								wmode: "transparent",
							},
							
							// playlist with two entries
							playlist: [
							
								// user is forced to see this entry. pause action is disabled
								{
									url: "'. esc_url( $ad_flv ).'",

									onBeforePause: function() {
										return false;
									} 
								},
								
								// this is the actual video. controlbar is shown
								{
									url: "'. esc_url( $ad_flv ).'",
									onStart: function() {
										this.getControls().show();
									}, 
									
									// when playback finishes player is resumed back to its original state
									onFinish: function() {
										this.unload();
									}
								}	
							]
						});				
					</script>
				</span>';
	}

	function call_flv ($parameters){
		global $post, $gab_flv;
			$video_id = $parameters['name'].'_'.$parameters['video_id'].'_'.$post->ID;
			echo '
			<span class="'.$parameters['thumb_align'].'">
				<a href="'.esc_url($gab_flv).'" style="display:block;width:'.$parameters['media_width'].'px;height:'.$parameters['media_height'].'px" id="'.$video_id.'"></a> 				
				<script type="text/javascript">
				   flowplayer(
					  "'.$video_id.'",
					  { src:"'; echo GABFIRE_JS_DIR . '/flowplayer/flowplayer-3.2.7.swf",
						wmode: "opaque" },
					  { clip: {
						  autoPlay: false,
						  autoBuffering: true  }
					  }
				   );
				</script>
			</span>';
	}
	
	function call_swf ($parameters){
		global $post, $gab_video;
		$gab_video = get_post_meta($post->ID, 'video', TRUE);
		echo '
			<span class="'.$parameters['thumb_align'].'">
				<object type="application/x-shockwave-flash" style="width:'.$parameters['media_width'].'px; height:'.$parameters['media_height'].'px;" data="'. esc_url ( $gab_video ) .'">
				<param name="wmode" value="opaque" /><param name="movie" value="'. esc_url ( $gab_video ) .'" /></object>
			</span>'; 
	}
	
	function call_youtube ($parameters){
		global $post, $gab_youtube;
		$gab_youtube = get_post_meta($post->ID, 'youtube', TRUE);
		echo '
			<span class="'.$parameters['thumb_align'].'">		
				<iframe title="';the_title(''); echo '" src="'. esc_url($gab_youtube) .'" width="'.$parameters['media_width'].'" height="'.$parameters['media_height'].'"></iframe>
			</span>'; 
	}
	
	function call_vimeo ($parameters){
		global $post, $gab_vimeo;
		$gab_vimeo = get_post_meta($post->ID, 'vimeo', TRUE);
		echo '
		<span class="'.$parameters['thumb_align'].'">
			<iframe title="';the_title(''); echo '" src="'. esc_url($gab_vimeo) .'" width="'.$parameters['media_width'].'" height="'.$parameters['media_height'].'"></iframe>
		</span>';
	}
	
	function call_cfield ($parameters){
		global $post;
		$url = get_post_meta($post->ID, 'thumbnail', TRUE);
		echo '<img class="'.$parameters['thumb_align'].'" src="' . esc_url( get_bloginfo('template_url') . '/timthumb.php?src='.urlencode($url).'&amp;q=90&amp;w='.$parameters['media_width'].'&amp;h='.$parameters['media_height'].'&amp;zc=1" width="'.$parameters['media_width'].'" height="'.$parameters['media_height'] ) .'" alt="';the_title(''); echo '" />';
	}
	
	function post_thumbCrop ($parameters){
		global $post;
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'themegab_featured' );
		$url = $thumb['0'];
		echo '<img src="';esc_url(bloginfo('template_url')); echo '/timthumb.php?src='.urlencode($url).'&amp;q=90&amp;w='.$parameters['media_width'].'&amp;h='.$parameters['media_height'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" alt="" />';
	}
	
	function post_thumbResizeW ($parameters){
		global $post;
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'themegab_featured' );
		$url = $thumb['0'];
		echo '<img src="';esc_url(bloginfo('template_url')); echo '/timthumb.php?src='.urlencode($url).'&amp;q=90&amp;w='.$parameters['media_width'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" alt="';the_title(''); echo '" />';
	}
	
	function post_thumbResizeH ($parameters){
		global $post;
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'themegab_featured' );
		$url = $thumb['0'];
		echo '<img src="';esc_url(bloginfo('template_url')); echo '/timthumb.php?src='.urlencode($url).'&amp;q=90&amp;h='.$parameters['media_height'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" alt="';the_title(''); echo '" />';
	}
	
	function call_firstimage ($parameters){
		$url = catch_that_image();
		echo '<img src="';esc_url(bloginfo('template_url')); echo '/timthumb.php?src='.urlencode($url).'&amp;q=90&amp;w='.$parameters['media_width'].'&amp;h='.$parameters['media_height'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" alt="';the_title(''); echo '" />';
	}
	
	function call_default_thumb ($parameters){
		global $post;
		echo '<img src="';esc_url(bloginfo('template_url')); echo '/images/thumbs/'.$parameters['default_name'].'" class="'.$parameters['thumb_align'].'" alt="';the_title(''); echo '" />';
	}

function gab_media($parameters) {
	global $post,$gab_video,$gab_thumb,$gab_flv,$gab_youtube,$gab_vimeo;
		
	$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
	$gab_video = get_post_meta($post->ID, 'video', TRUE);
	$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE);
	$ad_flv = get_post_meta($post->ID, 'adflv', TRUE);
	$gab_youtube = get_post_meta($post->ID, 'youtube', TRUE);
	$gab_vimeo = get_post_meta($post->ID, 'vimeo', TRUE);

	if($ad_flv != '' and $gab_flv != '' and $parameters['enable_video'] == 'true') { 
		call_flv_with_add ($parameters);
	}
	elseif($gab_flv != '' and $parameters['enable_video'] == 'true') { 
		call_flv ($parameters);
	}
	elseif ($gab_video != '' and $parameters['enable_video'] == 'true' ) { 
		call_swf ($parameters);
	}
	elseif ($gab_youtube != '' and $parameters['enable_video'] == 'true' ) { 
		call_youtube ($parameters);
	}
	elseif ($gab_vimeo != '' and $parameters['enable_video'] == 'true' ) { 
		call_vimeo ($parameters);
	}
	elseif($gab_thumb !== '' and $parameters['enable_thumb'] == 'true') { 
		call_cfield ($parameters);
	}
	elseif ( has_post_thumbnail() and $parameters['enable_thumb'] == 'true' and $parameters['resize_type'] == 'c' ) { 
		post_thumbCrop ($parameters);
	} 
	elseif ( has_post_thumbnail() and $parameters['enable_thumb'] == 'true' and $parameters['resize_type'] == 'w' ) { 
		post_thumbResizeW ($parameters);
	} 
	elseif ( has_post_thumbnail() and $parameters['enable_thumb'] == 'true' and $parameters['resize_type'] == 'h' ) { 
		post_thumbResizeH ($parameters);
	}
	else {
		$url = catch_that_image();
		if( (isset($url)) and ($parameters['catch_image'] == 'true'))  {
			call_firstimage ($parameters);
		}
		elseif($parameters['enable_default'] == 'true') {
			call_default_thumb ($parameters);
		} 
	}
}