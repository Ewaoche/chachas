

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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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


       
  <!-- Header -->
  <header class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-theme-colored icon-sm sm-text-center">
              <?php while($social = mysqli_fetch_object($Socials)):?>
                <li><a href="<?=$social->social_link ?>"><i class="fa fa-<?=$social->social_icon ?>"></i></a></li>
              <?php endwhile;?>
                
              </ul>
            </div>
          </div>
          <div class="col-md-8">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#"><?=$Core->SiteInfo('mobile')?></a> </li>
                <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i><?=$Core->SiteInfo('header_delivery')?></li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#"><?=$Core->SiteInfo('email')?></a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="mt-sm-10 mb-sm-10">
                <!-- <button type="button" id="search-button" data-toggle="modal" data-target="#search-modal"><i class="fa fa-lock "></i></button> -->
                  <a class="btn btn-default btn-flat btn-xs bg-light p-5 font-11 pl-10 pr-10 " href="/chachaswebsite/dashboard/login" id="search-button" data-toggle="modal" data-target="#search-modal"><i class="fa fa-lock "></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord green no-bg">
            <a class="menuzord-brand pull-left flip" href="./"><img src="<?= $assets ?>images\logo-wide.png"></a>
            <ul class="menuzord-menu">
              
            <li class="<?= (isset($menuslug))?'':'active' ?>"><a href="./">Home</a></li>
            <?php while($page = mysqli_fetch_object($Pages)): ?>
            <li class="<?= ($menuslug==$page->slug)?'active':'' ?>"><a href="./pages/<?= $page->slug ?>"><?= $page->menutitle ?></a></li>
            <?php endwhile; ?>

              <!-- <li><a href="./about-us.php">About Us</a></li>
              <li><a href="./how-it-works.php">How it Works</a></li>
              <li><a href="./faqs.php">FAQs</a></li>
              <li><a href="./contact-us.php">Contact US</a></li> -->
              
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>