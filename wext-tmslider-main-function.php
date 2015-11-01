<?php

/*
Plugin Name: WEXT Testimonial Slider 
Plugin URI: http://wexteam.com/plugins/testimonial-slider-ultimate
Description: The WEXT Testimonial Slider  is most popular & best testimonial slider plugin.If you are thinking to build a testimonial slider in your website, then WEXT Testimonial Slider plugin is most required to you for taking your conversion rate to the next level. 
Author: weXteam
Version: 1.2
Author URI: http://wexteam.com
*/


/*-----------------------------------------------------
 * Add Setting function
 *-----------------------------------------------------*/
require_once dirname( __FILE__ ) . '/wext-tmslider-settings-api.php';
require_once dirname( __FILE__ ) . '/wext-tmslider-settings-filed.php';

new wext_tmslider_Settings_API_main();



/*-----------------------------------------------------
 * trigger setting api class
 *-----------------------------------------------------*/
function wext_tmslider_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}



/*-----------------------------------------------------
 *Latest Jquery For WEXT Testimonial Slider Plugin.
 *------------------------------------------------------*/
function wext_cli_tes_slider_latest_jquery() {
	wp_enqueue_script( 'jquery' );
}
add_action( 'init', 'wext_cli_tes_slider_latest_jquery' );



/*-----------------------------------------------------
 *Some predefine Set-up
 *-----------------------------------------------------*/
define('WPXT_TMSLIDER_WP_PlUGIN', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );



/*------------------------------------------------------------
 * Main Jquery and Style for WEXT Testimonial Slider  Plugin
 *------------------------------------------------------------*/
function wpxt_cli_tes_slider_main_jquery() {

	wp_enqueue_script( 'wext-fxslider-js',WPXT_TMSLIDER_WP_PlUGIN.'js/jquery.flexslider-min.js', array('jquery'), 1.0, false);
	
	wp_enqueue_script( 'wext-mesonary-js',WPXT_TMSLIDER_WP_PlUGIN.'js/masonry.pkgd.min.js', array('jquery'), 1.0, false);
	
	wp_enqueue_script( 'wext-active-js',WPXT_TMSLIDER_WP_PlUGIN.'js/active.js', array('jquery'), 1.0, false);

	wp_enqueue_style( 'wext-main-css', WPXT_TMSLIDER_WP_PlUGIN.'css/slider.css');
	
}
add_action( 'init', 'wpxt_cli_tes_slider_main_jquery' );



/*---------------------------------------------------
 * Add style in header for settings options
 *---------------------------------------------------*/
function wext_tmslider_style_for_setting_options(){
?>

<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_google_font', 'wext_tmslider_styles', '' );?>

<style type="text/css">

	.cd-testimonials-wrapper, .cd-testimonials-wrapper::after{
		background:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_bg_color', 'wext_tmslider_styles', '#39393C' );?>;
	}
	.cd-testimonials p{
		color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_font_color', 'wext_tmslider_styles', '#FFFFFF' );?>;
		font-size:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_font_size', 'wext_tmslider_styles', '15' );?>px;
		font-style:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_font_font_style', 'wext_tmslider_styles', 'italic' );?>;
		font-family: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_font_font_family', 'wext_tmslider_styles', 'Georgia' );?>;
	}
	.cd-testimonials-wrapper::after {
		border-color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_font_color', 'wext_tmslider_styles', '#FFFFFF' );?>;
		color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_font_color', 'wext_tmslider_styles', '#FFFFFF' );?>;
	}
	.cd-see-all{
		background-color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_footer_color', 'wext_tmslider_styles', '#252527' );?> ;
		color: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_see_all_color', 'wext_tmslider_styles', '#6b6b70' );?> !important;
	}
	.cd-container a:hover {
	  color: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_see_all_hover_color', 'wext_tmslider_styles', '#6b6b70' );?> !important;
	}
	div.cd-author img{
		border-color:<?php echo wext_tmslider_get_option( 'wext_tmslider_image_border_color', 'wext_tmslider_styles', '#999999' );?>;
		border-radius:<?php echo wext_tmslider_get_option( 'wext_tmslider_client_image_style', 'wext_tmslider_styles', '50%' );?>;

	}
	.cd-author .cd-author-info li:first-child {
		color:<?php echo wext_tmslider_get_option( 'wext_tmslider_client_name_font_color', 'wext_tmslider_styles', '#FFFFFF' );?>;
	}
	.cd-author .cd-author-info li:last-child {
		color:<?php echo wext_tmslider_get_option( 'wext_tmslider_client_company_font_color', 'wext_tmslider_styles', '#6b6b70' );?>;
	}
	.flex-direction-nav li a::before, .flex-direction-nav li a::after {
		background-color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_arrow_color', 'wext_tmslider_styles', '#5e5e63' );?>;
	}
	.flex-direction-nav li a:hover::before, .flex-direction-nav li a:hover::after {
  		background-color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_arrow_hover_color', 'wext_tmslider_styles', '#FFFFFF' );?>;
	}
	.cd-testimonials-all p {
	  	background:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_all_bg_color', 'wext_tmslider_styles', '#79b6e4' );?>;
	  	color:<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_all_color', 'wext_tmslider_styles', '#FFFFFF' );?>;
	}
	.cd-testimonials-all p::after {
	  border-color: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_all_bg_color', 'wext_tmslider_styles', '#79b6e4' );?> transparent transparent;
	}
		
</style>
<?php
}
add_action('wp_head','wext_tmslider_style_for_setting_options');



