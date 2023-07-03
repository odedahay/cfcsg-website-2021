<?php

    /*
        Template Name: Evangelization Page
    */

    get_header();

    while(have_posts()){
        the_post();  
        $theParent = wp_get_post_parent_id(get_the_ID()); 
        ?>

        <!-- Breadcrumbs-->
        <?php pageBanner(array(
            'parent' => $theParent
        )); ?>
        
        <!-- New Layout-->
        <section class="section section-sm">
            <div class="container">
                  <!-- event function -->
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
                            ),
                            array(
                                'key' => 'related_organisation',
                                'compare' => 'LIKE',
                                'value' => '"'. get_the_id() . '"'
                            )
                        )
                    ));
                ?>
                <!-- End -->
                <div class="row row-50">
                    <!--Start: Left -->
                    <div class="col-md-8">
                        <article class="post-creative">
                            <h2 class="post-creative-title"><?php the_title(); ?></h2>
                            
                            <?php the_content(); ?>

                        </article>
                    </div>
                    <!-- End:Left -->
                    <!-- Start: Right -->
                    <div class="col-md-4">
                        <?php 
                            $testArray = get_pages(array(
                                'child_of' => get_the_ID()
                            ));
                            
                            if($theParent or $testArray) {?>
                        
                            <!-- Profile Thin-->
                            <article class="profile-thin">
                                <ul class="text-accent-dark list-marked">
                                    <li><a href="<?php echo get_the_permalink($theParent); ?>">
                                        <?php echo get_the_title($theParent); ?></a>
                                    </li>
                                </ul>
                              
                                <ul class="text-accent-dark list-marked">
                                    <?php
                                        if($theParent){
                                            $findChildrenOf = $theParent;
                                        }else{
                                            $findChildrenOf = get_the_ID();
                                        }

                                        wp_list_pages(array(
                                            'title_li' => NULL,
                                            'child_of' => $findChildrenOf,
                                            'sort_column' => 'menu_order'
                                        ));
                                    ?>
                                </ul>
                                <!-- <a class="button button-sm button-primary-outline button-winona" href="#">View CFC SG Governance Team</a> -->
                                <br>
                                <?php get_template_part('template-parts/sidebar-social');?>
                            </article>
                            <br>
                        
                        <?php } ?>
                           <!-- Event Function -->
                           <div>
                                <?php if($homepageEvents->have_posts()){ ?>
                                    <h5 class="text-left">Upcoming <?php echo get_the_title(); ?> Event(s):</h5>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <?php 
                                            
                                        while($homepageEvents->have_posts()){
                                            $homepageEvents->the_post(); ?>

                                        <div div class="col-sm-3">
                                            <!-- Profile Creative-->

                                            <article class="profile-creative">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php $eventDate = new DateTime(get_field('event_date')); ?>
                                                    <time class="post-light-time_sidebar" datetime="<?php echo $eventDate->format('Y'); ?>">
                                                        <span class="post-light-time-big"><?php echo $eventDate->format('d') ?></span>
                                                        <span class="post-light-time-small"><?php echo $eventDate->format('M') .' '. $eventDate->format('Y'); ?></span>
                                                    </time>
                                                </a> 
                                            </article>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="profile-creative-main_">
                                                <h5 class="profile-creative-title">
                                                    <a href="<?php the_permalink(); ?>" class="font-size-sidebar"><?php the_title(); ?></a></h5>
                                                <div class="object-inline"><span class="icon icon-md mdi mdi-clock pt-1"></span> 
                                                    <?php the_field('event_time'); ?>
                                                    </div>
                                                    <div class="profile-creative-contacts">
                                                        <p><?php 
                                                            if(has_excerpt()){
                                                                the_excerpt(); 
                                                            } else{
                                                            echo wp_trim_words(get_the_content(), 16);
                                                            }?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php  } wp_reset_postdata(); ?>
                                <?php } ?>
                            </div>
                           <!-- event function -->
                    </div> 
                    <!-- End: Right -->
                    <!-- end sidebar -->
                
                </div>
            </div>
        </section>
    
    <?php }

    get_footer();
?>