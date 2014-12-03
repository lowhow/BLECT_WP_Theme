<?php
/**
 * The template for general page footer
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */
?>
        </div><?php // END: #main-inner ?>
    </div><?php // END: #main ?>

    <footer id="colophon" class="site-footer dark" role="contentinfo">
        <div id="colophon-inner" class="container">
            <div class="site-info">
                &copy; <?php echo date( 'Y' ) ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </div><?php // END: .site-info ?>
        </div><?php // END: #colophon-inner ?>
    </footer><?php // END: #colophon ?>
</div><?php // END: #page ?>

  <?php wp_footer(); ?>
</body>
</html>