/*---------------------------------------------------
 * Add script in footer for settings options
 *---------------------------------------------------*/
function wext_tmslider_script_for_setting_options(){
?>
<script>
jQuery.noConflict();
(function( $ ) {
  $(function() {


$(document).ready(function($){
	//create the slider
	$('.cd-testimonials-wrapper').flexslider({
		selector: ".cd-testimonials > li",
		animation: "slide",
		controlNav: false,
		smoothHeight: true,
		autoControls: true,
		direction: "<?php echo wext_tmslider_get_option( 'wext_tmslider_slider_direction', 'wext_tmslider_basics', 'horizontal' );?>",
		slideshow: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_auto_slideshow', 'wext_tmslider_basics', 'true' );?>,
		slideshowSpeed: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_slideshowSpeed', 'wext_tmslider_basics', 5000 );?>,
		animationSpeed: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_animationSpeed', 'wext_tmslider_basics', 1000 );?>,
		pauseOnHover: <?php echo wext_tmslider_get_option( 'wext_tmslider_slider_pauseOnHover', 'wext_tmslider_basics', 'true' );?>, 


		start: function(){
			$('.cd-testimonials').children('li').css({
				'opacity': 1,
				'position': 'relative'
			});
		}
	});
});


});
})(jQuery);
</script>
<?php
}
add_action('wp_footer', 'wext_tmslider_script_for_setting_options');



/*---------------------------------------------------
 * Thumbonial Support  WEXT Testimonial Slider  plugin
 *---------------------------------------------------*/
add_theme_support( 'post-thumbnails','' );

add_image_size( 'author_img',50,50, true );

include_once('inc/wpxt-wedget.php');

include_once('inc/extra.php');


/*---------------------------------------------------
 * Initialize the metabox class
 *---------------------------------------------------*/
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'inc/cmb/init.php' );
    }
}

// Custom metaboxs option
require_once('inc/cmb/cmb-option.php');



/*---------------------------------------------------
 *This custom post for  WEXT Testimonial Slider Plugin
 *---------------------------------------------------*/
function wpxt_client_testmonial_slider_post() {
	$labels = array(
		'name'               => __( 'Testimonial Slider', 'wexteam' ),
		'singular_name'      => __( 'Testimonial Slide',  'wexteam' ),
		'menu_name'          => __( 'Testimonial Slider', 'wexteam' ),
		'name_admin_bar'     => __( 'Testimonial Slide',  'wexteam' ),
		'add_new'            => __( 'Add New Slide Item', 'wexteam' ),
		'add_new_item'       => __( 'Add New Slide Item', 'wexteam' ),
		'new_item'           => __( 'New Slider Items', 'wexteam' ),
		'edit_item'          => __( 'Edit Slide Item', 'wexteam' ),
		'view_item'          => __( 'View Slide Item', 'wexteam' ),
		'all_items'          => __( 'All Slide Items', 'wexteam' ),
		'search_items'       => __( 'Search Slide', 'wexteam' ),
		'parent_item_colon'  => __( 'Parent Slide:', 'wexteam' ),
		'not_found'          => __( 'No Slide Items found.', 'wexteam' ),
		'not_found_in_trash' => __( 'No Slide Items found in Trash.', 'wexteam' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'menu_icon'          => 'dashicons-clipboard',
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial-slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);

	register_post_type( 'wpxt_slider', $args );
}
add_action( 'init', 'wpxt_client_testmonial_slider_post' );

/*--------------------------------------------------------
 *Shortcode for WEXT Testimonial Slider layout for part one
 *--------------------------------------------------------*/
add_action( 'init', 'register_shortcodes');
function register_shortcodes(){
   add_shortcode('first-part', 'wpxt_testimonial_slider_function_one');
}


function wpxt_testimonial_slider_function_one(){

	$q = new WP_Query(
		array('posts_per_page' => 10,'post_type'=> 'wpxt_slider', ));	

		//use for some custo
	
	$list = '<div class="cd-testimonials-wrapper cd-container">
				<ul class="cd-testimonials">';
				while($q->have_posts()) : $q->the_post();
				$idd = get_the_ID();
				
				global $post;
				$client_name = get_post_meta($idd, '_wpxtts_client_name', true );
				$client_position = get_post_meta($idd, '_wpxtts_client_position', true );
				$company_name = get_post_meta($idd, '_wpxtts_company_name', true );
				
				$author_picture = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'author_img' );
					
				$list .= '
				
				<li>
					<p>'.get_the_content().'</p>
					<div class="cd-author">
						<img src="'.$author_picture[0].'" alt="Author image">
						<ul class="cd-author-info">
							<li  class="client_name">' .$client_name.'</li>
							<li><span>'.$client_position.'</span>, ' .$company_name.'</li>
						</ul>
					</div>
				</li>
				
				';        
				endwhile;
			$list.= '</ul>
			<a href="#0" class="cd-see-all">See all</a>
			</div>
			
			';
			wp_reset_query();
			return $list;



}

