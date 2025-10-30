<?php
/**
 * Desativa os Emojis do WordPress para melhorar a performance.
 */
function desativar_wp_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'desativar_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'desativar_emojis_dns_prefetch', 10, 2 );
}
add_action( 'init', 'desativar_wp_emojis' );

/**
 * Remove o plugin de emojis do editor TinyMCE.
 */
function desativar_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove o DNS prefetch para o host de emojis.
 */
function desativar_emojis_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/14.0.0/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
}

/**
 * Desativa os Embeds (oEmbed) do WordPress.
 */
function desativar_wp_embeds() {
    // Remove o script wp-embed.min.js
    wp_deregister_script( 'wp-embed' );

    // Remove as ações e filtros relacionados
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    add_filter( 'embed_oembed_discover', '__return_false' );
    remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}
add_action( 'init', 'desativar_wp_embeds', 9999 );

/**
 * Desativa o XML-RPC e remove os links do header.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' ); // Link RSD (Really Simple Discovery)
remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer

/**
 * Aumenta o intervalo do Heartbeat para 60 segundos.
 */
function limitar_heartbeat_intervalo( $settings ) {
    $settings['interval'] = 60; // Em segundos
    return $settings;
}
add_filter( 'heartbeat_settings', 'limitar_heartbeat_intervalo' );