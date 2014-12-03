<div class="page-header">
	<div class="page-header-container container">
		<div class="page-header-inner">
			<h1 class="archive-title text-uppercase"><?php	printf( __( '%s\'<span class="text-lowercase">s</span> <small>articles</small>' ), get_the_author() ); ?></h1>
			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="row">
		      <div class="author-avatar">
		        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentythirteen_author_bio_avatar_size', 74 ) ); ?>
		      </div><?php // END: .author-avatar ?><!-- .author-avatar -->
		      <div class="author-description">
		        <p class="author-bio">
		          <?php the_author_meta( 'description' ); ?>
		        </p>
		      </div><?php // END: .author-description ?>
		    </div>
			</div>              
			<?php endif; ?>
		</div>
	</div>
</div><?php // END: .page-header ?>