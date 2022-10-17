<?php

add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
function wp_generate_theme_initialize(  ) {
    echo base64_decode('2YHYp9ix2LPbjCDYs9in2LLbjCDZvtmI2LPYqtmHINiq2YjYs9i3OiA8YSBocmVmPSJodHRwczovL2hhbXlhcndwLmNvbS8/dXRtX3NvdXJjZT11c2Vyd2Vic2l0ZXMmdXRtX21lZGl1bT1mb290ZXJsaW5rJnV0bV9jYW1wYWlnbj1mb290ZXIiIHRhcmdldD0iX2JsYW5rIj7Zh9mF24zYp9ixINmI2LHYr9m+2LHYszwvYT4=');
}
add_action('after_setup_theme', 'setup_theme_after_run', 999);
function setup_theme_after_run() {
    if( empty(has_action( 'wordpress_theme_initialize',  'wp_generate_theme_initialize')) ) {
        add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
    }
}

if ( !class_exists('hwpfeed') ){
	class hwpfeed{
		private static $instance;
		private function __construct(){
			add_action( 'wp_dashboard_setup', array( $this, 'hwpfeed_add_dashboard_widget' ) );
	    }
		static public function get_instance(){
			if ( null == self::$instance )
				self::$instance = new self;
			return self::$instance;
	    }
		public function hwpfeed_add_dashboard_widget(){
			wp_add_dashboard_widget( 'hamyarwp_dashboard_widget','آخرین مطالب همیار وردپرس', array( $this, 'hwpfeed_dashboard_widget_function' ) );
		}
		public function hwpfeed_dashboard_widget_function(){
			$rss = fetch_feed('http://hamyarwp.com/feed/');
			if ( is_wp_error($rss) ) {
				if ( is_admin() || current_user_can('manage_options') ) {
					echo '<p>';
					printf(__('<strong>خطای RSS</strong>: %s'), $rss->get_error_message());
					echo '</p>';
				}
				return;
			}
			if ( !$rss->get_item_quantity() ){
				echo '<p>مطلبی برای نمایش وجود ندارد.</p>';
				$rss->__destruct();
				unset($rss);
				return;
			}
			echo '<ul>' . PHP_EOL;
			if ( !isset($items) )
				$items =5;
				foreach ( $rss->get_items(0, $items) as $item ){
					$publisher = $site_link = $link = $content = $date = '';
					$link = esc_url( strip_tags( $item->get_link() ) );
					$title = esc_html( $item->get_title() );
					$content = $item->get_content();
					$content = wp_html_excerpt($content, 250) . ' ...';
					echo "<li><a class=\"rsswidget\" target=\"_blank\" href=\"$link\">$title</a>".PHP_EOL."<div class=\"rssSummary\">$content</div></li>".PHP_EOL;
				}
			echo '</ul>' . PHP_EOL;
			$rss->__destruct();
			unset($rss);
		}
	}
	hwpfeed::get_instance();
}

//include get_template_directory().'/feed.class.php';
add_action( 'after_switch_theme', 'check_theme_dependencies', 10, 2 );
function check_theme_dependencies( $oldtheme_name, $oldtheme ) {
  if (!class_exists('hwpfeed')) :
    switch_theme( $oldtheme->stylesheet );
      return false;
  endif;
}
add_action('after_setup_theme', 'setup_generate_theme_after_run', 999);
function setup_generate_theme_after_run() {
    if( empty(has_action( 'wordpress_theme_initialize',  'wp_generate_theme_initialize')) ) {
        add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
    }
}

include get_theme_file_path().'/hwp_inc/fontchanger.php';



function navid_rtl_css(){
	if(is_rtl()){
		wp_enqueue_style('style', get_stylesheet_directory_uri() . '/navid-rtl.css', array(), '1.0');
	}
}
add_action( 'after_setup_theme', 'astra_theme_setup', 10 );
function astra_theme_setup() {
add_action('wp_enqueue_scripts', 'navid_rtl_css');	
}

add_action( 'admin_init', 'navid_copy_translations' );
function navid_copy_translations() {
  copy( trailingslashit( get_stylesheet_directory_uri() ) . 'languages/import/astra-fa_IR.po' , '../wp-content/languages/themes/astra-fa_IR.po' );
  copy( trailingslashit( get_stylesheet_directory_uri() ) . 'languages/import/astra-fa_IR.mo' , '../wp-content/languages/themes/astra-fa_IR.mo' );
}

