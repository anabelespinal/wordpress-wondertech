<?php

function get_salient_post_random($atts){
    $atts_sc = shortcode_atts(array(
        'meta_key' => KEY_META_BOX_SALIENT_POST,
        'value_meta' => 1,
        'posts_per_page' => 1,
    ), $atts);

    $args = array(
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => $atts_sc['meta_key'],
                'value'=> $atts_sc['value_meta']
            )
        ),
        'posts_per_page' => $atts_sc['posts_per_page'],
        'orderby' => 'rand',
    );

    $postRandom = new WP_Query($args);

    $html = null;

    if($postRandom){
        if($postRandom->have_posts()){
            while ($postRandom->have_posts()):
                $postRandom->the_post();



                $html = '<div class="content"><header><h2 style="font-size: 40px">' .
                    '<span class="icon fa-paper-plane" style="color: #f56a6a; font-size: 30px"></span>' .
                    '<span>'.strtoupper(get_the_title($postRandom->post->ID)).'</span></h2></header>' .
                    '<div class="div-post">'.get_the_content(get_permalink($postRandom->post->ID, false), false).'</div></div>' .
                    '<span class="image">'.get_the_post_thumbnail($postRandom->post->ID).'</span>';
            endwhile;
            wp_reset_postdata();
        }
    };

    return $html;
}

add_shortcode('salient_post', 'get_salient_post_random');