<?php

add_action('rest_api_init', 'couplesforchristRegisterSearch');

function couplesforchristRegisterSearch(){
    register_rest_route('couplesforchrist/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'couplesforchristSearchReasults'
    ));
}

function couplesforchristSearchReasults($data){
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'organisation', 'event', 'testimonial'),
        's' => sanitize_text_field($data['keyword'])
      ));

    $results = array(
    'generalInfo' => array(),
    'events' => array(),
    'latestNews' => array()
    );

    while($mainQuery->have_posts()){
        $mainQuery->the_post();

        if(get_post_type()== 'page' OR get_post_type() === 'organisation' OR get_post_type() === 'testimonial'){
            array_push($results['generalInfo'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'postType' => get_post_type()
            ));
        }

        if(get_post_type() === 'post'){
            array_push($results['latestNews'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'postType' => get_post_type(),
                'authorName' => get_the_author(),
                'image' => get_the_post_thumbnail_url()
            ));
        }

        if(get_post_type() === 'event'){
            $eventDate = new DateTime(get_field('event_date'));
            $description = null;

            if(has_excerpt()){
                $description = get_the_excerpt();
            }else{
                $description = wp_trim_words(get_the_content(), 12);
            }

            array_push($results['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'year' => $eventDate->format('Y'),
                'description' => $description,
                'image' => get_the_post_thumbnail_url()
            ));
        }
       
    }
    
    return $results;
}


function pageBanner($args = NULL){

    if(!$args['title-decor']){
        $args['title-decor'] = get_the_title('title-decor');
    }

    if(!$args['title']){
        $args['title'] = get_the_title();
    }
    if(!$args['banner']){
       if(get_field('page_banner_background_image')){
        $args['banner'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
       }else{
        $args['banner'] = get_theme_file_uri('/images/banner-default-1920x300.jpg'); 
       }
    }

    $theParent = $args['parent'];

    if(get_the_title($theParent)){
        $hasParent = get_the_title($theParent);
        $hasParentLink = get_permalink($theParent);
    }else{
        $hasParent = $theParent;
        $hasParentLink = $args['parentlink'];
    }

    ?>
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(<?php echo $args['banner']; ?>);">
        <div class="breadcrumbs-custom-inner banner-dark-bg">
            <div class="container breadcrumbs-custom-container">
                <div class="breadcrumbs-custom-main">
                    <!-- <h6 class="breadcrumbs-custom-subtitle title-decorated"><?php //echo $args['title-decor'] ?></h6> -->
                    <h1 class="breadcrumbs-custom-title"><?php echo $args['title'] ?></h1>
                </div>
                <?php
                    if($theParent){ ?>
                        <ul class="breadcrumbs-custom-path">
                            <!-- <li><a href="<?php //echo $hasParentLink; ?>">Back To <?php //echo $hasParent; ?></a></li>-->
                            <!-- <li class="active"><a><?php //the_title(); ?></a></li> -->
                        </ul>
                    <?php } else{ ?>
                        <ul class="breadcrumbs-custom-path">
                            <li></li>
                        </ul>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }


function couplesforchrist_widget(){
    register_sidebar(array(
        'name' => 'Post Sidebar',
        'id' => 'latest_news_sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<p class="profile-thin-title text-left">',
        'after_title' => '</p>',
    ));

}
add_action('widgets_init', 'couplesforchrist_widget');

function couplesforchrist_files(){

    wp_enqueue_script('coreJs', get_theme_file_uri('js/core.min.js'), NULL, '1.0', true);
    wp_enqueue_script('main-js-file', get_theme_file_uri('js/script.js'), 'coreJs', '1.0', true);
    wp_enqueue_script('search-js-file', get_theme_file_uri('js/search.js'), NULL, '1.0', true);
    wp_enqueue_script('axios', '//cdn.jsdelivr.net/npm/axios/dist/axios.min.js', NULL, '1.0', true);

    wp_enqueue_style('custom-google-font', '//fonts.googleapis.com/css2?family=Libre+Baskerville&amp;family=Work+Sans:wght@300;400;600&amp;display=swap');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css', array(), '1.0');
    wp_enqueue_style('couplesforchrist_main_styles', get_stylesheet_uri());
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom.css', array(), '1.0');

    wp_localize_script('main-js-file', 'cfcdata', array(
        'root_url' => get_site_url(),
    ));
}

add_action('wp_enqueue_scripts', 'couplesforchrist_files');

function couplesforchrist_features(){
    register_nav_menu('footerMainLink', 'Footer Link Nav Location');
    register_nav_menu('footerQuickLink', 'Footer Other Link Location');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('frontpage-lastesnews', 270, 184, true);
    add_image_size('frontpage-events', 170, 172, true);
    add_image_size('frontpage-testimonial', 100, 100, true);
    add_image_size('main-testimonial', 300, 300, true);
    add_image_size('pageBanner', 1920, 300, true);
    add_image_size('latesNews-home', 571, 353, true);
}
add_action('after_setup_theme', 'couplesforchrist_features');

function couplesforchrist_adjust_queries($query){
    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
        $today = date('Ymd');

        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type'=> 'numeric'
            )
        ));
    }
}
add_action('pre_get_posts', 'couplesforchrist_adjust_queries');

// Customize Login Screen

add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl(){
    return esc_url(site_url('/'));
}


add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom.css', array(), '1.0');
}


