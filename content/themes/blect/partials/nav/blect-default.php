<nav class="navbar navbar-blect-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-blect-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/logo-vert.png" alt="<?php bloginfo('name'); ?>"></a>
        </div>

        <?php
        wp_nav_menu( array(
            'theme_location'    => 'main',
            //'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse navbar-blect-collapse',
            'menu_class'        => 'nav navbar-nav pull-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker(),
            )
        );
        ?>
    </div>
</nav>