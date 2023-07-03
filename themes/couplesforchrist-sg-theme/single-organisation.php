
<?php get_header(); 
    
    while(have_posts()) { ?>
        <?php the_post(); 

            if(is_single(117) || is_single(118) ||is_single(119) || is_single(120) ){
                $clusterArea = 'Cluster 1';
                $parentCluster = site_url('/sector#cluster1');
            }else{
                $clusterArea = 'Cluster 2';
                $parentCluster = site_url('/sector#cluster2');
            }
            
            // Breadcrumbs
            pageBanner(array(
                'title-decor' => $clusterArea,
                'parent' => 'Cluster Home',
                'parentlink' => $parentCluster
            ));

            // tab's image
            $org_title = get_field('organisational_title');
            $org_title2 = get_field('organisational_title_2');
            $org_img = get_field('organisational_image');
            $org_img2 = get_field('organisational_image_2');

        ?>

        <section class="section section-sm">
            <div class="container">
                
                <div class="row">
                   
                    <div class="col-md-12">
                        <!-- Bootstrap tabs-->
                        <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
                            <!-- Nav tabs-->
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">
                                    <?php if( get_the_ID() === 169 or get_the_ID() === 168 or get_the_ID() === 167 or get_the_ID() === 166 or get_the_ID() === 165) {?>
                                        Our Ministry
                                        <?php } else { ?>
                                            Our Chapter
                                        <?php } ?>
                                    </a>
                                </li>
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
                                   <div class="tab-pane fade pb-3" id="tabs-1-2">
                                       <?php if($org_title) { ?>
                                            <h2 class="text-center pb-1"><?php echo $org_title; ?> </h2>
                                        <?php } ?>
                                   
                                        <img src="<?php echo $org_img['url']; ?>" alt="<?php echo $org_img['name']; ?>" class="img-fluid mb-2" />
                                        <?php if($org_img2){?>
                                            <hr class="pb-4">
                                            <?php if($org_title2) { ?>
                                                <h2 class="text-center pb-1"><?php echo $org_title2; ?> </h2>
                                             <?php } ?>
                                            <img src="<?php echo $org_img2['url']; ?>" alt="<?php echo $org_img2['name']; ?>" class="img-fluid" />
                                        <?php }?>
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
                <?php 
                    $tetimonialsDisplay =  new WP_Query(array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => 6,
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'related_testimonial',
                                'compare' => 'LIKE',
                                'value' => '"'. get_the_id() . '"'
                            )
                        )
                    ));

                if ($tetimonialsDisplay->have_posts()){ ?>

                <h4 class="text-left pb-3 pt-5">Related Testimonials</h4>
                <hr>
                <br>
                    <section class="section text-center">
                        <div class="owl-carousel" data-items="1" data-md-items="2" data-dots="true" data-nav="false" data-margin="30" data-stage-padding="0" data-autoplay="false" data-loop="false" data-mouse-drag="false">
                    
                            <?php while($tetimonialsDisplay->have_posts()){
                                $tetimonialsDisplay->the_post();?>

                                <blockquote class="quote-modern quote-modern-big">
                                    
                                    <div class="quote-modern-meta">
                                        <div class="quote-modern-avatar">
                                            <?php 
                                                if(has_post_thumbnail()){
                                                    the_post_thumbnail('frontpage-testimonial');
                                                }else{ ?>
                                                    <img src="<?php echo get_theme_file_uri('images/testimonials-person-1-48x48.jpg');?>" alt="" width="120" height="120"/>
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
                                    <div class="quote-modern-text"> 
                                
                                        <p>
                                            <?php 
                                            if(has_excerpt()){
                                                the_excerpt(); 
                                            } else{
                                            echo wp_trim_words(get_the_content(), 28);
                                            }?>
                                        </p>
                                        <a class="button button-sm button-new-primary-outline button-winona low-20" href="<?php the_permalink(); ?>">
                                            <div class="content-original">Read More</div>
                                            <div class="content-dubbed">Read More</div>
                                        </a>
                                    </div>
                                    <br>
                                </blockquote>
                            <?php  } wp_reset_postdata(); ?> 
                        </div>
                    </section>

                <?php } ?> 
                
                <!-- Event Start here-->
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
                    <h4 class="text-left pb-3 pt-5">Upcoming <?php echo get_the_title(); ?> Events:</h4>
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

