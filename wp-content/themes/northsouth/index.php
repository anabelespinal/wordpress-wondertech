<?php get_header(); ?>

<?php if (!is_page('Sample Page' )):?>
    <style>
        #banner .image{
            height: auto !important;
            min-height: 0px !important;
            max-height: 100% !important;
        }
        .image.object img{
            height: auto !important;
        }
        #banner .more-link.button{
            display: block;
            width: 30%;
            margin-top: 20px;
        }
    </style>
    <section id="banner">
        <?php echo do_shortcode('[salient_post]') ?>
    </section>

<?php endif ?>


<section>
    <?php if (have_posts()) : ?>
        <div class="posts">
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <a href="<?php echo get_permalink( get_the_ID(), false ); ?>" class="image">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('featured-post-thumb'); ?>
                        <?php endif; ?>
                    </a>
                    <h3 style="text-transform: uppercase"><?php the_title(); ?></h3>
                    <p><?php the_content() ?> </p>
                </article>
            <?php endwhile; ?>
        </div>
        <div>

            <?php
            custom_pagination_northsouth()
            ?>
        </div>
    <?php endif; ?>
</section>


<?php get_footer() ?>
