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
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('singlegalthumb'); ?></a>	</span>		
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
 <style>.entry p{margin-bottom: 2px !important}#content .post {padding-top: 0px !importanty}</style>
 <div id="content">	
 <div id="homepost">
 <?php if(get_option('ad2ok')!="yes"):?><?php endif?> 
    <?php if(get_option('ad2ok')!="no"):?> <center>  <?php echo get_option('ad2'); ?> </center><?php endif?> 
 <?php if (is_home()) { $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("cat=".get_option('excludecats')."&paged=$paged"); } ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 	
    <article class="post">			<h3>
        <a href="<?php the_permalink() ?>" rel="bookmark">
          <?php the_title(); ?></a></h3>		
      <div class="pmeta">
      By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s'), get_the_author() ); ?>"><?php the_author(); ?></a>   | 
  On <?php the_time('l, F jS, Y') ?> - <span id="geor"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>
              <?php edit_post_link('Edit', ' <span>&middot;</span> ', ''); ?> 
         <div id="cb"></div>
      </div>			
      <div class="entry">	
      <?php
if( has_post_thumbnail() ) { ?>  <span id="blogthumb">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homethumb'); ?></a>	</span>
<?php } else { ?>
<?php } ?>
     <?php the_content_limit(500); ?> 			
      </div>			
    </article>		
   <?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>  
</div>
<div id="paginationtech">
<?php if ( function_exists('fb_paging_bar') ) fb_paging_bar(); ?>   </div>
 </div>  
 <?php include(TEMPLATEPATH . '/sidebar-post.php'); ?>  
<?php get_footer(); ?>