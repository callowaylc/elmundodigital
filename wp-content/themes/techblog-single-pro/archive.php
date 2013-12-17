<?php get_header(); ?>
<section>    
  <div id="headgal">
     <div id="featured" style="padding-left: 14px !important;">
	<a class="prevPage browse left"></a>
		<div class="scrollable" style="height: 60px !important">	
				<div id="thumbs">
 <?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('showposts=12&cat='.get_option('fslider').'&offset=0'); ?> 
  <?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?> 
<div class="slidesingle">
			 <span id="slidesingleimg">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('singlegalthumb', 'title='.get_option('title').'' ); ?></a>	</span>
						<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div id="cb"></div>
			 	</div>
					 <?php $c++; endwhile; wp_reset_query(); ?> 	 
			</div>		 
		</div> 
		<a class="nextPage browse right"></a>
	<div id="theticker">
    <div id="m3ticker">
       <div id="tickimg">        <img src="<?php bloginfo('template_directory'); ?>/images/youarehere.png" alt="" />    </div>  
          <div id="m3crumbs">	<?php if (function_exists('m3crumb')) m3crumb(); ?></div>

   <div id="cb"></div>
    </div>  <div class="navi"></div>  <div id="cb"></div>
    </div>
    </div>      
 <div id="content">	 
 <div style="height: 4px;"></div>
	  <?php if (have_posts()) : ?>
 	  <?php $post = $posts[0]; ?>
 	  <?php if (is_category()) { ?>    
		<h2 class="pagetitle"> <a href="<?php get_category_rss_link(true, $cat, $category->category_nicename); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="rss" /></a> <?php _e('Category archive for'); ?>  &#8216;<?php single_cat_title(); ?>&#8217; </h2>
 	  
 	  <?php } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php _e('Tag archive for'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  
 	  <?php } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php _e('Date archive for'); ?> <?php the_time('F jS, Y'); ?></h2>
 	  
 	  <?php } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php _e('Date archive for'); ?> <?php the_time('F, Y'); ?></h2>
 	  
 	  <?php } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php _e('Date archive for'); ?> <?php the_time('Y'); ?></h2>
	  
 	  <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives'); ?></h2>
 	  <?php } ?>
   <ul>
		<?php while (have_posts()) : the_post(); ?>
		<?php endwhile; ?>
	</ul>
	<?php else : ?>
		<h2><?php _e('Not Found'); ?></h2>
	<?php endif; ?>
  <?php if(get_option('ad6ok')!="yes"):?><?php endif?> 
    <?php if(get_option('ad6ok')!="no"):?><center style="margin-top: 5px;"><?php echo get_option('ad6'); ?></center><?php endif?>
<div id="thebottomarchive">
	<?php if (have_posts()) : ?>

    <ul class="archive-list clearfloat">
			<?php while (have_posts()) : the_post(); ?>
		<li class="clearfloat">
            
<a href="<?php the_permalink(); ?>">
   <?php
if( has_post_thumbnail() ) { ?>
<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('archivethumb'); ?> </a>
<?php } else { ?>
<a href="<?php the_permalink(); ?>"> <img src="<?php bloginfo('template_directory'); ?>/images/smallthumb.jpg" style="width:90px; height:60px;" /> </a>
<?php } ?>   </a>
	<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4> 
 	
    			<div class="pmetachive">On <?php the_time('n M') ?> - <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('# Comments')); ?></div>
     	</li>       
	<?php endwhile; ?> <div id="cb"></div>
	</ul>
 	<div id="cb"></div>
 <div class="newer-older"><?php posts_nav_link(' ',__('<div style="float:left">&#171; Newer posts</div>'),__('<div style="float:right">Older posts &#187;</div>')) ?><div class="clr"></div></div>
<?php else : ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
</div> 
<?php if(get_option('ad7ok')!="yes"):?><?php endif?> 
    <?php if(get_option('ad7ok')!="no"):?><center><?php echo get_option('ad7'); ?></center><?php endif?>
  </div>
 <?php include(TEMPLATEPATH . '/sidebar-archive.php'); ?>  
<?php get_footer(); ?>