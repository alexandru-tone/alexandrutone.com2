<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo !empty($page_title) ? $page_title : ((!empty($module_name) && !empty($action_name)) ? $module_name . " - " . $action_name : "Alexandru Tone - Web developer") ; ?></title>
	<?php
		$default_keywords = array('web', 'developer', 'designer', 'mobile', 'sites', 'mobile sites', 'applications', 'web applications', 'e-commerce', 'e-commerce sites', 'web designer', 'web developer');
		$default_description = 'Awesome web applications, e-commerce sites and mobile sites';
	?>
	<meta name="keywords" content="<?php echo !empty($page_keywords) ? implode(', ', $page_keywords) : implode(', ', $default_keywords) ; ?>" >
	<meta name="description" content="<?php echo !empty($page_description) ? $page_description : $default_description ; ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php echo $head; ?>
		
</head>

<body>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	   <div class="container">
		   <div class="navbar-header">
			   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				   <span class="icon-bar"></span>
				   <span class="icon-bar"></span>
				   <span class="icon-bar"></span>
			   </button>
			   <a class="navbar-brand" href="/" title="Alexandru Tone - Web developer" >&nbsp;AlexandruTone.com</a>
		   </div>
		   <div class="collapse navbar-collapse">		
				<ul class="nav navbar-nav">
					<li <?php if ( $_SERVER['REQUEST_URI'] === '/') : ?> class="active" <?php endif; ?> >
						<a href="/">Home</a>
					</li>
					<li <?php if (false !== strpos($_SERVER['REQUEST_URI'], 'web-applications')) : ?> class="active" <?php endif; ?> >
						<a href="/web-applications">Web Applications</a>
					</li>
					<li <?php if (false !== strpos($_SERVER['REQUEST_URI'], 'e-commerce')) : ?> class="active" <?php endif; ?> >
						<a href="/e-commerce">E-Commerce</a>
					</li>
					<li <?php if (false !== strpos($_SERVER['REQUEST_URI'], 'mobile-sites')) : ?> class="active" <?php endif; ?> >
						<a href="/mobile-sites">Mobile Sites</a>
					</li>
					<li <?php if (false !== strpos($_SERVER['REQUEST_URI'], 'contact')) : ?> class="active" <?php endif; ?> >
						<a href="/contact">Contact</a>
					</li>
					<li <?php if (false !== strpos($_SERVER['REQUEST_URI'], 'tutorials')) : ?> class="active" <?php endif; ?> >
						<a href="/tutorials">Tutorials</a>
					</li>
				</ul>		
                </div><!--/.nav-collapse -->
	   </div>
   </nav>
   <div class="container">
	   <?php echo $content; ?>
	   <hr>
	   <?php echo $footer; ?>
   </div> <!-- /container -->
</body>
</html>
