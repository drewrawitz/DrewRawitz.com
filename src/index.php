<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Drew Rawitz - Web Developer Raleigh, NC</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="My name is Drew Rawitz, I am a front-end web developer in Raleigh, North Carolina. I absolutely love learning new things and taking on new challenges.">
  <meta name="author" content="Drew Rawitz">

  <link href="//www.google-analytics.com" rel="dns-prefetch">
  <link href="//ajax.googleapis.com" rel="dns-prefetch">
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>

  <!-- rev-hash -->
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- end -->
</head>
<body>
  <div class="flex-container">
  <aside class="sidebar primary-sidebar">
    <div class="wrapper">
      <header class="logo">
        <div class="profile-pic">
          <a href="index.php#home" data-target="#home"><img src="assets/images/profile_pic.jpg" width="100" height="100"></a>
        </div>
        <a href="index.php#home" data-target="#home">
          <h2 class="heading">Drew Rawitz</h2>
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
      <div class="sidebar-block">
        <div class="sidebar-flex-container">
          <h2 class="sidebar-block-heading">Instagram</h2>
          <div class="instagram-controls">
            <!-- Shuffle button
            <a href="#" class="ig-reload">
              <i class="icon-arrows-cw"></i>
            </a>
            -->
            <a href="#" class="ig-back disabled">
              <i class="icon-left-open"></i>
            </a>
            <a href="#" class="ig-next">
              <i class="icon-right-open"></i>
            </a>
          </div>
        </div>
        <ul class="instagram-feed"></ul>
        <div class="sidebar-flex-container">
          <small><strong>Sorted by:</strong> Most Recent</small>
          <small><span class="currentPage"></span>/<span class="totalPages"></span></small>
        </div>
      </div>
      <footer class="primary-footer">
        <ul class="social_icons">
          <li><a href="http://www.twitter.com/DrewRawitz" rel="me" target="_blank"><i class="icon-twitter"></i></a></li>
          <li><a href="http://www.github.com/drewrawitz" rel="me" target="_blank"><i class="icon-github-circled"></i></a></li>
          <li><a href="http://stackoverflow.com/users/799653/drew" rel="me" target="_blank"><i class="icon-stackoverflow"></i></a></li>
          <li><a href="http://www.linkedin.com/pub/drew-rawitz/78/97b/2b7" target="_blank"><i class="icon-linkedin"></i></a></li>
        </ul>
        <p>Copyright &copy; <?=date("Y");?> DrewRawitz.com.<br>All Rights Reserved.</p>
      </footer>
    </div>
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
        <p>Hi, I am <strong>Drew Rawitz</strong>. I enjoy playing with cutting edge web technologies and building beautiful websites. I currently work as a Front-End Developer for <a href="http://www.capstrat.com" class="link" target="_blank" rel="nofollow">Capstrat</a>, a strategic communications firm offering interactive, marketing communications, public affairs and public relations.</p>
        <p>My job involves doing what I love, <strong>developing</strong> new websites and applications. I absolutely love learning new things and taking on new challenges. A more detailed look at my professional capabilities and experience is available in my <a href="resume.pdf" target="_blank" class="link">resume</a>.</p>

        <div class="clear-left"></div>
        <p class="center">&#9733; &#9733; &#9733; &#9733; &#9733;</p>
        <div class="center">
          <blockquote>“Success consists of going from failure to failure without loss of enthusiasm.” <em>–Winston Churchill</em></blockquote>
        </div>
      </section>

      <section id="toolkit">
        <h2 class="lines"><span>Web Toolkit</span></h2>
        <p class="center">I use the following technologies and applications as part of my development.</p>

        <ul class="technologies">
          <li>
            <span class="icon-technologies-apple"></span>
            <div class="technologies-text">
              <span>
                <h3>Apple</h3>
                <p>15" Macbook Pro Retina Display</p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-html5"></span>
            <div class="technologies-text">
              <span>
                <h3>HTML5</h3>
                <p>Standards-compliant, semantic markup</p>
                <p><a href="http://html5please.com/" class="link" target="_blank">html5please.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-css3"></span>
            <div class="technologies-text">
              <span>
                <h3>CSS3</h3>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-javascript"></span>
            <div class="technologies-text">
              <span>
                <h3>Javascript</h3>
                <p><a href="http://javascript.com" class="link" target="_blank">javascript.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-jquery"></span>
            <div class="technologies-text">
              <span>
                <h3>Javascript /jQuery</h3>
                <p><a href="http://jquery.com" class="link" target="_blank">jquery.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-sass"></span>
            <div class="technologies-text">
              <span>
                <h3>SASS</h3>
                <p>CSS Pre-processor</p>
                <p><a href="http://sass-lang.com/" class="link" target="_blank">sass-lang.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-terminal"></span>
            <div class="technologies-text">
              <span>
                <h3>iTerm2</h3>
                <p>Command Line</p>
                <p><a href="http://www.iterm2.com" class="link" target="_blank">iterm2.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-vim"></span>
            <div class="technologies-text">
              <span>
                <h3>Vim</h3>
                <p>Text Editor</p>
                <p><a href="http://www.vim.org" class="link" target="_blank">vim.org</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-tmux"></span>
            <div class="technologies-text">
              <span>
                <h3>Tmux</h3>
                <p>Terminal Multiplexer</p>
                <p><a href="https://tmux.github.io/" class="link" target="_blank">tmux.github.io</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-wordpress"></span>
            <div class="technologies-text">
              <span>
                <h3>Wordpress</h3>
                <p>Content Management System</p>
                <p><a href="http://wordpress.com/" class="link" target="_blank">wordpress.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-git"></span>
            <div class="technologies-text">
              <span>
                <h3>Git</h3>
                <p>Version Control System</p>
                <p><a href="http://git-scm.com" class="link" target="_blank">git-scm.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-yeoman"></span>
            <div class="technologies-text">
              <span>
                <h3>Yeoman</h3>
                <p>Project Scaffolding</p>
                <p><a href="http://yeoman.io/" class="link" target="_blank">yeoman.io</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-bower"></span>
            <div class="technologies-text">
              <span>
                <h3>Bower</h3>
                <p>Front-end Package Manager</p>
                <p><a href="http://bower.io/" class="link" target="_blank">bower.io</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-grunt"></span>
            <div class="technologies-text">
              <span>
                <h3>Grunt</h3>
                <p>Javascript Task Runner</p>
                <p><a href="http://gruntjs.com/" class="link" target="_blank">gruntjs.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-gulp"></span>
            <div class="technologies-text">
              <span>
                <h3>Gulp</h3>
                <p>Streaming Build System</p>
                <p><a href="http://gulpjs.com/" class="link" target="_blank">gulpjs.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-vagrant"></span>
            <div class="technologies-text">
              <span>
                <h3>Vagrant</h3>
                <p>Development environments</p>
                <p><a href="http://vagrantup.com/" class="link" target="_blank">vagrantup.com</a></p>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-browsers"></span>
            <div class="technologies-text">
              <span>
                <h3>Cross Browser Compatibility</h3>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-responsive"></span>
            <div class="technologies-text">
              <span>
                <h3>Responsive Web Design</h3>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-php"></span>
            <div class="technologies-text">
              <span>
                <h3>PHP</h3>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-mysql"></span>
            <div class="technologies-text">
              <span>
                <h3>MySQL</h3>
              </span>
            </div>
          </li>
          <li>
            <span class="icon-technologies-magento"></span>
            <div class="technologies-text">
              <span>
                <h3>Magento</h3>
                <p>E-Commerce Platform</p>
                <p><a href="http://magento.com/" class="link" target="_blank">magento.com</a></p>
              </span>
            </div>
          </li>
        </ul>
      </section>

      <section id="projects">
        <h2 class="lines"><span>Projects</span></h2>
        <div class="project-wrapper">
          <div class="project">
            <div class="project__image">
              <a href="https://github.com/drewrawitz/jQuery-Floating-Form-Label" target="_blank"><img src="assets/images/projects/img_floating-labels.jpg"></a>
            </div>
            <div class="project__info">
              <h3>jQuery Floating Form Label</h3>
              <p>A jQuery Plugin to turn an input placeholder into a floated form label when selected or filled out.</p>
              <a class="link" href="https://github.com/drewrawitz/jQuery-Floating-Form-Label" target="_blank">View On GitHub</a>
            </div>
          </div>
          <div class="project">
            <div class="project__image">
              <a href="https://github.com/drewrawitz/jquery-fixed-header" target="_blank"><img src="assets/images/projects/img_fixed-header.jpg"></a>
            </div>
            <div class="project__info">
              <h3>jQuery Fixed Header</h3>
              <p>A jQuery Plugin for responsive websites to fix a header to the top of the window and pad down the content to the height of the bar.</p>
              <a class="link" href="https://github.com/drewrawitz/jquery-fixed-header" target="_blank">View On GitHub</a>
            </div>
          </div>
        </div>

        <p class="center">
          <a href="https://github.com/drewrawitz" target="_blank" class="btn btn-light">
            <i class="icon-github-circled"></i>
            <span>See All Projects</span>
          </a>
        </p>
      </section>

      <section id="contact">
        <h2 class="lines"><span>Contact Me</span></h2>
        <p class="center">Do you want to talk about a future project, or just want to say hello? Let's get in touch! You can get in touch with me via Twitter <a href="http://www.twitter.com/drewrawitz" class="link" target="_blank">@DrewRawitz</a> or e-mailing me at <a href="mailto:email@drewrawitz.com" class="link">email@drewrawitz.com</a></p>
      </section>
    </div>
  </div>

  <aside class="sidebar secondary-sidebar">
    <div class="wrapper">
      <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/DrewRawitz" data-widget-id="345176268679032834" data-chrome="noheader noscrollbar transparent">Tweets by @DrewRawitz</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
  </aside>

  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="libs/jquery/jquery.min.js"><\/script>')</script>

  <!-- rev-hash -->
  <script src="assets/js/scripts.min.js"></script>
  <!-- end -->

  <script>
    (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
    (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
    l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-34472559-1');
    ga('send', 'pageview');
  </script>

</body>
</html>
