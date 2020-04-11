
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="@if (setting()) {{ url('uploads/Settings/Icon/'.setting()->icon) }} @endif">
	<link rel="icon" type="image/png" sizes="96x96" href=" @if (setting()) {{ url('uploads/Settings/Icon/'.setting()->icon) }} @endif">

    <title>Coming Soon for
        @if (setting())
            {{setting()->sitename}}
        @endif
    </title>

	<!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/coming-sssoon-page"/>

    <meta name="keywords" content="coming soon page, under construction page, bootstrap page, free bootstrap page, creative tim, not ready page, demo page">
    <meta name="description" content="Free one page item based on Bootstrap 3. Use Coming Sssoon Page to create a following group users before actually starting your project! ">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Coming Sssoon Page by Creative Tim">
    <meta itemprop="description" content="Free one page item based on Bootstrap 3. Use Coming Sssoon Page to create a following group users before actually starting your project! ">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/20/coming_sssoon_thumbnail.png">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Coming Sssoon Page by Creative Tim">
    <meta name="twitter:description" content="Free one page item based on Bootstrap 3. Use Coming Sssoon Page to create a following group users before actually starting your project! ">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/20/coming_sssoon_thumbnail.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="Coming Sssoon Page by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/coming-sssoon-demo-image-background" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/20/coming_sssoon_thumbnail.png" />
    <meta property="og:description" content="Free one page item based on Bootstrap 3. Use Coming Sssoon Page to create a following group users before actually starting your project! " />
    <meta property="og:site_name" content="Creative Tim" />

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/coming-sssoon.css')}}" rel="stylesheet" />
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    @endif

    <!--     Fonts     -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
		<!-- End Google Tag Manager -->
		</head>

		<body class="landing-page landing-page2">
			<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag"></i>
                    <span class="nav-link-inner--text">@lang('lang.lang')</span>
                </a>
                <ul class="dropdown-menu @if(app()->getLocale() == 'ar') dropdown-menu-right @endif " aria-labelledby="navbar-default_dropdown_1">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i class="ni ni-collection"></i>
                                <span class="nav-link-inner--text">{{ $properties['native'] }}</span>
                            </a>
                        </li>
                    @endforeach
                    </ul>
            </li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

<div class="main" style="background-image: url('{{asset('images/video_bg.jpg')}}')">
        <video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
            <source src="video/time.webm" type="video/webm">
            <source src="video/time.mp4" type="video/mp4">
            Video not supported
        </video>
<!--    Change the image source '/images/rick.jpg')" with your favourite image.     -->

    <div class="cover black" data-color="black"></div>

<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
            @if (setting())
                {{setting()->sitename}}
            @endif
        </h1>
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->

        <div class="content">
            <h4 class="motto">@lang('lang.CommingTitle')</h4>
            <div class="subscribe">
                <h5 class="info-text">
                    @lang('lang.CommingDescription')
                </h5>
            </div>
        </div>
    </div>
    <div class="footer">
      <div class="container">
             Made with <i class="fa fa-heart heart"></i> by Enjoy Code</a>
      </div>
    </div>
 </div>

</body>
   <script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="js/coming-sssoon.js" type="text/javascript"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46172202-1', 'auto');
  ga('send', 'pageview');

</script>

</html>
