<?php get_header();

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
                <div class="row row-50">
                    
                    <div class="col-lg-8">
                        <article class="post-creative">
                            <h2 class="post-creative-title"><?php the_title(); ?></h2>
                            
                            <?php the_content(); ?>

                        </article>
                    </div>
                    <?php 
                        
                        $testArray = get_pages(array(
                            'child_of' => get_the_ID()
                        ));
                        
                        if($theParent or $testArray) {?>

                        <div class="col-lg-4">
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
                        </div>
                    <?php } ?>
                
                </div>
            </div>
        </section>
    
    <?php }

    get_footer();
?>