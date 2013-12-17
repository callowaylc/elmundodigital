</section>

</div><!-- #wrapper -->

	<footer>

    <div id="footer1">     <div id="footerwrapper1"> 

    <div id="fsidebar1">                                            

      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Block 1') ) : ?> 		

      <?php endif; ?>            

    </div>

    <div id="fsidebar2">                                            

      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Block 2') ) : ?> 		

      <?php endif; ?>            

    </div> 

    <div id="fsidebar3">                                            

      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Block 3') ) : ?> 		

      <?php endif; ?>            

    </div>   

     <div id="fsidebar4">

    <div class="widget">

    <ul>

    <h3>About Our Site</h3>

    <ul><?php $otherFeaturedPost = new WP_Query();$otherFeaturedPost->query('page_id='.get_option('aboutpageid').''); ?>

<?php while ($otherFeaturedPost->have_posts()) : $otherFeaturedPost->the_post(); ?>  	

<?php the_content(); ?>		

<?php $c++; endwhile; wp_reset_query(); ?> </ul>

    </ul>

    </div>

    </div>     <div style="clear: both;"> </div> 

    </div>  </div>

 <div id="footer2">  <div id="footerwrapper2"> 

<div id="fotnav">

		 	<ul id="fnav">  <center> 

<?php wp_nav_menu( array( 'walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'third', 'container_id' => 'fotnav', 'container_class' => 'ddsmoothmenu1', 'fallback_cb'=>'secondarymenu') );?>

      </center>	</ul> 

         	</div> 

      <div id="fotbot">

      <div class="fotlogoleft"> 

        <div class="fotcopy">

   &copy; 2010 <?php echo get_option('copyrightxt'); ?> - All Rights Reserved | <a href="http://wpth.net" title="Wordpress Themes">Wordpress Themes</a>

        </div>     

		  </div>

	   	<div class="fotlogoright">

	   	 <ul id="skyline"> 

<li id="pad1">  <a href="<?php echo get_option('facebooklink'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/fot-fb.png" alt="Become a Fan!" /></a></li>

<li id="pad1">  <a href="http://twitter.com/<?php echo get_option('twitterlink'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/fot-twitter.png" alt="Follow On Twitter" /></a></li>

<li id="pad1"> <a href="<?php echo get_option('feedlink'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/fot-feed.png" alt="Subcribe to Our RSS Feed" /></a></li>

<li>

      	<form method="get" id="footersearch" action="<?php bloginfo('url'); ?>/">

			           <input type="text" name="s" value="Search News - Enter Keyword" onblur="if(this.value=='') this.value='Search News - Enter Keyword';" onfocus="if(this.value=='Search News - Enter Keyword') this.value='';" id="s" />

			<input type="submit" value=" " id="searchsubmit" />

		   </form> 

</li>  

     

       </ul>

	   	</div>

    	<div id="cb"></div>

   </div>

  </div>   

	</footer>

<?php wp_footer(); ?>

<?php echo get_option('fscript'); ?>

</body>

</html>