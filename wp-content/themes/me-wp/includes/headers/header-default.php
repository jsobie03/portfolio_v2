<!-- Header -->
<header class="header df-transparent">
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
                        <?php if ( has_nav_menu( 'header-default' ) ) :
                            wp_nav_menu( array( 'theme_location' => 'header-default','container' => '','walker' => new me_wp_walker_nav_menu(),'items_wrap' => '%3$s' ) );
                        else:
                            echo '<li><a>' . esc_html__( 'Define your header default menu.', 'me-wp' ) . '</a></li>';
                        endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- End Header -->