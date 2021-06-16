<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?= $title ?></title>
    <?php
    $string = strip_tags($post['body']);
    if (strlen($string) > 160) {

        // truncate string
        $stringCut = substr($string, 0, 160);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);        
    }    
    ?>
    <meta name="description" content="<?= $string; ?>">
    <meta name="keywords" content="<?= $post['tags']; ?>">
    <meta name="author" content="<?= base_url(); ?>">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- fontawesome icon -->
    <script src="https://kit.fontawesome.com/9afba118d6.js" crossorigin="anonymous"></script>

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/style.css'); ?>">

    <!-- Favicon and touch icons  -->
    <!-- <link rel="shortcut icon" href="assets/icon/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/apple-touch-icon-158-precomposed.png"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="header-style-2 header-fixed">
    <div id="wrapper" class="animsition">
        <div id="page" class="clearfix">
            <!-- Site Header Wrap -->
            <div id="site-header-wrap">

                <!-- Header -->
                <header id="site-header">
                    <div id="site-header-inner" class="wprt-container">
                        <div class="wrap-inner">
                            <div id="site-logo" class="clearfix">
                                <div id="site-logo-inner">
                                    <a href="<?= base_url(); ?>" title="Medical" rel="home" class="main-logo text-primary">
                                        <img src="<?= base_url('assets/images/others/') . $site['logo']; ?>" data-retina="<?= base_url('assets/images/others/step-a.png'); ?>" width="100" height="44" data-width="100" data-height="44">
                                        <!-- STEP A -->
                                    </a>
                                </div>
                            </div><!-- /#site-logo -->

                            <div class="mobile-button"><span></span></div><!-- //mobile menu button -->

                            <nav id="main-nav" class="main-nav">
                                <ul class="menu">
                                    <li><a href="<?= base_url(); ?>">Home</a></li>
                                    <!-- <li class="menu-item-has-children"><a href="#">Features</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children"><a href="home.html">Header style 1</a>
                                                <ul class="sub-menu">
                                                    <li><a href="home.html">Classic</a></li>
                                                    <li><a href="home-1-no-top-bar.html">No Top bar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="home-2.html">Header style 2</a>
                                                <ul class="sub-menu">
                                                    <li><a href="home-2.html">Classic</a></li>
                                                    <li><a href="home-2-no-top-bar.html">No Top bar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="home-1-top-bar-style-2.html">Top bar Style 2</a></li>
                                            <li><a href="header-fixed.html">Header Fixed</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="menu-item-has-children"><a href="page-departments.html">Departments</a>
                                        <ul class="sub-menu">
                                            <li><a href="page-department-detail.html">Department detail</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="current-menu-item"><a href="<?= base_url('blog') . '?reset=true'; ?>">Informasi Kesehatan</a></li>
                                    <li><a href="<?= base_url('registration'); ?>">Registrasi</a></li>
                                    <li><a href="<?= base_url('login'); ?>">Login</a></li>
                                </ul>
                            </nav><!-- /#main-nav -->
                        </div>
                    </div><!-- /#site-header-inner -->
                </header><!-- /#site-header -->
            </div><!-- /#site-header-wrap -->

            <!-- Featured Title -->
            <div id="featured-title" class="text-center">
                <div id="featured-title-inner" class="wprt-container">
                    <div class="featured-title-inner-wrap">
                        <div class="featured-title-heading-wrap">
                            <h1 class="featured-title-heading ">Informasi Kesehatan</h1>
                        </div>

                        <div id="breadcrumbs">
                            <div class="breadcrumbs-inner">
                                <div class="breadcrumb-trail">
                                    <a href="<?= base_url(); ?>" title="Contruction2" rel="home" class="trail-begin">Home</a>
                                    <span class="sep">/</span>
                                    <span class="trail-end">Informasi Kesehatan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /#featured-title -->