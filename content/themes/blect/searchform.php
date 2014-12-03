<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text sr-only"><?php echo _x( 'Search for:', 'label' ) ?></span>
	</label>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="input-group">
			    <input type="search" class="search-field form-control input-lg" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
			    <span class="input-group-btn">
			        <button class="btn btn-danger search-submit input-lg text-uppercase" type="submit"><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
			    </span>
		    </div>
		</div>
	</div>

</form>