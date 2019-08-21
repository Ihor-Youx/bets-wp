<?php



/**

 *

 *

 * @link       http://bio.youx.com.ua

 * @since      1.0.0

 *

 * @package    Bets_Wp

 */



// Если удаление не из Wordpress, выходим из скрипта

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	exit;

}


require_once plugin_dir_path( __FILE__ ) . 'includes/delete_terms.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/add_default_roles.php';



// удаляем пользователей созданых для плагина и их посты

$all_users = get_users(array(

			'role__in' => array(

				'capper',

				'moderator_bets'

				),

			'role_not_in' => array(

				'administrator',

				'editor',

				'author',

				'contributor'

				),

			'fields' => array(

				'ID'

				)

			));



foreach ($all_users as $all_user) {

	wp_delete_user( $all_user->ID );

}





// удаляем посты типа записи bet

$params = array(

	'posts_per_page' => -1,

	'post_type'	=> 'bet'

);

$q = new WP_Query( $params );

if( $q->have_posts() ) :

	while( $q->have_posts() ) : $q->the_post();

		wp_delete_post( $q->post->ID, true );

	endwhile;

endif;

wp_reset_postdata();





// удаляем термины таксономий для типа записи bets

delete_bets_taxonomy_terms('status_bets');
delete_bets_taxonomy_terms('type_bets');









// удаляем роли

delete_roles_bets();