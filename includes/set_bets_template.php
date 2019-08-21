<?php 
// устанавливаем шаблон для записей Ставки
function load_bets_wp_template( $template ) {
    global $post;
    // роверяем не определен ли он в родительской или дочерней теме
    if ( 'bet' === $post->post_type ) {

        return plugin_dir_path(__FILE__) . 'templates/single-bet.php';
    }

    return $template;
}