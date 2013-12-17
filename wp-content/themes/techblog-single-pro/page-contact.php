<?php /* Template Name: Contact Page */ ?>
 <?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = ''.get_option('cmail').'';
			$subject = 'Contact Form Submission from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed contact form Yourself from '.get_option('cmail').'';
				$headers = 'From: Your Name <'.get_option('cmail').'>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>
<?php get_header(); ?>

<style>
ol.forms { float: left; list-style: none; margin: 0; width: 100%;     margin: 0 !important;}
ol.forms li { 
	clear: both; 
	float: left; 
	position: relative; padding: 7px 0 !important;
	width: 100%;
}
ol.forms label {
	cursor: pointer;
	display: block;
	float: left;
	font-weight: bold;
	padding-right: 20px;
	width: 100px;
}
ol.forms input, ol.forms textarea {
	border: 1px solid #7E8AA2;
	border-radius: 3px;
	font: inherit;
	-moz-border-radius: 3px;
	padding: 2px;
	-webkit-border-radius: 3px;
	width: 214px;
}
ol.forms textarea { height: 140px;     width: 494px; }
ol.forms input:focus, ol.forms textarea:focus { background-color: #f2f3f6; border-color: #ff9800; }
.error { color: #f00; }
ol.forms li .error { font-size: 12px; margin-left: 20px; }
ol.forms li.textarea .error {
	display: block;
	position: absolute;
	right: 0;
	top: 0;
	width: 100px;
}
ol.forms li.screenReader { margin-bottom: 0; }
ol.forms li.buttons button { 
     border-radius:6px;-moz-border-radius:6px;-khtml-border-radius:6px;-webkit-border-radius:6px;
 	background: #42B1D5;
	border: none;
	color: #fff;
	cursor: pointer;
	font: 17px "Avenir LT Std", Helvetica, Arial, sans-serif;
	overflow: hidden;
	padding: 2px 5px;
	text-transform: uppercase;
	width: auto;
}
ol.forms li.buttons button:hover { color: #eee;  }
ol.forms li.buttons button:active { left: -1px; position: relative; top: -1px; }
ol.forms li.buttons, ol.forms li.inline { float: right;    width: 530px; }
ol.forms li.inline input { width: auto; }
ol.forms li.inline label { display: inline; float: none; width: auto; }
</style>
 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/contact-form.js"></script> 
<section>    
  <div id="headgal">
         
 <div id="content">	
	 

		<article class="post">
	 
<?php if(isset($emailSent) && $emailSent == true) { ?>

	<div class="thanks">
		<h1>Thanks, <?=$name;?></h1>
		<p>Your email was successfully sent. I will be in touch soon.</p>
	</div>

<?php } else { ?>

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
  <div class="ptitle">                   

              <?php the_title(); ?>  

            </div>					             



<br />
   
    <div id="mycontent"> 

            <?php the_content(); ?>              
	 
		
		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<p class="error">There was an error submitting the form.<p>
		<?php } ?>
	
		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
	
			<ol class="forms">
				<li><label for="contactName">Name</label>
					<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
					<?php if($nameError != '') { ?>
						<span class="error"><?=$nameError;?></span> 
					<?php } ?>
				</li>
				
				<li><label for="email">Email</label>
					<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
					<?php if($emailError != '') { ?>
						<span class="error"><?=$emailError;?></span>
					<?php } ?>
				</li>
				
				<li class="textarea"><label for="commentsText">Comments</label>
					<textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
					<?php if($commentError != '') { ?>
						<span class="error"><?=$commentError;?></span> 
					<?php } ?>
				</li>
				<li class="inline"><input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /> <label for="sendCopy"> Send a copy of this email to yourself</label></li>
			<table> <tr>
        
            <td>
            	<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit">Send Email</button></li>
            </td>
            </tr></table>	
			
			</ol>
		</form> </div> 
	

		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>  

 
		</article>
 
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