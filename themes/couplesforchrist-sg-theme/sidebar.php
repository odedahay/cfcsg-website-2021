<article class="profile-thin">
    <div class="profile-thin-main">
        <?php 
            if(is_active_sidebar('latest_news_sidebar')) {
                dynamic_sidebar('latest_news_sidebar'); 
            }?>
    
        <?php get_template_part('template-parts/sidebar-social');?>
        <!-- <a class="button button-sm button-primary-outline button-winona" href="#">View full profile</a> -->
    </div>
</article>