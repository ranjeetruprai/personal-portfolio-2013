<?php
define("EMAIL", "mail@ranjeetruprai.com");
 
if(isset($_POST['submit'])) {
   
  include('validate.class.php');
   
  //assign post data to variables 
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);
	
  //start validating our form
  $v = new validate();
  $v->validateStr($name, "name", 5, 75);
  $v->validateEmail($email, "email");
  $v->validateStr($message, "message", 5, 1000);  
 
  if(!$v->hasErrors()) {
        $header = "From: $email\n" . "Reply-To: $email\n";
        $subject = "Ranjeet Ruprai: Get in Touch";
		
		/////////////////////////////////////////////
		///////// CHANGE THIS EMAIL ADDRESS /////////
		/////////////////////////////////////////////
        $email_to = "info@ranjeetruprai.com";
		/////////////////////////////////////////////
		/////////////////////////////////////////////
		$emailMessage .= "Name: " . $name . "\n\n";
		$emailMessage .= "Email: " . $email . "\n\n";
        $emailMessage .= "Message: " . $message;
         
    //use php's mail function to send the email
        @mail($email_to, $subject ,$emailMessage ,$header );  
         
    //grab the current url, append ?sent=yes to it and then redirect to that url
        $url = "http". ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        header('Location: '.$url."?sent=yes");
 
    } else {
    //set the number of errors message
    $message_text = $v->errorNumMessage();       
 
    //store the errors list in a variable
    $errors = $v->displayErrors();
     
    //get the individual error messages
    $nameErr = $v->getError("name");
    $emailErr = $v->getError("email");
    $messageErr = $v->getError("message");
  }//end error check
}// end isset
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ranjeet Ruprai - Portfolio of a UK based front end webbie specialising in websites built to standards</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/layout.css" />

    <!-- media queries 
	<link rel="stylesheet" media="screen and (max-width: 660px)" href="css/screen_440.css" /> 
	<link rel="stylesheet" media="screen and (max-width: 880px)" href="css/screen_660.css" /> 
	<link rel="stylesheet" media="screen and (max-width: 1100px)" href="css/screen_880.css" /> 
     -->
    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,600,700|Josefin+Sans:300,400,600,700&v2' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/shadowbox.css">
    <link rel="stylesheet" media="screen,projection" href="css/ui.totop.css" /> 
    <link rel="shortcut icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    
	<script type="text/javascript" src="js/common.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
    <!-- Shadowbox --> 
	<script type="text/javascript" src="js/shadowbox.js"></script>
    <!-- easing plugin ( optional ) --> 
	<script type="text/javascript" src="js/easing.js"></script> 
    <!-- UItoTop --> 
	<script type="text/javascript" src="js/jquery.ui.totop.js"></script> 
    <!-- Typekit --> 
    <!--<script src="http://use.typekit.com/zyn8kvs.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>-->
    
    <script type="text/javascript">
		$(document).ready(function(){ 
			$("#main figure .h2,#main figure .imageHover").hide(); 
			$("#main figure").hover(function(){ $(this).css("background","none"); 
			if($.browser.msie){ 
				$(this).children("h2").show(); 
				$(this).children(".imageHover").fadeIn("slow"); 
			} else { 
				$(this).children("h2, .imageHover").fadeIn("slow"); 
			} 
			}, 
			function() { 
				if($.browser.msie){ 
					$(this).children("h2").hide(); 
					$(this).children(".imageHover").fadeOut("slow"); 
				} else { 
					$(this).children("h2, .imageHover").fadeOut("slow"); 
				} 
			}); 
			
			Shadowbox.init({
				handleOversize: "drag",
				/*modal: true,*/
				overlayOpacity: "0.7"
			});
			
			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
</head>

<body>
    <header>
        <hgroup id="branding"><h1><span>Ranjeet Ruprai</span></h1></hgroup>
        <hgroup id="strapline"><p>Portfolio of a UK based front end webbie specialising in websites built to standards</p></hgroup>
    </header>
    
    <section id="main">
    	<section class="fullwidth">
            <figure class="wide">
                <h2>Think Leicestershire <br /><span>Design, XHTML/CSS, Javascript &amp; JQuery</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_thinkleics.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_thinkleics.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_thinkleics.jpg"><img src="images/pictures/th_thinkleics_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
              <h2>Leicester Montessori <br /><span>XHTML/CSS, Javascript &amp; JQuery</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_mont.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_mont.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_mont.jpg"><img src="images/pictures/th_mont_r.jpg" alt="" /></a></p>
            </figure>            
            <figure>
                <h2>Lloyd&rsquo;s <br /><span>XHTML/CSS</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_lloyds.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_lloyds.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_lloyds.jpg"><img src="images/pictures/th_lloyds_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
                <h2>iCheev <br /><span>Homepage redesign, XHTML/CSS</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_icheev.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_icheev.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_icheev.jpg"><img src="images/pictures/th_icheev_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
                <h2>Image Surgeons <br /><span>XHTML/CSS &amp; ASP</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_imagesurgeons.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_imagesurgeons.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_imagesurgeons.jpg"><img src="images/pictures/th_imagesurgeons_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
                <h2>Go MAD Thinking <br /><span>Design &amp; Maintenance</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_gomad.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_gomad.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_gomad.jpg"><img src="images/pictures/th_gomad_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
              <h2>EDF Energy <br /><span>XHTML/CSS</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_edf.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_edf.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_edf.jpg"><img src="images/pictures/th_edf_r.jpg" alt="" /></a></p>
            </figure>
            <figure class="wide">
                <h2>JD Bar Service <br /><span>Design, XHTML/CSS &amp; PHP, JQuery</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_jdbar.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_jdbar.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_jdbar.jpg"><img src="images/pictures/th_jdbar_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
              <h2>Tower Hamlets College <br /><span>XHTML/CSS</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_thc.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_thc.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_thc.jpg"><img src="images/pictures/th_thc_r.jpg" alt="" /></a></p>
            </figure>
            <figure class="wide">
                <h2>Aviva plc <br /><span>XHTML/CSS</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_aviva.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_aviva.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_aviva.jpg"><img src="images/pictures/th_aviva_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
                <h2>The Sport Court <br /><span>XHTML/CSS &amp; ASP</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_sportcourt.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_sportcourt.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_sportcourt.jpg"><img src="images/pictures/th_sportcourt_r.jpg" alt="" /></a></p>
            </figure>
             <figure>
                <h2>EDO Designs <br /><span>XHTML/CSS &amp; ASP</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_edo.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_edo.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_edo.jpg"><img src="images/pictures/th_edo_r.jpg" alt="" /></a></p>
            </figure>
           <figure class="wide">
                <h2>Consider Creative <br /><span>XHTML/CSS</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_consider.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_consider.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_consider.jpg"><img src="images/pictures/th_consider_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
                <h2>Imperial Tobacco plc <br /><span>XHTML/CSS &amp; ASP</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_imperialtobacco.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_imperialtobacco.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_imperialtobacco.jpg"><img src="images/pictures/th_imperialtobacco_r.jpg" alt="" /></a></p>
            </figure>
            <figure>
                <h2>Kingfisher plc <br /><span>XHTML/CSS &amp; ASP</span> <a rel="shadowbox[Mixed]" href="images/pictures/zoom/p_kingfisher.jpg"></a></h2>
                <p class="image"><img src="images/pictures/th_kingfisher.jpg" alt="" /></p>
                <p class="imageHover"><a rel="shadowbox[Mixed2]" href="images/pictures/zoom/p_kingfisher.jpg"><img src="images/pictures/th_kingfisher_r.jpg" alt="" /></a></p>
            </figure>
         </section>
    </section>
    
    <footer>
        <div class="aboutme">
        	<section>
            	<h2>Get in Touch</h2>
                <form action="index.php#contact" method="post">
                	<a name="contact" id="contact"></a>
                	<fieldset>
                    	<legend>Get in Touch</legend>
                        <?php if(isset($_GET['sent'])): ?>
                            <p class="error">Thanks for your message, I'll be in touch soon.</p>
                        <?php endif; ?>
                        
                        <?php if(!isset($_GET['sent'])): ?>
                            <p class="error"><?php echo $nameErr ?></p>
                            <label for="name" class="hidden">Name</label>
                            <input type="text" name="name" id="name" value="Name" onClick="this.value='';" />
                            <p class="error"><?php echo $emailErr ?></p>
                            <label for="email" class="hidden">Email</label>
                            <input type="text" name="email" id="email" value="Email" onClick="this.value='';" />
                            <label for="message">Message</label>
                            <p class="error"><?php echo $messageErr ?></p>
                            <textarea name="message" id="message" rows="4" cols="10"></textarea>
                            <input type="submit" name="submit" id="submit" value="Send" class="button" />
                        <?php endif; ?>
                    </fieldset>
                </form>
            </section>
            <section>
            	<h2>Recent Tweets</h2>
                <p>Coming soon</p>
            </section>
            <section class="last">
            	<h2>Friends &amp; Faves</h2>
                <ul>
                	<li><a href="http://ksruprai.com/" rel="external">KSRuprai</a></li>
                    <li><a href="http://www.piccsy.com/" rel="external">Piccsy</a></li>
                    <li><a href="http://www.fromupnorth.com/" rel="external">From Up North</a></li>
                    <li><a href="http://mashable.com/" rel="external">Mashable</a></li>
               </ul>
                <h2>Me elsewhere</h2>
                <ul>
                    <li><a href="http://gplus.to/ranjeetruprai" rel="external">Google+</a></li>
                	<li><a href="http://twitter.com/ranjeetruprai" rel="external">Twitter</a></li>
                </ul>
            </section>
        </div>
        <div class="copyrightcontainer">
            <div class="copyright">
                <h2><span>Ranjeet Ruprai</span></h2>
                <p>&copy; Copyright Ranjeet Ruprai 2013</p>
            </div>
        </div>
        
    </footer>
</body>
</html>
