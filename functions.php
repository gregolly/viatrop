<?php

// Coloque o código abaixo no arquivo functions.php do seu tema. O número 50 é a quantidade de caracteres a exibir.
function wpdev_custom_excerpt_length( $length ) {
  return 70;
 }
 add_filter( 'excerpt_length', 'wpdev_custom_excerpt_length');

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');


add_action('wp_enqueue_scripts', 'viatrop_tema_css');

function viatrop_tema_css() {
  wp_enqueue_style('normalize-viatrop-tema', get_stylesheet_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('reset-viatrop-tema', get_stylesheet_directory_uri() . '/css/reset.css');
  wp_enqueue_style('css-viatrop-tema', get_stylesheet_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'viatrop_tema_scripts');

function viatrop_tema_scripts(){
	wp_enqueue_script('jquery-viatrop', get_stylesheet_directory_uri() . '/js/jquery-3.1.1.min.js', array(), '3.1.1', true);
	wp_enqueue_script('slider', get_stylesheet_directory_uri() . '/js/slide.js', array('jquery-viatrop'), '', true);
	wp_enqueue_script('jquery-ajax', "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", array(), '3.3.1', true);
	wp_enqueue_script('dropDown', get_stylesheet_directory_uri() . '/js/dropDown.js', array('jquery'), '', true);
	wp_enqueue_script('menu-resposivo', get_stylesheet_directory_uri() . '/js/menu.js', array('jquery'), '', true);
	wp_enqueue_script('scroll_suave', get_stylesheet_directory_uri() . '/js/softScroll.js', array('jquery'), '', true);
	//wp_deregister_script('jquery'); //interfere no funcionamento de plugins que usam jquery
}

//registrar menu
add_action('init', 'viatrop_menu_tema_init');

function viatrop_menu_tema_init()
{
	register_nav_menu('primary', 'Menu Principal');
	register_nav_menu('footer', 'Menu footer');
	//register_nav_menu('inner', 'Menu interno');
}

add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );

//Adiciona suporte a miniaturas (imagem destacada)
add_theme_support('post-thumbnails');

//adicionar titulo dinamico
add_theme_support('title-tag');

//adicionando suporte aos widgets
add_theme_support('customize-selective-refresh-widgets');

add_action('init', 'viatrop_action_init');
//adicionar custom post type
function viatrop_action_init(){
  //chama função custom post type
  viatrop_registrar_custom_post_type();
}

function viatrop_registrar_custom_post_type() {

	$ProdutosViatrop = array(
		'name' => 'Produtos',
		'singular_name' => 'Produtos',
		'add_new' => 'Adicionar Novo Produtos',
		'add_new_item' => 'Adicionar Produtos',
		'edit_item' => 'Editar Produtos',
		'new_item' => 'Novo Produtos',
		'view_item' => 'Ver Produtos',
		'search_items' => 'Procurar Produtos',
		'not_found' =>  'Nenhum Produtos encontrado',
		'not_found_in_trash' => 'Nenhum Produtos na Lixeira',
		'parent_item_colon' => '',
		'menu_name' => 'Produtos'
	);

	$argsProdutos = array(
		'labels' => $ProdutosViatrop,  //Insere o Array de labels dentro do argumento de labels
		'public' => true,  //Se o Custom Type pode ser adicionado aos menus e exibidos em buscas
		'hierarchical' => false,  //Se o Custom Post pode ser hierarquico como as páginas
		'menu_position' => 5,  //Posição do menu que será exibido
		'supports' => array('title','editor','thumbnail', 'custom-fields', 'revisions'), //Quais recursos serão usados (metabox)
		'show_in_rest'=> true
    );

	register_post_type( 'Produtos' , $argsProdutos );

	flush_rewrite_rules();
}
add_action('shortcode', 'viatrop_registrar_custom_post_type');

register_sidebar([
	'name'			=> 'Barra Lateral (Sidebar)',
	'id'			=> 'viatrop-sidebar',
	'description'	=> 'Área lateral sidebar viatrop',
	'before_title'	=> '<h4>',
	'after_title'	=> '</h4>'
]);

add_filter ('the_title', 'max_title_length');

function max_title_length( $title ) {
	$max = 30;
	if( strlen( $title ) > $max ) {
	return substr( $title, 0, $max ). " &hellip;";
	} else {
	return $title;
	}
}

//class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	// Sua classe com os métodos que você quer alterar
//}

// REMOVE A VERSAO DO CSS E JS
function vc_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
	$src = remove_query_arg( 'ver', $src );
	return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	 //fim da remoção da versão css e js

	// MOVE O JAVASCRIPT PARA O RODAPE
function remove_head_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
	}
	add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
	// END Custom Scripting to Move JavaScript