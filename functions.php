<?php

// Coloque o código abaixo no arquivo functions.php do seu tema. O número 50 é a quantidade de caracteres a exibir.
function wpdev_custom_excerpt_length( $length ) {
  return 30;
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

//registrar menu
add_action('init', 'viatrop_menu_tema_init');

function viatrop_menu_tema_init()
{
	register_nav_menu('menu-viatrop-main', 'Menu Principal');
	//register_nav_menu('twmenu-terzi', 'Menu footer');
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
