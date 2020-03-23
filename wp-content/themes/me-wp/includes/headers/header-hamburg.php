<?php if(is_home() || is_tag() || is_404() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_attachment()){
    $header_menu_style = me_wp_option('header_menu_style');
} else {
    $header_menu_style = me_wp_get_field('header_menu_style');
}
if($header_menu_style == 'light'){
    $style = 'light';
} else {
    $style = '';
} ?>
<!-- Header -->
<header class="header <?php echo esc_attr($style); ?>">
    <div class="sticky">
        <div class="container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $image_logo = me_wp_option('image_logo');
                    if(!empty($image_logo)){ ?>
                        <img src="<?php echo esc_url($image_logo); ?>" alt="<?php bloginfo('name'); ?>">
                    <?php } else{ ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                    <?php } ?>
                </a>
            </div>
            <!-- MEnu Show Hide -->
            <div class="menu-shows">
                <div class="menu-shows-inner"></div>
            </div>
            <div class="menu animated fadeIn">
                <!-- Nav -->
                <nav class="navbar ownmenu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false">
                            <span>
                                <i class="fa fa-navicon"></i>
                            </span>
                        </button>
                    </div>
                    <!-- NAV -->
                    <div class="collapse navbar-collapse" id="nav-open-btn">
                        <ul class="nav">
                            <?php if ( has_nav_menu( 'header-hamburg' ) ) :
                                wp_nav_menu( array( 'theme_location' => 'header-hamburg','container' => '','walker' => new me_wp_walker_nav_menu(),'items_wrap' => '%3$s' ) );
                            else:
                                echo '<li><a>' . esc_html__( 'Define your header hamburg menu.', 'me-wp' ) . '</a></li>';
                            endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->