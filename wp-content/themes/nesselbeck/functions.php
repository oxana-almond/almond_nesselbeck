<?
//Подключение скрипта
function js_to_wp_head() {
    wp_enqueue_script( 'wp_main_js', get_stylesheet_directory_uri() . '/js/script.js', array(), null, true );
}
 
add_action( 'wp_enqueue_scripts', 'js_to_wp_head' );

//Новое меню

add_theme_support('menus');

register_nav_menus(
	array(
		'header_menu' => 'Шапка сайта',
		'footer_menu' => 'Футер'
	)
);

add_theme_support( 'post-thumbnails' );

// Размер для фото
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'doc-preview', 287, 370, true );
}


// Глобальные настройки сайта
if(function_exists('acf_add_options_page')) { 
    // add parent
	acf_add_options_page(array(
		'page_title' 	=> 'Главная информация',
		'menu_title' 	=> 'Главная инф-я',
        'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
        'parent_slug' 	=> ''
	));
	
	
	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Контактная информация',
		'menu_title' 	=> 'Контакты',
		'menu_slug' 	=> 'theme-contacts',
		'parent_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts'
	));
    
}

?>