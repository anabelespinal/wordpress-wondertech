<?php

class Five_Posts_Recent_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'five_posts_recent_widget',
            'description' => 'Widget to show the five post most recent.',
        );
        parent::__construct( 'five_posts_recent_widget', 'Five Posts Recent Widget', $widget_ops );
    }

    public function post_recent(){

        $posts_recent = wp_get_recent_posts( array(
            'post_status' => 'publish',
            'numberposts' => 5,
            'orderby' => 'post_date'
        ), OBJECT  );

        return $posts_recent;
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $posts_recent = $this->post_recent();
        if( ! empty( $posts_recent ) && is_array( $posts_recent ) ){

            ?>
            <div class="mini-posts">
                <?php foreach ( $posts_recent as $post ) {
                    ?>
                    <article>
                        <h3><?php echo  strtoupper($post->post_title); ?></h3>
                        <a href="<?php echo get_permalink( $post->ID ); ?>" class="image">
                            <?php echo get_the_post_thumbnail($post->ID, 'featured-post-thumb'); ?>
                        </a>
                    </article>
                <?php } ?>
            </div>
            <?php

        }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Favorite Post Widget.', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <div>Those are the post most recent: </div>
        <?php
        $posts_recent = $this->post_recent();
        ?>
        <div style="max-height: 120px; overflow: auto;">
            <ul>
                <?php foreach ( $posts_recent as $post ) { ?>
                    <li>
                        <span><?php echo get_the_title( $post->ID ); ?> </span>
                        <span> <?php echo get_the_date( 'M-d-Y' , $post->ID ); ?></span>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}

add_action( 'widgets_init', function(){
    register_widget( 'Five_Posts_Recent_Widget' );
});