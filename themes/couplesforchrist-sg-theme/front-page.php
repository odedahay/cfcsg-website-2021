<?php get_header(); ?>

<!-- Slider-->
<section class="section swiper-container swiper-slider swiper-slider-business context-dark" data-loop="true" data-slide-effect="fade" data-autoplay="5000" data-simulate-touch="false" data-custom-slide-effect="inter-leave-effect">
    <div class="swiper-wrapper">
        <?php $slideshowDisplay = new WP_Query(array(
             'post_type' => 'slideshow',
             'posts_per_page' => 3
        ));
        
        if(get_field('banner_image')){
            $slideshow_img_url = get_field('banner_image');
        }else{
            $slideshow_img_url = get_theme_file_uri('/images/slider-business-slide-1-1920x800.jpg'); 
        }
    
        while($slideshowDisplay->have_posts()){
            $slideshowDisplay->the_post(); ?>
    
            <div class="swiper-slide" data-slide-bg="<?php echo get_field('banner_image'); ?>">
                <div class="slide-inner banner-dark-bg-front">
                    <div class="swiper-slide-caption">
                    <div class="container">
                        <div class="heading-6 wow-outer_"><span class="wow_" data-caption-animate="slideInUp">
                            <?php the_field('heading'); ; ?></span></div>
                        <h1 class="wow-outer_"><span class="wow_" data-caption-animate="slideInDown"><?php the_field('banner_main_title'); ?></span></h1>
                        <div class="swiper-caption-text">
                        <div class="swiper-caption-text-decoration wow_" data-caption-animate="scaleInVertical_"></div>
                        <div class="swiper-caption-text-inner">
                            <p class="big wow_" data-caption-animate="slideInLeft"><?php the_field('banner_excerpt');?></p>
                        </div>
                        </div>
                        <div class="button-outer"><a class="button button-lg button-primary button-winona wow_" href="<?php the_field('banner_cta_button'); ?>" data-caption-animate="slideInUp">Learn more </a></div>
                    </div>
                    </div>
                </div>
            </div>
        
        <?php } wp_reset_postdata(); ?>
    </div>
     <!-- If we need pagination -->
  <div class="swiper-pagination"></div>
    <div class="swiper-slider-nav container">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

 <!-- UPCOMING EVENTS -->
 <section class="section section-md text-center">
    <div class="container">
    <h3>Upcoming Events</h3>
    <div class="row row-50 row-xxl-70 offset-top-6 justify-content-center justify-content-lg-start">
    <?php 
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type'=> 'numeric'
                )
            )
        ));
        while($homepageEvents->have_posts()){
            $homepageEvents->the_post(); ?>

            <div class="col-md-10 col-lg-6">
                <!-- Profile Creative-->
                <article class="profile-creative">
                    <figure class="profile-creative-figure">
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                                if(has_post_thumbnail()){
                                    the_post_thumbnail('frontpage-events');
                                }else{ ?>
                                    <img class="profile-creative-image" src="<?php echo get_theme_file_uri('images/team-1-170x172.png')?>" alt="" width="170" height="172"/>
                                <?php } 
                            ?>                           
                        </a>
                    </figure>
                    <div class="profile-creative-main">
                    <h5 class="profile-creative-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>
                    <div class="profile-creative-contacts">
                        <div class="object-inline">
                            <?php $eventDate = new DateTime(get_field('event_date')); ?>
                            <span class="icon icon-md mdi mdi-calendar-clock pt-1"></span>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo $eventDate->format('l') ; ?>, <?php echo $eventDate->format('d') .' '. $eventDate->format('M') .' '. $eventDate->format('Y'); ?>
                            </a>
                        </div>
                        <p><?php 
                            if(has_excerpt()){
                                the_excerpt(); 
                            } else{
                            echo wp_trim_words(get_the_content(), 16);
                            }?>
                        </p>
                    </div>
                    
                    </div>
                </article>
            </div>
            
        <?php  } wp_reset_postdata(); ?>
        
        <div class="col-12">
            <div class="button-outer">
                <a class="button button-lg button-primary button-winona" href="<?php echo get_post_type_archive_link('event');?>">View all events</a>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Featured Pillar of the month -->
<section class="section section-sm pb-5 bg-gray-100">
      
    <div class="container">
        <h3 class="text-center">Featured Pillar of the Month</h3>
        <div class="row row-50 justify-content-center justify-content-lg-between flex-lg-row-reverse">
            <?php $argsFeaturedArray = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'category_name' => 'featured-pillar'
                );
                $featuredlDisplay = new WP_Query($argsFeaturedArray);
                while($featuredlDisplay->have_posts()){
                    $featuredlDisplay->the_post(); ?>

                <div class="col-md-10 col-lg-6 col-xl-5 align-self-center">
                    <h3><?php the_title(); ?></h3>
                    <?php 
                        if(has_excerpt()){
                            the_excerpt(); 
                        } else{
                            echo wp_trim_words(get_the_content(), 250);
                        }
                    ?>
                    <div class="button-outer">
                        <a class="button button-lg button-primary button-winona" href="<?php the_permalink(); ?>">Learn more</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php 
                        if(has_post_thumbnail()){
                            the_post_thumbnail();
                        }else{ ?>
                            <img src="<?php echo get_theme_file_uri('images/single-service-01-570x364.jpg');?>" alt="" width="570" height="364"/>
                        <?php } ?> 
                </div>

                <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<!--Parallax Inspirational reading -->
<?php 
$argsInspirational = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'category_name' => 'inspirational'
    );
    $inspirationalDisplay = new WP_Query($argsInspirational);
    while($inspirationalDisplay->have_posts()){
        $inspirationalDisplay->the_post(); 
        
        if(has_post_thumbnail()){
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        }else{
            $featured_img_url = get_theme_file_uri('images/parallax-1-1920x900.jpg');
        }
        ?>        
        <section class="section parallax-container" data-parallax-img="<?php echo $featured_img_url; ?>">
            <div class="parallax-content section-lg context-dark banner-dark-bg">
                <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-sm-12 col-md-10 col-lg-7">
                    <div class="heading-4">Inspirational Readings</div>
                    
                            <div class="offset-top-18">
                                <h3><?php the_title(); ?></h3>
                                <?php 
                                    if(has_excerpt()){
                                        the_excerpt(); 
                                    } else{
                                        echo wp_trim_words(get_the_content(), 40);
                                    }
                                ?>
                                
                                <p><a class="button button-primary button-winona" href="<?php the_permalink(); ?>">Read more</a></p>
                            </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
<?php } wp_reset_postdata(); ?>

