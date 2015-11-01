<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('wext_tmslider_Settings_API_main' ) ):
class wext_tmslider_Settings_API_main {

    private $settings_api;

    function __construct() {
        $this->settings_api = new wext_tmslider_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'Testimonial Slider Ultimate Settings', 'Testimonial Slider Ultimate Settings', 'delete_posts', 'settings_api_admin_menu', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'wext_tmslider_basics',
                'title' => __( 'Basic Settings', 'wexteam' )
            ),
            array(
                'id' => 'wext_tmslider_styles',
                'title' => __( 'Style Settings', 'wexteam' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'wext_tmslider_basics' => array(
                array(
                    'name'    => 'wext_tmslider_slider_direction',
                    'label'   => __( 'Direction', 'wexteam' ),
                    'desc'    => __( 'Select the sliding direction, "horizontal" or "vertical". Default horizontal ', 'wexteam' ),
                    'type'    => 'radio',
					'default' => 'horizontal',
                    'options' => array(
                        'horizontal' => 'Horizontal',
                        'vertical'  => 'Vertical'
                    )
                ),
                array(
                    'name'    => 'wext_tmslider_slider_auto_slideshow',
                    'label'   => __( 'Auto slideshow', 'wexteam' ),
                    'desc'    => __( 'Animate slider automatically. Default Yes ', 'wexteam' ),
                    'type'    => 'radio',
                    'default' => 'true',
                    'options' => array(
                        'true' => 'Yes',
                        'false'  => 'No'
                    )
                ),
                array(
                    'name' => 'wext_tmslider_slider_slideshowSpeed',
                    'label' => __( 'Slide show speed', 'wexteam' ),
                    'desc' => __( 'Set the speed of the slideshow cycling, in milliseconds. Default value 5000.', 'wexteam' ),
                    'type' => 'number',
                    'default' => '5000'
                ),
                array(
                    'name' => 'wext_tmslider_slider_animationSpeed',
                    'label' => __( 'Animation speed', 'wexteam' ),
                    'desc' => __( 'Set the speed of animations, in milliseconds. Default value 1000.', 'wexteam' ),
                    'type' => 'number',
                    'default' => '1000'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_pauseOnHover',
                    'label'   => __( 'Push on hover', 'wexteam' ),
                    'desc'    => __( 'Pause the slideshow when hovering over slider, then resume when no longer hovering . Default Yes.', 'wexteam' ),
					'default' => 'true',
                    'type'    => 'radio',
                    'options' => array(
                        'true' => 'Yes',
                        'false'  => 'No'
                    )
                )
            ),
            'wext_tmslider_styles' => array(
                array(
                    'name'    => 'wext_tmslider_slider_bg_color',
                    'label'   => __( 'Slider background color ', 'wexteam' ),
                    'desc'    => __( 'Select a color for slider background color. Default #39393C', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#39393C'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_font_color',
                    'label'   => __( 'Testimonial font color', 'wexteam' ),
                    'desc'    => __( 'Select a color for Testimonial font color. Default #FFFFFF', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF'
                ),
                array(
                    'name' => 'wext_tmslider_slider_font_size',
                    'label' => __( 'Testimonial font size', 'wexteam' ),
                    'desc' => __( 'Set the Testimonial font size in pixel. For best result use 12 to 20 pixel. Default value 15.', 'wexteam' ),
                    'type' => 'number',
                    'default' => '15'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_google_font',
                    'label'   => __( 'Add google font', 'wexteam' ),
                    'desc'    => __( 'Add the google font link here ( If you want to change the font family ). <a href="https://www.google.com/fonts">get google fonts</a>', 'wexteam' ),
                    'type'    => 'text',
                    'default' => ''
                ),
                array(
                    'name'    => 'wext_tmslider_slider_font_font_family',
                    'label'   => __( 'Testimonial font family ', 'wexteam' ),
                    'desc'    => __( 'Add the font family name whiche font linked from google fonts . Default Georgia', 'wexteam' ),
                    'type'    => 'text',
                    'default' => 'Georgia'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_font_font_style',
                    'label'   => __( 'Testimonial font style', 'wexteam' ),
                    'desc'    => __( 'Select the testimonial font style from Normal adn Italic. Default Italic ', 'wexteam' ),
                    'type'    => 'radio',
                    'default' => 'italic',
                    'options' => array(
                        'normal' => 'Normal',
                        'italic'  => 'Italic'
                    )
                ),
                array(
                    'name'    => 'wext_tmslider_slider_footer_color',
                    'label'   => __( 'Slider buttom background color', 'wexteam' ),
                    'desc'    => __( 'Select a color for slider bottom color. Default #252527', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#252527'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_see_all_color',
                    'label'   => __( 'See all color', 'wexteam' ),
                    'desc'    => __( 'Select a color for See all text color. Default #6b6b70', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#6b6b70'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_see_all_hover_color',
                    'label'   => __( 'See all hover color', 'wexteam' ),
                    'desc'    => __( 'Select a color for See all text hover color. Default #FFFFFF', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF'
                ),
                array(
                    'name'    => 'wext_tmslider_image_border_color',
                    'label'   => __( 'Client image border color ', 'wexteam' ),
                    'desc'    => __( 'Select a color for client image color. Default #999999', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#999999'
                ),
                array(
                    'name'    => 'wext_tmslider_client_image_style',
                    'label'   => __( 'Client image style', 'wexteam' ),
                    'desc'    => __( 'Select a style from Round and Square for client image. Default Round.', 'wexteam' ),
                    'default' => '50%',
                    'type'    => 'radio',
                    'options' => array(
                        '50%' => 'Round',
                        '0'   => 'Square'
                    )
                ),
                array(
                    'name'    => 'wext_tmslider_client_name_font_color',
                    'label'   => __( 'Client name font color', 'wexteam' ),
                    'desc'    => __( 'Select a color for client name font color. Default #FFFFFF', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF'
                ),
                array(
                    'name'    => 'wext_tmslider_client_company_font_color',
                    'label'   => __( 'Client position and company font color', 'wexteam' ),
                    'desc'    => __( 'Select a color for client position and company color. Default #6b6b70', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#6b6b70'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_arrow_color',
                    'label'   => __( 'Slider arrow color', 'wexteam' ),
                    'desc'    => __( 'Select a color for slider arrow color. Default #5e5e63', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#5e5e63'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_arrow_hover_color',
                    'label'   => __( 'Slider arrow hover color', 'wexteam' ),
                    'desc'    => __( 'Select a color for slider arrow hover color. Default #FFFFFF', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF'
                ),
                array(
                    'name'    => 'wext_tmslider_slider_all_bg_color',
                    'label'   => __( 'All testmonial background color ', 'wexteam' ),
                    'desc'    => __( 'Select a background color for when show all testimonial in one page. Default #79b6e4 ', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#79b6e4 '
                ),
                array(
                    'name'    => 'wext_tmslider_slider_all_color',
                    'label'   => __( 'All testmonial font color ', 'wexteam' ),
                    'desc'    => __( 'Select a color for when show all testimonial in one page. Default #FFFFFF ', 'wexteam' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF '
                )
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
