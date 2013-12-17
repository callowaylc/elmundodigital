<script type="text/javascript">
	(function($) { $(document).ready(function(){
		$('#gab_slides').slides({
			<?php if(get_option('of_ln_inner_rotate') == 'true') { ?>
			play: <?php if ( get_option('of_ln_inner_pause') <> "" ) { echo get_option('of_ln_inner_pause').'000'; } else { echo '5000'; } ?>,
			pause: 2500,
			hoverPause: true,
			<?php } ?>
			preload: true,
			autoHeight: true,
			preload: true,
			autoHeight: true
		});
	})})(jQuery)
</script>

<?php
$number_photos = -1; 		// -1 to display all
$photo_size = 'large';		// The standard WordPress size to use for the large image
$thumb_size = 'thumbnail';	// The standard WordPress size to use for the thumbnail
$thumb_width = 65;			// Size of thumbnails to embed into img tag
$thumb_height = 50;			// Size of thumbnails to embed into img tag
$photo_width = 619;		// Width of photo
$wraper_width = 625;		// Width of wrapper div that surrounds image

$attachments = get_children( array(
'post_parent' => $post->ID,
'numberposts' => $number_photos,
'post_type' => 'attachment',
'post_mime_type' => 'image',
'order' => 'ASC', 
'orderby' => 'menu_order date')
);

if ( !empty($attachments) ) :
	$counter = 0;
	$photo_output = '';
	$thumb_output = '';	
	foreach ( $attachments as $att_id => $attachment ) {
		$counter++;
		
		# Caption
		$caption = "";
		if ($attachment->post_excerpt) 
			$caption = '<p class="sliderCaption">'.$attachment->post_excerpt.'</p>';	
			
		# Large photo
		$src = wp_get_attachment_image_src($att_id, $photo_size, true);
			$photo_output .= /*<a href="'. $src[0] .'">*/'<img style="width:'.$photo_width.'px;display:block;" src="'. esc_url($src[0]) .'" alt="" />'; 
		
		# Thumbnail
		$src = wp_get_attachment_image_src($att_id, $thumb_size, true);
		$thumb_output .= '<li><a href="#" class="toc"><img src="'. esc_url($src[0]) .'"  width="'.$thumb_width.'" alt="" />' . "</a></li>\n"; 
	}  
endif; ?>

<?php if ($counter > 1) : ?>

	<div id="gab_slides" style="width:<?php echo $wraper_width; ?>px;">
		<div class="slides_container" style="width:<?php echo $wraper_width; ?>px;">
			<?php echo $photo_output; ?>
		</div>
		<a href="#" class="prev"><img src="<?php esc_url( bloginfo('template_url') ); ?>/images/framework/arrow-prev.png" width="9" height="11" alt=""></a>
		<a href="#" class="next"><img src="<?php esc_url( bloginfo('template_url') ); ?>/images/framework/arrow-next.png" width="9" height="11" alt=""></a>
		<div class="clear"></div>
	</div>
	
	<div class="clear"></div>
<?php endif; ?>
