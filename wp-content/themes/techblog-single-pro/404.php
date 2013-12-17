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
 <div id="content">	 
 
 
   
<div id="thebottomarchive">
<div style="font-family:'Droid Serif',Georgia,Sans-serif; font-size: 20px;margin-top: 8px;line-height:27px">
<center><b>*404* - Not Found </b></center><br />
Sorry, we can't find the content you're looking for at this URL. Please navigate from the navigation menu on top or try searching below..<br />
<center> <h3>.... Try to Search below</h3>
  <div class="fsearchbg1"> 
      	<form method="get" id="footersearch1" action="<?php bloginfo('url'); ?>/">
<input type="text" name="s" value="Search News - Enter Keyword" onblur="if(this.value=='') this.value='Search News - Enter Keyword';" onfocus="if(this.value=='Search News - Enter Keyword') this.value='';" id="s" />
			<input type="submit" value=" " id="searchsubmit" />
		   </form>
       </div></center>

</div>
</div> 
<?php if(get_option('ad7ok')!="yes"):?><?php endif?> 
    <?php if(get_option('ad7ok')!="no"):?><center><?php echo get_option('ad7'); ?></center><?php endif?>
  </div>
 <?php include(TEMPLATEPATH . '/sidebar-archive.php'); ?>  
<?php get_footer(); ?>