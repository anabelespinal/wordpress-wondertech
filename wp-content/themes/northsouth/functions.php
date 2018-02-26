<?php

function northsouth_setup()
{

    add_theme_support('post-thumbnails');
    add_image_size( 'featured-post-thumb', 340, 210, true );
    add_image_size( 'featured-post-thumb-feature', 560, 400, true );
    add_image_size( 'post-thumb', 1200, 400 );

    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'northsouth')
    ));

    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    add_theme_support('post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ));

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'northsouth_setup');

function northsouth_widgets_init()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'northsouth'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'northsouth'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<header class="major"><h2 class="widget-title">',
        'after_title' => '</h2></header>',
    ));
}

add_action('widgets_init', 'northsouth_widgets_init');


function northsouth_scripts()
{

    wp_enqueue_script('northsouth_html5shiv', get_template_directory_uri() . '/js/ie/html5shiv.js', array(), '1.0');
    wp_script_add_data('northsouth_html5shiv', 'conditional', 'lte IE 8');

    wp_enqueue_style('northsouth_main', get_stylesheet_directory_uri() . '/css/main.css', array(), '1.0');

    wp_enqueue_style('northsouth-ie9', get_stylesheet_directory_uri() . '/css/ie9.css', array(), '1.0');
    wp_style_add_data('northsouth-ie9', 'conditional', 'lte IE 9');

    wp_enqueue_style('northsouth-ie8', get_stylesheet_directory_uri() . '/css/ie8.css', array(), '1.0');
    wp_style_add_data('northsouth-ie8', 'conditional', 'lte IE 8');

    wp_enqueue_script('northsouth_jquery_script', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0', true);

    wp_enqueue_script('northsouth_skel_script', get_template_directory_uri() . '/js/skel.min.js', array(), '1.0', true);

    wp_enqueue_script('northsouth_main_script', get_template_directory_uri() . '/js/main.js', array('northsouth_jquery_script', 'northsouth_skel_script'), '1.0', true);

    wp_enqueue_script('northsouth_respond_script_ie8', get_template_directory() . '/js/ie/respond.min.js', array(), '1.0', true);
    wp_script_add_data('northsouth_respond_script_ie8', 'conditional', 'lte IE 8');

    wp_enqueue_script('northsouth_util_script', get_template_directory_uri() . '/js/util.js', array('northsouth_jquery_script', 'northsouth_skel_script'), '1.0', true);

}

add_action('wp_enqueue_scripts', 'northsouth_scripts');

function modify_read_more_link() {
    return '<a class="more-link button" href="' . get_permalink() . '">More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

function custom_pagination_northsouth($pages = '', $range = 2)
{
    $showItems = ($range * 2)+1;
    global $paged;

    if(empty($paged)) $paged = 1;

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages) {
        echo "<ul class='pagination'>";

        $isPaged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        if(1 == $isPaged) {
            echo "<li><span class='button disabled'>Prev</span></li>";
        }else{
            $prevLink = get_pagenum_link($isPaged-1);
            echo "<li><a href='". $prevLink ."' class='button'>Prev</a></li>";
        }

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showItems )) {
                if ($paged == $i) {
                    echo "<li><a href='javascript:void(0)' class='page active'>" . $i . "</a></li>";
                }else{
                    echo "<li><a href='" . get_pagenum_link($i) . "' class='page'>" . $i . "</a></li>";
                }
            }
        }

        if($isPaged == $pages){
            echo "<li><span class='button disabled'>Next</span></li>";
        }else{
            $nextLink = get_pagenum_link($isPaged+1);
            echo "<li><a href='". $nextLink ."' class='button'>Next</a></li>";
        }

        echo "</ul>\n";
    }
}


function northsouth_customize_network($wp_customize){

    $wp_customize->add_section( 'social_network' , array(
        'title'      => 'Header\'s Social Networks',
    ) );

    $args =  array(
        'default'     => '#',
        'capability'     => 'edit_theme_options',
    );

    $argsControl = array(
        'section'	=> 'social_network',
        'type'	 => 'text',
    );

    //for twitter's link:
    $wp_customize->add_setting( 'social_network_twitter' , $args);

    $wp_customize->add_control( 'social_network_twitter', array_merge(
        array('label' => 'Twitter\' link'),
        $argsControl
    ));

    //for facebook's link:
    $wp_customize->add_setting( 'social_network_facebook' , $args);

    $wp_customize->add_control( 'social_network_facebook', array_merge(
        array('label' => 'Facebook\' link'),
        $argsControl
    ));

    //for Snapchat's link:
    $wp_customize->add_setting( 'social_network_snp' , $args);

    $wp_customize->add_control( 'social_network_snp', array_merge(
        array('label' => 'Snapchat\' link'),
        $argsControl
    ));

    //for Instagram's link:
    $wp_customize->add_setting( 'social_network_inst' , $args);

    $wp_customize->add_control( 'social_network_inst', array_merge(
        array('label' => 'Instagram\' link'),
        $argsControl
    ));

    //for Medium's link:
    $wp_customize->add_setting( 'social_network_med' , $args);

    $wp_customize->add_control( 'social_network_med', array_merge(
        array('label' => 'Medium\' link'),
        $argsControl
    ));

    show_shortcut_button($wp_customize, 'social_network_twitter', '.fa-twitter');
    show_shortcut_button($wp_customize, 'social_network_facebook', '.fa-facebook');
    show_shortcut_button($wp_customize, 'social_network_snp', '.fa-snapchat-ghost');
    show_shortcut_button($wp_customize, 'social_network_inst', '.fa-instagram');
    show_shortcut_button($wp_customize, 'social_network_med', '.fa-medium');

}

function show_shortcut_button($wp_customize, $social_network, $selector){
    $wp_customize->selective_refresh->add_partial( $social_network,  array(
        'selector' => $selector,
        'render_callback' => function($social_network) {
            echo get_theme_mod($social_network);
        },
    ));
}

add_action('customize_register', 'northsouth_customize_network');

if (!class_exists('Favorite_Post_Widget')) {
    require_once(__DIR__ . '/Favorite_Post_Widget.php');
}
if (!class_exists('Five_Posts_Recent_Widget')) {
    require_once(__DIR__ . '/Five_Posts_Recent_Widget.php');
}