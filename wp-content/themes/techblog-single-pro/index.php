<?php get_header(); ?>	
<section>    
	<?php if ( $paged < 2)  	  { ?>
  <div id="headgal">
    	<div id="featured"> 
		<a class="prevPage browse left"></a>
		<div class="scrollable">	
			<div id="thumbs">
 <?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('showposts=12&cat='.get_option('fslider').'&offset=0'); ?> 
  <?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?> 
	<div class="slide">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">	
					  <?php the_post_thumbnail( 'featured-thumb', 'title='.get_option('title').'' ); ?>
					</a>
 					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
					 <?php $c++; endwhile; wp_reset_query(); ?> 	 
			</div>		 
		</div>
		<a class="nextPage browse right"></a>
	<div id="theticker">
    <div id="m3ticker">
       <div id="tickimg">   <img src="<?php bloginfo('template_directory'); ?>/images/latestnews.png" alt="Hot News" />    </div>  
          <div id="ticker-area">  <ul><?php magazine3_ticker(); ?></ul> </div>
   <div id="cb"></div>
    </div>  <div class="navi"></div>  <div id="cb"></div>
    </div>    
    </div>        
  </div> <?php } ?>  		
  <div id="content">	 
  <div id="indextop">	<?php if ( $paged < 2)  	  { ?>
    <div id="indextopleft">
    <div>
     <?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('showposts=1&cat='.get_option('faone').'&offset=0'); ?> 
  <?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?> 
				<div class="indextopleftslide" style="height: 270px">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">  <?php the_post_thumbnail( 'indextopbig', 'title='.get_option('title').'' ); ?>	</a>
                    <div class="indextopleftabsolute"><h3><?php the_category(' ') ?></h3>
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2></div>	
                         </div> 	 
                      <?php $c++; endwhile; wp_reset_query(); ?>   	 
  </div>
  <div id="twocats">
    <div id="twocatsleft">
     <?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('showposts=1&cat='.get_option('fatwo').'&offset=0'); ?> 
  <?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?> 
      
				<div class="indextopleftslide">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">  <?php the_post_thumbnail( 'indextoptwocat', 'title='.get_option('title').'' ); ?>	</a>
                    <div class="indextopleftabsolute1"><h3><?php the_category(' ') ?></h3>
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2></div>	
                         </div> 	 
                         <?php $c++; endwhile; wp_reset_query(); ?>   
    </div>
    <div id="twocatsright">
    	 <?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('showposts=1&cat='.get_option('fathree').'&offset=0'); ?> 

  <?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?> 
				<div class="indextopleftslide">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">  <?php the_post_thumbnail( 'indextoptwocat', 'title='.get_option('title').'' ); ?>	</a>
                    <div class="indextopleftabsolute2"><h3><?php the_category(' ') ?></h3>
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2></div>	
                         </div> 	 
                         <?php $c++; endwhile; wp_reset_query(); ?> 
    </div>
    <div id="cb"></div>
  </div>
    </div>
    <div id="indextopright">

    <div id="tipsbg"><?php echo get_option('recenttipstxt'); ?></div> 
          <div class="thirdsmallsidebar"> 
         	 <?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('showposts=3&cat='.get_option('recenttips').'&offset=0'); ?> 
  <?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?> 
				<div class="widgetcontentsmall">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> - <?php the_content_limit(110); ?> 
            <div class="timeago"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?> | <span id="commentbuble"><?php comments_popup_link('0', '1', '%'); ?></span> </div>  </div>	
                     	 
                      <?php $c++; endwhile; wp_reset_query(); ?>     </div> 
 
  </div>   
     
    <div id="cb"></div> <?php } ?>
  </div>
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
           <div id="socialblog">
      <div id="tblog">   
<a href="http://twitter.com/share?url=<?php echo urlencode(wp_get_shortlink()); ?>&amp;counturl=<?php urlencode(the_permalink()); ?>" class="twitter-share-button" data-count="horizontal" data-via="<?php echo get_option('twitterlink'); ?>">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div><div id="fblog"> 
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=75&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:78px; height:21px;" allowTransparency="true"></iframe>  </div> <div id="cb"></div>
 </div><div id="cb"></div>
      </div>			
      <div class="entry">	
      <?php
if( has_post_thumbnail() ) { ?>  <span id="blogthumb">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homethumb', 'title='.get_option('title').'' ); ?></a>	</span>
<?php } else { ?>
 
<?php } ?>
      	
     <?php the_content_limit(390); ?> 			
      </div>			
      <div class="ptags">
      <span id="cathome"><?php the_category(' / ') ?> </span>  
  <img id="tagimg" src="<?php bloginfo('template_directory'); ?>/images/tag.png" alt="Article tagged as" />  <?php the_tags('', ', ', ''); ?>
      </div>		
    </article>		
   <?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>  

</div><div id="paginationtech">
<?php if ( function_exists('fb_paging_bar') ) fb_paging_bar(); ?>   </div>   
 <?php if(get_option('ad3ok')!="yes"):?><?php endif?> 
    <?php if(get_option('ad3ok')!="no"):?><center><?php echo get_option('ad3'); ?></center><?php endif?>
 
   <?php include(TEMPLATEPATH . '/sidebar.php'); ?>  
    <?php get_footer(); ?>