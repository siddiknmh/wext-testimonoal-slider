<?php 

/*
add_action('admin_menu', 'test_admin_help_tab');
function test_admin_help_tab() {
    $test_help_page = add_options_page(__('Test Help Tab Page', 'text_domain'), __('Test Help Tab Page', 'text_domain'), 'manage_options', 'text_domain', 'test_help_admin_page');

	add_action('load-'.$test_help_page, 'admin_add_help_tab');
}*/

// Add plugin help tab
add_action( "load-plugins.php", 'add_plugins_help_tab' , 20 );

function add_plugins_help_tab () {
    global $test_help_page;
    $screen = get_current_screen();

    // Add my_help_tab if current screen is My Admin Page
    $screen->add_help_tab( array(
        'id'	=> 'test_help_tab',
        'title'	=> __('Test Help Tab'),
        'content'	=> '<p>' . __( 'Use this field to describe to the user what text you want on the help tab. you can vesit <a href="http://wexteam.com" >Our help desk</a>' ) . '</p>',
    ) );
}

function test_help_admin_page(){}


?>