/*----------------------------------------------------------
 *Shortcode for WEXT Testimonial Slider layout for part tow
 *----------------------------------------------------------*/
add_action( 'init', 'register_shortcodes_tow');
function register_shortcodes_tow(){
   add_shortcode('second-part', 'wpxt_testimonial_slider_function_tow');
}


function wpxt_testimonial_slider_function_tow(){

	$q = new WP_Query(
		array('posts_per_page' => -1,'post_type'=> 'wpxt_slider'));	

		//use for some custo
			
		
		
	$list = '<div class="cd-testimonials-all">
				<div class="cd-testimonials-all-wrapper">
					<ul>';
	while($q->have_posts()) : $q->the_post();
	$idd = get_the_ID();
	
	global $post;	
	$client_name = get_post_meta($idd, '_wpxtts_client_name', true );
	$client_position = get_post_meta($idd, '_wpxtts_client_position', true );
	$company_name = get_post_meta($idd, '_wpxtts_company_name', true );
	
	$author_picture = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'author_img' );
		
		$list .= '
		
		<li class="cd-testimonials-item">
				<p>'.get_the_content().'</p>
				
				<div class="cd-author">
					<img src="'.$author_picture[0].'" alt="Author image">
					<ul class="cd-author-info">
						<li class="client_name">'.$client_name.'</li>
						<li><span>' .$client_position.'</span>, ' .$company_name.'</li>
					</ul>
				</div> <!-- cd-author -->
			</li>
		
		';        
	endwhile;
	$list.= '</ul>
			</div>	<!-- cd-testimonials-all-wrapper -->
		<span class="cross_box">
		<a href="#0" class="close-btn">Close</a>
		</span>
		</div>
			';
	wp_reset_query();
	return $list;

}



/*---------------------------------------------------------
 *Shortcode for WEXT Testimonial Slider layout for main part
 *----------------------------------------------------------*/
add_action( 'init', 'register_shortcodes_main');

function register_shortcodes_main(){
   add_shortcode('wext-tmslider', 'wpxt_testimonial_slider_function_main');
}

function wpxt_testimonial_slider_function_main(){
	echo '<div class="test_slider">';
	echo do_shortcode( '[first-part][second-part]' );
	echo '</div>';
}



/*---------------------------------------------------------
 * Function for client image
 *----------------------------------------------------------*/
add_action( 'admin_head', 'wext_tmslider_replace_default_featured_image_meta_box', 100 );
function wext_tmslider_replace_default_featured_image_meta_box() {
    remove_meta_box( 'postimagediv', 'wpxt_slider', 'side' );
    add_meta_box('postimagediv', __('Client Image', 'wexteam'), 'post_thumbnail_meta_box', 'wpxt_slider', 'side', 'high');
}



/*---------------------------------------------------------
 * Shortcode button for wext testimonial slider
 *----------------------------------------------------------*/
function wext_tmslider_buttons() {
	add_filter ("mce_external_plugins", "wext_tslider_external_js");
	add_filter ("mce_buttons", "wext_tslider_awesome_buttons");
}

function wext_tslider_external_js($plugin_array) {
	$plugin_array['wexttmslider'] = plugins_url('js/custom-shortcode-button.js', __FILE__);
	return $plugin_array;
}

function wext_tslider_awesome_buttons($buttons) {
	array_push ($buttons, 'wext_tmslider');
	return $buttons;
}
add_action ('init', 'wext_tmslider_buttons');