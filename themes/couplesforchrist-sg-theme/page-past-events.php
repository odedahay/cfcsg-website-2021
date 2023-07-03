<?php 
    get_header(); 
    $theParent = wp_get_post_parent_id(get_the_ID()); 
    ?>

    <!-- Breadcrumbs-->
    <?php pageBanner(array('parent' => $theParent)); ?>

    <!-- Main Cont-->
    <section class="section section-md">
        <div class="container">
            <!-- <div class="row row-50 row-xxl-70"> -->
            <div class="row row-50 row-xxl-70 offset-top-6 justify-content-center justify-content-lg-start">
            <?php 
                    $today = date('Ymd');
                    $pastEvents = new WP_Query(array(
                        'paged' => get_query_var('paged', 1),
                    //  'posts_per_page' => 1,
                        'post_type' => 'event',
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'event_date',
                                'compare' => '<',
                                'value' => $today,
                                'type'=> 'numeric'
                            )
                        )
                    ));
                while ( $pastEvents->have_posts() ) {
                    $pastEvents->the_post(); ?>


                    <div class="col-md-10 col-lg-10">
                        <!-- Profile Creative-->
                        <article class="profile-creative">
                            <a href="<?php the_permalink(); ?>">
                                <?php $eventDate = new DateTime(get_field('event_date')); ?>
                                <time class="post-light-time calendar-gray" datetime="<?php echo $eventDate->format('Y'); ?>">
                                    <span class="post-light-time-big"><?php echo $eventDate->format('d') ?></span>
                                    <span class="post-light-time-small"><?php echo $eventDate->format('M') .' '. $eventDate->format('Y'); ?></span>
                                </time>
                            </a>
                            <div class="profile-creative-main">
                            <h5 class="profile-creative-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <div class="object-inline"><span class="icon icon-md mdi mdi-clock pt-1"></span> 
                                    <?php the_field('event_time'); ?> to <?php the_field('event_end_time'); ?>
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
            <!-- Post Modern-->
            </div>
            
            <div class="pagination"> 
            <?php echo paginate_links(array(
                'total' => $pastEvents->max_num_pages
            )); ?>
            <!-- <div class="page-item active"><a class="page-link button-winona" href="#">1</a></div>
            <div class="page-item"><a class="page-link button-winona" href="#">2</a></div>
            <div class="page-item"><a class="page-link button-winona" href="#">3</a></div>
            <div class="page-item"><a class="page-link button-winona" href="#">4</a></div>
            -->
            </div> 
        </div>
    </section>

<?php get_footer(); ?>