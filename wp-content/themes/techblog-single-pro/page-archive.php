<?php /* Template Name: Archive Page */ ?>  <?php get_header(); ?>
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
			</div><!-- /#thumbs -->			 
		</div> <!-- /#scrollable -->
		<a class="nextPage browse right"></a>
	<div id="theticker">
    <div id="m3ticker">
       <div id="tickimg">        <img src="<?php bloginfo('template_directory'); ?>/images/youarehere.png" alt="" />    </div>  
          <div id="m3crumbs">	<?php if (function_exists('m3crumb')) m3crumb(); ?></div>
   <div id="cb"></div>
    </div>  <div class="navi"></div>  <div id="cb"></div>
    </div>
    </div><!-- /#featured -->        
 <div id="content">	
 <style> #thearchivelist{ width: 200px;float:left; }   #thearchivelist ul li{ list-style:none; } #thearchivelist ul h4{ font-size:16px !important;padding: 0 3px 0 0 !important;margin: 0px 0 5px 0 !important;border-bottom: 1px solid #ddd }</style>
<div id="thearchivelist">

<ul><h4>Pages:</h4>
<?php wp_list_pages('title_li='); ?>
</ul>
<br />
<ul><h4>By Month:</h4>
<?php wp_get_archives('type=monthly'); ?>
</ul>
<br />
<ul><h4>By Category:</h4>
<?php wp_list_categories('sort_column=name&title_li='); ?>
</ul><br />
</div>
<div style="width: 430px;float:right">
<h4 style="margin: 0 0 9px 0 !important;font-size: 17px !important;border-bottom: 1px solid #ddd;padding: 0 0px 0 0 !important;">Some users like to browse <b>Article Archives</b></h4>
<ul style="padding-left: 13px !important;">
<?php wp_get_archives('type=postbypost&limit=45'); ?>
</ul>
</div> <div class="clr"></div>
 </div>  
 <?php include(TEMPLATEPATH . '/sidebar-post.php'); ?>  
<?php get_footer(); ?>