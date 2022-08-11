<?php
include_once(__DIR__ . "/functions/menus.php");
include_once(__DIR__ . "/functions/social.php");
include_once(__DIR__ . "/functions/metabox.php");
include_once(__DIR__ . "/functions/downloader.php");

function abc(){
    include_once('package.php');
   }
   add_shortcode('abc' , 'abc');

//image sizing
add_image_size('tiny', 70, 70);
add_image_size('small', 200, 200);
add_image_size('medium', 400, 400);
add_image_size('big', 800, 800);
add_image_size('large', 1000, 1000);


function hein_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'hein_theme_support');


function ryf_custom_logo_setup()
{
    $defaults = array(
        'height'               => 400,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'ryf_custom_logo_setup');


function hein_register_style()
{
    $version = wp_get_theme()->get('version');
    wp_enqueue_style('hein_style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_style('slider', get_template_directory_uri() . '/assets/css/slider.css', array(), $version, 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/mdb.dark.min.css', array(), $version, 'all');

    wp_enqueue_style('bootstrap-overwrite', get_template_directory_uri() . '/assets/css/bootstrap-overwrite.css', array(), $version, 'all');
    // wp_enqueue_style('fontawesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css', array(), '6.1.1', 'all');
    wp_enqueue_style('f_icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    // wp_enqueue_style('icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css');


}
add_action('wp_enqueue_scripts', 'hein_register_style');

function hein_register_script()
{
    $version = wp_get_theme()->get('version');
    wp_enqueue_script('hein_script', get_template_directory_uri() . '/assets/js/index.js', array(), $version);
    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js', array(), $version);
}
add_action('wp_enqueue_scripts', 'hein_register_script');


function footerScript()
{
    wp_enqueue_script('mdb', get_template_directory_uri() . '/assets/bootstrap/js/mdb.min.js', array('jquery'));
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'));
    // wp_enqueue_script('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js", array('jquery'));
}
add_action('wp_footer', 'footerScript');


// important အမှားကာကွယ်ရန်
function wpdocs_remove_menus()
{

    // //   remove_menu_page( 'index.php' );                  //Dashboard
    // remove_menu_page('jetpack');                    //Jetpack* 
    // //   remove_menu_page( 'edit.php' );                   //Posts
    // //   remove_menu_page( 'upload.php' );                 //Media
    // //   remove_menu_page( 'edit.php?post_type=page' );    //Pages
    // remove_menu_page('edit-comments.php');          //Comments
    // //   remove_menu_page( 'themes.php' );                 //Appearance
    // remove_menu_page('plugins.php');                //Plugins
    // //   remove_menu_page( 'users.php' );                  //Users
    // remove_menu_page('tools.php');                  //Tools
    // //   remove_menu_page( 'options-general.php' );        //Settings

}
/**
 * Remove Appearance > Themes and Appearance > Theme Editor admin menu items
 */
function wpdd_remove_menu_items()
{
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
}
add_action('admin_menu', 'wpdocs_remove_menus');
add_action('admin_menu', 'wpdd_remove_menu_items', 999);
