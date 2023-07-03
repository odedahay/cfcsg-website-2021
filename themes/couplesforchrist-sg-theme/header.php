<!DOCTYPE html>
<html class="wide wow-animation" <?php language_attributes(); ?>>
  <head>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="icon" href="<?php echo get_theme_file_uri('images/favicon.ico'); ?>" type="image/x-icon">
    <?php wp_head(); ?>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body <?php body_class(); ?>>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/">
      <img src="<?php echo get_theme_file_uri('images/ie8-panel/warning_bar_0000_us.jpg'); ?>" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="15px" data-xl-stick-up-offset="15px" data-xxl-stick-up-offset="15px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <!--Brand-->
                  <a class="brand" href="<?php echo esc_url(site_url()) ?>">
                    <img class="brand-logo-dark" src="<?php echo get_theme_file_uri('images/cfc-singapore-logo.png');?>" alt="" width="230" height="73"/>
                    <img class="brand-logo-light" src="<?php echo get_theme_file_uri('images/cfc-singapore-logo.png');?>" alt="" width="230" height="73"/></a>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item <?php if(is_front_page()) echo 'active' ?>"><a class="rd-nav-link" href="<?php echo esc_url(site_url()); ?>">Home</a>
                      </li>
                      <li class="rd-nav-item <?php if(is_page('about-cfc') or wp_get_post_parent_id(0) == 9) echo 'active'?>">
                        <a class="rd-nav-link" href="<?php echo esc_url(site_url('/about-cfc'));?>">About CFC</a></li>
                      <li class="rd-nav-item <?php if(get_post_type() == 'organisation') echo 'active'?>">
                        <a class="rd-nav-link" href="#">Organisation</a>
                        <ul class="rd-menu rd-navbar-megamenu">
                          <li class="rd-megamenu-item"><!-- CFC Governance  -->
                    
                            <ul class="rd-megamenu-list">
                              <li class="rd-megamenu-list-item mega-title-parent">CFC SINGAPORE LEADERSHIP</li>
                                <ul class="rd-megamenu-list">
                                  <li class="rd-megamenu-list-item mega-subtitle no-border"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/sector/national-council')); ?>">National Council</a></li>
                                </ul>
                            </ul>
                          </li>
                          <li class="rd-megamenu-item"><!-- Sector -->
                            <ul class="rd-megamenu-list">
                              <li class="rd-megamenu-list-item mega-title-parent-empty"></li>
                                <ul class="rd-megamenu-list">
                                  <li class="rd-megamenu-list-item mega-subtitle"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('sector/#cluster1')); ?>">Cluster 1</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/east-1')); ?>">East 1</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/east-2')); ?>">East 2</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/serangoon-1')); ?>">Serangoon 1</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/serangoon-2')); ?>">Serangoon 2</a></li>
                                </ul>
                            </ul>
                          </li>
                          <li class="rd-megamenu-item"><!-- Sector -->
                            <ul class="rd-megamenu-list">
                              <li class="rd-megamenu-list-item mega-title-parent-empty"></li>
                                <ul class="rd-megamenu-list">
                                  <li class="rd-megamenu-list-item mega-subtitle"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('sector/#cluster2')); ?>">Cluster 2</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/north-1')); ?>">North 1</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/north-2')); ?>">North 2</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/north-3')); ?>">North 3</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/west-1')); ?>">West 1</a></li>
                                  <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/west-2')); ?>">West 2</a></li>
                                </ul>
                            </ul>
                          </li>
                          <li class="rd-megamenu-item no-padding-left"><!-- Family Min -->
                            <ul class="rd-megamenu-list ">
                              <li class="rd-megamenu-list-item mega-title-parent">Family Ministries</li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/kids-for-christ/')); ?>">Kids For Christ</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/youth-for-christ')); ?>">Youth For Christ</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/singles-for-christ')); ?>">Singles For Christ</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/handmaids-of-the-lord')); ?>">Handmaids of the Lord</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/organisation/servants-of-the-lord')); ?>">Servants of the Lord</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="rd-nav-item <?php if( is_page('evengelization') or wp_get_post_parent_id(0) == 131 or is_page('soc-min') or get_post_type() == 'testimonial' or get_post_type() == 'social_ministry') echo 'active'?>"><a class="rd-nav-link" href="#">Evangelization</a>
                        <ul class="rd-menu rd-navbar-megamenu">
                          <li class="rd-megamenu-item">
                            <ul class="rd-megamenu-list">
                              <li class="rd-megamenu-list-item mega-title-parent">Formation</li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/christian-life-programclp/'));?>">Christian Life Program(CLP)</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/teaching'));?>">Teaching</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/prayer-assemblies')); ?>">Prayer Assemblies</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/music-ministry')); ?>">Music Ministry</a></li>
                              <li class="rd-megamenu-list-item <?php if(get_post_type() == 'testimonial') echo 'active'?>"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/testimonials')); ?>">Testimonials</a></li>
                            </ul>
                          </li>
                          <li class="rd-megamenu-item ">
                            <ul class="rd-megamenu-list">
                              <li class="rd-megamenu-list-item mega-title-parent">International Missions</li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/countries-mission-volunteers')); ?>">About One Singapore Mission team </a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/countries-mission-volunteers/mission-support-structure')); ?>">Countries served in our mission</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/countries-mission-volunteers/organisation')); ?>">Organisation</a></li>
                            </ul>
                          </li>
                          <li class="rd-megamenu-item">
                            <ul class="rd-megamenu-list">
                              <li class="rd-megamenu-list-item mega-title-parent">External Activities</li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/soc-min/')); ?>">Social Ministry</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/church-relations/')); ?>">Church Relations</a></li>
                              <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="<?php echo esc_url(site_url('/evangelization/charities-supported/')); ?>">Charities Supported</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="rd-nav-item <?php if(get_post_type() == 'event' OR is_page('past-events')) echo 'active'?>">
                        <a class="rd-nav-link" href="<?php echo get_post_type_archive_link('event');?>">Events</a>
                      </li>
                      <li class="rd-nav-item <?php if(get_post_type() == 'post') echo 'active'?>"><a class="rd-nav-link" href="<?php echo esc_url(site_url('/latest-news')); ?>">Latest News</a>
                      </li>
                      <li class="rd-nav-item">
                        <a class="rd-nav-link js-search-trigger site-header__search-trigger" href="#"><i class="mdi mdi-magnify bell-size-2x"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      