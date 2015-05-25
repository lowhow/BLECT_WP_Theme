<?php namespace Framework\Extensions\Apple101;
use Framework\Core\Observer as Observer;
use Framework\WordPress\Loader as Loader;

class Quicktags implements Observer
{	
	private $loader;

	public function __construct( Loader $loader )
	{
		$this->loader = $loader;
	}

	public function handle() 
	{
		$this->loader
		->add_action( 'admin_print_footer_scripts', $this, 'custom_panel_quicktags' );
		return $this;
	}

	/**
	 * Ad Size
	 * @param  array 	$atts [description]
	 * @return string   HTML string
	 */
	public function custom_panel_quicktags() {
	    if (wp_script_is('quicktags')){
		?>
		    <script type="text/javascript">
		    QTags.addButton( 'fw_clipintro', '简介', '<p class="clipintro">', '</p>', '', '简介 clipintro', 200 );
		    QTags.addButton( 'fw_clipintro', '温馨提醒', '<p class="cliptips">', '</p>', '', '温馨提醒 cliptips', 200 );
		    QTags.addButton( 'fw_clipalert', '注意', '<p class="clipalert">', '</p>', '', '注意 clipalert', 200 );
		    QTags.addButton( 'fw_cliprecommend', '推荐', '<p class="cliprecommend">', '</p>', '', '推荐 cliprecommend', 200 );
		    QTags.addButton( 'fw_clipvoiceup', '有话说', '<p class="clipvoiceup">', '</p>', '', '有话说 clipvoiceup', 200 );
		    QTags.addButton( 'fw_clipdidyouknow', '你知道吗？', '<p class="clipdidyouknow">', '</p>', '', '你知道吗？ clipdidyouknow', 200 );
		    QTags.addButton( 'fw_cliptravelguide', '旅游指南', '<p class="cliptravelguide">', '</p>', '', '旅游指南 cliptravelguide', 200 );
		    QTags.addButton( 'fw_clipqna', '问与答', '<div class="clipqna">', '</div>', '', '问与答 clipqna', 200 );
		    QTags.addButton( 'fw_clipqna_q', ':问', '<span class="clipqna_q">', '</span>', '', '问 clipqna_q', 200 );
		    QTags.addButton( 'fw_clipqna_a', ':答', '<span class="clipqna_a">', '</span>', '', '答 clipqna_a', 200 );
		    QTags.addButton( 'fw_tnc', '规则', '<div class="tnc">', '</div>', '', '规则 tnc', 200 );
		    </script>
		<?php
	    }
	}
}
