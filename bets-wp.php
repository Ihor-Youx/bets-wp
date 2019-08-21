<?php

/**
 *
 * @link              http://bio.youx.com.ua
 * @since             1.0.0
 * @package           Bets_Wp
 *
 * @wordpress-plugin
 * Plugin Name:       bets-wp
 * Plugin URI:        http://outsourcing.qamos.ru
 * Description:       Простой плагин для создания и управления ставками
 * Version:           1.0.0
 * Author:            Ihor
 * Author URI:        https://youx.agency/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bets-wp
 * Domain Path:       /languages
 */

// Если этот файл вызывается напрямую, прекращаяем выполнение.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'BETS_WP_VERSION', '1.0.0' );

require_once plugin_dir_path( __FILE__ ) . 'includes/enqueue_styles_scripts.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/create_bets.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/add_default_terms.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/add_default_roles.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/forms_handler.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/set_bets_template.php';


// Регистрируем тип записи и таксономии
add_action( 'init', 'register_bets_post_type' );
add_action( 'init', 'register_type_bets_taxonomy' );
add_action( 'init', 'register_status_bets_taxonomy' );


// Добавляем термины по умолчанию
register_activation_hook( __FILE__, 'register_bets_post_type' );
register_activation_hook( __FILE__, 'register_type_bets_taxonomy' );
register_activation_hook( __FILE__, 'register_status_bets_taxonomy' );
register_activation_hook( __FILE__, 'add_terms_for_taxonomy_bets' );

// Добавляем пользователей по умолчанию
// Удаляем на всякий случай, если такие пользователи уже имеются
register_activation_hook( __FILE__, 'delete_roles_bets' );

register_activation_hook( __FILE__, 'add_roles_bets' );

// Регистрируем шоткоды
add_shortcode( 'form_bets_wp', 'form_add_bet' );

// Подключаем скрипты и стили
add_action('wp_enqueue_scripts', 'load_style_script_bets_wp' );

// Регистрируем функции обработки форм
add_action('wp_ajax_create_bets_wp', 'function_create_bets_wp');
add_action('wp_ajax_nopriv_create_bets_wp', 'function_create_bets_wp');

add_action('wp_ajax_set_vote', 'function_set_bet_vote');
add_action('wp_ajax_nopriv_set_vote', 'function_set_bet_vote');

// Регистрируем шаблон для типа записи ставками
add_filter( 'single_template', 'load_bets_wp_template' );