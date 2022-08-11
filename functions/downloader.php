<?php
function app_post() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'App', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'app', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'app', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent app', 'twentytwenty' ),
        'all_items'           => __( 'app အားလုံး', 'twentytwenty' ),
        'view_item'           => __( 'app ကိုကြည့်ရန်', 'twentytwenty' ),
        'add_new_item'        => __( 'appသစ်ထည့်ရန်', 'twentytwenty' ),
        'add_new'             => __( 'အသစ်ထပ်ထည့်ရန်', 'twentytwenty' ),
        'edit_item'           => __( 'app အချက်အလက်ပြင်ရန်', 'twentytwenty' ),
        'update_item'         => __( 'ပြင်ဆင်ပြီး', 'twentytwenty' ),
        'search_items'        => __( 'ရှိသော appများ ရှာရန်', 'twentytwenty' ),
        'not_found'           => __( 'မတွေ့ရှိပါ', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'ဘာမှမရှိ', 'twentytwenty' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'appများ', 'twentytwenty' ),
        'description'         => __( 'app အချက်အလက်', 'twentytwenty' ),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'p', 'slug' => 'app'),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_os'       => 10,

        // Features this CPT supports in Post Editor
        'supports'           =>  array(
            'title',
            // 'editor',
            // 'author',
            // 'post-formats',
            'thumbnail',
            // 'excerpt',
            // 'comments',
            // 'revisions',
            // 'custom-fields',
        ),

		'menu_icon'            => 'dashicons-admin-links',

        // You can associate this CPT with a taxonomy or custom taxonomy.
        // 'taxonomies'          => array( 'post_tag', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'exclude_from_search' => false,

        // important
        'show_in_rest'        => false

    );

    // Registering your Custom Post Type
    register_post_type( 'apps', $args );
    flush_rewrite_rules();

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'app_post' );



/////////////////////////////////////////////////////////////////////////

function add_app() {
    add_meta_box(
         'wpa-app',
         'app Imformation',
         'appInput',
         'apps',//apps, post, page
         'advanced',
         'default',
         null
      );

       //   add_meta_box(
       //       string $id,
       //       string $title,
       //       callable $callback,
       //       string|array|WP_Screen $screen = null,
       //       string $context = 'advanced',
       //       string $priority = 'default',
       //       array $callback_args = null
       //       )

} add_action('admin_menu', 'add_app');


function appInput() {
   global $post;
   wp_nonce_field( 'app', 'app_nonce' );


       $meta = get_post_meta($post->ID, 'app', true);

       $os = @isset($meta['os']) ? @$meta['os'] : '';
       $link = @isset($meta['link']) ? @$meta['link'] : '';
       $description = @isset($meta['description']) ? @$meta['description'] : '';

       ?>
       os
       <input placeholder="operating system" type="text" class="widefat" name="app[os]" value="<?php echo $os; ?>"/>
       link
       <textarea placeholder="download link" type="text" class="widefat" name="app[link]"><?php echo $link; ?></textarea>
       Description
       <textarea placeholder="Download Desctiption" class="widefat" name="app[description]"><?php echo $description; ?></textarea>

   <?php

}

add_action('save_post', 'app_save');
function app_save($post_id) {
   global $custom_meta_fields;
   if ( ! isset( $_POST['app_nonce'] ) ||
       ! wp_verify_nonce( $_POST['app_nonce'], 'app' ) )
       return;

   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
       return;

   if (!current_user_can('edit_post', $post_id))
       return;

   update_post_meta(
     $post_id,
     'app',
     $_POST['app']
   );

}

function my_enter_title_here( $title, $post ) {
    if ( 'app' == $post->post_type ) {
        $title = 'Name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'my_enter_title_here', 10, 2 );

  function custom_columns( $columns ) {
      $columns = array(
          'cb' => '<input type="checkbox" />',
          // 'featured_image' => 'Image',
          'title' => 'အမည်',
          'link' => 'link',
          'os' => 'OS',
          'description' => 'အကြောင်းအရာ',
       );
      return $columns;
  }

  add_filter('manage_app_posts_columns' , 'custom_columns');

  function custom_columns_data( $column, $post_id ) {
      switch ( $column ) {
        case 'featured_image':
            the_post_thumbnail( 'tiny' );
            break;
        case 'link':
            echo get_post_meta($post_id, 'app', true)['link'];
            break;
        case 'os':
            echo get_post_meta($post_id, 'app', true)['os'];
            break;
        case 'description':
            echo get_post_meta($post_id, 'app', true)['description'];
            break;
      }
  }
  add_action( 'manage_app_posts_custom_column' , 'custom_columns_data', 10, 2 );
?>