<?php 
    /**
     * Template Name: Family Ministry
     * Template Post Type: organisation
     **/

    get_header(); 
    
    while(have_posts()) { ?>
        <?php the_post(); 

            $clusterArea = '';
            $parentCluster = site_url('family-ministries/');
            
            // Breadcrumbs
            pageBanner(array(
                'title-decor' => $clusterArea,
                'parent' => 'Family Ministries',
                'parentlink' => $parentCluster
            ));

            // tab's image
            $org_title = get_field('organisational_title');
            $org_img = get_field('organisational_image');

        ?>

        <section class="section section-md">
            <div class="container">
                
                <div class="row">
                   
                    <div class="col-md-12">
                    <!-- Bootstrap tabs-->
                    <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
                        <!-- Nav tabs-->
                        <ul class="nav nav-tabs">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Our Ministry</a></li>
                            <?php
                                if($org_img){ ?>
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Organisation</a></li>
                            <?php } ?>
                        </ul>
                        

                        <!-- Tab panes-->
                        <div class="tab-content">
                            <!-- Tab 1 -->
                            <div class="tab-pane fade show active" id="tabs-1-1">
                                <?php the_content(); ?>
                            </div>
                            <!-- Tab 2 -->
                            <?php
                               if($org_img){?>
                                   <div class="tab-pane fade" id="tabs-1-2">
                                       <?php if($org_title) { ?>
                                            <h3 class="text-left pb-3"><?php echo $org_title; ?> </h3>
                                        <?php } ?>
                                   
                                        <img src="<?php echo $org_img['url']; ?>" alt="<?php echo $org_img['name']; ?>" class="img-fluid" />
                                    </div>
                               <?php }?>
                                
                           
                            <!-- <div class="tab-pane fade" id="tabs-1-3">
                                <ul class="list-marked">
                                <li>Dapibus ultrices in iaculis nunc.</li>
                                <li>Maecenas sed enim ut sem viverra.</li>
                                <li>Nunc scelerisque viverra mauris in aliquam sem.</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end row -->
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

                <?php if($homepageEvents->have_posts()){ ?>
                    <h4 class="text-left pb-3 pt-5">Upcoming <?php echo get_the_title(); ?> Event(s):</h4>
                    <hr>
                    <div class="row row-50 row-xxl-70 offset-top-6 justify-content-center justify-content-lg-start">
                    <?php 
                        
                        while($homepageEvents->have_posts()){
                            $homepageEvents->the_post(); ?>

                            <div class="col-md-10 col-lg-6">
                                <!-- Profile Creative-->

                                <article class="profile-creative">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php $eventDate = new DateTime(get_field('event_date')); ?>
                                        <time class="post-light-time" datetime="<?php echo $eventDate->format('Y'); ?>">
                                            <span class="post-light-time-big"><?php echo $eventDate->format('d') ?></span>
                                            <span class="post-light-time-small"><?php echo $eventDate->format('M') .' '. $eventDate->format('Y'); ?></span>
                                        </time>
                                    </a>
                                    <div class="profile-creative-main">
                                        <h5 class="profile-creative-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="object-inline"><span class="icon icon-md mdi mdi-clock pt-1"></span> 
                                    <?php the_field('event_time'); ?>
                                </div>
                                        <div class="profile-creative-contacts margin-top-10">
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
                <?php } ?>
                <!-- End -->
            </div>
            
        </section>
    <?php } ?>

<?php get_footer(); ?>