<!-- Testimonials-->
<section class="section section-lg text-center bg-gray-100">
    <div class="container">
        <h3>Testimonials</h3>
        <div class="owl-carousel" data-items="1" data-md-items="2" data-dots="true" data-nav="false" data-margin="30" data-stage-padding="0" data-autoplay="false" data-loop="false" data-mouse-drag="false">
            <?php 
                $tetimonialsDisplay =  new WP_Query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 6,
                ));
                
                while($tetimonialsDisplay->have_posts()){
                    $tetimonialsDisplay->the_post();?>

                <blockquote class="quote-modern quote-modern-big">
                    <svg class="quote-modern-mark" width="39" height="40" viewBox="0 0 39 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 25.2632C0 17.6608 0.924444 11.8713 2.77333 7.89474C4.62222 3.91813 7.91556 1.28655 12.6533 0L15.6 4.38597C12.48 5.78947 10.3422 7.83626 9.18667 10.5263C8.14667 13.0994 7.62667 17.1345 7.62667 22.6316H14.7333V40H0V25.2632ZM23.4 25.2632C23.4 17.6608 24.3244 11.8713 26.1733 7.89474C28.0222 3.91813 31.3156 1.28655 36.0533 0L39 4.38597C35.88 5.78947 33.7422 7.83626 32.5867 10.5263C31.5467 13.0994 31.0267 17.1345 31.0267 22.6316H38.1333V40H23.4V25.2632Z"></path>
                    </svg>
                    <div class="quote-modern-text"> 
                   
                    <p><?php 
                            if(has_excerpt()){
                                the_excerpt(); 
                            } else{
                            echo wp_trim_words(get_the_content(), 40);
                            }?>
                        </p>
                        <a class="button button-sm button-new-primary-outline button-winona low-20" href="<?php the_permalink(); ?>">
                            <div class="content-original">Read More</div>
                            <div class="content-dubbed">Read More</div>
                        </a>
                    </div>
                    <div class="quote-modern-meta">
                        <div class="quote-modern-avatar">
                            <?php 
                                if(has_post_thumbnail()){
                                    the_post_thumbnail('frontpage-testimonial');
                                }else{ ?>
                                    <img src="<?php echo get_theme_file_uri('images/testimonials-person-1-48x48.jpg');?>" alt="" width="100" height="100"/>
                                <?php } 
                            ?>  
                        </div>
                        <div class="quote-modern-info">
                            <a href="<?php the_permalink(); ?>">
                                <cite class="quote-modern-cite"><?php the_title(); ?></cite>
                                <p class="quote-modern-caption"><?php the_field('designation'); ?></p>
                            </a>
                        </div> 
                      
                        
                    </div>
                </blockquote>

                <?php  } wp_reset_postdata(); ?>            
        </div>
        <br>
        </div class="pt-5 text-left">
        <a class="button-winona" href="<?php echo site_url('/testimonials')?>"><i class="mdi mdi-arrow-right"></i>  View all testimonials</a>
    </div>
</section>

<!-- CFC Blog Posts-->
<section class="section section-lg text-center">
    <div class="container">
        <h3>Latest News</h3>
        <div class="row row-50">
        <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'category_name' => 'news'
            );
            $firstPostDisplay = new WP_Query($args);

            while( $firstPostDisplay->have_posts()) {
            $firstPostDisplay->the_post(); ?>

            <div class="col-sm-6 col-md-4 col-lg-3">
            
                <article class="post-tiny">
                    <a class="post-tiny-media" href="<?php the_permalink(); ?>">
                    <?php 
                        if(has_post_thumbnail()){
                            the_post_thumbnail('frontpage-lastesnews');
                        }else{ ?>
                            <img src="<?php echo get_theme_file_uri('images/blog-layouts-1-270x184.jpg')?>" alt="" width="270" height="184"/>
                        <?php } 
                    ?>   
                    </a>
                <h5 class="post-tiny-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <ul class="post-light-meta ">
                    <li>by <span class="author-style"><?php the_author_posts_link(); ?></span></li>
                    <li><?php echo get_the_category_list(', ');?></li>
                </ul>
                </article>
            </div>
            <?php  } wp_reset_postdata(); ?>
            </div><a class="button button-primary-outline button-winona" href="<?php echo site_url('/latest-news')?>">View all posts</a>
        </div>
</section>

<?php get_footer();?>