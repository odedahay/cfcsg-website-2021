<?php 
      /*
        Template Name: Social Ministry
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

        <?php 
            // tab's image
            $socmin_org = get_field('socmin_organisation');
            $socmin_org_img_main = get_field('socmin_organisation_image');
            $socmin_org_core = get_field('socmin_organisation_core');
            $socmin_org_img_core = get_field('socmin_organisation_image_core');
            $socmin_affiliates = get_field('socmin_affiliates');
        ?>
        
        <!-- New Layout-->
        <section class="section section-sm" style="padding-bottom:0">
            <div class="container">
                <div class="row">
                    
                <div class="col-md-12">
                        <!-- Bootstrap tabs-->
                        <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
                            <!-- Nav tabs-->
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Social Ministry</a></li>
                                <?php
                                    //if($org_img){ ?>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Organisation</a></li>
                                <?php //} ?>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Affiliates</a></li>
                            </ul>
                            <!-- Tab panes-->
                            <div class="tab-content">
                            <!-- Tab 1 -->
                            <div class="tab-pane fade show active" id="tabs-1-1">
                                <article class="post-creative">
                                    <?php the_content(); ?>
                                </article>
                            </div>
                            <!-- Tab 2 -->
                            <?php //if($org_img){?>
                            <div class="tab-pane fade pb-3" id="tabs-1-2">
                                <article class="post-creative">
                                    <?php //if($org_title) { ?>
                                        <p><?php echo $socmin_org; ?> </p>
                                    <?php //} ?>

                                    <img src="<?php echo $socmin_org_img_main['url']; ?>" alt="<?php echo $socmin_org_img_main['name']; ?>" class="img-fluid mb-2" />
                                    <p><?php echo $socmin_org_core; ?> </p>

                                    <img src="<?php echo $socmin_org_img_core['url']; ?>" alt="<?php echo $socmin_org_img_core['name']; ?>" class="img-fluid mb-2" />

                                </article>
                            </div>
                            <?php //}?>
                            
                             <!-- Tab 3 -->
                            <div class="tab-pane fade" id="tabs-1-3">
                                <article class="post-creative"><?php echo $socmin_affiliates; ?> </article>
                            </div> 
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </section>
    <?php } ?>

<!-- SOCMIN Activities Posts-->


<!-- Event Tags-->
<section class="section section-sm" style="padding-top:0">
    <div class="container">
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
<?php get_footer(); ?>