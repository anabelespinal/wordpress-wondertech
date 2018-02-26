<?php
/**
 * Plugin Name: Post Selected
 * Description: This plugin allows to select posts.
 * Version: 1.0.0
 * Author: Anabel Espinal
 * Text Domain: wp-post-selected
 */

//Previene el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) exit;

const KEY_META_BOX_SALIENT_POST = '_nss_salient_post';

if ( is_admin() ) {
    require_once( 'admin/MetaBoxPostSelected.php' );
}else{
    require_once( 'public/AddPostSelected.php' );
}