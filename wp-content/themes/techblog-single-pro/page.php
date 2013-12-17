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
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post">
			<h2>  <?php the_title(); ?></h2>
			<div class="pmetasingle"> Posted By <b><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s'), get_the_author() ); ?>"><?php the_author(); ?> </a></b>  
            	       On <?php the_time('l, F jS, Y') ?>

 With <a href="#comments"> <?php comments_number('0 Comments','1 Comment','2 Comments'); ?></a>  

   <?php edit_post_link('Edit', ' <span>&middot;</span> ', ''); ?>     
            </div>
			<div class="entry">
			  <?php the_content(); ?>
			</div>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<div class="ptags"><?php the_tags('Tags: ', ', ', ''); ?></div>
		</article>
	<?php endwhile; else: ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
<div id="related" class="clearfix">
	<div id="sharemark">
<div style="float: left;"><h1>Share This &#62; </h1></div>
 <div class="share"> <ul>   <li>  <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;"> 

                        <img src="<?php bloginfo('template_directory'); ?>/images/delicious.png" alt="Add to Delicious" border="0" /></a> 
                      </li>  
                      <li>
                      <a href="javascript:var d=document,f='http://www.facebook.com/share',l=d.location,e=encodeURIComponent,p='.php?src=bm&amp;v=4&amp;i=1245532349&amp;u='+e(l.href)+'&amp;t='+e(d.title);1;try{if (!/^(.*\.)?facebook\.[^.]*$/.test(l.host))throw(0);share_internal_bookmarklet(p)}catch(z) {a=function() {if (!window.open(f+'r'+p,'sharer','toolbar=0,status=0,resizable=1,width=626,height=436'))l.href=f+p};if (/Firefox/.test(navigator.userAgent))setTimeout(a,0);else{a()}}void(0)" onclick="return wait_for_load(this, event, function() { return false });" id="share_bookmark" title="Share on Facebook">
                        <img src="<?php bloginfo('template_directory'); ?>/images/facebookicon.png" border="0" /></a>
                      </li>
                      <li>
                      <a href="http://friendfeed.com/?url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" target="_blank">
                        <img src="<?php bloginfo('template_directory'); ?>/images/friendfeed.png" alt="Share on FriendFeed" border="0" /></a> </li>
                                          <li>

                      <a href='javascript:(function(){var a=window,b=document,c=encodeURIComponent,d=a.open("http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk="+c(b.location)+"&amp;title="+c(b.title),"bkmk_popup","left="+((a.screenX||a.screenLeft)+10)+",top="+((a.screenY||a.screenTop)+10)+",height=420px,width=550px,resizable=1,alwaysRaised=1");a.setTimeout(function(){d.focus()},300)})();'> 

                        <img src="<?php bloginfo('template_directory'); ?>/images/google.png" border="0" /> </a>

                      </li>

                      

               <li><a href="http://digg.com/submit?phase=2&url=<?php the_permalink();?>&title=<?php the_title();?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/digg.png" alt="Digg" /></a></li>

                        <li><a href="http://twitter.com/home?status=Currently reading <?php the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twittericon.png" alt="" width="32px" height="32px" /></a></li>

                      <li>  

                      <a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> 

                        <img src="<?php bloginfo('template_directory'); ?>/images/reddit.png" alt="submit to reddit" border="0" /> </a>

                      </li>

                   

                      <li>

                      <a href="javascript:location.href='http://www.myspace.com/Modules/PostTo/Pages/?c='+encodeURIComponent(location.href)+'&amp;t='+encodeURIComponent(document.title)"> 

                        <img src="<?php bloginfo('template_directory'); ?>/images/myspace.png" border="0" /> </a>

                      </li>

                     
                     
                      <li>   

                      <a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>">

                        <img src="<?php bloginfo('template_directory'); ?>/images/stumbleupon.png" border="0" /></a>    
                      </li>
                      <li>   
                      <a href="javascript:void(document.location='http://technorati.com/faves?sub=favthis&amp;add='+escape(document.location))">
                        <img src="<?php bloginfo('template_directory'); ?>/images/technorati.png" border="0" /></a> 
                      </li>
                        <li>   
                      <a href="RSS">
                        <img src="<?php bloginfo('template_directory'); ?>/images/rssiconsingle.png" border="0" /></a> 
                      </li>            </ul>
        </div>
	<div id="cb"></div>
</div>
</div> <div id="cb"></div>
		<?php comments_template(); ?>
 </div>  
 <?php include(TEMPLATEPATH . '/sidebar-post.php'); ?>  
<?php get_footer(); ?>