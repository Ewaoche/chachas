

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<base href="<?= domain ?>" />
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<!-- Page Title -->
<title><?= $title ?></title>

<!-- Favicon and Touch Icons -->
<link href="<?= $assets ?>images\favicon.png" rel="shortcut icon" type="image/png">
<link href="<?= $assets ?>images\apple-touch-icon.png" rel="apple-touch-icon">
<link href="<?= $assets ?>images\apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="<?= $assets ?>images\apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="<?= $assets ?>images\apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->

	
	<link href="<?= $assets ?>css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= $assets ?>css\jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="<?= $assets ?>css\animate.css" rel="stylesheet" type="text/css">
	<link href="<?= $assets ?>css\css-plugin-collections.css" rel="stylesheet">
	<!-- CSS | menuzord megamenu skins -->
	<link id="menuzord-menu-skins" href="<?= $assets ?>css\menuzord-skins\menuzord-boxed.css" rel="stylesheet">
	<!-- CSS | Main style file -->
	<link href="<?= $assets ?>css\style-main.css" rel="stylesheet" type="text/css">
	
	<!-- CSS | Theme Color -->
	
	<link href="<?= $assets ?>css\colors\theme-skin-orange.css" rel="stylesheet" type="text/css">
	<!-- CSS | Preloader Styles -->
	<link href="<?= $assets ?>css\preloader.css" rel="stylesheet" type="text/css">
	<!-- CSS | Custom Margin Padding Collection -->
	<link href="<?= $assets ?>css\custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
	<!-- CSS | Responsive media queries -->
	<link href="<?= $assets ?>css\responsive.css" rel="stylesheet" type="text/css">
	<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
	<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
	
	<!-- Revolution Slider 5.x CSS settings -->
	<link href="<?= $assets ?>js\revolution-slider\css\settings.css" rel="stylesheet" type="text/css">
	<link href="<?= $assets ?>js\revolution-slider\css\layers.css" rel="stylesheet" type="text/css">
	<link href="<?= $assets ?>js\revolution-slider\css\navigation.css" rel="stylesheet" type="text/css">



<!-- external javascripts -->
<script src="<?= $assets ?>js\jquery-2.2.4.min.js"></script>
<script src="<?= $assets ?>js\jquery-ui.min.js"></script>
<script src="<?= $assets ?>js\bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?= $assets ?>js\jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?= $assets ?>js\revolution-slider\js\jquery.themepunch.tools.min.js"></script>
<script src="<?= $assets ?>js\revolution-slider\js\jquery.themepunch.revolution.min.js"></script>
</head>
<body class="">
<div id="wrapper">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <h5 class="line-height-50 font-18">Chachas...</h5>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
<!-- search-modal -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <form action="/forms/login" class="row" method="POST">
                    <div class="form-group col-12 col-md-12">
                        <h6 class="color-ff pos-relative ptb-5">Quick Login</h6>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" aria-describedby="helpId">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" aria-describedby="helpId">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="quick-search">
                    <h6 class="color-ff pos-relative ptb-30">Secure Area</h6>
                </div>
            </div>
        </div>
    </div>
  <!-- Header -->
  <header class="header mt-5">
    
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord green no-bg">
            <a class="menuzord-brand pull-left flip" href="./"><img src="<?= $assets ?>images\logo-wide.png"></a>
            <ul class="menuzord-menu">
              
            <li class="<?= (isset($menuaction))?'':'current' ?>"><a
                href="./admin">Home</a></li>
              <li class="<?= ($menuaction=="pages")?'current':'' ?>"><a
                      href="./dashboard/do/pages">Pages</a></li>
              <li class="<?= ($menuaction=="blogs")?'current':'' ?>"><a
                      href="./dashboard/do/blogs">Blogs</a></li>
              <li class="<?= ($menuaction=="settings")?'current':'' ?>"><a
                      href="./dashboard/do/settings">Settings</a></li>
              <li class="current"><a href="./dashboard/do/logout">Logout</a></li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>