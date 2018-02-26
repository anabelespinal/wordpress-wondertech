<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <header id="header">
                <span href="index.html" class="logo"><strong>Wordpress</strong> this is an example</span>
                <ul class="icons">
                    <?php if (get_theme_mod('social_network_twitter')){ ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_network_twitter', '#'); ?>" class="icon fa-twitter" id="twitter-settings">
                                <span class="label">Twitter</span>
                            </a>
                        </li>
                    <?php }
                    if (get_theme_mod('social_network_facebook')){ ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_network_facebook', '#'); ?>" class="icon fa-facebook">
                                <span class="label">Facebook</span>
                            </a>
                        </li>
                    <?php }
                    if (get_theme_mod('social_network_snp')){
                    ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_network_snp', '#'); ?>" class="icon fa-snapchat-ghost">
                                <span class="label">Snapchat</span>
                            </a>
                        </li>
                    <?php }
                    if (get_theme_mod('social_network_inst')){
                    ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_network_inst', '#'); ?>" class="icon fa-instagram">
                                <span class="label">Instagram</span>
                            </a>
                        </li>
                    <?php }
                    if (get_theme_mod('social_network_med')){
                    ?>
                        <li>
                            <a href="<?php echo get_theme_mod('social_network_med', '#'); ?>" class="icon fa-medium">
                                <span class="label">Medium</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </header>