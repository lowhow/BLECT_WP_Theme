<?php
/**
 * The template for general page footer
 *
 * @package WordPress
 * @subpackage Vun_Hougkh
 * @since The Starry Night 1.0 with Vun Hougkh 1.0
 */
?>
        </div><?php // END: .row ?>
      </div><?php // END: #main-inner ?>
    </div><?php // END: #main ?>

    <footer id="colophon" class="site-footer" role="contentinfo">
      <div id="colophon-inner" class="container">
        <div class="row">
          <div class="site-info">
            <?php if ( function_exists( 't_footerText' ) ) echo t_footerText(); ?>
          </div><?php // END: .site-info ?>
        </div><?php // END: .row ?>
      </div><?php // END: #colophon-inner ?>
    </footer><?php // END: #colophon ?>
  </div><?php // END: #page ?>

  <?php wp_footer(); ?>
</body>
</html>