<?php

add_theme_support( 'title-tag' );

require_once get_template_directory() . '/includes/setup.php';

require_once get_template_directory() . '/includes/enqueue_scripts_and_styles.php';

require_once get_template_directory() . '/includes/logo.php';

require_once get_template_directory() . '/includes/customizer.php';

require_once get_template_directory() . '/includes/catalog_page_products.php';

require_once get_template_directory() . '/includes/dynamic_product_select_list.php';

require_once get_template_directory() . '/includes/filter_products_ajax_handler.php';

require_once get_template_directory() . '/includes/badge_style.php';

require_once get_template_directory() . '/includes/get_valid_product_types_ajax_handler.php';

require_once get_template_directory() . '/includes/custom_posts_types_partners.php';

require_once get_template_directory() . '/includes/custom_posts_types_testimonials.php';

require_once get_template_directory() . '/includes/defer_scripts.php';
