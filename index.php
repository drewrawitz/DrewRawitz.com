<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Drew Rawitz - Web Developer Raleigh, NC</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="My name is Drew Rawitz, I am a front-end web developer in Raleigh, North Carolina. I absolutely love learning new things and taking on new challenges.">
	<meta name="author" content="Drew Rawitz">

	<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="assets/css/global.min.css">
</head>
<body>

	<aside class="sidebar primary-sidebar">
		<header class="logo">
			<a href="index.php#home" data-target="#home">
				<h2>Drew Rawitz</h2>
				<span class="tagline">Web Enthusiast</span>
			</a>
		</header>
		<nav class="main-nav">
			<ul>
				<li class="active"><a class="top" href="index.php#home" data-target="#home">Home</a></li>
				<li><a href="index.php#about" data-target="#about">About Me</a></li>
				<li><a href="index.php#toolkit" data-target="#toolkit">Web Toolkit</a></li>
				<li><a href="index.php#projects" data-target="#projects">Projects</a></li>
				<li><a href="index.php#contact" data-target="#contact">Contact</a></li>
			</ul>
		</nav>
		<div class="sidebar-widget">
			<h2 class="pull-left">Instagram</h2> <i class="ig-reload icon-arrows-cw"></i>
			<ul class="instagram-feed"></ul>
		</div>
		<div class="sidebar-widget">
			<h2>Resume</h2>
			<a href="#" class="block-link"> <i class="icon-download"></i> Download my Resume</a>
		</div>
		<footer>
			<ul class="social_icons">
				<li><a href="http://www.twitter.com/DrewRawitz" rel="me" target="_blank"><i class="icon-twitter"></i></a></li>
				<li><a href="http://www.github.com/drewrawitz" rel="me" target="_blank"><i class="icon-github-circled"></i></a></li>
				<li><a href="https://plus.google.com/u/0/114020475716738327090/posts" rel="me" target="_blank"><i class="icon-gplus"></i></a></li>
				<li><a href="http://stackoverflow.com/users/799653/drew" rel="me" target="_blank"><i class="icon-stackoverflow"></i></a></li>
				<li><a href="http://www.linkedin.com/pub/drew-rawitz/78/97b/2b7" target="_blank"><i class="icon-linkedin"></i></a></li>
			</ul>
			<p>Copyright &copy; <?=date("Y");?> DrewRawitz.com.<br>All Rights Reserved.</p>
		</footer>
	</aside>

	<div class="main-content">
		<div class="content-wrapper">
			<section id="home">
				<h1>My Name is <span class="logo-font">Drew Rawitz</span></h1>
				<p class="description">I live and work in Raleigh, NC as a Front End Web Developer.
				<br><a href="index.php#about" data-target="#about" class="link">Learn more about me <i class="icon-down-circled2"></i></a></p>
				
				<div class="nc-state"></div>
				<div class="drew-illustration"></div>
			</section>

			<section id="about">
				<h2 class="lines"><span>About Me</span></h2>

				<div class="photo-wrapper">
					<img src="assets/images/drew_photo.jpg" class="photo photo-rounded">
				</div>
				
				<p>Hi, I am <strong>Drew Rawitz</strong>. I enjoy playing with cutting edge web technologies and building beautiful websites. I currently work for <a href="http://www.atlanticbt.com" class="link" target="_blank" rel="nofollow">Atlantic BT</a>, Raleigh's Largest Website &amp; Software Development Company.</p>
				<p>My job involves doing what I love, <strong>developing</strong> new websites and applications. I absolutely love learning new things and taking on new challenges. A more detailed look at my professional capabilities and experience is available in my <a href="#" class="link">resume</a>.</p>
					
				<p class="center">&#9733; &#9733; &#9733; &#9733; &#9733;</p>
				<blockquote>“Success consists of going from failure to failure without loss of enthusiasm.” <em>–Winston Churchill</em></blockquote>
			</section>

			<section id="toolkit">
				<h2 class="lines"><span>Web Toolkit</span></h2>
				<p class="center">I use the following technologies and applications as part of my development.</p>

				<ul align="center" class="box-item t-sprite">
					<li><span class="technologies-apple" title="Apple"></span></li>
					<li><span class="technologies-html5"></span></li>
					<li><span class="technologies-css3"></span></li>
					<li><span class="technologies-jquery"></span></li>
					<li><span class="technologies-git"></span></li>
					<li><span class="technologies-sass"></span></li>
					<li><span class="technologies-compass"></span></li>
					<li><span class="technologies-grunt"></span></li>
					<li><span class="technologies-browsers"></span></li>
					<li><span class="technologies-responsive"></span></li>
					<li><span class="technologies-sublime_text2"></span></li>
					<li><span class="technologies-codekit"></span></li>
					<li><span class="technologies-photoshop"></span></li>
					<li><span class="technologies-mamp_pro"></span></li>
					<li><span class="technologies-php"></span></li>
					<li><span class="technologies-mysql"></span></li>
					<li><span class="technologies-wordpress"></span></li>
					<li><span class="technologies-magento"></span></li>
				</ul>
			</section>

			<section id="projects">
				<h2 class="lines"><span>Projects</span></h2>
				<p class="center">Coming Soon..</p>
			</section>

			<section id="contact">
				<h2 class="lines"><span>Contact Me</span></h2>
				<p class="center">Do you want to talk about a future project, or just want to say hello? Let's get in touch! You can get in touch with me via Twitter <a href="http://www.twitter.com/drewrawitz" class="link" target="_blank">@DrewRawitz</a> or by filling out the form below!</p>

				<?php include("includes/forms/contact_form.php"); ?>
			</section>
		</div>
	</div>

	<aside class="sidebar secondary-sidebar">
		<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/DrewRawitz" data-widget-id="345176268679032834" data-chrome="noheader noscrollbar transparent">Tweets by @DrewRawitz</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</aside>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

	<script src="assets/js/scripts.min.js"></script>

</body>
</html>