<nav class="navbar navbar-blect-top navbar-static-top" role="navigation">
    <div class="container">
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'top',
            'depth'             => 1,
            'container'         => 'div',
            'container_class'   => 'navbar-blect',
            'menu_class'        => 'nav navbar-nav pull-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker(),
            )
        );
        ?>
    </div>
</nav>